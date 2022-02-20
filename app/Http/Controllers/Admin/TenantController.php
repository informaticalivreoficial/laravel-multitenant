<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TenantRequest;
use Illuminate\Support\Str;
use App\Models\Cidades;
use App\Models\Estados;
use App\Models\Tenant;
use App\Support\Cropper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    private $repository;

    public function __construct(Tenant $tenant)
    {
        $this->repository = $tenant;

        $this->middleware(['can:tenants']);
    }

    public function index()
    {
        $tenants = $this->repository->latest()->paginate(25);

        return view('admin.tenants.index', compact('tenants'));
    }

    public function edit($tenant)
    {
        $estados = Estados::orderBy('estado_nome', 'ASC')->get();
        $cidades = Cidades::orderBy('cidade_nome', 'ASC')->get(); 

        if (!$empresa = $this->repository->find($tenant)) {
            return redirect()->back();
        }

        return view('admin.tenants.edit', [
            'config' => $empresa,
            'estados' => $estados,
            'cidades' => $cidades
        ]);
    }

    public function update(TenantRequest $request, $tenant)
    {
        if (!$empresa = $this->repository->find($tenant)) {
            return redirect()->back();
        }

        //$data = $request->all();
        //dd($data);
        if(!empty($request->file('logomarca'))){
            Storage::delete($empresa->logomarca);
            Cropper::flush($empresa->logomarca);
            $empresa->logomarca = '';
        }

        $empresa->fill($request->all());

        if(!empty($request->file('logomarca'))){
            $empresa->logomarca = $request->file('logomarca')->storeAs('tenants/'.$empresa->uuid, 'logomarca-'.Str::slug($request->name)  . '.' . $request->file('logomarca')->extension());
        }

        //$empresa->update($data);

        return redirect()->route('tenant.edit', [
            'tenant' => $empresa->id,
        ])->with(['color' => 'success', 'message' => 'Empresa atualizada com sucesso!']);
    }

    public function fetchCity(Request $request)
    {
        $data['cidades'] = Cidades::where("estado_id",$request->estado_id)->get(["cidade_nome", "cidade_id"]);
        return response()->json($data);
    }
}
