@extends("web.sites.{$tenant->template}.master.master")

@section('content')

<div class="sub-banner" style="background: rgba(0, 0, 0, 0.04) url({{$tenant->gettopodosite()}}) top left repeat;">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>{{$parceiro->name}}</h1>
            <ul class="breadcrumbs">
                <li><a href="{{route('web.home')}}">Home</a></li>
                <li class="active">{{$parceiro->name}}</li>
            </ul>
        </div>
    </div>
</div>

<!-- Agent section start -->
<div class="agent-section content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <!-- Agent detail start -->
                <div class=" row agent-detail clearfix g-0">
                    <div class="col-lg-5 col-md-5 col-sm-12 agent-theme">
                        <img width="300" src="{{$parceiro->nocover()}}" alt="{{$parceiro->name}}" class="p-3">
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 agent-content align-self-center">
                        <h3>
                            <a target="_blank" href="{{$parceiro->link}}">{{$parceiro->name}}</a>
                        </h3>
                        <!-- Address list -->
                        <ul class="address-list">                            
                            @if ($parceiro->link)
                                <li>                                
                                    <span>
                                        Site:
                                    </span>
                                    <a target="_blank" href="{{$parceiro->link}}">{{$parceiro->link}}</a>
                                </li>
                            @endif
                            @if ($parceiro->email)
                                <li>                                
                                    <span>
                                        Email:
                                    </span>
                                    <a href="mailto:{{$parceiro->email}}">{{$parceiro->email}}</a>
                                </li>
                            @endif
                            @if ($parceiro->telefone)
                                <li>                                
                                    <span>
                                        Telefone:
                                    </span>
                                    <a href="tel:{{$parceiro->telefone}}">{{$parceiro->telefone}}</a>                                    
                                </li>
                            @endif
                            @if ($parceiro->celular)
                                <li>                                
                                    <span>
                                        Telefone Móvel:
                                    </span>
                                    <a href="tel:{{$parceiro->celular}}">{{$parceiro->celular}}</a>                                    
                                </li>
                            @endif
                            @if ($parceiro->whatsapp)
                                <li>                                
                                    <span>
                                        WhatsApp:
                                    </span>
                                    <a href="{{getNumZap($parceiro->whatsapp ,'Atendimento '.$parceiro->name)}}">{{$parceiro->whatsapp}}</a>                                    
                                </li>
                            @endif
                        </ul>

                        <div class="social-media">
                            <!-- Social list -->
                            <ul class="social-list">
                                @if (!empty($parceiro->facebook))
                                    <li><a class="facebook-bg" target="_blank" href="{{$parceiro->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                @endif                                
                                @if (!empty($parceiro->twitter))
                                    <li><a class="twitter-bg" target="_blank" href="{{$parceiro->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                @endif                                
                                @if (!empty($parceiro->instagram))
                                    <li><a class="instagram-bg" target="_blank" href="{{$parceiro->instagram}}"><i class="fa fa-instagram"></i></a></li>
                                @endif                                
                                @if (!empty($parceiro->youtube))
                                    <li><a class="youtube-bg" target="_blank" href="{{$parceiro->youtube}}"><i class="fa fa-youtube"></i></a></li>
                                @endif                                
                                @if (!empty($parceiro->linkedin))
                                    <li><a class="linkedin-bg" target="_blank" href="{{$parceiro->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                                @endif                                
                                @if (!empty($parceiro->fliccr))
                                    <li><a class="fliccr-bg" target="_blank" href="{{$parceiro->fliccr}}"><i class="fa fa-flickr"></i></a></li>
                                @endif 
                            </ul>
                        </div>
                    </div>
                </div>                

                <div class="sidebar-widget clearfix biography mb-30">                    
                    {!!$parceiro->content!!}
                    <div class="main-title-2">
                        <h1>Endereço</h1>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
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
                        {!!$parceiro->mapa_google!!}                      
                    </div>
                </div>
                
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12  col-xs-12">
                <div class="sidebar">
                    <!-- Contact agent start -->
                    <div class="sidebar-widget contact-1">
                        <div class="main-title-2 form_hide">
                            <h1>Enviar Mensagem</h1>
                        </div>
                        <div class="contact-form">
                            <form class="j_formsubmit" action="" method="post" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div id="js-contact-result"></div>
                                    </div>
                                    <input type="hidden" class="noclear" name="parceiro_id" value="{{$parceiro->id}}" />
                                    <input type="hidden" class="noclear" name="tenant_id" value="{{$tenant->id}}" />
                                    <div class="form-group form_hide">
                                        <!-- HONEYPOT -->
                                        <input type="hidden" class="noclear" name="bairro" value="" />
                                        <input type="text" class="noclear" style="display: none;" name="cidade" value="" />
                                    </div> 
                                    <div class="col-md-12 form_hide">
                                        <div class="form-group name">
                                            <input type="text" name="nome" class="form-control" placeholder="Nome">
                                        </div>
                                    </div>
                                    <div class="col-md-12 form_hide">
                                        <div class="form-group email">
                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-12 form_hide">
                                        <div class="form-group message">
                                            <textarea  class="form-control" name="mensagem" placeholder="Mensagem"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form_hide">
                                        <div class="send-btn text-center">
                                            <button type="submit" class="button-md button-theme w-100" id="js-contact-btn">Enviar Agora</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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