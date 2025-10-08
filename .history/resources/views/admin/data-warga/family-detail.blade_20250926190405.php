@extends('layouts.dashboard.dashboard')

@section('title', 'Detail Keluarga')

@section('menu')
    Detail Keluarga
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('data-warga.index') }}" class="text-muted text-hover-primary">Data Warga</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Detail Keluarga</li>
@endsection

@push('styles')
<style>
/* Spectacular Header Animations */
@keyframes float {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
    }
    50% {
        transform: translateY(-20px) rotate(180deg);
    }
}

@keyframes pulse {
    0%, 100% {
        opacity: 0.4;
    }
    50% {
        opacity: 0.8;
    }
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes shimmer {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateX(100%);
    }
}

@keyframes bounce {
    0%, 20%, 53%, 80%, 100% {
        transform: translate3d(0,0,0);
    }
    40%, 43% {
        transform: translate3d(0, -10px, 0);
    }
    70% {
        transform: translate3d(0, -5px, 0);
    }
    90% {
        transform: translate3d(0, -2px, 0);
    }
}

/* Enhanced Family Header */
.family-header {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #667eea 100%);
    position: relative;
    min-height: 350px;
    overflow: hidden;
    border-radius: 1.5rem;
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
}

.family-header::before {
    content: '';
    position: absolute;
    top: 0;
    start: 0;
    width: 100%;
    height: 100%;
    background: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');
}

/* Floating particles */
.particle {
    position: absolute;
    background: rgba(255,255,255,0.3);
    border-radius: 50%;
    pointer-events: none;
}

.particle-1 {
    top: 20%;
    right: 15%;
    width: 12px;
    height: 12px;
    animation: float 6s ease-in-out infinite;
}

.particle-2 {
    top: 60%;
    right: 25%;
    width: 8px;
    height: 8px;
    animation: float 4s ease-in-out infinite reverse;
}

.particle-3 {
    top: 40%;
    left: 20%;
    width: 15px;
    height: 15px;
    animation: float 8s ease-in-out infinite;
}

.particle-4 {
    top: 70%;
    left: 70%;
    width: 6px;
    height: 6px;
    animation: bounce 3s ease-in-out infinite;
}

/* Gradient overlays */
.gradient-overlay-1 {
    position: absolute;
    top: 0;
    end: 0;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
    transform: translate(20%, -20%);
}

.gradient-overlay-2 {
    position: absolute;
    bottom: 0;
    start: 0;
    width: 350px;
    height: 350px;
    background: radial-gradient(circle, rgba(59, 130, 246, 0.2) 0%, transparent 70%);
    transform: translate(-20%, 20%);
}

/* Top accent line */
.accent-line {
    position: absolute;
    top: 0;
    start: 0;
    width: 100%;
    height: 6px;
    background: linear-gradient(90deg, #3b82f6, #10b981, #f59e0b, #ef4444);
}

/* Profile header enhanced styling */
.family-name {
    animation: slideInUp 0.8s ease-out;
    text-shadow: 0 4px 8px rgba(0,0,0,0.3);
    font-size: 3rem;
    font-weight: 800;
}

.family-info {
    animation: slideInUp 1s ease-out 0.2s both;
}

.family-stats-enhanced {
    animation: slideInUp 1.2s ease-out 0.4s both;
}

/* Glass morphism effect for stats */
.stats-glass {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 1.5rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stats-glass::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
    transform: rotate(45deg);
    transition: all 0.6s ease;
    opacity: 0;
}

.stats-glass:hover::before {
    opacity: 1;
    animation: shimmer 1.5s ease-in-out;
}

.stats-glass:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.2);
}

/* Enhanced member cards */
.member-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 1.5rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    box-shadow: 0 8px 32px rgba(0,0,0,0.1);
}

.member-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.6s ease;
    z-index: 1;
}

.member-card:hover::before {
    left: 100%;
}

.member-card:hover {
    transform: translateY(-12px) scale(1.02);
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
    border-color: var(--kt-primary);
}

