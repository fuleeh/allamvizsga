<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        $user1 = User::find(2);
        if(!$user1)
        {
            $this->createPermissions();
            $this->assignAdmin();
        }
        else
        {
            $user->assignRole('patient');
        }
        $user->sendEmailVerificationNotification();

        return $user;
    }

    public function createPermissions()
    {
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'supervisor']);
        Role::create(['name'=>'doctor']);
        Role::create(['name'=>'patient']);

        Permission::create(['name'=>'create']);
        Permission::create(['name'=>'read']);
        Permission::create(['name'=>'update']);
        Permission::create(['name'=>'delete']);

        $role = Role::findById(1);
        $role->givePermissionTo('create', 'read', 'update', 'delete');
        $role1 = Role::findById(2);
        $role1->givePermissionTo('read', 'update');
        $role2 = Role::findById(3);
        $role2->givePermissionTo('create', 'read', 'update');
        $role3 = Role::findById(4);
        $role3->givePermissionTo('read');

    }

    public function assignAdmin()
    {
        $user = User::find(1);
        $user->assignRole('admin');
    }
}
