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
        ajax: "{{ url('admin/faq/datatable_faq') }}",
        columns: [
            {data: 'order', name: 'order'},
            {data: 'title', name: 'title'},
            {data: 'action', name: 'action'},
        ],
        dom: 'Bfrtip',
        order: [[0, "DESC"]]
    });
</script>