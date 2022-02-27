<?php

namespace App\Http\Middleware\Tenant;

use App\Tenant\ManangerTenant;
use Closure;
use Illuminate\Http\Request;

class TenantAnalyticsId
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
        /** 
         * Pega os dados do Tenant referente ao analytics 
         * e joga na config do pacote spatie, caso seja null
         * recupera o valor padrão do Informática Livre
         * */
        $company = app(ManangerTenant::class); 
        $tenant = $company->tenant();

        config(['analytics.view_id' => ($tenant->analytics_view ?? '253901480')]);

        return $next($request);
    }
}
