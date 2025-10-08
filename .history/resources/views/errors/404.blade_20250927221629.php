@extends('errors.layout')

@section('title', 'Halaman Tidak Ditemukan')
@section('code', '404')

@section('icon')
    <i class="fas fa-search text-warning"></i>
@endsection

@section('title')
    Halaman Tidak Ditemukan
@endsection

@section('message')
    Maaf, halaman yang Anda cari tidak dapat ditemukan. Mungkin halaman telah dipindahkan, dihapus, atau URL yang Anda masukkan salah.
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
    <a href="{{ route('dashboard') }}" class="btn btn-success-custom">
        <i class="fas fa-tachometer-alt"></i>
        Dashboard
    </a>
    @endauth
@endsection

@section('scripts')
    // No auto actions for 404
@endsection