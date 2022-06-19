@extends('layouts.home')

@section('content')

    <h1>{{__('Profile')}}</h1>
    <div class="col">

        {!! Form::open(['method'=>'POST', 'action'=>'UserController@userProfileDatas']) !!}

        <div class="form-group">
            {!! Form::label('first_name', __('First Name')) !!}
            {!! Form::text('first_name', $user->first_name, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('last_name', __('Last Name')) !!}
            {!! Form::text('last_name', $user->last_name, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('address', __('Address')) !!}
            {!! Form::text('address', $patient->address ?: null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('phone_number', __('Phone Number')) !!}
            {!! Form::text('phone_number', $patient->phone_number ?: null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', __('E-Mail Address')) !!}
            {!! Form::text('email', $user->email, ['class'=>'form-control']) !!}
        </div>


        @if($doctors)
            <div class="form-group">
                {!! Form::label('doctor_id', __('Doctor')) !!}
                <select class="form-control" name="doctor_id">
                    @foreach($doctors as $doctor)
                        <option value="{{$doctor->user_id}}">{{$doctor->first_name}} {{$doctor->last_name}}</option>
                    @endforeach
                </select>
            </div>
        @endif

        @if($patientcategories)
            <div class="form-group">
                {!! Form::label('patient_category_id', __('Category')) !!}
                <select class="form-control" name="patient_category_id">
                    @foreach($patientcategories as $patientcategory)
                        <option value="{{$patientcategory->id}}">{{$patientcategory->name}}</option>
                    @endforeach
                </select>
            </div>
        @endif

        {{--        <div class="form-group">--}}
        {{--            {!! Form::label('password', 'Password:') !!}--}}
        {{--            {!! Form::password('password', ['class'=>'form-control']) !!}--}}
        {{--        </div>--}}

        <div class="form-group">
            {!! Form::submit(__('Submit'), ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection

@section('scripts')


@stop
