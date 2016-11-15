<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
    public function postCreatePost(Request $request){
        //validation
        $this->validate($request, [
            'body' => 'required|max:200'
        ]);
        $post = new Post();
        $post->body = $request['body'];

        $message = 'There was an error.';

        if($request->user()->posts()->save($post)){
            $message = 'Post created.';
        }
        return redirect()->route('dashboard')->with(['message' => $message]);
    }
}