<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuracoes;
use App\Models\Imovel;
use App\Models\Portal;
use App\Models\PortalImoveis;
use App\Tenant\ManangerTenant;

class PortalfeedController extends Controller
{
    protected $tenant;

    public function __construct(ManangerTenant $tenant)
    {
        $this->tenant = $tenant->tenant();
    }

    // FEED IMÓVEL WEB
    public function imovelweb()
    {
        //chama as configuracoes do site
        $portal = Portal::where('id', '1')->first();
        $pimoveis = PortalImoveis::where('portal', $portal->id)->get();
        $imoveis = Imovel::orderBy('created_at', 'DESC')->available()->get();

        return response()->view('web.integracoes.imovelweb', [
            'imoveis' => $imoveis,
            'pimoveis' => $pimoveis,
            'portal' => $portal,
            'Configuracoes' => $Configuracoes
        ])->header('Content-Type', 'application/xml');
    }

    // FEED VIVA REAL
    public function vivareal()
    {
        //chama as configuracoes do site
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $portal = Portal::where('id', '3')->first();
        $pimoveis = PortalImoveis::where('portal', $portal->id)->get();
        $imoveis = Imovel::orderBy('created_at', 'DESC')->available()->get();

        return response()->view('web.integracoes.vivareal', [
            'imoveis' => $imoveis,
            'pimoveis' => $pimoveis,
            'portal' => $portal,
            'Configuracoes' => $Configuracoes
        ])->header('Content-Type', 'application/xml');
    }

    // FEED DREAM CASA
    public function dreamcasa()
    {
        //chama as configuracoes do site
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $portal = Portal::where('id', '4')->first();
        $pimoveis = PortalImoveis::where('portal', $portal->id)->get();
        $imoveis = Imovel::orderBy('created_at', 'DESC')->available()->get();

        return response()->view('web.integracoes.dreamcasa', [
            'imoveis' => $imoveis,
            'pimoveis' => $pimoveis,
            'portal' => $portal,
            'Configuracoes' => $Configuracoes
        ])->header('Content-Type', 'application/xml');
    }

    // FEED IMÓVEIS NET
    public function imoveisnet()
    {
        //chama as configuracoes do site
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $portal = Portal::where('id', '5')->first();
        $pimoveis = PortalImoveis::where('portal', $portal->id)->get();
        $imoveis = Imovel::orderBy('created_at', 'DESC')->available()->get();

        return response()->view('web.integracoes.imoveisnet', [
            'imoveis' => $imoveis,
            'pimoveis' => $pimoveis,
            'portal' => $portal,
            'Configuracoes' => $Configuracoes
        ])->header('Content-Type', 'application/xml');
    }

    //FEED PORTAL DO ABC
    public function portaldoabc()
    {
        //chama as configuracoes do site
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $portal = Portal::where('id', '7')->available()->first();
        $pimoveis = PortalImoveis::where('portal', $portal->id)->get();
        $imoveis = Imovel::orderBy('created_at', 'DESC')->available()->get();

        return response()->view('web.integracoes.portaldoabc', [
            'imoveis' => $imoveis,
            'pimoveis' => $pimoveis,
            'portal' => $portal,
            'Configuracoes' => $Configuracoes
        ])->header('Content-Type', 'application/xml');
    }

    //FEED ZIP ANUNCIOS
    public function zipanuncios()
    {
        //chama as configuracoes do site
        $Configuracoes = Configuracoes::where('id', '1')->first();
        $portal = Portal::where('id', '6')->first();
        $pimoveis = PortalImoveis::where('portal', $portal->id)->get();
        $imoveis = Imovel::orderBy('created_at', 'DESC')->available()->get();

        return response()->view('web.integracoes.zipanuncios', [
            'imoveis' => $imoveis,
            'pimoveis' => $pimoveis,
            'portal' => $portal,
            'Configuracoes' => $Configuracoes
        ])->header('Content-Type', 'application/xml');
    }

    //FEED PORTAL NUROA
    public function portalnuroa()
    {
        //chama as configuracoes do site
        $portal = Portal::where('id', '8')->first();
        $pimoveis = PortalImoveis::where('portal', $portal->id)->get();

        $im = [];
        foreach($pimoveis as $p){
            $imoveis = Imovel::orderBy('created_at', 'DESC')->where('id', $p->imovel)->available()->get();
            $im = $imoveis;                     
        }
        return response()->view('web.sites.'.$this->tenant->template.'.integracoes.portalnuroa', [
            'imoveis' => $im,
            'pimoveis' => $pimoveis,
            'portal' => $portal,
            'Configuracoes' => $this->tenant
        ])->header('Content-Type', 'application/xml');
    }
}
