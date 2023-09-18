@extends('front.layouts.app')

@section('title')
404: 
الصفحة غير موجودة
@endsection

@section('header')
    <style>
        
    </style>
@endsection

@section('footer')

@endsection

@section('content')

    <a class="close_side_menu" href="javascript:void(0);"></a>
    
    <div class="rbt-error-area bg-gradient-11 rbt-section-gap" style="padding-top: 80px;">
        <div class="error-area">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-10">
                        <h1 class="title">404</h1>
                        <h3 class="sub-title">الصفحة غير موجودة</h3>
                        <p>
                            الصفحة التي تبحث عنها غير موجودة
                        </p>
                        <div class="rbt-button-group">
                            <a class="rbt-moderbt-btn" href="{{ url('/') }}">
                                <span class="moderbt-btn-text">عودة للصفحة الرئيسية</span>
                                <i class="feather-arrow-left"></i>
                            </a>
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
