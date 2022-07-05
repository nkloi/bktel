@extends('layouts.dashboard')

@section('content')
  <register_subject-component domain="{{ url('/') }}"></register_subject-component>
@endsection