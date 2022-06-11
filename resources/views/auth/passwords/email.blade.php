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
                        Confirm Account
                    </span>
    
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="email" placeholder="{{ __('Your Email Address') }}"
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
                            SEND
                        </button>
                    </div>
    
                    <div class="text-center p-t-12">
    
                        <a class="txt2"  href="#">
                            {{ __('Resend to email') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
