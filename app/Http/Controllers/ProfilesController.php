<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(\App\User $user)
    {
        $follow = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        $postCount = Cache::remember('count.posts.' . $user->id, now()->addSeconds(30), function () use ($user) {
            return $user->posts->count();
        });
        $followCount = Cache::remember('count.posts.' . $user->id, now()->addSeconds(30), function () use ($user) {
            return $user->profile->followers->count();
        });
        $followingCount = Cache::remember('count.posts.' . $user->id, now()->addSeconds(30), function () use ($user) {
            return $user->following->count();
        });

        return view('profiles.index', compact('user', 'follow', 'postCount', 'followCount', 'followingCount'));
    }

    public function edit(\App\User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user->profile);
        $data = $request->validate([
            'description' => 'required',
            'image' => ''
        ]);


        if ($request['image']) {
            $imagePath = $request['image']->store('png', 'public');
            $image = Image::make(public_path("png/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $imageArr = ['image' => $imagePath];

        }


        auth()->user()->profile->update(array_merge(
            $data,
            $imageArr ?? []
        ));
        return redirect("/profile/{$user->id}");
    }
}
