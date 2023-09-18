@extends('front.layouts.app')

@section('title')
    تواصل معنا
@endsection

@section('header')
    <style>
        
    </style>
@endsection

@section('footer')

@endsection

@section('content')

    <a class="close_side_menu" href="javascript:void(0);"></a>
    <div class="rbt-conatct-area bg-gradient-11 rbt-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb--60">
                        {{-- <span class="subtitle bg-secondary-opacity">Contact Us</span> --}}
                        <h2 class="title">تواصل معنا</h2>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                    <div class="rbt-address">
                        <div class="icon">
                            <i class="feather-headphones"></i>
                        </div>
                        <div class="inner">
                            <h4 class="title">أرقام هواتف الاتصال</h4>
                            <p style="margin-bottom: 10px;"><a href="tel:+{{ $settings['phone1'] }}">{{ $settings['phone1'] }}</a></p>
                            <p><a href="tel:+{{ $settings['phone2'] }}">{{ $settings['phone2'] }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-delay="200" data-sal-duration="800">
                    <div class="rbt-address">
                        <div class="icon">
                            <i class="feather-mail"></i>
                        </div>
                        <div class="inner">
                            <h4 class="title">البريد الإلكتروني</h4>
                            <p><a href="mailto:{{ $settings['email'] }}">{{ $settings['email'] }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 sal-animate" data-sal="slide-up" data-sal-delay="250" data-sal-duration="800">
                    <div class="rbt-address">
                        <div class="icon">
                            <i class="feather-map-pin"></i>
                        </div>
                        <div class="inner">
                            <h4 class="title">عنوان</h4>
                            <p>{{ $settings['address'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>
            
            <ul class="social-icon social-default transparent-with-border" style="padding: 50px 50px 0px;">
                <li><a target="_blank" href="{{ $settings['facebook'] }}">
                        <i class="feather-facebook"></i>
                    </a>
                </li>
                <li><a target="_blank" href="{{ $settings['twitter'] }}">
                        <i class="feather-twitter"></i>
                    </a>
                </li>
                <li><a target="_blank" href="{{ $settings['tiktok'] }}" style="font-weight: bold;">
                        {{-- <i class="fab fa-tiktok"></i> --}}
                        t
                    </a>
                </li>
                <li><a target="_blank" href="{{ $settings['youtube'] }}">
                        <i class="feather-youtube"></i>
                    </a>
                </li>
            </ul>
            
        </div>
    </div>

    {{-- <div class="rbt-google-map bg-color-white rbt-section-gapTop" style="padding: 0px;">
        <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2965.0824050173574!2d-93.63905729999999!3d41.998507000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sWebFilings%2C+University+Boulevard%2C+Ames%2C+IA!5e0!3m2!1sen!2sus!4v1390839289319" height="600" style="border:0"></iframe>
    </div> --}}
    
    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
@endsection
