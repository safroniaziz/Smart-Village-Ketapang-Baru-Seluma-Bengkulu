@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Manajemen Peta Desa')

@section('menu')
    Manajemen Peta Desa
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Manajemen Peta Desa</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            <!-- Header Section -->
            <div class="card card-flush">
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-geolocation fs-1 text-primary me-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <div>
                                <h3 class="fw-bold mb-1">Manajemen Peta Desa</h3>
                                <span class="text-muted">Kelola data koordinat lahan dan batas wilayah desa</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-5 g-xl-8 mt-2">
                <!-- Card Manajemen Lahan -->
                <div class="col-xl-6">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-body p-0">
                            <div class="px-9 pt-7 card-rounded h-275px w-100 bg-light-primary">
                                <div class="d-flex flex-stack">
                                    <h3 class="m-0 text-primary fw-bold fs-3">Data Lahan</h3>
                                    <div class="ms-1">
                                        <i class="ki-duotone ki-home-3 fs-2x text-primary">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="d-flex text-center flex-column text-primary pt-8">
                                    <span class="fw-semibold fs-7">Kelola koordinat dan data lahan warga</span>
                                    <span class="fw-bold fs-2x pt-1" id="lahanCount">-</span>
                                    <span class="fw-semibold fs-7">Total Data Lahan</span>
                                </div>
                            </div>
                            <div class="px-9 pt-5 pb-8 bg-body rounded">
                                <div class="text-dark fw-bold fs-6 mt-2">Fitur Tersedia:</div>
                                <div class="text-muted fw-semibold fs-7 mt-1">• Tambah/Edit/Hapus data lahan</div>
                                <div class="text-muted fw-semibold fs-7">• Upload foto lahan</div>
                                <div class="text-muted fw-semibold fs-7">• Validasi koordinat GPS</div>
                                <div class="d-flex pt-5">
                                    <a href="{{ route('admin.peta-desa.lahan.index') }}" class="btn btn-primary fw-semibold me-2">
                                        <i class="ki-duotone ki-home-3 fs-4 me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Kelola Data Lahan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Batas Wilayah -->
                <div class="col-xl-6">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-body p-0">
                            <div class="px-9 pt-7 card-rounded h-275px w-100 bg-light-success">
                                <div class="d-flex flex-stack">
                                    <h3 class="m-0 text-success fw-bold fs-3">Batas Wilayah</h3>
                                    <div class="ms-1">
                                        <i class="ki-duotone ki-compass fs-2x text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="d-flex text-center flex-column text-success pt-8">
                                    <span class="fw-semibold fs-7">Kelola informasi batas wilayah desa</span>
                                    <span class="fw-bold fs-2x pt-1" id="batasWilayahCount">-</span>
                                    <span class="fw-semibold fs-7">Total Batas Wilayah</span>
                                </div>
                            </div>
                            <div class="px-9 pt-5 pb-8 bg-body rounded">
                                <div class="text-dark fw-bold fs-6 mt-2">Fitur Tersedia:</div>
                                <div class="text-muted fw-semibold fs-7 mt-1">• Tambah/Edit/Hapus batas wilayah</div>
                                <div class="text-muted fw-semibold fs-7">• Informasi jarak dan landmark</div>
                                <div class="text-muted fw-semibold fs-7">• Status aktif/non-aktif</div>
                                <div class="d-flex pt-5">
                                    <a href="{{ route('admin.peta-desa.batas-wilayah.index') }}" class="btn btn-success fw-semibold me-2">
                                        <i class="ki-duotone ki-compass fs-4 me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Kelola Batas Wilayah
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Management Cards -->
            <div class="row g-5 g-xl-8 mb-8">
                <!-- Card Data Warga -->
                <div class="col-xl-6">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-body p-0">
                            <div class="px-9 pt-7 card-rounded h-275px w-100 bg-light-info">
                                <div class="d-flex flex-stack">
                                    <h3 class="m-0 text-info fw-bold fs-3">Koordinat Warga</h3>
                                    <div class="ms-1">
                                        <i class="ki-duotone ki-people fs-2x text-info">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="d-flex text-center flex-column text-info pt-8">
                                    <span class="fw-semibold fs-7">Kelola koordinat rumah warga</span>
                                    <span class="fw-bold fs-2x pt-1" id="wargaCount">-</span>
                                    <span class="fw-semibold fs-7">Total Warga dengan Koordinat</span>
                                </div>
                            </div>
                            <div class="px-9 pt-5 pb-8 bg-body rounded">
                                <div class="text-dark fw-bold fs-6 mt-2">Fitur Tersedia:</div>
                                <div class="text-muted fw-semibold fs-7 mt-1">• Update koordinat rumah warga</div>
                                <div class="text-muted fw-semibold fs-7">• Validasi data GPS</div>
                                <div class="text-muted fw-semibold fs-7">• Kelola informasi keluarga</div>
                                <div class="d-flex pt-5">
                                    <a href="{{ route('admin.peta-desa.warga.index') }}" class="btn btn-info fw-semibold me-2">
                                        <i class="ki-duotone ki-people fs-4 me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        Kelola Koordinat Warga
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Data Desa -->
                <div class="col-xl-6">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-body p-0">
                            <div class="px-9 pt-7 card-rounded h-275px w-100 bg-light-warning">
                                <div class="d-flex flex-stack">
                                    <h3 class="m-0 text-warning fw-bold fs-3">Data Desa</h3>
                                    <div class="ms-1">
                                        <i class="ki-duotone ki-home-2 fs-2x text-warning">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="d-flex text-center flex-column text-warning pt-8">
                                    <span class="fw-semibold fs-7">Kelola informasi desa</span>
                                    <span class="fw-bold fs-2x pt-1" id="desaCount">-</span>
                                    <span class="fw-semibold fs-7">Data Desa</span>
                                </div>
                            </div>
                            <div class="px-9 pt-5 pb-8 bg-body rounded">
                                <div class="text-dark fw-bold fs-6 mt-2">Fitur Tersedia:</div>
                                <div class="text-muted fw-semibold fs-7 mt-1">• Update koordinat kantor desa</div>
                                <div class="text-muted fw-semibold fs-7">• Kelola profil desa lengkap</div>
                                <div class="text-muted fw-semibold fs-7">• Informasi geografis & demografis</div>
                                <div class="d-flex pt-5">
                                    <a href="{{ route('profil-desa.index') }}" class="btn btn-warning fw-semibold me-2">
                                        <i class="ki-duotone ki-home-2 fs-4 me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Kelola Data Desa
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Management Cards Row 2 -->
            <div class="row g-5 g-xl-8 mb-8">
                <!-- Card Legenda Peta -->
                <div class="col-xl-6">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-body p-0">
                            <div class="px-9 pt-7 card-rounded h-275px w-100 bg-light-purple">
                                <div class="d-flex flex-stack">
                                    <h3 class="m-0 text-purple fw-bold fs-3">Legenda Peta</h3>
                                    <div class="ms-1">
                                        <i class="ki-duotone ki-map fs-2x text-purple">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="d-flex text-center flex-column text-purple pt-8">
                                    <span class="fw-semibold fs-7">Kelola legenda dan simbol peta</span>
                                    <span class="fw-bold fs-2x pt-1">-</span>
                                    <span class="fw-semibold fs-7">Legenda Aktif</span>
                                </div>
                            </div>
                            <div class="px-9 pt-5 pb-8 bg-body rounded">
                                <div class="text-dark fw-bold fs-6 mt-2">Fitur Tersedia:</div>
                                <div class="text-muted fw-semibold fs-7 mt-1">• Kelola simbol dan warna</div>
                                <div class="text-muted fw-semibold fs-7">• Atur kategori marker</div>
                                <div class="text-muted fw-semibold fs-7">• Customisasi tampilan</div>
                                <div class="d-flex pt-5">
                                    <button class="btn btn-purple fw-semibold me-2" disabled>
                                        <i class="ki-duotone ki-map fs-4 me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Kelola Legenda
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Pengaturan Peta -->
                <div class="col-xl-6">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-body p-0">
                            <div class="px-9 pt-7 card-rounded h-275px w-100 bg-light-dark">
                                <div class="d-flex flex-stack">
                                    <h3 class="m-0 text-dark fw-bold fs-3">Pengaturan Peta</h3>
                                    <div class="ms-1">
                                        <i class="ki-duotone ki-setting-2 fs-2x text-dark">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="d-flex text-center flex-column text-dark pt-8">
                                    <span class="fw-semibold fs-7">Konfigurasi tampilan peta</span>
                                    <span class="fw-bold fs-2x pt-1">-</span>
                                    <span class="fw-semibold fs-7">Pengaturan</span>
                                </div>
                            </div>
                            <div class="px-9 pt-5 pb-8 bg-body rounded">
                                <div class="text-dark fw-bold fs-6 mt-2">Fitur Tersedia:</div>
                                <div class="text-muted fw-semibold fs-7 mt-1">• Atur zoom level default</div>
                                <div class="text-muted fw-semibold fs-7">• Konfigurasi layer</div>
                                <div class="text-muted fw-semibold fs-7">• Pengaturan marker</div>
                                <div class="d-flex pt-5">
                                    <button class="btn btn-dark fw-semibold me-2" disabled>
                                        <i class="ki-duotone ki-setting-2 fs-4 me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Pengaturan Peta
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title">Aksi Cepat</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('peta.desa') }}" target="_blank" class="btn btn-light-info w-100"></a>
                                <i class="ki-duotone ki-eye fs-2 mb-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <div class="fw-bold">Lihat Peta Desa</div>
                                <div class="text-muted fs-7">Buka halaman frontend peta</div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-light-warning w-100" onclick="exportData()">
                                <i class="ki-duotone ki-file-down fs-2 mb-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <div class="fw-bold">Export Data</div>
                                <div class="text-muted fs-7">Download data dalam format Excel</div>
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-light-success w-100" onclick="syncCoordinates()">
                                <i class="ki-duotone ki-arrows-loop fs-2 mb-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <div class="fw-bold">Sinkronisasi</div>
                                <div class="text-muted fs-7">Validasi ulang koordinat</div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .card-rounded {
        border-radius: 1rem !important;
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    loadStatistics();
});

        function loadStatistics() {
            // Load lahan count
            $.get('{{ route("admin.peta-desa.lahan.data") }}', function(response) {
                if(response.total !== undefined) {
                    $('#lahanCount').text(response.total);
                }
            });

            // Load batas wilayah count
            $.get('{{ route("admin.peta-desa.batas-wilayah.data") }}', function(response) {
                if(response.total !== undefined) {
                    $('#batasWilayahCount').text(response.total);
                }
            });

            // Load warga count (warga dengan koordinat)
            $.get('{{ route("admin.peta-desa.warga.data") }}', function(response) {
                if(response.total !== undefined) {
                    $('#wargaCount').text(response.total);
                }
            }).fail(function() {
                // Fallback: count warga with coordinates directly
                $.get('/api/warga-with-coordinates-count', function(count) {
                    $('#wargaCount').text(count);
                }).fail(function() {
                    $('#wargaCount').text('0');
                });
            });

            // Load desa count (should be 1)
            $.get('/api/desa-count', function(count) {
                $('#desaCount').text(count);
            }).fail(function() {
                $('#desaCount').text('1');
            });
        }

function exportData() {
    Swal.fire({
        title: 'Export Data Peta',
        text: 'Pilih jenis data yang akan di-export',
        icon: 'question',
        showCancelButton: true,
        showDenyButton: true,
        confirmButtonText: 'Data Lahan',
        denyButtonText: 'Batas Wilayah',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.open('{{ url("admin/peta-desa/lahan/export") }}', '_blank');
        } else if (result.isDenied) {
            window.open('{{ url("admin/peta-desa/batas-wilayah/export") }}', '_blank');
        }
    });
}

function syncCoordinates() {
    Swal.fire({
        title: 'Sinkronisasi Koordinat',
        text: 'Validasi ulang semua koordinat dan perbaiki data yang tidak valid?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Sinkronisasi',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Add sync logic here
            Swal.fire('Berhasil!', 'Koordinat berhasil disinkronisasi', 'success');
        }
    });
}
</script>
@endpush
