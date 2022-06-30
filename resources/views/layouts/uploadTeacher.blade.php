@extends('layouts.dashboard')

@section('content')

<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Import Teachers</h6>
        </div>
        <form id="avatar" name="avatar" method="POST" action="{{route('import.teachers')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">

                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Fill Your Username</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('file') is-invalid @enderror" 
                            name="username" 
                        >
                    </div>
                    
                    <div class="col-md-12 mb-3 mt-3">
                        <p>Please Upload CSV in Given Format <a href="{{ asset('files/sample-data-sheet.csv') }}" target="_blank">Sample CSV Format</a></p>
                    </div>
                    {{-- File Input --}}
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>File Input (CSV)</label>
                        <input 
                            type="file" 
                            class="form-control form-control-user @error('file') is-invalid @enderror" 
                            id="file"
                            name="teachers_file" 
                        >

                        @error('file')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Upload Users</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('home') }}">Cancel</a>
            </div>
        </form>
    </div>

@endsection