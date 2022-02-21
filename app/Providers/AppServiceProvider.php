<?php

namespace App\Providers;

use App\Models\{
    Imovel,
    Plan,
    Tenant
};
use App\Observers\{
    ImovelObserver,
    PlanObserver,
    TenantObserver
};

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Imovel::observe(ImovelObserver::class);
        Plan::observe(PlanObserver::class);
        Tenant::observe(TenantObserver::class);

        Schema::defaultStringLength(191);
        Blade::aliasComponent('admin.components.message', 'message');

        Paginator::useBootstrap();
    }
}
