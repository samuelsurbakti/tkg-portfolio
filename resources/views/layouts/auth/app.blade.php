<!doctype html>
<html lang="en" class="layout-wide customizer-hide" dir="ltr" data-skin="default" data-assets-path="{{ asset('themes/cc') }}/" data-template="vertical-menu-template" data-bs-theme="light">
    <head>
        @include('layouts.auth.title')
        @include('layouts.auth.description')
        @include('layouts.favicon')
        @include('layouts.auth.styles')
        @stack('page_styles')
        @include('layouts.themescript')
    </head>

    <body>
        @yield('content')
        @include('layouts.auth.scripts')
        @stack('page_scripts')
    </body>
</html>
