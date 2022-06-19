<?php

namespace App\Http\Controllers\Doctor;

use App\DataGather;
use App\Doctor;
use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorDataRequestController extends Controller
{
    public function index()
    {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        $requests = DataGather::all();
        $requests = DataGather::join('patients', 'data_gathers.user_id', '=', 'patients.user_id')
            ->select('data_gathers.*', 'patients.first_name', 'patients.last_name')
            ->get();


        return view('doctor.datagather.index', compact('requests', 'doctor'));
    }

//    public function createFields(Request $datagather)
//    {
//        RequestField::create($datagather->all());
//        return redirect('doctor/datagather/fields');
//    }

//    public function getFields()
//    {
//        return view('doctor/datagather/fields');
//    }

    public function create()
    {
        $users = Patient::all();
        $doctor = Doctor::where('user_id', Auth::id())->first();
//        $users = User::role('patient')->get();
//        dd($users);
//        $users = Patient::all();

        // $users = User::all();
//        $fields = RequestField::all();

        // return view('admin/datagather/requests',
        // [
        //     'users' => $users,
        //     'fields' => $fields
        // ]);
        return view('doctor.datagather.create', compact('users', 'doctor'));
    }

    public function createRequest(Request $request)
    {
        foreach ($request->user as $user) {
            $data_gather = new DataGather();

            $data_gather->user_id = $user;

            $data_gather->start_time = $request->start_time;
            $data_gather->end_time = $request->end_time;
            $data_gather->glucose_carbs_freq = $request->glucose_carbs_freq;
            $data_gather->bolus_serving_freq = $request->bolus_serving_freq;
            $data_gather->activity = $request->activity;
            $data_gather->status = 1;
            $data_gather->save();
        }

        return back();
    }

    public function updateStatus(Request $request)
    {
        $datagather = DataGather::find($request->datagather_id);
        $datagather->status = $request->status;
        $datagather->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
