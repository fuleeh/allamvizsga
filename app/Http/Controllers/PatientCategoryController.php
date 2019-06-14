<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientCategory;
use Illuminate\Support\Facades\Session;

class PatientCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patientcategories = PatientCategory::all();
        return view('admin.patientcategories.index', ['patientcategories' => $patientcategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PatientCategory::create($request->all());
        return redirect('/admin/patientcategories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patientcategory = PatientCategory::findOrFail($id);

        return view('admin.patientcategories.edit', compact('patientcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pCategory = PatientCategory::findOrFail($id);
        $pCategory->update($request->all());

        return redirect('admin/patientcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PatientCategory::findOrFail($id)->delete();

        Session::flash('deleted_category', 'This category has been deleted!');

        return redirect('/admin/patientcategories');
    }
}
