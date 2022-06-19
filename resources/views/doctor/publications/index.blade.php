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
                        <th>{{__('Photo')}}</th>
                        <th>{{__('Author')}}</th>
                        <th>{{__('Category')}}</th>
                        <th>{{__('Title')}}</th>
                        <th>{{__('Body')}}</th>
                        <th>{{__('Status')}}</th>
                        <th>{{__('Created At')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($publications)


                        @foreach($publications as $publication)

                            <tr>
                                <td>{{$publication->id}}</td>
                                <td><img height="50"
                                         src="{{$publication->photo ? $publication->photo->file : 'http://placehold.it/400x400' }} "
                                         alt=""></td>
                                <td>{{$publication->user->first_name}} {{$publication->user->last_name}}</td>
                                <td>{{$publication->publicationCategory ? $publication->publicationCategory->name : 'Uncategorized'}}</td>
                                <td>{{$publication->title}}</td>
                                <td>{{\Illuminate\Support\Str::limit($publication->body, 5)}}</td>
                                <td>
                                    <input data-id="{{$publication->id}}" class="toggle-class" type="checkbox"
                                           data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                           data-on="{{__('Active')}}"
                                           data-off="{{__('Not Active')}}" {{ $publication->status ? 'checked' : '' }}>
                                </td>
                                <td>{{$publication->created_at->diffForhumans()}}</td>
                                <td><a href="{{route('doctor.publications.edit', $publication->id)}}">{{__('Edit')}}</a>
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
                let status = $(this).prop('checked') == true ? 1 : 0;
                let publication_id = $(this).data('id');
                let data = {
                    "_token": "{{ csrf_token() }}",
                    status,
                    publication_id
                };
                console.log(data);
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '/doctor/publications/updateStatus',
                    data: data,
                    success: function (status) {
                        console.log(status.success)
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
