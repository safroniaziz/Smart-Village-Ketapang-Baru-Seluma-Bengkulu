@extends('layouts.dashboard.dashboard')

@section('title', 'Edit Profil Desa')

@section('menu')
    Edit Profil Desa
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('profil-desa.index') }}" class="text-muted text-hover-primary">Profil Desa</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Edit</li>
@endsection

@section('content')
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                <div class="d-flex align-items-center">
                    <i class="ki-duotone ki-cross-circle fs-2 text-danger me-3">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <div class="flex-grow-1">
                        <h5 class="mb-1">Terjadi Kesalahan!</h5>
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

        <form action="{{ route('profil-desa.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!--begin::Monografi Desa-->
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Monografi Desa</span>
                        <span class="text-muted fw-semibold fs-7">Informasi dasar desa</span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    <div class="row g-6">
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Nama Desa <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_desa" value="{{ old('nama_desa', $monografi->nama_desa) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Kecamatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="kecamatan" value="{{ old('kecamatan', $monografi->kecamatan) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Kabupaten <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="kabupaten" value="{{ old('kabupaten', $monografi->kabupaten) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Provinsi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="provinsi" value="{{ old('provinsi', $monografi->provinsi) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Kode Pos</label>
                                <input type="text" class="form-control" name="kode_pos" value="{{ old('kode_pos', $monografi->kode_pos) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Status Desa <span class="text-danger">*</span></label>
                                <select class="form-select" name="status_desa" required>
                                    <option value="">Pilih Status Desa</option>
                                    <option value="Desa" {{ old('status_desa', $monografi->status_desa) == 'Desa' ? 'selected' : '' }}>Desa</option>
                                    <option value="Kelurahan" {{ old('status_desa', $monografi->status_desa) == 'Kelurahan' ? 'selected' : '' }}>Kelurahan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Tahun Berdiri</label>
                                <input type="number" class="form-control" name="tahun_berdiri" value="{{ old('tahun_berdiri', $monografi->tahun_berdiri) }}" min="1800" max="{{ date('Y') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Luas Wilayah (km²) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="luas_wilayah" value="{{ old('luas_wilayah', $monografi->luas_wilayah) }}" step="0.01" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Ketinggian (mdpl)</label>
                                <input type="number" class="form-control" name="ketinggian_mdpl" value="{{ old('ketinggian_mdpl', $monografi->ketinggian_mdpl) }}" min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Topografi</label>
                                <select class="form-select" name="topografi">
                                    <option value="">Pilih Topografi</option>
                                    <option value="Dataran Rendah" {{ old('topografi', $monografi->topografi) == 'Dataran Rendah' ? 'selected' : '' }}>Dataran Rendah</option>
                                    <option value="Dataran Tinggi" {{ old('topografi', $monografi->topografi) == 'Dataran Tinggi' ? 'selected' : '' }}>Dataran Tinggi</option>
                                    <option value="Pegunungan" {{ old('topografi', $monografi->topografi) == 'Pegunungan' ? 'selected' : '' }}>Pegunungan</option>
                                    <option value="Pantai" {{ old('topografi', $monografi->topografi) == 'Pantai' ? 'selected' : '' }}>Pantai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Iklim</label>
                                <select class="form-select" name="iklim">
                                    <option value="">Pilih Iklim</option>
                                    <option value="Tropis" {{ old('iklim', $monografi->iklim) == 'Tropis' ? 'selected' : '' }}>Tropis</option>
                                    <option value="Subtropis" {{ old('iklim', $monografi->iklim) == 'Subtropis' ? 'selected' : '' }}>Subtropis</option>
                                    <option value="Kontinental" {{ old('iklim', $monografi->iklim) == 'Kontinental' ? 'selected' : '' }}>Kontinental</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Suhu Rata-rata (°C)</label>
                                <input type="number" class="form-control" name="suhu_rata_rata" value="{{ old('suhu_rata_rata', $monografi->suhu_rata_rata) }}" step="0.1" min="0" max="50">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Jarak ke Kecamatan (km)</label>
                                <input type="number" class="form-control" name="jarak_ke_kecamatan" value="{{ old('jarak_ke_kecamatan', $monografi->jarak_ke_kecamatan) }}" step="0.01" min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Waktu ke Kecamatan (jam)</label>
                                <input type="number" class="form-control" name="waktu_ke_kecamatan" value="{{ old('waktu_ke_kecamatan', $monografi->waktu_ke_kecamatan) }}" step="0.01" min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Jarak ke Kabupaten (km)</label>
                                <input type="number" class="form-control" name="jarak_ke_kabupaten" value="{{ old('jarak_ke_kabupaten', $monografi->jarak_ke_kabupaten) }}" step="0.01" min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Waktu ke Kabupaten (jam)</label>
                                <input type="number" class="form-control" name="waktu_ke_kabupaten" value="{{ old('waktu_ke_kabupaten', $monografi->waktu_ke_kabupaten) }}" step="0.01" min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Latitude</label>
                                <input type="number" class="form-control" name="latitude" value="{{ old('latitude', $monografi->latitude) }}" step="0.0000001" min="-90" max="90">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Longitude</label>
                                <input type="number" class="form-control" name="longitude" value="{{ old('longitude', $monografi->longitude) }}" step="0.0000001" min="-180" max="180">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="4">{{ old('deskripsi', $monografi->deskripsi) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Monografi Desa-->

            <!--begin::Batas Wilayah-->
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Batas Wilayah</span>
                        <span class="text-muted fw-semibold fs-7">Perbatasan desa</span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    <div class="row g-6">
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Batas Utara</label>
                                <input type="text" class="form-control" name="batas_utara" value="{{ old('batas_utara', $batasWilayah->where('arah', 'utara')->first()->berbatasan_dengan ?? '') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Batas Timur</label>
                                <input type="text" class="form-control" name="batas_timur" value="{{ old('batas_timur', $batasWilayah->where('arah', 'timur')->first()->berbatasan_dengan ?? '') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Batas Selatan</label>
                                <input type="text" class="form-control" name="batas_selatan" value="{{ old('batas_selatan', $batasWilayah->where('arah', 'selatan')->first()->berbatasan_dengan ?? '') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label class="form-label fw-bold">Batas Barat</label>
                                <input type="text" class="form-control" name="batas_barat" value="{{ old('batas_barat', $batasWilayah->where('arah', 'barat')->first()->berbatasan_dengan ?? '') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Batas Wilayah-->

            <!--begin::Action Buttons-->
            <div class="card">
                <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                    <div class="d-flex flex-wrap flex-center pb-lg-0">
                        <button type="submit" class="btn btn-success me-3 mb-3" data-kt-indicator="off">
                            <span class="indicator-label">
                                <i class="ki-duotone ki-check fs-2 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Simpan Perubahan
                            </span>
                            <span class="indicator-progress">
                                Menyimpan... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>

                        <a href="{{ route('profil-desa.index') }}" class="btn btn-light me-3 mb-3">
                            <i class="ki-duotone ki-arrow-left fs-2 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Batal
                        </a>
                    </div>
                </div>
            </div>
            <!--end::Action Buttons-->

        </form>

    </div>
</div>
<!--end::Content-->
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Form submission with loading indicator
    $('form').on('submit', function() {
        const submitBtn = $(this).find('button[type="submit"]');
        submitBtn.attr('data-kt-indicator', 'on');
        submitBtn.prop('disabled', true);
    });
});
</script>
@endpush
