@extends('layouts.app')

@section('title', 'Data Warga - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center text-white">
                <h1 class="display-4 fw-bold mb-3">Data Warga</h1>
                <p class="lead">
                    Informasi data warga Desa Ketapang Baru yang terintegrasi dan terupdate.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Overview -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                        <h3 class="fw-bold text-primary">2,547</h3>
                        <p class="text-muted mb-2">Total Warga</p>
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i>+2.3% dari tahun lalu
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-home fa-2x text-success"></i>
                        </div>
                        <h3 class="fw-bold text-success">512</h3>
                        <p class="text-muted mb-2">Kartu Keluarga</p>
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i>+1.8% dari tahun lalu
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-map-marker-alt fa-2x text-warning"></i>
                        </div>
                        <h3 class="fw-bold text-warning">8</h3>
                        <p class="text-muted mb-2">Dusun</p>
                        <small class="text-muted">
                            <i class="fas fa-minus me-1"></i>Tidak berubah
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-user-plus fa-2x text-info"></i>
                        </div>
                        <h3 class="fw-bold text-info">45</h3>
                        <p class="text-muted mb-2">Warga Baru</p>
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i>Bulan ini
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Search and Filter -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="search" class="form-label">Cari Warga</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="search" placeholder="Nama, NIK, atau alamat...">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="dusun" class="form-label">Dusun</label>
                        <select class="form-select" id="dusun">
                            <option value="">Semua Dusun</option>
                            <option value="ketapang">Dusun Ketapang</option>
                            <option value="baru">Dusun Baru</option>
                            <option value="mekar">Dusun Mekar</option>
                            <option value="maju">Dusun Maju</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin">
                            <option value="">Semua</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status">
                            <option value="">Semua</option>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Data Table -->
<section class="py-5">
    <div class="container">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">Data Warga</h5>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-download me-2"></i>Export
                    </button>
                    <button class="btn btn-primary btn-sm">
                        <i class="fas fa-plus me-2"></i>Tambah Warga
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>3273.1234.5678.9012</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40x40/2c5530/ffffff?text=AS"
                                             class="rounded-circle me-2" alt="Foto">
                                        <div>
                                            <div class="fw-bold">Ahmad Supriadi</div>
                                            <small class="text-muted">Kepala Keluarga</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-primary">Laki-laki</span>
                                </td>
                                <td>Gang Melati No. 15, Dusun Ketapang</td>
                                <td>
                                    <span class="badge bg-success">Aktif</span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-outline-primary" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-outline-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>3273.1234.5678.9013</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40x40/4a7c59/ffffff?text=SA"
                                             class="rounded-circle me-2" alt="Foto">
                                        <div>
                                            <div class="fw-bold">Siti Aminah</div>
                                            <small class="text-muted">Istri</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-danger">Perempuan</span>
                                </td>
                                <td>Gang Melati No. 15, Dusun Ketapang</td>
                                <td>
                                    <span class="badge bg-success">Aktif</span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-outline-primary" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-outline-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>3273.1234.5678.9014</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40x40/8fbc8f/ffffff?text=BS"
                                             class="rounded-circle me-2" alt="Foto">
                                        <div>
                                            <div class="fw-bold">Budi Santoso</div>
                                            <small class="text-muted">Anak</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-primary">Laki-laki</span>
                                </td>
                                <td>Gang Melati No. 15, Dusun Ketapang</td>
                                <td>
                                    <span class="badge bg-success">Aktif</span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-outline-primary" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-outline-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>3273.1234.5678.9015</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40x40/2c5530/ffffff?text=RS"
                                             class="rounded-circle me-2" alt="Foto">
                                        <div>
                                            <div class="fw-bold">Rina Safitri</div>
                                            <small class="text-muted">Anak</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-danger">Perempuan</span>
                                </td>
                                <td>Gang Melati No. 15, Dusun Ketapang</td>
                                <td>
                                    <span class="badge bg-success">Aktif</span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-outline-primary" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-outline-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>3273.1234.5678.9016</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40x40/4a7c59/ffffff?text=DK"
                                             class="rounded-circle me-2" alt="Foto">
                                        <div>
                                            <div class="fw-bold">Dedi Kurniawan</div>
                                            <small class="text-muted">Kepala Keluarga</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-primary">Laki-laki</span>
                                </td>
                                <td>Gang Anggrek No. 22, Dusun Ketapang Baru</td>
                                <td>
                                    <span class="badge bg-success">Aktif</span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-outline-primary" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-outline-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        Menampilkan 1-5 dari 2,547 data
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm mb-0">
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
            </div>
        </div>
    </div>
</section>

<!-- Quick Actions -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Aksi Cepat</h2>
                    <p class="lead text-muted">Layanan cepat untuk pengelolaan data warga</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-user-plus fa-2x text-primary"></i>
                        </div>
                        <h5 class="fw-bold">Tambah Warga</h5>
                        <p class="text-muted">
                            Tambah data warga baru ke dalam sistem.
                        </p>
                        <a href="#" class="btn btn-primary">Tambah Warga</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-file-import fa-2x text-success"></i>
                        </div>
                        <h5 class="fw-bold">Import Data</h5>
                        <p class="text-muted">
                            Import data warga dari file Excel atau CSV.
                        </p>
                        <a href="#" class="btn btn-success">Import Data</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-file-export fa-2x text-warning"></i>
                        </div>
                        <h5 class="fw-bold">Export Data</h5>
                        <p class="text-muted">
                            Export data warga ke format Excel atau PDF.
                        </p>
                        <a href="#" class="btn btn-warning">Export Data</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-chart-bar fa-2x text-info"></i>
                        </div>
                        <h5 class="fw-bold">Laporan</h5>
                        <p class="text-muted">
                            Generate laporan data warga dalam berbagai format.
                        </p>
                        <a href="#" class="btn btn-info">Buat Laporan</a>
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
    // Search functionality
    $('#search').on('keyup', function() {
        const searchTerm = $(this).val().toLowerCase();
        $('tbody tr').each(function() {
            const text = $(this).text().toLowerCase();
            if (text.includes(searchTerm)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    // Filter functionality
    $('select').on('change', function() {
        // Implement filter logic here
        console.log('Filter changed:', $(this).val());
    });

    // Export functionality
    $('.btn-outline-primary').contains('Export').on('click', function() {
        // Implement export logic here
        console.log('Export clicked');
    });
});
</script>
@endpush
