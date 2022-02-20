<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;
use App\Models\{
    CatPost,
    Empresa,
    Orcamento,
    User,
    Post,
    Produto
};

class AdminController extends Controller
{
    

    public function home()
    {
        //Users
        $time = User::where('admin', 1)->orWhere('editor', 1)->count();
        $usersAvailable = User::where('client', 1)->available()->count();
        $usersUnavailable = User::where('client', 1)->unavailable()->count();
        //Artigos
        $postsArtigos = CatPost::where('tipo', 'artigo')->count();
        $postsPaginas = CatPost::where('tipo', 'pagina')->count();
        $artigosTop = Post::where('tipo', 'artigo')
                ->limit(4)
                ->postson()
                ->get()
                ->sortByDesc('views');
        $totalViewsArtigos = Post::selectRaw('SUM(views) AS VIEWS')
                ->where('tipo', 'artigo')
                ->postson()
                ->first();
        $paginasTop = Post::where('tipo', 'pagina')
                ->limit(4)
                ->postson()
                ->get()
                ->sortByDesc('views');
        $totalViewsPaginas = Post::selectRaw('SUM(views) AS VIEWS')
                ->where('tipo', 'pagina')
                ->postson()
                ->first();           
        //Orçamentos
        //$orcamentosPendentes = Orcamento::available()->count();   
        //$orcamentosConcluidos = Orcamento::unavailable()->count();   
        //Produtos
        //$produtosAvailable = Produto::available()->count();
        //$produtosUnavailable = Produto::unavailable()->count();
        //$produtosTotal = Produto::all()->count();
        //Empresas
        //$empresasAvailable = Empresa::available()->count();
        //$empresasUnavailable = Empresa::unavailable()->count();
        //$empresasTotal = Empresa::all()->count();
        //Pedidos
        // $pedidosApproved = Pedido::approved()->count();
        // $pedidosInprocess = Pedido::inprocess()->count();
        // $pedidosRejected = Pedido::rejected()->count();

        //Analitcs
        $visitasHoje = Analytics::fetchMostVisitedPages(Period::days(1));
        $visitas365 = Analytics::fetchTotalVisitorsAndPageViews(Period::months(5));
        $top_browser = Analytics::fetchTopBrowsers(Period::months(5));

        $analyticsData = Analytics::performQuery(
            Period::months(5),
               'ga:sessions',
               [
                   'metrics' => 'ga:sessions, ga:visitors, ga:pageviews',
                   'dimensions' => 'ga:yearMonth'
               ]
         );     
         
        return view('admin.dashboard',[
            'time' => $time,
            'usersAvailable' => $usersAvailable,
            'usersUnavailable' => $usersUnavailable,
            //Artigos
            'postsArtigos' => $postsArtigos,
            'postsPaginas' => $postsPaginas,
            'artigosTop' => $artigosTop,
            'artigostotalviews' => $totalViewsArtigos->VIEWS,
            'paginasTop' => $paginasTop,
            'paginastotalviews' => $totalViewsPaginas->VIEWS,            
            //Orçamentos
            //'orcamentosPendentes' => $orcamentosPendentes,
            //'orcamentosConcluidos' => $orcamentosConcluidos,
            //Produtos
            //'produtosAvailable' => $produtosAvailable,
            //'produtosUnavailable' => $produtosUnavailable,
            //'produtosTotal' => $produtosTotal,
            //Empresas
            //'empresasAvailable' => $empresasAvailable,
            //'empresasUnavailable' => $empresasUnavailable,
            //'empresasTotal' => $empresasTotal,
            //Pedidos
            // 'pedidosApproved' => $pedidosApproved,
            // 'pedidosInprocess' => $pedidosInprocess,
            // 'pedidosRejected' => $pedidosRejected,
            //Analytics
            'visitasHoje' => $visitasHoje,
            //'visitas365' => $visitas365,
            'analyticsData' => $analyticsData,
            'top_browser' => $top_browser
        ]);
    }
}
