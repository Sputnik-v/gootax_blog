<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $posts = Post::paginate(7);

        return view('admin.pages.all-posts', compact('posts'));
    }

    public function update($id)
    {
        $post = Post::query()->find($id);

        return view('admin.pages.update-post', compact('post'));
    }

    public function updatePost($id, Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'min:5', 'max:100'],
            'description' => ['required', 'min:5', 'max:300'],
            'image' => ['image', 'nullable', 'max:2999'],
        ]);

        $pathAvatar = null;

        if( $request->hasFile('image')){
            $pathDataBaseImages = Post::query()->find($id)->toArray()['image'];

            Storage::delete($pathDataBaseImages);

            $pathAvatar = $request->file('image')->store('images');
        }

        $post = Post::query()->find($id);

        $post->title = $validated['title'];
        $post->description = $validated['description'];
        if ($pathAvatar) $post->image = $pathAvatar;
        $post->save();

        session()->flash('message', 'Post with Id: ' . $post['id'] . ' - update');

        return redirect()->route('all-posts.all' );

    }

    public function storeLike(Request $request, $id)
    {

        $post = Post::query()->find($id);

        $post->like = $post->like + 1;
        $post->save();

        return redirect()->route('posts.show', ['id' => $post->id]);
    }

    public function storeNotLike($id)
    {

        $post = Post::query()->find($id);

        $post->not_like = $post->not_like + 1;
        $post->save();

        return redirect()->route('posts.show', ['id' => $post->id]);
    }

}
