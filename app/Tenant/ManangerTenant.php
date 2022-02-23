<?php

namespace App\Tenant;

use App\Models\Tenant;
use Illuminate\Support\Facades\Request;

class ManangerTenant
{
    // public function getUrlTenant()
    // {
    //     return Request::segment(1);
    // }

    // public function Tenant()
    // {
    //     $urlTenant = $this->getUrlTenant();
    //     $tenant = Tenant::where('slug', $urlTenant)->first();
    //     return $tenant;
    // }

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
}