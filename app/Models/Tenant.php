<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tenant extends Model
{
    use HasFactory;

    protected $table = 'tenants'; 

    protected $fillable = [
        'name',     
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid = Str::uuid();
        });
    }

    /**
     * Relacionamentos
    */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
