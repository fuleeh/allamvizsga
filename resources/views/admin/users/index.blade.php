@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{session('deleted_user')}}</p>
    @endif

    <h1>Users</h1>

    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Email Confirmated at</th>
            <th>Created at</th>
            <th>Modified at</th>
            <th>Edit User</th>
          </tr>
        </thead>
        <tbody>

            @if($users)

                @foreach($users as $user)

          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->first_name}}</a></td>
            <td>{{$user->last_name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->getRoleNames()->first()}}</td>
            <td>{{$user->email_verified_at}}</td>

            {{--
            <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
            --}}
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
            <td><a href="{{route('admin.users.edit', $user->id)}}">Edit</td>
          </tr>
         
                @endforeach

            @endif

        </tbody>
      </table>

@stop