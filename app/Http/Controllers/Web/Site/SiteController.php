<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home($tenantSlug)
    {
        $tenant = Tenant::where('slug', $tenantSlug)->first();
        return view('web.sites.'.$tenant->template.'.home',[
            'tenant' => $tenant,
        ]);
    }

    public function atendimento($tenantSlug)
    {
        $tenant = Tenant::where('slug', $tenantSlug)->first();
        return view('web.sites.'.$tenant->template.'.atendimento.fale',[
            'tenant' => $tenant,
        ]);
    }
}
