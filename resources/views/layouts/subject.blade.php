@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper">
<form action="{{ route ('add_subs')}}" method="post">
    @csrf
<subject></subject>
</form>
</div>
@endsection