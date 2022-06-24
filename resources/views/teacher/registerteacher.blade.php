@extends('layouts.dashboard')

@section('content')
  <register_teacher-component domain="{{ url('/') }}"></register_teacher-component>
@endsection