<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 3</title>

  <!-- Google Font: Source Sans Pro -->

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper" id="app">
    <header-component></header-component>
    
   
    
    <sidebar-component domain="{{ url('/') }}"></sidebar-component>
    
    @yield('content')
    <footer-component></footer-component>
   
     </div>

    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/adminlte.js') }}"></script>

    <!-- Bootstrap 4 -->
    <!-- jQuery -->
    <script src="  {{ asset('/js/jquery.min.js') }} "></script>

    <script src=" {{ asset('/js/bootstrap.bundle.min.js') }} "></script>


</body>
</html>