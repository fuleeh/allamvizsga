<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Invites;
use Mail;
use Validator;
use App\Mail\InviteUser;
use App\User;

class InvitesController extends Controller
{
    public function index()
    {
        $roles = Role::whereIn('id',[2,3])->get();

        return view('admin.invite.index', [
            'roles' => $roles
        ]);
    }

    public function sendInvitation(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'role' => 'required',
        ]);
            if($validator->fails()){
                return back()->withErrors($validator);
            } 
            else
            {
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
                $role = Role::where('id',$request->role)->first();
                $user->assignRole($role->name);
                $user->password = "sdsadsafewgweg234234";
                $user->save();


                $url = route('medicalRegister', [
                     'token' => $token
                    ]);
                
                Mail::to($request->email)->send(new InviteUser($url));

                if( Mail::failures() ){
                    return back()->with("error", "Nem sikerult");
                }
                return back()->with("success", "Siker");
            }
    }
}
