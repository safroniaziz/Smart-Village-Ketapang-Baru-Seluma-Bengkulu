@extends('layouts.app')

@section('title', 'Pengumuman - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center text-white">
                <h1 class="display-4 fw-bold mb-3">Pengumuman</h1>
                <p class="lead">
                    Informasi penting dan pengumuman resmi dari pemerintah desa.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Announcements Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Featured Announcement -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-warning text-dark">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <span class="fw-bold">PENGUMUMAN PENTING</span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h3 class="card-title fw-bold">Jadwal Vaksinasi COVID-19</h3>
                        <p class="text-muted mb-3">
                            <i class="fas fa-calendar me-2"></i>15 Januari 2024
                            <i class="fas fa-clock ms-3 me-2"></i>08:00 - 16:00 WIB
                        </p>
                        <p class="card-text">
                            Diumumkan kepada seluruh warga Desa Ketapang Baru bahwa vaksinasi COVID-19
                            akan dilaksanakan pada hari Senin, 15 Januari 2024 di Balai Desa Ketapang Baru.
                            Vaksinasi ini diperuntukkan bagi warga yang belum mendapatkan vaksinasi
                            booster (dosis ketiga).
                        </p>
                        <h6 class="fw-bold">Persyaratan:</h6>
                        <ul>
                            <li>Membawa KTP dan KK</li>
                            <li>Membawa kartu vaksinasi sebelumnya</li>
                            <li>Dalam kondisi sehat</li>
                            <li>Datang sesuai jadwal yang ditentukan</li>
                        </ul>
                        <h6 class="fw-bold">Jadwal per RT:</h6>
                        <ul>
                            <li>RT 001-005: 08:00 - 10:00 WIB</li>
                            <li>RT 006-010: 10:00 - 12:00 WIB</li>
                            <li>RT 011-015: 13:00 - 15:00 WIB</li>
                            <li>RT 016-020: 15:00 - 16:00 WIB</li>
                        </ul>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Catatan:</strong> Vaksinasi ini gratis dan wajib diikuti oleh seluruh warga.
                        </div>
                    </div>
                </div>

                <!-- Announcements List -->
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-primary me-2">Umum</span>
                                    <small class="text-muted">1 hari yang lalu</small>
                                </div>
                                <h5 class="card-title fw-bold">Pendaftaran Beasiswa Desa</h5>
                                <p class="card-text text-muted">
                                    Pendaftaran beasiswa untuk siswa SMA/SMK yang berprestasi dari keluarga kurang mampu.
                                </p>
                                <p class="card-text">
                                    Program beasiswa ini diperuntukkan bagi siswa kelas X, XI, dan XII
                                    dengan persyaratan nilai rata-rata minimal 8.0 dan berasal dari
                                    keluarga dengan penghasilan di bawah UMR.
                                </p>
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-primary btn-sm">Selengkapnya</a>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Download Form</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-success me-2">Kegiatan</span>
                                    <small class="text-muted">2 hari yang lalu</small>
                                </div>
                                <h5 class="card-title fw-bold">Pelatihan UMKM Desa</h5>
                                <p class="card-text text-muted">
                                    Pelatihan pengembangan UMKM untuk warga desa dalam rangka meningkatkan ekonomi.
                                </p>
                                <p class="card-text">
                                    Pelatihan akan dilaksanakan selama 3 hari dengan materi meliputi
                                    manajemen usaha, pemasaran digital, dan pengembangan produk.
                                    Peserta akan mendapatkan sertifikat dan modal usaha.
                                </p>
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-success btn-sm">Daftar Sekarang</a>
                                    <a href="#" class="btn btn-outline-success btn-sm">Jadwal Lengkap</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-info me-2">Infrastruktur</span>
                                    <small class="text-muted">3 hari yang lalu</small>
                                </div>
                                <h5 class="card-title fw-bold">Pembangunan Jalan Desa</h5>
                                <p class="card-text text-muted">
                                    Pemberitahuan mengenai pembangunan jalan desa yang akan dimulai minggu depan.
                                </p>
                                <p class="card-text">
                                    Pembangunan jalan sepanjang 2 km akan dimulai pada tanggal 20 Januari 2024.
                                    Selama masa pembangunan, warga dimohon untuk menggunakan jalan alternatif
                                    dan berhati-hati saat melintas di area pembangunan.
                                </p>
                                <div class="alert alert-warning">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <strong>Perhatian:</strong> Jalan akan ditutup sementara selama masa pembangunan.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-warning me-2">Kesehatan</span>
                                    <small class="text-muted">4 hari yang lalu</small>
                                </div>
                                <h5 class="card-title fw-bold">Posyandu Lansia</h5>
                                <p class="card-text text-muted">
                                    Jadwal kegiatan Posyandu Lansia bulan Januari 2024.
                                </p>
                                <p class="card-text">
                                    Posyandu Lansia akan dilaksanakan setiap hari Sabtu minggu kedua
                    dan keempat di Balai Desa. Kegiatan meliputi pemeriksaan kesehatan,
                    penyuluhan gizi, dan senam lansia.
                                </p>
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-warning btn-sm">Jadwal Lengkap</a>
                                    <a href="#" class="btn btn-outline-warning btn-sm">Daftar Peserta</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation" class="mt-4">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Search -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Cari Pengumuman</h5>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Kata kunci...">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Categories -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Kategori</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-exclamation-triangle me-2 text-warning"></i>Penting
                                    <span class="badge bg-warning float-end">3</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-bullhorn me-2 text-primary"></i>Umum
                                    <span class="badge bg-primary float-end">8</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-calendar me-2 text-success"></i>Kegiatan
                                    <span class="badge bg-success float-end">5</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-cogs me-2 text-info"></i>Infrastruktur
                                    <span class="badge bg-info float-end">4</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-heartbeat me-2 text-danger"></i>Kesehatan
                                    <span class="badge bg-danger float-end">6</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Recent Announcements -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Pengumuman Terbaru</h5>
                        <div class="mb-3">
                            <h6 class="fw-bold">
                                <a href="#" class="text-decoration-none">Jadwal Vaksinasi COVID-19</a>
                            </h6>
                            <small class="text-muted">2 jam yang lalu</small>
                        </div>
                        <div class="mb-3">
                            <h6 class="fw-bold">
                                <a href="#" class="text-decoration-none">Pendaftaran Beasiswa Desa</a>
                            </h6>
                            <small class="text-muted">1 hari yang lalu</small>
                        </div>
                        <div class="mb-3">
                            <h6 class="fw-bold">
                                <a href="#" class="text-decoration-none">Pelatihan UMKM Desa</a>
                            </h6>
                            <small class="text-muted">2 hari yang lalu</small>
                        </div>
                        <div class="mb-3">
                            <h6 class="fw-bold">
                                <a href="#" class="text-decoration-none">Pembangunan Jalan Desa</a>
                            </h6>
                            <small class="text-muted">3 hari yang lalu</small>
                        </div>
                    </div>
                </div>

                <!-- Important Links -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Link Penting</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-file-pdf me-2 text-danger"></i>Peraturan Desa
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-calendar-alt me-2 text-primary"></i>Kalender Kegiatan
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-phone me-2 text-success"></i>Kontak Darurat
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-download me-2 text-info"></i>Formulir Online
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
