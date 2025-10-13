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
                                    <option value="surat_domisili">Surat Keterangan Domisili</option>
                                    <option value="surat_usaha">Surat Keterangan Usaha</option>
                                    <option value="surat_tidak_mampu">Surat Keterangan Tidak Mampu</option>
                                </select>
                            </div>
                        </div>

                        <!-- TTD Options -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="jenis_ttd" class="form-label">Jenis Tanda Tangan <span class="text-danger">*</span></label>
                                <select class="form-select" id="jenis_ttd" name="jenis_ttd" required>
                                    <option value="biasa">TTD Biasa</option>
                                    <option value="qrcode">TTD QR Code</option>
                                </select>
                                <div class="form-text">
                                    <small class="text-muted">
                                        <strong>TTD Biasa:</strong> Menggunakan gambar tanda tangan tradisional<br>
                                        <strong>TTD QR Code:</strong> Menggunakan QR code yang dapat diverifikasi
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Notifikasi WhatsApp</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="kirim_wa" name="kirim_wa" value="1">
                                    <label class="form-check-label" for="kirim_wa">
                                        Kirim PDF ke WhatsApp user
                                    </label>
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

            // Check if user has phone number
            const noHp = selectedUser.data('no-hp');
            if (!noHp) {
                $('#waWarning').show();
                $('#kirim_wa').prop('checked', false).prop('disabled', true);
            } else {
                $('#waWarning').hide();
                $('#kirim_wa').prop('disabled', false);
            }
        } else {
            $('#userInfo').hide();
            $('#waWarning').hide();
            $('#kirim_wa').prop('disabled', false);
        }
    });

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
</script>
@endpush