<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Requ;
use App\RequestField;
use App\User;
use Illuminate\Http\Request;

class DoctorDataRequestController extends Controller
{
    public function index(){
        $requests = Requ::all();
        return view('doctor.request.index', compact('requests'));
    }

    public function createFields(Request $request)
    {
        RequestField::create($request->all());
        return redirect('doctor/request/fields');
    }

    public function getFields()
    {
        return view('doctor/request/fields');
    }

    public function create()
    {
        $users = User::role('patient')->get();
        // $users = User::all();
        $fields = RequestField::all();

        // return view('admin/request/requests',
        // [
        //     'users' => $users,
        //     'fields' => $fields
        // ]);
        return view('doctor.request.create', compact('users', 'fields'));
    }

    public function createRequest(Request $request)
    {
        foreach ($request->user as $user) {
            $req = new Requ();
            $req->user_id = $user;

            $req->freq_start = $request->freq_start;
            $req->freq_end = $request->freq_end;
            $req->frequency = $request->frequency;
            $req->fields = json_encode($request->field);
            $req->save();
            //+ email kuldes hogy toltse ki

        }


        return back();
    }
}

//usernek ez a cucc h toltse ki es mentse el
//clone job reggel 8kor futtasd le --queue
//laravel scheduler
