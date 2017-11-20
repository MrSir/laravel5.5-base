@extends('master')

@section('content')
    <h1>{{$site->title}}</h1>
    <div class="row">
        <div class="col-sm-12">
            @include('page.nav')
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('page.elements')
        </div>
    </div>
@endsection