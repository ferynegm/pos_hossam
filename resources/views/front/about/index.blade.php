@extends('front.layouts.app')

@section('title')
    {{ trans('app.about') }}
@endsection

@section('header')
	<style>
        /* .rbt-breadcrumb-default{
            background-image: {{ url('front/assets/images/about/11.jpg') }} !important;
        } */

        .has-medium-font-size{
            padding: 10px 50px;
        }
    </style>
@endsection

@section('footer')
    
@endsection

@section('content')
    <a class="close_side_menu" href="javascript:void(0);"></a>

    {{-- <div class="rbt-page-banner-wrapper" style="background-image: url('front/assets/images/breadcrumb/4.jpg') !important;background-repeat: no-repeat;background-size: cover;">
        <div class="rbt-banner-image"></div>
        <div class="rbt-banner-content">
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-inner text-center">
                                <h2 class="title color-white">المدونة</h2>
                                <ul class="page-list">
                                    <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}" class="color-white">الرئيسية</a></li>
                                    <li>
                                        <div class="icon-left color-white"><i class="feather-chevron-left"></i></div>
                                    </li>
                                    <li class="rbt-breadcrumb-item active color-white">المدونة</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="rbt-banner-area rbt-banner-8 variation-02 bg-gradient-11" style="padding: 55px 0 0px;">
        <div class="container align-items-center">
            <div class="content">
                <div class="inner text-center">

                    <h1 class="title">اقرأ عنا
                        <span class="header-caption">
                            <span class="cd-headline clip is-full-width">
                                <span class="cd-words-wrapper" style="width: 232px;">
                                    @foreach ($all_abouts as $about)
                                        <b class="theme-gradient {{ $first_about['title'] ==  $about->title ? 'is-visible' : 'is-hidden' }} ">{{ $about->title }}</b>
                                    @endforeach
                                </span>
                            </span>
                        </span>
                    </h1>
                    <p class="has-medium-font-size" style="font-size: 18px;color: rgb(29, 29, 29);">
                        <span style="font-weight: bold;text-decoration: underline;">EduStage</span> مشروع تعليمي متخصص في التعليم عن بعد من خلال شبكة الإنترنت والتقنيات الحديثة، انطلقت الأكاديمية بشكل رسمي في مايو 2016، بدأ العمل الفعلي في أغسطس 2016 قُبيل العام الدراسي 2016-2017. <span style="font-weight: bold;text-decoration: underline;">أكاديمية إديوستيدج</span>  للتعليم أونلاين مرخصة ولها سجل تجارى وبطاقة ضريبية
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="my-account-section bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row g-5">
                        <div class="col-lg-3 col-12 rbt-default-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
                            <div class="rbt-my-account-tab-button nav " role="tablist">
                                @foreach ($all_abouts as $about)
                                {{-- class="active" --}}
                                    <a href="#tab_{{ $about->id }}" class="{{ $all_abouts[0]['id'] == $about->id ? 'active' : '' }}" data-bs-toggle="tab">{{ $about->title }}</a>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="col-lg-9 col-12">
                            <div class="tab-content">
                                @foreach ($all_abouts as $about)                                   
                                    <div class="{{ $all_abouts[0]['id'] == $about->id ? 'tab-pane fade active show' : 'tab-pane fade' }}" id="tab_{{ $about->id }}" role="tabpanel">

                                        
                                        <div class="rbt-my-account-inner rbt-shadow-box">                                            
                                            <h3>{{ $about->title }}</h3>
                                            <div class="">
                                                {!! $about->description !!}
                                            </div>

                                            @if ( $about->media != null)                                            
                                            <hr />
                                                <div class="rbt-gallery-area">
                                                    <div class="row g-0 parent-gallery-container h-100 d-flex align-items-center justify-content-center">
                                                        @foreach (explode('|', $about->media) as $img)
                                                            <a href="{{ url('back/images/about_acadmy/'.$img) }}" class="rbt-card card-list-2 event-list-card variation-01 rbt-hover child-gallery-single col-lg-4 col-md-4 col-sm-6 col-6" style="height: 200px;">
                                                                <div class="rbt-gallery">
                                                                    <img class="w-100 radius-10" src="{{ url('back/images/about_acadmy/'.$img) }}" alt="Gallery Images">
                                                                </div>
                                                            </a>                                          
                                                        @endforeach      
                                                    </div>
                                                </div>
                                            @endif

                                            @if ( $about->media_videos != null)               
                                            <hr />
                                                <div class="rbt-gallery-area">
                                                    <div class="row g-0 parent-gallery-container h-100 d-flex align-items-center justify-content-center">
                                                        @foreach (explode('|', $about->media_videos) as $vid)
                                                            <video controls style="height: 250px;padding: 10px;" class="col-sm-6 col-6">
                                                                <source src="{{ url('back/images/about_acadmy/'.$vid) }}" type="video/mp4">
                                                            </video>                                      
                                                        @endforeach      
                                                    </div>
                                                </div>
                                            @endif                                            
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- My Account Tab Content End -->
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
