@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div class="main_slide d-none d-md-block">
    <div class="container" style="height:100%">
        <div class="row align-items-center" style="height:100%">
            <div class="col-8">
                <p class="main_slide_content">Encontre o <b>imóvel ideal</b> para você e <b>sua família</b> morar na praia!</p>
                <a href="{{route('web.imoveisList',['type' => 'venda'])}}" title="Quero Comprar" class="btn btn-front btn-lg text-white">Quero Comprar</a>
                <a href="{{route('web.imoveisList',['type' => 'locacao'])}}" title="Quero Alugar" class="btn btn-front btn-lg text-white">Quero Alugar</a>
            </div>
        </div>
    </div>
</div>

<div class="main_filter">
    <div class="container my-4">
        <div class="row">
            <form action="{{ route('web.filter') }}" method="post" class="form-inline w-100">
                @csrf
                
                <div class="form-group col-12 col-sm-6 col-lg-3 mt-3">
                    <label for="search" class="mb-2"><b>Comprar ou Alugar?</b></label>
                    <select name="filter_search" id="search" class="selectpicker" title="Escolha..." data-index="1" data-action="{{ route('web.main-filter.search') }}">
                        <option value="venda">Comprar</option>
                        <option value="locacao">Alugar</option>
                    </select>
                </div>
                
                <div class="form-group col-12 col-sm-6 col-lg-3 mt-3">
                    <label for="categoria" class="mb-2"><b>O que você quer?</b></label>
                    <select name="filter_categoria" id="categoria" class="selectpicker" title="Escolha..." data-index="2" data-action="{{ route('web.main-filter.categoria') }}">
                        <option disabled>Selecione o filtro anterior</option>
                    </select>
                </div>
                
                <div class="form-group col-12 col-sm-6 col-lg-3 mt-3">
                    <label for="tipo" class="mb-2"><b>Qual o tipo do imóvel?</b></label>
                    <select name="filter_tipo" id="tipo" class="selectpicker" title="Escolha..." multiple data-actions-box="true" data-index="3" data-action="{{ route('web.main-filter.tipo') }}">
                        <option disabled>Selecione o filtro anterior</option>
                    </select>
                </div>
                
                <div class="form-group col-12 col-sm-6 col-lg-3 mt-3">
                    <label for="bairro" class="mb-2"><b>Onde você quer?</b></label>
                    <select name="filter_bairro" id="bairro" class="selectpicker" title="Escolha..." multiple data-actions-box="true" data-index="4" data-action="{{ route('web.main-filter.bairro') }}">
                        <option disabled>Selecione o filtro anterior</option>
                    </select>
                </div>
               
                <div class="col-12 form_advanced" style="display: none;">
                    <div class="row">
                        <div class="form-group col-12 col-sm-6 col-lg-3 mt-3">
                            <label for="dormitorios" class="mb-2"><b>Dormitórios</b></label>
                            <select name="filter_dormitorios" id="dormitorios" class="selectpicker" title="Escolha..." data-index="5" data-action="{{ route('web.main-filter.dormitorios') }}">
                                <option disabled>Selecione o filtro anterior</option>
                            </select>
                        </div>

                        <div class="form-group col-12 col-sm-6 col-lg-3 mt-3">
                            <label for="suites" class="mb-2"><b>Suítes</b></label>
                            <select name="filter_suites" id="suites" class="selectpicker" title="Escolha..." data-index="6" data-action="{{ route('web.main-filter.suites') }}">
                                <option disabled>Selecione o filtro anterior</option>
                            </select>
                        </div>

                        <div class="form-group col-12 col-sm-6 col-lg-3 mt-3">
                            <label for="banheiros" class="mb-2"><b>Banheiros</b></label>
                            <select name="filter_banheiros" id="banheiros" class="selectpicker" title="Escolha..." data-index="7" data-action="{{ route('web.main-filter.banheiros') }}">
                                <option disabled>Selecione o filtro anterior</option>
                            </select>
                        </div>
                    
                        <div class="form-group col-12 col-sm-6 col-lg-3 mt-3">
                            <label for="garagem" class="mb-2"><b>Garagem</b></label>
                            <select name="filter_garagem" id="garagem" class="selectpicker" title="Escolha..." data-index="8" data-action="{{ route('web.main-filter.garagem') }}">
                                <option disabled>Selecione o filtro anterior</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-sm-6 col-lg-3 mt-3">
                            <label for="base" class="mb-2"><b>Preço Base</b></label>
                            <select name="filter_base" id="base" class="selectpicker" title="Escolha..." data-index="9" data-action="{{ route('web.main-filter.priceBase') }}">
                                <option disabled>Selecione o filtro anterior</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-sm-6 col-lg-3 mt-3">
                            <label for="limit" class="mb-2"><b>Preço Limite</b></label>
                            <select name="filter_limit" id="limit" class="selectpicker" title="Escolha..." data-index="10" data-action="{{ route('web.main-filter.priceLimit') }}">
                                <option disabled>Selecione o filtro anterior</option>
                            </select>
                        </div>
                    </div>
                </div>
                    <div class="col-6 mt-3">
                        <a href="" class="text-front open_filter">Filtro Avançado &darr;</a>
                    </div>
                    <div class="col-6 mt-3 text-right">
                        <button class="btn btn-front icon-search text-white">Pesquisar</button>
                    </div> 
                              
            </form>
        </div>
    </div>
