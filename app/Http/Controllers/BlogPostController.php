<?php
/**
 * Created by PhpStorm.
 * User: kcancelik
 * Date: 12/18/16
 * Time: 3:28 PM
 */

namespace App\Http\Controllers;

use App\BlogPost;
use App\User;
use App\Field;
use App\Post;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller {
    public function getBlog() {
        $blogPosts = BlogPost::orderBy('created_at', 'desc')->get();
        return view('blog', ['blogposts' => $blogPosts]);
    }

    public function postNewBlogPost(Request $request){
        $bpost = new BlogPost();
        $bpost->body = $request['body'];

        $message = 'There was an error.';

        if(Auth::user()->blogposts()->save($bpost)){
            $message = 'Post created.';
        }
        return redirect() -> route('adminpnl') -> with(['message' => $message]);
    }
}