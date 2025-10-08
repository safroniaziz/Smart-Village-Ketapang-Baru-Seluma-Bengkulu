@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Tambah Pengumuman')

@section('menu')
    Tambah Pengumuman
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.pengumuman.index') }}" class="text-muted text-hover-primary">Manajemen Pengumuman</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Tambah Pengumuman</li>
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
                                    <div class="symbol-label bg-light-primary">
                                        <i class="fas fa-plus fs-2x text-primary-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="fw-bold text-gray-900 mb-1">Tambah Pengumuman Baru</h2>
                                    <p class="text-muted mb-0">Buat pengumuman resmi desa yang penting</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-light">
                                <i class="fas fa-arrow-left fs-5 me-2"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.pengumuman.store') }}" method="POST" id="pengumuman-form">
                        @csrf
                        
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-lg-8">
                                <!-- Judul -->
                                <div class="mb-6">
                                    <label class="form-label fw-bold fs-6 mb-2">
                                        <span class="required">Judul Pengumuman</span>
                                    </label>
                                    <input type="text" name="judul" class="form-control form-control-solid @error('judul') is-invalid @enderror" 
                                           placeholder="Masukkan judul pengumuman yang jelas" value="{{ old('judul') }}" required>
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Excerpt -->
                                <div class="mb-6">
                                    <label class="form-label fw-bold fs-6 mb-2">
                                        <span class="required">Ringkasan</span>
                                    </label>
                                    <textarea name="excerpt" class="form-control form-control-solid @error('excerpt') is-invalid @enderror" 
                                              rows="3" placeholder="Tulis ringkasan singkat tentang pengumuman ini" required>{{ old('excerpt') }}</textarea>
                                    <div class="form-text">Maksimal 500 karakter. Ringkasan ini akan ditampilkan di halaman utama.</div>
                                    @error('excerpt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Konten -->
                                <div class="mb-6">
                                    <label class="form-label fw-bold fs-6 mb-2">
                                        <span class="required">Konten Pengumuman</span>
                                    </label>
                                    <textarea name="konten" id="konten" class="form-control form-control-solid @error('konten') is-invalid @enderror" 
                                              rows="15" placeholder="Tulis konten pengumuman lengkap di sini" required>{{ old('konten') }}</textarea>
                                    @error('konten')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-lg-4">
                                <!-- Publish Settings -->
                                <div class="card bg-light-primary mb-6">
                                    <div class="card-header">
                                        <h3 class="card-title fw-bold text-primary">Pengaturan Publikasi</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check form-switch mb-4">
                                            <input class="form-check-input" type="checkbox" name="published" id="published" 
                                                   {{ old('published', true) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-bold" for="published">
                                                Publikasikan Pengumuman
                                            </label>
                                            <div class="form-text">Centang untuk langsung mempublikasikan pengumuman</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Priority Settings -->
                                <div class="card bg-light-danger mb-6">
                                    <div class="card-header">
                                        <h3 class="card-title fw-bold text-danger">Prioritas Pengumuman</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <label class="form-label fw-bold fs-6 mb-2">
                                                <span class="required">Tingkat Prioritas</span>
                                            </label>
                                            <select name="prioritas" class="form-select form-select-solid @error('prioritas') is-invalid @enderror" required>
                                                <option value="">Pilih Prioritas</option>
                                                <option value="tinggi" {{ old('prioritas') == 'tinggi' ? 'selected' : '' }}>Tinggi - Sangat Penting</option>
                                                <option value="sedang" {{ old('prioritas') == 'sedang' ? 'selected' : '' }}>Sedang - Penting</option>
                                                <option value="rendah" {{ old('prioritas') == 'rendah' ? 'selected' : '' }}>Rendah - Informasi</option>
                                            </select>
                                            @error('prioritas')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Deadline Settings -->
                                <div class="card bg-light-warning mb-6">
                                    <div class="card-header">
                                        <h3 class="card-title fw-bold text-warning">Tanggal Berakhir</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <label class="form-label fw-bold fs-6 mb-2">
                                                <span class="required">Tanggal Berakhir</span>
                                            </label>
                                            <input type="date" name="tanggal_berakhir" class="form-control form-control-solid @error('tanggal_berakhir') is-invalid @enderror" 
                                                   value="{{ old('tanggal_berakhir') }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                                            <div class="form-text">Pengumuman akan berakhir pada tanggal ini</div>
                                            @error('tanggal_berakhir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Meta Information -->
                                <div class="card bg-light-info mb-6">
                                    <div class="card-header">
                                        <h3 class="card-title fw-bold text-info">Informasi Tambahan</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Penulis -->
                                        <div class="mb-4">
                                            <label class="form-label fw-bold fs-6 mb-2">Penulis</label>
                                            <input type="text" name="penulis" class="form-control form-control-solid @error('penulis') is-invalid @enderror" 
                                                   placeholder="Nama penulis" value="{{ old('penulis', 'Admin Desa') }}">
                                            @error('penulis')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Preview Card -->
                                <div class="card bg-light-success">
                                    <div class="card-header">
                                        <h3 class="card-title fw-bold text-success">Preview</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <i class="fas fa-bullhorn fs-3x text-success mb-3"></i>
                                            <div class="fw-bold text-gray-900">Pengumuman Baru</div>
                                            <div class="text-muted fs-7">Klik "Simpan" untuk melihat preview</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-end gap-3 mt-8 pt-6 border-top">
                            <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-light">
                                <i class="fas fa-times fs-5 me-2"></i>
                                Batal
                            </a>
                            <button type="button" class="btn btn-warning" onclick="saveDraft()">
                                <i class="fas fa-save fs-5 me-2"></i>
                                Simpan Draft
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check fs-5 me-2"></i>
                                Simpan & Publikasikan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    // Initialize Summernote
    $('#konten').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        placeholder: 'Tulis konten pengumuman lengkap di sini...'
    });

    // Auto generate excerpt from content
    $('#konten').on('summernote.change', function() {
        const content = $(this).summernote('code');
        const textContent = $(content).text();
        if (textContent.length > 0 && $('textarea[name="excerpt"]').val().length === 0) {
            $('textarea[name="excerpt"]').val(textContent.substring(0, 200) + '...');
        }
    });
});

