@extends('back.layouts.app')

@section('title')
    أراء حول مدرس ( {{ $teacher_name->teacher_name['name'] }} )
@endsection

@section('header')
    <link href="{{ url('back') }}/assets/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('back') }}/assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
	{{-- spotlight --}}
    <link href="{{ url('back') }}/assets/css/spotlight.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('footer')
    <!-- spotlight -->
	<script src="{{ url('back') }}/assets/js/spotlight.bundle.js"></script>
	<script src="{{ url('back') }}/assets/js/spotlight.min.js"></script>


    <script>
        $(document).on("click" , "#destroy_all_feedback_to_teacher" ,function(e){
            e.preventDefault();    
            var loop_id = $(this).attr("loop_id");

          alertify.confirm('{{ trans('app.Warning') }}', '{{ trans('app.Are You Sure Of Delete') }}',
            function(){
                $.ajax({
                     url: "{{ url('admin/teacher_feedback/destroy_all_feedback_to_teacher') }}"+'/'+loop_id,
                     type: "get",
                     success: function(){
                        location.href = "{{ url('admin/teacher_feedback') }}"
                     },
                     error: function(){
    
                     }
                }); // end ajax
    
            }, // function success
            function(){
                alertify.set('notifier','position', 'bottom-right');
                alertify.set('notifier','delay', 4);
                alertify.error("@lang('app.canceled')");
            }); // function error
        });
    </script>
    



    @include('back.teacher_feedback.other_scripts')
@endsection

@section('content')
    <div class="main-content">        
        <div class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">

                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18" style="display: inline;">
                                أراء حول مدرس: 
                                <span style="color: red;">( {{ $teacher_name->teacher_name['name'] }} )</span>
                                <span style="color: blue;font-size: 21px;">[ {{ $count }} ]</span>

                            </h4>

                            <div>
                                <a id="destroy_all_feedback_to_teacher" loop_id="{{ $teacher_name->teacher }}" type="button" class="btn btn-danger btn-rounded">
                                    <i class="mdi mdi-trash-can me-1"></i>
                                    حذف جميع الآراء
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            @foreach ($find as $image)
                                <div class="col-md-4">
                                    <div class="panel-body">
                                        <a class="spotlight" href="{{ url('back/images/teacher_feedback/'.$image->image) }}">
                                            <img src="{{ url('back/images/teacher_feedback/'.$image->image) }}" style="width:100%;height: 200px;margin: 10px 0px;">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>


        {{-- Include Footer --}}
        @include('back.layouts.footer')
    </div>
@endsection
