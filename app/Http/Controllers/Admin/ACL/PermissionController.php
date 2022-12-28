<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PermissionController extends Controller
{
    public function index()
    {
        $permissoes = Permission::latest()->paginate(10);
        return view('admin.acl.permissoes.index',[
            'permissoes' => $permissoes
        ]);
    }

    public function create()
    {
        return view('admin.acl.permissoes.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $criarPermissao = Permission::create($data);
        
        return Redirect::route('permissoes.edit', [
            'id' => $criarPermissao->id,
        ])->with(['color' => 'success', 'message' => 'Permissão cadastrada com sucesso!']);
    }

    public function edit($id)
    {
        $permissao = Permission::where('id', $id)->first();
        return view('admin.acl.permissoes.edit',[
            'permissao' => $permissao
        ]);
    }

    public function update(Request $request, $id)
    {        
        $permissaoUpdate = Permission::where('id', $id)->first();
        $permissaoUpdate->fill($request->all());  
        $permissaoUpdate->save();

        return Redirect::route('permissoes.edit', [
            'id' => $permissaoUpdate->id,
        ])->with(['color' => 'success', 'message' => 'Permissão atualizada com sucesso!']);
    }
    
    public function delete(Request $request)
    {
        $permissao = Permission::where('id', $request->id)->first();
        $nome = getPrimeiroNome(auth()->user()->name);
        if(!empty($permissao)){
            $json = "<b>$nome</b> você tem certeza que deseja excluir esta Permissão?";
            return response()->json(['error' => $json,'id' => $permissao->id]);
        }else{
            return response()->json(['success' => true]);
        }
    }
    
    public function deleteon(Request $request)
    { 
        $permissao = Permission::where('id', $request->permissao_id)->first();  
        $permissaoR = $permissao->name;
        if(!empty($permissao)){
            $permissao->delete();
        }
        return Redirect::route('permissoes')->with([
            'color' => 'success', 
            'message' => 'A Permissão '.$permissaoR.' foi removida com sucesso!']);
    }
}
