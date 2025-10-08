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
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid white;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    margin: 1rem auto;
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
</style>
@endpush

@section('content')
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">

            <!--begin::Wizard Container-->
            <div class="wizard-container position-relative overflow-hidden">
                <!-- Decorative elements -->
                <div class="position-absolute top-0 end-0" style="width: 300px; height: 300px; background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%); transform: translate(30%, -30%);"></div>
                <div class="position-absolute bottom-0 start-0" style="width: 200px; height: 200px; background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%); transform: translate(-30%, 30%);"></div>
                
                <div class="text-center mb-4 position-relative" style="z-index: 2;">
                    <div class="mb-3">
                        <i class="ki-duotone ki-add-user text-white fs-3x mb-3">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                    </div>
                    <h1 class="text-white fw-bold fs-2x mb-3">Tambah Data Warga Baru</h1>
                    <p class="text-white fs-5 mb-4" style="opacity: 0.9;">Lengkapi informasi warga dengan mudah melalui wizard yang profesional dan interaktif</p>
                    
                    <!-- Stats -->
                    <div class="row g-3 justify-content-center mb-4">
                        <div class="col-auto">
                            <div class="bg-white bg-opacity-20 rounded-pill px-4 py-2">
                                <span class="text-white fw-semibold fs-7">
                                    <i class="ki-duotone ki-check-circle text-white fs-6 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    4 Langkah Mudah
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="bg-white bg-opacity-20 rounded-pill px-4 py-2">
                                <span class="text-white fw-semibold fs-7">
                                    <i class="ki-duotone ki-profile-user text-white fs-6 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                    Data Lengkap
                                </span>
                            </div>
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
                                           id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap"
                                           value="{{ old('nama_lengkap') }}" required>
                                    <label for="nama_lengkap">Nama Lengkap *</label>
                                    @error('nama_lengkap')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                           id="nik" name="nik" placeholder="NIK"
                                           value="{{ old('nik') }}" maxlength="16" required>
                                    <label for="nik">NIK (16 digit) *</label>
                                    @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                           id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir"
                                           value="{{ old('tempat_lahir') }}">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                           id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir"
                                           value="{{ old('tanggal_lahir') }}">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
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
                                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    <label for="jenis_kelamin">Jenis Kelamin *</label>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select @error('agama') is-invalid @enderror"
                                            id="agama" name="agama">
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                        <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                        <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                        <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                    </select>
                                    <label for="agama">Agama</label>
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
                                           id="email" name="email" placeholder="Email"
                                           value="{{ old('email') }}">
                                    <label for="email">Email</label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('no_kk') is-invalid @enderror"
                                           id="no_kk" name="no_kk" placeholder="No. KK"
                                           value="{{ old('no_kk') }}" maxlength="16">
                                    <label for="no_kk">No. Kartu Keluarga</label>
                                    @error('no_kk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control @error('alamat') is-invalid @enderror"
                                              id="alamat" name="alamat" placeholder="Alamat"
                                              style="height: 100px">{{ old('alamat') }}</textarea>
                                    <label for="alamat">Alamat Lengkap *</label>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('rt_rw') is-invalid @enderror"
                                           id="rt_rw" name="rt_rw" placeholder="RT/RW"
                                           value="{{ old('rt_rw') }}">
                                    <label for="rt_rw">RT/RW</label>
                                    @error('rt_rw')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('dusun') is-invalid @enderror"
                                           id="dusun" name="dusun" placeholder="Dusun"
                                           value="{{ old('dusun') }}" required>
                                    <label for="dusun">Dusun *</label>
                                    @error('dusun')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('desa') is-invalid @enderror"
                                           id="desa" name="desa" placeholder="Desa"
                                           value="{{ old('desa', 'Ketapang Baru') }}" required>
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
                                           value="{{ old('kecamatan', 'Sukaraja') }}" required>
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
                                           value="{{ old('kabupaten', 'Seluma') }}" required>
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
                                           value="{{ old('provinsi', 'Bengkulu') }}" required>
                                    <label for="provinsi">Provinsi *</label>
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
                                        <option value="">Pilih Status Perkawinan</option>
                                        <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                        <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                        <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                        <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
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
                                           value="{{ old('pekerjaan') }}" required>
                                    <label for="pekerjaan">Pekerjaan *</label>
                                    @error('pekerjaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('pendidikan') is-invalid @enderror"
                                           id="pendidikan" name="pendidikan" placeholder="Pendidikan"
                                           value="{{ old('pendidikan') }}" required>
                                    <label for="pendidikan">Pendidikan Terakhir *</label>
                                    @error('pendidikan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('kewarganegaraan') is-invalid @enderror"
                                           id="kewarganegaraan" name="kewarganegaraan" placeholder="Kewarganegaraan"
                                           value="{{ old('kewarganegaraan', 'WNI') }}" required>
                                    <label for="kewarganegaraan">Kewarganegaraan *</label>
                                    @error('kewarganegaraan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-check form-check-custom form-check-solid form-check-lg">
                                    <input class="form-check-input" type="checkbox" name="is_kepala_keluarga"
                                           value="1" {{ old('is_kepala_keluarga') ? 'checked' : '' }} id="is_kepala_keluarga">
                                    <label class="form-check-label fw-bold text-gray-700" for="is_kepala_keluarga">
                                        Kepala Keluarga
                                    </label>
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
                                        <h4 class="fw-bold text-gray-800 mb-2">Upload Foto Warga</h4>
                                        <p class="text-muted mb-4">Klik atau drag & drop foto di sini</p>
                                        <input type="file" class="form-control d-none @error('foto') is-invalid @enderror"
                                               id="foto" name="foto" accept="image/*">
                                        <div class="text-muted small">Format: JPEG, PNG, JPG. Maksimal 2MB</div>
                                        @error('foto')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="preview-content d-none">
                                        <img class="photo-preview" id="photo-preview" src="" alt="Preview">
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
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="password" name="password" placeholder="Password">
                                    <label for="password">Password (Opsional)</label>
                                    <div class="form-text">Jika diisi, warga dapat login ke sistem</div>
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

                            <button type="button" class="btn btn-primary btn-wizard" id="next-btn" onclick="nextStep()">
                                Selanjutnya
                                <i class="ki-duotone ki-right fs-5 ms-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </button>

                            <button type="submit" class="btn btn-success btn-wizard d-none" id="submit-btn">
                                <i class="ki-duotone ki-check fs-5 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                Simpan Data
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

$(document).ready(function() {
    // Initialize wizard
    updateWizardDisplay();

    // Photo upload functionality
    $('#photo-upload').on('click', function() {
        $('#foto').click();
    });

    // Handle photo selection
    $('#foto').on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#photo-preview').attr('src', e.target.result);
                $('.upload-content').addClass('d-none');
                $('.preview-content').removeClass('d-none');
            };
            reader.readAsDataURL(file);
        }
    });

    // Real-time form validation and summary update
    $('input, select, textarea').on('input change', function() {
        updateSummary();
        validateCurrentStep();
    });

    // Initialize form validation
    validateCurrentStep();
});

