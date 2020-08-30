@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
        <img src="{{$user -> profile -> profileImage()}}" class="rounded-circle w-100">
        </div>
        @php
            $val = ($follow) ? 'true' : 'false';
        @endphp
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between pb-4">
                <h1>{{$user  -> username}}</h1>
                <div id="followbutton" follow-status="{{$val}}" user-id="{{$user->id}}">
                </div>
                @can('update', $user->profile)
                <a class="btn btn-danger h-25 w-25" href="/p/create">Add post</a>
                @endcan
                @can('update', $user->profile)
                <a class="btn btn-primary h-25 w-25" href="/profile/{{$user -> id}}/edit">Edit profile</a>
                @endcan
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{$postCount}}</strong> posts</div>
                <div class="pr-5"><strong>{{$followCount}}</strong> followers</div>
                <div class="pr-5"><strong>{{$followingCount}}</strong> following</div>
            </div>
            <div class="pt-3"><h5>{{$user -> name}}</h5></div>
            <div>{{$user -> profile -> description}}</div>
        </div>
    </div>
    <div class="row pt-2">
       @foreach($user -> posts as $post)
           <div class="col-4 pb-4">
               <a href="/p/{{$post -> id}}">
                   <img src="/png/{{$post -> image}}" class="w-100">
               </a>
           </div>
        @endforeach
    </div>
</div>
@endsection
