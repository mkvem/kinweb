@push('scripts')
    <!-- data-tables -->
    <script type="text/javascript" src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.datatable').DataTable();
        });
    </script>
    <script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $(document).on('click', 'a.jquery-postback', function(e) {
        e.preventDefault(); // does not go through with the link.

        var $this = $(this);

        $.post({
            type: $this.data('method'),
            url: $this.attr('href')
        }).done(function (data) {
            windows.location = "{{ route('users.index') }}";
        });
    });
    </script>
@endpush