@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Tambah Berita')

@section('menu')
    Tambah Berita
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.berita.index') }}" class="text-muted text-hover-primary">Manajemen Berita</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Tambah Berita</li>
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
                                    <div class="symbol-label bg-light-emerald">
                                        <i class="fas fa-plus fs-2x text-emerald-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="fw-bold text-gray-900 mb-1">Tambah Berita Baru</h2>
                                    <p class="text-muted mb-0">Buat berita dan artikel desa yang menarik</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('admin.berita.index') }}" class="btn btn-light">
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
                    <form action="{{ route('admin.berita.store') }}" method="POST" id="berita-form">
                        @csrf
                        
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-lg-8">
                                <!-- Judul -->
                                <div class="mb-6">
                                    <label class="form-label fw-bold fs-6 mb-2">
                                        <span class="required">Judul Berita</span>
                                    </label>
                                    <input type="text" name="judul" class="form-control form-control-solid @error('judul') is-invalid @enderror" 
                                           placeholder="Masukkan judul berita yang menarik" value="{{ old('judul') }}" required>
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
                                              rows="3" placeholder="Tulis ringkasan singkat tentang berita ini" required>{{ old('excerpt') }}</textarea>
                                    <div class="form-text">Maksimal 500 karakter. Ringkasan ini akan ditampilkan di halaman utama.</div>
                                    @error('excerpt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Konten -->
                                <div class="mb-6">
                                    <label class="form-label fw-bold fs-6 mb-2">
                                        <span class="required">Konten Berita</span>
                                    </label>
                                    <textarea name="konten" id="konten" class="form-control form-control-solid @error('konten') is-invalid @enderror" 
                                              rows="15" placeholder="Tulis konten berita lengkap di sini" required>{{ old('konten') }}</textarea>
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
                                                Publikasikan Berita
                                            </label>
                                            <div class="form-text">Centang untuk langsung mempublikasikan berita</div>
                                        </div>

                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="featured" id="featured" 
                                                   {{ old('featured') ? 'checked' : '' }}>
                                            <label class="form-check-label fw-bold" for="featured">
                                                Berita Utama
                                            </label>
                                            <div class="form-text">Centang untuk menjadikan berita utama</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Meta Information -->
                                <div class="card bg-light-info mb-6">
                                    <div class="card-header">
                                        <h3 class="card-title fw-bold text-info">Informasi Tambahan</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Kategori -->
                                        <div class="mb-4">
                                            <label class="form-label fw-bold fs-6 mb-2">Kategori</label>
                                            <input type="text" name="kategori" class="form-control form-control-solid @error('kategori') is-invalid @enderror" 
                                                   placeholder="Contoh: Umum, Pemerintahan, Kegiatan" value="{{ old('kategori') }}">
                                            @error('kategori')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

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
                                            <i class="fas fa-newspaper fs-3x text-success mb-3"></i>
                                            <div class="fw-bold text-gray-900">Berita Baru</div>
                                            <div class="text-muted fs-7">Klik "Simpan" untuk melihat preview</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-end gap-3 mt-8 pt-6 border-top">
                            <a href="{{ route('admin.berita.index') }}" class="btn btn-light">
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
        placeholder: 'Tulis konten berita lengkap di sini...'
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
        text: "Berita akan disimpan sebagai draft dan tidak akan dipublikasikan.",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#ffc107',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Simpan Draft',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#berita-form').submit();
        }
    });
}

// Form validation
$('#berita-form').on('submit', function(e) {
    const judul = $('input[name="judul"]').val().trim();
    const excerpt = $('textarea[name="excerpt"]').val().trim();
    const konten = $('#konten').summernote('code').replace(/<[^>]*>/g, '').trim();

    if (!judul) {
        e.preventDefault();
        Swal.fire({
            title: 'Error!',
            text: 'Judul berita harus diisi.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (!excerpt) {
        e.preventDefault();
        Swal.fire({
            title: 'Error!',
            text: 'Ringkasan berita harus diisi.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (!konten) {
        e.preventDefault();
        Swal.fire({
            title: 'Error!',
            text: 'Konten berita harus diisi.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (excerpt.length > 500) {
        e.preventDefault();
        Swal.fire({
            title: 'Error!',
            text: 'Ringkasan berita maksimal 500 karakter.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }
});
</script>
@endpush
