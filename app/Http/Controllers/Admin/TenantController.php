<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TenantRequest;
use Illuminate\Support\Str;
use App\Models\Cidades;
use App\Models\Estados;
use App\Models\Tenant;
use Illuminate\Http\Request;

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
            'empresa' => $empresa,
            'estados' => $estados,
            'cidades' => $cidades
        ]);
    }

    public function update(TenantRequest $request, $tenant)
    {
        if (!$empresa = $this->repository->find($tenant)) {
            return redirect()->back();
        }

        $data = $request->all();

        if(!empty($request->file('logomarca'))){
            $empresa->logomarca = $request->file('logomarca')->storeAs('tenants/'.$empresa->uuid, Str::slug($request->name)  . '-' . str_replace('.', '', microtime(true)) . '.' . $request->file('logomarca')->extension());
            $empresa->save();
        }

        // if ($request->hasFile('logo') && $request->logo->isValid()) {

        //     if (Storage::exists($tenant->logo)) {
        //         Storage::delete($tenant->logo);
        //     }

        //     $data['logo'] = $request->logo->store("tenants/{$tenant->uuid}");
        // }

        $empresa->update($data);

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
