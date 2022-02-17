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

    public function getAllImoveis(int $per_page)
    {
        return $this->repository->getAllImoveis($per_page);
    }
}