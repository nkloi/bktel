@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="modal-login row align-items-center">
            <div class="wrap-login100 align-items-center">
                <div class="pb-5" data-tilt>
                    <img src="{{ url('images/img-01.png') }}" alt="IMG">
                </div>
    
                <form class="login100-form validate-form"  action="{{ route('login') }}">
                    <span class="login100-form-title">
                        Reset Password
                    </span>
    
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="pass" placeholder="{{ __('New Password') }}"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="confirmPass" placeholder="{{ __('Confirm New Password') }}"  class="form-control" name="confirmPassword" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
