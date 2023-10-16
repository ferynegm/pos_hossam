<!doctype html>
<html lang="ar" dir="rtl">
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>
		الجامع ستور | 
		@yield('title')
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front') }}/assets/images/favicon.ico">
	<script src="{{ asset('back/assets/js/ckeditor/ckeditor.js') }}"></script>

	{{----------------------------------- all styles --------------------------------}}
	{{----------------------------------- ----------- --------------------------------}}
	@yield('header')
	
	{{-- dataTables --}}
	<link href="{{ asset('back') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back') }}/assets/libs/datatables.net-buttons-bs4/c/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="{{ asset('back') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 

	{{-- select2 --}}
	<link href="{{ asset('back') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
	
	{{-- semantic --}}
	<link href="{{ asset('back') }}/assets/css/semantic.min.css" rel="stylesheet" type="text/css" />
	
	{{-- file upload --}}
    <link href="{{ asset('back') }}/assets/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back') }}/assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
	
	{{-- spotlight --}}
    <link href="{{ asset('back') }}/assets/css/spotlight.min.css" rel="stylesheet" type="text/css" />
	
	{{-- bootstrap --}}
	<link href="{{ asset('back/assets/css/bootstrap-rtl.min.css') }}" id="bootstrap-style" type="text/css" rel="stylesheet"/>
	
	{{-- alertify --}}
	<link href="{{ asset('back/assets/css/alertify.rtl.min.css') }}" type="text/css" rel="stylesheet"/>
	
	{{-- icons --}}
	<link href="{{ asset('back/assets/css/icons.min.css') }}" type="text/css" rel="stylesheet"/>

	<link href="{{ asset('back/assets/css/cust-ar.css') }}" rel="stylesheet"/>
	<link href="{{ asset('back/assets/css/app-rtl.min.css') }}" id="app-style" type="text/css" rel="stylesheet"/>

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

<body data-sidebar="dark" data-keep-enlarged="true" class="vertical-collpsed">
    {{-- <body data-sidebar="colored" > --}}
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
	<!-- select2 -->
	<script src="{{ asset('back') }}/assets/libs/select2/js/select2.min.js"></script>
    <!-- spotlight -->
	<script src="{{ asset('back') }}/assets/js/spotlight.bundle.js"></script>
	<script src="{{ asset('back') }}/assets/js/spotlight.min.js"></script>
	{{-- nice scroll --}}
	<script src="{{ asset('back') }}/assets/js/jquery.nicescroll.min.js"></script>
	
	
	{{-- Datatable --}}
	<script src="{{ asset('back') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="{{ asset('back') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.f3.d"></script>
	<!-- Buttons examples -->
	<script src="{{ asset('back') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.14e"></script>
	<script src="{{ asset('back') }}/assets/libs/datatables.net-buttons-bs4/j/buttons.bootstrap4.min"></script>
	<script src="{{ asset('back') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.153.dela"></script>
	<script src="{{ asset('back') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.154.dela"></script>
	<script src="{{ asset('back') }}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.155.del"></script>
    <!-- file-upload -->
    <script src="{{ asset('back') }}/assets/file-upload-with-preview.min.js"></script>
    <script src="{{ asset('back') }}/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>



	{{-- start ajax token --}}
		<script>
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		</script>
	{{-- end ajax token --}}

	{{-- start reset form data when close offcanavas --}}
	<script>
		$(document).ready(function() {
			var offcanvas = $('#offcanvasWithBothOptions');
			
			$(document).on('click', function(event) {
				if (!$(event.target).closest(offcanvas).length) {
					$("#offcanvasWithBothOptions form")[0].reset();
					$("#offcanvasWithBothOptions form bold[class=text-danger]").css('display', 'none');
				}
			});
		});
	</script>
	{{-- end reset form data when close offcanavas --}}




	@yield('footer')
	<!-- App js -->
	<script src="{{ asset('back/assets/js/app.js') }}"></script>
	
	@include('back.layouts.app_script')
</body>
</html>
