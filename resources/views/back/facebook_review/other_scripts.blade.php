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
        ajax: "{{ url('admin/facebook_review/datatable_facebook_review') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'review', name: 'review'},
            {data: 'action', name: 'action'},
        ],
        order: [[0, "DESC"]]
    });
</script>