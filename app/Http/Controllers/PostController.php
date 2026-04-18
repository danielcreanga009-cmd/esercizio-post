<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function showPosts(){
        $posts = Post::where('user_id', auth()->id())->get();
        $user = User::find(auth()->id());
        return view('posts',['posts'=>$posts], ['user'=>$user]);
    }

    public function createForm(){
        return view('createPost');
    }

    public function createPost(Request $request){
        $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        ]);

        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return redirect()->route('showPosts');
    }

    public function editForm(Post $post){
        return view('editPost', ['post'=>$post]);
    }

    public function editPost(Post $post, Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('showPosts');
    }

    public function deletePost(Post $post){
        $post->delete();
        return redirect()->route('showPosts');
    }
}
