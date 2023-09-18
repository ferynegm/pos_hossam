@extends('back.layouts.app')

@section('title')
      تعديل باقات الاشتراكات للصف
      ( {{ $find['class_room_name'] }} )
@endsection

@section('header')
    <style>
        #counter{
            background: rgb(94, 94, 255);
            padding: 20px;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
            font-size: 20px;
        }
    </style>
@endsection

@section('footer')
    {{-- Count Down Timer --}}
    <script src="{{ asset('/back/assets/js') }}/yscountdown.min.js"></script> 
    <script>
        $(function(){
                var endDate = $("#end_time").text();
                var counterElement = document.querySelector("#counter");

                var myCountDown = new ysCountDown(endDate, function (remaining, finished) {
                var message = "";
                if (finished) {
                    message = "تم انتهاء العرض";
                } else {
                    message = remaining.totalDays + " يوم - ";
                    message += remaining.hours + " ساعة - ";
                    message += remaining.minutes + " دقيقة - ";
                    message += remaining.seconds + " ثانية ";
                }
                counterElement.textContent = message;
            });
        });
    </script>

    @include('back.table_prices.delete')
@endsection

@section('content')

    <div class="main-content">  

        <div class="page-content">
            @if (auth()->user()->role_relation->table_prices_update == 1 )
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">
                                    تعديل باقات الاشتراكات للصف
                                    <span style="color: red;">( {{ $find['class_room_name'] }} )</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row" data-select2-id="11">
                        <form action="{{ url('admin/table_prices/update/'.$find['id']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12" data-select2-id="10">
                                {{-- basic_information --}}
                                {{-- <div class="card" style="background: #ECE5C7;">
                                    <div class="card-body">
                                        <h4 class="card-title">باقة الاشتراك في كل المواد</h4>
                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="row">                                            
                                                

                                                <div class="col-md-10">
                                                    <label for="all_mat_heading_desc">وصف قبل صوره باقة كل المواد</label>
                                                    
                                                    <input id="all_mat_heading_desc" name="all_mat_heading_desc" type="text" class="form-control" placeholder="وصف قبل صوره باقة كل المواد" value="{{ old('all_mat_heading_desc', $find['all_mat_heading_desc']) }}">
                                                </div>
                                            </div>
                                        </div>
                                            
                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="">
                                                <label for="all_mat_body_desc">وصف باقة كل المواد</label>
                                                <input type="checkbox" class="small_unit_checkbox" name="all_mat_body_desc_status" id="all_mat_body_desc" {{ $find['all_mat_body_desc_status'] == 1 ? "checked" : "" }} value="{{ old('all_mat_body_desc_status', $find['all_mat_body_desc_status']) }}">

                                                <textarea class="ckeditor form-control" name="all_mat_body_desc" >{{ old('all_mat_body_desc', $find['all_mat_body_desc']) }}</textarea>
                                            </div>
                                        </div>
                                        
                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="row">                                            
                                                <div class="col-md-6">
                                                    <label for="all_mat_img_desc_status">صورة وصف باقة كل المواد</label>
                                                    <input type="checkbox" class="small_unit_checkbox" name="all_mat_img_desc_status" id="all_mat_img_desc_status" {{ $find['all_mat_img_desc_status'] == 1 ? "checked" : "" }} value="{{ old('all_mat_img_desc_status', $find['all_mat_img_desc_status']) }}">
                                                    
                                                    <input id="all_mat_img_desc" name="all_mat_img_desc" type="file" class="form-control" value="{{ old('all_mat_img_desc', $find['all_mat_img_desc']) }}">

                                                    <input name="all_mat_img_desc_hidden" type="hidden" value="{{ $find['all_mat_img_desc'] }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="all_mat_video_desc_status">فديو وصف باقة كل المواد</label>
                                                    <input type="checkbox" class="small_unit_checkbox" name="all_mat_video_desc_status" id="all_mat_video_desc_status" {{ $find['all_mat_video_desc_status'] == 1 ? "checked" : "" }}  value="{{ old('all_mat_video_desc_status', $find['all_mat_video_desc_status']) }}">
                                                    
                                                    <input id="all_mat_video_desc" name="all_mat_video_desc" type="file" class="form-control" value="{{ old('all_mat_video_desc', $find['all_mat_video_desc']) }}">

                                                    <input name="all_mat_video_desc_hidden" type="hidden" value="{{ $find['all_mat_video_desc'] }}">
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="row">                                            
                                                <div class="col-md-6">
                                                    <label for="all_mat_counter_heading">وصف ما قبل مدة باقة كل المواد</label>
                                                    <input id="all_mat_counter_heading" name="all_mat_counter_heading" type="text" class="form-control" placeholder="وصف ما قبل مدة الباقة" value="{{ old('all_mat_counter_heading', $find['all_mat_counter_heading']) }}">
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="all_mat_counter_from">مدة الباقة من</label>
                                                    <input id="all_mat_counter_from" name="all_mat_counter_from" type="datetime-local" class="form-control" value="{{ old('all_mat_counter_from', $find['all_mat_counter_from']) }}">
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="all_mat_counter_to">مدة الباقة إلي</label>
                                                    <input id="all_mat_counter_to" name="all_mat_counter_to" type="datetime-local" class="form-control" value="{{ old('all_mat_counter_to', $find['all_mat_counter_to']) }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <br>
                                <hr>
                                <br>
                                --}}
                            
                                <div class="card" style="background: #dfe6eb;">
                                    <div class="card-body">
                                        <br>
                                        <div class="form-group mb-3">
                                            <label for="class_room_name">الصف الدراسي</label>
                                            <i class="fas fa-star" style="color: red;font-size: 8px;float: left;top: 6px;position: relative;right: 3px;"></i>

                                            <input id="class_room_name" name="class_room_name" type="text" class="form-control" placeholder="الصف الدراسي" value="{{ old('class_room_name', $find['class_room_name']) }}">

                                            @if ($errors->has('class_room_name'))
                                                <span class="text-danger text-bold">{{ $errors->first('class_room_name') }}</span>
                                            @endif
                                        </div>
    {{-- 
                                        <div class="form-group mb-3">
                                            <div class="">
                                                <label for="one_mat_heading_desc">وصف قبل جدول باقة مادة واحدة</label>
                                                <i class="fas fa-star" style="color: red;font-size: 8px;float: left;top: 6px;position: relative;right: 3px;"></i>
                                                
                                                <input id="one_mat_heading_desc" name="one_mat_heading_desc" type="text" class="form-control" placeholder="وصف قبل صوره باقة كل المواد" value="{{ old('one_mat_heading_desc', $find['one_mat_heading_desc']) }}">

                                                @if ($errors->has('one_mat_heading_desc'))
                                                    <span class="text-danger text-bold">{{ $errors->first('one_mat_heading_desc') }}</span>
                                                @endif

                                            </div>
                                        </div> --}}
    {{--                                         
                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="">
                                                <label for="one_mat_body_desc">وصف باقة مادة واحدة</label>
                                                <i class="fas fa-star" style="color: red;font-size: 8px;float: left;top: 6px;position: relative;right: 3px;"></i>

                                                <textarea class="ckeditor form-control" name="one_mat_body_desc" >{{ old('one_mat_body_desc', $find['one_mat_body_desc']) }}</textarea>

                                                @if ($errors->has('one_mat_body_desc'))
                                                    <span class="text-danger text-bold">{{ $errors->first('one_mat_body_desc') }}</span>
                                                @endif
                                            </div>
                                        </div> --}}
                                            

                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="">
                                                <label for="one_mat_table_prices">جداول الاشتراكات</label>
                                                <i class="fas fa-star" style="color: red;font-size: 8px;float: left;top: 6px;position: relative;right: 3px;"></i>

                                                <textarea class="ckeditor form-control" name="one_mat_table_prices" id="one_mat_table_prices">{{ old('one_mat_table_prices', $find['one_mat_table_prices']) }}</textarea>

                                                @if ($errors->has('one_mat_table_prices'))
                                                    <span class="text-danger text-bold">{{ $errors->first('one_mat_table_prices') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    
                                        <br>
                                        <div class="form-group mb-3">
                                            <div class="row">                                            
                                                <div class="col-md-9">
                                                    <label for="one_mat_counter_heading">وصف لتاريخ انتهاء العرض</label>
                                                    <input id="one_mat_counter_heading" name="one_mat_counter_heading" type="text" class="form-control" placeholder="وصف لتاريخ انتهاء العرض" value="{{ old('one_mat_counter_heading', $find['one_mat_counter_heading']) }}">
                                                </div>

                                                {{-- <div class="col-md-3">
                                                    <label for="one_mat_counter_from">مدة الباقة من</label>
                                                    <input id="one_mat_counter_from" name="one_mat_counter_from" type="datetime-local" class="form-control" value="{{ old('one_mat_counter_from', $find['one_mat_counter_from']) }}">
                                                </div> --}}
                                                
                                                <div class="col-md-3">
                                                    <label for="one_mat_counter_to">تاريخ إنتهاء الباقة</label>
                                                    <input id="one_mat_counter_to" name="one_mat_counter_to" type="datetime-local" class="form-control" value="{{ old('one_mat_counter_to', $find['one_mat_counter_to']) }}">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <br>
                                        <div id="counter" class="text-center"></div>

                                        <p id="end_time" style="display: none;">
                                            {{ \Carbon\Carbon::parse($find['one_mat_counter_to'])->format('Y-m-d H:i') }}
                                        </p>


                                        <br><br><hr><br><br>
                                        <div class="form-group mb-3">
                                            <div class="">
                                                <label for="arabic_lessons_time">جدول العربي</label>
                                                <i class="fas fa-star" style="color: red;font-size: 8px;float: left;top: 6px;position: relative;right: 3px;"></i>

                                                <textarea class="ckeditor form-control" name="arabic_lessons_time" id="arabic_lessons_time">{{ old('arabic_lessons_time', $find['arabic_lessons_time']) }}</textarea>

                                                @if ($errors->has('arabic_lessons_time'))
                                                    <span class="text-danger text-bold">{{ $errors->first('arabic_lessons_time') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                            
                                        <br><br><hr><br><br>
                                        <div class="form-group mb-3">
                                            <div class="">
                                                <label for="english_lessons_time">جدول اللغات</label>
                                                <i class="fas fa-star" style="color: red;font-size: 8px;float: left;top: 6px;position: relative;right: 3px;"></i>

                                                <textarea class="ckeditor form-control" name="english_lessons_time" id="english_lessons_time">{{ old('english_lessons_time', $find['english_lessons_time']) }}</textarea>

                                                @if ($errors->has('english_lessons_time'))
                                                    <span class="text-danger text-bold">{{ $errors->first('english_lessons_time') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <br><br>

                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="submit" class="btn btn-success waves-effect waves-light" id="save" style="display: block;width: 100%;height: 50px;">تعديل</button>
                                        </div>
                                        
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
