<?php

namespace App\Http\Controllers;
use App\Post;
use App\PatientCategory;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $postsCount = Post::count();
        $categoriesCount = PatientCategory::count();

        return view('admin/index', compact('usersCount', 'postsCount', 'categoriesCount'));
    }
}
