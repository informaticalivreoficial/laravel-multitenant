<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Support\Cropper;

class Template extends Model
{
    use HasFactory;

    protected $table = 'templates';

    protected $fillable = [
        'name',
        'imagem',
        'content',
        'status'
    ];

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

    /**
     * Accerssors and Mutators
    */
    public function getimagem()
    {
        $image = $this->imagem;        
        if(empty($this->imagem) || !File::exists('../public/storage/' . $image)) {
            return url(asset('backend/assets/images/image.jpg'));
        } 
        return Storage::url(Cropper::thumb($this->imagem, 200, 200));
    }
}