@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Tambah Kontak')

@section('menu')
    Tambah Kontak
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
    <li class="breadcrumb-item text-muted">Tambah Kontak</li>
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

            <!-- Header Card -->
            <div class="card shadow-sm mb-8">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <div class="symbol-label bg-light-primary">
                                        <i class="fas fa-plus-circle fs-2x text-primary"></i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="fw-bold text-gray-900 mb-1">Tambah Kontak Desa</h2>
                                    <p class="text-muted mb-0">Tambahkan informasi kontak desa baru</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('admin.kontak.index') }}" class="btn btn-light">
                                <i class="ki-duotone ki-arrow-left fs-5 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.kontak.store') }}" method="POST" id="kt_kontak_form">
                        @csrf

                        <div class="row">
                            <!-- Nama Desa -->
                            <div class="col-md-6 mb-6">
                                <label class="form-label fw-semibold fs-6">Nama Desa <span class="text-danger">*</span></label>
                                <input type="text" name="nama_desa" class="form-control form-control-solid @error('nama_desa') is-invalid @enderror"
                                       value="{{ old('nama_desa') }}" placeholder="Masukkan nama desa" required>
                                @error('nama_desa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Kode Pos -->
                            <div class="col-md-6 mb-6">
                                <label class="form-label fw-semibold fs-6">Kode Pos</label>
                                <input type="text" name="kode_pos" class="form-control form-control-solid @error('kode_pos') is-invalid @enderror"
                                       value="{{ old('kode_pos') }}" placeholder="Masukkan kode pos">
                                @error('kode_pos')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Alamat -->
                            <div class="col-12 mb-6">
                                <label class="form-label fw-semibold fs-6">Alamat Lengkap <span class="text-danger">*</span></label>
                                <textarea name="alamat" class="form-control form-control-solid @error('alamat') is-invalid @enderror"
                                          rows="3" placeholder="Masukkan alamat lengkap desa" required>{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Telepon -->
                            <div class="col-md-6 mb-6">
                                <label class="form-label fw-semibold fs-6">Telepon</label>
                                <input type="text" name="telepon" class="form-control form-control-solid @error('telepon') is-invalid @enderror"
                                       value="{{ old('telepon') }}" placeholder="Contoh: (0534) 1234567">
                                @error('telepon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-6">
                                <label class="form-label fw-semibold fs-6">Email</label>
                                <input type="email" name="email" class="form-control form-control-solid @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" placeholder="Contoh: desa@ketapangbaru.id">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Website -->
                            <div class="col-md-6 mb-6">
                                <label class="form-label fw-semibold fs-6">Website</label>
                                <input type="url" name="website" class="form-control form-control-solid @error('website') is-invalid @enderror"
                                       value="{{ old('website') }}" placeholder="Contoh: https://ketapangbaru.desa.id">
                                @error('website')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="col-md-6 mb-6">
                                <label class="form-label fw-semibold fs-6">Status</label>
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" name="aktif" value="1"
                                           {{ old('aktif', true) ? 'checked' : '' }} id="aktif">
                                    <label class="form-check-label fw-semibold text-gray-400 ms-3" for="aktif">
                                        Aktif
                                    </label>
                                </div>
                            </div>

                            <!-- Kepala Desa -->
                            <div class="col-md-4 mb-6">
                                <label class="form-label fw-semibold fs-6">Kepala Desa</label>
                                <input type="text" name="kepala_desa" class="form-control form-control-solid @error('kepala_desa') is-invalid @enderror"
                                       value="{{ old('kepala_desa') }}" placeholder="Nama kepala desa">
                                @error('kepala_desa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sekretaris Desa -->
                            <div class="col-md-4 mb-6">
                                <label class="form-label fw-semibold fs-6">Sekretaris Desa</label>
                                <input type="text" name="sekretaris_desa" class="form-control form-control-solid @error('sekretaris_desa') is-invalid @enderror"
                                       value="{{ old('sekretaris_desa') }}" placeholder="Nama sekretaris desa">
                                @error('sekretaris_desa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Bendahara Desa -->
                            <div class="col-md-4 mb-6">
                                <label class="form-label fw-semibold fs-6">Bendahara Desa</label>
                                <input type="text" name="bendahara_desa" class="form-control form-control-solid @error('bendahara_desa') is-invalid @enderror"
                                       value="{{ old('bendahara_desa') }}" placeholder="Nama bendahara desa">
                                @error('bendahara_desa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Koordinat -->
                            <div class="col-md-6 mb-6">
                                <label class="form-label fw-semibold fs-6">Latitude</label>
                                <input type="text" name="latitude" class="form-control form-control-solid @error('latitude') is-invalid @enderror"
                                       value="{{ old('latitude') }}" placeholder="Contoh: -1.8312">
                                @error('latitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-6">
                                <label class="form-label fw-semibold fs-6">Longitude</label>
                                <input type="text" name="longitude" class="form-control form-control-solid @error('longitude') is-invalid @enderror"
                                       value="{{ old('longitude') }}" placeholder="Contoh: 109.9811">
                                @error('longitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Deskripsi -->
                            <div class="col-12 mb-6">
                                <label class="form-label fw-semibold fs-6">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control form-control-solid @error('deskripsi') is-invalid @enderror"
                                          rows="4" placeholder="Deskripsi singkat tentang desa">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Jam Operasional -->
                        <div class="mb-8">
                            <label class="form-label fw-semibold fs-6">Jam Operasional</label>
                            <div class="row">
                                @php
                                    $hari = ['senin' => 'Senin', 'selasa' => 'Selasa', 'rabu' => 'Rabu', 'kamis' => 'Kamis', 'jumat' => 'Jumat', 'sabtu' => 'Sabtu', 'minggu' => 'Minggu'];
                                @endphp
                                @foreach($hari as $key => $nama)
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-semibold fs-7">{{ $nama }}</label>
                                    <input type="text" name="jam_operasional[{{ $key }}]"
                                           class="form-control form-control-solid"
                                           value="{{ old('jam_operasional.'.$key, $key == 'minggu' ? 'Tutup' : '08:00 - 16:00') }}"
                                           placeholder="Contoh: 08:00 - 16:00">
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.kontak.index') }}" class="btn btn-light me-3">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="ki-duotone ki-check fs-5 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Simpan Kontak
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const form = document.getElementById('kt_kontak_form');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Simpan Kontak?',
                text: "Data kontak akan disimpan ke database",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    }
});
</script>
@endpush
