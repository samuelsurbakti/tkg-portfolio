<script>
    $(document).ready(function () {
        window.livewire.on('close_modal_resource', () => {
            var modalElement = document.getElementById('modal_resource');
            var modal = bootstrap.Modal.getInstance(modalElement)
            modal.hide();
        });

        $(document).on('click', '#btn_add', function () {
            livewire.emit('reset_service');
        });

        $(document).on('click', '.btn_edit', function () {
            livewire.emit('set_service', $(this).attr('value'));
        });

        $(document).on('click', '.btn_delete', function () {
            livewire.emit('ask_to_delete_service', $(this).attr('value'));
        });
    });
</script>
