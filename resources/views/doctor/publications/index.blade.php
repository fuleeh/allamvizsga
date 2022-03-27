@extends('layouts.doctor')

@section('content')


    <h1>Posts</h1>


    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Author</th>
            <th>Content Category</th>
            <th>Title</th>
            <th>Body</th>
            <!--<th>Post link</th>-->
            <th>Created at</th>
            <th>Update</th>
        </thead>
        <tbody>

        @if($publications)


            @foreach($publications as $pub)

                <tr>
                    <td>{{$pub->id}}</td>
                    <td><img height="50" src="{{$pub->photo ? $pub->photo->file : 'http://placehold.it/400x400' }} "
                             alt=""></td>
                    <td>{{$pub->user->first_name}} {{$pub->user->last_name}}</a></td>
                    <td>{{$pub->contentCategory ? $pub->contentCategory->name : 'Uncategorized'}}</td>
                    <td>{{$pub->title}}</td>
                    <td>{{\Illuminate\Support\Str::limit($pub->body, 30)}}</td>
                    <td>{{$pub->created_at->diffForhumans()}}</td>
                    <td>{{$pub->updated_at->diffForhumans()}}</td>
                    <td><a href="{{route('doctor.publications.edit', $pub->id)}}">Edit</td>
                </tr>

            @endforeach

        @endif

        </tbody>
    </table>
@stop
