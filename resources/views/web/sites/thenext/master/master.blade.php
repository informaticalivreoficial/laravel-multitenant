<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>The Nest - Real Estate HTML Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
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

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/initial.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/style.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/'.$tenant->template.'/css/skins/green-light.css'))}}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{$tenant->getfaveicon()}}" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="css/ie10-viewport-bug-workaround.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script type="text/javascript" src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5shiv.min.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- Top header start -->
<header class="top-header" id="top">
    <div class="container">
        <div class="row">
            <div class="col-7 col-sm-7 col-md-7 col-lg-6">
                <div class="list-inline">
                    <a href="tel:1-8X0-666-8X88" class="n-575">
                        <i class="fa fa-phone"></i>{{$tenant->whatsapp}}
                    </a>
                    <a href="tel:info@themevessel.com">
                        <i class="fa fa-envelope"></i>{{$tenant->email}}
                    </a>
                </div>
            </div>
            <div class="col-5 col-sm-5 col-md-5 col-lg-6">
                <ul class="top-social-media pull-right">
                    <li>
                        <a href="login.html" class="sign-in"><i class="fa fa-sign-in"></i> Login</a>
                    </li>
                    <li>
                        <a href="signup.html" class="sign-in"><i class="fa fa-user"></i> Register</a>
                    </li>
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
            <a href="index.html" class="logo">
                <img src="img/logos/logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" id="drawer" type="button">
                <span class="fa fa-bars"></span>
            </button>
            <div class="navbar-collapse collapse " id="navbar">
                <ul class="navbar-nav ustify-content-start w-100">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Index
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="index.html">Index 1</a></li>
                            <li><a class="dropdown-item" href="index-2.html">Index 2</a></li>
                            <li><a class="dropdown-item" href="index-3.html">Index 3</a></li>
                            <li><a class="dropdown-item" href="index-4.html">Index 4</a></li>
                            <li><a class="dropdown-item" href="index-5.html">Index 5</a></li>
                            <li><a class="dropdown-item" href="index-6.html">Index 6</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Properties
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Property List</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="properties-list-rightside.html">Right Sidebar</a></li>
                                    <li><a class="dropdown-item" href="properties-list-leftside.html">Left Sidebar</a></li>
                                    <li><a class="dropdown-item" href="properties-list-fullwidth.html">Fullwidth</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Property Grid</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="properties-grid-rightside.html">Right Sidebar</a></li>
                                    <li><a class="dropdown-item" href="properties-grid-leftside.html">Left Sidebar</a></li>
                                    <li><a class="dropdown-item" href="properties-grid-fullwidth.html">Fullwidth</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Map View</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="properties-map-rightside-list.html">Map List 1</a></li>
                                    <li><a class="dropdown-item" href="properties-map-leftside-list.html">Map List 2</a></li>
                                    <li><a class="dropdown-item" href="properties-map-rightside-grid.html">Map Grid 1</a></li>
                                    <li><a class="dropdown-item" href="properties-map-leftside-grid.html">Map Grid 2</a></li>
                                    <li><a class="dropdown-item" href="properties-map-full.html">Map FullWidth</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Property Detail</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="properties-details.html">Property Detail 1</a></li>
                                    <li><a class="dropdown-item" href="properties-details-2.html">Property Detail 2</a></li>
                                    <li><a class="dropdown-item" href="properties-details-3.html">Property Detail 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Agents
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="agent-listing-grid.html">Agent grid</a></li>
                            <li><a class="dropdown-item" href="agent-listing-grid-sidebar.html">Agent Grid sidebarbar</a></li>
                            <li><a class="dropdown-item" href="agent-listing-row.html">Agent list</a></li>
                            <li><a class="dropdown-item" href="agent-listing-row-sidebar.html">Agent List Sidebarbar</a></li>
                            <li><a class="dropdown-item" href="agent-single.html">Agent Detail</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('web.atendimento',['tenantSlug' => $tenant->slug])}}">Atendimento</a></li>
                    <li class="nav-item submit-property-button">
                        <a href="submit-property.html" class="button btn-3">
                            Submit Property
                        </a>
                    </li>
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
            <img src="img/logos/logo.png" alt="sidebarlogo">
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

