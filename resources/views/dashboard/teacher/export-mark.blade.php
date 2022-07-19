@extends('layouts.dashboard')

@section('content')
<teacher_export_mark-component base_url="{{ url('/') }}"  ></teacher_export_mark-component>
@endsection