function nextStep() {
    if (validateCurrentStep()) {
        if (currentStep < totalSteps) {
            currentStep++;
            updateWizardDisplay();
            updateSummary();

            // Smooth scroll to top
            $('html, body').animate({
                scrollTop: $('.wizard-container').offset().top - 100
            }, 500);
        }
    }
}

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
    let isValid = true;
    const currentStepElement = $(`#step-${currentStep}`);

    // Clear previous validation states
    currentStepElement.find('.form-control, .form-select').removeClass('is-invalid');
    currentStepElement.find('.invalid-feedback').hide();

    // Validate required fields in current step
    currentStepElement.find('input[required], select[required], textarea[required]').each(function() {
        const $field = $(this);
        const value = $field.val().trim();

        if (!value) {
            $field.addClass('is-invalid');
            $field.siblings('.invalid-feedback').show();
            isValid = false;
        }

        // Special validation for NIK
        if ($field.attr('name') === 'nik' && value) {
            if (value.length !== 16 || !/^\d+$/.test(value)) {
                $field.addClass('is-invalid');
                $field.siblings('.invalid-feedback').text('NIK harus 16 digit angka').show();
                isValid = false;
            }
        }

        // Special validation for email
        if ($field.attr('type') === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                $field.addClass('is-invalid');
                $field.siblings('.invalid-feedback').text('Format email tidak valid').show();
                isValid = false;
            }
        }
    });

    return isValid;
}

function updateSummary() {
    $('#summary-nama').text($('#nama_lengkap').val() || '-');
    $('#summary-nik').text($('#nik').val() || '-');
    $('#summary-gender').text($('#jenis_kelamin').val() || '-');
    $('#summary-alamat').text($('#alamat').val() || '-');
    $('#summary-pekerjaan').text($('#pekerjaan').val() || '-');
}

function removePhoto() {
    $('#foto').val('');
    $('#photo-preview').attr('src', '');
    $('.upload-content').removeClass('d-none');
    $('.preview-content').addClass('d-none');
}

// Enhanced form submission
$('#kt_warga_form').on('submit', function(e) {
    e.preventDefault();

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
            title: 'Data Tidak Lengkap',
            text: 'Mohon lengkapi semua field yang wajib diisi',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    // Show loading
    Swal.fire({
        title: 'Menyimpan Data...',
        text: 'Mohon tunggu sebentar',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showConfirmButton: false,
        willOpen: () => {
            Swal.showLoading();
        }
    });

    // Submit form
    this.submit();
});

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

// Clear draft on successful submission
$('#kt_warga_form').on('submit', function() {
    localStorage.removeItem('warga_form_draft');
});
</script>
@endpush
