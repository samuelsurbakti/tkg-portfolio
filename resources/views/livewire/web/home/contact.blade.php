<section id="contact" class="section bg-light">
	<div class="container px-lg-5">
		<!-- Heading -->
		<div class="position-relative d-flex text-center mb-5">
			<h2 class="text-24 text-light opacity-4 text-uppercase fw-600 w-100 mb-0">{{ __('section.contact.title') }}</h2>
			<p class="text-9 text-dark fw-600 position-absolute w-100 align-self-center lh-base mb-0">{{ __('section.contact.subtitle') }}
				<span class="heading-separator-line border-bottom border-3 border-primary d-block mx-auto"></span>
			</p>
		</div>
		<!-- Heading end-->
		<div class="row gy-5">
			<div class="col-md-4 col-xl-3 order-1 order-md-0 text-center text-md-start">
				<h2 class="mb-3 text-5 text-uppercase">{{ __('section.contact.address') }}</h2>
				<p class="text-3 mb-4">{{ $pi->address }}</p>
				<p class="text-3 mb-1">
					<span class="text-primary text-4 me-2">
						<i class="fas fa-phone"></i>
					</span>
                    <a href="tel:{{ $pi->phone }}">{{ $pi->phone }}</a>
				</p>
				<p class="text-3 mb-1">
					<span class="text-primary text-4 me-2">
						<i class="fas fa-comment"></i>
					</span>{{ $pi->whatsapp }}
				</p>
				<p class="text-3 mb-4">
					<span class="text-primary text-4 me-2">
						<i class="fas fa-envelope"></i>
					</span>{{ $pi->email }}
				</p>
				<h2 class="mb-3 text-5 text-uppercase">{{ __('section.contact.follow') }}</h2>
				<ul class="social-icons justify-content-center justify-content-md-start">
                    @foreach ($social_medias as $social_media)
                        <li>
                            <a data-bs-toggle="tooltip" href="{{ $social_media->url }}" target="_blank" title="{{ $social_media->name }}">
                                <i class="fab {{ $social_media->icon_class }}"></i>
                            </a>
                        </li>
                    @endforeach
				</ul>
			</div>
			<div class="col-md-8 col-xl-9 order-0 order-md-1">
				<h2 class="mb-3 text-5 text-uppercase text-center text-md-start">Send us a note</h2>
				<form id="contact-form" action="#" method="post">
					<div class="row g-4">
						<div class="col-xl-6">
							<input name="name" type="text" class="form-control" required placeholder="Name">
						</div>
						<div class="col-xl-6">
							<input name="email" type="email" class="form-control" required placeholder="Email">
						</div>
						<div class="col">
							<textarea name="form-message" class="form-control" rows="5" required placeholder="Tell us more about your needs........"></textarea>
						</div>
					</div>
					<p class="text-center mt-4 mb-0">
						<button id="submit-btn" class="btn btn-primary rounded-pill d-inline-flex" type="submit">Send Message</button>
					</p>
				</form>
			</div>
		</div>
	</div>
</section>
