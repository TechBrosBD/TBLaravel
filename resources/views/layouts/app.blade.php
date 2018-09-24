<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TechBros') }} {{ (Auth::check()) ? " - " . Auth::user()->name : "" }}</title> 

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')
</head>

<body>
    <div id="app">
        @include('inc.nav')
        <div class="container">
            @include('inc.msg')    
            @yield('content')
        </div>
        <footer class="footer">
            <div class="container">
                <span class="text-muted">&copy; {{ config('app.name', 'TechBros') }} {{ date('Y') }} All right reserved. | Powered By <a href="http://www.techbros.com.bd">TechBros</a></span> 
            </div>
        </footer>
    </div>
    @yield('script')    
</body>

</html>