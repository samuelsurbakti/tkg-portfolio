<div class="col-md-6 {{ (auth()->user()->can('Pekerjaan - Melihat Kategori') ? 'col-lg-6' : 'col-lg-4') }}">
	<div class="card h-100">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title mb-0">
                <h5 class="mb-1 me-2">{{ $work->translate($language)->title }}</h5>
            </div>
            <div class="dropdown">
                <button class="btn text-body-secondary p-0" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-base bx bx-dots-vertical-rounded icon-lg"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item d-flex align-items-center gap-2 btn_edit" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modal_resource" value="{{ $work->id }}">
                        <i class="bx bx-edit"></i>Edit
                    </a>
                    <a class="dropdown-item d-flex align-items-center gap-2 btn_photo_add" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#photo_modal_resource" value="{{ $work->id }}">
                        <i class="bx bx-image"></i>Tambah Foto
                    </a>
                    <a class="dropdown-item d-flex align-items-center gap-2 btn_delete" href="javascript:void(0);" value="{{ $work->id }}">
                        <i class="bx bx-trash"></i>Hapus
                    </a>
                </div>
            </div>
        </div>

		<div class="card-body d-flex flex-column flex-fill justify-content-between">
			<p>{{ $work->translate($language)->info }}</p>

			<div class="col-12 text-center">
				<button class="btn btn-outline-primary" wire:click="set_language">
                    <span class="icon-base bx bx-analyze icon-xs me-2"></span>{{ ($language == 'id' ? 'Bahasa Inggris' : 'Bahasa Indonesia') }}
                </button>
			</div>
		</div>

        @if ($work->photos->count() != 0)
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($work->photos as $photo)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <div class="carousel-caption d-none d-md-block">
                                <button class="btn btn-icon btn-label-danger">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </div>
                            <img class="d-block w-100" src="{{ asset('src/img/work/'.$photo->photo) }}" alt="{{ $photo->photo }}">
                        </div>
                    @endforeach
                </div>
                @if ($work->photos->count() > 1)
                    <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                @endif
            </div>
        @endif
	</div>
</div>
