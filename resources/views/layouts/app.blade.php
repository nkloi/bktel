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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">


        <main class="py">
            @yield('content')
        </main>
    </div>
</body>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('/js/adminlte.js') }}"></script>

    <!-- Bootstrap 4 -->
    <!-- jQuery -->
    <script src="  {{ asset('/js/jquery.min.js') }} "></script>

    <script src=" {{ asset('/js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('/js/Chart.min.js') }} "></script>

</html>