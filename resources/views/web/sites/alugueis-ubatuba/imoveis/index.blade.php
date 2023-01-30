@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div id="subheader">
    <div class="container">
      <div class="row">
          <div class="span12">
            <h1 style="border-right:0px;"><strong>Imóveis Disponíveis</strong></h1>
        </div>
      </div>
    </div>
</div>

<div id="content">
    <div class="container scrolling-pagination">       
        @if(!empty($imoveis) && $imoveis->count() > 0)
            <div class="row room-list">
                @foreach($imoveis as $imovel)
                    <div class="room span4" style="height: 550px !important;">
                        <a href="{{ route((session('venda') == true || (!empty($type) && $type == 'venda') || ($imovel->locacao == false) ? 'web.buyProperty' : 'web.rentProperty'), ['slug' => $imovel->slug]) }}">
                            <img data-original="{{$imovel->cover()}}" src="{{$imovel->cover()}}" class="img-polaroid" alt="{{$imovel->titulo}}" />
                        </a>

                        <h4>{{$imovel->titulo}}</h4>
                        <div class="description">
                            {!!$imovel->descricao!!}
                        </div>
                        <div class="row">
                            <ul class="room-features">                    
                                @if ($imovel->churrasqueira)
                                    <li class="span2"><i class="icon-check-sign"></i>Churrasqueira</li>
                                @endif 
                                @if ($imovel->ventilador_teto)
                                    <li class="span2"><i class="icon-check-sign"></i>Ventilador de teto</li>
                                @endif 
                                @if ($imovel->geladeira)
                                    <li class="span2"><i class="icon-check-sign"></i>Geladeira</li>
                                @endif 
                                @if ($imovel->ar_condicionado)
                                    <li class="span2"><i class="icon-check-sign"></i>Ar Condicionado</li>
                                @endif 
                                @if ($imovel->estacionamento)
                                    <li class="span2"><i class="icon-check-sign"></i>Estacionamento</li>
                                @endif 
                                @if ($imovel->internet)
                                    <li class="span2"><i class="icon-check-sign"></i>Wi-Fi</li>
                                @endif 
                                @if ($imovel->saladetv)
                                    <li class="span2"><i class="icon-check-sign"></i>Tv Lcd</li>
                                @endif   
                            </ul>
                        </div>                              

                        <div class="clearfix"></div>
                        <div class="row" style="text-align:center;"> 
                            <br />
                            @if ($imovel->exibivalores == true)
                            @if(!empty($type) && $type == 'venda')
                                <div class="span2" style="padding:5px 0 5px 0;"> 
                                    <div class="price-info">
                                        <span class="price">R$ {{ str_replace(',00', '', $imovel->valor_venda) }}</span>
                                    </div>
                                </div>
                            @elseif(!empty($type) && $type == 'locacao')
                                <div class="span2" style="padding:5px 0 5px 0;"> 
                                    <div class="price-info">
                                        <span class="price">R$ {{ str_replace(',00', '', $imovel->valor_locacao) }}</span>
                                    </div>
                                </div>
                            @else
                                @if($imovel->venda == true && !empty($imovel->valor_venda) && $imovel->locacao == true && !empty($imovel->valor_locacao))
                                    <div class="span2" style="padding:5px 0 5px 0;"> 
                                        <div class="price-info">
                                            <span class="price">R$ {{ str_replace(',00', '', $imovel->valor_venda) }} ou R$ {{ str_replace(',00', '', $imovel->valor_locacao) }}</span>
                                        </div>
                                    </div>
                                @elseif($imovel->venda == true && !empty($imovel->valor_venda))
                                    <div class="span2" style="padding:5px 0 5px 0;"> 
                                        <div class="price-info">
                                            <span class="price">R$ {{ str_replace(',00', '', $imovel->valor_venda) }}</span>
                                        </div>
                                    </div>
                                @elseif($imovel->locacao == true && !empty($imovel->valor_locacao))
                                    <div class="span2" style="padding:5px 0 5px 0;"> 
                                        <div class="price-info">
                                            <span class="price">R$ {{ str_replace(',00', '', $imovel->valor_locacao) }}</span>
                                        </div>
                                    </div>
                                @else
                                    <p class="main_properties_item_preco text-front">Entre em contato com a nossa equipe comercial!</p>
                                @endif
                            @endif
                            @endif
                            <div class="span2" style="padding:5px 0 5px 0;">
                                <a href="{{ route((session('venda') == true || (!empty($type) && $type == 'venda') || ($imovel->locacao == false) ? 'web.buyProperty' : 'web.rentProperty'), ['slug' => $imovel->slug]) }}" class="btn btn-primary">+ Detalhes</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if($imoveis->hasPages())
                {{$imoveis->links()}}  
            @endif
        @endif
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