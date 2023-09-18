@extends('front.layouts.app')

@section('title')
    الشروط والأحكام للمدرسين
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

    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30" style="background-image: url('front/assets/images/home/h44.jpg') !important;background-repeat: no-repeat;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title color-white">الشروط والأحكام للمدرسين</h2>
                        <ul class="page-list" style="margin-bottom: 20px;">
                            <li class="rbt-breadcrumb-item"><a href="{{ url('/') }}" class="color-white">الرئيسية</a></li>
                            <li>
                                <div class="icon-left color-white"><i class="feather-chevron-left"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active color-white">الشروط والأحكام للمدرسين</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="rbt-list-style-area bg-color-white ">
        <div class="container">
            <div class="row g-5 rbt-elements-area bg-color-white rbt-shadow-box mb--60 title">
                {!! $find['description'] !!}
            </div>
    </div>


    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
@endsection
