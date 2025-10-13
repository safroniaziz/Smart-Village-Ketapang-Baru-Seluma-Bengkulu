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
                            <div class="col-md-6">
                                <label for="user_id" class="form-label">Pilih Warga <span class="text-danger">*</span></label>
                                <select class="form-select" id="user_id" name="user_id" required>
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
                                    <option value="surat_tidak_mampu">Surat Keterangan Tidak Mampu</option>
                                    <option value="surat_kematian">Surat Keterangan Kematian</option>
                                    <option value="ket_menikah">Surat Keterangan Menikah</option>
                                    <option value="ket_miskin_dtks">Surat Keterangan Miskin DTKS</option>
                                    <option value="ket_penghasilan_ortu">Surat Keterangan Penghasilan Orang Tua</option>
                                    <option value="pengantar_nikah">Surat Pengantar Nikah (N1-N4)</option>
                                    <option value="surat_pindah">Surat Pindah</option>
                                    <option value="surat_rekomendasi">Surat Rekomendasi</option>
                                </select>
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
            <div class="col-md-6">
                <label for="nama_barang_lainnya" class="form-label">Nama Barang Lainnya</label>
                <input type="text" class="form-control" name="nama_barang_lainnya"
                       placeholder="Isi jika memilih 'Lainnya'">
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
                <label for="waktu_kehilangan" class="form-label">Waktu Kehilangan <span class="text-danger">*</span></label>
                <input type="datetime-local" class="form-control" name="waktu_kehilangan" required>
            </div>
            <div class="col-md-6">
                <label for="keterangan_waktu" class="form-label">Keterangan Tambahan</label>
                <input type="text" class="form-control" name="keterangan_waktu"
                       placeholder="Contoh: Sekitar pukul 14:00">
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
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="alamat_domisili" class="form-label">Alamat Domisili Saat Ini <span class="text-danger">*</span></label>
                <textarea class="form-control" name="alamat_domisili" rows="2" required></textarea>
            </div>
            <div class="col-md-6">
                <label for="lama_tinggal" class="form-label">Lama Tinggal <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="lama_tinggal" required
                       placeholder="Contoh: 5 tahun">
            </div>
        </div>
    </div>

    <!-- Template Surat Usaha -->
    <div id="template-surat_usaha">
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
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="alamat_usaha" class="form-label">Alamat Usaha <span class="text-danger">*</span></label>
                <textarea class="form-control" name="alamat_usaha" rows="2" required></textarea>
            </div>
            <div class="col-md-6">
                <label for="modal_usaha" class="form-label">Modal Usaha <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="modal_usaha" required
                       placeholder="Contoh: Rp 10.000.000">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="mulai_usaha" class="form-label">Mulai Usaha <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="mulai_usaha" required>
            </div>
            <div class="col-md-6">
                <label for="jumlah_karyawan" class="form-label">Jumlah Karyawan</label>
                <input type="number" class="form-control" name="jumlah_karyawan" min="0"
                       placeholder="Contoh: 5">
            </div>
        </div>
        <div class="mb-3">
            <label for="keperluan" class="form-label">Keperluan <span class="text-danger">*</span></label>
            <textarea class="form-control" name="keperluan" rows="3" required
                      placeholder="Contoh: Untuk mengajukan izin usaha ke dinas terkait"></textarea>
        </div>
    </div>

    <!-- Template Surat Tidak Mampu -->
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
</div>

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
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="tujuan_perjalanan" class="form-label">Tujuan Perjalanan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="tujuan_perjalanan" required
                       placeholder="Contoh: Jakarta">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="maksud_perjalanan" class="form-label">Maksud Perjalanan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="maksud_perjalanan" required
                       placeholder="Contoh: Menghadiri seminar">
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
        <label for="kendaraan" class="form-label">Kendaraan yang Digunakan <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="kendaraan" required
               placeholder="Contoh: Kendaraan Dinas/Pribadi/Umum">
    </div>
    <div class="mb-3">
        <label for="keperluan" class="form-label">Keperluan <span class="text-danger">*</span></label>
        <textarea class="form-control" name="keperluan" rows="3" required
                  placeholder="Jelaskan keperluan perjalanan dinas ini"></textarea>
    </div>
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

