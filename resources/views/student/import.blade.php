@extends('layouts.dashboard')

@section('content')
  <import_student-component domain="{{ url('/') }}"></import_student-component>
@endsection