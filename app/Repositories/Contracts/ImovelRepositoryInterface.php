<?php

namespace App\Repositories\Contracts;

interface ImovelRepositoryInterface
{
    public function getAllImoveis(int $per_page);
    public function getAllImoveisTenant(int $per_page, int $tenant);
    public function getImovelById(int $id);
}