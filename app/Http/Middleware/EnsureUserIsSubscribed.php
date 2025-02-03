<?php

namespace App\Http\Middleware;

use App\Tenant\ManangerTenant;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {  
        $admin = app(ManangerTenant::class); 
        $admin = $admin->isAdmin();

        $date1 = Carbon::now()->createFromFormat('Y-m-d', date('Y-m-d'));
        $date2 = Carbon::createFromFormat('Y-m-d', Auth::user()->tenant->expires_at);
  
        $result = $date1->gt($date2); // se data de hoje for maior que data de expiração = true
        //dd($result);
        if(!$admin && $request->user() && $result == true && !$request->user()->subscribed('default')){
            return redirect()->route('assinatura.index');
        }      
        // if ($request->user() && !$request->user()->subscribed('default')) {
        //     return redirect()->route('assinatura.index');
        // }

        return $next($request);
    }
}
