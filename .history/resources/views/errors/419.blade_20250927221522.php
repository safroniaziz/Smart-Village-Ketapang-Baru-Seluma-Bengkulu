@extends('errors::layout')

@section('title', 'Form Kedaluwarsa')
@section('code', '419')

@section('icon')
    <i class="fas fa-shield-alt text-warning"></i>
@endsection

@section('title')
    Form Kedaluwarsa
@endsection

@section('message')
    Token keamanan form telah kedaluwarsa karena tidak ada aktivitas dalam waktu lama. Hal ini untuk melindungi keamanan data Anda. Silakan muat ulang halaman dan coba lagi.
@endsection

@section('actions')
    <button onclick="refreshPage()" class="btn btn-primary-custom">
        <i class="fas fa-sync-alt"></i>
        Muat Ulang Halaman
    </button>
    
    <button onclick="goBack()" class="btn btn-secondary-custom">
        <i class="fas fa-arrow-left"></i>
        Kembali ke Halaman Sebelumnya
    </button>
    
    <a href="{{ route('home') }}" class="btn btn-success-custom">
        <i class="fas fa-home"></i>
        Halaman Utama
    </a>
@endsection

@section('scripts')
    // Auto refresh after 5 seconds if no action taken
    let autoRefreshTimer = setTimeout(function() {
        window.location.reload();
    }, 5000);

    // Clear timer if user takes any action
    document.addEventListener('click', function() {
        clearTimeout(autoRefreshTimer);
    });

    // Show countdown
    let countdown = 5;
    let countdownElement = document.createElement('div');
    countdownElement.innerHTML = '<small class="text-muted">Halaman akan dimuat ulang otomatis dalam <span id="countdown">5</span> detik</small>';
    countdownElement.style.marginTop = '1rem';
    document.querySelector('.btn-group-custom').appendChild(countdownElement);

    let countdownInterval = setInterval(function() {
        countdown--;
        document.getElementById('countdown').textContent = countdown;
        if (countdown <= 0) {
            clearInterval(countdownInterval);
        }
    }, 1000);

    // Clear countdown on click
    document.addEventListener('click', function() {
        clearInterval(countdownInterval);
        countdownElement.style.display = 'none';
    });
@endsection