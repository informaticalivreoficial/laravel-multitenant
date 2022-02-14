<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'content',
        'status'
    ];

    /**
     * Relacionamentos
    */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function plans()
    {
        $this->belongsToMany(Plan::class);
    }

    /**
     * Scopes
    */
    public function permissionsAvailable()
    {
        $permissions = Permission::whereNotIn('id', function($query){
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        })->paginate();
        
        return $permissions;
    }
}
