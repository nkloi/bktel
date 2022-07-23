<?php

use App\Models\Roles;
use Illuminate\Support\Facades\DB;

    $user = auth() -> user();
    $role_id = $user -> role_id ;
    $role_name = DB::table('users') ->join('roles', 'roles.id', '=', 'users.role_id' )
                                    ->where('users.id', $user -> id) 
                                    ->select('roles.name as role_name') 
                                    ->value('roles.name');                                                                                      
    $profile_image_url = $user -> profile_image_url;
    $name= substr( $profile_image_url , 12 , 100 );
    $path= '\storage\\' . $name;
    
?>

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
       
        <header-component base_url="{{ url('/') }}" ></header-component>
            @yield('content')
            <sidebar-component  base_url="{{ url('/') }}" 
                                role_id="{{ auth()->user() -> role_id }}" 
                                :profile_image_url="{{ json_encode($profile_image_url) }}"
                                :user="{{ json_encode($user) }}"
                                :path="{{ json_encode($path) }}"
                                :role_name="{{ json_encode($role_name) }}"
                                > 
            </sidebar-component>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('/js/adminlte.js') }}"></script>
 

    <!-- Bootstrap 4 -->
    <!-- jQuery -->
    <script src="  {{ asset('/js/jquery.min.js') }} "></script>

    <script src=" {{ asset('/js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('/js/Chart.min.js') }} "></script>

</body>

</html>
