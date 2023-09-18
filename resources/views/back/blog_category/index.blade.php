@extends('back.layouts.app')

@section('title')
    {{ trans('app.blog_category') }}
@endsection

@section('header')
    <link href="{{ url('back') }}/assets/css/semantic.min.css" rel="stylesheet" type="text/css" />
	{{-- dataTables --}}
	<link href="{{ url('back') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.f0" rel="stylesheet" type="text/css" />
    <link href="{{ url('back') }}/assets/libs/datatables.net-buttons-bs4/c/buttons.bootstrap4.min" rel="stylesheet" type="text/css" />

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
	{{-- Datatable --}}
	<script src="{{ url('back') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="{{ url('back') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.f3.d"></script>
		<!-- Buttons examples -->
	<script src="{{ url('back') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.14e"></script>
	<script src="{{ url('back') }}/assets/libs/datatables.net-buttons-bs4/j/buttons.bootstrap4.min"></script>
	<script src="{{ url('back') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.153.dela"></script>
	<script src="{{ url('back') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.154.dela"></script>
	<script src="{{ url('back') }}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.155.del"></script>

    @include('back.blog_category.other_scripts')
    @include('back.blog_category.delete')
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
                    @if (auth()->user()->role_relation->blog_category_view == 1 )
                        <div class="card-body">

                            <h4 class="card-title" style="margin-bottom: 30px;">
                                @lang('app.blog_category')

                                <span style="position: relative;top: -7px;">
                                    <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light mb-2 me-2 bt_modal" act="{{ url('admin/blog_category/create') }}" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                                        <i class="mdi mdi-plus me-1"></i>
                                        @lang('app.add')
                                    </button>
                                </span>
                            </h4>

                            {{-- table --}}
                            <div style="overflow-x: auto;">
                                @include('back.blog_category.table')    
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
