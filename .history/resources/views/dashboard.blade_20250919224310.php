@extends('layouts.dashboard.dashboard')
@section('menu')
    Dashboard Analytics
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
                            <i class="ki-duotone ki-shield-tick fs-20x text-white">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>

                        <!-- Modern Gradient Background -->
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #4facfe 100%); opacity: 0.9;"></div>

                        <!-- Glass Effect Overlay -->
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px);"></div>

                        <div class="card-body p-8 position-relative">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <!-- Main Title with Modern Design -->
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="bg-white bg-opacity-25 rounded-circle p-4 me-4 shadow-lg" style="backdrop-filter: blur(10px);">
                                            <i class="ki-duotone ki-shield-tick fs-2x text-white">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                        <div>
                                            <h1 class="text-white fw-bold fs-2hx mb-2" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">Selamat Datang di Smart Village</h1>
                                            <div class="d-flex align-items-center">
                                                <span class="badge fs-8 fw-bold me-2 px-3 py-2" style="background: linear-gradient(45deg, #ff6b6b, #ee5a24); color: white; border: none;">v1.0</span>
                                                <span class="text-white fs-7 fw-semibold" style="text-shadow: 0 1px 2px rgba(0,0,0,0.2);">Desa Ketapang Baru</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Subtitle with Enhanced Styling -->
                                    <h2 class="text-white fs-4 fw-semibold mb-4" style="text-shadow: 0 1px 3px rgba(0,0,0,0.3);">Sistem Informasi Desa Ketapang Baru, Kecamatan Seluma</h2>

                                    <!-- Description with Better Typography -->
                                    <p class="text-white fs-6 mb-5 lh-base fw-medium" style="text-shadow: 0 1px 2px rgba(0,0,0,0.2); opacity: 0.95;">
                                        Dashboard Monitoring & Analytics untuk pengelolaan data kependudukan, layanan administrasi, 
                                        pengaduan masyarakat, dan sistem informasi desa yang terintegrasi dalam upaya meningkatkan 
                                        pelayanan publik dan transparansi pemerintahan desa.
                                    </p>

                                    <!-- Enhanced Quick Stats -->
                                    <div class="row g-4">
                                        <div class="col-auto">
                                            <div class="rounded-4 px-4 py-3 shadow-lg" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.3);">
                                                <div class="text-white fs-8 fw-bold mb-1" style="opacity: 0.9;">PERIODE</div>
                                                <div class="text-white fs-5 fw-bold">2024/2025</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="rounded-4 px-4 py-3 shadow-lg" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.3);">
                                                <div class="text-white fs-8 fw-bold mb-1" style="opacity: 0.9;">PETUGAS</div>
                                                <div class="text-white fs-5 fw-bold">5</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="rounded-4 px-4 py-3 shadow-lg" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.3);">
                                                <div class="text-white fs-8 fw-bold mb-1" style="opacity: 0.9;">WARGA</div>
                                                <div class="text-white fs-5 fw-bold">1037</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="text-end">
                                        <!-- Enhanced Date and Time -->
                                        <div class="rounded-4 p-5 mb-4 shadow-lg" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.3);">
                                            <div class="text-white fs-8 fw-bold mb-2" style="opacity: 0.9;">TANGGAL & WAKTU</div>
                                            <div class="text-white fs-1 fw-bold mb-2" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">{{ now()->format('d') }}</div>
                                            <div class="text-white fs-5 fw-semibold mb-2" style="text-shadow: 0 1px 2px rgba(0,0,0,0.2);">{{ now()->translatedFormat('F Y') }}</div>
                                            <div class="text-white fs-7 fw-medium" style="opacity: 0.9;">{{ now()->translatedFormat('l, H:i') }}</div>
                                        </div>

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
                <!-- Total Users -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Total Pengguna"
                        value="1042"
                        icon="ki-duotone ki-profile-user"
                        color="primary"
                        percentage="85"
                        description="Pengguna terdaftar dalam sistem"
                    />
                </div>

                <!-- Total Unit Kerja -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Unit Kerja"
                        value="3"
                        icon="ki-duotone ki-bank"
                        color="success"
                        percentage="85"
                        description="Fakultas, Prodi & Unit Kerja"
                    />
                </div>

                <!-- Total Indikator -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Indikator"
                        value="15"
                        icon="ki-duotone ki-chart-line"
                        color="warning"
                        percentage="92"
                        description="Indikator kinerja & instrumen"
                    />
                </div>

                <!-- Total Pengajuan -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Pengajuan AMI"
                        value="25"
                        icon="ki-duotone ki-document"
                        color="info"
                        percentage="78"
                        description="Pengajuan audit mutu internal"
                    />
                </div>
            </div>

            <!-- Additional Stats Row -->
            <div class="row g-5 g-xl-8 mb-8">
                <!-- Total Kriteria -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Kriteria"
                        value="8"
                        icon="ki-duotone ki-star"
                        color="danger"
                        percentage="92"
                        description="Kriteria penilaian indikator"
                    />
                </div>

                <!-- Total Instrumen -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Instrumen"
                        value="12"
                        icon="ki-duotone ki-clipboard"
                        color="dark"
                        percentage="78"
                        description="Instrumen penilaian prodi"
                    />
                </div>

                <!-- Total Evaluasi -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Evaluasi"
                        value="18"
                        icon="ki-duotone ki-shield-tick"
                        color="success"
                        percentage="65"
                        description="Evaluasi audit yang dilakukan"
                    />
                </div>

                <!-- Total Kuisioner -->
                <div class="col-xl-3 col-md-6">
                    <x-dashboard-stats-card
                        title="Kuisioner"
                        value="6"
                        icon="ki-duotone ki-message-text-2"
                        color="primary"
                        percentage="89"
                        description="Kuisioner & respons"
                    />
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row g-5 g-xl-8 mb-8">
                <!-- Unit Kerja Distribution Chart -->
                <div class="col-xl-8">
                    <div class="card card-flush border-0 bg-white shadow-sm">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <h3 class="fw-bold text-dark">Distribusi Indikator per Unit Kerja</h3>
                                <span class="text-gray-600 fw-semibold fs-6">Top 8 unit kerja dengan indikator terbanyak</span>
                            </div>
                            <div class="card-toolbar">
                                <button type="button" class="btn btn-sm btn-light-primary" data-bs-toggle="dropdown">
                                    <i class="ki-duotone ki-gear fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <canvas id="unitKerjaChart" style="height: 350px;"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Status Pengajuan AMI Chart -->
                <div class="col-xl-4">
                    <div class="card card-flush border-0 bg-white shadow-sm h-100">
                        <div class="card-header pt-5">
                            <h3 class="card-title fw-bold text-dark">Status Pengajuan AMI</h3>
                        </div>
                        <div class="card-body pt-0">
                            <canvas id="pengajuanStatusChart" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Charts Row -->
            <div class="row g-5 g-xl-8 mb-8">
                <!-- Performance Metrics -->
                <div class="col-xl-6">
                    <div class="card card-flush border-0 bg-white shadow-sm">
                        <div class="card-header pt-5">
                            <h3 class="card-title fw-bold text-dark">Indikator Kinerja</h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-column gap-4">
                                <!-- Completion Rate -->
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label bg-light-primary">
                                            <i class="ki-duotone ki-check-circle fs-2x text-primary">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span class="fw-semibold text-gray-800">Tingkat Penyelesaian</span>
                                            <span class="fw-bold text-primary">92%</span>
                                        </div>
                                        <div class="text-gray-600 fs-8 mb-2">Indikator dengan instrumen lengkap</div>
                                        <div class="progress h-6px w-100">
                                            <div class="progress-bar bg-primary" style="width: 92%"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Response Rate -->
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label bg-light-success">
                                            <i class="ki-duotone ki-message-text-2 fs-2x text-success">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span class="fw-semibold text-gray-800">Tingkat Respons</span>
                                            <span class="fw-bold text-success">89%</span>
                                        </div>
                                        <div class="text-gray-600 fs-8 mb-2">Jawaban kuisioner yang diterima</div>
                                        <div class="progress h-6px w-100">
                                            <div class="progress-bar bg-success" style="width: 89%"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Audit Completion -->
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label bg-light-warning">
                                            <i class="ki-duotone ki-shield-tick fs-2x text-warning">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span class="fw-semibold text-gray-800">Penyelesaian Audit</span>
                                            <span class="fw-bold text-warning">78%</span>
                                        </div>
                                        <div class="text-gray-600 fs-8 mb-2">Audit yang sudah selesai</div>
                                        <div class="progress h-6px w-100">
                                            <div class="progress-bar bg-warning" style="width: 78%"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- User Activity -->
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label bg-light-info">
                                            <i class="ki-duotone ki-profile-user fs-2x text-info">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span class="fw-semibold text-gray-800">Aktivitas Pengguna</span>
                                            <span class="fw-bold text-info">85%</span>
                                        </div>
                                        <div class="text-gray-600 fs-8 mb-2">Auditor & Auditee login dalam 7 hari terakhir</div>
                                        <div class="progress h-6px w-100">
                                            <div class="progress-bar bg-info" style="width: 85%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jenis Unit Kerja Chart -->
                <div class="col-xl-6">
                    <div class="card card-flush border-0 bg-white shadow-sm">
                        <div class="card-header pt-5">
                            <h3 class="card-title fw-bold text-dark">Distribusi Jenis Unit Kerja</h3>
                        </div>
                        <div class="card-body pt-0">
                            <canvas id="jenisUnitKerjaChart" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Row -->
            <div class="row g-5 g-xl-8">
                <!-- Recent Activities -->
                <div class="col-xl-6">
                    <div class="card card-flush border-0 bg-white shadow-sm">
                        <div class="card-header pt-5">
                            <h3 class="card-title fw-bold text-dark">Recent Activities</h3>
                            <div class="card-toolbar">
                                <button type="button" class="btn btn-sm btn-light-primary">View All</button>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="timeline">
                                <!-- Static Recent Activities -->
                                <div class="timeline-item">
                                    <div class="timeline-badge bg-light-primary">
                                        <i class="ki-duotone ki-profile-user fs-2 text-primary">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="fw-bold text-gray-800">Pendaftaran User Baru</div>
                                        <div class="text-gray-600 fs-7">15 warga baru telah mendaftar di sistem</div>
                                        <div class="text-gray-500 fs-8 mt-1">2 jam yang lalu</div>
                                    </div>
                                </div>
                                
                                <div class="timeline-item">
                                    <div class="timeline-badge bg-light-success">
                                        <i class="ki-duotone ki-document fs-2 text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="fw-bold text-gray-800">Pengajuan Surat Selesai</div>
                                        <div class="text-gray-600 fs-7">Surat keterangan domisili telah diproses</div>
                                        <div class="text-gray-500 fs-8 mt-1">4 jam yang lalu</div>
                                    </div>
                                </div>
                                
                                <div class="timeline-item">
                                    <div class="timeline-badge bg-light-warning">
                                        <i class="ki-duotone ki-message-text-2 fs-2 text-warning">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="fw-bold text-gray-800">Pengaduan Baru</div>
                                        <div class="text-gray-600 fs-7">Pengaduan terkait infrastruktur jalan</div>
                                        <div class="text-gray-500 fs-8 mt-1">6 jam yang lalu</div>
                                    </div>
                                </div>
                                
                                <div class="timeline-item">
                                    <div class="timeline-badge bg-light-info">
                                        <i class="ki-duotone ki-home fs-2 text-info">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="fw-bold text-gray-800">Update Data Desa</div>
                                        <div class="text-gray-600 fs-7">Profil desa telah diperbarui</div>
                                        <div class="text-gray-500 fs-8 mt-1">1 hari yang lalu</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Performers -->
                <div class="col-xl-6">
                    <div class="card card-flush border-0 bg-white shadow-sm">
                        <div class="card-header pt-5">
                            <h3 class="card-title fw-bold text-dark">Top Performers</h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-column gap-4">
                                <!-- Top Dusun -->
                                <div>
                                    <h6 class="fw-bold text-gray-800 mb-3">Top Dusun</h6>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="symbol symbol-35px me-3">
                                            <div class="symbol-label bg-light-primary">
                                                <i class="ki-duotone ki-home fs-2 text-primary">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-gray-800">Dusun Ketapang Baru I</div>
                                            <div class="text-gray-600 fs-7">425 warga • RT 1-3</div>
                                        </div>
                                        <span class="badge badge-light-primary fs-8 fw-bold">1</span>
                                    </div>
                                    
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="symbol symbol-35px me-3">
                                            <div class="symbol-label bg-light-success">
                                                <i class="ki-duotone ki-home fs-2 text-success">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-gray-800">Dusun Ketapang Baru II</div>
                                            <div class="text-gray-600 fs-7">387 warga • RT 4-6</div>
                                        </div>
                                        <span class="badge badge-light-success fs-8 fw-bold">2</span>
                                    </div>
                                    
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="symbol symbol-35px me-3">
                                            <div class="symbol-label bg-light-warning">
                                                <i class="ki-duotone ki-home fs-2 text-warning">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-gray-800">Dusun Ketapang Baru III</div>
                                            <div class="text-gray-600 fs-7">225 warga • RT 7-8</div>
                                        </div>
                                        <span class="badge badge-light-warning fs-8 fw-bold">3</span>
                                    </div>
                                </div>

                                <!-- Service Progress -->
                                <div>
                                    <h6 class="fw-bold text-gray-800 mb-3">Progress Layanan</h6>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="symbol symbol-35px me-3">
                                            <div class="symbol-label bg-light-success">
                                                <i class="ki-duotone ki-document fs-2 text-success">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-gray-800">Surat Online</div>
                                            <div class="text-gray-600 fs-7">18/25 pengajuan selesai • Aktif</div>
                                        </div>
                                        <span class="badge badge-light-success fs-8 fw-bold">72%</span>
                                    </div>

                                    <div class="d-flex align-items-center mb-3">
                                        <div class="symbol symbol-35px me-3">
                                            <div class="symbol-label bg-light-warning">
                                                <i class="ki-duotone ki-message-text-2 fs-2 text-warning">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-gray-800">Pengaduan</div>
                                            <div class="text-gray-600 fs-7">12/18 pengaduan ditangani • Proses</div>
                                        </div>
                                        <span class="badge badge-light-warning fs-8 fw-bold">67%</span>
                                    </div>

                                    <!-- Participation Rate -->
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="symbol symbol-35px me-3">
                                            <div class="symbol-label bg-light-info">
                                                <i class="ki-duotone ki-profile-user fs-2 text-info">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold text-gray-800">Partisipasi Warga</div>
                                            <div class="text-gray-600 fs-7">1037/1200 warga aktif menggunakan sistem</div>
                                        </div>
                                        <span class="badge badge-light-info fs-8 fw-bold">86%</span>
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

