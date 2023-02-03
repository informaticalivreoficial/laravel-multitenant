<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>     
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="copyright" content="{{env('DESENVOLVEDOR')}}"/>       
        <meta name="author" content="Renato Montanari"/>
        <meta name="language" content="pt-br" />
        
        {!! $head ?? '' !!}

        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="icon" type="image/png" href="{{$tenant->getfaveicon()}}">
        
        <link rel="stylesheet" href="{{url(asset('frontend/'.$tenant->template.'/css/magnific-popup.min.css'))}}">
        <link rel="stylesheet" href="{{url(asset('frontend/'.$tenant->template.'/css/bootstrap.min.css'))}}">
        <link rel="stylesheet" href="{{url(asset('frontend/'.$tenant->template.'/css/owl.carousel.min.css'))}}">
        <link rel="stylesheet" href="{{url(asset('frontend/'.$tenant->template.'/css/all.min.css'))}}">

        <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@300;400;600;700;800&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/style.css'))}}">
        <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/responsive.css'))}}">
        <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/renato.css'))}}">
    
        @hasSection('css')
            @yield('css')
        @endif
    </head>
        <body data-spy="scroll" data-target=".navbar" data-offset="100">

        <header class="top-header">
            <nav class="navbar navbar-expand-lg navbar-light justify-content-between navbar-mobile fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="{{route('web.home')}}"> 
                        <img width="100" src="{{$tenant->getlogomarca()}}" alt="{{$tenant->name}}"/>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar4" aria-controls="navbar4" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbar4">
                        <ul class="mr-auto"></ul>
                        <ul class="navbar-nav">
                            <li class="nav-item"> <a class="nav-link" href="#home">Início</a>   </li>
                            <li class="nav-item"> <a class="nav-link" href="#facilidades">Facilidades</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#fotos">Fotos</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#localizacao">Localização</a>   </li>
                            <li class="nav-item"> <a class="nav-link" href="#reservar">Reservar</a> </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        @yield('content')  
        
        <footer>
            <div class="container">
              <div class="row">
                <div class="col-lg-4">
                    <div class="footer-">
                        <a><img src="{{url(asset('frontend/'.$tenant->template.'/images/logomarcafooter.png'))}}" alt="{{$tenant->name}}"/></a>
                    </div>
                    <p>{{$tenant->descricao}}</p>
                </div>
                <div class="col-lg-5 col-md-8">
                    <h3>Atendimento</h3>
                    <ul class="footer-address-list">
                        @if ($tenant->rua)
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                {{$tenant->rua}}
                                {{($tenant->num ? ', '.$tenant->num : '')}}  
                                {!!($tenant->bairro ? '<br> '.$tenant->bairro : '')!!}  
                                {{($tenant->cidade ? ', '.getCidade($tenant->cidade, 'cidades') : '')}} 
                            </li> 
                        @endif
                        @if ($tenant->telefone)
                            <li>
                                <i class="fas fa-phone-alt"></i>
                                <a href="tel:{{$tenant->telefone}}" title="Telefone">{{$tenant->telefone}}</a>
                                @if ($tenant->celular)
                                    <a href="tel:{{$tenant->celular}}" title="Celular"> {{$tenant->celular}}</a>
                                @endif
                            </li>
                        @endif
                        @if ($tenant->whatsapp)
                            <li>
                                <i class="fas fa-whatsapp"></i>
                                <a target="_blank" href="{{getNumZap($tenant->whatsapp ,'Atendimento '.$tenant->name)}}" title="WhatsApp">{{$tenant->whatsapp}}</a>
                            </li>
                        @endif
                        @if ($tenant->email)
                            <li>
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:{{$tenant->email}}" title="Email">{{$tenant->email}}</a>
                            </li>
                        @endif
                        @if ($tenant->email1)
                            <li>
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:{{$tenant->email1}}" title="Email">{{$tenant->email1}}</a>
                            </li>
                        @endif                        
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h3>Siga-nos</h3>
                    <div class="footer-social-media-icons">
                        @if ($tenant->facebook)
                            <a target="_blank" class="facebook" href="{{$tenant->facebook}}" title="Facebook"><i class="fab fa-facebook"></i></a>
                        @endif
                        @if ($tenant->twitter)
                            <a target="_blank" class="twitter" href="{{$tenant->twitter}}" title="Twitter"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if ($tenant->instagram)
                            <a target="_blank" class="instagram" href="{{$tenant->instagram}}" title="Instagram"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if ($tenant->linkedin)
                            <a target="_blank" class="linkedin" href="{{$tenant->linkedin}}" title="Linkedin"></a><i class="fab fa-linkedin"></i>
                        @endif
                        @if ($tenant->youtube)
                            <a target="_blank" class="youtube" href="{{$tenant->youtube}}" title="Youtube"><i class="fab fa-youtube"></i></a>
                        @endif                        
                    </div>
                </div>
              </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer-">
                                <p>Copyright © {{$tenant->ano_de_inicio}} {{$tenant->name}}. Todos os direitos reservados.</p>
                                <p class="font-accent">
                                    Feito com <i style="color:red;" class="fa fa-heart"></i> por <a style="color:#fff;" target="_blank" href="{{env('DESENVOLVEDOR_URL')}}">{{env('DESENVOLVEDOR')}}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
            
        <script src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.min.js'))}}"></script>    
        <script src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.validate.min.js'))}}"></script>       
        <script src="{{url(asset('frontend/'.$tenant->template.'/js/bootstrap.min.js'))}}"></script>
        <script src="{{url(asset('frontend/'.$tenant->template.'/js/popper.min.js'))}}"></script>
        <script src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.magnific-popup.min.js'))}}"></script>
        <script src="{{url(asset('frontend/'.$tenant->template.'/js/owl.carousel.js'))}}"></script>
        <script src="{{url(asset('frontend/'.$tenant->template.'/js/SmoothScroll.min.js'))}}"></script>  
        
        <script src="{{url(asset('frontend/'.$tenant->template.'/js/main.js'))}}"></script>

        @hasSection('js')
            @yield('js')
        @endif

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