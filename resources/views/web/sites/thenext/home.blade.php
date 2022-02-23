@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<!-- Banner start -->
<div class="banner" id="banner6">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item item-bg active">
                <img class="d-block w-100 h-100" src="img/banner/img-3.jpg" alt="banner-photo">
                <div class="carousel-caption banner-slider-inner d-flex h-100">
                    <div class="banner-content container align-self-center text-start">
                        <h1>{{$tenant->email}} <span>Dream House</span></h1>
                        <p>Allow us to guide you through the innovative stress free approach in finding your dream Properties.</p>
                        <a class="btn-2 btn-defaults" href="#" data-animation="animated fadeInUp delay-15s">
                            <span>Get Started Now</span> <i class="arrow"></i>
                        </a>
                        <a class="btn-1 btn-outline-1" href="#" data-animation="animated fadeInUp delay-15s">
                            <span>Learn More</span> <i class="arrow"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item item-bg">
                <img class="d-block w-100 h-100" src="img/banner/img-4.jpg" alt="banner-photo">
                <div class="carousel-caption banner-slider-inner d-flex h-100">
                    <div class="banner-content container align-self-center text-center">
                        <h1>Sweet Home For <span>Small Family</span></h1>
                        <p>Allow us to guide you through the innovative stress free approach in finding your dream Properties.</p>
                        <a class="btn-2 btn-defaults" href="#" data-animation="animated fadeInUp delay-15s">
                            <span>Get Started Now</span> <i class="arrow"></i>
                        </a>
                        <a class="btn-1 btn-outline-1" href="#" data-animation="animated fadeInUp delay-15s">
                            <span>Learn More</span> <i class="arrow"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item item-bg">
                <img class="d-block w-100 h-100" src="img/banner/img-2.jpg" alt="banner-photo">
                <div class="carousel-caption banner-slider-inner d-flex h-100">
                    <div class="banner-content container align-self-center text-end">
                        <h1>Best Place To <span>Find Home</span></h1>
                        <p>Allow us to guide you through the innovative stress free approach in finding your dream Properties.</p>
                        <a class="btn-2 btn-defaults" href="#" data-animation="animated fadeInUp delay-15s">
                            <span>Get Started Now</span> <i class="arrow"></i>
                        </a>
                        <a class="btn-1 btn-outline-1" href="#" data-animation="animated fadeInUp delay-15s">
                            <span>Learn More</span> <i class="arrow"></i>
                        </a>
                    </div>
                </div>
            </div>
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
<!-- Banner end -->

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

@if (!empty($imoveisParaVenda) && $imoveisParaVenda->count() > 0)
    <!-- Imóveis a venda -->
    <div class="properties-section-body content-area">
        <div class="container">
            <div class="main-title">
                <h1>Destaques a Venda</h1>
            </div>
            <div class="row">                
                    @foreach ($imoveisParaVenda as $ivenda)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 wow fadeInUp delay-03s">
                        <div class="property fp2">
                            <!-- Property img -->
                            <div class="property-img">
                                <div class="property-tag button alt featured">Ref.: {{$ivenda->referencia}}</div>
                                <div class="property-tag button sale">{{$ivenda->tipo}}</div>
                                <div class="property-price">R$ {{str_replace(',00', '', $ivenda->valor_venda)}}</div>
                                <img src="{{$ivenda->cover()}}" alt="fp" class="img-fluid">
                                <div class="property-overlay">
                                    <a href="properties-details.html" class="overlay-link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                    <a class="overlay-link property-video" title="Lexus GS F">
                                        <i class="fa fa-video-camera"></i>
                                    </a>
                                    <div class="property-magnify-gallery">
                                        <a href="img/properties/properties-1.jpg" class="overlay-link">
                                            <i class="fa fa-expand"></i>
                                        </a>
    
                                        <a href="img/properties/properties-2.jpg" class="hidden"></a>
                                        <a href="img/properties/properties-3.jpg" class="hidden"></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Property content -->
                            <div class="property-content">
                                <!-- info -->
                                <div class="info">
                                    <!-- title -->
                                    <h1 class="title">
                                        <a href="properties-details.html">{{$ivenda->titulo}}</a>
                                    </h1>
                                    <!-- Property address -->
                                    <h3 class="property-address">
                                        <a href="properties-details.html">
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



