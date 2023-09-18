@extends('front.layouts.app')

@section('title')
    {{ trans('app.blog') }}
@endsection

@section('header')
	{{-- <style>
        .breadcrumb-inner ul li a{
            
        }
    </style> --}}
@endsection

@section('footer')
    
@endsection

@section('content')
    <a class="close_side_menu" href="javascript:void(0);"></a>

    <div class="rbt-page-banner-wrapper" style="background-image: url('front/assets/images/breadcrumb/666.jpg') !important;background-repeat: no-repeat;background-size: cover;">
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
    </div>

    {{-- <div class="rbt-callto-action rbt-cta-default style-2">
        <div class="container content-wrapper overflow-hidden">
            <div class="row gy-5 align-items-center">
                <div class="col-lg-8">
                    <div class="inner">
                        <div class="content text-left">
                            <h3 class="title" data-sal="slide-up" data-sal-duration="400" data-sal-delay="200">Ready to start creating a standard website?</h3>
                            <h6 class="subtitle" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300">Finest choice for your home &amp; office</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="call-to-btn text-start text-lg-end position-relative" data-sal="slide-up" data-sal-duration="400" data-sal-delay="400">
                        <a class="rbt-btn rbt-switch-btn rbt-switch-y" href="#">
                            <span data-text="Purchase Histudy">Purchase Histudy</span>
                        </a>
                        <div class="shape-text-image">
                            <img class="rbt-rotatation-round" src="assets/images/shape/cta-text.png" alt="Education Images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    
    <div class="rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <div class="row row--30 gy-5">

                <div class="col-lg-8">

                    <div class="row g-5">

                        @foreach ($all_blogs as $blog)
                            <div class="col-lg-6 col-md-6 col-12" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300" data-sal-easing="ease-out-back">
                                <div class="rbt-blog-grid rbt-card variation-02 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="{{ url('blog/'.$blog->id) }}">
                                            <img src="{{ url('back') }}/images/blogs/{{ $blog->image }}" style="background-attachment:fixed;background-repeat: no-repeat;background-size: cover;height: 200px;"> 
                                        </a>
                                    </div>
                                    <div class="rbt-card-body">
                                        <h5 class="rbt-card-title" style="font-size: 20px;text-decoration: underline;">
                                            <a href="{{ url('blog/'.$blog->id) }}">
                                                {{ implode(' ', array_slice(explode(' ', $blog->title), 0, 10)) }}
                                            </a>
                                        </h5>

                                        <ul class="blog-meta">
                                            <li>
                                                <a href="{{ url('blog/author/'.$blog->author) }}" style="position: relative;top: -3px;">
                                                    <i class="feather-user"></i> 
                                                    {{ $blog->author_name->name }}</a>   
                                            </li>
                                            <li>
                                                @if ($blog->category_name['status'] == 1)
                                                    <a href="{{ url('blog/category/'.$blog->category) }}" style="position: relative;top: -3px;">
                                                        <i class="feather-box"></i> 
                                                        {{ $blog->category_name->name }}
                                                    </a>
                                                @else
                                                    <a href="" style="position: relative;top: -3px;text-decoration: line-through;color: brown;">
                                                        <i class="feather-box"></i> 
                                                        {{ $blog->category_name->name }}
                                                    </a>
                                                @endif
                                            </li>
                                            <li>
                                                <i class="feather-clock"></i> 
                                                <span>{{ \Carbon\Carbon::parse($blog->date)->format('d-m-Y') }}</span>
                                                <span style="font-weight: bold;">{{ \Carbon\Carbon::parse($blog->date)->format('h:i a') }}</span>
                                            </li>
                                        </ul>
                                        {{-- <p class="rbt-card-text">
                                            {!! implode(' ', array_slice(explode(' ', $blog->description), 0, 12)) !!}
                                        </p> --}}
                                        <div class="rbt-card-bottom">
                                            <a class="transparent-button" href="{{ url('blog/'.$blog->id) }}">
                                                إقرأ المزيد
                                                <i class="fas fa-angle-left" style="position: relative;top: 2px;margin: 0px 3px;"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- End Card Area -->

                    <br>
                    <br>
                    <div class="row">
                        <div class="col-lg-12 mt--60">
                            {{ $all_blogs->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                    <br>

                </div>

                <div class="col-lg-4" data-sal="zoom-in" data-sal-duration="400" data-sal-delay="300" data-sal-easing="ease-out-back">
                    <aside class="rbt-sidebar-widget-wrapper rbt-gradient-border">

                        <!-- Start Widget Area  -->
                        {{-- <div class="rbt-single-widget rbt-widget-search">
                            <div class="inner">
                                <form action="#" class="rbt-search-style-1">
                                    <input type="text" placeholder="البحث عن مدونة">
                                    <button class="search-btn"><i class="feather-search"></i></button>
                                </form>
                            </div>
                        </div> --}}
                        <!-- End Widget Area  -->

                        <!-- Start Widget Area  -->
                        {{-- <div class="rbt-single-widget rbt-widget-recent">
                            <div class="inner">
                                <h4 class="rbt-widget-title">المدونات الأكثر تعليقا</h4>
                                <ul class="rbt-sidebar-list-wrapper recent-post-list">
                                    <li>
                                        <div class="thumbnail">
                                            <a href="event-details.html">
                                                <img src="assets/images/event/grid-type-04.jpg" alt="Event Images">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a href="event-details.html">Elegant Light Box Paper Cut.</a></h6>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-clock"></i>26 Mar, 2025</li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                        <!-- End Widget Area  -->

                        <!-- Start Widget Area  -->
                        <div class="rbt-single-widget rbt-widget-tag">
                            <div class="inner">
                                <h4 class="rbt-widget-title">أقسام المدونات</h4>
                                <div class="rbt-sidebar-list-wrapper rbt-tag-list">
                                    @foreach ($blog_categories as $categ)
                                        @if ($categ->status == 1)
                                            <a href="{{ url('blog/category/'.$categ->id) }}">{{ $categ->name }}</a>
                                        @else
                                            <a href="" style="text-decoration: line-through;color: brown;">{{ $categ->name }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- End Widget Area  -->
                    </aside>
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
