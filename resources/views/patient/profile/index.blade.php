@extends('layouts.app')

@section('content')

    <h1>User's data</h1>

    <div class="col-md-3">

        {!! Form::open(['method'=>'POST', 'action'=>'UserController@userProfileDatas']) !!}

        <div class="form-group">
            {!! Form::label('first_name', 'First Name:') !!}
            {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('last_name', 'Last Name:') !!}
            {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('address', 'Address:') !!}
            {!! Form::text('address', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('phone_number', 'Phone Number:') !!}
            {!! Form::text('phone_number', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', $user->email, ['class'=>'form-control']) !!}
        </div>

        @if($patientcategories)
            {!! Form::label('category', 'Category:') !!}
            <select class="form-control" name="role">
                @foreach($patientcategories as $patientcategory)
                    <option value="{{$patientcategory->id}}">{{$patientcategory->name}}</option>
                @endforeach
            </select>
        @endif

        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection

@section('scripts')


@stop
