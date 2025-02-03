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

        <!-- CSS -->
        <link rel="stylesheet" href="{{url(asset('frontend/'.$tenant->template.'/css/bootstrap.css'))}}"/>
        <link rel="stylesheet" href="{{url(asset('frontend/'.$tenant->template.'/css/bootstrap-responsive.css'))}}"/>
        <link rel="stylesheet" href="{{url(asset('frontend/'.$tenant->template.'/css/responsiveslides.css'))}}"/>
        <link rel="stylesheet" href="{{url(asset('frontend/'.$tenant->template.'/css/prettyPhoto.css'))}}"/>
        <link rel="stylesheet" href="{{url(asset('frontend/'.$tenant->template.'/css/datepicker.css'))}}"/>
        <link rel="stylesheet" href="{{url(asset('frontend/'.$tenant->template.'/css/style.css'))}}"/>
        <link rel="stylesheet" href="{{url(asset('frontend/'.$tenant->template.'/font-awesome/css/font-awesome.css'))}}"/>
        <link rel="stylesheet" href="{{url(asset('frontend/'.$tenant->template.'/css/jquery-ui.css'))}}"/>
        
        <!-- FAVICON -->
        <link rel="shortcut icon" href="{{$tenant->getfaveicon()}}"/>
        <link rel="apple-touch-icon" href="{{$tenant->getfaveicon()}}"/>
        <link rel="apple-touch-icon" sizes="72x72" href="{{$tenant->getfaveicon()}}"/>
        <link rel="apple-touch-icon" sizes="114x114" href="{{$tenant->getfaveicon()}}"/>

        @hasSection('css')
            @yield('css')
        @endif
    </head>
        <body>
            <header>
                <div id="logo">
                    <div class="inner">
                         <a href="{{route('web.home')}}"><img src="{{$tenant->getlogomarca()}}" alt="{{$tenant->name}}" /></a>
                    </div>
                </div>                            
                
                <div id="mainmenu-container">           
                    <ul id="mainmenu">
                        <li><a href="{{route('web.home')}}">Início</a></li>                           
                        <li><a href="{{route('web.imoveisList',['type' => 'locacao'])}}">Imóveis</a></li>         
                        <li><a href="{{route('web.atendimento')}}">Atendimento</a></li>              	
                    </ul>
                </div>        
            </header>        

            @yield('content') 
            
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="span3">
                            <img src="{{url(asset('frontend/'.$tenant->template.'/img/logo-2.png'))}}" alt="{{$tenant->name}}" />
                        </div> 
                        <div class="span6">
                            <h3>{{$tenant->name}}</h3>
                            {{$tenant->descricao}} 
                        </div>                               
                       
                        <div class="span3">
                            <h3>Endereço</h3>
                            <address>
                                @if ($tenant->rua)
                                    <p>
                                        {{$tenant->rua}}
                                        {{($tenant->num ? ', '.$tenant->num : '')}}  
                                        {!!($tenant->bairro ? '<br> '.$tenant->bairro : '')!!}  
                                        {{($tenant->cidade ? ', '.getCidade($tenant->cidade, 'cidades') : '')}} 
                                    </p> 
                                @endif
                                @if ($tenant->telefone)                                        
                                    <span><strong>Telefone: </strong> <a href="tel:{{$tenant->telefone}}" title="Telefone">{{$tenant->telefone}}</a></span>
                                    @if ($tenant->celular)
                                    <span><strong>Móvel: </strong> <a href="tel:{{$tenant->celular}}" title="Celular"> {{$tenant->celular}}</a></span>
                                    @endif                                        
                                @endif
                                @if ($tenant->whatsapp)
                                    <br />
                                    <span>
                                        <img src="{{url(asset('frontend/'.$tenant->template.'/img/zapzap.png'))}}" /> <a target="_blank" href="{{getNumZap($tenant->whatsapp ,'Atendimento '.$tenant->name)}}" title="WhatsApp">{{$tenant->whatsapp}}</a>
                                    </span>                                        
                                @endif
                                @if ($tenant->email)
                                    <br /><span><a href="mailto:{{$tenant->email}}" title="Email">{{$tenant->email}}</a></span>
                                @endif
                                @if ($tenant->email1)
                                    <br /><span><a href="mailto:{{$tenant->email1}}" title="Email">{{$tenant->email1}}</a></span>
                                @endif  
                            </address>
                            
                            <div class="social-icons">
                                @if ($tenant->facebook)
                                    <a target="_blank" class="facebook" href="{{$tenant->facebook}}" title="Facebook"><img src="{{url(asset('frontend/'.$tenant->template.'/img/facebook.png'))}}" alt="Facebook" /></a>
                                @endif
                                @if ($tenant->twitter)
                                    <a target="_blank" class="twitter" href="{{$tenant->twitter}}" title="Twitter"><img src="{{url(asset('frontend/'.$tenant->template.'/img/twitter.png'))}}" alt="Twitter" /></a>
                                @endif
                                @if ($tenant->instagram)
                                    <a target="_blank" class="instagram" href="{{$tenant->instagram}}" title="Instagram"><img src="{{url(asset('frontend/'.$tenant->template.'/img/instagram.png'))}}" alt="Instagram" /></a>
                                @endif
                                @if ($tenant->linkedin)
                                    <a target="_blank" class="linkedin" href="{{$tenant->linkedin}}" title="Linkedin"><img src="{{url(asset('frontend/'.$tenant->template.'/img/linkedin.png'))}}" alt="Linkedin" /></a>
                                @endif
                                @if ($tenant->youtube)
                                    <a target="_blank" class="youtube" href="{{$tenant->youtube}}" title="Youtube"><img src="{{url(asset('frontend/'.$tenant->template.'/img/youtube.png'))}}" alt="Youtube" /></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
              
                <div class="subfooter">
                    <div class="container">
                        <div class="row">
                            <div class="span8">
                                © {{$tenant->ano_de_inicio}} {{$tenant->name}} - Todos os direitos reservados.
                                
                                <p class="font-accent">
                                    Feito com <i style="color:red;" class="fa icon-heart"></i> por <a style="color:#fff;" target="_blank" href="{{env('DESENVOLVEDOR_URL')}}">{{env('DESENVOLVEDOR')}}</a>
                                </p>
                            </div>
                            <div class="span4">
                                <nav>
                                    <ul>
                                        <li><a href="{{route('web.home')}}">Início</a></li>                           
                                        <li><a href="{{route('web.imoveisList',['type' => 'locacao'])}}">Imóveis</a></li>         
                                        <li><a href="{{route('web.atendimento')}}">Atendimento</a></li> 
                                        <li><a href="{{route('web.politica')}}" title="Política de Privacidade">Política de Privacidade</a></li>                         	
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>              
            </footer>

            <!-- LOAD JS FILES -->
            <script src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.min.js'))}}"></script>
            <script src="{{url(asset('frontend/'.$tenant->template.'/js/bootstrap.min.js'))}}"></script>
            <script src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.isotope.min.js'))}}"></script>
            <script src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.prettyPhoto.js'))}}"></script>
            <script src="{{url(asset('frontend/'.$tenant->template.'/js/easing.js'))}}"></script>
            <script src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.lazyload.js'))}}"></script>
            <script src="{{url(asset('frontend/'.$tenant->template.'/js/jquery.ui.totop.js'))}}"></script>
            <script src="{{url(asset('frontend/'.$tenant->template.'/js/selectnav.js'))}}"></script>
            <script src="{{url(asset('frontend/'.$tenant->template.'/js/ender.js'))}}"></script>
            <script src="{{url(asset('frontend/'.$tenant->template.'/js/custom.js'))}}"></script>
            <script src="{{url(asset('frontend/'.$tenant->template.'/js/responsiveslides.min.js'))}}"></script>

            <script src="{{url(asset('frontend/'.$tenant->template.'/js/shadowbox/shadowbox.js'))}}"></script>
            <link rel="stylesheet" href="{{url(asset('frontend/'.$tenant->template.'/js/shadowbox/shadowbox.css'))}}"/>    
            <script type="text/javascript">
                Shadowbox.init();
            </script>

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