@extends("web.sites.{$tenant->template}.master.master")

@section('content')

@if (!empty($slides) && $slides->count() > 0)
    <div class="banner" id="banner6">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($slides as $key=>$slide)
                    @php $active = ($key == '0' ? ' active' : '');@endphp
                    <div class="carousel-item item-bg {{$active}}">
                        <img class="d-block w-100 h-100" src="{{$slide->getimagem()}}" alt="{{$slide->titulo}}">
                        <div class="carousel-caption banner-slider-inner d-flex h-100">
                            <div class="banner-content container align-self-center text-start">
                                <h1>{{$slide->titulo}}</h1>
                                @if ($slide->subtitulo)
                                <p>{{$slide->subtitulo}}</p>
                                @endif
                                @if ($slide->botaolabel)
                                <a class="btn-2 btn-defaults" {{($slide->target == 1 ? 'target="_blank"' : '')}} href="{{$slide->link}}" data-animation="animated fadeInUp delay-15s">
                                    <span>{{$slide->botaolabel}}</span> <i class="arrow"></i>
                                </a>
                                @endif 
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@endif

<!-- Search area start -->
<div class="search-area sr2">
    <div class="container-fluid">
        <div class="search-area-inner">
            <div class="search-contents ">
                <form method="GET">
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="area from">
                                    <option>Area From</option>
                                    <option>1000</option>
                                    <option>800</option>
                                    <option>600</option>
                                    <option>400</option>
                                    <option>200</option>
                                    <option>100</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="property status">
                                    <option>Property Status</option>
                                    <option>For Sale</option>
                                    <option>For Rent</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="location">
                                    <option>Location</option>
                                    <option>United States</option>
                                    <option>United Kingdom</option>
                                    <option>American Samoa</option>
                                    <option>Belgium</option>
                                    <option>Cameroon</option>
                                    <option>Canada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="bedrooms">
                                    <option>Bedrooms</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="bathrooms">
                                    <option>Bathrooms</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                            <div class="form-group">
                                <button class="search-button">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Search area start -->

