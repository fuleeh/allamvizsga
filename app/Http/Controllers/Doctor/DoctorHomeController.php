<?php

namespace App\Http\Controllers\Doctor;

use App\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DoctorHomeController extends Controller
{
    public function index()
    {
        $doctor = Doctor::where('user_id', Auth::id())->first();

        return view('layouts.doctor', compact('doctor'));
    }

    public function edit()
    {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        return view('doctor.profile.index', compact('doctor'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'address' => 'required|string|max:100',
                'phone_number' => 'required|digits:10',
            ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $doctor = Doctor::where('user_id', Auth::id())->first();
            $doctor->update($request->all());

            return back()->with('message', __('You have updated your profile!'));
        }
    }
}
