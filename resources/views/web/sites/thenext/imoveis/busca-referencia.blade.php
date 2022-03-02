@extends("web.sites.{$tenant->template}.master.master")

@section('content')

<div class="sub-banner" style="background: rgba(0, 0, 0, 0.04) url({{$tenant->gettopodosite()}}) top left repeat;">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Busca por Referência</h1>
            <ul class="breadcrumbs">
                <li><a href="{{route('web.home')}}">Home</a></li>
                <li class="active">Pesquisa de Imóveis</li>
            </ul>
            <div class="row mt-4">
                <div class="col-lg-12">                
                    <form action="{{ route('web.pesquisa') }}" class="form-search view-search" method="post">
                        @csrf
                        <div class="form-group mb-0">
                            <input type="text" class="form-control" name="search" value="{{$search ?? ''}}" placeholder="Pesquisar Imóveis">
                        </div>
                        <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="view-section content-area">
    <div class="container">
        <div class="row">    
            @if(!empty($imoveis) && $imoveis->count() > 0)  
                @foreach ($imoveis as $imovel)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 wow fadeInUp delay-03s">
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
                                    <a href="{{ route(($imovel->locacao == false ? 'web.buyProperty' : 'web.rentProperty'), ['slug' => $imovel->slug]) }}" class="overlay-link">
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
                                            <i class="fa fa-map-marker"></i> {{$imovel->bairro}} - {{getCidadeNome($imovel->cidade, 'cidades')}}
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
                        <!-- Property end -->
                    </div>
                @endforeach 
                {{$imoveis->links()}}
            @else
            <div class="col-lg-12"> 
                <div class="nobottomborder">
                    <h1>Desculpe não foram encontrados resultados!</h1>
                    <a class="btn-1 btn-outline-1" href="{{route('web.home')}}">
                        <span>Voltar ao início</span> <i class="arrow"></i>
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection