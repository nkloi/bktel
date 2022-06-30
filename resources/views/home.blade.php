@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
								document.getElementById('logout-form').submit();" class="nav-link">
                        Logout
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="display:none;">
                            @csrf
                        </form>
                    </a>
            </div>
        </div>
    </div>
</div>
@endsection
