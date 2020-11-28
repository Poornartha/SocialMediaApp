<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {

        $posts = Post::orderBy('created_at', 'desc')->with('user', 'likes')->paginate(5);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'body' => 'required',
        ]);
        
        
        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();

    }

    public function destroy(Post $post, Request $request) {
        if(true){
            if ($post->user->id === $request->user()->id) {
                $post->delete();
                return back();
            }
        } else {
            return response(null, 409);
        }
    }

}
