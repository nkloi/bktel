@extends('layouts.student')

@section('content')
<register-component base_url="{{ url('/') }}" student_id="{{ $student_id }}"></register-component>
@endsection