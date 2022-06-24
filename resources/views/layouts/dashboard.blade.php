<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header-component></header-component>
        <sidebar-component domain="{{ url('/') }}" role_id="{{ auth()->user()->role_id }}"></sidebar-component>
        <main class="">
            @yield('content')
        </main>
        <footer-component></footer-component>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('js/adminlte.js') }}"></script>
</body>
</html>