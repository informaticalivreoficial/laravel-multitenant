@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div class="main_filter bg-light py-5">
    <div class="container">        
       
        <section class="main_properties">
            <div class="container scrolling-pagination">
                
                <div class="row">
                    @if(!empty($imoveis) && $imoveis->count() > 0)
                        @foreach($imoveis as $imovel)
                            <article class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4">
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
                            {{$imoveis->links()}}  
                        @endif
                    @endif                            
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script>
        // Paginação infinita
        $('ul.pagination').hide();
        $(function() {
            $('.scrolling-pagination').jscroll({
                autoTrigger: true,
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.scrolling-pagination',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });          
    </script>    
@endsection