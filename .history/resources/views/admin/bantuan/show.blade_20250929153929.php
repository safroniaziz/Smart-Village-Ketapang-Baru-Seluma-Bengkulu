@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Detail Bantuan')

@section('menu')
    Detail Bantuan
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.bantuan.index') }}" class="text-muted text-hover-primary">Bantuan Warga</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Detail</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="row g-5 g-xl-8">
                <!-- Main Info Card -->
                <div class="col-xl-8">
                    <div class="card shadow-sm mb-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="fw-bold">Informasi Bantuan</h3>
                            </div>
                            <div class="card-toolbar">
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.bantuan.edit', $bantuan->id) }}" class="btn btn-sm btn-primary">
                                        <i class="ki-duotone ki-pencil fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                        Edit
                                    </a>
                                    <a href="{{ route('admin.bantuan.index') }}" class="btn btn-sm btn-light">
                                        <i class="ki-duotone ki-arrow-left fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                        Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-6">
                                <div class="col-md-6">
                                    <div class="d-flex flex-column">
                                        <label class="fs-6 fw-bold text-gray-700 mb-2">Program Bantuan</label>
                                        <div class="fs-4 fw-bold text-primary">{{ $bantuan->program }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex flex-column">
                                        <label class="fs-6 fw-bold text-gray-700 mb-2">Status</label>
                                        @php
                                            $statusClass = [
                                                'Aktif' => 'badge-light-success',
                                                'Tidak Aktif' => 'badge-light-warning',
                                                'Selesai' => 'badge-light-primary',
                                            ][$bantuan->status] ?? 'badge-light';
                                        @endphp
                                        <div>
                                            <span class="badge {{ $statusClass }} fs-6 py-2 px-3">{{ $bantuan->status }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex flex-column">
                                        <label class="fs-6 fw-bold text-gray-700 mb-2">Tahun</label>
                                        <div class="fs-5 fw-semibold text-gray-800">{{ $bantuan->tahun }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex flex-column">
                                        <label class="fs-6 fw-bold text-gray-700 mb-2">Nominal</label>
                                        <div class="fs-5 fw-semibold text-success">
                                            @if($bantuan->nominal)
                                                Rp {{ number_format($bantuan->nominal, 0, ',', '.') }}
                                            @else
                                                <span class="text-muted">Tidak ada nominal</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if($bantuan->keterangan)
                                <div class="col-12">
                                    <div class="d-flex flex-column">
                                        <label class="fs-6 fw-bold text-gray-700 mb-2">Keterangan</label>
                                        <div class="bg-light-info p-4 rounded">
                                            <div class="text-gray-800">{{ $bantuan->keterangan }}</div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-6">
                                    <div class="d-flex flex-column">
                                        <label class="fs-6 fw-bold text-gray-700 mb-2">Tanggal Dibuat</label>
                                        <div class="text-muted">{{ $bantuan->created_at?->format('d F Y, H:i') }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex flex-column">
                                        <label class="fs-6 fw-bold text-gray-700 mb-2">Terakhir Diupdate</label>
                                        <div class="text-muted">{{ $bantuan->updated_at?->format('d F Y, H:i') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Warga Info Card -->
                <div class="col-xl-4">
                    <div class="card shadow-sm mb-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="fw-bold">Data Penerima</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            @if($bantuan->user)
                            <div class="d-flex flex-column gap-5">
                                <div class="text-center">
                                    <div class="symbol symbol-100px mx-auto mb-4">
                                        <div class="symbol-label bg-light-primary">
                                            <i class="ki-duotone ki-profile-user fs-2x text-primary">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                        </div>
                                    </div>
                                    <div class="fs-4 fw-bold text-gray-900 mb-2">{{ $bantuan->user->nama_lengkap }}</div>
                                    <div class="text-muted">NIK: {{ $bantuan->user->nik }}</div>
                                </div>

                                <div class="separator separator-dashed"></div>

                                <div class="d-flex flex-column gap-3">
                                    @if($bantuan->user->tempat_lahir && $bantuan->user->tanggal_lahir)
                                    <div class="d-flex align-items-center">
                                        <i class="ki-duotone ki-calendar fs-4 text-primary me-3">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <div>
                                            <div class="text-gray-700 fw-semibold">Tempat, Tanggal Lahir</div>
                                            <div class="text-muted">{{ $bantuan->user->tempat_lahir }}, {{ $bantuan->user->tanggal_lahir?->format('d F Y') }}</div>
                                        </div>
                                    </div>
                                    @endif

                                    @if($bantuan->user->alamat)
                                    <div class="d-flex align-items-start">
                                        <i class="ki-duotone ki-geolocation fs-4 text-primary me-3 mt-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <div>
                                            <div class="text-gray-700 fw-semibold">Alamat</div>
                                            <div class="text-muted">{{ $bantuan->user->alamat }}</div>
                                            @if($bantuan->user->dusun)
                                                <div class="text-muted">Dusun {{ $bantuan->user->dusun }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    @endif

                                    @if($bantuan->user->pekerjaan)
                                    <div class="d-flex align-items-center">
                                        <i class="ki-duotone ki-briefcase fs-4 text-primary me-3">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <div>
                                            <div class="text-gray-700 fw-semibold">Pekerjaan</div>
                                            <div class="text-muted">{{ $bantuan->user->pekerjaan }}</div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @else
                            <div class="text-center py-5">
                                <div class="text-muted">Data warga tidak ditemukan</div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
