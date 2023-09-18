<script>
    $(document).on('click', '.bt_modal', function (e) {
        e.preventDefault();
        let act = $(this).attr('act');
        $('.offcanvas-body').load(act);
    });
</script>

<script>
    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json",
        ajax: "{{ url('admin/courses/datatable_courses') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'teacher', name: 'teacher'},
            {data: 'action', name: 'action'},
        ],
        order: [[0, "DESC"]]
    });
</script>


<script>
    $('#datatable_langs').DataTable({
        processing: true,
        serverSide: true,
        url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json",
        ajax: "{{ url('admin/courses/datatable_langs') }}",
        columns: [
            {data: 'lang', name: 'lang'},
            {data: 'action', name: 'action'},
        ],
        order: [[0, "DESC"]]
    });
</script>