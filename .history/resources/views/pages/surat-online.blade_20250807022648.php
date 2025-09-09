@extends('layouts.app')

@section('title', 'Surat Online - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center text-white">
                <h1 class="display-4 fw-bold mb-3">Surat Online</h1>
                <p class="lead">
                    Ajukan surat secara online tanpa perlu antri. Proses cepat dan transparan.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Service Types -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Jenis Surat yang Tersedia</h2>
                    <p class="lead text-muted">Pilih jenis surat yang ingin Anda ajukan</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm h-100 service-card">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-envelope fa-2x text-primary"></i>
                        </div>
                        <h5 class="card-title fw-bold">Surat Pengantar</h5>
                        <p class="card-text text-muted">
                            Surat pengantar untuk pengurusan KTP, KK, dan dokumen lainnya.
                        </p>
                        <ul class="list-unstyled text-start">
                            <li><i class="fas fa-check text-success me-2"></i>Pengurusan KTP</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pengurusan KK</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pengurusan Akta</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pengurusan Izin</li>
                        </ul>
                        <a href="#" class="btn btn-primary mt-3">Ajukan Surat</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm h-100 service-card">
                    <div class="card-body text-center p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-file-alt fa-2x text-success"></i>
                        </div>
                        <h5 class="card-title fw-bold">Surat Keterangan</h5>
                        <p class="card-text text-muted">
                            Surat keterangan domisili, usaha, dan keterangan lainnya.
                        </p>
                        <ul class="list-unstyled text-start">
                            <li><i class="fas fa-check text-success me-2"></i>Keterangan Domisili</li>
                            <li><i class="fas fa-check text-success me-2"></i>Keterangan Usaha</li>
                            <li><i class="fas fa-check text-success me-2"></i>Keterangan Miskin</li>
                            <li><i class="fas fa-check text-success me-2"></i>Keterangan Lainnya</li>
                        </ul>
                        <a href="#" class="btn btn-success mt-3">Ajukan Surat</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm h-100 service-card">
                    <div class="card-body text-center p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-thumbs-up fa-2x text-warning"></i>
                        </div>
                        <h5 class="card-title fw-bold">Surat Rekomendasi</h5>
                        <p class="card-text text-muted">
                            Surat rekomendasi untuk beasiswa, pekerjaan, dan lainnya.
                        </p>
                        <ul class="list-unstyled text-start">
                            <li><i class="fas fa-check text-success me-2"></i>Rekomendasi Beasiswa</li>
                            <li><i class="fas fa-check text-success me-2"></i>Rekomendasi Kerja</li>
                            <li><i class="fas fa-check text-success me-2"></i>Rekomendasi Usaha</li>
                            <li><i class="fas fa-check text-success me-2"></i>Rekomendasi Lainnya</li>
                        </ul>
                        <a href="#" class="btn btn-warning mt-3">Ajukan Surat</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="card border-0 shadow-sm h-100 service-card">
                    <div class="card-body text-center p-4">
                        <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-clipboard-check fa-2x text-info"></i>
                        </div>
                        <h5 class="card-title fw-bold">Surat Izin</h5>
                        <p class="card-text text-muted">
                            Surat izin keramaian, mendirikan bangunan, dan izin lainnya.
                        </p>
                        <ul class="list-unstyled text-start">
                            <li><i class="fas fa-check text-success me-2"></i>Izin Keramaian</li>
                            <li><i class="fas fa-check text-success me-2"></i>Izin Mendirikan Bangunan</li>
                            <li><i class="fas fa-check text-success me-2"></i>Izin Usaha</li>
                            <li><i class="fas fa-check text-success me-2"></i>Izin Lainnya</li>
                        </ul>
                        <a href="#" class="btn btn-info mt-3">Ajukan Surat</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="500">
                <div class="card border-0 shadow-sm h-100 service-card">
                    <div class="card-body text-center p-4">
                        <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-handshake fa-2x text-danger"></i>
                        </div>
                        <h5 class="card-title fw-bold">Surat Pernyataan</h5>
                        <p class="card-text text-muted">
                            Surat pernyataan untuk berbagai keperluan administrasi.
                        </p>
                        <ul class="list-unstyled text-start">
                            <li><i class="fas fa-check text-success me-2"></i>Pernyataan Ahli Waris</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pernyataan Belum Menikah</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pernyataan Miskin</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pernyataan Lainnya</li>
                        </ul>
                        <a href="#" class="btn btn-danger mt-3">Ajukan Surat</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="600">
                <div class="card border-0 shadow-sm h-100 service-card">
                    <div class="card-body text-center p-4">
                        <div class="bg-secondary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-ellipsis-h fa-2x text-secondary"></i>
                        </div>
                        <h5 class="card-title fw-bold">Surat Lainnya</h5>
                        <p class="card-text text-muted">
                            Surat-surat lainnya yang tidak termasuk dalam kategori di atas.
                        </p>
                        <ul class="list-unstyled text-start">
                            <li><i class="fas fa-check text-success me-2"></i>Surat Kuasa</li>
                            <li><i class="fas fa-check text-success me-2"></i>Surat Keterangan Lainnya</li>
                            <li><i class="fas fa-check text-success me-2"></i>Surat Pengantar Lainnya</li>
                            <li><i class="fas fa-check text-success me-2"></i>Surat Khusus</li>
                        </ul>
                        <a href="#" class="btn btn-secondary mt-3">Ajukan Surat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How to Apply -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Cara Mengajukan Surat Online</h2>
                    <p class="lead text-muted">Ikuti langkah-langkah berikut untuk mengajukan surat</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <span class="fw-bold text-primary" style="font-size: 2rem;">1</span>
                        </div>
                        <h5 class="fw-bold">Pilih Jenis Surat</h5>
                        <p class="text-muted">
                            Pilih jenis surat yang ingin Anda ajukan dari daftar yang tersedia.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <span class="fw-bold text-success" style="font-size: 2rem;">2</span>
                        </div>
                        <h5 class="fw-bold">Isi Formulir</h5>
                        <p class="text-muted">
                            Isi formulir dengan data yang lengkap dan benar sesuai persyaratan.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <span class="fw-bold text-warning" style="font-size: 2rem;">3</span>
                        </div>
                        <h5 class="fw-bold">Upload Dokumen</h5>
                        <p class="text-muted">
                            Upload dokumen pendukung yang diperlukan dalam format PDF atau JPG.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <span class="fw-bold text-info" style="font-size: 2rem;">4</span>
                        </div>
                        <h5 class="fw-bold">Submit & Track</h5>
                        <p class="text-muted">
                            Submit pengajuan dan pantau status surat Anda melalui sistem tracking.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Requirements -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0"><i class="fas fa-info-circle me-2"></i>Persyaratan Umum</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Dokumen Wajib:</h6>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check text-success me-2"></i>KTP Asli (foto)</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Kartu Keluarga (foto)</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Surat Pengantar RT/RW</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Dokumen pendukung lainnya</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Ketentuan:</h6>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check text-success me-2"></i>Warga Desa Ketapang Baru</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Data yang diisi benar</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Dokumen lengkap</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Mengikuti prosedur</li>
                                </ul>
                            </div>
                        </div>
                        <div class="alert alert-info mt-3">
                            <i class="fas fa-lightbulb me-2"></i>
                            <strong>Tips:</strong> Pastikan semua dokumen sudah dipersiapkan sebelum mengajukan surat online.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="fw-bold mb-3">Siap Mengajukan Surat?</h2>
                <p class="lead mb-4">
                    Mulai ajukan surat Anda sekarang dan nikmati kemudahan layanan administrasi desa.
                </p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="#" class="btn btn-primary btn-lg">
                        <i class="fas fa-envelope me-2"></i>Ajukan Surat Sekarang
                    </a>
                    <a href="#" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-question-circle me-2"></i>Bantuan
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
