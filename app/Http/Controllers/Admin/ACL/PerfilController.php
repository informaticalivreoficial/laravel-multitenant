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

    public function perfilSetStatus(Request $request)
    {        
        $perfil = Profile::find($request->id);
        $perfil->status = $request->status;
        $perfil->save();
        return response()->json(['success' => true]);
    }

    public function delete(Request $request)
    {
        $perfil = Profile::where('id', $request->id)->first();
        $nome = getPrimeiroNome(auth()->user()->name);
        if(!empty($perfil)){
            $json = "<b>$nome</b> você tem certeza que deseja excluir este perfil?";
            return response()->json(['error' => $json,'id' => $perfil->id]);
        }else{
            return response()->json(['success' => true]);
        }
    }
    
    public function deleteon(Request $request)
    { 
        $perfil = Profile::where('id', $request->perfil_id)->first();  
        $perfilR = $perfil->name;
        if(!empty($perfil)){
            $perfil->delete();
        }
        return Redirect::route('perfis')->with([
            'color' => 'success', 
            'message' => 'O perfil '.$perfilR.' foi removido com sucesso!']);
    }
}
