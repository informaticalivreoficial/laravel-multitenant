<?php

namespace App\Services;

use App\Repositories\Contracts\ImovelRepositoryInterface;

class ImovelService
{
    private $repository;

    public function __construct(ImovelRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllImoveisCount(int $tenant)
    {
        return $this->repository->getImoveisCount($tenant);
    }

    public function getAllImoveis(int $per_page)
    {
        return $this->repository->getAllImoveis($per_page);
    }

    public function getAllImoveisTenant(int $per_page, int $tenant)
    {
        return $this->repository->getAllImoveisTenant($per_page, $tenant);
    }

    public function getImovelDestaqueByTenant(int $tenant)
    {
        return $this->repository->getImovelDestaque($tenant);
    }

    public function getImovelById(int $id)
    {
        return $this->repository->getImovelById($id);
    }
}