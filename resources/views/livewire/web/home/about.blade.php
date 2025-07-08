<section id="about" class="section">
	<div class="container px-lg-5">
		<div class="position-relative d-flex text-center mb-5">
			<h2 class="text-24 text-light opacity-4 text-uppercase fw-600 w-100 mb-0">{{ __('section.about.title') }}</h2>
			<p class="text-9 text-dark fw-600 position-absolute w-100 align-self-center lh-base mb-0">{{ __('section.about.subtitle') }}
				<span class="heading-separator-line border-bottom border-3 border-primary d-block mx-auto"></span>
			</p>
		</div>
		<div class="row gy-5">
			<div class="col-lg-7 col-xl-8 text-center text-lg-start">
				<h2 class="text-7 fw-600 mb-3">{{ __('section.about.me') }} <span class="text-primary">{{ $pi->name }},</span> {{ __('section.about.profession') }} {{ $profession->name }} </h2>
				<p>{{ $pi->story }}</p>
			</div>
			<div class="col-lg-5 col-xl-4">
				<div class="ps-lg-4">
					<ul class="list-style-2">
						<li class="">
							<span class="fw-600 me-2">{{ __('section.about.name') }}:</span>{{ $pi->name }}
						</li>
						<li class="">
							<span class="fw-600 me-2">{{ __('section.about.email') }}:</span>
							<a href="mailto:chat@simone.com">{{ $pi->email }}</a>
						</li>
						<li class="">
							<span class="fw-600 me-2">{{ __('section.about.age') }}:</span>{{ Carbon::parse($pi->dob)->diffInYears(Carbon::now()) }}
						</li>
						<li class="border-0">
							<span class="fw-600 me-2">{{ __('section.about.from') }}:</span>{{ $pi->origin }}
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="brands-grid separator-border mt-5">
            <div class="owl-carousel owl-theme" data-autoplay="true" data-nav="true" data-loop="false" data-margin="30" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4">
                @foreach ($statistics as $statistic)
                    <div class="item">
                        <div class="featured-box text-center">
                            <h4 class="text-12 text-muted mb-0">
                                <span class="counter" data-from="0" data-to="{{ $statistic->amount }}">{{ $statistic->amount }}</span>{{ ($statistic->with_plus ? '+' : '') }}
                            </h4>
                            <p class="mb-0">{{ $statistic->label }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
		</div>
	</div>
</section>