<!-- Our service there start -->
<div class="our-service-there">
    <div class="our-service-there-inner">
        <div class="container">
            <!-- Main title -->
            <div class="main-title main-title-3">
                <h1>What Are you Looking For?</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInLeft delay-04s">
                    <div class="bg-service-color">
                        <div class="services-info-4">
                            <div class="icon">
                                <i class="flaticon-people-1"></i>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="services-1.html">Trusted By Thousands</a>
                                </h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                            </div>
                        </div>
                        <div class="services-info-4">
                            <div class="icon">
                                <i class="flaticon-symbol-1"></i>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="services-1.html">Financing Made Easy</a>
                                </h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                        <div class="services-info-4 mb-0">
                            <div class="icon">
                                <i class="flaticon-apartment"></i>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="services-1.html">
                                        Wide Renge Of Properties
                                    </a>
                                </h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wow fadeInRight delay-04s">
                    <div class="cap2">
                        <img src="img/avatar/avatar-8.png" alt="avatar-6" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our service there end -->

<!-- Recently properties start -->
<div class="content-area comon-slick recently-properties">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Recently Properties</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
        </div>
        <div class="slick row comon-slick-inner" data-slick='{"slidesToShow": 4, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
            <div class="item slide-box wow fadeInRight delay-04s">
                <div class="property-2">
                    <div class="property-inner">
                        <div class="property-overflow">
                            <div class="property-photo">
                                <img src="img/recently-properties/img-1.jpg" alt="rp" class="img-fluid">
                                <div class="listing-badges">
                                    <span class="featured active">For Sale</span>
                                </div>
                                <div class="price-ratings">
                                    <div class="price">$72.000</div>
                                </div>
                            </div>
                        </div>
                        <!-- content -->
                        <div class="content">
                            <!-- title -->
                            <h4 class="title">
                                <a href="properties-details.html">Big Head House</a>
                            </h4>
                            <!-- Property address -->
                            <h3 class="property-address">
                                <a href="properties-details.html">
                                    <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                </a>
                            </h3>
                        </div>
                        <!-- Facilities List -->
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                <span>720 sq ft</span>
                            </li>
                            <li>
                                <i class="flaticon-bed"></i>
                                <span>3Bed</span>
                            </li>
                            <li>
                                <i class="flaticon-holidays"></i>
                                <span>2Bath</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="item slide-box wow fadeInRight delay-04s">
                <div class="property-2">
                    <div class="property-inner">
                        <div class="property-overflow">
                            <div class="property-photo property-img">
                                <img src="img/recently-properties/img-2.jpg" alt="rp" class="img-fluid">
                                <div class="listing-badges">
                                    <span class="featured red">For Rent</span>
                                </div>
                                <div class="price-ratings">
                                    <div class="price">$72.000</div>
                                </div>
                            </div>
                        </div>
                        <!-- content -->
                        <div class="content">
                            <!-- title -->
                            <h4 class="title">
                                <a href="properties-details.html">Masons Villas</a>
                            </h4>
                            <!-- Property address -->
                            <h3 class="property-address">
                                <a href="properties-details.html">
                                    <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                </a>
                            </h3>
                        </div>
                        <!-- Facilities List -->
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                <span>720 sq ft</span>
                            </li>
                            <li>
                                <i class="flaticon-bed"></i>
                                <span>3Bed</span>
                            </li>
                            <li>
                                <i class="flaticon-holidays"></i>
                                <span>2Bath</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="item slide-box wow fadeInLeft delay-04s">
                <div class="property-2">
                    <div class="property-inner">
                        <div class="property-overflow">
                            <div class="property-photo">
                                <img src="img/recently-properties/img-3.jpg" alt="rp" class="img-fluid">
                                <div class="listing-badges">
                                    <span class="featured active">For Sale</span>
                                </div>
                                <div class="price-ratings">
                                    <div class="price">$72.000</div>
                                </div>
                            </div>
                        </div>
                        <!-- content -->
                        <div class="content">
                            <!-- title -->
                            <h4 class="title">
                                <a href="properties-details.html">Park Avenue</a>
                            </h4>
                            <!-- Property address -->
                            <h3 class="property-address">
                                <a href="properties-details.html">
                                    <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                </a>
                            </h3>
                        </div>
                        <!-- Facilities List -->
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                <span>720 sq ft</span>
                            </li>
                            <li>
                                <i class="flaticon-bed"></i>
                                <span>3Bed</span>
                            </li>
                            <li>
                                <i class="flaticon-holidays"></i>
                                <span>2Bath</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="item slide-box wow fadeInLeft delay-04s">
                <div class="property-2">
                    <div class="property-inner">
                        <div class="property-overflow">
                            <div class="property-photo property-img">
                                <img src="img/recently-properties/img-4.jpg" alt="rp" class="img-fluid">
                                <div class="listing-badges">
                                    <span class="featured red">For Rent</span>
                                </div>
                                <div class="price-ratings">
                                    <div class="price">$72.000</div>
                                </div>
                            </div>
                        </div>
                        <!-- content -->
                        <div class="content">
                            <!-- title -->
                            <h4 class="title">
                                <a href="properties-details.html">Park Avenue</a>
                            </h4>
                            <!-- Property address -->
                            <h3 class="property-address">
                                <a href="properties-details.html">
                                    <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                </a>
                            </h3>
                        </div>
                        <!-- Facilities List -->
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                <span>720 sq ft</span>
                            </li>
                            <li>
                                <i class="flaticon-bed"></i>
                                <span>3Bed</span>
                            </li>
                            <li>
                                <i class="flaticon-holidays"></i>
                                <span>2Bath</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="item slide-box wow fadeInLeft delay-04s">
                <div class="property-2">
                    <div class="property-inner">
                        <div class="property-overflow">
                            <div class="property-photo property-img">
                                <img src="img/recently-properties/img-3.jpg" alt="rp" class="img-fluid">
                                <div class="listing-badges">
                                    <span class="featured red">For Rent</span>
                                </div>
                                <div class="price-ratings">
                                    <div class="price">$72.000</div>
                                </div>
                            </div>
                        </div>
                        <!-- content -->
                        <div class="content">
                            <!-- title -->
                            <h4 class="title">
                                <a href="properties-details.html">Family Villa</a>
                            </h4>
                            <!-- Property address -->
                            <h3 class="property-address">
                                <a href="properties-details.html">
                                    <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                </a>
                            </h3>
                        </div>
                        <!-- Facilities List -->
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                <span>720 sq ft</span>
                            </li>
                            <li>
                                <i class="flaticon-bed"></i>
                                <span>3Bed</span>
                            </li>
                            <li>
                                <i class="flaticon-holidays"></i>
                                <span>2Bath</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Recently Partners block end -->

