@extends('layouts.app')

@section('title', 'Register - Smart Village Ketapang Baru')

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-success text-white text-center py-4">
                        <h4 class="mb-0"><i class="fas fa-user-plus me-2"></i>Daftar Akun</h4>
                        <p class="mb-0">Smart Village Ketapang Baru</p>
                    </div>
                    <div class="card-body p-5">
                        <form id="registerForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap *</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nik" class="form-label">NIK *</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-id-card"></i>
                                        </span>
                                        <input type="text" class="form-control" id="nik" name="nik" required maxlength="16">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="telepon" class="form-label">Telepon *</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                        <input type="tel" class="form-control" id="telepon" name="telepon" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Lengkap *</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Password *</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password *</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                        <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="agree" name="agree" required>
                                    <label class="form-check-label" for="agree">
                                        Saya setuju dengan <a href="#" class="text-decoration-none">Syarat & Ketentuan</a> dan <a href="#" class="text-decoration-none">Kebijakan Privasi</a>
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="fas fa-user-plus me-2"></i>Daftar
                                </button>
                            </div>
                        </form>

                        <hr class="my-4">

                        <div class="text-center">
                            <p class="text-muted mb-0">Sudah punya akun?</p>
                            <a href="{{ route('login') }}" class="btn btn-outline-primary">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Toggle password visibility
    $('#togglePassword, #togglePasswordConfirm').click(function() {
        const passwordField = $(this).siblings('input');
        const icon = $(this).find('i');

        if (passwordField.attr('type') === 'password') {
            passwordField.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            passwordField.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });

    // Form submission
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();

        // Validate password confirmation
        const password = $('#password').val();
        const passwordConfirm = $('#password_confirmation').val();

        if (password !== passwordConfirm) {
            showAlert('Konfirmasi password tidak cocok!', 'error');
            return;
        }

        // Show loading
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();
        submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Mendaftar...');
        submitBtn.prop('disabled', true);

        // Simulate registration process
        setTimeout(function() {
            showAlert('Pendaftaran berhasil! Silakan login dengan akun Anda.', 'success');

            // Reset button
            submitBtn.html(originalText);
            submitBtn.prop('disabled', false);

            // Redirect to login (simulate)
            setTimeout(function() {
                window.location.href = '{{ route("login") }}';
            }, 2000);
        }, 3000);
    });

    // Form validation
    $('#registerForm input, #registerForm textarea').on('blur', function() {
        if ($(this).prop('required') && !$(this).val()) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });

    // Email validation
    $('#email').on('blur', function() {
        const email = $(this).val();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email && !emailRegex.test(email)) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });

    // NIK validation (16 digits)
    $('#nik').on('input', function() {
        const nik = $(this).val();
        if (nik.length > 16) {
            $(this).val(nik.substring(0, 16));
        }
    });
});
</script>
@endpush
