@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Detail Kontak')

@section('menu')
    Detail Kontak
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.kontak.index') }}" class="text-muted text-hover-primary">Manajemen Kontak</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Detail Kontak</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!-- Header Card -->
            <div class="card shadow-sm mb-8">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <div class="symbol-label bg-light-info">
                                        <i class="fas fa-eye fs-2x text-info"></i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="fw-bold text-gray-900 mb-1">Detail Kontak Desa</h2>
                                    <p class="text-muted mb-0">Informasi lengkap kontak desa</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.kontak.index') }}" class="btn btn-light">
                                    <i class="ki-duotone ki-arrow-left fs-5 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Kembali
                                </a>
                                <a href="{{ route('admin.kontak.edit', $kontak->id) }}" class="btn btn-primary">
                                    <i class="ki-duotone ki-pencil fs-5 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Edit Kontak
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Informasi Umum -->
                <div class="col-lg-8">
                    <div class="card shadow-sm mb-8">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Umum</h3>
                        </div>
                        <div class="card-body">
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
                                            <a href="tel:{{ $kontak->telepon }}" class="text-primary">
                                                <i class="fas fa-phone fs-7 me-1"></i>{{ $kontak->telepon }}
                                            </a>
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-6">
                                    <label class="fw-semibold fs-7 text-muted">Email</label>
                                    <div class="fw-bold fs-6 text-gray-900">
                                        @if($kontak->email)
                                            <a href="mailto:{{ $kontak->email }}" class="text-primary">
                                                <i class="fas fa-envelope fs-7 me-1"></i>{{ $kontak->email }}
                                            </a>
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-12 mb-6">
                                    <label class="fw-semibold fs-7 text-muted">Website</label>
                                    <div class="fw-bold fs-6 text-gray-900">
                                        @if($kontak->website)
                                            <a href="{{ $kontak->website }}" target="_blank" class="text-primary">
                                                <i class="fas fa-external-link-alt fs-7 me-1"></i>{{ $kontak->website }}
                                            </a>
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Struktur Pemerintahan -->
                    <div class="card shadow-sm mb-8">
                        <div class="card-header">
                            <h3 class="card-title">Struktur Pemerintahan</h3>
                        </div>
                        <div class="card-body">
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
                    </div>

                    <!-- Koordinat -->
                    @if($kontak->koordinat)
                    <div class="card shadow-sm mb-8">
                        <div class="card-header">
                            <h3 class="card-title">Koordinat Lokasi</h3>
                        </div>
                        <div class="card-body">
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
                    </div>
                    @endif

                    <!-- Deskripsi -->
                    @if($kontak->deskripsi)
                    <div class="card shadow-sm mb-8">
                        <div class="card-header">
                            <h3 class="card-title">Deskripsi</h3>
                        </div>
                        <div class="card-body">
                            <div class="fw-bold fs-6 text-gray-900">{{ $kontak->deskripsi }}</div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Status Card -->
                    <div class="card shadow-sm mb-6">
                        <div class="card-header">
                            <h3 class="card-title">Status</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                @if($kontak->aktif)
                                    <span class="badge badge-light-success fs-7 me-3">Aktif</span>
                                @else
                                    <span class="badge badge-light-danger fs-7 me-3">Tidak Aktif</span>
                                @endif
                                <div>
                                    <div class="fw-bold fs-6 text-gray-900">Status Kontak</div>
                                    <div class="text-muted fs-7">Kontak ini {{ $kontak->aktif ? 'aktif' : 'tidak aktif' }} di website</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Jam Operasional -->
                    @if($kontak->jam_operasional_formatted)
                    <div class="card shadow-sm mb-6">
                        <div class="card-header">
                            <h3 class="card-title">Jam Operasional</h3>
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
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Sistem</h3>
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
                                <label class="fw-semibold fs-7 text-muted">ID Kontak</label>
                                <div class="fw-bold fs-6 text-gray-900">#{{ $kontak->id }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection