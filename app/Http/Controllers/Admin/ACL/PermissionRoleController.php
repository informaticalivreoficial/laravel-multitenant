<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PermissionRoleController extends Controller
{
    public function permissions($idRole)
    {
        $role = Role::find($idRole);

        if(!$role){
            return Redirect::back();
        }

        $permissoes = $role->permissions()->paginate();
       
        return view('admin.acl.roles.permissoes.index',[
            'permissoes' => $permissoes,
            'role' => $role
        ]);
    }

    public function roles($idPermission)
    {
        $permission = Permission::find($idPermission);

        if(!$permission){
            return Redirect::back();
        }

        $roles = $permission->perfis()->paginate();
       
        return view('admin.acl.permissoes.roles.index',[
            'permission' => $permission,
            'roles' => $roles
        ]);
    }

    public function create($idRole)
    {
        $role = Role::find($idRole);

        if(!$role){
            return Redirect::back();
        }

        $permissoes = $role->permissionsAvailable();

        return view('admin.acl.roles.permissoes.create',[
            'permissoes' => $permissoes,
            'role' => $role
        ]);
    }

    public function store(Request $request, $idRole)
    {
        $role = Role::find($idRole);
        
        if(!$role){
            return Redirect::back();
        }
        
        if(!$request->permissions || count($request->permissions) == 0){
            return Redirect::back()->with([
                'color' => 'warning',
                'message' => 'Por favor selecione uma permissão!',
            ]);
        }
        
        $role->permissions()->attach($request->permissions);
        
        return Redirect::route('role.permissoes.create',[
            'idRole' => $role->id,
        ])->with(['color' => 'success', 'message' => "Permissões para o cargo {$role->name} foram atualizadas com sucesso!"]);
    }

    public function desvincular($idRole, $idPermission)
    {
        $role = Role::find($idRole);
        $permission = Permission::find($idPermission);

        if(!$role || !$idPermission){
            return Redirect::back();
        }

        $role->permissions()->detach($permission);

        return Redirect::route('role.permissoes',[
            'idRole' => $role->id,
        ])->with(['color' => 'success', 'message' => "Permissão Desvinculada sucesso!"]);

    }
}
