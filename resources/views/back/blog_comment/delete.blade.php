<script>
    $(document).on("click" , "li .delete" ,function(e){
        e.preventDefault();
        var loop_id = $(this).attr("loop_id");

      alertify.confirm('{{ trans('app.Warning') }}', 'هل تريد حذف هذا التعليق ؟؟',
        function(){
            $.ajax({
                 url: "{{ url('admin/blog_comment/destroy') }}"+'/'+loop_id,
                 type: "get",
                 success: function(){
                    $("#comments_class").load(location.href + " .comments_class");

                    alertify.set('notifier','position', 'top-center');
                    alertify.set('notifier','delay', 4);
                    alertify.error("تم حذف التعليق بنجاح");
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



    ///////////////////////////////// destroy all comment /////////////////////////////////
    $(document).on("click" , ".destroy_all_comment a" ,function(e){
        e.preventDefault();
        var loop_id = $(this).attr("loop_id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        alertify.confirm('<span class="delete_selected_item_style_title_head">{{ trans('app.Warning') }}</span>', '<span class="delete_selected_item_style">هل تريد حذف جميع التعليقات ؟؟</span>',
            function(){
                $.ajax({
                    url: "{{ url('admin/blog_comment/destroy_all_comment') }}"+'/'+loop_id,
                    type: "get",
                    success: function(){
                        $("#comments_class").load(location.href + " .comments_class");

                        alertify.set('notifier','position', 'top-center');
                        alertify.set('notifier','delay', 4);
                        alertify.error("تم حذف جميع التعليقات بنجاح");
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
