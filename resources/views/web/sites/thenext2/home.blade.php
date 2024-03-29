@extends("web.sites.{$tenant->template}.master.master")

@section('content')

@if (!empty($slides) && $slides->count() > 0)
    <div class="banner">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            
            <div class="carousel-inner" role="listbox">  
                @foreach ($slides as $key => $slide)       
                    @php $active = ($key == '0' ? ' active' : '');@endphp   
                    <div class="item banner-max-height {{$active}}">
                        <img src="{{$slide->getimagem()}}" alt="{{$slide->titulo}}">
                        <div class="carousel-caption banner-slider-inner">
                            <div class="banner-content">                        
                                <h1 data-animation="animated fadeInDown delay-05s">{{$slide->titulo}}</h1>
                                @if ($slide->subtitulo)
                                    <p data-animation="animated fadeInUp delay-1s">{{$slide->subtitulo}}</p>
                                @endif
                                <a {{($slide->target == 1 ? 'target="_blank"' : '')}} href="{{$slide->link}}" title="{{$slide->titulo}}" class="btn button-md button-theme" data-animation="animated fadeInUp delay-15s">Clique aqui!</a>                                
                            </div>
                        </div>
                    </div> 
                @endforeach
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="slider-mover-left" aria-hidden="true">
                <i class="fa fa-angle-left"></i>
                </span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="slider-mover-right" aria-hidden="true">
                <i class="fa fa-angle-right"></i>
                </span>
                <span class="sr-only">Próximo</span>
            </a>
        </div>
    </div>
@endif

{{--SEARCH FORM--}}

<!-- RESULTADO DO FILTRO DE BUSCA  -->  
<div class="resultado"></div>

@if (!empty($imoveisParaVenda) && $imoveisParaVenda->count() > 0)
<div class="properties-section-body content-area">
    <div class="container">
        <!-- TÍTULO  -->
        <div class="main-title">
            <h1>Imóveis Recentes</h1>
            <div class="row">   
                @foreach ($imoveisParaVenda as $ivenda)             
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInUp delay-03s">
                        <div class="property" style="min-height: 440px !important;">
                            <!-- Property img -->
                            <div class="property-img">
                                <div class="property-tag button alt featured">Referência: {{$ivenda->referencia}}</div>
                                <div class="property-tag button sale">{{$ivenda->tipo}}</div>
                                @if($ivenda->exibivalores == true)
                                    <div class="property-price">R$ {{str_replace(',00', '', $ivenda->valor_venda)}}</div>
                                @endif 
                                <img src="{{$ivenda->cover()}}" alt="fp" class="img-responsive">
                                <div class="property-overlay">
                                    <a href="{{route('web.buyProperty', ['slug' => $ivenda->slug])}}" class="overlay-link">
                                        <i class="fa fa-link"></i>
                                    </a>                                       
                                
                                    <div class="property-magnify-gallery"> 
                                        @if($ivenda->images()->get()->count())
                                            <a href="{{$ivenda->cover()}}" class="overlay-link"><i class="fa fa-expand"></i></a>
                                            @foreach($ivenda->images()->get() as $image)                                  
                                                <a href="{{ $image->url_image }}" class="hidden"></a> 
                                            @endforeach
                                        @endif
                                    </div>                                
                                </div>
                            </div>
                            <!-- Property content -->
                            <div class="property-content">
                                <!-- title -->
                                <h1 class="title">
                                    <a href="{{route('web.buyProperty', ['slug' => $ivenda->slug])}}">{{$ivenda->titulo}}</a>
                                </h1>
                                <!-- Property address -->
                                <h3 class="property-address">
                                    <a href="{{route('web.buyProperty', ['slug' => $ivenda->slug])}}">
                                        <i class="fa fa-map-marker"></i>{{$ivenda->bairro}} - {{getCidadeNome($ivenda->cidade, 'cidades')}}
                                    </a>
                                </h3>
                                <!-- Facilities List -->
                                <ul class="facilities-list clearfix">                                                                        
                                    <li>
                                        <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                        <span>{{$ivenda->area_util}}{{$ivenda->medidas}}</span>
                                    </li>                                    
                                    
                                    <li>
                                        <i class="flaticon-bed"></i>
                                        <span>{{$ivenda->dormitorios}} Dorm.</span>
                                    </li>                                    
                                    
                                    <li>
                                        <i class="flaticon-holidays"></i>
                                        <span>{{$ivenda->banheiros}} Banh.</span>
                                    </li> 
                                    
                                    <li>
                                        <i class="flaticon-vehicle"></i>
                                        <span>
                                            @php
                                            if(!empty($ivenda->garagem) && !empty($ivenda->garagem_coberta)){
                                                $g = $ivenda->garagem + $ivenda->garagem_coberta;
                                                echo $g.' Garag.';
                                            }elseif(!empty($ivenda->garagem) && empty($ivenda->garagem_coberta)){
                                                echo $ivenda->garagem.' Garag.';
                                            }else{
                                                echo $ivenda->garagem_coberta.' Garag.';
                                            }
                                            @endphp
                                        </span>
                                    </li>                                    
                                </ul>

                            </div>
                        </div>
                    </div>   
                @endforeach
            <a class="button-md button-theme" href="{{route('web.imoveisList',['type' => 'venda'])}}" data-hover="Ver mais Imóveis"> Ver mais Imóveis </a>
            </div>
        </div>
    </div>
</div> 
@endif

<div class="clearfix"></div>

<div class="clearfix"></div>

@if (!empty($artigos) && $artigos->count() > 0)
    <div class="blog content-area">
        <div class="container">
            <div class="main-title"><h1>Acompanhe nosso Blog</h1></div>
            <div class="row">   
                @foreach ($artigos as $key => $artigo)
                    @if ($key <= 2)
                        <div class="col-lg-4 col-md-4 col-sm-6 wow fadeInLeft delay-04s">
                            <div class="thumbnail blog-box-2 clearfix" style="min-height: 470px;">
                                <div class="blog-photo">
                                    <img src="{{$artigo->cover()}}" alt="{{$artigo->titulo}}" class="img-responsive">                                           
                                </div>
                                <div class="caption detail">
                                    <h4><a href="{{route('web.blog.artigo',['slug' => $artigo->slug])}}">{{$artigo->titulo}}</a></h4>
                                    {{ Words($artigo->content, 26) }}
                                    <div class="clearfix"></div>
                                    <a href="{{route('web.blog.artigo',['slug' => $artigo->slug])}}" class="read-more">Leia +</a>
                                </div>
                            </div>
                        </div>
                    @endif                    
                @endforeach
            </div>
        </div>
    </div>    
@endif

@endsection