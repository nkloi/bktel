@extends('layouts.auth')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" action="{{ route('register') }}" method="POST">
                @csrf
                <span class="login100-form-title">
                    Register
                </span>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autocomplete="name">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="email" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" required autocomplete="email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert" style="display:block">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="password" placeholder="{{ __('Password') }}" name="password" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert" style="display:block">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert" style="display:block">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        {{ __('Register') }}
                    </button>
                </div>

                <div class="text-center p-t-12">

                    <a class="txt2" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="{{ route('login') }}">
                        Back To Login Page
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection