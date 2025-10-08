@extends('layouts.dashboard.dashboard')

@section('title', 'Detail Data Warga')

@section('menu')
    Detail Data Warga
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
    <li class="breadcrumb-item text-muted">Detail</li>
@endsection

@push('styles')
<style>
/* Modern Profile View Styling */
.profile-container {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 1.5rem;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    position: relative;
    overflow: hidden;
}

.profile-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.3;
}

.profile-avatar {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    border: 6px solid rgba(255,255,255,0.3);
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    object-fit: cover;
    transition: all 0.3s ease;
}

.profile-avatar:hover {
    transform: scale(1.05);
    border-color: rgba(255,255,255,0.6);
}

.info-card {
    background: white;
    border-radius: 1.5rem;
    padding: 2rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.info-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    transition: width 0.3s ease;
}

.info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.12);
}

.info-card:hover::before {
    width: 8px;
}

.info-card .card-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-bottom: 1rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: white;
    border-radius: 1rem;
    padding: 1.5rem;
    text-align: center;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stat-card::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.timeline-item {
    position: relative;
    padding-left: 3rem;
    padding-bottom: 2rem;
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: 1rem;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.timeline-item::after {
    content: '';
    position: absolute;
    left: 0.5rem;
    top: 0.5rem;
    width: 1rem;
    height: 1rem;
    border-radius: 50%;
    background: #667eea;
    box-shadow: 0 0 0 4px white, 0 0 0 6px #667eea;
}

.timeline-item:last-child::before {
    display: none;
}

.action-buttons {
    position: sticky;
    bottom: 2rem;
    z-index: 100;
    text-align: center;
}

.btn-enhanced {
    padding: 1rem 2rem;
    border-radius: 1rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.btn-enhanced:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

/* Badge Enhancements */
.badge-enhanced {
    padding: 0.5rem 1rem;
    border-radius: 1rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

/* Responsive */
@media (max-width: 768px) {
    .profile-container {
        padding: 1rem;
    }

    .profile-avatar {
        width: 150px;
        height: 150px;
    }

    .info-card {
        padding: 1.5rem;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }
}

/* Animation keyframes */
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

.animate-in {
    animation: fadeInUp 0.6s ease forwards;
}

.animate-delay-1 { animation-delay: 0.1s; }
.animate-delay-2 { animation-delay: 0.2s; }
.animate-delay-3 { animation-delay: 0.3s; }
.animate-delay-4 { animation-delay: 0.4s; }
</style>
@endpush

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Profil Warga
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('data-warga.index') }}" class="text-muted text-hover-primary">Data Warga</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">{{ $dataWarga->nama_lengkap }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            <!--begin::Profile Header-->
            <div class="profile-container animate-in">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-4 text-center mb-4 mb-lg-0">
                        @if($dataWarga->foto)
                            <img src="{{ asset('storage/' . $dataWarga->foto) }}"
                                 alt="{{ $dataWarga->nama_lengkap }}"
                                 class="profile-avatar">
                        @else
                            <div class="profile-avatar bg-light d-flex align-items-center justify-content-center mx-auto">
                                <i class="ki-duotone ki-user fs-3x text-muted">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-8 text-center text-lg-start">
                        <h1 class="text-white fw-bold fs-1 mb-3">{{ $dataWarga->nama_lengkap }}</h1>
                        <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3 mb-4">
                            <span class="badge badge-enhanced bg-white text-dark">
                                <i class="ki-duotone ki-badge me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                {{ $dataWarga->nik }}
                            </span>
                            <span class="badge badge-enhanced {{ $dataWarga->jenis_kelamin == 'Laki-laki' ? 'bg-primary' : 'bg-danger' }}">
                                <i class="ki-duotone ki-{{ $dataWarga->jenis_kelamin == 'Laki-laki' ? 'user' : 'user' }} me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                {{ $dataWarga->jenis_kelamin }}
                            </span>
                            @if($dataWarga->is_kepala_keluarga)
                                <span class="badge badge-enhanced bg-warning">
                                    <i class="ki-duotone ki-crown me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Kepala Keluarga
                                </span>
                            @endif
                        </div>

                        <div class="row text-center text-lg-start">
                            <div class="col-md-4 mb-3">
                                <div class="text-white opacity-75 fs-7">Usia</div>
                                <div class="text-white fw-bold fs-4">
                                    @if($dataWarga->tanggal_lahir && $dataWarga->tanggal_lahir instanceof \Carbon\Carbon)
                                        {{ $dataWarga->tanggal_lahir->age }} tahun
                                    @elseif($dataWarga->tanggal_lahir && is_string($dataWarga->tanggal_lahir))
                                        {{ \Carbon\Carbon::parse($dataWarga->tanggal_lahir)->age }} tahun
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="text-white opacity-75 fs-7">Pekerjaan</div>
                                <div class="text-white fw-bold fs-4">{{ $dataWarga->mata_pencaharian ? ($dataWarga->mata_pencaharian == 'DLL' ? 'Lain-Lain' : $dataWarga->mata_pencaharian) : ($dataWarga->pekerjaan ?? '-') }}</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="text-white opacity-75 fs-7">Dusun</div>
                                <div class="text-white fw-bold fs-4">{{ $dataWarga->dusun }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Profile Header-->

            <!--begin::Quick Stats-->
            <div class="stats-grid animate-in animate-delay-1">
                <div class="stat-card">
                    <div class="fs-2 fw-bold text-primary mb-2">
                        @if($dataWarga->tanggal_lahir && $dataWarga->tanggal_lahir instanceof \Carbon\Carbon)
                            {{ $dataWarga->tanggal_lahir->age }}
                        @elseif($dataWarga->tanggal_lahir && is_string($dataWarga->tanggal_lahir))
                            {{ \Carbon\Carbon::parse($dataWarga->tanggal_lahir)->age }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="text-muted">Tahun</div>
                    <div class="text-gray-600 fs-7">Usia</div>
                </div>

                <div class="stat-card">
                    <div class="fs-2 fw-bold text-success mb-2">
                        @if($dataWarga->created_at && $dataWarga->created_at instanceof \Carbon\Carbon)
                            {{ $dataWarga->created_at->diffForHumans() }}
                        @elseif($dataWarga->created_at && is_string($dataWarga->created_at))
                            {{ \Carbon\Carbon::parse($dataWarga->created_at)->diffForHumans() }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="text-muted">Terdaftar</div>
                    <div class="text-gray-600 fs-7">Sejak</div>
                </div>

                <div class="stat-card">
                    <div class="fs-2 fw-bold text-warning mb-2">
                        @if($dataWarga->status_aktif)
                            Aktif
                        @else
                            Tidak Aktif
                        @endif
                    </div>
                    <div class="text-muted">Status</div>
                    <div class="text-gray-600 fs-7">Kependudukan</div>
                </div>

                <div class="stat-card">
                    <div class="fs-2 fw-bold text-info mb-2">
                        @if($dataWarga->updated_at && $dataWarga->updated_at instanceof \Carbon\Carbon)
                            {{ $dataWarga->updated_at->diffForHumans() }}
                        @elseif($dataWarga->updated_at && is_string($dataWarga->updated_at))
                            {{ \Carbon\Carbon::parse($dataWarga->updated_at)->diffForHumans() }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="text-muted">Diperbarui</div>
                    <div class="text-gray-600 fs-7">Terakhir</div>
                </div>
            </div>
            <!--end::Quick Stats-->

            <div class="row g-5">
                <!--begin::Left Column-->
                <div class="col-lg-4">

                    <!--begin::Personal Info Card-->
                    <div class="info-card animate-in animate-delay-2">
                        <div class="card-icon">
                            <i class="ki-duotone ki-profile-circle">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </div>
                        <h4 class="fw-bold text-dark mb-4">Informasi Personal</h4>

                        <div class="row g-3">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Tempat Lahir:</span>
                                    <span class="fw-bold">{{ $dataWarga->tempat_lahir ?: '-' }}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Tanggal Lahir:</span>
                                    <span class="fw-bold">
                                        @if($dataWarga->tanggal_lahir && $dataWarga->tanggal_lahir instanceof \Carbon\Carbon)
                                            {{ $dataWarga->tanggal_lahir->format('d F Y') }}
                                        @elseif($dataWarga->tanggal_lahir && is_string($dataWarga->tanggal_lahir))
                                            {{ \Carbon\Carbon::parse($dataWarga->tanggal_lahir)->format('d F Y') }}
                                        @else
                                            -
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Agama:</span>
                                    <span class="fw-bold">{{ $dataWarga->agama ?: '-' }}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Status Perkawinan:</span>
                                    <span class="fw-bold">{{ $dataWarga->status_perkawinan ?: '-' }}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Kewarganegaraan:</span>
                                    <span class="fw-bold">{{ $dataWarga->kewarganegaraan ?: '-' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Personal Info Card-->

                    <!--begin::Contact Info Card-->
                    <div class="info-card animate-in animate-delay-3">
                        <div class="card-icon">
                            <i class="ki-duotone ki-sms">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <h4 class="fw-bold text-dark mb-4">Kontak & Dokumen</h4>

                        <div class="row g-3">
                            @if($dataWarga->email)
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Email:</span>
                                    <span class="fw-bold">{{ $dataWarga->email }}</span>
                                </div>
                            </div>
                            @endif
                            @if($dataWarga->no_kk)
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">No. KK:</span>
                                    <span class="fw-bold">{{ $dataWarga->no_kk }}</span>
                                </div>
                            </div>
                            @endif
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Login Aktif:</span>
                                    <span class="badge {{ $dataWarga->email ? 'badge-light-success' : 'badge-light-secondary' }}">
                                        {{ $dataWarga->email ? 'Ya' : 'Tidak' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Contact Info Card-->

                </div>
                <!--end::Left Column-->

                <!--begin::Right Column-->
                <div class="col-lg-8">

                    <!--begin::Location Info Card-->
                    <div class="info-card animate-in animate-delay-2">
                        <div class="card-icon">
                            <i class="ki-duotone ki-geolocation">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <h4 class="fw-bold text-dark mb-4">Informasi Alamat</h4>

                        <div class="row g-4">
                            <div class="col-12">
                                <label class="text-muted fs-7">Alamat Lengkap</label>
                                <div class="fw-bold text-dark">{{ $dataWarga->alamat }}</div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted fs-7">RT/RW</label>
                                <div class="fw-bold text-dark">{{ $dataWarga->rt_rw ?: '-' }}</div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted fs-7">Dusun</label>
                                <div class="fw-bold text-dark">{{ $dataWarga->dusun }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="text-muted fs-7">Desa</label>
                                <div class="fw-bold text-dark">{{ $dataWarga->desa }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="text-muted fs-7">Kecamatan</label>
                                <div class="fw-bold text-dark">{{ $dataWarga->kecamatan }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="text-muted fs-7">Kabupaten</label>
                                <div class="fw-bold text-dark">{{ $dataWarga->kabupaten }}</div>
                            </div>

                            <div class="col-md-12">
                                <label class="text-muted fs-7">Provinsi</label>
                                <div class="fw-bold text-dark">{{ $dataWarga->provinsi }}</div>
                            </div>
                        </div>
                    </div>
                    <!--end::Location Info Card-->

                    <!--begin::Professional Info Card-->
                    <div class="info-card animate-in animate-delay-3">
                        <div class="card-icon">
                            <i class="ki-duotone ki-briefcase">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <h4 class="fw-bold text-dark mb-4">Informasi Profesi & Pendidikan</h4>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="text-muted fs-7">Pekerjaan</label>
                                <div class="fw-bold text-dark fs-5">{{ $dataWarga->mata_pencaharian ? ($dataWarga->mata_pencaharian == 'DLL' ? 'Lain-Lain' : $dataWarga->mata_pencaharian) : ($dataWarga->pekerjaan ?? '-') }}</div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted fs-7">Pendidikan Terakhir</label>
                                <div class="fw-bold text-dark fs-5">{{ $dataWarga->pendidikan }}</div>
                            </div>
                        </div>
                    </div>
                    <!--end::Professional Info Card-->

                    <!--begin::Activity Timeline-->
                    <div class="info-card animate-in animate-delay-4">
                        <div class="card-icon">
                            <i class="ki-duotone ki-timeline">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <h4 class="fw-bold text-dark mb-4">Timeline Aktivitas</h4>

                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="fw-bold text-dark">Data Warga Dibuat</div>
                                <div class="text-muted">
                                    @if($dataWarga->created_at && $dataWarga->created_at instanceof \Carbon\Carbon)
                                        {{ $dataWarga->created_at->format('d F Y, H:i') }}
                                    @elseif($dataWarga->created_at && is_string($dataWarga->created_at))
                                        {{ \Carbon\Carbon::parse($dataWarga->created_at)->format('d F Y, H:i') }}
                                    @else
                                        Tidak diketahui
                                    @endif
                                </div>
                                <div class="text-gray-600 fs-7 mt-1">
                                    Warga terdaftar dalam sistem untuk pertama kali
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="fw-bold text-dark">Terakhir Diperbarui</div>
                                <div class="text-muted">
                                    @if($dataWarga->updated_at && $dataWarga->updated_at instanceof \Carbon\Carbon)
                                        {{ $dataWarga->updated_at->format('d F Y, H:i') }}
                                    @elseif($dataWarga->updated_at && is_string($dataWarga->updated_at))
                                        {{ \Carbon\Carbon::parse($dataWarga->updated_at)->format('d F Y, H:i') }}
                                    @else
                                        Tidak diketahui
                                    @endif
                                </div>
                                <div class="text-gray-600 fs-7 mt-1">
                                    @if($dataWarga->updated_at && $dataWarga->created_at && $dataWarga->updated_at instanceof \Carbon\Carbon && $dataWarga->created_at instanceof \Carbon\Carbon && $dataWarga->updated_at->gt($dataWarga->created_at))
                                        Data warga mengalami perubahan informasi
                                    @else
                                        Belum ada perubahan sejak pendaftaran
                                    @endif
                                </div>
                            </div>

                            @if($dataWarga->email)
                            <div class="timeline-item">
                                <div class="fw-bold text-dark">Akun Login Aktif</div>
                                <div class="text-muted">
                                    @if($dataWarga->email_verified_at && $dataWarga->email_verified_at instanceof \Carbon\Carbon)
                                        {{ $dataWarga->email_verified_at->format('d F Y, H:i') }}
                                    @elseif($dataWarga->email_verified_at && is_string($dataWarga->email_verified_at))
                                        {{ \Carbon\Carbon::parse($dataWarga->email_verified_at)->format('d F Y, H:i') }}
                                    @else
                                        Email belum diverifikasi
                                    @endif
                                </div>
                                <div class="text-gray-600 fs-7 mt-1">
                                    Warga dapat mengakses sistem dengan akun {{ $dataWarga->email }}
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <!--end::Activity Timeline-->

                </div>
                <!--end::Right Column-->
            </div>

            <!--begin::Action Buttons-->
            <div class="action-buttons animate-in animate-delay-4">
                <div class="d-flex justify-content-center gap-4 flex-wrap">
                    <a href="{{ route('data-warga.index') }}" class="btn btn-light-primary btn-enhanced">
                        <i class="ki-duotone ki-arrow-left fs-5 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Kembali ke Daftar
                    </a>

                    <a href="{{ url('manajemen-data-warga/' . $dataWarga->id . '/edit') }}" class="btn btn-primary btn-enhanced">
                        <i class="ki-duotone ki-pencil fs-5 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Edit Data
                    </a>

                    <button type="button" class="btn btn-success btn-enhanced" onclick="printProfile()">
                        <i class="ki-duotone ki-printer fs-5 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                        </i>
                        Cetak Profil
                    </button>
                </div>
            </div>
            <!--end::Action Buttons-->

        </div>
    </div>
    <!--end::Content-->
</div>
@endsection

@push('scripts')
<script>
// Enhanced Show Page JavaScript
$(document).ready(function() {
    // Initialize animations
    initializeAnimations();

    // Initialize enhanced features
    initializeHoverEffects();
    initializeTooltips();

    // Auto-scroll to sections on page load
    setTimeout(() => {
        if (window.location.hash) {
            $('html, body').animate({
                scrollTop: $(window.location.hash).offset().top - 100
            }, 500);
        }
    }, 1000);
});

function initializeAnimations() {
    // Stagger animation for cards
    $('.animate-in').each(function(index) {
        $(this).css({
            'opacity': '0',
            'transform': 'translateY(30px)'
        });

        setTimeout(() => {
            $(this).css({
                'opacity': '1',
                'transform': 'translateY(0)',
                'transition': 'all 0.6s ease-out'
            });
        }, 200 + (index * 100));
    });

    // Profile avatar animation
    setTimeout(() => {
        $('.profile-avatar').addClass('animate-in');
    }, 500);
}

function initializeHoverEffects() {
    // Enhanced card hover effects
    $('.info-card').hover(
        function() {
            $(this).find('.card-icon').css({
                'transform': 'scale(1.1) rotate(5deg)',
                'transition': 'all 0.3s ease'
            });
        },
        function() {
            $(this).find('.card-icon').css({
                'transform': 'scale(1) rotate(0deg)',
                'transition': 'all 0.3s ease'
            });
        }
    );

    // Stat card hover effects
    $('.stat-card').hover(
        function() {
            $(this).css({
                'border-left': '4px solid #667eea',
                'transition': 'all 0.3s ease'
            });
        },
        function() {
            $(this).css({
                'border-left': 'none',
                'transition': 'all 0.3s ease'
            });
        }
    );

    // Timeline item hover effects
    $('.timeline-item').hover(
        function() {
            $(this).find('::after').css({
                'background': '#764ba2',
                'transform': 'scale(1.2)',
                'transition': 'all 0.3s ease'
            });
        },
        function() {
            $(this).find('::after').css({
                'background': '#667eea',
                'transform': 'scale(1)',
                'transition': 'all 0.3s ease'
            });
        }
    );
}

function initializeTooltips() {
    // Add tooltips to badges
    $('.badge-enhanced').each(function() {
        const text = $(this).text().trim();
        $(this).attr('title', `Status: ${text}`);
        $(this).tooltip();
    });

    // Add tooltips to action buttons
    $('[href*="edit"]').attr('title', 'Edit data warga ini');
    $('[onclick*="print"]').attr('title', 'Cetak profil warga');

    // Initialize all tooltips
    $('[data-bs-toggle="tooltip"]').tooltip();
}

// Print Profile Function
function printProfile() {
    // Show loading
    Swal.fire({
        title: 'Menyiapkan Dokumen...',
        text: 'Mohon tunggu sebentar',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showConfirmButton: false,
        willOpen: () => {
            Swal.showLoading();
        }
    });

    // Create printable content
    const printContent = generatePrintableContent();

    // Create new window for printing
    const printWindow = window.open('', '_blank');
    printWindow.document.write(printContent);
    printWindow.document.close();

    // Wait for content to load, then print
    setTimeout(() => {
        printWindow.print();
        printWindow.close();

        Swal.fire({
            title: 'Berhasil!',
            text: 'Profil warga siap dicetak',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    }, 1000);
}

function generatePrintableContent() {
    const wargaName = "{{ $dataWarga->nama_lengkap }}";
    const wargaNIK = "{{ $dataWarga->nik }}";
    const wargaGender = "{{ $dataWarga->jenis_kelamin }}";
    const wargaAge = "{{ $dataWarga->tanggal_lahir && $dataWarga->tanggal_lahir instanceof \Carbon\Carbon ? $dataWarga->tanggal_lahir->age : ($dataWarga->tanggal_lahir && is_string($dataWarga->tanggal_lahir) ? \Carbon\Carbon::parse($dataWarga->tanggal_lahir)->age : '-') }}";
    const wargaJob = "{{ $dataWarga->mata_pencaharian ? ($dataWarga->mata_pencaharian == 'DLL' ? 'Lain-Lain' : $dataWarga->mata_pencaharian) : ($dataWarga->pekerjaan ?? '-') }}";
    const wargaEducation = "{{ $dataWarga->pendidikan }}";
    const wargaAddress = "{{ $dataWarga->alamat }}";
    const wargaDusun = "{{ $dataWarga->dusun }}";
    const wargaPhoto = "{{ $dataWarga->foto ? asset('storage/' . $dataWarga->foto) : '' }}";
    const printDate = new Date().toLocaleDateString('id-ID', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });

    return `
        <!DOCTYPE html>
        <html>
        <head>
            <title>Profil Warga - ${wargaName}</title>
            <style>
                body {
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    margin: 0;
                    padding: 20px;
                    background: white;
                    color: #333;
                }
                .header {
                    text-align: center;
                    border-bottom: 3px solid #667eea;
                    padding-bottom: 20px;
                    margin-bottom: 30px;
                }
                .header h1 {
                    color: #667eea;
                    margin: 0;
                    font-size: 28px;
                }
                .header p {
                    color: #666;
                    margin: 5px 0;
                }
                .profile-section {
                    display: flex;
                    align-items: center;
                    margin-bottom: 30px;
                    padding: 20px;
                    border: 2px solid #f0f0f0;
                    border-radius: 10px;
                }
                .profile-photo {
                    width: 120px;
                    height: 120px;
                    border-radius: 50%;
                    margin-right: 30px;
                    object-fit: cover;
                    border: 3px solid #667eea;
                }
                .profile-info h2 {
                    color: #667eea;
                    margin: 0 0 10px 0;
                    font-size: 24px;
                }
                .profile-info p {
                    margin: 5px 0;
                    font-size: 16px;
                }
                .info-grid {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 20px;
                    margin-bottom: 30px;
                }
                .info-item {
                    padding: 15px;
                    border-left: 4px solid #667eea;
                    background: #f8f9fa;
                }
                .info-item label {
                    font-weight: bold;
                    color: #667eea;
                    display: block;
                    margin-bottom: 5px;
                }
                .info-item span {
                    color: #333;
                    font-size: 16px;
                }
                .footer {
                    text-align: center;
                    margin-top: 40px;
                    padding-top: 20px;
                    border-top: 2px solid #f0f0f0;
                    color: #666;
                }
                @media print {
                    body { margin: 0; }
                    .header { page-break-inside: avoid; }
                    .profile-section { page-break-inside: avoid; }
                }
            </style>
        </head>
        <body>
            <div class="header">
                <h1>PROFIL WARGA</h1>
                <p>Desa Ketapang Baru, Kecamatan Sukaraja</p>
                <p>Kabupaten Seluma, Provinsi Bengkulu</p>
            </div>

            <div class="profile-section">
                ${wargaPhoto ? `<img src="${wargaPhoto}" alt="Foto ${wargaName}" class="profile-photo">` : '<div class="profile-photo" style="background: #f0f0f0; display: flex; align-items: center; justify-content: center; color: #999;">Tidak ada foto</div>'}
                <div class="profile-info">
                    <h2>${wargaName}</h2>
                    <p><strong>NIK:</strong> ${wargaNIK}</p>
                    <p><strong>Jenis Kelamin:</strong> ${wargaGender}</p>
                    <p><strong>Usia:</strong> ${wargaAge} tahun</p>
                    <p><strong>Dusun:</strong> ${wargaDusun}</p>
                </div>
            </div>

            <div class="info-grid">
                <div class="info-item">
                    <label>Pekerjaan</label>
                    <span>${wargaJob}</span>
                </div>
                <div class="info-item">
                    <label>Pendidikan</label>
                    <span>${wargaEducation}</span>
                </div>
                <div class="info-item">
                    <label>Alamat Lengkap</label>
                    <span>${wargaAddress}</span>
                </div>
                <div class="info-item">
                    <label>Status</label>
                    <span>{{ $dataWarga->is_kepala_keluarga ? 'Kepala Keluarga' : 'Anggota Keluarga' }}</span>
                </div>
            </div>

            <div class="footer">
                <p>Dicetak pada: ${printDate}</p>
                <p>Dokumen ini digenerate otomatis oleh Sistem Smart Village</p>
            </div>
        </body>
        </html>
    `;
}

// Enhanced keyboard shortcuts
$(document).on('keydown', function(e) {
    // Ctrl+P for print
    if (e.ctrlKey && e.key === 'p') {
        e.preventDefault();
        printProfile();
    }

    // Ctrl+E for edit
    if (e.ctrlKey && e.key === 'e') {
        e.preventDefault();
        window.location.href = "{{ url('manajemen-data-warga/' . $dataWarga->id . '/edit') }}";
    }

    // Escape to go back
    if (e.key === 'Escape') {
        window.location.href = "{{ route('data-warga.index') }}";
    }
});

// Smooth scrolling for internal links
$('a[href^="#"]').on('click', function(e) {
    e.preventDefault();
    const target = $(this.getAttribute('href'));
    if (target.length) {
        $('html, body').animate({
            scrollTop: target.offset().top - 100
        }, 500);
    }
});

// Add floating action button on scroll
$(window).scroll(function() {
    if ($(this).scrollTop() > 200) {
        if (!$('.floating-back-btn').length) {
            $('body').append(`
                <button class="floating-back-btn" onclick="$('html, body').animate({scrollTop: 0}, 500);"
                        style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;
                               width: 50px; height: 50px; border-radius: 50%;
                               background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                               border: none; color: white; font-size: 18px;
                               box-shadow: 0 5px 15px rgba(0,0,0,0.2);
                               cursor: pointer; transition: all 0.3s ease;">
                    ↑
                </button>
            `);
        }
    } else {
        $('.floating-back-btn').remove();
    }
});

// Add hover effect to floating button
$(document).on('mouseenter', '.floating-back-btn', function() {
    $(this).css('transform', 'scale(1.1)');
});

$(document).on('mouseleave', '.floating-back-btn', function() {
    $(this).css('transform', 'scale(1)');
});
</script>
@endpush
