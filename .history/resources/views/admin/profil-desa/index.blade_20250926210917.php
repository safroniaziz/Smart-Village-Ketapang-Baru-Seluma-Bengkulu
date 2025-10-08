@extends('layouts.dashboard.dashboard')

@section('title', 'Profil Desa')

@section('menu')
    Profil Desa
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Profil Desa</li>
@endsection

@push('styles')
<style>
/* Statistics Cards Animation */
.card.hoverable {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid rgba(0,0,0,0.08);
    position: relative;
    overflow: hidden;
}

.card.hoverable::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.6s;
}

.card.hoverable:hover {
    transform: translateY(-12px) scale(1.02);
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
    border-color: var(--kt-primary);
}

.card.hoverable:hover::before {
    left: 100%;
}

.card.hoverable .symbol-label {
    position: relative;
    overflow: hidden;
}

.card.hoverable .symbol-label::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s;
}

.card.hoverable:hover .symbol-label::before {
    left: 100%;
}

/* Enhanced Symbols */
.symbol-50px {
    width: 50px;
    height: 50px;
    flex-shrink: 0;
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.symbol-50px:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 16px rgba(0,0,0,0.15);
}

/* Table enhancements */
.table tbody tr {
    transition: all 0.3s ease;
}

.table tbody tr:hover {
    background-color: rgba(54, 153, 255, 0.05);
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Badge enhancements */
.badge {
    border-radius: 0.5rem;
    padding: 0.5rem 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

/* Action buttons styling */
.btn-success {
    background: linear-gradient(135deg, #00D4AA 0%, #00A389 100%);
    border: none;
    box-shadow: 0 4px 15px rgba(0, 212, 170, 0.3);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.btn-success::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s;
}

.btn-success:hover {
    background: linear-gradient(135deg, #00A389 0%, #008A74 100%);
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 8px 25px rgba(0, 212, 170, 0.5);
}

.btn-success:hover::before {
    left: 100%;
}

.btn-warning {
    background: linear-gradient(135deg, #FFC700 0%, #FF9500 100%);
    border: none;
    color: white;
    box-shadow: 0 4px 15px rgba(255, 199, 0, 0.3);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.btn-warning::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s;
}

.btn-warning:hover {
    background: linear-gradient(135deg, #FF9500 0%, #FF7A00 100%);
    color: white;
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 8px 25px rgba(255, 199, 0, 0.5);
}

.btn-warning:hover::before {
    left: 100%;
}

/* Image styling */
.fasilitas-image {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 0.5rem;
    border: 2px solid #e1e5e9;
    transition: all 0.3s ease;
}

.fasilitas-image:hover {
    transform: scale(1.1);
    border-color: var(--kt-primary);
}

/* Map container */
.map-container {
    height: 300px;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

/* Info cards */
.info-card {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 1rem;
    padding: 1.5rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.info-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.info-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    background: rgba(255, 255, 255, 0.95);
}

.info-card:hover::before {
    opacity: 1;
}

/* Fade in animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.fade-in-up {
    animation: fadeInUp 0.6s ease-out;
}

.fade-in-up:nth-child(1) { animation-delay: 0.1s; }
.fade-in-up:nth-child(2) { animation-delay: 0.2s; }
.fade-in-up:nth-child(3) { animation-delay: 0.3s; }
.fade-in-up:nth-child(4) { animation-delay: 0.4s; }

/* Advanced animations */
@keyframes shimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
    }
    50% {
        transform: translateY(-20px) rotate(180deg);
    }
}

/* Enhanced card styling */
.card {
    border: none;
    border-radius: 1.5rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.card:hover::before {
    opacity: 1;
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
}

/* Enhanced table styling */
.table {
    border-radius: 1rem;
    overflow: hidden;
}

.table thead th {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: none;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 0.75rem;
    padding: 1rem;
}

.table tbody tr {
    transition: all 0.3s ease;
    border: none;
}

.table tbody tr:hover {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
    transform: scale(1.01);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.table tbody td {
    border: none;
    padding: 1rem;
    vertical-align: middle;
}

/* Enhanced button styling */
.btn {
    border-radius: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s;
}

.btn:hover::before {
    left: 100%;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

/* Enhanced badge styling */
.badge {
    border-radius: 0.75rem;
    padding: 0.5rem 1rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.badge:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

/* Enhanced Modal Styling */
.modal-content {
    border: none;
    border-radius: 1.5rem;
    overflow: hidden;
    box-shadow: 0 25px 50px rgba(0,0,0,0.2);
    backdrop-filter: blur(20px);
}

.modal-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    padding: 2rem;
    position: relative;
    overflow: hidden;
}

.modal-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');
    animation: float 20s ease-in-out infinite;
}

.modal-header .symbol {
    position: relative;
    z-index: 10;
}

.modal-header h2 {
    position: relative;
    z-index: 10;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.modal-header p {
    position: relative;
    z-index: 10;
}

.modal-body {
    background: #ffffff;
}

.modal-body .card {
    border: 1px solid #e1e5e9;
    border-radius: 1rem;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.modal-body .card:hover {
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.modal-body .card-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: none;
    border-radius: 1rem 1rem 0 0;
}

.modal-body .form-control,
.modal-body .form-select {
    border-radius: 0.75rem;
    border: 2px solid #e1e5e9;
    transition: all 0.3s ease;
    font-weight: 500;
}

.modal-body .form-control:focus,
.modal-body .form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    transform: translateY(-1px);
}

.modal-body .form-label {
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
}

.modal-footer {
    background: #f8f9fa;
    border: none;
    padding: 2rem;
    border-radius: 0 0 1.5rem 1.5rem;
}

.modal-footer .btn {
    border-radius: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 0.75rem 2rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.modal-footer .btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s;
}

.modal-footer .btn:hover::before {
    left: 100%;
}

.modal-footer .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

/* Loading indicator styling */
.btn[data-kt-indicator="on"] {
    color: transparent !important;
}

.btn[data-kt-indicator="on"] .indicator-label {
    display: none;
}

.btn[data-kt-indicator="on"] .indicator-progress {
    display: inline-block;
}

.btn[data-kt-indicator="off"] .indicator-progress {
    display: none;
}
</style>
@endpush

@section('content')
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                <div class="d-flex align-items-center">
                    <i class="ki-duotone ki-check-circle fs-2 text-success me-3">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <div class="flex-grow-1">
                        <h5 class="mb-1">Berhasil!</h5>
                        <div>{{ session('success') }}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!--begin::Header Card-->
        <div class="card mb-5 mb-xl-8" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%); position: relative; overflow: hidden; border: none; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
            <!-- Animated background pattern -->
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E'); animation: float 20s ease-in-out infinite;"></div>

            <!-- Floating particles -->
            <div class="position-absolute" style="top: 10%; right: 10%; width: 6px; height: 6px; background: rgba(255,255,255,0.6); border-radius: 50%; animation: float 6s ease-in-out infinite;"></div>
            <div class="position-absolute" style="top: 20%; right: 20%; width: 4px; height: 4px; background: rgba(255,255,255,0.4); border-radius: 50%; animation: float 8s ease-in-out infinite reverse;"></div>
            <div class="position-absolute" style="top: 30%; right: 15%; width: 8px; height: 8px; background: rgba(255,255,255,0.3); border-radius: 50%; animation: float 10s ease-in-out infinite;"></div>
            <div class="position-absolute" style="top: 60%; left: 10%; width: 5px; height: 5px; background: rgba(255,255,255,0.5); border-radius: 50%; animation: float 7s ease-in-out infinite;"></div>
            <div class="position-absolute" style="top: 70%; left: 20%; width: 3px; height: 3px; background: rgba(255,255,255,0.7); border-radius: 50%; animation: float 9s ease-in-out infinite reverse;"></div>

            <!-- Gradient overlays -->
            <div class="position-absolute top-0 end-0" style="width: 300px; height: 300px; background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%); transform: translate(20%, -20%);"></div>
            <div class="position-absolute bottom-0 start-0" style="width: 250px; height: 250px; background: radial-gradient(circle, rgba(240, 147, 251, 0.3) 0%, transparent 70%); transform: translate(-20%, 20%);"></div>

            <!-- Top accent line -->
            <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #667eea); animation: shimmer 3s ease-in-out infinite;"></div>

            <div class="card-body text-center py-15" style="position: relative; z-index: 10;">
                <div class="d-flex justify-content-center mb-6">
                    <div class="symbol symbol-120px" style="animation: pulse 2s ease-in-out infinite;">
                        <div class="symbol-label bg-white bg-opacity-25" style="border-radius: 50%; backdrop-filter: blur(10px); border: 2px solid rgba(255,255,255,0.3);">
                            <i class="ki-duotone ki-home-2 fs-2x text-white" style="animation: rotate 10s linear infinite;">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                </div>
                <h1 class="text-white fw-bold fs-1 mb-4" style="text-shadow: 0 4px 8px rgba(0,0,0,0.3); animation: slideInUp 1s ease-out;">Profil Desa</h1>
                <p class="text-white fs-3 mb-0" style="opacity: 0.9; text-shadow: 0 2px 4px rgba(0,0,0,0.2); animation: slideInUp 1.2s ease-out;">Kelola informasi lengkap tentang desa Anda</p>

                <!-- Stats badges -->
                <div class="d-flex justify-content-center mt-6">
                    <div class="d-flex gap-4">
                        <div class="bg-white bg-opacity-20 rounded-pill px-4 py-2" style="backdrop-filter: blur(10px);">
                            <span class="text-white fw-bold fs-6">{{ $monografi ? 'Data Lengkap' : 'Belum Diisi' }}</span>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-pill px-4 py-2" style="backdrop-filter: blur(10px);">
                            <span class="text-white fw-bold fs-6">{{ $fasilitas->count() }} Fasilitas</span>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-pill px-4 py-2" style="backdrop-filter: blur(10px);">
                            <span class="text-white fw-bold fs-6">{{ $potensiDesa->count() }} Potensi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Header Card-->

        <!--begin::Statistics Cards-->
        <div class="row g-5 g-xl-8 mb-8">
            <div class="col-xl-3">
                <div class="card hoverable card-xl-stretch mb-xl-8 fade-in-up" style="background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.7) 100%); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.3);">
                    <div class="card-body p-6">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-60px me-4">
                                <div class="symbol-label" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);">
                                    <i class="ki-duotone ki-home-2 fs-2x text-white">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="text-dark fw-bold fs-6 mb-2" style="text-transform: uppercase; letter-spacing: 0.5px;">Nama Desa</div>
                                <div class="fw-semibold text-muted fs-7">{{ $monografi->nama_desa ?? 'Belum Diisi' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card hoverable card-xl-stretch mb-xl-8 fade-in-up" style="background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.7) 100%); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.3);">
                    <div class="card-body p-6">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-60px me-4">
                                <div class="symbol-label" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); border-radius: 50%; box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);">
                                    <i class="ki-duotone ki-geolocation fs-2x text-white">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="text-dark fw-bold fs-6 mb-2" style="text-transform: uppercase; letter-spacing: 0.5px;">Luas Wilayah</div>
                                <div class="fw-semibold text-muted fs-7">{{ $monografi->luas_wilayah ? number_format($monografi->luas_wilayah, 2) . ' km²' : 'Belum Diisi' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card hoverable card-xl-stretch mb-xl-8 fade-in-up" style="background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.7) 100%); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.3);">
                    <div class="card-body p-6">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-60px me-4">
                                <div class="symbol-label" style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); border-radius: 50%; box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);">
                                    <i class="ki-duotone ki-abstract-41 fs-2x text-white">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="text-dark fw-bold fs-6 mb-2" style="text-transform: uppercase; letter-spacing: 0.5px;">Status Desa</div>
                                <div class="fw-semibold text-muted fs-7">{{ $monografi->status_desa ?? 'Belum Diisi' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card hoverable card-xl-stretch mb-xl-8 fade-in-up" style="background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.7) 100%); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.3);">
                    <div class="card-body p-6">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-60px me-4">
                                <div class="symbol-label" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); border-radius: 50%; box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);">
                                    <i class="ki-duotone ki-calendar fs-2x text-white">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="text-dark fw-bold fs-6 mb-2" style="text-transform: uppercase; letter-spacing: 0.5px;">Tahun Berdiri</div>
                                <div class="fw-semibold text-muted fs-7">{{ $monografi->tahun_berdiri ?? 'Belum Diisi' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Statistics Cards-->

        <!--begin::Content Cards-->
        <div class="row g-5 g-xxl-8">
            <!--begin::Monografi Desa-->
            <div class="col-12 col-xl-6 col-xxl-6">
                <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Monografi Desa</span>
                            <span class="text-muted fw-semibold fs-7">Informasi dasar desa</span>
                        </h3>
                        <div class="card-toolbar">
                            <button class="btn btn-sm btn-primary" onclick="openEditMonografiModal()">
                                <i class="ki-duotone ki-pencil fs-4 me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Edit
                            </button>
                        </div>
                    </div>
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-muted">Nama Desa</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->nama_desa ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Kecamatan</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->kecamatan ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Kabupaten</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->kabupaten ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Provinsi</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->provinsi ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Kode Pos</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->kode_pos ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Kode Area</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->kode_area ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Status Desa</td>
                                        <td class="text-end">
                                            <span class="badge badge-light-primary fs-7 fw-semibold">{{ $monografi->status_desa ?? '-' }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Tahun Berdiri</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->tahun_berdiri ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Luas Wilayah</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->luas_wilayah ? number_format($monografi->luas_wilayah, 2) . ' km²' : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Ketinggian</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->ketinggian_mdpl ? $monografi->ketinggian_mdpl . ' mdpl' : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Topografi</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->topografi ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Iklim</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->iklim ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Suhu Rata-rata</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->suhu_rata_rata ? $monografi->suhu_rata_rata . '°C' : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Jarak ke Kecamatan</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->jarak_ke_kecamatan ? $monografi->jarak_ke_kecamatan . ' km' : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Waktu ke Kecamatan</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->waktu_ke_kecamatan ? $monografi->waktu_ke_kecamatan . ' jam' : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Jarak ke Kabupaten</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->jarak_ke_kabupaten ? $monografi->jarak_ke_kabupaten . ' km' : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Waktu ke Kabupaten</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->waktu_ke_kabupaten ? $monografi->waktu_ke_kabupaten . ' jam' : '-' }}</td>
                                    </tr>
                                    @if($monografi->latitude && $monografi->longitude)
                                    <tr>
                                        <td class="fw-bold text-muted">Koordinat</td>
                                        <td class="text-end">
                                            <span class="badge badge-light-success fs-7 fw-semibold">{{ $monografi->latitude }}, {{ $monografi->longitude }}</span>
                                        </td>
                                    </tr>
                                    @endif
                                    @if($monografi->google_street_view_url)
                                    <tr>
                                        <td class="fw-bold text-muted">Street View</td>
                                        <td class="text-end">
                                            <a href="{{ $monografi->google_street_view_url }}" target="_blank" class="btn btn-sm btn-light-primary">
                                                <i class="ki-duotone ki-geolocation fs-6 me-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                Lihat
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Monografi Desa-->

            <!--begin::Batas Wilayah-->
            <div class="col-12 col-xl-6 col-xxl-6">
                <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Batas Wilayah</span>
                            <span class="text-muted fw-semibold fs-7">Perbatasan desa</span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="{{ route('profil-desa.edit') }}" class="btn btn-sm btn-primary">
                                <i class="ki-duotone ki-pencil fs-4 me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Edit
                            </a>
                        </div>
                    </div>
                    <div class="card-body py-3">
                        @if($batasWilayah->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <tbody>
                                        @foreach($batasWilayah as $batas)
                                            <tr>
                                                <td class="fw-bold text-muted text-capitalize">{{ $batas->arah }}</td>
                                                <td class="text-end text-dark fw-bold fs-6">{{ $batas->berbatasan_dengan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <i class="ki-duotone ki-information fs-3x text-muted mb-3">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <div class="text-muted">Data batas wilayah belum diisi</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!--end::Batas Wilayah-->

            <!--begin::Fasilitas Desa-->
            <div class="col-12 col-xl-6 col-xxl-6">
                <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Fasilitas Desa</span>
                            <span class="text-muted fw-semibold fs-7">{{ $fasilitas->count() }} fasilitas terdaftar</span>
                        </h3>
                        <div class="card-toolbar">
                            <button class="btn btn-sm btn-primary" onclick="addFasilitas()">
                                <i class="ki-duotone ki-plus fs-4 me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Tambah Fasilitas
                            </button>
                        </div>
                    </div>
                    <div class="card-body py-3">
                        @if($fasilitas->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover table-rounded table-striped border gy-7 gs-7">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                            <th class="min-w-50px">Foto</th>
                                            <th class="min-w-200px">Nama Fasilitas</th>
                                            <th class="min-w-100px">Kategori</th>
                                            <th class="min-w-150px">Alamat</th>
                                            <th class="min-w-100px">Kondisi</th>
                                            <th class="min-w-100px">Tahun Dibangun</th>
                                            <th class="min-w-100px">Luas Bangunan</th>
                                            <th class="min-w-100px">Kapasitas</th>
                                            <th class="min-w-100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold">
                                        @foreach($fasilitas as $fasilitasItem)
                                            <tr>
                                                <td>
                                                    @if($fasilitasItem->foto)
                                                        <img src="{{ asset('storage/' . $fasilitasItem->foto) }}"
                                                             alt="{{ $fasilitasItem->nama_fasilitas }}"
                                                             class="fasilitas-image">
                                                    @else
                                                        <div class="symbol symbol-60px">
                                                            <div class="symbol-label bg-light-primary">
                                                                <i class="ki-duotone ki-home-2 fs-2 text-primary">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="fw-bold">{{ $fasilitasItem->nama_fasilitas }}</td>
                                                <td>
                                                    <span class="badge badge-light-info">{{ $fasilitasItem->kategori }}</span>
                                                </td>
                                                <td>{{ $fasilitasItem->alamat }}</td>
                                                <td>
                                                    <span class="badge badge-light-{{ $fasilitasItem->kondisi == 'Baik' ? 'success' : ($fasilitasItem->kondisi == 'Rusak' ? 'danger' : 'warning') }}">
                                                        {{ $fasilitasItem->kondisi }}
                                                    </span>
                                                </td>
                                                <td>{{ $fasilitasItem->tahun_dibangun ?? '-' }}</td>
                                                <td>{{ $fasilitasItem->luas_bangunan ? number_format($fasilitasItem->luas_bangunan, 2) . ' m²' : '-' }}</td>
                                                <td>{{ $fasilitasItem->kapasitas ?? '-' }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <button class="btn btn-sm btn-light-warning" onclick="editFasilitas({{ $fasilitasItem->id }})">
                                                            <i class="ki-duotone ki-pencil fs-6">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </button>
                                                        <button class="btn btn-sm btn-light-danger" onclick="deleteFasilitas({{ $fasilitasItem->id }})">
                                                            <i class="ki-duotone ki-trash fs-6">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                                <span class="path4"></span>
                                                                <span class="path5"></span>
                                                            </i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <i class="ki-duotone ki-home-2 fs-3x text-muted mb-3">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <div class="text-muted mb-4">Data fasilitas desa belum diisi</div>
                                <button class="btn btn-primary" onclick="addFasilitas()">
                                    <i class="ki-duotone ki-plus fs-4 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Tambah Fasilitas Pertama
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!--end::Fasilitas Desa-->

            <!--begin::Iklim Desa-->
            <div class="col-12 col-xl-6 col-xxl-6">
                <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Data Iklim Desa</span>
                            <span class="text-muted fw-semibold fs-7">{{ $iklim->count() }} data iklim terdaftar</span>
                        </h3>
                        <div class="card-toolbar">
                            <button class="btn btn-sm btn-primary" onclick="addIklim()">
                                <i class="ki-duotone ki-plus fs-4 me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Tambah Data Iklim
                            </button>
                        </div>
                    </div>
                    <div class="card-body py-3">
                        @if($iklim->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover table-rounded table-striped border gy-7 gs-7">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                            <th class="min-w-150px">Jenis Iklim</th>
                                            <th class="min-w-100px">Suhu Min</th>
                                            <th class="min-w-100px">Suhu Max</th>
                                            <th class="min-w-100px">Kelembaban</th>
                                            <th class="min-w-100px">Curah Hujan</th>
                                            <th class="min-w-100px">Musim Kering</th>
                                            <th class="min-w-100px">Musim Hujan</th>
                                            <th class="min-w-100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold">
                                        @foreach($iklim as $iklimItem)
                                            <tr>
                                                <td class="fw-bold">{{ $iklimItem->jenis_iklim }}</td>
                                                <td>{{ $iklimItem->suhu_min ? $iklimItem->suhu_min . '°C' : '-' }}</td>
                                                <td>{{ $iklimItem->suhu_max ? $iklimItem->suhu_max . '°C' : '-' }}</td>
                                                <td>{{ $iklimItem->kelembaban_rata ? $iklimItem->kelembaban_rata . '%' : '-' }}</td>
                                                <td>{{ $iklimItem->curah_hujan_tahunan ? number_format($iklimItem->curah_hujan_tahunan) . ' mm' : '-' }}</td>
                                                <td>{{ $iklimItem->musim_kering ?? '-' }}</td>
                                                <td>{{ $iklimItem->musim_hujan ?? '-' }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <button class="btn btn-sm btn-light-warning" onclick="editIklim({{ $iklimItem->id }})">
                                                            <i class="ki-duotone ki-pencil fs-6">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </button>
                                                        <button class="btn btn-sm btn-light-danger" onclick="deleteIklim({{ $iklimItem->id }})">
                                                            <i class="ki-duotone ki-trash fs-6">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                                <span class="path4"></span>
                                                                <span class="path5"></span>
                                                            </i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <i class="ki-duotone ki-abstract-41 fs-3x text-muted mb-3">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <div class="text-muted mb-4">Data iklim desa belum diisi</div>
                                <button class="btn btn-primary" onclick="addIklim()">
                                    <i class="ki-duotone ki-plus fs-4 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Tambah Data Iklim Pertama
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!--end::Iklim Desa-->

            <!--begin::Peruntukan Lahan-->
            <div class="col-12 col-xl-6 col-xxl-6">
                <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Peruntukan Lahan</span>
                            <span class="text-muted fw-semibold fs-7">{{ $peruntukanLahan->count() }} kategori lahan terdaftar</span>
                        </h3>
                        <div class="card-toolbar">
                            <button class="btn btn-sm btn-primary" onclick="addPeruntukanLahan()">
                                <i class="ki-duotone ki-plus fs-4 me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Tambah Kategori Lahan
                            </button>
                        </div>
                    </div>
                    <div class="card-body py-3">
                        @if($peruntukanLahan->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover table-rounded table-striped border gy-7 gs-7">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                            <th class="min-w-150px">Kategori</th>
                                            <th class="min-w-150px">Sub Kategori</th>
                                            <th class="min-w-100px">Luas (Hektar)</th>
                                            <th class="min-w-200px">Deskripsi</th>
                                            <th class="min-w-100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold">
                                        @foreach($peruntukanLahan as $lahanItem)
                                            <tr>
                                                <td class="fw-bold">{{ $lahanItem->kategori }}</td>
                                                <td>{{ $lahanItem->sub_kategori ?? '-' }}</td>
                                                <td>{{ $lahanItem->luas_hektar ? number_format($lahanItem->luas_hektar, 2) . ' ha' : '-' }}</td>
                                                <td>{{ $lahanItem->deskripsi ?? '-' }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <button class="btn btn-sm btn-light-warning" onclick="editPeruntukanLahan({{ $lahanItem->id }})">
                                                            <i class="ki-duotone ki-pencil fs-6">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </button>
                                                        <button class="btn btn-sm btn-light-danger" onclick="deletePeruntukanLahan({{ $lahanItem->id }})">
                                                            <i class="ki-duotone ki-trash fs-6">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                                <span class="path4"></span>
                                                                <span class="path5"></span>
                                                            </i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <i class="ki-duotone ki-geolocation fs-3x text-muted mb-3">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <div class="text-muted mb-4">Data peruntukan lahan belum diisi</div>
                                <button class="btn btn-primary" onclick="addPeruntukanLahan()">
                                    <i class="ki-duotone ki-plus fs-4 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Tambah Kategori Lahan Pertama
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!--end::Peruntukan Lahan-->

            <!--begin::Potensi Desa-->
            <div class="col-12 col-xl-6 col-xxl-6">
                <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Potensi Desa</span>
                            <span class="text-muted fw-semibold fs-7">{{ $potensiDesa->count() }} potensi terdaftar</span>
                        </h3>
                        <div class="card-toolbar">
                            <button class="btn btn-sm btn-primary" onclick="addPotensiDesa()">
                                Tambah Potensi
                            </button>
                        </div>
                    </div>
                    <div class="card-body py-3">
                        @if($potensiDesa->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover table-rounded table-striped border gy-7 gs-7">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                            <th class="min-w-200px">Nama Potensi</th>
                                            <th class="min-w-100px">Kategori</th>
                                            <th class="min-w-150px">Lokasi</th>
                                            <th class="min-w-100px">Nilai Ekonomi</th>
                                            <th class="min-w-100px">Status</th>
                                            <th class="min-w-100px">Unggulan</th>
                                            <th class="min-w-100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold">
                                        @foreach($potensiDesa as $potensiItem)
                                            <tr>
                                                <td class="fw-bold">{{ $potensiItem->nama_potensi }}</td>
                                                <td>
                                                    <span class="badge badge-light-info">{{ $potensiItem->kategori }}</span>
                                                </td>
                                                <td>{{ $potensiItem->lokasi ?? '-' }}</td>
                                                <td>{{ $potensiItem->nilai_ekonomi_format ?? '-' }}</td>
                                                <td>
                                                    <span class="badge badge-light-{{ $potensiItem->status == 'aktif' ? 'success' : 'warning' }}">
                                                        {{ ucfirst($potensiItem->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if($potensiItem->is_unggulan)
                                                        <span class="badge badge-light-success">Unggulan</span>
                                                    @else
                                                        <span class="badge badge-light-secondary">-</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <button class="btn btn-sm btn-light-warning" onclick="editPotensiDesa({{ $potensiItem->id }})">
                                                            Edit
                                                        </button>
                                                        <button class="btn btn-sm btn-light-danger" onclick="deletePotensiDesa({{ $potensiItem->id }})">
                                                            Hapus
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <div class="text-muted mb-4">Data potensi desa belum diisi</div>
                                <button class="btn btn-primary" onclick="addPotensiDesa()">
                                    Tambah Potensi Pertama
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!--end::Potensi Desa-->
        </div>
        <!--end::Content Cards-->

    </div>
</div>
<!--end::Content-->

<!--begin::Modal Edit Monografi-->
<div class="modal fade" id="editMonografiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content" style="border: none; border-radius: 1.5rem; overflow: hidden; box-shadow: 0 25px 50px rgba(0,0,0,0.2);">
            <!-- Modal Header -->
            <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; padding: 2rem;">
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-50px me-4">
                        <div class="symbol-label bg-white bg-opacity-20">
                            <i class="ki-duotone ki-pencil fs-2x text-white">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-white fw-bold fs-2 mb-1">Edit Monografi Desa</h2>
                        <p class="text-white fs-6 mb-0" style="opacity: 0.8;">Perbarui informasi dasar desa</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-0">
                <form id="editMonografiForm">
                    @csrf
                    @method('PUT')

                    <div class="row g-6 p-6">
                        <!-- Basic Info -->
                        <div class="col-12">
                            <div class="card" style="border: 1px solid #e1e5e9; border-radius: 1rem;">
                                <div class="card-header" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); border: none;">
                                    <h4 class="card-title fw-bold text-dark mb-0">
                                        <i class="ki-duotone ki-information fs-3 text-primary me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        Informasi Dasar
                                    </h4>
                                </div>
                                <div class="card-body p-6">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Nama Desa <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-lg" name="nama_desa" value="{{ $monografi->nama_desa ?? '' }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Kecamatan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-lg" name="kecamatan" value="{{ $monografi->kecamatan ?? '' }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Kabupaten <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-lg" name="kabupaten" value="{{ $monografi->kabupaten ?? '' }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Provinsi <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-lg" name="provinsi" value="{{ $monografi->provinsi ?? '' }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Kode Pos</label>
                                            <input type="text" class="form-control form-control-lg" name="kode_pos" value="{{ $monografi->kode_pos ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Kode Area</label>
                                            <input type="text" class="form-control form-control-lg" name="kode_area" value="{{ $monografi->kode_area ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Status Desa <span class="text-danger">*</span></label>
                                            <select class="form-select form-select-lg" name="status_desa" required>
                                                <option value="">Pilih Status Desa</option>
                                                <option value="Desa Berkembang" {{ ($monografi->status_desa ?? '') == 'Desa Berkembang' ? 'selected' : '' }}>Desa Berkembang</option>
                                                <option value="Desa Maju" {{ ($monografi->status_desa ?? '') == 'Desa Maju' ? 'selected' : '' }}>Desa Maju</option>
                                                <option value="Desa Mandiri" {{ ($monografi->status_desa ?? '') == 'Desa Mandiri' ? 'selected' : '' }}>Desa Mandiri</option>
                                                <option value="Desa Tertinggal" {{ ($monografi->status_desa ?? '') == 'Desa Tertinggal' ? 'selected' : '' }}>Desa Tertinggal</option>
                                                <option value="Kelurahan" {{ ($monografi->status_desa ?? '') == 'Kelurahan' ? 'selected' : '' }}>Kelurahan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Geographic Info -->
                        <div class="col-12">
                            <div class="card" style="border: 1px solid #e1e5e9; border-radius: 1rem;">
                                <div class="card-header" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); border: none;">
                                    <h4 class="card-title fw-bold text-dark mb-0">
                                        <i class="ki-duotone ki-geolocation fs-3 text-success me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Informasi Geografis
                                    </h4>
                                </div>
                                <div class="card-body p-6">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Tahun Berdiri</label>
                                            <input type="number" class="form-control form-control-lg" name="tahun_berdiri" value="{{ $monografi->tahun_berdiri ?? '' }}" min="1800" max="{{ date('Y') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Luas Wilayah (km²) <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control form-control-lg" name="luas_wilayah" value="{{ $monografi->luas_wilayah ?? '' }}" step="0.01" min="0" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Ketinggian (mdpl)</label>
                                            <input type="number" class="form-control form-control-lg" name="ketinggian_mdpl" value="{{ $monografi->ketinggian_mdpl ?? '' }}" min="0">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Topografi</label>
                                            <select class="form-select form-select-lg" name="topografi">
                                                <option value="">Pilih Topografi</option>
                                                <option value="Dataran Rendah" {{ ($monografi->topografi ?? '') == 'Dataran Rendah' ? 'selected' : '' }}>Dataran Rendah</option>
                                                <option value="Dataran Tinggi" {{ ($monografi->topografi ?? '') == 'Dataran Tinggi' ? 'selected' : '' }}>Dataran Tinggi</option>
                                                <option value="Pegunungan" {{ ($monografi->topografi ?? '') == 'Pegunungan' ? 'selected' : '' }}>Pegunungan</option>
                                                <option value="Pantai" {{ ($monografi->topografi ?? '') == 'Pantai' ? 'selected' : '' }}>Pantai</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Iklim</label>
                                            <select class="form-select form-select-lg" name="iklim">
                                                <option value="">Pilih Iklim</option>
                                                <option value="Tropis" {{ ($monografi->iklim ?? '') == 'Tropis' ? 'selected' : '' }}>Tropis</option>
                                                <option value="Subtropis" {{ ($monografi->iklim ?? '') == 'Subtropis' ? 'selected' : '' }}>Subtropis</option>
                                                <option value="Kontinental" {{ ($monografi->iklim ?? '') == 'Kontinental' ? 'selected' : '' }}>Kontinental</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Suhu Rata-rata (°C)</label>
                                            <input type="number" class="form-control form-control-lg" name="suhu_rata_rata" value="{{ $monografi->suhu_rata_rata ?? '' }}" step="0.1" min="0" max="50">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Jarak ke Kecamatan (km)</label>
                                            <input type="number" class="form-control form-control-lg" name="jarak_ke_kecamatan" value="{{ $monografi->jarak_ke_kecamatan ?? '' }}" step="0.01" min="0">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Waktu ke Kecamatan (jam)</label>
                                            <input type="number" class="form-control form-control-lg" name="waktu_ke_kecamatan" value="{{ $monografi->waktu_ke_kecamatan ?? '' }}" step="0.01" min="0">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Jarak ke Kabupaten (km)</label>
                                            <input type="number" class="form-control form-control-lg" name="jarak_ke_kabupaten" value="{{ $monografi->jarak_ke_kabupaten ?? '' }}" step="0.01" min="0">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Waktu ke Kabupaten (jam)</label>
                                            <input type="number" class="form-control form-control-lg" name="waktu_ke_kabupaten" value="{{ $monografi->waktu_ke_kabupaten ?? '' }}" step="0.01" min="0">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Latitude</label>
                                            <input type="number" class="form-control form-control-lg" name="latitude" value="{{ $monografi->latitude ?? '' }}" step="0.0000001" min="-90" max="90">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Longitude</label>
                                            <input type="number" class="form-control form-control-lg" name="longitude" value="{{ $monografi->longitude ?? '' }}" step="0.0000001" min="-180" max="180">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-bold">Google Street View URL</label>
                                            <input type="url" class="form-control form-control-lg" name="google_street_view_url" value="{{ $monografi->google_street_view_url ?? '' }}" placeholder="https://www.google.com/maps/@...">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-bold">Deskripsi</label>
                                            <textarea class="form-control form-control-lg" name="deskripsi" rows="4" placeholder="Masukkan deskripsi desa...">{{ $monografi->deskripsi ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer" style="background: #f8f9fa; border: none; padding: 2rem;">
                <button type="button" class="btn btn-light btn-lg me-3" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-4 me-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    Batal
                </button>
                <button type="button" class="btn btn-primary btn-lg" onclick="saveMonografi()" data-kt-indicator="off">
                    <span class="indicator-label">
                        <i class="ki-duotone ki-check fs-4 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Simpan Perubahan
                    </span>
                    <span class="indicator-progress">
                        Menyimpan... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal Edit Monografi-->

<!--begin::Modal Add/Edit Iklim Desa-->
<div class="modal fade" id="iklimModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border: none; border-radius: 1.5rem; overflow: hidden; box-shadow: 0 25px 50px rgba(0,0,0,0.2);">
            <div class="modal-header" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); border: none; padding: 2rem;">
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-50px me-4">
                        <div class="symbol-label bg-white bg-opacity-20">
                            <i class="ki-duotone ki-abstract-41 fs-2x text-white">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-white fw-bold fs-2 mb-1" id="iklimModalTitle">Tambah Data Iklim</h2>
                        <p class="text-white fs-6 mb-0" style="opacity: 0.8;">Kelola data iklim desa</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-6">
                <form id="iklimForm">
                    @csrf
                    <input type="hidden" id="iklim_id" name="id">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Bulan <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg" name="bulan" id="iklim_bulan" required>
                                <option value="">Pilih Bulan</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tahun <span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-lg" name="tahun" id="iklim_tahun" min="2000" max="2030" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Curah Hujan (mm)</label>
                            <input type="number" class="form-control form-control-lg" name="curah_hujan" id="iklim_curah_hujan" step="0.01" min="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Suhu Rata-rata (°C)</label>
                            <input type="number" class="form-control form-control-lg" name="suhu_rata_rata" id="iklim_suhu_rata_rata" step="0.1" min="0" max="50">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kelembaban (%)</label>
                            <input type="number" class="form-control form-control-lg" name="kelembaban" id="iklim_kelembaban" step="0.1" min="0" max="100">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kecepatan Angin (km/jam)</label>
                            <input type="number" class="form-control form-control-lg" name="kecepatan_angin" id="iklim_kecepatan_angin" step="0.1" min="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Arah Angin</label>
                            <select class="form-select form-select-lg" name="arah_angin" id="iklim_arah_angin">
                                <option value="">Pilih Arah Angin</option>
                                <option value="Utara">Utara</option>
                                <option value="Timur Laut">Timur Laut</option>
                                <option value="Timur">Timur</option>
                                <option value="Tenggara">Tenggara</option>
                                <option value="Selatan">Selatan</option>
                                <option value="Barat Daya">Barat Daya</option>
                                <option value="Barat">Barat</option>
                                <option value="Barat Laut">Barat Laut</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Musim</label>
                            <select class="form-select form-select-lg" name="musim" id="iklim_musim">
                                <option value="">Pilih Musim</option>
                                <option value="Hujan">Hujan</option>
                                <option value="Kemarau">Kemarau</option>
                                <option value="Pancaroba">Pancaroba</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="background: #f8f9fa; border: none; padding: 2rem;">
                <button type="button" class="btn btn-light btn-lg me-3" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success btn-lg" onclick="saveIklim()" data-kt-indicator="off">
                    <span class="indicator-label">Simpan</span>
                    <span class="indicator-progress">Menyimpan... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal Add/Edit Iklim Desa-->

<!--begin::Modal Add/Edit Peruntukan Lahan-->
<div class="modal fade" id="peruntukanModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border: none; border-radius: 1.5rem; overflow: hidden; box-shadow: 0 25px 50px rgba(0,0,0,0.2);">
            <div class="modal-header" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); border: none; padding: 2rem;">
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-50px me-4">
                        <div class="symbol-label bg-white bg-opacity-20">
                            <i class="ki-duotone ki-abstract-41 fs-2x text-white">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-white fw-bold fs-2 mb-1" id="peruntukanModalTitle">Tambah Peruntukan Lahan</h2>
                        <p class="text-white fs-6 mb-0" style="opacity: 0.8;">Kelola data peruntukan lahan desa</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-6">
                <form id="peruntukanForm">
                    @csrf
                    <input type="hidden" id="peruntukan_id" name="id">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kategori Lahan <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg" name="kategori_lahan" id="peruntukan_kategori_lahan" required>
                                <option value="">Pilih Kategori Lahan</option>
                                <option value="Perumahan">Perumahan</option>
                                <option value="Pertanian">Pertanian</option>
                                <option value="Perkebunan">Perkebunan</option>
                                <option value="Hutan">Hutan</option>
                                <option value="Tambang">Tambang</option>
                                <option value="Industri">Industri</option>
                                <option value="Komersial">Komersial</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Luas (hektar) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-lg" name="luas" id="peruntukan_luas" step="0.01" min="0" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Persentase (%)</label>
                            <input type="number" class="form-control form-control-lg" name="persentase" id="peruntukan_persentase" step="0.01" min="0" max="100">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Status Kepemilikan</label>
                            <select class="form-select form-select-lg" name="status_kepemilikan" id="peruntukan_status_kepemilikan">
                                <option value="">Pilih Status Kepemilikan</option>
                                <option value="Pemerintah">Pemerintah</option>
                                <option value="Swasta">Swasta</option>
                                <option value="Masyarakat">Masyarakat</option>
                                <option value="Campuran">Campuran</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Deskripsi</label>
                            <textarea class="form-control form-control-lg" name="deskripsi" id="peruntukan_deskripsi" rows="3" placeholder="Masukkan deskripsi peruntukan lahan..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="background: #f8f9fa; border: none; padding: 2rem;">
                <button type="button" class="btn btn-light btn-lg me-3" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-warning btn-lg" onclick="savePeruntukan()" data-kt-indicator="off">
                    <span class="indicator-label">Simpan</span>
                    <span class="indicator-progress">Menyimpan... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal Add/Edit Peruntukan Lahan-->

<!--begin::Modal Add/Edit Potensi Desa-->
<div class="modal fade" id="potensiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border: none; border-radius: 1.5rem; overflow: hidden; box-shadow: 0 25px 50px rgba(0,0,0,0.2);">
            <div class="modal-header" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); border: none; padding: 2rem;">
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-50px me-4">
                        <div class="symbol-label bg-white bg-opacity-20">
                            <i class="ki-duotone ki-abstract-41 fs-2x text-white">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-white fw-bold fs-2 mb-1" id="potensiModalTitle">Tambah Potensi Desa</h2>
                        <p class="text-white fs-6 mb-0" style="opacity: 0.8;">Kelola data potensi desa</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-6">
                <form id="potensiForm">
                    @csrf
                    <input type="hidden" id="potensi_id" name="id">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Potensi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="nama_potensi" id="potensi_nama_potensi" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kategori <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg" name="kategori" id="potensi_kategori" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Alam">Alam</option>
                                <option value="Budaya">Budaya</option>
                                <option value="Ekonomi">Ekonomi</option>
                                <option value="Sosial">Sosial</option>
                                <option value="Wisata">Wisata</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Lokasi</label>
                            <input type="text" class="form-control form-control-lg" name="lokasi" id="potensi_lokasi">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nilai Ekonomi (Rp)</label>
                            <input type="number" class="form-control form-control-lg" name="nilai_ekonomi" id="potensi_nilai_ekonomi" step="1000" min="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Status</label>
                            <select class="form-select form-select-lg" name="status" id="potensi_status">
                                <option value="">Pilih Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                                <option value="Dalam Pengembangan">Dalam Pengembangan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Unggulan</label>
                            <select class="form-select form-select-lg" name="is_unggulan" id="potensi_is_unggulan">
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Deskripsi</label>
                            <textarea class="form-control form-control-lg" name="deskripsi" id="potensi_deskripsi" rows="3" placeholder="Masukkan deskripsi potensi desa..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="background: #f8f9fa; border: none; padding: 2rem;">
                <button type="button" class="btn btn-light btn-lg me-3" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary btn-lg" onclick="savePotensi()" data-kt-indicator="off">
                    <span class="indicator-label">Simpan</span>
                    <span class="indicator-progress">Menyimpan... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal Add/Edit Potensi Desa-->

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

// Modal Functions
function openEditMonografiModal() {
    $('#editMonografiModal').modal('show');
}

function saveMonografi() {
    const form = document.getElementById('editMonografiForm');
    const formData = new FormData(form);

    // Show loading
    const submitBtn = document.querySelector('button[onclick="saveMonografi()"]');
    submitBtn.setAttribute('data-kt-indicator', 'on');

    Swal.fire({
        title: 'Menyimpan...',
        text: 'Mohon tunggu sebentar',
        allowOutsideClick: false,
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Send AJAX request
    $.ajax({
        url: '{{ route("profil-desa.update") }}',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data monografi berhasil diperbarui',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                location.reload();
            });
        },
        error: function(xhr) {
            let errorMessage = 'Terjadi kesalahan saat menyimpan data';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            Swal.fire({
                title: 'Error!',
                text: errorMessage,
                icon: 'error'
            });
        },
        complete: function() {
            submitBtn.setAttribute('data-kt-indicator', 'off');
        }
    });
}

// Fasilitas management functions
function addFasilitas() {
    Swal.fire({
        title: 'Tambah Fasilitas Desa',
        html: `
            <div class="text-start">
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Fasilitas</label>
                    <input type="text" class="form-control" id="nama_fasilitas" placeholder="Masukkan nama fasilitas">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Kategori</label>
                    <select class="form-select" id="kategori">
                        <option value="">Pilih Kategori</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Kesehatan">Kesehatan</option>
                        <option value="Ibadah">Ibadah</option>
                        <option value="Olahraga">Olahraga</option>
                        <option value="Pemerintahan">Pemerintahan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="2" placeholder="Masukkan alamat fasilitas"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Kondisi</label>
                            <select class="form-select" id="kondisi">
                                <option value="">Pilih Kondisi</option>
                                <option value="Baik">Baik</option>
                                <option value="Rusak Ringan">Rusak Ringan</option>
                                <option value="Rusak Berat">Rusak Berat</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tahun Dibangun</label>
                            <input type="number" class="form-control" id="tahun_dibangun" placeholder="2020" min="1900" max="2024">
                        </div>
                    </div>
                </div>
            </div>
        `,
        showCancelButton: true,
        confirmButtonText: 'Simpan',
        cancelButtonText: 'Batal',
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-secondary'
        },
        preConfirm: () => {
            const namaFasilitas = document.getElementById('nama_fasilitas').value;
            const kategori = document.getElementById('kategori').value;
            const alamat = document.getElementById('alamat').value;
            const kondisi = document.getElementById('kondisi').value;
            const tahunDibangun = document.getElementById('tahun_dibangun').value;

            if (!namaFasilitas || !kategori) {
                Swal.showValidationMessage('Nama fasilitas dan kategori wajib diisi');
                return false;
            }

            return {
                nama_fasilitas: namaFasilitas,
                kategori: kategori,
                alamat: alamat,
                kondisi: kondisi,
                tahun_dibangun: tahunDibangun
            };
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Simpan fasilitas via AJAX
            $.ajax({
                url: '/profil-desa/fasilitas',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    ...result.value
                },
                success: function(response) {
                    Swal.fire('Berhasil!', 'Fasilitas berhasil ditambahkan', 'success').then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire('Error!', 'Terjadi kesalahan saat menyimpan data', 'error');
                }
            });
        }
    });
}

function editFasilitas(id) {
    // Get fasilitas data first
    $.ajax({
        url: `/profil-desa/fasilitas/${id}`,
        type: 'GET',
        success: function(response) {
            Swal.fire({
                title: 'Edit Fasilitas Desa',
                html: `
                    <div class="text-start">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Fasilitas <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_nama_fasilitas" value="${response.nama_fasilitas}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Kategori <span class="text-danger">*</span></label>
                            <select class="form-select" id="edit_kategori" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Pendidikan" ${response.kategori === 'Pendidikan' ? 'selected' : ''}>Pendidikan</option>
                                <option value="Kesehatan" ${response.kategori === 'Kesehatan' ? 'selected' : ''}>Kesehatan</option>
                                <option value="Ibadah" ${response.kategori === 'Ibadah' ? 'selected' : ''}>Ibadah</option>
                                <option value="Olahraga" ${response.kategori === 'Olahraga' ? 'selected' : ''}>Olahraga</option>
                                <option value="Pemerintahan" ${response.kategori === 'Pemerintahan' ? 'selected' : ''}>Pemerintahan</option>
                                <option value="Lainnya" ${response.kategori === 'Lainnya' ? 'selected' : ''}>Lainnya</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Alamat</label>
                            <textarea class="form-control" id="edit_alamat" rows="2">${response.alamat || ''}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Kondisi</label>
                                    <select class="form-select" id="edit_kondisi">
                                        <option value="">Pilih Kondisi</option>
                                        <option value="Baik" ${response.kondisi === 'Baik' ? 'selected' : ''}>Baik</option>
                                        <option value="Rusak Ringan" ${response.kondisi === 'Rusak Ringan' ? 'selected' : ''}>Rusak Ringan</option>
                                        <option value="Rusak Berat" ${response.kondisi === 'Rusak Berat' ? 'selected' : ''}>Rusak Berat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Tahun Dibangun</label>
                                    <input type="number" class="form-control" id="edit_tahun_dibangun" value="${response.tahun_dibangun || ''}" min="1900" max="2024">
                                </div>
                            </div>
                        </div>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: 'Simpan Perubahan',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                preConfirm: () => {
                    const namaFasilitas = document.getElementById('edit_nama_fasilitas').value;
                    const kategori = document.getElementById('edit_kategori').value;
                    const alamat = document.getElementById('edit_alamat').value;
                    const kondisi = document.getElementById('edit_kondisi').value;
                    const tahunDibangun = document.getElementById('edit_tahun_dibangun').value;

                    if (!namaFasilitas || !kategori) {
                        Swal.showValidationMessage('Nama fasilitas dan kategori harus diisi');
                        return false;
                    }

                    return {
                        nama_fasilitas: namaFasilitas,
                        kategori: kategori,
                        alamat: alamat,
                        kondisi: kondisi,
                        tahun_dibangun: tahunDibangun
                    };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading
                    Swal.fire({
                        title: 'Menyimpan...',
                        text: 'Mohon tunggu sebentar',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Send AJAX request
                    $.ajax({
                        url: `/profil-desa/fasilitas/${id}`,
                        type: 'PUT',
                        data: result.value,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Fasilitas berhasil diperbarui',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            let errorMessage = 'Terjadi kesalahan saat menyimpan data';
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
                            }
                            Swal.fire({
                                title: 'Error!',
                                text: errorMessage,
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        },
        error: function(xhr) {
            Swal.fire({
                title: 'Error!',
                text: 'Gagal memuat data fasilitas',
                icon: 'error'
            });
        }
    });
}

function deleteFasilitas(id) {
    Swal.fire({
        title: 'Hapus Fasilitas?',
        text: 'Apakah Anda yakin ingin menghapus fasilitas ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
        customClass: {
            confirmButton: 'btn btn-danger',
            cancelButton: 'btn btn-secondary'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/profil-desa/fasilitas/${id}`,
                method: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire('Berhasil!', 'Fasilitas berhasil dihapus', 'success').then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data', 'error');
                }
            });
        }
    });
}

// Iklim Desa Functions
function addIklim() {
    $('#iklimModalTitle').text('Tambah Data Iklim');
    $('#iklimForm')[0].reset();
    $('#iklim_id').val('');
    $('#iklimModal').modal('show');
}

function editIklim(id) {
    // Get iklim data first
    $.ajax({
        url: `/profil-desa/iklim/${id}`,
        type: 'GET',
        success: function(response) {
            $('#iklimModalTitle').text('Edit Data Iklim');
            $('#iklim_id').val(response.id);
            $('#iklim_bulan').val(response.bulan);
            $('#iklim_tahun').val(response.tahun);
            $('#iklim_curah_hujan').val(response.curah_hujan);
            $('#iklim_suhu_rata_rata').val(response.suhu_rata_rata);
            $('#iklim_kelembaban').val(response.kelembaban);
            $('#iklim_kecepatan_angin').val(response.kecepatan_angin);
            $('#iklim_arah_angin').val(response.arah_angin);
            $('#iklim_musim').val(response.musim);
            $('#iklimModal').modal('show');
        },
        error: function() {
            Swal.fire('Error!', 'Gagal memuat data iklim', 'error');
        }
    });
}

function saveIklim() {
    const form = document.getElementById('iklimForm');
    const formData = new FormData(form);
    const isEdit = $('#iklim_id').val() !== '';
    
    const submitBtn = document.querySelector('button[onclick="saveIklim()"]');
    submitBtn.setAttribute('data-kt-indicator', 'on');
    
    const url = isEdit ? `/profil-desa/iklim/${$('#iklim_id').val()}` : '/profil-desa/iklim';
    const method = isEdit ? 'PUT' : 'POST';
    
    $.ajax({
        url: url,
        type: method,
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            Swal.fire({
                title: 'Berhasil!',
                text: isEdit ? 'Data iklim berhasil diperbarui' : 'Data iklim berhasil ditambahkan',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                location.reload();
            });
        },
        error: function(xhr) {
            let errorMessage = 'Terjadi kesalahan saat menyimpan data';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            Swal.fire({
                title: 'Error!',
                text: errorMessage,
                icon: 'error'
            });
        },
        complete: function() {
            submitBtn.setAttribute('data-kt-indicator', 'off');
        }
    });
}

function deleteIklim(id) {
    Swal.fire({
        title: 'Hapus Data Iklim?',
        text: 'Apakah Anda yakin ingin menghapus data iklim ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/profil-desa/iklim/${id}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire('Berhasil!', 'Data iklim berhasil dihapus', 'success').then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data', 'error');
                }
            });
        }
    });
}

// Peruntukan Lahan Functions
function addPeruntukanLahan() {
    $('#peruntukanModalTitle').text('Tambah Peruntukan Lahan');
    $('#peruntukanForm')[0].reset();
    $('#peruntukan_id').val('');
    $('#peruntukanModal').modal('show');
}

function editPeruntukanLahan(id) {
    // Get peruntukan data first
    $.ajax({
        url: `/profil-desa/peruntukan/${id}`,
        type: 'GET',
        success: function(response) {
            $('#peruntukanModalTitle').text('Edit Peruntukan Lahan');
            $('#peruntukan_id').val(response.id);
            $('#peruntukan_kategori_lahan').val(response.kategori_lahan);
            $('#peruntukan_luas').val(response.luas);
            $('#peruntukan_persentase').val(response.persentase);
            $('#peruntukan_status_kepemilikan').val(response.status_kepemilikan);
            $('#peruntukan_deskripsi').val(response.deskripsi);
            $('#peruntukanModal').modal('show');
        },
        error: function() {
            Swal.fire('Error!', 'Gagal memuat data peruntukan lahan', 'error');
        }
    });
}

function savePeruntukan() {
    const form = document.getElementById('peruntukanForm');
    const formData = new FormData(form);
    const isEdit = $('#peruntukan_id').val() !== '';
    
    const submitBtn = document.querySelector('button[onclick="savePeruntukan()"]');
    submitBtn.setAttribute('data-kt-indicator', 'on');
    
    const url = isEdit ? `/profil-desa/peruntukan/${$('#peruntukan_id').val()}` : '/profil-desa/peruntukan';
    const method = isEdit ? 'PUT' : 'POST';
    
    $.ajax({
        url: url,
        type: method,
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            Swal.fire({
                title: 'Berhasil!',
                text: isEdit ? 'Data peruntukan lahan berhasil diperbarui' : 'Data peruntukan lahan berhasil ditambahkan',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                location.reload();
            });
        },
        error: function(xhr) {
            let errorMessage = 'Terjadi kesalahan saat menyimpan data';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            Swal.fire({
                title: 'Error!',
                text: errorMessage,
                icon: 'error'
            });
        },
        complete: function() {
            submitBtn.setAttribute('data-kt-indicator', 'off');
        }
    });
}

function deletePeruntukanLahan(id) {
    Swal.fire({
        title: 'Hapus Peruntukan Lahan?',
        text: 'Apakah Anda yakin ingin menghapus data peruntukan lahan ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/profil-desa/peruntukan/${id}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire('Berhasil!', 'Data peruntukan lahan berhasil dihapus', 'success').then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data', 'error');
                }
            });
        }
    });
}

