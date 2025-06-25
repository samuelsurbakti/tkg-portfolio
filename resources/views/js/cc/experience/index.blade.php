<script>
    $(document).ready(function () {
        window.livewire.on('close_modal_resource', () => {
            var modalElement = document.getElementById('modal_resource');
            var modal = bootstrap.Modal.getInstance(modalElement)
            if(modal){
                modal.hide();
            }
        });

        var date = $("#experience_initial, #experience_end").datepicker({
            todayHighlight: !0,
            format: "yyyy",
            orientation: isRtl ? "auto right" : "auto left",
            minViewMode: 2,
            maxViewMode: 4,
            autoclose: 1
        })

        $(document).on('change', '#experience_initial', function () {
            livewire.emit('set_experience_field', $(this).attr('id'), $(this).val());
        });

        $(document).on('change', '#experience_end', function () {
            livewire.emit('set_experience_field', $(this).attr('id'), $(this).val());
        });

        $(document).on('click', '#btn_add', function () {
            livewire.emit('reset_experience');
        });

        $(document).on('click', '.btn_edit', function () {
            livewire.emit('set_experience', $(this).attr('value'));
        });

        $(document).on('click', '.btn_delete', function () {
            livewire.emit('ask_to_delete_experience', $(this).attr('value'));
        });

        $(document).on('click', '.btn_edit_account_status', function () {
            livewire.emit('ask_to_change_status_account', $(this).attr('value'));
        });
    });
</script>
