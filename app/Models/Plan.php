<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'plans';

    protected $fillable = [
        'name',
        'content',
        'slug',
        'exibivalores',        
        'valor',
        'valor_mensal',
        'valor_trimestral',
        'valor_semestral',
        'valor_anual',
        'valor_bianual'
    ];

    /**
     * Relacionamentos
    */
    public function profiles()
    {
        $this->belongsToMany(Profile::class);
    }

    /**
     * Scopes
    */
    public function profilesAvailable()
    {
        $profiles = Profile::whereNotIn('id', function($query){
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$this->id}");
        })->paginate();
        
        return $profiles;
    }
}
