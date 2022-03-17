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
        Plan::observe(PlanObserver::class);
        Tenant::observe(TenantObserver::class);

        //Categorias de Imóveis
        $catImoveis = DB::table('imoveis')->selectRaw('DISTINCT tipo')->get();
        View()->share('categoriasMenu', $catImoveis);

        //Newsletter
        $newsletter = DB::table('newsletter_cat')
                        ->where('sistema', 1)
                        ->where('status', 1)
                        ->get();
        View()->share('newsletterForm', $newsletter);

        Schema::defaultStringLength(191);
        Blade::aliasComponent('admin.components.message', 'message');

        Paginator::useBootstrap();
    }
}
