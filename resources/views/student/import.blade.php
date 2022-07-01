@extends('layouts.dashboard')

@section('content')
<import_students-component domain="{{ url('/') }}"></import_students-component>

@endsection