@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div class="main_property">
    <div class="main_property_header bg-light py-3">
        <div class="container">
            <h2 class="text-front">{{$post->titulo}}</h2>
            <p mb-0>{{$post->categoriaObject->titulo}}
            </p>
        </div>
    </div>
    <div class="main_property_content py-y">
        <div class="container">
            <div class="row py-4">
                <div class="col-12 col-lg-9">
                    <div class="mb-4" >                        
                        <img alt="{{$post->titulo}}" src="{{$post->cover()}}" class="img-fluid">
                        <p class="mt-3"><i class="icon-user text-front"></i> {{$post->userObject->name}} <i class="icon-calendar text-front ml-2"></i>{{$post->publish_at}} <i class="icon-bars text-front ml-2"></i>{{$post->categoriaObject->titulo}}</p>
                    </div>                     
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
                
                <div class="col-12 col-lg-3">
                    @if(!empty($categorias) && $categorias->count() > 0)
                        <div class="main_property_categorias">
                            <h2 class="text-front mt-0">Categorias</h2>      
                            <ul>              
                                @foreach($categorias as $categoria)   
                                    @if($categoria->countposts() >= 1)
                                        <li><a href="{{route(($categoria->tipo == 'artigo' ? 'web.blog.categoria' : 'web.noticia.categoria'), ['slug' => $categoria->slug] )}}">{{ $categoria->titulo }}</a> <span>({{$categoria->countposts()}})</span></li>
                                    @endif                                                                                                          
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <div class="main_property_share mt-3">
                        <h2 class="text-front">Mais Lidos</h2>
                        @if($postsMais->count())
                            @foreach($postsMais as $postsmais)
                            <div class="pb-2">
                                <img src="{{$postsmais->cover()}}" alt="{{$postsmais->titulo}}" class="img-fluid">
                                <p class="my-2" style="font-size:1.2em;font-weight:bold">
                                   <a class="text-front" href="{{route(($postsmais->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'), ['slug' => $postsmais->slug] )}}">{{$postsmais->titulo}}</a>
                                </p>
                            </div>                            
                            @endforeach
                        @endif                        
                    </div>
                    
                    <div class="main_property_share mt-3">
                        <h2 class="text-front">Tags</h2>
                        @if($postsTags->count())
                            @foreach($postsTags as $posttags)                                
                                <div class="pb-2 tags-box">
                                    <ul>
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
                                    </ul>                                    
                                </div>                                                                                        
                            @endforeach
                        @endif 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>

    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v11.0&appId=1787040554899561&autoLogAppEvents=1" nonce="1eBNUT9J"></script>
@endsection