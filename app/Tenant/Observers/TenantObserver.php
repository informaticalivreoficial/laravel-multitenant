<?php

namespace App\Tenant\Observers;

use App\Tenant\ManangerTenant;
use Illuminate\Database\Eloquent\Model;

class TenantObserver
{
    public function creating(Model $model)
    {
        if(app()->runningInConsole()){
            return;
        }
        $tenant = app(ManangerTenant::class)->getTenantIdentify();
        $model->setAttribute('tenant_id', $tenant);
    }
}