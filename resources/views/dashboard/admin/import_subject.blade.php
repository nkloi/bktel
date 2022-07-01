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
                <h3 >Import Subjects into MySQL using PHP</h3>
        </div>

        </head>

        <body>

            <div class="col-md-6" style = "margin: 0 auto ">
                <form action="{{route('import.subject')}}" method="POST" enctype='multipart/form-data' >
                    @csrf
                    <div class="input-group-append">
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput" name="file">
                            <label class="custom-file-label" for="customFileInput">Selected file</label>
                        </div>
                            <div class="input-group-append">
                            <button type="submit" class="btn btn-primary" name="import">Import</button>
                        </div>
                </div>
                </form>
            </div>

        </body>

    </html>

 @endsection
