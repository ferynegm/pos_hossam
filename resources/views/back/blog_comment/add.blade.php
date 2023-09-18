@if (auth()->user()->role_relation->blog_comment == 1 )
    <form class="" id="form" enctype="multipart/form-data">
        @csrf
            <div class="form_bordred_sections">
                <div class="form-group mb-3">
                    <div class="">
                        <label for="comment">{{ trans('app.comment') }}</label>
                        <i class="fas fa-star require_input"></i>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-comment"></i></span>
                            <textarea class="form-control" placeholder="{{ trans('app.comment') }}" id="comment" name="comment" rows="6"></textarea>
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
                                    <option value="1">{{ trans('app.active') }}</option>
                                    <option value="0">{{ trans('app.not_active') }}</option>
                                </select>
                            </div>
                            <bold class="text-danger" id="errors-status" style="display: none;"></bold>
                        </div>

                        <div class="col-md-6">
                            <label>{{ trans('app.author') }}</label>
                            <select name="author"  class="form-control select2">
                                <option value="">---</option>
                                @foreach ($author as $user)
                                    <option value="{{ $user->name }}">{{ $user->admin_name['name'] }}</option>
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
                        {!! $find['description'] !!}
                    </div>
                    </div>
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
    });

    $("#offcanvasWithBothOptions #save").click(function(e){
        e.preventDefault();
        var id = {{ $find['id'] }};

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ url('admin/blog_comment/store') }}"+'/'+id,
            type: 'POST',
            processData: false,
            contentType: false,
            data: new FormData($('#offcanvasWithBothOptions #form')[0]),
            success: function(res){
                $("#offcanvasWithBothOptions").offcanvas('hide');
                $('#datatable').DataTable().ajax.reload( null, false );

                alertify.set('notifier','position', 'top-center');
                alertify.set('notifier','delay', 4);
                alertify.success("تم إضافة التعليق بنجاح");

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
