@extends('layouts.app')

@section('title', 'Pengaduan - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center text-white">
                <h1 class="display-4 fw-bold mb-3">Pengaduan</h1>
                <p class="lead">
                    Sampaikan pengaduan, saran, dan kritik untuk kemajuan Desa Ketapang Baru.
                </p>
            </div>
        </div>
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
