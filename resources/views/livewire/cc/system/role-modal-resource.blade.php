<div wire:ignore.self class="modal fade" id="modal_role_resource" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                    <h4 class="address-title mb-2">{{ (is_null($role_id) ? 'Tambah' : 'Edit') }} Peran</h4>
                    <p class="address-subtitle">Di sini, Anda dapat {{ (is_null($role_id) ? 'menambah data' : 'mengubah informasi') }} Peran.</p>
                </div>
                <form wire:submit.prevent="submit" method="POST">
                    @csrf
                    <div class="col-12">
                        <label class="form-label" for="role_name">Nama</label>
                        <input type="text" id="role_name" name="role_name" class="form-control @error('role_name') is-invalid @enderror" wire:model="role_name" placeholder="Admin" />
                        @error('role_name')
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
