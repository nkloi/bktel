@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                
            </div>

            <form class="login100-form validate-form"  action="{{ route('login') }}">
                <span class="login100-form-title">
                    Reset Password
                </span>

                
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: abc@xyz.com">
                    <input class="input100" type="text" name="email" placeholder="{{ __('Email') }}"
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
                        Send Reset Password Link
                    </button>
                </div>

                <div class="text-center p-t-12">

                    
                </div>

                <div class="text-center p-t-136">
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
