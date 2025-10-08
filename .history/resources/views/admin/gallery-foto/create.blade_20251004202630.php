@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Tambah Foto Gallery')

@section('menu')
    Tambah Foto Gallery
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.gallery-foto.index') }}" class="text-muted text-hover-primary">Manajemen Gallery Foto</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Tambah Foto Gallery</li>
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
                                        <i class="ki-duotone ki-plus fs-2x text-primary-600">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="fw-bold text-gray-900 mb-1">Tambah Foto Gallery</h2>
                                    <p class="text-muted mb-0">Tambahkan foto baru ke gallery desa</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('admin.gallery-foto.index') }}" class="btn btn-light">
                                <i class="ki-duotone ki-arrow-left fs-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-5 g-xl-8">
                <div class="col-xl-8">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Form Tambah Foto</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.gallery-foto.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                        
                                <div class="row g-5">
                                    <div class="col-md-6">
                                        <!-- Judul -->
                                        <div class="mb-5">
                                            <label for="judul" class="form-label fw-semibold required">Judul Foto</label>
                                            <input type="text" class="form-control form-control-solid @error('judul') is-invalid @enderror" 
                                                   id="judul" name="judul" value="{{ old('judul') }}" required>
                                            @error('judul')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Kategori -->
                                        <div class="mb-5">
                                            <label for="kategori" class="form-label fw-semibold required">Kategori</label>
                                            <select class="form-select form-select-solid @error('kategori') is-invalid @enderror" 
                                                    id="kategori" name="kategori" required>
                                                <option value="">Pilih Kategori</option>
                                                @foreach($categories as $key => $label)
                                                    <option value="{{ $key }}" {{ old('kategori') == $key ? 'selected' : '' }}>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kategori')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- URL Foto -->
                        <div class="mb-3">
                            <label for="url_foto" class="form-label required">URL Foto</label>
                            <input type="url" class="form-control @error('url_foto') is-invalid @enderror" 
                                   id="url_foto" name="url_foto" value="{{ old('url_foto') }}" 
                                   placeholder="https://images.unsplash.com/photo..." required>
                            @error('url_foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Gunakan URL dari Google Images, Unsplash, atau hosting lainnya</div>
                        </div>

                        <!-- Preview Image -->
                        <div class="mb-3" id="image-preview-container" style="display: none;">
                            <label class="form-label">Preview</label>
                            <div class="border rounded p-3 text-center">
                                <img id="image-preview" src="" alt="Preview" class="img-fluid" style="max-height: 300px;">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Alt Text -->
                                <div class="mb-3">
                                    <label for="alt_text" class="form-label">Alt Text</label>
                                    <input type="text" class="form-control @error('alt_text') is-invalid @enderror" 
                                           id="alt_text" name="alt_text" value="{{ old('alt_text') }}">
                                    @error('alt_text')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Deskripsi singkat untuk aksesibilitas</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Photographer -->
                                <div class="mb-3">
                                    <label for="photographer" class="form-label">Photographer</label>
                                    <input type="text" class="form-control @error('photographer') is-invalid @enderror" 
                                           id="photographer" name="photographer" value="{{ old('photographer') }}">
                                    @error('photographer')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Urutan -->
                                <div class="mb-3">
                                    <label for="urutan" class="form-label">Urutan</label>
                                    <input type="number" class="form-control @error('urutan') is-invalid @enderror" 
                                           id="urutan" name="urutan" value="{{ old('urutan') }}" min="1">
                                    @error('urutan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Kosongkan untuk urutan otomatis</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Tanggal Foto -->
                                <div class="mb-3">
                                    <label for="tanggal_foto" class="form-label">Tanggal Foto</label>
                                    <input type="date" class="form-control @error('tanggal_foto') is-invalid @enderror" 
                                           id="tanggal_foto" name="tanggal_foto" value="{{ old('tanggal_foto') }}">
                                    @error('tanggal_foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Hero Photo Option -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_hero" name="is_hero" value="1" {{ old('is_hero') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_hero">
                                    <strong>Set sebagai Hero Photo</strong>
                                    <div class="form-text">Foto ini akan ditampilkan sebagai gambar utama di halaman potensi wisata. Hanya satu foto yang bisa menjadi hero.</div>
                                </label>
                            </div>
                        </div>

                        <!-- Status Aktif -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="status_aktif" name="status_aktif" value="1" {{ old('status_aktif', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_aktif">
                                    <strong>Status Aktif</strong>
                                    <div class="form-text">Foto akan ditampilkan di frontend jika aktif</div>
                                </label>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <a href="{{ route('admin.gallery-foto.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Tips Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tips Upload Foto</h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Gunakan resolusi minimal 800x600px
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Format JPG, PNG, atau WebP
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Ukuran file maksimal 10MB
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Gunakan URL yang dapat diakses publik
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Isi alt text untuk aksesibilitas
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Hero Photo Info -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning">Hero Photo</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted small">
                        Hero photo akan ditampilkan sebagai gambar utama di halaman potensi wisata. 
                        Hanya satu foto yang bisa menjadi hero pada satu waktu.
                    </p>
                    @if($currentHero)
                        <div class="alert alert-info">
                            <strong>Hero saat ini:</strong><br>
                            {{ $currentHero->judul }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const urlInput = document.getElementById('url_foto');
    const previewContainer = document.getElementById('image-preview-container');
    const previewImage = document.getElementById('image-preview');

    urlInput.addEventListener('input', function() {
        const url = this.value;
        if (url && isValidUrl(url)) {
            previewImage.src = url;
            previewImage.onload = function() {
                previewContainer.style.display = 'block';
            };
            previewImage.onerror = function() {
                previewContainer.style.display = 'none';
            };
        } else {
            previewContainer.style.display = 'none';
        }
    });

    function isValidUrl(string) {
        try {
            new URL(string);
            return true;
        } catch (_) {
            return false;
        }
    }
});
</script>
@endpush
