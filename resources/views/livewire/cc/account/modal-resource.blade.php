<div wire:ignore.self class="modal fade" id="modal_resource" tabindex="-1" aria-labelledby="bs-example-modal-lg" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                    <h4 class="address-title mb-2">{{ (is_null($user_id) ? 'Tambah' : 'Ubah') }} Akun</h4>
                    <p class="address-subtitle">Di sini, Anda dapat {{ (is_null($user_id) ? 'menambah data' : 'mengubah informasi') }} akun.</p>
                </div>
                <form wire:submit.prevent="submit" method="POST">
                    @csrf
                    <div class="col-12 mb-4">
                        <label class="form-label" for="user_role">Hak Akses</label>
                        <div class="@error('user_role') is-invalid @enderror">
                            <select wire:model="user_role" id="user_role" class="form-select select2" style="width: 100%;" data-placeholder="Hak Akses">
                                <option></option>
                                @forelse($roles as $role)
                                    <option value="{{ $role['name'] }}">{{ $role['name'] }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        @error('user_role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-4">
                        <label for="user_name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('user_name') is-invalid @enderror" wire:model="user_name" placeholder="Nama" />
                        @error('user_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('user_email') is-invalid @enderror" wire:model="user_email" placeholder="Email" />
                        @error('user_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('user_username') is-invalid @enderror" wire:model="user_username" placeholder="Username" />
                        @error('user_username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-4 form-password-toggle">
                        <label for="user_password" class="form-label">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="user_password" class="form-control @error('user_password') is-invalid @enderror" wire:model="user_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                            <span class="input-group-text cursor-pointer z-1"><i class="bx bx-eye-closed"></i></span>
                        </div>
                        @if ($user_id)
                            <small id="user_password_text_help" class="form-text text-muted">Biarkan ini kosong jika tidak ingin diubah.</small>
                        @endif
                        @error('user_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-4 form-password-toggle">
                        <label for="user_re_password" class="form-label">Konfirmasi Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="user_re_password" class="form-control @error('user_re_password') is-invalid @enderror" wire:model="user_re_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                            <span class="input-group-text cursor-pointer z-1"><i class="bx bx-eye-closed"></i></span>
                        </div>
                        @if ($user_id)
                            <small id="user_re_password_text_help" class="form-text text-muted">Biarkan ini kosong jika tidak ingin diubah.</small>
                        @endif
                        @error('user_re_password')
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
