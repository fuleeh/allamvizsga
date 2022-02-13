<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PatientCategory;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use function bcrypt;
use function redirect;
use function view;

class AdminController extends Controller
{
    public function dashboard()
    {
        $usersCount = User::count();
        $postsCount = Post::count();
        $categoriesCount = PatientCategory::count();

        return view('admin.index', compact('usersCount', 'postsCount', 'categoriesCount'));
    }

    public function adminPostsList(){
        $posts = Post::paginate(2);
        return view('admin.posts.index', compact('posts'));
    }

}
