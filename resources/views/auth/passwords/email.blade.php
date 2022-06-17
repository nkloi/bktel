@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <form class="reset100-form p-b-t-100">
                <span class="reset-form-title">
                    Reset Password 
                </span>

                <div class="wrap-input-reset validate-input" data-validate = "Valid email is required: ex@abc.xyz">
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

                <div class="wrap-input-reset validate-input" data-validate = "Password is required">
                    <input class="input100" type="text" name="pass" placeholder="{{ __('Username') }}"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    </span>

                </div>

                <div class="container-reset-form-btn">
                    <button class="reset-form-btn">
                        Send Verify Code To Email
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

