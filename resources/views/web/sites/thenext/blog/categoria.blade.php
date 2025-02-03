@extends("web.sites.{$tenant->template}.master.master")

@section('content')

<div class="sub-banner" style="background: rgba(0, 0, 0, 0.04) url({{$tenant->gettopodosite()}}) top left repeat;">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>{{$categoria->titulo}}</h1>
            <ul class="breadcrumbs">
                <li><a href="{{route('web.home')}}">Home</a></li>
                <li class="active">{{$categoria->titulo}}</li>
            </ul>
        </div>
    </div>
</div>

<div class="blog-body content-area">
    <div class="container scrolling-pagination">
        <div class="row">
            @if (!empty($posts) && $posts->count() > 0)
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="blog-3">
                            <div class="blog-image">
                                <a href="{{route(($categoria->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'),['slug' => $post->slug])}}">
                                    <img src="{{$post->cover()}}" alt="{{$post->titulo}}" class="img-fluid"> 
                                </a>                               
                            </div>
                            <div class="detail">
                                <h4>
                                    <a href="{{route(($categoria->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'),['slug' => $post->slug])}}">{{$post->titulo}}</a>
                                </h4>
                                {{--$post->content--}}
                                <a href="{{route(($categoria->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'),['slug' => $post->slug])}}" class="read-more">Ler Mais...</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{$posts->links()}} 
            @else
                <div class="col-lg-12"> 
                    <div class="nobottomborder">
                        <h1>Desculpe não foram encontrados resultados!</h1>
                        <a class="btn-1 btn-outline-1" href="{{route('web.home')}}">
                            <span>Voltar ao início</span> <i class="arrow"></i>
                        </a>
                    </div>
                </div>
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