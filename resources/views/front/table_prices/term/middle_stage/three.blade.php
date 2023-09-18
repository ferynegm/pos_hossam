@extends('front.layouts.app')

@section('title')
    {{ $find['class_room_name'] }}
@endsection

@section('header')
    <style>
        .sticky-top{
            top: 85px;
            z-index: 9;
        }

        .rbt-course-action-bottom{
            background: #E44D26;
            background: -webkit-linear-gradient(to right, #F16529, #ff9456);  
            background: linear-gradient(to right, #F16529, #ff9456); 
        }

        .countdown-container{
            background: #E44D26;
            background: -webkit-linear-gradient(to right, #F16529, #E44D26);  
            background: linear-gradient(to right, #F16529, #E44D26); 
            color: #fff;
            font-weight: bold;
            padding: 30px 25px;
            border-radius: 20px;
            font-size: 30px;
            border: 10px solid #fff;
        }
        
        .expired_div, .expired_div_2{
            color: #fff !important;
            background: #E44D26; 
            background: -webkit-linear-gradient(to right, #F16529, #E44D26); 
            background: linear-gradient(to right, #F16529, #E44D26); 
            font-weight: bold;
            border-radius: 15px;
            font-size: 30px;
        }

        .mainmenu li{
            font-weight: bold;
        }

                
        @media screen and (max-width:768px) {        
            .table_responsive table{
                overflow: auto;
                display: block;
                width: 100% !important;
            }
            
            .countdown-container{
                padding: 16px;
                font-size: 20px;
                text-align: center;
            }
        }

        .fancy {
            --b: 6px;   /* control the border thickness */
            --w: 80px;  /* control the width of the line*/
            --g: 15px;  /* control the gap */
            --c: #0B486B;
            width: fit-content;
            padding: 0 1em;
            line-height: 1.6em;
            border: 1px solid;
            color: #fff;
            background: 
                conic-gradient(from   45deg at left ,var(--c) 25%,#0000 0) 0,
                conic-gradient(from -135deg at right,var(--c) 25%,#0000 0) 100%;
            background-size: 51% 100%;
            background-origin: border-box;
            background-repeat: no-repeat;
            border-image: 
                linear-gradient(
                #0000      calc(50% - var(--b)/2),
                var(--c) 0 calc(50% + var(--b)/2),
                #0000    0) 
                1/0 var(--w)/calc(var(--w) + var(--g));
            margin-inline: auto;
            font-size: 1.8rem;
        }

    </style>
@endsection

@section('footer')
    <script>
        $(document).ready(function () {            
            $("table").attr('class', 'table table-hover dt-responsive table-striped table-bordered');
        });
    </script>


    {{-- Count Down Timer --}}
    
    <script src="{{ asset('/back/assets/js') }}/yscountdown.min.js"></script>     
    <script>
        $(function(){
                var endDate = $(".end_time").text();
                var expiredDiv = document.querySelector(".expired_div");
                var dateDiv = document.querySelector(".date_div");
                var hourDiv = document.querySelector(".hour_div");
                var minuteDiv = document.querySelector(".minute_div");
                var secondDiv = document.querySelector(".second_div");

                var myCountDown = new ysCountDown(endDate, function (remaining, finished) {

                if (finished) {

                    $(".countdown-style-1").remove();
                    $(".expired_div").css({
                        // "background": "#C70039",
                        "fontWeight": "bold",
                        "padding": "35px 15px",
                        "fontSize": "30px",
                        "border": "10px solid #fff",
                    });

                    expiredDiv.textContent = "تم انتهاء العرض";

                } else {
                    dateDiv.textContent = remaining.totalDays;
                    hourDiv.textContent = remaining.hours;
                    minuteDiv.textContent = remaining.minutes;
                    secondDiv.textContent = remaining.seconds;
                }

            });
        });
    </script>

    <script>
        $(function(){
                var endDate = $(".end_time_2").text();
                var expiredDiv = document.querySelector(".expired_div_2");
                var dateDiv = document.querySelector(".date_div_2");
                var hourDiv = document.querySelector(".hour_div_2");
                var minuteDiv = document.querySelector(".minute_div_2");
                var secondDiv = document.querySelector(".second_div_2");

                var myCountDown = new ysCountDown(endDate, function (remaining, finished) {

                if (finished) {

                    $(".countdown-style-1").remove();
                    $(".expired_div_2").css({
                        // "background": "#C70039",
                        "fontWeight": "bold",
                        "padding": "35px 15px",
                        "fontSize": "30px",
                        "border": "10px solid #fff",
                    });

                    expiredDiv.textContent = "تم انتهاء العرض";

                } else {
                    dateDiv.textContent = remaining.totalDays;
                    hourDiv.textContent = remaining.hours;
                    minuteDiv.textContent = remaining.minutes;
                    secondDiv.textContent = remaining.seconds;
                }

            });
        });
    </script>


@endsection

@section('content')
<a class="close_side_menu" href="javascript:void(0);"></a>
        
    <div class="rbt-page-banner-wrapper bg-gradient-11" style="padding: 60px 0px 80px;">
        <div class="rbt-banner-image"></div>
        <div class="rbt-banner-content">
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-inner text-center">
                                <h2 class="title">{{ $find['class_room_name'] }}</h2>
                                <ul class="page-list text-center">
                                    <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                                    <li>
                                        <div class="icon-left"><i class="feather-chevron-left"></i></div>
                                    </li>
                                    <li class="rbt-breadcrumb-item"><a href="{{ url('/table_prices/term') }}">الترم/مسار مصري - سفارة</a></li>
                                    <li>
                                        <div class="icon-left"><i class="feather-chevron-left"></i></div>
                                    </li>
                                    <li class="rbt-breadcrumb-item"><a href="{{ url('/table_prices/term/primary_stage') }}">المرحله الابتدائية</a></li>
                                    <li>
                                        <div class="icon-left"><i class="feather-chevron-left"></i>{{ $find['class_room_name'] }}</div>
                                    </li>
                                    <li class="rbt-breadcrumb-item active"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="rbt-course-details-area ptb--60">
        <div class="container">
            <div class="row g-5">
                <div class="col-xs-12">
                    <div class="course-details-content text-center">                        
                        <div class="rbt-inner-onepage-navigation sticky-top mt--30 bg-gradient-2">
                            <nav class="mainmenu-nav onepagenav">
                                <ul class="mainmenu">
                                    <li class="current">
                                        <a href="#packages">اختر الباقة</a>
                                    </li>
                                    <li>
                                        <a href="#arabic_table">جدول حصص العربي</a>
                                    </li>
                                    <li>
                                        <a href="#english_table">جدول حصص اللغات</a>
                                    </li>
                                    <li>
                                        <a href="#register_now">نعم أريد الاستفادة بالخصم</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>                    
                        <br />

                        @if ($find['one_mat_counter_to'] != null )
                            <div>
                                <p class="end_time" style="display: none;">
                                    {{ \Carbon\Carbon::parse($find['one_mat_counter_to'])->format('Y-m-d H:i') }}
                                </p>
                                <p style="padding: 10px;margin-top: 20px;font-weight: bold;margin-bottom: -20px;color: #555;padding-bottom: 35px;" >
                                    {{ implode(' ', array_slice(explode(' ', $find['one_mat_counter_heading']), 0, 15)) }}
                                    <br>
                                    {{ implode(' ', array_slice(explode(' ', $find['one_mat_counter_heading']), 15, )) }}
                                
                                </p>
                                <div class="countdown-style-1 mt--50 justify-content-center">
                                    <div class="justify-content-center row">
                                        <div class="countdown-container color-box col-lg-2 col-3">
                                            <span class="countdown-value days-bottom date_div"></span>
                                            <br>
                                            <span class="countdown-heading text-center days-top">يوم</span>
                                        </div>

                                        <div class="countdown-container color-box col-lg-2 col-3">
                                            <span class="countdown-value days-bottom hour_div"></span>
                                            <br>
                                            <span class="countdown-heading text-center days-top">ساعة</span>
                                        </div>

                                        <div class="countdown-container color-box col-lg-2 col-3">
                                            <span class="countdown-value days-bottom minute_div" ></span>
                                            <br>
                                            <span class="countdown-heading text-center days-top">دقيقة</span>
                                        </div>

                                        <div class="countdown-container color-box col-lg-2 col-3">
                                            <span class="countdown-value days-bottom second_div"></span>
                                            <br>
                                            <span class="countdown-heading text-center days-top">ثانية</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-danger color-box expired_div"></div>

                            </div>
                        @endif    

                        <br style="margin: 50px 0px 30px !important;" id="packages">
                        <div class="rbt-separator-mid" style="margin: 50px 0px 30px !important;height: 3px;" id="packages">
                            <div class="container">
                                <h2 class="fancy" style="--w: 50vw;--c: #f58225;--b:4px;--g: 40px">باقات الاشتراك</h2>
                            </div>
                        </div>
                        <br>

                        <!-- packages  -->
                        <div class="rbt-course-feature-box details-wrapper mt--30 sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300" data-sal-easing="ease-out-back">
                            <div class="rbt-card variation-02 rbt-hover card-minimal bg-gradient-4">
                                <br>
                                <br>
                                <div class="section-title">
                                    <h4 class="title" >باقات الاشتراك</h4>
                                </div>
                                                                
                                <div class="table_responsive">
                                    {!! $find['one_mat_table_prices'] !!}
                                </div>
                            </div>                            
                        </div>

                        <br>
                        <div class="rbt-separator-mid" style="margin: 50px 0px 30px !important;height: 3px;" id="arabic_table">
                            <div class="container">
                                <h2 class="fancy" style="--w: 50vw;--c: #f58225;--b:4px;--g: 40px">جدول العربي</h2>
                            </div>
                        </div>
                        <br>
                        
                        <!-- arabic_table  -->
                        <div class="rbt-course-feature-box details-wrapper mt--30 sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300" data-sal-easing="ease-out-back">
                            <div class="rbt-card variation-02 rbt-hover card-minimal bg-gradient-4">
                                <br>
                                <div class="section-title">
                                    <h4 class="title" style="padding-bottom: 30px;">جدول العربي</h4>
                                </div>

                                <div class="arabic_lessons_time" style="padding: 25px 10px;">
                                    {!! $find['arabic_lessons_time'] !!}
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="rbt-separator-mid" style="margin: 50px 0px 30px !important;height: 3px;" id="english_table">
                            <div class="container">
                                <h2 class="fancy" style="--w: 50vw;--c: #f58225;--b:4px;--g: 40px">جدول اللغات</h2>
                            </div>
                        </div>
                        <br>
                        
                        <!-- english_table  -->
                        <div class="rbt-course-feature-box details-wrapper mt--30 sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300" data-sal-easing="ease-out-back">
                            <div class="rbt-card variation-02 rbt-hover card-minimal bg-gradient-4">
                                <br>
                                <div class="section-title">
                                    <h4 class="title" >جدول اللغات</h4>
                                </div>

                                <div class="english_lessons_time" style="padding: 25px 10px;">
                                    {!! $find['english_lessons_time'] !!}
                                </div>
                            </div>
                        </div>


                        <br>
                        <br>

                          
                        @if ($find['one_mat_counter_to'] != null )
                            <div>
                                <p class="end_time_2" style="display: none;">
                                    {{ \Carbon\Carbon::parse($find['one_mat_counter_to'])->format('Y-m-d H:i') }}
                                </p>
                                
                                <p style="padding: 10px;margin-top: 20px;font-weight: bold;margin-bottom: -20px;color: #555;padding-bottom: 35px;" >
                                    {{ implode(' ', array_slice(explode(' ', $find['one_mat_counter_heading']), 0, 15)) }}
                                    <br>
                                    {{ implode(' ', array_slice(explode(' ', $find['one_mat_counter_heading']), 15, )) }}
                                
                                </p>
                                <div class="countdown-style-1 mt--50 justify-content-center">
                                    <div class="justify-content-center row">
                                        <div class="countdown-container color-box col-lg-2 col-3">
                                            <span class="countdown-value days-bottom date_div_2"></span>
                                            <br>
                                            <span class="countdown-heading text-center days-top">يوم</span>
                                        </div>

                                        <div class="countdown-container color-box col-lg-2 col-3">
                                            <span class="countdown-value days-bottom hour_div_2"></span>
                                            <br>
                                            <span class="countdown-heading text-center days-top">ساعة</span>
                                        </div>

                                        <div class="countdown-container color-box col-lg-2 col-3">
                                            <span class="countdown-value days-bottom minute_div_2" ></span>
                                            <br>
                                            <span class="countdown-heading text-center days-top">دقيقة</span>
                                        </div>

                                        <div class="countdown-container color-box col-lg-2 col-3">
                                            <span class="countdown-value days-bottom second_div_2"></span>
                                            <br>
                                            <span class="countdown-heading text-center days-top">ثانية</span>
                                        </div>

                                        
                                    </div>
                                </div>
                                <div class="text-danger color-box expired_div_2"></div>

                            </div>
                        @endif



                        <br style="margin: 50px 0px 30px !important;" id="register_now"/>
                        <div class="rbt-separator-mid" style="margin: 50px 0px 30px !important;height: 3px;" id="register_now">
                            <div class="container">
                                <h2 class="fancy" style="--w: 50vw;--c: #f58225;--b:4px;--g: 40px">سجل معنا الان</h2>
                            </div>
                        </div>
                        <br>
                        <!-- register_now  -->
                        <div class="rbt-callto-action rbt-cta-default style-4 variation-2 mt--75 rbt-callto-action-area" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300" data-sal-easing="ease-out-back">
                            <div class="container">
                                <div class="content-wrapper row--30 mt_dec--30 position-relative" style="background-color: var(--color-primary);">
                                    <div class="">
                                        <div class="inner">
                                            <div class="content">
                                                <h2 class="title color-white" data-sal="slide-up">
                                                    نعم أريد الاستفادة بالخصومات الآن   
                                                </h2>

                                                <a class="rbt-btn rbt-switch-btn rbt-switch-y bg-white" style="color: #2f57ef;font-weight: bold;margin-top: 25px;padding: 0px 60px;" href="https://forms.gle/qA6rcqVzFLNVhjeR9" target="_blank">
                                                    <span data-text="اضغط هنا للتسجيل">
                                                        اضغط هنا للتسجيل
                                                        <i class="fa fa-pen" style="position: relative;top: 22px;margin: 0px 3px;"></i>
                                                    </span>
                                                </a>
                                                <p style="margin-top: 20px;color: #e9da07;font-weight: bold;">حافظ على مدخراتك اليوم قبل انتهاء فترة العرض</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>

    <br />
    <br />
    <br />
    <div class="rbt-related-course-area bg-color-white pt--60 rbt-section-gapBottom" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300" data-sal-easing="ease-out-back">
        <div class="container">
            <div class="row g-5">
                
                <div class="row row--15 mt_dec--30">
                    <div class="col-xl-4 col-md-6 col-sm-6 col-12 mt--30 text-center">
                        <div class="rbt-service rbt-service-2 rbt-hover-02 bg-gradient-1">
                            <div class="inner">
                                <div class="content">
                                    <h4 class="title"><a href="{{ url('table_prices/term/primary_stage') }}">المرحلة الإبتدائية</a></h4>
                                    <a class="transparent-button" href="{{ url('table_prices/term/primary_stage') }}">
                                        المزيد<i class="feather-chevron-left" style="position: relative;top: 1px;margin: 0px 5px;"></i>
                                    </a>
                                </div>
                                <div class="thumbnail">
                                    <a href="{{ url('table_prices/term/primary_stage') }}">
                                        <img src="{{ url('front') }}/assets/images/table_prices/1.png" alt="Education Images">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-xl-4 col-md-6 col-sm-6 col-12 mt--30 text-center">
                        <div class="rbt-service rbt-service-2 rbt-hover-02 bg-gradient-2">
                            <div class="inner">
                                <div class="content">
                                    <h4 class="title"><a href="{{ url('table_prices/term/middle_stage') }}">المرحلة الإعدادية</a></h4>
                                    <a class="transparent-button" href="{{ url('table_prices/term/middle_stage') }}">
                                        المزيد<i class="feather-chevron-left" style="position: relative;top: 1px;margin: 0px 5px;"></i>
                                    </a>
                                </div>
                                <div class="thumbnail">
                                    <a href="{{ url('table_prices/term/middle_stage') }}">
                                        <img src="{{ url('front') }}/assets/images/table_prices/2.png" alt="Education Images">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-xl-4 col-md-6 col-sm-6 col-12 mt--30 text-center">
                        <div class="rbt-service rbt-service-2 rbt-hover-02 bg-gradient-1">
                            <div class="inner">
                                <div class="content">
                                    <h4 class="title"><a href="{{ url('table_prices/term/high_stage') }}">المرحلة الثانوية</a></h4>
                                    <a class="transparent-button" href="{{ url('table_prices/term/high_stage') }}">
                                        المزيد<i class="feather-chevron-left" style="position: relative;top: 1px;margin: 0px 5px;"></i>
                                    </a>
                                </div>
                                <div class="thumbnail">
                                    <a href="{{ url('table_prices/term/high_stage') }}">
                                        <img src="{{ url('front') }}/assets/images/table_prices/3.png" alt="Education Images">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-course-action-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="section-title text-center text-md-start">
                        <h5 class="title mb--0 text-white">سجل الآن لتستفيد بالعرض</h5>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mt_sm--15">
                    <div class="course-action-bottom-right rbt-single-group">
                        {{-- <div class="rbt-single-list rbt-price large-size justify-content-center">
                            <span class="current-price color-primary">$750.00</span>
                            <span class="off-price">$1500.00</span>
                        </div> --}}
                        <div class="rbt-single-list action-btn text-white">
                            <a class="rbt-btn btn-white rbt-marquee-btn radius-round" href="https://forms.gle/qA6rcqVzFLNVhjeR9" target="_blank">
                                <span data-text="سجـل الآن" style="padding: 0px 20px;">
                                    سجـل الآن
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
@endsection
