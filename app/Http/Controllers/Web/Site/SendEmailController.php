<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Web\Atendimento;
use App\Mail\Web\AtendimentoRetorno;
use App\Mail\Web\ReservaRetorno;
use App\Mail\Web\ReservaSend;
use App\Mail\Web\ParceiroSend;
use App\Models\Imovel;
use App\Models\Newsletter;
use App\Models\NewsletterCat;
use App\Models\Parceiro;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Services\EstadoService;
use App\Services\CidadeService;
use App\Tenant\ManangerTenant;

class SendEmailController extends Controller
{

    protected $tenant, $estadoService, $cidadeService;

    public function __construct(
        ManangerTenant $tenant,
        EstadoService $estadoService,
        CidadeService $cidadeService)
    {
        $this->estadoService = $estadoService;
        $this->cidadeService = $cidadeService;
        $this->tenant = $tenant->tenant();
    }

    public function sendEmail(Request $request)
    {
        if($request->nome == ''){
            $json = "Por favor preencha o campo <strong>Nome</strong>";
            return response()->json(['error' => $json]);
        }
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $json = "O campo <strong>Email</strong> está vazio ou não tem um formato válido!";
            return response()->json(['error' => $json]);
        }
        if($request->assunto && $request->assunto == ''){
            $json = "Por favor preencha o <strong>Assunto</strong> da mensagem!";
            return response()->json(['error' => $json]);
        }
        if($request->mensagem == ''){
            $json = "Por favor preencha sua <strong>Mensagem</strong>";
            return response()->json(['error' => $json]);
        }
        if(!empty($request->bairro) || !empty($request->cidade)){
            $json = "<strong>ERRO</strong> Você está praticando SPAM!"; 
            return response()->json(['error' => $json]);
        }else{
            $data = [
                'sitename' => $this->tenant->name,
                'siteemail' => env('MAIL_FROM_ADDRESS'),
                'clisiteemail' => $this->tenant->email,
                'reply_name' => $request->nome,
                'reply_email' => $request->email,
                'telefone' => $request->telefone,
                'assunto' => $request->assunto ?? '#Atendimento pelo Site',
                'mensagem' => $request->mensagem
            ];

            $retorno = [
                'sitename' => $this->tenant->name,
                'clisiteemail' => $this->tenant->email,
                'siteemail' => env('MAIL_FROM_ADDRESS'),
                'reply_name' => $request->nome,
                'reply_email' => $request->email
            ];
            
            Mail::send(new Atendimento($data));
            Mail::send(new AtendimentoRetorno($retorno));
            
            $json = "Obrigado {$request->nome} sua mensagem foi enviada com sucesso!"; 
            return response()->json(['sucess' => $json]);
        }
    }

    public function sendNewsletter(Request $request)
    {
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $json = "O campo <strong>Email</strong> está vazio ou não tem um formato válido!";
            return response()->json(['error' => $json]);
        }
        if(!empty($request->bairro) || !empty($request->cidade)){
            $json = "<strong>ERRO</strong> Você está praticando SPAM!"; 
            return response()->json(['error' => $json]);
        }else{   
            $validaNews = Newsletter::where('email', $request->email)->first();            
            if(!empty($validaNews)){
                Newsletter::where('email', $request->email)->update(['status' => 1]);
                $json = "Seu e-mail já está cadastrado!"; 
                return response()->json(['sucess' => $json]);
            }else{
                $categoriaPadrão = NewsletterCat::where('sistema', 1)->first();                
                $data = $request->all();
                $data['autorizacao'] = 1;
                $data['categoria'] = $categoriaPadrão->id;
                $data['nome'] = $request->nome ?? '#Cadastrado pelo Site';
                $NewsletterCreate = Newsletter::create($data);
                $NewsletterCreate->save();
                $json = "Obrigado Cadastrado com sucesso!"; 
                return response()->json(['sucess' => $json]);
            }            
        }
    }

    public function sendEmailParceiro(Request $request)
    {
        $parceiro = Parceiro::where('id', $request->parceiro_id)->first();
        if($request->nome == ''){
            $json = "Por favor preencha o campo <strong>Nome</strong>";
            return response()->json(['error' => $json]);
        }
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $json = "O campo <strong>Email</strong> está vazio ou não tem um formato válido!";
            return response()->json(['error' => $json]);
        }
        if($request->mensagem == ''){
            $json = "Por favor preencha sua <strong>Mensagem</strong>";
            return response()->json(['error' => $json]);
        }
        if(!empty($request->bairro) || !empty($request->cidade)){
            $json = "<strong>ERRO</strong> Você está praticando SPAM!"; 
            return response()->json(['error' => $json]);
        }else{

            $data = [
                'sitename' => $parceiro->name,
                'siteemail' => $parceiro->email,
                'clisiteemail' => $this->tenant->email,
                'reply_name' => $request->nome,
                'reply_email' => $request->email,
                'mensagem' => $request->mensagem,
                'config_site_name' => $this->tenant->name
            ];

            $parceiro->email_send_count = $parceiro->email_send_count + 1;
            $parceiro->save();
            
            Mail::send(new ParceiroSend($data));
            
            $json = 'Obrigado '.getPrimeiroNome($request->nome).' sua mensagem foi enviada para nosso parceiro <b>'.$parceiro->name.'</b> com sucesso!'; 
            return response()->json(['sucess' => $json]);
        }
    }

    public function acomodacaoSend(Request $request)
    {     
        $imovel = Imovel::where('id', $request->apart_id)->first();

        if($request->tipo_reserva == 1){
            if($request->empresa_nome == ''){
                $json = "Por favor preencha o campo <strong>Nome da Empresa</strong>";
                return response()->json(['error' => $json]);
            }
            if($request->cnpj == ''){
                $json = "Por favor preencha o campo <strong>CNPJ da Empresa</strong>";
                return response()->json(['error' => $json]);
            }
            if($request->telefone_empresa == ''){
                $json = "Por favor preencha o campo <strong>Telefone da Empresa</strong>";
                return response()->json(['error' => $json]);
            }
        }

        if($request->nome == ''){
            $json = "Por favor preencha o campo <strong>Nome</strong>";
            return response()->json(['error' => $json]);
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $json = "O campo <strong>Email</strong> está vazio ou não tem um formato válido!";
            return response()->json(['error' => $json]);
        }

        if($request->cpf && !\App\Helpers\Renato::validaCPF($request->cpf)){
            $json = "O campo <strong>CPF</strong> está vazio ou não tem um formato válido!";
            return response()->json(['error' => $json]);
        }

        if($request->rg && $request->rg == ''){
            $json = "Por favor preencha o campo <strong>RG</strong>";
            return response()->json(['error' => $json]);
        }

        if($request->nasc){
            $nasc = Carbon::createFromFormat('d/m/Y', $request->nasc)->format('d-m-Y');        
        
            if(Carbon::parse($nasc)->age < 18){
                $json = "Data de nascimento inválida!";
                return response()->json(['error' => $json]);
            }
    
            if($request->nasc == ''){
                $json = "Por favor preencha o campo <strong>Dada de Nascimento</strong>";
                return response()->json(['error' => $json]);
            }
        }        
        
        if($request->whatsapp == ''){
            $json = "Por favor preencha o campo <strong>Telefone Móvel</strong>";
            return response()->json(['error' => $json]);
        }

        if($request->checkin == ''){
            $json = "Por favor selecione uma <strong>Data</strong> para seu CheckIn!";
            return response()->json(['error' => $json]);
        }

        if($request->checkout == ''){
            $json = "Por favor selecione uma <strong>Data</strong> para seu CheckOut!";
            return response()->json(['error' => $json]);
        }
        
        if(Carbon::createFromFormat('d/m/Y', $request->checkin)->lt(Carbon::parse(now())->format('Y-m-d'))){
            $json = "Você selecionou uma <strong>Data do Check In</strong> inválida!";
            return response()->json(['error' => $json]);
        }

        if(Carbon::createFromFormat('d/m/Y', $request->checkout)->lt(Carbon::parse(now())->format('Y-m-d'))){
            $json = "Você selecionou uma <strong>Data do Check Out</strong> inválida!";
            return response()->json(['error' => $json]);
        }

        if($request->apart_id == ''){
            $json = "Por favor escolha um <strong>apartamento</strong>";
            return response()->json(['error' => $json]);
        }
                
        $data = [
            'sitename' => $this->tenant->name,
            'siteemail' =>  env('MAIL_FROM_ADDRESS'),
            'clisiteemail' => $this->tenant->email,
            //Dados do Cliente
            'reply_name' => $request->nome,
            'reply_email' => $request->email,
            'cpf' => $request->cpf ?? '',
            'rg' => $request->rg ?? '',
            'nasc' => $request->nasc ?? '',
            'cep' => $request->cep,
            'rua' => $request->rua,
            'bairro' => $request->bairro,
            'num' => $request->num,
            'telefone' => $request->telefone,
            'whatsapp' => $request->whatsapp,
            'whatsapp' => $request->whatsapp,
            'estado' => $this->estadoService->getEstado($request->uf)->estado_nome,
            'cidade' => $this->cidadeService->getCidadeById($request->cidade)->cidade_nome,
            //Dados da reserva
            'ocupacao' => $request->ocupacao ?? '',
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
            'adultos' => $request->num_adultos,
            'criancas' => $request->num_cri_0_5 ?? 0,            
            'codigo' => '00'.rand(1,100000),
            'imovel' => $imovel->titulo
        ];
        
        $retorno = [
            'sitename' => $this->tenant->name,
            'clisiteemail' => $this->tenant->email,
            'siteemail' => env('MAIL_FROM_ADDRESS'),
            'reply_name' => $request->nome,
            'reply_email' => $request->email
        ];
        
        // $getEmpresa = Empresa::where('document_company', str_replace(['.', '-', '/', '(', ')', ' '], '', $request->cnpj))->first();
        // if($request->tipo_reserva == 1){                        
        //     if(empty($getEmpresa)){
        //         $empresa = [
        //             'alias_name' => $request->empresa_nome,
        //             'social_name' => $request->empresa_nome,
        //             'document_company' => $request->cnpj,
        //             'telefone' => $request->telefone_empresa,
        //             'created_at' => Carbon::now()
        //         ];
        //         $empresaCreate = Empresa::create($empresa);
        //         $empresaCreate->save();
        //     }            
        // }
        
        $user = [
            'tenant_id' => $this->tenant->id,
            'name' => $request->nome,
            'email' => $request->email,
            'cpf' => $request->cpf ?? rand(10000000000, 99999999999),
            'rg' => $request->rg ?? '',
            'celular' => $request->telefone,
            'whatsapp' => $request->whatsapp,
            'cep' => $request->cep,
            'rua' => $request->rua,
            'bairro' => $request->bairro,
            'num' => $request->num,
            'uf' => $request->uf,
            'cidade' => $request->cidade,
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt(Carbon::now()),
            'senha' => Str::random(20),
            'remember_token' => Str::random(20),
            'created_at' => Carbon::now(),
            'client' => true,
            'status' => 1,
            'notasadicionais' => 'Cliente cadastrado pelo site'
        ]; 
        
        $getUser = User::where('email', $request->email)->where('tenant_id', $this->tenant->id)->first();
        if(!$getUser){
            $userCreate = User::create($user);
            $userCreate->save();
        }        

        // $reserva = [
        //     'cliente' => (!$getUser ? $userCreate->id : $getUser->id),
        //     'imovel' => $imovel->id,
        //     'empresa' => ($request->tipo_reserva == 1 ? $request->empresa_nome : ''),
        //     'status' => 1,
        //     'adultos' => $request->num_adultos,
        //     'criancas_0_5' => $request->num_cri_0_5,
        //     'codigo' => $data['codigo'],
        //     'checkin' => Carbon::parse($request->checkin)->format('d/m/Y'),
        //     'checkout' => Carbon::parse($request->checkout)->format('d/m/Y'),
        //     'notasadicionais' => $data['ocupacao']
        // ];
        
        // $reservaCreate = Reservas::create($reserva);
        // $reservaCreate->save();

        Mail::send(new ReservaSend($data));
        Mail::send(new ReservaRetorno($retorno));   
        
        $json = "Obrigado {$request->nome} sua solicitação de pré-reserva foi enviada com sucesso!"; 
        return response()->json(['sucess' => $json]);
    }
}
