<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImovelGb extends Model
{
    use HasFactory;

    protected $table = 'imoveis_gb'; 
    
    protected $fillable = [
        'imovel',
        'path',
        'cover',
        'marcadagua'
    ];
}
