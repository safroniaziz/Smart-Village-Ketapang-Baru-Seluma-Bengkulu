<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Surat - Smart Village</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .verification-card {
            border-radius: 15px;
            overflow: hidden;
        }
        .ttd-container {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
        }
        .ttd-image {
            max-width: 150px;
            height: auto;
        }
        .info-table td {
            padding: 8px 0;
        }
        .info-table td:first-child {
            width: 45%;
            color: #666;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow verification-card">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h4 class="mb-0">
                            <i class="fas fa-shield-alt me-2"></i>
                            Verifikasi Surat Desa
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        @if($success)
                            <div class="text-center mb-4">
                                <div class="d-inline-flex align-items-center justify-content-center bg-success text-white rounded-circle" style="width: 80px; height: 80px;">
                                    <i class="fas fa-check fa-3x"></i>
                                </div>
                                <h5 class="mt-3 text-success">Surat Terverifikasi</h5>
                                <p class="text-muted mb-0">Dokumen ini dinyatakan SAH dan ASLI</p>
                            </div>

                            <!-- Informasi Detail Surat -->
                            <div class="card bg-light border-0 mb-4">
                                <div class="card-body">
                                    <h6 class="text-primary mb-3">
                                        <i class="fas fa-file-alt me-2"></i>Detail Surat
                                    </h6>
                                    <table class="table table-borderless info-table mb-0">
                                        <tr>
                                            <td><i class="fas fa-hashtag me-2 text-muted"></i>Tracking Number</td>
                                            <td><strong>{{ $trackingNumber }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-file-signature me-2 text-muted"></i>Jenis Surat</td>
                                            <td><strong>{{ ucwords(str_replace('_', ' ', $data['jenis_surat'])) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-calendar me-2 text-muted"></i>Tanggal Pengajuan</td>
                                            <td>{{ $data['tanggal_pengajuan'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-calendar-check me-2 text-muted"></i>Tanggal Disetujui</td>
                                            <td>{{ $data['tanggal_disetujui'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-info-circle me-2 text-muted"></i>Status</td>
                                            <td>
                                                <span class="badge bg-{{ $data['status'] == 'Valid' ? 'success' : ($data['status'] == 'Ditolak' ? 'danger' : 'warning') }}">
                                                    {{ $data['status'] }}
                                                </span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <!-- Informasi Pemohon -->
                            <div class="card bg-light border-0 mb-4">
                                <div class="card-body">
                                    <h6 class="text-primary mb-3">
                                        <i class="fas fa-user me-2"></i>Data Pemohon
                                    </h6>
                                    <table class="table table-borderless info-table mb-0">
                                        <tr>
                                            <td><i class="fas fa-user me-2 text-muted"></i>Nama Lengkap</td>
                                            <td><strong>{{ $data['nama'] }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-id-card me-2 text-muted"></i>NIK</td>
                                            <td>{{ $data['nik'] }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <!-- Tanda Tangan Kepala Desa -->
                            <div class="card bg-light border-0 mb-4">
                                <div class="card-body">
                                    <h6 class="text-primary mb-3">
                                        <i class="fas fa-signature me-2"></i>Pengesahan
                                    </h6>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <p class="mb-1 text-muted">Kepala Desa Ketapang Baru</p>
                                            <p class="mb-0"><strong>{{ $data['kepala_desa'] }}</strong></p>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            @if(isset($data['ttd_base64']) && $data['ttd_base64'])
                                                <div class="ttd-container">
                                                    <img src="{{ $data['ttd_base64'] }}" alt="Tanda Tangan" class="ttd-image">
                                                    <p class="small text-muted mt-2 mb-0">Tanda Tangan Digital</p>
                                                </div>
                                            @else
                                                <div class="ttd-container">
                                                    <i class="fas fa-signature fa-3x text-muted"></i>
                                                    <p class="small text-muted mt-2 mb-0">Tanda Tangan Tersimpan</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Keaslian Surat -->
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <i class="fas fa-certificate fa-2x me-3"></i>
                                <div>
                                    <strong>Dokumen Resmi</strong><br>
                                    <small>Dikeluarkan oleh Kantor Desa Ketapang Baru, Kec. Semidang Alas Maras, Kab. Seluma, Bengkulu</small>
                                </div>
                            </div>

                        @else
                            <div class="text-center mb-4">
                                <div class="d-inline-flex align-items-center justify-content-center bg-danger text-white rounded-circle" style="width: 80px; height: 80px;">
                                    <i class="fas fa-times fa-3x"></i>
                                </div>
                                <h5 class="mt-3 text-danger">Verifikasi Gagal</h5>
                                <p class="text-muted">{{ $message }}</p>
                            </div>

                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Nomor Tracking:</strong> {{ $trackingNumber }}
                            </div>

                            <p class="text-center text-muted small">
                                Pastikan nomor tracking yang Anda masukkan benar.<br>
                                Hubungi kantor desa jika masalah berlanjut.
                            </p>
                        @endif

                        <div class="text-center mt-4">
                            <a href="{{ url('/') }}" class="btn btn-primary">
                                <i class="fas fa-home me-2"></i>
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                    <div class="card-footer text-center text-muted py-3">
                        <small>
                            <i class="fas fa-lock me-1"></i>
                            Sistem Verifikasi Surat Desa Ketapang Baru
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
