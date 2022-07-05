@extends('layouts.dashboard')

@section('content')
  <register_lectures-component domain="{{ url('/') }}"></register_lectures-component>
@endsection
