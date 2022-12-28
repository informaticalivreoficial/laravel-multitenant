<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="language" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
        
        <meta name="author" content="Renato Montanari"/>
        <meta name="copyright" content="{{ $tenant->ano_de_inicio }} {{ $tenant->name }}">        

        {!! $head ?? '' !!}
        
        <link rel="stylesheet" href="{{url(asset('frontend/'.$tenant->template.'/css/all-css-libraries.css'))}}"/>
        <link rel="stylesheet" href="{{url(asset('frontend/'.$tenant->template.'/css/style.css'))}}"/>

        @hasSection('css')
            @yield('css')
        @endif

        <!-- FAVICON -->
        <link rel="shortcut icon" href="{{$tenant->getfaveicon()}}"/>
        <link rel="apple-touch-icon" href="{{$tenant->getfaveicon()}}"/>
        <link rel="apple-touch-icon" sizes="72x72" href="{{$tenant->getfaveicon()}}"/>
        <link rel="apple-touch-icon" sizes="114x114" href="{{$tenant->getfaveicon()}}"/>

        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <body>

      <header class="header-area">
          <div class="container">
          <div class="classy-nav-container breakpoint-off">
              <nav class="classy-navbar justify-content-between" id="saasboxNav">
                <!-- Logo-->
                <a class="nav-brand me-5" href="{{route('web.home')}}">
                    <img src="{{url('frontend/'.$tenant->template.'/img/logo-gerenciador.fw.png')}}" alt="{{$tenant->name}}">
                </a>
                <!-- Navbar Toggler-->
                <div class="classy-navbar-toggler"><span class="navbarToggler"><span></span><span></span><span></span><span></span></span></div>
              <!-- Menu-->
              <div class="classy-menu">
                  <!-- close btn-->
                  <div class="classycloseIcon">
                  <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                  </div>
                  <!-- Nav Start-->
                  <div class="classynav">
                  <ul id="corenav">
                      <li><a href="{{route('web.home')}}">Início</a></li>                  
                      {{--<li><a href="index.php?app=blog">Dicas</a></li>--}}
                      <li><a href="{{route('web.atendimento')}}">Atendimento</a></li>
                      @guest
                            @if (Route::has('web.loja.login'))
                                <li class="cn-dropdown-item has-down">
                                    <a href="{{-- route('web.loja.login') --}}">Login</a>
                                </li>
                            @endif
                        @else
                            <li class="cn-dropdown-item has-down">
                                <a href="#">{{-- Auth::user()->name --}} <i class="fa fa-chevron-down"></i></a>

                                <ul class="dropdown">
                                    <li><a href="{{-- route('web.loja.cliente.meus-dados',[ 'id' => Auth::user()->id]) --}}">Meus Dados</a></li>
                                    <li><a href="{{-- route('web.loja.cliente.meus-pedidos') --}}">Meus Pedidos</a></li>
                                    <li><a href="{{-- route('web.loja.cliente.alterar-senha',[ 'id' => Auth::user()->id]) --}}">Alterar Senha</a></li>
                                    <li><a href="{{-- route('web.logout') --}}">Sair</a></li>                          
                                  </ul>
                                <span class="dd-trigger"></span>                                                               
                            </li>
                        @endguest
                      
                      @if(Session::has('cart'))
                        <li><a href="{{route('web.cart')}}"><i class="fa fa-shopping-cart"></i>
                        <span style="border-radius: 10px;padding: 3px 7px;font-size: 11px;background-color: #00a651;color: #ffffff;">{{Session::get('cart')->totalItems()}}</span></a></li>
                      @endif                     
                  </ul>
                  <!-- Login Button-->
                  <div id="btn-loja" class="login-btn-area ms-4 mt-4 mt-lg-0">
                      <a class="btn saasbox-btn btn-sm" href="{{ route('login') }}">Login</a>
                    </div>
                  </div>
              </div>
              </nav>
          </div>
          </div>
      </header>

        @yield('content')

        
        <footer class="footer-area footer2 pt-5 pb-3">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Footer Widget Area-->
                    <div class="col-12 col-sm-10 col-lg-4">
                        <div class="footer-widget-area mb-70">
                            <a class="d-block mb-4 text-center" href="{{route('web.home')}}">
                                <img src="{{url('frontend/'.$tenant->template.'/img/logo-gerenciador-footer.png')}}" alt="{{$tenant->name}}">
                            </a>
                            <p style="color: #ffffff;">{!! $tenant->descricao !!}</p>             
                            <div class="footer-social-icon d-flex align-items-center mt-3">
                                @if ($tenant->facebook)
                                    <a target="_blank" href="{{$tenant->facebook}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                                @endif
                                @if ($tenant->instagram)
                                    <a target="_blank" href="{{$tenant->instagram}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                                @endif
                                @if ($tenant->twitter)
                                    <a target="_blank" href="{{$tenant->twitter}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                                @endif
                                @if ($tenant->linkedin)
                                    <a target="_blank" href="{{$tenant->linkedin}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a>
                                @endif
                                @if ($tenant->youtube)
                                    <a target="_blank" href="{{$tenant->youtube}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Youtube"><i class="fa fa-youtube"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget Area-->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                        <div class="footer-widget-area mb-70">
                            <h5 class="widget-title">Mapa do site</h5>
                            <ul>
                                <li><a href="{{route('web.planos')}}">Planos</a></li>
                                <li><a href="#">Empresa</a></li>
                            </ul>
                            <h5 class="widget-title mt-4">Cliente</h5>
                            <ul>
                                <li><a href="{{route('login')}}">Login</a></li>
                                <li><a href="{{route('web.atendimento')}}">Atendimento</a></li>
                            </ul>
                        </div>
                    </div>          
                    <!-- Footer Widget Area-->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-2">
                        <div class="footer-widget-area mb-70">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" style="font-size: 0.875em;">
                <div class="row align-items-center">          
                    <div class="col-12 col-sm-12 col-md-6 col-lg-12 text-center">
                        <div class="footer-nav"> 
                            <ul class="d-flex">
                            <li><a href="{{route('web.politica')}}">Política de privacidade</a></li>
                            <li><a href="{{route('web.atendimento')}}">Suporte</a></li>
                            </ul>
                        </div>
                    </div> 
                    <div class="col-12 col-sm-12 col-md-6 col-lg-12 p-lg-2 text-center">            
                        <div class="footer--content-text">
                            <p class="mb-0" style="font-size: 0.875em;">® {{$tenant->name}} - Todos os direitos reservados.Desenvolvido por <a href="https://informaticalivre.com.br" target="_blank">Informática Livre</a></p>
                        </div>
                    </div>         
                </div>
            </div>
        </footer>        
        
        <script src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.min.js'))}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
        <script src="{{--url(asset('frontend/'.$tenant->template.'/js/bootstrap.js'))--}}"></script>
        <script src="{{url(asset('frontend/'.$tenant->template.'/js/libs.js'))}}"></script>
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
