<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Patient;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Invites;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\PatientCategory;
use Validator;

class UserController extends Controller
{
    use HasRoles;

    public function userProfile()
    {
        $patientcategories = PatientCategory::all();
        $user = Auth::user();
        $doctors = Doctor::all();
        $patient = Patient::where('user_id', $user->id)->first();
        return view('patient.profile.index', compact('user', 'patientcategories', 'doctors', 'patient'));
    }

    public function userProfileDatas(Request $request)
    {

//        $validator = Validator::make($request->all(),
//            [
//                'first_name' => 'required',
//                'last_name' => 'required',
//                'patient_category_id' => 'required',
//                'doctor_id' => 'required',
//                'address' => 'required',
//                'phone_number' => 'required',
//                'email' => 'required|email',
//            ]);
//
//        if ($validator->fails()) {
//            return back()->withErrors($validator);
//        } else {
            $user = Auth::user();
//        var_dump($request->doctor->id);die;
            $patient = new Patient();
            $patient->user_id = $user->id;
            $patient->patient_category_id = $request->patient_category_id;
            $patient->doctor_id = $request->doctor_id;
//            var_dump($request->doctor_id);die;
            $patient->first_name = $request->first_name;
            $patient->last_name = $request->last_name;
            $patient->address = $request->address;
            $patient->phone_number = $request->phone_number;
            $patient->isAccepted = false;

            $user->email = $request->email;
//            var_dump($patient);die;
            $patient->save();
            $user->save();

//        }

        return redirect('/');
    }

    public function editUserProfile()
    {
//        $user = Auth::user();
//        $patient = Patient::where('user_id', $user->id)->first();
//        $patientcategories = PatientCategory::all();
//
//        $doctors = Doctor::all();
//        return view('patient.profile.edit', compact('user', 'patientcategories', 'patient', 'doctors'));
    }

    public function updateUserProfile(Request $request)
    {
        $input = $request->all();
        $patient = Patient::where('user_id', Auth::id())->first();
        Patient::where('user_id', '14')->firstOrFail()->update($input);

//        Auth::user()->publications()->whereId($id)->first()->update($input);

        return redirect('/');
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


            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->password = Hash::make($request->password);
            $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');

            $doctor->save();
            $user->save();

//            Invites::where('token', $datagather->registerToken)->delete();

//            return redirect('/login')->with('success', "Az adatait sikeres elmentettuk!");
            return redirect('/login');
        } else {
            return back()->with('error', 'Hozzaferes megtagadva!');
        }
    }

    public
    function registerIndex(Request $request)
    {
        $user = Auth::user();

        if ($this->tokenExists($request->token)) {
            $doc = Invites::where('token', $request->token)->first();
            return view('doctor.register.index', ['token' => $request->token, 'doctor' => $doc]);
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
