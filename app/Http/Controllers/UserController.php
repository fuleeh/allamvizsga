<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Invites;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\UserData;
use App\PatientCategory;
use Validator;

class UserController extends Controller
{
    public function registerMedical(Request $request)
    {
        if($this->tokenExists($request->registerToken))
        {
                $data = Invites::select("role_id", "email")->where('token', $request->registerToken)->first();
                $role = Role::where('id',$data->role_id)->first();
                
                $user = User::where("email", $data->email)->first();
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->password = Hash::make($request->password);
                $user->save();

                $userData = new UserData();
                $userData->user_id = $user->id;
                $userData->first_name = $request->first_name;
                $userData->last_name = $request->last_name;
                $userData->address = $request->address;
                $userData->phone_number = $request->phone_number;
                $userData->email = $user->email;
                $userData->save();
                
                Invites::where('token', $request->registerToken)->delete();
                
                return redirect('/login')->with('success', "Az adatait sikeres elmentettuk!");
        }
        else
        {
            return back()->with('error', 'Hozzaferes megtagadva!'); 
        }
    }

    public function registerIndex(Request $request)
    {
        if($this->tokenExists($request->token))
        {
            return view('medical.index', ['token' => $request->token]);
        }
        else
        {
            return back()->with('error', 'Hozzaferes megtagadva!'); 
        }
        
    }

    private function tokenExists($token)
    {
        $invite = Invites::where('token', $token)->get();

        if($invite)
        {
            return true;
        }

        return false;
    }

    public function userData(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'first_name'=> 'required',
            'last_name'=> 'required',
            'address'=> 'required',
            'phone_number'=> 'required',
            'email' => 'required|email',
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        } 
        else
        {
            $user = User::all();
            $userData = new UserData();
            $userData->first_name = $user->first_name;
            $userData->first_name = $user->last_name;
            $userData->address = $request->address;
            $userData->phone_number = $request->phone_number;
            $userData->email = $user->email;
            $userData->save();
        }

        $patientcategories = PatientCategory::all();
        return view('patient.datas', [
            'patientcategories' => $patientcategories
        ]);
    }
}
