@extends('layouts.app')

@section('title', 'Pengaduan - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
<style>
.aos-disabled [data-aos] { opacity: 1 !important; transform: none !important; }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden pt-8 py-8 lg:py-12 pb-24 lg:pb-20" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Particle.js Container -->
    <div id="particles-pengaduan" class="absolute inset-0"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8">
            <!-- Hero Content -->
            <div class="flex-1 max-w-4xl relative z-10">
                <div class="text-center space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center justify-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-comment text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">ASPIRASI WARGA</h2>
                            <p class="text-sm text-blue-100">Pengaduan & Saran</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Pengaduan</span><br>
                        <span class="text-yellow-400 font-extrabold">Masyarakat</span>
                    </h1>

                    <!-- Badge -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-shield-check mr-2 text-yellow-300 text-xs"></i>
                            Transparan & Responsif
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto font-light mb-12" data-aos="fade-up" data-aos-delay="600">
                        Sampaikan pengaduan, saran, dan kritik untuk kemajuan Desa Ketapang Baru. Setiap aspirasi akan
                        <span class="font-semibold text-yellow-300">ditindaklanjuti dengan responsif</span>
                    </p>

                    <!-- Enhanced Quick Stats -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-6xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="800">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">24/7</div>
                                <i class="fas fa-clock text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Layanan Online</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-wifi text-green-300 mr-1"></i>
                                Akses kapan saja
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">100%</div>
                                <i class="fas fa-check-circle text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Ditindaklanjuti</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-tasks text-green-300 mr-1"></i>
                                Semua laporan
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">3</div>
                                <i class="fas fa-hourglass-half text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Hari Respon</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-lightning-bolt text-orange-300 mr-1"></i>
                                Maksimal waktu
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">95%</div>
                                <i class="fas fa-smile text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Tingkat Kepuasan</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-star text-orange-300 mr-1"></i>
                                Rating warga
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Animated Wave -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-16">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" fill="white"></path>
        </svg>
    </div>
</section>

<!-- Complaint Form -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h4 class="mb-0"><i class="fas fa-comment me-2"></i>Form Pengaduan</h4>
                    </div>
                    <div class="card-body p-4">
                        <form id="complaintForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap *</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Opsional">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <input type="tel" class="form-control" id="telepon" name="telepon" placeholder="Opsional">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Opsional">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="jenis_pengaduan" class="form-label">Jenis Pengaduan *</label>
                                    <select class="form-select" id="jenis_pengaduan" name="jenis_pengaduan" required>
                                        <option value="">Pilih jenis pengaduan</option>
                                        <option value="infrastruktur">Infrastruktur</option>
                                        <option value="pelayanan">Pelayanan Publik</option>
                                        <option value="keamanan">Keamanan & Ketertiban</option>
                                        <option value="kesehatan">Kesehatan</option>
                                        <option value="pendidikan">Pendidikan</option>
                                        <option value="ekonomi">Ekonomi & UMKM</option>
                                        <option value="lingkungan">Lingkungan</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Pengaduan *</label>
                                <input type="text" class="form-control" id="judul" name="judul" required
                                       placeholder="Masukkan judul pengaduan yang singkat dan jelas">
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi Pengaduan *</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required
                                          placeholder="Jelaskan detail pengaduan Anda dengan lengkap..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Lokasi Kejadian</label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi"
                                       placeholder="Contoh: Gang Melati No. 15, Dusun Ketapang">
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_kejadian" class="form-label">Tanggal Kejadian</label>
                                <input type="date" class="form-control" id="tanggal_kejadian" name="tanggal_kejadian">
                            </div>

                            <div class="mb-3">
                                <label for="bukti" class="form-label">Upload Bukti (Opsional)</label>
                                <input type="file" class="form-control" id="bukti" name="bukti"
                                       accept="image/*,.pdf,.doc,.docx">
                                <small class="text-muted">Format: JPG, PNG, PDF, DOC. Maksimal 5MB</small>
                            </div>

                            <div class="mb-3">
                                <label for="prioritas" class="form-label">Tingkat Prioritas</label>
                                <select class="form-select" id="prioritas" name="prioritas">
                                    <option value="rendah">Rendah</option>
                                    <option value="sedang" selected>Sedang</option>
                                    <option value="tinggi">Tinggi</option>
                                    <option value="sangat_tinggi">Sangat Tinggi</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="anonim" name="anonim">
                                    <label class="form-check-label" for="anonim">
                                        Kirim sebagai anonim (nama tidak akan ditampilkan)
                                    </label>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Pengaduan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Complaint Status -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Cek Status Pengaduan</h2>
                    <p class="lead text-muted">Pantau status pengaduan yang telah Anda kirim</p>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="trackingNumber"
                                       placeholder="Masukkan nomor tracking pengaduan">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary w-100" onclick="checkStatus()">
                                    <i class="fas fa-search me-2"></i>Cek Status
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status Result -->
                <div id="statusResult" class="mt-4" style="display: none;">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="fas fa-check-circle me-2"></i>Status Pengaduan</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Nomor Tracking:</strong> <span id="trackingNo">COMP-2024-001</span></p>
                                    <p><strong>Judul:</strong> <span id="complaintTitle">Jalan Berlubang di Gang Melati</span></p>
                                    <p><strong>Tanggal Kirim:</strong> <span id="submitDate">15 Januari 2024</span></p>
                                    <p><strong>Status:</strong> <span class="badge bg-success" id="statusBadge">Dalam Proses</span></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Estimasi Selesai:</strong> <span id="estimatedDate">20 Januari 2024</span></p>
                                    <p><strong>Petugas:</strong> <span id="officer">Ahmad Supriadi</span></p>
                                    <p><strong>Prioritas:</strong> <span id="priority">Sedang</span></p>
                                    <p><strong>Update Terakhir:</strong> <span id="lastUpdate">16 Januari 2024</span></p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="fw-bold">Riwayat Status:</h6>
                                <div class="timeline">
                                    <div class="d-flex mb-2">
                                        <div class="me-3">
                                            <i class="fas fa-circle text-success"></i>
                                        </div>
                                        <div>
                                            <strong>Diterima</strong>
                                            <br>
                                            <small class="text-muted">15 Januari 2024 - Pengaduan telah diterima dan sedang diverifikasi</small>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <div class="me-3">
                                            <i class="fas fa-circle text-warning"></i>
                                        </div>
                                        <div>
                                            <strong>Dalam Proses</strong>
                                            <br>
                                            <small class="text-muted">16 Januari 2024 - Tim sedang menangani pengaduan</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Recent Complaints -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Pengaduan Terbaru</h2>
                    <p class="lead text-muted">Pengaduan yang telah ditangani dan sedang dalam proses</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-success text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Selesai</span>
                            <small>2 hari lalu</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold">Lampu Jalan Mati</h6>
                        <p class="text-muted">Lampu jalan di Gang Anggrek sudah mati selama 3 hari</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-success">Selesai</span>
                            <small class="text-muted">COMP-2024-001</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-warning text-dark">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Dalam Proses</span>
                            <small>1 hari lalu</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold">Jalan Berlubang</h6>
                        <p class="text-muted">Jalan di Gang Melati terdapat lubang yang membahayakan</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-warning">Dalam Proses</span>
                            <small class="text-muted">COMP-2024-002</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-info text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold">Diterima</span>
                            <small>Hari ini</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold">Sampah Menumpuk</h6>
                        <p class="text-muted">Sampah menumpuk di TPS Dusun Ketapang</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-info">Diterima</span>
                            <small class="text-muted">COMP-2024-003</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="#" class="btn btn-outline-primary">
                Lihat Semua Pengaduan
            </a>
        </div>
    </div>
</section>

<!-- Statistics -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Statistik Pengaduan</h2>
                    <p class="lead text-muted">Data pengaduan tahun 2024</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-inbox fa-2x text-primary"></i>
                        </div>
                        <h3 class="fw-bold text-primary">156</h3>
                        <p class="text-muted mb-2">Total Pengaduan</p>
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i>+12% dari bulan lalu
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-check-circle fa-2x text-success"></i>
                        </div>
                        <h3 class="fw-bold text-success">89</h3>
                        <p class="text-muted mb-2">Selesai</p>
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i>57% dari total
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-clock fa-2x text-warning"></i>
                        </div>
                        <h3 class="fw-bold text-warning">45</h3>
                        <p class="text-muted mb-2">Dalam Proses</p>
                        <small class="text-warning">
                            <i class="fas fa-minus me-1"></i>29% dari total
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-hourglass-start fa-2x text-info"></i>
                        </div>
                        <h3 class="fw-bold text-info">22</h3>
                        <p class="text-muted mb-2">Menunggu</p>
                        <small class="text-info">
                            <i class="fas fa-minus me-1"></i>14% dari total
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<!-- AOS via CDN -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<!-- Particles.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    setTimeout(() => {
        if (typeof AOS !== 'undefined') {
            document.documentElement.classList.remove('aos-disabled');
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                offset: 100,
                delay: 0
            });
        }
    }, 100);

    // Initialize Particles.js
    if (typeof particlesJS !== 'undefined') {
        particlesJS('particles-pengaduan', {
            particles: {
                number: { value: 60, density: { enable: true, value_area: 800 } },
                color: { value: '#ffffff' },
                shape: { type: 'circle' },
                opacity: { value: 0.1, random: false },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: '#ffffff', opacity: 0.1, width: 1 },
                move: { enable: true, speed: 2, direction: 'none', random: false, straight: false, out_mode: 'out', bounce: false }
            },
            interactivity: { detect_on: 'canvas', events: { onhover: { enable: true, mode: 'repulse' }, onclick: { enable: true, mode: 'push' }, resize: true } },
            retina_detect: true
        });
    }
});
</script>

