@extends('layouts.doctor')

@section('content')

    @if(Session::has('deleted_category'))
        <p class="bg-danger">{{session('deleted_category')}}</p>
    @endif

    <h1>{{__('Patient Categories')}}</h1>

    <div class="col">

        {!! Form::open(['method'=>'POST', 'action'=>'Doctor\DoctorPatientCategoryController@store']) !!}

        <div class="form-group">
            {!! Form::label('name', __('Name')) !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit(__('Create'), ['class'=>'btn btn-primary col']) !!}
        </div>

        {!! Form::close() !!}

    </div>

    <div class="col">
        <table class="table">
            <thead>
            <tr>
                <th>{{__('Id')}}</th>
                <th>{{__('Name')}}</th>
                <th>{{__('Created At')}}</th>
            </tr>
            </thead>
            <tbody>

            @if($patientcategories)

                @foreach($patientcategories as $patientcategory)

                    <tr>
                        <td>{{$patientcategory->id}}</td>
                        <td>
                            <a href="{{route('doctor.patientcategories.edit', $patientcategory->id)}}">{{$patientcategory->name}}
                        </td>

                        <td>{{$patientcategory->created_at ? $patientcategory->created_at->diffForHumans() : 'No date'}}</td>
                    </tr>

                @endforeach

            @endif

            </tbody>
        </table>
    </div>
@stop