<!-- Counters 3 strat -->
<div class="counters-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 align-self-center wow fadeInLeft delay-04s">
                <div class="sec-title-three">
                    <div class="main-title main-title-3 mb-0">
                        <h1>More than 10 Years of Experience</h1>
                        <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</P>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 wow fadeInRight delay-04s">
                <div class="counters-3-inner">
                    <div class="counter-box-3 d-flex">
                        <i class="flaticon-tag"></i>
                        <div class="detail">
                            <h1 class="counter">967</h1>
                            <p>Listings For Sale</p>
                        </div>
                    </div>
                    <div class="counter-box-3 d-flex">
                        <i class="flaticon-symbol-1"></i>
                        <div class="detail">
                            <h1 class="counter">967</h1>
                            <p>Listings For Rent</p>
                        </div>
                    </div>
                    <div class="counter-box-3 d-flex">
                        <i class="flaticon-people"></i>
                        <div class="detail">
                            <h1 class="counter">396</h1>
                            <p>Agents</p>
                        </div>
                    </div>
                    <div class="counter-box-3 d-flex">
                        <i class="flaticon-people-1"></i>
                        <div class="detail">
                            <h1 class="counter">177</h1>
                            <p>Brokers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counters 3 end -->

<!-- Popular places start -->
<div class="popular-places comon-slick content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Popular Places</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
        </div>
        <div class="slick row wow fadeInUp delay-04s" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
            <div class="item">
                <div class="popular-places-box-2">
                    <img src="img/popular-places/popular-places-4.jpg" alt="photo" class="img-fluid w-100">
                    <div class="ling-section">
                        <h3>
                            <a href="properties-details.html">Tokyo City</a>
                        </h3>
                        <p class="member-socials">Friendly neighborhood</p>
                        <a href="properties-details.html" class="read-more-btn">Read More</a>
                    </div>
                    <div class="listings_no">47 Properties</div>
                </div>
            </div>
            <div class="item">
                <div class="popular-places-box-2">
                    <img src="img/popular-places/popular-places-8.jpg" alt="photo" class="img-fluid w-100">
                    <div class="ling-section">
                        <h3>
                            <a href="properties-details.html">New York City</a>
                        </h3>
                        <p class="member-socials">Friendly neighborhood</p>
                        <a href="properties-details.html" class="read-more-btn">Read More</a>
                    </div>
                    <div class="listings_no">47 Properties</div>
                </div>
            </div>
            <div class="item">
                <div class="popular-places-box-2">
                    <img src="img/popular-places/popular-places-9.jpg" alt="photo" class="img-fluid w-100">
                    <div class="ling-section">
                        <h3>
                            <a href="properties-details.html">London City</a>
                        </h3>
                        <p class="member-socials">Friendly neighborhood</p>
                        <a href="properties-details.html" class="read-more-btn">Read More</a>
                    </div>
                    <div class="listings_no">47 Properties</div>
                </div>
            </div>
            <div class="item">
                <div class="popular-places-box-2">
                    <img src="img/popular-places/popular-places-9.jpg" alt="photo" class="img-fluid w-100">
                    <div class="ling-section">
                        <h3>
                            <a href="properties-details.html">London City</a>
                        </h3>
                        <p class="member-socials">Friendly neighborhood</p>
                        <a href="properties-details.html" class="read-more-btn">Read More</a>
                    </div>
                    <div class="listings_no">47 Properties</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Popular places end -->

