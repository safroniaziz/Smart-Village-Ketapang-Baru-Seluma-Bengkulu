@extends('layouts.dashboard.dashboard')

@section('title', 'Edit Struktur Organisasi')

@section('menu')
    Edit Struktur Organisasi
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
    <li class="breadcrumb-item text-muted">Edit {{ $strukturOrganisasi->nama }}</li>
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
                                    <div class="symbol-label">
                                        <img src="{{ $strukturOrganisasi->foto_url }}" alt="{{ $strukturOrganisasi->nama }}" class="w-100 rounded">
                                    </div>
                                </div>
                                <div>
                                    <h2 class="fw-bold text-gray-900 mb-1">Edit: {{ $strukturOrganisasi->nama }}</h2>
                                    <p class="text-muted mb-0">{{ $strukturOrganisasi->level_badge }} {{ $strukturOrganisasi->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.struktur-organisasi.show', $strukturOrganisasi) }}" class="btn btn-light-info">
                                    <i class="fas fa-eye fs-5 me-2"></i>
                                    Lihat Detail
                                </a>
                                <a href="{{ route('admin.struktur-organisasi.index') }}" class="btn btn-light-primary">
                                    <i class="fas fa-arrow-left fs-5 me-2"></i>
                                    Kembali ke Daftar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.struktur-organisasi.update', $strukturOrganisasi) }}" method="POST" enctype="multipart/form-data" id="kt_struktur_form">
                @csrf
                @method('PUT')
                
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
                                               placeholder="Masukkan nama lengkap" value="{{ old('nama', $strukturOrganisasi->nama) }}" required>
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Jabatan -->
                                    <div class="col-md-6">
                                        <label class="required form-label fw-semibold text-gray-900">Jabatan</label>
                                        <input type="text" name="jabatan" class="form-control form-control-solid @error('jabatan') is-invalid @enderror" 
                                               placeholder="Contoh: Kepala Desa, Sekretaris Desa" value="{{ old('jabatan', $strukturOrganisasi->jabatan) }}" required>
                                        @error('jabatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Kategori -->
                                    <div class="col-md-6">
                                        <label class="required form-label fw-semibold text-gray-900">Kategori</label>
                                        <select name="kategori" class="form-select form-select-solid @error('kategori') is-invalid @enderror" data-control="select2" data-placeholder="Pilih kategori" required>
                                            <option></option>
                                            <option value="pemerintahan" {{ old('kategori', $strukturOrganisasi->kategori) == 'pemerintahan' ? 'selected' : '' }}>
                                                🏛️ Pemerintahan Desa
                                            </option>
                                            <option value="bpd" {{ old('kategori', $strukturOrganisasi->kategori) == 'bpd' ? 'selected' : '' }}>
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
                                            <option value="kepala" {{ old('level', $strukturOrganisasi->level) == 'kepala' ? 'selected' : '' }}>
                                                👑 Kepala (Pimpinan Tertinggi)
                                            </option>
                                            <option value="wakil" {{ old('level', $strukturOrganisasi->level) == 'wakil' ? 'selected' : '' }}>
                                                🤝 Wakil
                                            </option>
                                            <option value="sekretaris" {{ old('level', $strukturOrganisasi->level) == 'sekretaris' ? 'selected' : '' }}>
                                                📋 Sekretaris
                                            </option>
                                            <option value="kasi_kaur" {{ old('level', $strukturOrganisasi->level) == 'kasi_kaur' ? 'selected' : '' }}>
                                                ⚙️ Kepala Seksi/Kepala Urusan
                                            </option>
                                            <option value="kadus" {{ old('level', $strukturOrganisasi->level) == 'kadus' ? 'selected' : '' }}>
                                                🏘️ Kepala Dusun
                                            </option>
                                            <option value="anggota" {{ old('level', $strukturOrganisasi->level) == 'anggota' ? 'selected' : '' }}>
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
                                                <option value="{{ $parent->id }}" {{ old('parent_id', $strukturOrganisasi->parent_id) == $parent->id ? 'selected' : '' }}>
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

                                    <!-- Current Photo Display -->
                                    @if($strukturOrganisasi->foto)
                                        <div class="col-12">
                                            <label class="form-label fw-semibold text-gray-900">Foto Saat Ini</label>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-100px symbol-circle me-4">
                                                    <img src="{{ $strukturOrganisasi->foto_url }}" alt="{{ $strukturOrganisasi->nama }}" class="w-100">
                                                </div>
                                                <div>
                                                    <h5 class="fw-bold text-gray-900 mb-1">{{ basename($strukturOrganisasi->foto) }}</h5>
                                                    <p class="text-muted mb-2">Foto profil saat ini</p>
                                                    <label class="btn btn-light-danger btn-sm">
                                                        <input type="checkbox" name="remove_foto" class="form-check-input me-2">
                                                        Hapus foto
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Foto Upload -->
                                    <div class="col-12">
                                        <label class="form-label fw-semibold text-gray-900">
                                            {{ $strukturOrganisasi->foto ? 'Ganti Foto Profil' : 'Upload Foto Profil' }}
                                        </label>
                                        <input type="file" name="foto" class="form-control form-control-solid @error('foto') is-invalid @enderror" 
                                               accept="image/jpeg,image/png,image/jpg">
                                        @error('foto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text text-muted">Upload foto baru (JPG, PNG, max 2MB) - kosongkan jika tidak ingin mengganti</div>
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
                                            @if(is_array($strukturOrganisasi->tugas) && count($strukturOrganisasi->tugas) > 0)
                                                @foreach($strukturOrganisasi->tugas as $index => $tugas)
                                                    <div class="input-group mb-3">
                                                        <input type="text" name="tugas[]" class="form-control" placeholder="Masukkan tugas..." value="{{ $tugas }}">
                                                        @if($index === 0)
                                                            <button type="button" class="btn btn-success add-tugas" title="Tambah tugas">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        @else
                                                            <button type="button" class="btn btn-danger remove-item" title="Hapus tugas">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="input-group mb-3">
                                                    <input type="text" name="tugas[]" class="form-control" placeholder="Masukkan tugas...">
                                                    <button type="button" class="btn btn-success add-tugas" title="Tambah tugas">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-text text-muted">Tekan tombol + untuk menambah tugas lainnya</div>
                                    </div>

                                    <!-- Wewenang -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold text-gray-900">Wewenang</label>
                                        <div id="wewenang-container">
                                            @if(is_array($strukturOrganisasi->wewenang) && count($strukturOrganisasi->wewenang) > 0)
                                                @foreach($strukturOrganisasi->wewenang as $index => $wewenang)
                                                    <div class="input-group mb-3">
                                                        <input type="text" name="wewenang[]" class="form-control" placeholder="Masukkan wewenang..." value="{{ $wewenang }}">
                                                        @if($index === 0)
                                                            <button type="button" class="btn btn-success add-wewenang" title="Tambah wewenang">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        @else
                                                            <button type="button" class="btn btn-danger remove-item" title="Hapus wewenang">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="input-group mb-3">
                                                    <input type="text" name="wewenang[]" class="form-control" placeholder="Masukkan wewenang...">
                                                    <button type="button" class="btn btn-success add-wewenang" title="Tambah wewenang">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            @endif
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
                                        <input class="form-check-input" type="checkbox" name="aktif" id="aktif" 
                                               {{ old('aktif', $strukturOrganisasi->aktif) ? 'checked' : '' }}>
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
                                           placeholder="0 (otomatis)" value="{{ old('urutan', $strukturOrganisasi->urutan) }}" min="0">
                                    @error('urutan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text text-muted">Kosongkan untuk urutan otomatis</div>
                                </div>
                            </div>
                        </div>

                        <!-- Info Card -->
                        <div class="card shadow-sm mb-8 bg-light-primary">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-info-circle text-primary fs-2x me-4 mt-1"></i>
                                    <div>
                                        <h4 class="fw-bold text-primary mb-3">Informasi</h4>
                                        <ul class="text-gray-700 mb-0">
                                            <li class="mb-2"><strong>Dibuat:</strong> {{ $strukturOrganisasi->created_at->format('d/m/Y H:i') }}</li>
                                            <li class="mb-2"><strong>Diupdate:</strong> {{ $strukturOrganisasi->updated_at->format('d/m/Y H:i') }}</li>
                                            @if($strukturOrganisasi->children->count() > 0)
                                                <li class="mb-2"><strong>Bawahan:</strong> {{ $strukturOrganisasi->children->count() }} orang</li>
                                            @endif
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
                                        Update Struktur
                                    </button>
                                    <a href="{{ route('admin.struktur-organisasi.show', $strukturOrganisasi) }}" class="btn btn-light-info">
                                        <i class="fas fa-eye me-2"></i>
                                        Lihat Detail
                                    </a>
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

    // Handle foto removal
    const removeFotoCheckbox = document.querySelector('input[name="remove_foto"]');
    if (removeFotoCheckbox) {
        removeFotoCheckbox.addEventListener('change', function() {
            if (this.checked) {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Foto akan dihapus saat form disimpan. Lanjutkan?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (!result.isConfirmed) {
                        this.checked = false;
                    }
                });
            }
        });
    }
});
</script>
@endpush