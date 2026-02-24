@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Buat Surat Baru')

@section('menu')
    Buat Surat Baru
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.pengajuan-surat.index') }}" class="text-muted text-hover-primary">Pengajuan Surat</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Buat Surat Baru</li>
@endsection

@push('styles')
<style>
    /* Enhanced Native Date/Time Picker */
    input[type="date"],
    input[type="time"],
    input[type="datetime-local"] {
        padding: 0.75rem 1rem;
        font-size: 1rem;
        font-weight: 500;
        border: 1px solid #e4e6ef;
        border-radius: 0.475rem;
        background-color: #fff;
        transition: border-color 0.15s ease, box-shadow 0.15s ease;
        cursor: pointer;
        width: 100%;
    }
    
    input[type="date"]:hover,
    input[type="time"]:hover,
    input[type="datetime-local"]:hover {
        border-color: #b5b5c3;
    }
    
    input[type="date"]:focus,
    input[type="time"]:focus,
    input[type="datetime-local"]:focus {
        border-color: #3699ff;
        box-shadow: 0 0 0 0.25rem rgba(54, 153, 255, 0.25);
        outline: none;
    }
    
    input[type="date"]::-webkit-calendar-picker-indicator,
    input[type="time"]::-webkit-calendar-picker-indicator,
    input[type="datetime-local"]::-webkit-calendar-picker-indicator {
        cursor: pointer;
        padding: 4px;
        margin-right: -4px;
        border-radius: 4px;
        filter: invert(40%);
    }
    
    input[type="date"]::-webkit-calendar-picker-indicator:hover,
    input[type="time"]::-webkit-calendar-picker-indicator:hover,
    input[type="datetime-local"]::-webkit-calendar-picker-indicator:hover {
        background-color: rgba(54, 153, 255, 0.1);
        filter: invert(30%);
    }
