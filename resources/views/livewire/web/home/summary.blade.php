<section id="resume" class="section">
    <div class="container px-lg-5">
        <!-- Heading -->
        <div class="position-relative d-flex text-center mb-5">
            <h2 class="text-24 text-light opacity-4 text-uppercase fw-600 w-100 mb-0">{{ __('section.summary.title') }}</h2>
            <p class="text-9 text-dark fw-600 position-absolute w-100 align-self-center lh-base mb-0">{{ __('section.summary.subtitle') }} <span class="heading-separator-line border-bottom border-3 border-primary d-block mx-auto"></span>
            </p>
        </div>
        <!-- Heading end-->
        <div class="row gx-5">
            <!-- My Education -->
            <div class="col-md-6">
                <h2 class="text-6 fw-600 mb-4">{{ __('section.summary.education') }}</h2>
                @if ($educations->count() != 0)
                    @foreach ($educations as $education)
                        <div class="bg-white border rounded p-4 mb-4">
                            <p class="badge bg-primary text-2 fw-400">{{ $education->initial }} - {{ $education->end }}</p>
                            <h3 class="text-5">{{ $education->department }}</h3>
                            <p class="text-danger">{{ $education->institution }}</p>
                            <p class="mb-0">{{ $education->description }}</p>
                        </div>
                    @endforeach
                @else
                    Saya belum memiliki riwayat pendidikan
                @endif
            </div>

            <div class="col-md-6">
                <h2 class="text-6 fw-600 mb-4">{{ __('section.summary.experience') }}</h2>
                @if ($experiences->count() != 0)
                    @foreach ($experiences as $experience)
                        <div class="bg-white border rounded p-4 mb-4">
                            <p class="badge bg-primary text-2 fw-400">{{ $experience->initial }} - {{ $experience->end }}</p>
                            <h3 class="text-5">{{ $experience->position }}</h3>
                            <p class="text-danger">{{ $experience->institution }}</p>
                            <p class="mb-0">{{ $experience->description }}</p>
                        </div>
                    @endforeach
                @else
                    Saya belum memiliki riwayat pengalaman
                @endif
            </div>
        </div>
        <!-- My Skills -->
        <h2 class="text-6 fw-600 mt-4 mb-4">{{ __('section.summary.skills') }}</h2>
        @php
            $chunks = $skills->chunk(ceil($skills->count() / 2));
        @endphp
        <div class="row gx-5">
            @foreach ($chunks as $chunk)
                <div class="col-md-6">
                    @foreach ($chunk as $skill)
                        <p class="text-dark fw-500 text-start mb-2">
                            {{ $skill->name }} <span class="float-end">{{ $skill->percentage }}%</span>
                        </p>
                        <div class="progress progress-sm mb-4">
                            <div class="progress-bar" role="progressbar"
                                style="width: {{ $skill->percentage }}%"
                                aria-valuenow="{{ $skill->percentage }}"
                                aria-valuemin="0" aria-valuemax="100"
                                aria-label="{{ $skill->name }}"></div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>
