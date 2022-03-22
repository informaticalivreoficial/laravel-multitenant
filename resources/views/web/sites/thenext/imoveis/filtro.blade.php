@extends("web.sites.{$tenant->template}.master.master")

@section('content')

<div class="sub-banner" style="background: rgba(0, 0, 0, 0.04) url({{$tenant->gettopodosite()}}) top left repeat;">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Pesquisa de Imóveis</h1>
            <ul class="breadcrumbs">
                <li><a href="{{route('web.home')}}">Home</a></li>
                <li class="active">Pesquisa de Imóveis</li>
            </ul>
        </div>
    </div>
</div>

<div class="properties-section content-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 col-md-12 col-xs-12">               
                @if(!empty($imoveis) && $imoveis->count() > 0)
                    <div class="row">
                        @foreach($imoveis as $imovel)
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeInUp delay-03s">
                            <!-- Property start -->
                            <div class="property fp2">
                                <!-- Property img -->
                                <div class="property-img">
                                    <div class="property-tag button alt featured">Ref.: {{$imovel->referencia}}</div>
                                <div class="property-tag button sale">{{$imovel->tipo}}</div>
                                    <div class="property-price">
                                        @if(!empty($type) && $type == 'venda')
                                            R$ {{str_replace(',00', '', $imovel->valor_venda)}}                                                        
                                        @elseif(!empty($type) && $type == 'locacao')
                                            R${{ str_replace(',00', '', $imovel->valor_locacao) }}/mês
                                        @else
                                            @if($imovel->venda == true && !empty($imovel->valor_venda) && $imovel->valor_locacao == true && !empty($imovel->valor_locacao))                                            
                                                    Venda: R${{ str_replace(',00', '', $imovel->valor_venda) }}<br>
                                                    Aluguel: R${{ str_replace(',00', '', $imovel->valor_locacao) }}/mês                                            
                                            @elseif($imovel->venda == true && !empty($imovel->valor_venda))
                                                    R${{ str_replace(',00', '', $imovel->valor_venda) }}
                                            @elseif($imovel->locacao == true && !empty($imovel->valor_locacao))
                                                    R${{ str_replace(',00', '', $imovel->valor_locacao) }}/mês
                                            @else
                                                Sob Consulta
                                            @endif
                                        @endif
                                    </div>
                                    <img src="{{$imovel->cover()}}" alt="{{$imovel->titulo}}" class="img-fluid">
                                    <div class="property-overlay">
                                        <a href="{{ route((session('venda') == true || (!empty($type) && $type == 'venda') || ($imovel->locacao == false) ? 'web.buyProperty' : 'web.rentProperty'), ['slug' => $imovel->slug]) }}" class="overlay-link">
                                            <i class="fa fa-link"></i>
                                        </a>                                        
                                    </div>
                                </div>
                                <!-- Property content -->
                                <div class="property-content">
                                    <!-- info -->
                                    <div class="info">
                                        <!-- title -->
                                        <h1 class="title">
                                            <a href="{{ route((session('venda') == true || (!empty($type) && $type == 'venda') || ($imovel->locacao == false) ? 'web.buyProperty' : 'web.rentProperty'), ['slug' => $imovel->slug]) }}">{{$imovel->titulo}}</a>
                                        </h1>
                                        <!-- Property address -->
                                        <h3 class="property-address">
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-map-marker"></i>{{$imovel->bairro}} - {{getCidadeNome($imovel->cidade, 'cidades')}}
                                            </a>
                                        </h3>
                                        <!-- Facilities List -->
                                        <ul class="facilities-list clearfix">
                                            @if ($imovel->area_util)
                                                <li>
                                                    <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                                    <span>{{$imovel->area_util}}{{$imovel->medidas}}</span>
                                                </li>
                                            @endif                                        
                                            @if ($imovel->dormitorios)
                                                <li>
                                                    <i class="flaticon-bed"></i>
                                                    <span>{{$imovel->dormitorios}} Dorm</span>
                                                </li>
                                            @endif  
                                            @if ($imovel->banheiros)
                                                <li>
                                                    <i class="flaticon-holidays"></i>
                                                    <span>{{$imovel->banheiros}} Banh</span>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                     <!-- Pagination box start -->
                    <div class="pagination-box text-center">
                        {{$imoveis->links()}}
                    </div>
                    <!-- Pagination box end -->
                @endif
            </div>

            <div class="col-lg-4 col-md-12 col-xs-12">
                <!-- Advanced search start -->
                <div class="sidebar-widget advanced-search">
                    <div class="main-title-2">
                        <h1>Busca Avançada</h1>
                    </div>
                    <form action="{{ route('web.filter') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="search" class="mb-1 text-front">Comprar ou Alugar?</label>
                            <select class="selectpicker search-fields" name="filter_search" id="search" title="Escolha..." data-index="1" data-action="{{ route('web.main-filter.search') }}">
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
                        <div class="form_advanced" style="display: none;">
                            <div class="form-group">
                                <label for="dormitorios" class="mb-1 text-front">Dormitórios</label>
                                <select name="filter_dormitorios" id="dormitorios" class="selectpicker search-fields" title="Escolha..." data-index="5" data-action="{{ route('web.main-filter.dormitorios') }}">
                                    <option disabled>Selecione o filtro anterior</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="suites" class="labelforms mb-1"><b>Suítes</b></label>
                                <select class="selectpicker search-fields" name="filter_suites" id="suites" title="Escolha..." data-index="6" data-action="{{ route('web.main-filter.suites') }}">
                                    <option disabled>Selecione o filtro anterior</option>
                                </select>
                            </div>   
                            <div class="form-group">
                                <label for="banheiros" class="labelforms mb-1"><b>Banheiros</b></label>
                                <select class="selectpicker search-fields" name="filter_banheiros" id="banheiros" title="Escolha..." data-index="7" data-action="{{ route('web.main-filter.banheiros') }}">
                                    <option disabled>Selecione o filtro anterior</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="garagem" class="labelforms mb-1"><b>Garagem</b></label>
                                <select class="selectpicker search-fields" name="filter_garagem" id="garagem" title="Escolha..." data-index="8" data-action="{{ route('web.main-filter.garagem') }}">
                                    <option disabled>Selecione o filtro anterior</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="base" class="labelforms mb-1"><b>Preço Base</b></label>
                                <select class="selectpicker search-fields" name="filter_base" id="base" title="Escolha..." data-index="9" data-action="{{ route('web.main-filter.priceBase') }}">
                                    <option disabled>Selecione o filtro anterior</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="limit" class="labelforms mb-1"><b>Preço Limite</b></label>
                                <select class="selectpicker search-fields" name="filter_limit" id="limit" title="Escolha..." data-index="10" data-action="{{ route('web.main-filter.priceLimit') }}">
                                    <option disabled>Selecione o filtro anterior</option>
                                </select>
                            </div>                         
                        </div>
                        <div class="form-group">
                            <a href="" class="text-front open_filter">Filtro Avançado &darr;</a>
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="button-md button-theme btn-3 w-100">Pesquisar</button>
                        </div>
                    </form>
                </div>
                <!-- Advanced search end -->
                

                <div class="sidebar-widget helping-box clearfix">
                    <div class="main-title-2">
                        <h1>Atendimento</h1>
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
                            <h4>Telefone</h4>
                            <p><a href="tel:{{$tenant->celular}}">{{$tenant->celular}}</a> </p>                                
                        </div>
                    @endif
                    @if ($tenant->whatsapp)
                        <div class="helping-center">
                            <div class="icon"><i class="fa fa-whatsapp"></i></div>
                            <h4>WhatsApp</h4>
                            <p><a href="{{getNumZap($tenant->whatsapp ,'Atendimento '.$tenant->name)}}">{{$tenant->whatsapp}}</a> </p>
                        </div>
                    @endif                        
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #1abc9c;
        border-color: #1abc9c;
    }
</style>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
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