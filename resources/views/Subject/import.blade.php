@extends('layouts.dashboard')

@section('content')
  <import_subject-component domain="{{ url('/') }}"></import_subject-component>
@endsection