<footer class="main-footer clearfix">
    <div class="container">
        <!-- Footer info-->
        <div class="footer-info">
            <div class="row">
                <!-- About us -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-item fi2">
                        <div class="main-title-2">
                            <h1>Contact Us</h1>
                        </div>
                        <ul class="personal-info">
                            <li>
                                <i class="fa fa-map-marker"></i>
                                Address: 360 Harvest St, North Subract, London. United States Of Amrica.
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                Email:<a href="mailto:sales@hotelempire.com">info@themevessel.com</a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                Phone: <a href="tel:+55-417-634-7071">+0477 85X6 552</a>
                            </li>
                            <li>
                                <i class="fa fa-fax"></i>
                                Fax: +0487 85X6 224
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Links -->
                <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-item">
                        <div class="main-title-2">
                            <h1>Links</h1>
                        </div>
                        <ul class="links">
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <a href="about.html">About Us</a>
                            </li>
                            <li>
                                <a href="contact.html">Contact Us</a>
                            </li>
                            <li>
                                <a href="blog-single-sidebar-right.html">Blog</a>
                            </li>
                            <li>
                                <a href="blog-single-sidebar-right.html">Services</a>
                            </li>
                            <li>
                                <a href="properties-list-rightside.html">Properties Listing</a>
                            </li>
                            <li>
                                <a href="properties-details.html">Properties Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Recent cars -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-item popular-posts">
                        <div class="main-title-2">
                            <h1>Popular Posts</h1>
                        </div>
                        <div class="d-flex mb-3 popular-posts-box">
                            <a class="pr-3" href="properties-details.html">
                                <img src="img/properties/small-properties-2.jpg" alt="small-photo" class="flex-shrink-0 me-3">
                            </a>
                            <div class="detail align-self-center">
                                <h4>
                                    <a href="properties-details.html">Modern Family Home</a>
                                </h4>
                                <div class="listing-post-meta">
                                    Sep 18, 2021 | <a href="#">$470,00</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-3 popular-posts-box">
                            <a class="pr-3" href="properties-details.html">
                                <img src="img/properties/small-properties-1.jpg" alt="small-photo" class="flex-shrink-0 me-3">
                            </a>
                            <div class="detail align-self-center">
                                <h4>
                                    <a href="properties-details.html">Sweet Family Home</a>
                                </h4>
                                <div class="listing-post-meta">
                                    Aug 18, 2020 | <a href="#">$485,00</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex popular-posts-box">
                            <a class="pr-3" href="properties-details.html">
                                <img src="img/properties/small-properties-3.jpg" alt="small-photo" class="flex-shrink-0 me-3">
                            </a>
                            <div class="detail align-self-center">
                                <h4>
                                    <a href="properties-details.html">Beautful Single Home</a>
                                </h4>
                                <div class="listing-post-meta">
                                    Aug Feb, 2021 | <a href="#">$850,00</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Subscribe -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-item">
                        <div class="main-title-2">
                            <h1>Subscribe</h1>
                        </div>
                        <div class="newsletter clearfix">
                            <p>Sign Up for Our Newsletter to get Latest Updates and Offers. Subscribe to receive news in your inbox. Lorem Ipsum</p>
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
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <p>&copy;  2021 <a href="http://themevessel.com/" target="_blank">Theme Vessel</a>. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <ul class="social-list clearfix">
                        <li>
                            <a href="#" class="facebook-bg">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="twitter-bg">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="linkedin-bg">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="google-bg">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="rss-bg">
                                <i class="fa fa-rss"></i>
                            </a>
                        </li>
                    </ul>
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
<script src="{{url(asset('frontend/'.$tenant->template.'/js/maps.js'))}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/sidebar.js'))}}"></script>
<script src="{{url(asset('frontend/'.$tenant->template.'/js/app.js'))}}"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{url(asset('frontend/'.$tenant->template.'/js/ie10-viewport-bug-workaround.js'))}}"></script>
<!-- Custom javascript -->
<script src="{{url(asset('frontend/'.$tenant->template.'/js/ie10-viewport-bug-workaround.js'))}}"></script>
</body>
</html>