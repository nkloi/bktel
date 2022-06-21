@extends('layouts.app')
@section('content')
<h1>bạn là user đã có thông tin  </h1>
<a href="{{ route('logout') }}"onclick="event.preventDefault();
								document.getElementById('logout-form').submit();" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Logout User</p>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="display:none;">
                                @csrf
                            </form>
						</a>

                        @endsection
