@extends('layouts.dashboard.dashboard')

@section('title', 'Tambah Data Warga')

@section('menu')
    Tambah Data Warga
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
    <li class="breadcrumb-item text-muted">Tambah</li>
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

/* Modern Wizard Styling */
.wizard-container {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 1rem;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
    border: 1px solid rgba(255,255,255,0.1);
}

.wizard-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 2rem 0;
    position: relative;
}

.wizard-nav::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 2px;
    background: rgba(255,255,255,0.2);
    z-index: 1;
}

.wizard-step {
    background: rgba(255,255,255,0.2);
    color: rgba(255,255,255,0.7);
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 1rem;
    position: relative;
    z-index: 2;
    transition: all 0.3s ease;
    cursor: pointer;
    border: 2px solid rgba(255,255,255,0.3);
}

.wizard-step.active {
    background: #fff;
    color: #667eea;
    border-color: #fff;
    box-shadow: 0 0.5rem 1.5rem rgba(255,255,255,0.3);
}

.wizard-step.completed {
    background: #10b981;
    color: white;
    border-color: #10b981;
}

.wizard-step.completed::after {
    content: '✓';
    font-size: 1.2rem;
}

.wizard-content {
    background: white;
    border: 2px dashed #E4E6EA;
    border-radius: 0.75rem;
    padding: 2rem;
    min-height: 500px;
}

.wizard-content:hover {
    border-color: #009EF7;
}

.step-content {
    display: none;
    animation: fadeInUp 0.5s ease;
}

.step-content.active {
    display: block;
}

/* Modern Button Styling */
.btn-wizard {
    border-radius: 0.75rem;
    padding: 0.75rem 2rem;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    position: relative;
    overflow: hidden;
}

.btn-wizard:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.15);
}

.btn-wizard-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.btn-wizard-secondary {
    background: #F1F3F4;
    color: #5E6278;
    border: 1px solid #E4E6EA;
}

.btn-wizard-secondary:hover {
    background: #E4E6EA;
    color: #181C32;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Form Enhancements */
.form-group {
    margin-bottom: 1.5rem;
}

.form-floating {
    position: relative;
}

.form-floating .form-control {
    height: 58px;
    border-radius: 0.75rem;
    border: 2px solid #e1e5e9;
    padding: 1rem 0.75rem 0.25rem;
    transition: all 0.3s ease;
}

.form-floating .form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    transform: translateY(-2px);
}

.form-floating label {
    color: #6c757d;
    font-weight: 500;
}

