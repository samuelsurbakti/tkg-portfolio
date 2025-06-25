<script>
    $(document).ready(function () {
        var $ratingElement = $(".onChange-event-ratings");

        if ($ratingElement.length === 0) return;

        var gray = window.Helpers.getCssVar("gray-200", true);
        var v = parseInt(gray.slice(1, 3), 16),
            c = parseInt(gray.slice(3, 5), 16),
            o = parseInt(gray.slice(5, 7), 16);

        var starOn = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='16' %3E%3Cpath fill='%23FFD700' d='M21.947 9.179a1 1 0 0 0-.868-.676l-5.701-.453l-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107l-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4l4.536-4.082c.297-.268.406-.686.278-1.065'/%3E%3C/svg%3E";

        var starOff = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='16' %3E%3Cpath fill='rgb(" + v + "," + c + "," + o + ")' d='M21.947 9.179a1 1 0 0 0-.868-.676l-5.701-.453l-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107l-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4l4.536-4.082c.297-.268.406-.686.278-1.065'/%3E%3C/svg%3E";

        var stopColor = gray.replace("#", "%23");
        var gradient = isRtl ?
            "%3Cstop offset='50%25' style='stop-color:" + stopColor + "' /%3E%3Cstop offset='50%25' style='stop-color:%23FFD700' /%3E" :
            "%3Cstop offset='50%25' style='stop-color:%23FFD700' /%3E%3Cstop offset='50%25' style='stop-color:" + stopColor + "' /%3E";

        var starHalf = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cdefs%3E%3ClinearGradient id='halfStarGradient'%3E" +
            gradient +
            "%3C/linearGradient%3E%3C/defs%3E%3Cpath fill='url(%23halfStarGradient)' d='M21.947 9.179a1 1 0 0 0-.868-.676l-5.701-.453l-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107l-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4l4.536-4.082c.297-.268.406-.686.278-1.065'/%3E%3C/svg%3E";

        var $counter = $ratingElement.closest(".col-md").find(".counter");

        var raty = new Raty($ratingElement[0], {
            starOn: starOn,
            starHalf: starHalf,
            starOff: starOff,
            half: true,
            mouseover: function (score) {
                $(".counter").text((Math.round(2 * score) / 2).toFixed(1));
            },
            mouseout: function () {
                var current = raty.score() || 0;
                $(".counter").text((Math.round(2 * current) / 2).toFixed(1));
            },
            click: function (score) {
                // Emit ke Livewire
                Livewire.emit('set_client_field', 'client_star', score);
            }
        });

        // Set initial counter
        if ($counter.length) {
            $counter.text("0.0");
        }

        raty.init();

        window.livewire.on('close_modal_resource', () => {
            var modalElement = document.getElementById('modal_resource');
            var modal = bootstrap.Modal.getInstance(modalElement)
            if(modal){
                modal.hide();
            }
        });

        $(document).on('click', '#btn_add', function () {
            livewire.emit('reset_client');
        });

        $(document).on('click', '.btn_edit', function () {
            livewire.emit('set_client', $(this).attr('value'));
        });

        $(document).on('click', '.btn_delete', function () {
            livewire.emit('ask_to_delete_client', $(this).attr('value'));
        });
    });

    window.addEventListener('render-raty', event => {
        var $ratingElement = $(".onChange-event-ratings");

        if ($ratingElement.length === 0) return;

        var gray = window.Helpers.getCssVar("gray-200", true);
        var v = parseInt(gray.slice(1, 3), 16),
            c = parseInt(gray.slice(3, 5), 16),
            o = parseInt(gray.slice(5, 7), 16);

        var starOn = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='16' %3E%3Cpath fill='%23FFD700' d='M21.947 9.179a1 1 0 0 0-.868-.676l-5.701-.453l-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107l-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4l4.536-4.082c.297-.268.406-.686.278-1.065'/%3E%3C/svg%3E";

        var starOff = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='16' %3E%3Cpath fill='rgb(" + v + "," + c + "," + o + ")' d='M21.947 9.179a1 1 0 0 0-.868-.676l-5.701-.453l-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107l-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4l4.536-4.082c.297-.268.406-.686.278-1.065'/%3E%3C/svg%3E";

        var stopColor = gray.replace("#", "%23");
        var gradient = isRtl ?
            "%3Cstop offset='50%25' style='stop-color:" + stopColor + "' /%3E%3Cstop offset='50%25' style='stop-color:%23FFD700' /%3E" :
            "%3Cstop offset='50%25' style='stop-color:%23FFD700' /%3E%3Cstop offset='50%25' style='stop-color:" + stopColor + "' /%3E";

        var starHalf = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cdefs%3E%3ClinearGradient id='halfStarGradient'%3E" +
            gradient +
            "%3C/linearGradient%3E%3C/defs%3E%3Cpath fill='url(%23halfStarGradient)' d='M21.947 9.179a1 1 0 0 0-.868-.676l-5.701-.453l-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107l-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4l4.536-4.082c.297-.268.406-.686.278-1.065'/%3E%3C/svg%3E";

        var $counter = $ratingElement.closest(".col-md").find(".counter");

        var raty = new Raty($ratingElement[0], {
            starOn: starOn,
            starHalf: starHalf,
            starOff: starOff,
            half: true,
            mouseover: function (score) {
                $(".counter").text((Math.round(2 * score) / 2).toFixed(1));
            },
            mouseout: function () {
                var current = raty.score() || 0;
                $(".counter").text((Math.round(2 * current) / 2).toFixed(1));
            },
            click: function (score) {
                // Emit ke Livewire
                Livewire.emit('set_client_field', 'client_star', score);
            }
        });

        raty.init();
    })
</script>
