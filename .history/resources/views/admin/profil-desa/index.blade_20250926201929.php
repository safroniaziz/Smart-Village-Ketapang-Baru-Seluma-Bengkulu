@extends('layouts.dashboard.dashboard')

@section('title', 'Profil Desa')

@section('menu')
    Profil Desa
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Profil Desa</li>
@endsection

@push('styles')
<style>
/* Statistics Cards Animation */
.card.hoverable {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid rgba(0,0,0,0.08);
    position: relative;
    overflow: hidden;
}

.card.hoverable::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.6s;
}

.card.hoverable:hover {
    transform: translateY(-12px) scale(1.02);
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
    border-color: var(--kt-primary);
}

.card.hoverable:hover::before {
    left: 100%;
}

.card.hoverable .symbol-label {
    position: relative;
    overflow: hidden;
}

.card.hoverable .symbol-label::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s;
}

.card.hoverable:hover .symbol-label::before {
    left: 100%;
}

/* Enhanced Symbols */
.symbol-50px {
    width: 50px;
    height: 50px;
    flex-shrink: 0;
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.symbol-50px:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 16px rgba(0,0,0,0.15);
}

/* Table enhancements */
.table tbody tr {
    transition: all 0.3s ease;
}

.table tbody tr:hover {
    background-color: rgba(54, 153, 255, 0.05);
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Badge enhancements */
.badge {
    border-radius: 0.5rem;
    padding: 0.5rem 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

/* Action buttons styling */
.btn-success {
    background: linear-gradient(135deg, #00D4AA 0%, #00A389 100%);
    border: none;
    box-shadow: 0 4px 15px rgba(0, 212, 170, 0.3);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.btn-success::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s;
}

.btn-success:hover {
    background: linear-gradient(135deg, #00A389 0%, #008A74 100%);
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 8px 25px rgba(0, 212, 170, 0.5);
}

.btn-success:hover::before {
    left: 100%;
}

.btn-warning {
    background: linear-gradient(135deg, #FFC700 0%, #FF9500 100%);
    border: none;
    color: white;
    box-shadow: 0 4px 15px rgba(255, 199, 0, 0.3);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.btn-warning::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s;
}

.btn-warning:hover {
    background: linear-gradient(135deg, #FF9500 0%, #FF7A00 100%);
    color: white;
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 8px 25px rgba(255, 199, 0, 0.5);
}

.btn-warning:hover::before {
    left: 100%;
}

/* Image styling */
.fasilitas-image {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 0.5rem;
    border: 2px solid #e1e5e9;
    transition: all 0.3s ease;
}

.fasilitas-image:hover {
    transform: scale(1.1);
    border-color: var(--kt-primary);
}

/* Map container */
.map-container {
    height: 300px;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

/* Info cards */
.info-card {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 1rem;
    padding: 1.5rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.info-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.info-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    background: rgba(255, 255, 255, 0.95);
}

.info-card:hover::before {
    opacity: 1;
}

/* Fade in animation */
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

.fade-in-up {
    animation: fadeInUp 0.6s ease-out;
}

.fade-in-up:nth-child(1) { animation-delay: 0.1s; }
.fade-in-up:nth-child(2) { animation-delay: 0.2s; }
.fade-in-up:nth-child(3) { animation-delay: 0.3s; }
.fade-in-up:nth-child(4) { animation-delay: 0.4s; }
</style>
@endpush

@section('content')
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                <div class="d-flex align-items-center">
                    <i class="ki-duotone ki-check-circle fs-2 text-success me-3">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <div class="flex-grow-1">
                        <h5 class="mb-1">Berhasil!</h5>
                        <div>{{ session('success') }}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!--begin::Header Card-->
        <div class="card mb-5 mb-xl-8" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); position: relative; overflow: hidden;">
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
            <div class="card-body text-center py-12">
                <div class="d-flex justify-content-center mb-5">
                    <div class="symbol symbol-100px">
                        <div class="symbol-label bg-white bg-opacity-20">
                            <i class="ki-duotone ki-home-2 fs-2x text-white">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                </div>
                <h1 class="text-white fw-bold fs-2x mb-3">Profil Desa</h1>
                <p class="text-white fs-4 mb-0" style="opacity: 0.8;">Kelola informasi lengkap tentang desa Anda</p>
            </div>
        </div>
        <!--end::Header Card-->

        <!--begin::Statistics Cards-->
        <div class="row g-5 g-xl-8 mb-8">
            <div class="col-xl-3">
                <div class="card bg-body hoverable card-xl-stretch mb-xl-8 fade-in-up">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
                                <div class="symbol-label bg-light-primary">
                                    <i class="ki-duotone ki-home-2 fs-2x text-primary">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="text-dark fw-bold fs-6 mb-2">Nama Desa</div>
                                <div class="fw-semibold text-muted fs-7">{{ $monografi->nama_desa ?? 'Belum Diisi' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card bg-body hoverable card-xl-stretch mb-xl-8 fade-in-up">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
                                <div class="symbol-label bg-light-success">
                                    <i class="ki-duotone ki-geolocation fs-2x text-success">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="text-dark fw-bold fs-6 mb-2">Luas Wilayah</div>
                                <div class="fw-semibold text-muted fs-7">{{ $monografi->luas_wilayah ? number_format($monografi->luas_wilayah, 2) . ' km²' : 'Belum Diisi' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card bg-body hoverable card-xl-stretch mb-xl-8 fade-in-up">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
                                <div class="symbol-label bg-light-info">
                                    <i class="ki-duotone ki-abstract-41 fs-2x text-info">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="text-dark fw-bold fs-6 mb-2">Status Desa</div>
                                <div class="fw-semibold text-muted fs-7">{{ $monografi->status_desa ?? 'Belum Diisi' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card bg-body hoverable card-xl-stretch mb-xl-8 fade-in-up">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
                                <div class="symbol-label bg-light-warning">
                                    <i class="ki-duotone ki-calendar fs-2x text-warning">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="text-dark fw-bold fs-6 mb-2">Tahun Berdiri</div>
                                <div class="fw-semibold text-muted fs-7">{{ $monografi->tahun_berdiri ?? 'Belum Diisi' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Statistics Cards-->

        <!--begin::Content Cards-->
        <div class="row g-5 g-xxl-8">
            <!--begin::Monografi Desa-->
            <div class="col-12 col-xl-6 col-xxl-6">
                <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Monografi Desa</span>
                            <span class="text-muted fw-semibold fs-7">Informasi dasar desa</span>
                        </h3>
                    </div>
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-muted">Nama Desa</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->nama_desa ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Kecamatan</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->kecamatan ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Kabupaten</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->kabupaten ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Provinsi</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->provinsi ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Kode Pos</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->kode_pos ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Status Desa</td>
                                        <td class="text-end">
                                            <span class="badge badge-light-primary fs-7 fw-semibold">{{ $monografi->status_desa ?? '-' }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Tahun Berdiri</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->tahun_berdiri ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Luas Wilayah</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->luas_wilayah ? number_format($monografi->luas_wilayah, 2) . ' km²' : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Ketinggian</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->ketinggian_mdpl ? $monografi->ketinggian_mdpl . ' mdpl' : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Topografi</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->topografi ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Iklim</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->iklim ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Suhu Rata-rata</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $monografi->suhu_rata_rata ? $monografi->suhu_rata_rata . '°C' : '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Monografi Desa-->

            <!--begin::Batas Wilayah-->
            <div class="col-12 col-xl-6 col-xxl-6">
                <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Batas Wilayah</span>
                            <span class="text-muted fw-semibold fs-7">Perbatasan desa</span>
                        </h3>
                    </div>
                    <div class="card-body py-3">
                        @if($batasWilayah->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <tbody>
                                        @foreach($batasWilayah as $batas)
                                            <tr>
                                                <td class="fw-bold text-muted text-capitalize">{{ $batas->arah }}</td>
                                                <td class="text-end text-dark fw-bold fs-6">{{ $batas->berbatasan_dengan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <i class="ki-duotone ki-information fs-3x text-muted mb-3">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <div class="text-muted">Data batas wilayah belum diisi</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!--end::Batas Wilayah-->

            <!--begin::Fasilitas Desa-->
            <div class="col-12">
                <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Fasilitas Desa</span>
                            <span class="text-muted fw-semibold fs-7">{{ $fasilitas->count() }} fasilitas terdaftar</span>
                        </h3>
                    </div>
                    <div class="card-body py-3">
                        @if($fasilitas->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover table-rounded table-striped border gy-7 gs-7">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                            <th class="min-w-50px">Foto</th>
                                            <th class="min-w-200px">Nama Fasilitas</th>
                                            <th class="min-w-100px">Kategori</th>
                                            <th class="min-w-150px">Alamat</th>
                                            <th class="min-w-100px">Kondisi</th>
                                            <th class="min-w-100px">Tahun Dibangun</th>
                                            <th class="min-w-100px">Luas Bangunan</th>
                                            <th class="min-w-100px">Kapasitas</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold">
                                        @foreach($fasilitas as $fasilitasItem)
                                            <tr>
                                                <td>
                                                    @if($fasilitasItem->foto)
                                                        <img src="{{ asset('storage/' . $fasilitasItem->foto) }}"
                                                             alt="{{ $fasilitasItem->nama_fasilitas }}"
                                                             class="fasilitas-image">
                                                    @else
                                                        <div class="symbol symbol-60px">
                                                            <div class="symbol-label bg-light-primary">
                                                                <i class="ki-duotone ki-home-2 fs-2 text-primary">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="fw-bold">{{ $fasilitasItem->nama_fasilitas }}</td>
                                                <td>
                                                    <span class="badge badge-light-info">{{ $fasilitasItem->kategori }}</span>
                                                </td>
                                                <td>{{ $fasilitasItem->alamat }}</td>
                                                <td>
                                                    <span class="badge badge-light-{{ $fasilitasItem->kondisi == 'Baik' ? 'success' : ($fasilitasItem->kondisi == 'Rusak' ? 'danger' : 'warning') }}">
                                                        {{ $fasilitasItem->kondisi }}
                                                    </span>
                                                </td>
                                                <td>{{ $fasilitasItem->tahun_dibangun ?? '-' }}</td>
                                                <td>{{ $fasilitasItem->luas_bangunan ? number_format($fasilitasItem->luas_bangunan, 2) . ' m²' : '-' }}</td>
                                                <td>{{ $fasilitasItem->kapasitas ?? '-' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <i class="ki-duotone ki-home-2 fs-3x text-muted mb-3">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <div class="text-muted">Data fasilitas desa belum diisi</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!--end::Fasilitas Desa-->

            <!--begin::Iklim & Potensi-->
            <div class="col-12 col-xl-6 col-xxl-6">
                <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Iklim Desa</span>
                            <span class="text-muted fw-semibold fs-7">Kondisi cuaca dan iklim</span>
                        </h3>
                    </div>
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-muted">Curah Hujan</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $iklim->curah_hujan ? number_format($iklim->curah_hujan, 2) . ' mm/tahun' : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Kelembaban</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $iklim->kelembaban ? $iklim->kelembaban . '%' : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Kecepatan Angin</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $iklim->kecepatan_angin ? $iklim->kecepatan_angin . ' km/jam' : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Arah Angin</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $iklim->arah_angin ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Musim Hujan</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $iklim->musim_hujan ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Musim Kemarau</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $iklim->musim_kemarau ?? '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-6 col-xxl-6">
                <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Peruntukan Lahan</span>
                            <span class="text-muted fw-semibold fs-7">Pembagian penggunaan lahan</span>
                        </h3>
                    </div>
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold text-muted">Perumahan</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $peruntukanLahan->lahan_perumahan ? number_format($peruntukanLahan->lahan_perumahan, 2) . ' ha' : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Pertanian</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $peruntukanLahan->lahan_pertanian ? number_format($peruntukanLahan->lahan_pertanian, 2) . ' ha' : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Perkebunan</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $peruntukanLahan->lahan_perkebunan ? number_format($peruntukanLahan->lahan_perkebunan, 2) . ' ha' : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Hutan</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $peruntukanLahan->lahan_hutan ? number_format($peruntukanLahan->lahan_hutan, 2) . ' ha' : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Tambang</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $peruntukanLahan->lahan_tambang ? number_format($peruntukanLahan->lahan_tambang, 2) . ' ha' : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-muted">Lainnya</td>
                                        <td class="text-end text-dark fw-bold fs-6">{{ $peruntukanLahan->lahan_lainnya ? number_format($peruntukanLahan->lahan_lainnya, 2) . ' ha' : '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Iklim & Potensi-->

            <!--begin::Potensi Desa-->
            <div class="col-12">
                <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Potensi Desa</span>
                            <span class="text-muted fw-semibold fs-7">Kekuatan dan keunggulan desa</span>
                        </h3>
                    </div>
                    <div class="card-body py-3">
                        <div class="row g-6">
                            <div class="col-md-6">
                                <div class="info-card">
                                    <h5 class="fw-bold text-dark mb-3">
                                        <i class="ki-duotone ki-abstract-41 fs-2 text-primary me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Potensi Alam
                                    </h5>
                                    <p class="text-muted">{{ $potensiDesa->potensi_alam ?? 'Belum diisi' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-card">
                                    <h5 class="fw-bold text-dark mb-3">
                                        <i class="ki-duotone ki-chart-simple fs-2 text-success me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                        Potensi Ekonomi
                                    </h5>
                                    <p class="text-muted">{{ $potensiDesa->potensi_ekonomi ?? 'Belum diisi' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-card">
                                    <h5 class="fw-bold text-dark mb-3">
                                        <i class="ki-duotone ki-geolocation fs-2 text-info me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Potensi Wisata
                                    </h5>
                                    <p class="text-muted">{{ $potensiDesa->potensi_wisata ?? 'Belum diisi' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-card">
                                    <h5 class="fw-bold text-dark mb-3">
                                        <i class="ki-duotone ki-people fs-2 text-warning me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                        </i>
                                        Potensi Sosial Budaya
                                    </h5>
                                    <p class="text-muted">{{ $potensiDesa->potensi_sosial ?? 'Belum diisi' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Potensi Desa-->
        </div>
        <!--end::Content Cards-->

        <!--begin::Action Toolbar-->
        <div class="card">
            <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                <div class="d-flex flex-wrap flex-center pb-lg-0">
                    <a href="{{ route('profil-desa.edit') }}" class="btn btn-success me-3 mb-3 btn-lg">
                        <i class="ki-duotone ki-pencil fs-2 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Edit Profil Desa
                    </a>

                    <button class="btn btn-primary me-3 mb-3 btn-lg" onclick="printProfilDesa()">
                        <i class="ki-duotone ki-printer fs-2 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Cetak Profil Desa
                    </button>

                    <button class="btn btn-info me-3 mb-3 btn-lg" onclick="exportProfilDesa()">
                        <i class="ki-duotone ki-file-down fs-2 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Export Data
                    </button>
                </div>
            </div>
        </div>
        <!--end::Action Toolbar-->

    </div>
</div>
<!--end::Content-->
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

// Print profil desa function
function printProfilDesa() {
    Swal.fire({
        title: 'Menyiapkan Profil Desa',
        html: `
            <div class="text-center">
                <div class="spinner-border text-primary mb-3" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mb-2 fw-bold">Sedang memproses profil desa...</p>
                <p class="text-muted small">Mohon tunggu sebentar</p>
            </div>
        `,
        showConfirmButton: false,
        allowOutsideClick: false,
        timer: 2000
    }).then(() => {
        window.print();
    });
}

// Export profil desa function
function exportProfilDesa() {
    Swal.fire({
        title: 'Export Profil Desa',
        text: 'Pilih format file yang diinginkan',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Excel',
        cancelButtonText: 'PDF',
        showDenyButton: true,
        denyButtonText: 'CSV',
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger',
            denyButton: 'btn btn-primary'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/export/profil-desa/excel';
        } else if (result.isDismissed && result.dismiss === Swal.DismissReason.cancel) {
            window.location.href = '/export/profil-desa/pdf';
        } else if (result.isDenied) {
            window.location.href = '/export/profil-desa/csv';
        }
    });
}
</script>
@endpush
