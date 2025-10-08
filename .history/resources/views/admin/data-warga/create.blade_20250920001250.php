@extends('layouts.dashboard.dashboard')

@section('title', 'Tambah Data Warga')

@push('styles')
<style>
/* Wizard Styling */
.wizard-container {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 1rem;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.wizard-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    position: relative;
}

.wizard-nav::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 3px;
    background: rgba(255,255,255,0.2);
    z-index: 1;
}

.wizard-step {
    background: rgba(255,255,255,0.2);
    color: rgba(255,255,255,0.7);
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.2rem;
    position: relative;
    z-index: 2;
    transition: all 0.3s ease;
    cursor: pointer;
}

.wizard-step.active {
    background: #fff;
    color: #667eea;
    transform: scale(1.1);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.wizard-step.completed {
    background: #10b981;
    color: white;
}

.wizard-step.completed::after {
    content: '✓';
    font-size: 1.5rem;
}

.wizard-content {
    background: white;
    border-radius: 1rem;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    min-height: 500px;
}

.step-content {
    display: none;
    animation: fadeInUp 0.5s ease;
}

.step-content.active {
    display: block;
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
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Tambah Data Warga
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('data-warga.index') }}" class="text-muted text-hover-primary">Data Warga</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Tambah</li>
                </ul>
            </div>
        </div>
    </div>
    <!--end::Toolbar-->

