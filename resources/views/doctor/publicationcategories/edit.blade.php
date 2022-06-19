@extends('layouts.doctor')

@section('content')


    <h1>{{__('Publication Categories')}}</h1>


    <div class="col">

        {!! Form::model($pubCategory, ['method'=>'PATCH', 'action'=> ['Doctor\DoctorPublicationCategoriesController@update', $pubCategory->id]]) !!}
        <div class="form-group">
            {!! Form::label('name', __('Name')) !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit(__('Update'), ['class'=>'btn btn-primary col ']) !!}
        </div>
        {!! Form::close() !!}


        {!! Form::open(['method'=>'DELETE', 'action'=> ['Doctor\DoctorPublicationCategoriesController@destroy', $pubCategory->id]]) !!}


        <div class="form-group">
            {!! Form::submit(__('Delete'), ['class'=>'btn btn-danger col']) !!}
        </div>
        {!! Form::close() !!}

    </div>





@stop
