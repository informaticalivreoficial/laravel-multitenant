@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div class="main_filter bg-light py-5">
    <div class="container">
        <section class="row">
            <div class="col-12">
                <h2 class="text-front icon-search mb-5">Filtro de pesquisa</h2>
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-3">
                <form action="{{ route('web.filter') }}" method="post" class="p-3 bg-white w-100 mb-5">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="search" class="mb-2 text-front">Comprar ou Alugar?</label>
                            <select name="filter_search" id="search" class="selectpicker" title="Escolha..." data-index="1" data-action="{{ route('web.main-filter.search') }}">
                                <option value="venda">Comprar</option>
                                <option value="locacao">Alugar</option>
                            </select>
                        </div>

                        <div class="form-group col-12">
                            <label for="categoria" class="mb-2 text-front">O que você quer?</label>
                            <select name="filter_categoria" id="categoria" class="selectpicker" title="Escolha..." data-index="2" data-action="{{ route('web.main-filter.categoria') }}">
                                <option disabled>Selecione o filtro anterior</option>
                            </select>
                        </div>

                        <div class="form-group col-12">
                            <label for="tipo" class="mb-2 text-front">Qual o tipo do imóvel?</label>
                            <select name="filter_tipo" id="tipo" class="selectpicker" title="Escolha..." multiple data-actions-box="true" data-index="3" data-action="{{ route('web.main-filter.tipo') }}">
                                <option disabled>Selecione o filtro anterior</option>
                            </select>
                        </div>

                        <div class="form-group col-12">
                            <label for="search" class="mb-2 text-front">Onde você quer?</label>
                            <select name="filter_bairro" id="bairro" class="selectpicker" title="Escolha..." multiple data-actions-box="true" data-index="4" data-action="{{ route('web.main-filter.bairro') }}">
                                <option disabled>Selecione o filtro anterior</option>
                            </select>
                        </div>

                        <div class="form_advanced" style="display: none;">
                            <div class="form-group col-12">
                                <label for="dormitorios" class="mb-2 text-front">Dormitórios</label>
                                <select name="filter_dormitorios" id="dormitorios" class="selectpicker" title="Escolha..." data-index="5" data-action="{{ route('web.main-filter.dormitorios') }}">
                                    <option disabled>Selecione o filtro anterior</option>
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label for="suites" class="mb-2 text-front">Suítes</label>
                                <select name="filter_suites" id="suites" class="selectpicker" title="Escolha..." data-index="6" data-action="{{ route('web.main-filter.suites') }}">
                                    <option disabled>Selecione o filtro anterior</option>
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label for="banheiros" class="mb-2 text-front">Banheiros</label>
                                <select name="filter_banheiros" id="banheiros" class="selectpicker" title="Escolha..." data-index="7" data-action="{{ route('web.main-filter.banheiros') }}">
                                    <option disabled>Selecione o filtro anterior</option>
                                </select>
                            </div>
                        
                            <div class="form-group col-12">
                                <label for="garagem" class="mb-2 text-front">Garagem</label>
                                <select name="filter_garagem" id="garagem" class="selectpicker" title="Escolha..." data-index="8" data-action="{{ route('web.main-filter.garagem') }}">
                                    <option disabled>Selecione o filtro anterior</option>
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label for="base" class="mb-2 text-front">Preço Base</label>
                                <select name="filter_base" id="base" class="selectpicker" title="Escolha..." data-index="9" data-action="{{ route('web.main-filter.priceBase') }}">
                                    <option disabled>Selecione o filtro anterior</option>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label for="limit" class="mb-2 text-front">Preço Limite</label>
                                <select name="filter_limit" id="limit" class="selectpicker" title="Escolha..." data-index="10" data-action="{{ route('web.main-filter.priceLimit') }}">
                                    <option disabled>Selecione o filtro anterior</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <a href="" class="text-front open_filter">Filtro Avançado &darr;</a>
                        </div>
                        <div class="col-12 mt-3 text-right">
                            <button type="submit" class="btn btn-front icon-search text-white">Pesquisar</button>
                        </div>
                    </div>                                    
                </form>
            </div>
            <div class="col-12 col-sm-12 col-md-7 col-lg-9">
                <section class="main_properties">
                    <div class="container">
                        
                        <div class="row">
                            @if($imoveis->count())
                                @foreach($imoveis as $imovel)
                                    <article class="col-12 col-sm-6 col-md-12 col-lg-6 mb-4">
                                        <div class="card main_properties_item">
                                            <div class="img-responsive-16by9">
                                                <a href="{{ route((session('venda') == true || (!empty($type) && $type == 'venda') || ($imovel->locacao == false) ? 'web.buyProperty' : 'web.rentProperty'), ['slug' => $imovel->slug]) }}" title="{{$imovel->titulo}}">
                                                    <img class="card-img-top" src="{{$imovel->cover()}}" alt="{{$imovel->titulo}}" title="{{$imovel->titulo}}"/>
                                                </a>
                                            </div>
                                            
                                            <div class="card-body">
                                                <h2 style="font-size: 1.3em;"><a href="{{ route((session('venda') == true || (!empty($type) && $type == 'venda') || ($imovel->locacao == false) ? 'web.buyProperty' : 'web.rentProperty'), ['slug' => $imovel->slug]) }}" class="text-front" title="{{$imovel->titulo}}">{{$imovel->titulo}}</a></h2>
                                                <p class="main_properties_item_categoria">{{$imovel->categoria}} - {{$imovel->referencia}}</p>
                                                <p class="main_properties_item_tipo">{{$imovel->tipo}} - {{$imovel->bairro}} - {{getCidadeNome($imovel->cidade, 'cidades')}}<i class="icon-map-marker"></i></p>
                                                @if(!empty($type) && $type == 'venda')
                                                    <p class="main_properties_item_preco text-front">R$ {{ str_replace(',00', '', $imovel->valor_venda) }}</p>
                                                @elseif(!empty($type) && $type == 'locacao')
                                                    <p class="main_properties_item_preco text-front">R$ {{ str_replace(',00', '', $imovel->valor_locacao) }}/mês</p>
                                                @else
                                                    @if($imovel->venda == true && !empty($imovel->valor_venda) && $imovel->rent == true && !empty($imovel->valor_locacao))
                                                        <p class="main_properties_item_preco text-front">R$ {{ str_replace(',00', '', $imovel->valor_venda) }} <br>
                                                        ou R$ {{ str_replace(',00', '', $imovel->valor_locacao) }}/mês</p>
                                                    @elseif($imovel->venda == true && !empty($imovel->valor_venda))
                                                        <p class="main_properties_item_preco text-front">R$ {{ str_replace(',00', '', $imovel->valor_venda) }}</p>
                                                    @elseif($imovel->locacao == true && !empty($imovel->valor_locacao))
                                                        <p class="main_properties_item_preco text-front">R$ {{ str_replace(',00', '', $imovel->valor_locacao) }}/mês</p>
                                                    @else
                                                        <p class="main_properties_item_preco text-front">Entre em contato com a nossa equipe comercial!</p>
                                                    @endif
                                                @endif
                                                <a href="{{ route((session('venda') == true || (!empty($type) && $type == 'venda') || ($imovel->locacao == false) ? 'web.buyProperty' : 'web.rentProperty'), ['slug' => $imovel->slug]) }}" class="btn btn-front btn-block text-white" title="Ver Imóvel">Ver Imóvel</a>
                                            </div>
                                            <div class="card-footer text-muted d-flex">
                                                <div class="col-4 text-center main_properties_item_features">
                                                    <img class="img-fluid" src="{{url(asset('frontend/'.$tenant->template.'/assets/icons/dormitorios.png'))}}" alt="Dormitórios" title="{{$imovel->dormitorios}} Dormitórios"/>
                                                    <p class="text-muted">{{$imovel->dormitorios}}</p>
                                                </div>
                                                <div class="col-4 text-center main_properties_item_features">
                                                    <img class="img-fluid" src="{{url(asset('frontend/'.$tenant->template.'/assets/icons/garagem.png'))}}" alt="Garagem" title="{{$imovel->garagem}} Garagem"/>
                                                    <p class="text-muted">{{$imovel->garagem}}</p>
                                                </div>
                                                <div class="col-4 text-center main_properties_item_features">
                                                    <img class="img-fluid" src="{{url(asset('frontend/'.$tenant->template.'/assets/icons/area-util.png'))}}" alt="Área útil" title="Área útil {{$imovel->area_util}}{{$imovel->medidas}}"/>
                                                    <p class="text-muted">{{$imovel->area_util}}{{$imovel->medidas}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                                @if($imoveis->hasPages())
                                    <div class="col-12 card-footer paginacao">  
                                        {{ $imoveis->links() }}
                                    </div> 
                                @endif
                            @endif                            
                        </div>
                    </div>
                </section>
            </div>
        </section>
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
});
</script> 
@endsection