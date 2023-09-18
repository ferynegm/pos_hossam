@extends('front.layouts.app')

@section('title')
    @if (count($blogs_by_category) != 0)
        مدونات  ( {{ $blogs_by_category[0]->category_name['name'] }} )
    @else
        مدونات  ( {{ $category_name['name'] }} )
    @endif
@endsection

@section('header')

@endsection

@section('footer')
    
@endsection

@section('content')
    <a class="close_side_menu" href="javascript:void(0);"></a>

    <div class="rbt-page-banner-wrapper bg-gradient-11">
        <div class="rbt-banner-image"></div>
        <div class="rbt-banner-content">
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-inner text-center">
                                @if (count($blogs_by_category) != 0)
                                    <h2 class="title">مدونات  ( {{ $blogs_by_category[0]->category_name['name'] }} )</h2>
                                @else
                                    <h2 class="title">مدونات  ( {{ $category_name['name'] }} )</h2>
                                @endif
                                
                                <ul class="page-list">
                                    <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                                    <li>
                                        <div class="icon-left"><i class="feather-chevron-left"></i></div>
                                    </li>
                                    @if (count($blogs_by_category) != 0)
                                        <li class="rbt-breadcrumb-item active">مدونات  ( {{ $blogs_by_category[0]->category_name['name'] }} )</li>
                                    @else
                                        <li class="rbt-breadcrumb-item active">مدونات  ( {{ $category_name['name'] }} )</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <!-- Start Card Area -->
            <div class="row g-5">
                @if (count($blogs_by_category) != 0)
                    @foreach ($blogs_by_category as $blog)
                        <div class="col-lg-4 col-md-4 col-12" data-sal="zoom-in" data-sal-duration="400" data-sal-delay="300" data-sal-easing="ease-out-back">
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
                                            <i class="feather-clock"></i> 
                                            <span>{{ \Carbon\Carbon::parse($blog->date)->format('d-m-Y') }}</span>
                                            <span style="font-weight: bold;">{{ \Carbon\Carbon::parse($blog->date)->format('h:i a') }}</span>
                                        </li>
                                    </ul>
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
                @else
                    <h3 class="title text-center rbt-hover" style="padding-top: 20px;">
                        <span class="theme-gradient">لاتوجد مدونات</span>
                         لهذا القسم
                    </h3>
                @endif                
            </div>
            <!-- End Card Area -->

            {{-- {{ $all_blogs->links() }} --}}
            {{-- {!! $all_blogs->render() !!} --}}


            @if (count($blogs_by_category) != 0)
                <div class="row">
                    <div class="col-lg-12 mt--60">
                        <nav>
                            <ul class="rbt-pagination">
                                <li><a href="#" aria-label="Previous"><i class="feather-chevron-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#" aria-label="Next"><i class="feather-chevron-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            @else
                
            @endif
        </div>
    </div>

    


    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
@endsection
