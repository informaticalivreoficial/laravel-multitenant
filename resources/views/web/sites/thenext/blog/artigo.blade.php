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

<!-- Blog body start -->
<div class="blog-body content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <!-- Blog box start -->
                <div class="blog-box clearfix">
                    <img src="{{$post->nocover()}}" alt="{{$post->titulo}}" class="img-fluid w-100">
                    <!-- detail -->
                    <div class="detail">
                        <!--Main title -->
                        <h3 class="title">{{$post->titulo}}</h3>
                        <!-- Post meta -->
                        <div class="post-meta">
                            <span><a href="#"><i class="fa fa-user"></i> {{$post->userObject->name}}</a></span>
                            <span><a><i class="fa fa-calendar "></i> {{$post->publish_at}}</a></span>
                            <span><a href="#"><i class="fa fa-bars"></i> {{$post->categoriaObject->titulo}}</a></span>
                        </div>
                        <!-- paragraph -->
                        {!! $post->content !!}

                        <div class="row">
                            @if($post->images()->get()->count())
                                @foreach($post->images()->get() as $image)
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                                        <div class="portfolio-item car-magnify-gallery">
                                            <a href="{{ $image->getUrlImageAttribute() }}" title="{{ $post->titulo }}">
                                                <img src="{{ $image->getUrlCroppedAttribute() }}" alt="{{ $post->titulo }}" class="img-fluid">
                                            </a>                                            
                                        </div>
                                    </div>
                                @endforeach
                            @endif                            
                        </div>
                        
                        <div class="row clearfix t-s">
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <!-- Tags box start -->
                                <div class="tags-box">
                                    <h2>Tags</h2>
                                    @if($postsTags->count())
                                        <ul class="tags">
                                            @foreach($postsTags as $posttags) 
                                                @php
                                                    $array = explode(",", $posttags->tags);
                                                    foreach($array as $tags){
                                                        $tag = trim($tags);                                                       
                                                        echo '<li>';
                                                        if($posttags->tipo == 'artigo'){
                                                            echo '<a href="'.route('web.blog.artigo',['slug' => $posttags->slug]).'">';
                                                        }else{
                                                            echo '<a href="'.route('web.noticia',['slug' => $posttags->slug]).'">';
                                                        }    
                                                        echo $tag;
                                                        echo '</a></li>';
                                                    }
                                                @endphp                                                     
                                            @endforeach
                                        </ul> 
                                    @endif                                   
                                </div>
                                <!-- Tags box end -->
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <!-- Blog Share start -->
                                <div class="social-media clearfix blog-share">
                                    <h2>Compartilhe</h2>
                                    <div class="fb-share-button" data-href="{{url()->current()}}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartilhar</a></div>
                                    <a style="background-color: #6ebf58;color:#fff;border:none;padding:2px 10px;margin-top:-8px" class="btn btn-front icon-whatsapp" target="_blank" href="https://web.whatsapp.com/send?text={{url()->current()}}" data-action="share/whatsapp/share">Compartilhar</a>
                                </div>
                                <!-- Blog Share end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog box end -->

                
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="sidebar">                  

                    @if(!empty($categorias) && $categorias->count() > 0)
                        <div class="sidebar-widget category-posts">
                            <div class="main-title-2">
                                <h1>Categorias</h1>
                            </div>      
                            <ul class="list-unstyled list-cat">              
                                @foreach($categorias as $categoria)   
                                    @if($categoria->countposts() >= 1)
                                        <li><a href="{{route(($categoria->tipo == 'artigo' ? 'web.blog.categoria' : 'web.noticia.categoria'), ['slug' => $categoria->slug] )}}">{{ $categoria->titulo }}</a> <span>({{$categoria->countposts()}})</span></li>
                                    @endif                                                                                                          
                                @endforeach
                            </ul>
                        </div>
                    @endif
                                            
                    @if($postsMais->count())
                        <div class="sidebar-widget popular-posts">
                            <div class="main-title-2">
                                <h1>Veja Também</h1>
                            </div>
                            @foreach($postsMais as $postsmais)
                            <div class="d-flex mb-3 popular-posts-box">
                                <a class="pr-3" href="{{route(($postsmais->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'), ['slug' => $postsmais->slug] )}}">
                                    <img src="{{$postsmais->cover()}}" alt="{{$postsmais->titulo}}" class="flex-shrink-0 me-3">
                                </a>
                                <div class="detail align-self-center">
                                    <h4>
                                        <a href="{{route(($postsmais->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'), ['slug' => $postsmais->slug] )}}">{{$postsmais->titulo}}</a>
                                    </h4>                                    
                                </div>
                            </div>                                                       
                            @endforeach
                        </div>
                    @endif                        
                                       
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog body end -->
@endsection

@section('js')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v11.0&appId=1787040554899561&autoLogAppEvents=1" nonce="1eBNUT9J"></script>
@endsection