<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoleUserController extends Controller
{
    public function roles($idUser)
    {
        $user = User::find($idUser);

        if(!$user){
            return Redirect::back();
        }

        $roles = $user->roles()->paginate();
       
        return view('admin.users.roles.index',[
            'roles' => $roles,
            'user' => $user
        ]);
    }

    public function users($idRole)
    {
        $role = Role::find($idRole);

        if(!$role){
            return Redirect::back();
        }

        $users = $role->perfis()->paginate();
       
        return view('admin.acl.permissoes.users.index',[
            'role' => $role,
            'users' => $users
        ]);
    }

    public function create($idUser)
    {
        $user = User::find($idUser);

        if(!$user){
            return Redirect::back();
        }

        $roles = $user->rolesAvailable();

        return view('admin.users.roles.create',[
            'roles' => $roles,
            'user' => $user
        ]);
    }

    public function store(Request $request, $idUser)
    {
        $user = User::find($idUser);
        
        if(!$user){
            return Redirect::back();
        }
        
        if(!$request->roles || count($request->roles) == 0){
            return Redirect::back()->with([
                'color' => 'warning',
                'message' => 'Por favor selecione um Cargo!',
            ]);
        }
        
        $user->roles()->attach($request->roles);
        
        return Redirect::route('users.roles.create',[
            'idUser' => $user->id,
        ])->with(['color' => 'success', 'message' => "Os cargos para o usuário {$user->name} foram atualizados com sucesso!"]);
    }

    public function desvincular($idUser, $idRole)
    {
        $user = User::find($idUser);
        $role = Role::find($idRole);

        if(!$user || !$idRole){
            return Redirect::back();
        }

        $user->roles()->detach($role);

        return Redirect::route('users.roles',[
            'idUser' => $user->id,
        ])->with(['color' => 'success', 'message' => "Cargo Desvinculado sucesso!"]);

    }
}
