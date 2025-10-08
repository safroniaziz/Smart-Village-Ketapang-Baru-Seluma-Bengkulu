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
/* Metronic Professional Profile Styling */
.profile-header {
    position: relative;
    background: linear-gradient(135deg, #3E97FF 0%, #1B84FF 100%);
    border-radius: 0.75rem;
    overflow: hidden;
}

.profile-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.profile-avatar-wrapper {
    position: relative;
    display: inline-block;
}

.profile-avatar {
    width: 120px;
    height: 120px;
    border-radius: 0.75rem;
    border: 4px solid rgba(255,255,255,0.2);
    object-fit: cover;
    transition: all 0.3s ease;
    box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.15);
}

.profile-avatar:hover {
    transform: scale(1.02);
    border-color: rgba(255,255,255,0.4);
}

.profile-stats {
    display: flex;
    gap: 2rem;
    margin-top: 1.5rem;
}

.profile-stat {
    text-align: center;
    color: rgba(255,255,255,0.8);
}

.profile-stat-number {
    display: block;
    font-size: 1.5rem;
    font-weight: 700;
    color: white;
}

.profile-stat-label {
    font-size: 0.875rem;
    font-weight: 500;
    margin-top: 0.25rem;
}

/* Info Cards */
.info-section {
    background: #fff;
    border-radius: 0.75rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
    border: 1px solid #E4E6EA;
    transition: all 0.15s ease-in-out;
}

.info-section:hover {
    box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.info-section-header {
    padding: 1.5rem 1.5rem 0 1.5rem;
    border-bottom: 1px solid #E4E6EA;
    margin-bottom: 1.5rem;
}

.info-section-title {
    font-size: 1.125rem;
    font-weight: 700;
    color: #181C32;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
}

.info-section-icon {
    width: 2.25rem;
    height: 2.25rem;
    border-radius: 0.5rem;
    background: #F8F9FA;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 0.75rem;
    color: #7239EA;
}

.info-section-body {
    padding: 0 1.5rem 1.5rem 1.5rem;
}

.info-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid #F1F3F8;
}

.info-row:last-child {
    border-bottom: none;
}

.info-label {
    font-weight: 600;
    color: #5E6278;
    font-size: 0.875rem;
}

.info-value {
    font-weight: 600;
    color: #181C32;
    font-size: 0.875rem;
    text-align: right;
}

/* Stats Cards */
.stats-card {
    background: #fff;
    border-radius: 0.75rem;
    padding: 1.5rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
    border: 1px solid #E4E6EA;
    text-align: center;
    transition: all 0.15s ease-in-out;
    position: relative;
    overflow: hidden;
}

.stats-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(135deg, #3E97FF 0%, #1B84FF 100%);
}

.stats-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.1);
}

.stats-number {
    font-size: 2rem;
    font-weight: 700;
    color: #181C32;
    line-height: 1;
}

.stats-label {
    font-size: 0.875rem;
    font-weight: 600;
    color: #7239EA;
    margin-top: 0.5rem;
}

.stats-description {
    font-size: 0.75rem;
    color: #A1A5B7;
    margin-top: 0.25rem;
}

/* Timeline */
.timeline-container {
    position: relative;
}

.timeline-item {
    position: relative;
    padding-left: 3rem;
    padding-bottom: 1.5rem;
}

.timeline-item:not(:last-child)::before {
    content: '';
    position: absolute;
    left: 1.125rem;
    top: 2rem;
    bottom: -0.5rem;
    width: 2px;
    background: #E4E6EA;
}

.timeline-dot {
    position: absolute;
    left: 0.75rem;
    top: 0.75rem;
    width: 0.75rem;
    height: 0.75rem;
    background: #3E97FF;
    border-radius: 50%;
    border: 2px solid #fff;
    box-shadow: 0 0 0 3px rgba(62, 151, 255, 0.2);
}

