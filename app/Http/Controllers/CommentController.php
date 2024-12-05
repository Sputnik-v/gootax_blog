<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function all()
    {
        $comments = Comment::all();

        return view('admin.pages.comment', compact('comments'));
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        session()->flash('message', 'Comment with Id: ' . $comment->id . ' - delete');

        return redirect()->route('all-comments.all');
    }
}
