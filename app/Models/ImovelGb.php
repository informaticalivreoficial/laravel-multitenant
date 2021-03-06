<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Support\Cropper;

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

    /**
     * Accerssors and Mutators
     */

    public function getUrlCroppedAttribute()
    {
        return Storage::url(Cropper::thumb($this->path, 1366, 768));
    }

    public function getUrlCroppedSlideGalleryAttribute()
    {
        return Storage::url(Cropper::thumb($this->path, 200, 150));
    }

    public function getSlideLancamentoAttribute()
    {
        return Storage::url(Cropper::thumb($this->path, 750, 500));
    }

    public function getUrlImageAttribute()
    {
        return Storage::url($this->path);
    }

    public function setMacadaguaAttribute($value)
    {
        $this->attributes['marcadagua'] = ($value == true || $value == '1' ? 1 : 0);
    }
}
