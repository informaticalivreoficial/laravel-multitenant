<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    {!! $head ?? '' !!}

    <meta name="csrf-token" content="{{ csrf_token() }}">
   
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/bootstrap.min.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/animate.min.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/bootstrap-submenu.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/bootstrap-select.min.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/leaflet.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/map.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/fonts/font-awesome/css/font-awesome.min.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/fonts/flaticon/font/flaticon.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/fonts/linearicons/style.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/jquery.mCustomScrollbar.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/dropzone.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/magnific-popup.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/slick.css'))}}">

    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/initial.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/style.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/skins/green-light.css'))}}">

    @hasSection('css')
        @yield('css')
    @endif 

    <link rel="shortcut icon" href="{{$tenant->getfaveicon()}}" type="image/x-icon" >

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/ie8-responsive-file-warning.js'))}}"></script><![endif]-->
    <script src="{{url(asset('frontend/'.$tenant->template.'/js/ie-emulation-modes-warning.js'))}}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/html5shiv.min.js'))}}"></script>
    <script type="text/javascript" src="{{url(asset('frontend/'.$tenant->template.'/js/respond.min.js'))}}"></script>
    <![endif]-->
</head>
<body>

<!-- Top header start -->
<header class="top-header" id="top">
    <div class="container">
        <div class="row">
            <div class="col-7 col-sm-7 col-md-7 col-lg-6">
                <div class="list-inline">
                    @if ($tenant->whatsapp)
                        <a href="{{getNumZap($tenant->whatsapp ,'Atendimento '.$tenant->name)}}" class="n-575">
                            <i class="fa fa-whatsapp"></i>{{$tenant->whatsapp}}
                        </a>
                    @endif
                    @if ($tenant->email)
                        <a href="mailto:{{$tenant->email}}">
                            <i class="fa fa-envelope"></i>{{$tenant->email}}
                        </a>
                    @endif                    
                </div>
            </div>
            <div class="col-5 col-sm-5 col-md-5 col-lg-6">
                <ul class="top-social-media pull-right">
                    <li>
                        <a href="{{route('login')}}" class="sign-in"><i class="fa fa-sign-in"></i> Login</a>
                    </li>
                    <!--<li>
                        <a href="signup.html" class="sign-in"><i class="fa fa-user"></i> Register</a>
                    </li>-->
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- Top header end -->

<!-- Main header start -->
<header class="main-header  header-shrink ">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="{{route('web.home')}}" class="logo">
                <img src="{{$tenant->getlogomarca()}}" alt="{{$tenant->name}}">
            </a>
            <button class="navbar-toggler" id="drawer" type="button">
                <span class="fa fa-bars"></span>
            </button>
            <div class="navbar-collapse collapse " id="navbar">
                <ul class="navbar-nav ustify-content-start w-100">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="imoveisLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Imóveis
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="imoveisLink">
                            <li><a class="dropdown-item" href="{{route('web.imoveisList',['type' => 'venda'])}}">Comprar</a></li>
                            <li><a class="dropdown-item" href="{{route('web.imoveisList',['type' => 'locacao'])}}">Alugar</a></li>
                        </ul>
                    </li> 
                    @if (!empty($categoriasMenu) && $categoriasMenu->count() > 0)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="propriedadesLink" href="javascript:void(0)">Propriedades</a>
                            <ul class="dropdown-menu" aria-labelledby="propriedadesLink">
                                @foreach ($categoriasMenu as $catMenu)                                
                                <li>
                                    <a class="dropdown-item" href="{{route('web.imoveisCategoria',['categoria' => $catMenu->tipo])}}">{{$catMenu->tipo}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li> 
                    @endif                 
                    
                    <li class="nav-item"><a class="nav-link" href="{{--route('web.atendimento')--}}" title="">Lançamento</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('web.atendimento')}}" title="">Atendimento</a></li>                    
                    <li class="nav-item"><a class="nav-link" href="{{route('web.financiamento')}}" title="">Financiamento</a></li>                    
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->

