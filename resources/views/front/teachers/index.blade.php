@extends('front.layouts.app')

@section('title')
    المدرسون
@endsection

@section('header')

@endsection

@section('footer')
    
@endsection

@section('content')
    <a class="close_side_menu" href="javascript:void(0);"></a>

    <div class="rbt-page-banner-wrapper" style="background-image: url('front/assets/images/breadcrumb/777.jpg') !important;background-repeat: no-repeat;background-size: cover;">
        <div class="rbt-banner-image"></div>
        <div class="rbt-banner-content">
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-inner text-center">
                                <h2 class="title color-white">المدرسون</h2>
                                <ul class="page-list">
                                    <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}" class="color-white">الرئيسية</a></li>
                                    <li>
                                        <div class="icon-left color-white"><i class="feather-chevron-left"></i></div>
                                    </li>
                                    <li class="rbt-breadcrumb-item active color-white">المدرسون</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="rbt-team-area bg-color-extra2 rbt-section-gap">
        <div class="container">
            <div class="row g-5">

                @foreach ($all_teachers as $teacher)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="rbt-team team-style-default style-three small-layout rbt-hover">
                            <div class="inner">
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
                                <div class="content">
                                    <h4 class="title">
                                        <a href="{{ url('teachers/'.$teacher->group_id) }}">
                                            {{ $teacher->name }}
                                        </a>
                                    </h4>
                                    <h6 class="subtitle theme-gradient">{{ $teacher->job }}</h6>
                                    {{-- <span class="team-form" style="max-height: 35px;height: 35px;">
                                        <span>{!! $teacher->description !!}</span>
                                    </span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            
            <br>
            <br>
            <div class="row">
                <div class="col-lg-12 mt--60">
                    {{ $all_teachers->links('vendor.pagination.custom') }}
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
