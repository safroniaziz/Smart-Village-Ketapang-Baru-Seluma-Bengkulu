@extends('errors.layout')

@section('title', 'Kesalahan Server')
@section('code', '500')

@section('icon')
    <i class="fas fa-exclamation-triangle text-danger"></i>
@endsection

@section('title')
    Kesalahan Server Internal
@endsection

@section('message')
    Maaf, terjadi kesalahan pada server kami. Tim teknis telah diberitahu dan sedang menangani masalah ini. Silakan coba lagi dalam beberapa saat.
@endsection

@section('actions')
    <button onclick="refreshPage()" class="btn btn-primary-custom">
        <i class="fas fa-sync-alt"></i>
        Coba Lagi
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
    // No auto actions for 500
@endsection
