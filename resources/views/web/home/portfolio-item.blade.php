<div class="container ajax-container">
	<h2 class="text-6 font-weight-600 text-center mb-4">{{ $portfolio->title }}</h2>
	<div class="row g-4">
		<div class="col-md-7">
			<div class="owl-carousel owl-theme single-slideshow" data-autoplay="true" data-loop="true" data-nav="true" data-items="1">
				@foreach ($portfolio->photos as $photo)
                    <div class="item">
                        <img class="img-fluid" alt="" src="{{ asset('src/img/work/' . pathinfo($photo->photo, PATHINFO_FILENAME) . '.webp') }}">
                    </div>
                @endforeach
			</div>
		</div>
		<div class="col-md-5">
            <ul class="list-style-2 mt-n3">
				<li><span class="text-dark font-weight-600 me-2">{{ __('section.portfolio.date') }}:</span>{{ Carbon::parse($portfolio->date)->isoFormat('DD MMMM YYYY') }}</li>
				<li><span class="text-dark font-weight-600 me-2">{{ __('section.portfolio.category') }}:</span>{{ $portfolio->category->name }}</li>
			</ul>
			<p>{{ $portfolio->info }}</p>
		</div>
	</div>
</div>
