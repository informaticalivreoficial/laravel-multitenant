<?php

namespace App\Providers;

use App\Models\{
    Imovel,
    NewsletterCat,
    Plan,
    Post,
    Tenant
};
use App\Observers\{
    PlanObserver,
    TenantObserver
};
use App\Tenant\ManangerTenant;
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
        //URL::forceScheme('https'); 
        Plan::observe(PlanObserver::class);
        Tenant::observe(TenantObserver::class);

        $identify = app(ManangerTenant::class)->identify();
 
        //Categorias de Imóveis
        $catImoveis = DB::table('imoveis')->selectRaw('DISTINCT tipo')->get();
        View()->share('categoriasMenu', $catImoveis);

        //Newsletter
        $newsletter = NewsletterCat::where('sistema', 1)
                        ->where('tenant_id', $identify)
                        ->where('status', 1)
                        ->get();
        View()->share('newsletterForm', $newsletter);

        //Lançamento
        $lancamento = Imovel::where('destaque', 1)
                        ->where('tenant_id', $identify)
                        ->where('status', 1)
                        ->get();
        View()->share('lancamentoMenu', $lancamento);
        //Páginas
        $paginas = Post::where('tipo', 'pagina')
                        ->where('tenant_id', $identify)
                        ->where('status', 1)
                        ->get();
        View()->share('paginaMenu', $paginas);

        Schema::defaultStringLength(191);
        Blade::aliasComponent('admin.components.message', 'message');

        Paginator::useBootstrap();
    }
}