.member-photo {
    width: 100px;
    height: 130px;
    object-fit: cover;
    border-radius: 1rem;
    border: 4px solid rgba(255, 255, 255, 0.8);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
}

.member-card:hover .member-photo {
    transform: scale(1.05);
    border-color: var(--kt-primary);
}

/* Kepala keluarga special styling */
.kepala-keluarga {
    background: linear-gradient(135deg, rgba(50, 205, 50, 0.1) 0%, rgba(50, 205, 50, 0.05) 100%);
    border-left: 6px solid #32cd32;
    position: relative;
}

.kepala-keluarga::after {
    content: '👑';
    position: absolute;
    top: 1rem;
    right: 1rem;
    font-size: 1.5rem;
    animation: bounce 2s infinite;
}

/* Enhanced icon styling */
.icon-enhanced {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 1rem;
    padding: 0.75rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.icon-enhanced::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    transition: all 0.3s ease;
    transform: translate(-50%, -50%);
}

.icon-enhanced:hover::before {
    width: 100%;
    height: 100%;
}

.icon-enhanced:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1) rotate(5deg);
}

/* Action buttons enhancement */
.btn-enhanced {
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    border-radius: 0.75rem;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
}

.btn-enhanced::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    transition: all 0.4s ease;
    transform: translate(-50%, -50%);
}

.btn-enhanced:hover::before {
    width: 300px;
    height: 300px;
}

.btn-enhanced:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

/* Statistics cards */
.stat-card {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border-radius: 1.25rem;
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.2);
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: -2px;
    left: -2px;
    right: -2px;
    bottom: -2px;
    background: linear-gradient(45deg, #3b82f6, #10b981, #f59e0b, #ef4444);
    border-radius: inherit;
    z-index: -1;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.stat-card:hover::before {
    opacity: 1;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
}

.stat-number {
    font-size: 3rem;
    font-weight: 800;
    background: linear-gradient(135deg, var(--kt-primary) 0%, #667eea 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 0.5rem;
}

.stat-label {
    color: #64748b;
    font-size: 0.875rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Address card enhancement */
.address-card {
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.05) 0%, rgba(139, 92, 246, 0.05) 100%);
    border: 1px solid rgba(59, 130, 246, 0.1);
    border-radius: 1.5rem;
    padding: 2rem;
    position: relative;
    overflow: hidden;
}

.address-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #3b82f6, #8b5cf6);
}

/* Responsive enhancements */
@media (max-width: 768px) {
    .family-name {
        font-size: 2rem;
    }
    
    .member-card {
        margin-bottom: 1rem;
    }
    
    .stats-glass {
        margin-bottom: 1rem;
    }
}

/* Loading animation for better UX */
.fade-in {
    animation: slideInUp 0.6s ease-out forwards;
}

.fade-in-delay-1 { animation-delay: 0.1s; }
.fade-in-delay-2 { animation-delay: 0.2s; }
.fade-in-delay-3 { animation-delay: 0.3s; }
.fade-in-delay-4 { animation-delay: 0.4s; }
</style>
@endpush