@push('styles')
<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e1e3ea;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-badge {
    position: absolute;
    left: -22px;
    top: 0;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1;
}

.timeline-content {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    margin-left: 10px;
}

.progress {
    background-color: #e1e3ea;
    border-radius: 10px;
}

.progress-bar {
    border-radius: 10px;
    transition: width 0.6s ease;
}

.symbol-label {
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
}

.card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1) !important;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #3699FF 0%, #1BC5BD 100%);
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Unit Kerja Distribution Chart - Static Data
    const unitKerjaCtx = document.getElementById('unitKerjaChart').getContext('2d');
    
    // Static data for smart village
    const chartLabels = ['Dusun I', 'Dusun II', 'Dusun III', 'RT/RW', 'Kantor Desa'];
    const chartData = [425, 387, 225, 8, 2];

    new Chart(unitKerjaCtx, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Jumlah Warga',
                data: chartData,
                backgroundColor: [
                    'rgba(54, 153, 255, 0.8)',
                    'rgba(28, 197, 189, 0.8)',
                    'rgba(255, 193, 7, 0.8)',
                    'rgba(220, 53, 69, 0.8)',
                    'rgba(108, 117, 125, 0.8)'
                ],
                borderColor: [
                    'rgba(54, 153, 255, 1)',
                    'rgba(28, 197, 189, 1)',
                    'rgba(255, 193, 7, 1)',
                    'rgba(220, 53, 69, 1)',
                    'rgba(108, 117, 125, 1)'
                ],
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    },
                    ticks: {
                        color: '#6c757d',
                        stepSize: 50
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#6c757d',
                        maxRotation: 45,
                        minRotation: 45
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index'
            }
        }
    });

    // Status Pengajuan AMI Chart - Static Data
    const pengajuanCtx = document.getElementById('pengajuanStatusChart').getContext('2d');
    
    const pengajuanLabels = ['Belum Diproses', 'Selesai', 'Dalam Proses'];
    const pengajuanValues = [7, 18, 5];

    new Chart(pengajuanCtx, {
        type: 'doughnut',
        data: {
            labels: pengajuanLabels,
            datasets: [{
                data: pengajuanValues,
                backgroundColor: [
                    'rgba(255, 193, 7, 0.8)',    // Kuning - Belum Diproses
                    'rgba(40, 167, 69, 0.8)',    // Hijau - Selesai
                    'rgba(54, 153, 255, 0.8)'    // Biru - Dalam Proses
                ],
                borderColor: [
                    'rgba(255, 193, 7, 1)',
                    'rgba(40, 167, 69, 1)',
                    'rgba(54, 153, 255, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true,
                        font: {
                            size: 12
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.parsed;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                            return `${label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });

    // Jenis Unit Kerja Chart - Static Data
    const jenisUnitCtx = document.getElementById('jenisUnitKerjaChart').getContext('2d');
    
    const jenisUnitLabels = ['Dusun', 'RT/RW', 'Kantor Desa'];
    const jenisUnitValues = [3, 8, 1];

    new Chart(jenisUnitCtx, {
        type: 'pie',
        data: {
            labels: jenisUnitLabels,
            datasets: [{
                data: jenisUnitValues,
                backgroundColor: [
                    'rgba(54, 153, 255, 0.8)',
                    'rgba(28, 197, 189, 0.8)',
                    'rgba(255, 193, 7, 0.8)'
                ],
                borderColor: [
                    'rgba(54, 153, 255, 1)',
                    'rgba(28, 197, 189, 1)',
                    'rgba(255, 193, 7, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true
                    }
                }
            }
        }
    });

    // Animate progress bars
    const progressBars = document.querySelectorAll('.progress-bar');
    progressBars.forEach(bar => {
        const width = bar.style.width;
        bar.style.width = '0%';
        setTimeout(() => {
            bar.style.width = width;
        }, 500);
    });

    // Add hover effects to cards
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>
@endpush
