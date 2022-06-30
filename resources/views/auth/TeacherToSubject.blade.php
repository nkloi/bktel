@extends('layouts.auth')

@section('content')

    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Register New Subject For Teacher</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('importbyhand.subjects')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="name">Teacher Code</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="teacher_code" placeholder="Fill The Teacher Code">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Subject Code</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="number" name="subject_code" placeholder="Fill The Subject Code To Confirm">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Note</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="note" placeholder="Note sent to the Teacher"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn--radius-2 btn--blue-2" type="submit">Confirm Work</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>

@endsection