@extends('layouts.auth.app')

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card px-sm-6 px-0">
                    <div class="card-body">
                        <div class="app-brand justify-content-center">
                            <a disabled class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-heading fw-bold">Control Center</span>
                            </a>
                        </div>

                        <h4 class="mb-1">Halo Kawal Gurusinga 👋</h4>
                        <p class="mb-6">Silahkan login untuk mengatur portofolio Anda</p>

                        <form id="formAuthentication" class="mb-6" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-6 form-control-validation">
                                <label for="email" class="form-label">Username atau Email</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Masukkan username atau email Anda" value="{{ old('username') }}" autofocus />
                                @error('username')
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                        <div data-field="username">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-6 form-password-toggle form-control-validation">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer z-1"><i class="icon-base bx bx-eye-closed"></i></span>
                                </div>
                                @error('password')
                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                        <div data-field="password">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-7">
                                <div class="d-flex justify-content-between">
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                        <label class="form-check-label" for="remember"> Ingat Saya </label>
                                    </div>
                                    <a href="{{ route('password.request') }}">
                                        <span>Lupa Password?</span>
                                    </a>
                                </div>
                            </div>
                            <div class="mb-6">
                                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_styles')
    <link rel="stylesheet" href="{{ asset('themes/cc/vendor/libs/@form-validation/form-validation.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/cc/vendor/css/pages/page-auth.css') }}" />
@endpush
