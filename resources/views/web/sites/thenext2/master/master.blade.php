<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8"/>        
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="copyright" content="{{env('DESENVOLVEDOR')}}"/>       
        <meta name="author" content="Renato Montanari"/>
        <meta name="language" content="pt-br" />

        {!! $head ?? '' !!}

        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- FAVICON -->
        <link rel="icon" type="image/png" href="{{$tenant->getfaveicon()}}" />
        <link rel="shortcut icon" href="{{$tenant->getfaveicon()}}" type="image/x-icon"/>        
        
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/bootstrap.min.css'))}}"/>
        <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/animate.min.css'))}}"/>
        <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/bootstrap-submenu.css'))}}"/>
        <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/bootstrap-select.min.css'))}}"/>
        <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/leaflet.css'))}}"/>
        <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/map.css'))}}"/>
        <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/fonts/font-awesome/css/font-awesome.min.css'))}}"/>
        <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/fonts/flaticon/font/flaticon.css'))}}"/>
        <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/fonts/linearicons/style.css'))}}"/>
        <link rel="stylesheet" type="text/css"  href="{{url(asset('frontend/'.$tenant->template.'/css/jquery.mCustomScrollbar.css'))}}"/>
        <link rel="stylesheet" type="text/css"  href="{{url(asset('frontend/'.$tenant->template.'/css/dropzone.css'))}}"/>
        <link rel="stylesheet" type="text/css"  href="{{url(asset('frontend/'.$tenant->template.'/css/magnific-popup.css'))}}"/>

        <!-- Custom stylesheet -->
        <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/style.css'))}}"/>
        <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/renato.css'))}}"/>
        <link rel="stylesheet" type="text/css" id="style_sheet" href="{{url(asset('frontend/'.$tenant->template.'/css/skins/green-light.css'))}}"/>

        <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/js/jsSocials/jssocials.css'))}}" />
        <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/js/jsSocials/jssocials-theme-flat.css'))}}" />


        <!-- Google fonts -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/ie10-viewport-bug-workaround.css'))}}"/>

        @hasSection('css')
            @yield('css')
        @endif

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script type="text/javascript" src="js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="{{url(asset('frontend/'.$tenant->template.'/js/ie-emulation-modes-warning.js'))}}"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/html5shiv.min.js'))}}"></script>
        <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/respond.min.js'))}}"></script>
        <![endif]-->
        
       
