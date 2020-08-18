@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://www.w3schools.com/howto/img_avatar.png" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div>
                <h1>{{$user -> username}}</h1>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>2</strong> posts</div>
                <div class="pr-5"><strong>23</strong> followers</div>
                <div class="pr-5"><strong>128</strong> following</div>
            </div>
            <div class="pt-3"><h5>{{$user -> name}}</h5></div>
            <div><p>Witaj na moim profilu!<img src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/160/apple/237/grinning-face-with-smiling-eyes_1f601.png" style="max-height: 20px"></p></div>
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-4">
            <img src="https://images.pexels.com/photos/2047905/pexels-photo-2047905.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="h-75 w-100">
        </div>
        <div class="col-4">
            <img src="https://images.pexels.com/photos/2047905/pexels-photo-2047905.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="h-75 w-100">
        </div>
        <div class="col-4">
            <img src="https://images.pexels.com/photos/2047905/pexels-photo-2047905.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="h-75 w-100">
        </div>
    </div>
</div>
@endsection
