<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ConfiguracoesRequest;
use App\Models\Cidades;
use App\Models\Estados;
use App\Models\Template;
use App\Models\Tenant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Support\Cropper;
use Illuminate\Support\Str;

class TenantClientConfigController extends Controller
{
    public function __construct()
    {
        //Verifica se expirou a assinatura
        $this->middleware(['subscribed']);
    }
    
    public function editar()
    {
        $tenant = auth()->user()->tenant;        
        $estados = Estados::orderBy('estado_nome', 'ASC')->get();
        $cidades = Cidades::orderBy('cidade_nome', 'ASC')->get();
        $templates = Template::orderBy('created_at', 'DESC')->available()->get();

        $sitemap = $tenant->sitemap_data ? Carbon::createFromFormat('Y-m-d', $tenant->sitemap_data) : Carbon::now();
        $datahoje = Carbon::now();
        $diferenca = $datahoje->diffInDays($sitemap); // saída: X dias

        $feeddata = $tenant->rss_data ? Carbon::createFromFormat('Y-m-d', $tenant->rss_data) : Carbon::now();
        $feeddatahoje = Carbon::now();
        $feeddatadiferenca = $feeddatahoje->diffInDays($feeddata) ?? now(); // saída: X dias

        return view('admin.configuracoes',[
            'config' => $tenant,
            'estados' => $estados,
            'cidades' => $cidades,
            'templates' => $templates,
            'diferenca' => $diferenca,
            'feeddatadiferenca' => $feeddatadiferenca
        ]);
    }

    public function fetchCity(Request $request)
    {
        $data['cidades'] = Cidades::where("estado_id",$request->estado_id)->get(["cidade_nome", "cidade_id"]);
        return response()->json($data);
    }

    public function update(ConfiguracoesRequest $request, $config)
    {
        $tenant = Tenant::where('id', $config)->first(); 

        if(!empty($request->file('metaimg'))){
            Storage::delete($tenant->metaimg);
            Cropper::flush($tenant->metaimg);
            $tenant->metaimg = '';
        }
        
        if(!empty($request->file('logomarca'))){
            Storage::delete($tenant->logomarca);
            Cropper::flush($tenant->logomarca);
            $tenant->logomarca = '';
        }
        
        if(!empty($request->file('logomarca_admin'))){
            Storage::delete($tenant->logomarca_admin);
            Cropper::flush($tenant->logomarca_admin);
            $tenant->logomarca_admin = '';
        }
        
        if(!empty($request->file('favicon'))){
            Storage::delete($tenant->favicon);
            Cropper::flush($tenant->favicon);
            $tenant->favicon = '';
        }
        
        if(!empty($request->file('marcadagua'))){
            Storage::delete($tenant->marcadagua);
            Cropper::flush($tenant->marcadagua);
            $tenant->marcadagua = '';
        }
        
        if(!empty($request->file('imgheader'))){
            Storage::delete($tenant->imgheader);
            Cropper::flush($tenant->imgheader);
            $tenant->imgheader = '';
        }
        
        $tenant->fill($request->all());
        
        if(!empty($request->file('metaimg'))){
            $tenant->metaimg = $request->file('metaimg')->storeAs('configuracoes/'.$tenant->uuid, 'metaimg-'.Str::slug($request->name)  . '.' . $request->file('metaimg')->extension());
        }
        
        if(!empty($request->file('logomarca'))){
            $tenant->logomarca = $request->file('logomarca')->storeAs('configuracoes/'.$tenant->uuid, 'logomarca-'.Str::slug($request->name)  . '.' . $request->file('logomarca')->extension());
        }
        
        if(!empty($request->file('logomarca_admin'))){
            $tenant->logomarca_admin = $request->file('logomarca_admin')->storeAs('configuracoes/'.$tenant->uuid, 'logomarca-admin-'.Str::slug($request->name)  . '.' . $request->file('logomarca_admin')->extension());
        }
        
        if(!empty($request->file('favicon'))){
            $tenant->favicon = $request->file('favicon')->storeAs('configuracoes/'.$tenant->uuid, 'favivon-'.Str::slug($request->name)  . '.' . $request->file('favicon')->extension());
        }
        
        if(!empty($request->file('marcadagua'))){
            $tenant->marcadagua = $request->file('marcadagua')->storeAs('configuracoes/'.$tenant->uuid, 'marcadagua-'.Str::slug($request->name)  . '.' . $request->file('marcadagua')->extension());
        }
        
        if(!empty($request->file('imgheader'))){
            $tenant->imgheader = $request->file('imgheader')->storeAs('configuracoes/'.$tenant->uuid, 'imgheader-'.Str::slug($request->name)  . '.' . $request->file('imgheader')->extension());
        }
        
        if(!$tenant->save()){
            return redirect()->back()->withInput()->withErrors('Erro');
        }

        return redirect()->route('configuracoes.editar', $tenant->id)->with([
            'color' => 'success', 
            'message' => 'Configurações atualizadas com sucesso!'
        ]);
    }
}
