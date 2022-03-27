<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Invites;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\UserData;
use App\PatientCategory;
use Validator;

class UserController extends Controller
{
    use HasRoles;

    public function userProfile()
    {
        $patientcategories = PatientCategory::all();
        $user = Auth::user();
        return view('patient.profile.index', compact('user', 'patientcategories'));
    }

    public function userProfileDatas(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'address' => 'required',
                'phone_number' => 'required',
                'email' => 'required|email',
            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $user = Auth::user();

            $userData = new UserData();
            $userData->first_name = $request->first_name;
            $userData->first_name = $request->last_name;
            $userData->address = $request->address;
            $userData->phone_number = $request->phone_number;
            $userData->email = $user->email;
            $userData->save();

        }

        return view('/');
    }

    public
    function registerDoctor(Request $request)
    {
        if ($this->tokenExists($request->registerToken)) {
            $data = Invites::select("role_id", "email")->where('token', $request->registerToken)->first();
            $role = Role::where('id', $data->role_id)->first();
            $user = User::where("email", $data->email)->first();
            $user->password = Hash::make($request->password);
            $user->assignRole($role);
            $user->save();

            $doctor = new Doctor();
            $doctor->user_id = $user->id;
            $doctor->first_name = $request->first_name;
            $doctor->last_name = $request->last_name;
            $doctor->address = $request->address;
            $doctor->phone_number = $request->phone_number;
//            $doctor->email = $user->email;
            $doctor->save();

            Invites::where('token', $request->registerToken)->delete();

            return redirect('/login')->with('success', "Az adatait sikeres elmentettuk!");
        } else {
            return back()->with('error', 'Hozzaferes megtagadva!');
        }
    }

    public
    function registerIndex(Request $request)
    {
        $user = Auth::user();
        if ($this->tokenExists($request->token)) {
            return view('doctor.register.index', ['token' => $request->token, 'user' => $user]);
        } else {
            return back()->with('error', 'Hozzaferes megtagadva!');
        }

    }

    private
    function tokenExists($token)
    {
        $invite = Invites::where('token', $token)->get();

        if ($invite) {
            return true;
        }

        return false;
    }


}
