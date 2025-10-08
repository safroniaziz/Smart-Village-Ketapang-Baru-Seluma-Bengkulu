@extends('errors.layout')

@section('title', 'Akses Ditolak')
@section('code', '403')

@section('icon')
    <i class="fas fa-lock text-danger"></i>
@endsection

@section('title')
    Akses Ditolak
@endsection

@section('message')
    Maaf, Anda tidak memiliki izin untuk mengakses halaman ini. Silakan hubungi administrator jika Anda merasa ini adalah kesalahan.
@endsection

@section('actions')
    <button onclick="goBack()" class="btn btn-primary-custom">
        <i class="fas fa-arrow-left"></i>
        Kembali ke Halaman Sebelumnya
    </button>

    <a href="{{ route('home') }}" class="btn btn-secondary-custom">
        <i class="fas fa-home"></i>
        Halaman Utama
    </a>

    @auth
    <button onclick="goDashboard()" class="btn btn-success-custom">
        <i class="fas fa-tachometer-alt"></i>
        Dashboard
    </button>
    @else
    <a href="{{ route('login') }}" class="btn btn-success-custom">
        <i class="fas fa-sign-in-alt"></i>
        Login
    </a>
    @endauth
@endsection

@section('scripts')
    // No auto actions for 403
@endsection
