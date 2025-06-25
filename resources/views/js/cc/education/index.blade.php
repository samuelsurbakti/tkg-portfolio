<script>
    $(document).ready(function () {
        window.livewire.on('close_modal_resource', () => {
            var modalElement = document.getElementById('modal_resource');
            var modal = bootstrap.Modal.getInstance(modalElement)
            if(modal){
                modal.hide();
            }
        });

        var date = $("#education_initial, #education_end").datepicker({
            todayHighlight: !0,
            format: "yyyy",
            orientation: isRtl ? "auto right" : "auto left",
            minViewMode: 2,
            maxViewMode: 4,
            autoclose: 1
        })

        $(document).on('change', '#education_initial', function () {
            livewire.emit('set_education_field', $(this).attr('id'), $(this).val());
        });

        $(document).on('change', '#education_end', function () {
            livewire.emit('set_education_field', $(this).attr('id'), $(this).val());
        });

        $(document).on('click', '#btn_add', function () {
            livewire.emit('reset_education');
        });

        $(document).on('click', '.btn_edit', function () {
            livewire.emit('set_education', $(this).attr('value'));
        });

        $(document).on('click', '.btn_delete', function () {
            livewire.emit('ask_to_delete_education', $(this).attr('value'));
        });
    });
</script>