<!-- Agent section start -->
<div class="agent-section content-area-17 comon-slick">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Our Agent</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
        </div>
        <div class="slick row comon-slick-inner" data-slick='{"slidesToShow": 4, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
            <div class="item slide-box wow fadeInRight delay-04s">
                <div class="agent-1">
                    <div class="member-thumb">
                        <img src="img/avatar/avatar-1.png" alt="agent-1" class="img-fluid w-100">
                    </div>
                    <div class="member-content-wrap">
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Michelle Nelson</a>
                            </h4>
                            <p class="member-designation">Support Manager</p>
                            <div class="social-list clearfix">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-hover-content">
                        <div class="member-thumb">
                            <img src="img/avatar/avatar-1.png" alt="agent-1" class="img-fluid w-100 h-100">
                        </div>
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Michelle Nelson</a>
                            </h4>
                            <p class="member-designation">Support Manager</p>
                        </div>
                        <div class="member-socials">
                            <a href="#" class="facebook-bg"><i class="fa fa-facebook "></i></a>
                            <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="rss-bg"><i class="fa fa-rss"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item slide-box wow fadeInRight delay-04s">
                <div class="agent-1">
                    <div class="member-thumb">
                        <img src="img/avatar/avatar-2.png" alt="agent-1" class="img-fluid w-100 h-100">
                    </div>
                    <div class="member-content-wrap">
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Karen Paran</a>
                            </h4>
                            <p class="member-designation">Web Developer</p>
                            <div class="social-list clearfix">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-hover-content">
                        <div class="member-thumb">
                            <img src="img/avatar/avatar-2.png" alt="agent-1" class="img-fluid w-100 h-100">
                        </div>
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Karen Paran</a>
                            </h4>
                            <p class="member-designation">Web Developer</p>
                        </div>
                        <div class="member-socials">
                            <a href="#" class="facebook-bg"><i class="fa fa-facebook "></i></a>
                            <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="rss-bg"><i class="fa fa-rss"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item slide-box wow fadeInLeft delay-04s">
                <div class="agent-1">
                    <div class="member-thumb">
                        <img src="img/avatar/avatar-3.png" alt="agent-1" class="img-fluid w-100">
                    </div>
                    <div class="member-content-wrap">
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Karen Paran</a>
                            </h4>
                            <p class="member-designation">Office Manager</p>
                            <div class="social-list clearfix">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-hover-content">
                        <div class="member-thumb">
                            <img src="img/avatar/avatar-3.png" alt="agent-1" class="img-fluid w-100 h-100">
                        </div>
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Karen Paran</a>
                            </h4>
                            <p class="member-designation">Office Manager</p>
                        </div>
                        <div class="member-socials">
                            <a href="#" class="facebook-bg"><i class="fa fa-facebook "></i></a>
                            <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="rss-bg"><i class="fa fa-rss"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item slide-box wow fadeInLeft delay-04s">
                <div class="agent-1">
                    <div class="member-thumb">
                        <img src="img/avatar/avatar-4.png" alt="team-1" class="img-fluid">
                    </div>
                    <div class="member-content-wrap">
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Martin Smith</a>
                            </h4>
                            <p class="member-designation">Creative Director</p>
                            <div class="social-list clearfix">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-hover-content">
                        <div class="member-thumb">
                            <img src="img/avatar/avatar-4.png" alt="team-1" class="img-fluid h-100">
                        </div>
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Martin Smith</a>
                            </h4>
                            <p class="member-designation">Creative Director</p>
                        </div>
                        <div class="member-socials">
                            <a href="#" class="facebook-bg"><i class="fa fa-facebook "></i></a>
                            <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="rss-bg"><i class="fa fa-rss"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item slide-box wow fadeInLeft delay-04s">
                <div class="agent-1">
                    <div class="member-thumb">
                        <img src="img/avatar/avatar-3.png" alt="team-1" class="img-fluid">
                    </div>
                    <div class="member-content-wrap">
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Karen Paran</a>
                            </h4>
                            <p class="member-designation">Office Manager</p>
                            <div class="social-list clearfix">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-hover-content">
                        <div class="member-thumb">
                            <img src="img/avatar/avatar-3.png" alt="team-1" class="img-fluid h-100">
                        </div>
                        <div class="member-name-designation">
                            <h4 class="member-name">
                                <a href="agent-single.html">Martin Smith</a>
                            </h4>
                            <p class="member-designation">Creative Director</p>
                        </div>
                        <div class="member-socials">
                            <a href="#" class="facebook-bg"><i class="fa fa-facebook "></i></a>
                            <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="rss-bg"><i class="fa fa-rss"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Agent section end -->

