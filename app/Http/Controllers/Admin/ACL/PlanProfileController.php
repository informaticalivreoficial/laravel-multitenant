<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PlanProfileController extends Controller
{
    public function perfis($idPlano)
    {
        $plano = Plan::find($idPlano);

        if(!$plano){
            return Redirect::back();
        }
        
        $perfis = $plano->profiles();
       
        return view('admin.plans.perfis.index',[
            'perfis' => $perfis,
            'plano' => $plano
        ]);
    }

    public function create($idPlano)
    {
        $plano = Plan::find($idPlano);

        if(!$plano){
            return Redirect::back();
        }

        $perfis = $plano->profilesAvailable();

        return view('admin.acl.perfis.permissoes.create',[
            'perfis' => $perfis,
            'plano' => $plano
        ]);
    }
}
