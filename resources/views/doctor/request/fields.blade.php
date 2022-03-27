@extends('layouts.doctor')

@section('content')


<div class="col-sm-9">

    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST', 'action'=>'Doctor\DoctorDataRequestController@createFields']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('type', 'Type:') !!}
            {!! Form::text('type', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
                {!! Form::submit('Create Fields', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

</div>

</div>

    <div class="row">

    @include('includes.form_error')

    </div>

@stop
