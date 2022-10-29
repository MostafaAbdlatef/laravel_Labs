<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class commentsController extends Controller
{
    public function index () {
        $allComments = Comment::all();
        // dd($allComments);
        return view('posts.show', [
            'comments' => $allComments
          ]);
    }
    public function store($postId) {
        $data = request()->all();
        // dd($data);
        // $post->comment->create
       $post = Post::find($postId);
    //    dd($post->comments);
       $post->comments()
        ->create([
            'content' => $data['comment'],
        ]);
        // dd($data);
       return redirect()->route('posts.show',$postId);
    }
}
