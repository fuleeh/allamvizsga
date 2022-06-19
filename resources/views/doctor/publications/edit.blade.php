@extends('layouts.doctor')

@section('content')


    <h1>{{__('Edit Publication')}}</h1>


    <div class="row">

        <div class="col-sm">

            <img src="{{$publication->photo ? $publication->photo->file : "No photo"}}" class="img-fluid alt="Responsive image"">

        </div>

        <div class="col-sm">

            {!! Form::model($publication, ['method'=>'PATCH', 'action'=>['Doctor\DoctorPublicationsController@update', $publication->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title', __('Title')) !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('publication_category_id', __('Publication Category')) !!}
                {!! Form::select('publication_category_id', $pubCategory, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', __('Photo')) !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body', __('Body')) !!}
                {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit(__('Edit'), ['class'=>'btn btn-primary col-sm']) !!}
            </div>

            {!! Form::close() !!}


            {!! Form::open(['method'=>'DELETE', 'action'=>['Doctor\DoctorPublicationsController@destroy', $publication->id]]) !!}

            <div class="form-group">
                {!! Form::submit(__('Delete'), ['class'=>'btn btn-danger col-sm']) !!}
            </div>

            {!! Form::close() !!}

        </div>


    </div>

    <div class="row">

        @include('includes.form_error')

    </div>

@stop
