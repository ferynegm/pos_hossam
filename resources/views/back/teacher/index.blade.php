@extends('back.layouts.app')

@section('title')
    {{ trans('app.teacher') }}
@endsection

@section('header')
	<link href="{{ url('back') }}/assets/css/semantic.min.css" rel="stylesheet" type="text/css" />
	{{-- select2 --}}
	<link href="{{ url('back') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
	{{-- dataTables --}}
	<link href="{{ url('back') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.f0" rel="stylesheet" type="text/css" />
    <link href="{{ url('back') }}/assets/libs/datatables.net-buttons-bs4/c/buttons.bootstrap4.min" rel="stylesheet" type="text/css" />
	<link href="{{ url('back') }}/assets/libs/datatables.net-responsive-bs/responsive.bootstrap4.m" rel="stylesheet" type="text/css" />
    {{-- file upload --}}
    <link href="{{ url('back') }}/assets/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('back') }}/assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
	{{-- spotlight --}}
    <link href="{{ url('back') }}/assets/css/spotlight.min.css" rel="stylesheet" type="text/css" />


    <style>
        @media screen and (min-width: 481px) and (max-width: 768px) { 
            .main-content .offcanvas {
                width: 90%;
            }
        }
       @media (min-width: 768px) { /* Tablet */
            .main-content .offcanvas {
                width: 90%;
            }
        }
        @media (min-width: 992px){ /* Large Screen */
            .main-content .offcanvas {
                width: 60%;
            }
        }
    </style>
@endsection

@section('footer')
    <!-- select2 -->
	<script src="{{ url('back') }}/assets/libs/select2/js/select2.min.js"></script>
    <!-- spotlight -->
	<script src="{{ url('back') }}/assets/js/spotlight.bundle.js"></script>
	<script src="{{ url('back') }}/assets/js/spotlight.min.js"></script>
	{{-- nice scroll --}}
	<script src="{{ url('back') }}/assets/js/jquery.nicescroll.min.js"></script>
	{{-- Datatable --}}
	<script src="{{ url('back') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="{{ url('back') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.f3.d"></script>
		<!-- Buttons examples -->
	<script src="{{ url('back') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.14e"></script>
	<script src="{{ url('back') }}/assets/libs/datatables.net-buttons-bs4/j/buttons.bootstrap4.min"></script>
	<script src="{{ url('back') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.153.dela"></script>
	<script src="{{ url('back') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.154.dela"></script>
	<script src="{{ url('back') }}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.155.del"></script>
    <!-- file-upload -->
    <script src="{{ url('back') }}/assets/file-upload-with-preview.min.js"></script>
    <script src="{{ url('back') }}/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

    @include('back.teacher.other_scripts')
    @include('back.teacher.delete')
@endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="card">
                    @if (auth()->user()->role_relation->teachers_view == 1 )
                        <div class="card-body">

                            <h4 class="card-title" style="margin-bottom: 30px;">
                                @lang('app.teacher')

                                <span style="position: relative;top: -7px;">
                                    <a href="{{ url('admin/teacher/create') }}" type="button" class="btn btn-primary btn-rounded">
                                        <i class="mdi mdi-plus me-1"></i>
                                        @lang('app.add')
                                    </a>
                                </span>
                            </h4>

                            {{-- table --}}
                            <div style="overflow-x: auto;">
                                @include('back.teacher.table')    
                            </div>
                        </div>
                    @else
                        <h4 class="text-center" style="margin: 100px auto;">
                            لاتمتلك الصلاحيات لرؤيه محتوي الصفحة
                            <img src="{{ url('back/images/rej2.png') }}" style="width: 80px;height: 78px;position: relative;bottom: 7px;bo"/>
                        </h4>
                    @endif    

                </div>
            </div>
        </div>


        {{-- Include Footer --}}
        @include('back.layouts.footer')
    </div>
@endsection
