@extends('layouts.doctor')

@section('content')

    <h1>{{__('Profile')}}</h1>

    @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="row">

        <div class="col">
            {!! Form::open(['method'=>'POST', 'action'=>'Doctor\DoctorHomeController@edit']) !!}

            <div class="form-group">
                {!! Form::label('first_name', __('First Name')) !!}
                {!! Form::text('first_name', $doctor->first_name ?: null, ['class'=>'form-control']) !!}
                @if ($errors->has('first_name'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('last_name', __('Last Name')) !!}
                {!! Form::text('last_name', $doctor->last_name ?: null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('address', __('Address')) !!}
                {!! Form::text('address', $doctor->address ?: null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('phone_number', __('Phone Number')) !!}
                {!! Form::text('phone_number', $doctor->phone_number ?: null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit(__('Update'), ['class'=>'btn btn-primary col']) !!}
            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection

@section('scripts')

    <script>

    </script>

@stop
