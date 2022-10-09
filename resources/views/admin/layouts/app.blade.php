<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{env('APP_NAME')}} | Dashboard</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{{asset('admins/css/all.min.css')}}">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{asset('admins/css/tempusdominus-bootstrap-4.min.css')}}">
        <link rel="stylesheet" href="{{asset('admins/css/icheck-bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('admins/css/jqvmap.min.css')}}">
        <link rel="stylesheet" href="{{asset('admins/css/adminlte.min.css')}}">
        <link rel="stylesheet" href="{{asset('admins/css/OverlayScrollbars.min.css')}}">
        <link rel="stylesheet" href="{{asset('admins/css/daterangepicker.css')}}">
        <link rel="stylesheet" href="{{asset('admins/css/summernote-bs4.min.css')}}">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            @include('admin.layouts.nav')

            @include('admin.layouts.sidebar')

            @yield('content')

            @include('admin.layouts.footer')

            <aside class="control-sidebar control-sidebar-dark"></aside>
        </div>

        <script src="{{asset('admins/js/jquery.min.js')}}"></script>
        <script src="{{asset('admins/js/jquery-ui.min.js')}}"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <script src="{{asset('admins/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('admins/js/Chart.min.js')}}"></script>
        <script src="{{asset('admins/js/sparkline.js')}}"></script>
        @if(Route::currentRouteName() == 'admin.dashboard')
        <script src="{{asset('admins/js/jquery.vmap.min.js')}}"></script>
        <script src="{{asset('admins/js/jquery.vmap.usa.js')}}"></script>
        @endif
        <script src="{{asset('admins/js/jquery.knob.min.js')}}"></script>
        <script src="{{asset('admins/js/moment.min.js')}}"></script>
        <script src="{{asset('admins/js/daterangepicker.js')}}"></script>
        <script src="{{asset('admins/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <script src="{{asset('admins/js/summernote-bs4.min.js')}}"></script>
        <script src="{{asset('admins/js/jquery.overlayScrollbars.min.js')}}"></script>
        <script src="{{asset('admins/js/adminlte.js')}}"></script>
        <script src="{{asset('admins/js/demo.js')}}"></script>
        <script src="{{asset('admins/js/dashboard.js')}}"></script>
        <script src="{{asset('admins/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('admins/js/form-validation.js')}}"></script>
    </body>

</html>
