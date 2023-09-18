@extends('front.layouts.app')

@section('title')
    الترم/المسار المصري - سفارة - المرحله الثانوية
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
                                <h2 class="title">الترم/المسار المصري - سفارة - المرحله الثانوية</h2>
                                <ul class="page-list">
                                    <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                                    <li>
                                        <div class="icon-left"><i class="feather-chevron-left"></i></div>
                                    </li>
                                    <li class="rbt-breadcrumb-item"><a href="{{ url('/table_prices/term') }}">الترم/مسار مصري - سفارة</a></li>
                                    <li>
                                        <div class="icon-left"><i class="feather-chevron-left"></i></div>
                                    </li>
                                    <li class="rbt-breadcrumb-item active">المرحله الثانوية</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="rbt-rbt-card-area rbt-section-gap bg-color-white">
        <div class="container">
            {{-- <div class="row row--15 align-items-center mb--30">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="title text-center">الترم/المسار المصري - سفارة - المرحله الثانوية</h2>
                    </div>
                </div>
            </div> --}}
            <!-- Start Card Area -->
            <div class="row row--15">

                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="rbt-card variation-03 rbt-hover rbt-gradient-border">
                        <div class="rbt-card-img">
                            <a class="thumbnail-link" href="{{ url('table_prices/term/high_stage/1') }}">
                                <img src="{{ url('front') }}/assets/images/table_prices/high/12.jpg" alt="Card image">
                                <span class="rbt-btn btn-white">
                                    <span class="btn-text">تفاصيل</span>
                                </span>
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="text-center">
                                <a href="{{ url('table_prices/term/high_stage/1') }}">الصف الاول الثانوي</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="rbt-card variation-03 rbt-hover rbt-gradient-border">
                        <div class="rbt-card-img">
                            <a class="thumbnail-link" href="{{ url('table_prices/term/high_stage/2') }}">
                                <img src="{{ url('front') }}/assets/images/table_prices/high/13.jpg" alt="Card image">
                                <span class="rbt-btn btn-white">
                                    <span class="btn-text">تفاصيل</span>
                                </span>
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="text-center">
                                <a href="{{ url('table_prices/term/high_stage/2') }}">الصف الثاني الثانوي</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="rbt-card variation-03 rbt-hover rbt-gradient-border">
                        <div class="rbt-card-img">
                            <a class="thumbnail-link" href="{{ url('table_prices/term/high_stage/3') }}">
                                <img src="{{ url('front') }}/assets/images/table_prices/high/15.jpg" alt="Card image">
                                <span class="rbt-btn btn-white">
                                    <span class="btn-text">تفاصيل</span>
                                </span>
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="text-center">
                                <a href="{{ url('table_prices/term/high_stage/3') }}">الصف الثالث الثانوي</a>
                            </h5>
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
