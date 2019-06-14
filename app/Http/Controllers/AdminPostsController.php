<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class AdminPostsController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(2);
        return view('admin.posts.index', compact('posts'));
    }
}
