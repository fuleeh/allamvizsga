@extends('layouts.doctor')

@section('content')


    <h1>Edit Post</h1>


<div class="row">

    <div class="col-sm-3">

        <img src="{{$post->photo ? $post->photo->file : "No photo"}}" class="img-responsive">

    </div>

<div class="col-sm-9">

    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostsController@update', $post->id], 'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
            {!! Form::label('content_category_id', 'ContentCategory:') !!}
            {!! Form::select('content_category_id', $contentcategories, null, ['class'=>'form-control']) !!}
    </div>
    
    <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>
    

    <div class="form-group">
            {!! Form::label('body', 'Body:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
            {!! Form::submit('Edit', ['class'=>'btn btn-primary col-sm-6']) !!}
        </div>
    
        {!! Form::close() !!}


    {!! Form::open(['method'=>'DELETE', 'action'=>['PostsController@destroy', $post->id]]) !!}

    <div class="form-group">
        {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-6']) !!}
    </div>

    {!! Form::close() !!}

</div>
    

</div>

    <div class="row">

    @include('includes.form_error')

</div>

@stop