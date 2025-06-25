<div class="col-md-6 col-xxl-4">
	<div class="card h-100">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title mb-0">
                <h5 class="mb-1 me-2">{{ $experience->translate($language)->position }}</h5>
                <p class="card-subtitle">{{ $experience->translate($language)->institution }}</p>
            </div>
            <div class="dropdown">
                <button class="btn text-body-secondary p-0" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-base bx bx-dots-vertical-rounded icon-lg"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item d-flex align-items-center gap-2 btn_edit" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modal_resource" value="{{ $experience->id }}">
                        <i class="bx bx-edit"></i>Edit
                    </a>
                    <a class="dropdown-item d-flex align-items-center gap-2 btn_delete" href="javascript:void(0);" value="{{ $experience->id }}">
                        <i class="bx bx-trash"></i>Hapus
                    </a>
                </div>
            </div>
        </div>

		<div class="card-body d-flex flex-column flex-fill justify-content-between">
			<p>{{ $experience->translate($language)->description }}</p>
			<div class="row mb-4 g-3">
				<div class="col-6">
					<div class="d-flex align-items-center">
						<div class="avatar flex-shrink-0 me-3">
							<span class="avatar-initial rounded bg-label-primary">
								<i class="icon-base bx bx-calendar-star icon-lg"></i>
							</span>
						</div>
						<div>
							<h6 class="mb-0 text-nowrap">{{ $experience->initial }}</h6>
							<small>{{ ($language == 'id' ? 'Mulai' : 'Initial') }}</small>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="d-flex align-items-center">
						<div class="avatar flex-shrink-0 me-3">
							<span class="avatar-initial rounded bg-label-primary">
								<i class="icon-base bx bx-calendar-heart icon-lg"></i>
							</span>
						</div>
						<div>
							<h6 class="mb-0 text-nowrap">{{ $experience->end }}</h6>
							<small>{{ ($language == 'id' ? 'Selesai' : 'End') }}</small>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 text-center">
				<button class="btn btn-outline-primary" wire:click="set_language">
                    <span class="icon-base bx bx-analyze icon-xs me-2"></span>{{ ($language == 'id' ? 'Bahasa Inggris' : 'Bahasa Indonesia') }}
                </button>
			</div>
		</div>
	</div>
</div>
