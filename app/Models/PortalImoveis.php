<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortalImoveis extends Model
{
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
}
