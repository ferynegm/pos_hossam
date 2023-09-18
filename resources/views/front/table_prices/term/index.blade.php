@extends('front.layouts.app')

@section('title')
    الترم/مسار مصري - سفارة
@endsection

@section('header')

@endsection

@section('footer')
    
@endsection

@section('content')
    <a class="close_side_menu" href="javascript:void(0);"></a>

    <div class="rbt-page-banner-wrapper bg-gradient-11" style="padding: 60px 0px;">
        <div class="rbt-banner-image"></div>
        <div class="rbt-banner-content">
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-inner text-center">
                                <h2 class="title">الترم/مسار مصري - سفارة</h2>
                                <ul class="page-list">
                                    <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                                    <li>
                                        <div class="icon-left"><i class="feather-chevron-left"></i></div>
                                    </li>
                                    <li class="rbt-breadcrumb-item active">الترم/مسار مصري - سفارة</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="rbt-service-area bg-color-extra2 rbt-section-gap">
        <div class="container">
            {{-- <div class="row mb--60">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title">الترم/مسار مصري - سفارة</h2>
                    </div>
                </div>
            </div> --}}
            <!-- Start Card Area -->
            <div class="row row--15 mt_dec--30">

                <div class="col-xl-4 col-md-6 col-sm-6 col-12 mt--30 text-center">
                    <div class="rbt-service rbt-service-2 rbt-hover-02">
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
                    <div class="rbt-service rbt-service-2 rbt-hover-02 ">
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
                    <div class="rbt-service rbt-service-2 rbt-hover-02 ">
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
            <!-- End Card Area -->
        </div>
    </div>

    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
@endsection