<script>
$(document).ready(function() {
    // Form submission
    $('#complaintForm').on('submit', function(e) {
        e.preventDefault();

        // Show loading
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();
        submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...');
        submitBtn.prop('disabled', true);

        // Simulate form submission
        setTimeout(function() {
            showAlert('Pengaduan berhasil dikirim! Kami akan segera menindaklanjuti.', 'success');
            $('#complaintForm')[0].reset();

            // Reset button
            submitBtn.html(originalText);
            submitBtn.prop('disabled', false);
        }, 2000);
    });

    // Form validation
    $('#complaintForm input, #complaintForm select, #complaintForm textarea').on('blur', function() {
        if ($(this).prop('required') && !$(this).val()) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });

    // Email validation
    $('#email').on('blur', function() {
        const email = $(this).val();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email && !emailRegex.test(email)) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });
});

function checkStatus() {
    const trackingNumber = $('#trackingNumber').val();

    if (!trackingNumber) {
        showAlert('Masukkan nomor tracking pengaduan!', 'warning');
        return;
    }

    // Show loading
    $('#statusResult').hide();
    showAlert('Mencari status pengaduan...', 'info');

    // Simulate API call
    setTimeout(function() {
        $('#statusResult').show();
        showAlert('Status pengaduan ditemukan!', 'success');
    }, 1500);
}
</script>
@endpush
