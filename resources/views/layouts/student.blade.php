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
            <sidebar-component url="{{ route('student.register') }}" base_url="{{ url('/') }}"></sidebar-component>
            @yield('content')
            <footer-component></footer-component>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src=" {{ asset('js/jquery.min.js') }}">
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('/js/toastr.min.js') }}"></script>
    <!-- jQuery -->
</body>

</html>