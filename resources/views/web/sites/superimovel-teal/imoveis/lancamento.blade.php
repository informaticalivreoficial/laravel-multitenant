@extends("web.sites.{$tenant->template}.master.master")
 
@section('content')
<div class="main_property">
@if(empty($imovel))
    <h1 class="text-center text-front"><b>DESTAQUE!</b></h1>
    <div class="main_property_header bg-light py-3">
        <div class="container">
            <h1 class="text-front">Desculpe Imóvel não Localizado</h1>
            <p>Em caso de dúvida entre em contato com o suporte</p> 
        </div>
    </div>
@else
    <h1 class="text-center text-front"><b>DESTAQUE!</b></h1>
    <div class="main_property_header bg-light py-3">
        <div class="container">
            <h2 class="text-front">{{$imovel->titulo}}</h2>
            <p mb-0>{{$imovel->headline}}<br />
                <b>Referência:</b> {{$imovel->referencia}}
            </p>
        </div>
    </div>
    <div class="main_property_content py-y bg-dark text-white">
        <div class="container">
            <div class="row py-4">
                <div class="col-12 col-lg-8">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @if($imovel->images()->get()->count())
                                @foreach($imovel->images()->get() as $image)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" {!! ($loop->index == 0 ? 'class="active"' : '') !!}></li>
                                @endforeach
                            @endif
                        </ol>
                        <div class="carousel-inner">
                            @if($imovel->images()->get()->count())
                                @foreach($imovel->images()->get() as $image)
                                    <div class="carousel-item {{ ($loop->index == 0 ? 'active' : '') }}">
                                        <a href="{{ $image->getUrlImageAttribute() }}" data-title="{{ $imovel->titulo }}" data-toggle="lightbox"
                                            data-gallery="property-gallery" data-type="image">
                                            <img src="{{ $image->getUrlCroppedAttribute() }}" class="d-block w-100" alt="{{ $imovel->titulo }}">
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Próximo</span>
                        </a>
                    </div>
                                       
                    <div class="main_property_content_price pt-4">
                        @if($imovel->exibivalores == true)
                            <p class="main_property_content_price_small">IPTU: R$ {{str_replace(',00', '', $imovel->iptu)}} {{ ($imovel->condominio != '' ? '| Condomínio: R$' . str_replace(',00', '', $imovel->condominio) : '') }}</p>
                            @if(!empty($type) && $type == 'venda')
                                <p class="main_property_price_big">Valor do Imóvel: <b>R${{str_replace(',00', '', $imovel->valor_venda)}}</b></p>
                            @elseif(!empty($type) && $type == 'locacao')
                                <p class="main_property_price_big">Valor do Aluguel: <b>R${{ str_replace(',00', '', $imovel->valor_locacao) }}</b>/mês</p>
                            @else
                                @if($imovel->venda == true && !empty($imovel->valor_venda) && $imovel->valor_locacao == true && !empty($imovel->valor_locacao))
                                    <p class="main_property_price_big">Valor do Imóvel: <b>R${{ str_replace(',00', '', $imovel->valor_venda) }}</b> <br>
                                    ou Valor do Aluguel: <b>R${{ str_replace(',00', '', $imovel->valor_locacao) }}</b>/mês</p>
                                @elseif($imovel->venda == true && !empty($imovel->valor_venda))
                                    <p class="main_property_price_big">Valor do Imóvel: <b>R${{ str_replace(',00', '', $imovel->valor_venda) }}</b></p>
                                @elseif($imovel->locacao == true && !empty($imovel->valor_locacao))
                                    <p class="main_property_price_big">Valor do Aluguel: <b>R${{ str_replace(',00', '', $imovel->valor_locacao) }}</b>/mês</p>
                                @else
                                    <p class="main_properties_price text-front">Entre em contato com a nossa equipe comercial!</p>
                                @endif
                            @endif                            
                        @endif                        
                    </div>
                    <div class="main_property_content_descripition">
                        <div class="fb-share-button" data-href="{{url()->current()}}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartilhar</a></div>
                        <a style="background-color: #6ebf58;color:#fff;border:none;padding:2px 10px;margin-top:-8px" class="btn btn-front icon-whatsapp" target="_blank" href="https://web.whatsapp.com/send?text={{url()->current()}}" data-action="share/whatsapp/share">Compartilhar</a>
                        <h2 class="text-front">Conheça mais o imóvel</h2>
                        {!! $imovel->descricao !!}
                    </div>
                    <div class="main_property_content_features">
                        <h2 class="text-front">Características</h2>
                        <table class="table table-striped text-white">
                            <tbody>
                                <tr>
                                    <td>Dormitórios</td>
                                    <td>{{$imovel->dormitorios}}</td>
                                </tr>
                                <tr>
                                    <td>Suítes</td>
                                    <td>{{$imovel->suites}}</td>
                                </tr>
                                <tr>
                                    <td>Banheiros</td>
                                    <td>{{$imovel->banheiros}}</td>
                                </tr>
                                <tr>
                                    <td>Salas</td>
                                    <td>{{$imovel->salas}}</td>
                                </tr>
                                <tr>
                                    <td>Garagem</td>
                                    <td>{{$imovel->garagem}}</td>
                                </tr>
                                <tr>
                                    <td>Garagem Coberta</td>
                                    <td>{{$imovel->garagem_coberta}}</td>
                                </tr>
                                <tr>
                                    <td>Área total</td>
                                    <td>{{$imovel->area_total}}{{$imovel->medidas}}</td>
                                </tr>
                                <tr>
                                    <td>Área útil</td>
                                    <td>{{$imovel->area_util}}{{$imovel->medidas}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="main_property_content_structure">
                        <h2 class="text-front">Estrutura</h2>
                        <div class="row">
                            @if($imovel->ar_condicionado == true)
                                <span class="main_property_content_structure_item icon-check">Ar Condicionado</span>
                            @endif

                            @if($imovel->aquecedor_solar == true)
                                <span class="main_property_content_structure_item icon-check">Aquecedor Solar</span>
                            @endif

                            @if($imovel->armarionautico == true)
                                <span class="main_property_content_structure_item icon-check">Armário Náutico</span>
                            @endif

                            @if($imovel->banheira == true)
                                <span class="main_property_content_structure_item icon-check">Banheira</span>
                            @endif

                            @if($imovel->bar == true)
                                <span class="main_property_content_structure_item icon-check">Bar</span>
                            @endif

                            @if($imovel->biblioteca == true)
                                <span class="main_property_content_structure_item icon-check">Biblioteca</span>
                            @endif

                            @if($imovel->cozinha_americana == true)
                                <span class="main_property_content_structure_item icon-check">Cozinha Americana</span>
                            @endif

                            @if($imovel->cozinha_planejada == true)
                                <span class="main_property_content_structure_item icon-check">Cozinha Planejada</span>
                            @endif

                            @if($imovel->churrasqueira == true)
                                <span class="main_property_content_structure_item icon-check">Churrasqueira</span>
                            @endif

                            @if($imovel->dispensa == true)
                                <span class="main_property_content_structure_item icon-check">Despensa</span>
                            @endif

                            @if($imovel->edicula == true)
                                <span class="main_property_content_structure_item icon-check">Edicula</span>
                            @endif

                            @if($imovel->elevador == true)
                                <span class="main_property_content_structure_item icon-check">Elevador</span>
                            @endif

                            @if($imovel->escritorio == true)
                                <span class="main_property_content_structure_item icon-check">Escritório</span>
                            @endif

                            @if($imovel->espaco_fitness == true)
                                <span class="main_property_content_structure_item icon-check">Espaço Fitness</span>
                            @endif

                            @if($imovel->estacionamento == true)
                                <span class="main_property_content_structure_item icon-check">Estacionamento</span>
                            @endif

                            @if($imovel->fornodepizza == true)
                                <span class="main_property_content_structure_item icon-check">Forno de Pizza</span>
                            @endif

                            @if($imovel->lareira == true)
                                <span class="main_property_content_structure_item icon-check">Lareira</span>
                            @endif

                            @if($imovel->lavabo == true)
                                <span class="main_property_content_structure_item icon-check">Lavabo</span>
                            @endif

                            @if($imovel->lavanderia == true)
                                <span class="main_property_content_structure_item icon-check">Lavanderia</span>
                            @endif

                            @if($imovel->mobiliado == true)
                                <span class="main_property_content_structure_item icon-check">Mobiliado</span>
                            @endif

                            @if($imovel->piscina == true)
                                <span class="main_property_content_structure_item icon-check">Piscina</span>
                            @endif

                            @if($imovel->portaria24hs == true)
                                <span class="main_property_content_structure_item icon-check">Portaria 24 Horas</span>
                            @endif

                            @if($imovel->quintal == true)
                                <span class="main_property_content_structure_item icon-check">Quintal</span>
                            @endif

                            @if($imovel->sauna == true)
                                <span class="main_property_content_structure_item icon-check">Sauna</span>
                            @endif

                            @if($imovel->zeladoria == true)
                                <span class="main_property_content_structure_item icon-check">Serviço de Zeladoria</span>
                            @endif

                            @if($imovel->vista_para_mar == true)
                                <span class="main_property_content_structure_item icon-check">Vista para o Mar</span>
                            @endif

                            @if($imovel->ventilador_teto == true)
                                <span class="main_property_content_structure_item icon-check">Ventilador de Teto</span>
                            @endif
                        </div>                        
                    </div>

                    <div class="main_property_content_location py-3">
                        <p>*{{$imovel->notasadicionais}}</p>
                    </div>
                    
                    <div class="main_property_content_location mb-3">
                        <h2 class="text-front">Localização</h2>
                        <div id="map" style="width: 100%; min-height: 400px;"></div>
                    </div>
                </div>
                
                <div class="col-12 col-lg-4">
                    <a target="_blank" href="{{getNumZap($tenant->whatsapp,'Atendimento '.$tenant->nomedosite)}}" title="WhatsApp" class="btn btn-outline-success btn-lg btn-block icon-whatsapp mb-3">Converse com um corretor</a>
                    
                    <div class="main_property_contact">
                        <h2 class="bg-front text-white">Entre em contato</h2>
                        <form action="action" method="post" class="j_formsubmit text-muted" autocomplete="off">  
                            @csrf
                            <div id="js-contact-result"></div> 
                            <div class="form-group form_hide">
                                <!-- HONEYPOT -->
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
                                <textarea class="form-control" name="mensagem" rows="5">Quero ter mais informações sobre este imóvel, {{$imovel->titulo}} - {{$imovel->referencia}}</textarea>
                            </div>
                            <div class="form-group form_hide">
                                <button type="submit" class="btn btn-front btn-block text-white form_hide" id="js-contact-btn">Enviar</button>
                            </div>
                        </form>
                    </div>

                    <div class="main_property_share mt-3">
                        <h2 class="text-front">Atendimento</h2>
                        <p> 
                            @if(!empty($tenant->telefone))
                                <i class="icon-phone text-white"></i> <a href="tel:55+ {{$tenant->telefone}}" class="text-white">{{$tenant->telefone}}</a>
                            @endif

                            @if(!empty($tenant->celular))
                                <i class="icon-phone text-white"></i> <a href="tel:55+ {{$tenant->celular}}" class="text-white">{{$tenant->celular}}</a>
                            @endif                               
                        </p>
                        <p>
                           @if(!empty($tenant->whatsapp))
                                <i class="icon-whatsapp text-white"></i> <a href="tel:55+ {{$tenant->whatsapp}}" class="text-white">{{$tenant->whatsapp}}</a>
                            @endif  
                        </p>
                    </div>
                    
                    <div class="main_property_share mt-3">
                        <h2 class="text-front">Redes Sociais</h2>
                        @if(!empty($tenant->facebook))
                            <a target="_blank" href="{{$tenant->facebook}}" title="Facebook" class="btn btn-front icon-facebook icon-notext text-white"></a>
                        @endif
                        @if(!empty($tenant->twitter))
                            <a target="_blank" href="{{$tenant->twitter}}" title="Twitter" class="btn btn-front icon-twitter icon-notext text-white"></a>
                        @endif
                        @if(!empty($tenant->linkedin))
                            <a target="_blank" href="{{$tenant->linkedin}}" title="Linkedin" class="btn btn-front icon-linkedin icon-notext text-white"></a>
                        @endif
                        @if(!empty($tenant->instagram))
                            <a target="_blank" href="{{$tenant->instagram}}" title="Instagram" class="btn btn-front icon-instagram icon-notext text-white"></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
    
<div>
@endsection

@if(empty($imovel))

@else
    @section('js')
    <script>
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

            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                alwaysShowClose: true
                });
            });

        });
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYSFkpHgtfdOA9WNnUOVjt2PLlBfC9xvU&callback=markMap"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v11.0&appId=1787040554899561&autoLogAppEvents=1" nonce="1eBNUT9J"></script>
    @endsection
@endif
