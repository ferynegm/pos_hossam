@extends('back.layouts.app')

@section('title')
    @lang('app.privacy_policy')
@endsection

@section('header')
    {{-- spotlight --}}
    <link href="{{ url('back') }}/assets/css/spotlight.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('footer')
    <!-- spotlight -->
	<script src="{{ url('back') }}/assets/js/spotlight.bundle.js"></script>
	<script src="{{ url('back') }}/assets/js/spotlight.min.js"></script>t>
@endsection

@section('content')

    <div class="main-content">

        <div class="page-content">
            @if (auth()->user()->role_relation->privacy_policy_view == 1 )
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">
                                    @lang('app.privacy_policy')   
                                </h4>
                                
                                <div>
                                    <a href="{{ url('admin/privacy_policy/edit/') }}" type="button" class="btn btn-primary btn-rounded">
                                        <i class="mdi mdi-pencil me-1"></i>
                                        @lang('app.edit')
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div>
                        <div class="" id="content">
                            <div class="card" style="background: #ECE5C7;padding: 20px;">
                                <div id="description">
                                    <strong>{{ trans('app.description') }}</strong>
                                    <br>
                                    <br>
                                    @isset($find->description)                                    
                                        <span style="color:#042a4a;">{!! $find->description !!}</span>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <h4 class="text-center" style="margin: 100px auto;">
                    لاتمتلك الصلاحيات لرؤيه محتوي الصفحة
                    <img src="{{ url('back/images/rej2.png') }}" style="width: 80px;height: 78px;position: relative;bottom: 7px;bo"/>
                </h4>
            @endif    

        </div>

        {{-- Include Footer --}}
        @include('back.layouts.footer')
    </div>
@endsection
