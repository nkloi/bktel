@extends('layouts.dashboard')

@section('content')
  <export_mark-component domain="{{ url('/') }}"></export_mark-component>
@endsection