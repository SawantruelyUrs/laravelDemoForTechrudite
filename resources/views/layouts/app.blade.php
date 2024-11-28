<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

   
    <!-- Custom CSS -->
    <link href="{{asset('assets/admin/assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/assetslibs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/assetsextra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{asset('assets/admin/dist/css/style.min.css')}}" rel="stylesheet">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet"> -->
</head>
<body>
   
       
        <main >
            @yield('content')
        </main>
    

    <script src="{{asset('assets/admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{asset('assets/admin/dist/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('assets/admin/dist/js/feather.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('assets/admin/dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
    <script src="{{asset('assets/admin/assets/extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('assets/admin/dist/js/pages/dashboards/dashboard1.min.js')}}"></script>
</body>
</html>