.timeline-content {
    background: #F8F9FA;
    border-radius: 0.5rem;
    padding: 1rem;
    border-left: 3px solid #3E97FF;
}

.timeline-title {
    font-weight: 700;
    color: #181C32;
    font-size: 0.875rem;
    margin-bottom: 0.5rem;
}

.timeline-desc {
    color: #5E6278;
    font-size: 0.8125rem;
    margin-bottom: 0.5rem;
}

.timeline-time {
    color: #A1A5B7;
    font-size: 0.75rem;
    font-weight: 600;
}

/* Action Buttons */
.action-toolbar {
    background: #fff;
    border-radius: 0.75rem;
    padding: 1.5rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
    border: 1px solid #E4E6EA;
    text-align: center;
}

/* Badge Styles */
.badge-modern {
    font-weight: 600;
    font-size: 0.75rem;
    padding: 0.375rem 0.75rem;
    border-radius: 0.5rem;
}

/* Responsive */
@media (max-width: 768px) {
    .profile-stats {
        flex-direction: column;
        gap: 1rem;
    }
    
    .profile-stat {
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: left;
    }
}
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
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Profile Header-->
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        <!--begin::Info-->
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                @if($dataWarga->foto)
                                    <img src="{{ asset('storage/' . $dataWarga->foto) }}" alt="{{ $dataWarga->nama_lengkap }}" class="rounded-3">
                                @else
                                    <div class="symbol-label bg-light-primary text-primary rounded-3 fs-1">
                                        <i class="ki-duotone ki-user fs-2x">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                @endif
                                <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border-4 border-body h-20px w-20px"></div>
                            </div>
                        </div>
                        <!--end::Info-->

                        <!--begin::Wrapper-->
                        <div class="flex-grow-1">
                            <!--begin::Head-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::Details-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $dataWarga->nama_lengkap }}</a>
                                        @if($dataWarga->status_aktif)
                                            <i class="ki-duotone ki-verify fs-1 text-primary">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        @endif
                                    </div>
                                    <!--end::Name-->

                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>{{ $dataWarga->mata_pencaharian ? ($dataWarga->mata_pencaharian == 'DLL' ? 'Lain-Lain' : $dataWarga->mata_pencaharian) : '-' }}</a>

                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <i class="ki-duotone ki-geolocation fs-4 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>{{ $dataWarga->dusun }}, {{ $dataWarga->desa }}</a>

                                        @if($dataWarga->email)
                                        <a href="mailto:{{ $dataWarga->email }}" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                            <i class="ki-duotone ki-sms fs-4 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>{{ $dataWarga->email }}</a>
                                        @endif
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Head-->

                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $dataWarga->tanggal_lahir && $dataWarga->tanggal_lahir instanceof \Carbon\Carbon ? $dataWarga->tanggal_lahir->age : ($dataWarga->tanggal_lahir && is_string($dataWarga->tanggal_lahir) ? \Carbon\Carbon::parse($dataWarga->tanggal_lahir)->age : 0) }}" data-kt-initialized="1">
                                                    @if($dataWarga->tanggal_lahir && $dataWarga->tanggal_lahir instanceof \Carbon\Carbon)
                                                        {{ $dataWarga->tanggal_lahir->age }}
                                                    @elseif($dataWarga->tanggal_lahir && is_string($dataWarga->tanggal_lahir))
                                                        {{ \Carbon\Carbon::parse($dataWarga->tanggal_lahir)->age }}
                                                    @else
                                                        -
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="fw-semibold fs-6 text-gray-400">Usia (Tahun)</div>
                                        </div>
                                        <!--end::Stat-->

                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-calendar fs-3 text-primary me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="fs-2 fw-bold text-gray-800">
                                                    @if($dataWarga->created_at && $dataWarga->created_at instanceof \Carbon\Carbon)
                                                        {{ $dataWarga->created_at->format('Y') }}
                                                    @elseif($dataWarga->created_at && is_string($dataWarga->created_at))
                                                        {{ \Carbon\Carbon::parse($dataWarga->created_at)->format('Y') }}
                                                    @else
                                                        -
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="fw-semibold fs-6 text-gray-400">Terdaftar</div>
                                        </div>
                                        <!--end::Stat-->

                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <div class="d-flex align-items-center">
                                                @if($dataWarga->status_aktif)
                                                    <i class="ki-duotone ki-check-circle fs-3 text-success me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                @else
                                                    <i class="ki-duotone ki-cross-circle fs-3 text-danger me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                @endif
                                                <div class="fs-2 fw-bold text-gray-800">
                                                    {{ $dataWarga->status_aktif ? 'Aktif' : 'Non Aktif' }}
                                                </div>
                                            </div>
                                            <div class="fw-semibold fs-6 text-gray-400">Status</div>
                                        </div>
                                        <!--end::Stat-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Progress-->
                                <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                    <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                        <span class="fw-semibold fs-6 text-gray-400">Kelengkapan Profil</span>
                                        <span class="fw-bold fs-6">{{ $dataWarga->foto && $dataWarga->email && $dataWarga->tanggal_lahir ? '100' : ($dataWarga->foto || $dataWarga->email || $dataWarga->tanggal_lahir ? '75' : '50') }}%</span>
                                    </div>
                                    <div class="h-5px mx-3 w-100 bg-light mb-3">
                                        <div class="bg-success rounded h-5px" role="progressbar" style="width: {{ $dataWarga->foto && $dataWarga->email && $dataWarga->tanggal_lahir ? '100' : ($dataWarga->foto || $dataWarga->email || $dataWarga->tanggal_lahir ? '75' : '50') }}%" aria-valuenow="{{ $dataWarga->foto && $dataWarga->email && $dataWarga->tanggal_lahir ? '100' : ($dataWarga->foto || $dataWarga->email || $dataWarga->tanggal_lahir ? '75' : '50') }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Profile Header-->

                    <!--begin::Action Toolbar-->
                    <div class="d-flex flex-wrap flex-stack">
                        <div class="d-flex flex-column flex-grow-1 pe-8">
                            <div class="d-flex flex-wrap">
                                <a href="{{ route('data-warga.index') }}" class="btn btn-sm btn-light-primary me-3 mb-3">
                                    <i class="ki-duotone ki-arrow-left fs-4 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Kembali
                                </a>

                                <a href="{{ url('manajemen-data-warga/' . $dataWarga->id . '/edit') }}" class="btn btn-sm btn-primary me-3 mb-3">
                                    <i class="ki-duotone ki-pencil fs-4 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Edit Data
                                </a>

                                <button type="button" class="btn btn-sm btn-success me-3 mb-3" onclick="printProfile()">
                                    <i class="ki-duotone ki-printer fs-4 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                    </i>
                                    Cetak
                                </button>

                                <div class="btn-group me-3 mb-3" role="group">
                                    <button type="button" class="btn btn-sm btn-light-info dropdown-toggle" data-bs-toggle="dropdown">
                                        <i class="ki-duotone ki-setting-3 fs-4 me-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                        </i>
                                        Lainnya
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" onclick="shareProfile()">
                                            <i class="ki-duotone ki-send fs-5 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>Bagikan</a></li>
                                        <li><a class="dropdown-item text-danger" href="#" onclick="confirmDelete()">
                                            <i class="ki-duotone ki-trash fs-5 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>Hapus</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Action Toolbar-->
                </div>
            </div>
            <!--end::Profile Header-->

            <!--begin::Content Cards-->
            <div class="row g-5 g-xxl-8">
                <!--begin::Data Personal Card-->
                <div class="col-xxl-6">
                    <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">Data Personal</span>
                                <span class="text-muted fw-semibold fs-7">Informasi identitas diri</span>
                            </h3>
                        </div>
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold text-muted">NIK</td>
                                            <td class="text-end">
                                                <span class="badge badge-light-primary fs-7 fw-semibold">{{ $dataWarga->nik }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">No. KK</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $dataWarga->no_kk ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Jenis Kelamin</td>
                                            <td class="text-end">
                                                <span class="badge badge-light-{{ $dataWarga->jenis_kelamin == 'Laki-laki' ? 'primary' : 'danger' }} fs-7 fw-semibold">
                                                    {{ $dataWarga->jenis_kelamin }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Tempat Lahir</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $dataWarga->tempat_lahir ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Tanggal Lahir</td>
                                            <td class="text-end text-dark fw-bold fs-6">
                                                @if($dataWarga->tanggal_lahir && $dataWarga->tanggal_lahir instanceof \Carbon\Carbon)
                                                    {{ $dataWarga->tanggal_lahir->format('d M Y') }}
                                                @elseif($dataWarga->tanggal_lahir && is_string($dataWarga->tanggal_lahir))
                                                    {{ \Carbon\Carbon::parse($dataWarga->tanggal_lahir)->format('d M Y') }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Usia</td>
                                            <td class="text-end">
                                                @php
                                                    $age = 0;\n                                                    if($dataWarga->nik && strlen($dataWarga->nik) >= 16) {\n                                                        $year = substr($dataWarga->nik, 10, 2);\n                                                        $month = substr($dataWarga->nik, 8, 2);\n                                                        $day = substr($dataWarga->nik, 6, 2);\n                                                        \n                                                        // Handle century\n                                                        $currentYear = date('Y');\n                                                        $century = ($year <= 25) ? '20' : '19';\n                                                        $birthYear = $century . $year;\n                                                        \n                                                        $birthDate = \\Carbon\\Carbon::createFromDate($birthYear, $month, $day);\n                                                        $age = $birthDate->age;\n                                                    } elseif($dataWarga->tanggal_lahir) {\n                                                        if($dataWarga->tanggal_lahir instanceof \\Carbon\\Carbon) {\n                                                            $age = $dataWarga->tanggal_lahir->age;\n                                                        } elseif(is_string($dataWarga->tanggal_lahir)) {\n                                                            $age = \\Carbon\\Carbon::parse($dataWarga->tanggal_lahir)->age;\n                                                        }\n                                                    }
                                                @endphp
                                                <span class="badge badge-light-info fs-7 fw-semibold">{{ $age }} tahun</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Agama</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $dataWarga->agama ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Status Kawin</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $dataWarga->status_perkawinan ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Pendidikan</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $dataWarga->pendidikan ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Kewarganegaraan</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $dataWarga->kewarganegaraan ?: 'Indonesia' }}</td>
                                        </tr>
                                        @if($dataWarga->is_kepala_keluarga)
                                        <tr>
                                            <td class="fw-bold text-muted">Status Keluarga</td>
                                            <td class="text-end">
                                                <span class="badge badge-light-warning fs-7 fw-semibold">Kepala Keluarga</span>
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Data Personal Card-->

                <!--begin::Data Alamat Card-->
                <div class="col-xxl-6">
                    <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">Data Alamat</span>
                                <span class="text-muted fw-semibold fs-7">Informasi tempat tinggal</span>
                            </h3>
                        </div>
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold text-muted">Alamat</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $dataWarga->alamat ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">RT/RW</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $dataWarga->rt_rw ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Dusun</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $dataWarga->dusun ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Desa</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $dataWarga->desa ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Kecamatan</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $dataWarga->kecamatan ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Kabupaten</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $dataWarga->kabupaten ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Provinsi</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $dataWarga->provinsi ?: '-' }}</td>
                                        </tr>
                                        @if($dataWarga->lat && $dataWarga->long)
                                        <tr>
                                            <td class="fw-bold text-muted">Koordinat</td>
                                            <td class="text-end">
                                                <span class="badge badge-light-success fs-7 fw-semibold">{{ $dataWarga->lat }}, {{ $dataWarga->long }}</span>
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Data Alamat Card-->

                <!--begin::Tab Pane Details-->
                <div class="tab-pane fade" id="details" role="tabpanel">
                    <div class="row g-5 g-xxl-8">
                        <!--begin::Personal Info-->
                        <div class="col-xxl-6">
                            <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold fs-3 mb-1">Informasi Personal</span>
                                        <span class="text-muted fw-semibold fs-7">Data diri lengkap</span>
                                    </h3>
                                    <div class="card-toolbar">
                                        <div class="d-flex justify-content-end">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-user fs-2 text-gray-400 me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body py-3">
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Tempat Lahir</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $dataWarga->tempat_lahir ?: '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Tanggal Lahir</label>
                                        <div class="col-lg-8 fv-row">
                                            <span class="fw-semibold text-gray-800 fs-6">
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
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Agama</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $dataWarga->agama ?: '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Status Perkawinan</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $dataWarga->status_perkawinan ?: '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Kewarganegaraan</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $dataWarga->kewarganegaraan ?: 'Indonesia' }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Pendidikan Terakhir</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $dataWarga->pendidikan ?: '-' }}</span>
                                        </div>
                                    </div>
                                    @if($dataWarga->email)
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Email</label>
                                        <div class="col-lg-8">
                                            <a href="mailto:{{ $dataWarga->email }}" class="fw-semibold fs-6 text-gray-800 text-hover-primary">{{ $dataWarga->email }}</a>
                                        </div>
                                    </div>
                                    @endif
                                    @if($dataWarga->no_kk)
                                    <div class="row">
                                        <label class="col-lg-4 fw-semibold text-muted">No. Kartu Keluarga</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $dataWarga->no_kk }}</span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--end::Personal Info-->

                        <!--begin::Address Info-->
                        <div class="col-xxl-6">
                            <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold fs-3 mb-1">Informasi Alamat</span>
                                        <span class="text-muted fw-semibold fs-7">Domisili dan wilayah</span>
                                    </h3>
                                    <div class="card-toolbar">
                                        <div class="d-flex justify-content-end">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-geolocation fs-2 text-gray-400 me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body py-3">
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Alamat Lengkap</label>
                                        <div class="col-lg-8">
                                            <span class="fw-semibold text-gray-800 fs-6">{{ $dataWarga->alamat }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">RT/RW</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $dataWarga->rt_rw ?: '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Dusun</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $dataWarga->dusun }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Desa</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $dataWarga->desa }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Kecamatan</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $dataWarga->kecamatan }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Kabupaten</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $dataWarga->kabupaten }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-lg-4 fw-semibold text-muted">Provinsi</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $dataWarga->provinsi }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Address Info-->
                    </div>
                </div>
                <!--end::Tab Pane Details-->

                <!--begin::Tab Pane Timeline-->
                <div class="tab-pane fade" id="timeline" role="tabpanel">
                    <div class="card">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">Timeline Aktivitas</span>
                                <span class="text-muted fw-semibold fs-7">Riwayat perubahan data warga</span>
                            </h3>
                        </div>
                        <div class="card-body py-3">
                            <!--begin::Timeline-->
                            <div class="timeline-label">
                                <!--begin::Item-->
                                <div class="timeline-item">
                                    <div class="timeline-label fw-bold text-gray-800 fs-6">
                                        @if($dataWarga->created_at && $dataWarga->created_at instanceof \Carbon\Carbon)
                                            {{ $dataWarga->created_at->format('H:i') }}
                                        @elseif($dataWarga->created_at && is_string($dataWarga->created_at))
                                            {{ \Carbon\Carbon::parse($dataWarga->created_at)->format('H:i') }}
                                        @else
                                            --:--
                                        @endif
                                    </div>
                                    <div class="timeline-badge">
                                        <i class="ki-duotone ki-abstract-8 text-gray-400 fs-3">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                    <div class="fw-mormal timeline-content text-muted ps-3">
                                        <div class="fs-5 fw-semibold text-gray-800">Data Warga Dibuat</div>
                                        <div class="fs-6 text-gray-600">
                                            @if($dataWarga->created_at && $dataWarga->created_at instanceof \Carbon\Carbon)
                                                {{ $dataWarga->created_at->format('d F Y') }}
                                            @elseif($dataWarga->created_at && is_string($dataWarga->created_at))
                                                {{ \Carbon\Carbon::parse($dataWarga->created_at)->format('d F Y') }}
                                            @else
                                                Tidak diketahui
                                            @endif
                                        </div>
                                        <div class="fs-7 text-muted mt-2">Warga terdaftar dalam sistem untuk pertama kali</div>
                                    </div>
                                </div>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <div class="timeline-item">
                                    <div class="timeline-label fw-bold text-gray-800 fs-6">
                                        @if($dataWarga->updated_at && $dataWarga->updated_at instanceof \Carbon\Carbon)
                                            {{ $dataWarga->updated_at->format('H:i') }}
                                        @elseif($dataWarga->updated_at && is_string($dataWarga->updated_at))
                                            {{ \Carbon\Carbon::parse($dataWarga->updated_at)->format('H:i') }}
                                        @else
                                            --:--
                                        @endif
                                    </div>
                                    <div class="timeline-badge">
                                        <i class="ki-duotone ki-pencil text-warning fs-3">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                    <div class="timeline-content ps-3">
                                        <div class="fs-5 fw-semibold text-gray-800">Data Diperbarui</div>
                                        <div class="fs-6 text-gray-600">
                                            @if($dataWarga->updated_at && $dataWarga->updated_at instanceof \Carbon\Carbon)
                                                {{ $dataWarga->updated_at->format('d F Y') }}
                                            @elseif($dataWarga->updated_at && is_string($dataWarga->updated_at))
                                                {{ \Carbon\Carbon::parse($dataWarga->updated_at)->format('d F Y') }}
                                            @else
                                                Tidak diketahui
                                            @endif
                                        </div>
                                        <div class="fs-7 text-muted mt-2">
                                            @if($dataWarga->updated_at && $dataWarga->created_at && $dataWarga->updated_at instanceof \Carbon\Carbon && $dataWarga->created_at instanceof \Carbon\Carbon && $dataWarga->updated_at->gt($dataWarga->created_at))
                                                Data warga mengalami perubahan informasi
                                            @else
                                                Belum ada perubahan sejak pendaftaran
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--end::Item-->

                                @if($dataWarga->email)
                                <!--begin::Item-->
                                <div class="timeline-item">
                                    <div class="timeline-label fw-bold text-gray-800 fs-6">
                                        @if($dataWarga->email_verified_at && $dataWarga->email_verified_at instanceof \Carbon\Carbon)
                                            {{ $dataWarga->email_verified_at->format('H:i') }}
                                        @else
                                            --:--
                                        @endif
                                    </div>
                                    <div class="timeline-badge">
                                        <i class="ki-duotone ki-sms text-success fs-3">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                    <div class="timeline-content ps-3">
                                        <div class="fs-5 fw-semibold text-gray-800">Akun Login Aktif</div>
                                        <div class="fs-6 text-gray-600">
                                            @if($dataWarga->email_verified_at && $dataWarga->email_verified_at instanceof \Carbon\Carbon)
                                                {{ $dataWarga->email_verified_at->format('d F Y') }}
                                            @elseif($dataWarga->email_verified_at && is_string($dataWarga->email_verified_at))
                                                {{ \Carbon\Carbon::parse($dataWarga->email_verified_at)->format('d F Y') }}
                                            @else
                                                Email belum diverifikasi
                                            @endif
                                        </div>
                                        <div class="fs-7 text-muted mt-2">Warga dapat mengakses sistem dengan akun {{ $dataWarga->email }}</div>
                                    </div>
                                </div>
                                <!--end::Item-->
                                @endif
                            </div>
                            <!--end::Timeline-->
                        </div>
                    </div>
                </div>
                <!--end::Tab Pane Timeline-->
            </div>
            <!--end::Tab Content-->

            <!--begin::Action Toolbar-->
            <div class="card">
                <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                    <div class="d-flex flex-wrap flex-center pb-lg-0">
                        <a href="{{ route('data-warga.index') }}" class="btn btn-light-primary me-3 mb-3">
                            <i class="ki-duotone ki-arrow-left fs-2 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Kembali ke Daftar
                        </a>

                        <a href="{{ url('manajemen-data-warga/' . $dataWarga->id . '/edit') }}" class="btn btn-primary me-3 mb-3">
                            <i class="ki-duotone ki-pencil fs-2 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Edit Data Warga
                        </a>

                        <button type="button" class="btn btn-success me-3 mb-3" onclick="printProfile()">
                            <i class="ki-duotone ki-printer fs-2 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                            Cetak Profil
                        </button>

                        <div class="btn-group me-3 mb-3" role="group">
                            <button type="button" class="btn btn-light-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ki-duotone ki-share fs-2 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Aksi Lainnya
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" onclick="shareProfile()">
                                    <i class="ki-duotone ki-send fs-4 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>Bagikan Profil</a></li>
                                <li><a class="dropdown-item" href="#" onclick="downloadPDF()">
                                    <i class="ki-duotone ki-file-down fs-4 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>Download PDF</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="#" onclick="confirmDelete()">
                                    <i class="ki-duotone ki-trash fs-4 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                    </i>Hapus Data</a></li>
                            </ul>
                        </div>
                    </div>
                    <p class="fs-6 fw-semibold text-gray-600 py-lg-10 mb-0">
                        Kelola data warga dengan mudah dan professional. 
                        <a href="{{ route('data-warga.index') }}" class="link-primary fw-bold">Kembali ke daftar</a> 
                        untuk melihat data warga lainnya.
                    </p>
                </div>
            </div>
            <!--end::Action Toolbar-->

        </div>
    </div>
    <!--end::Content-->
