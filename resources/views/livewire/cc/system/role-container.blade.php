<div class="row g-4 mb-4">
    @foreach($roles as $role)
        @livewire('cc.system.role-list', ['role' => $role], key('role-'.$role->uuid))
    @endforeach

    @can('Sistem - Menambah Peran')
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="row h-100">
                    <div class="col-sm-4">
                        <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                            <img src="{{ asset('themes/cc/img/illustrations/security-light.svg') }}" class="img-fluid me-n3" alt="Image" data-app-light-img="illustrations/security-light.svg" data-app-dark-img="illustrations/security-dark.svg" width="120px">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="card-body text-sm-end text-center ps-sm-0">
                            <p class="mb-0">Butuh peran tambahan?</p>
                            <button id="btn_role_create" data-bs-target="#modal_role_resource" data-bs-toggle="modal" class="btn btn-sm btn-primary mt-3 text-nowrap add-new-role">Ya</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card h-100 mb-0">
                <div class="card-body p-4">
                    <h4 class="card-title">Butuh peran tambahan?</h4>
                    <div class="d-flex align-items-center justify-content-between gap-4 mb-4">
                        <p class="mb-0">Segera tambahkan melalui tombol dibawah ini.</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button id="btn_role_create" class="btn bg-primary-subtle text-primary" data-bs-toggle="modal" data-bs-target="#modal_role_resource">Tambah Peran</button>
                    </div>
                </div>
            </div>
        </div> --}}
    @endcan
</div>
