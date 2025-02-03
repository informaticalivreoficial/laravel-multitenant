@extends("web.sites.{$tenant->template}.master.master")

@section('content')
<div class="main_property">
    <div class="main_property_header bg-light py-3">
        <div class="container">
            <h2 class="text-front">{{$categoria->titulo}}</h2>
            </p>
        </div>
    </div>

    @if($posts->count())
    <section class="main_properties py-3 bg-light">
        <div class="container">                        
            <div class="row">
                @foreach($posts as $artigo)
                    <article class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card main_properties_item" style="min-height:400px;">
                            <div class="img-responsive-16by9">
                                <a href="{{route(($categoria->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'),['slug' => $artigo->slug])}}">
                                    <img class="card-img-top" src="{{$artigo->cover()}}" alt="{{$artigo->titulo}}" title="{{$artigo->titulo}}"/>
                                </a>
                            </div>
                            
                            <div class="card-body">
                                <p><b><a href="{{route(($categoria->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'),['slug' => $artigo->slug])}}" class="text-front" title="{{$artigo->titulo}}">{{$artigo->titulo}}</a></b></p>
                                <a href="{{route(($categoria->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'),['slug' => $artigo->slug])}}" style="position: absolute;
                                bottom: 15px;
                                left: 18%;
                                margin-left: -30px;
                                width: 80%;" class="btn btn-front btn-block text-white" title="Leia Mais">Leia Mais</a>
                            </div>                        
                        </div>
                    </article>
                @endforeach 
                @if($posts->hasPages())
                    <div class="col-12 card-footer paginacao">  
                        {{ $posts->links() }}
                    </div> 
                @endif           
            </div>
        </div>
    </section>
    @endif
</div>
@endsection