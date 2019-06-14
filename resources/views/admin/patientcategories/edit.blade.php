@extends('layouts.admin')

@section('content')

    <h1>Patient Categories</h1>

    <div class="col-sm-6">

            {!! Form::model($patientcategory, ['method'=>'PATCH', 'action'=>['PatientCategoryController@update', $patientcategory->id]]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                    {!! Form::submit('Edit', ['class'=>'btn btn-primary col-sm-6']) !!}
            </div>
            
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['PatientCategoryController@destroy', $patientcategory->id]]) !!}

            <div class="form-group">
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-6']) !!}
            </div>
            
            {!! Form::close() !!}

    </div>

    <div class="col-sm-6">



    </div>

    

@stop