@extends('layouts.dashboard.dashboard')

@section('title', 'Edit Data Warga')

@push('styles')
<style>
/* Enhanced Edit Page Styling */
.edit-container {
    background: linear-gradient(135deg, #e8f4f8 0%, #f0f9ff 100%);
    border-radius: 1rem;
    padding: 2rem;
    margin-bottom: 1rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}

.profile-section {
    background: white;
    border-radius: 1rem;
    padding: 2rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    height: fit-content;
    position: sticky;
    top: 2rem;
}

.current-photo {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid #e1e5e9;
    margin: 0 auto 1rem;
    display: block;
    transition: all 0.3s ease;
}

.current-photo:hover {
    transform: scale(1.05);
    border-color: #3b82f6;
}

.photo-upload-wrapper {
    position: relative;
    text-align: center;
}

.change-photo-btn {
    position: absolute;
    bottom: 10px;
    right: 10px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.form-section {
    background: white;
    border-radius: 1rem;
    padding: 2rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.form-section:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.1);
}

.section-header {
    border-bottom: 2px solid #f1f3f4;
    padding-bottom: 1rem;
    margin-bottom: 2rem;
}

.section-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-right: 1rem;
}

/* Enhanced Form Controls */
.form-floating {
    position: relative;
    margin-bottom: 1.5rem;
}

.form-floating .form-control,
.form-floating .form-select {
    height: 58px;
    border-radius: 0.75rem;
    border: 2px solid #e1e5e9;
    padding: 1rem 0.75rem 0.25rem;
    transition: all 0.3s ease;
    background: #fafafa;
}

.form-floating .form-control:focus,
.form-floating .form-select:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.1);
    transform: translateY(-2px);
    background: white;
}

.form-floating label {
    color: #6b7280;
    font-weight: 500;
    font-size: 0.875rem;
}

/* Animated Icons */
.floating-icon {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    transition: all 0.3s ease;
}

.form-control:focus + .floating-icon {
    color: #3b82f6;
    transform: translateY(-50%) scale(1.1);
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
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Edit Data Warga
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
                    <li class="breadcrumb-item text-muted">Edit</li>
                </ul>
            </div>
        </div>
    </div>
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            
            <form action="{{ route('data-warga.update', $dataWarga) }}" method="POST" enctype="multipart/form-data" id="kt_warga_form">
                @csrf
                @method('PUT')
                
                <!--begin::Card-->
                <div class="card mb-8">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Informasi Personal</h2>
                        </div>
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body">
                        <div class="row g-9">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">NIK</label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" 
                                       name="nik" value="{{ old('nik', $dataWarga->nik) }}" placeholder="Masukkan NIK" maxlength="16" />
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" 
                                       name="nama_lengkap" value="{{ old('nama_lengkap', $dataWarga->nama_lengkap) }}" placeholder="Masukkan nama lengkap" />
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
                                       name="no_kk" value="{{ old('no_kk', $dataWarga->no_kk) }}" placeholder="Masukkan No. KK" maxlength="16" />
                                @error('no_kk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Tempat Lahir</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                                       name="tempat_lahir" value="{{ old('tempat_lahir', $dataWarga->tempat_lahir) }}" placeholder="Masukkan tempat lahir" />
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
                                       name="tanggal_lahir" value="{{ old('tanggal_lahir', $dataWarga->tanggal_lahir ? $dataWarga->tanggal_lahir->format('Y-m-d') : '') }}" />
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
                                    <option value="Laki-laki" {{ old('jenis_kelamin', $dataWarga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $dataWarga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
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
                                          name="alamat" rows="3" placeholder="Masukkan alamat lengkap">{{ old('alamat', $dataWarga->alamat) }}</textarea>
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
                                       name="rt_rw" value="{{ old('rt_rw', $dataWarga->rt_rw) }}" placeholder="contoh: 001/002" />
                                @error('rt_rw')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Dusun</label>
                                <input type="text" class="form-control @error('dusun') is-invalid @enderror" 
                                       name="dusun" value="{{ old('dusun', $dataWarga->dusun) }}" placeholder="Masukkan dusun" />
                                @error('dusun')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Desa</label>
                                <input type="text" class="form-control @error('desa') is-invalid @enderror" 
                                       name="desa" value="{{ old('desa', $dataWarga->desa) }}" placeholder="Masukkan desa" />
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
                                       name="kecamatan" value="{{ old('kecamatan', $dataWarga->kecamatan) }}" placeholder="Masukkan kecamatan" />
                                @error('kecamatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Kabupaten</label>
                                <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" 
                                       name="kabupaten" value="{{ old('kabupaten', $dataWarga->kabupaten) }}" placeholder="Masukkan kabupaten" />
                                @error('kabupaten')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Provinsi</label>
                                <input type="text" class="form-control @error('provinsi') is-invalid @enderror" 
                                       name="provinsi" value="{{ old('provinsi', $dataWarga->provinsi) }}" placeholder="Masukkan provinsi" />
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
                                    <option value="Islam" {{ old('agama', $dataWarga->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ old('agama', $dataWarga->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                    <option value="Katolik" {{ old('agama', $dataWarga->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                    <option value="Hindu" {{ old('agama', $dataWarga->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ old('agama', $dataWarga->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                    <option value="Konghucu" {{ old('agama', $dataWarga->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
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
                                    <option value="Belum Kawin" {{ old('status_perkawinan', $dataWarga->status_perkawinan) == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                    <option value="Kawin" {{ old('status_perkawinan', $dataWarga->status_perkawinan) == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                    <option value="Cerai Hidup" {{ old('status_perkawinan', $dataWarga->status_perkawinan) == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                    <option value="Cerai Mati" {{ old('status_perkawinan', $dataWarga->status_perkawinan) == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
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
                                       name="pekerjaan" value="{{ old('pekerjaan', $dataWarga->pekerjaan) }}" placeholder="Masukkan pekerjaan" />
                                @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Pendidikan</label>
                                <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" 
                                       name="pendidikan" value="{{ old('pendidikan', $dataWarga->pendidikan) }}" placeholder="Masukkan pendidikan terakhir" />
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
                                       name="kewarganegaraan" value="{{ old('kewarganegaraan', $dataWarga->kewarganegaraan) }}" placeholder="Masukkan kewarganegaraan" />
                                @error('kewarganegaraan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="fs-6 fw-semibold mb-2">Foto</label>
                                @if($dataWarga->foto)
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/' . $dataWarga->foto) }}" alt="Current Photo" class="img-thumbnail" style="max-width: 100px;">
                                        <div class="form-text">Foto saat ini</div>
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" 
                                       name="foto" accept="image/*" />
                                <div class="form-text">Format: JPEG, PNG, JPG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah foto.</div>
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
                                           value="1" {{ old('is_kepala_keluarga', $dataWarga->is_kepala_keluarga) ? 'checked' : '' }} id="is_kepala_keluarga" />
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
                                       name="email" value="{{ old('email', $dataWarga->email) }}" placeholder="Masukkan email (opsional)" />
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
                                <label class="fs-6 fw-semibold mb-2">Password Baru</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       name="password" placeholder="Masukkan password baru (opsional)" />
                                <div class="form-text">Minimal 8 karakter. Kosongkan jika tidak ingin mengubah password.</div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="fs-6 fw-semibold mb-2">Konfirmasi Password</label>
                                <input type="password" class="form-control" 
                                       name="password_confirmation" placeholder="Konfirmasi password baru" />
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
                            <span class="indicator-label">Perbarui</span>
                            <span class="indicator-progress">Memperbarui...
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