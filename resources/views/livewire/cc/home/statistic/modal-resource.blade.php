<div wire:ignore.self class="modal fade" id="statistic_modal_resource" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-simple">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                    <h4 class="address-title mb-2">{{ (is_null($statistic_id) ? 'Tambah' : 'Edit') }} Statistik</h4>
                    <p class="address-subtitle">Di sini, Anda dapat {{ (is_null($statistic_id) ? 'menambah' : 'mengubah') }} informasi statistic.</p>
                </div>
                <form wire:submit.prevent="submit" method="POST">
                    @csrf
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="statistic_tr_id_label">Label [ID]</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control @error('statistic_tr_id_label') is-invalid @enderror" wire:model="statistic_tr_id_label" placeholder="Label [ID]">
                                        <span wire:click="translate('id', '{{ $statistic_tr_id_label }}', 'statistic_tr_en_label')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                    </div>
                                    @error('statistic_tr_id_label')
                                        <div class="fv-plugins-message-container invalid-feedback d-block">
                                            <div data-field="statistic_tr_id_label">{{ $message }}</div>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="statistic_tr_en_label">Label [EN]</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control @error('statistic_tr_en_label') is-invalid @enderror" wire:model="statistic_tr_en_label" placeholder="Label [EN]">
                                        <span wire:click="translate('en', '{{ $statistic_tr_en_label }}', 'statistic_tr_id_label')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                    </div>
                                    @error('statistic_tr_en_label')
                                        <div class="fv-plugins-message-container invalid-feedback d-block">
                                            <div data-field="statistic_tr_en_label">{{ $message }}</div>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-4">
                        <label class="form-label" for="statistic_amount">Jumlah</label>
                        <input type="text" id="statistic_amount" class="form-control @error('statistic_amount') is-invalid @enderror" wire:model="statistic_amount" placeholder="Jumlah" />
                        @error('statistic_amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-12 mb-4">
                        <label class="form-label" for="statistic_amount">Tanda Plus</label>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input cursor-pointer" wire:model="statistic_with_plus"> {{ ($statistic_with_plus ? 'Ya' : 'Tidak') }}
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
