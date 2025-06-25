<div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
                <h6 class="fw-normal">Total {{ $role_users_count }} akun</h6>
                @if($role_users_count != 0)
                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                    @php
                        $no = 1;
                    @endphp
                    @foreach($users as $user)
                        @if($no <= 5)
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $user->name }}" class="avatar avatar-sm pull-up">
                                @if($user->avatar == 'avatar.png')
                                    <div class="avatar avatar-sm me-2">
                                        <span class="avatar-initial rounded-circle bg-label-primary">{{ Str::acronym($user->name) }}</span>
                                    </div>
                                @else
                                    <img class="rounded-circle" src="{{ asset('src/img/user/'.$user->avatar) }}" alt="{{ $user->name }} Avatar">
                                @endif
                            </li>
                        @endif
                        @php
                            $no++;
                        @endphp
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="grid justify-content-between align-items-end">
                <div class="role-heading">
                    <h4 class="mb-1">{{ $role->name }}</h4>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn bg-primary-subtle text-primary btn_authorization" title="{{ $role->name }}" href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal_authorization" value="{{ $role->uuid }}">Kelola Izin</button>
                    <button class="btn bg-success-subtle text-success btn_role_edit" title="{{ $role->name }}" href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal_role_resource" value="{{ $role->uuid }}">Edit Hak Akses</button>
                </div>
            </div>
        </div>
    </div>
</div>
