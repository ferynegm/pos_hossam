@extends('front.layouts.app')

@section('title')
    الترم/المسار المصري - سفارة - المرحله الإبتدائية
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
                                <h2 class="title">الترم/المسار المصري - سفارة - المرحله الإبتدائية</h2>
                                <ul class="page-list">
                                    <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                                    <li>
                                        <div class="icon-left"><i class="feather-chevron-left"></i></div>
                                    </li>
                                    <li class="rbt-breadcrumb-item"><a href="{{ url('/table_prices/term') }}">الترم/مسار مصري - سفارة</a></li>
                                    <li>
                                        <div class="icon-left"><i class="feather-chevron-left"></i></div>
                                    </li>
                                    <li class="rbt-breadcrumb-item active">المرحله الإبتدائية</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="rbt-rbt-card-area bg-color-extra2 rbt-section-gap">
        <div class="container">
            {{-- <div class="row mb--60">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title">المرحله الابتدائية</h2>
                    </div>
                </div>
            </div> --}}
            <div class="row row--15 mt_dec--30">

                <!-- Start Service Grid  -->
                <div class="col-lg-4  col-md-6  col-12 mt--30 sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="service-card service-card-6 rbt-hover rbt-card">
                        <div class="inner" style="color: red;">
                            <div class="icon">
                                <a href="{{ url('table_prices/term/primary_stage/1') }}">
                                    <img src="{{ url('front') }}/assets/images/table_prices/primary/1.png" alt="icons Images">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{ url('table_prices/term/primary_stage/1') }}" style="color: red;">الصف الاول الابتدائي</a></h6>
                                {{-- <p class="description">English Learning looking for random paragraphs, you've come to the right place.</p> --}}
                            </div>
                            <a href="{{ url('table_prices/term/primary_stage/1') }}">
                                <span class="number-text">1</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Grid  -->

                <!-- Start Service Grid  -->
                <div class="col-lg-4  col-md-6  col-12 mt--30 sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="service-card service-card-6 rbt-hover rbt-card">
                        <div class="inner" style="color: red;">
                            <div class="icon">
                                <a href="{{ url('table_prices/term/primary_stage/2') }}">
                                    <img src="{{ url('front') }}/assets/images/table_prices/primary/2.png" alt="icons Images">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{ url('table_prices/term/primary_stage/2') }}" style="color: red;">الصف الثاني الابتدائي</a></h6>
                                {{-- <p class="description">English Learning looking for random paragraphs, you've come to the right place.</p> --}}
                            </div>
                            <a href="{{ url('table_prices/term/primary_stage/2') }}">
                                <span class="number-text">2</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Grid  -->

                <!-- Start Service Grid  -->
                <div class="col-lg-4  col-md-6  col-12 mt--30 sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="service-card service-card-6 rbt-hover rbt-card">
                        <div class="inner" style="color: red;">
                            <div class="icon">
                                <a href="{{ url('table_prices/term/primary_stage/3') }}">
                                    <img src="{{ url('front') }}/assets/images/table_prices/primary/3.png" alt="icons Images">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{ url('table_prices/term/primary_stage/3') }}" style="color: red;">الصف الثالث الابتدائي</a></h6>
                                {{-- <p class="description">English Learning looking for random paragraphs, you've come to the right place.</p> --}}
                            </div>
                            <a href="{{ url('table_prices/term/primary_stage/3') }}">
                                <span class="number-text">3</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Grid  -->

                <!-- Start Service Grid  -->
                <div class="col-lg-4  col-md-6  col-12 mt--30 sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="service-card service-card-6 rbt-hover rbt-card">
                        <div class="inner" style="color: red;">
                            <div class="icon">
                                <a href="{{ url('table_prices/term/primary_stage/4') }}">
                                    <img src="{{ url('front') }}/assets/images/table_prices/primary/4.png" alt="icons Images">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{ url('table_prices/term/primary_stage/4') }}" style="color: red;">الصف الرابع الابتدائي</a></h6>
                                {{-- <p class="description">English Learning looking for random paragraphs, you've come to the right place.</p> --}}
                            </div>
                            <a href="{{ url('table_prices/term/primary_stage/4') }}">
                                <span class="number-text">4</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Grid  -->

                <!-- Start Service Grid  -->
                <div class="col-lg-4  col-md-6  col-12 mt--30 sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="service-card service-card-6 rbt-hover rbt-card">
                        <div class="inner" style="color: red;">
                            <div class="icon">
                                <a href="{{ url('table_prices/term/primary_stage/5') }}">
                                    <img src="{{ url('front') }}/assets/images/table_prices/primary/5.png" alt="icons Images">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{ url('table_prices/term/primary_stage/5') }}" style="color: red;">الصف الخامس الابتدائي</a></h6>
                                {{-- <p class="description">English Learning looking for random paragraphs, you've come to the right place.</p> --}}
                            </div>
                            <a href="{{ url('table_prices/term/primary_stage/5') }}">
                                <span class="number-text">5</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Grid  -->

                <!-- Start Service Grid  -->
                <div class="col-lg-4  col-md-6  col-12 mt--30 sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="service-card service-card-6 rbt-hover rbt-card">
                        <div class="inner" style="color: red;">
                            <div class="icon">
                                <a href="{{ url('table_prices/term/primary_stage/6') }}">
                                    <img src="{{ url('front') }}/assets/images/table_prices/primary/6.png" alt="icons Images">
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="{{ url('table_prices/term/primary_stage/6') }}" style="color: red;">الصف السادس الابتدائي</a></h6>
                                {{-- <p class="description">English Learning looking for random paragraphs, you've come to the right place.</p> --}}
                            </div>
                            <a href="{{ url('table_prices/term/primary_stage/6') }}">
                                <span class="number-text">6</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Grid  -->

            </div>
        </div>
    </div>

    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
@endsection