@section('content')
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">

        <!--begin::Family Header-->
        <div class="family-header mb-8 fade-in">
            <!-- Decorative elements -->
            <div class="accent-line"></div>
            <div class="gradient-overlay-1"></div>
            <div class="gradient-overlay-2"></div>
            
            <!-- Floating particles -->
            <div class="particle particle-1"></div>
            <div class="particle particle-2"></div>
            <div class="particle particle-3"></div>
            <div class="particle particle-4"></div>

            <div class="card-body pt-15 pb-10" style="position: relative; z-index: 10;">
                <!--begin::Family Header Content-->
                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <!--begin::Family Photo-->
                    <div class="me-7 mb-4">
                        <div class="symbol symbol-150px symbol-lg-180px symbol-fixed position-relative">
                            @if($kepalaKeluarga && $kepalaKeluarga->foto)
                                <img src="{{ asset('storage/' . $kepalaKeluarga->foto) }}"
                                     alt="Foto Kepala Keluarga"
                                     class="rounded-4"
                                     style="width: 180px; height: 240px; object-fit: cover; border: 4px solid rgba(255,255,255,0.3); box-shadow: 0 15px 40px rgba(0,0,0,0.2);">
                            @else
                                <div class="symbol-label fs-2 fw-semibold text-white bg-white bg-opacity-20 rounded-4 d-flex align-items-center justify-content-center"
                                     style="width: 180px; height: 240px; border: 4px solid rgba(255,255,255,0.3); box-shadow: 0 15px 40px rgba(0,0,0,0.2);">
                                    <div class="text-center">
                                        <i class="ki-duotone ki-home-2 fs-2x text-white mb-3">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <div class="fs-6 text-white fw-bold">KELUARGA</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!--end::Family Photo-->

                    <!--begin::Wrapper-->
                    <div class="flex-grow-1">
                        <!--begin::Head-->
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <!--begin::Details-->
                            <div class="d-flex flex-column">
                                <!--begin::Name-->
                                <div class="d-flex align-items-center mb-4 family-name">
                                    <h1 class="text-white fw-bold me-3 mb-0 family-name">
                                        Keluarga {{ $kepalaKeluarga->nama_lengkap ?? 'Tidak Diketahui' }}
                                    </h1>
                                    <div class="d-flex align-items-center bg-success bg-opacity-20 rounded-pill px-4 py-2">
                                        <i class="ki-duotone ki-home-2 fs-5 text-white me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <span class="text-white fw-semibold fs-7">{{ $familyMembers->count() }} ANGGOTA</span>
                                    </div>
                                </div>
                                <!--end::Name-->

                                <!--begin::Info-->
                                <div class="d-flex flex-wrap fw-semibold fs-6 mb-6 pe-2 family-info">
                                    <div class="d-flex align-items-center me-6 mb-3">
                                        <div class="icon-enhanced">
                                            <i class="ki-duotone ki-abstract-41 fs-4 text-white">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                        <div>
                                            <div class="text-white fw-bold fs-7" style="opacity: 0.7;">NO. KARTU KELUARGA</div>
                                            <div class="text-white fw-semibold fs-5">{{ $noKK }}</div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center me-6 mb-3">
                                        <div class="icon-enhanced">
                                            <i class="ki-duotone ki-geolocation fs-4 text-white">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                        <div>
                                            <div class="text-white fw-bold fs-7" style="opacity: 0.7;">ALAMAT</div>
                                            <div class="text-white fw-semibold">{{ $kepalaKeluarga->dusun ?? '-' }}, {{ $kepalaKeluarga->desa ?? '-' }}</div>
                                        </div>
                                    </div>

                                    @if($kepalaKeluarga && $kepalaKeluarga->rt_rw)
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="icon-enhanced">
                                            <i class="ki-duotone ki-map fs-4 text-white">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </div>
                                        <div>
                                            <div class="text-white fw-bold fs-7" style="opacity: 0.7;">RT/RW</div>
                                            <div class="text-white fw-semibold">{{ $kepalaKeluarga->rt_rw }}</div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::Head-->

                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap flex-stack family-stats-enhanced">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column flex-grow-1 pe-8">
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap">
                                    <!--begin::Stat-->
                                    <div class="stats-glass min-w-150px py-4 px-5 me-4 mb-4">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="bg-white bg-opacity-20 rounded-circle p-3 me-3">
                                                <i class="ki-duotone ki-people fs-2 text-white">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                </i>
                                            </div>
                                            <div class="fs-2hx fw-bold text-white">{{ $familyMembers->count() }}</div>
                                        </div>
                                        <div class="text-center">
                                            <div class="fw-bold text-white fs-7" style="opacity: 0.8;">TOTAL</div>
                                            <div class="fw-semibold text-white fs-8" style="opacity: 0.6;">Anggota</div>
                                        </div>
                                    </div>
                                    <!--end::Stat-->

                                    <!--begin::Stat-->
                                    <div class="stats-glass min-w-150px py-4 px-5 me-4 mb-4">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="bg-white bg-opacity-20 rounded-circle p-3 me-3">
                                                <i class="ki-duotone ki-profile-user fs-2 text-white">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </div>
                                            <div class="fs-2hx fw-bold text-white">{{ $familyMembers->whereIn('jenis_kelamin', ['Laki-laki', 'L'])->count() }}</div>
                                        </div>
                                        <div class="text-center">
                                            <div class="fw-bold text-white fs-7" style="opacity: 0.8;">LAKI-LAKI</div>
                                            <div class="fw-semibold text-white fs-8" style="opacity: 0.6;">Orang</div>
                                        </div>
                                    </div>
                                    <!--end::Stat-->

                                    <!--begin::Stat-->
                                    <div class="stats-glass min-w-150px py-4 px-5 me-4 mb-4">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="bg-white bg-opacity-20 rounded-circle p-3 me-3">
                                                <i class="ki-duotone ki-profile-user fs-2 text-white">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </div>
                                            <div class="fs-2hx fw-bold text-white">{{ $familyMembers->whereIn('jenis_kelamin', ['Perempuan', 'P'])->count() }}</div>
                                        </div>
                                        <div class="text-center">
                                            <div class="fw-bold text-white fs-7" style="opacity: 0.8;">PEREMPUAN</div>
                                            <div class="fw-semibold text-white fs-8" style="opacity: 0.6;">Orang</div>
                                        </div>
                                    </div>
                                    <!--end::Stat-->

                                    <!--begin::Stat-->
                                    <div class="stats-glass min-w-150px py-4 px-5 me-4 mb-4">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="bg-white bg-opacity-20 rounded-circle p-3 me-3">
                                                <i class="ki-duotone ki-verify fs-2 text-white">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <div class="fs-2hx fw-bold text-white">{{ $familyMembers->where('status_aktif', true)->count() }}</div>
                                        </div>
                                        <div class="text-center">
                                            <div class="fw-bold text-white fs-7" style="opacity: 0.8;">AKTIF</div>
                                            <div class="fw-semibold text-white fs-8" style="opacity: 0.6;">Orang</div>
                                        </div>
                                    </div>
                                    <!--end::Stat-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Family Header Content-->

                <!--begin::Action Toolbar-->
                <div class="d-flex flex-wrap flex-stack mt-8">
                    <div class="d-flex flex-column flex-grow-1 pe-8">
                        <div class="d-flex flex-wrap">
                            <a href="{{ route('data-warga.index') }}" class="btn btn-light-info me-3 mb-3 btn-enhanced">
                                <i class="ki-duotone ki-arrow-left fs-4 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Kembali ke Daftar
                            </a>

                            <button class="btn btn-success me-3 mb-3 btn-enhanced" onclick="exportFamilyData()">
                                <i class="ki-duotone ki-file-down fs-4 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Export Data Keluarga
                            </button>

                            <button class="btn btn-primary me-3 mb-3 btn-enhanced" onclick="printFamilyCard()">
                                <i class="ki-duotone ki-printer fs-4 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Cetak Kartu Keluarga
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Family Header-->

        <!--begin::Content Cards-->
        <div class="row g-6 g-xxl-8">
            <!--begin::Address Card-->
            <div class="col-12 col-xl-4 col-xxl-4 fade-in fade-in-delay-1">
                <div class="address-card mb-8">
                    <div class="d-flex align-items-center mb-4">
                        <div class="symbol symbol-50px me-4">
                            <div class="symbol-label bg-primary">
                                <i class="ki-duotone ki-map fs-2x text-white">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </div>
                        </div>
                        <div>
                            <h3 class="fw-bold text-dark mb-1">Alamat Keluarga</h3>
                            <div class="text-muted fw-semibold">Informasi tempat tinggal</div>
                        </div>
                    </div>

                    @if($kepalaKeluarga)
                        <div class="mb-3">
                            <div class="fw-bold text-dark fs-6">{{ $kepalaKeluarga->alamat ?: '-' }}</div>
                        </div>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="text-muted small">RT/RW</div>
                                <div class="fw-semibold text-dark">{{ $kepalaKeluarga->rt_rw ?: '-' }}</div>
                            </div>
                            <div class="col-6">
                                <div class="text-muted small">Dusun</div>
                                <div class="fw-semibold text-dark">{{ $kepalaKeluarga->dusun ?: '-' }}</div>
                            </div>
                            <div class="col-6">
                                <div class="text-muted small">Desa</div>
                                <div class="fw-semibold text-dark">{{ $kepalaKeluarga->desa ?: '-' }}</div>
                            </div>
                            <div class="col-6">
                                <div class="text-muted small">Kecamatan</div>
                                <div class="fw-semibold text-dark">{{ $kepalaKeluarga->kecamatan ?: '-' }}</div>
                            </div>
                            <div class="col-12">
                                <div class="text-muted small">Kabupaten, Provinsi</div>
                                <div class="fw-semibold text-dark">{{ $kepalaKeluarga->kabupaten ?: '-' }}, {{ $kepalaKeluarga->provinsi ?: '-' }}</div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <i class="ki-duotone ki-information fs-3x text-muted mb-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <div class="text-muted">Data alamat tidak tersedia</div>
                        </div>
                    @endif
                </div>

                <!--begin::Quick Stats-->
                <div class="row g-4 fade-in fade-in-delay-2">
                    <div class="col-6">
                        <div class="stat-card">
                            <div class="stat-number">{{ $familyMembers->where('jenis_kelamin', 'Laki-laki')->count() + $familyMembers->where('jenis_kelamin', 'L')->count() }}</div>
                            <div class="stat-label">Laki-laki</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-card">
                            <div class="stat-number">{{ $familyMembers->where('jenis_kelamin', 'Perempuan')->count() + $familyMembers->where('jenis_kelamin', 'P')->count() }}</div>
                            <div class="stat-label">Perempuan</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-card">
                            <div class="stat-number">{{ $familyMembers->where('status_aktif', true)->count() }}</div>
                            <div class="stat-label">Aktif</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-card">
                            <div class="stat-number">{{ $familyMembers->where('status_aktif', false)->count() }}</div>
                            <div class="stat-label">Tidak Aktif</div>
                        </div>
                    </div>
                </div>
                <!--end::Quick Stats-->
            </div>
            <!--end::Address Card-->

            <!--begin::Family Members-->
            <div class="col-12 col-xl-8 col-xxl-8 fade-in fade-in-delay-3">
                <div class="d-flex justify-content-between align-items-center mb-6">
                    <div>
                        <h2 class="fw-bold text-dark mb-1">Anggota Keluarga</h2>
                        <div class="text-muted fw-semibold">Daftar seluruh anggota keluarga</div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge badge-light-primary fs-6 fw-bold px-4 py-2">
                            {{ $familyMembers->count() }} Orang
                        </span>
                    </div>
                </div>

                <div class="row g-4">
                    @foreach($familyMembers as $index => $member)
                        <div class="col-12 fade-in" style="animation-delay: {{ ($index + 4) * 0.1 }}s;">
                            <div class="member-card {{ $member->is_kepala_keluarga ? 'kepala-keluarga' : '' }}">
                                <div class="card-body p-6" style="position: relative; z-index: 2;">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            @if($member->foto)
                                                <img src="{{ asset('storage/' . $member->foto) }}"
                                                     alt="Foto {{ $member->nama_lengkap }}"
                                                     class="member-photo">
                                            @else
                                                <div class="member-photo bg-light-primary d-flex align-items-center justify-content-center">
                                                    <div class="text-center">
                                                        <i class="ki-duotone ki-user fs-2x text-primary">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <div class="fs-8 text-primary fw-bold mt-1">{{ strtoupper(substr($member->nama_lengkap, 0, 2)) }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-md-7">
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fw-bold text-dark mb-0 me-3">{{ $member->nama_lengkap }}</h4>
                                                @if($member->is_kepala_keluarga)
                                                    <span class="badge badge-success fs-7 fw-bold px-3 py-2">
                                                        <i class="ki-duotone ki-crown fs-6 me-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        Kepala Keluarga
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="row g-4">
                                                <div class="col-6">
                                                    <div class="text-muted small fw-semibold">NIK</div>
                                                    <div class="fw-bold text-dark">{{ $member->nik }}</div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-muted small fw-semibold">Jenis Kelamin</div>
                                                    <span class="badge badge-light-{{ $member->jenis_kelamin == 'Laki-laki' || $member->jenis_kelamin == 'L' ? 'primary' : 'danger' }} fw-bold">
                                                        {{ $member->jenis_kelamin }}
                                                    </span>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-muted small fw-semibold">Tempat, Tanggal Lahir</div>
                                                    <div class="fw-bold text-dark">
                                                        {{ $member->tempat_lahir ?: '-' }},
                                                        {{ $member->tanggal_lahir ? \Carbon\Carbon::parse($member->tanggal_lahir)->format('d M Y') : '-' }}
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-muted small fw-semibold">Usia</div>
                                                    <span class="badge badge-light-info fw-bold">
                                                        {{ $member->tanggal_lahir ? \Carbon\Carbon::parse($member->tanggal_lahir)->age . ' tahun' : '-' }}
                                                    </span>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-muted small fw-semibold">Pekerjaan</div>
                                                    <div class="fw-bold text-dark">{{ $member->mata_pencaharian == 'DLL' ? 'Lain-Lain' : ($member->mata_pencaharian ?: '-') }}</div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-muted small fw-semibold">Status</div>
                                                    <span class="badge badge-light-{{ $member->status_aktif ? 'success' : 'danger' }} fw-bold">
                                                        {{ $member->status_aktif ? 'Aktif' : 'Tidak Aktif' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 text-end">
                                            <div class="d-flex flex-column gap-2">
                                                <a href="{{ route('data-warga.show', $member) }}"
                                                   class="btn btn-light-primary btn-enhanced">
                                                    <i class="ki-duotone ki-eye fs-6 me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                    Detail
                                                </a>
                                                <a href="{{ route('data-warga.edit', $member) }}"
                                                   class="btn btn-light-warning btn-enhanced">
                                                    <i class="ki-duotone ki-pencil fs-6 me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Edit
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!--end::Family Members-->
        </div>
        <!--end::Content Cards-->

        <!--begin::Action Toolbar-->
        <div class="card mt-8 fade-in fade-in-delay-4">
            <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                <div class="d-flex flex-wrap flex-center pb-lg-0">
                    <a href="{{ route('data-warga.index') }}" class="btn btn-light-primary me-3 mb-3 btn-enhanced">
                        <i class="ki-duotone ki-arrow-left fs-2 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Kembali ke Daftar Warga
                    </a>
                </div>
            </div>
        </div>
        <!--end::Action Toolbar-->

    </div>
</div>
<!--end::Content-->
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Add stagger animation to member cards
    $('.member-card').each(function(index) {
        $(this).css('animation-delay', (index * 0.1) + 's');
    });
});

// Export family data function
function exportFamilyData() {
    Swal.fire({
        title: 'Export Data Keluarga',
        text: 'Pilih format file yang diinginkan',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Excel',
        cancelButtonText: 'PDF',
        showDenyButton: true,
        denyButtonText: 'CSV',
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger',
            denyButton: 'btn btn-primary'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `/export/family/{{ $noKK }}/excel`;
        } else if (result.isDismissed && result.dismiss === Swal.DismissReason.cancel) {
            window.location.href = `/export/family/{{ $noKK }}/pdf`;
        } else if (result.isDenied) {
            window.location.href = `/export/family/{{ $noKK }}/csv`;
        }
    });
}

// Print family card function
function printFamilyCard() {
    Swal.fire({
        title: 'Menyiapkan Kartu Keluarga',
        html: `
            <div class="text-center">
                <div class="spinner-border text-primary mb-3" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mb-2 fw-bold">Sedang memproses kartu keluarga...</p>
                <p class="text-muted small">Mohon tunggu sebentar</p>
            </div>
        `,
        showConfirmButton: false,
        allowOutsideClick: false,
        timer: 2000
    }).then(() => {
        // Here you would implement the actual print functionality
        window.print();
    });
}
</script>
@endpush