<!-- Template untuk Surat Keterangan Usaha -->
<div id="template-ket_usaha" style="display: none;">
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
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="alamat_usaha" class="form-label">Alamat Usaha <span class="text-danger">*</span></label>
            <textarea class="form-control" name="alamat_usaha" rows="2" required></textarea>
        </div>
        <div class="col-md-6">
            <label for="modal_usaha" class="form-label">Modal Usaha <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="modal_usaha" required
                   placeholder="Contoh: Rp 10.000.000">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="mulai_usaha" class="form-label">Mulai Usaha <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="mulai_usaha" required>
        </div>
        <div class="col-md-6">
            <label for="jumlah_karyawan" class="form-label">Jumlah Karyawan</label>
            <input type="number" class="form-control" name="jumlah_karyawan" min="0"
                   placeholder="Contoh: 5">
        </div>
    </div>
    <div class="mb-3">
        <label for="keperluan" class="form-label">Keperluan <span class="text-danger">*</span></label>
        <textarea class="form-control" name="keperluan" rows="3" required
                  placeholder="Contoh: Untuk mengajukan izin usaha ke dinas terkait"></textarea>
    </div>
    
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        <strong>Catatan:</strong> Data pemohon (nama, NIK, tempat/tanggal lahir, jenis kelamin, agama, pekerjaan, alamat) akan otomatis diambil dari data warga yang dipilih di atas. Pastikan data warga sudah benar sebelum membuat surat.
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
    <h5 class="mb-3"><i class="fas fa-file-alt"></i> Data Surat Pengantar Nikah (N1-N4)</h5>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="jenis_pengantar" class="form-label">Jenis Surat Pengantar <span class="text-danger">*</span></label>
            <select class="form-select" name="jenis_pengantar" required>
                <option value="">Pilih Jenis...</option>
                <option value="N1">N1 - Surat Pernyataan Belum Pernah Menikah</option>
                <option value="N2">N2 - Surat Keterangan Asal Usul</option>
                <option value="N3">N3 - Surat Keterangan Orang Tua</option>
                <option value="N4">N4 - Surat Keterangan Persetujuan Mempelai</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="tanggal_rencana_nikah" class="form-label">Tanggal Rencana Nikah <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="tanggal_rencana_nikah" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="tempat_akad_nikah" class="form-label">Tempat Akad Nikah <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="tempat_akad_nikah" required
                   placeholder="Contoh: KUA Kecamatan Seluma Barat">
        </div>
        <div class="col-md-6">
            <label for="nama_calon_pasangan" class="form-label">Nama Calon Pasangan <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama_calon_pasangan" required
                   placeholder="Nama lengkap calon istri/suami">
        </div>
    </div>
    <div class="mb-3">
        <label for="keperluan" class="form-label">Keperluan <span class="text-danger">*</span></label>
        <textarea class="form-control" name="keperluan" rows="3" required
                  placeholder="Contoh: Untuk melengkapi berkas pernikahan di KUA"></textarea>
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
        <label for="keperluan" class="form-label">Keperluan <span class="text-danger">*</span></label>
        <textarea class="form-control" name="keperluan" rows="3" required
                  placeholder="Contoh: Untuk keperluan administrasi kependudukan"></textarea>
    </div>
</div>

<!-- Template untuk Surat Rekomendasi -->
<div id="template-surat_rekomendasi" style="display: none;">
    <h5 class="mb-3"><i class="fas fa-file-alt"></i> Data Surat Rekomendasi</h5>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="jenis_rekomendasi" class="form-label">Jenis Rekomendasi <span class="text-danger">*</span></label>
            <select class="form-select" name="jenis_rekomendasi" required>
                <option value="">Pilih Jenis...</option>
                <option value="Pekerjaan">Rekomendasi Pekerjaan</option>
                <option value="Beasiswa">Rekomendasi Beasiswa</option>
                <option value="Bantuan">Rekomendasi Bantuan</option>
                <option value="Kegiatan">Rekomendasi Kegiatan</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="tujuan_rekomendasi" class="form-label">Tujuan Rekomendasi <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="tujuan_rekomendasi" required
                   placeholder="Contoh: Kepala Dinas Pendidikan">
        </div>
    </div>
    <div class="mb-3">
        <label for="uraian_rekomendasi" class="form-label">Uraian Rekomendasi <span class="text-danger">*</span></label>
        <textarea class="form-control" name="uraian_rekomendasi" rows="4" required
                  placeholder="Jelaskan secara detail apa yang direkomendasikan"></textarea>
    </div>
    <div class="mb-3">
        <label for="keperluan" class="form-label">Keperluan <span class="text-danger">*</span></label>
        <textarea class="form-control" name="keperluan" rows="3" required
                  placeholder="Contoh: Untuk melengkapi berkas pendaftaran beasiswa"></textarea>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Handle user selection
    $('#user_id').change(function() {
        const selectedUser = $(this).find(':selected');
        if (selectedUser.val()) {
            $('#displayNik').text(selectedUser.data('nik') || '-');
            $('#displayAlamat').text(selectedUser.data('alamat') || '-');
            $('#displayNoHp').text(selectedUser.data('no-hp') || 'Belum diisi');
            $('#userInfo').show();

            // Update WA options based on user phone and TTD type
            updateWaOptions();
        } else {
            $('#userInfo').hide();
            $('#waWarning').hide();
            $('.wa-options').hide();
            $('#kirim_wa').prop('disabled', false);
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

        if (jenisSurat) {
            const template = $('#template-' + jenisSurat).html();
            if (template) {
                dynamicArea.html(template);

                // Auto-fill user data if available
                fillUserData();

                // Setup auto-complete for parent data if this is penghasilan ortu surat
                if (jenisSurat === 'ket_penghasilan_ortu') {
                    setTimeout(function() {
                        setupOrangTuaAutoComplete();
                    }, 100);
                }
            } else {
                dynamicArea.html('<div class="alert alert-info">Form untuk jenis surat ini belum tersedia.</div>');
            }
        } else {
            dynamicArea.html('');
        }
    });

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

    // Form validation
    $('#createSuratForm').submit(function(e) {
        const userId = $('#user_id').val();
        const jenisSurat = $('#jenis_surat').val();

        if (!userId) {
            e.preventDefault();
            alert('Pilih warga terlebih dahulu!');
            return false;
        }

        if (!jenisSurat) {
            e.preventDefault();
            alert('Pilih jenis surat terlebih dahulu!');
            return false;
        }

        // Show loading state
        $(this).find('button[type="submit"]').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Memproses...');

        return true;
    });
});

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
</script>
@endpush
