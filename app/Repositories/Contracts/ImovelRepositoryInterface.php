<?php

namespace App\Repositories\Contracts;

interface ImovelRepositoryInterface
{
    public function getAllImoveis(int $per_page);
    public function getImovelById(string $id);
}