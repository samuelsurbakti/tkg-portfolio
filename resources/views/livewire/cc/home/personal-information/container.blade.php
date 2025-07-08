<div class="col-xl-4 col-lg-5 masonry-card">
	<div class="card">
		<div class="card-body">
            @if ($personal_information)
                <div class="user-avatar-section">
                    <div class=" d-flex align-items-center flex-column">
                        <img class="img-fluid rounded mb-4" src="{{ asset('src/img/pi/'.$personal_information->photo) }}" height="120" width="120" alt="User avatar">
                        <div class="user-info text-center">
                            <h5>{{ $personal_information->name }}</h5>
                        </div>
                    </div>
                </div>
                <h5 class="pb-4 border-bottom mb-4">Detail</h5>
                <div class="info-container">
                    <ul class="list-unstyled mb-6">
                        <li class="mb-2">
                            <span class="h6">Email:</span>
                            <span>{{ $personal_information->email }}</span>
                        </li>
                        <li class="mb-2">
                            <span class="h6">No. Telepon:</span>
                            <span>{{ $personal_information->phone }}</span>
                        </li>
                        <li class="mb-2">
                            <span class="h6">No. Whatsapp:</span>
                            <span>{{ $personal_information->whatsapp }}</span>
                        </li>
                        <li class="mb-2">
                            <span class="h6">Tgl. Lahir:</span>
                            <span>{{ Carbon::parse($personal_information->dob)->isoFormat('DD MMMM YYYY') }}</span>
                        </li>
                        <li class="mb-2">
                            <span class="h6">Asal:</span>
                            <span>{{ $personal_information->origin }}</span>
                        </li>
                        <li class="mb-2">
                            <span class="h6">Alamat:</span>
                            <span>{{ $personal_information->translate('id')->address }}</span>
                        </li>
                        <li class="mb-2">
                            <span class="h6">Cerita:</span>
                            <span>{{ $personal_information->translate('id')->story }}</span>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center">
                        <button wire:click="$emit('set_pi','{{ $personal_information->id }}')" class="btn btn-primary" data-bs-target="#pi_modal_resource" data-bs-toggle="modal">Ubah Informasi Pribadi</button>
                    </div>
                </div>
            @else
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary" data-bs-target="#pi_modal_resource" data-bs-toggle="modal">Tambah Informasi Pribadi</button>
                </div>
            @endif
		</div>
	</div>
</div>
