@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="/png/{{$post -> image}}" class="w-100">
            </div>
            <div class="col-4">
                <h5>{{$post->user->username}}</h5>
                <h2>{{$post -> title}}</h2>
                <p>{{$post -> hashtags}}</p>
            </div>
        </div>

    </div>
@endsection
