@extends('layouts.doctor')

@section('content')

    <h1>{{__('Doctor data')}}</h1>

    <div class="row">


        <div class="col-sm-6">
            {!! Form::open(['method'=>'POST', 'action'=>'UserController@registerDoctor']) !!}

            <div class="form-group">
                {!! Form::label('first_name', 'First Name:') !!}
                {!! Form::text('first_name' ,null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('last_name', 'Last Name:') !!}
                {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', $doctor->email, ['class'=>'form-control']) !!}
            </div>

            <input type="hidden" name="registerToken" value="{{ $token }}">

            <div class="form-group">
                {!! Form::label('address', 'Address:') !!}
                {!! Form::text('address', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('phone_number', 'Phone Number:') !!}
                {!! Form::text('phone_number', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection

@section('scripts')

    <script>

    </script>

@stop
