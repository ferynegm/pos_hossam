@if (auth()->user()->role_relation->facebook_reviews_create == 1 )
    <form class="" id="form" enctype="multipart/form-data">
        @csrf
            <div class="form_bordred_sections">            
                <div class="form-group mb-3">
                    <label for="review">ريفيو</label>
                    <i class="fas fa-star require_input"></i>
                    <input type="file" class="form-control" id="review" name="review" />
                    <bold class="text-danger" id="errors-review" style="display: none;"></bold>
                </div>
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
            url: "{{url('admin/facebook_review/store')}}",
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

                if(res.responseJSON.errors.review){
                    $("form #errors-review").css('display' , 'block').text(res.responseJSON.errors.review);
                }else{
                    $("form #errors-review").text('');
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
                url: "{{url('admin/facebook_review/store')}}",
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

                    if(res.responseJSON.errors.review){
                        $("form #errors-review").css('display' , 'block').text(res.responseJSON.errors.review);
                    }else{
                        $("form #errors-review").text('');
                    }
                }
            });
        }
    });
</script>
