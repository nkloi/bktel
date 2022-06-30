@extends('layouts.student')

@section('content')
<h1>sadaaaaaaaaaaaaaaasd</h1>

<a href="{{ route('logout') }}" onclick="event.preventDefault(); 
								document.getElementById('logout-form').submit();" class="nav-link">
                        Logout
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="display:none;">
                            @csrf
                        </form>
                    </a>
@endsection