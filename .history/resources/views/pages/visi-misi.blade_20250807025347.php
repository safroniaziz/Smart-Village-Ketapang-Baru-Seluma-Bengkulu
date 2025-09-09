@extends('layouts.app')

@section('title', 'Visi & Misi - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center text-white">
                <h1 class="display-4 fw-bold mb-3">Visi & Misi</h1>
                <p class="lead">
                    Arah dan tujuan pembangunan Desa Ketapang Baru menuju masa depan yang lebih baik.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Vision Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5 text-center">
                        <div class="mb-4">
                            <i class="fas fa-eye fa-4x text-primary"></i>
                        </div>
                        <h2 class="fw-bold text-primary mb-4">Visi Desa</h2>
                        <p class="lead">
                            "Terwujudnya Desa Ketapang Baru yang maju, mandiri, dan sejahtera
                            melalui pengembangan teknologi digital dan pemberdayaan masyarakat
                            menuju desa yang berkelanjutan."
                        </p>
                        <div class="row mt-5">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <i class="fas fa-rocket fa-2x text-success mb-3"></i>
                                    <h5 class="fw-bold">Maju</h5>
                                    <p class="text-muted">Mengikuti perkembangan zaman</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <i class="fas fa-handshake fa-2x text-warning mb-3"></i>
                                    <h5 class="fw-bold">Mandiri</h5>
                                    <p class="text-muted">Tidak bergantung pada pihak lain</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <i class="fas fa-heart fa-2x text-danger mb-3"></i>
                                    <h5 class="fw-bold">Sejahtera</h5>
                                    <p class="text-muted">Kesejahteraan masyarakat meningkat</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Misi Desa</h2>
                    <p class="lead text-muted">Langkah-langkah strategis untuk mencapai visi</p>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                                        <i class="fas fa-cogs fa-2x text-primary"></i>
                                    </div>
                                    <h5 class="fw-bold mb-0">Misi 1</h5>
                                </div>
                                <p class="mb-0">
                                    Meningkatkan kualitas layanan administrasi desa melalui
                                    digitalisasi dan pemanfaatan teknologi informasi.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success bg-opacity-10 rounded-circle p-3 me-3">
                                        <i class="fas fa-chart-line fa-2x text-success"></i>
                                    </div>
                                    <h5 class="fw-bold mb-0">Misi 2</h5>
                                </div>
                                <p class="mb-0">
                                    Mengembangkan ekonomi masyarakat melalui pemberdayaan
                                    UMKM dan pengembangan potensi lokal.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-warning bg-opacity-10 rounded-circle p-3 me-3">
                                        <i class="fas fa-graduation-cap fa-2x text-warning"></i>
                                    </div>
                                    <h5 class="fw-bold mb-0">Misi 3</h5>
                                </div>
                                <p class="mb-0">
                                    Meningkatkan kualitas pendidikan dan kesehatan masyarakat
                                    melalui program yang berkelanjutan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-info bg-opacity-10 rounded-circle p-3 me-3">
                                        <i class="fas fa-leaf fa-2x text-info"></i>
                                    </div>
                                    <h5 class="fw-bold mb-0">Misi 4</h5>
                                </div>
                                <p class="mb-0">
                                    Melestarikan budaya lokal dan lingkungan hidup melalui
                                    program konservasi dan edukasi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Goals Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Tujuan Pembangunan</h2>
                    <p class="lead text-muted">Target yang ingin dicapai dalam 5 tahun ke depan</p>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card border-0 shadow-sm text-center h-100">
                            <div class="card-body p-4">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                    <i class="fas fa-laptop fa-2x text-primary"></i>
                                </div>
                                <h5 class="fw-bold">Digitalisasi Desa</h5>
                                <p class="text-muted">
                                    100% layanan administrasi desa terdigitalisasi
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card border-0 shadow-sm text-center h-100">
                            <div class="card-body p-4">
                                <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                    <i class="fas fa-dollar-sign fa-2x text-success"></i>
                                </div>
                                <h5 class="fw-bold">Ekonomi Masyarakat</h5>
                                <p class="text-muted">
                                    Peningkatan pendapatan masyarakat sebesar 25%
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card border-0 shadow-sm text-center h-100">
                            <div class="card-body p-4">
                                <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                    <i class="fas fa-users fa-2x text-warning"></i>
                                </div>
                                <h5 class="fw-bold">Kualitas SDM</h5>
                                <p class="text-muted">
                                    90% masyarakat memiliki akses pendidikan berkualitas
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Nilai-Nilai Desa</h2>
                    <p class="lead text-muted">Prinsip yang menjadi pedoman dalam pembangunan</p>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="text-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="fas fa-handshake fa-2x text-primary"></i>
                            </div>
                            <h6 class="fw-bold">Gotong Royong</h6>
                            <p class="small text-muted">Bersama-sama membangun desa</p>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="text-center">
                            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="fas fa-shield-alt fa-2x text-success"></i>
                            </div>
                            <h6 class="fw-bold">Transparansi</h6>
                            <p class="small text-muted">Terbuka dan dapat dipercaya</p>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="text-center">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="fas fa-balance-scale fa-2x text-warning"></i>
                            </div>
                            <h6 class="fw-bold">Keadilan</h6>
                            <p class="small text-muted">Adil untuk semua warga</p>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="text-center">
                            <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                <i class="fas fa-lightbulb fa-2x text-info"></i>
                            </div>
                            <h6 class="fw-bold">Inovasi</h6>
                            <p class="small text-muted">Terus berinovasi dan berkembang</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
