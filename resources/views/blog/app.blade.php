<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('material') }}/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        {{ ('Virtu Expo') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('material') }}/css/material-kit.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" />
    <link href="{{ asset('material') }}/demo/vertical-nav.css" rel="stylesheet" />
</head>

<body class="sidebar-collapse {{ $class }}">
    @include('blog.layouts.navs.nav')
    @include('blog.layouts.header')

    <div class="main main-raised">
        @include('blog.layouts.navs.nav_categories')
        @yield('content')
    </div>

    @include('blog.layouts.footer')

    <!--   Core JS Files   -->
    <script src="{{ asset('material') }}/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('material') }}/js/core/popper.min.js" type="text/javascript"></script>
    <script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="{{ asset('material') }}/js/plugins/moment.min.js"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="{{ asset('material') }}/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('material') }}/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="{{ asset('material') }}/js/plugins/bootstrap-tagsinput.js"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="{{ asset('material') }}/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
    <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{ asset('material') }}/js/plugins/jasny-bootstrap.min.js" type="text/javascript"></script>
    <!--	Plugin for Small Gallery in Product Page -->
    <script src="{{ asset('material') }}/js/plugins/jquery.flexisel.js" type="text/javascript"></script>
    <!-- Plugins for presentation and navigation  -->
    <script src="{{ asset('material') }}/demo/modernizr.js" type="text/javascript"></script>
    <script src="{{ asset('material') }}/demo/vertical-nav.js" type="text/javascript"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Js With initialisations For Demo Purpose, Don't Include it in Your Project -->
    <script src="{{ asset('material') }}/demo/demo.js" type="text/javascript"></script>
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('material') }}/js/material-kit.js" type="text/javascript"></script>
    @stack('js')

</body>

</html>
