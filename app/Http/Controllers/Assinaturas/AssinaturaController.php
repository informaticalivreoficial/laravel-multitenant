<?php

namespace App\Http\Controllers\Assinaturas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssinaturaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        if (auth()->user()->subscribed('default'))
            return redirect()->route('assinatura.index');

        return view('admin.assinaturas.index',[
            'intent' => auth()->user()->createSetupIntent(),
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->token);
        $request->user()
                ->newSubscription('default', 'price_1KUe5XDBiPn8lCt8AXN1L9E9')
                ->create($request->token);

        return redirect()->route('assinatura');
    }

    public function assinatura()
    {
        if (!auth()->user()->subscribed('default'))
            return redirect()->route('assinatura.index');

        $user = auth()->user();

        $invoices = $user->invoices();

        $subscription = $user->subscription('default');
        //dd($invoices);
        return view('admin.assinaturas.assinatura', compact('invoices', 'user', 'subscription'));
    }

    public function downloadInvoice($invoiceId)
    {
        $user = auth()->user();

        return Auth::user()
                    ->downloadInvoice($invoiceId, [
                        'vendor' => config('app.name'),
                        'product' => $user->tenant->plan->name
                    ]);
    }

    public function cancel()
    {
        auth()->user()->subscription('default')->cancel();

        return redirect()->route('assinatura');
    }

    public function resume()
    {
        auth()->user()->subscription('default')->resume();

        return redirect()->route('assinatura');
    }
}
