@extends('layouts.doctor')


@section('content')


    <h1>{{__('Publication Categories')}}</h1>


    <div class="col">

        {!! Form::open(['method'=>'POST', 'action'=> 'Doctor\DoctorPublicationCategoriesController@store']) !!}
        <div class="form-group">
            {!! Form::label('name', __('Name')) !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit(__('Create'), ['class'=>'btn btn-primary col']) !!}
        </div>
        {!! Form::close() !!}


    </div>


    <div class="col">
        @if($pubCategories)
            <table class="table">
                <thead>
                <tr>
                    <th>{{__('Id')}}</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Created At')}}</th>
                </tr>
                </thead>
                <tbody>

                @foreach($pubCategories as $pubCat)

                    <tr>
                        <td>{{$pubCat->id}}</td>
                        <td><a href="{{route('doctor.publicationcategories.edit', $pubCat->id)}}">{{$pubCat->name}}</a>
                        </td>
                        <td>{{$pubCat->created_at ? $pubCat->created_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        @endif


    </div>





@stop
