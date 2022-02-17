<?php

namespace App\Repositories;

use App\Models\Imovel;
use App\Repositories\Contracts\ImovelRepositoryInterface;

class ImovelRepository implements ImovelRepositoryInterface
{
    protected $entity;

    public function __construct(Imovel $imovel)
    {
        $this->entity = $imovel;
    }

    public function getAllImoveis($per_page)
    {
        return $this->entity->paginate($per_page);
    }

    public function getImovelById(string $id)
    {
        return $this->entity
                        ->where('id', $id)
                        ->first();
    }
}