function saveDraft() {
    // Uncheck published checkbox
    $('#published').prop('checked', false);
    
    // Show confirmation
    Swal.fire({
        title: 'Simpan sebagai Draft?',
        text: "Pengumuman akan disimpan sebagai draft dan tidak akan dipublikasikan.",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#ffc107',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Simpan Draft',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#pengumuman-form').submit();
        }
    });
}

// Form validation
$('#pengumuman-form').on('submit', function(e) {
    const judul = $('input[name="judul"]').val().trim();
    const excerpt = $('textarea[name="excerpt"]').val().trim();
    const konten = $('#konten').summernote('code').replace(/<[^>]*>/g, '').trim();
    const prioritas = $('select[name="prioritas"]').val();
    const tanggalBerakhir = $('input[name="tanggal_berakhir"]').val();

    if (!judul) {
        e.preventDefault();
        Swal.fire({
            title: 'Error!',
            text: 'Judul pengumuman harus diisi.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (!excerpt) {
        e.preventDefault();
        Swal.fire({
            title: 'Error!',
            text: 'Ringkasan pengumuman harus diisi.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (!konten) {
        e.preventDefault();
        Swal.fire({
            title: 'Error!',
            text: 'Konten pengumuman harus diisi.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (!prioritas) {
        e.preventDefault();
        Swal.fire({
            title: 'Error!',
            text: 'Prioritas pengumuman harus dipilih.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (!tanggalBerakhir) {
        e.preventDefault();
        Swal.fire({
            title: 'Error!',
            text: 'Tanggal berakhir pengumuman harus diisi.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (excerpt.length > 500) {
        e.preventDefault();
        Swal.fire({
            title: 'Error!',
            text: 'Ringkasan pengumuman maksimal 500 karakter.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }
});
</script>
@endpush
