<script>
    var masonry_data = document.querySelector('#masonry_data');

    var msnry = new Masonry( masonry_data, {
        itemSelector: '.masonry-card',
        percentPosition: true
    });

    $(document).ready(function () {
        window.livewire.on('close_pi_modal_resource', () => {
            var modalElement = document.getElementById('pi_modal_resource');
            var modal = bootstrap.Modal.getInstance(modalElement)
            if(modal){
                modal.hide();
            }
        });

        window.livewire.on('close_skill_modal_resource', () => {
            var modalElement = document.getElementById('skill_modal_resource');
            var modal = bootstrap.Modal.getInstance(modalElement)
            @can('Beranda - Melihat Keahlian')
                skill_table.ajax.reload();
            @endcan
            if(modal){
                modal.hide();
            }
        });

        window.livewire.on('close_sm_modal_resource', () => {
            var modalElement = document.getElementById('sm_modal_resource');
            var modal = bootstrap.Modal.getInstance(modalElement)
            @can('Beranda - Melihat Media Sosial')
                social_media_table.ajax.reload();
            @endcan
            if(modal){
                modal.hide();
            }
        });

        window.livewire.on('close_statistic_modal_resource', () => {
            var modalElement = document.getElementById('statistic_modal_resource');
            var modal = bootstrap.Modal.getInstance(modalElement)
            @can('Beranda - Melihat Statistik')
                statistic_table.ajax.reload();
            @endcan
            if(modal){
                modal.hide();
            }
        });

        window.livewire.on('close_profession_modal_resource', () => {
            var modalElement = document.getElementById('profession_modal_resource');
            var modal = bootstrap.Modal.getInstance(modalElement)
            @can('Beranda - Melihat Profesi')
                profession_table.ajax.reload();
            @endcan
            if(modal){
                modal.hide();
            }
        });

        var date = $("#pi_dob").datepicker({
            todayHighlight: !0,
            format: "yyyy-mm-dd",
            orientation: isRtl ? "auto right" : "auto left",
            autoclose: 1
        })

        @can('Beranda - Melihat Keahlian')
            var skill_table = $('#skill_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": false,
                "ajax": "{{ route('Table | CC | Home | Skill') }}",
                pagingType: 'simple_numbers',
                lengthMenu: [
                    [10, 25, 100, -1],
                    [10, 25, 100, "All"]
                ],
                pageLength: 10,
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
                    {'data': 'percentage', name: 'percentage'},
                    {'data': 'action', name: 'action'},
                ],
                "drawCallback": function(settings) {
                    msnry.layout();
                }
            });
        @endcan

        @can('Beranda - Melihat Media Sosial')
            var social_media_table = $('#social_media_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": false,
                "ajax": "{{ route('Table | CC | Home | Social Media') }}",
                pagingType: 'simple_numbers',
                lengthMenu: [
                    [10, 25, 100, -1],
                    [10, 25, 100, "All"]
                ],
                pageLength: 10,
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
                    {'data': 'url', name: 'url'},
                    {'data': 'action', name: 'action'},
                ],
                "drawCallback": function(settings) {
                    msnry.layout();
                }
            });
        @endcan

        @can('Beranda - Melihat Statistik')
            var statistic_table = $('#statistic_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": false,
                "ajax": "{{ route('Table | CC | Home | Statistic') }}",
                pagingType: 'simple_numbers',
                lengthMenu: [
                    [10, 25, 100, -1],
                    [10, 25, 100, "All"]
                ],
                pageLength: 10,
                language: {
                    url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json",
                    paginate: {
                        next: '<i class="icon-base bx bx-chevron-right scaleX-n1-rtl icon-sm"></i>',
                        previous: '<i class="icon-base bx bx-chevron-left scaleX-n1-rtl icon-sm"></i>'
                    }
                },
                dom: '<"row px-4"<"col-sm-12 col-md-12 d-flex justify-content-center justify-content-md-center"l>>t<"row"<"col-sm-12 col-md-12 d-flex justify-content-center"p>>',
                columns: [
                    {'data': 'label', name: 'label'},
                    {'data': 'amount', name: 'amount'},
                    {'data': 'action', name: 'action'},
                ],
                "drawCallback": function(settings) {
                    msnry.layout();
                }
            });
        @endcan

        @can('Beranda - Melihat Profesi')
            var profession_table = $('#profession_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": false,
                "ajax": "{{ route('Table | CC | Home | Profession') }}",
                pagingType: 'simple_numbers',
                lengthMenu: [
                    [10, 25, 100, -1],
                    [10, 25, 100, "All"]
                ],
                pageLength: 10,
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
                ],
                "drawCallback": function(settings) {
                    msnry.layout();
                }
            });
        @endcan

        $(document).on('change', '#pi_dob', function () {
            livewire.emit('set_pi_field', $(this).attr('id'), $(this).val());
        });

        $(document).on('click', '#btn_skill_add', function () {
            livewire.emit('reset_skill');
        });

        $(document).on('click', '.btn_skill_edit', function () {
            livewire.emit('set_skill', $(this).attr('value'));
        });

        $(document).on('click', '.btn_skill_delete', function () {
            livewire.emit('ask_to_delete_skill', $(this).attr('value'));
        });

        $(document).on('click', '#btn_sm_add', function () {
            livewire.emit('reset_sm');
        });

        $(document).on('click', '.btn_sm_edit', function () {
            livewire.emit('set_sm', $(this).attr('value'));
        });

        $(document).on('click', '.btn_sm_delete', function () {
            livewire.emit('ask_to_delete_sm', $(this).attr('value'));
        });

        $(document).on('click', '#btn_statistic_add', function () {
            livewire.emit('reset_statistic');
        });

        $(document).on('click', '.btn_statistic_edit', function () {
            livewire.emit('set_statistic', $(this).attr('value'));
        });

        $(document).on('click', '.btn_statistic_delete', function () {
            livewire.emit('ask_to_delete_statistic', $(this).attr('value'));
        });

        $(document).on('click', '#btn_profession_add', function () {
            livewire.emit('reset_profession');
        });

        $(document).on('click', '.btn_profession_edit', function () {
            livewire.emit('set_profession', $(this).attr('value'));
        });

        $(document).on('click', '.btn_profession_delete', function () {
            livewire.emit('ask_to_delete_profession', $(this).attr('value'));
        });
    });
</script>
