<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\TenantTrait;

class PortalImoveis extends Model
{
    use HasFactory, TenantTrait;

    protected $table = 'portais_imoveis';

    protected $fillable = [
        'portal',
        'imovel'
    ];

    /**
     * Relacionamentos
     */
    public function portal()
    {
        return $this->belongsTo(Portal::class, 'portal', 'id');
    }

    public function imovel()
    {
        return $this->belongsTo(Imovel::class, 'imovel', 'id');
    }  
    
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
