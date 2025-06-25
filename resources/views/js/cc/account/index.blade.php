<script>
    $(document).ready(function () {
        window.livewire.on('close_modal_resource', () => {
            account_table.ajax.reload();
            var modalElement = document.getElementById('modal_resource');
            var modal = bootstrap.Modal.getInstance(modalElement)
            if(modal){
                modal.hide();
            }
        });

        window.livewire.on('account_table_reload', () => {
            account_table.ajax.reload();
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

        $('#account_table thead th').each(function () {
            var title = $(this).text();

            if (title !== '') {
                $(this).html('<label for="small'+title+'" class="form-label">'+title+'</label> <input class="form-control form-control-sm" type="text" placeholder="Cari '+title+'" />');
            } else {
                $(this).html('');
            }
        });

        var account_table = $('#account_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": false,
            "ajax": "{{ route('Table | CC | Account') }}",
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
            dom: '<"row px-4"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"{{ (Auth::user()->can("Akun - Menambah Data") ? 'B' : '') }}>>t<"row"<"col-sm-12 col-md-12 d-flex justify-content-center"i>><"row"<"col-sm-12 col-md-12 d-flex justify-content-center"p>>',
            buttons: [{
                text: '<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Tambah Data</span>',
                className: "btn btn-sm btn-primary my-5",
                attr: {
                    "id": "btn_account_create",
                    "data-bs-toggle": "modal",
                    "data-bs-target": "#modal_resource",
                },
            }],
            columns: [
                {'data': 'user', name: 'name'},
                {'data': 'username', name: 'username'},
                {'data': 'role', name: 'roles.name'},
                {'data': 'email', name: 'email'},
                {'data': 'status', name: 'status'},
                {'data': 'action', name: 'action'},
            ],
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

        $(document).on('change', '#user_role', function () {
            livewire.emit('set_account_field', $(this).attr('id'), $(this).val());
        });

        $(document).on('click', '.btn_edit', function () {
            livewire.emit('set_account', $(this).attr('value'));
        });

        $(document).on('click', '.btn_edit_account_status', function () {
            livewire.emit('ask_to_change_status_account', $(this).attr('value'));
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
