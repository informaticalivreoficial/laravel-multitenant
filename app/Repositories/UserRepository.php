<?php

namespace App\Repositories;

use App\Models\User;
use App\Tenant\ManangerTenant;

class UserRepository
{
    protected $entity;

    public function __construct(User $user)
    {
        $this->entity = $user;
    }

    public function getUsersAll()
    {
        $tenant = app(ManangerTenant::class)->getTenantIdentify();
        return $this->entity
                    ->orderBy('created_at', 'DESC')
                    ->orderBy('status', 'ASC')
                    ->where('client', 1)
                    ->where('admin', 0)
                    ->where('editor', 0)
                    ->where('superadmin', 0)
                    ->where('tenant_id', $tenant)
                    ->paginate(25);
    }

    public function getClientesAll()
    {
        $tenant = app(ManangerTenant::class)->getTenantIdentify();
        return $this->entity
                    ->orderBy('created_at', 'DESC')
                    ->orderBy('status', 'ASC')
                    ->where('client', 1)
                    ->where('tenant_id', $tenant)
                    ->paginate(25);
    }

    public function getUser(int $id)
    {
        $tenant = app(ManangerTenant::class)->getTenantIdentify();
        return $this->entity->where('id', $id)->where('tenant_id', $tenant)->first();
    }

    public function getUsersTeam()
    {
        $tenant = app(ManangerTenant::class)->getTenantIdentify();
        return $this->entity      
                    ->orderBy('created_at', 'DESC')
                    ->orderBy('status', 'ASC')
                    ->where('admin', 1)              
                    ->where('tenant_id', $tenant)
                    ->paginate(12);
    }

    public function userSetStatus($data)
    {        
        $user = $this->entity->find($data['id']);
        $user->status = $data['status'];
        $user->save();        
    }
}