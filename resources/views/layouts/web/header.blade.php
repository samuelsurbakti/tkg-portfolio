<header id="header" class="sticky-top">
    <nav class="primary-menu navbar navbar-expand-lg navbar-dark bg-dark border-bottom-0">
        <div class="container-fluid position-relative h-100 flex-lg-column ps-3 px-lg-3 pt-lg-3 pb-lg-2">
            <a disabled class="mb-lg-auto mt-lg-4 d-flex flex-column align-items-center">
                <span class="bg-dark-2 rounded-pill p-2 mb-lg-1 d-none d-lg-inline-block">
                    {!! \App\Helpers\ImageHelper::picture('pi', $app_pi->photo, 'avatar', ['loading' => 'lazy', 'class' => 'img-fluid rounded-pill d-block', 'title' => __('section.about.me').' '.$app_pi->name, ]) !!}
                </span>
                <h1 class="text-5 text-white text-center mb-0 d-lg-block">{{ $app_pi->name }}</h1>
            </a>
            <div id="header-nav" class="collapse navbar-collapse w-100 my-lg-auto">
                <ul class="navbar-nav text-lg-center my-lg-auto py-lg-3">
                    <li class="nav-item">
                        <a class="nav-link smooth-scroll active" href="#home">{{ __('navigation.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link smooth-scroll" href="#about">{{ __('navigation.about') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link smooth-scroll" href="#services">{{ __('navigation.services') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link smooth-scroll" href="#resume">{{ __('navigation.experience') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link smooth-scroll" href="#portfolio">{{ __('navigation.projects') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link smooth-scroll" href="#testimonial">{{ __('navigation.testimonials') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link smooth-scroll" href="#contact">{{ __('navigation.contact') }}</a>
                    </li>
                </ul>
            </div>
            <ul class="social-icons social-icons-muted social-icons-sm mt-lg-auto ms-auto ms-lg-0 d-lg-flex d-none">
                @foreach ($app_social_medias as $app_social_media)
                    <li class="">
                        <a data-bs-toggle="tooltip" title="{{ $app_social_media->name }}" href="{{ $app_social_media->url }}" target="_blank">
                            <i class="fab {{ $app_social_media->icon_class }}"></i>
                        </a>
                    </li>
                @endforeach
            </ul>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#header-nav" aria-label="Navbar Toggler">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>
</header>