/* Photo Upload Area */
.photo-upload-area {
    border: 3px dashed #e1e5e9;
    border-radius: 1rem;
    padding: 3rem;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
    background: linear-gradient(135deg, #f8f9ff 0%, #e8edff 100%);
}

.photo-upload-area:hover {
    border-color: #667eea;
    background: linear-gradient(135deg, #667eea10 0%, #764ba220 100%);
}

.photo-preview {
    width: 150px;
    height: 200px; /* Ratio 3:4 = 150:200 px untuk display */
    border-radius: 0.75rem;
    object-fit: cover;
    border: 5px solid white;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    margin: 1rem auto;
    display: block;
}

.photo-preview-container {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: 2px dashed #dee2e6;
    border-radius: 1rem;
    padding: 1rem;
    text-align: center;
    width: 180px;
    margin: 0 auto;
}

/* Action Buttons */
.wizard-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid #e1e5e9;
}

.btn-wizard {
    padding: 0.75rem 2rem;
    border-radius: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}

.btn-wizard:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

/* Responsive */
@media (max-width: 768px) {
    .wizard-container {
        padding: 1rem;
    }

    .wizard-step {
        width: 45px;
        height: 45px;
        font-size: 1rem;
    }

    .wizard-content {
        padding: 1rem;
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

/* Required field asterisk - consistent with edit page */
.form-floating label {
    color: #7e8299 !important;
    font-weight: 400 !important;
}
</style>
@endpush

@section('content')
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">

            <!--begin::Wizard Container-->
            <div class="wizard-container position-relative overflow-hidden" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #667eea 100%); min-height: 320px;">
                <!-- Advanced decorative elements -->
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

                <!-- Floating particles -->
                <div class="position-absolute" style="top: 15%; right: 10%; width: 8px; height: 8px; background: rgba(255,255,255,0.4); border-radius: 50%; animation: float 6s ease-in-out infinite;"></div>
                <div class="position-absolute" style="top: 70%; right: 30%; width: 6px; height: 6px; background: rgba(255,255,255,0.3); border-radius: 50%; animation: float 4s ease-in-out infinite reverse;"></div>
                <div class="position-absolute" style="top: 30%; left: 15%; width: 10px; height: 10px; background: rgba(255,255,255,0.2); border-radius: 50%; animation: float 8s ease-in-out infinite;"></div>
                <div class="position-absolute" style="top: 50%; left: 70%; width: 7px; height: 7px; background: rgba(255,255,255,0.35); border-radius: 50%; animation: float 5s ease-in-out infinite;"></div>

                <!-- Gradient overlays -->
                <div class="position-absolute top-0 end-0" style="width: 350px; height: 350px; background: radial-gradient(circle, rgba(255,255,255,0.12) 0%, transparent 70%); transform: translate(25%, -25%);"></div>
                <div class="position-absolute bottom-0 start-0" style="width: 280px; height: 280px; background: radial-gradient(circle, rgba(16, 185, 129, 0.15) 0%, transparent 70%); transform: translate(-25%, 25%);"></div>

                <!-- Top accent line -->
                <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #3b82f6, #10b981, #f59e0b, #ef4444);"></div>

                <div class="text-center mb-4 position-relative py-4" style="z-index: 10;">
                    <div class="mb-4">
                        <div class="bg-white bg-opacity-20 rounded-circle d-inline-flex p-4 mb-3">
                            <i class="ki-duotone ki-add-user text-white fs-2x">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </div>
                    </div>
                    <h1 class="text-white fw-bold fs-2x mb-3" style="text-shadow: 0 2px 8px rgba(0,0,0,0.3);">Tambah Data Warga Baru</h1>
                    <p class="text-white fs-5 mb-6" style="opacity: 0.9;">Lengkapi informasi warga dengan mudah melalui wizard yang <span class="fw-bold">profesional dan interaktif</span></p>

                    <!-- Enhanced Stats -->
                    <div class="d-flex justify-content-center flex-wrap gap-3 mb-4">
                        <div class="bg-white bg-opacity-20 rounded-pill px-4 py-2">
                            <span class="text-white fw-semibold fs-7">
                                <i class="ki-duotone ki-rocket text-white fs-6 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                4 Langkah Mudah
                            </span>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-pill px-4 py-2">
                            <span class="text-white fw-semibold fs-7">
                                <i class="ki-duotone ki-shield-tick text-white fs-6 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                Data Tervalidasi
                            </span>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-pill px-4 py-2">
                            <span class="text-white fw-semibold fs-7">
                                <i class="ki-duotone ki-time text-white fs-6 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Proses Cepat
                            </span>
                        </div>
                    </div>
                </div>

                <!--begin::Wizard Navigation-->
                <div class="wizard-nav">
                    <div class="wizard-step active" data-step="1">
                        <span class="step-number">1</span>
                    </div>
                    <div class="wizard-step" data-step="2">
                        <span class="step-number">2</span>
                    </div>
                    <div class="wizard-step" data-step="3">
                        <span class="step-number">3</span>
                    </div>
                    <div class="wizard-step" data-step="4">
                        <span class="step-number">4</span>
                    </div>
                </div>
                <!--end::Wizard Navigation-->

                <!--begin::Step Labels-->
                <div class="d-flex justify-content-between text-center mb-4">
                    <div class="text-white opacity-75">
                        <div class="fw-bold">Informasi Personal</div>
                        <small>Data pribadi warga</small>
                    </div>
                    <div class="text-white opacity-75">
                        <div class="fw-bold">Kontak & Alamat</div>
                        <small>Detail kontak dan alamat</small>
                    </div>
                    <div class="text-white opacity-75">
                        <div class="fw-bold">Data Tambahan</div>
                        <small>Pekerjaan dan lainnya</small>
                    </div>
                    <div class="text-white opacity-75">
                        <div class="fw-bold">Foto & Konfirmasi</div>
                        <small>Upload foto dan review</small>
                    </div>
                </div>
                <!--end::Step Labels-->
            </div>
            <!--end::Wizard Container-->

            <form action="{{ route('data-warga.store') }}" method="POST" enctype="multipart/form-data" id="kt_warga_form">
                @csrf

                <!--begin::Wizard Content-->
                <div class="wizard-content">

                    <!--begin::Step 1 - Personal Information-->
                    <div class="step-content active" id="step-1">
                        <div class="text-center mb-5">
                            <h2 class="fw-bold text-dark mb-3">Informasi Personal</h2>
                            <p class="text-muted">Masukkan data pribadi warga dengan lengkap dan akurat</p>
                        </div>

                        <div class="row g-5">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                           id="nama_lengkap" name="nama_lengkap"
                                           value="{{ old('nama_lengkap') }}" required>
                                    <label for="nama_lengkap" style="color: #7e8299; font-weight: 400;">Nama Lengkap <span style="color: #dc3545;">*</span></label>
                                    <div class="invalid-feedback">
                                        @error('nama_lengkap')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                           id="nik" name="nik"
                                           value="{{ old('nik') }}" maxlength="16" required>
                                    <label for="nik" style="color: #7e8299; font-weight: 400;">NIK (16 digit) <span style="color: #dc3545;">*</span></label>
                                    <div class="invalid-feedback">
                                        @error('nik')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                           id="tempat_lahir" name="tempat_lahir"
                                           value="{{ old('tempat_lahir') }}">
                                    <label for="tempat_lahir" style="color: #7e8299; font-weight: 400;">Tempat Lahir</label>
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                           id="tanggal_lahir" name="tanggal_lahir"
                                           value="{{ old('tanggal_lahir') }}">
                                    <label for="tanggal_lahir" style="color: #7e8299; font-weight: 400;">Tanggal Lahir</label>
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                            id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    <label for="jenis_kelamin" style="color: #7e8299; font-weight: 400;">Jenis Kelamin <span style="color: #dc3545;">*</span></label>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select @error('agama') is-invalid @enderror"
                                            id="agama" name="agama" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                        <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                        <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                        <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                    </select>
                                    <label for="agama" style="color: #7e8299; font-weight: 400;">Agama <span style="color: #dc3545;">*</span></label>
                                    @error('agama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Step 1-->

                    <!--begin::Step 2 - Contact & Address-->
                    <div class="step-content" id="step-2">
                        <div class="text-center mb-5">
                            <h2 class="fw-bold text-dark mb-3">Kontak & Alamat</h2>
                            <p class="text-muted">Informasi kontak dan alamat tempat tinggal warga</p>
                        </div>

                        <div class="row g-5">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email"
                                           value="{{ old('email') }}">
                                    <label for="email" style="color: #7e8299; font-weight: 400;">Email</label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control @error('no_kk') is-invalid @enderror"
                                           id="no_kk" name="no_kk"
                                           value="{{ old('no_kk') }}" maxlength="16" 
                                           pattern="[0-9]*" inputmode="numeric"
                                           oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    <label for="no_kk" style="color: #7e8299; font-weight: 400;">No. Kartu Keluarga (16 digit angka)</label>
                                    @error('no_kk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control @error('alamat') is-invalid @enderror"
                                              id="alamat" name="alamat"
                                              style="height: 100px" required>{{ old('alamat') }}</textarea>
                                    <label for="alamat" style="color: #7e8299; font-weight: 400;">Alamat Lengkap <span style="color: #dc3545;">*</span></label>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('rt_rw') is-invalid @enderror"
                                           id="rt_rw" name="rt_rw"
                                           value="{{ old('rt_rw') }}">
                                    <label for="rt_rw" style="color: #7e8299; font-weight: 400;">RT/RW</label>
                                    @error('rt_rw')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('dusun') is-invalid @enderror"
                                           id="dusun" name="dusun"
                                           value="{{ old('dusun') }}" required>
                                    <label for="dusun" style="color: #7e8299; font-weight: 400;">Dusun <span style="color: #dc3545;">*</span></label>
                                    @error('dusun')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('desa') is-invalid @enderror"
                                           id="desa" name="desa"
                                           value="{{ old('desa', 'Ketapang Baru') }}" required>
                                    <label for="desa" style="color: #7e8299; font-weight: 400;">Desa <span style="color: #dc3545;">*</span></label>
                                    @error('desa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('kecamatan') is-invalid @enderror"
                                           id="kecamatan" name="kecamatan"
                                           value="{{ old('kecamatan', 'Sukaraja') }}" required>
                                    <label for="kecamatan" style="color: #7e8299; font-weight: 400;">Kecamatan <span style="color: #dc3545;">*</span></label>
                                    @error('kecamatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('kabupaten') is-invalid @enderror"
                                           id="kabupaten" name="kabupaten"
                                           value="{{ old('kabupaten', 'Seluma') }}" required>
                                    <label for="kabupaten" style="color: #7e8299; font-weight: 400;">Kabupaten <span style="color: #dc3545;">*</span></label>
                                    @error('kabupaten')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('provinsi') is-invalid @enderror"
                                           id="provinsi" name="provinsi"
                                           value="{{ old('provinsi', 'Bengkulu') }}" required>
                                    <label for="provinsi" style="color: #7e8299; font-weight: 400;">Provinsi <span style="color: #dc3545;">*</span></label>
                                    @error('provinsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Step 2-->

                    <!--begin::Step 3 - Additional Data-->
                    <div class="step-content" id="step-3">
                        <div class="text-center mb-5">
                            <h2 class="fw-bold text-dark mb-3">Data Tambahan</h2>
                            <p class="text-muted">Informasi pekerjaan, pendidikan, dan status sosial</p>
                        </div>

                        <div class="row g-5">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select @error('status_perkawinan') is-invalid @enderror"
                                            id="status_perkawinan" name="status_perkawinan">
                                        <option value="">-- Pilih --</option>
                                        <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                        <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                        <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                        <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
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
                                           value="{{ old('mata_pencaharian') }}" required>
                                    <label for="mata_pencaharian" style="color: #7e8299; font-weight: 400;">Pekerjaan <span style="color: #dc3545;">*</span></label>
                                    @error('mata_pencaharian')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('pendidikan') is-invalid @enderror"
                                           id="pendidikan" name="pendidikan"
                                           value="{{ old('pendidikan') }}" required>
                                    <label for="pendidikan" style="color: #7e8299; font-weight: 400;">Pendidikan Terakhir <span style="color: #dc3545;">*</span></label>
                                    @error('pendidikan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('kewarganegaraan') is-invalid @enderror"
                                           id="kewarganegaraan" name="kewarganegaraan"
                                           value="{{ old('kewarganegaraan', 'WNI') }}" required>
                                    <label for="kewarganegaraan" style="color: #7e8299; font-weight: 400;">Kewarganegaraan <span style="color: #dc3545;">*</span></label>
                                    @error('kewarganegaraan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-check form-check-custom form-check-solid form-check-lg">
                                    <input class="form-check-input" type="checkbox" name="is_kepala_keluarga"
                                           value="1" {{ old('is_kepala_keluarga') ? 'checked' : '' }} id="is_kepala_keluarga">
                                    <label class="form-check-label text-gray-600" for="is_kepala_keluarga" style="font-weight: 400;">
                                        Kepala Keluarga
                                    </label>
                                    <div class="form-text mt-1" style="color: #dc3545;">
                                        <i class="ki-duotone ki-information fs-7 me-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        <strong>Centang jika warga ini sebagai kepala keluarga</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Step 3-->

                    <!--begin::Step 4 - Photo & Confirmation-->
                    <div class="step-content" id="step-4">
                        <div class="text-center mb-5">
                            <h2 class="fw-bold text-dark mb-3">Foto & Konfirmasi</h2>
                            <p class="text-muted">Upload foto warga dan tinjau data sebelum menyimpan</p>
                        </div>

                        <div class="row g-5">
                            <div class="col-md-6">
                                <div class="photo-upload-area" id="photo-upload">
                                    <div class="upload-content">
                                        <i class="ki-duotone ki-file-up fs-3x text-primary mb-3">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <h4 class="fw-bold text-gray-800 mb-2">Upload Foto Pas Foto</h4>
                                        <p class="text-muted mb-3">Klik atau drag & drop foto di sini</p>
                                        <div class="alert alert-info p-3 mb-4">
                                            <i class="ki-duotone ki-information fs-2 text-info me-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                            <strong>Petunjuk Foto:</strong><br>
                                            • Pastikan foto berukuran pas foto (3x4 atau 4x6 cm)<br>
                                            • Minimal resolusi 300x400 pixel untuk hasil terbaik<br>
                                            • Foto akan otomatis disesuaikan dan disimpan dalam kualitas tinggi
                                        </div>
                                        <input type="file" class="form-control d-none @error('foto') is-invalid @enderror"
                                               id="foto" name="foto" accept="image/jpeg,image/png,image/jpg">
                                        <div class="text-muted small mb-3">Format: JPEG, PNG, JPG. Maksimal 2MB</div>
                                        
                                        <!-- Backup button if click area doesn't work -->
                                        <button type="button" class="btn btn-light-primary btn-sm" onclick="document.getElementById('foto').click()">
                                            <i class="ki-duotone ki-file-up fs-4 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Pilih File Foto
                                        </button>
                                        @error('foto')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="preview-content d-none">
                                        <div class="photo-preview-container">
                                            <img class="photo-preview" id="photo-preview" src="" alt="Preview Foto Pas Foto">
                                            <div class="mt-2 text-muted small">
                                                <i class="ki-duotone ki-check-circle text-success me-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                Foto siap digunakan (tampil 3x4)
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <button type="button" class="btn btn-sm btn-light-danger" onclick="removePhoto()">
                                                <i class="ki-duotone ki-trash fs-5"></i>
                                                Hapus Foto
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card bg-light-primary">
                                    <div class="card-body">
                                        <h5 class="text-primary fw-bold mb-4">
                                            <i class="ki-duotone ki-security-check fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Ringkasan Data
                                        </h5>
                                        <div id="data-summary">
                                            <div class="mb-3">
                                                <label class="fw-bold text-gray-600">Nama:</label>
                                                <div class="text-gray-800" id="summary-nama">-</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="fw-bold text-gray-600">NIK:</label>
                                                <div class="text-gray-800" id="summary-nik">-</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="fw-bold text-gray-600">Jenis Kelamin:</label>
                                                <div class="text-gray-800" id="summary-gender">-</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="fw-bold text-gray-600">Alamat:</label>
                                                <div class="text-gray-800" id="summary-alamat">-</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="fw-bold text-gray-600">Pekerjaan:</label>
                                                <div class="text-gray-800" id="summary-pekerjaan">-</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-5 mt-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('password') is-invalid @enderror"
                                           id="password" name="password" required readonly style="background-color: #f8f9fa;">
                                    <label for="password" style="color: #7e8299; font-weight: 400;">Password Login <span style="color: #dc3545;">*</span></label>
                                    <div class="form-text">
                                        <i class="ki-duotone ki-information fs-6 text-info me-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        Password untuk login adalah <strong>NIK warga</strong> dan tidak dapat diubah
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Step 4-->

                    <!--begin::Wizard Actions-->
                    <div class="wizard-actions">
                        <button type="button" class="btn btn-light btn-wizard" id="prev-btn" onclick="previousStep()" style="display: none;">
                            <i class="ki-duotone ki-left fs-5 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Sebelumnya
                        </button>

                        <div class="d-flex gap-3">
                            <a href="{{ route('data-warga.index') }}" class="btn btn-light-danger btn-wizard">
                                <i class="ki-duotone ki-cross fs-5 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Batal
                            </a>

                            <button type="button" class="btn btn-primary btn-wizard" id="next-btn" onclick="nextStep()" style="cursor: pointer;">
                                Selanjutnya
                                <i class="ki-duotone ki-right fs-5 ms-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </button>

                            <button type="submit" class="btn btn-primary btn-wizard d-none" id="submit-btn">
                                <i class="ki-duotone ki-check fs-5 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <span class="indicator-label">💾 Simpan Data Warga</span>
                                <span class="indicator-progress">Menyimpan...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <!--end::Wizard Actions-->

                </div>
                <!--end::Wizard Content-->
            </form>
        </div>
    </div>
    <!--end::Content-->
</div>
@endsection

@push('scripts')
<script>
let currentStep = 1;
const totalSteps = 4;

// Prevent multiple initialization and event loops
let isInitialized = false;
let isProcessingClick = false;

// Define nextStep function globally before document ready
function nextStep() {
    try {
        console.log('nextStep() called - currentStep:', currentStep);
        if (validateCurrentStep()) {
            console.log('Validation passed, moving to next step');
            if (currentStep < totalSteps) {
                currentStep++;
                updateWizardDisplay();
                updateSummary();

                // Smooth scroll to top
                $('html, body').animate({
                    scrollTop: $('.wizard-container').offset().top - 100
                }, 500);
            }
        } else {
            console.log('Validation failed, showing errors');
            // Show validation error toast/alert
            showValidationErrors();
        }
    } catch (error) {
        console.error('Error in nextStep():', error);
        alert('Terjadi error: ' + error.message);
    }
}

$(document).ready(function() {
    if (isInitialized) return;
    isInitialized = true;

    // Initialize wizard
    updateWizardDisplay();

    // Next button event handler - jQuery backup for onclick
    $('#next-btn').off('click').on('click', function(e) {
        console.log('Next button clicked via jQuery direct event handler');
        e.preventDefault();
        e.stopPropagation();
        nextStep();
        return false;
    });

    // Additional document-level event delegation for next button
    $(document).off('click', '#next-btn').on('click', '#next-btn', function(e) {
        console.log('Next button clicked via document delegation');
        e.preventDefault();
        e.stopPropagation();
        nextStep();
        return false;
    });

    // Test button click responsiveness - temporary alert
    $('#next-btn').on('mousedown', function() {
        console.log('Next button mousedown detected - button is clickable');
    });

    // Photo upload functionality - multiple approaches for better compatibility
    $('#photo-upload').off('click').on('click', function(e) {
        console.log('Photo upload area clicked!');
        e.preventDefault();
        e.stopPropagation();

        const fileInput = document.getElementById('foto');
        console.log('File input found:', fileInput);
        
        if (fileInput) {
            console.log('Triggering file input click...');
            
            // Try multiple methods for better browser compatibility
            try {
                // Method 1: Direct click
                fileInput.click();
                
                // Method 2: Dispatch click event if first method fails
                setTimeout(() => {
                    const clickEvent = new MouseEvent('click', {
                        view: window,
                        bubbles: true,
                        cancelable: true
                    });
                    fileInput.dispatchEvent(clickEvent);
                }, 10);
                
            } catch (error) {
                console.error('Error triggering file input:', error);
                // Method 3: Fallback - show message to user
                alert('Klik langsung pada tombol "Pilih File" di bawah ini untuk upload foto');
                fileInput.style.display = 'block';
                fileInput.style.position = 'relative';
                fileInput.classList.remove('d-none');
            }
        } else {
            console.error('File input not found!');
        }

        return false;
    });

    // Also add direct click handler to the file input for backup
    $('#foto').off('change').on('focus click', function(e) {
        console.log('File input directly accessed');
    });

    // Handle photo selection with validation and auto-crop - prevent duplicates
    $('#foto').off('change').on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Validate file size (max 2MB) - consistent with edit page
            if (file.size > 2 * 1024 * 1024) {
                Swal.fire({
                    icon: 'error',
                    title: 'File Terlalu Besar',
                    text: 'Ukuran file maksimal 2MB'
                });
                $(this).val('');
                return;
            }

            // Validate file type - consistent with edit page
            const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            if (!validTypes.includes(file.type)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Format File Tidak Valid',
                    text: 'Hanya file JPEG, JPG, dan PNG yang diperbolehkan'
                });
                $(this).val('');
                return;
            }

            // Show loading
            $('.upload-content').addClass('d-none');
            $('.preview-content').html(`
                <div class="text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2 text-muted">Memproses dan menyesuaikan ukuran foto...</p>
                </div>
            `).removeClass('d-none');

            const reader = new FileReader();
            reader.onload = function(e) {
                // Create image to check and process dimensions
                const img = new Image();
                img.onload = function() {
                    const originalWidth = this.width;
                    const originalHeight = this.height;

                    let finalImageSrc = e.target.result;
                    let processMessage = 'Foto berhasil diupload!';

                    // Always show preview first, then process if needed
                    showPreview();

                    // Check if needs cropping to 300x400
                    if (originalWidth !== 300 || originalHeight !== 400) {
                        // Create canvas for cropping
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');

                        // Set target dimensions
                        const targetWidth = 300;
                        const targetHeight = 400;
                        canvas.width = targetWidth;
                        canvas.height = targetHeight;

                        // Calculate crop area (center crop)
                        const scale = Math.max(targetWidth / originalWidth, targetHeight / originalHeight);
                        const scaledWidth = originalWidth * scale;
                        const scaledHeight = originalHeight * scale;

                        const cropX = (scaledWidth - targetWidth) / 2;
                        const cropY = (scaledHeight - targetHeight) / 2;

                        // Draw cropped image
                        ctx.drawImage(this, -cropX, -cropY, scaledWidth, scaledHeight);

                        // Convert to blob and update file
                        canvas.toBlob(function(blob) {
                            // Create new file from blob
                            const croppedFile = new File([blob], file.name, {
                                type: file.type,
                                lastModified: Date.now()
                            });

                            // Update the input file
                            const dt = new DataTransfer();
                            dt.items.add(croppedFile);
                            $('#foto')[0].files = dt.files;

                            finalImageSrc = canvas.toDataURL('image/jpeg', 0.9);
                            processMessage = `Foto dipotong otomatis dari ${originalWidth}x${originalHeight}px menjadi 300x400px`;

                            // Update preview with cropped image
                            $('#photo-preview').attr('src', finalImageSrc);
                            $('.preview-content .text-muted').html(`
                                <i class="ki-duotone ki-check-circle text-success me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Foto otomatis dipotong (300x400px)
                            `);
                        }, 'image/jpeg', 0.9);
                    }

                    function showPreview() {
                        // Show upload content immediately
                        $('.upload-content').addClass('d-none');
                        $('.preview-content').html(`
                            <div class="photo-preview-container">
                                <img class="photo-preview" id="photo-preview" src="${finalImageSrc}" alt="Preview Foto Pas Foto">
                                <div class="mt-2 text-muted small">
                                    <i class="ki-duotone ki-check-circle text-success me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Foto siap digunakan (300x400px)
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="button" class="btn btn-sm btn-light-danger" onclick="removePhoto()">
                                    <i class="ki-duotone ki-trash fs-5"></i>
                                    Hapus Foto
                                </button>
                            </div>
                        `).removeClass('d-none');
                    }

                    // Show success message with SweetAlert (consistent with edit page)
                    let warningIcon = originalWidth !== 300 || originalHeight !== 400 ? 'info' : 'success';
                    Swal.fire({
                        icon: warningIcon,
                        title: 'Foto Berhasil Diproses',
                        html: `
                            <div class="text-center">
                                <i class="ki-duotone ki-check-circle fs-3x text-${warningIcon} mb-3">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <p>${processMessage}</p>
                                ${originalWidth !== 300 || originalHeight !== 400 ? `
                                    <div class="alert alert-info mt-3">
                                        <strong>✂️ Auto Crop:</strong> Foto telah dipotong secara otomatis untuk ukuran optimal 300x400px.
                                    </div>
                                ` : ''}
                                <div class="alert alert-light-success">
                                    <strong>💡 Jangan lupa:</strong> Klik tombol <strong>Simpan Data</strong> untuk menyimpan foto.
                                </div>
                            </div>
                        `,
                        timer: 2500,
                        showConfirmButton: true,
                        confirmButtonText: 'OK, Mengerti',
                        customClass: {
                            popup: 'swal2-show',
                            title: 'swal2-title'
                        }
                    });
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Real-time form validation and summary update - prevent duplicates and loops with throttling
    let updateTimeout;
    $('input, select, textarea').off('input change').on('input change', function(e) {
        e.stopPropagation();

        // Clear previous timeout
        clearTimeout(updateTimeout);

        // Set new timeout to prevent rapid firing
        updateTimeout = setTimeout(function() {
            updateSummary();
            // Only validate if user is not currently navigating between steps
            // validateCurrentStep(); // Removed - only validate when clicking next button
        }, 100);
    });

    // Auto-set password to NIK (readonly) - always sync with NIK
    $('#nik').off('input').on('input', function() {
        const nikValue = $(this).val();
        $('#password').val(nikValue); // Always set password = NIK
    });

    // Initialize password with current NIK value if any
    if ($('#nik').val()) {
        $('#password').val($('#nik').val());
    }

    // Initialize form validation - removed to prevent auto validation on step change
    // validateCurrentStep(); // Only validate when user clicks next button
});

function previousStep() {
    if (currentStep > 1) {
        currentStep--;
        updateWizardDisplay();
    }
}

function updateWizardDisplay() {
    // Update step indicators
    $('.wizard-step').each(function(index) {
        const stepNumber = index + 1;
        const $step = $(this);

        $step.removeClass('active completed');

        if (stepNumber < currentStep) {
            $step.addClass('completed');
            $step.find('.step-number').hide();
        } else if (stepNumber === currentStep) {
            $step.addClass('active');
            $step.find('.step-number').show();
        } else {
            $step.find('.step-number').show();
        }
    });

    // Update step content
    $('.step-content').removeClass('active');
    $(`#step-${currentStep}`).addClass('active');

    // Update navigation buttons
    if (currentStep === 1) {
        $('#prev-btn').hide();
    } else {
        $('#prev-btn').show();
    }

    if (currentStep === totalSteps) {
        $('#next-btn').hide();
        $('#submit-btn').removeClass('d-none');
    } else {
        $('#next-btn').show();
        $('#submit-btn').addClass('d-none');
    }
}

function validateCurrentStep() {
    console.log('validateCurrentStep() called for step:', currentStep);
    let isValid = true;
    const currentStepElement = $(`#step-${currentStep}`);

    // Clear previous validation states
    currentStepElement.find('.form-control, .form-select').removeClass('is-invalid');
    currentStepElement.find('.invalid-feedback').hide();

    // Validate required fields in current step
    currentStepElement.find('input[required], select[required], textarea[required]').each(function() {
        const $field = $(this);
        const value = $field.val().trim();
        const $feedback = $field.siblings('.invalid-feedback');

        if (!value) {
            $field.addClass('is-invalid');

            // Set default message if empty or contains blade template
            const feedbackText = $feedback.text().trim();
            if (!feedbackText || feedbackText.includes('$message') || feedbackText === '') {
                const fieldName = $field.siblings('label').text().replace(' *', '') || 'Field ini';
                $feedback.text(`${fieldName} wajib diisi`);
            }
            $feedback.show();
            isValid = false;
        }

        // Special validation for NIK
        if ($field.attr('name') === 'nik' && value) {
            if (value.length !== 16 || !/^\d+$/.test(value)) {
                $field.addClass('is-invalid');
                $feedback.text('NIK harus 16 digit angka').show();
                isValid = false;
            }
        }

        // Special validation for No KK
        if ($field.attr('name') === 'no_kk' && value) {
            if (value.length !== 16 || !/^\d+$/.test(value)) {
                $field.addClass('is-invalid');
                $feedback.text('No. Kartu Keluarga harus 16 digit angka').show();
                isValid = false;
            }
        }

        // Special validation for email
        if ($field.attr('type') === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                $field.addClass('is-invalid');
                $feedback.text('Format email tidak valid').show();
                isValid = false;
            }
        }
    });

    console.log('validateCurrentStep() returning:', isValid);
    return isValid;
}

function showValidationErrors() {
    const currentStepElement = $(`#step-${currentStep}`);
    const invalidFields = [];

    // Debug: Log current step and elements found
    console.log('Current step:', currentStep);
    console.log('Step element found:', currentStepElement.length);

    // Collect all invalid field names
    currentStepElement.find('.form-control.is-invalid, .form-select.is-invalid').each(function() {
        const label = $(this).siblings('label').text().replace(' *', '');
        if (label) {
            invalidFields.push(label);
        }
    });

    // If no invalid fields found, still show a generic message
    if (invalidFields.length === 0) {
        // Check for required fields that might not be marked as invalid
        currentStepElement.find('input[required], select[required], textarea[required]').each(function() {
            const $field = $(this);
            const value = $field.val().trim();
            if (!value) {
                const label = $field.siblings('label').text().replace(' *', '') || 'Field';
                invalidFields.push(label);
            }
        });
    }

    let stepName = '';
    switch(currentStep) {
        case 1: stepName = 'Data Pribadi'; break;
        case 2: stepName = 'Kontak & Alamat'; break;
        case 3: stepName = 'Informasi Tambahan'; break;
        case 4: stepName = 'Foto & Konfirmasi'; break;
        default: stepName = 'Step ini';
    }

    console.log('Invalid fields found:', invalidFields);

    if (invalidFields.length > 0) {
        // Show toast notification first for quick feedback
        showValidationToast(invalidFields.length, stepName);

        const fieldsList = invalidFields.map(field => `• ${field}`).join('<br>');

        Swal.fire({
            icon: 'warning',
            title: `⚠️ Data ${stepName} Belum Lengkap!`,
            html: `
                <div class="text-start">
                    <p class="mb-3">Mohon lengkapi field berikut sebelum melanjutkan:</p>
                    <div class="alert alert-warning text-start">
                        ${fieldsList}
                    </div>
                    <p class="text-muted small">
                        <i class="ki-duotone ki-information fs-5 me-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                        Field yang ditandai (*) wajib diisi.
                    </p>
                </div>
            `,
            confirmButtonText: '✅ OK, Saya Mengerti',
            customClass: {
                confirmButton: 'btn btn-warning'
            },
            allowOutsideClick: false
        }).then(() => {
            // Focus on first invalid field
            const firstInvalidField = currentStepElement.find('.form-control.is-invalid, .form-select.is-invalid').first();
            if (firstInvalidField.length) {
                firstInvalidField.focus();

                // Scroll to the field
                $('html, body').animate({
                    scrollTop: firstInvalidField.offset().top - 150
                }, 500);
            }
        });
    } else {
        // Fallback alert if no specific invalid fields detected
        Swal.fire({
            icon: 'error',
            title: '❌ Ada Form yang Belum Diisi!',
            html: `
                <div class="text-center">
                    <p class="mb-3"><strong>Mohon periksa kembali semua field yang wajib diisi (bertanda <span style="color: #dc3545;">*</span> merah) pada step ini.</strong></p>
                    <div class="alert alert-danger">
                        <strong>Step saat ini:</strong> ${stepName}
                    </div>
                    <p class="text-muted small">
                        <i class="ki-duotone ki-information fs-5 me-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                        Field yang ditandai (*) wajib diisi.
                    </p>
                </div>
            `,
            confirmButtonText: '✅ OK, Saya Mengerti',
            customClass: {
                confirmButton: 'btn btn-warning'
            },
            allowOutsideClick: false
        });
    }
}

function showValidationToast(fieldCount, stepName) {
    // Create toast notification for immediate feedback
    const toast = $(`
        <div class="toast align-items-center text-white bg-warning border-0 position-fixed"
             style="top: 20px; right: 20px; z-index: 9999;" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="ki-duotone ki-warning fs-2 me-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <strong>${fieldCount} field ${stepName} wajib diisi!</strong>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    `);

    $('body').append(toast);

    // Initialize and show bootstrap toast
    const bsToast = new bootstrap.Toast(toast[0]);
    bsToast.show();

    // Auto remove after hidden
    toast.on('hidden.bs.toast', function() {
        $(this).remove();
    });
}

function updateSummary() {
    $('#summary-nama').text($('#nama_lengkap').val() || '-');
    $('#summary-nik').text($('#nik').val() || '-');
    $('#summary-gender').text($('#jenis_kelamin').val() || '-');
    $('#summary-alamat').text($('#alamat').val() || '-');
    $('#summary-pekerjaan').text($('#mata_pencaharian').val() || '-');
}

function removePhoto() {
    $('#foto').val('');
    $('#photo-preview').attr('src', '');
    $('.upload-content').removeClass('d-none');
    $('.preview-content').addClass('d-none');
}

// Enhanced form submission with AJAX - prevent duplicates
$('#kt_warga_form').off('submit').on('submit', function(e) {
    e.preventDefault();
    e.stopPropagation();

    // Final validation
    let isFormValid = true;
    for (let step = 1; step <= totalSteps; step++) {
        currentStep = step;
        if (!validateCurrentStep()) {
            isFormValid = false;
            break;
        }
    }

    if (!isFormValid) {
        Swal.fire({
            title: 'Data Tidak Lengkap!',
            text: 'Mohon lengkapi semua field yang wajib diisi sebelum menyimpan.',
            icon: 'warning',
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'btn btn-warning'
            }
        });
        return;
    }

    // Show confirmation dialog
    Swal.fire({
        title: '🎯 Konfirmasi Simpan Data',
        html: `
            <div class="text-start">
                <p class="mb-3">Apakah Anda yakin ingin menyimpan data warga ini?</p>
                <div class="alert alert-info">
                    <i class="ki-duotone ki-information fs-2 me-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                    Data yang telah disimpan dapat diedit kembali nantinya.
                </div>
            </div>
        `,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: '<i class="ki-duotone ki-check fs-3"></i> Ya, Simpan Data',
        cancelButtonText: '<i class="ki-duotone ki-cross fs-3"></i> Batal',
        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-light-danger'
        },
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            submitFormData();
        }
    });
});

function submitFormData() {
    // Show loading with progress
    Swal.fire({
        title: '💾 Menyimpan Data Warga',
        html: `
            <div class="text-center">
                <div class="spinner-border text-primary mb-3" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mb-2">Sedang memproses data...</p>
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

    // Submit via AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '{{ route("data-warga.store") }}',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Success animation
            Swal.fire({
                title: '🎉 Berhasil Disimpan!',
                html: `
                    <div class="text-center">
                        <div class="mb-3">
                            <i class="ki-duotone ki-check-circle fs-3x text-success">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <p class="mb-2">Data warga berhasil ditambahkan ke dalam sistem.</p>
                        <div class="alert alert-success">
                            <strong>✨ Sistem telah menyimpan:</strong><br>
                            • Data identitas dan alamat<br>
                            • Foto pas foto (jika ada)<br>
                            • Informasi keluarga dan sosial
                        </div>
                    </div>
                `,
                icon: 'success',
                confirmButtonText: '<i class="ki-duotone ki-home fs-3"></i> Kembali ke Daftar',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route("data-warga.index") }}';
                }
            });
        },
        error: function(xhr) {
            let errorMessage = 'Terjadi kesalahan saat menyimpan data.';
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
            } else {
                errorMessage = `Kesalahan HTTP ${xhr.status}`;
                errorDetails = xhr.responseJSON?.message || 'Silakan coba lagi.';
            }

            Swal.fire({
                title: '❌ Gagal Menyimpan!',
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

// Step navigation via clicking on steps
$('.wizard-step').on('click', function() {
    const targetStep = parseInt($(this).data('step'));

    // Allow navigation only to completed steps or next step
    if (targetStep <= currentStep || targetStep === currentStep + 1) {
        currentStep = targetStep;
        updateWizardDisplay();
        updateSummary();
    }
});

// Keyboard navigation
$(document).on('keydown', function(e) {
    if (e.key === 'ArrowRight' || e.key === 'Tab') {
        if (currentStep < totalSteps && validateCurrentStep()) {
            e.preventDefault();
            nextStep();
        }
    } else if (e.key === 'ArrowLeft') {
        if (currentStep > 1) {
            e.preventDefault();
            previousStep();
        }
    }
});

// Auto-save to localStorage (optional)
function autoSave() {
    const formData = {};
    $('#kt_warga_form input, #kt_warga_form select, #kt_warga_form textarea').each(function() {
        if ($(this).attr('name') && $(this).attr('type') !== 'file') {
            formData[$(this).attr('name')] = $(this).val();
        }
    });
    localStorage.setItem('warga_form_draft', JSON.stringify(formData));
}

// Load from localStorage (optional)
function loadDraft() {
    const savedData = localStorage.getItem('warga_form_draft');
    if (savedData) {
        const formData = JSON.parse(savedData);
        Object.keys(formData).forEach(key => {
            $(`[name="${key}"]`).val(formData[key]);
        });
    }
}

// Auto-save every 30 seconds
setInterval(autoSave, 30000);

// Clear draft on successful submission - prevent duplicate handlers
$('#kt_warga_form').off('submit').on('submit', function(e) {
    localStorage.removeItem('warga_form_draft');
});
</script>
@endpush
