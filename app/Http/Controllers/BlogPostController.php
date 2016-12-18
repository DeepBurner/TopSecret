<?php
/**
 * Created by PhpStorm.
 * User: kcancelik
 * Date: 12/18/16
 * Time: 3:28 PM
 */

namespace App\Http\Controllers;

use App\BlogPost;

class BlogPostController extends Controller {
    public function getBlog() {
        $blogPosts = BlogPost::orderBy('created_at', 'desc')->get();
        return view('blog', ['blogposts' => $blogPosts]);
    }
}