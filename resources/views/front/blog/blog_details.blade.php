@extends('front.layouts.app')

@section('title')
    مدونة:
    ( {{ $blog_details['title'] }} )
@endsection

@section('header')
	{{-- <style>
        .rbt-breadcrumb-default{
            background-image: {{ url('front/assets/images/blog/11.jpg') }} !important;
        }
    </style> --}}
    <meta property="og:image" content="{{ url('back') }}/images/blogs/{{ $blog_details['image'] }}">
@endsection

@section('footer')
    
@endsection

@section('content')
    
    <a class="close_side_menu" href="javascript:void(0);"></a>

    <div class="rbt-overlay-page-wrapper rbt-page-banner-wrapper">
        <div class="breadcrumb-image-container breadcrumb-style-max-width">
            <div class="breadcrumb-image-wrapper bg-gradient-11">
                {{-- <img src="{{ url('front') }}/assets/images/bg/bg-image-10.jpg"> --}}
            </div>
            <div class="breadcrumb-content-top text-center">
                <ul class="meta-list justify-content-center mb--10">
                    <li class="list-item">
                        <div class="author-info">
                            <a href="{{ url('blog/author/'.$blog_details['author']) }}"><strong>{{ $blog_details->author_name['name'] }}</strong></a>
                        </div>
                    </li>
                    <li class="list-item">
                        <i class="feather-clock" style="margin: 0px 4px;"></i>
                        <span>{{ \Carbon\Carbon::parse($blog_details['date'])->format('d-m-Y') }}</span>
                        <span style="font-weight: bold;margin: 0px 5px;">{{ \Carbon\Carbon::parse($blog_details['date'])->format('h:i a') }}</span>
                    </li>
                </ul>
                <h1 class="title">{{ $blog_details['title'] }}</h1>
            </div>
        </div>

        <div class="rbt-blog-details-area rbt-section-gapBottom breadcrumb-style-max-width" style="padding-bottom: 0px;">
            <div class="blog-content-wrapper rbt-article-content-wrapper">
                <div class="content">
                    <div class="post-thumbnail mb--30 position-relative wp-block-image alignwide" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300" data-sal-easing="ease-out-back">
                        <figure>
                            <img src="{{ url('back') }}/images/blogs/{{ $blog_details['image'] }}" style="background-attachment:fixed;background-repeat: no-repeat;background-size: cover;"> 
                        </figure>
                    </div>
        
                    <p style="text-align: center;margin-top: 20px;display: block;" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300" data-sal-easing="ease-out-back">
                        {!! $blog_details['description'] !!}
                    </p>
                    
                    <hr>
                    <div class="social-share-block" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300" data-sal-easing="ease-out-back">
                        <div class="tagcloud" style="position: relative;top: 10px;">
                            <a href="{{ url('blog/category/'.$blog_details->category) }}">
                                {{ $blog_details->category_name->name }}
                            </a>
                        </div>
                        <ul class="social-icon social-default transparent-with-border">
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
                            <li><a href="">
                                    <i class="feather-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="rbt-comment-area" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300" data-sal-easing="ease-out-back">
                        <div class="comment-respond">
                            <h4 class="title">اترك تعليقاً</h4>
                            <form action="#">
                                <p class="comment-notes"><span id="email-notes">لن يتم نشر عنوان بريدك الإلكتروني. الحقول الإلزامية مشار إليها بـ *
                                </span></p>
                                <div class="row row--10">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">إسمك *</label>
                                            <input id="name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="bl-email">البريد الإلكتروني *</label>
                                            <input id="bl-email" type="email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="message">التعليق</label>
                                            <textarea id="message" name="message"></textarea>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-12">
                                        <p class="comment-form-cookies-consent">
                                            <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
                                            <label for="wp-comment-cookies-consent">
                                                احفظ اسمك ، والبريد الإلكتروني الخاص بك لاستخدامهم في المرة القادمة التي تعلق فيها
                                            </label>
                                        </p>
                                    </div> --}}
                                    <div class="col-lg-12">
                                        <a class="rbt-btn btn-gradient icon-hover radius-round btn-md" href="#">
                                            <span class="btn-text" style="margin: 0px 10px;">حفظ التعليق</span>
                                            <span class=""><i class="feather-arrow-left"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <br />
                    <hr />
                    <div class="rbt-comment-area" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300" data-sal-easing="ease-out-back">
                        <h4 class="title">
                            تعليقات المقال
                            <span style="color: rgb(76, 138, 167);">[ {{ count($blog_comments) }} ]</span>
                        </h4>
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="comment-body">
                                    @if (count($blog_comments) > 0)                                    
                                        @foreach ($blog_comments as $comment)
                                            <div class="single-comment">
                                                {{-- <div class="comment-img" style="margin: 0px 10px;">
                                                    <img src="{{ url('front') }}/assets/images/testimonial/testimonial-1.jpg" alt="Author Images">
                                                </div> --}}
                                                <div class="comment-inner rbt-hover-03">
                                                    <h6 class="commenter">
                                                        <a href="">{{ $comment->author_name_blog_comment['name'] }}</a>
                                                    </h6>
                                                    <div class="comment-meta">
                                                        <div class="time-spent" style="font-size: 14px;">
                                                            {{ $comment->created_at->format('d-m-Y') }}
                                                            <span style="margin: 0px 7px;font-weight: bold;">{{ $comment->created_at->format(' h:i a') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="comment-text">
                                                        <p class="b2">{{ $comment->comment}} </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                        @endforeach
                                    @else
                                        <div class="single-comment">
                                            <div class="comment-inner">
                                                <div class="comment-text">
                                                    لاتوجد تعليقات لهذا المقال
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                    @endif  
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

                @if (count($related_blogs) != 0)
                    <div class="related-post pt--60" data-sal="slide-up" data-sal-duration="400" data-sal-delay="300" data-sal-easing="ease-out-back">
                        <div class="section-title text-start mb--40 text-center" style="text-decoration: underline;">
                            <h4 class="title">قد يهمك أيضاً</h4>
                        </div>

                        @foreach ($related_blogs as $blog)                       
                            <div class="rbt-card card-list variation-02 rbt-hover mt--30">
                                <div class="rbt-card-img">
                                    <a href="{{ url('blog/'.$blog->id) }}">
                                        <img src="{{ url('back') }}/images/blogs/{{ $blog->image }}" style="background-attachment:fixed;background-repeat: no-repeat;background-size: cover;height: 200px;"> 
                                    </a>
                                </div>
                                <div class="rbt-card-body">
                                    <h5 class="rbt-card-title">
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
                                            <a href="{{ url('blog/category/'.$blog->category) }}" style="position: relative;top: -3px;">
                                                <i class="feather-box"></i> 
                                                {{ $blog->category_name->name }}</a>
                                        </li>
                                        <li>
                                            <i class="feather-clock"></i> 
                                            <span>{{ \Carbon\Carbon::parse($blog->date)->format('d-m-Y') }}</span>
                                            <span style="font-weight: bold;">{{ \Carbon\Carbon::parse($blog->date)->format('h:i a') }}</span>
                                        </li>
                                    </ul>
                                    <div class="rbt-card-bottom">
                                        <a class="transparent-button" href="{{ url('blog/'.$blog->id) }}">
                                            إقرأ المقال
                                            <i class="fas fa-angle-left" style="position: relative;top: 2px;margin: 0px 3px;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    
                @endif
            </div>
        </div>
    </div>
    

    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
@endsection
