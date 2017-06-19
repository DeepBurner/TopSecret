<?php
/**
 * Created by PhpStorm.
 * User: kcancelik
 * Date: 2/11/17
 * Time: 2:02 AM
 */

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Field;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchUser($toSearch) {
        return User::search($toSearch)->get();
    }

    public function searchPost($toSearch) {
        return Post::search($toSearch)->get();
    }

    public function searchField($toSearch) {
        return Field::search($toSearch)->get();
    }

    public function postSearchRequest(Request $request) {
        $toSearch = $request['to_search'];
        $users = $this->searchUser($toSearch);
        $posts = $this->searchPost($toSearch);
        $fields = $this->searchField($toSearch);
        return view('search_results')->with(['users' => $users, 'posts' => $posts, 'fields' => $fields, 'query' => $toSearch]);
    }
}