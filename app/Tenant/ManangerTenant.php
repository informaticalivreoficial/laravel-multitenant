<?php

namespace App\Tenant;

use App\Models\Tenant;

class ManangerTenant
{
    // public function subdomain()
    // {
    //     //subdominio.superimoveis.info
    //     $pieces = explode('.', request()->getHost());
    //     return $pieces[0];
    // }

    public function domain()
    {
        //superimoveis.info
        return $pieces = request()->getHost();       
    }

    public function tenant()
    {
        // $subdominio = $this->subdomain();
        // $tenant = Tenant::where('subdominio', $subdominio)->first();
        $dominio = $this->domain();
        $tenant = Tenant::where('dominio', $dominio)->first();
        return $tenant;
    }

    public function identify()
    {
        $tenant = $this->tenant();
        return $tenant->id ?? 1;
    }

    public function getTenantIdentify()
    {
        return auth()->check() ? auth()->user()->tenant_id : '';
    }

    public function getTenant()
    {
        return auth()->check() ? auth()->user()->tenant : '';
    }

    public function isAdmin(): bool
    {
        return in_array(auth()->user()->email, config('acl.admins'));
    }

    public function isDomainMain(): bool
    {
        return in_array($this->tenant()->dominio, config('acl.domainMain'));
    }
}