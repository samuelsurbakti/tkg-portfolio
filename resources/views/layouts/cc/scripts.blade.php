<script src="{{ asset('themes/cc/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('themes/cc/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('themes/cc/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('themes/cc/vendor/libs/%40algolia/autocomplete-js.js') }}"></script>
<script src="{{ asset('themes/cc/vendor/libs/pickr/pickr.js') }}"></script>
<script src="{{ asset('themes/cc/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('themes/cc/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('themes/cc/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('themes/cc/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('themes/cc/vendor/js/menu.js') }}"></script>
<script src="{{ asset('themes/cc/js/main.js') }}"></script>

<script>
    function isMobileDevice() {
        return window
            .matchMedia("only screen and (max-width: 760px)").matches;
    }

    $(document).ready(function () {
        window.templateCustomizer.setColor('#F0F0F0'); // contoh color

        $(document).on('click', '.detail_log', function () {
            livewire.emit('set_activity', $(this).attr('value'));
            $("#modal_log").modal('show');
        });

        window.livewire.on('goto_route', (url) => {
            setTimeout(window.location.replace(url), 3000);
        });

        $('.optional_new_tab').each(function () {
            if (isMobileDevice()) {
                $(this).removeAttr('target');
            } else {
                $(this).attr('target', '_blank');
            }
        });

        if (isMobileDevice()) {
            $("body").append('<button class="btn-reload btn-icon" onClick="window.location.reload(true)"><i class="bx bx-refresh"></i></button><button class="btn-back btn-icon" onClick="history.back()"><i class="bx bx-arrow-back"></i></button>');
        }
    });
</script>
