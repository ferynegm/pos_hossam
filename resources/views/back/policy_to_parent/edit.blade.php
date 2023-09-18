@extends('back.layouts.app')

@section('title')
    @lang('app.edit_policy_to_parent')
@endsection

@section('header')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection

@section('footer')

@endsection

@section('content')

    <div class="main-content">

        <div class="page-content">
            @if (auth()->user()->role_relation->policy_to_parent_update == 1 )
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">
                                    @lang('app.edit_policy_to_parent')                
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <div class="row" data-select2-id="11">
                        <form action="{{ url('admin/policy_to_parent/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12" data-select2-id="10">
                                {{-- basic_information --}}
                                <div class="card" style="background: #ECE5C7;">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <div class="">
                                                <label for="description">{{ trans('app.description') }}</label>
                                                @isset($find->description)   
                                                    <textarea class="ckeditor form-control cke_rtl" name="description" >{{ old('description', $find ['description']) }}</textarea>
                                                @endisset
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex flex-wrap gap-2">
                                @isset($find->description)
                                    <button type="submit" class="btn btn-success waves-effect waves-light" id="save">حفظ</button>
                                @endisset
                            </div>
                        </form>
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
