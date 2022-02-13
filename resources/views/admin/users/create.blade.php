@extends('layouts.admin')

@section('content')

<div class="col-sm-9">

    <h1>Create User</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'Admin\AdminUsersController@store', 'files'=>true]) !!}

    <div class="form-group">
            {!! Form::label('first_name', 'First Name:') !!}
            {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
            {!! Form::label('last_name', 'Last Name:') !!}
            {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class'=>'form-control']) !!}
    </div>

    {{--
    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), 0, ['class'=>'form-control']) !!}
    </div>
    --}}

    {{--<div class="form-group">
        {!! Form::label('photo_id', 'Picture:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>--}}

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>

    @include('includes.form_error')

@stop
