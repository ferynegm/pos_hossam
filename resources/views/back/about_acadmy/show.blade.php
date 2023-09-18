@extends('back.layouts.app')

@section('title')
    عرض عن الأكاديمية 
    ( {{ $find['title'] }} )
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
                                عرض عن الأكاديمية 
                                <span style="color: red;">( {{ $find['title'] }} )</span>    
                            </h4>
                            
                            <div>
                                <a href="{{ url('admin/about_acadmy/edit/'.$find['id']) }}" type="button" class="btn btn-primary btn-rounded">
                                    <i class="mdi mdi-pencil me-1"></i>
                                    @lang('app.edit')
                                </a>
    
                                <a href="{{ url('admin/about_acadmy/create') }}" type="button" class="btn btn-success btn-rounded">
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
                            @if ($images_explode[0] != null && $videos_explode[0] != null)
                                <div class="panel-body">
                                    <div class="row">
                                        @foreach ($images_explode as $img)    
                                            <div class="col-xs-12">
                                                <a class="spotlight" href="{{ url('back/images/about_acadmy/'.$img) }}">
                                                    <img src="{{ url('back/images/about_acadmy/'.$img) }}" style="width:100%;height: 220px;margin:10px auto;border-radius:5px;">
                                                </a>
                                                <a class="btn btn-danger" href="{{ url('admin/about_acadmy/delete_media/'.$find['id'].'/'.$img) }}" style="display: block;border: 2px solid #444;">حذف</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <br><hr><br>
                                <div class="panel-body">
                                    <div class="row">
                                        @foreach ($videos_explode as $vid)    
                                            <div class="col-xs-12">
                                                <video style="width:100%;height: 220px;margin:10px auto;border-radius:5px;" controls>
                                                    <source src="{{ url('back/images/about_acadmy/'.$vid) }}" type="video/ogg">
                                                </video>
                                                <a class="btn btn-danger" href="{{ url('admin/about_acadmy/delete_media/'.$find['id'].'/'.$vid) }}" style="display: block;border: 2px solid #444;">حذف</a>
                                            </div>                                            
                                        @endforeach
                                    </div>
                                </div>
                            @elseif($videos_explode[0] != null && $images_explode[0] == null)
                                <div class="panel-body">
                                    <div class="row">                                        
                                        @foreach ($videos_explode as $vid)    
                                            <div class="col-xs-12">
                                                <video style="width:80%;height: 200px;margin:10px auto;border-radius:5px;" controls>
                                                    <source src="{{ url('back/images/about_acadmy/'.$vid) }}" type="video/ogg">
                                                </video>
                                                <a class="btn btn-danger" href="{{ url('admin/about_acadmy/delete_media/'.$find['id'].'/'.$vid) }}" style="display: block;border: 2px solid #444;">حذف</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @elseif($images_explode[0] != null && $videos_explode[0] == null)
                                <div class="panel-body">
                                    <div class="row"> 
                                        @foreach ($images_explode as $img)    
                                            <div class="col-xs-12">
                                                <a class="spotlight" href="{{ url('back/images/about_acadmy/'.$img) }}">
                                                    <img src="{{ url('back/images/about_acadmy/'.$img) }}" style="width:140px;height: 140px;margin:10px auto;border-radius:50%;">
                                                </a>
                                                <a class="btn btn-danger" href="{{ url('admin/about_acadmy/delete_media/'.$find['id'].'/'.$img) }}" style="display: block;border: 2px solid #444;">حذف</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                
                            @endif
                        </div>
                        
                        <div class="col-md-8" id="content">
                            <div class="">
                                <div id="id_pr">
                                    <strong>{{ trans('app.title') }}</strong>
                                    : <span style="color:#042a4a;">{{ $find->title }}</span>
                                </div>
                                <hr>
                                <div id="description">
                                    <strong>{{ trans('app.description') }}</strong>
                                    <br>
                                    : <span style="color:#042a4a;">{!! $find->description !!}</span>
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
