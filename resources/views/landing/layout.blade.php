<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ Config::get('site_name') }} | {{ Config::get('tag_line') }}</title>
    <link rel="shortcut icon" href="/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/devices/devices.min.css">
    <link rel="stylesheet" href="/landing/css/style.css">
    <link rel="stylesheet" href="/landing/css/mods.css">

    <!--[if lt IE 9]>
      <script src="/landing/js/vendor/html5shiv.js"></script>
      <script src="/landing/js/vendor/respond.min.js"></script>
    <![endif]-->

    @if(Config::get('css'))
    <style>
        {{ Config::get('css') }}
    </style>
    @endif

  @if(App::environment('production'))
    @include('common.analytics')
  @endif

  </head>
  <body class="{{ $type }}">

  <!-- PRELOADER -->
  <div class="preloader"></div>
  <!-- /PRELOADER -->

  <header id="header">

    <div class="overlay"></div>

    <div class="topbar">
      <div class="container">
        <div class="row">

          <!-- LOGO -->
          <div class="col-sm-3 logo">
            <a href="/"><img src="/images/pmaps-logo-white.png" width="60px" alt="{{ Config::get('site_name') }}"></a>
          </div>
          <!-- /LOGO -->

          <!-- MENU -->
          <div class="col-sm-9 menu">
            <ul>
              <li><a href="/">Overview</a></li>
              <li><a href="/contact">Contact</a></li>

              @auth
              <li><a href="/logout">Logout</a></li>
              @else
              <li><a href="/login">Login</a></li>
              @endauth
              <li class="separator"></li>
              @auth
              <li><a href="/dashboard" class="bordered scroll">Dashboard</a></li>
              @else
              <li><a href="/register" class="bordered scroll">Join</a></li>
              @endauth
            </ul>
          </div>
          <!-- /MENU -->

        </div>
      </div>
    </div>

    @if($hero)
      <div class="wrapper">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 text">
              <h1 class="lead"><strong>{{ Config::get('tag_line') }}</strong></h1>
              <p>{{ Config::get('site_description') }}</p>

              @if(Config::get('featured_video'))
              <div class="buttons">
                <a href="{{ Config::get('featured_video') }}" target="_blank" class="solid"><i class="ion-play"></i> Watch Demo</a> or <a href="/register" class="inline scroll">try now</a>
              </div>
              @endif
              
            </div>
          </div>
        </div>
      </div>

      <div class="scroll-down">
        <a href="#explore" class="scroll">
          <span>Learn more</span>
          <i class="ion-chevron-down"></i>
        </a>
      </div>
    @else

      <div class="mt-lg">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text">
              <h1 class="lead text-white text-uppercase"><strong>{{ $title }}</strong></h1>
            </div>
          </div>
        </div>
      </div>

      @endif

    </header>

    @include('common.alerts')

    @yield('content')

  <!-- FOOTER SECTION -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-4 image">
          <img src="/images/pmaps-logo-purple.svg" width="120px">
        </div>
        <div class="col-sm-8">
          <span><a href="/contact">Contact</a></span>
          <span><a href="/terms">Terms</a></span>
          <ul>

            @if(Config::get('facebook'))
            <li><a href="{{ Config::get('facebook') }}" target="_blank"><i class="ion-social-facebook"></i></a></li>
            @endif

            @if(Config::get('twitter'))
            <li><a href="{{ Config::get('twitter') }}"><i class="ion-social-twitter"></i></a></li>
            @endif

            @if(Config::get('linkedin'))
            <li><a href="{{ Config::get('linkedin') }}"><i class="ion-social-linkedin"></i></a></li>
            @endif

          </ul>
          <a href="#header" class="scroll"><i class="ion-chevron-up"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <!-- /FOOTER SECTION -->


  <script src="/landing/js/vendor/jquery-1.11.3.min.js"></script>
  <script src="/landing/js/vendor/jquery.easing.1.3.js"></script>
  <script src="/landing/js/vendor/jquery.backstretch.min.js"></script>
  <script src="/landing/js/vendor/slick.min.js"></script>
  <script src="/landing/js/main.js"></script>
  @include('common.intercom')
  @stack('plugins')
  </body>
</html>