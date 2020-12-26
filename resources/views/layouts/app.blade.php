<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <title>@yield('title')-{{ config('app.name', 'akonholidaybd') }}</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('public/admin/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('public/admin/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('public/admin/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{asset('public/admin/plugins/morrisjs/morris.css')}}" rel="stylesheet" />

      <link href="{{asset('public/admin/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('public/admin/css/themes/all-themes.css')}}" rel="stylesheet" />

      <!-- toaster-alert -->
   <link rel="stylesheet" href="{{ asset('public/admin/plugins/toaster/toastr.css')}}">
   <link rel="stylesheet" href="{{ asset('public/admin/plugins/bootstrap-sweetalert/dist/sweetalert.css')}}">
    @stack('css')
</head>

<body class="theme-blue">
    @guest
    @else
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
   @include('layouts.admin.topbar')
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
     @include('layouts.admin.sidebar')
        <!-- #END# Left Sidebar -->

    </section>
    @endguest

    <section class="content">
  
     @yield('content')

    </section>

    <!-- Jquery Core Js -->
    <script src="{{asset('public/admin/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('public/admin/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('public/admin/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('public/admin/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('public/admin/plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('public/admin/plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{asset('public/admin/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('public/admin/plugins/morrisjs/morris.j')}}s"></script>

    <!-- ChartJs -->
    <script src="{{asset('public/admin/plugins/chartjs/Chart.bundle.js')}}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{asset('public/admin/plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{asset('public/admin/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('public/admin/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('public/admin/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('public/admin/plugins/flot-charts/jquery.flot.time.js')}}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{asset('public/admin/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>
    
    <!-- Custom Js -->
    <script src="{{asset('public/admin/js/admin.js')}}"></script>


    <!-- Demo Js -->
    <script src="{{asset('public/admin/js/demo.js')}}"></script>
    
<!---alertjs file-->
   <script  src="{{ asset('public/admin/plugins/toaster/toastr.min.js')}}"></script>
    <script  src="{{ asset('public/admin/plugins/bootstrap-sweetalert/dist/sweetalert.min.js')}}"></script>
    @stack('js')
    <script>
     @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
  </script>


    <script type="text/javascript">
           @if($errors->any())
              @foreach($errors->all() as $error)
              toastr.error('{{ $error }}','error',{
               CloseButton:true,
               progressBar:true,
               })                
           
           @endforeach
           @endif
    </script>
</body>

</html>
