@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div class="sub-banner" style="background: rgba(0, 0, 0, 0.04) url({{$tenant->gettopodosite()}}) top left repeat;">
    <div class="overlay">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Imóveis para {{$type}}</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{route('web.home')}}">Home</a></li>
                    <li class="active">Imóveis para {{$type}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@if (!empty($imoveis) && $imoveis->count() > 0)
<div class="properties-section-body content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 scrolling-pagination">               
                <div class="row">
                    @foreach ($imoveis as $imovel)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 wow fadeInUp delay-03s">
                        <!-- Property start -->
                        <div class="property fp2">
                            <!-- Property img -->
                            <div class="property-img">
                                <div class="property-tag button alt featured">Featured</div>
                                <div class="property-tag button sale">For Sale</div>
                                <div class="property-price">$72.000</div>
                                <img src="{{$imovel->cover()}}" alt="fp" class="img-fluid">
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
                                        <a href="properties-details.html">{{$imovel->titulo}}</a>
                                    </h1>
                                    <!-- Property address -->
                                    <h3 class="property-address">
                                        <a href="properties-details.html">
                                            <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                        </a>
                                    </h3>
                                    <!-- Facilities List -->
                                    <ul class="facilities-list clearfix">
                                        <li>
                                            <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                                            <span>4800 sq ft</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-bed"></i>
                                            <span>3 Beds</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-monitor"></i>
                                            <span>TV </span>
                                        </li>
                                        <li>
                                            <i class="flaticon-holidays"></i>
                                            <span> 2 Baths</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-vehicle"></i>
                                            <span>1 Garage</span>
                                        </li>
                                        <li>
                                            <i class="flaticon-building"></i>
                                            <span> 3 Balcony</span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Property footer -->
                                <div class="property-footer">
                                <span class="left">
                                    <a href="#"><i class="fa fa-user"></i>Jhon Doe</a>
                                </span>
                                    <span class="right">
                                    <i class="fa fa-calendar"></i>5 Days ago
                                </span>
                                </div>
                            </div>
                        </div>
                        <!-- Property end -->
                    </div>
                    @endforeach 
                    {{$imoveis->links()}}                   
                </div>
                
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script>
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