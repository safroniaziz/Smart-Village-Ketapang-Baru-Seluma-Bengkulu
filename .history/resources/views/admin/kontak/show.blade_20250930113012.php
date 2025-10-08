@extends('layouts.dashboard.dashboard')

@section('title', 'Detail Kontak - Smart Village')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Detail Kontak Desa</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.kontak.index') }}" class="text-muted text-hover-primary">Manajemen Kontak</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Detail Kontak</li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('admin.kontak.edit', $kontak->id) }}" class="btn btn-sm fw-bold btn-primary">
                    <i class="fas fa-edit fs-7"></i>
                    Edit Kontak
                </a>
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
                                <div class="symbol-label bg-light-primary">
                                    <i class="fas fa-building text-primary fs-2x"></i>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start flex-column">
                                <h3 class="fw-bold m-0">{{ $kontak->nama_desa }}</h3>
                                <span class="text-muted fw-semibold text-muted d-block fs-7">
                                    @if($kontak->aktif)
                                        <span class="badge badge-light-success">Aktif</span>
                                    @else
                                        <span class="badge badge-light-danger">Tidak Aktif</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="row">
                        <!-- Informasi Umum -->
                        <div class="col-lg-8">
                            <div class="mb-8">
                                <h4 class="fw-bold mb-4">Informasi Umum</h4>

                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                        <label class="fw-semibold fs-7 text-muted">Nama Desa</label>
                                        <div class="fw-bold fs-6 text-gray-900">{{ $kontak->nama_desa }}</div>
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="fw-semibold fs-7 text-muted">Kode Pos</label>
                                        <div class="fw-bold fs-6 text-gray-900">{{ $kontak->kode_pos ?: 'Tidak ada' }}</div>
                                    </div>

                                    <div class="col-12 mb-6">
                                        <label class="fw-semibold fs-7 text-muted">Alamat Lengkap</label>
                                        <div class="fw-bold fs-6 text-gray-900">{{ $kontak->alamat }}</div>
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="fw-semibold fs-7 text-muted">Telepon</label>
                                        <div class="fw-bold fs-6 text-gray-900">
                                            @if($kontak->telepon)
                                                <a href="tel:{{ $kontak->telepon }}" class="text-primary">{{ $kontak->telepon }}</a>
                                            @else
                                                <span class="text-muted">Tidak ada</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="fw-semibold fs-7 text-muted">Email</label>
                                        <div class="fw-bold fs-6 text-gray-900">
                                            @if($kontak->email)
                                                <a href="mailto:{{ $kontak->email }}" class="text-primary">{{ $kontak->email }}</a>
                                            @else
                                                <span class="text-muted">Tidak ada</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 mb-6">
                                        <label class="fw-semibold fs-7 text-muted">Website</label>
                                        <div class="fw-bold fs-6 text-gray-900">
                                            @if($kontak->website)
                                                <a href="{{ $kontak->website }}" target="_blank" class="text-primary">{{ $kontak->website }}</a>
                                            @else
                                                <span class="text-muted">Tidak ada</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Struktur Pemerintahan -->
                            <div class="mb-8">
                                <h4 class="fw-bold mb-4">Struktur Pemerintahan</h4>

                                <div class="row">
                                    <div class="col-md-4 mb-6">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-40px me-4">
                                                <div class="symbol-label bg-light-primary">
                                                    <i class="fas fa-user-tie text-primary"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <label class="fw-semibold fs-7 text-muted">Kepala Desa</label>
                                                <div class="fw-bold fs-6 text-gray-900">{{ $kontak->kepala_desa ?: 'Belum ada' }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-6">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-40px me-4">
                                                <div class="symbol-label bg-light-success">
                                                    <i class="fas fa-user text-success"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <label class="fw-semibold fs-7 text-muted">Sekretaris Desa</label>
                                                <div class="fw-bold fs-6 text-gray-900">{{ $kontak->sekretaris_desa ?: 'Belum ada' }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-6">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-40px me-4">
                                                <div class="symbol-label bg-light-warning">
                                                    <i class="fas fa-user text-warning"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <label class="fw-semibold fs-7 text-muted">Bendahara Desa</label>
                                                <div class="fw-bold fs-6 text-gray-900">{{ $kontak->bendahara_desa ?: 'Belum ada' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Koordinat -->
                            @if($kontak->koordinat)
                            <div class="mb-8">
                                <h4 class="fw-bold mb-4">Koordinat Lokasi</h4>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="fw-semibold fs-7 text-muted">Latitude</label>
                                        <div class="fw-bold fs-6 text-gray-900">{{ $kontak->latitude }}</div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="fw-semibold fs-7 text-muted">Longitude</label>
                                        <div class="fw-bold fs-6 text-gray-900">{{ $kontak->longitude }}</div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <!-- Deskripsi -->
                            @if($kontak->deskripsi)
                            <div class="mb-8">
                                <h4 class="fw-bold mb-4">Deskripsi</h4>
                                <div class="fw-bold fs-6 text-gray-900">{{ $kontak->deskripsi }}</div>
                            </div>
                            @endif
                        </div>

                        <!-- Sidebar -->
                        <div class="col-lg-4">
                            <!-- Jam Operasional -->
                            @if($kontak->jam_operasional_formatted)
                            <div class="card mb-6">
                                <div class="card-header">
                                    <h4 class="fw-bold mb-0">Jam Operasional</h4>
                                </div>
                                <div class="card-body">
                                    @foreach($kontak->jam_operasional_formatted as $hari)
                                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-gray-200 last:border-b-0">
                                        <span class="fw-semibold text-gray-700">{{ $hari }}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <!-- Informasi Sistem -->
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="fw-bold mb-0">Informasi Sistem</h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <label class="fw-semibold fs-7 text-muted">Dibuat</label>
                                        <div class="fw-bold fs-6 text-gray-900">{{ $kontak->created_at->format('d F Y, H:i') }}</div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="fw-semibold fs-7 text-muted">Diperbarui</label>
                                        <div class="fw-bold fs-6 text-gray-900">{{ $kontak->updated_at->format('d F Y, H:i') }}</div>
                                    </div>

                                    <div class="mb-0">
                                        <label class="fw-semibold fs-7 text-muted">Status</label>
                                        <div class="fw-bold fs-6">
                                            @if($kontak->aktif)
                                                <span class="badge badge-light-success">Aktif</span>
                                            @else
                                                <span class="badge badge-light-danger">Tidak Aktif</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>
@endsection
