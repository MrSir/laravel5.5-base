@extends('master')

@section('content')
    @if($service == 'google')
        <div class="title m-b-md">
            Welcome {{ $details->name}} ! <br>
            Your email is : {{$details->email }} <br>
            Your are {{ $details->user['gender'] }}.
        </div>
    @endif
    @if($service == 'github')
        <div class="title m-b-md">
            Welcome {{ $details->user['name'] }} ! <br>
            Your email is : {{$details->user['email'] }} <br>
            Public Repositories : {{$details->user['public_repos']}}<br>
            Followers : {{$details->user['followers']}}
        </div>

    @endif
@endsection