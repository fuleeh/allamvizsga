<?php

namespace App\Http\Controllers\Patient;

use App\Activity;
use App\BolusServing;
use App\Carbs;
use App\DataGather;
use App\Http\Controllers\Controller;
use App\MeasuredGlucose;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PatientDataGatherController extends Controller
{
//    public function hasDataGather(){
//
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $dataGather = DB::select('SELECT * FROM data_gathers WHERE user_id =' . Auth::id());
//
//        return view('patient.datagather.create', compact('dataGather'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activeDataGather = DB::select('SELECT * FROM data_gathers WHERE user_id =' . Auth::id());

        foreach ($activeDataGather as $data) {
            $forms = ['glucose' => $data->glucose_carbs_freq,
                'bolus' => $data->bolus_serving_freq,
                'activity' => $data->activity];
        }

        foreach ($forms as $key => $value) {
            $freqs[$key] = [$this->periodsAfterFrequency($value)];
        }

        foreach ($freqs as $key => $value) {
            $submittable[$key] = $this->isSubmittable($value);
        }
//        var_dump($submittable);die;
//        $activeDataGather = DataGather::where('user_id', Auth::id())->first()->toArray();
//        foreach($activeDataGather as $key => $value){
//            var_dump($key . ' => ' . $value);
//            $forms = ['glucose' => $data['6']];
//        }
//        var_dump($forms);
//        var_dump($activeDataGather);die;
        return view('patient.datagather.create', compact('activeDataGather'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activeDataGather = DB::select('SELECT * FROM data_gathers WHERE user_id =' . Auth::id());
        switch ($request->input('action')) {
            case __('Submit Glucose'):
                $measured_glucose = new MeasuredGlucose();
                $carbs = new Carbs();
                $measured_glucose->data_gathers_id = $activeDataGather[0]->id;
                $carbs->data_gathers_id = $activeDataGather[0]->id;
                $measured_glucose->before_meal = $request->before_meal;
                $measured_glucose->after_meal = $request->after_meal;
                $carbs->amount = $request->amount;
                $measured_glucose->save();
                $carbs->save();

                return back();

            case __('Submit Bolus'):
                $bolus_servings = new BolusServing();
                $bolus_servings->data_gathers_id = $activeDataGather[0]->id;
                $bolus_servings->value = $request->value;
                $bolus_servings->save();
                return back();

            case __('Submit Activity'):
                $activity = new Activity();
                $activity->data_gathers_id = $activeDataGather[0]->id;
                $activity->type = $request->type;
                $activity->length = $request->length;
                $activity->intensity = $request->intensity;
                $activity->burned_kcal = $request->burned_kcal;
                $activity->save();
                return back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function isSubmittable($times)
    {
        $submit = false;

        foreach ($times as $time) {
            if (now() > $time['start'] && now() < $time['end']) {
                $submit = true;
            }
        }
        return $submit;
    }

    public function periodsAfterFrequency($frequency)
    {
        switch ($frequency) {
            case 1:
//                $times = [[start => 1, end=>2]];
//                $times = ['start' => now(), 'end' => Carbon::tomorrow()];
                $times = ['start' => Carbon::yesterday(), 'end' => Carbon::now('-1:00')];
                break;
//            case 2:
//                $times = [[1, 2], [3, 4]];
//                break;
//            case 3:
//                $times = [[1, 2], [3, 4], [5, 6]];
//                break;
//            case 4:
//                $times = [[1, 2], [3, 4], [5, 6], [7, 8]];
//                break;
//            case 5:
//                $times = [[1, 2], [3, 4], [5, 6], [7, 8], [9, 10]];
//                break;
        }

        return $times;
    }
}
