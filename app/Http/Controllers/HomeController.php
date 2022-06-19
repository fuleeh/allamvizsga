<?php

namespace App\Http\Controllers;

use App\DataGather;
use App\Doctor;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\ContentCategory;
use App\Publication;
use App\PublicationCategory;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class HomeController extends Controller
{
    use HasRoles;

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

        $publications = Publication::paginate(5);
        $pubCategories = PublicationCategory::all();
        $activeDataGather = 0;
        if (Auth::check() && Auth::user()->hasRole('patient')) {
            $dataGather = DataGather::where('user_id', Auth::id())->first();
            $activeDataGather = $dataGather ? $dataGather->status : 0;
        }

        return view('home', compact('publications', 'pubCategories', 'activeDataGather'));
    }

//    public function new(){
//        return view('components.home');
//    }
}
