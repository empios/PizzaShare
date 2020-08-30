@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($posts as $post)
            <div class="row pb-4">
                <div class="col-6">
                    <a href="/p/{{$post -> id}}">
                    <img src="png/{{$post -> image}}" class="w-100">
                    </a>
                </div>
                <div class="col-5">
                    <a href="/profile/{{$post->user->id}}">
                    <h5>{{$post->user->username}}</h5>
                    </a>
                    <h2>{{$post -> title}}</h2>
                    <p>{{$post -> hashtags}}</p>
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