</style>
@endpush

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="ki-duotone ki-check-circle fs-2 text-success me-3"><span class="path1"></span><span class="path2"></span></i>
                        <div class="flex-grow-1">
                            <div class="fw-bold mb-1">Berhasil</div>
                            <div>{{ session('success') }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="ki-duotone ki-cross-circle fs-2 text-danger me-3"><span class="path1"></span><span class="path2"></span></i>
                        <div class="flex-grow-1">
                            <div class="fw-bold mb-1">Error</div>
                            <div>{{ session('error') }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <i class="ki-duotone ki-plus fs-2 text-primary me-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <h3 class="fw-bold m-0">Form Buat Surat Baru</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form id="createSuratForm" method="POST" action="{{ route('admin.pengajuan-surat.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Pilih User -->
                        <div class="row mb-3">
                            <div class="col-md-6" id="warga-selection-wrapper">
                                <label for="user_id" class="form-label">Pilih Warga <span class="text-danger">*</span></label>
                                <select class="form-select" id="user_id" name="user_id" data-control="select2" data-placeholder="Cari dan pilih warga...">
                                    <option value="">Pilih Warga...</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}"
                                                data-nama="{{ $user->nama_lengkap }}"
                                                data-nik="{{ $user->nik }}"
                                                data-alamat="{{ $user->alamat }}"
                                                data-no-hp="{{ $user->no_hp }}"
                                                data-tempat-lahir="{{ $user->tempat_lahir }}"
                                                data-tanggal-lahir="{{ $user->tanggal_lahir }}"
                                                data-pekerjaan="{{ $user->mata_pencaharian }}">
                                            {{ $user->nama_lengkap }} - {{ $user->nik }}
                                        </option>
                                    @endforeach
                                </select>
                                <div id="userInfo" class="mt-2" style="display: none;">
                                    <small class="text-muted">
                                        <div><strong>NIK:</strong> <span id="displayNik"></span></div>
                                        <div><strong>Alamat:</strong> <span id="displayAlamat"></span></div>
                                        <div><strong>No HP:</strong> <span id="displayNoHp"></span></div>
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="jenis_surat" class="form-label">Jenis Surat <span class="text-danger">*</span></label>
                                <select class="form-select" id="jenis_surat" name="jenis_surat" required>
                                    <option value="">Pilih Jenis Surat...</option>
                                    <option value="surat_kehilangan">Surat Keterangan Kehilangan</option>
                                    <option value="surat_bersih_diri">Surat Keterangan Bersih Diri</option>
                                    <option value="sppd">SPPD (Surat Perintah Perjalanan Dinas)</option>
                                    <option value="izin_keramaian">Surat Izin Keramaian</option>
                                    <option value="ket_belum_menikah">Surat Keterangan Belum Menikah</option>
                                    <option value="surat_berkelakuan_baik">Surat Keterangan Berkelakuan Baik</option>
                                    <option value="surat_domisili">Surat Keterangan Domisili</option>
                                    <option value="ket_usaha">Surat Keterangan Usaha</option>
                                    {{-- <option value="surat_tidak_mampu">Surat Keterangan Tidak Mampu</option> --}}
                                    <option value="surat_kematian">Surat Keterangan Kematian</option>
                                    <option value="ket_menikah">Surat Keterangan Menikah</option>
                                    <option value="ket_miskin_dtks">Surat Keterangan Miskin DTKS</option>
                                    <option value="ket_penghasilan_ortu">Surat Keterangan Penghasilan Orang Tua</option>
                                    <option value="pengantar_nikah">Surat Pengantar Nikah</option>
                                    <option value="surat_hibah">Surat Keterangan Hibah</option>
                                    <option value="perjanjian_perdamaian">Surat Perjanjian Perdamaian</option>
                                    <option value="surat_pindah">Surat Pindah</option>
                                    <option value="surat_undangan">Surat Undangan</option>
                                </select>
                            </div>
                        </div>

                        <!-- Nomor Surat -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="no_surat" class="form-label">Nomor Surat <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="no_surat" id="no_surat" required
                                       placeholder="Contoh: 001/DES/2025">
                                <div class="form-text">Masukkan nomor surat untuk surat yang akan dibuat</div>
                            </div>
                        </div>

                        <!-- TTD Options -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="jenis_ttd" class="form-label">Jenis Tanda Tangan <span class="text-danger">*</span></label>
                                <select class="form-select" id="jenis_ttd" name="jenis_ttd" required>
                                    <option value="">Pilih Jenis TTD</option>
                                    <option value="manual">TTD Manual</option>
                                    <option value="gambar">TTD Gambar</option>
                                    <option value="qrcode">TTD QR Code</option>
                                </select>
                                <div class="form-text">
                                    <small class="text-muted">
                                        <strong>TTD Manual:</strong> Tanda tangan langsung di kantor (surat diambil di kantor)<br>
                                        <strong>TTD Gambar:</strong> Menggunakan gambar tanda tangan digital<br>
                                        <strong>TTD QR Code:</strong> Menggunakan QR code yang dapat diverifikasi
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Notifikasi WhatsApp</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="kirim_wa" name="kirim_wa" value="1">
                                    <span class="wa-options" style="display: none;">
                                        <label class="form-check-label" for="kirim_wa">Kirim PDF ke WhatsApp user</label>
                                    </span>
                                </div>
                                <div class="wa-options mt-1" style="display: none;">
                                    <small class="text-muted">Pilihan akan muncul setelah memilih jenis TTD dan user.</small>
                                </div>
                                <div id="waWarning" class="alert alert-warning mt-2" style="display: none;">
                                    <small><i class="fas fa-exclamation-triangle"></i> User belum melengkapi nomor HP. PDF tidak dapat dikirim via WhatsApp.</small>
                                </div>
                            </div>
                        </div>

                        <!-- Dynamic Form Area -->
                        <div id="dynamicFormArea">
                            <!-- Form akan dimuat di sini berdasarkan jenis surat yang dipilih -->
                        </div>

                        <!-- Submit Buttons -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="separator border-2 my-5"></div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="ki-duotone ki-check fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Buat Surat
                                </button>
                                <a href="{{ route('admin.pengajuan-surat.index') }}" class="btn btn-secondary">
                                    <i class="ki-duotone ki-arrow-left fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Dynamic Form Templates -->
<div id="formTemplates" style="display: none;">
    <!-- Template Surat Kehilangan -->
    <div id="template-surat_kehilangan">
        <h5 class="mb-3"><i class="fas fa-file-alt"></i> Data Surat Keterangan Kehilangan</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="jenis_dokumen" class="form-label">Jenis Dokumen Hilang <span class="text-danger">*</span></label>
                <select class="form-select" name="jenis_dokumen" required>
                    <option value="">Pilih Jenis Dokumen...</option>
                    <option value="KTP">Kartu Tanda Penduduk (KTP)</option>
                    <option value="KK">Kartu Keluarga (KK)</option>
                    <option value="SIM">Surat Izin Mengemudi (SIM)</option>
                    <option value="Paspor">Paspor</option>
                    <option value="Ijazah">Ijazah</option>
                    <option value="STNK">STNK</option>
                    <option value="BPKB">BPKB</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="col-md-6" id="nama_barang_lainnya_wrapper" style="display: none;">
                <label for="nama_barang_lainnya" class="form-label">Nama Barang Lainnya</label>
                <input type="text" class="form-control" name="nama_barang_lainnya"
                       placeholder="Contoh: Jam tangan, Tas, Sepatu, dll">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nomor_dokumen" class="form-label">Nomor Dokumen</label>
                <input type="text" class="form-control" name="nomor_dokumen"
                       placeholder="Nomor dokumen yang hilang (jika ada)">
            </div>
            <div class="col-md-6">
                <label for="tempat_kehilangan" class="form-label">Tempat Kehilangan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="tempat_kehilangan" required
                       placeholder="Contoh: Di jalan raya Ketapang Baru">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="waktu_kehilangan" class="form-label">Perkiraan Waktu Kehilangan <span class="text-danger">*</span></label>
                <select class="form-select" name="waktu_kehilangan" id="waktu_kehilangan" required>
                    <option value="">Pilih perkiraan waktu...</option>
                    <option value="1 Bulan yang lalu">1 Bulan yang lalu</option>
                    <option value="2 Bulan yang lalu">2 Bulan yang lalu</option>
                    <option value="3 Bulan yang lalu">3 Bulan yang lalu</option>
                    <option value="4 Bulan yang lalu">4 Bulan yang lalu</option>
                    <option value="5 Bulan yang lalu">5 Bulan yang lalu</option>
                    <option value="6 Bulan yang lalu">6 Bulan yang lalu</option>
                    <option value="Lebih dari 6 Bulan">Lebih dari 6 Bulan</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="col-md-6" id="keterangan_waktu_wrapper" style="display: none;">
                <label for="keterangan_waktu" class="form-label">Keterangan Waktu</label>
                <input type="text" class="form-control" name="keterangan_waktu"
                       placeholder="Contoh: 2 minggu yang lalu, 1 tahun yang lalu">
            </div>
        </div>
        <div class="mb-3">
            <label for="keperluan" class="form-label">Keperluan <span class="text-danger">*</span></label>
            <textarea class="form-control" name="keperluan" rows="3" required
                      placeholder="Contoh: Untuk mengurus penggantian dokumen yang hilang"></textarea>
        </div>
    </div>

    <!-- Template Surat Bersih Diri -->
    <div id="template-surat_bersih_diri">
        <h5 class="mb-3"><i class="fas fa-file-alt"></i> Data Surat Keterangan Bersih Diri</h5>
        <div class="row mb-3">
            <div class="col-md-12">
                <h6 class="text-muted">Data Ayah</h6>
            </div>
            <div class="col-md-6">
                <label for="nama_ayah" class="form-label">Nama Ayah <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama_ayah" required>
            </div>
            <div class="col-md-3">
                <label for="umur_ayah" class="form-label">Umur <span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="umur_ayah" required>
            </div>
            <div class="col-md-3">
                <label for="agama_ayah" class="form-label">Agama <span class="text-danger">*</span></label>
                <select class="form-select" name="agama_ayah" required>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="pekerjaan_ayah" required>
            </div>
            <div class="col-md-6">
                <label for="alamat_ayah" class="form-label">Alamat Ayah <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="alamat_ayah" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <h6 class="text-muted">Data Ibu</h6>
            </div>
            <div class="col-md-6">
                <label for="nama_ibu" class="form-label">Nama Ibu <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama_ibu" required>
            </div>
            <div class="col-md-3">
                <label for="umur_ibu" class="form-label">Umur <span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="umur_ibu" required>
            </div>
            <div class="col-md-3">
                <label for="agama_ibu" class="form-label">Agama <span class="text-danger">*</span></label>
                <select class="form-select" name="agama_ibu" required>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="pekerjaan_ibu" required>
            </div>
            <div class="col-md-6">
                <label for="alamat_ibu" class="form-label">Alamat Ibu <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="alamat_ibu" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <h6 class="text-muted">Data Tambahan Anak</h6>
            </div>
            <div class="col-md-6">
                <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="tempat_lahir" required>
            </div>
            <div class="col-md-6">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="tanggal_lahir" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="kebangsaan" class="form-label">Kebangsaan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="kebangsaan" value="Indonesia" required>
            </div>
            <div class="col-md-6">
                <label for="agama" class="form-label">Agama <span class="text-danger">*</span></label>
                <select class="form-select" name="agama" required>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="pekerjaan" class="form-label">Pekerjaan <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="pekerjaan" required>
        </div>
    </div>

    <!-- Template Surat Domisili -->
    <div id="template-surat_domisili">
        <h5 class="mb-3"><i class="fas fa-file-alt"></i> Data Surat Keterangan Domisili</h5>
        <div class="mb-3">
            <label for="keperluan" class="form-label">Keperluan <span class="text-danger">*</span></label>
            <textarea class="form-control" name="keperluan" rows="3" required
                      placeholder="Contoh: Untuk keperluan administrasi pekerjaan"></textarea>
        </div>
        <div class="alert alert-info">
            <i class="fas fa-info-circle me-2"></i>
            <strong>Informasi:</strong> Data pribadi akan diambil otomatis dari data warga yang dipilih di atas.
        </div>
    </div>

    <!-- Template Surat Usaha -->
    <div id="template-ket_usaha">
        <h5 class="mb-3"><i class="fas fa-file-alt"></i> Data Surat Keterangan Usaha</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nama_usaha" class="form-label">Nama Usaha <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama_usaha" required
                       placeholder="Contoh: Toko Sembako Berkah">
            </div>
            <div class="col-md-6">
                <label for="jenis_usaha" class="form-label">Jenis Usaha <span class="text-danger">*</span></label>
                <select class="form-select" name="jenis_usaha" required>
                    <option value="">Pilih Jenis Usaha...</option>
                    <option value="Perdagangan">Perdagangan</option>
                    <option value="Jasa">Jasa</option>
                    <option value="Industri">Industri</option>
                    <option value="Pertanian">Pertanian</option>
                    <option value="Perikanan">Perikanan</option>
                    <option value="Peternakan">Peternakan</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
        </div>
        <div class="alert alert-info">
            <i class="fas fa-info-circle me-2"></i>
            <strong>Informasi:</strong> Data pribadi akan diambil otomatis dari data warga yang dipilih di atas.
        </div>
    </div>

    {{-- Template Surat Tidak Mampu - DISABLED --}}
    {{--
    <div id="template-surat_tidak_mampu">
        <h5 class="mb-3"><i class="fas fa-file-alt"></i> Data Surat Keterangan Tidak Mampu</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="pekerjaan_pemohon" class="form-label">Pekerjaan Pemohon <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="pekerjaan_pemohon" required
                       placeholder="Contoh: Buruh tani">
            </div>
            <div class="col-md-6">
                <label for="penghasilan_per_bulan" class="form-label">Penghasilan per Bulan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="penghasilan_per_bulan" required
                       placeholder="Contoh: Rp 1.000.000">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="jumlah_tanggungan" class="form-label">Jumlah Tanggungan Keluarga <span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="jumlah_tanggungan" min="0" required
                       placeholder="Contoh: 4">
            </div>
            <div class="col-md-6">
                <label for="kondisi_rumah" class="form-label">Kondisi Rumah <span class="text-danger">*</span></label>
                <select class="form-select" name="kondisi_rumah" required>
                    <option value="">Pilih Kondisi Rumah...</option>
                    <option value="Milik Sendiri">Milik Sendiri</option>
                    <option value="Sewa/Kontrak">Sewa/Kontrak</option>
                    <option value="Menumpang">Menumpang</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="luas_tanah" class="form-label">Luas Tanah yang Dimiliki</label>
                <input type="text" class="form-control" name="luas_tanah"
                       placeholder="Contoh: 500 m² atau Tidak ada">
            </div>
            <div class="col-md-6">
                <label for="aset_lainnya" class="form-label">Aset Lainnya</label>
                <input type="text" class="form-control" name="aset_lainnya"
                       placeholder="Contoh: Sepeda motor atau Tidak ada">
            </div>
        </div>
        <div class="mb-3">
            <label for="keperluan" class="form-label">Keperluan <span class="text-danger">*</span></label>
            <textarea class="form-control" name="keperluan" rows="3" required
                      placeholder="Contoh: Untuk mendaftar beasiswa anak ke universitas"></textarea>
        </div>
        <div class="mb-3">
            <label for="keterangan_tambahan" class="form-label">Keterangan Tambahan</label>
            <textarea class="form-control" name="keterangan_tambahan" rows="2"
                      placeholder="Informasi tambahan tentang kondisi ekonomi keluarga"></textarea>
        </div>
    </div>
    --}}

    <!-- Template Surat Kematian -->
<div id="template-surat_kematian">
    <h5 class="mb-3"><i class="fas fa-file-alt"></i> Data Surat Keterangan Kematian</h5>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="nama_almarhum" class="form-label">Nama Almarhum/Almarhumah <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama_almarhum" required
                   placeholder="Contoh: HARLENA">
        </div>
        <div class="col-md-6">
            <label for="hari_kematian" class="form-label">Hari Kematian <span class="text-danger">*</span></label>
            <select class="form-select" name="hari_kematian" required>
                <option value="">Pilih Hari...</option>
                <option value="Minggu">Minggu</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="tanggal_kematian" class="form-label">Tanggal Kematian <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="tanggal_kematian" required>
        </div>
        <div class="col-md-6">
            <label for="tempat_kematian" class="form-label">Tempat Kematian <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="tempat_kematian" required
                   placeholder="Contoh: Ketapang Baru">
        </div>
    </div>
    <div class="mb-3">
        <label for="sebab_kematian" class="form-label">Sebab Kematian <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="sebab_kematian" required
               placeholder="Contoh: Sakit / Usia Lanjut / Kecelakaan">
    </div>
</div>

<!-- Template untuk SPPD -->
<div id="template-sppd" style="display: none;">
    <!-- Personel Section -->
    <div class="mb-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <label class="form-label fw-bold">Personel yang Diperintahkan <span class="text-danger">*</span></label>
            <button type="button" class="btn btn-sm btn-primary" onclick="tambahPersonelSPPD()">
                <i class="fas fa-plus me-1"></i>Tambah Personel
            </button>
        </div>

        <div id="personel-container-sppd">
            <!-- Personel pertama (wajib) -->
            <div class="personel-item-sppd card mb-3" data-index="0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0">Personel #1</h6>
                        <button type="button" class="btn btn-sm btn-danger d-none" onclick="hapusPersonelSPPD(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Nama <span class="text-danger">*</span></label>
                            <select class="form-select personel-warga-select-init" name="personel[0][warga_id]" required>
                                <option value="">Pilih Warga...</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" data-nama="{{ $user->nama_lengkap }}">
                                        {{ $user->nama_lengkap }} - {{ $user->nik }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jabatan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="personel[0][jabatan]" required
                                   placeholder="Contoh: Ketua Bidang Usaha">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="tujuan_perjalanan" class="form-label">Tujuan Perjalanan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="tujuan_perjalanan" required
                       placeholder="Contoh: Kantor Camat SAM">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="keperluan" class="form-label">Untuk/Keperluan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="keperluan" required
                       placeholder="Contoh: Sosialisasi Koperasi Desa Merah Putih">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="tanggal_berangkat" class="form-label">Tanggal Berangkat <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="tanggal_berangkat" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="tanggal_kembali" class="form-label">Tanggal Kembali <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="tanggal_kembali" required>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="transportasi" class="form-label">Transportasi <span class="text-danger">*</span></label>
        <select class="form-select" name="transportasi" required>
            <option value="">Pilih Transportasi...</option>
            <option value="Roda Dua/Motor">Roda Dua/Motor</option>
            <option value="Roda Empat/Mobil">Roda Empat/Mobil</option>
            <option value="Kendaraan Dinas">Kendaraan Dinas</option>
            <option value="Alat Angkutan Umum">Alat Angkutan Umum</option>
            <option value="Lainnya">Lainnya</option>
        </select>
    </div>

    <hr>
    <h5 class="mb-3"><i class="fas fa-money-bill-wave"></i> Rincian Biaya Perjalanan Dinas</h5>
    <div class="alert alert-info py-2">
        <small>Isi komponen biaya perjalanan dinas di bawah ini. Anda bisa menambah/menghapus baris sesuai kebutuhan.</small>
    </div>
    <table class="table table-bordered align-middle" id="tabel-biaya-sppd">
        <thead class="table-light">
            <tr>
                <th style="width: 40%">Perincian Biaya</th>
                <th style="width: 25%">Jumlah (Rp)</th>
                <th style="width: 25%">Keterangan</th>
                <th style="width: 10%" class="text-center">
                    <button type="button" class="btn btn-sm btn-light-primary" id="tambah-baris-biaya">
                        <i class="fas fa-plus"></i>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="text" name="biaya[0][uraian]" class="form-control" placeholder="Contoh: Uang Harian" required>
                </td>
                <td>
                    <input type="number" name="biaya[0][jumlah]" class="form-control" min="0" placeholder="Contoh: 50000" required>
                </td>
                <td>
                    <input type="text" name="biaya[0][ket]" class="form-control" placeholder="Opsional">
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm btn-light-danger btn-hapus-baris-biaya" style="display:none;">
                        <i class="fas fa-minus"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Template untuk Surat Izin Keramaian -->
<div id="template-izin_keramaian" style="display: none;">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="nama_kegiatan" class="form-label">Nama Kegiatan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama_kegiatan" required
                       placeholder="Contoh: Perayaan 17 Agustus">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan <span class="text-danger">*</span></label>
                <select class="form-select" name="jenis_kegiatan" required>
                    <option value="">Pilih Jenis Kegiatan...</option>
                    <option value="Perayaan">Perayaan</option>
                    <option value="Olahraga">Olahraga</option>
                    <option value="Keagamaan">Keagamaan</option>
                    <option value="Budaya">Budaya</option>
                    <option value="Sosial">Sosial</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="tanggal_kegiatan" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="waktu_kegiatan" class="form-label">Waktu Kegiatan <span class="text-danger">*</span></label>
                <input type="time" class="form-control" name="waktu_kegiatan" required>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="tempat_kegiatan" class="form-label">Tempat Kegiatan <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="tempat_kegiatan" required
               placeholder="Contoh: Lapangan Desa Ketapang Baru">
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="penanggung_jawab" class="form-label">Penanggung Jawab <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="penanggung_jawab" required
                       placeholder="Nama penanggung jawab kegiatan">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="jumlah_peserta" class="form-label">Perkiraan Jumlah Peserta <span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="jumlah_peserta" min="1" required
                       placeholder="Contoh: 100">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="keperluan" class="form-label">Keperluan <span class="text-danger">*</span></label>
        <textarea class="form-control" name="keperluan" rows="3" required
                  placeholder="Jelaskan tujuan dan keperluan izin keramaian"></textarea>
    </div>
</div>

<!-- Template untuk Surat Keterangan Belum Menikah -->
<div id="template-ket_belum_menikah" style="display: none;">
    <div class="mb-3">
        <label for="keperluan" class="form-label">Keperluan <span class="text-danger">*</span></label>
        <textarea class="form-control" name="keperluan" rows="3" required
                  placeholder="Contoh: Untuk melamar pekerjaan di perusahaan XYZ"></textarea>
    </div>
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        <strong>Informasi:</strong> Data pribadi akan diambil otomatis dari data warga yang dipilih di atas.
    </div>
</div>

<!-- Template untuk Surat Keterangan Berkelakuan Baik -->
<div id="template-surat_berkelakuan_baik" style="display: none;">
    <div class="mb-3">
        <label for="keperluan" class="form-label">Keperluan <span class="text-danger">*</span></label>
        <textarea class="form-control" name="keperluan" rows="3" required
                  placeholder="Contoh: Untuk melamar pekerjaan sebagai PNS"></textarea>
    </div>
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        <strong>Informasi:</strong> Data pribadi akan diambil otomatis dari data warga yang dipilih di atas.
    </div>
</div>

<!-- Template untuk Surat Keterangan Menikah -->
<div id="template-ket_menikah" style="display: none;">
    <h5 class="mb-3"><i class="fas fa-file-alt"></i> Data Surat Keterangan Menikah</h5>
    <div class="mb-3">
        <label for="tanggal_menikah" class="form-label">Tanggal Menikah <span class="text-danger">*</span></label>
        <input type="date" class="form-control" name="tanggal_menikah" required>
    </div>
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        <strong>Informasi:</strong> Data pribadi akan diambil otomatis dari data warga yang dipilih di atas.
    </div>
</div>

<!-- Template untuk Surat Keterangan Miskin DTKS -->
<div id="template-ket_miskin_dtks" style="display: none;">
    <h5 class="mb-3"><i class="fas fa-file-alt"></i> Data Surat Keterangan Miskin DTKS</h5>
    <div class="mb-3">
        <label for="keperluan" class="form-label">Keperluan <span class="text-danger">*</span></label>
        <textarea class="form-control" name="keperluan" rows="3" required
                  placeholder="Contoh: Untuk mendaftar program bantuan sosial"></textarea>
    </div>
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        <strong>Informasi:</strong> Data pribadi akan diambil otomatis dari data warga yang dipilih di atas.
    </div>
</div>

<!-- Template untuk Surat Keterangan Penghasilan Orang Tua -->
<div id="template-ket_penghasilan_ortu" style="display: none;">
    <h5 class="mb-3"><i class="fas fa-file-alt"></i> Data Surat Keterangan Penghasilan Orang Tua</h5>

    <!-- Data Ayah -->
    <div class="row mb-3">
        <div class="col-md-12">
            <h6 class="text-primary mb-3"><i class="fas fa-male"></i> Data Ayah</h6>
        </div>
        <div class="col-md-6">
            <label for="nama_ayah" class="form-label">Nama Lengkap Ayah <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama_ayah" required placeholder="Masukkan nama lengkap ayah">
        </div>
        <div class="col-md-6">
            <label for="umur_ayah" class="form-label">Umur Ayah <span class="text-danger">*</span></label>
            <input type="number" class="form-control" name="umur_ayah" min="1" max="120" required placeholder="Contoh: 45">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="pekerjaan_ayah" required placeholder="Contoh: Petani, Wiraswasta, Buruh">
        </div>
        <div class="col-md-6">
            <label for="penghasilan_ayah" class="form-label">Penghasilan per Bulan Ayah <span class="text-danger">*</span></label>
            <input type="number" class="form-control" name="penghasilan_ayah" min="0" required placeholder="Contoh: 2500000 (tanpa titik atau koma)">
            <div class="form-text">Masukkan dalam bentuk angka (Rupiah)</div>
        </div>
    </div>
    <div class="mb-3">
        <label for="alamat_ayah" class="form-label">Alamat Ayah <span class="text-danger">*</span></label>
        <textarea class="form-control" name="alamat_ayah" rows="2" required placeholder="Alamat lengkap tempat tinggal ayah"></textarea>
    </div>

    <!-- Data Ibu -->
    <div class="row mb-3 mt-4">
        <div class="col-md-12">
            <h6 class="text-info mb-3"><i class="fas fa-female"></i> Data Ibu</h6>
        </div>
        <div class="col-md-6">
            <label for="nama_ibu" class="form-label">Nama Lengkap Ibu <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama_ibu" required placeholder="Masukkan nama lengkap ibu">
        </div>
        <div class="col-md-6">
            <label for="umur_ibu" class="form-label">Umur Ibu <span class="text-danger">*</span></label>
            <input type="number" class="form-control" name="umur_ibu" min="1" max="120" required placeholder="Contoh: 42">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="pekerjaan_ibu" required placeholder="Contoh: Ibu Rumah Tangga, Pedagang, Guru">
        </div>
        <div class="col-md-6">
            <label for="penghasilan_ibu" class="form-label">Penghasilan per Bulan Ibu <span class="text-danger">*</span></label>
            <input type="number" class="form-control" name="penghasilan_ibu" min="0" required placeholder="Contoh: 1500000 (tanpa titik atau koma)">
            <div class="form-text">Masukkan dalam bentuk angka (Rupiah). Isi 0 jika tidak berpenghasilan</div>
        </div>
    </div>
    <div class="mb-3">
        <label for="alamat_ibu" class="form-label">Alamat Ibu <span class="text-danger">*</span></label>
        <textarea class="form-control" name="alamat_ibu" rows="2" required placeholder="Alamat lengkap tempat tinggal ibu"></textarea>
    </div>

    <!-- File Upload -->
    <div class="mb-3">
        <label for="lampiran" class="form-label">Lampiran Dokumen Pendukung</label>
        <input type="file" class="form-control" name="lampiran" accept=".pdf,.jpg,.jpeg,.png" >
        <div class="form-text">
            Upload dokumen pendukung seperti slip gaji, surat keterangan kerja, atau dokumen penghasilan lainnya (Opsional)
        </div>
    </div>

    <div class="alert alert-warning">
        <i class="fas fa-exclamation-triangle me-2"></i>
        <strong>Perhatian:</strong> Pastikan data yang diinputkan sesuai dengan kondisi sebenarnya karena akan digunakan untuk keperluan resmi.
    </div>
</div>

<!-- Template untuk Surat Pengantar Nikah -->
<div id="template-pengantar_nikah" style="display: none;">
    <h5 class="mb-3"><i class="fas fa-heart"></i> Data Surat Pengantar Nikah</h5>
    
    <!-- Status Perkawinan -->
    <h6 class="text-primary mt-3 mb-2"><i class="fas fa-ring"></i> Status Perkawinan</h6>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="status_pria" class="form-label">Status Pria <span class="text-danger">*</span></label>
            <select class="form-select" name="status_pria" required>
                <option value="">Pilih...</option>
                <option value="Jejaka">Jejaka</option>
                <option value="Duda">Duda</option>
                <option value="Beristri">Beristri</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="beristri_ke" class="form-label">Beristri Ke-</label>
            <input type="number" class="form-control" name="beristri_ke" min="1" placeholder="Isi jika beristri">
        </div>
        <div class="col-md-3">
            <label for="status_wanita" class="form-label">Status Wanita <span class="text-danger">*</span></label>
            <select class="form-select" name="status_wanita" required>
                <option value="">Pilih...</option>
                <option value="Perawan">Perawan</option>
                <option value="Janda">Janda</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="nama_pasangan_terdahulu" class="form-label">Nama Pasangan Terdahulu</label>
            <input type="text" class="form-control" name="nama_pasangan_terdahulu" placeholder="Jika duda/janda">
        </div>
    </div>

    <!-- Data Ayah -->
    <h6 class="text-primary mt-3 mb-2"><i class="fas fa-male"></i> Data Ayah (Orang Tua Pemohon)</h6>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="ayah_nama" class="form-label">Nama Ayah <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="ayah_nama" required>
        </div>
        <div class="col-md-4">
            <label for="ayah_bin" class="form-label">Bin (Nama Kakek)</label>
            <input type="text" class="form-control" name="ayah_bin" placeholder="Nama kakek dari pemohon">
        </div>
        <div class="col-md-4">
            <label for="ayah_nik" class="form-label">NIK Ayah <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="ayah_nik" required maxlength="16">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="ayah_tempat_tanggal_lahir" class="form-label">Tempat & Tanggal Lahir <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="ayah_tempat_tanggal_lahir" required placeholder="Bengkulu, 10 Januari 1965">
        </div>
        <div class="col-md-4">
            <label for="ayah_agama" class="form-label">Agama <span class="text-danger">*</span></label>
            <select class="form-select" name="ayah_agama" required>
                <option value="">Pilih...</option>
                <option value="Islam">Islam</option>
                <option value="Kristen Protestan">Kristen Protestan</option>
                <option value="Kristen Katolik">Kristen Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="ayah_pekerjaan" class="form-label">Pekerjaan <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="ayah_pekerjaan" required>
        </div>
    </div>
    <div class="mb-3">
        <label for="ayah_alamat" class="form-label">Alamat Ayah <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="ayah_alamat" required>
    </div>

    <!-- Data Ibu (Orang Tua Pemohon) -->
    <h6 class="text-primary mt-3 mb-2"><i class="fas fa-female"></i> Data Ibu (Orang Tua Pemohon)</h6>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="ibu_nama" class="form-label">Nama Ibu <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="ibu_nama" required>
        </div>
        <div class="col-md-4">
            <label for="ibu_bin" class="form-label">Binti (Nama Ayah Ibu)</label>
            <input type="text" class="form-control" name="ibu_bin" placeholder="Nama kakek dari pemohon (dari ibu)">
        </div>
        <div class="col-md-4">
            <label for="ibu_nik" class="form-label">NIK Ibu <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="ibu_nik" required maxlength="16">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="ibu_tempat_tanggal_lahir" class="form-label">Tempat & Tanggal Lahir <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="ibu_tempat_tanggal_lahir" required placeholder="Palembang, 5 Maret 1995">
        </div>
        <div class="col-md-4">
            <label for="ibu_warga_negara" class="form-label">Kewarganegaraan <span class="text-danger">*</span></label>
            <select class="form-select" name="ibu_warga_negara" required>
                <option value="Indonesia">Indonesia</option>
                <option value="Warga Negara Asing">Warga Negara Asing</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="ibu_agama" class="form-label">Agama <span class="text-danger">*</span></label>
            <select class="form-select" name="ibu_agama" required>
                <option value="">Pilih...</option>
                <option value="Islam">Islam</option>
                <option value="Kristen Protestan">Kristen Protestan</option>
                <option value="Kristen Katolik">Kristen Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="ibu_pekerjaan" class="form-label">Pekerjaan <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="ibu_pekerjaan" required>
        </div>
        <div class="col-md-6">
            <label for="ibu_alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="ibu_alamat" required>
        </div>
    </div>

    <!-- Data Calon Istri (untuk Surat Persetujuan Mempelai) -->
    <h6 class="text-primary mt-3 mb-2"><i class="fas fa-heart"></i> Data Calon Istri (untuk Surat Persetujuan Mempelai)</h6>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="calon_istri_nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="calon_istri_nama" required>
        </div>
        <div class="col-md-6">
            <label for="calon_istri_bin" class="form-label">Bin/Binti <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="calon_istri_bin" required placeholder="Nama ayah calon istri">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="calon_istri_nik" class="form-label">NIK <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="calon_istri_nik" required maxlength="16">
        </div>
        <div class="col-md-6">
            <label for="calon_istri_tempat_tanggal_lahir" class="form-label">Tempat & Tanggal Lahir <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="calon_istri_tempat_tanggal_lahir" required placeholder="Padang, 14 Juni 1990">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="calon_istri_warga_negara" class="form-label">Kewarganegaraan <span class="text-danger">*</span></label>
            <select class="form-select" name="calon_istri_warga_negara" required>
                <option value="Indonesia">Indonesia</option>
                <option value="Warga Negara Asing">Warga Negara Asing</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="calon_istri_agama" class="form-label">Agama <span class="text-danger">*</span></label>
            <select class="form-select" name="calon_istri_agama" required>
                <option value="">Pilih...</option>
                <option value="Islam">Islam</option>
                <option value="Kristen Protestan">Kristen Protestan</option>
                <option value="Kristen Katolik">Kristen Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="calon_istri_pekerjaan" class="form-label">Pekerjaan <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="calon_istri_pekerjaan" required>
        </div>
    </div>
    <div class="mb-3">
        <label for="calon_istri_alamat" class="form-label">Tempat Tinggal <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="calon_istri_alamat" required>
    </div>
</div>

<!-- Template untuk Surat Pindah -->
<div id="template-surat_pindah" style="display: none;">
    <h5 class="mb-3"><i class="fas fa-file-alt"></i> Data Surat Pindah</h5>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="alasan_pindah" class="form-label">Alasan Pindah <span class="text-danger">*</span></label>
            <select class="form-select" name="alasan_pindah" required>
                <option value="">Pilih Alasan...</option>
                <option value="Pekerjaan">Pekerjaan</option>
                <option value="Pendidikan">Pendidikan</option>
                <option value="Keamanan">Keamanan</option>
                <option value="Kesehatan">Kesehatan</option>
                <option value="Perumahan">Perumahan</option>
                <option value="Keluarga">Keluarga</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="tanggal_pindah" class="form-label">Tanggal Pindah <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="tanggal_pindah" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="alamat_tujuan" class="form-label">Alamat Tujuan <span class="text-danger">*</span></label>
            <textarea class="form-control" name="alamat_tujuan" rows="3" required
                      placeholder="Alamat lengkap tujuan pindah"></textarea>
        </div>
        <div class="col-md-6">
            <label for="jenis_pindah" class="form-label">Jenis Pindah <span class="text-danger">*</span></label>
            <select class="form-select" name="jenis_pindah" required>
                <option value="">Pilih Jenis...</option>
                <option value="Dalam Provinsi">Dalam Provinsi</option>
                <option value="Antar Provinsi">Antar Provinsi</option>
                <option value="Antar Negara">Antar Negara</option>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <label for="keperluan" class="form-label">Keperluan</label>
        <textarea class="form-control" name="keperluan" rows="2"
                  placeholder="Contoh: Untuk keperluan administrasi kependudukan"></textarea>
    </div>

    <!-- Data Camat (opsional) -->
    <h6 class="mt-4 mb-3"><i class="fas fa-user-tie text-info me-2"></i>Data Camat (Opsional)</h6>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="nama_camat" class="form-label">Nama Camat</label>
            <input type="text" class="form-control" name="nama_camat" 
                   placeholder="Nama lengkap Camat (kosongkan jika tidak diketahui)">
        </div>
        <div class="col-md-6">
            <label for="nip_camat" class="form-label">NIP Camat</label>
            <input type="text" class="form-control" name="nip_camat" 
                   placeholder="NIP Camat (kosongkan jika tidak diketahui)">
        </div>
    </div>

    <!-- Pengikut Section -->
    <div class="card border-primary mb-3">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h6 class="mb-0"><i class="fas fa-users me-2"></i>Data Pengikut (Anggota Keluarga yang Ikut Pindah)</h6>
            <button type="button" class="btn btn-light btn-sm" id="addPengikutBtn">
                <i class="fas fa-plus me-1"></i>Tambah Pengikut
            </button>
        </div>
        <div class="card-body">
            <div id="pengikutContainer">
                <!-- Pengikut items will be added here dynamically -->
            </div>
            <div class="text-muted text-center py-3" id="noPengikutText">
                <i class="fas fa-info-circle me-1"></i>Belum ada pengikut. Klik tombol "Tambah Pengikut" untuk menambahkan.
            </div>
    </div>
</div>

<!-- Template untuk Surat Hibah -->
<div id="template-surat_hibah" style="display: none;">
    <h5 class="mb-3"><i class="fas fa-hand-holding-heart"></i> Data Surat Keterangan Hibah</h5>
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        <strong>Informasi:</strong> Data Penghibah (Nama, Umur, Pekerjaan, Agama, Alamat) akan diambil otomatis dari data warga yang dipilih.
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="hari_tanggal" class="form-label">Hari/Tanggal Hibah <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="hari_tanggal" required placeholder="Contoh: Senin Tanggal Lima Bulan Mei">
        </div>
        <div class="col-md-6">
            <label for="luas_tanah" class="form-label">Luas Tanah (M²) <span class="text-danger">*</span></label>
            <input type="number" class="form-control" name="luas_tanah" required placeholder="Luas dalam M²">
        </div>
    </div>
    <h6 class="mt-3 mb-2">Batas-batas Tanah</h6>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="batas_utara" class="form-label">Batas Utara <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="batas_utara" required placeholder="Batas utara">
        </div>
        <div class="col-md-3">
            <label for="pemilik_utara" class="form-label">Pemilik Utara <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="pemilik_utara" required placeholder="Nama pemilik">
        </div>
        <div class="col-md-3">
            <label for="batas_selatan" class="form-label">Batas Selatan <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="batas_selatan" required placeholder="Batas selatan">
        </div>
        <div class="col-md-3">
            <label for="pemilik_selatan" class="form-label">Pemilik Selatan <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="pemilik_selatan" required placeholder="Nama pemilik">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="batas_barat" class="form-label">Batas Barat <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="batas_barat" required placeholder="Batas barat">
        </div>
        <div class="col-md-3">
            <label for="pemilik_barat" class="form-label">Pemilik Barat <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="pemilik_barat" required placeholder="Nama pemilik">
        </div>
        <div class="col-md-3">
            <label for="batas_timur" class="form-label">Batas Timur <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="batas_timur" required placeholder="Batas timur">
        </div>
        <div class="col-md-3">
            <label for="pemilik_timur" class="form-label">Pemilik Timur <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="pemilik_timur" required placeholder="Nama pemilik">
        </div>
    </div>
    <h6 class="mt-3 mb-2">Saksi-saksi</h6>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="saksi_1" class="form-label">Saksi 1 <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="saksi_1" required placeholder="Nama saksi 1">
        </div>
        <div class="col-md-4">
            <label for="saksi_2" class="form-label">Saksi 2 <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="saksi_2" required placeholder="Nama saksi 2">
        </div>
        <div class="col-md-4">
            <label for="saksi_3" class="form-label">Saksi 3 <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="saksi_3" required placeholder="Nama saksi 3">
        </div>
    </div>
</div>

<!-- Template untuk Surat Perjanjian Perdamaian -->
<div id="template-perjanjian_perdamaian" style="display: none;">
    <h5 class="mb-3"><i class="fas fa-handshake"></i> Data Surat Perjanjian Perdamaian</h5>
    <h6 class="mt-3 mb-2">Data Pihak Pertama</h6>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="pihak1_nama" class="form-label">Nama Pihak 1 <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="pihak1_nama" required placeholder="Nama lengkap pihak 1">
        </div>
        <div class="col-md-6">
            <label for="pihak1_umur" class="form-label">Umur Pihak 1 <span class="text-danger">*</span></label>
            <input type="number" class="form-control" name="pihak1_umur" required placeholder="Umur dalam tahun">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="pihak1_pekerjaan" class="form-label">Pekerjaan Pihak 1 <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="pihak1_pekerjaan" required placeholder="Contoh: Wiraswasta">
        </div>
        <div class="col-md-6">
            <label for="pihak1_agama" class="form-label">Agama Pihak 1 <span class="text-danger">*</span></label>
            <select class="form-select" name="pihak1_agama" required>
                <option value="">Pilih Agama...</option>
                <option value="Islam">Islam</option>
                <option value="Kristen Protestan">Kristen Protestan</option>
                <option value="Kristen Katolik">Kristen Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <label for="pihak1_alamat" class="form-label">Alamat Pihak 1 <span class="text-danger">*</span></label>
        <textarea class="form-control" name="pihak1_alamat" rows="2" required placeholder="Alamat lengkap pihak 1"></textarea>
    </div>

    <h6 class="mt-3 mb-2">Data Pihak Kedua</h6>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="pihak2_nama" class="form-label">Nama Pihak 2 <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="pihak2_nama" required placeholder="Nama lengkap pihak 2">
        </div>
        <div class="col-md-6">
            <label for="pihak2_umur" class="form-label">Umur Pihak 2 <span class="text-danger">*</span></label>
            <input type="number" class="form-control" name="pihak2_umur" required placeholder="Umur dalam tahun">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="pihak2_pekerjaan" class="form-label">Pekerjaan Pihak 2 <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="pihak2_pekerjaan" required placeholder="Contoh: Petani/Pekebun">
        </div>
        <div class="col-md-6">
            <label for="pihak2_agama" class="form-label">Agama Pihak 2 <span class="text-danger">*</span></label>
            <select class="form-select" name="pihak2_agama" required>
                <option value="">Pilih Agama...</option>
                <option value="Islam">Islam</option>
                <option value="Kristen Protestan">Kristen Protestan</option>
                <option value="Kristen Katolik">Kristen Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <label for="pihak2_alamat" class="form-label">Alamat Pihak 2 <span class="text-danger">*</span></label>
        <textarea class="form-control" name="pihak2_alamat" rows="2" required placeholder="Alamat lengkap pihak 2"></textarea>
    </div>

    <h6 class="mt-3 mb-2">Kronologi Kejadian</h6>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="hari_tanggal_perjanjian" class="form-label">Hari/Tanggal Perjanjian <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="hari_tanggal_perjanjian" required placeholder="Contoh: Senin Tanggal Lima Bulan Mei">
        </div>
        <div class="col-md-6">
            <label for="hari_tanggal_kejadian" class="form-label">Hari/Tanggal Kejadian <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="hari_tanggal_kejadian" required placeholder="Contoh: Sabtu Malam Minggu">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="waktu_kejadian" class="form-label">Waktu Kejadian <span class="text-danger">*</span></label>
            <input type="time" class="form-control" name="waktu_kejadian" required>
        </div>
        <div class="col-md-4">
            <label for="jenis_denda" class="form-label">Jenis Denda Adat <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="jenis_denda" required placeholder="Contoh: satu buah jambar tutup ayam">
        </div>
        <div class="col-md-4">
            <label for="nominal_denda" class="form-label">Nominal Denda (Rp) <span class="text-danger">*</span></label>
            <input type="number" class="form-control" name="nominal_denda" required placeholder="Contoh: 250000">
        </div>
    </div>
    <div class="mb-3">
        <label for="terbilang_denda" class="form-label">Nominal Terbilang <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="terbilang_denda" required placeholder="Contoh: Dua Ratus Lima Puluh Ribu Rupiah">
    </div>

    <h6 class="mt-3 mb-2">Saksi-saksi</h6>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="saksi_1" class="form-label">Saksi 1 <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="saksi_1" required placeholder="Nama saksi 1">
        </div>
        <div class="col-md-3">
            <label for="saksi_2" class="form-label">Saksi 2 <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="saksi_2" required placeholder="Nama saksi 2">
        </div>
        <div class="col-md-3">
            <label for="saksi_3" class="form-label">Saksi 3 <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="saksi_3" required placeholder="Nama saksi 3">
        </div>
        <div class="col-md-3">
            <label for="saksi_4" class="form-label">Saksi 4 <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="saksi_4" required placeholder="Nama saksi 4">
        </div>
    </div>
</div>

<!-- Template untuk Surat Undangan -->
<div id="template-surat_undangan" style="display: none;">
    <h5 class="mb-3"><i class="fas fa-envelope"></i> Data Surat Undangan</h5>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="tanggal_surat" class="form-label">Tanggal Surat <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="tanggal_surat" required>
        </div>
        <div class="col-md-6">
            <label for="lampiran" class="form-label">Lampiran</label>
            <input type="text" class="form-control" name="lampiran" placeholder="Contoh: 1 (satu) Berkas">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="perihal" class="form-label">Perihal <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="perihal" required placeholder="Contoh: Panggilan Penting">
        </div>
        <div class="col-md-6">
            <label for="kepada" class="form-label">Kepada <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="kepada" required placeholder="Contoh: Bapak/Ibu Ketua RT 01">
        </div>
    </div>
    <div class="mb-3">
        <label for="pembukaan" class="form-label">Pembukaan</label>
        <textarea class="form-control" name="pembukaan" rows="2" placeholder="Pengantar/pembukaan surat undangan"></textarea>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="hari_tanggal" class="form-label">Hari/Tanggal Acara <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="hari_tanggal" required placeholder="Contoh: Jum'at, 13 Juni 2025">
        </div>
        <div class="col-md-6">
            <label for="jam" class="form-label">Jam <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="jam" required placeholder="Contoh: 09.30 WIB – selesai">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="acara" class="form-label">Acara <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="acara" required placeholder="Contoh: Rapat Koordinasi">
        </div>
        <div class="col-md-6">
            <label for="tempat" class="form-label">Tempat Acara <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="tempat" required placeholder="Contoh: Gedung Kantor Desa Ketapang Baru">
        </div>
    </div>
    <div class="mb-3">
        <label for="penutup" class="form-label">Penutup</label>
        <textarea class="form-control" name="penutup" rows="2" placeholder="Kalimat penutup undangan"></textarea>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="tanggal_ttd" class="form-label">Tanggal Tanda Tangan <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="tanggal_ttd" required>
        </div>
        <div class="col-md-6">
            <label for="kepala_desa" class="form-label">Nama Kepala Desa</label>
            <input type="text" class="form-control" name="kepala_desa" placeholder="Contoh: ZULTAN ALHARA">
        </div>
    </div>
</div>
</div> <!-- End of formTemplates container -->

@endsection

@push('scripts')
<script>
    (function() {
        let idxBiaya = 1;
        document.addEventListener('click', function (e) {
            const target = e.target.closest('button');
            if (!target) return;

            if (target.id === 'tambah-baris-biaya') {
                const tbody = document.querySelector('#tabel-biaya-sppd tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>
                        <input type="text" name="biaya[${idxBiaya}][uraian]" class="form-control" placeholder="Contoh: Uang Harian" required>
                    </td>
                    <td>
                        <input type="number" name="biaya[${idxBiaya}][jumlah]" class="form-control" min="0" placeholder="Contoh: 50000" required>
                    </td>
                    <td>
                        <input type="text" name="biaya[${idxBiaya}][ket]" class="form-control" placeholder="Opsional">
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-light-danger btn-hapus-baris-biaya">
                            <i class="fas fa-minus"></i>
                        </button>
                    </td>
                `;
                tbody.appendChild(tr);
                idxBiaya++;
            }

            if (target.classList.contains('btn-hapus-baris-biaya')) {
                const tr = target.closest('tr');
                const tbody = tr && tr.parentElement;
                if (!tbody) return;
                // Jangan hapus kalau cuma tersisa satu baris
                if (tbody.querySelectorAll('tr').length > 1) {
                    tr.remove();
                }
            }
        });
    })();
</script>
@endpush

@push('scripts')
<script>
// Form state persistence with sessionStorage
const FORM_STATE_KEY = 'admin_surat_form_state';

function saveFormState() {
    const state = {
        user_id: $('#user_id').val(),
        jenis_surat: $('#jenis_surat').val(),
        jenis_ttd: $('#jenis_ttd').val(),
        kirim_wa: $('#kirim_wa').is(':checked'),
        dynamicFormData: {}
    };
    
    // Save all dynamic form inputs
    $('#dynamicFormArea').find('input, select, textarea').each(function() {
        const name = $(this).attr('name');
        if (name) {
            if ($(this).attr('type') === 'checkbox') {
                state.dynamicFormData[name] = $(this).is(':checked');
            } else if ($(this).attr('type') === 'radio') {
                if ($(this).is(':checked')) {
                    state.dynamicFormData[name] = $(this).val();
                }
            } else {
                state.dynamicFormData[name] = $(this).val();
            }
        }
    });
    
    sessionStorage.setItem(FORM_STATE_KEY, JSON.stringify(state));
}

function restoreFormState() {
    // Check if this is a page reload (refresh) or normal navigation
    const navigationEntries = performance.getEntriesByType("navigation");
    const isPageReload = navigationEntries.length > 0 && navigationEntries[0].type === "reload";
    
    if (!isPageReload) {
        console.log('Normal navigation detected. Clearing form state.');
        clearFormState();
        return;
    }
    
    const savedState = sessionStorage.getItem(FORM_STATE_KEY);
    if (!savedState) {
        console.log('No saved form state found');
        return;
    }
    
    try {
        const state = JSON.parse(savedState);
        console.log('Page refresh detected. Restoring form state:', state);
        
        // Restore main dropdowns first
        if (state.user_id) {
            $('#user_id').val(state.user_id).trigger('change');
        }
        if (state.jenis_ttd) {
            $('#jenis_ttd').val(state.jenis_ttd).trigger('change');
        }
        if (state.kirim_wa) {
            $('#kirim_wa').prop('checked', state.kirim_wa);
        }
        
        // Restore jenis surat and wait for dynamic form to load
        if (state.jenis_surat) {
            $('#jenis_surat').val(state.jenis_surat).trigger('change');
            
            // Wait longer for dynamic form to fully load (including datetime pickers)
            setTimeout(function() {
                if (state.dynamicFormData) {
                    console.log('Restoring dynamic form data:', state.dynamicFormData);
                    Object.keys(state.dynamicFormData).forEach(function(name) {
                        const input = $('#dynamicFormArea').find('[name="' + name + '"]');
                        if (input.length) {
                            if (input.attr('type') === 'checkbox') {
                                input.prop('checked', state.dynamicFormData[name]);
                            } else if (input.attr('type') === 'radio') {
                                input.filter('[value="' + state.dynamicFormData[name] + '"]').prop('checked', true);
                            } else {
                                input.val(state.dynamicFormData[name]);
                            }
                            console.log('Restored field:', name, '=', state.dynamicFormData[name]);
                        } else {
                            console.warn('Field not found:', name);
                        }
                    });
                }
            }, 500); // Increased delay to allow datetime pickers to initialize
        }
        
        console.log('Form state restored successfully');
    } catch (e) {
        console.error('Error restoring form state:', e);
    }
}

function clearFormState() {
    sessionStorage.removeItem(FORM_STATE_KEY);
}

$(document).ready(function() {
    // Auto-save form state on changes
    $(document).on('change input', '#createSuratForm input, #createSuratForm select, #createSuratForm textarea', function() {
        saveFormState();
    });
    
    // Clear state on successful form submission
    $('#createSuratForm').on('submit', function() {
        clearFormState();
    });

    // Handle user selection
    $('#user_id').change(function() {
        const selectedUser = $(this).find(':selected');
        if (selectedUser.val()) {
            $('#displayNik').text(selectedUser.data('nik') || '-');
            $('#displayAlamat').text(selectedUser.data('alamat') || '-');
            $('#displayNoHp').text(selectedUser.data('no-hp') || 'Belum diisi');
            $('#userInfo').show();

            // Auto-fill data penghibah for surat hibah
            const jenisSurat = $('#jenis_surat').val();
            if (jenisSurat === 'surat_hibah') {
                fillHibahData(selectedUser);
            }

            // Update WA options based on user phone and TTD type
            updateWaOptions();
        } else {
            $('#userInfo').hide();
            $('#waWarning').hide();
            $('.wa-options').hide();
            $('#kirim_wa').prop('disabled', false);
        }
    });

    // Fill hibah data from selected user
    function fillHibahData(user) {
        const nama = user.data('nama-lengkap') || user.data('nama') || '';
        const nik = user.data('nik') || '';
        const alamat = user.data('alamat') || '';

        // Calculate umur from tanggal_lahir if available
        let umur = '';
        const tanggalLahir = user.data('tanggal-lahir');
        if (tanggalLahir) {
            const birthDate = new Date(tanggalLahir);
            const today = new Date();
            umur = today.getFullYear() - birthDate.getFullYear();
        }

        // Fill form fields
        $('#dynamicFormArea').find('[name="nama_penghibah"]').val(nama);
        $('#dynamicFormArea').find('[name="umur_penghibah"]').val(umur);
        $('#dynamicFormArea').find('[name="alamat_penghibah"]').val(alamat);
    }

    // Also fill when jenis_surat changes to hibah
    $('#jenis_surat').change(function() {
        const jenisSurat = $(this).val();
        if (jenisSurat === 'surat_hibah') {
            const selectedUser = $('#user_id').find(':selected');
            if (selectedUser.val()) {
                fillHibahData(selectedUser);
            }
        }
    });

    // Handle jenis TTD selection
    $('#jenis_ttd').change(function() {
        updateWaOptions();
    });

    function updateWaOptions() {
        const selectedUser = $('#user_id').find(':selected');
        const jenisTtd = $('#jenis_ttd').val();
        const noHp = selectedUser.data('no-hp');

        if (!noHp) {
            // User doesn't have phone number
            $('#waWarning').show();
            $('#kirim_wa').prop('checked', false).prop('disabled', true);
            $('.wa-options').hide();
            return;
        }

        $('#waWarning').hide();

        if (jenisTtd === 'manual') {
            // For manual TTD, always send notification (no choice)
            $('#kirim_wa').prop('checked', false).prop('disabled', true);
            $('.wa-options').html('<small class="text-info"><i class="fas fa-info-circle"></i> Untuk TTD manual, otomatis akan dikirim notifikasi pengambilan ke kantor.</small>').show();
        } else if (jenisTtd === 'gambar' || jenisTtd === 'qrcode') {
            // For gambar/qrcode TTD, user can choose
            $('#kirim_wa').prop('disabled', false);
            $('.wa-options').html('<label class="form-check-label" for="kirim_wa">Kirim PDF ke WhatsApp (jika tidak dicentang, akan dikirim notifikasi pengambilan ke kantor)</label>').show();
        } else {
            // No TTD selected
            $('#kirim_wa').prop('disabled', true);
            $('.wa-options').hide();
        }
    }

    // Handle jenis surat selection
    $('#jenis_surat').change(function() {
        const jenisSurat = $(this).val();
        const dynamicArea = $('#dynamicFormArea');
        
        // Surat types that don't require warga selection (all data entered manually)
        const noWargaTypes = ['perjanjian_perdamaian', 'surat_undangan', 'sppd'];
        
        // Show/hide warga selection based on surat type
        if (noWargaTypes.includes(jenisSurat)) {
            $('#warga-selection-wrapper').hide();
            $('#user_id').removeAttr('required').val('').trigger('change');
            $('#userInfo').hide();
        } else {
            $('#warga-selection-wrapper').show();
            $('#user_id').attr('required', 'required');
        }

        if (jenisSurat) {
            const template = $('#template-' + jenisSurat).html();
            if (template) {
                dynamicArea.html(template);

                // Re-init Select2 for any selects inside the newly loaded template
                if (typeof $ !== 'undefined' && $.fn.select2) {
                    // Wait a bit for DOM to be ready
                    setTimeout(function() {
                        dynamicArea.find('select[data-control="select2"]').each(function() {
                            const $select = $(this);
                            // Avoid double-initializing select2
                            if (!$select.hasClass('select2-hidden-accessible')) {
                                $select.select2({
                                    placeholder: $select.data('placeholder') || 'Pilih...',
                                    allowClear: true,
                                    width: '100%'
                                });
                            }
                        });

                        // Also initialize the existing personel-warga-select in SPPD template
                        dynamicArea.find('.personel-warga-select-init, .personel-warga-select').each(function() {
                            const $select = $(this);
                            if (!$select.hasClass('select2-hidden-accessible')) {
                                // Check if select has options
                                if ($select.find('option').length > 1) {
                                    $select.select2({
                                        placeholder: 'Cari warga...',
                                        allowClear: true,
                                        width: '100%'
                                    });
                                }
                            }
                        });
                    }, 100);
                }

                // Auto-fill user data if available (only for surat types that use warga selection)
                if (!noWargaTypes.includes(jenisSurat)) {
                    fillUserData();
                }

                // Setup auto-complete for parent data if this is penghasilan ortu surat
                if (jenisSurat === 'ket_penghasilan_ortu') {
                    setTimeout(function() {
                        setupOrangTuaAutoComplete();
                    }, 100);
                }
                
                // Setup conditional fields for surat kehilangan
                if (jenisSurat === 'surat_kehilangan') {
                    setTimeout(function() {
                        setupKehilanganConditionalFields();
                    }, 100);
                }
            } else {
                dynamicArea.html('<div class="alert alert-info">Form untuk jenis surat ini belum tersedia.</div>');
            }
        } else {
            dynamicArea.html('');
            // Reset warga selection visibility when no surat type selected
            $('#warga-selection-wrapper').show();
            $('#user_id').attr('required', 'required');
        }
    });
    
    // Setup conditional fields for surat kehilangan
    function setupKehilanganConditionalFields() {
        // Handle waktu_kehilangan change
        $('#waktu_kehilangan').off('change').on('change', function() {
            if ($(this).val() === 'Lainnya') {
                $('#keterangan_waktu_wrapper').show();
            } else {
                $('#keterangan_waktu_wrapper').hide();
                $('input[name="keterangan_waktu"]').val('');
            }
        });
        
        // Handle jenis_dokumen change for nama_barang_lainnya
        $('select[name="jenis_dokumen"]').off('change').on('change', function() {
            if ($(this).val() === 'Lainnya') {
                $('#nama_barang_lainnya_wrapper').show();
            } else {
                $('#nama_barang_lainnya_wrapper').hide();
                $('input[name="nama_barang_lainnya"]').val('');
            }
        });
    }

    function fillUserData() {
        const selectedUser = $('#user_id').find(':selected');
        if (selectedUser.val()) {
            // Fill common user data
            const userData = {
                tempat_lahir: selectedUser.data('tempat-lahir'),
                tanggal_lahir: selectedUser.data('tanggal-lahir'),
                pekerjaan: selectedUser.data('pekerjaan'),
                alamat_domisili: selectedUser.data('alamat')
            };

            // Fill form fields if they exist
            Object.keys(userData).forEach(function(key) {
                const field = $('[name="' + key + '"]');
                if (field.length && userData[key]) {
                    field.val(userData[key]);
                }
            });
        }
    }

    // Auto-complete setup for parent data (same as public interface)
    function setupOrangTuaAutoComplete() {
        const namaAyahInput = document.querySelector('input[name="nama_ayah"]');
        const namaIbuInput = document.querySelector('input[name="nama_ibu"]');

        if (namaAyahInput) {
            setupAutoCompleteForField(namaAyahInput, 'ayah');
        }
        if (namaIbuInput) {
            setupAutoCompleteForField(namaIbuInput, 'ibu');
        }
    }

    function setupAutoCompleteForField(inputElement, parentType) {
        let searchTimeout;
        let dropdown;

        inputElement.addEventListener('input', function() {
            const query = this.value.trim();

            clearTimeout(searchTimeout);
            removeExistingDropdown();

            if (query.length >= 3) {
                searchTimeout = setTimeout(() => {
                    searchOrangTua(query, parentType);
                }, 300);
            }
        });

        inputElement.addEventListener('blur', function() {
            setTimeout(() => {
                removeExistingDropdown();
            }, 200);
        });

        function searchOrangTua(query, type) {
            fetch(`/api/search-orang-tua?q=${encodeURIComponent(query)}&type=${type}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.data.length > 0) {
                        showDropdown(data.data, type);
                    }
                })
                .catch(error => {
                    console.log('Error searching orang tua:', error);
                });
        }

        function showDropdown(results, type) {
            removeExistingDropdown();

            dropdown = document.createElement('div');
            dropdown.className = 'autocomplete-dropdown';
            dropdown.style.cssText = `
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                border: 1px solid #ddd;
                border-radius: 4px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                max-height: 200px;
                overflow-y: auto;
                z-index: 1000;
                animation: fadeIn 0.2s ease-in;
            `;

            results.forEach(item => {
                const option = document.createElement('div');
                option.className = 'autocomplete-option';
                option.style.cssText = `
                    padding: 10px;
                    cursor: pointer;
                    border-bottom: 1px solid #eee;
                    transition: background-color 0.2s;
                `;

                const parentData = item.data_surat;
                const displayName = type === 'ayah' ? parentData.nama_ayah : parentData.nama_ibu;
                const displayJob = type === 'ayah' ? parentData.pekerjaan_ayah : parentData.pekerjaan_ibu;

                option.innerHTML = `
                    <div class="fw-bold">${displayName}</div>
                    <small class="text-muted">${displayJob}</small>
                `;

                option.addEventListener('mouseenter', function() {
                    this.style.backgroundColor = '#f8f9fa';
                });

                option.addEventListener('mouseleave', function() {
                    this.style.backgroundColor = 'white';
                });

                option.addEventListener('click', function() {
                    fillParentData(parentData, type);
                    removeExistingDropdown();
                    showSuccessNotification(`Data ${type} berhasil diisi otomatis!`);
                });

                dropdown.appendChild(option);
            });

            const inputRect = inputElement.getBoundingClientRect();
            const container = inputElement.parentElement;
            container.style.position = 'relative';
            container.appendChild(dropdown);
        }

        function removeExistingDropdown() {
            if (dropdown && dropdown.parentNode) {
                dropdown.parentNode.removeChild(dropdown);
                dropdown = null;
            }
        }

        function fillParentData(data, type) {
            if (type === 'ayah') {
                const fields = {
                    'nama_ayah': data.nama_ayah,
                    'umur_ayah': data.umur_ayah,
                    'pekerjaan_ayah': data.pekerjaan_ayah,
                    'penghasilan_ayah': data.penghasilan_ayah,
                    'alamat_ayah': data.alamat_ayah
                };

                Object.keys(fields).forEach(fieldName => {
                    const field = document.querySelector(`[name="${fieldName}"]`);
                    if (field && fields[fieldName]) {
                        field.value = fields[fieldName];
                        field.dispatchEvent(new Event('input'));
                    }
                });
            } else if (type === 'ibu') {
                const fields = {
                    'nama_ibu': data.nama_ibu,
                    'umur_ibu': data.umur_ibu,
                    'pekerjaan_ibu': data.pekerjaan_ibu,
                    'penghasilan_ibu': data.penghasilan_ibu,
                    'alamat_ibu': data.alamat_ibu
                };

                Object.keys(fields).forEach(fieldName => {
                    const field = document.querySelector(`[name="${fieldName}"]`);
                    if (field && fields[fieldName]) {
                        field.value = fields[fieldName];
                        field.dispatchEvent(new Event('input'));
                    }
                });
            }
        }

        function showSuccessNotification(message) {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: #28a745;
                color: white;
                padding: 12px 20px;
                border-radius: 4px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.2);
                z-index: 9999;
                animation: slideIn 0.3s ease-out;
            `;
            notification.innerHTML = `<i class="fas fa-check-circle me-2"></i>${message}`;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.animation = 'fadeOut 0.3s ease-in';
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        }
    }

    // Form validation and AJAX submission
    $('#createSuratForm').submit(function(e) {
        e.preventDefault(); // Prevent default form submission
        
        const userId = $('#user_id').val();
        const jenisSurat = $('#jenis_surat').val();
        const $form = $(this);
        const $submitBtn = $form.find('button[type="submit"]');
        const originalBtnHtml = $submitBtn.html();
        
        // Surat types that don't require warga selection
        const noWargaTypes = ['perjanjian_perdamaian', 'surat_undangan', 'sppd'];

        // Only check user_id for surat types that require it
        if (!noWargaTypes.includes(jenisSurat) && !userId) {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Pilih warga terlebih dahulu!',
                confirmButtonColor: '#3699ff'
            });
            return false;
        }

        if (!jenisSurat) {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Pilih jenis surat terlebih dahulu!',
                confirmButtonColor: '#3699ff'
            });
            return false;
        }

        // Show loading state
        $submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Memproses...');

        // Submit via AJAX
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: new FormData($form[0]),
            processData: false,
            contentType: false,
            success: function(response) {
                // Clear form state on success
                clearFormState();
                
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: response.message || 'Surat berhasil dibuat!',
                    confirmButtonColor: '#3699ff'
                }).then((result) => {
                    // Redirect to index or stay based on response
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    } else {
                        window.location.href = '{{ route("admin.pengajuan-surat.index") }}';
                    }
                });
            },
            error: function(xhr) {
                // Re-enable button
                $submitBtn.prop('disabled', false).html(originalBtnHtml);
                
                let errorMessage = 'Terjadi kesalahan saat membuat surat.';
                
                if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                    // Validation errors
                    const errors = xhr.responseJSON.errors;
                    const errorList = Object.values(errors).flat();
                    errorMessage = errorList.join('<br>');
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Validasi Gagal',
                        html: errorMessage,
                        confirmButtonColor: '#3699ff'
                    });
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Membuat Surat',
                        text: errorMessage,
                        confirmButtonColor: '#3699ff'
                    });
                } else {
                    // Generic error with SQL info if available
                    if (xhr.responseText && xhr.responseText.includes('SQLSTATE')) {
                        errorMessage = 'Terjadi kesalahan database. Pastikan semua data warga sudah lengkap (termasuk No. HP).';
                    }
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Membuat Surat',
                        text: errorMessage,
                        confirmButtonColor: '#3699ff'
                    });
                }
            }
        });

        return false;
    });

    // Restore form state AFTER all event listeners are registered
    // This ensures the change events will trigger properly
    setTimeout(function() {
        restoreFormState();
    }, 100);
});

// Fungsi untuk Personel SPPD
let personelSPPDCount = 1;

// Data users untuk SPPD personel dropdown
const usersDataSPPD = @json($users->map(function($user) {
    return [
        'id' => $user->id,
        'nama_lengkap' => $user->nama_lengkap,
        'nik' => $user->nik
    ];
}));

function generateUserOptionsSPPD() {
    let options = '<option value="">Pilih Warga...</option>';
    usersDataSPPD.forEach(function(user) {
        options += '<option value="' + user.id + '" data-nama="' + user.nama_lengkap + '">' + user.nama_lengkap + ' - ' + user.nik + '</option>';
    });
    return options;
}

function tambahPersonelSPPD() {
    const container = document.getElementById('personel-container-sppd');
    const index = personelSPPDCount++;

    const newPersonel = document.createElement('div');
    newPersonel.className = 'personel-item-sppd card mb-3';
    newPersonel.setAttribute('data-index', index);
    newPersonel.style.animation = 'fadeIn 0.3s ease-in';

    newPersonel.innerHTML = `
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="mb-0">Personel #${index + 1}</h6>
                <button type="button" class="btn btn-sm btn-danger" onclick="hapusPersonelSPPD(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Nama <span class="text-danger">*</span></label>
                    <select class="form-select personel-warga-select-new" name="personel[${index}][warga_id]" required>
                        ${generateUserOptionsSPPD()}
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jabatan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="personel[${index}][jabatan]" required
                           placeholder="Contoh: Sekretaris">
                </div>
            </div>
        </div>
    `;

    container.appendChild(newPersonel);

    // Initialize Select2 on the new dropdown
    const newSelect = newPersonel.querySelector('.personel-warga-select-new');
    if (newSelect && typeof $ !== 'undefined' && $.fn.select2) {
        $(newSelect).select2({
            placeholder: 'Cari warga...',
            allowClear: true,
            width: '100%'
        });
    }

    // Update tombol hapus pada item pertama jika ini item kedua
    if (container.children.length === 2) {
        const firstItem = container.querySelector('[data-index="0"]');
        if (firstItem) {
            const deleteBtn = firstItem.querySelector('.btn-danger');
            if (deleteBtn) {
                deleteBtn.classList.remove('d-none');
            }
        }
    }
}

function hapusPersonelSPPD(button) {
    const container = document.getElementById('personel-container-sppd');
    const item = button.closest('.personel-item-sppd');

    // Cek jika ini item terakhir, jangan hapus
    if (container.children.length <= 1) {
        alert('Minimal harus ada 1 personel!');
        return;
    }

    item.style.animation = 'fadeOut 0.3s ease-out';
    setTimeout(() => {
        item.remove();

        // Update tombol hapus jika只剩 1 item
        if (container.children.length === 1) {
            const firstItem = container.querySelector('[data-index="0"]');
            if (firstItem) {
                const deleteBtn = firstItem.querySelector('.btn-danger');
                if (deleteBtn) {
                    deleteBtn.classList.add('d-none');
                }
            }
        }
    }, 300);
}


// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideIn {
        from { transform: translateX(100%); }
        to { transform: translateX(0); }
    }
    @keyframes fadeOut {
        from { opacity: 1; }
        to { opacity: 0; }
    }
    .autocomplete-dropdown {
        font-size: 14px;
    }
    .autocomplete-option:last-child {
        border-bottom: none;
    }
    .autocomplete-option:hover {
        background-color: #f8f9fa !important;
    }
`;
document.head.appendChild(style);

// ==================== PENGIKUT SURAT PINDAH HANDLER ====================
(function() {
    let pengikutIndex = 0;

    function createPengikutRow(index) {
        const html = `
            <div class="pengikut-item card mb-2" data-index="${index}">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0 text-primary"><i class="fas fa-user me-1"></i>Pengikut ${index + 1}</h6>
                        <button type="button" class="btn btn-danger btn-sm remove-pengikut" data-index="${index}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-4">
                            <label class="form-label small">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="pengikut[${index}][nama]" placeholder="Nama lengkap" required>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="pengikut[${index}][jenis_kelamin]" required>
                                <option value="">Pilih...</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small">TTL/Umur</label>
                            <input type="text" class="form-control form-control-sm" name="pengikut[${index}][ttl_umur]" placeholder="Cth: 25 Th">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small">Hubungan <span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="pengikut[${index}][hubungan]" required>
                                <option value="">Pilih...</option>
                                <option value="Istri">Istri</option>
                                <option value="Suami">Suami</option>
                                <option value="Anak">Anak</option>
                                <option value="Orang Tua">Orang Tua</option>
                                <option value="Mertua">Mertua</option>
                                <option value="Saudara">Saudara</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small">Pendidikan</label>
                            <select class="form-select form-select-sm" name="pengikut[${index}][pendidikan]">
                                <option value="">Pilih...</option>
                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                <option value="SD">SD</option>
                                <option value="SLTP">SLTP</option>
                                <option value="SLTA">SLTA</option>
                                <option value="D1/D2/D3">D1/D2/D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        `;
        return html;
    }

    function updatePengikutVisibility() {
        const container = document.getElementById('pengikutContainer');
        const noText = document.getElementById('noPengikutText');
        if (container && noText) {
            if (container.children.length > 0) {
                noText.style.display = 'none';
            } else {
                noText.style.display = 'block';
            }
        }
    }

    // Use document-level event delegation for dynamically shown elements
    document.addEventListener('click', function(e) {
        // Handle Add Pengikut button click
        if (e.target.closest('#addPengikutBtn')) {
            e.preventDefault();
            const container = document.getElementById('pengikutContainer');
            if (container) {
                const html = createPengikutRow(pengikutIndex);
                container.insertAdjacentHTML('beforeend', html);
                pengikutIndex++;
                updatePengikutVisibility();
            }
        }
        
        // Handle Remove Pengikut button click
        if (e.target.closest('.remove-pengikut')) {
            e.preventDefault();
            e.target.closest('.pengikut-item').remove();
            updatePengikutVisibility();
        }
    });
})();
</script>
@endpush
