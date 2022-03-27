<?php

namespace App\Http\Controllers;

use App\Post;
use App\ContentCategory;
use App\Publication;
use App\PublicationCategory;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $publications = Publication::all();
        $pubCateogires = PublicationCategory::all();

        return view('home', compact('publications', 'pubCateogires'));
    }
}
