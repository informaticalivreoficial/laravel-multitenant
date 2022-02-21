<?php

namespace App\Observers;

use App\Models\Imovel;
use Illuminate\Support\Str;

class ImovelObserver
{
    /**
     * Handle the Plan "created" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function creating(Imovel $imovel)
    {
        $imovel->slug = Str::slug($imovel->titulo);
    }

    /**
     * Handle the Plan "updated" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function updating(Imovel $imovel)
    {
        $imovel->slug = Str::slug($imovel->name);
    }
}
