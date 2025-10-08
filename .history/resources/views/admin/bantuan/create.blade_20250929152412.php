@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Tambah Bantuan Individual')

@section('menu')
    Tambah Bantuan Individual
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.bantuan.index') }}" class="text-muted text-hover-primary">Manajemen Bantuan</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Tambah Individual</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="ki-duotone ki-cross-circle fs-2 text-danger me-3"><span class="path1"></span><span class="path2"></span></i>
                        <div class="flex-grow-1">
                            <div class="fw-bold mb-1">Terjadi Kesalahan</div>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="fw-bold">Form Tambah Bantuan Individual</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.bantuan.index') }}" class="btn btn-sm btn-light">
                            <i class="ki-duotone ki-arrow-left fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.bantuan.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-6">
                                    <label for="user_id" class="form-label required">Pilih Warga</label>
                                    <select name="user_id" id="user_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Pilih warga..." required>
                                        <option value="">Pilih warga...</option>
                                        @foreach($wargas as $warga)
                                            <option value="{{ $warga->id }}" @selected(old('user_id') == $warga->id)>
                                                {{ $warga->nama_lengkap }} - {{ $warga->nik }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-6">
                                    <label for="program" class="form-label required">Program Bantuan</label>
                                    <input type="text" name="program" id="program" class="form-control form-control-solid" placeholder="Contoh: BLT, PKH, Bansos, dll" value="{{ old('program') }}" required>
                                    @error('program')
                                        <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-6">
                                    <label for="tahun" class="form-label required">Tahun</label>
                                    <input type="number" name="tahun" id="tahun" class="form-control form-control-solid" min="2020" max="{{ date('Y') + 5 }}" value="{{ old('tahun', date('Y')) }}" required>
                                    @error('tahun')
                                        <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-6">
                                    <label for="nominal" class="form-label">Nominal (Rp)</label>
                                    <input type="number" name="nominal" id="nominal" class="form-control form-control-solid" placeholder="0" value="{{ old('nominal') }}" min="0" step="1000">
                                    @error('nominal')
                                        <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-6">
                                    <label for="status" class="form-label required">Status</label>
                                    <select name="status" id="status" class="form-select form-select-solid" required>
                                        <option value="Aktif" @selected(old('status', 'Aktif') === 'Aktif')>Aktif</option>
                                        <option value="Tidak Aktif" @selected(old('status') === 'Tidak Aktif')>Tidak Aktif</option>
                                        <option value="Selesai" @selected(old('status') === 'Selesai')>Selesai</option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control form-control-solid" rows="3" placeholder="Keterangan tambahan (opsional)">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end gap-3">
                            <a href="{{ route('admin.bantuan.index') }}" class="btn btn-light">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="ki-duotone ki-check fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
