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
        ajax: "{{ url('admin/blog_category/datatable_blog_category') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'},
        ],
        order: [[0, "DESC"]]
    });
</script>