<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Imovel as ImovelRequest;
use App\Models\ImovelGb;
use App\Support\Cropper;
use Image;
use App\Models\Configuracoes;
use App\Models\Estados;
use App\Models\Cidades;
use App\Models\Imovel;
use App\Models\Portal;
use App\Models\PortalImoveis;
use App\Services\ImovelService;
use App\Services\UserService;

class ImovelController extends Controller
{
    protected $userService, $imovelService;

    public function __construct(UserService $userService, ImovelService $imovelService)
    {
        //Verifica se expirou a assinatura
        $this->middleware(['subscribed']);
        $this->middleware(['can:imoveis']);
        
        $this->imovelService = $imovelService;
        $this->userService = $userService;
    }

    public function index()
    {
        // # ProductController@create
        // if (Gate::denies('create-post')) {
        //     return redirect()
        //             ->route('nome.rota')
        //             ->with('message', 'Não pode cadastrar');
        // }
        $imoveis = $this->imovelService->getAllImoveis(30);
        return view('admin.imoveis.index', [
            'imoveis' => $imoveis,
        ]);
    }
    
    public function create()
    {
        $estados = Estados::orderBy('estado_nome', 'ASC')->get();
        $cidades = Cidades::orderBy('cidade_nome', 'ASC')->get();
        $users = $this->userService->getClientes();

        $portais = Portal::orderBy('nome')->available()->get();

        return view('admin.imoveis.create', [
            'users' => $users,
            'estados' => $estados,
            'cidades' => $cidades,
            'portais' => $portais
        ]);
    }
    
    public function store(ImovelRequest $request)
    {
        $criarImovel = Imovel::create($request->all());
        $criarImovel->fill($request->all());

        $criarImovel->setSlug();

        $validator = Validator::make($request->only('files'), ['files.*' => 'image']);

        if ($validator->fails() === true) {
            return redirect()->back()->withInput()->with([
                'color' => 'orange',
                'message' => 'Todas as imagens devem ser do tipo jpg, jpeg ou png.',
            ]);
        }
        
        if ($request->allFiles()) {
            foreach ($request->allFiles()['files'] as $image) {
                $imovelGb = new ImovelGb();
                $imovelGb->imovel = $criarImovel->id;
                $imovelGb->path = $image->storeAs(env('AWS_PASTA') . 'imoveis/'. auth()->user()->tenant->uuid . '/' . $criarImovel->id, Str::slug($request->titulo) . '-' . str_replace('.', '', microtime(true)) . '.' . $image->extension());
                $imovelGb->save();
                unset($imovelGb);
            }
        }

        $portaisRequest = $request->all();
        $portais = null;
        foreach($portaisRequest as $key => $value) {
            if(Str::is('portal_*', $key) == true){
                $f['portal'] = ltrim($key, 'portal_');
                $f['imovel'] = $criarImovel->id;
                $createPimovel = PortalImoveis::create($f);
                $createPimovel->save();
            }
        }

        return redirect()->route('imoveis.edit', [
            'imovel' => $criarImovel->id
        ])->with(['color' => 'success', 'message' => 'Imóvel cadastrado com sucesso!']);
    }   

    
    public function edit($imovel)
    {
        $estados = Estados::orderBy('estado_nome', 'ASC')->get();
        $cidades = Cidades::orderBy('cidade_nome', 'ASC')->get();

        $imovel = $this->imovelService->getImovelById($imovel);        
        $users = $this->userService->getClientes();

        $portais = Portal::orderBy('nome')->available()->get(); 
        
        return view('admin.imoveis.edit', [
            'imovel' => $imovel,
            'users' => $users,
            'estados' => $estados,
            'cidades' => $cidades,
            'portais' => $portais
        ]);
    }
    
