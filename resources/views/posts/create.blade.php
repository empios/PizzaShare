@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h1>Add new Pizza post!</h1>
            </div>
        </div>
        <form method="post" action="/p" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-8 offset-2">
                    <label for="image" class="col-md-4 col-form-label">Upload your image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-8 offset-2">
                    <label for="title" class="col-md-4 col-form-label">Name your post</label>
                    <input id="title" type="title"
                           class="form-control @error('title') is-invalid @enderror" name="title"
                           value="{{ old('title') }}" required autocomplete="title">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-8 offset-2">
                    <div class="form-group row">
                        <label for="hashtags" class="col-md-4 col-form-label">Post Hashtags</label>
                        <input id="hashtags" type="hashtags"
                               class="form-control @error('hashtags') is-invalid @enderror" name="hashtags"
                               value="{{ old('hashtags') }}" required autocomplete="hashtags">
                        @error('hashtags')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <button class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
    </div>
@endsection
