<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    @yield('title')
    <!-- MOBILE settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- META Information -->
    <meta name="Author" content="Cesar Gpe Silva Jimenez" />
    <!-- <link rel="shortcut icon" href="{{-- asset('favicon.ico') --}}" /> -->
    <link rel="icon" href="favicon.ico">
    <!-- CSS Styles -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    @include('layouts.css')
    @yield('css')
    @include('layouts.scripts_top')
    @yield('scripts_top')
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    
    @include('layouts.header')
    <div class="container theme-showcase" role="main">
        @yield('content')
        @include('layouts.footer')
    </div>

    @include('layouts.scripts')
    @yield('scripts_bottom')
</body>
</html>