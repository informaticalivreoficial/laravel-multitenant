<?php

namespace App\Tenant\Scopes;

use App\Tenant\ManangerTenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $identify = app(ManangerTenant::class)->getTenantIdentify();

        if ($identify)
            $builder->where('tenant_id', $identify);
    }

    public function applyy(Builder $builder, Model $model)
    {
        $identify = app(ManangerTenant::class)->identify();

        if ($identify)
            $builder->where('tenant_id', $identify);
    }
}