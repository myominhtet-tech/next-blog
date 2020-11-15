<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        $comment = new Comment;
        $comment->content = request()->content;
        $comment->article_id = request()->article_id;
        $comment->save();

        return back()->with('add-com', "Comment Added");
    }
    public function delete($id)
    {
        $comment = Comment::find($id);
        //     if ($comment->user_id == auth()->user()->id) {
        //         $comment->delete();
        //     } else {
        //         return back()->with('error', "This is not your comment");
        //     }

        //     $comment->delete();
        //     return back()->with('del-com', "Comment Deleted");

        //next way for comment delete function

        // if (Gate::allows('comment-delete', $comment)) {
        //     $comment->delete();
        //     return back()->with('del-com', "Comment Deleted");
        // } else {
        //     return back()->with('error', "Unauthorize");
        // }

        //next way for comment delete function 

        if (Gate::denies('comment-delete', $comment)) {
            return back()->with('error', "Unauthorize");
        }

        $comment->delete();
        return back();
    }
}