</div>
@endsection

@push('scripts')
<script>
// Metronic Professional Show Page JavaScript
$(document).ready(function() {
    // Initialize tooltips
    initializeTooltips();
    
    // Initialize tab functionality
    initializeTabs();
    
    // Initialize professional interactions
    initializeProfessionalFeatures();
});

function initializeTooltips() {
    // Initialize Bootstrap tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
}

function initializeTabs() {
    // Auto-activate tab based on hash
    if (window.location.hash) {
        const tabId = window.location.hash.substring(1);
        const tabElement = document.querySelector(`[href="#${tabId}"]`);
        if (tabElement) {
            const tab = new bootstrap.Tab(tabElement);
            tab.show();
        }
    }

    // Update URL hash when tab changes
    $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        const targetId = $(e.target).attr('href').substring(1);
        history.replaceState(null, null, `#${targetId}`);
    });
}

function initializeProfessionalFeatures() {
    // Smooth card hover effects
    $('.card').hover(
        function() {
            $(this).addClass('shadow-sm').css('transition', 'all 0.3s ease');
        },
        function() {
            $(this).removeClass('shadow-sm');
        }
    );

    // Professional button animations
    $('.btn').hover(
        function() {
            $(this).css('transform', 'translateY(-1px)');
        },
        function() {
            $(this).css('transform', 'translateY(0)');
        }
    );
}

