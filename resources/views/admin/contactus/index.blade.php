@extends('admin.layouts.master')
@section('title')
   @if ($type == 2)
   استماره الاستفسارات
   @elseif($type == 1)
   استماره المقالات
   @elseif($type == 3)
   استماره المنتجات
   @elseif($type == 4)
   استماره تفاصيل المنتجات
   @else
   استماره تواصل معانا
   @endif
@endsection
@section('css')



@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">   @if ($type == 2)
                    استماره الاستفسارات
                    @elseif($type == 1)
                    استماره المقالات
                    @elseif($type == 3)
                    استماره المنتجات
                    @elseif($type == 4)
                    استماره تفاصيل المنتجات
                    @else
                    استماره تواصل معانا
                    @endif</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/      @if ($type == 2)
                        استماره الاستفسارات
                        @elseif($type == 1)
                        استماره المقالات
                        @elseif($type == 3)
                        استماره المنتجات
                        @elseif($type == 4)
                        استماره تفاصيل المنتجات
                        @else
                        استماره تواصل معانا
                        @endif</span>
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
                    
                    
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('downloadContact',$type) }}" class="btn btn-success">تنزيل البيانات</a>
                        </div>
                    </div>
                
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table text-md-nowrap text-center" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>البريد الالكتروني</th>
                                <th>العنوان</th>
                                <th>الموضوع</th>
                                <th>الوصف</th>
                                <th>العمليات</th>

                            </tr>
                            </thead>
                            <tbody>

                            @forelse($data as $row)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                   
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->address}}</td>
                                    <td>{{$row->subject}}</td>
                                
                                <td>
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit{{ $row->id }}"><i class="fa fa-eye"></i></button>
                                </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleted{{ $row->id }}"><i class="fa fa-trash"></i></button>
                                    </td>

                                </tr>
                                @include('admin.contactus.notes')
                                @include('admin.contactus.deleted')
                            @empty
                                <tr>
                                    <td colspan="7" class="table-active text-center">No Data !</td>
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

@endsection
