@extends('back.layouts.app')

@section('title')
    الدورات
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
    {{-- ckeditor --}}
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    
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
                width: 40%;
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

    @include('back.courses.other_scripts')
    @include('back.courses.delete')
@endsection

@section('content')
    <div class="main-content">
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel"></h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <h4 class="text-center" style="margin: 100px auto;">@lang('app.loading') ...</h4>
            </div>
        </div>
        
        <div class="page-content">
            <div class="container-fluid">
                <div class="card">                    
                    <div class="card-body">
    
                        <h4 class="card-title">الدورات</h4>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#courses" role="tab" aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">الدورات</span>    
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#langs_filter" role="tab" aria-selected="true">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">لغات التصنيف</span>    
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="courses" role="tabpanel">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="card-title">جميع الدورات </h4>
                                    </div>
                                    <div class="col-6 position-relative">
                                        <a href="{{ url('admin/courses/create') }}" type="button" class="btn btn-primary btn-rounded position-absolute top-0 end-0">
                                            <i class="mdi mdi-plus me-1"></i>
                                            إضافة دورة
                                        </a>
                                    </div>
                                </div>
                                
                                
                                <br><br>
                                {{-- table courses --}}
                                <div>
                                    @include('back.courses.table')    
                                </div>
                            </div>
                            <div class="tab-pane" id="langs_filter" role="tabpanel">

                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="card-title">لغات التصنيف </h4>
                                    </div>
                                    <div class="col-6 position-relative">
                                        <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2 bt_modal position-absolute top-0 end-0" act="{{ url('admin/courses/langs/create') }}" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                                            <i class="mdi mdi-plus me-1"></i>
                                            إضافة لغة تصنيف
                                        </button>

                                    </div>
                                </div>
                                
                                
                                <br><br>
                                {{-- table langs --}}
                                <div>
                                    @include('back.courses.table_langs')    
                                </div>
                            </div>                                
                        </div>

                    </div>                                            
                </div>
            </div>
        </div>


        {{-- Include Footer --}}
        @include('back.layouts.footer')
    </div>
@endsection
