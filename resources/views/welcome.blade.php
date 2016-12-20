<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name')}}</title>
    <!-- core CSS -->
    <!-- fungsi blade yg digunakan untuk mengambil file css,js,img, -->
    <link href="{{ asset('/landingpage') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/landingpage') }}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('/landingpage') }}/css/animate.min.css" rel="stylesheet">
    <link href="{{ asset('/landingpage') }}/css/owl.carousel.css" rel="stylesheet">
    <link href="{{ asset('/landingpage') }}/css/owl.transitions.css" rel="stylesheet">
    <link href="{{ asset('/landingpage') }}/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{ asset('/landingpage') }}/css/main.css" rel="stylesheet">
    <link href="{{ asset('/landingpage') }}/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('/landingpage') }}/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('/landingpage') }}/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('/landingpage') }}/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('/landingpage') }}/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('/landingpage') }}/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body id="home" class="homepage">

    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar">sss</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('home') }}"><img src="{{ asset('/landingpage') }}/images/logo.png" alt="logo" height="57"></a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll"><a href="#services">Services</a></li>
                        
                        <li class="scroll"><a href="#about">Information</a></li>
                       
                        @if (Auth::guest())
                            <li class="scroll"><a href="{{ url('/login') }}">Login</a></li>   
                           <!--  <li class="scroll"><a href="{{ url('/register') }}">Register</a></li> -->
                        @else
                            <li class="scroll"><a href="{{ url('/bookings') }}">Booking</a></li> 
                            <li class="scroll"><a href="#portfolio">Gallery</a></li>
                            <li class="scroll"> 
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
    <section id="main-slider">
        <div class="section-header">
               <!--  <h2 class="section-title text-center wow fadeInDown">Frengkas</h2> -->
               <div class="itemw" style="background-image: url( {{ asset('/landingpage') }}/images/slider/BG.png);">
                    <!-- <div class="slider-inner">
                        <div class="row">
                            <img class="tengah" src="{{ asset('/landingpage') }}/images/logo11.png" alt="logo" height="70"></a>
                        <center><h4> Ketamvanan Anda ada ditangan Kami</h4>
                    
                        @if (Auth::guest())
                            <a href="{{ url('/register') }}">
                              <button type="button" class="btn btn-default" style="color: white">Register</button></a>
                         @endif

                        </center> 
                        </div>
                    </div> -->
                    <div class='container-fluid'>
                        <div class='row'>
                            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                           <center> <img class="tengah" src="{{ asset('/landingpage') }}/images/logo11.png" alt="logo" height="70" style="margin-top:1%"></a></center>
                             </div>

                            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' >
                                <center><br>@if (Auth::guest())
                            <a href="{{ url('/register') }}">
                              <button type="button" class="btn btn-default" style="background-color: #d4145a; color: #ffffff">Register</button></a>
                         @endif</center> 
                            </div>
                        </div>
                    </div>
                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' style="padding-top:340px;">
                       <center><b><h2><P style="color:white; font-size: 100%; font-family:helvetica;"> Ketamvanan Anda ada ditangan Kami</p></h2></b></center> 
                    </div>
                </div>
        </div>
    </section>
    <section id="services" >
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Our Services</h2>
                <p class="text-center wow fadeInDown">Frengkas menyediakan Layanan untuk pelanggan:</p>
            </div>
            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa  fa-scissors"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Pangkas Rambut</h4>
                                <img class="img-responsive" src="{{ asset('/landingpage') }}/images/service/haircut.png" alt="">
                                <p><h5>- Frengkas menyediakan layanan Pangkas Rambut berkualitas, sesuai dengan Model yang diinginkan Pelanggan </h5></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-cubes"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Cukur Kumis/Jenggot</h4>
                                <img class="img-responsive" src="{{ asset('/landingpage') }}/images/service/shave.png" alt="">
                                <p><h5>- Frengkas menyediakan layanan Cukur Kumis/Jenggot berkualitas, sesuai dengan keinginan Pelanggan</h5></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-pie-chart"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Cat Rambut</h4>
                                <img class="img-responsive" src="{{ asset('/landingpage') }}/images/service/haircolor.png" alt="">
                                <p><h5>- Frengkas menyediakan layanan Cat Rambut berkualitas, Pelanggan dapat memilih warna cat rambut yang diinginkan</h5></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#services-->
    <section id="about">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">About Us</h2>
            </div>
             <div class="col-sm-6 wow fadeInLeft">
                   <h3 class="column-title">Kontak dan Lokasi</h3>
                <p>Jalan Sisingamaraja, Sitoluama, Laguboti, Institut Teknologi Del Tobasa, Sumatera Utara, 22381 
                <div class="pull-left">
                         <h4>       <i class="fa  fa-phone" height="50"> 082360456288</i></h4>
                          <h4>       <i class="fa  fa-envelope-o" height="50"> frengkas@gmail.com</i></h4>
                 </div>
                </div>

                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title">Frengkas</h3>
                    <p>Frengkas adalah singkatan dari Frengki pangkas online, sebuah layanan
                     inovatif yang memberikan service pangkas rambut bagi pelanggan.
                      Layanan pangkas dapat dilakukan di kediaman pelanggan atau di tempat yang telah ditentukan, 
                      dengan demikian akan sangat menghemat waktu pelanggan. Dengan menggunakan layanan Frengki pangkas,
                       pelanggan akan mendapatkan model rambut yang sesuai dengan permintaan dengan hasil kerja yang rapi. 
                       Frengki pangkas akan berkonsultasi dengan hair stylist agar potongan rambut yang dihasilkan selalu up 
                       to date dan menarik. Frengki pangkas online digagas oleh 5 mahasiswa Institut Teknologi Del 
                    untuk menjawab kebutuhan mahasiswa akan layanan pangkas yang cepat dan rapi.</p>

                 <!--    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="nostyle">
                                <li><i class="fa fa-check-square"></i> Ipsum is simply dummy</li>
                                <li><i class="fa fa-check-square"></i> When an unknown</li>
                            </ul>
                        </div>

                        <div class="col-sm-6">
                            <ul class="nostyle">
                                <li><i class="fa fa-check-square"></i> The printing and typesetting</li>
                                <li><i class="fa fa-check-square"></i> Lorem Ipsum has been</li>
                            </ul>
                        </div>
                    </div>

                    <a class="btn btn-primary" href="#">Learn More</a> -->

                </div>
            </div>
        </div>
    </section><!--/#about-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; {{ date('Y') }} {{ config('app.name') }} - Aplikasi Pangkas Online. <!-- Designed by --> <!-- <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a> -->
                </div>
                <div class="col-sm-6">
                    <!-- <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                    </ul> -->
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="{{ asset('/landingpage') }}/js/jquery.js"></script>
    <script src="{{ asset('/landingpage') }}/js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="{{ asset('/landingpage') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('/landingpage') }}/js/mousescroll.js"></script>
    <script src="{{ asset('/landingpage') }}/js/smoothscroll.js"></script>
    <script src="{{ asset('/landingpage') }}/js/jquery.prettyPhoto.js"></script>
    <script src="{{ asset('/landingpage') }}/js/jquery.isotope.min.js"></script>
    <script src="{{ asset('/landingpage') }}/js/jquery.inview.min.js"></script>
    <script src="{{ asset('/landingpage') }}/js/wow.min.js"></script>
    <script src="{{ asset('/landingpage') }}/js/main.js"></script>
</body>
</html>