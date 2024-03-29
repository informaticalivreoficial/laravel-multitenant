<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    //protected $table = 'plans'; 
    
    protected $fillable = [
        'name',
        'quantidade_fotos',
        'quantidade_imoveis',
        'content',
        'slug',
        'exibivalores',
        'status',
        'stripe_id',
        'avaliacao',        
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
        return $this->belongsToMany(Profile::class);
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    /**
     * Scopes
    */
    public function scopeAvailable($query)
    {
        return $query->where('status', 1);
    }

    public function scopeUnavailable($query)
    {
        return $query->where('status', 0);
    }
    
    public function profilesAvailable()
    {
        $profiles = Profile::whereNotIn('id', function($query){
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$this->id}");
        })->paginate();
        
        return $profiles;
    }

    /**
     * Accerssors and Mutators
    */
    public function setValorAttribute($value)
    {
        $this->attributes['valor'] = (!empty($value) ? floatval($this->convertStringToDouble($value)) : null);
    }

    public function getValorAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return number_format($value, 2, ',', '.');
    }

    private function convertStringToDouble($param)
    {
        if(empty($param)){
            return null;
        }
        return str_replace(',', '.', str_replace('.', '', $param));
    }
}
