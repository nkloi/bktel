@extends('layouts.dashboard')

@section('content')
<import_subjects-component domain="{{ url('/') }}"></import_subjects-component>

@endsection