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
                <form action="{{route('storeTeachertoSubjects')}}" method="POST" enctype='multipart/form-data' >
                    @csrf
                    <div class="input-group-append">
                            <input type="text" name="teacher_id" class="form-control" id="exampleInputEmail1" placeholder="Fill The Teacher Code">
                    </div>
                    <div class="input-group-append">
                            <input type="text" name="subject_id" class="form-control" id="exampleInputEmail1" placeholder="Fill The Subject Code">
                    </div>
                    <div class="input-group-append">
                        <select name="year" id="exampleInputEmail1"  class="form-control-edit" >
                                <option value="">--Please choose Year--</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                     </div>
                    <div class="input-group-append"  style = "margin-top: 22px " >
                            <select name="semester" id="exampleInputEmail1"  class="form-control-edit">
                                <option value="">--Please choose Semester--</option>
                                <option value="221">221</option>
                                <option value="222">222</option>
                                <option value="223">223</option>
                            </select>
                    </div>
                    <div class="input-group-append" style = "margin-top:22px  ">
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
