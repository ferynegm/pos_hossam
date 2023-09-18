@extends('front.layouts.app')

@section('title')
    {{ trans('app.Home') }}
@endsection

@section('header')
    <style>
        .rbt-banner-6{
            background-image: url(front/assets/images/home/6.jpg);
            background-size: cover;
            height: 750px !important;
        }
        .title{
            font-size: 50px !important;
        }
        .theme-gradient{
            color: linear-gradient(90deg, #ffae58, #6d94ce) !important;
        }
        .bg_image--8 {
            background-image: url(front/assets/images/home/h2.jpg);
        }

        @media screen and (max-width:768px) {
            .header-caption .theme-gradient{
                font-size: 25px;
                font-weight: bold;
            }
        }
    </style>
@endsection

@section('footer')

@endsection

@section('content')
    <div class="rbt-banner-6 variation-02 bg_image bg_image--7 header-transperent-spacer" data-black-overlay="2" >
        <div class="wrapper w-100">
            <div class="container">
                {{-- <div class="row row--15 align-items-center">
                    <div class="col-lg-12">
                        
                    </div>
                </div> --}}
                <div class="inner text-start text-center align-items-center">
                    <div class="section-title">
                        <span class="subtitle bg-white-opacity d-inline-block">تأسست عام 2016</span>
                    </div>
                    <h6 class="title w-700">أكاديمية إديوستيدج للتعليم أونلاين<br>
                        <p class="text-left">
                            <i class="fas fa-caret-right"></i>
                                مستقبل أولادك للتعلم عبر الإنترنت
                            <i class="fas fa-caret-left"></i>
                        </p>
                        <strong>
                            <span class="header-caption">
                                <span class="cd-headline loading-bar zoom">
                                    <span class="cd-words-wrapper">
                                        <b class="is-visible theme-gradient text-center">
                                            جميع المراحل، جميع المواد
                                            <br />
                                            من KG للثانوي
                                        </b>
                                        <b class="is-hidden theme-gradient text-center">عربي ولغات وأزهري</b>
                                        <b class="is-hidden theme-gradient text-center">أساتذة متخصصون بخبرات السنين <br/>وإدارة متميزة</b>
                                        <b class="is-hidden theme-gradient text-center">قسم خاص لدعم مناهج الخليج <br/> (قطري، سعودي، ...)</b>
                                    </span>
                                </span>
                            </span>
                        </strong>
                    </h6>
                    <div class="button-group mt--30 mt_sm--10">
                        <a class="rbt-btn btn-gradient rbt-switch-btn rbt-switch-y" href="https://wa.me/{{ App\Models\Back\Setting::first()->phone1 }}" style="margin-top: 30px;">
                            <span data-text="تواصل معنا">تواصل معنا</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="rbt-course-card-area rbt-section-gap bg-color-white">
        <div class="container">
            <div class="row g-5 mb--60 align-items-center">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title">المراحل <span class="theme-gradient">الدراسية</span></h2>
                        {{-- <p class="description mt--20">Are You Want to <strong>Change Your Life?</strong></p> --}}
                    </div>
                </div>
            </div>
            <!-- Start Card Area -->
            <div class="row g-5">
                       
                {{-- المرحلة الإبتدائية --}}
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12" data-sal-delay="150" data-sal="slide-down" data-sal-duration="800">
                    <div class="rbt-card variation-03 rbt-hover program-image-large">
                        <div class="rbt-card-img">
                            <a class="thumbnail-link" href="{{ url('table_prices/term/primary_stage') }}">
                                <img src="{{ url('front') }}/assets/images/classroom/18.jpg">
                                <span class="rbt-btn btn-white icon-hover btn-md">
                                    <span class="btn-text">تفاصيل</span>
                                <span class="btn-icon" style="margin: 0px 20px 0px 0px;"><i class="feather-arrow-left"></i></span>
                                </span>
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="rbt-card-title"><a href="{{ url('table_prices/term/primary_stage') }}">المرحلة الإبتدائية</a>
                            </h5>
                            <div class="rbt-card-bottom">
                                <a class="transparent-button" href="{{ url('table_prices/term/primary_stage') }}">
                                    <i class="feather-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                       
                {{-- المرحلة الإعدادية --}}
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-card variation-03 rbt-hover program-image-large">
                        <div class="rbt-card-img">
                            <a class="thumbnail-link" href="{{ url('table_prices/term/middle_stage') }}">
                                <img src="{{ url('front') }}/assets/images/classroom/1.jpg">
                                <span class="rbt-btn btn-white icon-hover btn-md">
                                    <span class="btn-text">تفاصيل</span>
                                <span class="btn-icon" style="margin: 0px 20px 0px 0px;"><i class="feather-arrow-left"></i></span>
                                </span>
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="rbt-card-title"><a href="{{ url('table_prices/term/middle_stage') }}">المرحلة الإعدادية</a>
                            </h5>
                            <div class="rbt-card-bottom">
                                <a class="transparent-button" href="{{ url('table_prices/term/middle_stage') }}">
                                    <i class="feather-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                       
                {{-- المرحلة الثانوية --}}
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12" data-sal-delay="150" data-sal="slide-down" data-sal-duration="800">
                    <div class="rbt-card variation-03 rbt-hover program-image-large">
                        <div class="rbt-card-img">
                            <a class="thumbnail-link" href="{{ url('table_prices/term/high_stage') }}">
                                <img src="{{ url('front') }}/assets/images/classroom/12.jpg">
                                <span class="rbt-btn btn-white icon-hover btn-md">
                                    <span class="btn-text">تفاصيل</span>
                                <span class="btn-icon" style="margin: 0px 20px 0px 0px;"><i class="feather-arrow-left"></i></span>
                                </span>
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h5 class="rbt-card-title"><a href="{{ url('table_prices/term/high_stage') }}">المرحلة الثانوية</a>
                            </h5>
                            <div class="rbt-card-bottom">
                                <a class="transparent-button" href="{{ url('table_prices/term/high_stage') }}">
                                    <i class="feather-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Card Area -->
        </div>
    </div>


    <div class="rbt-events-area bg-color-white">
        <div class="container">
            <div class="row g-5 mb--60 align-items-center">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h4 class="theme-gradient">
                            هدفنا تنمية استثمارك في أبنائك، بتقديم قيمة تعليمية
                            <br>
                            تفوق قيمة الوقت والمال المبذول في التعليم
                        </h4>
                    </div>
                </div>
            </div>
            <br>
            <!-- Start Card Area -->
            <div class="row g-5">
                <div class="rbt-splite-style">
                    <div class="split-wrapper">
                        <div class="row g-0 align-items-center">
                            <div class="col-lg-12 col-xl-6 col-12 rbt-hover">
                                <div class="thumbnail image-left-content">
                                    <img src="{{ url('front') }}/assets/images/classroom/17.jpg" alt="split Images">
                                </div>
                            </div>

                            <div class="col-lg-12 col-xl-6 col-12 rbt-hover">
                                <div class="split-inner">
                                    <h5 class="sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="200">
                                        ليه تتعلم أونلاين فى إديوستيدج ؟
                                    </h5>
                                    
                                    <ul class="plan-offer-list" style="margin-top: 10px;">
                                        <li>
                                            <div class="row">
                                                <div class="col-1">
                                                    <i class="feather-check"></i>
                                                </div>
                                                <div class="col-11">
                                                    ابنك هيدرس قدام عينيك
                                                </div>
                                            </div> 
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-1">
                                                    <i class="feather-check"></i>
                                                </div>
                                                <div class="col-11">
                                                    توفير عامل الامان والاطمئنان
                                                </div>
                                            </div> 
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-1">
                                                    <i class="feather-check"></i>
                                                </div>
                                                <div class="col-11">
                                                    توفير مصاريف الانتقال من والى الدروس
                                                </div>
                                            </div> 
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-1">
                                                    <i class="feather-check"></i>
                                                </div>
                                                <div class="col-11">
                                                    دروسك كلها في مكان واحد وكذلك دفع الاشتراكات فى مكان واحد
                                                </div>
                                            </div> 
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-1">
                                                    <i class="feather-check"></i>
                                                </div>
                                                <div class="col-11">
                                                    الحفاظ على سرية بياناتكم
                                                </div>
                                            </div> 
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-1">
                                                    <i class="feather-check"></i>
                                                </div>
                                                <div class="col-11">
                                                    استرداد أموالكم فى حالة الانسحاب لاى ظروف
                                                </div>
                                            </div> 
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-1">
                                                    <i class="feather-check"></i>
                                                </div>
                                                <div class="col-11">
                                                    توفير خدمة عملاء لتلبية طلباتكم وحل اى مشاكل ان وجدت
                                                </div>
                                            </div> 
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-1">
                                                    <i class="feather-check"></i>
                                                </div>
                                                <div class="col-11">
                                                    الاخذ في الاعتبار ارائكم بشأن تعديل اى شىء في الأكاديمية
                                                </div>
                                            </div> 
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="rbt-splite-style">
                    <div class="split-wrapper">
                        <div class="row g-0 align-items-center">
                            <div class="col-lg-12 col-xl-6 col-12 rbt-hover">
                                <div class="split-inner">
                                    <h5 class="sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="200">
                                        القيمة التى ستحصل عليها فى إديوستيدج
                                    </h5>
                                    
                                    <ul class="plan-offer-list" style="margin-top: 10px;">
                                        <li>
                                            <div class="row">
                                                <div class="col-1">
                                                    <i class="feather-check"></i>
                                                </div>
                                                <div class="col-11">
                                                    شرح لايف على برنامج الزوم المدفوع وليس المجانى
                                                </div>
                                            </div> 
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-1">
                                                    <i class="feather-check"></i>
                                                </div>
                                                <div class="col-11">
                                                    فيديو مسجل للحصة وملازم واختبارات دورية
                                                </div>
                                            </div> 
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-1">
                                                    <i class="feather-check"></i>
                                                </div>
                                                <div class="col-11">
                                                    متابعة واجبات بشكل دورى وتقييمات للطلبة
                                                </div>
                                            </div> 
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-1">
                                                    <i class="feather-check"></i>
                                                </div>
                                                <div class="col-11">
                                                    جدول دراسى بمواعيد ثابتة
                                                </div>
                                            </div> 
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-1">
                                                    <i class="feather-check"></i>
                                                </div>
                                                <div class="col-11">
                                                    خطة لانهاء المنهج وخطة للمراجعة
                                                </div>
                                            </div> 
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-1">
                                                    <i class="feather-check"></i>
                                                </div>
                                                <div class="col-11">
                                                    اساتذة متخصصون فى المادة العلمية ومدربون على استخدام التكنولوجيا
                                                </div>
                                            </div>                                             
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-1">
                                                    <i class="feather-check"></i>
                                                </div>
                                                <div class="col-11">
                                                    توفير اكثر من وسيلة للدفع ( المحافظ الالكترونية - البريد المصرى - جميع البنوك ) 
                                                </div>
                                            </div> 
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-12 col-xl-6 col-12 rbt-hover">
                                <div class="thumbnail image-left-content">
                                    <img src="{{ url('front') }}/assets/images/classroom/5.jpg" alt="split Images">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>       
            </div>
            <!-- End Card Area -->
        </div>
    </div>
    
    <div class="rbt-rbt-blog-area rbt-section-gapTop bg-gradient-8 rbt-round-bottom-shape" style="margin-top: 65px;padding: 90px 0px 60px;">
        <div class="wrapper pb--50 rbt-index-upper">
            <div class="container">
                <h2 class="title color-white text-center">رأي الإعلام و المتخصصون</h2>
                <br>
                <!-- Start Card Area -->
                <div class="row g-5">
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
                <!-- End Card Area -->
            </div>
        </div>
    </div>

    {{-- أراء الطلاب --}}
    <div class="rbt-call-to-action-area rbt-section-gap bg-color-secondary-alt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rbt-cta-6 text-center">
                        <div class="content">
                            <h2 class="title">آراء طلاب الأكاديمية</h2>
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
                                
                                {{-- ِAli_Hassan --}}
                                {{-- معتز --}}            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-course-card-area rbt-section-gap bg-color-white" style="padding: 100px 0px 60px;">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="title">أراء عملائنا علي <span class="theme-gradient">منصات التواصل الإجتماعي</span></h2>
            </div>
            <br>            
            <br>            
            <br>

            <div class="rbt-gallery-area">
                <div class="row g-0 parent-gallery-container">
                    @foreach ($facebook_reviews as $review)
                        <a href="{{ url('back/images/facebook_reviews/'.$review->review) }}" class="child-gallery-single col-lg-6 col-12" style="padding: 15px;">
                            <div class="rbt-gallery rbt-card">
                                <img class="w-100 rbt-hover" src="{{ url('back/images/facebook_reviews/'.$review->review) }}" style="height: 200px;">
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            
            <br>
            <div class="btn-wrapper container rbt-hover-03">
                <a class="rbt-btn btn-gradient square btn-xl w-100 text-center mt--30 hover-transform-none" href="{{ url('testimonials') }}">
                    <span class="icon-reverse-wrapper">
                        <span class="btn-text">للمزيد من الآراء اضغط هنا</span>
                    </span>
                </a>
            </div>

        </div>
    </div>
    <br>
    



    
    <div class="gallery-area bg_image bg_image--8 bg_image_fixed" style="padding: 50px;direction: ltr;">
        <div class="container">
            <div class="row g-5 hanger-line ">
                <!-- Start Single Counter  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="rbt-counterup rbt-hover-03 border-bottom-gradient">
                        <div class="top-circle-shape"></div>
                        <div class="inner">
                            <div class="rbt-round-icon">
                                <img src="{{ url('front') }}/assets/images/icons/teacher.png" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h3 class="counter"><span class="odometer odometer-auto-theme" data-count="58"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">5</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div></span>
                                </h3>
                                <span class="subtitle">مدرس</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Counter  -->

                <!-- Start Single Counter  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt--60 mt_md--30 mt_sm--30 mt_mobile--60">
                    <div class="rbt-counterup rbt-hover-03 border-bottom-gradient">
                        <div class="top-circle-shape"></div>
                        <div class="inner">
                            <div class="rbt-round-icon">
                                <img src="{{ url('front') }}/assets/images/icons/online-education.png" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h3 class="counter"><span class="odometer odometer-auto-theme" data-count="193"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">8</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div></span>
                                </h3>
                                <span class="subtitle">دورة تعليمية</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Counter  -->

                <!-- Start Single Counter  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt_md--60 mt_sm--60">
                    <div class="rbt-counterup rbt-hover-03 border-bottom-gradient">
                        <div class="top-circle-shape"></div>
                        <div class="inner">
                            <div class="rbt-round-icon">
                                <img src="{{ url('front') }}/assets/images/icons/webinar.png" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h3 class="counter"><span class="odometer odometer-auto-theme" data-count="1900"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">1</span></span></span></span></span><span class="odometer-formatting-mark">,</span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div></span>
                                </h3>
                                <span class="subtitle">طالب كورسات</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Counter  -->

                <!-- Start Single Counter  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt--60 mt_md--30 mt_sm--30 mt_mobile--60">
                    <div class="rbt-counterup rbt-hover-03 border-bottom-gradient">
                        <div class="top-circle-shape"></div>
                        <div class="inner">
                            <div class="rbt-round-icon">
                                <img src="{{ url('front') }}/assets/images/icons/students.png" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h3 class="counter"><span class="odometer odometer-auto-theme" data-count="9800"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">1</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div></span>
                                </h3>
                                <span class="subtitle">طلبة دراسة</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Counter  -->
            </div>
        </div>
    </div>
    <br>

    {{-- للإطلاع علي عروضنا والإشتراكات اضغط هنا --}}
    <div class="rbt-callto-action rbt-cta-default style-4 variation-2 bg-gradient-6 mt--75 rbt-callto-action-area style-3">
        <div class="container">
            <div class="row align-items-center content-wrapper row--30 mt_dec--30 position-relative rbt-call-to-action-area rbt-section-gap bg-gradient-8 rbt-hover">
                <div class="col-lg-8 mt--30 offset-lg-3">
                    <div class="inner">
                        <div class="content text-left">
                            <h2 class="title color-white" data-sal="slide-up">
                                للإطلاع علي عروضنا والإشتراكات اضغط هنا 
                            </h2>
                            
                            <div class="call-to-btn text-start sal-animate" data-sal="slide-up" data-sal-duration="400" data-sal-delay="400" style="margin-top: 15px;">
                                <a class="rbt-btn rbt-switch-btn rbt-switch-y bg-white" style="color: #2f57ef;font-weight: bold;" href="{{ url('table_prices/term') }}">
                                    <span data-text="العروض والإشتراكات">العروض والإشتراكات</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="thumbnail" style="bottom: 4px;left: -3px;">
                    <img class="" src="{{ url('front') }}/assets/images/classroom/15.jpg" alt="Shape Images" style="border-radius: 5px;max-height: 100%;">
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    
    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
@endsection
