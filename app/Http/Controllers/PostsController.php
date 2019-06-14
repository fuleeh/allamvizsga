<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientCategory;
use App\Post;
use App\Photo;
use App\ContentCategory;
use App\Http\Requests\PostsCreateRequest;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(2);
        return view('doctor.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contentcategories = ContentCategory::pluck('name', 'id')->all();

        return view('doctor.posts.create', compact('contentcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        $input = $request->all();
        $user = Auth::user();
        if($file = $request->file('photo_id'))
        {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $user->posts()->create($input);

        return redirect('/doctor/posts');
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
        $post = Post::findOrFail($id);
        $contentcategories = ContentCategory::pluck('name', 'id')->all();

        return view('doctor.posts.edit', compact('post', 'contentcategories'));
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
        $input = $request->all();
        if($file = $request->file(['photo_id']))
        {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        } 
        Post::findOrFail($id)->first()->update($input);
        //update only user posts
        Auth::user()->posts()->whereId($id)->first()->update($input);

        return redirect('/doctor/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink(public_path() . $post->photo->file);
        $post->delete();
        Session::flash('deleted_post', 'This post hast been deleted!');

        return redirect('/doctor/posts');
    }

    public function post($id)
    {
        $post = Post::find($id);
        return view('post', compact('post'));
    }
}
