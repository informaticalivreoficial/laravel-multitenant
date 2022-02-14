<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PerfilController extends Controller
{
    public function index()
    {
        $perfis = Profile::latest()->paginate(10);
        return view('admin.acl.perfis.index',[
            'perfis' => $perfis
        ]);
    }

    public function create()
    {
        return view('admin.acl.perfis.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $criarPerfil = Profile::create($data);
        
        return Redirect::route('perfis.edit', [
            'id' => $criarPerfil->id,
        ])->with(['color' => 'success', 'message' => 'Perfil cadastrado com sucesso!']);
    }

    public function edit($id)
    {
        $perfil = Profile::where('id', $id)->first();
        return view('admin.acl.perfis.edit',[
            'perfil' => $perfil
        ]);
    }

    public function update(Request $request, $id)
    {        
        $perfilUpdate = Profile::where('id', $id)->first();
        $perfilUpdate->fill($request->all());  
        $perfilUpdate->save();

        return Redirect::route('perfis.edit', [
            'id' => $perfilUpdate->id,
        ])->with(['color' => 'success', 'message' => 'Perfil atualizado com sucesso!']);
    } 
}
