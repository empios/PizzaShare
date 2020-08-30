<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function _construct(){
        $this->middleware('auth');
    }


    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
        return view('posts.index', compact('posts'));
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

        $imagePath = $request['image']->store('png', 'public');
        $image = Image::make(public_path("png/{$imagePath}"))->fit(1200, 1200);
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
