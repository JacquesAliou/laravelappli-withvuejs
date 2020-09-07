<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no"
    />
    <meta name="description" content="@yield('meta-description')"/>
    <meta name="author" content="Jacques-Aliou"/>
    <meta name="theme-color" content="#ffffff"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--Avec @yiel('meta-title') on customize les titres avec une section--}}
    <title>@yield('meta-title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/semantic.min.css')}}">

    {{--Mes propres liens bootstrap/font supplémentaire--}}
    <script src="https://use.fontawesome.com/releases/v5.14.0/js/all.js" data-auto-replace-svg="nest"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{--Le Css supplémentaire--}}
    @yield('css')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="theme">
<div class="pusher">
    <div id="app" class="content">

        @include( 'includes.nav')

        {{-- Le Main --}}
        @yield('content')
    </div>

    {{-- Le semantic Js --}}
    <script src="{{ asset('dist/semantic.min.js') }}"></script>

    {{--Le Js supplémentaire--}}
    @yield('js')

    {{-- Le Footer --}}
    @include('includes.footer')
</div>
</body>
</html>
