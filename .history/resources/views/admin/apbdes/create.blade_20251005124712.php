@extends('layouts.dashboard.dashboard')

@section('title', 'Tambah Data APBDes')

@section('menu')
    Tambah Data APBDes
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.apbdes.index') }}" class="text-muted text-hover-primary">APBDes</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Tambah</li>
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
                    <h3 class="card-title">Form Tambah Data APBDes</h3>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.apbdes.index') }}" class="btn btn-light-primary">
                            <i class="ki-duotone ki-arrow-left fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                            Kembali
                        </a>
                    </div>
                </div>
                
                <form action="{{ route('admin.apbdes.store') }}" method="POST" class="form">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Tahun Anggaran</label>
                                    <select name="tahun_anggaran" class="form-select form-select-solid @error('tahun_anggaran') is-invalid @enderror">
                                        <option value="">Pilih Tahun Anggaran</option>
                                        @for($year = 2020; $year <= 2030; $year++)
                                            <option value="{{ $year }}" {{ old('tahun_anggaran') == $year ? 'selected' : ($year == date('Y') ? 'selected' : '') }}>
                                                {{ $year }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('tahun_anggaran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Jenis Anggaran</label>
                                    <select name="jenis_anggaran" class="form-select form-select-solid @error('jenis_anggaran') is-invalid @enderror">
                                        <option value="">Pilih Jenis Anggaran</option>
                                        <option value="pendapatan" {{ old('jenis_anggaran') == 'pendapatan' ? 'selected' : '' }}>Pendapatan</option>
                                        <option value="belanja" {{ old('jenis_anggaran') == 'belanja' ? 'selected' : '' }}>Belanja</option>
                                    </select>
                                    @error('jenis_anggaran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control form-control-solid @error('keterangan') is-invalid @enderror" 
                                   value="{{ old('keterangan') }}" placeholder="Masukkan keterangan anggaran">
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Jumlah Anggaran</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" name="anggaran" class="form-control form-control-solid @error('anggaran') is-invalid @enderror" 
                                       value="{{ old('anggaran') }}" placeholder="0" min="0" step="0.01">
                            </div>
                            @error('anggaran')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Keterangan Detail</label>
                            <textarea name="keterangan_detail" class="form-control form-control-solid @error('keterangan_detail') is-invalid @enderror" 
                                      rows="4" placeholder="Masukkan keterangan detail (opsional)">{{ old('keterangan_detail') }}</textarea>
                            @error('keterangan_detail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="text-end">
                            <a href="{{ route('admin.apbdes.index') }}" class="btn btn-light me-3">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="ki-duotone ki-check fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                Simpan Data
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection