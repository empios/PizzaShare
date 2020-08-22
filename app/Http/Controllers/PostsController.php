<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function _construct(){
        $this->middleware('auth');
    }
    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $data = $request -> validate([
           'hashtags' => 'required',
            'image' => ['required', 'image'],
            'title' => 'required'
        ]);

        $imagePath = $request['image']->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'hashtags' => $data['hashtags'],
            'image' => $imagePath,
            'title' => $data['title']
        ]);

        return redirect('/profile/'.auth()->user()->id);
    }

    public function show(\App\Post $post){
        return view('posts.show', compact('post'));
    }
}
