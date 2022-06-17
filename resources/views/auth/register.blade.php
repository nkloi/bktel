@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="modal-login row align-items-center">
            <div class="wrap-login100 align-items-center">
                <div class="pb-5" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    <span class="login100-form-title">
                        Member Register
                    </span>
                    <div class="wrap-input pb-2">
                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="email" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" required autocomplete="email">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        @error('email')
                        <span class="invalid" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="wrap-input pb-2">
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" name="name" placeholder="{{ __('Username') }}" class="form-control @error('password') is-invalid @enderror" value="{{ old('name') }}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                        @error('name')
                        <span class="invalid" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="wrap-input pb-2">
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" type="password" name="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        @error('password')
                        <span class="invalid" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="wrap-input pb-2">
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" class="form-control" name="confirmPassword" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Sign Up
                        </button>
                    </div>

                    <div class="text-center p-t-50">
                        <a class="txt2" href="{{ route('login') }}">
                            You have an Account?
                        </a>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
