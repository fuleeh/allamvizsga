@extends('layouts.doctor')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{__('Publications')}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="publications" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>{{__('Id')}}</th>
                        <th>{{__('Patient Category')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Address')}}</th>
                        <th>{{__('Phone Number')}}</th>
                        <th>{{__('Subscribe')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($patients)

                        @foreach($patients as $patient)

                            <tr>
                                <td>{{$patient->user_id}}</td>
                                <td>{{$patient->patient_category_id}}</td>
                                <td>{{$patient->first_name}} {{$patient->last_name}}</td>
                                <td>{{$patient->address}}</td>
                                <td>{{$patient->phone_number}}</td>
                                <td>
                                    <input data-id="{{$patient->user_id}}" class="toggle-class" type="checkbox"
                                           data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                           data-on="{{__('Accepted')}}"
                                           data-off="{{__('Not Accepted')}}" {{ $patient->isAccepted ? 'checked' : '' }}>
                                </td>
                            </tr>

                        @endforeach

                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    <script>
        $(function () {
            $('.toggle-class').change(function () {
                let isAccepted = $(this).prop('checked') == true ? 1 : 0;
                let patient_id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '/doctor/patients/updateStatus',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        isAccepted,
                        patient_id
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
