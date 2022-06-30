@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt m-t-80" data-tilt>
                <img src="images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" action="{{ route('register') }}" method="POST">
                @csrf
                <span class="login100-form-title">
                    Register Account
                </span>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="name" placeholder="{{ __('Username') }}">
                    <span class="focus-input100"></span>

                    <span class="symbol-input100">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="{{ __('Email') }}"
                        value="{{ old('email') }}" required autocomplete="email">
                    <span class="focus-input100"></span>

                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="{{ __('Password') }}"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" placeholder="{{ __('Comfirm Password') }}" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Register
                    </button>
                </div>

                <div class="text-center p-t-80">
                    <a class="txt2" href="{{ route('login') }}">
                        Back to Login
                        <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection