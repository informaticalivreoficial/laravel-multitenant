<?php

namespace App\Tenant;

use App\Models\Tenant;

class ManangerTenant
{
    public function getTenantIdentify()
    {
        return $this->getTenant()->id;
    }

    public function getTenant(): Tenant
    {        
        session()->put('tenant', auth()->user()->tenant);
        
        return auth()->user()->tenant;
    } 
}