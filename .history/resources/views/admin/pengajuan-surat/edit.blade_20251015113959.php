@extends('layouts.dashboard.dashboard')

@section('title', 'Edit Pengajuan Surat')

@section('menu')
    Edit Pengajuan Surat
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.pengajuan-surat.index') }}" class="text-muted text-hover-primary">Manajemen Pengajuan Surat</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.pengajuan-surat.show', $pengajuan->id) }}" class="text-muted text-hover-primary">Detail Pengajuan</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Edit Pengajuan</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="ki-duotone ki-check-circle fs-2 text-success me-3"><span class="path1"></span><span class="path2"></span></i>
                        <div class="flex-grow-1">
                            <div class="fw-bold mb-1">Berhasil</div>
                            <div>{{ session('success') }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="ki-duotone ki-cross-circle fs-2 text-danger me-3"><span class="path1"></span><span class="path2"></span></i>
                        <div class="flex-grow-1">
                            <div class="fw-bold mb-1">Error</div>
                            <div>{{ session('error') }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <h3 class="fw-bold m-0">Edit Pengajuan Surat</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.pengajuan-surat.show', $pengajuan->id) }}" class="btn btn-light btn-sm">
                            <i class="ki-duotone ki-arrow-left fs-4"><span class="path1"></span><span class="path2"></span></i>
                            Kembali ke Detail
                        </a>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <form action="{{ route('admin.pengajuan-surat.update', $pengajuan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label class="required form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control"
                                           value="{{ old('nama_lengkap', $pengajuan->nama_lengkap) }}" required>
                                    @error('nama_lengkap')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label class="required form-label">NIK</label>
                                    <input type="text" name="nik" class="form-control"
                                           value="{{ old('nik', $pengajuan->nik) }}" required>
                                    @error('nik')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label class="required form-label">No. HP</label>
                                    <input type="text" name="no_hp" class="form-control"
                                           value="{{ old('no_hp', $pengajuan->no_hp) }}" required>
                                    @error('no_hp')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label class="required form-label">Jenis Surat</label>
                                    <input type="text" class="form-control"
                                           value="{{ ucfirst(str_replace('_', ' ', $pengajuan->jenis_surat)) }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="required form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $pengajuan->alamat) }}</textarea>
                            @error('alamat')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label class="required form-label">Keperluan</label>
                            <textarea name="keperluan" class="form-control" rows="3" required>{{ old('keperluan', $pengajuan->keperluan) }}</textarea>
                            @error('keperluan')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label class="required form-label">Jenis TTD</label>
                                    <select name="jenis_ttd" class="form-select" required>
                                        <option value="manual" {{ old('jenis_ttd', $pengajuan->jenis_ttd) == 'manual' ? 'selected' : '' }}>TTD Manual</option>
                                        <option value="gambar" {{ old('jenis_ttd', $pengajuan->jenis_ttd) == 'gambar' ? 'selected' : '' }}>TTD Gambar</option>
                                        <option value="qrcode" {{ old('jenis_ttd', $pengajuan->jenis_ttd) == 'qrcode' ? 'selected' : '' }}>TTD QR Code</option>
                                    </select>
                                    @error('jenis_ttd')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label class="required form-label">Jenis TTD Camat</label>
                                    <select name="jenis_ttd_camat" class="form-select" required>
                                        <option value="manual" {{ old('jenis_ttd_camat', $pengajuan->jenis_ttd_camat) == 'manual' ? 'selected' : '' }}>TTD Manual</option>
                                        <option value="gambar" {{ old('jenis_ttd_camat', $pengajuan->jenis_ttd_camat) == 'gambar' ? 'selected' : '' }}>TTD Gambar</option>
                                        <option value="qrcode" {{ old('jenis_ttd_camat', $pengajuan->jenis_ttd_camat) == 'qrcode' ? 'selected' : '' }}>TTD QR Code</option>
                                    </select>
                                    @error('jenis_ttd_camat')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('admin.pengajuan-surat.show', $pengajuan->id) }}" class="btn btn-light me-3">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="ki-duotone ki-check fs-4"><span class="path1"></span><span class="path2"></span></i>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
