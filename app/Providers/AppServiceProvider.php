<?php

namespace App\Providers;

use App\Models\{
    Imovel,
    Plan,
    Tenant
};
use App\Observers\{
    PlanObserver,
    TenantObserver
};

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        URL::forceScheme('https');

        Plan::observe(PlanObserver::class);
        Tenant::observe(TenantObserver::class);

        $catImoveis = DB::table('imoveis')->selectRaw('DISTINCT tipo')->get();
        View()->share('categoriasMenu', $catImoveis);

        Schema::defaultStringLength(191);
        Blade::aliasComponent('admin.components.message', 'message');

        Paginator::useBootstrap();
    }
}
