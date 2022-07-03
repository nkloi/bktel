@extends('layouts.dashboard')

@section('content')
    <!doctype html>
        <html lang="en">

        <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <div class="col-md-6" style = "margin: 0 auto ">
                <h3 >Register Subjects for Teacher </h3>
        </div>

        </head>

        <body>

            <div class="col-md-6" style = "margin: 0 auto ">
                <form action="{{route('TeachertoSubjects')}}" method="POST" enctype='multipart/form-data' >
                    @csrf
                    <div class="input-group-append">
                            <input type="text" name="teacher_id" class="form-control" id="exampleInputEmail1" placeholder="Fill The Teacher Code">
                    </div>
                    <div class="input-group-append">
                            <input type="text" name="subject_id" class="form-control" id="exampleInputEmail1" placeholder="Fill The Subject Code">
                    </div>
                    <div class="input-group-append">
                            <input type="text" name="year" class="form-control" id="exampleInputEmail1" placeholder="Year">
                    </div>
                    <div class="input-group-append">
                            <input type="text" name="semester" class="form-control" id="exampleInputEmail1" placeholder="Semester">
                    </div>
                    <div class="input-group-append">
                            <input type="text" name="note" class="form-control" id="exampleInputEmail1" placeholder="Note">
                    </div>
                    <div class="col-md-6"  style = "margin: 0 87.5%" >
                          <button type="submit" class="btn btn-primary" name="import">Submit </button>
                    </div>
                </form>
            </div>

        </body>

    </html>

 @endsection
