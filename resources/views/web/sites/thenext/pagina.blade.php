@extends("web.sites.{$tenant->template}.master.master")

@section('content')

<div class="sub-banner" style="background: rgba(0, 0, 0, 0.04) url({{$tenant->gettopodosite()}}) top left repeat;">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>{{$post->titulo}}</h1>
            <ul class="breadcrumbs">
                <li><a href="{{route('web.home')}}">Home</a></li>
                <li class="active">{{$post->titulo}}</li>
            </ul>
        </div>
    </div>
</div>

<div class="about-city-estate content-area-11">
    <div class="container">
        <div class="row">
            <div class="col-12 align-self-center">
                @if ($post->images()->get()->count())
                    <div class="mb-4 text-center" >                        
                        <img alt="{{$post->titulo}}" src="{{$post->cover()}}" class="img-fluid">                        
                    </div>
                @endif
                <div class="about-text">
                    {!! $post->content !!}
                </div>                
            </div>
        </div>
        <div class="row">
            @if($post->images()->get()->count())
                @foreach($post->images()->get() as $image)                    
                    <div class="col-lg-2 p-1">
                        <div class="portfolio-item car-magnify-gallery" style="margin-bottom: 0px;">
                            <a href="{{ $image->getUrlImageAttribute() }}">
                                <img src="{{ $image->getUrlCroppedAttribute() }}" class="img-responsive" alt="{{ $post->titulo }}">
                            </a>
                            <div class="portfolio-content">
                                <div class="portfolio-content-inner">
                                    
                                </div>
                            </div>
                        </div>  
                    </div>                              
                @endforeach
            @endif
        </div>
    </div>
</div>

@if(!empty($parceiros) && $parceiros->count() > 0)
    <div class="partners bg-white">
        <div class="container">
            <h4>Parceiros</h4>
            <div class="row">
                <div class="col-lg-12">
                    <div class="custom-slider slide-box-btn">
                        @foreach($parceiros as $parceiro)
                            <div class="custom-box">
                                <a href="{{route('web.parceiro',['slug' => $parceiro->slug])}}" title="{{ $parceiro->name }}">
                                    <img src="{{ $parceiro->nocover() }}" alt="{{ $parceiro->name }}">
                                </a>                                
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection