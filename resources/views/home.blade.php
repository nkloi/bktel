@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 3</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <script src="{{ mix('js/app.js') }}" defer></script>

<link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
<navbar></navbar>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <sidebar></sidebar>

  <!-- Content Wrapper. Contains page content -->
 <content-wrapper></content-wrapper>

  <!-- Control Sidebar -->
  <control-sidebar></control-sidebar>
  <!-- /.control-sidebar -->


  <!-- Main Footer -->
  <main-footer></main-footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
</body>
</html>

@endsection
