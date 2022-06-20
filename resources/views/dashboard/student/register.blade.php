@extends('layouts.dashboard')

@section('content')
<register-component base_url="{{ url('/') }}" student_id="{{ $student_id }}" user="{{ auth()->user() }}"></register-component>
@endsection