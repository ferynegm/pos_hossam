@extends('back.layouts.app')

@section('title')
    {{ trans('app.teacher') }}
@endsection

@section('header')
    {{-- file upload --}}
    <link href="{{ url('back') }}/assets/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('back') }}/assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

@endsection

@section('footer')
    <!-- file-upload -->
    <script src="{{ url('back') }}/assets/file-upload-with-preview.min.js"></script>
    <script src="{{ url('back') }}/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script> $(document).ready(function(){ var firstUpload = new FileUploadWithPreview('file_upload'); }); </script>


    <script>
        $(document).ready(function () {
            $("form .buttons_videos_section .add").click(function(e){ 
                e.preventDefault();
                if($(".videos_section .video_link:last").val() == ""){
                    alert('لايمكن إضافة صف جديد هناك صف فارغ يجب ملؤه اولا !!');
                }else{                  
                    $(".videos_section").append(`
                        <div class="row">
                            <div class="col-md-4">
                                <label for="video_link">{{ trans('app.video_link') }}</label>
                                <input type="text" class="form-control video_link" name="video_link[]" placeholder="{{ trans('app.video_link') }}" value="{{ old('video_link') }}">
                                @if ($errors->has('video_link'))
                                    <span class="text-danger text-bold">{{ $errors->first('video_link') }}</span>
                                @endif
                            </div>
    
                            <div class="col-md-6">
                                <label for="video_desc">{{ trans('app.video_desc') }}</label>
                                <input type="text" class="form-control" name="video_desc[]" placeholder="{{ trans('app.video_desc') }}" value="{{ old('video_desc') }}">
                                @if ($errors->has('video_desc'))
                                    <span class="text-danger text-bold">{{ $errors->first('video_desc') }}</span>
                                @endif
                            </div>
    
                            <div class="col-md-2 buttons_videos_section">
                                <label for="action">حذف</label>
                                <br>
                                <button class="btn btn-danger btn-sm delete" style="width: 50px;height: 34px;">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    `);
                }
                
            });
        });
    </script>

    <script>
        $("form").on("click", ".buttons_videos_section .delete", function(e) {
            e.preventDefault();
            $(this).closest(".row").remove();
        });
    </script>

    @include('back.teacher.delete')
@endsection

@section('content')

    <div class="main-content">

        <div class="page-content">
            @if (auth()->user()->role_relation->teachers_create == 1 )
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">{{ trans('app.teacher') }}</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="row" data-select2-id="11">
                        <form action="{{ url('admin/teacher/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12" data-select2-id="10">
                                {{-- basic_information --}}
                                <div class="card" style="background: #ECE5C7;">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <div class="row">                                            
                                                <div class="col-md-3">
                                                    <label for="name">{{ trans('app.name') }}</label>
                                                    <i class="fas fa-star" style="color: red;font-size: 8px;float: left;top: 6px;position: relative;right: 3px;"></i>

                                                    <input id="name" name="name" type="text" class="form-control" placeholder="{{ trans('app.name') }}" value="{{ old('name') }}">

                                                    @if ($errors->has('name'))
                                                        <span class="text-danger text-bold">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                                
                                                <div class="col-md-3">
                                                    <label for="job">{{ trans('app.job') }}</label>
                                                    <i class="fas fa-star" style="color: red;font-size: 8px;float: left;top: 6px;position: relative;right: 3px;"></i>

                                                    <input id="job" name="job" type="text" class="form-control" placeholder="{{ trans('app.job') }}" value="{{ old('job') }}">

                                                    @if ($errors->has('job'))
                                                        <span class="text-danger text-bold">{{ $errors->first('job') }}</span>
                                                    @endif
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="gender">{{ trans('app.gender') }}</label>
                                                    <select name="gender"  class="form-control">
                                                        <option value="1">{{ trans('app.male') }}</option>
                                                        <option value="0">{{ trans('app.female') }}</option>
                                                    </select>

                                                    @if ($errors->has('gender'))
                                                        <span class="text-danger text-bold">{{ $errors->first('gender') }}</span>
                                                    @endif
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="status">{{ trans('app.status') }}</label>
                                                    <select name="status"  class="form-control">
                                                        <option value="1">{{ trans('app.active') }}</option>
                                                        <option value="0">{{ trans('app.not_active') }}</option>
                                                    </select>

                                                    @if ($errors->has('status'))
                                                        <span class="text-danger text-bold">{{ $errors->first('status') }}</span>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                            
                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="">
                                                <label for="image">{{ trans('app.image') }}</label>
                                                <input type="file" class="form-control" name="image">
                                                @if ($errors->has('image'))
                                                    <span class="text-danger text-bold">{{ $errors->first('image') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="">
                                                <label for="description">{{ trans('app.description') }}</label>
                                                <textarea class="form-control ckeditor" name="description" >{{ old('description') }}</textarea>
                                            </div>
                                        </div>

                                            
                                        <br>
                                        <div class="form-group mb-3 videos_section">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="video_link">{{ trans('app.video_link') }}</label>
                                                    <input type="text" class="form-control video_link" name="video_link[]" placeholder="{{ trans('app.video_link') }}" value="{{ old('video_link') }}">
                                                    @if ($errors->has('video_link'))
                                                        <span class="text-danger text-bold">{{ $errors->first('video_link') }}</span>
                                                    @endif
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="video_desc">{{ trans('app.video_desc') }}</label>
                                                    <input type="text" class="form-control" name="video_desc[]" placeholder="{{ trans('app.video_desc') }}" value="{{ old('video_desc') }}">
                                                    @if ($errors->has('video_desc'))
                                                        <span class="text-danger text-bold">{{ $errors->first('video_desc') }}</span>
                                                    @endif
                                                </div>

                                                <div class="col-md-2 buttons_videos_section">
                                                    <label for="action">اضافة</label>
                                                    <br>
                                                    <button class="btn btn-primary btn-sm add" style="width: 50px;height: 34px;">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-success waves-effect waves-light" id="save">حفظ</button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <h4 class="text-center" style="margin: 100px auto;">
                    لاتمتلك الصلاحيات لرؤيه محتوي الصفحة
                    <img src="{{ url('back/images/rej2.png') }}" style="width: 80px;height: 78px;position: relative;bottom: 7px;bo"/>
                </h4>
            @endif    

        </div>

        {{-- Include Footer --}}
        @include('back.layouts.footer')
    </div>
@endsection
