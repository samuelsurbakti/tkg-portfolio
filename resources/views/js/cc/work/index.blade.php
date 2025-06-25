<script>
    $(document).ready(function () {
        window.livewire.on('close_modal_resource', () => {
            var modalElement = document.getElementById('modal_resource');
            var modal = bootstrap.Modal.getInstance(modalElement)
            if(modal){
                modal.hide();
            }
        });

        var date = $("#work_date").datepicker({
            todayHighlight: !0,
            format: "yyyy-mm-dd",
            orientation: isRtl ? "auto right" : "auto left",
            autoclose: 1
        })

        window.livewire.on('close_category_modal_resource', () => {
            category_table.ajax.reload();
            var modalElement = document.getElementById('category_modal_resource');
            var modal = bootstrap.Modal.getInstance(modalElement)
            if(modal){
                modal.hide();
            }
        });

        window.livewire.on('close_photo_modal_resource', () => {
            var modalElement = document.getElementById('photo_modal_resource');
            var modal = bootstrap.Modal.getInstance(modalElement)
            if(modal){
                modal.hide();
            }
        });

        window.livewire.on('category_table_reload', () => {
            category_table.ajax.reload();
        });

        var e_select2 = $(".select2");
        e_select2.length && e_select2.each(function () {
            var e_select2 = $(this);
            e_select2.wrap('<div class="position-relative"></div>').select2({
                placeholder: "Select value",
                allowClear: true,
                dropdownParent: e_select2.parent()
            })
        })

        @can('Pekerjaan - Melihat Kategori')
            var category_table = $('#category_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": false,
                "ajax": "{{ route('Table | CC | Work | Category') }}",
                pagingType: 'simple_numbers',
                lengthMenu: [
                    [5, 10, 25, 100, -1],
                    [5, 10, 25, 100, "All"]
                ],
                pageLength: 5,
                language: {
                    url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json",
                    paginate: {
                        next: '<i class="icon-base bx bx-chevron-right scaleX-n1-rtl icon-sm"></i>',
                        previous: '<i class="icon-base bx bx-chevron-left scaleX-n1-rtl icon-sm"></i>'
                    }
                },
                dom: '<"row px-4"<"col-sm-12 col-md-12 d-flex justify-content-center justify-content-md-center"l>>t<"row"<"col-sm-12 col-md-12 d-flex justify-content-center"p>>',
                columns: [
                    {'data': 'name', name: 'name'},
                    {'data': 'action', name: 'action'},
                ]
            });
        @endcan

        $(document).on('change', '#work_category_id', function () {
            livewire.emit('set_work_field', $(this).attr('id'), $(this).val());
        });

        $(document).on('change', '#work_date', function () {
            livewire.emit('set_work_field', $(this).attr('id'), $(this).val());
        });

        $(document).on('click', '#btn_category_add', function () {
            livewire.emit('reset_wc');
        });

        $(document).on('click', '.btn_category_edit', function () {
            livewire.emit('set_wc', $(this).attr('value'));
        });

        $(document).on('click', '.btn_category_delete', function () {
            livewire.emit('ask_to_delete_wc', $(this).attr('value'));
        });

        $(document).on('click', '.btn_photo_add', function () {
            livewire.emit('set_wp_field', 'wp_work_id', $(this).attr('value'));
        });
    });

    window.addEventListener('render-select2', event => {
        var e_select2 = $(".select2");
        e_select2.length && e_select2.each(function () {
            var e_select2 = $(this);
            e_select2.wrap('<div class="position-relative"></div>').select2({
                placeholder: "Select value",
                allowClear: true,
                dropdownParent: e_select2.parent()
            })
        })
    })
</script>
