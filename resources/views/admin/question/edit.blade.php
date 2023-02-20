@extends('admin.layouts.master')
@section('title')
    تعديل البيانات
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
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
                <div class="card-body">
                    <form action="{{route('question.update','test')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{$data->id}}">

                        <div class="row">
                            <div class="col">
                                <label>الاسم السوال بالغه العربيه</label>
                                <input type="text" name="name" value="{{$data->getTranslation('name','ar')}}"
                                       class="form-control @error('name') is-invalid @enderror">
                            </div>

                            <div class="col">
                                <label>الاسم السوال بالغه الانجليزيه</label>
                                <input type="text" name="name_en" value="{{$data->getTranslation('name','en')}}"
                                       class="form-control @error('name') is-invalid @enderror">
                            </div>
                        </div>


                        <br>
                        <div class="row">
                            <div class="col">
                                <label>الاجايه بالغه العربيه </label>
                                <textarea class="form-control" name="notes" rows="5" id="summernote">
                        {{$data->getTranslation('notes','ar')}}
                                </textarea>
                            </div>
                        </div>

                        <br>


                        <div class="row">
                            <div class="col">
                                <label>الاجايه بالغه الانجليزيه</label>
                                <textarea class="form-control" name="notes_en" rows="5" id="summernote2">
                            {{$data->getTranslation('notes','en')}}
                                </textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>ملف </label>
                                <input type="file" name="bdf" id="image_updload_bdf" multiple accept="application/pdf" class="file-input-overview">
                                <input type="hidden" name="oldfile_dbf" value="{{$data->bdf->Filename ?? ''}}">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">تحديث</button>
                            </div>
                        </div>

                    </form>
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

    <script>
        $(function () {
            $("#image_updload").fileinput({
                theme: "fa5",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    @if($data->photo)
                        "{{asset('admin/pictures/question/' . $data->id . '/'  . $data->photo->Filename)}}"
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',

                @if($data->photo)
                initialPreviewConfig: [
                    {
                        caption: "{{$data->photo->Filename}}",
                        size: '111',
                        width: "120px",
                        url: "{{route('question_photo_remove_image',['data_id' => $data->id,'photo_id' => $data->photo->id ,'photo_name' => $data->photo->Filename, '_token' => csrf_token()])}}",
                        key: {{$data->photo->id}}
                    }
                ]
                @endif

            });
        });
    </script>

    <script>
        $(function () {
            $("#image_updload_bdf").fileinput({
                theme: "fa5",
                maxFileCount: 1,
                allowedFileTypes: ['pdf'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    @if($data->pdf)
                        "{{asset('admin/bdf/question/' . $data->id . '/'  . $data->pdf->Filename)}}"
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'pdf',
                @if($data->bdf)
                initialPreviewConfig: [
                    {
                        type: "pdf",
                        caption: "{{$data->pdf->Filename}}",
                        size: '111',
                        width: "120px",
                        url: "{{route('question_remove_image',['data_id' => $data->id,'photo_id' => $data->pdf->id ,'photo_name' => $data->pdf->Filename, '_token' => csrf_token()])}}",
                        key: {{$data->pdf->id}}
                    }
                ]
                @endif

            });
        });
    </script>
@endsection
