@extends('layouts.app')

@section('title', 'Kontak - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center text-white">
                <h1 class="display-4 fw-bold mb-3">Hubungi Kami</h1>
                <p class="lead">
                    Tim kami siap membantu Anda. Silakan hubungi kami melalui berbagai saluran yang tersedia.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                        </div>
                        <h5 class="card-title fw-bold">Alamat Kantor</h5>
                        <p class="card-text text-muted">
                            Jl. Desa Ketapang Baru No. 123<br>
                            Kecamatan Ketapang<br>
                            Kabupaten Bandung<br>
                            Jawa Barat 40512
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-phone fa-2x text-success"></i>
                        </div>
                        <h5 class="card-title fw-bold">Telepon</h5>
                        <p class="card-text text-muted">
                            <strong>Kantor Desa:</strong><br>
                            (022) 1234567<br><br>
                            <strong>WhatsApp:</strong><br>
                            +62 812-3456-7890
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-clock fa-2x text-warning"></i>
                        </div>
                        <h5 class="card-title fw-bold">Jam Operasional</h5>
                        <p class="card-text text-muted">
                            <strong>Senin - Jumat:</strong><br>
                            08:00 - 16:00 WIB<br><br>
                            <strong>Sabtu:</strong><br>
                            08:00 - 12:00 WIB<br><br>
                            <strong>Minggu:</strong><br>
                            Tutup
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h4 class="mb-0"><i class="fas fa-envelope me-2"></i>Kirim Pesan</h4>
                    </div>
                    <div class="card-body p-4">
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap *</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <input type="tel" class="form-control" id="telepon" name="telepon">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="subjek" class="form-label">Subjek *</label>
                                    <select class="form-select" id="subjek" name="subjek" required>
                                        <option value="">Pilih subjek</option>
                                        <option value="surat">Pengurusan Surat</option>
                                        <option value="data">Data Warga</option>
                                        <option value="pengaduan">Pengaduan</option>
                                        <option value="saran">Saran & Kritik</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="pesan" class="form-label">Pesan *</label>
                                <textarea class="form-control" id="pesan" name="pesan" rows="5" required
                                          placeholder="Tulis pesan Anda di sini..."></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-4">
                <h2 class="display-5 fw-bold mb-3">Lokasi Kami</h2>
                <p class="lead text-muted">
                    Kunjungi kantor desa kami untuk layanan langsung.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow">
                    <div class="card-body p-0">
                        <div class="ratio ratio-21x9">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9!2d107.5!3d-6.9!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTQnMDAuMCJTIDEwN8KwMzAnMDAuMCJF!5e0!3m2!1sen!2sid!4v1234567890"
                                    style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Emergency Contact -->
<section class="py-5 bg-warning bg-opacity-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h3 class="fw-bold mb-3">Kontak Darurat</h3>
                <p class="lead mb-4">
                    Untuk keadaan darurat, silakan hubungi nomor-nomor berikut:
                </p>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card border-0 bg-white shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-ambulance fa-2x text-danger mb-2"></i>
                                <h6 class="fw-bold">Ambulans</h6>
                                <p class="mb-0">119</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card border-0 bg-white shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-shield-alt fa-2x text-primary mb-2"></i>
                                <h6 class="fw-bold">Polisi</h6>
                                <p class="mb-0">110</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card border-0 bg-white shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-fire-extinguisher fa-2x text-warning mb-2"></i>
                                <h6 class="fw-bold">Pemadam Kebakaran</h6>
                                <p class="mb-0">113</p>
                            </div>
                        </div>
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
    // Contact form submission
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();

        // Show loading
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();
        submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...');
        submitBtn.prop('disabled', true);

        // Simulate form submission (replace with actual AJAX)
        setTimeout(function() {
            showAlert('Pesan berhasil dikirim! Kami akan segera menghubungi Anda.', 'success');
            $('#contactForm')[0].reset();

            // Reset button
            submitBtn.html(originalText);
            submitBtn.prop('disabled', false);
        }, 2000);
    });

    // Form validation
    $('#contactForm input, #contactForm select, #contactForm textarea').on('blur', function() {
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
</script>
@endpush
