@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div class="blog-body content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 col-md-push-4">
                <!-- Blog box start -->
                <div class="thumbnail blog-box clearfix">                
                    <img src="{{$post->nocover()}}" alt="{{$post->titulo}}" class="img-responsive"/>
                    <div class="caption detail">
                        <!--Main title -->
                        <h3 class="title">
                            {{$post->titulo}}
                        </h3>
                        <!-- Post meta -->
                        <div class="post-meta">
                            <span><a href="#"><i class="fa fa-user"></i>{{$post->userObject->name}}</a></span>
                            <span><a><i class="fa fa-calendar "></i>{{$post->publish_at}}</a></span>
                            <span><a href="#"><i class="fa fa-bars"></i> {{$post->categoriaObject->titulo}}</a></span>
                        </div>
                        <!-- Social list -->
                        <div id="shareIcons"></div>
                        {!! $post->content !!}                        
                        
                        <div class="row clearfix t-s">  
                            @if($post->images()->get()->count())
                                @foreach($post->images()->get() as $image)
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                                        <div class="agent-1">
                                            <a rel="ShadowBox[galeria]" href="{{ $image->getUrlImageAttribute() }}" title="{{ $post->titulo }}">
                                                <img src="{{ $image->getUrlCroppedAttribute() }}" alt="{{ $post->titulo }}" class="img-responsive">
                                            </a>                                            
                                        </div>
                                    </div>
                                @endforeach
                            @endif            
                        </div> 
                        
                        <div class="row clearfix t-s">
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">                            
                                @if($postsTags->count())                                        
                                    <div class="tags-box">
                                    <h2>Tags</h2>                        
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
                                    </div>                                        
                                @endif                                                           
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">                               
                                <div class="social-media clearfix blog-share">
                                    <h2>Compartilhe</h2>                                    
                                    <div class="shareIcons"></div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            
            
            

            <div class="col-lg-4 col-md-4 col-xs-12 col-md-pull-8">
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
                            <div class="media">
                                <div class="media-left">
                                    <img width="90" src="{{$postsmais->nocover()}}" alt="{{$postsmais->titulo}}" class="media-object">
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">
                                        <a href="{{route(($postsmais->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'), ['slug' => $postsmais->slug] )}}">{{$postsmais->titulo}}</a>
                                    </h3>     
                                    <p>{{$postsmais->publish_at}}</p>                               
                                </div>
                            </div>                                                       
                            @endforeach
                        </div>
                    @endif
                    
                    @if($postsTags->count())
                        <div class="sidebar-widget tags-box">
                            <div class="main-title-2">
                                <h1>Tags</h1>
                            </div>
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
                        </div>
                    @endif 
                    
                    <div class="social-media sidebar-widget clearfix">                       
                        <div class="main-title-2">
                            <h1>Redes Sociais</h1>
                        </div>                       
                        <ul class="social-list">
                            @if ($tenant->facebook)
                                <li><a target="_blank" class="facebook" href="{{$tenant->facebook}}" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            @endif
                            @if ($tenant->twitter)
                                <li><a target="_blank" class="twitter" href="{{$tenant->twitter}}" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            @endif
                            @if ($tenant->instagram)
                                <li><a target="_blank" class="instagram" href="{{$tenant->instagram}}" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                            @endif
                            @if ($tenant->linkedin)
                                <li><a target="_blank" class="linkedin" href="{{$tenant->linkedin}}" title="Linkedin"></a><i class="fa fa-linkedin"></i></li>
                            @endif
                            @if ($tenant->youtube)
                                <li><a target="_blank" class="youtube" href="{{$tenant->youtube}}" title="Youtube"><i class="fa fa-youtube"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog body end -->
@endsection

@section('js')
<script src="{{url(asset('frontend/'.$tenant->template.'/js/shadowbox/shadowbox.js'))}}"></script>
<link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/js/shadowbox/shadowbox.css'))}}"/>
<script type="text/javascript">
    Shadowbox.init();
</script>
@endsection