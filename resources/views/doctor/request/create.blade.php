@extends('layouts.doctor')

@section('content')


<div class="col-sm-9">

    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST', 'action'=>'Doctor\DoctorDataRequestController@createRequest']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Users:') !!}
        </div>

        @if($users)
        <select class="form-control" name="user[]" multiple>
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
            @endforeach
        </select>
        @endif

        <div class="form-group">
            {!! Form::label('freq_start', 'Frequency start:') !!}
            {!! Form::date('freq_start', null, ['class'=>'form-control']) !!}
            {{Form::date('name', \Carbon\Carbon::now())}}
        </div>

        <div class="form-group">
            {!! Form::label('freq_end', 'Frequency end:') !!}
            {!! Form::date('freq_end', null, ['class'=>'form-control']) !!}
        </div>

        <select class="form-control" name="frequency">
                <option value="1">Naponta egyszer</option>
                <option value="2">Naponta ketszer</option>
                <option value="3">Naponta negyszer</option>
        </select>

        @if($fields)
            @foreach($fields as $k => $field)
            <div class="form-check">
            <input value="{{$field->name}}" class="form-check-input" type="checkbox" name="field[]" id="field-{{$k}}">
            <label class="form-check-label" for="field-{{$k}}">
                {{$field->name}}
            </label>
            </div>
            @endforeach
        @endif



        <div class="form-group">
                {!! Form::submit('Create Request', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

</div>

</div>

    <div class="row">

    @include('includes.form_error')

    </div>

@stop
