@if (auth()->user()->role_relation->teacher_feedback_create == 1 )
    <form class="" id="form" enctype="multipart/form-data">
        @csrf
            <div class="form_bordred_sections">
                <div class="form-group mb-3">
                    <div class="">
                        <label>{{ trans('app.teachers') }}</label>
                        <select name="teacher"  class="form-control select2">
                            <option value="">---</option>
                            @foreach ($all_teacher as $teacher)
                                <option value="{{ $teacher->group_id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                        <bold class="text-danger" id="errors-teacher" style="display: none;"></bold>
                    </div>
                </div>
            </div>

            <div class="form_bordred_sections">
                <div class="custom-file-container" data-upload-id="file_upload">
                    <label style="color: #555;">{{ trans('app.image') }}
                        <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">
                            <i class="fa fa-trash-alt" style="color: rgb(221, 7, 7);font-size: 15px;position: relative;top: 3px;margin: 0px 15px 10px;"></i>
                        </a>
                    </label>
                    <label class="custom-file-container__custom-file" >
                        <input type="file" class="custom-file-container__custom-file__custom-file-input" name="image">
                        <input type="hidden" name="image_hidden" />
                        <span class="custom-file-container__custom-file__custom-file-control text-center"></span>
                    </label>
                    <div class="custom-file-container__image-preview"></div>
                </div>
                <bold class="text-danger" id="errors-image" style="display: none;"></bold>
            </div>

            <br />

            <button type="button" id="save" class="btn btn-secondary btn-rounded waves-effect waves-light mb-2 me-2" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fas fa-times me-1"></i>
                @lang('app.close')
            </button>

            <button type="button" id="save" class="btn btn-primary btn-rounded waves-effect waves-light mb-2 me-2">
                <i class="fas fa-save me-1"></i>
                @lang('app.save')
            </button>
    </form>
@else
    <h4 class="text-center" style="margin: 100px auto;">
        لاتمتلك الصلاحيات لرؤيه محتوي الصفحة
        <img src="{{ url('back/images/rej2.png') }}" style="width: 80px;height: 78px;position: relative;bottom: 7px;bo"/>
    </h4>
@endif    
    

<script>
    $("#offcanvasWithBothOptions .offcanvas-title").text("@lang('app.add')").css("color", "#FFF");
    $("#offcanvasWithBothOptions .offcanvas-header").css("background", "#727bb7");

    $(document).ready(function(){
        $('.select2').select2({
            dropdownParent: $('#offcanvasWithBothOptions'),
        });

        var firstUpload = new FileUploadWithPreview('file_upload');
    });

    $("#offcanvasWithBothOptions #save").click(function(e){
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{url('admin/teacher_feedback/store')}}",
            type: 'POST',
            processData: false,
            contentType: false,
            data: new FormData($('#offcanvasWithBothOptions #form')[0]),
            success: function(res){
                $("#offcanvasWithBothOptions").offcanvas('hide');
                $('#datatable').DataTable().ajax.reload( null, false );

                alertify.set('notifier','position', 'top-center');
                alertify.set('notifier','delay', 4);
                alertify.success("@lang('app.Completed Added Successfully')");

            },
            error: function(res){
                alertify.set('notifier','position', 'top-center');
                alertify.set('notifier','delay', 4);
                alertify.error("@lang('app.there is something wrong')");

                if(res.responseJSON.errors.teacher){
                    $("form #errors-teacher").css('display' , 'block').text(res.responseJSON.errors.teacher);
                }else{
                    $("form #errors-teacher").text('');
                }
                if(res.responseJSON.errors.image){
                    $("form #errors-image").css('display' , 'block').text(res.responseJSON.errors.image);
                }else{
                    $("form #errors-image").text('');
                }
            }
        });
    });


    ///////////////////////////////// Add By Button Enter /////////////////////////////////
    $("#form").keydown(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{url('admin/teacher_feedback/store')}}",
                type: 'POST',
                processData: false,
                contentType: false,
                data: new FormData($('#offcanvasWithBothOptions #form')[0]),
                // data: $("#offcanvasWithBothOptions #form").serialize(),
                success: function(res){
                    $("#offcanvasWithBothOptions").offcanvas('hide');
                    $('#datatable').DataTable().ajax.reload( null, false );

                    alertify.set('notifier','position', 'top-center');
                    alertify.set('notifier','delay', 4);
                    alertify.success("@lang('app.Completed Added Successfully')");

                },
                error: function(res){
                    alertify.set('notifier','position', 'top-center');
                    alertify.set('notifier','delay', 4);
                    alertify.error("@lang('app.there is something wrong')");

                    if(res.responseJSON.errors.teacher){
                        $("form #errors-teacher").css('display' , 'block').text(res.responseJSON.errors.teacher);
                    }else{
                        $("form #errors-teacher").text('');
                    }
                    if(res.responseJSON.errors.image){
                        $("form #errors-image").css('display' , 'block').text(res.responseJSON.errors.image);
                    }else{
                        $("form #errors-image").text('');
                    }
                }
            });
        }
    });
</script>
