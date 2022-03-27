@extends('layouts.doctor')

@section('content')


@if(Session::has('deleted_category'))
        <p class="bg-danger">{{session('deleted_category')}}</p>
@endif



    <h1>Patient Categories</h1>

    <div class="col-sm-6">

            {!! Form::open(['method'=>'POST', 'action'=>'Doctor\DoctorPatientCategoryController@store']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                    {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

    </div>

    <div class="col-sm-6">

            <table class="table">

                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created at</th>
                  </tr>
                </thead>
                <tbody>

              @if($patientcategories)

                @foreach($patientcategories as $patientcategory)

                  <tr>
                    <td>{{$patientcategory->id}}</td>
                    <td><a href="{{route('doctor.patientcategories.edit', $patientcategory->id)}}">{{$patientcategory->name}}</td></a>
                    <td>{{$patientcategory->created_at ? $patientcategory->created_at->diffForHumans() : 'No date'}}</td>
                  </tr>

                @endforeach

              @endif

                  </tbody>

        </div>

@stop
