<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function addComment(Request $request, Post $post){

        $request->validate([
            'body' => 'required|string|max:255',
        ]);


        $comment = Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'body' => $request->body,
        ]);

        return redirect()->route("home");
    }
}
