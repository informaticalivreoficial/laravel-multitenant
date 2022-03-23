@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div class="main_property">
    <div class="main_property_header bg-light py-3">
        <div class="container">
            <h2 class="text-front">{{$post->titulo}}</h2>
            </p>
        </div>
    </div>
    <div class="main_property_content py-y">
        <div class="container">
            <div class="row py-4">
                <div class="col-12">
                    @if ($post->images()->get()->count())
                        <div class="mb-4 text-center" >                        
                            <img alt="{{$post->titulo}}" src="{{$post->cover()}}" class="img-fluid">                        
                        </div>
                    @endif
                                        
                    <div class="main_property_content_descripition">
                        <div class="fb-share-button" data-href="{{url()->current()}}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartilhar</a></div>
                        <a style="background-color: #6ebf58;color:#fff;border:none;padding:2px 10px;margin-top:-8px" class="btn btn-front icon-whatsapp" target="_blank" href="https://web.whatsapp.com/send?text={{url()->current()}}" data-action="share/whatsapp/share">Compartilhar</a>                        
                    </div>
                    <div class="main_property_content_features mt-3">
                        {!! $post->content !!}
                    </div>
                    
                    <div class="main_property_content_structure mt-3">
                        @if($post->images()->get()->count())
                            @foreach($post->images()->get() as $image)
                                <div class="col-12 col-lg-3 p-3" style="float:left;">
                                    <a href="{{ $image->getUrlImageAttribute() }}" data-title="{{ $post->titulo }}" data-toggle="lightbox"
                                        data-gallery="property-gallery" data-type="image">
                                        <img src="{{ $image->getUrlCroppedAttribute() }}" class="d-block w-100" alt="{{ $post->titulo }}">
                                    </a>
                                </div>
                            @endforeach
                        @endif                
                    </div>

                   

                </div>
                <div class="col-12">                   
                    <div class="main_property_content_structure mt-3">
                        <h4 class="text-front">Parceiros</h4>
                        @if(!empty($parceiros) && $parceiros->count() > 0)
                            <div class="row">
                                <ul id="rcbrand1">
                                    @foreach($parceiros as $parceiro)                                
                                            <li>
                                                <a href="{{route('web.parceiro',['slug' => $parceiro->slug])}}" title="{{ $parceiro->name }}">
                                                    <img width="200" src="{{ $parceiro->nocover() }}" class="d-block w-100" alt="{{ $parceiro->name }}">
                                                </a>
                                            </li>                                
                                    @endforeach
                                </ul>
                            </div>
                        @endif                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
    #rcbrandDemo1, #rcbrandDemo2, #rcbrandDemo3 {
    display:none;
    }
    
    .rc-rcbrand-container {
        position:relative;
        max-width:100%;
        margin-bottom: 20px;
    }
    .rc-rcbrand-ul {
        position:relative;
        width:99999px;
        margin:0px;
        padding:0px;
        list-style-type:none;   
        text-align:center;  
        overflow: auto;
    }
    
    .rc-rcbrand-inner {
        position: relative;
        overflow: hidden;
        float:left;
        width:100%;
        background: #ffffff;;        
    }
    
    .rc-rcbrand-item {
        float:left;
        margin:0px;
        padding:0px;
        cursor:pointer;
        position:relative;
        line-height:0px;
    }
    .rc-rcbrand-item img {
        max-width: 100%;
        cursor: pointer;
        position: relative;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    
    .rc-rcbrand-nav-left,
    .rc-rcbrand-nav-right {
        padding:5px 10px;
        border-radius:50%;    
        position: absolute;
        cursor: pointer;
        z-index: 4;
        top: 50%;
        transform: translateY(-50%);   
        background: rgba(108, 245, 188, 0.5);
        color: #fff;     
    }
    
    .rc-rcbrand-nav-left {
        left: 10px;
    }
    
    .rc-rcbrand-nav-left:before {
        content: "<"
    }
    
    .rc-rcbrand-nav-left.disabled {
        opacity: 0.4;
    }
    
    .rc-rcbrand-nav-right {
        right: 5px;    
    }
    
    .rc-rcbrand-nav-right:before {
        content: ">"
    }
    
    .rc-rcbrand-nav-right.disabled {
        opacity: 0.4;
    }
</style>
@endsection

@section('js')
<script src="https://www.jqueryscript.net/demo/responsive-brand-logo-carousel/js/jquery.rcbrand.js"></script>
<script>
    $(function () {

        $("#rcbrand1").rcbrand({
            visibleItems: 4,
            itemsToScroll: 1,
            animationSpeed: 200,
            infinite: true,
            navigationTargetSelector: null,
            autoPlay: {
                enable: false,
                interval: 5000,
                pauseOnHover: true
            },
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 1,
                    itemsToScroll: 1
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 2,
                    itemsToScroll: 2
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 3,
                    itemsToScroll: 3
                }
            }
        });
        

        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
            alwaysShowClose: true
            });
        });

    });
    
</script>
@endsection