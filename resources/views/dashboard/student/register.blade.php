@extends('layouts.dashboard')

@section('content')

<register_student-component base_url="{{ url('/') }}"  ></register_student-component>
@endsection
