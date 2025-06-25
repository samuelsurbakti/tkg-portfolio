<div wire:ignore.self class="modal fade" id="photo_modal_resource" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                    <h4 class="address-title mb-2">Tambah Foto Pekerjaan</h4>
                    <p class="address-subtitle">Di sini, Anda dapat menambah data foto pekerjaan.</p>
                </div>
                <form wire:submit.prevent="submit" method="POST">
                    @csrf
                    <div class="col-sm-12 mb-4">
                        <div class="d-flex gap-4">
                            @if ($wp_photo)
                                <img src="{{ $wp_photo->temporaryUrl() }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedPhoto" />
                            @else
                                <img src="{{ asset('src/img/client/nothing.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedPhoto" />
                            @endif

                            <div class="button-wrapper d-flex flex-column justify-content-center">
                                <div wire:loading wire:target="wp_photo">Memeriksa File</div>
                                <div wire:loading.remove wire:target="wp_photo">
                                    <label for="upload" class="btn btn-sm btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload foto</span>
                                        <i class="bx bx-arrow-in-up-square-half d-block d-sm-none"></i>
                                        <input type="file" id="upload" wire:model="wp_photo" class="account-file-input" name="photo" hidden accept="image/png, image/jpeg" />
                                    </label>
                                </div>

                                @error('wp_photo')
                                    <div class="fv-plugins-message-container invalid-feedback" style="display: block">
                                        <div data-field="wp_photo">{{ $message }}</div>
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
