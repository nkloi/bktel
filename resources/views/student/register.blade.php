@extends('layouts.dashboard')

@section('content')
  <register_student-component domain="{{ url('/') }}"></register_student-component>
@endsection
