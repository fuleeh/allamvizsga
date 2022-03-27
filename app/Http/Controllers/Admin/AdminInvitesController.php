<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Invites;
use App\Mail\InviteUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use Spatie\Permission\Models\Role;
use Validator;
use function back;
use function route;
use function view;

class AdminInvitesController extends Controller
{
    public function index()
    {
        $roles = Role::whereIn('id', [2, 3])->get();

        return view('admin.invite.index', [
            'roles' => $roles
        ]);
    }

    public function sendInvitation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'role' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $salt = "123infjaef843";
            $tokenStr = $request->email . time() . $salt;

            $token = md5($tokenStr);

            $invite = new Invites();
            $invite->email = $request->email;
            $invite->role_id = $request->role;
            $invite->token = $token;
            $invite->save();

            $user = new User();
            $user->email = $request->email;
            $role = Role::where('id', $request->role)->first();
            $user->assignRole($role->name);
            $user->password = "sdsadsafewgweg234234";
            $user->save();


            $url = route('registerDoctor', [
                'token' => $token
            ]);

            Mail::to($request->email)->send(new InviteUser($url));

            if (Mail::failures()) {
                return back()->with("error", "Nem sikerult");
            }
            return back()->with("success", "Siker");
        }
    }
}
