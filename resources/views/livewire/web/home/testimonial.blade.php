<section id="testimonial" class="section">
    <div class="container px-lg-5">
        <div class="position-relative d-flex text-center mb-5">
            <h2 class="text-24 text-light opacity-4 text-uppercase fw-600 w-100 mb-0">{{ __('section.testimonial.title') }}</h2>
            <p class="text-9 text-dark fw-600 position-absolute w-100 align-self-center lh-base mb-0">{{ __('section.testimonial.subtitle') }} <span class="heading-separator-line border-bottom border-3 border-primary d-block mx-auto"></span>
            </p>
        </div>

        <div class="owl-carousel owl-theme" data-loop="true" data-nav="false" data-autoplay="false" data-margin="25" data-stagepadding="0" data-slideby="1" data-items-xs="1" data-items-sm="1" data-items-md="1" data-items-lg="2">
            @foreach ($testimonials as $testimonial)
                <div class="item">
                    <div class="bg-light rounded p-5">
                        <div class="d-flex align-items-center mt-auto mb-4">
                            {!! \App\Helpers\ImageHelper::picture('client', $testimonial->photo, 'thumb', ['loading' => 'lazy', 'class' => 'img-fluid rounded-circle border d-inline-block', 'alt' => $testimonial->name]) !!}
                            <p class="ms-3 mb-0">
                                <strong class="d-block text-dark fw-600">{{ $testimonial->name }}</strong>
                                <span class="text-muted fw-500">{{ $testimonial->description }}</span>
                            </p>
                        </div>
                        <p class="text-dark fw-500 mb-4">“{{ $testimonial->testimonial }}”</p>
                        <span class="text-2">
                            @for ($i = 0; $i < $testimonial->full_stars; $i++)
                                <i class="fas fa-star text-warning"></i>
                            @endfor

                            @if ($testimonial->has_half_star)
                                <i class="fas fa-star-half-alt text-warning"></i>
                            @endif

                            @for ($i = 0; $i < $testimonial->empty_stars; $i++)
                                <i class="far fa-star text-warning"></i>
                            @endfor
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
