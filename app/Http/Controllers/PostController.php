<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
   public  function index(){
    $posts = Post::with('users')->get();

    return view('home-page',compact('posts'));

   }

    public function store(PostRequest $request){
        $user = Auth::user();
        $post = new Post;

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = $user->id;
        $post->slug = time();
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/posts/', $filename);
        $post->image = $filename;
        $post->save();

        session()->flash('addedPost', 'Post is added');
        return redirect('/');
    }

    public function edit(Post $post)
    {

        return view('post.update', compact('post'));
    }

    public function show(Post $post)
    {
     
        $selected = Post::where('id',$post['id'])->with('users', 'comments')->first();
  
        return view('post.show', compact( 'selected'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $user = Auth::user();

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = $user->id;
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/posts/', $filename);
        $post->image = $filename;
        $post->save();
        return redirect('/')->with(['user', 'post']);
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }

    public function search(Request $request){
      
     $posts =  Post::where('title','LIKE', '%' . $request->input('search') . '%' )
        ->orWhere('content','LIKE', '%' . $request->input('search') . '%')
        ->get();
        return view('home-page',compact('posts'));
    }
}


