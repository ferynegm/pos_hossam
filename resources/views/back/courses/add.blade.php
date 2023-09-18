@extends('back.layouts.app')

@section('title')
    إضافة دورة
@endsection

@section('header')
    {{-- file upload --}}
    <link href="{{ url('back') }}/assets/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('back') }}/assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
    {{-- select2 --}}
	<link href="{{ url('back') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    
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
    <!-- select2 -->
    <script src="{{ url('back') }}/assets/libs/select2/js/select2.min.js"></script>

    <script>
        $(document).ready(function(){ $('.select2').select2(); });
    </script>

    <script>
        $(document).ready(function(){ var firstUpload = new FileUploadWithPreview('file_upload'); });
    </script>

    @include('back.courses.delete')
@endsection

@section('content')

    <div class="main-content">

        <div class="page-content">
            @if (auth()->user()->role_relation->courses_create == 1 )
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">إضافة دورة</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="row" data-select2-id="11">
                        <form action="{{ url('admin/courses/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12" data-select2-id="10">
                                {{-- basic_information --}}
                                <div class="card" style="background: #ECE5C7;">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <label for="name">اسم الدورة</label>
                                                    <i class="fas fa-star require_input"></i>
                                                    <input type="text" class="form-control" placeholder="اسم الدورة" id="name" name="name" value="{{ old('name') }}">
                                                    
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger text-bold">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                        
                                                <div class="col-md-3 col-12">
                                                    <label for="teacher">{{ trans('app.teacher') }}</label>
                                                    <select name="teacher"  class="form-control select2">
                                                        <option value="">---</option>
                                                        @foreach ($teachers as $teacher)
                                                            <option value="{{ $teacher->group_id }}">{{ $teacher->name }}</option>
                                                        @endforeach
                                                    </select>                                            
                                                </div>

                                                <div class="col-md-3 col-12">
                                                    <label for="whatsapp_teacher">رقم واتس اب المدرس</label>
                                                    <input type="number" class="form-control" placeholder="رقم واتس اب المدرس" id="whatsapp_teacher" name="whatsapp_teacher" value="{{ old('whatsapp_teacher') }}">                                   
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="description">وصف الدورة</label>
                                                    <i class="fas fa-star require_input"></i>
                                                    <input type="text" class="form-control" placeholder="وصف الدورة" id="description" name="description" value="{{ old('description') }}">
                                                    
                                                    @if ($errors->has('description'))
                                                        <span class="text-danger text-bold">{{ $errors->first('description') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                            
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <label for="image">صورة الدورة</label>
                                                    <input type="file" class="form-control" placeholder="صورة الدورة" id="image" name="image" value="{{ old('image') }}">
                                                    
                                                    @if ($errors->has('image'))
                                                        <span class="text-danger text-bold">{{ $errors->first('image') }}</span>
                                                    @endif
                                                </div>
                            
                                                <div class="col-md-4 col-12">
                                                    <label for="video">فديو الدورة</label>
                                                    <input type="file" class="form-control" placeholder="فديو الدورة" id="video" name="video" value="{{ old('video') }}">
                                                    
                                                    @if ($errors->has('video'))
                                                        <span class="text-danger text-bold">{{ $errors->first('video') }}</span>
                                                    @endif
                                                </div>
                                                
                                                <div class="col-md-4 col-12">
                                                    <label>{{ trans('app.status') }}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fa fa-check"></i></span>
                                                        <select name="status"  class="form-control">
                                                            <option value="1">{{ trans('app.active') }}</option>
                                                            <option value="0">{{ trans('app.not_active') }}</option>
                                                        </select>
                                                    </div>
                                                    <bold class="text-danger" id="errors-status" style="display: none;"></bold>
                                                </div>

                                            </div>
                                        </div>
                                            
                                        <div class="form-group mb-3">
                                            <div class="row">                                            
                                                <div class="col-md-4 col-12">
                                                    <label>تصنيف اللغات</label>
                                                    <select name="langs_filter[]"  class="form-control" multiple>
                                                        @foreach ($course_langs as $lang)                                                        
                                                            <option value="{{ $lang->lang }}">{{ $lang->lang }}</option>
                                                        @endforeach
                                                    </select>
                                                    <bold class="text-danger" id="errors-langs_filter" style="display: none;"></bold>
                                                </div>
                                                
                                                <div class="col-md-4 col-12">
                                                    <label>تصنيف العمر</label>
                                                    <select name="ages_filter[]"  class="form-control" multiple>
                                                        <option value="1">أطفال</option>
                                                        <option value="2">كبار</option>
                                                    </select>
                                                    <bold class="text-danger" id="errors-ages_filter" style="display: none;"></bold>
                                                </div>
                                                
                                                <div class="col-md-4 col-12">
                                                    <label>تصنيف المراحل الدراسية</label>
                                                    <select name="stages_filter[]"  class="form-control" multiple>
                                                        <option value="1">المرحلة الإبتدائية</option>
                                                        <option value="2">المرحلة الإعدادية</option>
                                                        <option value="3">المرحلة الثانوية</option>
                                                    </select>
                                                    <bold class="text-danger" id="errors-stages_filter" style="display: none;"></bold>
                                                </div>

                                            </div>
                                        </div>
                                        
                                        <br /><hr/><br />
                                        <div class="form-group mb-3">
                                            <div class="form-group mb-3">
                                                <div class="">
                                                    <label for="content">وصف الدورة</label>
                                                    <i class="fas fa-star require_input"></i>
                                                    <textarea class="ckeditor form-control cke_rtl" name="content">{{ old('content') }}</textarea>
                                                    
                                                    @if ($errors->has('content'))
                                                        <span class="text-danger text-bold">{{ $errors->first('content') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <br /><hr/><br />
                                        <div class="form-group mb-3">
                                            <div class="form-group mb-3">
                                                <div class="">
                                                    <label for="details">تفاصيل الدورة</label>
                                                    <i class="fas fa-star require_input"></i>
                                                    <textarea class="ckeditor form-control cke_rtl" name="details">{{ old('details') }}</textarea>
                                                    
                                                    @if ($errors->has('details'))
                                                        <span class="text-danger text-bold">{{ $errors->first('details') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <br /><hr/><br />
                                        <div class="form-group mb-3">
                                            <div class="form-group mb-3">
                                                <div class="">
                                                    <label for="sidebar">محتوي القسم الجانبي للدورة</label>
                                                    <i class="fas fa-star require_input"></i>
                                                    <textarea class="ckeditor form-control cke_rtl" name="sidebar">{{ old('sidebar') }}</textarea>
                                                    
                                                    @if ($errors->has('sidebar'))
                                                        <span class="text-danger text-bold">{{ $errors->first('sidebar') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-success waves-effect waves-light" id="save" style="display: block;width: 100%;">حفظ</button>
                                    </div>
                                </div>
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
