<script src="{{ asset('themes/web/vendor/jquery/jquery.min.js') }}" ></script>
<script src="{{ asset('themes/web/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{ asset('themes/web/vendor/jquery.easing/jquery.easing.min.js') }}" defer></script>
<script src="{{ asset('themes/web/vendor/jquery.appear/jquery.appear.min.js') }}" defer></script>
<script src="{{ asset('themes/web/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}" defer></script>
<script src="{{ asset('themes/web/vendor/jquery.countTo/jquery.countTo.min.js') }}" defer></script>
<script src="{{ asset('themes/web/vendor/parallaxie/parallaxie.min.js') }}" defer></script>
<script src="{{ asset('themes/web/vendor/typed/typed.min.js') }}" defer></script>
<script src="{{ asset('themes/web/vendor/owl.carousel/owl.carousel.min.js') }}" defer></script>
<script src="{{ asset('themes/web/vendor/isotope/isotope.pkgd.min.js') }}" defer></script>
<script src="{{ asset('themes/web/vendor/magnific-popup/jquery.magnific-popup.min.js') }}" defer></script>
<script src="{{ asset('themes/web/js/switcher.min.js') }}" defer></script>
<script src="{{ asset('themes/web/js/theme.js') }}" defer></script>
<script>
    $(window).on('load', function () {
        $('.owl-dot').each(function(index){
            $(this).attr('aria-label', 'Navigasi ke slide ' + (index + 1));
        });

        $('.switcher-toggle').attr('aria-label', 'Tombol pengubah tema tampilan');

        $('.owl-prev').attr('aria-label', 'Prev Button');
        $('.owl-next').attr('aria-label', 'Next Button');
    });
</script>
