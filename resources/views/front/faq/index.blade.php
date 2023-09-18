@extends('front.layouts.app')

@section('title')
    الأسئلة الشائعة    
@endsection

@section('header')
    <style>
        .rbt-accordion-style .card .card-header button::before{
            left: 20px !important;
        }

        .rbt-accordion-style .card .card-header button::after{
            left: 20px !important;
        }

        @media only screen and (max-width: 575px){
            .rbt-accordion-style .card .card-header button {
                display: inline-flex;
            }
        }

    </style>
@endsection

@section('footer')
    
@endsection

@section('content')
    <a class="close_side_menu" href="javascript:void(0);"></a>

    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30" style="background-image: url('front/assets/images/faq2.jpg') !important;background-repeat: no-repeat;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title color-white">الأسئلة الشائعة</h2>
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}" class="color-white">الرئيسية</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-left color-white"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active color-white">الأسئلة الشائعة</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-accordion-area accordion-style-1 bg-color-white rbt-section-gap">
        <div class="container">
            <div class="rbt-accordion-style accordion">
                <div class="rbt-accordion-style rbt-accordion-04 accordion">
                    <div class="accordion" id="accordionExamplec3">
                        @foreach ($faqs as $faq)
                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="heading_{{ $faq->id }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{ $faq->id }}" aria-expanded="false" aria-controls="collapse_{{ $faq->id }}">
                                        {{ $faq->title }}
                                    </button>
                                </h2>
                                <div id="collapse_{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading_{{ $faq->id }}" data-bs-parent="#accordionExamplec3">
                                    <div class="accordion-body card-body" style="line-height: 35px;">
                                        {{ $faq->description }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
