@extends('layouts.dashboard.dashboard')
@section('menu')
    Dashboard Smart Village
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Dashboard</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            <!-- Welcome Section -->
            <div class="row mb-8">
                <div class="col-12">
                    <div class="card card-flush border-0 position-relative overflow-hidden shadow-lg">
                        <!-- Animated Background Pattern -->
                        <div class="position-absolute top-0 end-0 opacity-5">
                            <i class="ki-duotone ki-home fs-20x text-white">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        
                        <div class="card-body position-relative">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <div class="d-flex flex-column">
                                        <h1 class="text-white fw-bold mb-3">
                                            Selamat Datang di Dashboard Smart Village
                                        </h1>
                                        <span class="text-white opacity-75 fs-5 fw-semibold">
                                            Desa Ketapang Baru, Kecamatan Seluma, Bengkulu
                                        </span>
                                        <div class="d-flex align-items-center mt-5">
                                            <div class="d-flex align-items-center me-8">
                                                <div class="symbol symbol-30px me-3">
                                                    <div class="symbol-label bg-light-success">
                                                        <i class="ki-duotone ki-check-circle fs-3 text-success">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </div>
                                                </div>
                                                <div class="text-white">
                                                    <span class="fw-bold fs-6 d-block">Sistem Online</span>
                                                    <span class="opacity-75 fs-7">Real-time Data</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-end">
                                    <div class="d-flex flex-column align-items-end">
                                        <!-- Enhanced System Status -->
                                        <div class="rounded-4 p-4 shadow-lg" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.3);">
                                            <div class="d-flex align-items-center justify-content-end mb-2">
                                                <div class="rounded-circle w-10px h-10px me-2" style="background: linear-gradient(45deg, #00b894, #00cec9); box-shadow: 0 0 10px rgba(0, 184, 148, 0.5);"></div>
                                                <span class="text-white fs-8 fw-bold">SISTEM AKTIF</span>
                                            </div>
                                            <div class="text-white fs-7 fw-medium" style="opacity: 0.9;">Real-time monitoring</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Key Metrics Cards -->
            <div class="row g-5 g-xl-8 mb-8">
                <!-- Total Warga -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Total Warga"
                        value="1,037"
                        icon="ki-duotone ki-profile-user"
                        color="primary"
                        description="Jumlah warga terdaftar"
                    />
                </div>

                <!-- Total Dusun -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Dusun"
                        value="3"
                        icon="ki-duotone ki-home"
                        color="success"
                        description="Dusun 1, 2, dan 3"
                    />
                </div>

                <!-- Luas Wilayah -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Luas Wilayah"
                        value="24,771 Ha"
                        icon="ki-duotone ki-map"
                        color="warning"
                        description="Total luas wilayah desa"
                    />
                </div>

                <!-- Kepala Keluarga -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Kepala Keluarga"
                        value="312"
                        icon="ki-duotone ki-people"
                        color="info"
                        description="Total kepala keluarga"
                    />
                </div>
            </div>

            <!-- Additional Stats Row -->
            <div class="row g-5 g-xl-8 mb-8">
                <!-- Pengaduan -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Pengaduan"
                        value="15"
                        icon="ki-duotone ki-message-text-2"
                        color="danger"
                        description="Pengaduan warga bulan ini"
                    />
                </div>

                <!-- Surat Online -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Surat Online"
                        value="8"
                        icon="ki-duotone ki-document"
                        color="dark"
                        description="Pengajuan surat online"
                    />
                </div>

                <!-- Fasilitas Desa -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Fasilitas"
                        value="12"
                        icon="ki-duotone ki-bank"
                        color="success"
                        description="Fasilitas umum desa"
                    />
                </div>

                <!-- Potensi Desa -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Potensi"
                        value="6"
                        icon="ki-duotone ki-star"
                        color="primary"
                        description="Potensi unggulan desa"
                    />
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row g-5 g-xl-8 mb-8">
                <div class="col-xl-12">
                    <div class="card card-flush border-0 bg-white shadow-sm">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <h3 class="fw-bold text-dark">Aksi Cepat</h3>
                                <span class="text-gray-600 fw-semibold fs-6">Menu administrasi desa yang sering digunakan</span>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row g-4">
                                <!-- Data Warga -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-40px me-4">
                                                <div class="symbol-label bg-light-primary">
                                                    <i class="ki-duotone ki-profile-user fs-2 text-primary">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('data.warga') }}" class="text-gray-800 text-hover-primary fw-bold fs-6">Data Warga</a>
                                                <span class="text-gray-500 fw-semibold fs-7">Kelola data penduduk</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('data.warga') }}" class="btn btn-sm btn-light-primary">Kelola</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pengaduan -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-40px me-4">
                                                <div class="symbol-label bg-light-danger">
                                                    <i class="ki-duotone ki-message-text-2 fs-2 text-danger">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('pengaduan') }}" class="text-gray-800 text-hover-primary fw-bold fs-6">Pengaduan</a>
                                                <span class="text-gray-500 fw-semibold fs-7">Kelola pengaduan warga</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('pengaduan') }}" class="btn btn-sm btn-light-danger">Kelola</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Surat Online -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-40px me-4">
                                                <div class="symbol-label bg-light-warning">
                                                    <i class="ki-duotone ki-document fs-2 text-warning">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('surat.online') }}" class="text-gray-800 text-hover-primary fw-bold fs-6">Surat Online</a>
                                                <span class="text-gray-500 fw-semibold fs-7">Kelola pengajuan surat</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('surat.online') }}" class="btn btn-sm btn-light-warning">Kelola</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Profil Desa -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-40px me-4">
                                                <div class="symbol-label bg-light-success">
                                                    <i class="ki-duotone ki-home fs-2 text-success">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('tentang') }}" class="text-gray-800 text-hover-primary fw-bold fs-6">Profil Desa</a>
                                                <span class="text-gray-500 fw-semibold fs-7">Kelola profil desa</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('tentang') }}" class="btn btn-sm btn-light-success">Kelola</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Statistik -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-40px me-4">
                                                <div class="symbol-label bg-light-info">
                                                    <i class="ki-duotone ki-chart-pie-4 fs-2 text-info">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('statistik') }}" class="text-gray-800 text-hover-primary fw-bold fs-6">Statistik</a>
                                                <span class="text-gray-500 fw-semibold fs-7">Data statistik desa</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('statistik') }}" class="btn btn-sm btn-light-info">Lihat</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Peta Desa -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-40px me-4">
                                                <div class="symbol-label bg-light-dark">
                                                    <i class="ki-duotone ki-geolocation fs-2 text-dark">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('peta.desa') }}" class="text-gray-800 text-hover-primary fw-bold fs-6">Peta Desa</a>
                                                <span class="text-gray-500 fw-semibold fs-7">Pemetaan wilayah desa</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('peta.desa') }}" class="btn btn-sm btn-light-dark">Lihat</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Struktur Organisasi -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-40px me-4">
                                                <div class="symbol-label bg-light-secondary">
                                                    <i class="ki-duotone ki-abstract-39 fs-2 text-secondary">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('struktur') }}" class="text-gray-800 text-hover-primary fw-bold fs-6">Struktur</a>
                                                <span class="text-gray-500 fw-semibold fs-7">Struktur organisasi desa</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('struktur') }}" class="btn btn-sm btn-light-secondary">Lihat</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Berita -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-40px me-4">
                                                <div class="symbol-label bg-light-primary">
                                                    <i class="ki-duotone ki-note fs-2 text-primary">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('berita') }}" class="text-gray-800 text-hover-primary fw-bold fs-6">Berita</a>
                                                <span class="text-gray-500 fw-semibold fs-7">Kelola berita desa</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('berita') }}" class="btn btn-sm btn-light-primary">Kelola</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="row g-5 g-xl-8">
                <div class="col-xl-6">
                    <div class="card card-flush border-0 bg-white shadow-sm h-xl-100">
                        <div class="card-header pt-5">
                            <h3 class="card-title fw-bold text-dark">Aktivitas Terbaru</h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="timeline">
                                <!-- Timeline Item -->
                                <div class="timeline-item">
                                    <div class="timeline-line w-40px"></div>
                                    <div class="timeline-icon symbol symbol-circle symbol-40px">
                                        <div class="symbol-label bg-light-primary">
                                            <i class="ki-duotone ki-document fs-2 text-primary">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                    </div>
                                    <div class="timeline-content mb-10 mt-n1">
                                        <div class="pe-3 mb-5">
                                            <div class="fs-5 fw-semibold mb-2">Pengajuan Surat Keterangan</div>
                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                <div class="text-muted me-2 fs-7">Hari ini pukul 09:30</div>
                                                <span class="badge badge-light-primary">Baru</span>
                                            </div>
                                        </div>
                                        <div class="overflow-auto pb-5">
                                            <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-5">
                                                <span class="fs-7 text-gray-700">Ahmad Fauzi mengajukan surat keterangan domisili</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Timeline Item -->
                                <div class="timeline-item">
                                    <div class="timeline-line w-40px"></div>
                                    <div class="timeline-icon symbol symbol-circle symbol-40px">
                                        <div class="symbol-label bg-light-success">
                                            <i class="ki-duotone ki-message-text-2 fs-2 text-success">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </div>
                                    </div>
                                    <div class="timeline-content mb-10 mt-n1">
                                        <div class="pe-3 mb-5">
                                            <div class="fs-5 fw-semibold mb-2">Pengaduan Diselesaikan</div>
                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                <div class="text-muted me-2 fs-7">2 jam yang lalu</div>
                                                <span class="badge badge-light-success">Selesai</span>
                                            </div>
                                        </div>
                                        <div class="overflow-auto pb-5">
                                            <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-5">
                                                <span class="fs-7 text-gray-700">Pengaduan jalan rusak telah diselesaikan</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Timeline Item -->
                                <div class="timeline-item">
                                    <div class="timeline-line w-40px"></div>
                                    <div class="timeline-icon symbol symbol-circle symbol-40px">
                                        <div class="symbol-label bg-light-warning">
                                            <i class="ki-duotone ki-profile-user fs-2 text-warning">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                    </div>
                                    <div class="timeline-content mb-10 mt-n1">
                                        <div class="pe-3 mb-5">
                                            <div class="fs-5 fw-semibold mb-2">Data Warga Baru</div>
                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                <div class="text-muted me-2 fs-7">Kemarin</div>
                                                <span class="badge badge-light-warning">Update</span>
                                            </div>
                                        </div>
                                        <div class="overflow-auto pb-5">
                                            <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-5">
                                                <span class="fs-7 text-gray-700">3 warga baru telah ditambahkan ke sistem</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card card-flush border-0 bg-white shadow-sm h-xl-100">
                        <div class="card-header pt-5">
                            <h3 class="card-title fw-bold text-dark">Statistik Bulan Ini</h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-column">
                                <!-- Stat Item -->
                                <div class="d-flex flex-stack mb-5">
                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Pengaduan Masuk</div>
                                    <div class="d-flex align-items-center">
                                        <span class="text-gray-900 fw-bolder fs-6">15</span>
                                        <span class="text-success fs-7 fw-bold ms-2">+5%</span>
                                    </div>
                                </div>

                                <!-- Stat Item -->
                                <div class="d-flex flex-stack mb-5">
                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Pengaduan Selesai</div>
                                    <div class="d-flex align-items-center">
                                        <span class="text-gray-900 fw-bolder fs-6">12</span>
                                        <span class="text-success fs-7 fw-bold ms-2">+20%</span>
                                    </div>
                                </div>

                                <!-- Stat Item -->
                                <div class="d-flex flex-stack mb-5">
                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Surat Diterbitkan</div>
                                    <div class="d-flex align-items-center">
                                        <span class="text-gray-900 fw-bolder fs-6">8</span>
                                        <span class="text-danger fs-7 fw-bold ms-2">-2%</span>
                                    </div>
                                </div>

                                <!-- Stat Item -->
                                <div class="d-flex flex-stack mb-5">
                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Kunjungan Website</div>
                                    <div class="d-flex align-items-center">
                                        <span class="text-gray-900 fw-bolder fs-6">1,247</span>
                                        <span class="text-success fs-7 fw-bold ms-2">+15%</span>
                                    </div>
                                </div>

                                <!-- Progress Bar -->
                                <div class="separator separator-dashed my-5"></div>
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="text-gray-700 fw-semibold fs-6">Tingkat Kepuasan</span>
                                        <span class="text-gray-900 fw-bolder fs-6">92%</span>
                                    </div>
                                    <div class="progress h-6px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 92%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