// Potensi Desa Functions
function addPotensiDesa() {
    $('#potensiModalTitle').text('Tambah Potensi Desa');
    $('#potensiForm')[0].reset();
    $('#potensi_id').val('');
    $('#potensiModal').modal('show');
}

function editPotensiDesa(id) {
    // Get potensi data first
    $.ajax({
        url: `/profil-desa/potensi/${id}`,
        type: 'GET',
        success: function(response) {
            $('#potensiModalTitle').text('Edit Potensi Desa');
            $('#potensi_id').val(response.id);
            $('#potensi_nama_potensi').val(response.nama_potensi);
            $('#potensi_kategori').val(response.kategori);
            $('#potensi_lokasi').val(response.lokasi);
            $('#potensi_nilai_ekonomi').val(response.nilai_ekonomi);
            $('#potensi_status').val(response.status);
            $('#potensi_is_unggulan').val(response.is_unggulan);
            $('#potensi_deskripsi').val(response.deskripsi);
            $('#potensiModal').modal('show');
        },
        error: function() {
            Swal.fire('Error!', 'Gagal memuat data potensi desa', 'error');
        }
    });
}

function savePotensi() {
    const form = document.getElementById('potensiForm');
    const formData = new FormData(form);
    const isEdit = $('#potensi_id').val() !== '';
    
    const submitBtn = document.querySelector('button[onclick="savePotensi()"]');
    submitBtn.setAttribute('data-kt-indicator', 'on');
    
    const url = isEdit ? `/profil-desa/potensi/${$('#potensi_id').val()}` : '/profil-desa/potensi';
    const method = isEdit ? 'PUT' : 'POST';
    
    $.ajax({
        url: url,
        type: method,
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            Swal.fire({
                title: 'Berhasil!',
                text: isEdit ? 'Data potensi desa berhasil diperbarui' : 'Data potensi desa berhasil ditambahkan',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                location.reload();
            });
        },
        error: function(xhr) {
            let errorMessage = 'Terjadi kesalahan saat menyimpan data';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            Swal.fire({
                title: 'Error!',
                text: errorMessage,
                icon: 'error'
            });
        },
        complete: function() {
            submitBtn.setAttribute('data-kt-indicator', 'off');
        }
    });
}

function deletePotensiDesa(id) {
    Swal.fire({
        title: 'Hapus Potensi Desa?',
        text: 'Apakah Anda yakin ingin menghapus data potensi desa ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/profil-desa/potensi/${id}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire('Berhasil!', 'Data potensi desa berhasil dihapus', 'success').then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data', 'error');
                }
            });
        }
    });
}
</script>
@endpush
