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

        @if($posts)


            @foreach($posts as $post)

          <tr>
              <td><a href="{{route('doctor.posts.edit', $post->id)}}">{{$post->id}}</td>
              <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400' }} " alt=""></td>
              <td>{{$post->user->first_name}} {{$post->user->last_name}}</a></td>
              <td>{{$post->contentCategory ? $post->contentCategory->name : 'Uncategorized'}}</td>
              <td>{{$post->title}}</td>
              <td>{{\Illuminate\Support\Str::limit($post->body, 30)}}</td>
              <td>{{$post->created_at->diffForhumans()}}</td>
              <td>{{$post->updated_at->diffForhumans()}}</td>

          </tr>

            @endforeach

            @endif

       </tbody>
     </table>



    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">

            {{$posts->render()}}

        </div>
    </div>



@stop