@extends('front.layouts.app')

@section('title')
    ماذا قالوا عن إديوستيدج
@endsection

@section('header')
    <style>
        .sticky-top{
            top: 85px;
            z-index: 9;
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
    
@endsection

@section('content')
    <a class="close_side_menu" href="javascript:void(0);"></a>

    <div class="rbt-page-banner-wrapper" style="background-image: url('front/assets/images/general/6.jpg') !important;background-repeat: no-repeat;background-size: cover;">
        <div class="rbt-banner-image"></div>
        <div class="rbt-banner-content">
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-inner text-center">
                                <h2 class="title color-white">ماذا قالوا عن إديوستيدج</h2>
                                <p class="color-white">رضاء عملائنا ... مؤشر نجاحنا</p>
                                <ul class="page-list">
                                    <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}" class="color-white">الرئيسية</a></li>
                                    <li>
                                        <div class="icon-left color-white"><i class="feather-chevron-left"></i></div>
                                    </li>
                                    <li class="rbt-breadcrumb-item active color-white">ماذا قالوا عن إديوستيدج</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">        
        <div class="course-details-content">
            <div class="rbt-inner-onepage-navigation sticky-top mt--30">
                <nav class="mainmenu-nav onepagenav">
                    <ul class="mainmenu">                        
                        <li class="current">
                            <a href="#teacher">رأي الإعلام و المتخصصون</a>
                        </li>
                        <li>
                            <a href="#student">آراء طلاب الأكاديمية</a>
                        </li>
                        <li>
                            <a href="#social">آراء منصات التواصل الإجتماعي</a>
                        </li>
                    </ul>
                </nav>
            </div>

            

            <div id="teacher" style="padding-top: 50px;">
                <div class="rbt-separator-mid" style="margin: 50px 0px 10px !important;height: 3px;" >
                    <div class="container">
                        <h2 class="fancy" style="--w: 25vw;--c: #f58225;--b:4px;--g: 40px">رأي الإعلام و المتخصصون</h2>
                    </div>
                </div>

                <br>
                <div class="row g-5" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="col-lg-4 col-md-6 col-12 mt--30 sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <video style="width: 100%;" height="200px" controls>
                                    <source src="{{ url('back/images/facebook_reviews/1.mp4') }}" type="video/mp4">
                                </video>
                            </div>
                            <div class="rbt-card-body">
                                <h4 class="rbt-card-title text-center"><a>دكتور: إيهاب مسلم</a></h4>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-12 mt--30 sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <video style="width: 100%;" height="200px" controls>
                                    <source src="{{ url('back/images/facebook_reviews/2.mp4') }}" type="video/mp4">
                                </video>
                            </div>
                            <div class="rbt-card-body">
                                <h4 class="rbt-card-title text-center"><a>أراء خبراء التعليم فى الأكاديمية</a></h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mt--30 sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <video style="width: 100%;" height="200px" controls>
                                    <source src="{{ url('back/images/facebook_reviews/3.mp4') }}" type="video/mp4">
                                </video>
                            </div>
                            <div class="rbt-card-body">
                                <h4 class="rbt-card-title text-center"><a>دكتور: ايمن أمين عبد الغني</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="student" style="padding-top: 50px;">
                <div class="rbt-separator-mid" style="margin: 50px 0px 10px !important;height: 3px;" >
                    <div class="container">
                        <h2 class="fancy" style="--w: 25vw;--c: #f58225;--b:4px;--g: 40px">آراء طلاب الأكاديمية</h2>
                    </div>
                </div>
                <br>
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6 col-12 mt--30 sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <video style="width: 100%;" height="200px" controls>
                                    <source src="{{ url('back/images/facebook_reviews/4.mp4') }}" type="video/mp4">
                                </video>
                            </div>
                            <div class="rbt-card-body">
                                <h4 class="rbt-card-title text-center"><a>الطالب: عبد الملك أحمد</a></h4>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-12 mt--30 sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <video style="width: 100%;" height="200px" controls>
                                    <source src="{{ url('back/images/facebook_reviews/5.mp4') }}" type="video/mp4">
                                </video>
                            </div>
                            <div class="rbt-card-body">
                                <h4 class="rbt-card-title text-center"><a>الطالب: عبد الرحمن</a></h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mt--30 sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <video style="width: 100%;" height="200px" controls>
                                    <source src="{{ url('back/images/facebook_reviews/6.mp4') }}" type="video/mp4">
                                </video>
                            </div>
                            <div class="rbt-card-body">
                                <h4 class="rbt-card-title text-center"><a>الطالبة: امينه سامح</a></h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mt--30 sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <video style="width: 100%;" height="200px" controls>
                                    <source src="{{ url('back/images/facebook_reviews/7.mp4') }}" type="video/mp4">
                                </video>
                            </div>
                            <div class="rbt-card-body">
                                <h4 class="rbt-card-title text-center"><a>الطالب: احمد سامح</a></h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mt--30 sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <video style="width: 100%;" height="200px" controls>
                                    <source src="{{ url('back/images/facebook_reviews/8.mp4') }}" type="video/mp4">
                                </video>
                            </div>
                            <div class="rbt-card-body">
                                <h4 class="rbt-card-title text-center"><a>الطالب: محمود معتز</a></h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mt--30 sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <video style="width: 100%;" height="200px" controls>
                                    <source src="{{ url('back/images/facebook_reviews/9.mp4') }}" type="video/mp4">
                                </video>
                            </div>
                            <div class="rbt-card-body">
                                <h4 class="rbt-card-title text-center"><a>الطالب: علي حسان</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div id="social" style="padding-top: 50px;">
                <div class="rbt-separator-mid" style="margin: 50px 0px 10px !important;height: 3px;" >
                    <div class="container">
                        <h2 class="fancy" style="--w: 25vw;--c: #f58225;--b:4px;--g: 40px">أراء منصات التواصل الإجتماعي</h2>
                    </div>
                </div>
                <br>
                <div class="row g-5 parent-gallery-container" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    @foreach ($testimonials as $review)
                        <a href="{{ url('back/images/facebook_reviews/'.$review->review) }}" class="child-gallery-single col-lg-6 col-12" style="padding: 15px;">
                            <div class="rbt-gallery rbt-card">
                                <img class="w-100 rbt-hover" src="{{ url('back/images/facebook_reviews/'.$review->review) }}" style="height: 200px;">
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    

    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
@endsection
