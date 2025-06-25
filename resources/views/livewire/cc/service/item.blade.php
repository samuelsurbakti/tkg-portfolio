<div class="col-xl-4 col-lg-6 col-md-6">
	<div class="card h-100">
		<div class="card-body d-flex flex-column justify-content-between align-content-between">
			<div class="d-flex align-items-center mb-3 pb-1">
				<a href="javascript:;" class="d-flex align-items-center">
					<div class="avatar me-2">
						<span class="avatar-initial rounded-circle bg-label-primary">
                            <i class="{{ $service->icon_class }}"></i>
                        </span>
					</div>
					<div class="me-2 text-heading h5 mb-0">{{ $service->translate($language)->name }}</div>
				</a>
				<div class="ms-auto">
					<div class="dropdown">
                        <button class="btn text-body-secondary p-0" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-base bx bx-dots-vertical-rounded icon-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item d-flex align-items-center gap-2 btn_edit" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modal_resource" value="{{ $service->id }}">
                                <i class="bx bx-edit"></i>Edit
                            </a>
                            <a class="dropdown-item d-flex align-items-center gap-2 btn_delete" href="javascript:void(0);" value="{{ $service->id }}">
                                <i class="bx bx-trash"></i>Hapus
                            </a>
                        </div>
                    </div>
				</div>
			</div>

            <p class="mb-3 pb-1">{{ $service->translate($language)->description }}</p>

            <div class="col-12 text-start">
                <button class="btn btn-outline-primary" wire:click="set_language">
                    <span class="icon-base bx bx-analyze icon-xs me-2"></span>{{ ($language == 'id' ? 'Bahasa Inggris' : 'Bahasa Indonesia') }}
                </button>
            </div>
		</div>
	</div>
</div>