<!-- Sidenav start -->
<nav id="sidebar" class="nav-sidebar">
    <!-- Close btn-->
    <div id="dismiss">
        <i class="fa fa-close"></i>
    </div>
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <img src="{{$tenant->getlogomarca()}}" alt="{{$tenant->name}}">
        </div>
        <div class="sidebar-navigation">
            <h3 class="heading">Pages</h3>
            <ul class="menu-list">
                <li><a href="#" class="active pt0">Index <em class="fa fa-chevron-down"></em></a>
                    <ul>
                        <li><a href="index.html">Index 1</a></li>
                        <li><a href="index-2.html">Index 2</a></li>
                        <li><a href="index-3.html">Index 3</a></li>
                        <li><a href="index-4.html">Index 4</a></li>
                        <li><a href="index-5.html">Index 5</a></li>
                        <li><a href="index-6.html">Index 6</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Properties <em class="fa fa-chevron-down"></em></a>
                    <ul>
                        <li>
                            <a href="#">List Layout <em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="properties-list-rightside.html">Right Sidebar</a></li>
                                <li><a href="properties-list-leftside.html">Left Sidebar</a></li>
                                <li><a href="properties-list-fullwidth.html">Fullwidth</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Grid Layout<em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="properties-grid-rightside.html">Right Sidebar</a></li>
                                <li><a href="properties-grid-leftside.html">Left Sidebar</a></li>
                                <li><a href="properties-grid-fullwidth.html">Fullwidth</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Map View <em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="properties-map-rightside-list.html">Map List 1</a></li>
                                <li><a href="properties-map-leftside-list.html">Map List 2</a></li>
                                <li><a href="properties-map-rightside-grid.html">Map Grid 1</a></li>
                                <li><a href="properties-map-leftside-grid.html">Map Grid 2</a></li>
                                <li><a href="properties-map-full.html">Map FullWidth</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Property Detail <em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="properties-details.html">Property Detail 1</a></li>
                                <li><a href="properties-details-2.html">Property Detail 2</a></li>
                                <li><a href="properties-details-3.html">Property Detail 3</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Agents <em class="fa fa-chevron-down"></em></a>
                    <ul>
                        <li><a href="agent-listing-grid.html">Agent grid</a></li>
                        <li><a href="agent-listing-grid-sidebar.html">Agent Grid sidebarbar</a></li>
                        <li><a href="agent-listing-row.html">Agent list</a></li>
                        <li><a href="agent-listing-row-sidebar.html">Agent List Sidebarbar</a></li>
                        <li><a href="agent-single.html">Agent Detail</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Pages <em class="fa fa-chevron-down"></em></a>
                    <ul>
                        <li>
                            <a href="#">About<em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="about.html">About 1</a></li>
                                <li><a href="about-2.html">About 2</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Services<em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="services-1.html">Services 1</a></li>
                                <li><a href="services-2.html">Services 2</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Pricing Tables <em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="pricing-tables.html">Pricing Tables 1</a></li>
                                <li><a href="pricing-tables-2.html">Pricing Tables 2</a></li>
                                <li><a href="pricing-tables-3.html">Pricing Tables 3</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Faq <em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="faq.html">Faq 1</a></li>
                                <li><a href="faq-2.html">Faq 2</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Gallery<em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="gallery-1.html">Gallery 1</a></li>
                                <li><a href="gallery-2.html">Gallery 2</a></li>
                                <li><a href="gallery-3.html">Gallery 3</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Contact <em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="contact.html">Contact 1</a></li>
                                <li><a href="contact-2.html">Contact 2</a></li>
                                <li><a href="contact-3.html">Contact 3</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="properties-comparison.html">Properties Comparison</a>
                        </li>
                        <li>
                            <a href="search-brand.html">Search Brand</a>
                        </li>
                        <li>
                            <a href="typography.html">Typography</a>
                        </li>
                        <li>
                            <a href="elements.html">Elements</a>
                        </li>
                        <li>
                            <a href="icon.html">Icon</a>
                        </li>
                        <li>
                            <a href="404.html">Pages 404</a>
                        </li>
                        <li>
                            <a href="user-profile.html">User Profile</a>
                        </li>
                        <li>
                            <a href="my-properties.html">My Properties</a>
                        </li>
                        <li>
                            <a href="favorited-properties.html">Favorited properties</a>
                        </li>
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                        <li>
                            <a href="signup.html">Signup</a>
                        </li>
                        <li>
                            <a href="forgot-password.html">Forgot Password</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Blog <em class="fa fa-chevron-down"></em></a>
                    <ul>
                        <li>
                            <a href="#">Blog Classic <em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="blog-classic-sidebar-right.html">Right Sidebar</a></li>
                                <li><a href="blog-classic-sidebar-left.html">Left Sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Blog Columns <em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="blog-columns-2col.html">2 Columns</a></li>
                                <li><a href="blog-columns-3col.html">3 Columns</a></li>
                            </ul>
                        </li>
                        <li><a href="blog-single-sidebar-right.html">Atendimento</a></li>
                    </ul>
                </li>
                <li>
                    <a href="submit-property.html">Submit Property</a>
                </li>
            </ul>
        </div>
        <div class="get-in-touch">
            <h3 class="heading">Get in Touch</h3>
            <div class="sidebar-contact-info">
                <div class="icon">
                    <i class="fa fa-phone"></i>
                </div>
                <div class="body-info">
                    <a href="tel:0477-0477-8556-552">0477 8556 552</a>
                </div>
            </div>
            <div class="sidebar-contact-info">
                <div class="icon">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="body-info">
                    <a href="#">info@themevessel.com</a>
                </div>
            </div>
            <div class="sidebar-contact-info mb-0">
                <div class="icon">
                    <i class="fa fa-fax"></i>
                </div>
                <div class="body-info">
                    <a href="tel:0477-0477-8556-552">0266 8556 787</a>
                </div>
            </div>
        </div>
        <div class="get-social">
            <h3 class="heading">Get Social</h3>
            <a href="#" class="facebook-bg">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="#" class="twitter-bg">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="#" class="google-bg">
                <i class="fa fa-google"></i>
            </a>
            <a href="#" class="linkedin-bg">
                <i class="fa fa-linkedin"></i>
            </a>
        </div>
    </div>
