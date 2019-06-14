@extends('layouts.doctor')





@section('content')


    <h1>Content Categories</h1>


    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST', 'action'=> 'ContentCategoryController@store']) !!}
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


        @if($contentcategories)


            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>

                @foreach($contentcategories as $contentcategory)

                    <tr>
                        <td>{{$contentcategory->id}}</td>
                        <td><a href="{{route('doctor.contentcategories.edit', $contentcategory->id)}}">{{$contentcategory->name}}</a></td>
                        <td>{{$contentcategory->created_at ? $contentcategory->created_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        @endif



    </div>





@stop