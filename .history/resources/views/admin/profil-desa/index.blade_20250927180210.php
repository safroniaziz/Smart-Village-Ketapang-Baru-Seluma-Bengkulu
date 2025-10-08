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
                            <button class="btn btn-sm btn-primary" onclick="openEditBatasModal()">
                                <i class="ki-duotone ki-pencil fs-4 me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Edit
                            </button>
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
                            <button class="btn btn-sm btn-success" onclick="openEditIklimModal()">
                                <i class="ki-duotone ki-pencil fs-4 me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Edit Data Iklim
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
                                            <input type="text" class="form-control form-control-lg" name="topografi" value="{{ $monografi->topografi ?? 'Datar-Berombak' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Iklim</label>
                                            <input type="text" class="form-control form-control-lg" name="iklim" value="{{ $monografi->iklim ?? 'Tropis Pesisir' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Suhu Rata-rata</label>
                                            <input type="text" class="form-control form-control-lg" name="suhu_rata_rata" value="{{ $monografi->suhu_rata_rata ?? '23-30°C' }}">
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

@include('admin.profil-desa.partials.fasilitas-modal')
@include('admin.profil-desa.partials.batas-modal')
@include('admin.profil-desa.partials.iklim-edit-modal')
@include('admin.profil-desa.partials.peruntukan-modal')
@include('admin.profil-desa.partials.potensi-modal')

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
    // Load existing monografi data first
    $.ajax({
        url: '/profil-desa',
        type: 'GET',
        success: function(response) {
            // Check if monografi data exists
            if (response.monografi) {
                const data = response.monografi;
                // Populate form fields with existing data using name attributes
                $('[name="nama_desa"]').val(data.nama_desa || '');
                $('[name="kecamatan"]').val(data.kecamatan || '');
                $('[name="kabupaten"]').val(data.kabupaten || '');
                $('[name="provinsi"]').val(data.provinsi || '');
                $('[name="kode_pos"]').val(data.kode_pos || '');
                $('[name="kode_area"]').val(data.kode_area || '');
                $('[name="status_desa"]').val(data.status_desa || '');
                $('[name="tahun_berdiri"]').val(data.tahun_berdiri || '');
                $('[name="luas_wilayah"]').val(data.luas_wilayah || '');
                $('[name="ketinggian_mdpl"]').val(data.ketinggian_mdpl || '');
                $('[name="topografi"]').val(data.topografi || '');
                $('[name="iklim"]').val(data.iklim || '');
                $('[name="suhu_rata_rata"]').val(data.suhu_rata_rata || '');
                $('[name="jarak_ke_kecamatan"]').val(data.jarak_ke_kecamatan || '');
                $('[name="waktu_ke_kecamatan"]').val(data.waktu_ke_kecamatan || '');
                $('[name="jarak_ke_kabupaten"]').val(data.jarak_ke_kabupaten || '');
                $('[name="waktu_ke_kabupaten"]').val(data.waktu_ke_kabupaten || '');
                $('[name="latitude"]').val(data.latitude || '');
                $('[name="longitude"]').val(data.longitude || '');
                $('[name="google_street_view_url"]').val(data.google_street_view_url || '');
                $('[name="deskripsi"]').val(data.deskripsi || '');
            }
            $('#editMonografiModal').modal('show');
        },
        error: function() {
            // Show modal even if data loading fails
            $('#editMonografiModal').modal('show');
        }
    });
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
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
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
                icon: 'error',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        },
        complete: function() {
            submitBtn.setAttribute('data-kt-indicator', 'off');
        }
    });
}

// Fasilitas management functions
function addFasilitas() {
    $('#fasilitasModalTitle').text('Tambah Fasilitas Desa');
    $('#fasilitasForm')[0].reset();
    $('#fasilitas_id').val('');
    $('#fasilitas_photo_preview').hide();
    $('#fasilitasModal').modal('show');
}

function editFasilitas(id) {
    // Get fasilitas data first
    $.ajax({
        url: `/profil-desa/fasilitas/${id}`,
        type: 'GET',
        success: function(response) {
            $('#fasilitasModalTitle').text('Edit Fasilitas Desa');
            $('#fasilitas_id').val(response.id);
            $('#fasilitas_nama_fasilitas').val(response.nama_fasilitas);
            $('#fasilitas_kategori').val(response.kategori);
            $('#fasilitas_alamat').val(response.alamat);
            $('#fasilitas_kondisi').val(response.kondisi);
            $('#fasilitas_tahun_dibangun').val(response.tahun_dibangun);
            $('#fasilitas_deskripsi').val(response.deskripsi);

            // Show existing photo if available
            if (response.foto) {
                $('#fasilitas_preview_img').attr('src', `/storage/${response.foto}`);
                $('#fasilitas_photo_preview').show();
            } else {
                $('#fasilitas_photo_preview').hide();
            }

            $('#fasilitasModal').modal('show');
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

function saveFasilitas() {
    const form = document.getElementById('fasilitasForm');
    const formData = new FormData(form);
    const isEdit = $('#fasilitas_id').val() !== '';

    const submitBtn = document.querySelector('button[onclick="saveFasilitas()"]');
    submitBtn.setAttribute('data-kt-indicator', 'on');

    const url = isEdit ? `/profil-desa/fasilitas/${$('#fasilitas_id').val()}` : '/profil-desa/fasilitas';
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
                text: isEdit ? 'Fasilitas berhasil diperbarui' : 'Fasilitas berhasil ditambahkan',
                icon: 'success',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
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
                icon: 'error',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        },
        complete: function() {
            submitBtn.setAttribute('data-kt-indicator', 'off');
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
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Fasilitas berhasil dihapus',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        }
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat menghapus data',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        }
                    });
                }
            });
        }
    });
}

// Include CRUD functions
@include('admin.profil-desa.partials.crud-scripts')
</script>
@endpush