    public function update(ImovelRequest $request, $imovel)
    {      
        $deletePimovel = PortalImoveis::where('imovel', $imovel)->first();
        if($deletePimovel != null){
            $deletePimovel = PortalImoveis::where('imovel', $imovel)->get();
            foreach($deletePimovel as $delete){
                $delete->delete();
            }            
        } 

        $portaisRequest = $request->all();
        $portais = null;
        foreach($portaisRequest as $key => $value) {
            if(Str::is('portal_*', $key) == true){
                $f['portal'] = ltrim($key, 'portal_');
                $f['imovel'] = $imovel;
                $createPimovel = PortalImoveis::create($f);
                $createPimovel->save();
            }
        }

        $imovel = $this->imovelService->getImovelById($imovel);  
        $imovel->fill($request->all());

        $imovel->setVendaAttribute($request->venda);
        $imovel->setLocacaoAttribute($request->locacao);
        $imovel->setArCondicionadoAttribute($request->ar_condicionado);
        $imovel->setAquecedorsolarAttribute($request->aquecedor_solar);
        $imovel->setBarAttribute($request->bar);
        $imovel->setBibliotecaAttribute($request->biblioteca);
        $imovel->setChurrasqueiraAttribute($request->churrasqueira);
        $imovel->setEstacionamentoAttribute($request->estacionamento);
        $imovel->setCozinhaAmericanaAttribute($request->cozinha_americana);
        $imovel->setCozinhaPlanejadaAttribute($request->cozinha_planejada);
        $imovel->setDispensaAttribute($request->dispensa);
        $imovel->setEdiculaAttribute($request->edicula);
        $imovel->setEspacoFitnessAttribute($request->espaco_fitness);
        $imovel->setEscritorioAttribute($request->escritorio);
        $imovel->setArmarionauticoAttribute($request->armarionautico);
        $imovel->setFornodepizzaAttribute($request->fornodepizza);
        $imovel->setPortaria24hsAttribute($request->portaria24hs);
        $imovel->setQuintalAttribute($request->quintal);
        $imovel->setZeladoriaAttribute($request->zeladoria);
        $imovel->setSalaodejogosAttribute($request->salaodejogos);
        $imovel->setSaladetvAttribute($request->saladetv);
        $imovel->setAreadelazerAttribute($request->areadelazer);
        $imovel->setBalcaoamericanoAttribute($request->balcaoamericano);
        $imovel->setVarandagourmetAttribute($request->varandagourmet);
        $imovel->setBanheirosocialAttribute($request->banheirosocial);
        $imovel->setBrinquedotecaAttribute($request->brinquedoteca);
        $imovel->setPertodeescolasAttribute($request->pertodeescolas);
        $imovel->setCondominiofechadoAttribute($request->condominiofechado);
        $imovel->setInterfoneAttribute($request->interfone);
        $imovel->setSistemadealarmeAttribute($request->sistemadealarme);
        $imovel->setJardimAttribute($request->jardim);
        $imovel->setSalaodefestasAttribute($request->salaodefestas);
        $imovel->setPermiteanimaisAttribute($request->permiteanimais);
        $imovel->setQuadrapoliesportivaAttribute($request->quadrapoliesportiva);
        $imovel->setGeradoreletricoAttribute($request->geradoreletrico);
        $imovel->setBanheiraAttribute($request->banheira);
        $imovel->setLareiraAttribute($request->lareira);
        $imovel->setLavaboAttribute($request->lavabo);
        $imovel->setLavanderiaAttribute($request->lavanderia);
        $imovel->setElevadorAttribute($request->elevador);
        $imovel->setMobiliadoAttribute($request->mobiliado);
        $imovel->setVistaParaMarAttribute($request->vista_para_mar);
        $imovel->setPiscinaAttribute($request->piscina);
        $imovel->setVentiladorTetoAttribute($request->ventilador_teto);
        $imovel->setInternetAttribute($request->internet);
        $imovel->setGeladeiraAttribute($request->geladeira);

        $imovel->save();
        $imovel->setSlug();

        $validator = Validator::make($request->only('files'), ['files.*' => 'image']);

        if ($validator->fails() === true) {
            return redirect()->back()->withInput()->with([
                'color' => 'orange',
                'message' => 'Todas as imagens devem ser do tipo jpg, jpeg ou png.',
            ]);
        }

        if ($request->allFiles()) {
            foreach ($request->allFiles()['files'] as $image) {
                $imovelImage = new ImovelGb();
                $imovelImage->imovel = $imovel->id;
                $imovelImage->path = $image->storeAs(env('AWS_PASTA') . 'imoveis/'. $imovel->tenant->uuid . '/' . $imovel->id, Str::slug($request->titulo) . '-' . str_replace('.', '', microtime(true)) . '.' . $image->extension());
                $imovelImage->save();
                unset($imovelImage);
            }
        }

        return redirect()->route('imoveis.edit', [
            'imovel' => $imovel->id,
        ])->with(['color' => 'success', 'message' => 'Imóvel atualizado com sucesso!']);
    } 
    
    public function fetchCity(Request $request)
    {
        $data['cidades'] = Cidades::where("estado_id",$request->estado_id)->get(["cidade_nome", "cidade_id"]);
        return response()->json($data);
    } 
    
