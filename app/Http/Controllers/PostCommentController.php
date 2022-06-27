<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Post $post, Comment $comment)
    {
        request()->validate([
            'body' => ['required'],
        ]);

        $comment->user_id = auth()->user()->id;
        $comment->post_id = $post->id;
        $comment->body = request('body');
        $comment->save();

        // Alt
        // $post->comments()->create([
        //     'user_id' => auth()->user()->id,
        //     'body' => request('body'),
        // ]);
        
        return back()->with('success', 'Your comment has been created.');
    }
}
