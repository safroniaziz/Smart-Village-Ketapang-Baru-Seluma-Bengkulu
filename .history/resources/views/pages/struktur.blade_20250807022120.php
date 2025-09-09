@extends('layouts.app')

@section('title', 'Struktur Organisasi - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center text-white">
                <h1 class="display-4 fw-bold mb-3">Struktur Organisasi</h1>
                <p class="lead">
                    Kenali tim pengurus desa yang siap melayani masyarakat.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Structure Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Struktur Pemerintahan Desa</h2>
                    <p class="lead text-muted">Tim pengurus desa periode 2021-2026</p>
                </div>

                <!-- Kepala Desa -->
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm text-center">
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <img src="https://via.placeholder.com/150x150/2c5530/ffffff?text=KD"
                                         class="rounded-circle" alt="Kepala Desa">
                                </div>
                                <h5 class="fw-bold text-primary">Budi Santoso, S.Sos</h5>
                                <p class="text-muted mb-2">Kepala Desa</p>
                                <p class="small text-muted">Periode 2021-2026</p>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-success">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-info">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sekretaris dan Kaur -->
                <div class="row mb-5">
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <img src="https://via.placeholder.com/120x120/4a7c59/ffffff?text=SK"
                                         class="rounded-circle" alt="Sekretaris">
                                </div>
                                <h6 class="fw-bold text-success">Ahmad Supriadi, S.Pd</h6>
                                <p class="text-muted mb-2">Sekretaris Desa</p>
                                <p class="small text-muted">Bertanggung jawab atas administrasi desa</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <img src="https://via.placeholder.com/120x120/8fbc8f/ffffff?text=K1"
                                         class="rounded-circle" alt="Kaur Pemerintahan">
                                </div>
                                <h6 class="fw-bold text-warning">Siti Aminah, S.Sos</h6>
                                <p class="text-muted mb-2">Kaur Pemerintahan</p>
                                <p class="small text-muted">Mengurus administrasi kependudukan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <img src="https://via.placeholder.com/120x120/2c5530/ffffff?text=K2"
                                         class="rounded-circle" alt="Kaur Pembangunan">
                                </div>
                                <h6 class="fw-bold text-info">Dedi Kurniawan, S.T</h6>
                                <p class="text-muted mb-2">Kaur Pembangunan</p>
                                <p class="small text-muted">Mengurus pembangunan infrastruktur</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kaur Keuangan dan Umum -->
                <div class="row mb-5">
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <img src="https://via.placeholder.com/120x120/4a7c59/ffffff?text=K3"
                                         class="rounded-circle" alt="Kaur Keuangan">
                                </div>
                                <h6 class="fw-bold text-danger">Yuni Safitri, S.E</h6>
                                <p class="text-muted mb-2">Kaur Keuangan</p>
                                <p class="small text-muted">Mengurus keuangan desa</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <img src="https://via.placeholder.com/120x120/8fbc8f/ffffff?text=K4"
                                         class="rounded-circle" alt="Kaur Umum">
                                </div>
                                <h6 class="fw-bold text-primary">Rina Safitri, S.Pd</h6>
                                <p class="text-muted mb-2">Kaur Umum</p>
                                <p class="small text-muted">Mengurus administrasi umum</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <img src="https://via.placeholder.com/120x120/2c5530/ffffff?text=K5"
                                         class="rounded-circle" alt="Kaur Kesra">
                                </div>
                                <h6 class="fw-bold text-success">Budi Santoso, S.KM</h6>
                                <p class="text-muted mb-2">Kaur Kesra</p>
                                <p class="small text-muted">Mengurus kesejahteraan rakyat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BPD Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Badan Permusyawaratan Desa (BPD)</h2>
                    <p class="lead text-muted">Lembaga perwakilan masyarakat desa</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <img src="https://via.placeholder.com/120x120/2c5530/ffffff?text=KB"
                                         class="rounded-circle" alt="Ketua BPD">
                                </div>
                                <h6 class="fw-bold text-primary">Ahmad Hidayat, S.H</h6>
                                <p class="text-muted mb-2">Ketua BPD</p>
                                <p class="small text-muted">Periode 2021-2026</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <img src="https://via.placeholder.com/120x120/4a7c59/ffffff?text=WB"
                                         class="rounded-circle" alt="Wakil Ketua BPD">
                                </div>
                                <h6 class="fw-bold text-success">Siti Nurhaliza, S.Pd</h6>
                                <p class="text-muted mb-2">Wakil Ketua BPD</p>
                                <p class="small text-muted">Periode 2021-2026</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <img src="https://via.placeholder.com/120x120/8fbc8f/ffffff?text=SB"
                                         class="rounded-circle" alt="Sekretaris BPD">
                                </div>
                                <h6 class="fw-bold text-warning">Dedi Kurniawan, S.E</h6>
                                <p class="text-muted mb-2">Sekretaris BPD</p>
                                <p class="small text-muted">Periode 2021-2026</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- LPM Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Lembaga Pemberdayaan Masyarakat (LPM)</h2>
                    <p class="lead text-muted">Lembaga yang menggerakkan partisipasi masyarakat</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <img src="https://via.placeholder.com/120x120/2c5530/ffffff?text=KL"
                                         class="rounded-circle" alt="Ketua LPM">
                                </div>
                                <h6 class="fw-bold text-primary">Budi Santoso, S.Pd</h6>
                                <p class="text-muted mb-2">Ketua LPM</p>
                                <p class="small text-muted">Periode 2021-2026</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <img src="https://via.placeholder.com/120x120/4a7c59/ffffff?text=WL"
                                         class="rounded-circle" alt="Wakil Ketua LPM">
                                </div>
                                <h6 class="fw-bold text-success">Ahmad Supriadi, S.Sos</h6>
                                <p class="text-muted mb-2">Wakil Ketua LPM</p>
                                <p class="small text-muted">Periode 2021-2026</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <img src="https://via.placeholder.com/120x120/8fbc8f/ffffff?text=SL"
                                         class="rounded-circle" alt="Sekretaris LPM">
                                </div>
                                <h6 class="fw-bold text-warning">Siti Aminah, S.E</h6>
                                <p class="text-muted mb-2">Sekretaris LPM</p>
                                <p class="small text-muted">Periode 2021-2026</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
