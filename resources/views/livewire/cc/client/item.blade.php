<div class="col-xl-4 col-lg-6 col-md-6">
	<div class="card h-100">
		<div class="card-body text-center d-flex flex-column justify-content-between">
			<div class="dropdown btn-pinned">
				<button class="btn text-body-secondary p-0" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-base bx bx-dots-vertical-rounded icon-lg"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item d-flex align-items-center gap-2 btn_edit" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modal_resource" value="{{ $client->id }}">
                        <i class="bx bx-edit"></i>Edit
                    </a>
                    <a class="dropdown-item d-flex align-items-center gap-2 btn_delete" href="javascript:void(0);" value="{{ $client->id }}">
                        <i class="bx bx-trash"></i>Hapus
                    </a>
                </div>
			</div>
			<div class="mx-auto my-6">
				<img src="{{ asset('src/img/client/'.$client->photo) }}" alt="Avatar Image" class="rounded-circle w-px-100 h-px-100">
			</div>
			<h5 class="mb-0 card-title">{{ $client->name }}</h5>
			<span>{{ $client->translate($language)->description }}</span>
			<div class="d-flex align-items-center justify-content-center mt-6 mb-2 gap-2">
                @for ($i = 0; $i < $full_stars; $i++)
                    <i class="bx bxs-star text-warning icon-lg"></i>
                @endfor

                @if ($has_half_star)
                    <i class="bx bxs-star-half text-warning icon-lg"></i>
                @endif

                @for ($i = 0; $i < $empty_stars; $i++)
                    <i class="bx bx-star text-warning icon-lg"></i>
                @endfor
			</div>
            <div class="mb-6">
                <h5 class="mb-0">{{ number_format($client->star, 1) }}/5.0</h5>
            </div>
			<div class="d-flex align-items-center justify-content-around mb-8">
				<p>{{ $client->translate($language)->testimonial }}</p>
			</div>
			<div class="d-flex align-items-center justify-content-center">
				<button class="btn btn-outline-primary" wire:click="set_language">
                    <span class="icon-base bx bx-analyze icon-xs me-2"></span>{{ ($language == 'id' ? 'Bahasa Inggris' : 'Bahasa Indonesia') }}
                </button>
			</div>
		</div>
	</div>
</div>
