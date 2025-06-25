<div wire:ignore.self class="modal fade" id="modal_resource" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-simple">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                    <h4 class="address-title mb-2">{{ (is_null($client_id) ? 'Tambah' : 'Edit') }} Klien</h4>
                    <p class="address-subtitle">Di sini, Anda dapat {{ (is_null($client_id) ? 'menambah data' : 'mengubah informasi') }} klien.</p>
                </div>
                <form wire:submit.prevent="submit" method="POST">
                    @csrf
                    <div class="col-sm-12 mb-4">
                        <label class="form-label" for="client_name">Nama</label>
                        <input type="text" id="client_name" class="form-control @error('client_name') is-invalid @enderror" wire:model="client_name" placeholder="Nama" />
                        @error('client_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-12 mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="d-flex gap-4">
                                    @if ($client_photo)
                                        <img src="{{ $client_photo->temporaryUrl() }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                    @elseif ($client_id)
                                        <img src="{{ asset('src/img/client/'.$client_photo_recent) }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                    @else
                                        <img src="{{ asset('src/img/client/nothing.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                    @endif

                                    <div class="button-wrapper d-flex flex-column justify-content-center">
                                        <div wire:loading wire:target="client_photo">Memeriksa File</div>
                                        <div wire:loading.remove wire:target="client_photo">
                                            <label for="upload" class="btn btn-sm btn-primary me-2 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block">{{ (is_null($client_id) ? 'Upload foto' : 'Upload foto baru') }}</span>
                                                <i class="bx bx-arrow-in-up-square-half d-block d-sm-none"></i>
                                                <input type="file" id="upload" wire:model="client_photo" class="account-file-input" name="photo" hidden accept="image/png, image/jpeg" />
                                            </label>
                                        </div>

                                        <p class="text-muted mb-0">File yang diterima JPG atau PNG dengan rasio 1:1.</p>
                                        @error('client_photo')
                                            <div class="fv-plugins-message-container invalid-feedback" style="display: block">
                                                <div data-field="client_photo">{{ $message }}</div>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label" for="client_star">Rating</label>
                                <div class="col-md d-flex flex-column align-items-start">
                                    <div class="onChange-event-ratings raty mb-4" data-score="{{ $client_star }}" data-number="5" data-half="true"></div>
                                    <div class=" counter-wrapper">
                                        <span class="fw-medium">Rating:</span>
                                        <span class="counter">{{ $client_star }}</span>
                                    </div>
                                </div>
                                @error('client_star')
                                    <div class="fv-plugins-message-container invalid-feedback" style="display: block">
                                        <div data-field="client_star">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-label" for="client_tr_id_description">Keterangan [ID]</label>
                                <div class="input-group input-group-merge">
                                    <textarea wire:ignore.self class="form-control @error('client_tr_id_description') is-invalid @enderror" wire:model="client_tr_id_description" placeholder="Keterangan [ID]"></textarea>
                                    <span wire:click="translate('id', '{{ $client_tr_id_description }}', 'client_tr_en_description')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                </div>
                                @error('client_tr_id_description')
                                    <div class="fv-plugins-message-container invalid-feedback d-block">
                                        <div data-field="client_tr_id_description">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label" for="client_tr_en_description">Keterangan [EN]</label>
                                <div class="input-group input-group-merge">
                                    <textarea wire:ignore.self class="form-control @error('client_tr_en_description') is-invalid @enderror" wire:model="client_tr_en_description" placeholder="Keterangan [EN]"></textarea>
                                    <span wire:click="translate('en', '{{ $client_tr_en_description }}', 'client_tr_id_description')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                </div>
                                @error('client_tr_en_description')
                                    <div class="fv-plugins-message-container invalid-feedback d-block">
                                        <div data-field="client_tr_en_description">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-label" for="client_tr_id_testimonial">Testimoni [ID]</label>
                                <div class="input-group input-group-merge">
                                    <textarea wire:ignore.self class="form-control @error('client_tr_id_testimonial') is-invalid @enderror" wire:model="client_tr_id_testimonial" placeholder="Testimoni [ID]"></textarea>
                                    <span wire:click="translate('id', '{{ $client_tr_id_testimonial }}', 'client_tr_en_testimonial')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                </div>
                                @error('client_tr_id_testimonial')
                                    <div class="fv-plugins-message-container invalid-feedback d-block">
                                        <div data-field="client_tr_id_testimonial">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label" for="client_tr_en_testimonial">Testimoni [EN]</label>
                                <div class="input-group input-group-merge">
                                    <textarea wire:ignore.self class="form-control @error('client_tr_en_testimonial') is-invalid @enderror" wire:model="client_tr_en_testimonial" placeholder="Testimoni [EN]"></textarea>
                                    <span wire:click="translate('en', '{{ $client_tr_en_testimonial }}', 'client_tr_id_testimonial')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                </div>
                                @error('client_tr_en_testimonial')
                                    <div class="fv-plugins-message-container invalid-feedback d-block">
                                        <div data-field="client_tr_en_testimonial">{{ $message }}</div>
                                    </div>
                                @enderror
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
