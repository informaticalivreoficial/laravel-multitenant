<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PermissionPerfilController extends Controller
{
    public function permissions($idPerfil)
    {
        $perfil = Profile::find($idPerfil);

        if(!$perfil){
            return Redirect::back();
        }

        $permissoes = $perfil->permissions()->paginate();
       
        return view('admin.acl.perfis.permissoes.index',[
            'permissoes' => $permissoes,
            'perfil' => $perfil
        ]);
    }

    public function profiles($idPermission)
    {
        $permission = Permission::find($idPermission);

        if(!$permission){
            return Redirect::back();
        }

        $profiles = $permission->perfis()->paginate();
       
        return view('admin.acl.permissoes.perfis.index',[
            'permission' => $permission,
            'profiles' => $profiles
        ]);
    }

    public function create($idPerfil)
    {
        $perfil = Profile::find($idPerfil);

        if(!$perfil){
            return Redirect::back();
        }

        $permissoes = $perfil->permissionsAvailable();

        return view('admin.acl.perfis.permissoes.create',[
            'permissoes' => $permissoes,
            'perfil' => $perfil
        ]);
    }

    public function store(Request $request, $idPerfil)
    {
        $perfil = Profile::find($idPerfil);
        
        if(!$perfil){
            return Redirect::back();
        }
        
        if(!$request->permissions || count($request->permissions) == 0){
            return Redirect::back()->with([
                'color' => 'warning',
                'message' => 'Por favor selecione uma permissão!',
            ]);
        }
        
        $perfil->permissions()->attach($request->permissions);
        
        return Redirect::route('perfis.permissoes.create',[
            'idPerfil' => $perfil->id,
        ])->with(['color' => 'success', 'message' => "Permissões para o perfil {$perfil->name} foram atualizadas com sucesso!"]);
    }

    public function desvincular($idPerfil, $idPermission)
    {
        $perfil = Profile::find($idPerfil);
        $permission = Permission::find($idPermission);

        if(!$perfil || !$idPermission){
            return Redirect::back();
        }

        $perfil->permissions()->detach($permission);

        return Redirect::route('perfis.permissoes',[
            'idPerfil' => $perfil->id,
        ])->with(['color' => 'success', 'message' => "Permissão Desvinculada sucesso!"]);

    }
}
