@extends('front.layouts.app')

@section('title')
    دورات قسم ( {{ $course_by_age_filter_name == 1 ? 'كبار' : 'أطفال' }} )
@endsection

@section('header')
    <style>
        .rbt-search-style input{
            border: 2px solid #2c2c2c;
            color: #2c2c2c;
        }
        .rbt-search-style .rbt-search-btn i{
            color: #2c2c2c;
        }
    </style>
@endsection

@section('footer')
    
@endsection

@section('content')
    <a class="close_side_menu" href="javascript:void(0);"></a>

    <div class="rbt-page-banner-wrapper bg-gradient-6" >
        <!-- Start Banner BG Image  -->
        <div class="rbt-banner-image"></div>
        <!-- End Banner BG Image  -->
        <div class="rbt-banner-content">

            <!-- Start Banner Content Top  -->
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Start Breadcrumb Area  -->
                            <ul class="page-list">
                                <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}" class="">الرئيسية</a></li>
                                <li>
                                    <div class="icon-left"><i class="feather-chevron-left "></i></div>
                                </li>
                                <li class="rbt-breadcrumb-item active ">دورات قسم ( {{ $course_by_age_filter_name == 1 ? 'كبار' : 'أطفال' }} )</li>
                            </ul>
                            <!-- End Breadcrumb Area  -->

                            <div class=" title-wrapper">
                                <h1 class="title ">دورات قسم ( {{ $course_by_age_filter_name == 1 ? 'كبار' : 'أطفال' }} )</h1>
                            </div>

                            <p class="description ">دورات أكاديمية اديوستديج لجميع المراحل والأعمار</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Content Top  -->
            <!-- Start Course Top  -->
            <div class="rbt-course-top-wrapper mt--40">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-5 col-md-12">
                            <div class="rbt-sorting-list d-flex flex-wrap align-items-center">
                                <div class="rbt-short-item switch-layout-container">
                                    <ul class="course-switch-layout">
                                        <li class="course-switch-item"><button class="rbt-grid-view active" title="Grid Layout"><i class="feather-grid"></i> <span class="text">شبكة</span></button></li>
                                        <li class="course-switch-item"><button class="rbt-list-view" title="List Layout"><i class="feather-list"></i> <span class="text">قائمة</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-lg-7 col-md-12" style="color: black;">
                            <div class="rbt-sorting-list d-flex flex-wrap align-items-end justify-content-start justify-content-lg-end">
                                <div class="rbt-short-item">
                                    <form action="#" class="rbt-search-style me-0">
                                        <input type="text" placeholder="بحث عن دورة ...">
                                        <button type="submit" class="rbt-search-btn rbt-round-btn">
                                            <i class="feather-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt--60" style="margin-bottom: 20px;">
                            <ul class="rbt-portfolio-filter filter-tab-button justify-content-start nav nav-tabs" id="rbt-myTab" role="tablist">
                                @foreach ($courses_langs as $lang)
                                    <li class="nav-item" role="presentation">
                                        <a href="{{ url('courses/lang-filter/'.$lang->lang) }}" type="button"><span class="filter-text">{{ $lang->lang }}</span> </a>
                                    </li>                                                                    
                                @endforeach
                                <li class="nav-item" role="presentation">
                                    <a href="{{ url('courses/age-filter/1') }}" type="button"><span class="filter-text">كبار</span> </a>
                                </li>                                
                                <li class="nav-item" role="presentation">
                                    <a href="{{ url('courses/age-filter/2') }}" type="button"><span class="filter-text">أطفال</span> </a>
                                </li>                                
                                <li class="nav-item" role="presentation">
                                    <a href="{{ url('courses/stage-filter/1') }}" type="button"><span class="filter-text">المرحلة الإبتدائية</span> </a>
                                </li>                                
                                <li class="nav-item" role="presentation">
                                    <a href="{{ url('courses/stage-filter/2') }}" type="button"><span class="filter-text">المرحلة الإعدادية</span> </a>
                                </li>                                
                                <li class="nav-item" role="presentation">
                                    <a href="{{ url('courses/stage-filter/3') }}" type="button"><span class="filter-text">المرحلة الثانوية</span> </a>
                                </li>                                
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- End Course Top  -->
        </div>
    </div>


    @if (count($courses_by_age_filter) > 0)
        <div class="rbt-section-overlayping-top rbt-section-gapBottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="rbt-course-grid-column">
                            @foreach ($courses_by_age_filter as $course)
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ url('courses/'.$course->id) }}">
                                                <img src="{{ url('back/images/courses/'.$course->image) }}" alt="Card image" style="height: 200px;">
                                            </a>
                                        </div>
                                        <div class="rbt-card-body" style="padding-right:10px;">
                                            <div class="rbt-review">
                                                <p style="font-size: 13px;font-weight: bold;">
                                                    مدرس الدورة 
                                                    <a href="{{ url('courses/teachers/'.$course->teacher) }}" style="margin: 0px 3px;color: rgb(57, 57, 252);text-decoration: underline;">
                                                    ( {{ $course->teacher_name->name }} )
                                                    </a>
                                                </p>
                                            </div>
                                            <h4 class="rbt-card-title"><a href="{{ url('courses/'.$course->id) }}">
                                                {!! implode(' ', array_slice(explode(' ', $course->name), 0, 7)) !!}
                                            </a>
                                            </h4>

                                            <div class="rbt-card-bottom">
                                                <a class="rbt-btn-link" href="{{ url('courses/'.$course->id) }}">
                                                    اقرأ المزيد
                                                    <i class="feather-arrow-left"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <br>
                <br>

                <div class="row">
                    <div class="col-lg-12 mt--60">
                        {{ $courses_by_age_filter->links('vendor.pagination.custom') }}
                    </div>
                </div>

            </div>
        </div>
    @else
        <div class="rbt-card">
            <h3 class="title text-center" style="padding: 70px 30px;opacity: .8;">لاتوجد دورات لهذا القسم حاليا</h3>
        </div>
    @endif

    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
@endsection
