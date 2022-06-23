@extends('layouts.dashboard')

@section('content')

<register_student-component base_url="{{ url('/') }}" role_id="{{ auth()->user() -> role_id }}"></register_student-component>
@endsection
