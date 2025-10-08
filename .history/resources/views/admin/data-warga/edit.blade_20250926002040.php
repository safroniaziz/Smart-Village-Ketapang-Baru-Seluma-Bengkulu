@extends('layouts.dashboard.dashboard')

@section('title', 'Edit Data Warga')

@section('menu')
    Edit Data Warga
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('data-warga.index') }}" class="text-muted text-hover-primary">Data Warga</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Edit</li>
@endsection

@push('styles')
<style>
/* Modern Edit Page Styling */
.profile-section {
    background: white;
    border-radius: 1rem;
    padding: 2rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
    border: 1px solid #E4E6EA;
    height: fit-content;
    position: sticky;
    top: 2rem;
}

.current-photo {
    width: 150px;
    height: 150px;
    border-radius: 1rem;
    object-fit: cover;
    border: 3px solid rgba(255,255,255,0.2);
    margin: 0 auto 1rem;
    display: block;
    transition: all 0.3s ease;
    box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.15);
}

.current-photo:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.75rem 2rem rgba(0,0,0,0.2);
}

.photo-upload-wrapper {
    position: relative;
    text-align: center;
}

.change-photo-btn {
    border-radius: 0.75rem;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    margin-top: 1rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    width: 100%;
}

.change-photo-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1.5rem rgba(102, 126, 234, 0.4);
    color: white;
}

/* Modern Button Styling */
.btn-edit {
    border-radius: 0.75rem;
    padding: 0.75rem 2rem;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
}

.btn-edit:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.15);
}

.btn-edit-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.btn-edit-secondary {
    background: #F1F3F4;
    color: #5E6278;
    border: 1px solid #E4E6EA;
}

.btn-edit-secondary:hover {
    background: #E4E6EA;
    color: #181C32;
}

.form-section {
    background: white;
    border: 2px dashed #E4E6EA;
    border-radius: 0.75rem;
    padding: 2rem;
    margin-bottom: 1.5rem;
}

.form-section:hover {
    border-color: #009EF7;
}

.section-header {
    border-bottom: 1px solid #E4E6EA;
    padding-bottom: 1rem;
    margin-bottom: 2rem;
}

.section-icon {
    width: 2.25rem;
    height: 2.25rem;
    border-radius: 0.5rem;
    background: #F8F9FA;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 0.75rem;
    color: #7239EA;
}

/* Progress Indicator */
.progress-indicator {
    background: linear-gradient(90deg, #3b82f6 0%, #1d4ed8 100%);
    height: 4px;
    border-radius: 2px;
    margin-bottom: 2rem;
}

/* Action Buttons */
.action-buttons {
    background: white;
    border-radius: 1rem;
    padding: 1.5rem 2rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: sticky;
    bottom: 2rem;
    z-index: 100;
}

.btn-enhanced {
    padding: 0.75rem 2rem;
    border-radius: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    border: none;
}

.btn-enhanced:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

/* Changes Tracker */
.changes-indicator {
    position: fixed;
    top: 50%;
    right: 2rem;
    transform: translateY(-50%);
    background: #fef3c7;
    border: 2px solid #f59e0b;
    border-radius: 1rem;
    padding: 1rem;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    display: none;
    z-index: 1000;
}

.changes-indicator.show {
    display: block;
    animation: slideInRight 0.5s ease;
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateY(-50%) translateX(100%);
    }
    to {
        opacity: 1;
        transform: translateY(-50%) translateX(0);
    }
}

/* Responsive */
@media (max-width: 768px) {
    .edit-container {
        padding: 1rem;
    }

    .form-section {
        padding: 1.5rem;
    }

    .current-photo {
        width: 150px;
        height: 150px;
    }

    .action-buttons {
        flex-direction: column;
        gap: 1rem;
    }
}
</style>
@endpush

