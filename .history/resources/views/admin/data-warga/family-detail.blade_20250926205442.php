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
                    <!--begin::Photo-->
                    <div class="me-7 mb-4">
                        <div class="symbol symbol-150px symbol-lg-160px symbol-fixed position-relative">
                            @if($kepalaKeluarga && $kepalaKeluarga->foto)
                                <img src="{{ asset('storage/' . $kepalaKeluarga->foto) }}"
                                     alt="Foto Kepala Keluarga"
                                     class="rounded-3"
                                     style="width: 150px; height: 200px; object-fit: cover; border: 4px solid rgba(255,255,255,0.3); box-shadow: 0 8px 25px rgba(0,0,0,0.2);">
                            @else
                                <div class="symbol-label fs-2 fw-semibold text-success bg-light-success rounded-3 d-flex align-items-center justify-content-center"
                                     style="width: 150px; height: 200px; border: 4px solid rgba(255,255,255,0.3); box-shadow: 0 8px 25px rgba(0,0,0,0.2);">
                                    <div class="text-center">
                                        <i class="ki-duotone ki-home-2 fs-2x text-white mb-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <div class="fs-7 text-white">KELUARGA</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!--end::Photo-->

                    <!--begin::Wrapper-->
                    <div class="flex-grow-1">
                        <!--begin::Head-->
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <!--begin::Details-->
                            <div class="d-flex flex-column">
                                <!--begin::Name-->
                                <div class="d-flex align-items-center mb-3">
                                    <h1 class="text-white fw-bold fs-2x me-3 mb-0" style="text-shadow: 0 2px 8px rgba(0,0,0,0.3);">
                                        Keluarga {{ $kepalaKeluarga->nama_lengkap ?? 'Tidak Diketahui' }}
                                    </h1>
                                    <div class="d-flex align-items-center bg-success bg-opacity-20 rounded-pill px-3 py-1">
                                        <i class="ki-duotone ki-home-2 fs-5 text-white me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <span class="text-white fw-semibold fs-7">{{ $familyMembers->count() }} ANGGOTA</span>
                                    </div>
                                </div>
                                <!--end::Name-->

                                <!--begin::Info-->
                                <div class="d-flex flex-wrap fw-semibold fs-6 mb-6 pe-2">
                                    <div class="d-flex align-items-center me-6 mb-3">
                                        <div class="bg-white bg-opacity-20 rounded-3 p-3 me-3">
                                            <i class="ki-duotone ki-abstract-41 fs-4 text-white">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                        <div>
                                            <div class="text-white fw-bold fs-7" style="opacity: 0.7;">NO. KARTU KELUARGA</div>
                                            <div class="text-white fw-semibold">{{ $noKK }}</div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center me-6 mb-3">
                                        <div class="bg-white bg-opacity-20 rounded-3 p-3 me-3">
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
                                        <div class="bg-white bg-opacity-20 rounded-3 p-3 me-3">
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
                        <div class="d-flex flex-wrap flex-stack">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column flex-grow-1 pe-8">
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap">
                                    <!--begin::Stat-->
                                    <div class="bg-white bg-opacity-15 backdrop-blur rounded-3 min-w-125px py-4 px-4 me-6 mb-4">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="bg-white bg-opacity-20 rounded-circle p-2 me-2">
                                                <i class="ki-duotone ki-people fs-3 text-white">
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
                                    <div class="bg-white bg-opacity-15 backdrop-blur rounded-3 min-w-125px py-4 px-4 me-6 mb-4">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="bg-white bg-opacity-20 rounded-circle p-2 me-2">
                                                <i class="ki-duotone ki-profile-user fs-3 text-white">
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
                                    <div class="bg-white bg-opacity-15 backdrop-blur rounded-3 min-w-125px py-4 px-4 me-6 mb-4">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="bg-white bg-opacity-20 rounded-circle p-2 me-2">
                                                <i class="ki-duotone ki-profile-user fs-3 text-white">
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
                                    <div class="bg-white bg-opacity-15 backdrop-blur rounded-3 min-w-125px py-4 px-4 me-6 mb-4">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="bg-white bg-opacity-20 rounded-circle p-2 me-2">
                                                <i class="ki-duotone ki-verify fs-3 text-white">
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

                            <button class="btn btn-success me-3 mb-3" onclick="exportFamilyData()">
                                <i class="ki-duotone ki-file-down fs-4 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Export Data
                            </button>

                            <button class="btn btn-primary me-3 mb-3" onclick="printFamilyCard()">
                                <i class="ki-duotone ki-printer fs-4 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Cetak Kartu
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Profile Header-->

        <!--begin::Content Cards-->
        <div class="row g-5 g-xxl-8">
            <!--begin::Address Card-->
            <div class="col-12 col-xl-4 col-xxl-4">
                <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Alamat Keluarga</span>
                            <span class="text-muted fw-semibold fs-7">Informasi tempat tinggal</span>
                        </h3>
                    </div>
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <tbody>
                                    @if($kepalaKeluarga)
                                        <tr>
                                            <td class="fw-bold text-muted">Alamat</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $kepalaKeluarga->alamat ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">RT/RW</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $kepalaKeluarga->rt_rw ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Dusun</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $kepalaKeluarga->dusun ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Desa</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $kepalaKeluarga->desa ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Kecamatan</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $kepalaKeluarga->kecamatan ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Kabupaten</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $kepalaKeluarga->kabupaten ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Provinsi</td>
                                            <td class="text-end text-dark fw-bold fs-6">{{ $kepalaKeluarga->provinsi ?: '-' }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="2" class="text-center py-8">
                                                <i class="ki-duotone ki-information fs-3x text-muted mb-3">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                                <div class="text-muted">Data alamat tidak tersedia</div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!--begin::Statistics Card-->
                <div class="card card-xxl-stretch">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Statistik Keluarga</span>
                            <span class="text-muted fw-semibold fs-7">Ringkasan data anggota</span>
                        </h3>
                    </div>
                    <div class="card-body py-3">
                        <div class="row g-0">
                            <div class="col-6">
                                <div class="border-end border-gray-300 text-center py-5">
                                    <div class="fs-2hx fw-bold text-primary">{{ $familyMembers->whereIn('jenis_kelamin', ['Laki-laki', 'L'])->count() }}</div>
                                    <div class="fw-semibold text-muted">Laki-laki</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center py-5">
                                    <div class="fs-2hx fw-bold text-danger">{{ $familyMembers->whereIn('jenis_kelamin', ['Perempuan', 'P'])->count() }}</div>
                                    <div class="fw-semibold text-muted">Perempuan</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="border-end border-gray-300 border-top text-center py-5">
                                    <div class="fs-2hx fw-bold text-success">{{ $familyMembers->where('status_aktif', true)->count() }}</div>
                                    <div class="fw-semibold text-muted">Aktif</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="border-top text-center py-5">
                                    <div class="fs-2hx fw-bold text-warning">{{ $familyMembers->where('status_aktif', false)->count() }}</div>
                                    <div class="fw-semibold text-muted">Tidak Aktif</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Statistics Card-->
            </div>
            <!--end::Address Card-->

            <!--begin::Family Members-->
            <div class="col-12 col-xl-8 col-xxl-8">
                <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Anggota Keluarga</span>
                            <span class="text-muted fw-semibold fs-7">{{ $familyMembers->count() }} orang terdaftar</span>
                        </h3>
                        <div class="card-toolbar">
                            <span class="badge badge-light-primary fs-6 fw-bold px-4 py-2">
                                {{ $familyMembers->count() }} Anggota
                            </span>
                        </div>
                    </div>
                    <div class="card-body py-3">
                        <div class="row g-6">
                            @foreach($familyMembers as $member)
                                <div class="col-12">
                                    <div class="card border {{ $member->is_kepala_keluarga ? 'border-success' : 'border-gray-300' }}">
                                        @if($member->is_kepala_keluarga)
                                            <div class="ribbon ribbon-end ribbon-clip">
                                                <div class="ribbon-label bg-success">
                                                    <i class="ki-duotone ki-crown fs-6 text-white">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Kepala Keluarga
                                                </div>
                                            </div>
                                        @endif
                                        <div class="card-body p-6">
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    @if($member->foto)
                                                        <img src="{{ asset('storage/' . $member->foto) }}"
                                                             alt="Foto {{ $member->nama_lengkap }}"
                                                             class="rounded"
                                                             style="width: 80px; height: 100px; object-fit: cover; border: 3px solid {{ $member->is_kepala_keluarga ? '#50cd89' : '#e1e5e9' }};">
                                                    @else
                                                        <div class="symbol symbol-80px">
                                                            <div class="symbol-label bg-light-{{ $member->is_kepala_keluarga ? 'success' : 'primary' }}">
                                                                <i class="ki-duotone ki-user fs-2x text-{{ $member->is_kepala_keluarga ? 'success' : 'primary' }}">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="col-md-7">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h4 class="fw-bold text-dark mb-0 me-3">{{ $member->nama_lengkap }}</h4>
                                                        <span class="badge badge-light-{{ $member->jenis_kelamin == 'Laki-laki' || $member->jenis_kelamin == 'L' ? 'primary' : 'danger' }} fw-bold">
                                                            {{ $member->jenis_kelamin }}
                                                        </span>
                                                    </div>

                                                    <div class="table-responsive">
                                                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-3">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="fw-bold text-muted">NIK</td>
                                                                    <td class="text-end">
                                                                        <span class="badge badge-light-primary fs-7 fw-semibold">{{ $member->nik }}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fw-bold text-muted">Tempat, Tanggal Lahir</td>
                                                                    <td class="text-end text-dark fw-bold fs-6">
                                                                        {{ $member->tempat_lahir ?: '-' }},
                                                                        {{ $member->tanggal_lahir ? \Carbon\Carbon::parse($member->tanggal_lahir)->format('d M Y') : '-' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fw-bold text-muted">Usia</td>
                                                                    <td class="text-end">
                                                                        <span class="badge badge-light-info fs-7 fw-semibold">
                                                                            {{ $member->tanggal_lahir ? \Carbon\Carbon::parse($member->tanggal_lahir)->age . ' tahun' : '-' }}
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fw-bold text-muted">Pekerjaan</td>
                                                                    <td class="text-end text-dark fw-bold fs-6">{{ $member->mata_pencaharian == 'DLL' ? 'Lain-Lain' : ($member->mata_pencaharian ?: '-') }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fw-bold text-muted">Status</td>
                                                                    <td class="text-end">
                                                                        <span class="badge badge-light-{{ $member->status_aktif ? 'success' : 'danger' }} fw-bold">
                                                                            {{ $member->status_aktif ? 'Aktif' : 'Tidak Aktif' }}
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 text-end">
                                                    <div class="d-flex flex-column gap-2">
                                                        <a href="{{ route('data-warga.show', $member) }}"
                                                           class="btn btn-light-primary">
                                                            <i class="ki-duotone ki-eye fs-6 me-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                            Detail
                                                        </a>
                                                        <a href="{{ route('data-warga.edit', $member) }}"
                                                           class="btn btn-light-warning">
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
                </div>
            </div>
            <!--end::Family Members-->
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

@push('styles')
<style>
/* Float animation */
@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-20px);
    }
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
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
        window.print();
    });
}
</script>
@endpush