</head>
<body>
    <header class="top-header hidden-xs" id="top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="list-inline">
                        @if ($tenant->telefone)
                            <a href="tel:{{$tenant->telefone}}"><i class="fa fa-phone"></i>{{$tenant->telefone}}</a>
                        @endif
                        @if ($tenant->whatsapp)
                            <a target="_blank" href="{{getNumZap($tenant->whatsapp ,'Atendimento '.$tenant->name)}}" title="WhatsApp">
                                <i class="fa fa-whatsapp"></i>{{$tenant->whatsapp}}
                            </a>
                        @endif
                        @if ($tenant->email)
                            <a href="mailto:{{$tenant->email}}" title="Email">
                                <i class="fa fa-envelope"></i>{{$tenant->email}}
                            </a>
                        @endif  
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="text-align: right;">
                    {{--<a target="_blank" style="margin-top: 5px;margin-bottom: 5px;" href="" class="btn button-sm border-button-theme">financiamento</a>--}}
                    <a style="margin-top: 5px;margin-bottom: 5px;margin-left: 10px;" href="{{route('web.pesquisar-imoveis')}}" class="btn button-sm border-button-theme">Busca por referência</a>
                     
                    
                    <ul class="top-social-media pull-right" style="margin-left: 10px;">
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
    </header>
    <!-- Top header end -->
    
    <!-- Main header start -->
    <header class="main-header">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="navbar-header">                
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navigation" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{route('web.home')}}" class="logo" title="{{$tenant->name}}">
                        <img src="{{$tenant->getlogomarca()}}" alt="{{$tenant->name}}"/>
                    </a>
                    <ul class="top-social-media mobile">
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
                <!-- MENU -->
                <div class="navbar-collapse collapse" role="navigation" aria-expanded="true" id="app-navigation">
                    <ul class="nav navbar-nav">
    
                        <li class="dropdown">
                            <a title="Imóveis" tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                                Imóveis <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('web.imoveisList',['type' => 'venda'])}}" title="Comprar">Comprar</a></li>
                                <li><a href="{{route('web.imoveisList',['type' => 'locacao'])}}" title="Alugar">Alugar</a></li>
                            </ul>
                        </li>
    
                        @if (!empty($categoriasMenu) && $categoriasMenu->count() > 0)
                            <li class="dropdown">
                                <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false" title="Propriedades">Propriedades <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach ($categoriasMenu as $catMenu)                                
                                        <li>
                                            <a href="{{route('web.imoveisCategoria',['categoria' => $catMenu->tipo])}}" title="{{$catMenu->tipo}}">{{$catMenu->tipo}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li> 
                        @endif
    
                        @if (!empty($lancamentoMenu) && $lancamentoMenu->count() > 0)
                            <li><a href="{{route('web.lancamento')}}" title="Lançamento">Lançamento</a></li>
                        @endif 
    
                        <li><a href="{{route('web.blog.artigos')}}" title="Blog">Dicas</a></li>
                        <li><a href="{{route('web.atendimento')}}" title="Atendimento">Atendimento</a></li>
                    </ul>
                    
                    {{--<ul class="nav navbar-nav navbar-right rightside-navbar">
                        <li>
                            <a href="/imoveis/cadastrar" class="button">
                                Cadastre seu Imóvel
                            </a>
                        </li>
                    </ul>--}}
                </div>
            </nav>
        </div>
    </header>
    <!-- Main header end -->

    @yield('content')

    <footer class="main-footer clearfix">
        <div class="container">
            <!-- Footer info-->
            <div class="footer-info">
                <div class="row">
                    <!-- About us -->
                    <div class="col-lg-5 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-item">
                            <div class="main-title-2">
                                <h1>Atendimento</h1>
                            </div>
                            <p>{{$tenant->descricao}}</p>
                            <ul class="personal-info">
                                @if ($tenant->rua)
                                    <li>
                                        <i class="fa fa-map-marker"></i>
                                        {{$tenant->rua}}
                                        {{($tenant->num ? ', '.$tenant->num : '')}}  
                                        {!!($tenant->bairro ? '<br> '.$tenant->bairro : '')!!}  
                                        {{($tenant->cidade ? ', '.getCidade($tenant->cidade, 'cidades') : '')}} 
                                    </li> 
                                @endif
                                @if ($tenant->email)
                                    <li>
                                        <i class="fa fa-envelope"></i>
                                        <a href="mailto:{{$tenant->email}}" title="Email">{{$tenant->email}}</a>
                                    </li>
                                @endif
                                @if ($tenant->email1)
                                    <li>
                                        <i class="fa fa-envelope"></i>
                                        <a href="mailto:{{$tenant->email1}}" title="Email">{{$tenant->email1}}</a>
                                    </li>
                                @endif
                                @if ($tenant->telefone)
                                    <li>
                                        <i class="fa fa-phone"></i>
                                        <a href="tel:{{$tenant->telefone}}" title="Telefone">{{$tenant->telefone}}</a>
                                        @if ($tenant->celular)
                                            <a href="tel:{{$tenant->celular}}" title="Celular"> {{$tenant->celular}}</a>
                                        @endif
                                    </li>
                                @endif                            
                                @if ($tenant->whatsapp)
                                    <li>
                                        <i class="fa fa-whatsapp"></i>
                                        <a target="_blank" href="{{getNumZap($tenant->whatsapp ,'Atendimento '.$tenant->name)}}" title="WhatsApp">{{$tenant->whatsapp}}</a>
                                    </li>
                                @endif                            
                            </ul>
                        </div>
                    </div>
                    <!-- Links -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-item">
                            <div class="main-title-2">
                                <h1>Links</h1>
                            </div>
                            <ul class="links">
                                @if (!empty($paginaMenu) && $paginaMenu->count() > 0)
                                    @foreach($paginaMenu as $paginaM)
                                        <li><a title="{{$paginaM->titulo}}" href="{{route('web.pagina', [ 'slug' => $paginaM->slug ])}}">{{$paginaM->titulo}}</a></li>
                                    @endforeach
                                @endif
                                <li>
                                    <a href="{{route('web.blog.artigos')}}" title="Dicas">Dicas</a>
                                </li>
                                <li>
                                    <a href="{{route('web.noticias')}}" title="Notícias">Notícias</a>
                                </li>
                                <li>
                                    <a href="{{route('web.pesquisar-imoveis')}}" title="Pesquisar Imóveis">Pesquisar Imóveis</a>
                                </li>
                                <li>
                                    <a href="{{route('web.atendimento')}}" title="Atendimento">Atendimento</a>
                                </li>
                                <li>
                                    <a href="{{route('web.politica')}}" title="Política de Privacidade">Política de Privacidade</a>
                                </li>                            
                            </ul>
                        </div>
                    </div>                    
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-item">
                            @if (!empty($newsletterForm))
                                <div class="main-title-2">
                                    <h1>Inscreva-se</h1>
                                </div>
                                <div class="newsletter clearfix">
                                    <p>
                                        Receba direto no seu e-mail, nossas dicas e novidades sobre compra, venda e locação de imóveis!
                                    </p>

                                    <form action="" method="post" class="j_formNewsletter">
                                        @csrf
                                        <div class="alertas"></div>
                                        <div class="form-group form_hide">
                                            <!-- HONEYPOT -->
                                            <input type="hidden" class="noclear" name="bairro" value="" />
                                            <input type="text" class="noclear" style="display: none;" name="cidade" value="" />
                                            <input type="hidden" class="noclear" name="status" value="1" />
                                            <input type="hidden" class="noclear" name="nome" value="#Cadastrado pelo Site" />
                                            <input class="nsu-field btn-block" id="nsu-email-0" type="text" name="email" placeholder="Digite seu e-mail"/>
                                        </div>
                                        <div class="form-group mb-0 form_hide">
                                            <button type="submit" class="button-sm button-theme btn-block b_cadastro">
                                                Cadastrar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                            <div class="main-title-2" style="margin-top: 20px;margin-bottom: 10px;">
                                <h1>Cotação</h1>
                            </div>                            
                            @php
                                // PEGA COTAÇÃO DO DOLAR VIA JSON
                                $url = file_get_contents('https://economia.awesomeapi.com.br/json/USD-BRL/1');
                                var_dump($url);
                                $json = json_decode($url, true);
                                
                                $imprime = end($json);
                                $cor = ($imprime['pctChange'] < '0' ? 'pos' :
                                    ($imprime['pctChange'] == '0' ? 'neutro' : 
                                    ($imprime['pctChange'] > '0' ? 'neg' : 'neg')));
                                $sinal = ($imprime['pctChange'] < '0' ? '' :
                                    ($imprime['pctChange'] == '0' ? '' : 
                                    ($imprime['pctChange'] > '0' ? '+' : '+')));
                                echo '<div class="numbers">';                    
                                echo '<span class="value bra"> '.$imprime['name'].' R$'.number_format($imprime['ask'],'3',',','').'</span>';
                                echo '<span class="data '.$cor.'">'.$sinal.' '.number_format($imprime['pctChange'],'2',',','').'% </span>';
                                echo '</div>';
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer end -->

    <!-- Copy right start -->
    <div class="copy-right">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-8 col-sm-12">
                    &copy;  {{$tenant->ano_de_inicio}} {{$tenant->name}} - Todos os direitos reservados.
                </div>
                <div class="col-md-4 col-sm-12">
                    <ul class="social-list clearfix">
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
                    <a style="margin-right:30px;float: right;" target="_blank" href="{{env('DESENVOLVEDOR_URL')}}" title="{{env('DESENVOLVEDOR')}}"><img src="{{env('DESENVOLVEDOR_LOGO')}}" alt="{{env('DESENVOLVEDOR')}}"></a>                    
                </div>
            </div>
        </div>
    </div>   

    <div class="whatsapp-footer j_btnwhats">
        <a target="_blank" href="{{getNumZap($tenant->whatsapp ,'Atendimento '.$tenant->name)}}"><img src="{{url(asset('frontend/'.$tenant->template.'/images/zap-topo.png'))}}" alt="{{url(asset('frontend/'.$tenant->template.'/images/zap-topo.png'))}}" /></a>
    </div>

    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/jquery-2.2.0.min.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.form.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/bootstrap.min.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/bootstrap-submenu.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/rangeslider.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.mb.YTPlayer.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/wow.min.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/bootstrap-select.min.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.easing.1.3.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.scrollUp.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.mCustomScrollbar.concat.min.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/leaflet.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/leaflet-providers.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/leaflet.markercluster.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/dropzone.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.filterizr.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.magnific-popup.min.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/maps.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/app.js'))}}"></script>

    <script src="{{url(asset('frontend/'.$tenant->template.'/js/jsSocials/jssocials.min.js'))}}"></script>

    <!-- Máscara de Inputs 
    <script src="{{--url(asset('frontend/'.$tenant->template.'/js/jquery.maskedinput.min.js'))--}}"></script>
    <script src="{{--url(asset('frontend/'.$tenant->template.'/js/jquery.maskMoney.min.js'))--}}" type="text/javascript"></script>
-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{url(asset('frontend/'.$tenant->template.'/js/ie10-viewport-bug-workaround.js'))}}"></script>
    <!-- Custom javascript -->
    <script src="{{url(asset('frontend/'.$tenant->template.'/js/ie10-viewport-bug-workaround.js'))}}"></script>

    @hasSection('js')
        @yield('js')
    @endif
        
    <script type="text/javascript">
        (function ($) {
            
            $('#shareIcons').jsSocials({
                //url: "http://www.google.com",
                showLabel: false,
                showCount: false,
                shareIn: "popup",
                shares: ["email", "twitter", "facebook", "whatsapp"]
            });

            $('.shareIcons').jsSocials({
                //url: "http://www.google.com",
                showLabel: false,
                showCount: false,
                shareIn: "popup",
                shares: ["email", "twitter", "facebook", "whatsapp"]
            });
            
            
            
        })(jQuery);   
            
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