@section('content')
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">

            <!--begin::Header-->
            <div class="card mb-5 mb-xl-10 overflow-hidden" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); position: relative;">
                <!-- Decorative elements -->
                <div class="position-absolute top-0 end-0" style="width: 200px; height: 200px; background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%); transform: translate(30%, -30%);"></div>
                <div class="position-absolute bottom-0 start-0" style="width: 150px; height: 150px; background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%); transform: translate(-30%, 30%);"></div>
                
                <div class="card-body text-center py-10" style="position: relative; z-index: 1;">
                    <h1 class="text-white fw-bold fs-2x mb-3">Edit Data Warga</h1>
                    <p class="text-white fs-5 mb-4" style="opacity: 0.9;">Perbarui informasi {{ $dataWarga->nama_lengkap }} dengan mudah dan profesional</p>
                    
                    <!-- Progress indicator -->
                    <div class="d-flex justify-content-center">
                        <div class="bg-white bg-opacity-20 rounded-pill px-4 py-2">
                            <span class="text-white fw-semibold fs-7">
                                <i class="ki-duotone ki-profile-user text-white fs-5 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                                Mengubah Data Warga
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Header-->

            <form action="{{ route('data-warga.update', $dataWarga) }}" method="POST" enctype="multipart/form-data" id="kt_warga_form">
                @csrf
                @method('PUT')

                <div class="row g-5">
                    <!--begin::Left Column - Profile-->
                    <div class="col-lg-4">
                        <div class="profile-section">
                            <div class="text-center mb-4">
                                <h3 class="fw-bold text-dark mb-2">Profil Warga</h3>
                                <p class="text-muted">Foto dan informasi dasar</p>
                            </div>

                            <div class="photo-upload-wrapper mb-4">
                                @if($dataWarga->foto)
                                    <img src="{{ asset('storage/' . $dataWarga->foto) }}"
                                         alt="Foto {{ $dataWarga->nama_lengkap }}"
                                         class="current-photo" id="current-photo">
                                @else
                                    <div class="current-photo bg-light d-flex align-items-center justify-content-center" id="current-photo">
                                        <i class="ki-duotone ki-user fs-3x text-muted">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                @endif

                                <button type="button" class="btn btn-primary change-photo-btn d-flex align-items-center justify-content-center" onclick="$('#foto').click()">
                                    <i class="ki-duotone ki-camera fs-6 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <span class="fw-semibold">Pilih Foto</span>
                                </button>
                            </div>

                            <input type="file" class="d-none @error('foto') is-invalid @enderror"
                                   id="foto" name="foto" accept="image/*" onchange="previewPhoto(this)">
                            @error('foto')
                                <div class="text-danger text-center mb-3">{{ $message }}</div>
                            @enderror

                            <div class="text-center text-muted small mb-4">
                                <i class="ki-duotone ki-information fs-6 me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                Format: JPEG, PNG, JPG. Maks 2MB
                            </div>

                            <!--begin::Quick Info-->
                            <div class="card bg-light-info mb-4">
                                <div class="card-body p-4">
                                    <h6 class="text-info fw-bold mb-3">
                                        <i class="ki-duotone ki-information-5 fs-5 me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        Info Singkat
                                    </h6>
                                    <div class="mb-2">
                                        <small class="text-muted">NIK:</small>
                                        <div class="fw-bold">{{ $dataWarga->nik }}</div>
                                    </div>
                                    <div class="mb-2">
                                        <small class="text-muted">Dusun:</small>
                                        <div class="fw-bold">{{ $dataWarga->dusun }}</div>
                                    </div>
                                    <div class="mb-2">
                                        <small class="text-muted">Pekerjaan:</small>
                                        <div class="fw-bold">{{ $dataWarga->pekerjaan }}</div>
                                    </div>
                                    <div>
                                        <small class="text-muted">Status:</small>
                                        <span class="badge badge-{{ $dataWarga->is_kepala_keluarga ? 'success' : 'secondary' }}">
                                            {{ $dataWarga->is_kepala_keluarga ? 'Kepala Keluarga' : 'Anggota Keluarga' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--end::Quick Info-->

                            <!--begin::Quick Stats-->
                            <div class="d-flex justify-content-center">
                                <div class="text-center px-3">
                                    <div class="fs-2 fw-bold text-primary" id="completion-percentage">85%</div>
                                    <div class="text-muted small">Kelengkapan</div>
                                </div>
                            </div>
                            <!--end::Quick Stats-->
                        </div>
                    </div>
                    <!--end::Left Column-->

                    <!--begin::Right Column - Form-->
                    <div class="col-lg-8">

                        <!--begin::Personal Information-->
                        <div class="form-section">
                            <div class="section-header d-flex align-items-center">
                                <div class="section-icon bg-light-primary text-primary">
                                    <i class="ki-duotone ki-profile-circle">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </div>
                                <div>
                                    <h3 class="fw-bold text-dark mb-1">Informasi Personal</h3>
                                    <p class="text-muted mb-0">Data pribadi dan identitas warga</p>
                                </div>
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                               id="nik" name="nik" placeholder="NIK"
                                               value="{{ old('nik', $dataWarga->nik) }}" maxlength="16" required>
                                        <label for="nik">NIK (16 digit) *</label>
                                        <i class="ki-duotone ki-badge fs-6 floating-icon">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        @error('nik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                               id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap"
                                               value="{{ old('nama_lengkap', $dataWarga->nama_lengkap) }}" required>
                                        <label for="nama_lengkap">Nama Lengkap *</label>
                                        <i class="ki-duotone ki-user fs-6 floating-icon">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        @error('nama_lengkap')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('no_kk') is-invalid @enderror"
                                               id="no_kk" name="no_kk" placeholder="No. KK"
                                               value="{{ old('no_kk', $dataWarga->no_kk) }}" maxlength="16">
                                        <label for="no_kk">No. Kartu Keluarga</label>
                                        <i class="ki-duotone ki-home-2 fs-6 floating-icon">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        @error('no_kk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                               id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir"
                                               value="{{ old('tempat_lahir', $dataWarga->tempat_lahir) }}">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <i class="ki-duotone ki-geolocation fs-6 floating-icon">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                               id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir"
                                               value="{{ old('tanggal_lahir', $dataWarga->tanggal_lahir ? $dataWarga->tanggal_lahir->format('Y-m-d') : '') }}">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <i class="ki-duotone ki-calendar fs-6 floating-icon">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                                id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki" {{ old('jenis_kelamin', $dataWarga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ old('jenis_kelamin', $dataWarga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        <label for="jenis_kelamin">Jenis Kelamin *</label>
                                        @error('jenis_kelamin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Personal Information-->


                        <!--begin::Address & Location-->
                        <div class="form-section">
                            <div class="section-header d-flex align-items-center">
                                <div class="section-icon bg-light-success text-success">
                                    <i class="ki-duotone ki-geolocation">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div>
                                    <h3 class="fw-bold text-dark mb-1">Alamat & Lokasi</h3>
                                    <p class="text-muted mb-0">Informasi tempat tinggal dan domisili</p>
                                </div>
                            </div>

                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control @error('alamat') is-invalid @enderror"
                                                  id="alamat" name="alamat" placeholder="Alamat"
                                                  style="height: 100px" required>{{ old('alamat', $dataWarga->alamat) }}</textarea>
                                        <label for="alamat">Alamat Lengkap *</label>
                                        <i class="ki-duotone ki-home fs-6 floating-icon">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('rt_rw') is-invalid @enderror"
                                               id="rt_rw" name="rt_rw" placeholder="RT/RW"
                                               value="{{ old('rt_rw', $dataWarga->rt_rw) }}">
                                        <label for="rt_rw">RT/RW</label>
                                        <i class="ki-duotone ki-map fs-6 floating-icon">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        @error('rt_rw')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('dusun') is-invalid @enderror"
                                               id="dusun" name="dusun" placeholder="Dusun"
                                               value="{{ old('dusun', $dataWarga->dusun) }}" required>
                                        <label for="dusun">Dusun *</label>
                                        <i class="ki-duotone ki-geolocation-home fs-6 floating-icon">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        @error('dusun')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('desa') is-invalid @enderror"
                                               id="desa" name="desa" placeholder="Desa"
                                               value="{{ old('desa', $dataWarga->desa) }}" required>
                                        <label for="desa">Desa *</label>
                                        @error('desa')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror"
                                               id="kecamatan" name="kecamatan" placeholder="Kecamatan"
                                               value="{{ old('kecamatan', $dataWarga->kecamatan) }}" required>
                                        <label for="kecamatan">Kecamatan *</label>
                                        @error('kecamatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('kabupaten') is-invalid @enderror"
                                               id="kabupaten" name="kabupaten" placeholder="Kabupaten"
                                               value="{{ old('kabupaten', $dataWarga->kabupaten) }}" required>
                                        <label for="kabupaten">Kabupaten *</label>
                                        @error('kabupaten')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('provinsi') is-invalid @enderror"
                                               id="provinsi" name="provinsi" placeholder="Provinsi"
                                               value="{{ old('provinsi', $dataWarga->provinsi) }}" required>
                                        <label for="provinsi">Provinsi *</label>
                                        @error('provinsi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Address & Location-->

                        <!--begin::Social Information-->
                        <div class="form-section">
                            <div class="section-header d-flex align-items-center">
                                <div class="section-icon bg-light-warning text-warning">
                                    <i class="ki-duotone ki-people">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                    </i>
                                </div>
                                <div>
                                    <h3 class="fw-bold text-dark mb-1">Informasi Sosial</h3>
                                    <p class="text-muted mb-0">Status perkawinan, pekerjaan, dan pendidikan</p>
                                </div>
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('agama') is-invalid @enderror"
                                                id="agama" name="agama">
                                            <option value="">Pilih Agama</option>
                                            <option value="Islam" {{ old('agama', $dataWarga->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="Kristen" {{ old('agama', $dataWarga->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                            <option value="Katolik" {{ old('agama', $dataWarga->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                            <option value="Hindu" {{ old('agama', $dataWarga->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                            <option value="Buddha" {{ old('agama', $dataWarga->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                            <option value="Konghucu" {{ old('agama', $dataWarga->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                        </select>
                                        <label for="agama">Agama</label>
                                        @error('agama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('status_perkawinan') is-invalid @enderror"
                                                id="status_perkawinan" name="status_perkawinan">
                                            <option value="">Pilih Status Perkawinan</option>
                                            <option value="Belum Kawin" {{ old('status_perkawinan', $dataWarga->status_perkawinan) == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                            <option value="Kawin" {{ old('status_perkawinan', $dataWarga->status_perkawinan) == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                            <option value="Cerai Hidup" {{ old('status_perkawinan', $dataWarga->status_perkawinan) == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                            <option value="Cerai Mati" {{ old('status_perkawinan', $dataWarga->status_perkawinan) == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                                        </select>
                                        <label for="status_perkawinan">Status Perkawinan</label>
                                        @error('status_perkawinan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                                               id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan"
                                               value="{{ old('pekerjaan', $dataWarga->pekerjaan) }}" required>
                                        <label for="pekerjaan">Pekerjaan *</label>
                                        <i class="ki-duotone ki-briefcase fs-6 floating-icon">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        @error('pekerjaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('pendidikan') is-invalid @enderror"
                                               id="pendidikan" name="pendidikan" placeholder="Pendidikan"
                                               value="{{ old('pendidikan', $dataWarga->pendidikan) }}" required>
                                        <label for="pendidikan">Pendidikan Terakhir *</label>
                                        <i class="ki-duotone ki-book fs-6 floating-icon">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                        @error('pendidikan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('kewarganegaraan') is-invalid @enderror"
                                               id="kewarganegaraan" name="kewarganegaraan" placeholder="Kewarganegaraan"
                                               value="{{ old('kewarganegaraan', $dataWarga->kewarganegaraan) }}" required>
                                        <label for="kewarganegaraan">Kewarganegaraan *</label>
                                        <i class="ki-duotone ki-flag fs-6 floating-icon">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        @error('kewarganegaraan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="d-flex align-items-center h-100">
                                        <div class="form-check form-check-custom form-check-solid form-check-lg">
                                            <input class="form-check-input" type="checkbox" name="is_kepala_keluarga"
                                                   value="1" {{ old('is_kepala_keluarga', $dataWarga->is_kepala_keluarga) ? 'checked' : '' }} id="is_kepala_keluarga">
                                            <label class="form-check-label fw-bold text-gray-700" for="is_kepala_keluarga">
                                                <span class="d-block">Kepala Keluarga</span>
                                                <span class="text-muted fs-7">Centang jika warga ini adalah kepala keluarga</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Social Information-->


                        <!--begin::Account Information-->
                        <div class="form-section">
                            <div class="section-header d-flex align-items-center">
                                <div class="section-icon bg-light-info text-info">
                                    <i class="ki-duotone ki-user-tick">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </div>
                                <div>
                                    <h3 class="fw-bold text-dark mb-1">Akun Login</h3>
                                    <p class="text-muted mb-0">Informasi akses sistem (opsional)</p>
                                </div>
                            </div>

                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                               id="email" name="email" placeholder="Email"
                                               value="{{ old('email', $dataWarga->email) }}">
                                        <label for="email">Email</label>
                                        <i class="ki-duotone ki-sms fs-6 floating-icon">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <div class="form-text">Email akan digunakan untuk login ke sistem</div>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                               id="password" name="password" placeholder="Password">
                                        <label for="password">Password Baru</label>
                                        <i class="ki-duotone ki-key fs-6 floating-icon">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <div class="form-text">Minimal 8 karakter. Kosongkan jika tidak ingin mengubah</div>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control"
                                               id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password">
                                        <label for="password_confirmation">Konfirmasi Password</label>
                                        <i class="ki-duotone ki-verify fs-6 floating-icon">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                            <span class="path6"></span>
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Account Information-->

                    </div>
                    <!--end::Right Column-->
                </div>

                <!--begin::Action Buttons-->
                <div class="action-buttons">
                    <div class="d-flex align-items-center">
                        <i class="ki-duotone ki-information-4 fs-4 text-primary me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                        <span class="text-muted">Pastikan semua data telah diisi dengan benar</span>
                    </div>

                    <div class="d-flex gap-3">
                        <a href="{{ route('data-warga.index') }}" class="btn btn-light-danger btn-enhanced">
                            <i class="ki-duotone ki-cross fs-5 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Batal
                        </a>

                        <button type="submit" class="btn btn-primary btn-enhanced" id="submit-btn">
                            <span class="indicator-label">
                                <i class="ki-duotone ki-check fs-5 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                Perbarui Data
                            </span>
                            <span class="indicator-progress">
                                Memperbarui...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <!--end::Action Buttons-->
            </form>

            <!--begin::Changes Indicator-->
            <div class="changes-indicator" id="changes-indicator">
                <div class="d-flex align-items-center mb-2">
                    <i class="ki-duotone ki-notification-status text-warning fs-3 me-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                    </i>
                    <span class="fw-bold">Ada Perubahan</span>
                </div>
                <p class="text-muted mb-0 small">Data telah dimodifikasi. Jangan lupa simpan perubahan.</p>
            </div>
            <!--end::Changes Indicator-->
        </div>
    </div>
    <!--end::Content-->
</div>
@endsection

@push('scripts')
<script>
// Enhanced Edit Page JavaScript
let originalFormData = {};
let hasChanges = false;

$(document).ready(function() {
    // Store original form data for change detection
    storeOriginalData();

    // Initialize enhanced features
    initializeFormEnhancements();
    initializePhotoPreview();
    initializeChangeDetection();
    initializeValidation();
    updateCompletionPercentage();

    // Auto-save functionality (optional)
    // setInterval(autoSave, 30000); // Auto-save every 30 seconds
});

function storeOriginalData() {
    $('#kt_warga_form input, #kt_warga_form select, #kt_warga_form textarea').each(function() {
        if ($(this).attr('name') && $(this).attr('type') !== 'file') {
            originalFormData[$(this).attr('name')] = $(this).val();
        }
    });
}

function initializeFormEnhancements() {
    // Enhanced form controls with smooth animations
    $('.form-control, .form-select').on('focus', function() {
        $(this).closest('.form-floating').addClass('focused');
        $(this).siblings('.floating-icon').addClass('active');
    });

    $('.form-control, .form-select').on('blur', function() {
        $(this).closest('.form-floating').removeClass('focused');
        $(this).siblings('.floating-icon').removeClass('active');
    });

    // Enhanced hover effects
    $('.form-section').hover(
        function() { $(this).addClass('hovered'); },
        function() { $(this).removeClass('hovered'); }
    );

    // Progress indicator animation
    setTimeout(() => {
        $('.progress-indicator').css('width', '100%');
    }, 500);
}

function initializePhotoPreview() {
    $('#foto').on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Validate file size
            if (file.size > 2 * 1024 * 1024) { // 2MB
                Swal.fire({
                    title: 'File Terlalu Besar',
                    text: 'Ukuran file maksimal 2MB',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
                $(this).val('');
                return;
            }

            // Validate file type
            if (!file.type.match('image.*')) {
                Swal.fire({
                    title: 'Format Tidak Valid',
                    text: 'Pilih file gambar (JPEG, PNG, JPG)',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
                $(this).val('');
                return;
            }

            // Preview photo
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#current-photo').attr('src', e.target.result).show();
                // Add upload success animation
                $('#current-photo').addClass('photo-updated');
                setTimeout(() => {
                    $('#current-photo').removeClass('photo-updated');
                }, 1000);
            };
            reader.readAsDataURL(file);
        }
    });
}

function previewPhoto(input) {
    // This function is called from the onclick handler
    $('#foto').click();
}

function initializeChangeDetection() {
    $('#kt_warga_form input, #kt_warga_form select, #kt_warga_form textarea').on('input change', function() {
        detectChanges();
        updateCompletionPercentage();
    });
}

function detectChanges() {
    hasChanges = false;

    $('#kt_warga_form input, #kt_warga_form select, #kt_warga_form textarea').each(function() {
        const name = $(this).attr('name');
        if (name && $(this).attr('type') !== 'file') {
            const currentValue = $(this).val();
            const originalValue = originalFormData[name] || '';

            if (currentValue !== originalValue) {
                hasChanges = true;
                return false; // Break the loop
            }
        }
    });

    // Show/hide changes indicator
    if (hasChanges) {
        $('#changes-indicator').addClass('show');
    } else {
        $('#changes-indicator').removeClass('show');
    }
}

function initializeValidation() {
    // Real-time validation
    $('#nik').on('input', function() {
        const value = $(this).val();
        const $feedback = $(this).siblings('.invalid-feedback');

        if (value && (value.length !== 16 || !/^\d+$/.test(value))) {
            $(this).addClass('is-invalid');
            $feedback.text('NIK harus 16 digit angka').show();
        } else {
            $(this).removeClass('is-invalid');
            $feedback.hide();
        }
    });

    $('#email').on('input', function() {
        const value = $(this).val();
        const $feedback = $(this).siblings('.invalid-feedback');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (value && !emailRegex.test(value)) {
            $(this).addClass('is-invalid');
            $feedback.text('Format email tidak valid').show();
        } else {
            $(this).removeClass('is-invalid');
            $feedback.hide();
        }
    });

    // Password confirmation validation
    $('#password, #password_confirmation').on('input', function() {
        const password = $('#password').val();
        const confirmation = $('#password_confirmation').val();
        const $feedback = $('#password_confirmation').siblings('.invalid-feedback');

        if (password && confirmation && password !== confirmation) {
            $('#password_confirmation').addClass('is-invalid');
            if (!$feedback.length) {
                $('#password_confirmation').after('<div class="invalid-feedback">Password tidak cocok</div>');
            } else {
                $feedback.text('Password tidak cocok').show();
            }
        } else {
            $('#password_confirmation').removeClass('is-invalid');
            $feedback.hide();
        }
    });
}

function updateCompletionPercentage() {
    const requiredFields = $('[required]').length;
    let filledFields = 0;

    $('[required]').each(function() {
        if ($(this).val().trim() !== '') {
            filledFields++;
        }
    });

    const percentage = Math.round((filledFields / requiredFields) * 100);
    $('#completion-percentage').text(percentage + '%');

    // Update color based on completion
    $('#completion-percentage').removeClass('text-primary text-warning text-success');
    if (percentage < 50) {
        $('#completion-percentage').addClass('text-danger');
    } else if (percentage < 80) {
        $('#completion-percentage').addClass('text-warning');
    } else {
        $('#completion-percentage').addClass('text-success');
    }
}

// Enhanced form submission
$('#kt_warga_form').on('submit', function(e) {
    e.preventDefault();

    // Final validation
    let isValid = true;
    const requiredFields = $('[required]');

    requiredFields.each(function() {
        if (!$(this).val().trim()) {
            $(this).addClass('is-invalid');
            isValid = false;
        }
    });

    if (!isValid) {
        Swal.fire({
            title: 'Data Tidak Lengkap',
            text: 'Mohon lengkapi semua field yang wajib diisi',
            icon: 'warning',
            confirmButtonText: 'OK'
        });

        // Scroll to first invalid field
        const firstInvalid = $('.is-invalid').first();
        if (firstInvalid.length) {
            $('html, body').animate({
                scrollTop: firstInvalid.offset().top - 100
            }, 500);
        }
        return;
    }

    // Show confirmation if there are changes
    if (hasChanges) {
        Swal.fire({
            title: 'Konfirmasi Perubahan',
            text: 'Apakah Anda yakin ingin menyimpan perubahan data ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Simpan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                submitForm();
            }
        });
    } else {
        Swal.fire({
            title: 'Tidak Ada Perubahan',
            text: 'Data tidak mengalami perubahan',
            icon: 'info',
            confirmButtonText: 'OK'
        });
    }
});

function submitForm() {
    // Show loading
    const submitBtn = $('#submit-btn');
    submitBtn.attr('data-kt-indicator', 'on');
    submitBtn.prop('disabled', true);

    Swal.fire({
        title: 'Menyimpan Perubahan...',
        text: 'Mohon tunggu sebentar',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showConfirmButton: false,
        willOpen: () => {
            Swal.showLoading();
        }
    });

    // Submit form
    $('#kt_warga_form')[0].submit();
}

// Prevent leaving page with unsaved changes
$(window).on('beforeunload', function(e) {
    if (hasChanges) {
        const message = 'Anda memiliki perubahan yang belum disimpan. Yakin ingin meninggalkan halaman?';
        e.returnValue = message;
        return message;
    }
});

// Auto-save functionality (optional)
function autoSave() {
    if (hasChanges) {
        const formData = {};
        $('#kt_warga_form input, #kt_warga_form select, #kt_warga_form textarea').each(function() {
            if ($(this).attr('name') && $(this).attr('type') !== 'file') {
                formData[$(this).attr('name')] = $(this).val();
            }
        });
        localStorage.setItem('edit_warga_form_draft_{{ $dataWarga->id }}', JSON.stringify(formData));

        // Show auto-save indicator
        const indicator = $('<div class="alert alert-info position-fixed" style="top: 20px; right: 20px; z-index: 9999;">Data tersimpan otomatis</div>');
        $('body').append(indicator);
        setTimeout(() => {
            indicator.fadeOut(() => indicator.remove());
        }, 2000);
    }
}

// Keyboard shortcuts
$(document).on('keydown', function(e) {
    // Ctrl+S to save
    if (e.ctrlKey && e.key === 's') {
        e.preventDefault();
        if (hasChanges) {
            $('#kt_warga_form').submit();
        }
    }

    // Esc to cancel
    if (e.key === 'Escape') {
        if (hasChanges) {
            Swal.fire({
                title: 'Batalkan Perubahan?',
                text: 'Semua perubahan akan hilang',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Batalkan',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('data-warga.index') }}";
                }
            });
        } else {
            window.location.href = "{{ route('data-warga.index') }}";
        }
    }
});

// Enhanced animations for photo update
$('<style>').text(`
    .photo-updated {
        animation: photoUpdateSuccess 1s ease-in-out;
    }

    @keyframes photoUpdateSuccess {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); border-color: #10b981; }
        100% { transform: scale(1); }
    }

    .focused .floating-icon.active {
        color: #3b82f6 !important;
        transform: translateY(-50%) scale(1.1) !important;
    }
`).appendTo('head');
</script>
@endpush
