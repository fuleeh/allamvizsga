@extends('layouts.doctor')

@section('content')

@if(count($replies) > 0)
 
<table class="table">
    <thead>
      <tr>
        <th>Azonosító</th>
        <th>Író</th> 
        <th>Email</th> 
        <th>Törs</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

            @foreach($replies as $reply)

		
		  <tr>	
	        <td>{{$reply->id}}</td> 
	        <td>{{$reply->author}}</td> 
	        <td>{{$reply->email}}</td> 
	        <td>{{$reply->body}}</td> 
	        <td><a href="{{route('home.post', $reply->comment->post->id)}}"> Poszt</a></td>
	        <td>
	        	@if($reply->is_active == 1)
	        	
	        		 {!! Form::open(['method'=>'PATCH', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}
					 <input type="hidden" value="0" name="is_active">
 
					 <div class="form-group">
					  {!! Form::submit('Elvet',['class' => 'btn btn-success']) !!}
					  
					 </div>

					 {!! Form::close() !!}
	        	
				@else
					 
	        		 {!! Form::open(['method'=>'PATCH', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}
					 <input type="hidden" value="1" name="is_active">
 
					 <div class="form-group">
					  {!! Form::submit('Elfogad',['class' => 'btn btn-info']) !!}
					  
					 </div>

					 {!! Form::close() !!}
	        	@endif

	        </td>
	        <td>
	        	{!! Form::open(['method'=>'DELETE', 'action' => ['CommentRepliesController@destroy', $reply->id]]) !!}
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

    <h1 class="text-center">Nincsenek válaszok</h1></h1>

    @endif



@stop