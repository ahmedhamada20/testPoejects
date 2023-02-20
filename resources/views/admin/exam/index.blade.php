@extends('admin.layouts.master')
@section('title')
   الاختبارات
@endsection
@section('css')




@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاختبارات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  الاختبارات</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="flash-message"></div>

                    <div class="row">
                        <div class="col">
                            @can('create-exam')
                            <a href="{{route('exam.create')}}" class="btn btn-success">اضافه جديده</a>
                            @endcan

                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            @include('admin.exam.search')
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table text-md-nowrap text-center" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>answer One</th>
                                <th>answer Two</th>
                                <th>answer</th>
                                <th>time</th>
                                <th>status</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            @forelse($data as $row)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->answer_one}}</td>
                                    <td>{{$row->answer_two}}</td>
                                    <td>{{$row->answer}}</td>
                                    <td>{{$row->time}} دقائق</td>
                                    <td>
                                        <input data-id="{{$row->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $row->status ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        @can('edit-exam')
                                        <a href="{{route('exam.edit',$row->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('deleted-exam')
                                            @endcan
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleted{{$row->id}}"><i class="fa fa-trash"></i></button>
                                    </td>
                                    @include('admin.exam.deleted')

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="table-active text-center">No Data !</td>
                                </tr>
                            @endforelse
                        </table>
                        {{ $data->render("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>



        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{route('updateExamStatus')}}',
                    data: {'status': status, 'user_id': user_id},
                    success:function(data) {
                        toastr.success('Data Update Successfully');
                    }
                });
            })
        })
    </script>


@endsection