</div>

@if(!empty($imoveisParaVenda) && $imoveisParaVenda->count() > 0)
<section class="main_properties py-3">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center border-bottom border-front mb-5">
            <h1 class="text-front">À venda</h1>
            <a href="{{route('web.imoveisList',['type' => 'venda'])}}" title="Ver mais imóveis para venda" class="text-front">Ver mais</a>
        </div>
        
        <div class="row">
            @foreach($imoveisParaVenda as $ivenda)
                <article class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card main_properties_item">
                        <div class="img-responsive-16by9">
                            <a href="{{ route('web.buyProperty', ['slug' => $ivenda->slug]) }}" title="{{$ivenda->titulo}}">
                                <img class="card-img-top" src="{{$ivenda->cover()}}" alt="{{$ivenda->titulo}}" title="{{$ivenda->titulo}}"/>
                            </a>
                        </div>
                        
                        <div class="card-body">
                            <h2 style="font-size: 1.3em;"><a href="{{ route('web.buyProperty', ['slug' => $ivenda->slug]) }}" class="text-front" title="{{$ivenda->titulo}}">{{$ivenda->titulo}}</a></h2>
                            <p class="main_properties_item_categoria">{{$ivenda->categoria}} - {{$ivenda->referencia}}</p>
                            <p class="main_properties_item_tipo">{{$ivenda->tipo}} - {{$ivenda->bairro}} - {{getCidadeNome($ivenda->cidade, 'cidades')}}<i class="icon-map-marker"></i></p>
                            <p class="main_properties_item_preco text-front">R$ {{str_replace(',00', '', $ivenda->valor_venda)}}</p>
                            <a href="{{ route('web.buyProperty', ['slug' => $ivenda->slug]) }}" class="btn btn-front btn-block text-white" title="Ver Imóvel">Ver Imóvel</a>
                        </div>
                        <div class="card-footer text-muted d-flex">
                            <div class="col-4 text-center main_properties_item_features">
                                <img class="img-fluid" src="{{url(asset('frontend/'.$tenant->template.'/assets/icons/dormitorios.png'))}}" alt="Dormitórios" title="{{$ivenda->dormitorios}} Dormitórios"/>
                                <p class="text-muted">{{$ivenda->dormitorios}}</p>
                            </div>
                            <div class="col-4 text-center main_properties_item_features">
                                <img class="img-fluid" src="{{url(asset('frontend/'.$tenant->template.'/assets/icons/garagem.png'))}}" alt="Garagem" title="{{$ivenda->garagem}} Garagem"/>
                                <p class="text-muted">
                                    @php
                                    if(!empty($ivenda->garagem) && !empty($ivenda->garagem_coberta)){
                                        $g = $ivenda->garagem + $ivenda->garagem_coberta;
                                        echo $g;
                                    }elseif(!empty($ivenda->garagem) && empty($ivenda->garagem_coberta)){
                                        echo $ivenda->garagem;
                                    }else{
                                        echo $ivenda->garagem_coberta;
                                    }
                                    @endphp
                                </p>
                            </div>
                            <div class="col-4 text-center main_properties_item_features">
                                <img class="img-fluid" src="{{url(asset('frontend/'.$tenant->template.'/assets/icons/area-util.png'))}}" alt="Área útil" title="Área útil {{$ivenda->area_util}}{{$ivenda->medidas}}"/>
                                <p class="text-muted">{{$ivenda->area_util}}{{$ivenda->medidas}}</p>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