<!-- Testimonial 3 section start-->
<div class="testimonials-3 content-area-7 comon-slick">
    <div class="container">
        <!-- Main title -->
        <div class="main-title main-title-3">
            <h1>Our Testimonial</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
        </div>
        <div class="slick row comon-slick-inner" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 1}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
            <div class="item slide-box wow fadeInRight delay-04s">
                <div class="testimonials-inner">
                    <div class="user">
                        <a href="#">
                            <img class="media-object" src="img/avatar/avatar-1.jpg" alt="user">
                        </a>
                    </div>
                    <div class="testimonial-info">
                        <h3>
                            Pitarshon Roky
                        </h3>
                        <p>Creative Director</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text everLorem industry's standard dummy text everLorem.</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-full"></i>
                            <span>Reting</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item slide-box wow fadeInRight delay-04s">
                <div class="testimonials-inner">
                    <div class="user">
                        <a href="#">
                            <img class="media-object" src="img/avatar/avatar-2.jpg" alt="user">
                        </a>
                    </div>
                    <div class="testimonial-info">
                        <h3>
                            Creative Director, india
                        </h3>
                        <p>Office Manager</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text everLorem industry's standard dummy text everLorem.</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-full"></i>
                            <span>Reting</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item slide-box wow fadeInLeft delay-04s">
                <div class="testimonials-inner">
                    <div class="user">
                        <a href="#">
                            <img class="media-object" src="img/avatar/avatar-3.jpg" alt="user">
                        </a>
                    </div>
                    <div class="testimonial-info">
                        <h3>
                            Maikel Alisa
                        </h3>
                        <p>Web Designer, Uk</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text everLorem industry's standard dummy text everLorem.</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-full"></i>
                            <span>Reting</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial 3 end -->

