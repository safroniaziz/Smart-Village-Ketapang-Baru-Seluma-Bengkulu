<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Surat - Smart Village</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">
                            <i class="fas fa-check-circle me-2"></i>
                            Verifikasi Surat
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        @if($success)
                            <div class="alert alert-success text-center">
                                <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                                <h5>Surat Terverifikasi</h5>
                                <p class="mb-0">{{ $message }}</p>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h6 class="card-title text-muted">Informasi Surat</h6>
                                            <table class="table table-sm table-borderless">
                                                <tr>
                                                    <td><strong>Tracking Number:</strong></td>
                                                    <td>{{ $trackingNumber }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Nama Pemohon:</strong></td>
                                                    <td>{{ $data['nama'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Jenis Surat:</strong></td>
                                                    <td>{{ ucwords(str_replace('_', ' ', $data['jenis_surat'])) }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Status:</strong></td>
                                                    <td>
                                                        <span class="badge bg-{{ $data['status'] == 'Disetujui' ? 'success' : ($data['status'] == 'Ditolak' ? 'danger' : 'warning') }}">
                                                            {{ $data['status'] }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Tanggal Pengajuan:</strong></td>
                                                    <td>{{ $data['tanggal'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Waktu:</strong></td>
                                                    <td>{{ $data['waktu'] }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card bg-success text-white">
                                        <div class="card-body text-center">
                                            <i class="fas fa-certificate fa-3x mb-3"></i>
                                            <h6>Surat ini adalah ASLI</h6>
                                            <p class="small mb-0">
                                                Dikeluarkan oleh Desa Ketapang Baru<br>
                                                Seluma, Bengkulu
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-danger text-center">
                                <i class="fas fa-times-circle fa-3x text-danger mb-3"></i>
                                <h5>Verifikasi Gagal</h5>
                                <p class="mb-0">{{ $message }}</p>
                            </div>

                            <div class="text-center">
                                <p class="text-muted">Nomor tracking: <strong>{{ $trackingNumber }}</strong></p>
                                <p class="small text-muted">
                                    Pastikan nomor tracking yang Anda masukkan benar.<br>
                                    Hubungi kantor desa jika masalah berlanjut.
                                </p>
                            </div>
                        @endif

                        <div class="text-center mt-4">
                            <a href="{{ url('/') }}" class="btn btn-primary">
                                <i class="fas fa-home me-2"></i>
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                    <div class="card-footer text-center text-muted">
                        <small>
                            <i class="fas fa-info-circle me-1"></i>
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