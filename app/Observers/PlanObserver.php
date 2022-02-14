<?php

namespace App\Observers;

use App\Models\Plan;
use Illuminate\Support\Str;

class PlanObserver
{
    /**
     * Handle the Plan "created" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function creating(Plan $plan)
    {
        $plan->slug = Str::slug($plan->name);
    }

    /**
     * Handle the Plan "updated" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function updating(Plan $plan)
    {
        $plan->slug = Str::slug($plan->name);
    }   
}
