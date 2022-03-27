@extends('layouts.doctor')

@section('content')


    <h1>Posts</h1>


    <table class="table">
        <thead>
        <tr>
            <th>User</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Frequency</th>
            <th>Fields</th>
            <th>Created At</th>
        </thead>
        <tbody>

        @if($requests)


            @foreach($requests as $req)

                <tr>
                    <td>{{$req->user_id}}</td>
                    <td>{{$req->freq_start}}</td>
                    <td>{{$req->freq_end}}</td>
                    <td>{{$req->frequency}}</td>
                    <td>{{$req->fields}}</td>
                    <td>{{$req->created_at->diffForhumans()}}</td>
                </tr>

            @endforeach

        @endif

        </tbody>
    </table>
@stop
