<div wire:ignore.self class="modal fade" id="sm_modal_resource" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                    <h4 class="address-title mb-2">{{ (is_null($sm_id) ? 'Tambah' : 'Edit') }} Media Sosial</h4>
                    <p class="address-subtitle">Di sini, Anda dapat {{ (is_null($sm_id) ? 'menambah' : 'mengubah') }} informasi media sosial.</p>
                </div>
                <form wire:submit.prevent="submit" method="POST">
                    @csrf
                    <div class="col-sm-12 mb-4">
                        <label class="form-label" for="sm_name">Nama</label>
                        <input type="text" id="sm_name" class="form-control @error('sm_name') is-invalid @enderror" wire:model="sm_name" placeholder="Nama" />
                        @error('sm_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-12 mb-4">
                        <label class="form-label" for="sm_icon_class">Class Ikon</label>
                        <input type="text" id="sm_icon_class" class="form-control @error('sm_icon_class') is-invalid @enderror" wire:model="sm_icon_class" placeholder="Class Ikon" />
                        <small id="sm_icon_class_text_help" class="form-text text-muted">Temukan class ikon <a href="https://fontawesome.com/search" target="_blank">di sini</a></small>
                        @error('sm_icon_class')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-12 mb-4">
                        <label class="form-label" for="sm_url">URL</label>
                        <input type="text" id="sm_url" class="form-control @error('sm_url') is-invalid @enderror" wire:model="sm_url" placeholder="URL" />
                        @error('sm_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 text-center mt-8">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Simpan</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Batalkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
