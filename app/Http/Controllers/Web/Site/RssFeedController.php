<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use App\Models\{
    Imovel,
    Post
};
use App\Tenant\ManangerTenant;

class RssFeedController extends Controller
{

    protected $tenant;

    public function __construct(ManangerTenant $tenant)
    {
        $this->tenant = $tenant->tenant();
    }

    public function feed()
    {
        $posts = Post::orderBy('created_at', 'DESC')
                        ->where('tenant_id', $this->tenant->id)
                        ->where('tipo', 'artigo')
                        ->postson()
                        ->limit(10)
                        ->get();
        $paginas = Post::orderBy('created_at', 'DESC')
                        ->where('tenant_id', $this->tenant->id)
                        ->where('tipo', 'pagina')
                        ->postson()
                        ->limit(10)
                        ->get();
        $noticias = Post::orderBy('created_at', 'DESC')
                        ->where('tenant_id', $this->tenant->id)
                        ->where('tipo', 'noticia')
                        ->postson()
                        ->limit(10)
                        ->get();
        $imoveis = Imovel::orderBy('created_at', 'DESC')
                        ->where('tenant_id', $this->tenant->id)
                        ->available()
                        ->limit(50)
                        ->get();

        return response()->view('web.sites.'.$this->tenant->template.'.feed', [
            'tenant' => $this->tenant,
            'posts' => $posts,
            'paginas' => $paginas,
            'noticias' => $noticias,
            'imoveis' => $imoveis
        ])->header('Content-Type', 'application/xml');
        
    }
}
