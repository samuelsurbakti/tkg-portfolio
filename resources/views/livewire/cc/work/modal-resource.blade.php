<div wire:ignore.self class="modal fade" id="modal_resource" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-simple">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                    <h4 class="address-title mb-2">{{ (is_null($work_id) ? 'Tambah' : 'Edit') }} Pekerjaan</h4>
                    <p class="address-subtitle">Di sini, Anda dapat {{ (is_null($work_id) ? 'menambah data' : 'mengubah informasi') }} pekerjaan.</p>
                </div>
                <form wire:submit.prevent="submit" method="POST">
                    @csrf
                    <div class="col-sm-12 mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-label" for="work_category_id">Menu</label>
                                <select wire:model="work_category_id" id="work_category_id" class="form-select select2 @error('work_category_id') is-invalid @enderror" style="width: 100%;" data-placeholder="Menu">
                                    <option></option>
                                    @forelse($categories as $category)
                                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('work_category_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label" for="work_date">Tanggal</label>
                                <input type="text" id="work_date" class="form-control @error('work_date') is-invalid @enderror" wire:model="work_date" placeholder="Tanggal" />
                                @error('work_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="work_tr_id_title">Judul [ID]</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control @error('work_tr_id_title') is-invalid @enderror" wire:model="work_tr_id_title" placeholder="Judul [ID]">
                                        <span wire:click="translate('id', '{{ $work_tr_id_title }}', 'work_tr_en_title')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                    </div>
                                    @error('work_tr_id_title')
                                        <div class="fv-plugins-message-container invalid-feedback d-block">
                                            <div data-field="work_tr_id_title">{{ $message }}</div>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="work_tr_en_title">Judul [EN]</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control @error('work_tr_en_title') is-invalid @enderror" wire:model="work_tr_en_title" placeholder="Judul [EN]">
                                        <span wire:click="translate('en', '{{ $work_tr_en_title }}', 'work_tr_id_title')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                    </div>
                                    @error('work_tr_en_title')
                                        <div class="fv-plugins-message-container invalid-feedback d-block">
                                            <div data-field="work_tr_en_title">{{ $message }}</div>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="work_tr_id_info">Informasi [ID]</label>
                                    <div class="input-group input-group-merge">
                                        <textarea wire:ignore.self class="form-control @error('work_tr_id_info') is-invalid @enderror" wire:model="work_tr_id_info" placeholder="Informasi [ID]"></textarea>
                                        <span wire:click="translate('id', '{{ $work_tr_id_info }}', 'work_tr_en_info')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                    </div>
                                    @error('work_tr_id_info')
                                        <div class="fv-plugins-message-container invalid-feedback d-block">
                                            <div data-field="work_tr_id_info">{{ $message }}</div>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="work_tr_en_info">Informasi [EN]</label>
                                    <div class="input-group input-group-merge">
                                        <textarea wire:ignore.self class="form-control @error('work_tr_en_info') is-invalid @enderror" wire:model="work_tr_en_info" placeholder="Informasi [EN]"></textarea>
                                        <span wire:click="translate('en', '{{ $work_tr_en_info }}', 'work_tr_id_info')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                    </div>
                                    @error('work_tr_en_info')
                                        <div class="fv-plugins-message-container invalid-feedback d-block">
                                            <div data-field="work_tr_en_info">{{ $message }}</div>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
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