@if(!empty($imoveisParaLocacao) && $imoveisParaLocacao->count() > 0)
<section class="main_properties py-3 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center border-bottom border-front mb-5">
            <h1 class="text-front">Para Alugar</h1>
            <a href="{{route('web.imoveisList',['type' => 'locacao'])}}" title="Ver mais imóveis para locação" class="text-front">Ver mais</a>
        </div>
        
        <div class="row">
            @foreach($imoveisParaLocacao as $ilocacao)
                <article class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card main_properties_item">
                        <div class="img-responsive-16by9">
                            <a href="{{ route('web.rentProperty', ['slug' => $ilocacao->slug]) }}">
                                <img class="card-img-top" src="{{$ilocacao->cover()}}" alt="{{$ilocacao->titulo}}" title="{{$ilocacao->titulo}}"/>
                            </a>
                        </div>
                        
                        <div class="card-body">
                            <h2 style="font-size: 1.3em;"><a href="{{ route('web.rentProperty', ['slug' => $ilocacao->slug]) }}" class="text-front" title="{{$ilocacao->titulo}}">{{$ilocacao->titulo}}</a></h2>
                            <p class="main_properties_item_categoria">{{$ilocacao->categoria}} - {{$ilocacao->referencia}}</p>
                            <p class="main_properties_item_tipo">{{$ilocacao->tipo}} - {{$ivenda->bairro}} - {{getCidadeNome($ilocacao->cidade, 'cidades')}}<i class="icon-map-marker"></i></p>
                            <p class="main_properties_item_preco text-front">R$ {{str_replace(',00', '', $ilocacao->valor_venda)}}/mês</p>
                            <a href="{{ route('web.rentProperty', ['slug' => $ilocacao->slug]) }}" class="btn btn-front btn-block text-white" title="Ver Imóvel">Ver Imóvel</a>
                        </div>
                        <div class="card-footer text-muted d-flex">
                            <div class="col-4 text-center main_properties_item_features">
                                <img class="img-fluid" src="{{url(asset('frontend/'.$tenant->template.'/assets/icons/dormitorios.png'))}}" alt="Dormitórios" title="{{$ilocacao->dormitorios}} Dormitórios"/>
                                <p class="text-muted">{{$ilocacao->dormitorios}}</p>
                            </div>
                            <div class="col-4 text-center main_properties_item_features">
                                <img class="img-fluid" src="{{url(asset('frontend/'.$tenant->template.'/assets/icons/garagem.png'))}}" alt="Garagem" title="{{$ilocacao->garagem}} Garagem"/>
                                <p class="text-muted">{{$ilocacao->garagem}}</p>
                            </div>
                            <div class="col-4 text-center main_properties_item_features">
                                <img class="img-fluid" src="{{url(asset('frontend/'.$tenant->template.'/assets/icons/area-util.png'))}}" alt="Área útil" title="Área útil {{$ilocacao->area_util}}{{$ilocacao->medidas}}"/>
                                <p class="text-muted">{{$ilocacao->area_util}}{{$ilocacao->medidas}}</p>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach            
        </div>
    </div>
</section>
@endif

<article class="main_optin bg-dark text-front py-5">
    <div class="container">
        <div class="row mx-auto" style="max-width: 600px;">
            <h1>Pesquisar no site</h1>
            <form action="{{ route('web.pesquisa') }}" method="post" autocomplete="off">
                @csrf
                <div id="js-search-result"></div>
                <input type="text" class="form-control" name="search" value="{{$search ?? ''}}" size="50">
                <button type="submit" class="btn icon-search btn-icon btn-front">Pesquisar</button>
            </form>
        </div>
    </div>
</article>

