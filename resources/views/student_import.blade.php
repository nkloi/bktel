@extends('layouts.app')

@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Student</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>
<!-- input file-->
<div class="card shadow mb-4">
    <form method="POST" action="{{route('student.upload')}}" enctype="multipart/form-data">
    
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                    <span style="color:red;">*</span>Reminder name</label>
                    <input placeholder="Enter name" type="text" required class="form-control form-control-user @error('name') is-invalid @enderror" name="name">
                    <span></span>Note</label>
                    <input placeholder="Note (optional)" type="text" class="form-control form-control-user @error('note') is-invalid @enderror" id="exampleFile" name="note">
                    <!-- @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror -->
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                    <span style="color:red;">*</span>File Input (.CSV)</label>
                    <input type="file" required class="form-control form-control-user @error('file') is-invalid @enderror" id="exampleFile" name="file">
                    <!-- @error('file')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror -->
                </div>
            </div>
        </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-user mb-3">Import</button>
            <a class="btn btn-success btn-user mb-3" href="/admin">Cancel</a>
        </div>
    </form>
</div>
</div>
<!-- end input file -->
@endsection