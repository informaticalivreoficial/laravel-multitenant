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
        $image = ImovelGb::where('imovel', $this->id)->orderBy('cover', 'ASC');
        $cover = $image->where('cover', 1)->first(['path']);

        return [
            'titulo'    => $this->titulo,
            'image'     => (empty($cover['path']) || !Storage::disk()->exists($cover['path']) ? Storage::url($cover['path']) : url(asset('backend/assets/images/image.jpg'))),
            'venda'     => $this->venda,
            'locacao'   => $this->locacao,
            'categoria' => $this->categoria,
            'tipo'      => $this->tipo,
            'slug'      => route('web.'.($this->venda == true ? 'buyProperty' : 'rentProperty'), ['slug' => $this->slug]),
        ];
    }
}
