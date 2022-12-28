<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'venda'     => $this->venda,
            'locacao'   => $this->locacao,
            'categoria' => $this->categoria,
            'tipo'      => $this->tipo,
            'status'    => $this->status,
        ];
    }
}
