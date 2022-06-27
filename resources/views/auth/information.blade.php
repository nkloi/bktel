@extends('layouts.auth')

@section('content')

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Student Information Form</h3>

                        <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" name="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="Lastname">Email</label>
                                    </div>


                                    <div class="form-outline">
                                        <input type="text" name="last_name" class="form-control form-control-lg" />
                                        <label class="form-label" for="Lastname">Last Name</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" name="first_name" class="form-control form-control-lg" />
                                        <label class="form-label" for="Firstname">First Name</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">

                                    <div class="form-outline">
                                        <input type="text" name="student_code" class="form-control form-control-lg" />
                                        <label class="form-label" for="Student-code">Student Code</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="text" name="department" class="form-control form-control-lg" />
                                        <label class="form-label" for="Department">Department</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="text" name="faculty" class="form-control form-control-lg" />
                                        <label class="form-label" for="Faculty">Faculty</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="text" name="address" class="form-control form-control-lg" />
                                        <label class="form-label" for="Address">Address</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="text" name="phone" class="form-control form-control-lg" />
                                        <label class="form-label" for="Phone">Phone</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">

                                    <div class="form-outline">
                                        <input type="text" name="note" class="form-control form-control-lg" />
                                        <label class="form-label" for="Note">Note</label>
                                    </div>

                                </div>
                            </div>


                            <div class="row justify-content-center" style="text-align: center;">
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