@if(auth()->user()->role_relation->courses_delete == 1)
    <script>
        $(document).on("click" , "table .delete" ,function(e){
            e.preventDefault();
            var loop_id = $(this).attr("loop_id");


        alertify.confirm('هل انت متأكد من حذف الدورة', 'سيتم حذف جميع معلومات الدورة بما فيها صور وفديوهات الدورة',
            function(){
                $.ajax({
                    url: "{{ url('admin/courses/destroy') }}"+'/'+loop_id,
                    type: "get",
                    success: function(){
                        $('#datatable').DataTable().ajax.reload( null, false );

                        alertify.set('notifier','position', 'top-center');
                        alertify.set('notifier','delay', 4);
                        alertify.error("@lang('app.Completed Delete Successfully')");
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
@else
    <script>
        $(document).on("click" , "table .delete" ,function(e){
            alertify.set('notifier','position', 'bottom-right');
            alertify.set('notifier','delay', 4);
            alertify.error("لاتمتلك الصلاحيات لإتمام عملية الحذف");
        });
    </script>
@endif

@if(auth()->user()->role_relation->langs_course_delete == 1)
    <script>
        // delete langs
        $(document).on("click" , "table .delete_langs" ,function(e){
            e.preventDefault();
            var loop_id = $(this).attr("loop_id");


        alertify.confirm('هل انت متأكد من حذف لغة التصنيف ؟', ' سيتم حذف التصنيف من الكوسات التي تنتمي إلية',
            function(){
                $.ajax({
                    url: "{{ url('admin/courses/langs/destroy') }}"+'/'+loop_id,
                    type: "get",
                    success: function(){
                        $('#datatable_langs').DataTable().ajax.reload( null, false );

                        alertify.set('notifier','position', 'top-center');
                        alertify.set('notifier','delay', 4);
                        alertify.error("@lang('app.Completed Delete Successfully')");
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
@else
    <script>
        $(document).on("click" , "table .delete" ,function(e){
            alertify.set('notifier','position', 'bottom-right');
            alertify.set('notifier','delay', 4);
            alertify.error("لاتمتلك الصلاحيات لإتمام عملية الحذف");
        });
    </script>
@endif

