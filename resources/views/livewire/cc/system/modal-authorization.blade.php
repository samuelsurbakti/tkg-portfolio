<div wire:ignore.self class="modal fade" id="modal_authorization" tabindex="-1" aria-labelledby="bs-example-modal-lg" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                    <h4 class="address-title mb-2">Edit Hak Akses</h4>
                    <p class="address-subtitle">Di sini, Anda dapat mengelola Hak akses {{ ($role ? $role->name : '') }}</p>
                </div>
                <form wire:submit.prevent="submit" method="POST">
                    @csrf
                    @if ($role)
                        @foreach ($menus as $menu)
                            <div class="d-flex mb-3">
                                <div class="flex-grow-1 row">
                                    <hr class="my-2 text-primary">
                                    <div class="col-9 mb-sm-0 mb-2">
                                        <h6 class="mb-0">{{ $menu->title }}</h6>
                                    </div>
                                    <div class="col-3 text-end">
                                        <label class="switch switch-square me-0">
                                            <div class="form-check form-switch">
                                                <input id="menu_{{ $menu->id }}" wire:change="menu_switch('{{ $menu->id }}')" type="checkbox" class="form-check-input cursor-pointer" {{ (in_array($menu->id, $role->get_menu->pluck('menu_id')->toArray()) ? 'checked' : '') }}>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div id="permission_menu_{{ $menu->id }}" {{ (in_array($menu->id, $role->get_menu->pluck('menu_id')->toArray()) ? '' : 'hidden') }}>
                                @foreach ($menu->permissions as $permission)
                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0 px-2">
                                        </div>
                                        <div class="flex-grow-1 row">
                                            <hr class="my-2 text-primary">
                                            <div class="col-9 mb-sm-0 mb-2">
                                                <h6 class="mb-0">{{ Str::afterLast($permission->name, ' - ') }}</h6>
                                            </div>
                                            <div class="col-3 text-end">
                                                <label class="switch switch-square me-0">
                                                    <div class="form-check form-switch">
                                                        <input id="permission_{{ Str::replace(' ', '', $permission->name) }}" wire:change="permission_switch('{{ $permission->name }}')" type="checkbox" class="form-check-input cursor-pointer" {{ ($role->hasPermissionTo($permission->name) ? 'checked' : '') }}>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