</nav>
<!-- Sidenav end -->

@yield('content')

<!-- Intro section start -->
<div class="intro-section">
    <div class="intro-section-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-7 col-sm-12">
                    <h3>Quer vender ou alugar seu imóvel?</h3>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12">
                    <a class="btn-2 btn-white" href="{{route('web.atendimento')}}">
                        <span>Entrar em contato</span> <i class="arrow"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Intro section end -->

<footer class="main-footer clearfix">
    <div class="container">
        <!-- Footer info-->
        <div class="footer-info">
            <div class="row">
                <!-- About us -->
                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-item fi2">
                        <div class="main-title-2">
                            <h1>Atendimento</h1>
                            <p>{{$tenant->descricao}}</p>
                        </div>
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
                                    <a href="mailto:{{$tenant->email}}">{{$tenant->email}}</a>
                                </li>
                            @endif
                            @if ($tenant->email1)
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <a href="mailto:{{$tenant->email1}}">{{$tenant->email1}}</a>
                                </li>
                            @endif
                            @if ($tenant->telefone)
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <a href="tel:{{$tenant->telefone}}">{{$tenant->telefone}}</a>
                                    @if ($tenant->celular)
                                        <a href="tel:{{$tenant->celular}}"> {{$tenant->celular}}</a>
                                    @endif
                                </li>
                            @endif                            
                            @if ($tenant->whatsapp)
                                <li>
                                    <i class="fa fa-whatsapp"></i>
                                    <a target="_blank" href="{{getNumZap($tenant->whatsapp ,'Atendimento '.$tenant->name)}}">{{$tenant->whatsapp}}</a>
                                </li>
                            @endif                            
                        </ul>
                    </div>
                </div>
                <!-- Links -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-item">
                        <div class="main-title-2">
                            <h1>Links</h1>
                        </div>
                        <ul class="links">
                            <li>
                                <a href="{{route('web.home')}}">Início</a>
                            </li>
                            <li>
                                <a href="{{route('web.blog.artigos')}}">Blog</a>
                            </li>
                            <li>
                                <a href="{{route('web.noticias')}}">Notícias</a>
                            </li>
                            <li>
                                <a href="blog-single-sidebar-right.html">Financiamento</a>
                            </li>
                            <li>
                                <a href="blog-single-sidebar-right.html">Busca por referência</a>
                            </li>
                            <li>
                                <a href="properties-list-rightside.html">Cadastrar Imóvel</a>
                            </li>
                            <li>
                                <a href="{{route('web.atendimento')}}">Atendimento</a>
                            </li>
                            <li>
                                <a href="{{route('web.politica')}}">Política de Privacidade</a>
                            </li>
                        </ul>
                    </div>
                </div>
               
                <!-- Subscribe -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-item">
                        <div class="main-title-2">
                            <h1>Inscreva-se</h1>
                        </div>
                        <div class="newsletter clearfix">
                            <p>Receba direto no seu e-mail, nossas dicas e novidades sobre compra, venda e locação de imóveis!</p>
                            <form class="form-inline d-flex" action="#">
                                <input class="form-control" type="email" id="email" placeholder="Email Address...">
                                <button class="btn button-theme" type="submit"><i class="fa fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <p style="font-size: 14px;">&copy;  {{$tenant->ano_de_inicio}} {{$tenant->name}}. Todos os direitos reservados.</p>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <ul class="social-list clearfix">
                        @if ($tenant->facebook)
                            <li><a target="_blank" class="facebook-bg" href="{{$tenant->facebook}}"><i class="fa fa-facebook"></i></a></li>
                        @endif
                        @if ($tenant->twitter)
                            <li><a target="_blank" class="twitter-bg" href="{{$tenant->twitter}}"><i class="fa fa-twitter"></i></a></li>
                        @endif
                        @if ($tenant->instagram)
                            <li><a target="_blank" class="instagram-bg" href="{{$tenant->instagram}}"><i class="fa fa-instagram"></i></a></li>
                        @endif
                        @if ($tenant->linkedin)
                            <li><a target="_blank" class="linkedin-bg" href="{{$tenant->linkedin}}"></a><i class="fa fa-linkedin"></i></li>
                        @endif
                        @if ($tenant->youtube)
                            <li><a target="_blank" class="youtube-bg" href="{{$tenant->youtube}}"><i class="fa fa-youtube"></i></a></li>
                        @endif 
                    </ul>
                </div>
                <div class="col-12 text-center my-3">
                    <a href=""><img src="{{env('DESENVOLVEDOR_LOGO')}}" alt="{{env('DESENVOLVEDOR')}}"></a>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.min.js'))}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/bootstrap.bundle.min.js'))}}"></script>
<script  src="{{url(asset('frontend/'.$tenant->template.'/js/bootstrap-submenu.js'))}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/rangeslider.js'))}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.mb.YTPlayer.js'))}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/wow.min.js'))}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/bootstrap-select.min.js'))}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.easing.1.3.js'))}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.scrollUp.js'))}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.mCustomScrollbar.concat.min.js'))}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/leaflet.js'))}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/leaflet-providers.js'))}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/leaflet.markercluster.js'))}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/dropzone.js'))}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.filterizr.js'))}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.magnific-popup.min.js'))}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/slick.min.js'))}}"></script>
<script src="{{--url(asset('frontend/'.$tenant->template.'/js/maps.js'))--}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/sidebar.js'))}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/app.js'))}}"></script>

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