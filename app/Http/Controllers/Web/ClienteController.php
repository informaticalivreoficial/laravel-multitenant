<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Tenant\ManangerTenant;
use App\Support\Seo;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends Controller
{
    protected $tenant;
    protected $seo;

    public function __construct(ManangerTenant $tenant)
    {
        $this->tenant = $tenant->tenant();
        $this->seo = new Seo();
    }

    public function planos()
    {
        $planos = Plan::orderBy('valor', 'ASC')->limit(3)->available()->get();
        return view('web.sites.'.$this->tenant->template.'.cliente.planos',[
            'tenant' => $this->tenant,
            'planos' => $planos
        ]);
    }

    // public function plano($slug)
    // {
    //     $plano = Plan::where('slug', $slug)->first();
    //     return view('web.cliente.plano',[
    //         'plano' => $plano
    //     ]);
    // }

    public function assinar($slug)
    {
        if (!$plan = Plan::where('slug', $slug)->available()->first()) {
            return redirect()->back();
        }

        session()->put('plan', $plan);

        return redirect()->route('register');        
    }
}
