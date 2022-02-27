<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use App\Models\CatPost;
use App\Models\Imovel;
use App\Models\Post;
use App\Models\Slide;
use App\Tenant\ManangerTenant;
use Carbon\Carbon;
use App\Support\Seo;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $tenant;
    protected $seo;
    protected $filter;

    public function __construct(ManangerTenant $tenant, FilterController $filter)
    {
        $this->tenant = $tenant->tenant();
        $this->seo = new Seo();
        $this->filter = $filter;
    }
    
    public function home()
    {
        $imoveisParaVenda = Imovel::orderBy('created_at', 'DESC')
                            ->venda()
                            ->where('tenant_id', $this->tenant->id)
                            ->available()
                            ->limit(24)
                            ->get();

        $imoveisParaLocacao = Imovel::orderBy('created_at', 'DESC')
                            ->locacao()
                            ->where('tenant_id', $this->tenant->id)
                            ->available()
                            ->limit(24)
                            ->get(); 
                            
        $slides = Slide::orderBy('created_at', 'DESC')
                            ->available()
                            ->where('tenant_id', $this->tenant->id)
                            ->where('expira', '>=', Carbon::now())
                            ->get();

        $destaque = Imovel::where('destaque', 1)->available()->first();

        $artigos = Post::orderBy('created_at', 'DESC')
                            ->where('tipo', 'artigo')
                            ->where('tenant_id', $this->tenant->id)
                            ->postson()
                            ->limit(6)
                            ->get();
        
        $head = $this->seo->render($this->tenant->name ?? 'Super Imóveis',
            $this->tenant->descricao ?? 'Super Imóveis Sistema Imobiliário',
            route('web.home'),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.home',[
            'tenant' => $this->tenant,
            'imoveisParaVenda' => $imoveisParaVenda,
            'imoveisParaLocacao' => $imoveisParaLocacao,
            'destaque' => $destaque,
            'artigos' => $artigos,
            'head' => $head,
            'slides' => $slides
        ]);
    }

    public function politica()
    {
        $head = $this->seo->render('Política de Privacidade - ' . $this->tenant->name ?? 'Super Imóveis',
            'Política de Privacidade - ' . $this->tenant->name,
            route('web.politica'),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.politica',[
            'tenant' => $this->tenant,
            'head' => $head
        ]);
    }

    public function financiamento()
    {
        $head = $this->seo->render('Simulador de Financiamento de Imóvel - ' . $this->tenant->name ?? 'Super Imóveis',
            'Simule aqui os valores do financiamento para lhe auxiliar na decisão de comprar o imóvel dos seus sonhos.',
            route('web.financiamento'),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.financiamento',[
            'tenant' => $this->tenant,
            'head' => $head
        ]);
    }

    public function atendimento()
    {
        $head = $this->seo->render('Atendimento - '.$this->tenant->name ?? 'Super Imóveis',
        'Atendimento ao cliente - '.$this->tenant->name ?? 'Super Imóveis Sistema Imobiliário',
            route('web.atendimento'),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.atendimento.fale',[
            'tenant' => $this->tenant,
            'head' => $head
        ]);
    }

    public function buyProperty($slug)
    {
        $imovel = Imovel::where('slug', $slug)->available()->venda()->first();
        $imoveis = Imovel::where('id', '!=', $imovel->id)->available()->venda()->limit(4)->get();

        if(!empty($imovel)){
            $imovel->views = $imovel->views + 1;
            $imovel->save();

            $head = $this->seo->render($imovel->titulo ?? 'Informática Livre',
                $imovel->headline ?? $imovel->titulo,
                route('web.buyProperty', ['slug' => $imovel->slug]),
                $imovel->cover() ?? $this->tenant->getMetaImg()
            );

            return view('web.sites.'.$this->tenant->template.'.imoveis.imovel', [
                'tenant' => $this->tenant,
                'head' => $head,
                'imovel' => $imovel,
                'imoveis' => $imoveis,
                'type' => 'venda',
            ]);
        }else{
            $head = $this->seo->render($this->tenant->name ?? 'Informática Livre',
                'Imóvel não encontrado!',
                route('web.home') ?? 'https://superimoveis.info/',
                $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
            );
            return view('web.sites.'.$this->tenant->template.'.imoveis.imovel', [
                'tenant' => $this->tenant,
                'head' => $head,
                'imovel' => false,
                'type' => 'venda',
            ]);
        }
        
    }

    public function imoveisList($type)
    {
        if($type == 'venda'){
            $imoveis = Imovel::orderBy('created_at', 'DESC')->available()->venda()->paginate(15);
        }else{
            $imoveis = Imovel::orderBy('created_at', 'DESC')->available()->locacao()->paginate(15);
        }        

        $head = $this->seo->render('Notícias' ?? 'Super Imóveis Sistema Imobiliário',
            'Confira as notícias sobre o mercado imobiliário e atualidades',
            route('web.noticias'),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.imoveis.index',[
            'tenant' => $this->tenant,
            'imoveis' => $imoveis,
            'type' => $type
        ]);
    }

    public function imoveisCategoria($categoria)
    {
        $imoveis = Imovel::orderBy('created_at', 'DESC')->where('tipo', $categoria)->available()->venda()->paginate(15);       

        return view('web.sites.'.$this->tenant->template.'.imoveis.categoria',[
            'tenant' => $this->tenant,
            'imoveis' => $imoveis,
            'categoria' => $categoria
        ]);
    }

    public function filter()
    {
        $head = $this->seo->render('Pesquisa de imóveis - ' . $this->tenant->name ?? 'Super Imóveis Sistema Imobiliário',
            $this->tenant->descricao ?? 'Informática Livre desenvolvimento de sistemas web desde 2005',
            route('web.filter'),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        $filter = $this->filter;
        $itemImoveis = $filter->createQuery('id');

        foreach ($itemImoveis as $imovel) {
            $imoveis[] = $imovel->id;
        }

        if (!empty($imoveis)) {
            $imoveis = Imovel::orderBy('created_at', 'DESC')
                                ->where('tenant_id', $this->tenant->id)
                                ->whereIn('id', $imoveis)
                                ->available()
                                ->paginate(18);
        } else {
            $imoveis = Imovel::orderBy('created_at', 'DESC')
                                ->where('tenant_id', $this->tenant->id)
                                ->available()
                                ->paginate(18);
        }

        return view('web.sites.'.$this->tenant->template.'.imoveis.filtro', [
            'tenant' => $this->tenant,
            'head' => $head,
            'imoveis' => $imoveis,
        ]);
    }

    public function categoria(Request $request)
    {
        $categoria = CatPost::where('slug', $request->slug)
                            ->where('tenant_id', $this->tenant->id)
                            ->available()
                            ->first();

        $posts = Post::orderBy('created_at', 'DESC')
                            ->where('tenant_id', $this->tenant->id)
                            ->where('categoria', $categoria->id)
                            ->postson()
                            ->paginate(18);
        
        $head = $this->seo->render($categoria->titulo ?? 'Super Imóveis Sistema Imobiliário',
            $this->tenant->name . '-' . $categoria->content,
            route(($categoria->tipo == 'artigo' ? 'web.blog.categoria' : 'web.noticia.categoria'), ['slug' => $request->slug]),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.blog.categoria', [
            'tenant' => $this->tenant,
            'head' => $head,
            'posts' => $posts,
            'categoria' => $categoria,
        ]);
    }

    public function artigos()
    {
        $posts = Post::orderBy('created_at', 'DESC')
                        ->where('tipo', '=', 'artigo')
                        ->where('tenant_id', $this->tenant->id)
                        ->postson()
                        ->paginate(18);

        $type = 'artigo';

        $head = $this->seo->render('Blog - Artigos' ?? 'Super Imóveis Sistema Imobiliário',
            'Confira nossos artigos sobre o mercado imobiliário e atualidades',
            route('web.blog.artigos'),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.blog.artigos', [
            'tenant' => $this->tenant,
            'type' => $type,
            'head' => $head,
            'posts' => $posts,
        ]);
    }

    public function noticias()
    {
        $posts = Post::orderBy('created_at', 'DESC')
                        ->where('tipo', '=', 'noticia')
                        ->where('tenant_id', $this->tenant->id)
                        ->postson()
                        ->paginate(18);

        $type = 'noticia';

        $head = $this->seo->render('Notícias' ?? 'Super Imóveis Sistema Imobiliário',
            'Confira as notícias sobre o mercado imobiliário e atualidades',
            route('web.noticias'),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.blog.artigos', [
            'tenant' => $this->tenant,
            'type' => $type,
            'head' => $head,
            'posts' => $posts,
        ]);
    }

    public function artigo(Request $request)
    {
        $post = Post::where('slug', $request->slug)
                            ->where('tipo', 'artigo')
                            ->where('tenant_id', $this->tenant->id)
                            ->postson()
                            ->first();

        $postsTags = Post::where('tipo', 'artigo')
                            ->where('id', '!=', $post->id)
                            ->where('tenant_id', $this->tenant->id)
                            ->postson()
                            ->limit(3)
                            ->get();

        $categorias = CatPost::orderBy('titulo', 'ASC')
            ->where('tipo', 'artigo')
            ->where('tenant_id', $this->tenant->id)
            ->get();

        $postsMais = Post::orderBy('views', 'DESC')
                            ->where('tenant_id', $this->tenant->id)
                            ->where('id', '!=', $post->id)
                            ->where('tipo', 'artigo')
                            ->limit(3)
                            ->postson()
                            ->get();
        
        $post->views = $post->views + 1;
        $post->save();

        $head = $this->seo->render($post->titulo ?? 'Super Imóveis Sistema Imobiliário',
            'Blog - ' . $post->titulo,
            route('web.blog.artigo', ['slug' => $post->slug]),
            $post->cover() ?? $this->tenant->getMetaImg()
        );

        return view('web.sites.'.$this->tenant->template.'.blog.artigo', [
            'tenant' => $this->tenant,
            'head' => $head,
            'post' => $post,
            'postsMais' => $postsMais,
            'categorias' => $categorias,
            'postsTags' => $postsTags,
        ]);
    }

    public function noticia(Request $request)
    {
        $post = Post::where('slug', $request->slug)
                            ->where('tenant_id', $this->tenant->id)
                            ->where('tipo', 'noticia')
                            ->postson()
                            ->first();

        $postsTags = Post::where('tipo', 'noticia')
                            ->where('id', '!=', $post->id)
                            ->where('tenant_id', $this->tenant->id)
                            ->postson()
                            ->limit(3)
                            ->get();

        $categorias = CatPost::orderBy('titulo', 'ASC')
            ->where('tipo', 'noticia')
            ->where('tenant_id', $this->tenant->id)
            ->get();

        $postsMais = Post::orderBy('views', 'DESC')
                            ->where('id', '!=', $post->id)
                            ->where('tenant_id', $this->tenant->id)
                            ->where('tipo', 'noticia')
                            ->limit(3)
                            ->postson()
                            ->get();
        
        $post->views = $post->views + 1;
        $post->save();

        $head = $this->seo->render($post->titulo ?? 'Super Imóveis Sistema Imobiliário',
            'Notícia - ' . $post->titulo,
            route('web.noticia', ['slug' => $post->slug]),
            $post->cover() ?? $this->tenant->getMetaImg()
        );

        return view('web.sites.'.$this->tenant->template.'.blog.artigo', [
            'tenant' => $this->tenant,
            'head' => $head,
            'post' => $post,
            'postsMais' => $postsMais,
            'categorias' => $categorias,
            'postsTags' => $postsTags,
        ]);
    }
}
