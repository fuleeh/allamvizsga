@extends('layouts.admin')

@section('content')

<h1>Edit User</h1>



<div class="col-sm-9">

    {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

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

    <div class="form-group">
        {!! Form::label('role_id', 'Felhasználó típus:') !!}
        {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
    </div>
    {{--
    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class'=>'form-control']) !!}
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
        {!! Form::submit('Edit', ['class'=>'btn btn-primary col-sm-6']) !!}
    </div>

    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

    <div class="form-group">
        {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-6']) !!}
    </div>

    {!! Form::close() !!}

</div>

</div>

    <div class="row">

    @include('includes.form_error')

    </div>

@stop