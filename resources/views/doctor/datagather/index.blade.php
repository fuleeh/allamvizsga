@extends('layouts.doctor')

@section('content')


    <h1>{{__('Requests')}}</h1>

    <table class="table">
        <thead>
        <tr>
            <th>{{__('Patient')}}</th>
            <th>{{__('Start Time')}}</th>
            <th>{{__('End Time')}}</th>
            <th>{{__('Glucose and Carbs Frequency')}}</th>
            <th>{{__('Bolus Serving Frequency')}}</th>
            <th>{{__('Activity')}}</th>
            <th>{{__('Status')}}</th>
            <th>{{__('Created At')}}</th>
        </thead>
        <tbody>

        @if($requests)


            @foreach($requests as $req)

                <tr>
                    <td>{{$req->first_name}} {{$req->last_name}}</td>
                    <td>{{$req->start_time}}</td>
                    <td>{{$req->end_time}}</td>
                    <td>{{$req->glucose_carbs_freq}}</td>
                    <td>{{$req->bolus_serving_freq}}</td>
                    <td>{{$req->activity_freq}}</td>
                    <td>
                        <input data-id="{{$req->id}}" class="toggle-class" type="checkbox"
                               data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                               data-on="{{__('Active')}}"
                               data-off="{{__('Expired')}}" {{ $req->status ? 'checked' : '' }}>
                    </td>
                    <td>{{$req->created_at->diffForhumans()}}</td>
                </tr>

            @endforeach

        @endif

        </tbody>
    </table>
@stop

@section('scripts')
    <script>
        $(function () {
            $('.toggle-class').change(function () {
                let status = $(this).prop('checked') == true ? 1 : 0;
                let datagather_id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '/doctor/datagather/requests/updateStatus',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        status,
                        datagather_id
                    },
                    success: function (data) {
                        console.log(data.success)
                    }, error(xhr, textStatus, error) {
                        console.log(xhr.statusText);
                        console.log(textStatus);
                        console.log(error);
                    }

                });
            })
        });
    </script>
@stop


