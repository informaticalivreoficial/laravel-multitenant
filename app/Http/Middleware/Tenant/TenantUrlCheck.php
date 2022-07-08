<?php

namespace App\Http\Middleware\Tenant;

use App\Tenant\ManangerTenant;
use Closure;
use Illuminate\Http\Request;

class TenantUrlCheck
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
        $company = app(ManangerTenant::class); 
        $tenant = $company->tenant();
        //dd($tenant);
        if(!$tenant && $request->url() != route('404.error')){
            return redirect()->route('404.error');
        }
            
        return $next($request);
    }
   
}
