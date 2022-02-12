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
        return auth()->user()->tenant;
    }    
}