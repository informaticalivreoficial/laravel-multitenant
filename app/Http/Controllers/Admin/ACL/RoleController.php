<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->paginate(10);
        return view('admin.acl.roles.index',[
            'roles' => $roles
        ]);
    }

    public function create()
    {
        return view('admin.acl.roles.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $criarRole = Role::create($data);
        
        return Redirect::route('roles.edit', [
            'id' => $criarRole->id,
        ])->with(['color' => 'success', 'message' => 'Cargo cadastrado com sucesso!']);
    }

    public function edit($id)
    {
        $role = Role::where('id', $id)->first();
        return view('admin.acl.roles.edit',[
            'role' => $role
        ]);
    }

    public function update(Request $request, $id)
    {        
        $roleUpdate = Role::where('id', $id)->first();
        $roleUpdate->fill($request->all());  
        $roleUpdate->save();

        return Redirect::route('roles.edit', [
            'id' => $roleUpdate->id,
        ])->with(['color' => 'success', 'message' => 'Cargo atualizado com sucesso!']);
    } 
}
