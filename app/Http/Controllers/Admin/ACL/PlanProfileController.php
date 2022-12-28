<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
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
        
        $perfis = $plano->profiles()->paginate();
        
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

        return view('admin.plans.perfis.create',[
            'perfis' => $perfis,
            'plano' => $plano
        ]);
    }

    public function store(Request $request, $idPlano)
    {
        $plano = Plan::find($idPlano);
        
        if(!$plano){
            return Redirect::back();
        }
       
        if(!$request->profiles || count($request->profiles) == 0){
            return Redirect::back()->with([
                'color' => 'warning',
                'message' => 'Por favor selecione um perfil!',
            ]);
        }
        
        $plano->profiles()->attach($request->profiles);
        
        return Redirect::route('planos.perfis.create',[
            'idPlano' => $plano->id,
        ])->with(['color' => 'success', 'message' => "Perfis para o plano {$plano->name} foram atualizadas com sucesso!"]);
    }

    public function desvincular($idPlano, $idPerfil)
    {
        $plano = Plan::find($idPlano);
        $perfil = Profile::find($idPerfil);

        if(!$plano || !$idPerfil){
            return Redirect::back();
        }

        $plano->profiles()->detach($perfil);

        return Redirect::route('planos.perfis',[
            'idPlano' => $plano->id,
        ])->with(['color' => 'success', 'message' => "Perfil Desvinculado sucesso!"]);

    }
}
