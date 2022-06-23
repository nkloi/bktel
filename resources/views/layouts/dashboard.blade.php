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

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
        <div id="app">
        <div class="wrapper">
        <header-component></header-component>
            @yield('content')
        <sidebar-component></sidebar-component>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('/js/adminlte.js') }}"></script>
    </script>
    <!-- Bootstrap 4 -->



    <!-- jQuery -->
</body>

</html>
