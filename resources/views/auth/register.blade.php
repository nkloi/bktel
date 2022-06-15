@extends('layouts.auth')

@section('content')
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

    <p>By creating an account you agree to our <a href="">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="\information">Sign in</a>.</p>
  </div>
</form>
@endsection