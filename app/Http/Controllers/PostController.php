<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::all()->toArray();

        return view('admin.pages.post', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'min:5', 'max:100'],
            'description' => ['required', 'min:5', 'max:300'],
            'category_id' => ['required'],
            'image' => ['image', 'nullable', 'max:2999'],
        ]);

        $pathAvatar = null;

        if( $request->hasFile('image')){
            $pathAvatar = $request->file('image')->store('images');
        } else {
            $pathAvatar = 'https://smart.mag-river.ru/uploads/goods/img/445-360/fit/no-image.png';
        }

        $validated['image'] = $pathAvatar;

        if (!array_key_exists('user_id', $validated)){
            $validated['user_id'] = '1';
        }

        $user = Post::query()->create(array_merge($validated));

        session()->flash('message', 'Post  add');

        return redirect()->route('add-post.index' );
    }

    public function all()
    {
        $posts = Post::all();

        return view('admin.pages.all-posts', compact('posts'));
    }

    public function update($id)
    {
        $post = Post::query()->find($id);

        return view('admin.pages.update-post', compact('post'));
    }
}
