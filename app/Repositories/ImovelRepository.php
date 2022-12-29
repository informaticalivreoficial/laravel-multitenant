<?php

namespace App\Repositories;

use App\Models\Imovel;
use App\Repositories\Contracts\ImovelRepositoryInterface;
use App\Tenant\ManangerTenant;

class ImovelRepository implements ImovelRepositoryInterface
{
    protected $entity;

    public function __construct(Imovel $imovel)
    {
        $this->entity = $imovel;
    }

    public function getAllImoveis($per_page)
    {
        $tenant = app(ManangerTenant::class)->getTenantIdentify();
        return $this->entity->orderBy('created_at', 'DESC')
                            ->orderBy('status', 'ASC')
                            ->where('tenant_id', $tenant)
                            ->paginate($per_page);
    }

    public function getAllImoveisTenant($per_page, $tenant)
    {
        return $this->entity->orderBy('created_at', 'DESC')
                            ->orderBy('status', 'ASC')
                            ->where('tenant_id', $tenant)
                            ->paginate($per_page);
    }

    public function getImovelById(int $id)
    {
        return $this->entity->where('id', $id)->first();
    }
}