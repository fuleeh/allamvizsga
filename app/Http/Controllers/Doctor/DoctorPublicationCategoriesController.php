<?php

namespace App\Http\Controllers\Doctor;

use App\ContentCategory;
use App\Http\Controllers\Controller;
use App\PublicationCategory;
use Illuminate\Http\Request;

class DoctorPublicationCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pubCategories = PublicationCategory::all();
        return view('doctor.publicationcategories.index', compact('pubCategories'));
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
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        PublicationCategory::create($request->all());
        return redirect('/doctor/publicationcategories');
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
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $pubCategory = PublicationCategory::findOrFail($id);

        return view('doctor.publicationcategories.edit', compact('pubCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $pubCategories = PublicationCategory::findOrFail($id);

        $pubCategories->update($request->all());

        return redirect('/doctor/publicationcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return mixed
     */
    public function destroy($id)
    {
        PublicationCategory::findOrFail($id)->delete();

        return redirect('/doctor/publicationcategories');
    }
}
