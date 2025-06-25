<!doctype html>
<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-skin="default" data-assets-path="{{ asset('themes/cc') }}/" data-template="vertical-menu-template" data-bs-theme="light">
    <head>
        @include('layouts.cc.title')
        @include('layouts.cc.description')
        @include('layouts.favicon')
        @include('layouts.cc.styles')
        @stack('page_styles')
        @include('layouts.themescript')
        @livewireStyles
    </head>

    <body>
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                @include('layouts.cc.sidebar')

                <div class="layout-page">
                    @include('layouts.cc.header')

                    <div class="content-wrapper">
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="row">
								@include('layouts.cc.page-title')
							</div>

                            @yield('content')
                        </div>

                        @include('layouts.cc.footer')

                        <div class="content-backdrop fade"></div>
                    </div>
                </div>
            </div>

            <div class="layout-overlay layout-menu-toggle"></div>

            <div class="drag-target"></div>

        </div>

        @include('layouts.cc.scripts')
        @stack('page_scripts')

        @livewireScripts

        <x-livewire-alert::scripts />
    </body>
</html>
