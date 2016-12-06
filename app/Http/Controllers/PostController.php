<?php

namespace App\Http\Controllers;

use App\Post;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {

    public function getDashboard(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        $user = Auth::user();
        $fields = $user->fields();
        return view('dashboard', ['posts' => $posts, 'fields' => $fields, 'user' => $user]);
    }

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

    public function getDeletePost($post_id){
        $post = Post::where('id', $post_id)->first();
        if (Auth::user() != $post->user){
            return redirect()->back();
        }
        $post->delete();
        return redirect() -> route('dashboard') -> with(['message' => 'Successfully deleted.']);
    }

    public function postEditPost(Request $request){
        $this->validate($request, [
            'body' => 'required'
        ]);
        $post = Post::find($request['postId']);
        if (Auth::user() != $post->user){
            return redirect()->back();
        }
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body' => $post->body], 200);
    }

    public function postLikePost(Request $request){
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post){
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if($like){
            $already_like = $like->like;
            $update = true;
            if($already_like == $is_like){
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if($update){
            $like -> update();
        } else {
            $like -> save();
        }
        return null;
    }
}