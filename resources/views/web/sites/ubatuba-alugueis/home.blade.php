@extends("web.sites.{$tenant->template}.master.master")

@section('content')
    <section class="hero-section" style="padding-bottom: 10px;background: url('{{url(asset('frontend/'.$tenant->template.'/images/hero-bg.png'))}}')" id="home">
        @if (!empty($slides) && $slides->count() > 0)
            <div class="text-block">            
                <div class="owl-carousel " data-slide="1" data-slide-res="1" data-autoplay="true" data-nav="false" data-dots="true" data-space="0" data-loop="true" data-speed="800">
                    @foreach ($slides as $key => $slide)                     
                    <div class="item">
                        <a {{($slide->target == 1 ? 'target="_blank"' : '')}} href="{{$slide->link}}">
                            <img src="{{$slide->getimagem()}}" alt="{{$slide->titulo}}" class="img-fluid">
                        </a>
                    </div>
                    @endforeach
                </div>                
            </div>
        @endif
    </section>

    <!--Localização-->
    <section class="location-section pad-tb" id="localizacao">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="common-heading">
                        <h2>Localização</h2>          
                    </div>
                </div>
            </div>
            <div class="row mt45">
                <div class="col-lg-7">
                    {!!$tenant->mapa_google!!}
                </div>
                <div class="col-lg-5">
                    <h4 class="h4-heading">Distâncias e serviços:</h4>
                    <ul class="loc-adlit">
                        <li>Rodoviária <span>3.0 Km</span></li>
                        <li>SuperMercado <span>3.3 Km</span></li>
                        <li>Delegacia <span>3.0 Km</span></li>
                        <li>Restaurantes <span>3.0 Km</span></li>
                        <li>Farmácia <span>190 mts</span></li>
                        <li>Praia <span>3.9 Km</span></li>
                        <li>Aquário de Ubatuba<span> 5.1 Km</span></li>
                        <li>Projeto Tamar <span>4.8 Km</span></li>
                        <li>Igreja Matriz <span>3.9 Km</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Localização-->
    
    @if (!empty($destaque) && $destaque->count() > 0)
        <section class="feature-section pad-tb">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                <div class="common-heading">
                    <h3>{{$destaque->titulo}}</h3>
                    <p>{{$destaque->headline}}</p>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="about-feature">
                    <div class="row mt45">
                    <div class="col-lg-5">
                        <h4 class="h4-heading">Facilidades</h4>
                        {!!$destaque->descricao!!}
                        <ul class="list-features">
                            @if ($destaque->churrasqueira)
                                <li class="span2"><i class="icon-check-sign"></i>Churrasqueira</li>
                            @endif 
                            @if ($destaque->ventilador_teto)
                                <li class="span2"><i class="icon-check-sign"></i>Ventilador de teto</li>
                            @endif 
                            @if ($destaque->geladeira)
                                <li class="span2"><i class="icon-check-sign"></i>Geladeira</li>
                            @endif 
                            @if ($destaque->quintal)
                                <li class="span2"><i class="icon-check-sign"></i>Quintal</li>
                            @endif 
                            @if ($destaque->mobiliado)
                                <li class="span2"><i class="icon-check-sign"></i>Mobiliado</li>
                            @endif 
                            @if ($destaque->internet)
                                <li class="span2"><i class="icon-check-sign"></i>Wi-Fi</li>
                            @endif 
                            @if ($destaque->pertodeescolas)
                                <li class="span2"><i class="icon-check-sign"></i>Perto de Escolas</li>
                            @endif                        
                        </ul>
                    </div>
                    <div class="col-lg-7">
                        <div class="feature-image">
                            <img src="{{$destaque->cover()}}" alt="{{$destaque->titulo}}" class="img-fluid">
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>

        @if($destaque->images()->get()->count())
            <section class="gallery-section pad-tb" id="fotos">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="common-heading">
                                <h2>Fotos</h2>          
                            </div>
                        </div>
                    </div>
                    <div class="row img-gallery-magnific m-spc98 mt15">
                        @foreach($destaque->images()->get() as $image) 
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="gallery-">
                                <a class="image-popup-gallery" href="{{ $image->url_image }}" title="{{$destaque->titulo}}">
                                    <img src="{{ $image->url_cropped_slide_gallery }}" alt="{{$destaque->titulo}}" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        @endforeach                        
                    </div>
                </div>
            </section>
        @endif

        <div class="enquire-form pad-tb" id="reservar">
            <div class="container">
                <div class="row">      
                    <div class="col-lg-12 pl0" id="form">
                        <div class="form-block">
                            <div class="form-header">
                                <h2><span>Pré-reserva</span></h2>
                            </div>
                            <form action="" method="post" class="j_formsubmit" autocomplete="off">
                                @csrf
                                <div class="fieldsets"> 
                                    <div class="row">  
                                        <div class="col-12">    
                                            <div id="js-contact-result"></div>
                                        </div>                 
                                    </div>
                                    <div class="row">      
                                        <!-- HONEYPOT -->
                                        <input type="hidden" class="noclear" name="bairro" value="" />
                                        <input type="text" class="noclear" style="display: none;" name="cidade1" value="" />               
                                    </div> 
                                    <div class="row p-2 form_hide" style="margin-top: 10px;">
                                        <div class="col-12 pb-3">    
                                            <h5>Tipo de Locação</h5> 
                                        </div>    

                                        <div class="col-6"> 
                                           <input type="radio" class="check_fisica" style="width:30px;" name="tipo_reserva" value="0" checked /><span style="color: #232323;" class="check_fisica">Pessoa Física</span>
                                        </div>  
                                        <div class="col-6">                                
                                            <input type="radio" class="check_empresa" style="width:30px;" name="tipo_reserva" value="1" /><span style="color: #232323;" class="check_empresa">Empresa</span>                                
                                        </div> 
                                    </div>
                                    <div class="row div_empresa form_hide" style="margin-top: 10px;display:none;">                                           
                                        <div class="col-12">
                                            <h5>Dados da Empresa</h5>
                                        </div>                         
                                        <div class="col-lg-6" style="margin-top: 20px;">                                            
                                            <label><b>Nome da Empresa</b><span style="color:#FF0000;">*</span></label></label>
                                            <input type="text" name="empresa_nome"/>                                            
                                        </div>
                                        <div class="col-lg-2" style="margin-top: 20px;">                                            
                                            <label><b>CNPJ</b></label>
                                            <input type="text" name="cnpj" class="cnpjmask"/>                                            
                                        </div>
                                        <div class="col-lg-2" style="margin-top: 20px;">                                            
                                            <label><b>Telefone Fixo</b></label>
                                            <input type="text" name="telefone_empresa" class="telefonemask"/>                                            
                                        </div>
                                        <div class="col-lg-2" style="margin-top: 20px;">                                            
                                            <label><b>Telefone Móvel</b><span style="color:#FF0000;">*</span></label>
                                            <input type="text" name="telefone_empresa" class="telefonemask"/>                                            
                                        </div>
                                    </div>
                                    <div class="row form_hide" style="margin-top: 10px;">
                                        <div class="col-lg-12 pb-3">
                                            <h5>Informações Pessoais</h5>
                                        </div>
                                        <div class="col-md-6 col-lg-5">                                  
                                            <label><b>Nome</b></label>
                                            <input type="text" name="nome">
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <label><b>Email</b><span style="color:#FF0000;">*</span></label>
                                            <input type="text" name="email">
                                        </div>   
                                        <div class="col-md-6 col-lg-2">
                                            <label><b>Telefone Fixo</b></label>
                                            <input type="text" class="telefonemask" name="telefone">
                                        </div>
                                        <div class="col-md-6 col-lg-2">
                                            <label><b>Telefone Móvel</b><span style="color:#FF0000;">*</span></label>
                                            <input type="text" class="telefonemask" name="whatsapp">
                                        </div>
                                    </div> 
                                    <div class="row form_hide" style="margin-top: 10px;">
                                        <div class="col-lg-12 pb-3">
                                            <h5>Endereço</h5>
                                        </div>
                                        <div class="col-md-6 col-lg-3">                                  
                                            <label><b>Estado</b></label>
                                            <select name="uf" class="selectReservas" id="state-dd">
                                                @if(!empty($estados))
                                                    <option value="">Selecione</option>
                                                    @foreach($estados as $estado)
                                                        <option value="{{$estado->estado_id}}">{{$estado->estado_nome}}</option>
                                                    @endforeach                                                                        
                                                @endif                                
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <label><b>Cidade</b></label>
                                            <select id="city-dd" class="selectReservas" name="cidade">
                                                <option value="">Selecione o Estado</option>
                                            </select>
                                        </div>   
                                        <div class="col-md-6 col-lg-4">
                                            <label><b>Rua</b></label>
                                            <input type="text" name="endereco">
                                        </div>
                                        <div class="col-md-6 col-lg-2">
                                            <label><b>Número</b></label>
                                            <input type="text" name="num">
                                        </div>
                                    </div>                        
                                    <div class="row form_hide" style="margin-top: 10px;">
                                        <div class="col-md-6 col-lg-5">                                  
                                            <label><b>Bairro</b></label>
                                            <input type="text" name="bairro">
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <label><b>Complemento</b></label>
                                            <input type="text" name="complemento">
                                        </div>   
                                        <div class="col-md-6 col-lg-2">
                                            <label><b>CEP</b></label>
                                            <input type="text" class="cepmask" name="cep">
                                        </div>
                                        <div class="col-md-6 col-lg-2">
                                            <label><b>Número</b></label>
                                            <input type="text" name="num">
                                        </div>
                                    </div>                        
                                    <div class="row form_hide" style="margin-top: 10px;">     
                                        <div class="col-lg-12 pb-3">
                                            <h5>Informações da Reserva</h5>
                                        </div>  
                                        <div class="col-md-6 col-lg-4">
                                            <label><b>Qtd. de Pessoas</b></label>
                                            <select name="num_adultos" class="selectReservas">                                     
                                                @for($i = 1; $i <= 10; $i++)
                                                    <option value="{{$i}}" {{(!empty($dadosForm['num_adultos']) && $i == $dadosForm['num_adultos'] ? 'selected' : ($i == 0 ? 'selected' : ''))}}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>                           
                                        <div class="col-md-6 col-lg-4">
                                            <label><b>Checkin</b><span style="color:#FF0000;">*</span></label>
                                            <input type="text" data-language='pt-BR' class="datepicker-here" data-date-format="dd/mm/yyyy" name="checkin" value="{{(!empty($dadosForm['checkini']) ? $dadosForm['checkini'] : '')}}"/>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label><b>Checkout</b><span style="color:#FF0000;">*</span></label>
                                            <input type="text" data-language='pt-BR' class="datepicker-here" data-date-format="dd/mm/yyyy" name="checkout" value="{{(!empty($dadosForm['checkouti']) ? $dadosForm['checkouti'] : '')}}"/>
                                        </div>
                                    </div>                          
                                    <div class="row form_hide">      
                                        <div class="col-lg-12">
                                            <label><b>Informações adicionais</b></label>
                                            <textarea rows="4" name="mensagem"></textarea>
                                        </div>                
                                    </div>
                                </div>
                                <div class="fieldsets form_hide"> 
                                    <button type="submit" id="js-contact-btn">Enviar Agora</button> 
                                </div>
                                <p class="trm form_hide"><i class="fas fa-lock"></i>Não enviamos spam, respeitamos sua privacidade.</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('css')
