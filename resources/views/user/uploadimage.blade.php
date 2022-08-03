@extends('layouts.dashboard')

@section('content')
<div class="container" style="margin-left: 20%  ;">
    <div class="row">
        <div class="col-md-10 col-md-offset-4">
            <div class="page-header">
                <upload_user_avartar-component 
                        domain="{{ url('/') }}" 
                        :user="{{ json_encode($user) }}" 
                        :path="{{ json_encode($path) }}"
                        :profile_image_url="{{ json_encode($profile_image_url) }}">
                </upload_user_avartar-component>
            </div>            
        </div>
    </div>
</div>
@endsection