@if (!empty($destaque) && $destaque->count() > 0)
    <div class="properties-section property-big content-area" style="padding-bottom:0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="property property-hp row g-0 fp2 clearfix wow fadeInUp delay-03s">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <!-- Property img -->
                            <div class="property-img">
                                <div class="property-tag button alt featured">Destaque</div>
                                <div class="property-tag button sale">{{($destaque->venda == true ? 'Venda' : 'Locação')}}</div>
                                @if($destaque->exibivalores == true)
                                    @if(!empty($type) && $type == 'venda')
                                        <div class="property-price">R${{str_replace(',00', '', $destaque->valor_venda)}}</div>
                                    @elseif(!empty($type) && $type == 'locacao')
                                        <div class="property-price"><b>Aluguel:</b> R${{ str_replace(',00', '', $destaque->valor_locacao) }}/mês</div>
                                    @else
                                        @if($destaque->venda == true && !empty($destaque->valor_venda) && $destaque->valor_locacao == true && !empty($destaque->valor_locacao))
                                                <div class="property-price"><b>Valor do Imóvel:</b> R${{ str_replace(',00', '', $destaque->valor_venda) }} <br>
                                                <b>ou Valor do Aluguel:</b> R${{ str_replace(',00', '', $destaque->valor_locacao) }}/mês</div>
                                        @elseif($destaque->venda == true && !empty($destaque->valor_venda))
                                            <div class="property-price">R${{ str_replace(',00', '', $destaque->valor_venda) }}</div>
                                        @elseif($destaque->locacao == true && !empty($destaque->valor_locacao))
                                            <div class="property-price"><b>Aluguel:</b> R${{ str_replace(',00', '', $destaque->valor_locacao) }}/mês</div>
                                        @else
                                            <div class="property-price">Sob Consulta!</div>
                                        @endif
                                    @endif
                                @endif
                                <img src="{{$destaque->cover()}}" alt="{{$destaque->titulo}}" class="img-fluid w-100">
                                <div class="property-overlay">
                                    <a href="{{ route(($destaque->locacao == false ? 'web.buyProperty' : 'web.rentProperty'), ['slug' => $destaque->slug]) }}" class="overlay-link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                    @if ($destaque->youtube_video)
                                        <a class="overlay-link property-video" title="{{$destaque->titulo}}" data-embed="{{getEmbedYoutube($destaque->youtube_video)}}">
                                            <i class="fa fa-video-camera"></i>
                                        </a>
                                    @endif
                                    <div class="property-magnify-gallery">
                                        <a href="{{$destaque->nocover()}}" class="overlay-link">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                        @if($destaque->images()->get()->count())
                                            @foreach($destaque->images()->get() as $image)
                                                <a href="{{ $image->url_image }}" class="hidden"></a>                             
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 property-content">
                            <div class="info">
                                <!-- title -->
                                <h1 class="title">
                                    <a href="{{ route(($destaque->locacao == false ? 'web.buyProperty' : 'web.rentProperty'), ['slug' => $destaque->slug]) }}">{{$destaque->titulo}}</a>
                                </h1>
                                <!-- Property address -->
                                <h3 class="property-address">
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-map-marker"></i>{{$destaque->bairro}} - {{getCidadeNome($destaque->cidade, 'cidades')}}
                                    </a>
                                </h3>
                                <!-- Facilities List -->
                                <ul class="facilities-list clearfix">
                                    @if ($destaque->area_util)
                                        <li>
                                            <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                            <span>{{$destaque->area_util}}{{$destaque->medidas}} Área útil</span>
                                        </li>
                                    @endif
                                    @if ($destaque->area_total)
                                        <li>
                                            <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                            <span>{{$destaque->area_total}}{{$destaque->medidas}} Área total</span>
                                        </li>
                                    @endif
                                    @if ($destaque->dormitorios)
                                        <li>
                                            <i class="flaticon-bed"></i>
                                            <span>{{$destaque->dormitorios}} Dormitórios</span>
                                        </li>
                                    @endif
                                    @if ($destaque->banheiros)
                                        <li>
                                            <i class="flaticon-holidays"></i>
                                            <span>{{$destaque->banheiros}} Banheiros</span>
                                        </li>
                                    @endif                                    
                                    <li>
                                        <i class="flaticon-vehicle"></i>
                                        <span>
                                            @php
                                            if(!empty($destaque->garagem) && !empty($destaque->garagem_coberta)){
                                                $g = $destaque->garagem + $destaque->garagem_coberta;
                                                echo $g.' Garagem';
                                            }elseif(!empty($destaque->garagem) && empty($destaque->garagem_coberta)){
                                                echo $destaque->garagem.' Garagem';
                                            }else{
                                                echo $destaque->garagem_coberta.' Garagem';
                                            }
                                            @endphp
                                        </span>
                                    </li>
                                </ul>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if (!empty($imoveisParaVenda) && $imoveisParaVenda->count() > 0)
    <!-- Imóveis a venda -->
    <div class="properties-section-body content-area">
        <div class="container">
            <div class="main-title">
                <h1>Imóveis a Venda</h1>
            </div>
            <div class="row">                
                    @foreach ($imoveisParaVenda as $ivenda)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 wow fadeInUp delay-03s">
                        <div class="property fp2">
                            <!-- Property img -->
                            <div class="property-img">
                                <div class="property-tag button alt featured">Ref.: {{$ivenda->referencia}}</div>
                                <div class="property-tag button sale">{{$ivenda->tipo}}</div>
                                @if($ivenda->exibivalores == true)
                                    <div class="property-price">R$ {{str_replace(',00', '', $ivenda->valor_venda)}}</div>
                                @endif                                
                                <img src="{{$ivenda->cover()}}" alt="fp" class="img-fluid">
                                <div class="property-overlay">
                                    <a href="{{route('web.buyProperty', ['slug' => $ivenda->slug])}}" class="overlay-link">
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
                    </div>
                    @endforeach                
            </div>
        </div>
    </div>
