@extends('layouts.app')

@section('title', 'Berita Desa - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center text-white">
                <h1 class="display-4 fw-bold mb-3">Berita Desa</h1>
                <p class="lead">
                    Informasi terbaru seputar kegiatan dan perkembangan Desa Ketapang Baru.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- News Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Featured News -->
                <div class="card border-0 shadow-sm mb-4">
                    <img src="https://via.placeholder.com/800x400/2c5530/ffffff?text=Berita+Utama"
                         class="card-img-top" alt="Berita Utama">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-primary me-2">Berita Utama</span>
                            <small class="text-muted">2 jam yang lalu</small>
                        </div>
                        <h3 class="card-title fw-bold">Pembangunan Jalan Desa Selesai</h3>
                        <p class="card-text text-muted">
                            Pembangunan jalan desa sepanjang 2 km telah selesai dan siap digunakan warga.
                            Jalan ini menghubungkan Dusun Ketapang dengan Dusun Baru dan akan
                            memudahkan akses transportasi warga.
                        </p>
                        <p class="card-text">
                            Pembangunan yang dimulai sejak 3 bulan lalu ini menggunakan dana desa
                            dan swadaya masyarakat. Total anggaran yang dikeluarkan mencapai
                            Rp 500 juta dengan kontribusi dari pemerintah desa sebesar 70% dan
                            swadaya masyarakat 30%.
                        </p>
                        <a href="#" class="btn btn-primary">Baca selengkapnya</a>
                    </div>
                </div>

                <!-- News List -->
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="https://via.placeholder.com/400x250/4a7c59/ffffff?text=Berita+1"
                                 class="card-img-top" alt="Berita">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-success me-2">Kegiatan</span>
                                    <small class="text-muted">1 hari yang lalu</small>
                                </div>
                                <h6 class="card-title fw-bold">Pelatihan UMKM Desa</h6>
                                <p class="card-text text-muted">
                                    Pelatihan UMKM untuk warga desa dalam rangka meningkatkan ekonomi.
                                </p>
                                <a href="#" class="btn btn-link p-0">Baca selengkapnya →</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="https://via.placeholder.com/400x250/8fbc8f/ffffff?text=Berita+2"
                                 class="card-img-top" alt="Berita">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-warning me-2">Pengumuman</span>
                                    <small class="text-muted">2 hari yang lalu</small>
                                </div>
                                <h6 class="card-title fw-bold">Jadwal Vaksinasi COVID-19</h6>
                                <p class="card-text text-muted">
                                    Vaksinasi COVID-19 untuk warga desa akan dilaksanakan minggu depan.
                                </p>
                                <a href="#" class="btn btn-link p-0">Baca selengkapnya →</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="https://via.placeholder.com/400x250/2c5530/ffffff?text=Berita+3"
                                 class="card-img-top" alt="Berita">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-info me-2">Infrastruktur</span>
                                    <small class="text-muted">3 hari yang lalu</small>
                                </div>
                                <h6 class="card-title fw-bold">Pembangunan Posyandu</h6>
                                <p class="card-text text-muted">
                                    Pembangunan posyandu baru di Dusun Ketapang Baru telah dimulai.
                                </p>
                                <a href="#" class="btn btn-link p-0">Baca selengkapnya →</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="https://via.placeholder.com/400x250/4a7c59/ffffff?text=Berita+4"
                                 class="card-img-top" alt="Berita">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-primary me-2">Pendidikan</span>
                                    <small class="text-muted">4 hari yang lalu</small>
                                </div>
                                <h6 class="card-title fw-bold">Beasiswa untuk Siswa Berprestasi</h6>
                                <p class="card-text text-muted">
                                    Program beasiswa untuk siswa berprestasi dari keluarga kurang mampu.
                                </p>
                                <a href="#" class="btn btn-link p-0">Baca selengkapnya →</a>
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
                        <h5 class="fw-bold mb-3">Cari Berita</h5>
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
                                    <i class="fas fa-newspaper me-2 text-primary"></i>Berita Utama
                                    <span class="badge bg-primary float-end">5</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-bullhorn me-2 text-warning"></i>Pengumuman
                                    <span class="badge bg-warning float-end">8</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-calendar me-2 text-success"></i>Kegiatan
                                    <span class="badge bg-success float-end">12</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-cogs me-2 text-info"></i>Infrastruktur
                                    <span class="badge bg-info float-end">6</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-graduation-cap me-2 text-primary"></i>Pendidikan
                                    <span class="badge bg-primary float-end">4</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Recent News -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Berita Terbaru</h5>
                        <div class="mb-3">
                            <h6 class="fw-bold">
                                <a href="#" class="text-decoration-none">Pelatihan UMKM Desa</a>
                            </h6>
                            <small class="text-muted">1 hari yang lalu</small>
                        </div>
                        <div class="mb-3">
                            <h6 class="fw-bold">
                                <a href="#" class="text-decoration-none">Jadwal Vaksinasi COVID-19</a>
                            </h6>
                            <small class="text-muted">2 hari yang lalu</small>
                        </div>
                        <div class="mb-3">
                            <h6 class="fw-bold">
                                <a href="#" class="text-decoration-none">Pembangunan Posyandu</a>
                            </h6>
                            <small class="text-muted">3 hari yang lalu</small>
                        </div>
                        <div class="mb-3">
                            <h6 class="fw-bold">
                                <a href="#" class="text-decoration-none">Beasiswa untuk Siswa Berprestasi</a>
                            </h6>
                            <small class="text-muted">4 hari yang lalu</small>
                        </div>
                    </div>
                </div>

                <!-- Tags -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Tag Populer</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-light text-dark">Pembangunan</span>
                            <span class="badge bg-light text-dark">UMKM</span>
                            <span class="badge bg-light text-dark">Kesehatan</span>
                            <span class="badge bg-light text-dark">Pendidikan</span>
                            <span class="badge bg-light text-dark">Infrastruktur</span>
                            <span class="badge bg-light text-dark">Ekonomi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
