@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div class="sub-banner overview-bgi" style="background: rgba(0, 0, 0, 0.04) url({{$tenant->gettopodosite()}}) top left repeat;">
    <div class="overlay">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Atendimento</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{route('web.home')}}">Início</a></li>
                    <li class="active">Atendimento</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="contact-1 content-area-7">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                <!-- FORMULARIO START -->
                <div class="contact-form">
                    <form id="contact_form" class="j_formsubmit" action="" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                                <div id="js-contact-result"></div>                                
                            </div>
                            <!-- HONEYPOT -->
                            <input type="hidden" class="noclear" name="tenant_id" value="{{$tenant->id}}" />
                            <input type="hidden" class="noclear" name="bairro" value="" />
                            <input type="text" class="noclear" style="display: none;" name="cidade" value="" />
                        </div>
                        <div class="form_hide"><!-- FORM HIDE START -->
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group fullname">
                                        <input type="text" name="nome" class="input-text" placeholder="Seu Nome"/>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group enter-email">
                                        <input type="email" name="email" class="input-text" placeholder="Seu E-mail"/>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group subject">
                                        <input type="text" name="assunto" class="input-text" placeholder="Assunto"/>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group number">
                                        <input type="text" name="telefone" class="input-text telefonemask" placeholder="Telefone"/>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                                    <div class="form-group message">
                                        <textarea class="input-text" name="mensagem" placeholder="Mensagem"></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group send-btn mb-0">
                                        <button style="width: 100%;margin-top: 2%;" type="submit" id="js-contact-btn" class="button-md button-theme">Enviar Mensagem</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </form>     
                </div>                
            </div>
            <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-6 col-xs-12">                
                <div class="contact-details">
                    <div class="main-title-2">
                        <h3>Outros Canais</h3>
                    </div>
                    @if ($tenant->rua)
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="media-body">
                                <h4>Escritório</h4>
                                <p>
                                    {{$tenant->rua}}
                                    {{($tenant->num ? ', '.$tenant->num : '')}}  
                                    {!!($tenant->bairro ? ', '.$tenant->bairro : '')!!}  
                                    {{($tenant->cidade ? ', '.getCidade($tenant->cidade, 'cidades') : '')}}
                                </p>
                            </div> 
                        </div> 
                    @endif

                    @if ($tenant->telefone)
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="media-body">
                                <h4>Telefone</h4>
                                <p><a href="tel:{{$tenant->telefone}}" title="Telefone">{{$tenant->telefone}}</a></p>
                                @if ($tenant->celular)
                                <p><a href="tel:{{$tenant->celular}}" title="Celular"> {{$tenant->celular}}</a></p>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if ($tenant->whatsapp)
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-whatsapp"></i>
                            </div>
                            <div class="media-body">
                                <h4>WhatsApp</h4>
                                <p><a target="_blank" href="{{getNumZap($tenant->whatsapp ,'Atendimento '.$tenant->name)}}" title="WhatsApp">{{$tenant->whatsapp}}</a></p>                                
                            </div>
                        </div>
                    @endif

                    @if ($tenant->email)
                        <div class="media mb-0">
                            <div class="media-left">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="media-body">
                                <h4>E-mail</h4>
                                <p><a href="mailto:{{$tenant->email}}" title="Email">{{$tenant->email}}</a></p>                                
                            </div>
                        </div>                       
                    @endif 
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{url(asset('backend/assets/js/jquery.mask.js'))}}"></script>
<script>
    $(document).ready(function () { 
        var $telefone = $(".telefonemask");
        $telefone.mask('(99) 9999-9999', {reverse: false});               
    });
</script>
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
                url: "{{ route('web.sendEmail') }}",
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
                    $('html, body').animate({scrollTop:$('#js-contact-result').offset().top-100}, 'slow');
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
                    form.find('#js-contact-btn').html("Enviar Mensagem");                                
                }
            });

            return false;
        });

    });
</script>   
@endsection