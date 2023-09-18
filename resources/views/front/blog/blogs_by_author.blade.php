@extends('front.layouts.app')

@section('title')
    مدونات  ( {{ $blogs_by_author[0]->author_name['name'] }} )
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
                                <h2 class="title">مدونات  ( {{ $blogs_by_author[0]->author_name['name'] }} )</h2>
                                <ul class="page-list">
                                    <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
                                    <li>
                                        <div class="icon-left"><i class="feather-chevron-left"></i></div>
                                    </li>
                                    <li class="rbt-breadcrumb-item active">مدونات ( {{ $blogs_by_author[0]->author_name['name'] }} )</li>
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

                @foreach ($blogs_by_author as $blog)
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

            {{-- {{ $all_blogs->links() }} --}}
            {{-- {!! $all_blogs->render() !!} --}}


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
        </div>
    </div>

    


    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
@endsection
