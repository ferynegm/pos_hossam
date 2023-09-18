<form class="" id="form" enctype="multipart/form-data">
    @csrf
    <div class="form_bordred_sections">
        <div class="form-group mb-3">
            <div class="">
                <label for="comment">{{ trans('app.comment') }}</label>
                <i class="fas fa-star require_input"></i>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-comment"></i></span>
                    <textarea class="form-control" placeholder="{{ trans('app.comment') }}" id="comment" name="comment" rows="6">{{ $find['comment'] }}</textarea>
                </div>
                <bold class="text-danger" id="errors-comment" style="display: none;"></bold>
            </div>
        </div>

        
        <div class="form-group mb-3">
            <div class="row">
                <div class="col-md-6">
                    <label>{{ trans('app.status') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-check"></i></span>
                        <select name="status"  class="form-control">
                            <option value="1" {{ $find['status'] == 1 ? "selected" : null }}>{{ trans('app.active') }}</option>
                            <option value="0" {{ $find['status'] == 0 ? "selected" : null }}>{{ trans('app.not_active') }}</option>
                        </select>
                    </div>
                    <bold class="text-danger" id="errors-status" style="display: none;"></bold>
                </div>

                <div class="col-md-6">
                    <label>{{ trans('app.author') }}</label>
                    <select name="author"  class="form-control select2">
                        <option value="">---</option>
                        @foreach ($author as $user)
                            <option value="{{ $user->name }}" {{ $find['author'] == $user->name ? "selected" : null }}>{{ $user->admin_name['name'] }}</option>
                        @endforeach
                    </select>
                    <bold class="text-danger" id="errors-author" style="display: none;"></bold>
                </div>
            </div>
        </div>

    </div>

    <div class="accordion" id="accordionExample">
        <div class="accordion-item" style="background: #fff;">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                المقال
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                {!! $find->blog_name['description'] !!}
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

<script>
    $("#offcanvasWithBothOptions .offcanvas-title").text("@lang('app.edit')").css("color", "#FFF");
    $("#offcanvasWithBothOptions .offcanvas-header").css("background", "#4ec798");

    $(document).ready(function(){
        $('.select2').select2({
            dropdownParent: $('#offcanvasWithBothOptions'),
        });

        var firstUpload = new FileUploadWithPreview('file_upload');
    });

    $("#offcanvasWithBothOptions #update").click(function(e){
        e.preventDefault();
        var id = {{ $find['id'] }};

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ url('admin/blog_comment/update') }}"+'/'+id,
            type: 'POST',
            processData: false,
            contentType: false,
            data: new FormData($('#offcanvasWithBothOptions #form')[0]),
            success: function(res){
                $("#offcanvasWithBothOptions").offcanvas('hide');
                $("#comments_class").load(location.href + " .comments_class");

                alertify.set('notifier','position', 'top-center');
                alertify.set('notifier','delay', 4);
                alertify.success("تم تعديل التعليق بنجاح");

            },
            error: function(res){
                alertify.set('notifier','position', 'top-center');
                alertify.set('notifier','delay', 4);
                alertify.error("@lang('app.there is something wrong')");

                if(res.responseJSON.errors.comment){
                    $("form #errors-comment").css('display' , 'block').text(res.responseJSON.errors.comment);
                }else{
                    $("form #errors-comment").text('');
                }
                if(res.responseJSON.errors.author){
                    $("form #errors-author").css('display' , 'block').text(res.responseJSON.errors.author);
                }else{
                    $("form #errors-author").text('');
                }
            }
        });
    });
</script>
