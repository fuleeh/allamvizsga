@extends('layouts.doctor')

@section('content')

@if(count($comments) > 0)
 
<table class="table">
    <thead>
      <tr>
        <th>Azonosító</th>
        <th>Író</th> 
        <th>Email</th> 
        <th>Törzs</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

            @foreach($comments as $comment)

		
		  <tr>	
	        <td>{{$comment->id}}</td> 
	        <td>{{$comment->author}}</td> 
	        <td>{{$comment->email}}</td> 
	        <td>{{$comment->body}}</td> 
	        <td><a href="{{route('home.post', $comment->post->id)}}"> Poszt</a></td>
	        <td>
	        	@if($comment->is_active == 1)
	        	
	        		 {!! Form::open(['method'=>'PATCH', 'action' => ['PostCommentController@update', $comment->id]]) !!}
					 <input type="hidden" value="0" name="is_active">
 
					 <div class="form-group">
					  {!! Form::submit('Elvet',['class' => 'btn btn-success']) !!}
					  
					 </div>

					 {!! Form::close() !!}
	        	
				@else
					 
	        		 {!! Form::open(['method'=>'PATCH', 'action' => ['PostCommentController@update', $comment->id]]) !!}
					 <input type="hidden" value="1" name="is_active">
 
					 <div class="form-group">
					  {!! Form::submit('Elfogad',['class' => 'btn btn-info']) !!}
					  
					 </div>

					 {!! Form::close() !!}
	        	@endif

	        </td>
	        <td>
	        	{!! Form::open(['method'=>'DELETE', 'action' => ['PostCommentController@destroy', $comment->id]]) !!}
					 <input type="hidden" value="1" name="is_active">
 
					 <div class="form-group">
					  {!! Form::submit('Törlés',['class' => 'btn btn-danger']) !!}
					  
					 </div>

					 {!! Form::close() !!}

					</td>
          </tr>

          @endforeach

        </tbody>
    </table>

    @else

    <h1 class="text-center">Nincsenek kommentek</h1>

    @endif



@stop