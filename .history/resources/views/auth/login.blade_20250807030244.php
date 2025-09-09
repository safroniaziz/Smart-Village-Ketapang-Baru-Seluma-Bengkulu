@extends('layouts.app')

@section('title', 'Login - Smart Village Ketapang Baru')

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-lg-5">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h4 class="mb-0"><i class="fas fa-sign-in-alt me-2"></i>Login</h4>
                                                            <p class="mb-0">Smart Village Ketapang Baru</p>
                    </div>
                    <div class="card-body p-5">
                        <form id="loginForm">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email atau Username</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
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

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">
                                        Ingat saya
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-sign-in-alt me-2"></i>Login
                                </button>
                            </div>
                        </form>

                        <hr class="my-4">

                        <div class="text-center">
                            <a href="#" class="text-decoration-none">
                                <i class="fas fa-key me-2"></i>Lupa password?
                            </a>
                        </div>

                        <div class="text-center mt-3">
                            <p class="text-muted mb-0">Belum punya akun?</p>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary">
                                <i class="fas fa-user-plus me-2"></i>Daftar
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
    $('#togglePassword').click(function() {
        const passwordField = $('#password');
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
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();

        // Show loading
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();
        submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Login...');
        submitBtn.prop('disabled', true);

        // Simulate login process
        setTimeout(function() {
            showAlert('Login berhasil! Mengalihkan ke dashboard...', 'success');

            // Reset button
            submitBtn.html(originalText);
            submitBtn.prop('disabled', false);

            // Redirect to dashboard (simulate)
            setTimeout(function() {
                window.location.href = '/dashboard';
            }, 1500);
        }, 2000);
    });

    // Form validation
    $('#loginForm input').on('blur', function() {
        if ($(this).prop('required') && !$(this).val()) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });
});
</script>
@endpush