<!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            
            <!--begin::Wizard Container-->
            <div class="wizard-container">
                <div class="text-center mb-4">
                    <h1 class="text-white fw-bold fs-1 mb-2">Tambah Data Warga Baru</h1>
                    <p class="text-white opacity-75 fs-5">Lengkapi informasi warga dengan mudah melalui form wizard ini</p>
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

                    <!--begin::Card body-->
                    <div class="card-body">
                        <div class="row g-9">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">NIK</label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" 
                                       name="nik" value="{{ old('nik') }}" placeholder="Masukkan NIK" maxlength="16" />
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" 
                                       name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Masukkan nama lengkap" />
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>

                        <div class="row g-9 mt-5">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="fs-6 fw-semibold mb-2">No. KK</label>
                                <input type="text" class="form-control @error('no_kk') is-invalid @enderror" 
                                       name="no_kk" value="{{ old('no_kk') }}" placeholder="Masukkan No. KK" maxlength="16" />
                                @error('no_kk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Tempat Lahir</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                                       name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Masukkan tempat lahir" />
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>

                        <div class="row g-9 mt-5">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                       name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" />
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Jenis Kelamin</label>
                                <select class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                                    <option value="">Pilih jenis kelamin</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>

                        <div class="row g-9 mt-5">
                            <!--begin::Col-->
                            <div class="col-md-12 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                          name="alamat" rows="3" placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>

                        <div class="row g-9 mt-5">
                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <label class="fs-6 fw-semibold mb-2">RT/RW</label>
                                <input type="text" class="form-control @error('rt_rw') is-invalid @enderror" 
                                       name="rt_rw" value="{{ old('rt_rw') }}" placeholder="contoh: 001/002" />
                                @error('rt_rw')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Dusun</label>
                                <input type="text" class="form-control @error('dusun') is-invalid @enderror" 
                                       name="dusun" value="{{ old('dusun') }}" placeholder="Masukkan dusun" />
                                @error('dusun')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Desa</label>
                                <input type="text" class="form-control @error('desa') is-invalid @enderror" 
                                       name="desa" value="{{ old('desa', 'Ketapang Baru') }}" placeholder="Masukkan desa" />
                                @error('desa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>

                        <div class="row g-9 mt-5">
                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Kecamatan</label>
                                <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" 
                                       name="kecamatan" value="{{ old('kecamatan', 'Sukaraja') }}" placeholder="Masukkan kecamatan" />
                                @error('kecamatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Kabupaten</label>
                                <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" 
                                       name="kabupaten" value="{{ old('kabupaten', 'Seluma') }}" placeholder="Masukkan kabupaten" />
                                @error('kabupaten')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Provinsi</label>
                                <input type="text" class="form-control @error('provinsi') is-invalid @enderror" 
                                       name="provinsi" value="{{ old('provinsi', 'Bengkulu') }}" placeholder="Masukkan provinsi" />
                                @error('provinsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->

                <!--begin::Card-->
                <div class="card mb-8">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Informasi Sosial</h2>
                        </div>
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body">
                        <div class="row g-9">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Agama</label>
                                <select class="form-select @error('agama') is-invalid @enderror" name="agama">
                                    <option value="">Pilih agama</option>
                                    <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                    <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                    <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                    <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                </select>
                                @error('agama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Status Perkawinan</label>
                                <select class="form-select @error('status_perkawinan') is-invalid @enderror" name="status_perkawinan">
                                    <option value="">Pilih status perkawinan</option>
                                    <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                    <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                    <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                    <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                                </select>
                                @error('status_perkawinan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>

                        <div class="row g-9 mt-5">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Pekerjaan</label>
                                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" 
                                       name="pekerjaan" value="{{ old('pekerjaan') }}" placeholder="Masukkan pekerjaan" />
                                @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Pendidikan</label>
                                <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" 
                                       name="pendidikan" value="{{ old('pendidikan') }}" placeholder="Masukkan pendidikan terakhir" />
                                @error('pendidikan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>

                        <div class="row g-9 mt-5">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Kewarganegaraan</label>
                                <input type="text" class="form-control @error('kewarganegaraan') is-invalid @enderror" 
                                       name="kewarganegaraan" value="{{ old('kewarganegaraan', 'WNI') }}" placeholder="Masukkan kewarganegaraan" />
                                @error('kewarganegaraan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="fs-6 fw-semibold mb-2">Foto</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" 
                                       name="foto" accept="image/*" />
                                <div class="form-text">Format: JPEG, PNG, JPG. Maksimal 2MB</div>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>

                        <div class="row g-9 mt-5">
                            <!--begin::Col-->
                            <div class="col-md-12 fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" name="is_kepala_keluarga" 
                                           value="1" {{ old('is_kepala_keluarga') ? 'checked' : '' }} id="is_kepala_keluarga" />
                                    <label class="form-check-label" for="is_kepala_keluarga">
                                        Kepala Keluarga
                                    </label>
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->

                <!--begin::Card-->
                <div class="card mb-8">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Akun Login (Opsional)</h2>
                        </div>
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body">
                        <div class="row g-9">
                            <!--begin::Col-->
                            <div class="col-md-12 fv-row">
                                <label class="fs-6 fw-semibold mb-2">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" placeholder="Masukkan email (opsional)" />
                                <div class="form-text">Email akan digunakan untuk login ke sistem</div>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>

                        <div class="row g-9 mt-5">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="fs-6 fw-semibold mb-2">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       name="password" placeholder="Masukkan password (opsional)" />
                                <div class="form-text">Minimal 8 karakter</div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="fs-6 fw-semibold mb-2">Konfirmasi Password</label>
                                <input type="password" class="form-control" 
                                       name="password_confirmation" placeholder="Konfirmasi password" />
                            </div>
                            <!--end::Col-->
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->

                <!--begin::Actions-->
                <div class="card">
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <a href="{{ route('data-warga.index') }}" class="btn btn-light btn-active-light-primary me-2">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Simpan</span>
                            <span class="indicator-progress">Menyimpan...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </div>
                <!--end::Actions-->
            </form>
        </div>
    </div>
    <!--end::Content-->
</div>
@endsection

@push('scripts')
<script>
document.getElementById('kt_warga_form').addEventListener('submit', function(e) {
    const submitBtn = document.querySelector('[type="submit"]');
    submitBtn.setAttribute('data-kt-indicator', 'on');
    submitBtn.disabled = true;
});
</script>
@endpush