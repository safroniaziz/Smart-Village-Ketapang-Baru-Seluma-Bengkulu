@extends('layouts.dashboard.dashboard')

@section('title', 'Tambah Struktur Organisasi')

@section('menu')
    Tambah Struktur Organisasi
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.struktur-organisasi.index') }}" class="text-muted text-hover-primary">Manajemen Struktur Organisasi</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Tambah</li>
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
                                    <div class="symbol-label bg-light-success">
                                        <i class="fas fa-plus fs-2x text-success"></i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="fw-bold text-gray-900 mb-1">Tambah Struktur Organisasi</h2>
                                    <p class="text-muted mb-0">Tambahkan anggota baru ke struktur pemerintahan desa atau BPD</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('admin.struktur-organisasi.index') }}" class="btn btn-light-primary">
                                <i class="fas fa-arrow-left fs-5 me-2"></i>
                                Kembali ke Daftar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.struktur-organisasi.store') }}" method="POST" enctype="multipart/form-data" id="kt_struktur_form">
                @csrf
                <div class="row g-8">
                    <!-- Left Column: Basic Information -->
                    <div class="col-xl-8">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="fw-bold text-gray-900">Informasi Dasar</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row g-6">
                                    <!-- Nama -->
                                    <div class="col-md-6">
                                        <label class="required form-label fw-semibold text-gray-900">Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control form-control-solid @error('nama') is-invalid @enderror"
                                               placeholder="Masukkan nama lengkap" value="{{ old('nama') }}" required>
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Jabatan -->
                                    <div class="col-md-6">
                                        <label class="required form-label fw-semibold text-gray-900">Jabatan</label>
                                        <input type="text" name="jabatan" class="form-control form-control-solid @error('jabatan') is-invalid @enderror"
                                               placeholder="Contoh: Kepala Desa, Sekretaris Desa" value="{{ old('jabatan') }}" required>
                                        @error('jabatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Kategori -->
                                    <div class="col-md-6">
                                        <label class="required form-label fw-semibold text-gray-900">Kategori</label>
                                        <select name="kategori" class="form-select form-select-solid @error('kategori') is-invalid @enderror" data-control="select2" data-placeholder="Pilih kategori" required>
                                            <option></option>
                                            <option value="pemerintahan" {{ old('kategori') == 'pemerintahan' ? 'selected' : '' }}>
                                                🏛️ Pemerintahan Desa
                                            </option>
                                            <option value="bpd" {{ old('kategori') == 'bpd' ? 'selected' : '' }}>
                                                ⚖️ Badan Permusyawaratan Desa (BPD)
                                            </option>
                                        </select>
                                        @error('kategori')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Level -->
                                    <div class="col-md-6">
                                        <label class="required form-label fw-semibold text-gray-900">Level Jabatan</label>
                                        <select name="level" class="form-select form-select-solid @error('level') is-invalid @enderror" data-control="select2" data-placeholder="Pilih level" required>
                                            <option></option>
                                            <option value="kepala" {{ old('level') == 'kepala' ? 'selected' : '' }}>
                                                👑 Kepala (Pimpinan Tertinggi)
                                            </option>
                                            <option value="wakil" {{ old('level') == 'wakil' ? 'selected' : '' }}>
                                                🤝 Wakil
                                            </option>
                                            <option value="sekretaris" {{ old('level') == 'sekretaris' ? 'selected' : '' }}>
                                                📋 Sekretaris
                                            </option>
                                            <option value="kasi_kaur" {{ old('level') == 'kasi_kaur' ? 'selected' : '' }}>
                                                ⚙️ Kepala Seksi/Kepala Urusan
                                            </option>
                                            <option value="kadus" {{ old('level') == 'kadus' ? 'selected' : '' }}>
                                                🏘️ Kepala Dusun
                                            </option>
                                            <option value="anggota" {{ old('level') == 'anggota' ? 'selected' : '' }}>
                                                👤 Anggota
                                            </option>
                                        </select>
                                        @error('level')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Parent/Atasan -->
                                    <div class="col-12">
                                        <label class="form-label fw-semibold text-gray-900">Atasan Langsung</label>
                                        <select name="parent_id" class="form-select form-select-solid @error('parent_id') is-invalid @enderror" data-control="select2" data-placeholder="Pilih atasan (opsional)">
                                            <option></option>
                                            @foreach($parentOptions as $parent)
                                                <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                                                    {{ $parent->level_badge }} {{ $parent->nama }} - {{ $parent->jabatan }}
                                                    ({{ ucfirst($parent->kategori) }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('parent_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text text-muted">Kosongkan jika ini adalah posisi pimpinan tertinggi</div>
                                    </div>

                                    <!-- Foto Upload -->
                                    <div class="col-12">
                                        <label class="form-label fw-semibold text-gray-900">Foto Profil</label>
                                        <div class="d-flex flex-column">
                                            <div class="dropzone dropzone-queue border-gray-300 p-4" id="kt_dropzonejs_example_1">
                                                <div class="dropzone-panel mb-4">
                                                    <a class="dropzone-select btn btn-sm btn-primary me-2">Pilih File</a>
                                                    <a class="dropzone-remove-all btn btn-sm btn-light-primary">Hapus Semua</a>
                                                </div>
                                                <div class="dropzone-items wm-200px">
                                                    <div class="dropzone-item p-5" style="display:none">
                                                        <div class="dropzone-file">
                                                            <div class="dropzone-filename text-gray-900" title="some_image_file_name.jpg">
                                                                <span data-dz-name="">some_image_file_name.jpg</span>
                                                                <strong>(<span data-dz-size="">340kb</span>)</strong>
                                                            </div>
                                                            <div class="dropzone-error mt-0" data-dz-errormessage=""></div>
                                                        </div>
                                                        <div class="dropzone-progress">
                                                            <div class="progress bg-light-primary">
                                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
                                                            </div>
                                                        </div>
                                                        <div class="dropzone-toolbar">
                                                            <span class="dropzone-start">
                                                                <i class="ki-duotone ki-to-right fs-1"></i>
                                                            </span>
                                                            <span class="dropzone-cancel" data-dz-remove="" style="display: none;">
                                                                <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                                                            </span>
                                                            <span class="dropzone-delete" data-dz-remove="">
                                                                <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Fallback file input -->
                                            <input type="file" name="foto" class="form-control form-control-solid mt-3 @error('foto') is-invalid @enderror"
                                                   accept="image/jpeg,image/png,image/jpg" id="foto_input">
                                            @error('foto')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="form-text text-muted">Upload foto profil (JPG, PNG, max 2MB)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tugas & Wewenang Card -->
                        <div class="card shadow-sm mt-8">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="fw-bold text-gray-900">Tugas & Wewenang</h3>
                                </div>
                                <div class="card-toolbar">
                                    <span class="badge badge-light-primary">Opsional</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row g-6">
                                    <!-- Tugas -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold text-gray-900">Tugas Pokok</label>
                                        <div id="tugas-container">
                                            <div class="input-group mb-3">
                                                <input type="text" name="tugas[]" class="form-control" placeholder="Masukkan tugas...">
                                                <button type="button" class="btn btn-success add-tugas" title="Tambah tugas">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-text text-muted">Tekan tombol + untuk menambah tugas lainnya</div>
                                    </div>

                                    <!-- Wewenang -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold text-gray-900">Wewenang</label>
                                        <div id="wewenang-container">
                                            <div class="input-group mb-3">
                                                <input type="text" name="wewenang[]" class="form-control" placeholder="Masukkan wewenang...">
                                                <button type="button" class="btn btn-success add-wewenang" title="Tambah wewenang">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-text text-muted">Tekan tombol + untuk menambah wewenang lainnya</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Settings & Actions -->
                    <div class="col-xl-4">
                        <!-- Status Card -->
                        <div class="card shadow-sm mb-8">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="fw-bold text-gray-900">Pengaturan</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Status Aktif -->
                                <div class="mb-6">
                                    <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                        <input class="form-check-input" type="checkbox" name="aktif" id="aktif" checked>
                                        <label class="form-check-label fw-semibold text-gray-700 ms-3" for="aktif">
                                            Status Aktif
                                        </label>
                                    </div>
                                    <div class="form-text text-muted mt-2">Centang jika struktur ini masih aktif dalam organisasi</div>
                                </div>

                                <!-- Urutan -->
                                <div class="mb-6">
                                    <label class="form-label fw-semibold text-gray-900">Urutan Tampil</label>
                                    <input type="number" name="urutan" class="form-control form-control-solid @error('urutan') is-invalid @enderror"
                                           placeholder="0 (otomatis)" value="{{ old('urutan') }}" min="0">
                                    @error('urutan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text text-muted">Kosongkan untuk urutan otomatis</div>
                                </div>
                            </div>
                        </div>

                        <!-- Help Card -->
                        <div class="card shadow-sm mb-8 bg-light-info">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-info-circle text-info fs-2x me-4 mt-1"></i>
                                    <div>
                                        <h4 class="fw-bold text-info mb-3">Tips Pengisian</h4>
                                        <ul class="text-gray-700 mb-0">
                                            <li class="mb-2">Pilih <strong>Kategori</strong> sesuai jenis organisasi</li>
                                            <li class="mb-2">Tentukan <strong>Level</strong> jabatan dengan tepat</li>
                                            <li class="mb-2">Pilih <strong>Atasan</strong> untuk membentuk hierarki yang benar</li>
                                            <li class="mb-2">Upload <strong>foto</strong> dengan resolusi yang baik</li>
                                            <li>Isi <strong>tugas & wewenang</strong> secara detail</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex flex-column gap-3">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-save me-2"></i>
                                        Simpan Struktur
                                    </button>
                                    <a href="{{ route('admin.struktur-organisasi.index') }}" class="btn btn-light-danger">
                                        <i class="fas fa-times me-2"></i>
                                        Batal
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add tugas functionality
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-tugas') || e.target.parentElement.classList.contains('add-tugas')) {
            e.preventDefault();
            const container = document.getElementById('tugas-container');
            const newInput = document.createElement('div');
            newInput.className = 'input-group mb-3';
            newInput.innerHTML = `
                <input type="text" name="tugas[]" class="form-control" placeholder="Masukkan tugas...">
                <button type="button" class="btn btn-danger remove-item" title="Hapus tugas">
                    <i class="fas fa-minus"></i>
                </button>
            `;
            container.appendChild(newInput);
        }
    });

    // Add wewenang functionality
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-wewenang') || e.target.parentElement.classList.contains('add-wewenang')) {
            e.preventDefault();
            const container = document.getElementById('wewenang-container');
            const newInput = document.createElement('div');
            newInput.className = 'input-group mb-3';
            newInput.innerHTML = `
                <input type="text" name="wewenang[]" class="form-control" placeholder="Masukkan wewenang...">
                <button type="button" class="btn btn-danger remove-item" title="Hapus wewenang">
                    <i class="fas fa-minus"></i>
                </button>
            `;
            container.appendChild(newInput);
        }
    });

    // Remove item functionality
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-item') || e.target.parentElement.classList.contains('remove-item')) {
            e.preventDefault();
            const inputGroup = e.target.closest('.input-group');
            inputGroup.remove();
        }
    });

    // Form validation
    const form = document.getElementById('kt_struktur_form');
    form.addEventListener('submit', function(e) {
        const nama = document.querySelector('input[name="nama"]').value.trim();
        const jabatan = document.querySelector('input[name="jabatan"]').value.trim();
        const kategori = document.querySelector('select[name="kategori"]').value;
        const level = document.querySelector('select[name="level"]').value;

        if (!nama || !jabatan || !kategori || !level) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Data Tidak Lengkap',
                text: 'Mohon lengkapi semua field yang required (bertanda *)'
            });
            return false;
        }
    });

    // Auto-suggest jabatan based on level
    const levelSelect = document.querySelector('select[name="level"]');
    const jabatanInput = document.querySelector('input[name="jabatan"]');

    if (levelSelect && jabatanInput) {
        levelSelect.addEventListener('change', function() {
            const kategori = document.querySelector('select[name="kategori"]').value;
            const level = this.value;

            let suggestions = {
                'pemerintahan': {
                    'kepala': 'Kepala Desa',
                    'sekretaris': 'Sekretaris Desa',
                    'kasi_kaur': 'Kaur Keuangan / Kaur Perencanaan / Kasi Pemerintahan / Kasi Kesejahteraan',
                    'kadus': 'Kepala Dusun'
                },
                'bpd': {
                    'kepala': 'Ketua BPD',
                    'wakil': 'Wakil Ketua BPD',
                    'sekretaris': 'Sekretaris BPD',
                    'anggota': 'Anggota BPD'
                }
            };

            if (kategori && level && suggestions[kategori] && suggestions[kategori][level]) {
                const suggestion = suggestions[kategori][level];
                if (jabatanInput.value.trim() === '') {
                    jabatanInput.value = suggestion.split(' / ')[0]; // Take first suggestion
                }
            }
        });
    }
});
</script>
@endpush
