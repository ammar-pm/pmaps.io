<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" dir="{{ __('common.dir') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    @stack('meta')

    <title>@yield('title', Config::get('site_name'))</title>
    
    <link rel="shortcut icon" href="/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/vendor/bootstrap-iconpicker/bootstrap-iconpicker.min.css">
    <link rel="stylesheet" href="/vendor/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    
    <link rel="stylesheet" href="/vendor/datatables/media/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/vendor/bootstrap-select/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="/vendor/bootstrap3-wysiwyg/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="/styles/line-tabs.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/styles/leaflet.awesome-markers.css">
    <link rel="stylesheet" href="/css/search.css">
    <link rel="stylesheet" href="/css/mods.css">
    @if(App::getLocale() === 'ar')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-flipped.min.css">
    <link rel="stylesheet" href="/css/rtl.css">
    @endif

    @yield('scripts', '')
    
    <script>
        window.Spark = <?php echo json_encode(array_merge(
            Spark::scriptVariables(), []
        )); ?>;
    </script>
</head>
<body class="with-navbar">

  @if(App::environment('production'))
    @include('common.facebook')
  @endif

    <div id="spark-app" v-cloak>

        <div class="container-fluid">

        <!-- Navigation -->
        @if (Auth::check())
            @include('spark::nav.user')
        @else
            @include('spark::nav.guest')
        @endif

        @include('common.alerts')
        
        <!-- Main Content -->
        @yield('content')

        <!-- Application Level Modals -->
        @if (Auth::check())
            @include('spark::modals.notifications')
            @include('spark::modals.support')
            @include('spark::modals.session-expired')
        @endif

        </div><!--Container-->
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="//api.filestackapi.com/filestack.js"></script>
    <script src="/vendor/datatables/media/js/jquery.dataTables.js"></script>
    <script src="/vendor/datatables/media/js/dataTables.bootstrap4.js"></script>
    <script src="/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="/vendor/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="/vendor/bootstrap-iconpicker/iconset/iconset-fontawesome-4.2.0.min.js"></script>
    <script src="/vendor/bootstrap-iconpicker/bootstrap-iconpicker.min.js"></script>
    <script src="/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="/vendor/bootstrap3-wysiwyg/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="/vendor/jssocials-1.4.0/jssocials.min.js"></script>

    @include('common.leaflet')

    @stack('plugins')

   
    <script>
    //Selectpicker
    $('.selectpicker').selectpicker({
        liveSearch: true,
        actionsBox: true,
        dropupAuto: false,
        selectedTextFormat: 'count > 2',
        width: '100%'
    });

    //Colorpicker
    $('.color-picker').colorpicker();
    //WYSIWYG
    $('.wysiwyg').wysihtml5({
      toolbar: {
        "font-styles": true, 
        "emphasis": true,
        "lists": true,
        "html": true,
        "link": true,
        "image": true,
        "color": false,   
        "blockquote": false,
        "fa": true,
      }
    });
 </script>

    @if(Auth::check())
        @include('common.intercom')
    @endif

   @include('common.search')


</body>
</html>
