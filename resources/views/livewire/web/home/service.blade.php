<section id="services" class="section bg-light">
    <div class="container px-lg-5">
        <div class="position-relative d-flex text-center mb-5">
            <h2 class="text-24 text-light opacity-4 text-uppercase fw-600 w-100 mb-0"> {{ __('section.services.title') }} </h2>
            <p class="text-9 text-dark fw-600 position-absolute w-100 align-self-center lh-base mb-0">{{ __('section.services.subtitle') }} <span class="heading-separator-line border-bottom border-3 border-primary d-block mx-auto"></span>
            </p>
        </div>

        <div class="row">
            <div class="col-lg-11 mx-auto">
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-md-6">
                            <div class="featured-box style-3 mb-5">
                                <div class="featured-box-icon text-primary bg-white shadow-sm rounded">
                                    <i class="{{ $service->icon_class }}"></i>
                                </div>
                                <h3>{{ $service->name }}</h3>
                                <p class="mb-0">{{ $service->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