<link href="{{url(asset('backend/plugins/airdatepicker/css/datepicker.min.css'))}}" rel="stylesheet" type="text/css">
    <style>
        .owl-dots{
            display: none !important;
        }
  
    </style>
@endsection

@section('js')
    <script src="{{url(asset('backend/plugins/airdatepicker/js/datepicker.min.js'))}}"></script>
    <script src="{{url(asset('backend/plugins/airdatepicker/js/i18n/datepicker.pt-BR.js'))}}"></script>
    <script src="{{url(asset('backend/assets/js/jquery.mask.js'))}}"></script>
  
    <script>
        $(document).ready(function () { 
            var $cepmask = $(".cepmask");
            $cepmask.mask('99999-999', {reverse: false});
            var $cnpjmask = $(".cnpjmask");
            $cnpjmask.mask('99.999.999/9999-99', {reverse: false});
            var $celularmask = $(".celularmask");
            $celularmask.mask('(99) 99999-9999', {reverse: false});
            var $telefonemask = $(".telefonemask");
            $telefonemask.mask('(99) 9999-9999', {reverse: false});
        });
    </script>
    <script>
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //$('.div_empresa').css("display", "none");

            $('.check_empresa').click(function() {                       
                $('.div_empresa').css("display", "flex");         
                $( ".check_empresa" ).prop( "checked", true );         
                $( ".check_fisica" ).prop( "checked", false );         
            });

            $('.check_fisica').click(function() {                       
                $('.div_empresa').css("display", "none");
                $( ".check_empresa" ).prop( "checked", false );         
                $( ".check_fisica" ).prop( "checked", true );        
            });

            $("#city-dd").attr("disabled", true);
            $('#state-dd').on('change', function () {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{route('web.fetchCity')}}",
                    type: "POST",
                    data: {
                        estado_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $("#city-dd").attr("disabled", false);
                        $('#city-dd').html('<option value="">Selecione a cidade</option>');
                        $.each(res.cidades, function (key, value) {
                            $("#city-dd").append('<option value="' + value
                                .cidade_id + '">' + value.cidade_nome + '</option>');
                        });
                    }
                });            
            });

            $(function(){
                $('.j_formsubmit').submit(function (){
                    var form = $(this);
                    var dataString = $(form).serialize();

                    $.ajax({
                        url: "{{ route('web.acomodacaoSend') }}",
                        data: dataString,
                        type: 'GET',
                        dataType: 'JSON',
                        beforeSend: function(){
                            $("#js-contact-btn").attr("disabled", true);
                            $('#js-contact-btn').html("Carregando...");                
                            $('.alert').fadeOut(500, function(){
                                $(this).remove();
                            });
                        },
                        success: function(resposta){
                            $('html, body').animate({scrollTop:$('#js-contact-result').offset().top-130}, 'slow');
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
                            $("#js-contact-btn").attr("disabled", false);
                            $('#js-contact-btn').html('Enviar Agora');                                
                        }
                    });
                    return false;
                });
            });            
    
        });
    </script> 
@endsection