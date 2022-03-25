@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div class="main_property_content py-y">
    <div class="container">
        <div class="row py-4">
            <div class="col-12 col-md-4">
                <div class="main_property_categorias">
                    <img width="300" src="{{$parceiro->nocover()}}" alt="{{$parceiro->name}}" class="p-3">
                    <ul>
                        @if ($parceiro->link)
                            <li><b>Site:</b> <a target="_blank" href="{{$parceiro->link}}">{{$parceiro->link}}</a></li>
                        @endif
                        @if ($parceiro->email)
                            <li><b>Email:</b> <a href="mailto:{{$parceiro->email}}">{{$parceiro->email}}</a></li>
                        @endif
                        @if ($parceiro->telefone)
                            <li><b>Telefone:</b> <a href="tel:{{$parceiro->telefone}}">{{$parceiro->telefone}}</a></li>
                        @endif
                        @if ($parceiro->celular)
                            <li><b>Telefone Móvel:</b> <a href="tel:{{$parceiro->celular}}">{{$parceiro->celular}}</a></li>
                        @endif
                        @if ($parceiro->whatsapp)
                            <li><b>WhatsApp:</b> <a href="{{getNumZap($parceiro->whatsapp ,'Atendimento '.$parceiro->name)}}">{{$parceiro->whatsapp}}</a></li>
                        @endif
                    </ul>
                    {!!$parceiro->mapa_google!!}
                </div>
            </div>
            <div class="col-12 col-md-8">
                <h3>{{$parceiro->name}}</h3>
                {!!$parceiro->content!!}
                <div class="row">
                    <div class="col-12">
                        @if ($parceiro->rua)
                            {{$parceiro->rua}}
                        @endif
                        @if ($parceiro->rua && $parceiro->num)
                            , {{$parceiro->num}}
                        @endif
                        @if ($parceiro->rua && $parceiro->bairro)
                            , {{$parceiro->bairro}}
                        @endif
                        @if (!$parceiro->rua && $parceiro->bairro)
                            {{$parceiro->bairro}}
                        @endif
                        @if ($parceiro->bairro && $parceiro->uf)
                            - {{getCidadeNome($parceiro->cidade, 'cidades')}}
                        @endif
                        @if(!$parceiro->bairro && $parceiro->uf)
                            {{getCidadeNome($parceiro->cidade, 'cidades')}}
                        @endif
                        @if ($parceiro->cep)
                            - {{$parceiro->cep}}
                        @endif
                    </div>                        
                </div>
                <div class="main_property_contact mt-3">
                    <h2>Enviar Mensagem</h2>
                    <form class="j_formsubmit" action="" method="post" autocomplete="off">  
                        @csrf
                        <div id="js-contact-result"></div> 
                        <div class="form-group form_hide">
                            <!-- HONEYPOT -->
                            <input type="hidden" class="noclear" name="parceiro_id" value="{{$parceiro->id}}" />
                            <input type="hidden" class="noclear" name="tenant_id" value="{{$tenant->id}}" />
                            <input type="hidden" class="noclear" name="bairro" value="" />
                            <input type="text" class="noclear" style="display: none;" name="cidade" value="" />
                        </div>                         
                        <div class="form-group form_hide">
                            <label>Seu Nome</label>
                            <input class="form-control" type="text" name="nome">
                        </div>
                        <div class="form-group form_hide">
                            <label>Seu E-mail</label>
                            <input class="form-control" type="email" name="email">
                        </div>
                        <div class="form-group form_hide">
                            <label>Sua Mensagem</label>
                            <textarea class="form-control" name="mensagem" rows="5"></textarea>
                        </div>
                        <div class="form-group form_hide">
                            <button type="submit" class="btn btn-front btn-block text-white form_hide" id="js-contact-btn">Enviar Agora</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <style>
        iframe{
            width: 100%;
            max-height: 350px;
        }
    </style>
@endsection

@section('js')
    <script>
        $(function () {  

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });     

            // Seletor, Evento/efeitos, CallBack, Ação
            $('.j_formsubmit').submit(function (){
                var form = $(this);
                var dataString = $(form).serialize();

                $.ajax({
                    url: "{{ route('web.sendEmailParceiro') }}",
                    data: dataString,
                    type: 'GET',
                    dataType: 'JSON',
                    beforeSend: function(){
                        form.find("#js-contact-btn").attr("disabled", true);
                        form.find('#js-contact-btn').html("Carregando...");                
                        form.find('.alert').fadeOut(500, function(){
                            $(this).remove();
                        });
                    },
                    success: function(resposta){
                        $('html, body').animate({scrollTop:$('#js-contact-result').offset().top-190}, 'slow');
                        if(resposta.error){
                            form.find('#js-contact-result').html('<div class="alert alert-danger error-msg">'+ resposta.error +'</div>');
                            form.find('.error-msg').fadeIn();                    
                        }else{
                            form.find('#js-contact-result').html('<div class="alert alert-success error-msg">'+ resposta.sucess +'</div>');
                            form.find('.error-msg').fadeIn();                    
                            form.find('input[class!="noclear"]').val('');
                            form.find('textarea[class!="noclear"]').val('');
                            form.find('.form_hide').fadeOut(500);
                        }
                    },
                    complete: function(resposta){
                        form.find("#js-contact-btn").attr("disabled", false);
                        form.find('#js-contact-btn').html("Enviar Agora");                                
                    }

                });

                return false;
            });

        });
    </script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v11.0&appId=1787040554899561&autoLogAppEvents=1" nonce="1eBNUT9J"></script>
@endsection