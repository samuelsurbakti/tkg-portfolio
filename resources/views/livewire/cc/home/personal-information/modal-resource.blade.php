<div wire:ignore.self class="modal fade" id="pi_modal_resource" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-simple">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                    <h4 class="address-title mb-2">{{ (is_null($pi_id) ? 'Tambah' : 'Edit') }} Informasi Pribadi</h4>
                    <p class="address-subtitle">Di sini, Anda dapat {{ (is_null($pi_id) ? 'menambah' : 'mengubah') }} informasi pribadi.</p>
                </div>
                <form wire:submit.prevent="submit" method="POST">
                    @csrf
                    <div class="col-sm-12 mb-4">
                        <div class="d-flex gap-4">
                            @if ($pi_photo)
                                <img src="{{ $pi_photo->temporaryUrl() }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            @elseif ($pi_id)
                                <img src="{{ asset('src/img/pi/'.$pi_photo_recent) }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            @else
                                <img src="{{ asset('src/img/client/nothing.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            @endif

                            <div class="button-wrapper d-flex flex-column justify-content-center">
                                <div wire:loading wire:target="pi_photo">Memeriksa File</div>
                                <div wire:loading.remove wire:target="pi_photo">
                                    <label for="upload" class="btn btn-sm btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">{{ (is_null($pi_id) ? 'Upload foto' : 'Upload foto baru') }}</span>
                                        <i class="bx bx-arrow-in-up-square-half d-block d-sm-none"></i>
                                        <input type="file" id="upload" wire:model="pi_photo" class="account-file-input" name="photo" hidden accept="image/png, image/jpeg" />
                                    </label>
                                </div>

                                <p class="text-muted mb-0">File yang diterima JPG atau PNG dengan rasio 1:1.</p>
                                @error('pi_photo')
                                    <div class="fv-plugins-message-container invalid-feedback" style="display: block">
                                        <div data-field="pi_photo">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-label" for="pi_name">Nama</label>
                                <input type="text" id="pi_name" class="form-control @error('pi_name') is-invalid @enderror" wire:model="pi_name" placeholder="Nama" />
                                @error('pi_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label" for="pi_email">Email</label>
                                <input type="text" id="pi_email" class="form-control @error('pi_email') is-invalid @enderror" wire:model="pi_email" placeholder="Email" />
                                @error('pi_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-label" for="pi_phone">No. Telepon</label>
                                <input type="text" id="pi_phone" class="form-control @error('pi_phone') is-invalid @enderror" wire:model="pi_phone" placeholder="No. Telepon" />
                                @error('pi_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label" for="pi_whatsapp">No. WhatsApp</label>
                                <input type="text" id="pi_whatsapp" class="form-control @error('pi_whatsapp') is-invalid @enderror" wire:model="pi_whatsapp" placeholder="No. WhatsApp" />
                                @error('pi_whatsapp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-label" for="pi_dob">Tgl. Lahir</label>
                                <input type="text" id="pi_dob" class="form-control @error('pi_dob') is-invalid @enderror" wire:model="pi_dob" placeholder="Tgl. Lahir" />
                                @error('pi_dob')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label" for="pi_origin">Asal</label>
                                <input type="text" id="pi_origin" class="form-control @error('pi_origin') is-invalid @enderror" wire:model="pi_origin" placeholder="Asal" />
                                @error('pi_origin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-label" for="pi_tr_id_story">Cerita [ID]</label>
                                <div class="input-group input-group-merge">
                                    <textarea wire:ignore.self class="form-control @error('pi_tr_id_story') is-invalid @enderror" wire:model="pi_tr_id_story" placeholder="Cerita [ID]"></textarea>
                                    <span wire:click="translate('id', '{{ $pi_tr_id_story }}', 'pi_tr_en_story')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                </div>
                                @error('pi_tr_id_story')
                                    <div class="fv-plugins-message-container invalid-feedback d-block">
                                        <div data-field="pi_tr_id_story">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label" for="pi_tr_en_story">Cerita [EN]</label>
                                <div class="input-group input-group-merge">
                                    <textarea wire:ignore.self class="form-control @error('pi_tr_en_story') is-invalid @enderror" wire:model="pi_tr_en_story" placeholder="Cerita [EN]"></textarea>
                                    <span wire:click="translate('en', '{{ $pi_tr_en_story }}', 'pi_tr_id_story')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                </div>
                                @error('pi_tr_en_story')
                                    <div class="fv-plugins-message-container invalid-feedback d-block">
                                        <div data-field="pi_tr_en_story">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-label" for="pi_tr_id_address">Alamat [ID]</label>
                                <div class="input-group input-group-merge">
                                    <textarea wire:ignore.self class="form-control @error('pi_tr_id_address') is-invalid @enderror" wire:model="pi_tr_id_address" placeholder="Alamat [ID]"></textarea>
                                    <span wire:click="translate('id', '{{ $pi_tr_id_address }}', 'pi_tr_en_address')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                </div>
                                @error('pi_tr_id_address')
                                    <div class="fv-plugins-message-container invalid-feedback d-block">
                                        <div data-field="pi_tr_id_address">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label" for="pi_tr_en_address">Alamat [EN]</label>
                                <div class="input-group input-group-merge">
                                    <textarea wire:ignore.self class="form-control @error('pi_tr_en_address') is-invalid @enderror" wire:model="pi_tr_en_address" placeholder="Alamat [EN]"></textarea>
                                    <span wire:click="translate('en', '{{ $pi_tr_en_address }}', 'pi_tr_id_address')" class="input-group-text cursor-pointer z-1"><i class="bx bx-analyze" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Terjemahkan"></i></span>
                                </div>
                                @error('pi_tr_en_address')
                                    <div class="fv-plugins-message-container invalid-feedback d-block">
                                        <div data-field="pi_tr_en_address">{{ $message }}</div>
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
