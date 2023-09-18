@extends('back.layouts.app')

@section('title')
    مدرس 
    ( {{ $find['name'] }} )
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
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">
                                مدرس 
                                <span style="color: red;">( {{ $find['name'] }} )</span>    
                            </h4>
                            
                            <div>
                                <a href="{{ url('admin/teacher/edit/'.$find['id']) }}" type="button" class="btn btn-primary btn-rounded">
                                    <i class="mdi mdi-pencil me-1"></i>
                                    @lang('app.edit')
                                </a>
    
                                <a href="{{ url('admin/teacher/create') }}" type="button" class="btn btn-success btn-rounded">
                                    <i class="mdi mdi-plus me-1"></i>
                                    @lang('app.add')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                
                <div>
                    <div class="row">
                        <div class="col-md-4" id="image">
                            @if ($find['image'] != null && $videos_explode[0] != null)
                                <div class="panel-body">
                                    <a class="spotlight" href="{{ url('back/images/teachers/'.$find['image']) }}">
                                        <img src="{{ url('back/images/teachers/'.$find['image']) }}" style="width:140px;height: 140px;margin:10px auto;border-radius:50%;">
                                    </a>
                                </div>
                                
                                <div class="panel-body">
                                    @foreach ($videos_explode as $vid)    
                                        <video style="width:80%;height: 200px;margin:10px auto;border-radius:5px;" controls>
                                            <source src="{{ url('back/images/teachers/'.$vid) }}" type="video/ogg">
                                        </video>
                                    @endforeach
                                </div>
                            @elseif($videos_explode[0] != null && $find['image'] == null)
                                <div class="panel-body">
                                    @foreach ($videos_explode as $vid)    
                                        <video style="width:80%;height: 200px;margin:10px auto;border-radius:5px;" controls>
                                            <source src="{{ url('back/images/teachers/'.$vid) }}" type="video/ogg">
                                        </video>
                                    @endforeach
                                </div>
                            @elseif($find['image'] != null && $videos_explode[0] == null)
                                <div class="panel-body">
                                    <a class="spotlight" href="{{ url('back/images/teachers/'.$find['image']) }}">
                                        <img src="{{ url('back/images/teachers/'.$find['image']) }}" style="width:140px;height: 140px;margin:10px auto;border-radius:50%;">
                                    </a>
                                </div>
                            @elseif($find['image'] == null && $videos_explode[0] == null)

                            @else
                                
                            @endif
                        </div>
                        
                        <div class="col-md-8" id="content">
                            <div class="">
                                <div id="id_pr">
                                    <strong>{{ trans('app.name') }}</strong>
                                    : <span style="color:#042a4a;">{{ $find->name }}</span>
                                </div>
                                <hr>
                                <div id="id_pr">
                                    <strong>{{ trans('app.job') }}</strong>
                                    : <span style="color:#042a4a;">{{ $find->job }}</span>
                                </div>
                                <hr>
                                <div id="description">
                                    <strong>{{ trans('app.description') }}</strong>
                                    <br>
                                    <span style="color:#042a4a;">{!! $find->description !!}</span>
                                </div>
                                <hr>
                                <div id="id_pr">
                                    <strong>{{ trans('app.gender') }}</strong>
                                    : <span style="color:#042a4a;">{{ $find->status == 1 ? "ذكر" : "أنثي" }}</span>
                                </div>
                                <hr>
                                <div id="id_pr">
                                    <strong>{{ trans('app.status') }}</strong>
                                    : <span style="color:#042a4a;">{{ $find->status == 1 ? "مفعل" : "غير مفعل" }}</span>
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
