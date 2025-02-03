@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div class="blog-banner" style="background: rgba(0, 0, 0, 0.04) url({{$tenant->gettopodosite()}}) top left repeat;">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>{{($type == 'artigo' ? 'Artigos' : 'Notícias')}}</h1>
            <ul class="breadcrumbs">
                <li><a href="{{route('web.home')}}">Início</a></li>
                <li class="active">{{($type == 'artigo' ? 'Artigos' : 'Notícias')}}</li>
            </ul>
        </div>
    </div>
</div>

<div class="blog-body content-area">
    <div class="container scrolling-pagination">
        <div class="row">
            @if (!empty($posts) && $posts->count() > 0) 
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-4 col-sm-6 ">
                        <div class="thumbnail blog-box-2 clearfix" style="min-height: 510px;">
                            <div class="blog-photo">
                                <img src="{{$post->cover()}}" alt="{{$post->titulo}}" class="img-responsive">                                
                            </div>
                            <div class="post-meta">
                                <ul>
                                    <li class="profile-user">
                                        <img src="{{$post->userObject->getUrlAvatarAttribute()}}" alt="{{$post->userObject->name}}">
                                    </li>
                                    <li><span>{{$post->userObject->name}}</span></li>
                                    <li><i class="fa fa-eye"></i> {{$post->views}}</li>
                                </ul>
                            </div>
                            <div class="caption detail">
                                <h4>
                                    <a style="color: #1abc9c !important;" href="{{route(($post->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'),['slug' => $post->slug])}}">{{$post->titulo}}</a>
                                </h4>
                                {{ Words($post->content, 20) }}
                                <div class="clearfix"></div>
                                <a href="{{route(($post->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'),['slug' => $post->slug])}}" class="read-more">Leia +</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{$posts->links()}}
            @endif
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script>
        // Paginação infinita
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