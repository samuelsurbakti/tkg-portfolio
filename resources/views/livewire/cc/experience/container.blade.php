<div class="row g-6">
    @can('Pengalaman - Menambah Data')
        <div class="col-md-6 col-lg-4">
            <div class="card text-center h-100">
                <div class="card-body d-flex flex-column flex-fill justify-content-between align-items-center">
                    <h5 class="card-title">Update Riwayat Pengalaman</h5>
                    <div class="d-flex align-items-end justify-content-center mt-sm-0 mt-3">
                        <img src="{{ asset('themes/cc/img/illustrations/experience-light.svg') }}" class="img-fluid me-n3" alt="Image" data-app-light-img="illustrations/experience-light.svg" data-app-dark-img="illustrations/experience-dark.svg" width="120px">
                    </div>
                    <p class="card-text">Ada pengalaman baru? Klik tombol di bawah untuk menambahkannya, gampang kok!</p>
                    <button type="button" class="btn btn-primary" id="btn_add" data-bs-target="#modal_resource" data-bs-toggle="modal" >
                        <span class="icon-base bx bx-plus icon-xs me-2"></span>Tambahkan
                    </button>
                </div>
            </div>
        </div>
    @endcan

    @foreach($experiences as $experience)
        @livewire('cc.experience.item', ['experience' => $experience], key('experience-'.$experience->id))
    @endforeach
</div>
