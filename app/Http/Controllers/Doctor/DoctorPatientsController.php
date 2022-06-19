<?php

namespace App\Http\Controllers\Doctor;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorPatientsController extends Controller
{
    public function index(){
        $doctor = Doctor::where('user_id', Auth::id())->first();
        $patients = Patient::where('doctor_id', '=', Auth::id())->get();

        return view('doctor.patients.index', compact('patients', 'doctor'));
    }

    public function updateStatus(Request $request)
    {
        $patient = Patient::find($request->patient_id);
        $patient->isAccepted = $request->isAccepted;
        $patient->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
