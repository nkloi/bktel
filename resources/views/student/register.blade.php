@extends('layouts.dashboard')

@section('content')
<register_students-component domain="{{ url('/') }}"></register_students-component>

@endsection
