<div wire:ignore.self class="modal fade" id="modal_permission_resource" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                    <h4 class="address-title mb-2">{{ (is_null($permission_id) ? 'Tambah' : 'Edit') }} Izin</h4>
                    <p class="address-subtitle">Di sini, Anda dapat {{ (is_null($permission_id) ? 'menambah data' : 'mengubah informasi') }} Izin.</p>
                </div>
                <form wire:submit.prevent="submit" method="POST">
                    @csrf
                    <div class="col-12 mb-4">
                        <label class="form-label" for="permission_type">Jenis</label>
                        <select wire:model="permission_type" id="permission_type" class="form-select select2 @error('permission_type') is-invalid @enderror" style="width: 100%;" data-placeholder="Jenis">
                            <option></option>
                            @forelse($types as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @empty
                            @endforelse
                        </select>
                        @error('permission_type')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label" for="permission_menu_id">Menu</label>
                        <select wire:model="permission_menu_id" id="permission_menu_id" class="form-select select2 @error('permission_menu_id') is-invalid @enderror" style="width: 100%;" data-placeholder="Menu">
                            <option></option>
                            @forelse($menus as $menu)
                                <option value="{{ $menu['id'] }}">{{ ($menu['member_of'] ? '('.$menu['member_of'].')' : '') }} {{ $menu['title'] }}</option>
                            @empty
                            @endforelse
                        </select>
                        @error('permission_menu_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label" for="permission_name">Izin</label>
                        <input type="text" class="form-control @error('permission_name') is-invalid @enderror" wire:model="permission_name" placeholder="Izin" />
                        @error('permission_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label" for="permission_number">Urutan</label>
                        <input type="text" class="form-control @error('permission_number') is-invalid @enderror" wire:model="permission_number" placeholder="Urutan" />
                        @error('permission_number')
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
