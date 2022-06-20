@extends('layouts.auth')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{ asset('images/img-01.png'); }}" alt="IMG">
            </div>

            <form class="login100-form validate-form" action="{{ route('password.email') }}" method="POST">
                @csrf
                <span class="login100-form-title">
                    {{ __('Reset Password') }}
                </span>

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" required autocomplete="email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert" style="display:block;">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Send
                    </button>
                </div>

                <div class="text-center p-t-12">

                    <a class="txt2" href="{{ route('home') }}">
                        {{ __('Back To Home Page') }}
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="{{ route('register') }}">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection