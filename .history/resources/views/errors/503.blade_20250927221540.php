@extends('errors::layout')

@section('title', 'Layanan Tidak Tersedia')
@section('code', '503')

@section('icon')
    <i class="fas fa-tools text-info"></i>
@endsection

@section('title')
    Layanan Sedang Dalam Pemeliharaan
@endsection

@section('message')
    Kami sedang melakukan pemeliharaan sistem untuk meningkatkan kualitas layanan. Silakan coba lagi dalam beberapa saat. Terima kasih atas kesabaran Anda.
@endsection

@section('actions')
    <button onclick="refreshPage()" class="btn btn-primary-custom">
        <i class="fas fa-sync-alt"></i>
        Coba Lagi
    </button>
    
    <a href="{{ route('home') }}" class="btn btn-secondary-custom">
        <i class="fas fa-home"></i>
        Halaman Utama
    </a>
@endsection

@section('scripts')
    // Auto refresh every 30 seconds during maintenance
    setInterval(function() {
        window.location.reload();
    }, 30000);
@endsection