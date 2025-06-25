<script>
    $(document).ready(function () {
        window.livewire.on('close_modal_permission_resource', () => {
            permission_table.ajax.reload();
            var modalElement = document.getElementById('modal_permission_resource');
            var modal = bootstrap.Modal.getInstance(modalElement)
            modal.hide();
        });

        window.livewire.on('close_modal_role_resource', () => {
            var modalElement = document.getElementById('modal_role_resource');
            var modal = bootstrap.Modal.getInstance(modalElement)
            modal.hide();
        });

        window.livewire.on('menu_switch_component', (data) => {
            var element = document.getElementById('permission_menu_'+data.menu_id);
            var form = document.getElementById('menu_'+data.menu_id);
            if(data.status == true) {
                element.setAttribute('hidden', '');
                form.removeAttribute('checked');
            } else {
                element.removeAttribute('hidden');
                form.setAttribute('checked', '');
            }
        });

        window.livewire.on('permission_switch_component', (data) => {
            var form = document.getElementById('permission_'+data.permission_id);
            if(data.status == true) {
                form.removeAttribute('checked');
            } else {
                form.setAttribute('checked', '');
            }
        });

        window.livewire.on('permission_table_reload', () => {
            permission_table.ajax.reload();
        });

        var e_select2 = $(".select2");
        e_select2.length && e_select2.each(function () {
            var e_select2 = $(this);
            e_select2.wrap('<div class="position-relative"></div>').select2({
                // placeholder: "Select value",
                allowClear: true,
                dropdownParent: e_select2.parent()
            })
        })

        @can('Sistem - Melihat Izin')
            $('#permission_table thead th').each(function () {
                var title = $(this).text();

                if (title !== '') {
                    $(this).html('<label for="small'+title+'" class="form-label">'+title+'</label> <input class="form-control form-control-sm" type="text" placeholder="Cari '+title+'" />');
                } else {
                    $(this).html('');
                }
            });

            var permission_table = $('#permission_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": false,
                "ajax": "{{ route('Table | CC | System | Permission') }}",
                pagingType: 'simple_numbers',
                lengthMenu: [
                    [5, 10, 25, 100, -1],
                    [5, 10, 25, 100, "All"]
                ],
                pageLength: 10,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json",
                    paginate: {
                        next: '<i class="icon-base bx bx-chevron-right scaleX-n1-rtl icon-sm"></i>',
                        previous: '<i class="icon-base bx bx-chevron-left scaleX-n1-rtl icon-sm"></i>'
                    }
                },
                dom: '<"row px-4"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"{{ (Auth::user()->can("Sistem - Menambah Izin") ? 'B' : '') }}>>t<"row"<"col-sm-12 col-md-12 d-flex justify-content-center"i>><"row"<"col-sm-12 col-md-12 d-flex justify-content-center"p>>',
                buttons: [{
                    text: '<i class="bx bx-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Tambah Data</span>',
                    className: "btn btn-sm btn-primary my-5",
                    attr: {
                        "id": "btn_permission_create",
                        "data-bs-toggle": "modal",
                        "data-bs-target": "#modal_permission_resource",
                    },
                }],
                columns: [
                    {data: 'type', name: 'type'},
                    {data: 'menu', name: 'menu.title'},
                    {data: 'name', name: 'name'},
                    {data: 'number', name: 'number'},
                    {data: 'role', name: 'role'},
                    {data: 'action', name: 'action'},
                ],
                createdRow: function(row, data, dataIndex, cells) {
                    $(row).addClass('align-top');
                },
                initComplete: function() {
                    this.api().columns().every(function() {
                        var that = this;

                        $('input', this.header()).on('keyup change clear', function() {
                            if (that.search() !== this.value) {
                                that
                                    .search(this.value)
                                    .draw();
                            }
                        });
                    });
                }
            });
        @endcan

        $(document).on('change', '#permission_type', function () {
            livewire.emit('set_permission_field', $(this).attr('id'), $(this).val());
        });

        $(document).on('change', '#permission_menu_id', function () {
            livewire.emit('set_permission_field', $(this).attr('id'), $(this).val());
        });

        $(document).on('click', '#btn_permission_create', function () {
            livewire.emit('reset_permission');
        });

        $(document).on('click', '.btn_permission_edit', function () {
            livewire.emit('set_permission', $(this).attr('value'));
        });

        $(document).on('click', '.btn_role_edit', function () {
            livewire.emit('set_role', $(this).attr('value'));
        });

        $(document).on('click', '#btn_role_create', function () {
            livewire.emit('reset_role');
        });

        $(document).on('click', '.btn_authorization', function () {
            livewire.emit('set_authorization', $(this).attr('value'));
        });
    });

    window.addEventListener('render-select2', event => {
        var e_select2 = $(".select2");
        e_select2.length && e_select2.each(function () {
            var e_select2 = $(this);
            e_select2.wrap('<div class="position-relative"></div>').select2({
                // placeholder: "Select value",
                allowClear: true,
                dropdownParent: e_select2.parent()
            })
        })
    })
</script>
