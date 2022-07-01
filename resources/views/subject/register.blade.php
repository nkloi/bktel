@extends('layouts.dashboard')

@section('content')
<form_import_subjects-component domain="{{ url('/') }}"></form_import_subjects-component>

@endsection
