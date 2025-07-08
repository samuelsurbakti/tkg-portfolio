<section id="home">
	<div class="hero-wrap">
		<div class="hero-mask opacity-8 bg-dark"></div>
		<div class="hero-bg parallax" style="background-image:url('{{ asset('src/img/background/home.jpg') }}');"></div>
		<div class="hero-content section d-flex min-vh-100">
			<div class="container my-auto">
				<div class="row">
					<div class="col-12 text-center">
						<div class="typed-strings">
							<p>{{ __('section.home.typed-me') }} {{ $pi->name }}</p>
                            @foreach ($professions as $profession)
                                <p>{{ __('section.home.typed-profession') }} {{ $profession->name }}</p>
                            @endforeach
						</div>
						<p class="text-7 fw-500 text-white mb-2 mb-md-3">{{ __('section.home.title') }}</p>
						<h2 class="text-16 fw-600 text-white mb-2 mb-md-3">
                            <span class="typed"></span>
                        </h2>
						<p class="text-5 text-light mb-4">{{ __('section.home.based') }} {{ $pi->origin }}.</p>
                        <a href="#contact" class="btn btn-outline-primary rounded-pill shadow-none smooth-scroll mt-2">{{ __('section.home.contact') }}</a>
                    </div>
				</div>
			</div>
			<a href="#about" class="scroll-down-arrow text-white smooth-scroll" aria-label="Scroll Down">
                <span class="animated">
                    <i class="fa fa-chevron-down"></i>
                </span>
            </a>
		</div>
	</div>
</section>
