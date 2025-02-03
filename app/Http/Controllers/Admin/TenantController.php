<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TenantRequest;
use Illuminate\Support\Str;
use App\Models\Cidades;
use App\Models\Estados;
use App\Models\Template;
use App\Models\Tenant;
use App\Models\User;
use Carbon\Carbon;
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
        if (!$empresa = $this->repository->find($tenant)) {
            return redirect()->back();
        }

        $templates = Template::orderBy('created_at', 'DESC')
                ->available()
                ->get();

        $estados = Estados::orderBy('estado_nome', 'ASC')->get();
        $cidades = Cidades::orderBy('cidade_nome', 'ASC')->get(); 

        $sitemap = (!empty($empresa->sitemap_data) ? Carbon::createFromFormat('Y-m-d', $empresa->sitemap_data) : Carbon::now());
        $datahoje = Carbon::now();
        $diferenca = $datahoje->diffInDays($sitemap); // saída: X dias

        $feeddata = (!empty($empresa->rss_data) ? Carbon::createFromFormat('Y-m-d', $empresa->rss_data) : Carbon::now());
        $feeddatahoje = Carbon::now();
        $feeddatadiferenca = $feeddatahoje->diffInDays($feeddata); // saída: X dias

        return view('admin.tenants.edit', [
            'config' => $empresa,
            'estados' => $estados,
            'cidades' => $cidades,
            'diferenca' => $diferenca,
            'templates' => $templates,
            'feeddatadiferenca' => $feeddatadiferenca
        ]);
    }

    public function update(TenantRequest $request, $tenant)
    {
        if (!$empresa = $this->repository->find($tenant)) {
            return redirect()->back();
        }

        if(!empty($request->file('metaimg'))){
            Storage::delete($empresa->metaimg);
            $empresa->metaimg = '';
        }
        
        if(!empty($request->file('logomarca'))){
            Storage::delete($empresa->logomarca);
            $empresa->logomarca = '';
        }
        
        if(!empty($request->file('logomarca_admin'))){
            Storage::delete($empresa->logomarca_admin);
            $empresa->logomarca_admin = '';
        }
        
        if(!empty($request->file('favicon'))){
            Storage::delete($empresa->favicon);
            $empresa->favicon = '';
        }
        
        if(!empty($request->file('marcadagua'))){
            Storage::delete($empresa->marcadagua);
            $empresa->marcadagua = '';
        }
        
        if(!empty($request->file('imgheader'))){
            Storage::delete($empresa->imgheader);
            $empresa->imgheader = '';
        }
        
        $empresa->fill($request->all());
        
        if(!empty($request->file('metaimg'))){
            $empresa->metaimg = $request->file('metaimg')->storeAs(env('AWS_PASTA') . 'configuracoes/'.$empresa->uuid, 'metaimg-'.Str::slug($request->name)  . '.' . $request->file('metaimg')->extension());
        }
        
        if(!empty($request->file('logomarca'))){
            $empresa->logomarca = $request->file('logomarca')->storeAs(env('AWS_PASTA') . 'configuracoes/'.$empresa->uuid, 'logomarca-'.Str::slug($request->name)  . '.' . $request->file('logomarca')->extension());
        }
        
        if(!empty($request->file('logomarca_admin'))){
            $empresa->logomarca_admin = $request->file('logomarca_admin')->storeAs(env('AWS_PASTA') . 'configuracoes/'.$empresa->uuid, 'logomarca-admin-'.Str::slug($request->name)  . '.' . $request->file('logomarca_admin')->extension());
        }
        
        if(!empty($request->file('favicon'))){
            $empresa->favicon = $request->file('favicon')->storeAs(env('AWS_PASTA') . 'configuracoes/'.$empresa->uuid, 'favivon-'.Str::slug($request->name)  . '.' . $request->file('favicon')->extension());
        }
        
        if(!empty($request->file('marcadagua'))){
            $empresa->marcadagua = $request->file('marcadagua')->storeAs(env('AWS_PASTA') . 'configuracoes/'.$empresa->uuid, 'marcadagua-'.Str::slug($request->name)  . '.' . $request->file('marcadagua')->extension());
        }
        
        if(!empty($request->file('imgheader'))){
            $empresa->imgheader = $request->file('imgheader')->storeAs(env('AWS_PASTA') . 'configuracoes/'.$empresa->uuid, 'imgheader-'.Str::slug($request->name)  . '.' . $request->file('imgheader')->extension());
        }

        if(!$empresa->save()){
            return redirect()->back()->withInput()->withErrors('Erro');
        }

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
