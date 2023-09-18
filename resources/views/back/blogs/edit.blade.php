@extends('back.layouts.app')

@section('title')
     ( {{ $find['title'] }} )تعديل مقال 
@endsection

@section('header')
    <link href="{{ url('back') }}/assets/css/semantic.min.css" rel="stylesheet" type="text/css" />
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

    
    <style>
        @media screen and (min-width: 481px) and (max-width: 768px) { 
            .main-content .offcanvas {
                width: 90%;
            }
        }
        @media (min-width: 768px) { /* Tablet */
            .main-content .offcanvas {
                width: 90%;
            }
        }
        @media (min-width: 992px){ /* Large Screen */
            .main-content .offcanvas {
                width: 70%;
            }
        }
    </style>

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

    @include('back.blogs.other_scripts')
    @include('back.blog_comment.delete')
@endsection

@section('content')

    <div class="main-content">
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel"></h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <h4 class="text-center" style="margin: 100px auto;">@lang('app.loading') ...</h4>
            </div>
        </div>

        <div class="page-content">
            @if (auth()->user()->role_relation->blog_update == 1 )  
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">
                                    تعديل مقال
                                    <span style="color: red;">( {{ $find['title'] }} )</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="row" data-select2-id="11">
                        <form action="{{ url('admin/blogs/update/'.$find['id']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12" data-select2-id="10">
                                {{-- basic_information --}}
                                <div class="card" style="background: #ECE5C7;">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <label for="title">@lang('app.title')</label>
                                                    <i class="fas fa-star require_input"></i>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                                        <input type="text" class="form-control" placeholder="{{ trans('app.title') }}" id="title" name="title" value="{{ old('title', $find['title']) }}">
                                                    </div>
                                                    
                                                    @if ($errors->has('title'))
                                                        <span class="text-danger text-bold">{{ $errors->first('title') }}</span>
                                                    @endif
                                                </div>
                            
                                                <div class="col-md-3">
                                                    <label for="category">{{ trans('app.category') }}</label>
                                                    <i class="fas fa-star require_input"></i>
                                                    <select name="category"  class="form-control select2">
                                                        <option value="">---</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}" {{ $category->id == $find['category'] ? "selected" : null }} >{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                    @if ($errors->has('category'))
                                                        <span class="text-danger text-bold">{{ $errors->first('category') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                            
                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="date">{{ trans('app.date') }}</label>
                                                    <i class="fas fa-star require_input"></i>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                        <input type="datetime-local" class="form-control" placeholder="{{ trans('app.date') }}" id="date" name="date" value="{{ $find['date'] }}">
                                                    </div>
                                                    <bold class="text-danger" id="errors-date" style="display: none;"></bold>
                                                </div>
                            
                                                <div class="col-md-4">
                                                    <label for="author">{{ trans('app.author') }}</label>
                                                    <i class="fas fa-star require_input"></i>
                                                    <select name="author"  class="form-control select2">
                                                        <option value="">---</option>
                                                        @foreach ($admins as $admin)
                                                            <option value="{{ $admin->name }}" {{ $admin->name == $find['author'] ? "selected" : null }} >{{ $admin->admin_name['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                    <bold class="text-danger" id="errors-author" style="display: none;"></bold>
                                                </div>
                            
                                                <div class="col-md-4">
                                                    <label>{{ trans('app.status') }}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fa fa-check"></i></span>
                                                        <select name="status"  class="form-control">
                                                            <option value="1" {{ $find['status'] == 1 ? "selected" : null }} >{{ trans('app.active') }}</option>
                                                            <option value="0" {{ $find['status'] == 0 ? "selected" : null }} >{{ trans('app.not_active') }}</option>
                                                        </select>
                                                    </div>
                                                    <bold class="text-danger" id="errors-status" style="display: none;"></bold>
                                                </div>
                                            </div>
                                        </div>

                                        <br />
                                        <div class="form-group mb-3">
                                            <div class="form-group mb-3">
                                                <div class="">
                                                    <label for="description">{{ trans('app.description') }}</label>
                                                    <i class="fas fa-star require_input"></i>
                                                    <textarea class="ckeditor form-control cke_rtl" name="description">{{ old('description', $find['description']) }}</textarea>
                                                    
                                                    @if ($errors->has('description'))
                                                        <span class="text-danger text-bold">{{ $errors->first('description') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <br />
                                        <div class="form-group mb-3">
                                            <div class="custom-file-container" data-upload-id="file_upload">
                                                <label style="color: #555;">{{ trans('app.image') }}
                                                    <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">
                                                        <i class="fa fa-trash-alt" style="color: rgb(221, 7, 7);font-size: 15px;position: relative;top: 3px;margin: 0px 15px 10px;"></i>
                                                    </a>
                                                </label>
                                                <label class="custom-file-container__custom-file" >
                                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" name="image">
                                                    <input type="hidden" name="image_hidden" value="{{ $find['image'] }}"/>
                                                    <span class="custom-file-container__custom-file__custom-file-control text-center"></span>
                                                </label>
                                                <div class="custom-file-container__image-preview"></div>
                                                
                                                @if ($errors->has('image'))
                                                    <span class="text-danger text-bold">{{ $errors->first('image') }}</span>
                                                @endif
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

                    <br>
                    <hr>

                    <div class="mt-5" id="comments_class" style="background: #fff;padding: 30px 20px;">
                        <div class="comments_class">
                            <h5>التعليقات :
                                <span class="comments_length" style="color: red;font-size: 18px;font-weight: bold;">[ {{ $blog_comments_length }} ]</span>

                                <div class="list-inline float-sm-end mb-sm-0 destroy_all_comment">
                                    @isset($blog_comments[0]['blog'])      
                                        <a class="delete btn btn-danger" loop_id="{{ $blog_comments[0]['blog'] }}">
                                            <i class="fas fa-trash-alt" style="margin: 0px 5px;"></i>
                                            حذف كل التعليقات
                                        </a>
                                    @endisset
                                </div>
                            </h5>

                            <br>
                            @foreach ($blog_comments as $comment)
                                <div class="d-flex py-3 border-bottom comments_loop">
                                    <div class="flex-shrink-0 me-3" style="width: 30px;height: 30px;background: #556ee6;text-align: center;line-height: 31px;border-radius: 50%;color: #fff;">
                                        <i class="fas fa-comment"></i>
                                    </div>
                            
                                    <div class="flex-grow-1">
                                        <h5 class="mb-1 font-size-18" style="font-weight: bold;">
                                                {{  $comment->author_name_blog_comment['name'] }}
                                                @if ($comment->status == 1)
                                                    <span style="color: rgb(30, 155, 30);font-size: 13px;margin: 0px 20px;"> مفعل </span>
                                                @else
                                                    <span style="color: red;font-size: 13px;margin: 0px 20px;">غير مفعل </span>
                                                @endif
                                        </h5>
                                        <h5 class="mb-1 font-size-15">{{ $comment->comment }}</h5>
                                        <div class="text-muted font-size-14" style="margin-top: 13px;">
                                            <i class="far fa-calendar-alt text-primary me-1"></i>
                                            <span style="margin: 0px 2px;color: red;text-decoration: underline;">{{ \Carbon\Carbon::parse($comment->created_at)->format('Y-m-d') }}</span>

                                            <span style="margin: 0px 2px;color: blue;text-decoration: underline;">{{ \Carbon\Carbon::parse($comment->created_at)->format('h:i a') }}</span>

                                            <ul class="list-inline float-sm-end mb-sm-0">
                                                <li class="list-inline-item" style="cursor: pointer;">
                                                    <a class="bt_modal" act="{{ url('admin/blog_comment/edit/'.$comment->id) }}" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fas fa-pencil-alt" style="margin: 0px 5px;"></i>تعديل</a>
                                                </li>
                                                <li class="list-inline-item" style="cursor: pointer;">
                                                    <a class="text-danger delete" loop_id="{{ $comment->id }}"><i class="fas fa-trash-alt" style="margin: 0px 5px;"></i>حذف</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>                            
                                </div>
                            @endforeach
                        </div>
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
