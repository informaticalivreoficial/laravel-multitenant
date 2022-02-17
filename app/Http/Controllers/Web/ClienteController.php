<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends Controller
{
    public function home()
    {
        return view('web.cliente.home');
    }

    public function planos()
    {
        $planos = Plan::orderBy('valor', 'ASC')->limit(3)->get();
        return view('web.cliente.planos',[
            'planos' => $planos
        ]);
    }

    public function plano($slug)
    {
        $plano = Plan::where('slug', $slug)->first();
        return view('web.cliente.plano',[
            'plano' => $plano
        ]);
    }

    public function assinar($slug)
    {
        if (!$plan = Plan::where('slug', $slug)->first()) {
            return redirect()->back();
        }

        session()->put('plan', $plan);

        return redirect()->route('register');        
    }
}
