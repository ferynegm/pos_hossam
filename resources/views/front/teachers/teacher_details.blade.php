@extends('front.layouts.app')

@section('title')
    مدرس ( {{ $teacher_details['name'] }} )
@endsection

@section('header')
    @if ($teacher_details['image'] === 'df_image.png')
        @if ($teacher_details['gender'] == 1 )
            <meta property="og:image" content="{{ url('back') }}/images/teachers/male_front.png">
        @else
            <meta property="og:image" content="{{ url('back') }}/images/teachers/female_front.png">
        @endif
    @else
        <meta property="og:image" content="{{ url('back') }}/images/teachers/{{ $teacher_details['image'] }}">
    @endif

	<style>
        .rbt-section-gap {
            padding: 80px 0 50px;
        }
    </style>
@endsection

@section('footer')
    
@endsection

@section('content')

    <a class="close_side_menu" href="javascript:void(0);"></a>

    <div class="rbt-page-banner-wrapper">
        <div class="rbt-banner-image" style="background: transparent !important;"></div>
    </div>

    <div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rbt-dashboard-content-wrapper">
                        <div class="tutor-bg-photo bg_image bg_image--22 height-350"></div>
                        <div class="rbt-tutor-information">
                            <div class="rbt-tutor-information-left">
                                <div class="tutor-content">
                                    <h5 class="title">{{ $teacher_details['name'] }}</h5>
                                    <div class="rbt-review">
                                        <span class="rating-count"> ({{ count($teacher_feedback) }}) تقييم</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rbt-video-area rbt-section-gap bg-color-white">
                        <div class="container">
                            <div class="row g-5 align-items-center">

                                <div class="col-lg-5">
                                    <div class="video-popup-wrapper">
                                        @if ($teacher_details['image'] === 'df_image.png')
                                            @if ($teacher_details['gender'] == 1 )
                                                <img src="{{ url('back') }}/images/teachers/male_front.png" class="w-100 rbt-radius" style="height: 420px;">
                                            @else
                                                <img src="{{ url('back') }}/images/teachers/female_front.png" class="w-100 rbt-radius" style="height: 420px;">
                                            @endif
                                        @else
                                            <img class="w-100 rbt-radius" src="{{ url('back') }}/images/teachers/{{ $teacher_details['image'] }}" style="height: 420px;" >
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-7">
                                    <div class="inner pr--50 pr_md--0 pr_sm--0" >
                                        <div class="section-title text-start">
                                            <div class="section-title">
                                                <h4 class="rbt-title-style-3 text-center">الملف التعريفي</h4>
                                            </div>
                                            
                                            <div class="rbt-profile-row row row--15" style="padding: 0px 0px 15px;">
                                                <div class="col-lg-3 col-xs-3" style="text-align: right;">
                                                    <div class="rbt-profile-content b2">الإسم</div>
                                                </div>
                                                <div class="col-lg-9 col-xs-9">
                                                    <div class="rbt-profile-content b2">{{ $teacher_details['name'] }}</div>
                                                </div>
                                            </div>
                                            
                                            <hr />
                                            <div class="rbt-profile-row row row--15 mt--15" style="padding: 0px 0px 15px;">
                                                <div class="col-lg-3 col-xs-3" style="text-align: right;">
                                                    <div class="rbt-profile-content b2">الوظيفة</div>
                                                </div>
                                                <div class="col-lg-9 col-xs-9">
                                                    <div class="rbt-profile-content b2">{{ $teacher_details['job'] }}</div>
                                                </div>
                                            </div>
                                
                                            <hr />
                                            <div class="rbt-profile-row row row--15 mt--15" style="padding: 0px 0px 15px;">
                                                <div class="col-12" style="text-align: right;">
                                                    <div class="rbt-profile-content b2"  style="text-align: center;margin-bottom: 15px;">الوصف</div>
                                                </div>

                                                <div class="col-12" style="text-align: center;">
                                                    <div class="rbt-profile-content b2">{!! $teacher_details['description'] !!}</div>
                                                </div>
                                            </div>
                                            <hr />
                
                                            <ul class="social-icon social-default justify-content-start" style="padding: 0px 0px 15px;">
                                                <li><a href="">
                                                        <i class="feather-facebook"></i>
                                                    </a>
                                                </li>
                                                <li><a href="">
                                                        <i class="feather-twitter"></i>
                                                    </a>
                                                </li>
                                                <li><a href="">
                                                        <i class="feather-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <i class="feather-linkedin"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <hr />
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>


                    {{-- Teacher Samples --}}
                    @if ($teacher_samples[0]['video_link'] != null)
                        <div class="rbt-related-product rbt-section-gapBottom bg-color-white">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-title text-center mb--50">
                                            <h2 class="title"><span class="theme-gradient">نماذج شرح للمدرس</span></h2>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row g-5">
                                    @foreach ($teacher_samples as $sample)                                            
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="rbt-card card-list-2 event-list-card variation-01 rbt-hover">
                                                <div class="rbt-card-img">
                                                    <iframe src="{{ $sample->video_link }}?controls=0" style="border-radius: 10px;height: 180px;;"></iframe>
                                                </div>
                                                <div class="rbt-card-body" style="padding: 5px 10px;text-align: center;">
                                                    <p class="rbt-card-title">{{ $sample->video_desc }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif


                    {{-- Teacher Reviews --}}
                    @if (count($teacher_feedback) > 0)
                        <div class="rbt-related-product rbt-section-gapBottom bg-color-white">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-title text-center mb--50">
                                            <h2 class="title"><span class="theme-gradient">تقييمات المدرس</span></h2>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row g-0 parent-gallery-container">
                                    @foreach ($teacher_feedback as $feedback)                                            
                                        <a href="{{ url('back') }}/images/teacher_feedback/{{ $feedback->image }}" class="child-gallery-single col-md-4 col-12">
                                            <div class="rbt-gallery">
                                                <img class="w-100" src="{{ url('back') }}/images/teacher_feedback/{{ $feedback->image }}" style="height: 300px;border: 10px solid transparent;">
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    
                    {{-- Related Teachers --}}
                    @if (count($related_teacher) > 0)
                        <div class="rbt-related-product rbt-section-gapBottom bg-color-white" style="padding-bottom: 0px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-title text-center mb--50">
                                            <h2 class="title"><span class="theme-gradient">مدرسين ذات صلة</span></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-5">
                                    @foreach ($related_teacher as $teacher)                        
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="rbt-default-card style-three rbt-hover">
                                                <div class="inner">
                                                    <div class="content pt--0 pb--10" style="padding-top: 10px;">
                                                        <h2 class="title"><a href="{{ url('teachers/'.$teacher->group_id) }}">{{ $teacher->name }}</a></h2>
                        
                                                        <span class="subtitle theme-gradient" style="font-weight: bold;">
                                                            <span class="location">{{ $teacher->job }}</span>
                                                        </span>

                                                        {{-- <span class="team-form" style="max-height: 35px;height: 35px;">
                                                            <span>{!! $teacher->description !!}</span>
                                                        </span> --}}
                                                    </div>   

                                                    <div class="thumbnail">
                                                        <a href="{{ url('teachers/'.$teacher->group_id) }}">
                                                            @if ($teacher->image === 'df_image.png')
                                                                @if ($teacher->gender == 1 )
                                                                    <img src="{{ url('back') }}/images/teachers/male_front.png" style="height: 350px;background: #e9e9e9;">
                                                                @else
                                                                    <img src="{{ url('back') }}/images/teachers/female_front.png" style="height: 350px;background: #e9e9e9;">
                                                                @endif
                                                            @else
                                                                <img src="{{ url('back') }}/images/teachers/{{ $teacher->image }}" style="height: 350px;">
                                                            @endif
                                                        </a>
                                                    </div>                                                                                                                                          
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
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