<!-- Blog start -->
<div class="blog comon-slick content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Our Blog</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
        </div>
        <div class="slick row comon-slick-inner" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
            <div class="item slide-box wow fadeInUp delay-04s">
                <div class="blog-3">
                    <div class="blog-image">
                        <img src="img/blog/blog-1.jpg" alt="blog-3" class="img-fluid w-100">
                        <div class="date-box">14 Nov</div>
                        <div class="post-meta clearfix">
                            <span><a href="#"><i class="fa fa-user"></i></a> Admin</span>
                            <span><a href="#"><i class="fa fa-calendar"></i></a> 17K</span>
                            <span><a href="#"><i class="fa fa-comments"></i></a> 73k</span>
                        </div>
                    </div>
                    <div class="detail">
                        <h4>
                            <a href="blog-single-sidebar-right.html">Selling Your Real House</a>
                        </h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>
                        <a href="blog-single-sidebar-right.html" class="read-more">Read More...</a>
                    </div>
                </div>
            </div>
            <div class="item slide-box wow fadeInRight delay-04s">
                <div class="blog-3">
                    <div class="blog-image">
                        <img src="img/blog/blog-3.jpg" alt="blog-3" class="img-fluid w-100">
                        <div class="date-box">14 Nov</div>
                        <div class="post-meta clearfix">
                            <span><a href="#"><i class="fa fa-user"></i></a> Admin</span>
                            <span><a href="#"><i class="fa fa-calendar"></i></a> 17K</span>
                            <span><a href="#"><i class="fa fa-comments"></i></a> 73k</span>
                        </div>
                    </div>
                    <div class="detail">
                        <h4>
                            <a href="blog-single-sidebar-right.html">Buying a Best House</a>
                        </h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>
                        <a href="blog-single-sidebar-right.html" class="read-more">Read More...</a>
                    </div>
                </div>
            </div>
            <div class="item slide-box wow fadeInUp delay-04s">
                <div class="blog-3">
                    <div class="blog-image">
                        <img src="img/blog/blog-2.jpg" alt="blog-3" class="img-fluid w-100">
                        <div class="date-box">14 Nov</div>
                        <div class="post-meta clearfix">
                            <span><a href="#"><i class="fa fa-user"></i></a> Admin</span>
                            <span><a href="#"><i class="fa fa-calendar"></i></a> 17K</span>
                            <span><a href="#"><i class="fa fa-comments"></i></a> 73k</span>
                        </div>
                    </div>
                    <div class="detail">
                        <h4>
                            <a href="blog-single-sidebar-right.html">Selling Your Real House</a>
                        </h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>
                        <a href="blog-single-sidebar-right.html" class="read-more">Read More...</a>
                    </div>
                </div>
            </div>
            <div class="item slide-box wow fadeInLeft delay-04s">
                <div class="blog-3">
                    <div class="blog-image">
                        <img src="img/blog/blog-2.jpg" alt="blog-3" class="img-fluid w-100">
                        <div class="date-box">14 Nov</div>
                        <div class="post-meta clearfix">
                            <span><a href="#"><i class="fa fa-user"></i></a> Admin</span>
                            <span><a href="#"><i class="fa fa-calendar"></i></a> 17K</span>
                            <span><a href="#"><i class="fa fa-comments"></i></a> 73k</span>
                        </div>
                    </div>
                    <div class="detail">
                        <h4>
                            <a href="blog-single-sidebar-right.html">Two Extra Hours a Day!</a>
                        </h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the</p>
                        <a href="blog-single-sidebar-right.html" class="read-more">Read More...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog end -->

