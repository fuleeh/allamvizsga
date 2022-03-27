<?php

namespace App\Http\Controllers\Doctor;
use App\Http\Controllers\Controller;
use App\Photo;
use App\PublicationCategory;
use App\Publication;
use App\Http\Requests\PublicationCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class DoctorPublicationsController extends Controller
{
    use HasRoles;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $publications = Publication::all();
        return view('doctor.publications.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pubCategories = PublicationCategory::pluck('name', 'id')->all();

        return view('doctor.publications.create', compact('pubCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\PublicationCreateRequest $request
     * @return mixed
     */
    public function store(PublicationCreateRequest $request)
    {
        $input = $request->all();
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $request->user()->posts()->create($input);

        return redirect('/doctor/publications');
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
        $publications = Publication::findOrFail($id);
        $pubCategories = PublicationCategory::pluck('name', 'id')->all();

        return view('doctor.publications.edit', compact('publications', 'pubCategories'));
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
        $input = $request->all();
        if ($file = $request->file(['photo_id'])) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        Publication::findOrFail($id)->first()->update($input);
        //update only user publications
        Auth::user()->publications()->whereId($id)->first()->update($input);

        return redirect('/doctor/publications');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return mixed
     */
    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);
        unlink(public_path() . $publication->photo->file);
        $publication->delete();
        Session::flash('delete_publication', 'This publication hast been deleted!');

        return redirect('/doctor/publications');
    }

    public function publication($id)
    {
        $publication = Publication::find($id);
        return view('publication', compact('publication'));
    }
}
