<div wire:ignore.self class="modal fade" id="skill_modal_resource" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-simple">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                    <h4 class="address-title mb-2">{{ (is_null($skill_id) ? 'Tambah' : 'Edit') }} Keahlian</h4>
                    <p class="address-subtitle">Di sini, Anda dapat {{ (is_null($skill_id) ? 'menambah' : 'mengubah') }} informasi keahlian.</p>
                </div>
                <form wire:submit.prevent="submit" method="POST">
                    @csrf
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="skill_tr_id_name">Nama [ID]</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control @error('skill_tr_id_name') is-invalid @enderror" wire:model="skill_tr_id_name" placeholder="Nama [ID]">
                                        <span wire:click="translate('id', '{{ $skill_tr_id_name }}', 'skill_tr_en_name')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                    </div>
                                    @error('skill_tr_id_name')
                                        <div class="fv-plugins-message-container invalid-feedback d-block">
                                            <div data-field="skill_tr_id_name">{{ $message }}</div>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="skill_tr_en_name">Nama [EN]</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control @error('skill_tr_en_name') is-invalid @enderror" wire:model="skill_tr_en_name" placeholder="Nama [EN]">
                                        <span wire:click="translate('en', '{{ $skill_tr_en_name }}', 'skill_tr_id_name')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                    </div>
                                    @error('skill_tr_en_name')
                                        <div class="fv-plugins-message-container invalid-feedback d-block">
                                            <div data-field="skill_tr_en_name">{{ $message }}</div>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-4">
                        <label class="form-label" for="skill_percentage">Persentase</label>
                        <input type="text" id="skill_percentage" class="form-control @error('skill_percentage') is-invalid @enderror" wire:model="skill_percentage" placeholder="Persentase" />
                        @error('skill_percentage')
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
