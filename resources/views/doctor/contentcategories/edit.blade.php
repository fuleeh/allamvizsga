@extends('layouts.doctor')





@section('content')


    <h1>Content Categories</h1>


    <div class="col-sm-6">

        {!! Form::model($contentcategory, ['method'=>'PATCH', 'action'=> ['ContentCategoryController@update', $contentcategory->id]]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Category', ['class'=>'btn btn-primary col-sm-6 ']) !!}
        </div>
        {!! Form::close() !!}


        {!! Form::open(['method'=>'DELETE', 'action'=> ['ContentCategoryController@destroy', $contentcategory->id]]) !!}


        <div class="form-group">
            {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
        {!! Form::close() !!}



    </div>




    <div class="col-sm-6">






    </div>





@stop