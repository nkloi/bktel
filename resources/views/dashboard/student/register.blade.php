@extends('layouts.dashboard')

@section('content')
<register-component base_url="{{ url('/') }}" user="{{ auth()->user() }}"></register-component>
@endsection