    public function destaqueMark(Request $request)
    {
        $imovel = $this->imovelService->getImovelById($request->id);
        $allImoveis = Imovel::where('id', '!=', $imovel->id)->get();

        foreach ($allImoveis as $imovelall) {
            $imovelall->destaque = null;
            $imovelall->save();
        }

        $imovel->destaque = true;
        $imovel->save();

        $json = [
            'success' => true,
        ];

        return response()->json($json);         
    }

    public function imageWatermark(Request $request)
    {
        //chama as configuracoes do site
        $imovel = $this->imovelService->getImovelById($request->id);
        $imovel->fill($request->all());
        $imagensGallery = ImovelGb::where('imovel', $request->id)->get();        
        if(!empty($imovel->tenant->marcadagua) && !empty($imagensGallery)){
            foreach($imagensGallery as $imagem){   
                $img = Image::make(Storage::get($imagem->path));  
                /* insert watermark at bottom-right corner with 10px offset */
                $img->insert(Storage::get($imovel->tenant->marcadagua), 'bottom-right', 10, 10);                
                $img->save(storage_path('app/public/'.$imagem->path));
                $img->encode('png');  
            }
            $affected = DB::table('imoveis_gb')->where('imovel', '=', $request->id)->update(array('marcadagua' => 1));            
            unset($affected);

            $imovel->exibirmarcadagua = 1;
            $imovel->save();

            $json = "Marca D´agua inserida com sucesso!";
            return response()->json(['success' => $json]);
        }else{
             $json = "Erro ao inserir a Marca D´agua!";
             return response()->json(['error' => $json]);
        }
    }
    
    public function imageSetCover(Request $request)
    {
        $imageSetCover = ImovelGb::where('id', $request->image)->first();
        $allImage = ImovelGb::where('imovel', $imageSetCover->imovel)->get();

        foreach ($allImage as $image) {
            $image->cover = null;
            $image->save();
        }

        $imageSetCover->cover = true;
        $imageSetCover->save();

        $json = [
            'success' => true,
        ];

        return response()->json($json);
    }

    public function imageRemove(Request $request)
    {
        $imageDelete = ImovelGb::where('id', $request->image)->first();

        Storage::delete($imageDelete->path);
        $imageDelete->delete();

        $json = [
            'success' => true,
        ];
        return response()->json($json);
    }
    
    public function imovelSetStatus(Request $request)
    {        
        $imovel = Imovel::find($request->id);
        $imovel->status = $request->status;
        $imovel->save();
        return response()->json(['success' => true]);
    }    
    
    public function delete(Request $request)
    {
        $imovel = $this->imovelService->getImovelById($request->id);
        $imovelGb = ImovelGb::where('imovel', $request->id)->first();
        $nome = getPrimeiroNome(Auth::user()->name);
        if(!empty($imovel) && !empty($imovelGb)){
            $json = "<b>$nome</b> você tem certeza que deseja excluir este imóvel? Ele possui imagens e todas serão excluídas!";
            return response()->json(['error' => $json,'id' => $imovel->id]);
        }elseif(!empty($imovel) && empty($imovelGb)){
            $json = "<b>$nome</b> você tem certeza que deseja excluir este imóvel?";
            return response()->json(['error' => $json,'id' => $imovel->id]);
        }else{
            return response()->json(['success' => true]);
        }
    }
    
    public function deleteon(Request $request)
    {
        //deleta as integrações
        $deletePimovel = PortalImoveis::where('imovel', $request->imovel_id)->first();
        if($deletePimovel != null){
            $deletePimovel = PortalImoveis::where('imovel', $request->imovel_id)->get();
            foreach($deletePimovel as $delete){
                $delete->delete();
            }            
        } 

        $imovel = $this->imovelService->getImovelById($request->imovel_id);
        $imageDelete = ImovelGb::where('imovel', $request->imovel_id)->first();
        $imovelR = $imovel->titulo;
        if(!empty($imovel)){
            if(!empty($imageDelete)){
                Storage::delete($imageDelete->path);
                $imageDelete->delete();
                Storage::deleteDirectory('imoveis/'. $imovel->tenant->uuid . '/' .$request->imovel_id);
                $imovel->delete();
            }
            $imovel->delete();
        }
        return redirect()->route('imoveis.index')->with(['color' => 'success', 'message' => 'O imóvel '.$imovelR.' foi removido com sucesso!']);
    }
}
