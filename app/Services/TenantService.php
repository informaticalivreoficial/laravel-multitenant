<?php

namespace App\Services;

use App\Models\Plan;
use App\Repositories\Contracts\TenantRepositoryInterface;
use Illuminate\Support\Str;

class TenantService
{
    private $plan, $data = [];
    private $repository;

    public function __construct(TenantRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllTenants(int $per_page)
    {
        return $this->repository->getAllTenants($per_page);
    }

    public function getTenantBySlug(string $tenantSlug)
    {
        return $this->repository->getTenantBySlug($tenantSlug);
    }

    public function getTenantByUuid(string $uuid)
    {
        return $this->repository->getTenantByUuid($uuid);
    }

    public function make(Plan $plan, array $data)
    {
        $this->plan = $plan;
        $this->data = $data;

        $tenant = $this->storeTenant();

        $user = $this->storeUserTenant($tenant);

        return $user;
    }

    public function storeTenant()
    {
        return $this->plan->tenants()->create([
            'name' => $this->data['empresa'],
            'ano_de_inicio' => now()->year,
            'slug' => Str::slug($this->data['empresa']),
            'subdominio' => Str::slug($this->data['empresa']),
            'email' => $this->data['email'],
            'status' => true,
            'subscription' => now(),
            'rss_data' => now(),
            'sitemap_data' => now(),
            'expires_at' => now()->addDays(30),
        ]);
    }

    public function storeUserTenant($tenant)
    {
        $user = $tenant->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'status' => true,
            'estado_civil' => 'solteiro',
            'superadmin' => 1,
            'client' => 1,
            'password' => bcrypt($this->data['password']),
            'senha' => $this->data['password'],
            'remember_token' => Str::random(20),
        ]);

        return $user;
    }

    public function storeUser($tenant)
    {
        $user = $tenant->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password']),
            'senha' => $this->data['password'],
            'remember_token' => Str::random(20),
        ]);

        return $user;
    }
   
}