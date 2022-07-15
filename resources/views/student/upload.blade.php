@extends('layouts.dashboard')

@section('content')
  <upload_student-component domain="{{ url('/') }}"></upload_student-component>
@endsection