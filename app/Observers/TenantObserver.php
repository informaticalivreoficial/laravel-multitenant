<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Tenant;

class TenantObserver
{
    /**
     * Handle the Tenant "creating" event.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return void
     */
    public function creating(Tenant $tenant)
    {
        $tenant->uuid = (string) Str::uuid();
        $tenant->slug = (string) Str::slug($tenant->name);
    }

    public function updating(Tenant $tenant)
    {
        $tenant->slug = (string) Str::slug($tenant->name);
    }
}
