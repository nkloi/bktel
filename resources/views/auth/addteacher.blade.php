@extends('layouts.auth')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>


                        <a href="{{ route('logout') }}"onclick="event.preventDefault();
								document.getElementById('logout-form').submit();" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Logout User</p>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="display:none;">
                                @csrf
                            </form>
						</a>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Information Teacher</h3>
                                <div class="row register-form">
                                    <form method="POST" action="{{ route('teacher.store') }}">
                                        @csrf
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="first_name"  name="first_name" require />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="last_name" value="" name="last_name" require />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="teacher_code" value="" name="teacher_code" require/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="department" value="" name="department" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="faculty" value=""  name="faculty"/>
                                        </div>

                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline">
                                                    <input type="radio" name="gender" value="male" checked>
                                                    <span> Male </span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="gender" value="female">
                                                    <span>Female </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="address" value="" name="address" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="phone" value="" name="phone"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="note" value="" name="note"/>
                                        </div>
                                        <button type="submit" class="btnRegister">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">


                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
</div>


 @endsection
