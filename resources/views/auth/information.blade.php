@extends('layouts.auth')

@section('content')

<section class="vh-100 gradient-custom ctn-infor">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="login100-form-title  ">Student Information Form</h3>

                        <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" name="email" placeholder="Email" class="form-control form-control-lg" />
                                        <!-- <label class="form-label" for="Lastname">Email</label> -->
                                    </div>


                                    <div class="form-outline p-t-16">
                                        <input type="text" name="last_name" placeholder="Last name" class="form-control form-control-lg" />
                                        <!-- <label class="form-label" for="Lastname">Last Name</label> -->
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" name="first_name" placeholder="First name" class="form-control form-control-lg" />
                                        <!-- <label class="form-label" for="Firstname">First Name</label> -->
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">

                                    <div class="form-outline">
                                        <input type="text" name="student_code" placeholder="Student code" class="form-control form-control-lg" />
                                        <!-- <label class="form-label" for="Student-code">Student Code</label> -->
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2 p-t-16">

                                    <div class="form-outline">
                                        <input type="text" name="department" placeholder="Department" class="form-control form-control-lg" />
                                        <!-- <label class="form-label" for="Department">Department</label> -->
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4 pb-2 p-t-16">

                                    <div class="form-outline">
                                        <input type="text" name="faculty" placeholder="Faculty" class="form-control form-control-lg" />
                                        <!-- <label class="form-label" for="Faculty">Faculty</label> -->
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="text" name="address" placeholder="Address" class="form-control form-control-lg" />
                                        <!-- <label class="form-label" for="Address">Address</label> -->
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="text" name="phone" placeholder="Phone" class="form-control form-control-lg" />
                                        <!-- <label class="form-label" for="Phone">Phone</label> -->
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">

                                    <div class="form-outline">
                                        <input type="text" name="note" placeholder="Note" class="form-control form-control-lg" />
                                        <!-- <label class="form-label" for="Note">Note</label> -->
                                    </div>

                                </div>
                            </div>


                            <div class="row justify-content-center p-t-16" style="text-align: center;">
                                <button class="login100-form-btn">
                                    Register
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection