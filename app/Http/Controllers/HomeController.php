<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Role::create(['name'=>'admin']);
        // Role::create(['name'=>'supervisor']);
        // Role::create(['name'=>'doctor']);
        // Role::create(['name'=>'patient']);

        // Permission::create(['name'=>'create']);
        // Permission::create(['name'=>'read']);
        // Permission::create(['name'=>'update']);
        // Permission::create(['name'=>'delete']);

        // $user = Role::findById(1);
        // $user->givePermissionTo('read', 'delete');
        //$user = Role::findById(4);
        //$user->givePermissionTo('read');

        //return auth()->user()->getAllPermissions();
        //return User::role('admin')->get();
    
        return view('home');

    }
}
