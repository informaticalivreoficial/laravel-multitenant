<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="language" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
        
        <meta name="author" content="Renato Montanari"/>
        <meta name="copyright" content="{{env('DESENVOLVEDOR')}}">
                
        {!! $head ?? '' !!}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="stylesheet" href="{{url(asset('frontend/'.$tenant->template.'/assets/css/bootstrap.css'))}}"/>
        <!-- Ekko Lightbox -->
        <link rel="stylesheet" href="{{url(asset('frontend/'.$tenant->template.'/assets/js/ekko-lightbox/ekko-lightbox.css'))}}"/>
        <link rel="stylesheet" href="{{url(asset('frontend/'.$tenant->template.'/assets/css/app.css'))}}"/>

        @hasSection('css')
            @yield('css')
        @endif

        <!-- FAVICON -->
        <link rel="shortcut icon" href="{{$tenant->getfaveicon()}}"/>
        <link rel="apple-touch-icon" href="{{$tenant->getfaveicon()}}"/>
        <link rel="apple-touch-icon" sizes="72x72" href="{{$tenant->getfaveicon()}}"/>
        <link rel="apple-touch-icon" sizes="114x114" href="{{$tenant->getfaveicon()}}"/>
        
    </head>
    <body>

        <header class="main_header">

            <div class="header_bar bg-front">
                <div class="container">
                    <div class="row justify-content-around">
                        <div class="d-none d-lg-flex col-lg-4 justify-content-center align-items-center p-2 text-white">
                            <i class="icon-map-marker"></i>
                            <p class="my-auto ml-3">
                                {{$tenant->rua}}    
                                @if(!empty($tenant->num) && !empty($tenant->rua))
                                , {{$tenant->num}}
                                @endif
                                @if(!empty($tenant->bairro) && !empty($tenant->rua))
                                - {{$tenant->bairro}}
                                @endif
                                @if(!empty($tenant->cidade))
                                @php
                                    echo '<br /> '.getCidadeNome($tenant->cidade, 'cidades').' - Brasil';
                                @endphp
                                @endif
                            </p>
                        </div>
                        <div class="d-none d-md-flex col-md-6 col-lg-4 justify-content-center align-items-center p-2 text-white">
                            <i class="icon-life-ring"></i>
                            <p class="my-auto ml-3" title="Seg/Sex: 9:00h - 18:00h - Sáb/Dom: Plantão">Seg/Sex: 9:00h - 18:00h<br> Sáb/Dom: Plantão</p>
                        </div>
                        <div class="d-flex col-4 col-md-6 col-lg-4 justify-content-center align-items-center p-2 text-white">
                            <i class="icon-whatsapp"></i>
                            <p class="my-auto ml-3">
                                <a class="linktopo" href="mailto:{{$tenant->email}}" title="Email {{$tenant->email}}">{{$tenant->email}}</a><br> <a class="linktopo" target="_blank" title="WhatsApp {{$tenant->whatsapp}}" href="{{getNumZap($tenant->whatsapp,'Atendimento '.$tenant->nomedosite)}}">{{$tenant->whatsapp}}</a></p>
                        </div>
                    </div>
                </div>
            </div>


            <nav class="navbar navbar-expand-md navbar-light my-3">
                <div class="container">

                    <div class="navbar-brand">
                        <a href="{{route('web.home')}}" title="{{$tenant->name}}">                                
                            <h1 class="text-hide">{{$tenant->name}}</h1>
                            <img src="{{$tenant->getlogomarca()}}" alt="{{$tenant->name}}" title="{{$tenant->name}}" class="d-inline-block"/>
                        </a>                            
                    </div>                        

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            @if (!empty($lancamentoMenu) && $lancamentoMenu->count() > 0)
                                <li class="nav-item"><a class="nav-link text-front" href="{{route('web.lancamento')}}" title="Lançamento">Lançamento</a></li>
                            @endif 
                            <li class="nav-item"><a title="Alugar" class="nav-link" href="{{route('web.imoveisList',['type' => 'locacao'])}}">Alugar</a></li>
                            <li class="nav-item"><a title="Comprar" class="nav-link" href="{{route('web.imoveisList',['type' => 'venda'])}}">Comprar</a></li>
                            <li class="nav-item"><a title="Blog" class="nav-link" href="{{route('web.blog.artigos')}}">Dicas</a></li>
                            <li class="nav-item"><a title="Atendimento" class="nav-link" href="{{route('web.atendimento')}}">Atendimento</a></li>
                            <li class="nav-item">
                                <a href="{{route('login')}}" class="nav-link" title="Login">Login</a>
                            </li>
                        </ul>
                    </div>                    
                </div>
            </nav> 



        </header>

        @yield('content')

        @if (!empty($newsletterForm))
            <article class="main_optin bg-dark text-white py-5">
                <div class="container">
                    <div class="row mx-auto" style="max-width: 600px;">
                        <h1>Quer ficar por dentro das novidades?</h1>
                        <p>Deixe seu melhor email nos campos abaixo e receba nossas melhores ofertas e lançamentos de imóveis</p>
                        <form action="" class="j_submitnewsletter" method="post" autocomplete="off">
                            @csrf
                            <div id="js-newsletter-result"></div>
                            <!-- HONEYPOT -->
                            <input type="hidden" class="noclear" name="bairro" value="" />
                            <input type="text" class="noclear" style="display: none;" name="cidade" value="" />                        
                            <input type="hidden" class="noclear" name="status" value="1" />

                            <input type="text" class="form-control form_hide" name="nome" placeholder="Digite seu nome" size="50">
                            <input type="text" class="form-control form_hide" name="email" placeholder="Digite seu email" size="50">
                            <button type="submit" id="js-subscribe-btn" class="btn btn-front form_hide">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </article>
        @endif       
        
        <section class="main_footer bg-light" style="background: url({{url(asset('frontend/'.$tenant->template.'/assets/images/footer-image.png'))}}) repeat-x bottom center;background-size: 30%;">
            <div class="container pt-5" style="padding-bottom: 100px;">
                <div class="row justify-content-around text-muted">
                    <div class="col-12 col-md-3 col-lg-3">
                        <h1 class="pb-2">Navegue <span class="text-front">Aqui!</span></h1>
                        <ul>
                            @if (!empty($paginaMenu) && $paginaMenu->count() > 0)
                                @foreach($paginaMenu as $paginaM)
                                    <li><a title="{{$paginaM->titulo}}" href="{{route('web.pagina', [ 'slug' => $paginaM->slug ])}}">{{$paginaM->titulo}}</a></li>
                                @endforeach
                            @endif
                            @if (!empty($lancamentoMenu) && $lancamentoMenu->count() > 0)
                                <li><a class="text-front" href="{{route('web.lancamento')}}" title="Lançamento">Lançamento</a></li>
                            @endif
                            <li><a title="Alugar" href="{{route('web.imoveisList',['type' => 'locacao'])}}">Alugar</a></li>
                            <li><a title="Comprar" href="{{route('web.imoveisList',['type' => 'venda'])}}">Comprar</a></li>
                            <li><a title="Blog" href="{{route('web.blog.artigos')}}">Dicas</a></li>
                            <li><a title="Notícias" href="{{route('web.noticias')}}">Notícias</a></li>
                            <li><a title="Atendimento" href="{{route('web.atendimento')}}">Atendimento</a></li>                            
                            <li><a title="Política de Privacidade" href="{{route('web.politica')}}">Política de Privacidade</a></li>                            
                        </ul>        
                    </div>
                    <div class="col-12 col-md-9 col-lg-6 pb-5" id="quemsomos">
                        <h1 class="pb-2">Sobre <span class="text-front">Nós!</span></h1>
                        <p>{{$tenant->descricao}}</p>
                        <h1 class="pb-2">Quer <span class="text-front">investir?</span></h1>
                        <p>A {{$tenant->name}} tem como filosofia atender com excelência e comprometimento PARCEIROS, INCORPORADORES e CLIENTES COMPRADORES oferecendo alternativas inovadoras e criativas para a geração de negócios.</p>
                    </div>
                    <div class="col-12 col-md-12 col-lg-3 text-center">
                        @if(!empty($tenant->facebook))
                            <a target="_blank" href="{{$tenant->facebook}}" title="Facebook"><button class="btn btn-front icon-facebook icon-notext text-white pb-2"></button></a>
                        @endif
                        @if(!empty($tenant->twitter))
                            <a target="_blank" href="{{$tenant->twitter}}" title="Twitter"><button class="btn btn-front icon-twitter icon-notext text-white pb-2"></button></a>
                        @endif
                        @if(!empty($tenant->linkedin))
                            <a target="_blank" href="{{$tenant->linkedin}}" title="Linkedin"><button class="btn btn-front icon-linkedin icon-notext text-white pb-2"></button></a>
                        @endif
                        @if(!empty($tenant->instagram))
                            <a target="_blank" href="{{$tenant->instagram}}" title="Instagram"><button class="btn btn-front icon-instagram icon-notext text-white pb-2"></button></a>
                        @endif
                    </div>                    
                </div>
            </div>
        </section>
        
        <div class="main_copyright py-3 bg-front text-white text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="mb-0">© {{$tenant->ano_de_inicio}} {{$tenant->name}} - Todos os direitos reservados.</p>
                        <p class="mb-2 mt-2">
                            <a href="{{env("DESENVOLVEDOR_URL")}}" target="_blank" title="{{env("DESENVOLVEDOR")}}">
                                <img src="{{env("DESENVOLVEDOR_LOGO")}}" width="72" height="26" alt="{{env("DESENVOLVEDOR")}}" title="{{env("DESENVOLVEDOR")}}">
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div> 
        
        <script src="{{url(asset('frontend/'.$tenant->template.'/assets/js/jquery.min.js'))}}"></script>
        <script src="{{url(asset('frontend/'.$tenant->template.'/assets/js/jquery.mask.js'))}}"></script>
        <script src="{{url(asset('frontend/'.$tenant->template.'/assets/js/bootstrap.js'))}}"></script>
        <script src="{{url(asset('frontend/'.$tenant->template.'/assets/js/bootstrap-select.js'))}}"></script>
        <script src="{{url(asset('frontend/'.$tenant->template.'/assets/js/defaults-pt_BR.js'))}}"></script>
        <!-- Ekko Lightbox -->
        <script src="{{url(asset('frontend/'.$tenant->template.'/assets/js/ekko-lightbox/ekko-lightbox.min.js'))}}"></script>
        <script src="{{url(asset('frontend/'.$tenant->template.'/assets/js/scripts.js'))}}"></script>

        @hasSection('js')
            @yield('js')
        @endif

        <script>
            $(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Seletor, Evento/efeitos, CallBack, Ação
                $('.j_submitnewsletter').submit(function (){
                    var form = $(this);
                    var dataString = $(form).serialize();

                    $.ajax({
                        url: "{{ route('web.sendNewsletter') }}",
                        data: dataString,
                        type: 'GET',
                        dataType: 'JSON',
                        beforeSend: function(){
                            form.find("#js-subscribe-btn").attr("disabled", true);
                            form.find('#js-subscribe-btn').html("Carregando...");                
                            form.find('.alert').fadeOut(500, function(){
                                $(this).remove();
                            });
                        },
                        success: function(response){
                            $('html, body').animate({scrollTop:$('#js-newsletter-result').offset().top-40}, 'slow');
                            if(response.error){
                                form.find('#js-newsletter-result').html('<div class="alert alert-danger error-msg">'+ response.error +'</div>');
                                form.find('.error-msg').fadeIn();                    
                            }else{
                                form.find('#js-newsletter-result').html('<div class="alert alert-success error-msg">'+ response.sucess +'</div>');
                                form.find('.error-msg').fadeIn();                    
                                form.find('input[class!="noclear"]').val('');
                                form.find('.form_hide').fadeOut(500);
                            }
                        },
                        complete: function(response){
                            form.find("#js-subscribe-btn").attr("disabled", false);
                            form.find('#js-subscribe-btn').html("Cadastrar");                                
                        }

                    });

                    return false;
                });

            });
        </script>

        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{$tenant->tagmanager_id}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{$tenant->tagmanager_id}}');
        </script>
    </body>
</html>
