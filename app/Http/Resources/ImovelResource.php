<?php

namespace App\Http\Resources;

use App\Models\ImovelGb;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ImovelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {        
        return [
            'titulo'    => $this->titulo,
            'image'     => $this->cover(),
            'venda'     => $this->venda,
            'locacao'   => $this->locacao,
            'categoria' => $this->categoria,
            'tipo'      => $this->tipo,
            'slug'      => route('web.'.($this->venda == true ? 'buyProperty' : 'rentProperty'), ['slug' => $this->slug]),
        ];
    }
}