// Professional Print Profile Function
function printProfile() {
    Swal.fire({
        title: 'Cetak Profil Warga',
        text: 'Menyiapkan dokumen untuk dicetak...',
        icon: 'info',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Generate and print content
    setTimeout(() => {
        const printContent = generatePrintableContent();
        const printWindow = window.open('', '_blank', 'width=800,height=600');
        printWindow.document.write(printContent);
        printWindow.document.close();
        
        printWindow.onload = function() {
            printWindow.print();
            printWindow.close();
            
            Swal.fire({
                title: 'Berhasil!',
                text: 'Dokumen profil warga telah siap dicetak',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        };
    }, 1500);
}

// Share Profile Function
function shareProfile() {
    const shareData = {
        title: 'Profil Warga - {{ $dataWarga->nama_lengkap }}',
        text: 'Lihat profil lengkap {{ $dataWarga->nama_lengkap }} di sistem Smart Village',
        url: window.location.href
    };

    if (navigator.share) {
        navigator.share(shareData);
    } else {
        // Fallback - copy to clipboard
        navigator.clipboard.writeText(window.location.href).then(() => {
            Swal.fire({
                title: 'Link Disalin!',
                text: 'Link profil warga telah disalin ke clipboard',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        });
    }
}

// Download PDF Function
function downloadPDF() {
    Swal.fire({
        title: 'Generate PDF',
        text: 'Membuat file PDF dari profil warga...',
        icon: 'info',
        allowOutsideClick: false,
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Simulate PDF generation
    setTimeout(() => {
        Swal.fire({
            title: 'Segera Hadir!',
            text: 'Fitur download PDF akan segera tersedia',
            icon: 'info',
            confirmButtonText: 'OK'
        });
    }, 2000);
}

// Confirm Delete Function  
function confirmDelete() {
    Swal.fire({
        title: 'Hapus Data Warga?',
        text: 'Apakah Anda yakin ingin menghapus data {{ $dataWarga->nama_lengkap }}? Tindakan ini tidak dapat dibatalkan.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Create form for delete request
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ url("manajemen-data-warga/" . $dataWarga->id) }}';
            
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            
            form.appendChild(csrfToken);
            form.appendChild(methodField);
            document.body.appendChild(form);
            
            form.submit();
        }
    });
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

// Professional Keyboard Shortcuts
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

    // Number keys for tab navigation
    if (e.key >= '1' && e.key <= '3' && e.altKey) {
        e.preventDefault();
        const tabs = ['overview', 'details', 'timeline'];
        const tabIndex = parseInt(e.key) - 1;
        if (tabs[tabIndex]) {
            const tabElement = document.querySelector(`[href="#${tabs[tabIndex]}"]`);
            if (tabElement) {
                const tab = new bootstrap.Tab(tabElement);
                tab.show();
            }
        }
    }
});

// Professional smooth scrolling
$('a[href^="#"]').on('click', function(e) {
    e.preventDefault();
    const target = $(this.getAttribute('href'));
    if (target.length) {
        $('html, body').animate({
            scrollTop: target.offset().top - 80
        }, 600, 'easeInOutQuad');
    }
});

// Professional scroll-to-top with Metronic style
$(window).scroll(function() {
    if ($(this).scrollTop() > 300) {
        if (!$('#kt_scrolltop').length) {
            $('body').append(`
                <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true" style="
                    position: fixed; 
                    bottom: 30px; 
                    right: 30px; 
                    width: 56px; 
                    height: 56px; 
                    border-radius: 50%; 
                    background: #009EF7; 
                    display: flex; 
                    align-items: center; 
                    justify-content: center; 
                    box-shadow: 0 10px 30px rgba(0, 158, 247, 0.3);
                    cursor: pointer;
                    z-index: 1000;
                    transition: all 0.3s ease;
                    opacity: 0.9;
                " onclick="$('html, body').animate({scrollTop: 0}, 600);">
                    <i class="ki-duotone ki-black-up fs-2 text-white">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            `);
        }
    } else {
        $('#kt_scrolltop').remove();
    }
});

// Scroll top button hover effect
$(document).on('mouseenter', '#kt_scrolltop', function() {
    $(this).css({
        'transform': 'scale(1.1)',
        'opacity': '1'
    });
});

$(document).on('mouseleave', '#kt_scrolltop', function() {
    $(this).css({
        'transform': 'scale(1)',
        'opacity': '0.9'
    });
});
</script>
@endpush
