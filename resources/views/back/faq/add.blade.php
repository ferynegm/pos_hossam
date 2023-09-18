@if (auth()->user()->role_relation->faq_create == 1 )
    <form class="" id="form" enctype="multipart/form-data">
        @csrf
            <div class="form_bordred_sections">
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">اخر رقم</label>
                            <input type="text" readonly class="form-control" value="{{ $latest_order == null ? 0 : $latest_order['order'] }}">
                            <bold class="text-danger" id="errors-name" style="display: none;"></bold>
                        </div>

                        <div class="col-md-6">
                            <label for="order">رقم الترتيب</label>
                            <i class="fas fa-star require_input"></i>
                            <input type="number" class="form-control" placeholder="رقم الترتيب" id="order" name="order" value="{{ $latest_order == null ? 1 : $latest_order['order']+1 }}">
                            <bold class="text-danger" id="errors-order" style="display: none;"></bold>
                        </div>
                    </div>
                </div>
                
                <div class="form-group mb-3">
                    <label for="title">عنوان Faq</label>
                    <i class="fas fa-star require_input"></i>
                    <input type="text" class="form-control" placeholder="عنوان Faq" id="title" name="title" />
                    <bold class="text-danger" id="errors-title" style="display: none;"></bold>
                </div>
                
                <div class="form-group mb-3">
                    <label for="description">وصف Faq</label>
                    <i class="fas fa-star require_input"></i>
                    <textarea class="form-control" id="description" name="description" rows="7"></textarea>
                    <bold class="text-danger" id="errors-description" style="display: none;"></bold>
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
            url: "{{url('admin/faq/store')}}",
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

                if(res.responseJSON.errors.order){
                    $("form #errors-order").css('display' , 'block').text(res.responseJSON.errors.order);
                }else{
                    $("form #errors-order").text('');
                }
                if(res.responseJSON.errors.title){
                    $("form #errors-title").css('display' , 'block').text(res.responseJSON.errors.title);
                }else{
                    $("form #errors-title").text('');
                }
                if(res.responseJSON.errors.description){
                    $("form #errors-description").css('display' , 'block').text(res.responseJSON.errors.description);
                }else{
                    $("form #errors-description").text('');
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
                url: "{{url('admin/faq/store')}}",
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

                    if(res.responseJSON.errors.order){
                        $("form #errors-order").css('display' , 'block').text(res.responseJSON.errors.order);
                    }else{
                        $("form #errors-order").text('');
                    }
                    if(res.responseJSON.errors.title){
                        $("form #errors-title").css('display' , 'block').text(res.responseJSON.errors.title);
                    }else{
                        $("form #errors-title").text('');
                    }
                    if(res.responseJSON.errors.description){
                        $("form #errors-description").css('display' , 'block').text(res.responseJSON.errors.description);
                    }else{
                        $("form #errors-description").text('');
                    }
                }
            });
        }
    });
</script>
