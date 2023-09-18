@if (auth()->user()->role_relation->langs_course_update == 1 )
    <form class="" id="form" enctype="multipart/form-data">
        @csrf
        <div class="form_bordred_sections">
            <div class="form-group mb-3">
                <div class="row">
                    <div class="col-12">
                        <label for="lang">{{ trans('app.lang') }}</label>
                        <i class="fas fa-star require_input"></i>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                            <input type="text" class="form-control" placeholder="{{ trans('app.lang') }}" id="lang" name="lang" value="{{ $find->lang }}">
                        </div>
                        <bold class="text-danger" id="errors-lang" style="display: none;"></bold>
                    </div>
                </div>
            </div>
        </div>

        <br />

        <button type="button" id="save" class="btn btn-secondary btn-rounded waves-effect waves-light mb-2 me-2" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fas fa-times me-1"></i>
            @lang('app.close')
        </button>

        <button type="button" id="update" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2">
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
    $("#offcanvasWithBothOptions .offcanvas-title").text("@lang('app.edit')").css("color", "#FFF");
    $("#offcanvasWithBothOptions .offcanvas-header").css("background", "#4ec798");

    $("#offcanvasWithBothOptions #update").click(function(e){
        e.preventDefault();
        var id = {{ $find->id }};

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ url('admin/courses/langs/update') }}"+'/'+id,
            type: 'POST',
            processData: false,
            contentType: false,
            data: new FormData($('#offcanvasWithBothOptions #form')[0]),
            success: function(res){
                $("#offcanvasWithBothOptions").offcanvas('hide');
                $('#datatable_langs').DataTable().ajax.reload( null, false );

                alertify.set('notifier','position', 'top-center');
                alertify.set('notifier','delay', 4);
                alertify.success("@lang('app.Completed Update Successfully')");

            },
            error: function(res){
                alertify.set('notifier','position', 'top-center');
                alertify.set('notifier','delay', 4);
                alertify.error("@lang('app.there is something wrong')");

                if(res.responseJSON.errors.lang){
                    $("form #errors-lang").css('display' , 'block').text(res.responseJSON.errors.lang);
                }else{
                    $("form #errors-lang").text('');
                }
            }
        });
    });


    ///////////////////////////////// Edit By Button Enter /////////////////////////////////
    $("#form").keydown(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            var id = {{ $find->id }};

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ url('admin/courses/langs/update') }}"+'/'+id,
                type: 'POST',
                processData: false,
                contentType: false,
                data: new FormData($('#offcanvasWithBothOptions #form')[0]),
                success: function(res){

                    $("#offcanvasWithBothOptions").offcanvas('hide');
                    $('#datatable_langs').DataTable().ajax.reload( null, false );

                    alertify.set('notifier','position', 'top-center');
                    alertify.set('notifier','delay', 4);
                    alertify.success("@lang('app.Completed Update Successfully')");

                },
                error: function(res){
                    alertify.set('notifier','position', 'top-center');
                    alertify.set('notifier','delay', 4);
                    alertify.error("@lang('app.there is something wrong')");

                    if(res.responseJSON.errors.lang){
                        $("form #errors-lang").css('display' , 'block').text(res.responseJSON.errors.lang);
                    }else{
                        $("form #errors-lang").text('');
                    }
                }
            });
        }
    });
</script>
