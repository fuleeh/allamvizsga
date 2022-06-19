@extends('layouts.home')

@section('content')
        <div class="title text-center">
            <h1>{{__('Fill In Data')}}</h1>
        </div>
        <div class="row ">

            <div class="col">
                {!! Form::open(['method'=>'POST', 'action'=>'Patient\PatientDataGatherController@store']) !!}

                <div class="form-group">
                    {!! Form::label('before_meal', __('Before Meal')) !!}
                    {!! Form::text('before_meal', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('after_meal', __('After Meal')) !!}
                    {!! Form::text('after_meal', null, ['class'=>'form-control']) !!}
                </div>

{{--                <div class="form-group">--}}
{{--                    {!! Form::label('protein_amount', 'The amount of Protein(in grams):') !!}--}}
{{--                    {!! Form::text('protein_amount', null, ['class'=>'form-control']) !!}--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    {!! Form::label('fat_amount', 'The amount of Fats(in grams):') !!}--}}
{{--                    {!! Form::text('protein_amount', null, ['class'=>'form-control']) !!}--}}
{{--                </div>--}}

                <div class="form-group">
                    {!! Form::label('amount', __('The amount of Carbohydrate(in grams)')) !!}
                    {!! Form::text('amount', null, ['class'=>'form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::submit(__('Submit Glucose'), ['class' => 'btn btn-primary', 'name' => 'action'])!!}
                </div>

                {!! Form::close() !!}

            </div>

            <div class="col">

                {!! Form::open(['method'=>'POST', 'action'=>'Patient\PatientDataGatherController@store']) !!}

                <div class="form-group">
                    {!! Form::label('value', __('Bolus Serving')) !!}
                    {!! Form::text('value', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit(__('Submit Bolus'), ['class' => 'btn btn-primary', 'name' => 'action'])!!}
                </div>

                {!! Form::close() !!}

            </div>

            <div class="col">

                {!! Form::open(['method'=>'POST', 'action'=>'Patient\PatientDataGatherController@store']) !!}

                <div class="form-group">
                    {!! Form::label('type', __('Activity Type')) !!}
                    {!! Form::text('type', null, ['class'=>'form-control']) !!}
                </div>

{{--                <div class="form-group">--}}
{{--                    {!! Form::label('time_of_day', 'Time of Day:') !!}--}}
{{--                    {!! Form::text('time_of_day', null, ['class'=>'form-control']) !!}--}}
{{--                </div>--}}

                <div class="form-group">
                    {!! Form::label('length', __('Length')) !!}
                    {!! Form::text('length', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('intensity', __('Intensity')) !!}
                    {!! Form::text('intensity', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('burned_kcal', __('Burned Kcal')) !!}
                    {!! Form::text('burned_kcal', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit(__('Submit Activity'), ['class' => 'btn btn-primary', 'name' => 'action'])!!}
                </div>

                {!! Form::close() !!}

            </div>

        </div>

@stop
