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

/* Profile header enhanced styling */
.profile-name {
    animation: slideInUp 0.8s ease-out;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.profile-info {
    animation: slideInUp 1s ease-out 0.2s both;
}

.stats-enhanced {
    animation: slideInUp 1.2s ease-out 0.4s both;
}

/* Glass morphism effect for stats */
.stats-glass {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 1rem;
    transition: all 0.3s ease;
}

.stats-glass:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

/* Elegant icon styling */
.icon-enhanced {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 0.75rem;
    padding: 0.5rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-right: 0.75rem;
    transition: all 0.3s ease;
}

.icon-enhanced:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
}
</style>
@endpush

@section('content')
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">

            <!--begin::Profile Header-->
            <div class="card mb-5 mb-xl-10 overflow-hidden" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #667eea 100%); position: relative; min-height: 300px;">
                <!-- Advanced decorative elements -->
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
                
                <!-- Floating particles -->
                <div class="position-absolute" style="top: 20%; right: 15%; width: 8px; height: 8px; background: rgba(255,255,255,0.4); border-radius: 50%; animation: float 6s ease-in-out infinite;"></div>
                <div class="position-absolute" style="top: 60%; right: 25%; width: 6px; height: 6px; background: rgba(255,255,255,0.3); border-radius: 50%; animation: float 4s ease-in-out infinite reverse;"></div>
                <div class="position-absolute" style="top: 40%; left: 20%; width: 10px; height: 10px; background: rgba(255,255,255,0.2); border-radius: 50%; animation: float 8s ease-in-out infinite;"></div>
                
                <!-- Gradient overlays -->
                <div class="position-absolute top-0 end-0" style="width: 300px; height: 300px; background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%); transform: translate(20%, -20%);"></div>
                <div class="position-absolute bottom-0 start-0" style="width: 250px; height: 250px; background: radial-gradient(circle, rgba(59, 130, 246, 0.2) 0%, transparent 70%); transform: translate(-20%, 20%);"></div>
                
                <!-- Top accent line -->
                <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #3b82f6, #10b981, #f59e0b, #ef4444);"></div>
                
                <div class="card-body pt-12 pb-8" style="position: relative; z-index: 10;">
                    <!--begin::Profile Header-->
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        <!--begin::Wrapper-->
                        <div class="flex-grow-1">
                            <!--begin::Head-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::Details-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-3 profile-name">
                                        <h1 class="text-white fw-bold fs-2x me-3 mb-0" style="text-shadow: 0 2px 8px rgba(0,0,0,0.3);">{{ $dataWarga->nama_lengkap }}</h1>
                                        @if($dataWarga->status_aktif)
                                            <div class="d-flex align-items-center bg-success bg-opacity-20 rounded-pill px-3 py-1">
                                                <i class="ki-duotone ki-verify fs-5 text-white me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <span class="text-white fw-semibold fs-7">AKTIF</span>
                                            </div>
                                        @else
                                            <div class="d-flex align-items-center bg-danger bg-opacity-20 rounded-pill px-3 py-1">
                                                <i class="ki-duotone ki-cross-circle fs-5 text-white me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <span class="text-white fw-semibold fs-7">NON AKTIF</span>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Name-->

                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap fw-semibold fs-6 mb-6 pe-2 profile-info">
                                        <div class="d-flex align-items-center me-6 mb-3">
                                            <div class="icon-enhanced">
                                                <i class="ki-duotone ki-profile-circle fs-4 text-white">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </div>
                                            <div>
                                                <div class="text-white fw-bold fs-7" style="opacity: 0.7;">PEKERJAAN</div>
                                                <div class="text-white fw-semibold">{{ $dataWarga->mata_pencaharian ? ($dataWarga->mata_pencaharian == 'DLL' ? 'Lain-Lain' : $dataWarga->mata_pencaharian) : 'Tidak Diketahui' }}</div>
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
                                                <div class="text-white fw-semibold">{{ $dataWarga->dusun }}, {{ $dataWarga->desa }}</div>
                                            </div>
                                        </div>

                                        @if($dataWarga->email)
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="icon-enhanced">
                                                <i class="ki-duotone ki-sms fs-4 text-white">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <div>
                                                <div class="text-white fw-bold fs-7" style="opacity: 0.7;">EMAIL</div>
                                                <a href="mailto:{{ $dataWarga->email }}" class="text-white fw-semibold text-hover-light">{{ $dataWarga->email }}</a>
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
                            <div class="d-flex flex-wrap flex-stack stats-enhanced">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div class="stats-glass min-w-150px py-4 px-5 me-6 mb-4">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="bg-white bg-opacity-20 rounded-circle p-3 me-3">
                                                    <i class="ki-duotone ki-calendar fs-2 text-white">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                                <div class="fs-2hx fw-bold text-white">
                                                    @php
                                                        $age = 0;
                                                        if($dataWarga->nik && strlen($dataWarga->nik) >= 16) {
                                                            $year = substr($dataWarga->nik, 10, 2);
                                                            $month = substr($dataWarga->nik, 8, 2);
                                                            $day = substr($dataWarga->nik, 6, 2);
                                                            $century = ($year <= 25) ? '20' : '19';
                                                            $birthYear = $century . $year;
                                                            $birthDate = \Carbon\Carbon::createFromDate($birthYear, $month, $day);
                                                            $age = $birthDate->age;
                                                        } elseif($dataWarga->tanggal_lahir) {
                                                            if($dataWarga->tanggal_lahir instanceof \Carbon\Carbon) {
                                                                $age = $dataWarga->tanggal_lahir->age;
                                                            } elseif(is_string($dataWarga->tanggal_lahir)) {
                                                                $age = \Carbon\Carbon::parse($dataWarga->tanggal_lahir)->age;
                                                            }
                                                        }
                                                    @endphp
                                                    {{ $age }}
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <div class="fw-bold text-white fs-7" style="opacity: 0.8;">USIA</div>
                                                <div class="fw-semibold text-white fs-8" style="opacity: 0.6;">Tahun</div>
                                            </div>
                                        </div>
                                        <!--end::Stat-->
                                        
                                        <!--begin::Stat-->
                                        <div class="stats-glass min-w-150px py-4 px-5 me-6 mb-4">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="bg-white bg-opacity-20 rounded-circle p-3 me-3">
                                                    @if($dataWarga->status_aktif)
                                                        <i class="ki-duotone ki-verify fs-2 text-white">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    @else
                                                        <i class="ki-duotone ki-cross-circle fs-2 text-white">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    @endif
                                                </div>
                                                <div class="fs-4 fw-bold text-white">
                                                    {{ $dataWarga->status_aktif ? 'AKTIF' : 'NON AKTIF' }}
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <div class="fw-bold text-white fs-7" style="opacity: 0.8;">STATUS</div>
                                                <div class="fw-semibold text-white fs-8" style="opacity: 0.6;">Warga</div>
                                            </div>
                                        </div>
                                        <!--end::Stat-->

                                        <!--begin::Stat-->
                                        <div class="border border-white border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px);">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-home-2 fs-3 text-white me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                                <div class="fs-2hx fw-bold text-white">
                                                    {{ $dataWarga->jumlah_jiwa_kk ?: '0' }}
                                                </div>
                                            </div>
                                            <div class="fw-semibold text-white" style="opacity: 0.8;">Jiwa dalam KK</div>
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
                    <!--end::Profile Header-->

                    <!--begin::Action Toolbar-->
                    <div class="d-flex flex-wrap flex-stack">
                        <div class="d-flex flex-column flex-grow-1 pe-8">
                            <div class="d-flex flex-wrap">
                                <a href="{{ route('data-warga.index') }}" class="btn btn-light-info me-3 mb-3">
                                    <i class="ki-duotone ki-arrow-left fs-4 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Kembali
                                </a>

                                <a href="{{ url('manajemen-data-warga/' . $dataWarga->id . '/edit') }}" class="btn btn-success me-3 mb-3">
                                    <i class="ki-duotone ki-notepad-edit fs-4 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Edit Data
                                </a>

                                <form action="{{ route('data-warga.destroy', $dataWarga->id) }}" method="POST" class="d-inline" onsubmit="return confirm('⚠️ PERHATIAN!\n\nApakah Anda yakin ingin menghapus data warga ini?\n\nData yang dihapus tidak dapat dikembalikan!')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger me-3 mb-3">
                                        <i class="ki-duotone ki-trash fs-4 me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                        </i>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Profile Header-->

            <!--begin::Content Cards-->
            <div class="row g-5 g-xxl-8">
                <!--begin::Data Personal Card-->
                <div class="col-12 col-xl-6 col-xxl-6">
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
                                            <td class="fw-bold text-muted">Usia (Tahun)</td>
                                            <td class="text-end">
                                                @php
                                                    $age = 0;
                                                    if($dataWarga->nik && strlen($dataWarga->nik) >= 16) {
                                                        $year = substr($dataWarga->nik, 10, 2);
                                                        $month = substr($dataWarga->nik, 8, 2);
                                                        $day = substr($dataWarga->nik, 6, 2);

                                                        // Handle century
                                                        $currentYear = date('Y');
                                                        $century = ($year <= 25) ? '20' : '19';
                                                        $birthYear = $century . $year;

                                                        $birthDate = \Carbon\Carbon::createFromDate($birthYear, $month, $day);
                                                        $age = $birthDate->age;
                                                    } elseif($dataWarga->tanggal_lahir) {
                                                        if($dataWarga->tanggal_lahir instanceof \Carbon\Carbon) {
                                                            $age = $dataWarga->tanggal_lahir->age;
                                                        } elseif(is_string($dataWarga->tanggal_lahir)) {
                                                            $age = \Carbon\Carbon::parse($dataWarga->tanggal_lahir)->age;
                                                        }
                                                    }
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
                <div class="col-12 col-xl-6 col-xxl-6">
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

                <!--begin::Data Pekerjaan Card-->
                <div class="col-12 col-xl-6 col-xxl-6">
                    <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">Data Pekerjaan</span>
                                <span class="text-muted fw-semibold fs-7">Informasi mata pencaharian</span>
                            </h3>
                        </div>
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold text-muted">Mata Pencaharian</td>
                                            <td class="text-end">
                                                <span class="badge badge-light-success fs-7 fw-semibold">
                                                    {{ $dataWarga->mata_pencaharian ? ($dataWarga->mata_pencaharian == 'DLL' ? 'Lain-Lain' : $dataWarga->mata_pencaharian) : '-' }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Status Aktif</td>
                                            <td class="text-end">
                                                <span class="badge badge-light-{{ $dataWarga->status_aktif ? 'success' : 'danger' }} fs-7 fw-semibold">
                                                    {{ $dataWarga->status_aktif ? 'Aktif' : 'Tidak Aktif' }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Status</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $dataWarga->status ?: '-' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Data Pekerjaan Card-->

                <!--begin::Data Rumah Card-->
                <div class="col-12 col-xl-6 col-xxl-6">
                    <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">Data Rumah</span>
                                <span class="text-muted fw-semibold fs-7">Informasi tempat tinggal</span>
                            </h3>
                        </div>
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold text-muted">Status Rumah</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $dataWarga->status_rumah ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Status Sosial</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $dataWarga->status_sosial ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Kelayakan Rumah</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $dataWarga->kelayakan_rumah ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Jumlah Jiwa KK</td>
                                            <td class="text-end">
                                                <span class="badge badge-light-info fs-7 fw-semibold">{{ $dataWarga->jumlah_jiwa_kk ?: '0' }} orang</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Data Rumah Card-->

                <!--begin::Data Sistem Card-->
                <div class="col-12 col-xl-6 col-xxl-6">
                    <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">Data Sistem</span>
                                <span class="text-muted fw-semibold fs-7">Informasi akun dan aktivitas sistem</span>
                            </h3>
                        </div>
                        <div class="card-body py-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                            <tbody>
                                                @if($dataWarga->email)
                                                <tr>
                                                    <td class="fw-bold text-muted">Email</td>
                                                    <td class="text-end">
                                                        <a href="mailto:{{ $dataWarga->email }}" class="text-primary fw-bold fs-6">{{ $dataWarga->email }}</a>
                                                    </td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td class="fw-bold text-muted">Status Login</td>
                                                    <td class="text-end">
                                                        <span class="badge badge-light-{{ $dataWarga->email ? 'success' : 'secondary' }} fs-7 fw-semibold">
                                                            {{ $dataWarga->email ? 'Dapat Login' : 'Tidak Dapat Login' }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bold text-muted">Terdaftar Pada</td>
                                                    <td class="text-end text-dark fw-bold fs-6">
                                                        @if($dataWarga->created_at && $dataWarga->created_at instanceof \Carbon\Carbon)
                                                            {{ $dataWarga->created_at->format('d M Y H:i') }}
                                                        @elseif($dataWarga->created_at && is_string($dataWarga->created_at))
                                                            {{ \Carbon\Carbon::parse($dataWarga->created_at)->format('d M Y H:i') }}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                            <tbody>
                                                <tr>
                                                    <td class="fw-bold text-muted">Terakhir Diperbarui</td>
                                                    <td class="text-end text-dark fw-bold fs-6">
                                                        @if($dataWarga->updated_at && $dataWarga->updated_at instanceof \Carbon\Carbon)
                                                            {{ $dataWarga->updated_at->format('d M Y H:i') }}
                                                        @elseif($dataWarga->updated_at && is_string($dataWarga->updated_at))
                                                            {{ \Carbon\Carbon::parse($dataWarga->updated_at)->format('d M Y H:i') }}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                </tr>
                                                @if($dataWarga->email_verified_at)
                                                <tr>
                                                    <td class="fw-bold text-muted">Email Terverifikasi</td>
                                                    <td class="text-end text-dark fw-bold fs-6">
                                                        @if($dataWarga->email_verified_at && $dataWarga->email_verified_at instanceof \Carbon\Carbon)
                                                            {{ $dataWarga->email_verified_at->format('d M Y H:i') }}
                                                        @elseif($dataWarga->email_verified_at && is_string($dataWarga->email_verified_at))
                                                            {{ \Carbon\Carbon::parse($dataWarga->email_verified_at)->format('d M Y H:i') }}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td class="fw-bold text-muted">Status Aktivitas</td>
                                                    <td class="text-end">
                                                        @if($dataWarga->updated_at && $dataWarga->created_at && $dataWarga->updated_at instanceof \Carbon\Carbon && $dataWarga->created_at instanceof \Carbon\Carbon && $dataWarga->updated_at->gt($dataWarga->created_at))
                                                            <span class="badge badge-light-warning fs-7 fw-semibold">Ada Perubahan</span>
                                                        @else
                                                            <span class="badge badge-light-info fs-7 fw-semibold">Belum Ada Perubahan</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Data Sistem Card-->
            </div>
            <!--end::Content Cards-->

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


                    </div>

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
$(document).ready(function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Initialize tab functionality
    if (window.location.hash) {
        const tabId = window.location.hash.substring(1);
        const tabElement = document.querySelector(`[href="#${tabId}"]`);
        if (tabElement) {
            const tab = new bootstrap.Tab(tabElement);
            tab.show();
        }
    }
});



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

</script>



@endpush