<!-- Partners strat -->
<div class="partners bg-white">
    <div class="container">
        <h4>Brands <span>$ Partners</span></h4>
        <div class="row">
            <div class="col-lg-12">
                <div class="custom-slider slide-box-btn">
                    <div class="custom-box"><img src="img/brand/partner.png" alt="brand"></div>
                    <div class="custom-box"><img src="img/brand/partner-2.png" alt="brand"></div>
                    <div class="custom-box"><img src="img/brand/partner-3.png" alt="brand"></div>
                    <div class="custom-box"><img src="img/brand/partner-4.png" alt="brand"></div>
                    <div class="custom-box"><img src="img/brand/partner-5.png" alt="brand"></div>
                    <div class="custom-box"><img src="img/brand/partner.png" alt="brand"></div>
                    <div class="custom-box"><img src="img/brand/partner-2.png" alt="brand"></div>
                    <div class="custom-box"><img src="img/brand/partner-3.png" alt="brand"></div>
                    <div class="custom-box"><img src="img/brand/partner-4.png" alt="brand"></div>
                    <div class="custom-box"><img src="img/brand/partner-5.png" alt="brand"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partners end -->


<!-- Property Video Modal -->
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
                    <div class="col-lg-5 modal-left">
                        <div class="modal-left-content">
                            <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <iframe class="modalIframe w-100" src="https://www.youtube.com/embed/xywe1MxGxKw" allowfullscreen></iframe>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/img-1.jpg" alt="model-photo" class="w-100 img-fluid">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/img-2.jpg" alt="model-photo" class="w-100 img-fluid">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 modal-right">
                        <div class="modal-right-content bg-white">
                            <div class="heading comon-section">
                                <h2>Find Your Dream House</h2>
                                <p class="location">123 Kathal St. Tampa City,</p>
                            </div>
                            <div class="features comon-section">
                                <strong class="price">
                                    $178,000
                                </strong>
                                <section>
                                    <h3>Features</h3>
                                </section>
                                <ul class="bullets">
                                    <li><i class="flaticon-air-conditioner"></i>Air conditioning</li>
                                    <li><i class="flaticon-wifi"></i>Wifi</li>
                                    <li><i class="flaticon-transport"></i>Parking</li>
                                    <li><i class="flaticon-people-2"></i>Pool</li>
                                    <li><i class="flaticon-weightlifting"></i>Gym</li>
                                    <li><i class="flaticon-building"></i>Alarm</li>
                                    <li><i class="flaticon-old-telephone-ringing"></i>Balcony</li>
                                    <li><i class="flaticon-monitor"></i>TV</li>
                                </ul>
                            </div>
                            <div class="0verview comon-section cs-none">
                                <section>
                                    <h3>Overview</h3>
                                </section>
                                <dl>
                                    <dt>Model</dt>
                                    <dd>Maxima</dd>
                                    <dt>Condition</dt>
                                    <dd>Brand New</dd>
                                    <dt>Year</dt>
                                    <dd>2018</dd>
                                    <dt>Price</dt>
                                    <dd>$178,000</dd>
                                </dl>
                                <a href="properties-details.html" class="btn button-sm button-theme">Show Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection