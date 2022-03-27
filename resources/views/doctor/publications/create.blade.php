@extends('layouts.doctor')

@section('content')


    <h1>Create Post</h1>

    <div class="row">

    {!! Form::open(['method'=>'POST', 'action'=>'Doctor\DoctorPublicationsController@store', 'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
            {!! Form::label('content_category_id', 'ContentCategory:') !!}
            {!! Form::select('content_category_id', [''=>'Choose Category'] + $pubCategories, null, ['class'=>'form-control']) !!}
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
            {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

</div>

    <div class="row">

    @include('includes.form_error')

</div>

@stop
