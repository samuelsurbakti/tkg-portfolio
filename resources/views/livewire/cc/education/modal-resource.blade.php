<div wire:ignore.self class="modal fade" id="modal_resource" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-simple">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                    <h4 class="address-title mb-2">{{ (is_null($education_id) ? 'Tambah' : 'Edit') }} Pendidikan</h4>
                    <p class="address-subtitle">Di sini, Anda dapat {{ (is_null($education_id) ? 'menambah data' : 'mengubah informasi') }} pendidikan.</p>
                </div>
                <form wire:submit.prevent="submit" method="POST">
                    @csrf
                    <div class="col-sm-12 mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-label" for="education_initial">Tahun Mulai</label>
                                <input type="text" id="education_initial" class="form-control @error('education_initial') is-invalid @enderror" wire:model="education_initial" placeholder="Tahun Mulai" />
                                @error('education_initial')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label" for="education_end">Tahun Selesai</label>
                                <input type="text" id="education_end" class="form-control @error('education_end') is-invalid @enderror" wire:model="education_end" placeholder="Tahun Selesai" />
                                @error('education_end')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="education_tr_id_institution">Institusi [ID]</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control @error('education_tr_id_institution') is-invalid @enderror" wire:model="education_tr_id_institution" placeholder="Institusi [ID]">
                                        <span wire:click="translate('id', '{{ $education_tr_id_institution }}', 'education_tr_en_institution')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                    </div>
                                    @error('education_tr_id_institution')
                                        <div class="fv-plugins-message-container invalid-feedback d-block">
                                            <div data-field="education_tr_id_institution">{{ $message }}</div>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="education_tr_en_institution">Institusi [EN]</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control @error('education_tr_en_institution') is-invalid @enderror" wire:model="education_tr_en_institution" placeholder="Institusi [EN]">
                                        <span wire:click="translate('en', '{{ $education_tr_en_institution }}', 'education_tr_id_institution')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                    </div>
                                    @error('education_tr_en_institution')
                                        <div class="fv-plugins-message-container invalid-feedback d-block">
                                            <div data-field="education_tr_en_institution">{{ $message }}</div>
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
                                    <label class="form-label" for="education_tr_id_department">Jurusan [ID]</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control @error('education_tr_id_department') is-invalid @enderror" wire:model="education_tr_id_department" placeholder="Jurusan [ID]">
                                        <span wire:click="translate('id', '{{ $education_tr_id_department }}', 'education_tr_en_department')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                    </div>
                                    @error('education_tr_id_department')
                                        <div class="fv-plugins-message-container invalid-feedback d-block">
                                            <div data-field="education_tr_id_department">{{ $message }}</div>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="education_tr_en_department">Jurusan [EN]</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control @error('education_tr_en_department') is-invalid @enderror" wire:model="education_tr_en_department" placeholder="Jurusan [EN]">
                                        <span wire:click="translate('en', '{{ $education_tr_en_department }}', 'education_tr_id_department')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                    </div>
                                    @error('education_tr_en_department')
                                        <div class="fv-plugins-message-container invalid-feedback d-block">
                                            <div data-field="education_tr_en_department">{{ $message }}</div>
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
                                    <label class="form-label" for="education_tr_id_description">Keterangan [ID]</label>
                                    <div class="input-group input-group-merge">
                                        <textarea wire:ignore.self class="form-control @error('education_tr_id_description') is-invalid @enderror" wire:model="education_tr_id_description" placeholder="Keterangan [ID]"></textarea>
                                        <span wire:click="translate('id', '{{ $education_tr_id_description }}', 'education_tr_en_description')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                    </div>
                                    @error('education_tr_id_description')
                                        <div class="fv-plugins-message-container invalid-feedback d-block">
                                            <div data-field="education_tr_id_description">{{ $message }}</div>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="education_tr_en_description">Keterangan [EN]</label>
                                    <div class="input-group input-group-merge">
                                        <textarea wire:ignore.self class="form-control @error('education_tr_en_description') is-invalid @enderror" wire:model="education_tr_en_description" placeholder="Keterangan [EN]"></textarea>
                                        <span wire:click="translate('en', '{{ $education_tr_en_description }}', 'education_tr_id_description')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                    </div>
                                    @error('education_tr_en_description')
                                        <div class="fv-plugins-message-container invalid-feedback d-block">
                                            <div data-field="education_tr_en_description">{{ $message }}</div>
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
