@extends('layouts.dashboard')

@section('content')
<upload_students-component domain="{{ url('/') }}"></upload_students-component>

@endsection