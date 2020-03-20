<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //Yes i could make it via repository patern, however for this small app its useless

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = Comment::create([
            'email' => $request->email,
            'name' => $request->name,
            'body' => $request->body,
            'post_id' => $request->post_id
        ]);

        return $comment;
    }

    public function fetch(Post $post)
    {
        return $post->comments()->orderBy('created_at', 'desc')->paginate(6);
    }
}