@extends('layouts.doctor')

@section('content')

    <h1>{{__('Patient Categories')}}</h1>

    <div class="col">

            {!! Form::model($patientcategory, ['method'=>'PATCH', 'action'=>['Doctor\DoctorPatientCategoryController@update', $patientcategory->id]]) !!}

            <div class="form-group">
                {!! Form::label('name', __('Name')) !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                    {!! Form::submit(__('Edit'), ['class'=>'btn btn-primary col']) !!}
            </div>

            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['Doctor\DoctorPatientCategoryController@destroy', $patientcategory->id]]) !!}

            <div class="form-group">
                    {!! Form::submit(__('Delete'), ['class'=>'btn btn-danger col']) !!}
            </div>

            {!! Form::close() !!}

    </div>

@stop