<section class="main_list_group py-5 bg-light">
    <div class="container">
        <div class="p-3 border-bottom border-front">
            <h1 class="text-center">Ambiente no seu, <span class="text-front"><b>estilo</b></span></h1>
            <p class="text-center text-muted h4">Encontre um imóvel com a experiência que você quer viver!</p>
        </div>
        
        <div class="main_list_group_items mt-5 d-flex justify-content-around row">
            @if (!empty($experienceCobertura) && $experienceCobertura->count() > 0)
                <article class="main_list_group_items_item col-12 col-md-6 col-lg-4 mb-4">
                    <a href="{{ route('web.experienceCategory', ['slug' => 'cobertura']) }}" title="Cobertura">
                        <div class="d-flex align-items-center justify-content-center" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url('{{$experienceCobertura[0]->nocover()}}') no-repeat;background-size: cover;">
                            <h2>Cobertura ({{$experienceCobertura->count()}})</h2>
                        </div>
                    </a>
                </article>
            @endif
            
            @if (!empty($experienceAltoPadrao) && $experienceAltoPadrao->count() > 0)
                <article class="main_list_group_items_item col-12 col-md-6 col-lg-4 mb-4">
                    <a href="{{ route('web.experienceCategory', ['slug' => 'alto-padrao']) }}" title="Alto Padrão">
                        <div class="d-flex align-items-center justify-content-center" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url('{{$experienceAltoPadrao[0]->nocover()}}') no-repeat;background-size: cover;">
                            <h2>Alto Padrão ({{$experienceAltoPadrao->count()}})</h2>
                        </div>
                    </a>
                </article>
            @endif
            
            @if (!empty($experienceDeFrenteParaMar) && $experienceDeFrenteParaMar->count() > 0)
                <article class="main_list_group_items_item col-12 col-md-6 col-lg-4 mb-4">
                    <a href="{{ route('web.experienceCategory', ['slug' => 'de-frente-para-o-mar']) }}" title="De frente para o mar">
                        <div class="d-flex align-items-center justify-content-center" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url('{{$experienceDeFrenteParaMar[0]->nocover()}}') no-repeat;background-size: cover;">
                            <h2>De frente para o mar ({{$experienceDeFrenteParaMar->count()}})</h2>
                        </div>
                    </a>
                </article>
            @endif
            
            @if (!empty($experienceCondominioFechado) && $experienceCondominioFechado->count() > 0)
                <article class="main_list_group_items_item col-12 col-md-6 col-lg-4 mb-4">
                    <a href="{{ route('web.experienceCategory', ['slug' => 'condominio-fechado']) }}" title="Condomínio Fechado">
                        <div class="d-flex align-items-center justify-content-center" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url('{{$experienceCondominioFechado[0]->nocover()}}') no-repeat;background-size: cover;">
                            <h2>Condomínio Fechado ({{$experienceCondominioFechado->count()}})</h2>
                        </div>
                    </a>
                </article>
            @endif            

            @if (!empty($experienceCompacto) && $experienceCompacto->count() > 0)
                <article class="main_list_group_items_item col-12 col-md-6 col-lg-4 mb-4">
                    <a href="{{ route('web.experienceCategory', ['slug' => 'compacto']) }}" title="Compacto">
                        <div class="d-flex align-items-center justify-content-center" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url('{{$experienceCompacto[0]->nocover()}}') no-repeat;background-size: cover;">
                            <h2>Compacto ({{$experienceCompacto->count()}})</h2>
                        </div>
                    </a>
                </article>
            @endif
            
            @if (!empty($experienceLojasSalas) && $experienceLojasSalas->count() > 0)
                <article class="main_list_group_items_item col-12 col-md-6 col-lg-4 mb-4">
                    <a href="{{ route('web.experienceCategory', ['slug' => 'lojas-e-salas']) }}" title="Lojas e Salas">
                        <div class="d-flex align-items-center justify-content-center" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url('{{$experienceLojasSalas[0]->nocover()}}') no-repeat;background-size: cover;">
                            <h2>Lojas e Salas ({{$experienceLojasSalas->count()}})</h2>
                        </div>
                    </a>
                </article>
            @endif
            
        </div>
        
    </div>
</section>

@if(!empty($artigos) && $artigos->count() > 0)
<section class="main_properties py-3 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center border-bottom border-front mb-5">
            <h1 class="text-front">Blog</h1>
            <a href="{{route('web.blog.artigos')}}" class="text-front">Ver mais</a>
        </div>
        
        <div class="row">
            @foreach($artigos as $artigo)
                <article class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card main_properties_item" style="min-height:400px;">
                        <div class="img-responsive-16by9">
                            <a href="{{route('web.blog.artigo',['slug' => $artigo->slug])}}">
                                <img class="card-img-top" src="{{$artigo->cover()}}" alt="{{$artigo->titulo}}" title="{{$artigo->titulo}}"/>
                            </a>
                        </div>
                        
                        <div class="card-body">
                            <p><b><a href="{{route('web.blog.artigo',['slug' => $artigo->slug])}}" class="text-front" title="{{$artigo->titulo}}">{{$artigo->titulo}}</a></b></p>
                            
                            <a href="{{route('web.blog.artigo',['slug' => $artigo->slug])}}" style="position: absolute;
                            bottom: 15px;
                            left: 18%;
                            margin-left: -30px;
                            width: 80%;" class="btn btn-front btn-block text-white" title="Ver Imóvel">Leia Mais</a>
                        </div>                        
                    </div>
                </article>
            @endforeach            
        </div>
    </div>
</section>
@endif

@endsection

@section('css')
    <style>
        .main_slide {
            background-image: url('{{$tenant->getnotopodosite()}}');
            background-repeat: no-repeat !important;
            background-position: center 65%;
            background-size: 100%;
            height: 450px;
        }
    </style>
@endsection

@section('js')
    <script>

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
    </script>    
@endsection