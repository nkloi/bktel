@extends('layouts.auth')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{ url('images/img-01.png') }}" alt="IMG">
            </div>

            <form class="login100-form validate-form"  action="{{ route('login') }}">
                <span class="login100-form-title">
                    Reset Password
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="{{ __('Email Address') }}"
                        value="{{ old('email') }}" required autocomplete="email">
                    <span class="focus-input100"></span>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Send Password Reset Link
                    </button>
                </div>

                

                
            </form>
        </div>
    </div>
</div>

@endsection

