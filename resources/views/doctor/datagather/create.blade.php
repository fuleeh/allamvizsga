@extends('layouts.doctor')

@section('content')


    <div class="col">

        <div class="col">

            {!! Form::open(['method'=>'POST', 'action'=>'Doctor\DoctorDataRequestController@createRequest']) !!}

            <div class="form-group">
                {!! Form::label('name', __('Patients')) !!}
            </div>

            @if($users)
                <select class="form-control" name="user[]" multiple>
                    @foreach($users as $user)
                        <option value="{{$user->user_id}}">{{$user->first_name}} {{$user->last_name}}</option>
                    @endforeach
                </select>
            @endif

            <div class="form-group">
                {!! Form::label('start_time', __('Start Time')) !!}
                {!! Form::date('start_time', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('end_time', __('End Time')) !!}
                {!! Form::date('end_time', null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('glucose_carbs_freq', __('Glucose Measuring Frequency')) !!}
                <select class="form-control" name="glucose_carbs_freq">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>

            <div class="form-group">
                {!! Form::label('bolus_serving_freq', __('Bolus Serving Frequency')) !!}
                <select class="form-control" name="bolus_serving_freq">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>

            <div class="form-group">
                {!! Form::label('activity', __('Activity')) !!}
                <select class="form-control" name="activity">
                    <option value="1">1</option>
                </select>
            </div>

            <div class="form-group">
                {!! Form::submit(__('Create'), ['class'=>'btn btn-primary col']) !!}
            </div>

            {!! Form::close() !!}

        </div>

    </div>



    <div class="row">

        @include('includes.form_error')

    </div>

@stop
