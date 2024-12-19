<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $user = null;

        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        $mostViewedPosts = Post::orderBy('views', 'desc')->get()->toArray();
        $mostViewedPosts = array_slice($mostViewedPosts, 0, 3);

        $categories = Category::all();

        if (Auth::check()){

            $user = Auth::user();

        }

        return view('pages.main', compact('user', 'posts', 'mostViewedPosts', 'categories'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        $post->views = $post->views + 1;
        $post->save();

        $user = Auth::user();

        $mostViewedPosts = Post::orderBy('views', 'desc')->get()->toArray();
        $mostViewedPosts = array_slice($mostViewedPosts, 0, 3);

        $categories = Category::all();

        $comments = Comment::query()->where('post_id', $id)->orderBy('created_at', 'desc')->get();

        return view('pages.post', compact('post',  'comments', 'user', 'mostViewedPosts', 'categories'));
    }

    public function showCategoryPosts(Request $request, $category)
    {

        $posts = Post::query()->where('category_id', $request->id)->paginate(5);

        $mostViewedPosts = Post::orderBy('views', 'desc')->get()->toArray();
        $mostViewedPosts = array_slice($mostViewedPosts, 0, 3);

        $categories = Category::all();

        $user = null;
        if (Auth::check()){

            $user = Auth::user();

        }

        return view('pages.main', compact('user', 'posts', 'mostViewedPosts', 'categories', 'category'));

    }

    public function showAbout()
    {
        $user = null;
        if (Auth::check()){

            $user = Auth::user();

        }


        return view('pages.about', compact('user'));
    }

}
