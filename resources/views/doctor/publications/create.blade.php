@extends('layouts.doctor')

@section('content')


    <h1>{{__('New Publication')}}</h1>

    <div class="col">

    {!! Form::open(['method'=>'POST', 'action'=>'Doctor\DoctorPublicationsController@store', 'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('title', __('Title')) !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
            {!! Form::label('publication_category_id', __('Publication Category')) !!}
            {!! Form::select('publication_category_id', [''=>'Choose Category'] + $pubCategories, null, ['class'=>'form-control']) !!}
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
            {!! Form::submit(__('Create'), ['class'=>'btn btn-primary col']) !!}
        </div>

        {!! Form::close() !!}

</div>

    <div class="row">

    @include('includes.form_error')

</div>

@stop