@endif

@if (!empty($imoveisParaLocacao) && $imoveisParaLocacao->count() > 0)
    <!-- Imóveis para Locação -->
    <div class="properties-section-body content-area">
        <div class="container">
            <div class="main-title">
                <h1>Para Alugar</h1>
            </div>
            <div class="row">                
                    @foreach ($imoveisParaLocacao as $ilocacao)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 wow fadeInUp delay-03s">
                        <div class="property fp2">
                            <!-- Property img -->
                            <div class="property-img">
                                <div class="property-tag button alt featured">Ref.: {{$ilocacao->referencia}}</div>
                                <div class="property-tag button sale">{{$ilocacao->tipo}}</div>
                                @if($ilocacao->exibivalores == true)
                                    <div class="property-price">R${{str_replace(',00', '', $ilocacao->valor_venda)}}/mês</div>
                                @endif                                
                                <img src="{{$ilocacao->cover()}}" alt="fp" class="img-fluid">
                                <div class="property-overlay">
                                    <a href="{{ route('web.rentProperty', ['slug' => $ilocacao->slug]) }}" class="overlay-link">
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
                                        <a href="{{route('web.rentProperty', ['slug' => $ilocacao->slug])}}">{{$ilocacao->titulo}}</a>
                                    </h1>
                                    <!-- Property address -->
                                    <h3 class="property-address">
                                        <a href="{{route('web.rentProperty', ['slug' => $ilocacao->slug])}}">
                                            <i class="fa fa-map-marker"></i>{{$ilocacao->bairro}} - {{getCidadeNome($ilocacao->cidade, 'cidades')}}
                                        </a>
                                    </h3>
                                    <!-- Facilities List -->
                                    <ul class="facilities-list clearfix">
                                        <li>
                                            <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                            <span>{{$ilocacao->area_util}}{{$ilocacao->medidas}}</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-bed"></i>
                                            <span>{{$ilocacao->dormitorios}} Dorm.</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-holidays"></i>
                                            <span>{{$ilocacao->banheiros}} Banh.</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-vehicle"></i>
                                            <span>
                                                @php
                                                if(!empty($ilocacao->garagem) && !empty($ilocacao->garagem_coberta)){
                                                    $g = $ilocacao->garagem + $ilocacao->garagem_coberta;
                                                    echo $g.' Garag.';
                                                }elseif(!empty($ilocacao->garagem) && empty($ilocacao->garagem_coberta)){
                                                    echo $ilocacao->garagem.' Garag.';
                                                }else{
                                                    echo $ilocacao->garagem_coberta.' Garag.';
                                                }
                                                @endphp
                                            </span>
                                        </li>
                                    </ul>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    @endforeach                
            </div>
        </div>
    </div>
@endif

@if (!empty($artigos) && $artigos->count() > 0)
    <!-- Blog start -->
    <div class="blog comon-slick content-area">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Acompanhe nosso Blog</h1>
            </div>
            <div class="slick row comon-slick-inner" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                @foreach ($artigos as $artigo)
                    <div class="item slide-box wow fadeInUp delay-04s">
                        <div class="blog-2">
                            <img src="{{$artigo->cover()}}" alt="{{$artigo->titulo}}" class="img-fluid w-100">
                            <div class="blog-info">
                                <h3><a href="{{route('web.blog.artigo',['slug' => $artigo->slug])}}">{{$artigo->titulo}}</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog end -->
@endif

<!-- Video Modal -->
<div class="modal property-modal fade" id="propertyModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row modal-raw g-0">
                    <div class="col-12 modal-left">
                        <div class="modal-left-content">
                            <iframe class="modalIframe w-100" src="" allowfullscreen></iframe>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script>
        // Modal Vídeo
        $(document).on('click', '.property-video', function () {
            var embed = $(this).data('embed');
            $('.modalIframe').prop('src', embed);
            $('#propertyModal').modal('show');
        });

        $(".close").click(function(){
            $('.modalIframe').prop('src', '');
        });
    </script>    
@endsection