<section id="portfolio" class="section bg-light">
	<div class="container px-lg-5">
		<!-- Heading -->
		<div class="position-relative d-flex text-center mb-5">
			<h2 class="text-24 text-light opacity-4 text-uppercase fw-600 w-100 mb-0">{{ __('section.portfolio.title') }}</h2>
			<p class="text-9 text-dark fw-600 position-absolute w-100 align-self-center lh-base mb-0">{{ __('section.portfolio.subtitle') }} <span class="heading-separator-line border-bottom border-3 border-primary d-block mx-auto"></span> </p>
		</div>
		<!-- Heading end-->
		<!-- Filter Menu -->
		<ul class="portfolio-menu nav nav-tabs justify-content-lg-center border-bottom-0 mb-5 justify-content-sm-start">
			<li class="nav-item"> <a data-filter="*" class="nav-link active" href="#">All</a> </li>
            @foreach ($categories as $category)
                <li class="nav-item"> <a data-filter=".ct_{{ $category->id }}" href="#" class="nav-link">{{ $category->name }}</a> </li>
            @endforeach
		</ul>
		<!-- Filter Menu end -->
		<div class="portfolio popup-ajax-gallery">
			<div class="row portfolio-filter g-4">
                @foreach ($portfolios as $portfolio)
                    <div class="portfolio-container col-sm-6 col-lg-4 ct_{{ $portfolio->category_id }}">
                        <div class="portfolio-box rounded">
                            <div class="portfolio-img rounded">
                                {!! \App\Helpers\ImageHelper::picture('work', $portfolio->firstPhoto->photo, 'grid', ['class' => 'img-fluid d-block', 'alt' => $portfolio->title]) !!}

                                <div class="portfolio-overlay">
                                    <a class="popup-ajax stretched-link" aria-label="{{ $portfolio->title }}" href="{{ route('Web | Home | Portfolio Item', $portfolio) }}"></a>
                                    <div class="portfolio-overlay-details">
                                        <h5 class="text-white fw-400">{{ $portfolio->title }}</h5> <span class="text-light">{{ $portfolio->category->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
			</div>
		</div>
	</div>
</section>
