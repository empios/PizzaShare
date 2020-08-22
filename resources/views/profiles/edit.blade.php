@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <h1>Add new Pizza post!</h1>
        </div>
    </div>
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <div class="col-8 offset-2">
                <label for="image" class="col-md-4 col-form-label">Change your Avatar</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @error('image')
                <strong>{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-8 offset-2">
                <label for="description" class="col-md-4 col-form-label">Change your description</label>
                <input id="description" type="description"
                       class="form-control @error('description') is-invalid @enderror" name="description"
                       value="{{ old('description') ?? $user -> profile -> description }}" required autocomplete="description">
                @error('description')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-8 offset-2">
            <div class="form-group row">
                <button class="btn btn-primary">Edit</button>
            </div>
        </div>


    </form>
</div>
@endsection
