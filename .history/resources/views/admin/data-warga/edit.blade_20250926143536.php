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
/* Spectacular Header Animations */
@keyframes float {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
    }
    50% {
        transform: translateY(-20px) rotate(180deg);
    }
}

@keyframes pulse {
    0%, 100% {
        opacity: 0.4;
    }
    50% {
        opacity: 0.8;
    }
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

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
    height: 200px; /* Ratio 3:4 = 150:200 px untuk display */
    border-radius: 0.75rem;
    object-fit: cover;
    border: 5px solid white;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    margin: 0 auto;
    display: block;
    transition: all 0.3s ease;
}

.current-photo:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.75rem 2rem rgba(0,0,0,0.2);
}

.photo-upload-wrapper {
    position: relative;
    padding: 1.5rem;
    border: 2px dashed #E4E6EA;
    border-radius: 0.75rem;
    transition: all 0.3s ease;
}

.photo-upload-wrapper:hover {
    border-color: #009EF7;
    background-color: rgba(0, 158, 247, 0.02);
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

/* Photo Upload Styling */
.current-photo {
    width: 200px;
    height: 260px;
    border-radius: 12px;
    border: 3px solid #e4e6ef;
    overflow: hidden;
    position: relative;
    background: linear-gradient(145deg, #f5f8fa 0%, #e9ecef 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    transition: all 0.4s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

.current-photo:hover {
    border-color: #009ef7;
    box-shadow: 0 12px 35px rgba(0, 158, 247, 0.15);
    transform: translateY(-3px);
}

.current-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 9px;
    transition: transform 0.3s ease;
}

.current-photo:hover img {
    transform: scale(1.02);
}

.change-photo-btn {
    border-radius: 30px;
    padding: 12px 24px;
    margin-top: 20px;
    transition: all 0.4s ease;
    background: linear-gradient(135deg, #009ef7 0%, #0d7bd9 100%);
    border: none;
    color: white;
    font-weight: 600;
    box-shadow: 0 4px 15px rgba(0, 158, 247, 0.2);
}

.change-photo-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(0, 158, 247, 0.3);
    background: linear-gradient(135deg, #0d7bd9 0%, #0b6bb3 100%);
    color: white;
}

.change-photo-btn:active {
    transform: translateY(-1px);
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
        width: 180px;
        height: 240px;
        border-radius: 10px;
        border: 3px solid #e4e6ef;
        overflow: hidden;
        position: relative;
        background: #f5f8fa;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        transition: all 0.3s ease;
    }

    .current-photo:hover {
        border-color: #009ef7;
        box-shadow: 0 10px 30px rgba(0, 158, 247, 0.1);
    }

    .current-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 7px;
    }

    .change-photo-btn {
        border-radius: 25px;
        padding: 10px 20px;
        margin-top: 15px;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #009ef7 0%, #0d7bd9 100%);
        border: none;
        color: white;
        font-weight: 600;
    }

    .change-photo-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 158, 247, 0.25);
        background: linear-gradient(135deg, #0d7bd9 0%, #0b6bb3 100%);
    }

    .action-buttons {
        flex-direction: column;
        gap: 1rem;
    }
}

/* Enhanced SweetAlert styling */
.swal2-popup {
    border-radius: 1rem !important;
    box-shadow: 0 25px 50px rgba(0,0,0,0.25) !important;
}

.swal2-title {
    font-size: 1.5rem !important;
    font-weight: 700 !important;
}

/* Custom button animations */
.btn-enhanced {
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.btn-enhanced::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
}

.btn-enhanced:hover::before {
    width: 300px;
    height: 300px;
}

/* Loading states */
.btn[data-kt-indicator="on"] .indicator-label {
    display: none;
}

.btn[data-kt-indicator="on"] .indicator-progress {
    display: inline-flex;
    align-items: center;
}

