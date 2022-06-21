@extends('layouts.auth')

@section('content')
<<<<<<< HEAD
<form action= "{{route('register')}}" method="POST">
    @csrf

  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="name"><b>name</b></label>
    <input type="text" placeholder="Enter name" name="name" required>
    @error('name')
        <span>{{ $message }}</span>
    @enderror

    <label for="email"><b>email</b></label>
    <input type="text" placeholder="email" name="email" required>
    @error('email')
        <span>{{ $message }}</span>
    @enderror

   
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    @error('password')
        <span>{{ $message }}</span>
    @enderror

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password_confirmation" required>
    <hr>

    <p>By creating an account you agree to our Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="\information">Sign in</a>.</p>
  </div>
</form>
=======
<div class="limiter">
    <div class="container-login100">
        <div class="modal-login row align-items-center">
            <div class="wrap-login100 align-items-center">
                <div class="pb-5" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                </div>
    
                <form class="login100-form validate-form"  action="{{ route('login') }}">
                    <span class="login100-form-title">
                        Member Register
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
    
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="username" placeholder="{{ __('Username') }}"
                         required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
    
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="pass" placeholder="{{ __('Password') }}"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
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
                        <input class="input100" type="password" name="confirmPass" placeholder="{{ __('Confirm Password') }}"  class="form-control" name="confirmPassword" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
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
                </form>
            </div>
        </div>
    </div>
</div>

>>>>>>> 717e233633566efdb66007b8324b0cb42cdf1123
@endsection