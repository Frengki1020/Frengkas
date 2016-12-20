<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name')}}</title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.0.0/css/responsive.dataTables.min.css">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- core CSS -->
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
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body id="home" class="homepage">

    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('home') }}"><img src="{{ asset('/landingpage') }}/images/logo.png" alt="logo" height="57"></a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- <li class="scroll"><a href="{{ url('/home') }}#services">Services</a></li>
                        <li class="scroll"><a href="{{ url('/home') }}#portfolio">Gallery</a></li>
                        <li class="scroll"><a href="{{ url('/home') }}">Information</a></li> -->
                        <!-- <li class="scroll"><a href="#meet-team">Team</a></li> -->
                        
                        @if (Auth::guest())
                            <li class="scroll"><a href="{{ url('/') }}">Home</a></li>
                            <li class="scroll"><a href="{{ url('/login') }}">Login</a></li>   
                            <li class="scroll"><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="scroll"><a href="{{ url('/home') }}">Home</a></li>
                            <li class="scroll"><a href="{{ url('/bookings') }}">Request</a></li>  
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

    <section id="portfolio">
        @yield('content')
    </section><!--/#portfolio-->


    <script src="{{ asset('/landingpage') }}/js/jquery.js"></script>
    <script src="{{ asset('/landingpage') }}/js/bootstrap.min.js"></script>
    <!-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script> -->
    <script src="{{ asset('/landingpage') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('/landingpage') }}/js/mousescroll.js"></script>
    <script src="{{ asset('/landingpage') }}/js/smoothscroll.js"></script>
    <script src="{{ asset('/landingpage') }}/js/jquery.prettyPhoto.js"></script>
    <script src="{{ asset('/landingpage') }}/js/jquery.isotope.min.js"></script>
    <script src="{{ asset('/landingpage') }}/js/jquery.inview.min.js"></script>
    <script src="{{ asset('/landingpage') }}/js/wow.min.js"></script>
    <script src="{{ asset('/landingpage') }}/js/main.js"></script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.0.0/js/dataTables.responsive.min.js"></script>
     <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

    <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    </script>    

    @yield('scripts')
</body>
</html>