@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<div class="section-authentication-cover min-vh-100 d-flex align-items-center justify-content-center">
    <div class="container" style="max-width: 1000px;">
        <div class="row g-0 shadow rounded-4 overflow-hidden">
            <!-- Left Side -->
            <div class="col-lg-7 d-none d-lg-flex bg-light align-items-center justify-content-center">
                <img src="{{ URL::asset('assets/images/gerobak.png') }}" class="img-fluid p-5" alt="Gerobak Listrik" style="max-width: 550px;">
            </div>
            
            <!-- Right Side -->
            <div class="col-lg-5 bg-white d-flex align-items-center justify-content-center p-4">
                <div class="w-100" style="max-width: 360px;">
                    <div class="text-center mb-4">
                        <h4 class="fw-bold">Gerobak Listrik Angkringan</h4>
                        <p class="text-muted mb-0">Selamat datang di Website Admin</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan alamat email" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi <span class="text-danger">*</span></label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan kata sandi" required>
                                <span class="input-group-text bg-transparent cursor-pointer">
                                    <i class="bi bi-eye-slash-fill"></i>
                                </span>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Ingatkan Saya</label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('#show_hide_password .input-group-text').on('click', function() {
            let input = $('#show_hide_password input');
            let icon = $('#show_hide_password i');
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                icon.removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
            } else {
                input.attr('type', 'password');
                icon.removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
            }
        });
    });
</script>
@endpush
