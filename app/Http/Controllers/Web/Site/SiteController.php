<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use App\Models\Imovel;
use App\Models\Slide;
use App\Models\Tenant;
use App\Tenant\ManangerTenant;
use Carbon\Carbon;
use App\Support\Seo;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $tenant;
    protected $seo;

    public function __construct(ManangerTenant $tenant)
    {
        $this->tenant = $tenant->tenant();
        $this->seo = new Seo();
    }
    
    public function home()
    {
        $imoveisParaVenda = Imovel::orderBy('created_at', 'DESC')
                            ->venda()
                            ->where('tenant_id', $this->tenant->id)
                            ->available()
                            ->limit(24)
                            ->get(); 
                            
        $slides = Slide::orderBy('created_at', 'DESC')
                            ->available()
                            ->where('tenant_id', $this->tenant->id)
                            ->where('expira', '>=', Carbon::now())
                            ->get();

        $head = $this->seo->render($this->tenant->name ?? 'Super Imóveis',
        $this->tenant->descricao ?? 'Super Imóveis Sistema Imobiliário',
            route('web.home'),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.home',[
            'tenant' => $this->tenant,
            'imoveisParaVenda' => $imoveisParaVenda,
            'head' => $head,
            'slides' => $slides
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
                route('web.home') ?? 'https://informaticalivre.com/',
                $this->tenant->getMetaImg() ?? 'https://informaticalivre.com/media/metaimg.jpg'
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

        return view('web.sites.'.$this->tenant->template.'.imoveis.index',[
            'tenant' => $this->tenant,
            'imoveis' => $imoveis,
            'type' => $type
        ]);
    }
}
