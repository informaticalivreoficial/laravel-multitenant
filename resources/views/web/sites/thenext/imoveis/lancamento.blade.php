@extends("web.sites.{$tenant->template}.master.master")

@section('content')

<div class="details-banner">
    <div class="container-fluid">
        <div class="featured-slider row slide-box-btn slider" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
            @if($imovel->images()->get()->count())
                @foreach($imovel->images()->get() as $image)   
                    <div class="slide slide-box">
                        <div class="banner-img">                            
                            <img src="{{ $image->slide_lancamento }}" alt="{{$imovel->titulo}}" class="img-fluid bp">
                        </div>
                    </div>                       
                @endforeach
            @endif 
        </div>
    </div>
    <div class="breadcrumb-area-2">
        <div class="container">
            <div class="row g-0 breadcrumb-box">
                <div class="col-lg-6 col-md-12 clearfix">
                    <div class="text">
                        <h1>{{$imovel->titulo}}</h1>
                        <div class="ratings-2">
                            <span><b>Referência:</b> {{$imovel->referencia}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 text-end">
                    <h2>
                        @if ($imovel->venda == true && $imovel->locacao == true)
                            Venda/Locação
                        @elseif($imovel->venda == true && $imovel->locacao == false)
                            Venda
                        @else
                            Locação
                        @endif

                        @if($imovel->exibivalores == true)
                            <p><b>IPTU:</b> R$ {{str_replace(',00', '', $imovel->iptu)}} {!! ($imovel->condominio != '' ? '| <b>Condomínio:</b> R$' . str_replace(',00', '', $imovel->condominio) : '') !!}</p>
                            @if($imovel->venda == true && $imovel->locacao == false)
                                <p><b>Valor do Imóvel:</b> R${{str_replace(',00', '', $imovel->valor_venda)}}</p>
                            @elseif($imovel->locacao == true && $imovel->venda == false)
                                <p><b>Valor do Aluguel:</b> R${{ str_replace(',00', '', $imovel->valor_locacao) }}/mês</p>
                            @else
                                @if($imovel->venda == true && !empty($imovel->valor_venda) && $imovel->valor_locacao == true && !empty($imovel->valor_locacao))
                                    <p><b>Valor do Imóvel:</b> R${{ str_replace(',00', '', $imovel->valor_venda) }} <br>
                                        <b>ou Valor do Aluguel:</b> R${{ str_replace(',00', '', $imovel->valor_locacao) }}/mês</p>
                                @elseif($imovel->venda == true && !empty($imovel->valor_venda))
                                    <p><b>Valor do Imóvel:</b> R${{ str_replace(',00', '', $imovel->valor_venda) }}</p>
                                @elseif($imovel->locacao == true && !empty($imovel->valor_locacao))
                                    <p><b>Valor do Aluguel:</b> R${{ str_replace(',00', '', $imovel->valor_locacao) }}/mês</p>
                                @else
                                    <p>Entre em contato com a nossa equipe comercial!</p>
                                @endif
                            @endif                            
                        @endif
                    </h2>
                    <div class="cover-buttons">
                        <ul class="clearfix">
                            @if ($imovel->dormitorios)
                                <li>
                                    <i class="flaticon-bed"></i> {{$imovel->dormitorios}} Dormitórios
                                </li>
                            @endif
                            @if ($imovel->suites)
                                <li>
                                    <i class="flaticon-bed"></i> {{$imovel->suites}} Suítes
                                </li>
                            @endif
                            @if ($imovel->banheiros)
                                <li>
                                    <i class="flaticon-bed"></i> {{$imovel->banheiros}} Banheiros
                                </li>
                            @endif
                            @if ($imovel->area_total)
                                <li>
                                    <i class="flaticon-square-layouting-with-black-square-in-east-area"></i> {{$imovel->area_total}}{{$imovel->medidas}} Área total
                                </li>
                            @endif  
                            @if ($imovel->area_util)
                                <li>
                                    <i class="flaticon-square-layouting-with-black-square-in-east-area"></i> {{$imovel->area_util}}{{$imovel->medidas}} Área útil
                                </li>
                            @endif                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Details banner end -->

<!-- Properties details page start -->
<div class="content-area properties-details-page">
    <div class="container">
        <div class="row">
            @if($imovel->images()->get()->count())
                @foreach($imovel->images()->get() as $image)                    
                    <div class="col-lg-2 p-1">
                        <div class="portfolio-item car-magnify-gallery" style="margin-bottom: 0px;">
                            <a href="{{ $image->url_image }}">
                                <img src="{{ $image->url_cropped_slide_gallery }}" class="img-responsive" alt="{{$imovel->titulo}}">
                            </a>
                            <div class="portfolio-content">
                                <div class="portfolio-content-inner">
                                    
                                </div>
                            </div>
                        </div>  
                    </div>                              
                @endforeach
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Properties details section start -->
                <div class="Properties-details-section sidebar-widget sw2">

                    <!-- Property description start -->
                    <div class="property-description tabbing tabbing-box tb2">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Descrição</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Características</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Estrutura</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="accordion accordion-flush" id="accordionFlushExample7">
                                    <div class="accordion-item">
                                        <div class="properties-description">
                                            {!! $imovel->descricao !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="accordion accordion-flush" id="accordionFlushExample2">
                                    <div class="accordion-item">
                                        <div class="properties-condition">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="condition">
                                                        @if ($imovel->dormitorios)
                                                            <li>
                                                                <i class="flaticon-bed"></i> {{$imovel->dormitorios}} Dormitórios
                                                            </li>
                                                        @endif
                                                        @if ($imovel->suites)
                                                            <li>
                                                                <i class="flaticon-bed"></i> {{$imovel->suites}} Suítes
                                                            </li>
                                                        @endif                                                        
                                                        @if ($imovel->area_total)
                                                            <li>
                                                                <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>{{$imovel->area_total}}{{$imovel->medidas}} Área total
                                                            </li>
                                                        @endif                                                        
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="condition">
                                                        @if ($imovel->banheiros)
                                                            <li>
                                                                <i class="flaticon-bed"></i> {{$imovel->banheiros}} Banheiros
                                                            </li>
                                                        @endif
                                                        @if ($imovel->salas)
                                                            <li>
                                                                <i class="flaticon-building"></i> {{$imovel->salas}} Salas
                                                            </li>
                                                        @endif                                                       
                                                        @if ($imovel->area_util)
                                                            <li>
                                                                <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>{{$imovel->area_util}}{{$imovel->medidas}} Área útil
                                                            </li>
                                                        @endif                                                       
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="condition">
                                                        @if ($imovel->garagem)
                                                            <li>
                                                                <i class="flaticon-vehicle"></i> {{$imovel->garagem}} Garagem
                                                            </li>
                                                        @endif
                                                        @if ($imovel->garagem_coberta)
                                                            <li>
                                                                <i class="flaticon-vehicle"></i> {{$imovel->garagem_coberta}} Garagem coberta
                                                            </li>
                                                        @endif                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="accordion accordion-flush" id="accordionFlushExample3">
                                    <div class="accordion-item">
                                        <div class="properties-amenities">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="amenities">
                                                        @if($imovel->ar_condicionado == true)
                                                            <li><i class="fa fa-check-square"></i>Ar Condicionado></li>
                                                        @endif
    
                                                        @if($imovel->aquecedor_solar == true)
                                                            <li><i class="fa fa-check-square"></i>Aquecedor Solar</li>
                                                        @endif
    
                                                        @if($imovel->armarionautico == true)
                                                            <li><i class="fa fa-check-square"></i>Armário Náutico</li>
                                                        @endif
    
                                                        @if($imovel->balcaoamericano == true)
                                                            <li><i class="fa fa-check-square"></i>Balcão Americano</li>
                                                        @endif
    
                                                        @if($imovel->banheira == true)
                                                            <li><i class="fa fa-check-square"></i>Banheira</li>
                                                        @endif 
                                                        
                                                        @if($imovel->elevador == true)
                                                            <li><i class="fa fa-check-square"></i>Elevador</li>
                                                        @endif
    
                                                        @if($imovel->escritorio == true)
                                                            <li><i class="fa fa-check-square"></i>Escritório</li>
                                                        @endif
    
                                                        @if($imovel->espaco_fitness == true)
                                                            <li><i class="fa fa-check-square"></i>Espaço Fitness</li>
                                                        @endif
    
                                                        @if($imovel->estacionamento == true)
                                                            <li><i class="fa fa-check-square"></i>Estacionamento</li>
                                                        @endif
    
                                                        @if($imovel->fornodepizza == true)
                                                            <li><i class="fa fa-check-square"></i>Forno de Pizza</li>
                                                        @endif
    
                                                        @if($imovel->quadrapoliesportiva == true)
                                                            <li><i class="fa fa-check-square"></i>Quadra poliesportiva</li>
                                                        @endif
    
                                                        @if($imovel->quintal == true)
                                                            <li><i class="fa fa-check-square"></i>Quintal</li>
                                                        @endif
    
                                                        @if($imovel->sauna == true)
                                                            <li><i class="fa fa-check-square"></i>Sauna</li>
                                                        @endif
    
                                                        @if($imovel->saladetv == true)
                                                            <li><i class="fa fa-check-square"></i>Sala de TV</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="amenities">
                                                        @if($imovel->banheirosocial == true)
                                                            <li><i class="fa fa-check-square"></i>Banheiro Social</li>
                                                        @endif
    
                                                        @if($imovel->bar == true)
                                                            <li><i class="fa fa-check-square"></i>Bar Social</li>
                                                        @endif
    
                                                        @if($imovel->biblioteca == true)
                                                            <li><i class="fa fa-check-square"></i>Biblioteca</li>
                                                        @endif
    
                                                        @if($imovel->brinquedoteca == true)
                                                            <li><i class="fa fa-check-square"></i>Brinquedoteca</li>
                                                        @endif
    
                                                        @if($imovel->condominiofechado == true)
                                                            <li><i class="fa fa-check-square"></i>Condomínio fechado</li>
                                                        @endif 
                                                        
                                                        @if($imovel->geradoreletrico == true)
                                                            <li><i class="fa fa-check-square"></i>Gerador elétrico</li>
                                                        @endif
    
                                                        @if($imovel->interfone == true)
                                                            <li><i class="fa fa-check-square"></i>Interfone</li>
                                                        @endif
    
                                                        @if($imovel->jardim == true)
                                                            <li><i class="fa fa-check-square"></i>Jardim</li>
                                                        @endif
    
                                                        @if($imovel->lareira == true)
                                                            <li><i class="fa fa-check-square"></i>Lareira</li>
                                                        @endif
    
                                                        @if($imovel->lavabo == true)
                                                            <li><i class="fa fa-check-square"></i>Lavabo</li>
                                                        @endif
    
                                                        @if($imovel->salaodefestas == true)
                                                            <li><i class="fa fa-check-square"></i>Salão de Festas</li>
                                                        @endif
    
                                                        @if($imovel->salaodejogos == true)
                                                            <li><i class="fa fa-check-square"></i>Salão de Jogos</li>
                                                        @endif
    
                                                        @if($imovel->zeladoria == true)
                                                            <li><i class="fa fa-check-square"></i>Serviço de Zeladoria</li>
                                                        @endif
    
                                                        @if($imovel->sistemadealarme == true)
                                                            <li><i class="fa fa-check-square"></i>Sistema de alarme</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="amenities">
                                                        @if($imovel->cozinha_americana == true)
                                                            <li><i class="fa fa-check-square"></i>Cozinha Americana</li>
                                                        @endif
    
                                                        @if($imovel->cozinha_planejada == true)
                                                            <li><i class="fa fa-check-square"></i>Cozinha Planejada</li>
                                                        @endif
    
                                                        @if($imovel->churrasqueira == true)
                                                            <li><i class="fa fa-check-square"></i>Churrasqueira</li>
                                                        @endif
    
                                                        @if($imovel->dispensa == true)
                                                            <li><i class="fa fa-check-square"></i>Despensa</li>
                                                        @endif
    
                                                        @if($imovel->edicula == true)
                                                            <li><i class="fa fa-check-square"></i>Edicula</li>
                                                        @endif    
                                                        
                                                        @if($imovel->lavanderia == true)
                                                            <li><i class="fa fa-check-square"></i>Lavanderia</li>
                                                        @endif
    
                                                        @if($imovel->mobiliado == true)
                                                            <li><i class="fa fa-check-square"></i>Mobiliado</li>
                                                        @endif
    
                                                        @if($imovel->pertodeescolas == true)
                                                            <li><i class="fa fa-check-square"></i>Perto de Escolas</li>
                                                        @endif
    
                                                        @if($imovel->piscina == true)
                                                            <li><i class="fa fa-check-square"></i>Piscina</li>
                                                        @endif
    
                                                        @if($imovel->portaria24hs == true)
                                                            <li><i class="fa fa-check-square"></i>Portaria 24 Horas</li>
                                                        @endif
    
                                                        @if($imovel->permiteanimais == true)
                                                            <li><i class="fa fa-check-square"></i>Permite animais</li>
                                                        @endif
    
                                                        @if($imovel->varandagourmet == true)
                                                            <li><i class="fa fa-check-square"></i>Varanda Gourmet</li>
                                                        @endif
    
                                                        @if($imovel->vista_para_mar == true)
                                                            <li><i class="fa fa-check-square"></i>Vista para o Mar</li>
                                                        @endif
    
                                                        @if($imovel->ventilador_teto == true)
                                                            <li><i class="fa fa-check-square"></i>Ventilador de Teto</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Property description end -->
                </div>
                <!-- Properties details section end -->

                <div class="properties-description mb-30">
                    <hr>                        
                    <p>*{{$imovel->notasadicionais}}</p>
                </div>

                @if ($imovel->exibirendereco == true)
                    <div class="location sidebar-widget sw2">
                        <div class="map">
                            <div class="main-title-2">
                                <h1><span>Localização</span></h1>
                            </div>
                            <div id="map" style="width: 100%; min-height: 400px;"></div>
                        </div>
                    </div>
                @endif               
                
                <!-- Contact 1 start -->
                <div class="contact-1 sidebar-widget mb-30">
                    <div class="main-title-2">
                        <h1>Consultar este imóvel</h1>
                    </div>
                    <div class="contact-form">
                        <form action="" method="POST" class="j_formsubmit" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div id="js-contact-result"></div>
                                    <!-- HONEYPOT -->
                                    <input type="hidden" class="noclear" name="bairro" value="" />
                                    <input type="text" class="noclear" style="display: none;" name="cidade" value="" />
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group name">
                                        <input type="text" name="nome" class="form-control" placeholder="Nome">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group email">
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>                                
                                <div class="col-md-12">
                                    <div class="form-group message">
                                        <textarea  class="form-control" name="mensagem">Quero ter mais informações sobre este imóvel, {{$imovel->titulo}} - {{$imovel->referencia}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="send-btn">
                                        <button type="submit" id="js-contact-btn" class="button-md button-theme btn-3">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Contact 1 end -->
            </div>
            
        </div>
    </div>
</div>

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
                    $('html, body').animate({scrollTop:$('#js-contact-result').offset().top-40}, 'slow');
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
                    form.find('#js-contact-btn').html("Enviar");                                
                }

            });

            return false;
        });        

    });

    function markMap() {

        var locationJson = $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address={{ $imovel->rua }},+{{ $imovel->num }}+{{ getCidadeNome($imovel->cidade, 'cidades') }}+{{ $imovel->bairro }}&key=AIzaSyCYSFkpHgtfdOA9WNnUOVjt2PLlBfC9xvU', function(response){

            lat = response.results[0].geometry.location.lat;
            lng = response.results[0].geometry.location.lng;

            var citymap = {
                property: {
                    center: {lat: lat, lng: lng},
                    population: 100
                }
            };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: {lat: lat, lng: lng},
                mapTypeId: 'terrain'
            });

            for (var city in citymap) {
                var cityCircle = new google.maps.Circle({
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#FF0000',
                    fillOpacity: 0.35,
                    map: map,
                    center: citymap[city].center,
                    radius: Math.sqrt(citymap[city].population) * 100
                });
            }
        });
    }

    
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYSFkpHgtfdOA9WNnUOVjt2PLlBfC9xvU&callback=markMap"></script>
@endsection