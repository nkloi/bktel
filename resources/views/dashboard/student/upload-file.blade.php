@extends('layouts.dashboard')


@section('content')
<student_upload_file-component base_url="{{ url('/') }}"  ></student_upload_file-component>
@endsection
