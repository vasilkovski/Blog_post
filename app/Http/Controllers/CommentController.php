<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function create_comment(CommentRequest $request, Post $post)
    {
   
        $user = Auth::user()->id;
        Comment::create([
            'comment' => $request->input('comment'),
            'post_id' => $post->id,
            'user_id' => $user,
        ]);
        return redirect('/post/'.$post->slug);
      
       
    }
}
