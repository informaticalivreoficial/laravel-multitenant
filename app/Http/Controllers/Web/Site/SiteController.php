<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use App\Models\Imovel;
use App\Models\Tenant;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home($tenantSlug)
    {
        $tenant = Tenant::where('slug', $tenantSlug)->first();
        $imoveisParaVenda = Imovel::orderBy('created_at', 'DESC')
                            ->venda()
                            ->where('tenant_id', $tenant->id)
                            ->available()
                            ->limit(24)
                            ->get(); 

        $head = $this->seo->render($tenant->name ?? 'Super Imóveis',
        $tenant->descricao ?? 'Super Imóveis Sistema Imobiliário',
            route('web.home',$tenant->slug),
            $tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$tenant->template.'.home',[
            'tenant' => $tenant,
            'imoveisParaVenda' => $imoveisParaVenda,
            'head' => $head
        ]);
    }

    public function atendimento($tenantSlug)
    {
        $tenant = Tenant::where('slug', $tenantSlug)->first();

        $head = $this->seo->render('Atendimento - '.$tenant->name ?? 'Super Imóveis',
        'Atendimento ao cliente - '.$tenant->name ?? 'Super Imóveis Sistema Imobiliário',
            route('web.atendimento',$tenant->slug),
            $tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$tenant->template.'.atendimento.fale',[
            'tenant' => $tenant,
            'head' => $head
        ]);
    }
}
