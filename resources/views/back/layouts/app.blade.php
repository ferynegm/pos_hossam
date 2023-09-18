<!doctype html>
@if (app()->getLocale() == 'en')
	<html lang="en">
@elseif (app()->getLocale() == 'ar')
	<html lang="ar" dir="rtl">
@endif
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('front') }}/assets/images/favicon.ico">
	<script src="{{ asset('back/assets/js/ckeditor/ckeditor.js') }}"></script>

	{{----------------------------------- all styles --------------------------------}}
	{{----------------------------------- ----------- --------------------------------}}
	@yield('header')
	@if (app()->getLocale() == 'en')
		{{-- bootstrap --}}
		<link href="{{ asset('back/assets/css/bootstrap.min.css') }}" id="bootstrap-style" type="text/css" rel="stylesheet"/>
		{{-- alertify --}}
		<link href="{{ asset('back/assets/css/alertify.min.css') }}" type="text/css" rel="stylesheet"/>
	@elseif (app()->getLocale() == 'ar')
		{{-- bootstrap --}}
        <link href="{{ asset('back/assets/css/bootstrap-rtl.min.css') }}" id="bootstrap-style" type="text/css" rel="stylesheet"/>
		{{-- alertify --}}
		<link href="{{ asset('back/assets/css/alertify.rtl.min.css') }}" type="text/css" rel="stylesheet"/>
	@endif
	
	{{-- icons --}}
	<link href="{{ asset('back/assets/css/icons.min.css') }}" type="text/css" rel="stylesheet"/>

	@if (app()->getLocale() == 'en')
		<link href="{{ asset('back/assets/css/cust.css') }}" rel="stylesheet"/>
		<link href="{{ asset('back/assets/css/app.min.css') }}" id="app-style" type="text/css" rel="stylesheet"/>
		{{-- <link href="{{ asset('back/assets/css/app-dark.min.css') }}" id="app-style" type="text/css" /> --}}
	@elseif (app()->getLocale() == 'ar')
		<link href="{{ asset('back/assets/css/cust-ar.css') }}" rel="stylesheet"/>
		<link href="{{ asset('back/assets/css/app-rtl.min.css') }}" id="app-style" type="text/css" rel="stylesheet"/>
	@endif

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;1,400;1,700;1,900&family=Nunito:ital,wght@0,200;0,400;0,600;1,200;1,400;1,700;1,900&family=PT+Serif:ital,wght@0,400;1,400;1,700&family=Secular+One&family=Signika+Negative:wght@300;400;700&family=Tajawal:wght@200;400;700&family=Titillium+Web:ital,wght@0,200;0,300;0,600;0,700;1,200;1,400;1,700&display=swap">

	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700&family=IBM+Plex+Sans+Arabic:wght@200&display=swap" rel="stylesheet">

    <style>
        p,div,span,a,h1,h2,h3,h4,h5,h6,label,tr,td,th,strong,button,input,textarea{
			font-family: Cairo !important;
		}
	</style>

	@include('back.layouts.app_style')
</head>

<body data-sidebar="colored" data-keep-enlarged="true" class="vertical-collpsed">
    {{-- <body data-sidebar="dark" > --}}
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->
    {{-- <div id="layout-wrapper" style="background: rgb(242,242,242);background: linear-gradient(184deg, rgba(242,242,242,1) 0%, rgb(231 232 235 / 80%) 100%);"> --}}


	<div id="layout-wrapper" style="background: #f3f5fa;box-shadow: 0px;">
		{{-- Navbar --}}
		@include('back/layouts/navbar')
		{{-- Sidebar --}}
		@include('back/layouts/sidebar')
		{{-- Content --}}
		@yield('content')
	</div>

	<div class="rightbar-overlay"></div>




	{{----------------------------------- all scripts --------------------------------}}
	{{----------------------------------- ----------- --------------------------------}}
	<script src="{{ asset('back/assets/libs/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('back/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('back/assets/libs/metismenu/metisMenu.min.js') }}"></script>
	<script src="{{ asset('back/assets/libs/simplebar/simplebar.min.js') }}"></script>
	<script src="{{ asset('back/assets/libs/node-waves/waves.min.js') }}"></script>
	<!-- dashboard init -->
	{{-- <script src="{{ asset('back/assets/js/pages/dashboard.init.js') }}"></script> --}}
	<!-- alertify -->
	<script src="{{ asset('back/assets/js/alertify.min.js') }}"></script>
	@yield('footer')
	<!-- App js -->
	<script src="{{ asset('back/assets/js/app.js') }}"></script>
	
	@include('back.layouts.app_script')
</body>
</html>
