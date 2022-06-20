@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="modal-login row align-items-center">
            <div class="wrap-login100 align-items-center">
                <div class="pb-5" data-tilt>
                    <img src="{{ url('images/img-01.png') }}" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <span class="login100-form-title">
                        Confirm Account
                    </span>

                    <div class="wrap-input pb-2">
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" name="email" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" required autocomplete="email">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            SEND
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection