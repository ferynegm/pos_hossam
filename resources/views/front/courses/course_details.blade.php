@extends('front.layouts.app')

@section('title')
    تفاصيل دورة:
    ( {{ $course_details['name'] }} )
@endsection

@section('header')
    <meta property="og:image" content="{{ url('back/images/courses/'.$course_details['image']) }}">
	<style>
        .sticky-top{
            top: 85px;
            z-index: 9;
        }

        .nav-item a{
            padding: 0px 25px;
            height: 50px;
            line-height: 50px;
            font-size: 15px;
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

    <div class="rbt-breadcrumb-default rbt-breadcrumb-style-3">
        <div class="breadcrumb-inner">
            <img src="{{ url('front') }}/assets/images/bg/bg-image-10.jpg" alt="Education Images">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="content text-start">
                        <ul class="page-list" style="text-align: right;">
                            <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}" class="color-white">الرئيسية</a></li>
                            <li>
                                <div class="icon-left"><i class="feather-chevron-left  color-white"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item"><a href="{{ url('/courses') }}" class="color-white">دورات الأكاديمية</a></li>
                        </ul>
                        <h2 class="" style="text-align: right;color: rgb(231, 224, 213);line-height: 1.27;">
                            {{ $course_details['name'] }}
                        </h2>
                            
                        <div class="rbt-author-meta mb--20">
                            <div class="rbt-avater">
                                <a href="#">
                                    <img src="{{ url('front') }}/assets/images/client/avatar-02.png" alt="Sophia Jaymes">
                                </a>
                            </div>
                            <div class="rbt-author-info color-white">
                                مدرس الدورة:  <a href="{{ url('teachers/'.$course_details['teacher']) }}" style="margin: 0px 7px;color: rgb(255, 255, 255);text-decoration: underline;font-weight: bold;">{{ $course_details->teacher_name['name'] }}</a></a>
                            </div>
                        </div>


                        <ul class="rbt-portfolio-filter filter-tab-button justify-content-start nav nav-tabs" id="rbt-myTab" role="tablist" style="margin-top: 30px;">
                            @foreach ($langs_explode as $lang)
                                <li class="nav-item" role="presentation">
                                    <a href="{{ url('courses/lang-filter/'.$lang) }}" type="button">
                                        {{ $lang }}    
                                    </a>
                                </li>
                            @endforeach
                        
                            @foreach ($ages_explode as $age)
                                <li class="nav-item" role="presentation">
                                    <a href="{{ url('courses/ages-filter/'.$age) }}" type="button">
                                        @if ($age == 1)
                                            أطفال
                                        @elseif($age == 2)
                                            كبار 
                                        @endif      
                                    </a>
                                </li>
                            @endforeach
                            
                            @foreach ($stages_explode as $stage)
                                <li class="nav-item" role="presentation">
                                    <a href="{{ url('courses/stages-filter/'.$stage) }}" type="button">
                                        @if ($stage == 1)
                                            المرحلة الإبتدائية
                                        @elseif($stage == 2)
                                            المرحلة الإبتدائية 
                                        @elseif($stage == 3)
                                            المرحلة الثانوية
                                        @endif
                                    </a>     
                                </li>                               
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="rbt-course-details-area ptb--60">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-8">
                    <div class="course-details-content">
                        <div class="rbt-course-feature-box rbt-shadow-box thuumbnail" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                            <img class="w-100" src="{{ url('back/images/courses/'.$course_details['image']) }}" alt="Card image">
                        </div>

                        <div class="rbt-inner-onepage-navigation sticky-top mt--30">
                            <nav class="mainmenu-nav onepagenav">
                                <ul class="mainmenu">
                                    <li>
                                        <a href="#coursecontent">محتوي الدورة</a>
                                    </li>
                                    <li>
                                        <a href="#details">تفاصيل الدورة</a>
                                    </li>
                                    <li>
                                        <a href="#intructor">مدرس الدورة</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>


                        <!-- Start course_content  -->
                        <div id="coursecontent" style="padding-top: 30px;">
                            <div class="rbt-separator-mid" style="margin: 50px 0px 10px !important;height: 3px;" >
                                <div class="container">
                                    <h2 class="fancy" style="--w: 15vw;--c: #f58225;--b:4px;--g: 40px">محتوي الدورة</h2>
                                </div>
                            </div>
                            <br>
                            <div class="course-content rbt-shadow-box coursecontent-wrapper rbt-hover mt--30" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                <div class="rbt-course-feature-inner">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">محتوي الدورة</h4>
                                    </div>
                                    
                                    <div>
                                        {!! $course_details['content'] !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end course_content  -->



                         <!-- Start course_details  -->
                         <div id="details" style="padding-top: 30px;">
                            <div class="rbt-separator-mid" style="margin: 50px 0px 10px !important;height: 3px;" >
                                <div class="container">
                                    <h2 class="fancy" style="--w: 15vw;--c: #f58225;--b:4px;--g: 40px">تفاصيل الدورة</h2>
                                </div>
                            </div>
                            <br>
                            <div class="course-content rbt-shadow-box details-wrapper rbt-hover mt--30" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                <div class="rbt-course-feature-inner">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">تفاصيل الدورة</h4>
                                    </div>
                                    
                                    <div>
                                        {!! $course_details['details'] !!}
                                    </div>
                                </div>
                            </div>
                         </div>
                         <!-- end course_details  -->
                         

                        <!-- Start Intructor Area  -->
                        <div id="intructor" style="padding-top: 30px;">
                            <div class="rbt-separator-mid" style="margin: 50px 0px 10px !important;height: 3px;" >
                                <div class="container">
                                    <h2 class="fancy" style="--w: 15vw;--c: #f58225;--b:4px;--g: 40px">مدرس الدورة</h2>
                                </div>
                            </div>
                            <br>
                            <div class="rbt-instructor rbt-shadow-box intructor-wrapper rbt-hover mt--30" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                <div class="about-author border-0 pb--0 pt--0">
                                    <div class="section-title mb--30">
                                        <h4 class="rbt-title-style-3">مدرس الدورة</h4>
                                    </div>
                                    <div class="media align-items-center">
                                        <div class="thumbnail">
                                            <a href="{{ url('teachers/'.$course_details['teacher']) }}">
                                                @if ($course_details->teacher_name['image'] === 'df_image.png')
                                                    @if ($course_details->teacher_name['gender'] == 1 )
                                                        <img src="{{ url('back/images/teachers/male_front.png') }}" alt="teacher Images" style="width: 200px;height: 200px;object-fit: fill;margin: 0px 0px 0px 30px;min-width: 200px;max-height: 200px;">
                                                    @else
                                                        <img src="{{ url('back/images/teachers/female_front.png') }}" alt="teacher Images" style="width: 200px;height: 200px;object-fit: fill;margin: 0px 0px 0px 30px;min-width: 200px;max-height: 200px;">                                                    @endif
                                                @else
                                                    <img src="{{ url('back/images/teachers/'.$course_details->teacher_name['image']) }}" alt="teacher Images" style="width: 200px;height: 200px;object-fit: fill;margin: 0px 0px 0px 30px;min-width: 200px;max-height: 200px;">
                                                @endif                                                
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="author-info">
                                                <h5 class="title">
                                                    <a class="hover-flip-item-wrapper" href="{{ url('teachers/'.$course_details['teacher']) }}">{{ $course_details->teacher_name['name'] }}</a>
                                                </h5>
                                                <span class="b3 subtitle">{{ $course_details->teacher_name['job'] }}</span>
                                            </div>
                                            <div class="content">
                                                <p class="description">
                                                    {!! implode(' ', array_slice(explode(' ', $course_details->teacher_name['description']), 0, 20)) !!}
                                                </p>

                                                <ul class="social-icon social-default icon-naked justify-content-start">
                                                    <li><a href="">
                                                            <i class="feather-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="">
                                                            <i class="feather-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="">
                                                            <i class="feather-linkedin"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Intructor Area  -->
                    </div>
                    


                    {{-- related_courses --}}
                    @if (count($related_courses) > 0) 
                        <div id="coursecontent" style="padding-top: 30px;">
                            <div class="rbt-separator-mid" style="margin: 50px 0px 10px !important;height: 3px;" >
                                <div class="container">
                                    <h2 class="fancy" style="--w: 15vw;--c: #f58225;--b:4px;--g: 40px">دورات ذات صلة</h2>
                                </div>
                            </div>
                            <br>
                        </div>

                        
                        <div class="related-course rbt-shadow-box rbt-hover mt--60">                        
                            <div class="row g-5">
                                <div class="section-title">
                                    <h4 class="rbt-title-style-3">دورات ذات صلة</h4>
                                </div>
                                
                                @foreach ($related_courses as $course)
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                        <div class="rbt-card variation-01 rbt-hover" style="padding: 0px 10px;">
                                            <div class="rbt-card-img">
                                                <a href="{{ url('courses/'.$course->id) }}">
                                                    <img src="{{ url('back/images/courses/'.$course->image) }}" style="width: 100%;height: 170px;" />
                                                </a>
                                            </div>
                                            <div class="rbt-card-body" style="padding-bottom: 20px;">
                                                <h4 class="rbt-card-title" style="height: 60px;"><a href="{{ url('courses/'.$course->id) }}">{{ $course->name }}</a>
                                                </h4>

                                                <hr>
                                                {{-- <ul class="rbt-meta">
                                                    @foreach ($langs_explode as $lang)
                                                        <li>
                                                            <a href="{{ url('courses/lang-filter/'.$lang) }}" type="button">
                                                                {{ $lang }}    
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                
                                                    @foreach ($ages_explode as $age)
                                                        <li>
                                                            <a href="{{ url('courses/ages-filter/'.$age) }}" type="button">
                                                                @if ($age == 1)
                                                                    أطفال
                                                                @elseif($age == 2)
                                                                    كبار 
                                                                @endif      
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                    
                                                    @foreach ($stages_explode as $stage)
                                                        <li>
                                                            <a href="{{ url('courses/stages-filter/'.$stage) }}" type="button">
                                                                @if ($stage == 1)
                                                                    المرحلة الإبتدائية
                                                                @elseif($stage == 2)
                                                                    المرحلة الإبتدائية 
                                                                @elseif($stage == 3)
                                                                    المرحلة الثانوية
                                                                @endif
                                                            </a>     
                                                        </li>                               
                                                    @endforeach
                                                </ul> --}}

                                                <div class="rbt-author-meta mb--10">
                                                    <div class="rbt-avater">
                                                        <a href="{{ url('courses/teachers/'.$course->teacher) }}">
                                                            <img src="{{ url('front') }}/assets/images/client/avatar-02.png">
                                                        </a>
                                                    </div>
                                                    <div class="rbt-author-info">
                                                        المدرس 
                                                        <a href="{{ url('courses/teachers/'.$course->teacher) }}" style="margin: 0px 3px;color: rgb(57, 57, 252);text-decoration: underline;">
                                                            ( {{ $course->teacher_name->name }} )
                                                        </a>
                                                    </div>
                                                </div>
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
                    @endif
                </div>
                
                <div class="col-lg-4">
                    <div class="course-sidebar sticky-top rbt-shadow-box course-sidebar-top rbt-gradient-border">
                        <div class="inner">

                            <!-- Start Viedo Wrapper  -->
                            @if ($course_details['video'] != null)
                                <video style="width:100%;max-height: 300px;border-radius:5px;" controls>
                                    <source src="{{ url('back/images/courses/'.$course_details['video']) }}" type="video/ogg">
                                </video>
                            @endif
                            
                            <div class="content-item-content">
                                <div class="add-to-card-button mt--15">
                                    @if ($course_details['whatsapp_teacher'] != null)
                                        <a href="https://wa.me/{{ $course_details['whatsapp_teacher'] }}" class="rbt-btn w-100 d-block text-center" href="#" style="background: #128c7e;">
                                            <span class="btn-text">
                                                تواصل معنا واتساب
                                                <img src="{{ url('front/assets/images/whats.png') }}" style="width: 40px;height: 40px;position: relative;top: -2px;right: 5px;"/>
                                            </span>
                                        </a>
                                    @else                                        
                                        <a href="https://wa.me/{{ App\Models\Back\Setting::first()->phone1 }}" class="rbt-btn w-100 d-block text-center" href="#" style="background: #128c7e;">
                                            <span class="btn-text">
                                                تواصل معنا واتساب
                                                <img src="{{ url('front/assets/images/whats.png') }}" style="width: 40px;height: 40px;position: relative;top: -2px;right: 5px;"/>
                                            </span>
                                        </a>                                        
                                    @endif
                                </div>

                                <br>
                                <div class="rbt-widget-details">
                                    {!! $course_details['sidebar'] !!}
                                </div>

                                <div class="social-share-wrapper mt--30 text-center">
                                    <div class="rbt-post-share d-flex align-items-center justify-content-center">
                                        <ul class="social-icon social-default transparent-with-border justify-content-center">
                                            <li><a href="https://www.facebook.com/">
                                                    <i class="feather-facebook"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.twitter.com">
                                                    <i class="feather-twitter"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.instagram.com/">
                                                    <i class="feather-instagram"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.linkdin.com/">
                                                    <i class="feather-linkedin"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr class="mt--20">
                                    <div class="contact-with-us text-center">
                                        <p>لتفاصيل اكثر عن الدورة </p>
                                        <p class="rbt-badge-2 mt--10 justify-content-center w-100"><i class="feather-phone mr--5"></i> كلمنا علي: <a href="tel:+{{ App\Models\Back\Setting::first()->phone1 }}" style="margin: 0px 5px;"><strong>{{ App\Models\Back\Setting::first()->phone1 }}</strong></a></p>
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
@endsection
