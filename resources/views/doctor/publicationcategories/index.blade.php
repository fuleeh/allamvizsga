@extends('layouts.doctor')





@section('content')


    <h1>Content Categories</h1>


    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST', 'action'=> 'Doctor\DoctorPublicationCategoriesController@store']) !!}
             <div class="form-group">
                 {!! Form::label('name', 'Name:') !!}
                 {!! Form::text('name', null, ['class'=>'form-control'])!!}
             </div>

             <div class="form-group">
                 {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
             </div>
        {!! Form::close() !!}



    </div>




    <div class="col-sm-6">


        @if($pubCategories)


            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>

                @foreach($pubCategories as $pubCat)

                    <tr>
                        <td>{{$pubCat->id}}</td>
                        <td><a href="{{route('doctor.publicationcategories.edit', $pubCat->id)}}">{{$pubCat->name}}</a></td>
                        <td>{{$pubCat->created_at ? $pubCat->created_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        @endif



    </div>





@stop