/* Placeholder styling - more subtle */
.form-control::placeholder,
.form-select::placeholder,
textarea::placeholder {
    color: #a1a5b7 !important;
    opacity: 0.7 !important;
    font-style: italic;
    font-weight: 400;
}

.form-control:focus::placeholder,
.form-select:focus::placeholder,
textarea:focus::placeholder {
    color: #b5b5c3 !important;
    opacity: 0.5 !important;
}

/* Select options styling */
.form-select option {
    color: #181C32 !important;
    font-style: normal;
    font-weight: 500;
}

.form-select option:first-child {
    color: #a1a5b7 !important;
    font-style: italic;
    font-weight: 400;
}
</style>
@endpush

@section('content')
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">

            <!--begin::Header-->
            <div class="card mb-5 mb-xl-10 overflow-hidden" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #667eea 100%); position: relative; min-height: 280px;">
                <!-- Advanced decorative elements -->
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

                <!-- Floating particles -->
                <div class="position-absolute" style="top: 20%; right: 15%; width: 8px; height: 8px; background: rgba(255,255,255,0.4); border-radius: 50%; animation: float 6s ease-in-out infinite;"></div>
                <div class="position-absolute" style="top: 60%; right: 25%; width: 6px; height: 6px; background: rgba(255,255,255,0.3); border-radius: 50%; animation: float 4s ease-in-out infinite reverse;"></div>
                <div class="position-absolute" style="top: 40%; left: 20%; width: 10px; height: 10px; background: rgba(255,255,255,0.2); border-radius: 50%; animation: float 8s ease-in-out infinite;"></div>

                <!-- Gradient overlays -->
                <div class="position-absolute top-0 end-0" style="width: 300px; height: 300px; background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%); transform: translate(20%, -20%);"></div>
                <div class="position-absolute bottom-0 start-0" style="width: 250px; height: 250px; background: radial-gradient(circle, rgba(59, 130, 246, 0.2) 0%, transparent 70%); transform: translate(-20%, 20%);"></div>

                <!-- Top accent line -->
                <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #3b82f6, #10b981, #f59e0b, #ef4444);"></div>

                <div class="card-body text-center py-12" style="position: relative; z-index: 10;">
                    <div class="mb-4">
                        <div class="bg-white bg-opacity-20 rounded-circle d-inline-flex p-4 mb-4">
                            <i class="ki-duotone ki-pencil fs-2x text-white">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <h1 class="text-white fw-bold fs-2x mb-3" style="text-shadow: 0 2px 8px rgba(0,0,0,0.3);">Edit Data Warga</h1>
                    <p class="text-white fs-5 mb-6" style="opacity: 0.9;">Perbarui informasi <span class="fw-bold">{{ $dataWarga->nama_lengkap }}</span> dengan mudah dan profesional</p>

                    <!-- Enhanced indicators -->
                    <div class="d-flex justify-content-center flex-wrap gap-3">
                        <div class="bg-white bg-opacity-20 rounded-pill px-4 py-2">
                            <span class="text-white fw-semibold fs-7">
                                <i class="ki-duotone ki-check-circle text-white fs-6 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Form Interaktif
                            </span>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-pill px-4 py-2">
                            <span class="text-white fw-semibold fs-7">
                                <i class="ki-duotone ki-security-user text-white fs-6 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Data Tervalidasi
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Header-->

            <form action="{{ route('data-warga.update', $dataWarga) }}" method="POST" enctype="multipart/form-data" id="kt_warga_form">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ $dataWarga->id }}">

                <div class="row g-5">
                    <!--begin::Left Column - Profile-->
                    <div class="col-lg-4">
                        <div class="profile-section">
                            <div class="text-center mb-4">
                                <h3 class="fw-bold text-dark mb-2">Profil Warga</h3>
                                <p class="text-muted">Foto dan informasi dasar</p>
                            </div>

                            <div class="photo-upload-wrapper mb-4 text-center">
                                <div class="mb-3">
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
                                </div>

                                <button type="button" class="btn btn-primary change-photo-btn d-flex align-items-center justify-content-center" onclick="$('#foto').click()">
                                    <i class="ki-duotone ki-camera fs-6 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <span class="fw-semibold" id="photo-btn-text">{{ $dataWarga->foto ? 'Ganti Foto' : 'Pilih Foto' }}</span>
                                </button>

                                <!-- Status indicator untuk foto yang baru dipilih -->
                                <div id="photo-status" class="mt-3 text-center" style="display: none;">
                                    <div class="alert alert-light-success d-flex align-items-center p-3" style="border-radius: 10px;">
                                        <i class="ki-duotone ki-check-circle fs-2x text-success me-3">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <div class="flex-grow-1 text-start">
                                            <div class="fw-bold text-success">Foto Baru Dipilih ✨</div>
                                            <div class="text-muted small">Klik "Simpan Perubahan" untuk menyimpan</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert alert-info p-2 mt-3 small">
                                    <i class="ki-duotone ki-information fs-6 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                    <strong>Petunjuk:</strong> Foto pas foto (3x4 atau 4x6 cm), minimal 300x400px.
                                    Disimpan 4x6, ditampilkan 3x4 untuk tampilan yang lebih baik.
                                </div>
                            </div>

                            <input type="file" class="d-none @error('foto') is-invalid @enderror"
                                   id="foto" name="foto" accept="image/jpeg,image/png,image/jpg" onchange="previewPhoto(this)">
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
                                               id="nik" name="nik"
                                               value="{{ old('nik', $dataWarga->nik) }}" maxlength="16" required>
                                        <label for="nik" style="color: #7e8299; font-weight: 400;">NIK (16 digit) *</label>
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
                                               id="nama_lengkap" name="nama_lengkap"
                                               value="{{ old('nama_lengkap', $dataWarga->nama_lengkap) }}" required>
                                        <label for="nama_lengkap" style="color: #7e8299; font-weight: 400;">Nama Lengkap *</label>
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
                                               id="no_kk" name="no_kk"
                                               value="{{ old('no_kk', $dataWarga->no_kk) }}" maxlength="16">
                                        <label for="no_kk" style="color: #7e8299; font-weight: 400;">No. Kartu Keluarga</label>
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
                                               id="tempat_lahir" name="tempat_lahir"
                                               value="{{ old('tempat_lahir', $dataWarga->tempat_lahir) }}">
                                        <label for="tempat_lahir" style="color: #7e8299; font-weight: 400;">Tempat Lahir</label>
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
                                               id="tanggal_lahir" name="tanggal_lahir"
                                               value="{{ old('tanggal_lahir', $dataWarga->tanggal_lahir ? $dataWarga->tanggal_lahir->format('Y-m-d') : '') }}">
                                        <label for="tanggal_lahir" style="color: #7e8299; font-weight: 400;">Tanggal Lahir</label>
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
                                                id="jenis_kelamin" name="jenis_kelamin">
                                                <option value="">-- Pilih --</option>
                                            <option value="Laki-laki" {{ old('jenis_kelamin', $dataWarga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ old('jenis_kelamin', $dataWarga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        <label for="jenis_kelamin" style="color: #7e8299; font-weight: 400;">Jenis Kelamin *</label>
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
                                                  id="alamat" name="alamat"
                                                  style="height: 100px">{{ old('alamat', $dataWarga->alamat) }}</textarea>
                                        <label for="alamat" style="color: #7e8299; font-weight: 400;">Alamat Lengkap *</label>
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
                                               id="rt_rw" name="rt_rw"
                                               value="{{ old('rt_rw', $dataWarga->rt_rw) }}">
                                        <label for="rt_rw" style="color: #7e8299; font-weight: 400;">RT/RW</label>
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
                                               id="dusun" name="dusun"
                                               value="{{ old('dusun', $dataWarga->dusun) }}">
                                        <label for="dusun" style="color: #7e8299; font-weight: 400;">Dusun *</label>
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
                                               id="desa" name="desa"
                                               value="{{ old('desa', $dataWarga->desa) }}">
                                        <label for="desa" style="color: #7e8299; font-weight: 400;">Desa *</label>
                                        @error('desa')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror"
                                               id="kecamatan" name="kecamatan"
                                               value="{{ old('kecamatan', $dataWarga->kecamatan) }}">
                                        <label for="kecamatan" style="color: #7e8299; font-weight: 400;">Kecamatan *</label>
                                        @error('kecamatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('kabupaten') is-invalid @enderror"
                                               id="kabupaten" name="kabupaten"
                                               value="{{ old('kabupaten', $dataWarga->kabupaten) }}">
                                        <label for="kabupaten" style="color: #7e8299; font-weight: 400;">Kabupaten *</label>
                                        @error('kabupaten')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('provinsi') is-invalid @enderror"
                                               id="provinsi" name="provinsi"
                                               value="{{ old('provinsi', $dataWarga->provinsi) }}">
                                        <label for="provinsi" style="color: #7e8299; font-weight: 400;">Provinsi *</label>
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
                                            <option value="">-- Pilih --</option>
                                            <option value="Islam" {{ old('agama', $dataWarga->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="Kristen" {{ old('agama', $dataWarga->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                            <option value="Katolik" {{ old('agama', $dataWarga->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                            <option value="Hindu" {{ old('agama', $dataWarga->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                            <option value="Buddha" {{ old('agama', $dataWarga->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                            <option value="Konghucu" {{ old('agama', $dataWarga->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                        </select>
                                        <label for="agama" style="color: #7e8299; font-weight: 400;">Agama</label>
                                        @error('agama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('status_perkawinan') is-invalid @enderror"
                                                id="status_perkawinan" name="status_perkawinan">
                                            <option value="">-- Pilih --</option>
                                            <option value="Belum Kawin" {{ old('status_perkawinan', $dataWarga->status_perkawinan) == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                            <option value="Kawin" {{ old('status_perkawinan', $dataWarga->status_perkawinan) == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                            <option value="Cerai Hidup" {{ old('status_perkawinan', $dataWarga->status_perkawinan) == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                            <option value="Cerai Mati" {{ old('status_perkawinan', $dataWarga->status_perkawinan) == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                                        </select>
                                        <label for="status_perkawinan" style="color: #7e8299; font-weight: 400;">Status Perkawinan</label>
                                        @error('status_perkawinan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('mata_pencaharian') is-invalid @enderror"
                                               id="mata_pencaharian" name="mata_pencaharian"
                                               value="{{ old('mata_pencaharian', $dataWarga->mata_pencaharian) }}">
                                        <label for="mata_pencaharian" style="color: #7e8299; font-weight: 400;">Pekerjaan *</label>
                                        <i class="ki-duotone ki-briefcase fs-6 floating-icon">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        @error('mata_pencaharian')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('pendidikan') is-invalid @enderror"
                                               id="pendidikan" name="pendidikan"
                                               value="{{ old('pendidikan', $dataWarga->pendidikan) }}">
                                        <label for="pendidikan" style="color: #7e8299; font-weight: 400;">Pendidikan Terakhir *</label>
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
                                               id="kewarganegaraan" name="kewarganegaraan"
                                               value="{{ old('kewarganegaraan', $dataWarga->kewarganegaraan) }}">
                                        <label for="kewarganegaraan" style="color: #7e8299; font-weight: 400;">Kewarganegaraan *</label>
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
                                            <label class="form-check-label text-gray-600" for="is_kepala_keluarga" style="font-weight: 400;">
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
                                               id="email" name="email"
                                               value="{{ old('email', $dataWarga->email) }}">
                                        <label for="email" style="color: #7e8299; font-weight: 400;">Email</label>
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
                                               id="password" name="password" >
                                        <label for="password" style="color: #7e8299; font-weight: 400;">Password Baru</label>
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
                                               id="password_confirmation" name="password_confirmation" >
                                        <label for="password_confirmation" style="color: #7e8299; font-weight: 400;">Konfirmasi Password</label>
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
                                🔄 Perbarui Data Warga
                            </span>
                            <span class="indicator-progress">
                                Memperbarui data...
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
            // Validate file size (max 2MB)
            if (file.size > 2 * 1024 * 1024) {
                Swal.fire({
                    title: 'File Terlalu Besar!',
                    text: 'Ukuran foto maksimal 2MB. Silakan pilih foto yang lebih kecil.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                $(this).val('');
                return;
            }

            // Validate file type
            const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            if (!validTypes.includes(file.type)) {
                Swal.fire({
                    title: 'Format Tidak Didukung!',
                    text: 'Hanya file JPEG, JPG, dan PNG yang diperbolehkan untuk foto pas foto 4x6.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                $(this).val('');
                return;
            }

            // Show loading state
            const originalPhoto = $('#current-photo').attr('src');
            $('#current-photo').attr('src', 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjA2IiBoZWlnaHQ9IjI5NSIgdmlld0JveD0iMCAwIDIwNiAyOTUiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIyMDYiIGhlaWdodD0iMjk1IiBmaWxsPSIjRjVGNUY1Ii8+CjxjaXJjbGUgY3g9IjEwMyIgY3k9IjE0Ny41IiByPSIyMCIgZmlsbD0iIzMzNzNEQyIgb3BhY2l0eT0iMC4zIi8+Cjx0ZXh0IHg9IjUwJSIgeT0iNjAlIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmb250LXNpemU9IjE0IiBmaWxsPSIjNjY2Ij5MemltbmcuLi48L3RleHQ+Cjwvc3ZnPg==');

            // Preview photo with validation feedback
            const reader = new FileReader();
            reader.onload = function(e) {
                // Create image to check dimensions
                const img = new Image();
                img.onload = function() {
                    if (this.width < 300 || this.height < 400) {
                        Swal.fire({
                            title: 'Resolusi Terlalu Rendah',
                            text: 'Untuk hasil terbaik, gunakan foto minimal 300x400 pixel.',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Lanjut Tetap',
                            cancelButtonText: 'Pilih Ulang'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Continue with low resolution image
                                $('#current-photo').attr('src', e.target.result);
                                toastr.success('Foto berhasil diupload! Disimpan 4x6, ditampilkan 3x4.');
                            } else {
                                // Reset to original
                                $('#current-photo').attr('src', originalPhoto);
                                $('#foto').val('');
                            }
                        });
                    } else {
                        // Good resolution, proceed
                        $('#current-photo').attr('src', e.target.result);
                        toastr.success('Foto berhasil diupload! Disimpan 4x6, ditampilkan 3x4');
                    }
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
}

function previewPhoto(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];

        // Validate file type
        const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
        if (!validTypes.includes(file.type)) {
            Swal.fire({
                icon: 'error',
                title: 'Format File Tidak Valid',
                text: 'Hanya file JPEG, JPG, dan PNG yang diperbolehkan'
            });
            input.value = '';
            return;
        }

        // Validate file size (2MB = 2 * 1024 * 1024 bytes)
        const maxSize = 2 * 1024 * 1024;
        if (file.size > maxSize) {
            Swal.fire({
                icon: 'error',
                title: 'File Terlalu Besar',
                text: 'Ukuran file maksimal 2MB'
            });
            input.value = '';
            return;
        }

        // Create preview
        const reader = new FileReader();
        reader.onload = function(e) {
            const $currentPhoto = $('#current-photo');

            // Replace content with new image
            $currentPhoto.html(`
                <img src="${e.target.result}" alt="Preview Foto"
                     style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
            `);

            // Update button text and show status
            $('#photo-btn-text').text('Ganti Foto');
            $('#photo-status').show();

            // Trigger change detection for file upload
            hasChanges = true;
            $('#changes-indicator').addClass('show');
            updateCompletionPercentage();

            // Show success message
            Swal.fire({
                icon: 'success',
                title: 'Foto Berhasil Dipilih',
                html: `
                    <div class="text-center">
                        <i class="ki-duotone ki-check-circle fs-3x text-success mb-3">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <p>Preview foto telah dimuat.</p>
                        <div class="alert alert-light-warning">
                            <strong>💡 Jangan lupa:</strong> Klik tombol <strong>Simpan Perubahan</strong> untuk menyimpan foto baru.
                        </div>
                    </div>
                `,
                timer: 3000,
                showConfirmButton: false,
                customClass: {
                    popup: 'swal2-show',
                    title: 'swal2-title'
                }
            });
        };

        reader.readAsDataURL(file);
    }
}

function initializeChangeDetection() {
    // Regular form fields
    $('#kt_warga_form input, #kt_warga_form select, #kt_warga_form textarea').on('input change', function() {
        detectChanges();
        updateCompletionPercentage();
    });

    // File input specific handling
    $('#foto').on('change', function() {
        detectChanges();
        updateCompletionPercentage();
    });
}

function detectChanges() {
    hasChanges = false;

    // Check regular form fields
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

    // Check file input specifically
    const fotoInput = $('#foto')[0];
    if (fotoInput && fotoInput.files && fotoInput.files.length > 0) {
        hasChanges = true;
    }

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

// Enhanced form submission with AJAX
$('#kt_warga_form').on('submit', function(e) {
    e.preventDefault();

    // Final validation
    let isValid = true;
    const requiredFields = $('[required]');

    requiredFields.each(function() {
        if (!$(this).val().trim()) {
            $(this).addClass('is-invalid');
            isValid = false;
        } else {
            $(this).removeClass('is-invalid');
        }
    });

    if (!isValid) {
        Swal.fire({
            title: '⚠️ Data Tidak Lengkap!',
            html: `
                <div class="text-center">
                    <p class="mb-3">Mohon lengkapi semua field yang wajib diisi (ditandai dengan *).</p>
                    <div class="alert alert-warning">
                        <i class="ki-duotone ki-information fs-2 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                        Field yang masih kosong akan otomatis ditandai merah.
                    </div>
                </div>
            `,
            icon: 'warning',
            confirmButtonText: '<i class="ki-duotone ki-arrow-up fs-3"></i> OK, Lengkapi Data',
            customClass: {
                confirmButton: 'btn btn-warning'
            }
        });

        // Scroll to first invalid field with animation
        const firstInvalid = $('.is-invalid').first();
        if (firstInvalid.length) {
            $('html, body').animate({
                scrollTop: firstInvalid.offset().top - 100
            }, 500);
            firstInvalid.focus();
        }
        return;
    }

    // Show confirmation if there are changes
    if (hasChanges) {
        Swal.fire({
            title: '🔄 Konfirmasi Update Data',
            html: `
                <div class="text-start">
                    <p class="mb-3">Apakah Anda yakin ingin menyimpan perubahan data warga ini?</p>
                    <div class="alert alert-info">
                        <i class="ki-duotone ki-information fs-2 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                        <strong>Perubahan yang akan disimpan:</strong><br>
                        • Data identitas dan alamat<br>
                        • Foto pas foto (jika diperbarui)<br>
                        • Informasi keluarga dan sosial
                    </div>
                </div>
            `,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="ki-duotone ki-check fs-3"></i> Ya, Update Data',
            cancelButtonText: '<i class="ki-duotone ki-cross fs-3"></i> Batal',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-light-secondary'
            },
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                submitFormData();
            }
        });
    } else {
        Swal.fire({
            title: '📝 Tidak Ada Perubahan',
            html: `
                <div class="text-center">
                    <p class="mb-3">Data tidak mengalami perubahan sejak terakhir disimpan.</p>
                    <div class="alert alert-info">
                        <i class="ki-duotone ki-information fs-2 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                        Silakan lakukan perubahan terlebih dahulu jika ingin memperbarui data.
                    </div>
                </div>
            `,
            icon: 'info',
            confirmButtonText: '<i class="ki-duotone ki-arrow-left fs-3"></i> OK, Mengerti',
            customClass: {
                confirmButton: 'btn btn-info'
            }
        });
    }
});

function submitFormData() {
    // Show loading with animation
    Swal.fire({
        title: '💾 Memperbarui Data Warga',
        html: `
            <div class="text-center">
                <div class="spinner-border text-primary mb-3" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mb-2">Sedang menyimpan perubahan...</p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                         style="width: 100%" role="progressbar"></div>
                </div>
            </div>
        `,
        allowOutsideClick: false,
        allowEscapeKey: false,
        showConfirmButton: false
    });

    // Prepare form data
    const formData = new FormData($('#kt_warga_form')[0]);
    formData.append('_method', 'PUT');

    // Submit via AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: $('#kt_warga_form').attr('action'),
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Reset change tracking
            hasChanges = false;
            initializeOriginalData();

            // Hide photo status indicator
            $('#photo-status').hide();

            // Reset file input
            $('#foto').val('');

            // Success animation
            Swal.fire({
                title: '🎉 Berhasil Diperbarui!',
                html: `
                    <div class="text-center">
                        <div class="mb-3">
                            <i class="ki-duotone ki-check-circle fs-3x text-success">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <p class="mb-2">Data warga berhasil diperbarui dalam sistem.</p>
                        <div class="alert alert-success">
                            <strong>✨ Perubahan yang disimpan:</strong><br>
                            • Data identitas dan alamat<br>
                            • Foto pas foto (jika ada perubahan)<br>
                            • Informasi keluarga dan sosial
                        </div>
                    </div>
                `,
                icon: 'success',
                showCancelButton: true,
                confirmButtonText: '<i class="ki-duotone ki-home fs-3"></i> Kembali ke Daftar',
                cancelButtonText: '<i class="ki-duotone ki-pencil fs-3"></i> Lanjut Edit',
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-light-primary'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route("data-warga.index") }}';
                }
                // If canceled, user stays on edit page
            });
        },
        error: function(xhr) {
            let errorMessage = 'Terjadi kesalahan saat memperbarui data.';
            let errorDetails = '';

            if (xhr.status === 422) {
                // Validation errors
                const errors = xhr.responseJSON.errors;
                errorDetails = '<ul class="text-start">';
                Object.keys(errors).forEach(function(key) {
                    errors[key].forEach(function(error) {
                        errorDetails += `<li>${error}</li>`;
                    });
                });
                errorDetails += '</ul>';
                errorMessage = 'Data tidak valid, mohon periksa kembali:';
            } else if (xhr.status === 500) {
                errorMessage = 'Terjadi kesalahan server internal.';
                errorDetails = 'Silakan coba lagi atau hubungi administrator.';
            } else if (xhr.status === 404) {
                errorMessage = 'Data warga tidak ditemukan.';
                errorDetails = 'Mungkin data sudah dihapus oleh pengguna lain.';
            } else {
                errorMessage = `Kesalahan HTTP ${xhr.status}`;
                errorDetails = xhr.responseJSON?.message || 'Silakan coba lagi.';
            }

            Swal.fire({
                title: '❌ Gagal Memperbarui!',
                html: `
                    <div class="text-center">
                        <div class="mb-3">
                            <i class="ki-duotone ki-cross-circle fs-3x text-danger">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <p class="mb-3">${errorMessage}</p>
                        ${errorDetails ? `<div class="alert alert-danger">${errorDetails}</div>` : ''}
                    </div>
                `,
                icon: 'error',
                confirmButtonText: '<i class="ki-duotone ki-arrow-left fs-3"></i> OK, Perbaiki Data',
                customClass: {
                    confirmButton: 'btn btn-danger'
                }
            });
        }
    });
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
