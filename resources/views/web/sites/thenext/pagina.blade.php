@extends("web.sites.{$tenant->template}.master.master")

@section('content')

<div class="sub-banner">
    <div class="overlay">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>About Us</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{route('web.home')}}">Home</a></li>
                    <li class="active">About Us</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- About city estate start -->
<div class="about-city-estate content-area-11">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="inside-properties pds-2">
                    <iframe class="modalIframe" src="https://www.youtube.com/embed/xywe1MxGxKw" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 align-self-center">
                <div class="about-text">
                    <h3>Welcome to The Nest</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor arcu non ligula convallis, vel tincidunt ipsum posuere. Fusce sodales lacus ut pellentes sollicitudin. Duis iaculis, arcu ut hendrerit pharetra, elit augue pulvinar magna,</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor arcu non ligula convallis, vel tincidunt ipsum posuere. Fusce sodales lacus ut pellentes sollicitudin. Duis iaculis, arcu ut hendrerit pharetra, elit augue pulvinar magna, a consectetur eros quam</p>
                    <a class="btn-2 btn-defaults" href="#">
                        <span>Read More</span> <i class="arrow"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About city estate end -->

<!-- Our service start -->
<div class="our-service content-area-11">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1>What Are You Looking For</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <div class="service-info-1">
                    <i class="flaticon-apartment"></i>
                    <h3>Apartmentsddd</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                    <a href="services-1.html" class="read-more">
                        Read More
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <div class="service-info-1">
                    <i class="flaticon-internet"></i>
                    <h3>Houses</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                    <a href="services-1.html" class="read-more">
                        Read More
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <div class="service-info-1">
                    <i class="flaticon-vehicle"></i>
                    <h3>Garages</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                    <a href="services-1.html" class="read-more">
                        Read More
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                <div class="service-info-1">
                    <i class="flaticon-symbol"></i>
                    <h3>Commercial</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                    <a href="services-1.html" class="read-more">
                        Read More
                    </a>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 text-center">
                <a class="btn-1 btn-outline-1" href="services-1.html">
                    <span>Learn More</span> <i class="arrow"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Our service end -->

<!-- Testimonial 3 section start-->
<div class="testimonials-3 content-area-7 comon-slick">
    <div class="container">
        <!-- Main title -->
        <div class="main-title main-title-3">
            <h1>Our Testimonial</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
        </div>
        <div class="slick row comon-slick-inner" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 1}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
            <div class="item slide-box">
                <div class="testimonials-inner">
                    <div class="user">
                        <a href="#">
                            <img class="media-object" src="img/avatar/avatar-1.jpg" alt="user">
                        </a>
                    </div>
                    <div class="testimonial-info">
                        <h3>
                            Pitarshon Roky
                        </h3>
                        <p>Creative Director</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text everLorem industry's standard dummy text everLorem.</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-full"></i>
                            <span>Reting</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item slide-box">
                <div class="testimonials-inner">
                    <div class="user">
                        <a href="#">
                            <img class="media-object" src="img/avatar/avatar-2.jpg" alt="user">
                        </a>
                    </div>
                    <div class="testimonial-info">
                        <h3>
                            Creative Director, india
                        </h3>
                        <p>Office Manager</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text everLorem industry's standard dummy text everLorem.</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-full"></i>
                            <span>Reting</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item slide-box">
                <div class="testimonials-inner">
                    <div class="user">
                        <a href="#">
                            <img class="media-object" src="img/avatar/avatar-3.jpg" alt="user">
                        </a>
                    </div>
                    <div class="testimonial-info">
                        <h3>
                            Maikel Alisa
                        </h3>
                        <p>Web Designer, Uk</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text everLorem industry's standard dummy text everLorem.</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-full"></i>
                            <span>Reting</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial 3 end -->

<!-- Agent section start -->
<div class="agent-section content-area comon-slick">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Our Agent</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
        </div>
        <div class="slick row comon-slick-inner" data-slick='{"slidesToShow": 4, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
            <div class="item slide-box">
                <div class="agent-3">
                    <div class="thumb">
                        <img src="img/team/team-5.jpg" alt="agent-3" class="img-fluid">
                        <ul>
                            <li>
                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="info">
                        <h4><a href="agent-single.html">Busel park</a></h4>
                        <p>Programmer</p>
                    </div>
                </div>
            </div>
            <div class="item slide-box">
                <div class="agent-3">
                    <div class="thumb">
                        <img src="img/team/team-8.jpg" alt="agent-3" class="img-fluid">
                        <ul>
                            <li>
                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="info">
                        <h4><a href="agent-single.html">Martin Smith</a></h4>
                        <p>Office Manager</p>
                    </div>
                </div>
            </div>
            <div class="item slide-box">
                <div class="agent-3">
                    <div class="thumb">
                        <img src="img/team/team-7.jpg" alt="agent-3" class="img-fluid">
                        <ul>
                            <li>
                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="info">
                        <h4><a href="agent-single.html">Karen Paran</a></h4>
                        <p>Web Developer</p>
                    </div>
                </div>
            </div>
            <div class="item slide-box">
                <div class="agent-3">
                    <div class="thumb">
                        <img src="img/team/team-7.jpg" alt="agent-3" class="img-fluid">
                        <ul>
                            <li>
                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="info">
                        <h4><a href="agent-single.html">Martin Smith</a></h4>
                        <p>Office Manager</p>
                    </div>
                </div>
            </div>
            <div class="item slide-box">
                <div class="agent-3">
                    <div class="thumb">
                        <img src="img/team/team-6.jpg" alt="agent-3" class="img-fluid">
                        <ul>
                            <li>
                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="info">
                        <h4><a href="agent-single.html">Michelle Nelson</a></h4>
                        <p>Support Manager</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Agent section end -->

<!-- Partners strat -->
<div class="partners bg-white">
    <div class="container">
        <h4>Brands <span>$ Partners</span></h4>
        <div class="row">
            <div class="col-lg-12">
                <div class="custom-slider slide-box-btn">
                    <div class="custom-box"><img src="img/brand/partner.png" alt="brand"></div>
                    <div class="custom-box"><img src="img/brand/partner-2.png" alt="brand"></div>
                    <div class="custom-box"><img src="img/brand/partner-3.png" alt="brand"></div>
                    <div class="custom-box"><img src="img/brand/partner-4.png" alt="brand"></div>
                    <div class="custom-box"><img src="img/brand/partner-5.png" alt="brand"></div>
                    <div class="custom-box"><img src="img/brand/partner.png" alt="brand"></div>
                    <div class="custom-box"><img src="img/brand/partner-2.png" alt="brand"></div>
                    <div class="custom-box"><img src="img/brand/partner-3.png" alt="brand"></div>
                    <div class="custom-box"><img src="img/brand/partner-4.png" alt="brand"></div>
                    <div class="custom-box"><img src="img/brand/partner-5.png" alt="brand"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partners end -->

@endsection