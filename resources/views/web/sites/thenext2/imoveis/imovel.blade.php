@extends("web.sites.{$tenant->template}.master.master")

@section('content')

<div class="sub-banner overview-bgi" style="background: rgba(0, 0, 0, 0.04) url({{$tenant->gettopodosite()}}) top left repeat;">
    <div class="overlay">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>{{$imovel->titulo}}</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{route('web.home')}}">Início</a></li>
                    <li class="active">Imóveis -  {{$imovel->titulo}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Properties details page start -->
<div class="properties-details-page content-area">
    <div class="container">
        <div class="row mb-50">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <!-- Header -->
                <div class="heading-properties clearfix sidebar-widget">
                    <div class="pull-left">
                        <h3>{{$imovel->titulo}}</h3>
                        <p>
                            <i class="fa fa-map-marker"></i>{{$imovel->bairro}} - {{getCidadeNome($imovel->cidade, 'cidades')}}
                        </p>
                    </div>
                    <div class="pull-right">
                        <h3>
                            <span>
                                @if($imovel->exibivalores == true)
                                    @if($imovel->venda == true && $imovel->locacao == false)
                                        Venda: R${{str_replace(',00', '', $imovel->valor_venda)}}
                                    @elseif($imovel->locacao == true && $imovel->venda == false)
                                        Aluguel: R${{ str_replace(',00', '', $imovel->valor_locacao) }}/mês
                                    @else
                                        @if($imovel->venda == true && !empty($imovel->valor_venda) && $imovel->valor_locacao == true && !empty($imovel->valor_locacao))
                                            Venda: R${{ str_replace(',00', '', $imovel->valor_venda) }} <br>
                                                ou Aluguel: R${{ str_replace(',00', '', $imovel->valor_locacao) }}/mês
                                        @elseif($imovel->venda == true && !empty($imovel->valor_venda))
                                            Venda: R${{ str_replace(',00', '', $imovel->valor_venda) }}
                                        @elseif($imovel->locacao == true && !empty($imovel->valor_locacao))
                                            Aluguel: R${{ str_replace(',00', '', $imovel->valor_locacao) }}/mês
                                        @else
                                        Sob Consulta
                                        @endif
                                    @endif
                                @endif
                            </span>
                        </h3>
                        <h5>
                            Referência: {{$imovel->referencia}} - 
                            <span>
                                @if ($imovel->venda == true && $imovel->locacao == true)
                                    Venda/Locação
                                @elseif($imovel->venda == true && $imovel->locacao == false)
                                    Venda
                                @else
                                    Locação
                                @endif
                            </span>
                        </h5>
                    </div>
                </div>
                <!-- Properties details section start -->
                <div class="sidebar-widget mb-40">
                    <!-- Properties description start -->
                    <div class="properties-description mb-40 ">
                        <div class="property-img">
                            <img class="imgimovel" src="{{$imovel->coverSlideGallery()}}" alt="{{$imovel->titulo}}">
                            <div class="property-overlay">
                                @if($imovel->images()->get()->count())
                                    <div class="property-magnify-gallery">
                                        <a style="font-size:22px;line-height: 46px;width: 56px; height: 56px;" href="{{$imovel->nocover()}}" class="overlay-link"><i class="fa fa-expand"></i></a>
                                        @foreach($imovel->images()->get() as $image)  
                                            <a href="{{ $image->url_image }}" class="hidden"></a>                                                           
                                        @endforeach
                                    </div>
                                @endif                               
                            </div>
                            <p>{{$imovel->legendaimgcapa ?? ''}}</p>
                        </div>
                        <div class="main-title-2">
                            <h1 style="margin-top:10px;"><span>Informações</span></h1>
                            <br />
                        <!-- Social list -->
                        <div id="shareIcons"></div>
                    
                        </div>                        
                    </div>
                    <!-- Properties description end -->
                    
                    <div class="panel-box properties-panel-box Property-description">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default" data-toggle="tab" aria-expanded="true">Descrição</a></li>
                            <li class=""><a href="#tab2default" data-toggle="tab" aria-expanded="false">Condições do Imóvel</a></li>
                            <li class=""><a href="#tab3default" data-toggle="tab" aria-expanded="false">Acessórios</a></li>                                                    
                        </ul>
                        <div class="panel with-nav-tabs panel-default">
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="tab1default">                                        
                                        {!! $imovel->descricao !!}
                                    </div>
                                    <div class="tab-pane fade features" id="tab2default">
                                        <!-- Properties condition start -->
                                        <div class="properties-condition">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="condition">
                                                        @if ($imovel->dormitorios)
                                                            <li>
                                                                <i class="fa fa-check-square"></i> 
                                                                <span>Dormitórios: {{$imovel->dormitorios}}</span>
                                                            </li>
                                                        @endif
                                                        @if ($imovel->banheiros)
                                                            <li>
                                                                <i class="fa fa-check-square"></i> 
                                                                <span>Banheiros: {{$imovel->banheiros}}</span>
                                                            </li>
                                                        @endif
                                                        @if($imovel->exibivalores == true)
                                                            <li>
                                                                <i class="fa fa-check-square"></i>
                                                                <span>Valor IPTU: R${{str_replace(',00', '', $imovel->iptu)}}</span>
                                                            </li>
                                                        @endif                                                                      
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="condition">
                                                        @if ($imovel->area_total)
                                                            <li>
                                                                <i class="fa fa-check-square"></i>
                                                                <span>Área Total:{{$imovel->area_total}}{{$imovel->medidas}}</span>
                                                            </li>
                                                        @endif
                                                        @if ($imovel->area_util)
                                                            <li>
                                                                <i class="fa fa-check-square"></i>
                                                                <span>Área Construída:{{$imovel->area_util}}{{$imovel->medidas}}</span>
                                                            </li>
                                                        @endif
                                                        @if($imovel->exibivalores == true)
                                                            <li>
                                                                <i class="fa fa-check-square"></i>
                                                                <span>Condomínio: R${{str_replace(',00', '', $imovel->condominio)}}</span>
                                                            </li>
                                                        @endif                                                                       
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="condition">
                                                        @if ($imovel->garagem)
                                                            <li>
                                                                <i class="fa fa-check-square"></i> 
                                                                <span>Garagem:{{$imovel->garagem}}</span>
                                                            </li>
                                                        @endif
                                                        @if ($imovel->garagem_coberta)
                                                            <li>
                                                                <i class="fa fa-check-square"></i> 
                                                                <span>Garagem coberta:{{$imovel->garagem_coberta}}</span>
                                                            </li>
                                                        @endif                                                                                          
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade technical" id="tab3default">                                       
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
                    
                    @if (!empty($imovel->notasadicionais))
                        <hr />
                        <p style="font-size: 12px;width:100%;">{{$imovel->notasadicionais}}</p>
                    @endif

                    @if ($imovel->exibirendereco == true)
                        <hr />
                        <div class="location sidebar-widget">
                            <div class="map">
                                <!-- Main Title 2 -->
                                <div class="main-title-2">
                                    <h1><span>Localização</span></h1>
                                </div>
                                <div id="map" class="contact-map" style="position: relative; overflow: hidden;">
                                    <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px;">
                                        {!! $imovel->mapadogoogle !!}
                                    </div>
                                </div>    
                            </div>    
                        </div>
                    @endif
                    
                    <hr />
                    
                    <div class="contact-1">
                        <div class="contact-form">
                            <!-- Main Title 2 -->
                            <div class="main-title-2">
                                <h1><span>Consultar este imóvel</span></h1>
                            </div>
                            <form id="contact_form" action="" method="post" class="j_formsubmit" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div id="js-contact-result"></div>
                                        <!-- HONEYPOT -->
                                        <input type="hidden" class="noclear" name="bairro" value="" />
                                        <input type="text" class="noclear" style="display: none;" name="cidade" value="" />
                                    </div>
                                </div>
                                <div class="row form_hide">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group fullname">                                            
                                            <input type="text" name="nome" class="input-text" placeholder="Nome"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group enter-email">
                                            <input type="email" name="email" class="input-text"  placeholder="E-mail"/>
                                        </div>
                                    </div>                                  
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group message">
                                            <textarea class="input-text" name="mensagem" placeholder="Mensagem">Quero ter mais informações sobre este imóvel, {{$imovel->titulo}} - {{$imovel->referencia}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group send-btn mb-0">
                                            <button type="submit" class="button-md button-theme" id="js-contact-btn">Consultar Agora</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>                    
                </div>
                              
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <!-- Sidebar start -->
                <div class="sidebar right">
                    <!-- ABUSCA AVANÇADA -->
                    <div class="advabced-search hidden-lg hidden-md" style="margin-bottom: 30px;">    
                    <a href="{{route('web.pesquisar-imoveis')}}">
                        <button class="search-button">Buscar Imóveis</button>
                    </a>    
                    </div>
                    <!-- ABUSCA AVANÇADA -->
                    
                    
                    <!-- Search contents sidebar start -->
                    <div class="sidebar-widget hidden-sm hidden-xs">
                        <div class="main-title-2">
                            <h1><span>Busca Avançada</span></h1>
                        </div>

                        <form method="post" action="{{ route('web.filter') }}"> 
                           
                        <div class="form-group">
                            <label for="search">Alugar ou Comprar?</label>
                            <select class="search-fields" name="filter_search" id="search" title="Escolha..." data-index="1" data-action="{{ route('web.main-filter.search') }}">
                                <option value="venda">Comprar</option>
                                <option value="locacao">Alugar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoria" class="mb-1 text-front">O que você procura?</label>
                            <select class="selectpicker search-fields" name="filter_categoria" id="categoria" title="Escolha..." data-index="2" data-action="{{ route('web.main-filter.categoria') }}">
                                <option disabled>Selecione o filtro anterior</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipo" class="mb-1 text-front">Qual o tipo do imóvel?</label>
                            <select name="filter_tipo" id="tipo" class="selectpicker search-fields" title="Escolha..." multiple data-actions-box="true" data-index="3" data-action="{{ route('web.main-filter.tipo') }}">
                                <option disabled>Selecione o filtro anterior</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="search" class="mb-1 text-front">Onde você quer?</label>
                            <select name="filter_bairro" id="bairro" class="selectpicker search-fields" title="Escolha..." multiple data-actions-box="true" data-index="4" data-action="{{ route('web.main-filter.bairro') }}">
                                <option disabled>Selecione o filtro anterior</option>
                            </select>
                        </div> 
                        
        
                        <div class="form-group mb-0">                
                            <button class="search-button">Buscar Imóveis</button>
                        </div>
                    </form>
                    </div>
                    <!-- Search contents sidebar end -->

                    <!-- Social media start -->
                    <div class="social-media sidebar-widget clearfix">
                        <!-- Main Title 2 -->
                        <div class="main-title-2">
                            <h1><span>Redes Sociais</span></h1>
                        </div>
                        <!-- Social list -->
                        <ul class="social-list">
                            @if ($tenant->facebook)
                                <li><a target="_blank" class="facebook" href="{{$tenant->facebook}}" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            @endif
                            @if ($tenant->twitter)
                                <li><a target="_blank" class="twitter" href="{{$tenant->twitter}}" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            @endif
                            @if ($tenant->instagram)
                                <li><a target="_blank" class="instagram" href="{{$tenant->instagram}}" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                            @endif
                            @if ($tenant->linkedin)
                                <li><a target="_blank" class="linkedin" href="{{$tenant->linkedin}}" title="Linkedin"></a><i class="fa fa-linkedin"></i></li>
                            @endif
                            @if ($tenant->youtube)
                                <li><a target="_blank" class="youtube" href="{{$tenant->youtube}}" title="Youtube"><i class="fa fa-youtube"></i></a></li>
                            @endif                            
                        </ul>
                    </div>

                    <div class="sidebar-widget helping-box clearfix">
                        <div class="main-title-2">
                            <h1><span>Atendimento</span></h1>
                        </div>  
                        @if ($tenant->telefone)
                            <div class="helping-center">
                                <div class="icon"><i class="fa fa-phone"></i></div>
                                <h4>Telefone</h4>
                                <p><a href="tel:{{$tenant->telefone}}">{{$tenant->telefone}}</a> </p>
                            </div>                            
                        @endif                      
                        @if ($tenant->celular)
                            <div class="helping-center">
                                <div class="icon"><i class="fa fa-phone"></i></div>
                                <h4>Móvel</h4>
                                <p><a href="tel:{{$tenant->celular}}">{{$tenant->celular}}</a> </p>
                            </div>                            
                        @endif                      
                        @if ($tenant->whatsapp)
                            <div class="helping-center">
                                <div class="icon"><i class="fa fa-whatsapp"></i></div>
                                <h4>WhatsApp</h4>
                                <p><a target="_blank" href="{{getNumZap($tenant->whatsapp ,'Atendimento '.$tenant->name)}}">{{$tenant->whatsapp}}</a> </p>
                            </div>                            
                        @endif              
                    </div>
                    <div class="clearfix"></div>                  
                </div>
            </div>
        </div>
       
row      
      
      
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
<script>
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.open_filter').on('click', function (event) {
            event.preventDefault();

            box = $(".form_advanced");
            button = $(this);

            if (box.css("display") !== "none") {
                button.text("Filtro Avançado ↓");
            } else {
                button.text("✗ Fechar");
            }

            box.slideToggle();
        });

        $('body').on('change', 'select[name*="filter_"]', function () {

        var search = $(this);
        var nextIndex = $(this).data('index') + 1;

        $.post(search.data('action'), {search: search.val()}, function(response){

                if(response.status === 'success') {

                    $('select[data-index="' + nextIndex + '"]').empty();

                    $.each(response.data, function(key, value){
                        $('select[data-index="' + nextIndex + '"]').append(
                            $('<option>', {
                                value: value,
                                text: value
                            })
                        );
                    });

                    $.each($('select[name*="filter_"]'), function(index, element){

                        if($(element).data('index') >= nextIndex + 1){
                            $(element).empty().append(
                                $('<option>', {
                                    text: 'Selecione o filtro anterior',
                                    disabled: true
                                })
                            );
                        }

                    });

                    $('.selectpicker').selectpicker('refresh');
                }

                if(response.status === 'fail') {

                    if($(element).data('index') >= nextIndex){
                        $(element).empty().append(
                            $('<option>', {
                                text: 'Selecione o filtro anterior',
                                disabled: true
                            })
                        );
                    }

                    $('.selectpicker').selectpicker('refresh');
                }

            }, 'json');
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
@endsection