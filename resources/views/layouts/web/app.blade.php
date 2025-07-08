<!DOCTYPE html>
<html lang="en">
	<head>
        {{-- @include('layouts.web.title')
        @include('layouts.web.description') --}}
        {!! SEO::generate() !!}
        @include('layouts.favicon')
        @include('layouts.web.styles')


        <link rel="alternate" hreflang="id" href="https://id.teguhkawal.com/" />
        <link rel="alternate" hreflang="en" href="https://en.teguhkawal.com/" />
        <link rel="alternate" hreflang="x-default" href="https://teguhkawal.com/" />

        <link rel="canonical" href="{{ $canonical }}">
	</head>
	<body class="side-header" data-bs-spy="scroll" data-bs-target="#header-nav" data-bs-offset="1">
		<!-- Preloader -->
		<div class="preloader">
			<div class="lds-ellipsis">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
		<!-- Preloader End -->
		<!-- Document Wrapper
=============================== -->
		<div id="main-wrapper">
			@include('layouts.web.header')
			<!-- Content
  ============================================= -->
			<div id="content" role="main">
				<!-- Intro
    ============================================= -->
                @livewire('web.home.intro')
				<!-- Intro end -->
				<!-- About
    ============================================= -->
                @livewire('web.home.about')

				<!-- About end -->
				<!-- Services
    ============================================= -->
                @livewire('web.home.service')

				<!-- Services end -->
				<!-- Resume
    ============================================= -->
                @livewire('web.home.summary')

				<!-- Resume end -->
				<!-- Portfolio
    ============================================= -->
                @livewire('web.home.portfolio')

				<!-- Portfolio end -->
				<!-- Testimonial
    ============================================= -->
                @livewire('web.home.testimonial')

				<!-- Testimonial end -->
				<!-- Contact Me
    ============================================= -->
                @livewire('web.home.contact')
			</div>
			<!-- Content end -->
			<!-- Footer
  ============================================= -->
			<footer id="footer" class="section">
				<div class="container px-lg-5">
					<div class="row">
						<div class="col-lg-6 text-center text-lg-start">
							<p class="mb-3 mb-lg-0">Copyright © 2025. All Rights Reserved. </p>
						</div>

					</div>
				</div>
			</footer>
			<!-- Footer end -->
		</div>
		<!-- Document Wrapper end -->
		<!-- Back to Top
============================================= -->
		<button id="back-to-top" class="rounded-circle border-0" data-bs-toggle="tooltip" title="{{ __('section.back-to-top') }}" href="javascript:void(0)">
			<i class="fa fa-chevron-up"></i>
		</button>
		<!-- Terms & Policy Modal
================================== -->

		<!-- Disclaimer Modal End -->
		<!-- Styles Switcher -->
		<div id="styles-switcher" class="right">
			<h2 class="text-3">Pilih Bahasa</h2>
			<hr>
			<ul class="d-grid">
				<li data-bs-toggle="tooltip" title="Indonesia"><a href="https://id.kawalgurusinga.com">Indonesia</a></li>
				<li data-bs-toggle="tooltip" title="English"><a href="https://en.kawalgurusinga.com">English</a></li>
			</ul>
			<button class="btn switcher-toggle" aria-label="Button Language">
				<i class="fas fa-language"></i>
			</button>
		</div>
		<!-- Styles Switcher End -->

        @include('layouts.web.scripts')
	</body>
</html>
