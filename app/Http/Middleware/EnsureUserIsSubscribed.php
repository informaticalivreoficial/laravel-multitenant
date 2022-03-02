<?php

namespace App\Http\Middleware;

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
        //dd(Carbon::now()->diffInDays(Carbon::parse($request->user()->tenant->subscription)));
        if($request->user() && Carbon::now()->diffInDays(Carbon::parse(Auth::user()->tenant->subscription)) > 30 && !$request->user()->subscribed('default')){
            return redirect()->route('assinatura.index');
        }      
        // if ($request->user() && !$request->user()->subscribed('default')) {
        //     return redirect()->route('assinatura.index');
        // }

        return $next($request);
    }
}
