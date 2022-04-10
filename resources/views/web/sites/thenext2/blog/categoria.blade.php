@extends("web.sites.{$tenant->template}.master.master")

@section('content')

<div class="blog-banner" style="background: rgba(0, 0, 0, 0.04) url({{$tenant->gettopodosite()}}) top left repeat;">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>{{$categoria->titulo}}</h1>
            <ul class="breadcrumbs">
                <li><a href="{{route('web.home')}}">Início</a></li>
                <li class="active">{{$categoria->titulo}}</li>
            </ul>
        </div>
    </div>
</div>

<!-- Blog body start -->
<div class="blog-body content-area">
    <div class="container scrolling-pagination">
            <div class="row">
                @if (!empty($posts) && $posts->count() > 0)
                    @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-4 col-sm-6 ">
                        <div class="thumbnail blog-box-2 clearfix" style="min-height: 470px;">
                            <div class="blog-photo">
                                <img style="max-height:240px;" title="{{$post->titulo}}" alt="{{$post->titulo}}" src="{{$post->nocover()}}">
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
                            <!-- Detail -->
                            <div class="caption detail">
                                <h4>
                                    <a style="color: #1abc9c !important;" href="{{route(($categoria->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'),['slug' => $post->slug])}}">{{$post->titulo}}</a>
                                </h4>
                                <!-- paragraph -->
                                {{ Words($post->content, 20) }}
                                <div class="clearfix"></div>
                                <!-- Btn -->
                                <a href="{{route(($categoria->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'),['slug' => $post->slug])}}" class="read-more">Leia +</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{$posts->links()}}
                @else
                    <div class="row mb-40">
                        <div class="col-lg-12">                
                            <div class="alert alert-info wow fadeInRight delay-03s" role="alert" style="visibility: visible; animation-name: fadeInRight;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <strong>Desculpe!</strong> Não encontramos nenhum artigo publicado nesta categoria.
                            </div>                
                        </div>
                    </div>
                @endif
                
                
            </div>
    </div>
</div>
<!-- Blog body end -->
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