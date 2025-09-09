@extends('layouts.app')

@section('title', 'Beranda - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="display-4 fw-bold mb-4">
                    Selamat Datang di<br>
                    <span class="text-warning">Smart Village Ketapang Baru</span>
                </h1>
                <p class="lead mb-4">
                    Membangun desa yang maju, mandiri, dan sejahtera melalui teknologi digital.
                    Layanan administrasi desa yang cepat, mudah, dan transparan.
                </p>
                <div class="d-flex gap-3">
                    <a href="{{ route('surat.online') }}" class="btn btn-warning btn-lg">
                        <i class="fas fa-envelope me-2"></i>Surat Online
                    </a>
                    <a href="{{ route('peta.desa') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-map me-2"></i>Peta Desa
                    </a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="text-center">
                    <img src="https://via.placeholder.com/600x400/2c5530/ffffff?text=Smart+Village"
                         alt="Smart Village" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistik Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 bg-white shadow-sm h-100">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x text-primary mb-3"></i>
                        <h3 class="fw-bold text-primary">2,500+</h3>
                        <p class="text-muted">Jumlah Warga</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 bg-white shadow-sm h-100">
                    <div class="card-body">
                        <i class="fas fa-home fa-3x text-success mb-3"></i>
                        <h3 class="fw-bold text-success">500+</h3>
                        <p class="text-muted">Kartu Keluarga</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 bg-white shadow-sm h-100">
                    <div class="card-body">
                        <i class="fas fa-envelope fa-3x text-warning mb-3"></i>
                        <h3 class="fw-bold text-warning">1,200+</h3>
                        <p class="text-muted">Surat Diproses</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="card border-0 bg-white shadow-sm h-100">
                    <div class="card-body">
                        <i class="fas fa-map-marker-alt fa-3x text-info mb-3"></i>
                        <h3 class="fw-bold text-info">8</h3>
                        <p class="text-muted">Dusun</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Layanan Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">Layanan Unggulan</h2>
                <p class="lead text-muted">
                    Kami menyediakan berbagai layanan digital untuk memudahkan warga dalam mengurus administrasi desa.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card service-card h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-envelope fa-2x text-primary"></i>
                        </div>
                        <h5 class="card-title fw-bold">Surat Online</h5>
                        <p class="card-text text-muted">
                            Ajukan surat secara online tanpa perlu antri. Proses cepat dan transparan.
                        </p>
                        <a href="{{ route('surat.online') }}" class="btn btn-outline-primary">
                            Ajukan Surat
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card service-card h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-users fa-2x text-success"></i>
                        </div>
                        <h5 class="card-title fw-bold">Data Warga</h5>
                        <p class="card-text text-muted">
                            Akses data warga yang terintegrasi dan terupdate secara real-time.
                        </p>
                        <a href="{{ route('data.warga') }}" class="btn btn-outline-success">
                            Lihat Data
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card service-card h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-map fa-2x text-warning"></i>
                        </div>
                        <h5 class="card-title fw-bold">Peta Desa</h5>
                        <p class="card-text text-muted">
                            Eksplorasi peta desa interaktif dengan informasi detail setiap wilayah.
                        </p>
                        <a href="{{ route('peta.desa') }}" class="btn btn-outline-warning">
                            Lihat Peta
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Berita Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">Berita & Pengumuman</h2>
                <p class="lead text-muted">
                    Dapatkan informasi terbaru seputar kegiatan dan pengumuman desa.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://via.placeholder.com/400x250/2c5530/ffffff?text=Berita+1"
                         class="card-img-top" alt="Berita">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-primary me-2">Berita</span>
                            <small class="text-muted">2 jam yang lalu</small>
                        </div>
                        <h6 class="card-title fw-bold">Pembangunan Jalan Desa Selesai</h6>
                        <p class="card-text text-muted">
                            Pembangunan jalan desa sepanjang 2 km telah selesai dan siap digunakan warga.
                        </p>
                        <a href="#" class="btn btn-link p-0">Baca selengkapnya →</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://via.placeholder.com/400x250/4a7c59/ffffff?text=Berita+2"
                         class="card-img-top" alt="Berita">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-warning me-2">Pengumuman</span>
                            <small class="text-muted">1 hari yang lalu</small>
                        </div>
                        <h6 class="card-title fw-bold">Jadwal Vaksinasi COVID-19</h6>
                        <p class="card-text text-muted">
                            Vaksinasi COVID-19 untuk warga desa akan dilaksanakan minggu depan.
                        </p>
                        <a href="#" class="btn btn-link p-0">Baca selengkapnya →</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://via.placeholder.com/400x250/8fbc8f/ffffff?text=Berita+3"
                         class="card-img-top" alt="Berita">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-success me-2">Kegiatan</span>
                            <small class="text-muted">3 hari yang lalu</small>
                        </div>
                        <h6 class="card-title fw-bold">Pelatihan UMKM Desa</h6>
                        <p class="card-text text-muted">
                            Pelatihan UMKM untuk warga desa dalam rangka meningkatkan ekonomi.
                        </p>
                        <a href="#" class="btn btn-link p-0">Baca selengkapnya →</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4" data-aos="fade-up">
            <a href="{{ route('berita') }}" class="btn btn-primary btn-lg">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center text-white" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">Butuh Bantuan?</h2>
                <p class="lead mb-4">
                    Tim kami siap membantu Anda dalam mengurus administrasi desa.
                    Hubungi kami atau kunjungi kantor desa.
                </p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="{{ route('kontak') }}" class="btn btn-warning btn-lg">
                        <i class="fas fa-phone me-2"></i>Hubungi Kami
                    </a>
                    <a href="{{ route('pengaduan') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-comment me-2"></i>Pengaduan
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Animate numbers on scroll
    $('.fw-bold').each(function() {
        const $this = $(this);
        const countTo = $this.text().replace(/[^\d]/g, '');

        if (countTo) {
            $({ countNum: 0 }).animate({
                countNum: countTo
            }, {
                duration: 2000,
                easing: 'swing',
                step: function() {
                    $this.text(Math.floor(this.countNum).toLocaleString());
                },
                complete: function() {
                    $this.text(countTo.toLocaleString());
                }
            });
        }
    });
});
</script>
@endpush
