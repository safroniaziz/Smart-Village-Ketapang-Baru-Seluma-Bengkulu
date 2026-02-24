@extends('layouts.dashboard.dashboard')

@section('title', 'Edit Pengajuan Surat')

@section('menu')
    Edit Pengajuan Surat
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.pengajuan-surat.index') }}" class="text-muted text-hover-primary">Manajemen Pengajuan Surat</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.pengajuan-surat.show', $pengajuan->id) }}" class="text-muted text-hover-primary">Detail Pengajuan</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Edit Pengajuan</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">


            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <h3 class="fw-bold m-0">Edit Pengajuan Surat</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.pengajuan-surat.show', $pengajuan->id) }}" class="btn btn-light btn-sm">
                            <i class="ki-duotone ki-arrow-left fs-4"><span class="path1"></span><span class="path2"></span></i>
                            Kembali ke Detail
                        </a>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <form action="{{ route('admin.pengajuan-surat.update', $pengajuan->id) }}" method="POST" id="editSuratForm">
                        @csrf
                        @method('PUT')

                        <!-- Jenis Surat (untuk semua) -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="required form-label">Jenis Surat</label>
                                <input type="text" class="form-control"
                                       value="{{ ucfirst(str_replace('_', ' ', $pengajuan->jenis_surat)) }}" readonly>
                            </div>
                            @if($pengajuan->jenis_surat === 'sppd')
                            <div class="col-md-6">
                                <div class="alert alert-info mb-0">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Info:</strong> SPPD dapat memiliki banyak personel. Data personel dipilih dari daftar warga di bawah.
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- Nomor Surat (untuk semua) -->
                        <div class="mb-5">
                            <label class="required form-label">Nomor Surat</label>
                            <input type="text" name="no_surat" class="form-control" value="{{ old('no_surat', $pengajuan->no_surat) }}" required
                                   placeholder="{{ $pengajuan->jenis_surat === 'sppd' ? 'Contoh: 001/SPD-KD/2025' : 'Contoh: 001/DES/2025' }}">
                            <div class="form-text">Masukkan nomor surat</div>
                            @error('no_surat')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        @php
                            // Surat types that don't require warga selection
                            $noWargaTypes = ['sppd', 'perjanjian_perdamaian', 'surat_undangan'];
                        @endphp

                        <!-- Pilih Warga (hanya untuk surat yang memerlukan warga) -->
                        @if(!in_array($pengajuan->jenis_surat, $noWargaTypes))
                        <div class="mb-4">
                            <label class="required form-label">Pilih Warga</label>
                            <select class="form-select" id="user_id" name="user_id" data-control="select2" data-placeholder="Cari dan pilih warga..." required>
                                <option value="">Pilih Warga...</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}"
                                            data-nama="{{ $user->nama_lengkap }}"
                                            data-nik="{{ $user->nik }}"
                                            data-alamat="{{ $user->alamat }}"
                                            data-no-hp="{{ $user->no_hp }}"
                                            {{ (old('user_id', $pengajuan->user_id) == $user->id) ? 'selected' : '' }}>
                                        {{ $user->nama_lengkap }} - {{ $user->nik }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror

                            <!-- Info Warga -->
                            <div id="userInfo" class="mt-3 p-3 bg-light-primary rounded" style="{{ $pengajuan->user_id ? '' : 'display: none;' }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <small class="text-muted d-block">NIK</small>
                                        <strong id="displayNik">{{ $pengajuan->user->nik ?? $pengajuan->nik }}</strong>
                                    </div>
                                    <div class="col-md-6">
                                        <small class="text-muted d-block">No. HP</small>
                                        <strong id="displayNoHp">{{ $pengajuan->user->no_hp ?? $pengajuan->no_hp }}</strong>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <small class="text-muted d-block">Alamat</small>
                                    <strong id="displayAlamat">{{ $pengajuan->user->alamat ?? $pengajuan->alamat }}</strong>
                                </div>
                            </div>
                        </div>

                        <!-- Keperluan (untuk surat yang memerlukan warga dan bukan surat tertentu) -->
                        @if(!in_array($pengajuan->jenis_surat, ['ket_usaha', 'izin_keramaian']))
                        <div class="mb-5">
                            <label class="required form-label">Keperluan</label>
                            <textarea name="keperluan" class="form-control" rows="3" required>{{ old('keperluan', $pengajuan->keperluan) }}</textarea>
                            @error('keperluan')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif
                        @endif

                        <!-- Dynamic Form untuk non-SPPD -->
                        @if($pengajuan->jenis_surat === 'surat_kehilangan')
                            @php
                                $dataSurat = $pengajuan->data_surat ?? [];
                            @endphp
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5 class="card-title">Data Surat Kehilangan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="jenis_dokumen" class="form-label">Jenis Dokumen Hilang <span class="text-danger">*</span></label>
                                            <select class="form-select" name="jenis_dokumen" required>
                                                <option value="">Pilih Jenis Dokumen...</option>
                                                <option value="KTP" {{ ($dataSurat['jenis_dokumen'] ?? '') == 'KTP' ? 'selected' : '' }}>Kartu Tanda Penduduk (KTP)</option>
                                                <option value="KK" {{ ($dataSurat['jenis_dokumen'] ?? '') == 'KK' ? 'selected' : '' }}>Kartu Keluarga (KK)</option>
                                                <option value="SIM" {{ ($dataSurat['jenis_dokumen'] ?? '') == 'SIM' ? 'selected' : '' }}>Surat Izin Mengemudi (SIM)</option>
                                                <option value="Paspor" {{ ($dataSurat['jenis_dokumen'] ?? '') == 'Paspor' ? 'selected' : '' }}>Paspor</option>
                                                <option value="Ijazah" {{ ($dataSurat['jenis_dokumen'] ?? '') == 'Ijazah' ? 'selected' : '' }}>Ijazah</option>
                                                <option value="STNK" {{ ($dataSurat['jenis_dokumen'] ?? '') == 'STNK' ? 'selected' : '' }}>STNK</option>
                                                <option value="BPKB" {{ ($dataSurat['jenis_dokumen'] ?? '') == 'BPKB' ? 'selected' : '' }}>BPKB</option>
                                                <option value="Lainnya" {{ ($dataSurat['jenis_dokumen'] ?? '') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                            @error('jenis_dokumen')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6" id="nama_barang_lainnya_wrapper" style="{{ ($dataSurat['jenis_dokumen'] ?? '') != 'Lainnya' ? 'display: none;' : '' }}">
                                            <label for="nama_barang_lainnya" class="form-label">Nama Barang Lainnya</label>
                                            <input type="text" class="form-control" name="nama_barang_lainnya"
                                                   value="{{ $dataSurat['nama_barang_lainnya'] ?? '' }}"
                                                   placeholder="Contoh: Jam tangan, Tas, Sepatu, dll">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="nomor_dokumen" class="form-label">Nomor Dokumen</label>
                                            <input type="text" class="form-control" name="nomor_dokumen"
                                                   value="{{ $dataSurat['nomor_dokumen'] ?? '' }}"
                                                   placeholder="Nomor dokumen yang hilang (jika ada)">
                                            @error('nomor_dokumen')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tempat_kehilangan" class="form-label">Tempat Kehilangan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="tempat_kehilangan" required
                                                   value="{{ $dataSurat['tempat_kehilangan'] ?? '' }}"
                                                   placeholder="Contoh: Di jalan raya Ketapang Baru">
                                            @error('tempat_kehilangan')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="waktu_kehilangan" class="form-label">Perkiraan Waktu Kehilangan <span class="text-danger">*</span></label>
                                            <select class="form-select" name="waktu_kehilangan" required>
                                                <option value="">Pilih perkiraan waktu...</option>
                                                <option value="1 Bulan yang lalu" {{ ($dataSurat['waktu_kehilangan'] ?? '') == '1 Bulan yang lalu' ? 'selected' : '' }}>1 Bulan yang lalu</option>
                                                <option value="2 Bulan yang lalu" {{ ($dataSurat['waktu_kehilangan'] ?? '') == '2 Bulan yang lalu' ? 'selected' : '' }}>2 Bulan yang lalu</option>
                                                <option value="3 Bulan yang lalu" {{ ($dataSurat['waktu_kehilangan'] ?? '') == '3 Bulan yang lalu' ? 'selected' : '' }}>3 Bulan yang lalu</option>
                                                <option value="4 Bulan yang lalu" {{ ($dataSurat['waktu_kehilangan'] ?? '') == '4 Bulan yang lalu' ? 'selected' : '' }}>4 Bulan yang lalu</option>
                                                <option value="5 Bulan yang lalu" {{ ($dataSurat['waktu_kehilangan'] ?? '') == '5 Bulan yang lalu' ? 'selected' : '' }}>5 Bulan yang lalu</option>
                                                <option value="6 Bulan yang lalu" {{ ($dataSurat['waktu_kehilangan'] ?? '') == '6 Bulan yang lalu' ? 'selected' : '' }}>6 Bulan yang lalu</option>
                                                <option value="Lebih dari 6 Bulan" {{ ($dataSurat['waktu_kehilangan'] ?? '') == 'Lebih dari 6 Bulan' ? 'selected' : '' }}>Lebih dari 6 Bulan</option>
                                                <option value="Lainnya" {{ ($dataSurat['waktu_kehilangan'] ?? '') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                            @error('waktu_kehilangan')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6" id="keterangan_waktu_wrapper" style="{{ ($dataSurat['waktu_kehilangan'] ?? '') != 'Lainnya' ? 'display: none;' : '' }}">
                                            <label for="keterangan_waktu" class="form-label">Keterangan Waktu</label>
                                            <input type="text" class="form-control" name="keterangan_waktu"
                                                   value="{{ $dataSurat['keterangan_waktu'] ?? '' }}"
                                                   placeholder="Contoh: 2 minggu yang lalu, 1 tahun yang lalu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($pengajuan->jenis_surat === 'surat_bersih_diri')
                            @php
                                $dataSurat = $pengajuan->data_surat ?? [];
                            @endphp
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5 class="card-title">Data Surat Bersih Diri</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <h6 class="text-muted">Data Ayah</h6>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="nama_ayah" class="form-label">Nama Ayah <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nama_ayah" required
                                                   value="{{ $dataSurat['nama_ayah'] ?? '' }}">
                                            @error('nama_ayah')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <label for="umur_ayah" class="form-label">Umur <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="umur_ayah" required
                                                   value="{{ $dataSurat['umur_ayah'] ?? '' }}">
                                            @error('umur_ayah')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <label for="pekerjaan_ayah" class="form-label">Pekerjaan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="pekerjaan_ayah" required
                                                   value="{{ $dataSurat['pekerjaan_ayah'] ?? '' }}">
                                            @error('pekerjaan_ayah')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <h6 class="text-muted">Data Ibu</h6>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="nama_ibu" class="form-label">Nama Ibu <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nama_ibu" required
                                                   value="{{ $dataSurat['nama_ibu'] ?? '' }}">
                                            @error('nama_ibu')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <label for="umur_ibu" class="form-label">Umur <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="umur_ibu" required
                                                   value="{{ $dataSurat['umur_ibu'] ?? '' }}">
                                            @error('umur_ibu')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <label for="pekerjaan_ibu" class="form-label">Pekerjaan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="pekerjaan_ibu" required
                                                   value="{{ $dataSurat['pekerjaan_ibu'] ?? '' }}">
                                            @error('pekerjaan_ibu')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="keterangan_tambahan" class="form-label">Keterangan Tambahan</label>
                                        <textarea class="form-control" name="keterangan_tambahan" rows="3">{{ $dataSurat['keterangan_tambahan'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @elseif($pengajuan->jenis_surat === 'pengantar_nikah')
                            @php
                                $dataSurat = $pengajuan->data_surat ?? [];
                            @endphp
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="fas fa-heart text-danger me-2"></i>Data Surat Pengantar Nikah</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Status Perkawinan -->
                                    <h6 class="text-primary mb-3"><i class="fas fa-ring me-2"></i>Status Perkawinan</h6>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="status_pria" class="form-label">Status Pria <span class="text-danger">*</span></label>
                                            <select class="form-select" name="status_pria" required>
                                                <option value="">Pilih...</option>
                                                <option value="Jejaka" {{ ($dataSurat['status_pria'] ?? '') == 'Jejaka' ? 'selected' : '' }}>Jejaka</option>
                                                <option value="Duda" {{ ($dataSurat['status_pria'] ?? '') == 'Duda' ? 'selected' : '' }}>Duda</option>
                                                <option value="Beristri" {{ ($dataSurat['status_pria'] ?? '') == 'Beristri' ? 'selected' : '' }}>Beristri</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="beristri_ke" class="form-label">Beristri Ke-</label>
                                            <input type="number" class="form-control" name="beristri_ke" min="1" 
                                                   value="{{ $dataSurat['beristri_ke'] ?? '' }}" placeholder="Isi jika beristri">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="status_wanita" class="form-label">Status Wanita <span class="text-danger">*</span></label>
                                            <select class="form-select" name="status_wanita" required>
                                                <option value="">Pilih...</option>
                                                <option value="Perawan" {{ ($dataSurat['status_wanita'] ?? '') == 'Perawan' ? 'selected' : '' }}>Perawan</option>
                                                <option value="Janda" {{ ($dataSurat['status_wanita'] ?? '') == 'Janda' ? 'selected' : '' }}>Janda</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="nama_pasangan_terdahulu" class="form-label">Nama Pasangan Terdahulu</label>
                                            <input type="text" class="form-control" name="nama_pasangan_terdahulu" 
                                                   value="{{ $dataSurat['nama_pasangan_terdahulu'] ?? '' }}" placeholder="Jika duda/janda">
                                        </div>
                                    </div>

                                    <!-- Data Ayah -->
                                    <h6 class="text-primary mt-4 mb-3"><i class="fas fa-male me-2"></i>Data Ayah (Orang Tua Pemohon)</h6>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="ayah_nama" class="form-label">Nama Ayah <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="ayah_nama" required
                                                   value="{{ $dataSurat['ayah_nama'] ?? '' }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ayah_bin" class="form-label">Bin (Nama Kakek)</label>
                                            <input type="text" class="form-control" name="ayah_bin"
                                                   value="{{ $dataSurat['ayah_bin'] ?? '' }}" placeholder="Nama kakek dari pemohon">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ayah_nik" class="form-label">NIK Ayah <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="ayah_nik" required maxlength="16"
                                                   value="{{ $dataSurat['ayah_nik'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="ayah_tempat_tanggal_lahir" class="form-label">Tempat & Tanggal Lahir <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="ayah_tempat_tanggal_lahir" required
                                                   value="{{ $dataSurat['ayah_tempat_tanggal_lahir'] ?? '' }}" placeholder="Bengkulu, 10 Januari 1965">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ayah_agama" class="form-label">Agama <span class="text-danger">*</span></label>
                                            <select class="form-select" name="ayah_agama" required>
                                                <option value="">Pilih...</option>
                                                <option value="Islam" {{ ($dataSurat['ayah_agama'] ?? '') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                <option value="Kristen Protestan" {{ ($dataSurat['ayah_agama'] ?? '') == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                                <option value="Kristen Katolik" {{ ($dataSurat['ayah_agama'] ?? '') == 'Kristen Katolik' ? 'selected' : '' }}>Kristen Katolik</option>
                                                <option value="Hindu" {{ ($dataSurat['ayah_agama'] ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                <option value="Buddha" {{ ($dataSurat['ayah_agama'] ?? '') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                                <option value="Konghucu" {{ ($dataSurat['ayah_agama'] ?? '') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ayah_pekerjaan" class="form-label">Pekerjaan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="ayah_pekerjaan" required
                                                   value="{{ $dataSurat['ayah_pekerjaan'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ayah_alamat" class="form-label">Alamat Ayah <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="ayah_alamat" required
                                               value="{{ $dataSurat['ayah_alamat'] ?? '' }}">
                                    </div>

                                    <!-- Data Ibu (Orang Tua Pemohon) -->
                                    <h6 class="text-primary mt-4 mb-3"><i class="fas fa-female me-2"></i>Data Ibu (Orang Tua Pemohon)</h6>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="ibu_nama" class="form-label">Nama Ibu <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="ibu_nama" required
                                                   value="{{ $dataSurat['ibu_nama'] ?? $dataSurat['wanita_nama'] ?? '' }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ibu_bin" class="form-label">Binti (Nama Ayah Ibu)</label>
                                            <input type="text" class="form-control" name="ibu_bin"
                                                   value="{{ $dataSurat['ibu_bin'] ?? '' }}" placeholder="Nama kakek dari pemohon (dari ibu)">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ibu_nik" class="form-label">NIK Ibu <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="ibu_nik" required maxlength="16"
                                                   value="{{ $dataSurat['ibu_nik'] ?? $dataSurat['wanita_nik'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="ibu_tempat_tanggal_lahir" class="form-label">Tempat & Tanggal Lahir <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="ibu_tempat_tanggal_lahir" required
                                                   value="{{ $dataSurat['ibu_tempat_tanggal_lahir'] ?? $dataSurat['wanita_tempat_tanggal_lahir'] ?? '' }}" placeholder="Palembang, 5 Maret 1995">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ibu_warga_negara" class="form-label">Kewarganegaraan <span class="text-danger">*</span></label>
                                            <select class="form-select" name="ibu_warga_negara" required>
                                                <option value="Indonesia" {{ ($dataSurat['ibu_warga_negara'] ?? $dataSurat['wanita_warga_negara'] ?? 'Indonesia') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                                <option value="Warga Negara Asing" {{ ($dataSurat['ibu_warga_negara'] ?? $dataSurat['wanita_warga_negara'] ?? '') == 'Warga Negara Asing' ? 'selected' : '' }}>Warga Negara Asing</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ibu_agama" class="form-label">Agama <span class="text-danger">*</span></label>
                                            <select class="form-select" name="ibu_agama" required>
                                                <option value="">Pilih...</option>
                                                <option value="Islam" {{ ($dataSurat['ibu_agama'] ?? $dataSurat['wanita_agama'] ?? '') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                <option value="Kristen Protestan" {{ ($dataSurat['ibu_agama'] ?? $dataSurat['wanita_agama'] ?? '') == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                                <option value="Kristen Katolik" {{ ($dataSurat['ibu_agama'] ?? $dataSurat['wanita_agama'] ?? '') == 'Kristen Katolik' ? 'selected' : '' }}>Kristen Katolik</option>
                                                <option value="Hindu" {{ ($dataSurat['ibu_agama'] ?? $dataSurat['wanita_agama'] ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                <option value="Buddha" {{ ($dataSurat['ibu_agama'] ?? $dataSurat['wanita_agama'] ?? '') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                                <option value="Konghucu" {{ ($dataSurat['ibu_agama'] ?? $dataSurat['wanita_agama'] ?? '') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="ibu_pekerjaan" class="form-label">Pekerjaan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="ibu_pekerjaan" required
                                                   value="{{ $dataSurat['ibu_pekerjaan'] ?? $dataSurat['wanita_pekerjaan'] ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ibu_alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="ibu_alamat" required
                                                   value="{{ $dataSurat['ibu_alamat'] ?? $dataSurat['wanita_alamat'] ?? '' }}">
                                        </div>
                                    </div>

                                    <!-- Data Calon Istri (untuk Surat Persetujuan Mempelai) -->
                                    <h6 class="text-primary mt-4 mb-3"><i class="fas fa-heart me-2"></i>Data Calon Istri (untuk Surat Persetujuan Mempelai)</h6>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="calon_istri_nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="calon_istri_nama" required
                                                   value="{{ $dataSurat['calon_istri_nama'] ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="calon_istri_bin" class="form-label">Bin/Binti <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="calon_istri_bin" required
                                                   value="{{ $dataSurat['calon_istri_bin'] ?? '' }}" placeholder="Nama ayah calon istri">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="calon_istri_nik" class="form-label">NIK <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="calon_istri_nik" required maxlength="16"
                                                   value="{{ $dataSurat['calon_istri_nik'] ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="calon_istri_tempat_tanggal_lahir" class="form-label">Tempat & Tanggal Lahir <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="calon_istri_tempat_tanggal_lahir" required
                                                   value="{{ $dataSurat['calon_istri_tempat_tanggal_lahir'] ?? '' }}" placeholder="Padang, 14 Juni 1990">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="calon_istri_warga_negara" class="form-label">Kewarganegaraan <span class="text-danger">*</span></label>
                                            <select class="form-select" name="calon_istri_warga_negara" required>
                                                <option value="Indonesia" {{ ($dataSurat['calon_istri_warga_negara'] ?? 'Indonesia') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                                <option value="Warga Negara Asing" {{ ($dataSurat['calon_istri_warga_negara'] ?? '') == 'Warga Negara Asing' ? 'selected' : '' }}>Warga Negara Asing</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="calon_istri_agama" class="form-label">Agama <span class="text-danger">*</span></label>
                                            <select class="form-select" name="calon_istri_agama" required>
                                                <option value="">Pilih...</option>
                                                <option value="Islam" {{ ($dataSurat['calon_istri_agama'] ?? '') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                <option value="Kristen Protestan" {{ ($dataSurat['calon_istri_agama'] ?? '') == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                                <option value="Kristen Katolik" {{ ($dataSurat['calon_istri_agama'] ?? '') == 'Kristen Katolik' ? 'selected' : '' }}>Kristen Katolik</option>
                                                <option value="Hindu" {{ ($dataSurat['calon_istri_agama'] ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                <option value="Buddha" {{ ($dataSurat['calon_istri_agama'] ?? '') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                                <option value="Konghucu" {{ ($dataSurat['calon_istri_agama'] ?? '') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="calon_istri_pekerjaan" class="form-label">Pekerjaan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="calon_istri_pekerjaan" required
                                                   value="{{ $dataSurat['calon_istri_pekerjaan'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="calon_istri_alamat" class="form-label">Tempat Tinggal <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="calon_istri_alamat" required
                                               value="{{ $dataSurat['calon_istri_alamat'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        @elseif($pengajuan->jenis_surat === 'surat_hibah')
                            @php
                                $dataSurat = $pengajuan->data_surat ?? [];
                            @endphp
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="fas fa-hand-holding-heart text-pink me-2"></i>Data Surat Keterangan Hibah</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Info Alert -->
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <strong>Informasi:</strong> Data Penghibah (Nama, Umur, Pekerjaan, Agama, Alamat) diambil otomatis dari data warga yang dipilih.
                                    </div>

                                    <!-- Detail Hibah -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="hari_tanggal" class="form-label">Hari/Tanggal Hibah <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="hari_tanggal" required
                                                   value="{{ $dataSurat['hari_tanggal'] ?? '' }}" placeholder="Contoh: Senin Tanggal Lima Bulan Mei">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="luas_tanah" class="form-label">Luas Tanah (M²) <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="luas_tanah" required
                                                   value="{{ $dataSurat['luas_tanah'] ?? '' }}">
                                        </div>
                                    </div>

                                    <!-- Batas-batas Tanah -->
                                    <h6 class="mt-3 mb-2">Batas-batas Tanah</h6>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="batas_utara" class="form-label">Batas Utara <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="batas_utara" required
                                                   value="{{ $dataSurat['batas_utara'] ?? '' }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="pemilik_utara" class="form-label">Pemilik Utara <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="pemilik_utara" required
                                                   value="{{ $dataSurat['pemilik_utara'] ?? '' }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="batas_selatan" class="form-label">Batas Selatan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="batas_selatan" required
                                                   value="{{ $dataSurat['batas_selatan'] ?? '' }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="pemilik_selatan" class="form-label">Pemilik Selatan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="pemilik_selatan" required
                                                   value="{{ $dataSurat['pemilik_selatan'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="batas_barat" class="form-label">Batas Barat <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="batas_barat" required
                                                   value="{{ $dataSurat['batas_barat'] ?? '' }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="pemilik_barat" class="form-label">Pemilik Barat <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="pemilik_barat" required
                                                   value="{{ $dataSurat['pemilik_barat'] ?? '' }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="batas_timur" class="form-label">Batas Timur <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="batas_timur" required
                                                   value="{{ $dataSurat['batas_timur'] ?? '' }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="pemilik_timur" class="form-label">Pemilik Timur <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="pemilik_timur" required
                                                   value="{{ $dataSurat['pemilik_timur'] ?? '' }}">
                                        </div>
                                    </div>

                                    <!-- Saksi -->
                                    <h6 class="mt-3 mb-2">Saksi-saksi</h6>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="saksi_1" class="form-label">Nama Saksi 1 <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="saksi_1" required
                                                   value="{{ $dataSurat['saksi_1'] ?? '' }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="saksi_2" class="form-label">Nama Saksi 2 <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="saksi_2" required
                                                   value="{{ $dataSurat['saksi_2'] ?? '' }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="saksi_3" class="form-label">Nama Saksi 3 <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="saksi_3" required
                                                   value="{{ $dataSurat['saksi_3'] ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($pengajuan->jenis_surat === 'surat_domisili')
                            @php
                                $dataSurat = $pengajuan->data_surat ?? [];
                            @endphp
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="fas fa-home text-info me-2"></i>Data Surat Keterangan Domisili</h5>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <strong>Informasi:</strong> Data pribadi akan diambil otomatis dari data warga yang dipilih di atas.
                                    </div>
                                </div>
                            </div>
                        @elseif($pengajuan->jenis_surat === 'ket_usaha')
                            @php
                                $dataSurat = $pengajuan->data_surat ?? [];
                            @endphp
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="fas fa-store text-success me-2"></i>Data Surat Keterangan Usaha</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="nama_usaha" class="form-label">Nama Usaha <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nama_usaha" required
                                                   value="{{ $dataSurat['nama_usaha'] ?? '' }}"
                                                   placeholder="Contoh: Toko Sembako Berkah">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jenis_usaha" class="form-label">Jenis Usaha <span class="text-danger">*</span></label>
                                            <select class="form-select" name="jenis_usaha" required>
                                                <option value="">Pilih Jenis Usaha...</option>
                                                <option value="Perdagangan" {{ ($dataSurat['jenis_usaha'] ?? '') == 'Perdagangan' ? 'selected' : '' }}>Perdagangan</option>
                                                <option value="Jasa" {{ ($dataSurat['jenis_usaha'] ?? '') == 'Jasa' ? 'selected' : '' }}>Jasa</option>
                                                <option value="Industri" {{ ($dataSurat['jenis_usaha'] ?? '') == 'Industri' ? 'selected' : '' }}>Industri</option>
                                                <option value="Pertanian" {{ ($dataSurat['jenis_usaha'] ?? '') == 'Pertanian' ? 'selected' : '' }}>Pertanian</option>
                                                <option value="Perikanan" {{ ($dataSurat['jenis_usaha'] ?? '') == 'Perikanan' ? 'selected' : '' }}>Perikanan</option>
                                                <option value="Peternakan" {{ ($dataSurat['jenis_usaha'] ?? '') == 'Peternakan' ? 'selected' : '' }}>Peternakan</option>
                                                <option value="Lainnya" {{ ($dataSurat['jenis_usaha'] ?? '') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <strong>Informasi:</strong> Data pribadi akan diambil otomatis dari data warga yang dipilih di atas.
                                    </div>
                                </div>
                            </div>
                        @elseif($pengajuan->jenis_surat === 'surat_kematian')
                            @php
                                $dataSurat = $pengajuan->data_surat ?? [];
                            @endphp
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="fas fa-cross text-secondary me-2"></i>Data Surat Keterangan Kematian</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="nama_almarhum" class="form-label">Nama Almarhum/Almarhumah <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nama_almarhum" required
                                                   value="{{ $dataSurat['nama_almarhum'] ?? '' }}"
                                                   placeholder="Contoh: HARLENA">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="hari_kematian" class="form-label">Hari Kematian <span class="text-danger">*</span></label>
                                            <select class="form-select" name="hari_kematian" required>
                                                <option value="">Pilih Hari...</option>
                                                <option value="Minggu" {{ ($dataSurat['hari_kematian'] ?? '') == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                                                <option value="Senin" {{ ($dataSurat['hari_kematian'] ?? '') == 'Senin' ? 'selected' : '' }}>Senin</option>
                                                <option value="Selasa" {{ ($dataSurat['hari_kematian'] ?? '') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                                <option value="Rabu" {{ ($dataSurat['hari_kematian'] ?? '') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                                <option value="Kamis" {{ ($dataSurat['hari_kematian'] ?? '') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                                <option value="Jumat" {{ ($dataSurat['hari_kematian'] ?? '') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                                <option value="Sabtu" {{ ($dataSurat['hari_kematian'] ?? '') == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="tanggal_kematian" class="form-label">Tanggal Kematian <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="tanggal_kematian" required
                                                   value="{{ $dataSurat['tanggal_kematian'] ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tempat_kematian" class="form-label">Tempat Kematian <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="tempat_kematian" required
                                                   value="{{ $dataSurat['tempat_kematian'] ?? '' }}"
                                                   placeholder="Contoh: Ketapang Baru">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sebab_kematian" class="form-label">Sebab Kematian <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="sebab_kematian" required
                                               value="{{ $dataSurat['sebab_kematian'] ?? '' }}"
                                               placeholder="Contoh: Sakit / Usia Lanjut / Kecelakaan">
                                    </div>
                                </div>
                            </div>
                        @elseif($pengajuan->jenis_surat === 'izin_keramaian')
                            @php
                                $dataSurat = $pengajuan->data_surat ?? [];
                            @endphp
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="fas fa-bullhorn text-warning me-2"></i>Data Surat Izin Keramaian</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="nama_kegiatan" class="form-label">Nama Kegiatan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nama_kegiatan" required
                                                   value="{{ $dataSurat['nama_kegiatan'] ?? '' }}"
                                                   placeholder="Contoh: Perayaan 17 Agustus">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan <span class="text-danger">*</span></label>
                                            <select class="form-select" name="jenis_kegiatan" required>
                                                <option value="">Pilih Jenis Kegiatan...</option>
                                                <option value="Perayaan" {{ ($dataSurat['jenis_kegiatan'] ?? '') == 'Perayaan' ? 'selected' : '' }}>Perayaan</option>
                                                <option value="Olahraga" {{ ($dataSurat['jenis_kegiatan'] ?? '') == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                                                <option value="Keagamaan" {{ ($dataSurat['jenis_kegiatan'] ?? '') == 'Keagamaan' ? 'selected' : '' }}>Keagamaan</option>
                                                <option value="Budaya" {{ ($dataSurat['jenis_kegiatan'] ?? '') == 'Budaya' ? 'selected' : '' }}>Budaya</option>
                                                <option value="Sosial" {{ ($dataSurat['jenis_kegiatan'] ?? '') == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                                                <option value="Lainnya" {{ ($dataSurat['jenis_kegiatan'] ?? '') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="tanggal_kegiatan" required
                                                   value="{{ $dataSurat['tanggal_kegiatan'] ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="waktu_kegiatan" class="form-label">Waktu Kegiatan <span class="text-danger">*</span></label>
                                            <input type="time" class="form-control" name="waktu_kegiatan" required
                                                   value="{{ $dataSurat['waktu_kegiatan'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tempat_kegiatan" class="form-label">Tempat Kegiatan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="tempat_kegiatan" required
                                               value="{{ $dataSurat['tempat_kegiatan'] ?? '' }}"
                                               placeholder="Contoh: Lapangan Desa Ketapang Baru">
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="penanggung_jawab" class="form-label">Penanggung Jawab <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="penanggung_jawab" required
                                                   value="{{ $dataSurat['penanggung_jawab'] ?? '' }}"
                                                   placeholder="Nama penanggung jawab kegiatan">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jumlah_peserta" class="form-label">Perkiraan Jumlah Peserta <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="jumlah_peserta" min="1" required
                                                   value="{{ $dataSurat['jumlah_peserta'] ?? '' }}"
                                                   placeholder="Contoh: 100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($pengajuan->jenis_surat === 'ket_belum_menikah')
                            @php
                                $dataSurat = $pengajuan->data_surat ?? [];
                            @endphp
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="fas fa-user text-primary me-2"></i>Data Surat Keterangan Belum Menikah</h5>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <strong>Informasi:</strong> Data pribadi akan diambil otomatis dari data warga yang dipilih di atas.
                                    </div>
                                </div>
                            </div>
                        @elseif($pengajuan->jenis_surat === 'surat_berkelakuan_baik')
                            @php
                                $dataSurat = $pengajuan->data_surat ?? [];
                            @endphp
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="fas fa-thumbs-up text-success me-2"></i>Data Surat Keterangan Berkelakuan Baik</h5>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <strong>Informasi:</strong> Data pribadi akan diambil otomatis dari data warga yang dipilih di atas.
                                    </div>
                                </div>
                            </div>
                        @elseif($pengajuan->jenis_surat === 'ket_menikah')
                            @php
                                $dataSurat = $pengajuan->data_surat ?? [];
                            @endphp
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="fas fa-ring text-pink me-2"></i>Data Surat Keterangan Menikah</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="tanggal_menikah" class="form-label">Tanggal Menikah <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="tanggal_menikah" required
                                               value="{{ $dataSurat['tanggal_menikah'] ?? '' }}">
                                    </div>
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <strong>Informasi:</strong> Data pribadi akan diambil otomatis dari data warga yang dipilih di atas.
                                    </div>
                                </div>
                            </div>
                        @elseif($pengajuan->jenis_surat === 'ket_miskin_dtks')
                            @php
                                $dataSurat = $pengajuan->data_surat ?? [];
                            @endphp
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="fas fa-hand-holding-usd text-warning me-2"></i>Data Surat Keterangan Miskin DTKS</h5>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <strong>Informasi:</strong> Data pribadi akan diambil otomatis dari data warga yang dipilih di atas.
                                    </div>
                                </div>
                            </div>
                        @elseif($pengajuan->jenis_surat === 'ket_penghasilan_ortu')
                            @php
                                $dataSurat = $pengajuan->data_surat ?? [];
                            @endphp
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="fas fa-money-bill-wave text-success me-2"></i>Data Surat Keterangan Penghasilan Orang Tua</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Data Ayah -->
                                    <h6 class="text-primary mb-3"><i class="fas fa-male me-2"></i>Data Ayah</h6>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="nama_ayah" class="form-label">Nama Lengkap Ayah <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nama_ayah" required
                                                   value="{{ $dataSurat['nama_ayah'] ?? '' }}"
                                                   placeholder="Masukkan nama lengkap ayah">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="umur_ayah" class="form-label">Umur Ayah <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="umur_ayah" min="1" max="120" required
                                                   value="{{ $dataSurat['umur_ayah'] ?? '' }}"
                                                   placeholder="Contoh: 45">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="pekerjaan_ayah" required
                                                   value="{{ $dataSurat['pekerjaan_ayah'] ?? '' }}"
                                                   placeholder="Contoh: Petani, Wiraswasta, Buruh">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="penghasilan_ayah" class="form-label">Penghasilan per Bulan Ayah <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="penghasilan_ayah" min="0" required
                                                   value="{{ $dataSurat['penghasilan_ayah'] ?? '' }}"
                                                   placeholder="Contoh: 2500000">
                                            <div class="form-text">Masukkan dalam bentuk angka (Rupiah)</div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat_ayah" class="form-label">Alamat Ayah <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="alamat_ayah" rows="2" required
                                                  placeholder="Alamat lengkap tempat tinggal ayah">{{ $dataSurat['alamat_ayah'] ?? '' }}</textarea>
                                    </div>

                                    <!-- Data Ibu -->
                                    <h6 class="text-info mt-4 mb-3"><i class="fas fa-female me-2"></i>Data Ibu</h6>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="nama_ibu" class="form-label">Nama Lengkap Ibu <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nama_ibu" required
                                                   value="{{ $dataSurat['nama_ibu'] ?? '' }}"
                                                   placeholder="Masukkan nama lengkap ibu">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="umur_ibu" class="form-label">Umur Ibu <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="umur_ibu" min="1" max="120" required
                                                   value="{{ $dataSurat['umur_ibu'] ?? '' }}"
                                                   placeholder="Contoh: 42">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="pekerjaan_ibu" required
                                                   value="{{ $dataSurat['pekerjaan_ibu'] ?? '' }}"
                                                   placeholder="Contoh: Ibu Rumah Tangga, Pedagang, Guru">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="penghasilan_ibu" class="form-label">Penghasilan per Bulan Ibu <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="penghasilan_ibu" min="0" required
                                                   value="{{ $dataSurat['penghasilan_ibu'] ?? '' }}"
                                                   placeholder="Contoh: 1500000">
                                            <div class="form-text">Masukkan dalam bentuk angka (Rupiah). Isi 0 jika tidak berpenghasilan</div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat_ibu" class="form-label">Alamat Ibu <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="alamat_ibu" rows="2" required
                                                  placeholder="Alamat lengkap tempat tinggal ibu">{{ $dataSurat['alamat_ibu'] ?? '' }}</textarea>
                                    </div>

                                    <div class="alert alert-warning">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        <strong>Perhatian:</strong> Pastikan data yang diinputkan sesuai dengan kondisi sebenarnya karena akan digunakan untuk keperluan resmi.
                                    </div>
                                </div>
                            </div>
                        @elseif($pengajuan->jenis_surat === 'surat_pindah')
                            @php
                                $dataSurat = $pengajuan->data_surat ?? [];
                            @endphp
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="fas fa-truck-moving text-primary me-2"></i>Data Surat Pindah</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="alasan_pindah" class="form-label">Alasan Pindah <span class="text-danger">*</span></label>
                                            <select class="form-select" name="alasan_pindah" required>
                                                <option value="">Pilih Alasan...</option>
                                                <option value="Pekerjaan" {{ ($dataSurat['alasan_pindah'] ?? '') == 'Pekerjaan' ? 'selected' : '' }}>Pekerjaan</option>
                                                <option value="Pendidikan" {{ ($dataSurat['alasan_pindah'] ?? '') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                                                <option value="Keamanan" {{ ($dataSurat['alasan_pindah'] ?? '') == 'Keamanan' ? 'selected' : '' }}>Keamanan</option>
                                                <option value="Kesehatan" {{ ($dataSurat['alasan_pindah'] ?? '') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                                                <option value="Perumahan" {{ ($dataSurat['alasan_pindah'] ?? '') == 'Perumahan' ? 'selected' : '' }}>Perumahan</option>
                                                <option value="Keluarga" {{ ($dataSurat['alasan_pindah'] ?? '') == 'Keluarga' ? 'selected' : '' }}>Keluarga</option>
                                                <option value="Lainnya" {{ ($dataSurat['alasan_pindah'] ?? '') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tanggal_pindah" class="form-label">Tanggal Pindah <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="tanggal_pindah" required
                                                   value="{{ $dataSurat['tanggal_pindah'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="alamat_tujuan" class="form-label">Alamat Tujuan <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="alamat_tujuan" rows="3" required
                                                      placeholder="Alamat lengkap tujuan pindah">{{ $dataSurat['alamat_tujuan'] ?? '' }}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jenis_pindah" class="form-label">Jenis Pindah <span class="text-danger">*</span></label>
                                            <select class="form-select" name="jenis_pindah" required>
                                                <option value="">Pilih Jenis...</option>
                                                <option value="Dalam Provinsi" {{ ($dataSurat['jenis_pindah'] ?? '') == 'Dalam Provinsi' ? 'selected' : '' }}>Dalam Provinsi</option>
                                                <option value="Antar Provinsi" {{ ($dataSurat['jenis_pindah'] ?? '') == 'Antar Provinsi' ? 'selected' : '' }}>Antar Provinsi</option>
                                                <option value="Antar Negara" {{ ($dataSurat['jenis_pindah'] ?? '') == 'Antar Negara' ? 'selected' : '' }}>Antar Negara</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="keperluan" class="form-label">Keperluan</label>
                                        <textarea class="form-control" name="keperluan" rows="2"
                                                  placeholder="Contoh: Untuk keperluan administrasi kependudukan">{{ $dataSurat['keperluan'] ?? '' }}</textarea>
                                    </div>

                                    <!-- Data Camat -->
                                    <h6 class="mt-4 mb-3"><i class="fas fa-user-tie text-info me-2"></i>Data Camat (Opsional)</h6>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="nama_camat" class="form-label">Nama Camat</label>
                                            <input type="text" class="form-control" name="nama_camat" 
                                                   value="{{ $dataSurat['nama_camat'] ?? '' }}"
                                                   placeholder="Nama lengkap Camat (kosongkan jika tidak diketahui)">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nip_camat" class="form-label">NIP Camat</label>
                                            <input type="text" class="form-control" name="nip_camat" 
                                                   value="{{ $dataSurat['nip_camat'] ?? '' }}"
                                                   placeholder="NIP Camat (kosongkan jika tidak diketahui)">
                                        </div>
                                    </div>

                                    <!-- Pengikut Section -->
                                    <div class="card border-primary mb-3">
                                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                            <h6 class="mb-0"><i class="fas fa-users me-2"></i>Data Pengikut (Anggota Keluarga yang Ikut Pindah)</h6>
                                            <button type="button" class="btn btn-light btn-sm" onclick="tambahPengikutEdit()">
                                                <i class="fas fa-plus me-1"></i>Tambah Pengikut
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div id="pengikutContainerEdit">
                                                @php
                                                    $pengikutData = $dataSurat['pengikut'] ?? [];
                                                @endphp
                                                @if(!empty($pengikutData) && is_array($pengikutData))
                                                    @foreach($pengikutData as $index => $p)
                                                    <div class="pengikut-item card mb-2" data-index="{{ $index }}">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                                <h6 class="mb-0 text-primary"><i class="fas fa-user me-1"></i>Pengikut {{ $index + 1 }}</h6>
                                                                <button type="button" class="btn btn-danger btn-sm" onclick="hapusPengikutEdit(this)">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </div>
                                                            <div class="row g-2">
                                                                <div class="col-md-4">
                                                                    <label class="form-label small">Nama <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control form-control-sm" name="pengikut[{{ $index }}][nama]" value="{{ $p['nama'] ?? '' }}" placeholder="Nama lengkap" required>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label small">Jenis Kelamin <span class="text-danger">*</span></label>
                                                                    <select class="form-select form-select-sm" name="pengikut[{{ $index }}][jenis_kelamin]" required>
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Laki-laki" {{ ($p['jenis_kelamin'] ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                                        <option value="Perempuan" {{ ($p['jenis_kelamin'] ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label small">TTL/Umur</label>
                                                                    <input type="text" class="form-control form-control-sm" name="pengikut[{{ $index }}][ttl_umur]" value="{{ $p['ttl_umur'] ?? '' }}" placeholder="Cth: 25 Th">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label small">Hubungan <span class="text-danger">*</span></label>
                                                                    <select class="form-select form-select-sm" name="pengikut[{{ $index }}][hubungan]" required>
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Istri" {{ ($p['hubungan'] ?? '') == 'Istri' ? 'selected' : '' }}>Istri</option>
                                                                        <option value="Suami" {{ ($p['hubungan'] ?? '') == 'Suami' ? 'selected' : '' }}>Suami</option>
                                                                        <option value="Anak" {{ ($p['hubungan'] ?? '') == 'Anak' ? 'selected' : '' }}>Anak</option>
                                                                        <option value="Orang Tua" {{ ($p['hubungan'] ?? '') == 'Orang Tua' ? 'selected' : '' }}>Orang Tua</option>
                                                                        <option value="Mertua" {{ ($p['hubungan'] ?? '') == 'Mertua' ? 'selected' : '' }}>Mertua</option>
                                                                        <option value="Saudara" {{ ($p['hubungan'] ?? '') == 'Saudara' ? 'selected' : '' }}>Saudara</option>
                                                                        <option value="Lainnya" {{ ($p['hubungan'] ?? '') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label small">Pendidikan</label>
                                                                    <select class="form-select form-select-sm" name="pengikut[{{ $index }}][pendidikan]">
                                                                        <option value="">Pilih...</option>
                                                                        <option value="Tidak Sekolah" {{ ($p['pendidikan'] ?? '') == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                                                                        <option value="SD" {{ ($p['pendidikan'] ?? '') == 'SD' ? 'selected' : '' }}>SD</option>
                                                                        <option value="SLTP" {{ ($p['pendidikan'] ?? '') == 'SLTP' ? 'selected' : '' }}>SLTP</option>
                                                                        <option value="SLTA" {{ ($p['pendidikan'] ?? '') == 'SLTA' ? 'selected' : '' }}>SLTA</option>
                                                                        <option value="D1/D2/D3" {{ ($p['pendidikan'] ?? '') == 'D1/D2/D3' ? 'selected' : '' }}>D1/D2/D3</option>
                                                                        <option value="S1" {{ ($p['pendidikan'] ?? '') == 'S1' ? 'selected' : '' }}>S1</option>
                                                                        <option value="S2" {{ ($p['pendidikan'] ?? '') == 'S2' ? 'selected' : '' }}>S2</option>
                                                                        <option value="S3" {{ ($p['pendidikan'] ?? '') == 'S3' ? 'selected' : '' }}>S3</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="text-muted text-center py-3" id="noPengikutTextEdit" style="{{ !empty($pengikutData) ? 'display:none;' : '' }}">
                                                <i class="fas fa-info-circle me-1"></i>Belum ada pengikut. Klik tombol "Tambah Pengikut" untuk menambahkan.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($pengajuan->jenis_surat === 'surat_rekomendasi')
                            @php
                                $dataSurat = $pengajuan->data_surat ?? [];
                            @endphp
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="fas fa-award text-info me-2"></i>Data Surat Rekomendasi</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="jenis_rekomendasi" class="form-label">Jenis Rekomendasi <span class="text-danger">*</span></label>
                                            <select class="form-select" name="jenis_rekomendasi" required>
                                                <option value="">Pilih Jenis...</option>
                                                <option value="Pekerjaan" {{ ($dataSurat['jenis_rekomendasi'] ?? '') == 'Pekerjaan' ? 'selected' : '' }}>Rekomendasi Pekerjaan</option>
                                                <option value="Beasiswa" {{ ($dataSurat['jenis_rekomendasi'] ?? '') == 'Beasiswa' ? 'selected' : '' }}>Rekomendasi Beasiswa</option>
                                                <option value="Bantuan" {{ ($dataSurat['jenis_rekomendasi'] ?? '') == 'Bantuan' ? 'selected' : '' }}>Rekomendasi Bantuan</option>
                                                <option value="Kegiatan" {{ ($dataSurat['jenis_rekomendasi'] ?? '') == 'Kegiatan' ? 'selected' : '' }}>Rekomendasi Kegiatan</option>
                                                <option value="Lainnya" {{ ($dataSurat['jenis_rekomendasi'] ?? '') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tujuan_rekomendasi" class="form-label">Tujuan Rekomendasi <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="tujuan_rekomendasi" required
                                                   value="{{ $dataSurat['tujuan_rekomendasi'] ?? '' }}"
                                                   placeholder="Contoh: Kepala Dinas Pendidikan">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="uraian_rekomendasi" class="form-label">Uraian Rekomendasi <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="uraian_rekomendasi" rows="4" required
                                                  placeholder="Jelaskan secara detail apa yang direkomendasikan">{{ $dataSurat['uraian_rekomendasi'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @elseif($pengajuan->jenis_surat === 'perjanjian_perdamaian')
                            @php
                                $dataSurat = $pengajuan->data_surat ?? [];
                            @endphp
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="fas fa-handshake text-success me-2"></i>Data Surat Perjanjian Perdamaian</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Data Pihak Pertama -->
                                    <h6 class="text-primary mb-3"><i class="fas fa-user me-2"></i>Data Pihak Pertama</h6>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="pihak1_nama" class="form-label">Nama Pihak 1 <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="pihak1_nama" required
                                                   value="{{ $dataSurat['pihak1_nama'] ?? '' }}"
                                                   placeholder="Nama lengkap pihak 1">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="pihak1_umur" class="form-label">Umur Pihak 1 <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="pihak1_umur" required
                                                   value="{{ $dataSurat['pihak1_umur'] ?? '' }}"
                                                   placeholder="Umur dalam tahun">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="pihak1_pekerjaan" class="form-label">Pekerjaan Pihak 1 <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="pihak1_pekerjaan" required
                                                   value="{{ $dataSurat['pihak1_pekerjaan'] ?? '' }}"
                                                   placeholder="Contoh: Wiraswasta">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="pihak1_agama" class="form-label">Agama Pihak 1 <span class="text-danger">*</span></label>
                                            <select class="form-select" name="pihak1_agama" required>
                                                <option value="">Pilih Agama...</option>
                                                <option value="Islam" {{ ($dataSurat['pihak1_agama'] ?? '') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                <option value="Kristen Protestan" {{ ($dataSurat['pihak1_agama'] ?? '') == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                                <option value="Kristen Katolik" {{ ($dataSurat['pihak1_agama'] ?? '') == 'Kristen Katolik' ? 'selected' : '' }}>Kristen Katolik</option>
                                                <option value="Hindu" {{ ($dataSurat['pihak1_agama'] ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                <option value="Buddha" {{ ($dataSurat['pihak1_agama'] ?? '') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                                <option value="Konghucu" {{ ($dataSurat['pihak1_agama'] ?? '') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pihak1_alamat" class="form-label">Alamat Pihak 1 <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="pihak1_alamat" rows="2" required
                                                  placeholder="Alamat lengkap pihak 1">{{ $dataSurat['pihak1_alamat'] ?? '' }}</textarea>
                                    </div>

                                    <!-- Data Pihak Kedua -->
                                    <h6 class="text-info mt-4 mb-3"><i class="fas fa-user me-2"></i>Data Pihak Kedua</h6>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="pihak2_nama" class="form-label">Nama Pihak 2 <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="pihak2_nama" required
                                                   value="{{ $dataSurat['pihak2_nama'] ?? '' }}"
                                                   placeholder="Nama lengkap pihak 2">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="pihak2_umur" class="form-label">Umur Pihak 2 <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="pihak2_umur" required
                                                   value="{{ $dataSurat['pihak2_umur'] ?? '' }}"
                                                   placeholder="Umur dalam tahun">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="pihak2_pekerjaan" class="form-label">Pekerjaan Pihak 2 <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="pihak2_pekerjaan" required
                                                   value="{{ $dataSurat['pihak2_pekerjaan'] ?? '' }}"
                                                   placeholder="Contoh: Petani/Pekebun">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="pihak2_agama" class="form-label">Agama Pihak 2 <span class="text-danger">*</span></label>
                                            <select class="form-select" name="pihak2_agama" required>
                                                <option value="">Pilih Agama...</option>
                                                <option value="Islam" {{ ($dataSurat['pihak2_agama'] ?? '') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                <option value="Kristen Protestan" {{ ($dataSurat['pihak2_agama'] ?? '') == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                                <option value="Kristen Katolik" {{ ($dataSurat['pihak2_agama'] ?? '') == 'Kristen Katolik' ? 'selected' : '' }}>Kristen Katolik</option>
                                                <option value="Hindu" {{ ($dataSurat['pihak2_agama'] ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                <option value="Buddha" {{ ($dataSurat['pihak2_agama'] ?? '') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                                <option value="Konghucu" {{ ($dataSurat['pihak2_agama'] ?? '') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pihak2_alamat" class="form-label">Alamat Pihak 2 <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="pihak2_alamat" rows="2" required
                                                  placeholder="Alamat lengkap pihak 2">{{ $dataSurat['pihak2_alamat'] ?? '' }}</textarea>
                                    </div>

                                    <!-- Kronologi Kejadian -->
                                    <h6 class="text-warning mt-4 mb-3"><i class="fas fa-clock me-2"></i>Kronologi Kejadian</h6>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="hari_tanggal_perjanjian" class="form-label">Hari/Tanggal Perjanjian <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="hari_tanggal_perjanjian" required
                                                   value="{{ $dataSurat['hari_tanggal_perjanjian'] ?? '' }}"
                                                   placeholder="Contoh: Senin Tanggal Lima Bulan Mei">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="hari_tanggal_kejadian" class="form-label">Hari/Tanggal Kejadian <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="hari_tanggal_kejadian" required
                                                   value="{{ $dataSurat['hari_tanggal_kejadian'] ?? '' }}"
                                                   placeholder="Contoh: Sabtu Malam Minggu">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="waktu_kejadian" class="form-label">Waktu Kejadian <span class="text-danger">*</span></label>
                                            <input type="time" class="form-control" name="waktu_kejadian" required
                                                   value="{{ $dataSurat['waktu_kejadian'] ?? '' }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="jenis_denda" class="form-label">Jenis Denda Adat <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="jenis_denda" required
                                                   value="{{ $dataSurat['jenis_denda'] ?? '' }}"
                                                   placeholder="Contoh: satu buah jambar tutup ayam">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="nominal_denda" class="form-label">Nominal Denda (Rp) <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="nominal_denda" required
                                                   value="{{ $dataSurat['nominal_denda'] ?? '' }}"
                                                   placeholder="Contoh: 250000">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="terbilang_denda" class="form-label">Nominal Terbilang <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="terbilang_denda" required
                                               value="{{ $dataSurat['terbilang_denda'] ?? '' }}"
                                               placeholder="Contoh: Dua Ratus Lima Puluh Ribu Rupiah">
                                    </div>

                                    <!-- Saksi-saksi -->
                                    <h6 class="text-secondary mt-4 mb-3"><i class="fas fa-users me-2"></i>Saksi-saksi</h6>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="saksi_1" class="form-label">Saksi 1 <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="saksi_1" required
                                                   value="{{ $dataSurat['saksi_1'] ?? '' }}"
                                                   placeholder="Nama saksi 1">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="saksi_2" class="form-label">Saksi 2 <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="saksi_2" required
                                                   value="{{ $dataSurat['saksi_2'] ?? '' }}"
                                                   placeholder="Nama saksi 2">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="saksi_3" class="form-label">Saksi 3 <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="saksi_3" required
                                                   value="{{ $dataSurat['saksi_3'] ?? '' }}"
                                                   placeholder="Nama saksi 3">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="saksi_4" class="form-label">Saksi 4 <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="saksi_4" required
                                                   value="{{ $dataSurat['saksi_4'] ?? '' }}"
                                                   placeholder="Nama saksi 4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($pengajuan->jenis_surat === 'surat_undangan')
                            @php
                                $dataSurat = $pengajuan->data_surat ?? [];
                            @endphp
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="fas fa-envelope text-danger me-2"></i>Data Surat Undangan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="tanggal_surat" class="form-label">Tanggal Surat <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="tanggal_surat" required
                                                   value="{{ $dataSurat['tanggal_surat'] ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lampiran" class="form-label">Lampiran</label>
                                            <input type="text" class="form-control" name="lampiran"
                                                   value="{{ $dataSurat['lampiran'] ?? '' }}"
                                                   placeholder="Contoh: 1 (satu) Berkas">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="perihal" class="form-label">Perihal <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="perihal" required
                                                   value="{{ $dataSurat['perihal'] ?? '' }}"
                                                   placeholder="Contoh: Panggilan Penting">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="kepada" class="form-label">Kepada <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="kepada" required
                                                   value="{{ $dataSurat['kepada'] ?? '' }}"
                                                   placeholder="Contoh: Bapak/Ibu Ketua RT 01">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pembukaan" class="form-label">Pembukaan</label>
                                        <textarea class="form-control" name="pembukaan" rows="2"
                                                  placeholder="Pengantar/pembukaan surat undangan">{{ $dataSurat['pembukaan'] ?? '' }}</textarea>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="hari_tanggal" class="form-label">Hari/Tanggal Acara <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="hari_tanggal" required
                                                   value="{{ $dataSurat['hari_tanggal'] ?? '' }}"
                                                   placeholder="Contoh: Jum'at, 13 Juni 2025">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jam" class="form-label">Jam <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="jam" required
                                                   value="{{ $dataSurat['jam'] ?? '' }}"
                                                   placeholder="Contoh: 09.30 WIB – selesai">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="acara" class="form-label">Acara <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="acara" required
                                                   value="{{ $dataSurat['acara'] ?? '' }}"
                                                   placeholder="Contoh: Rapat Koordinasi">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tempat" class="form-label">Tempat Acara <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="tempat" required
                                                   value="{{ $dataSurat['tempat'] ?? '' }}"
                                                   placeholder="Contoh: Gedung Kantor Desa Ketapang Baru">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="penutup" class="form-label">Penutup</label>
                                        <textarea class="form-control" name="penutup" rows="2"
                                                  placeholder="Kalimat penutup undangan">{{ $dataSurat['penutup'] ?? '' }}</textarea>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="tanggal_ttd" class="form-label">Tanggal TTD <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="tanggal_ttd" required
                                                   value="{{ $dataSurat['tanggal_ttd'] ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="kepala_desa" class="form-label">Nama Kepala Desa</label>
                                            <input type="text" class="form-control" name="kepala_desa"
                                                   value="{{ $dataSurat['kepala_desa'] ?? '' }}"
                                                   placeholder="Nama Kepala Desa (opsional)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <!-- Dynamic Form untuk SPPD -->
                        @if($pengajuan->jenis_surat === 'sppd')
                            @php
                                $dataSurat = $pengajuan->data_surat ?? [];
                                $personelList = $dataSurat['personel'] ?? [];
                                // Debug: uncomment to see personel data structure
                                // dd($personelList);
                            @endphp

                            <div class="card mb-5">
                                <div class="card-header">
                                    <h5 class="card-title">Data Perjalanan Dinas</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Personel Section -->
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <label class="form-label fw-bold">Personel yang Diperintahkan <span class="text-danger">*</span></label>
                                            <button type="button" class="btn btn-sm btn-primary" onclick="tambahPersonelSPPDEdit()">
                                                <i class="fas fa-plus me-1"></i>Tambah Personel
                                            </button>
                                        </div>

                                        <div id="personel-container-sppd-edit">
                                            @foreach($personelList as $index => $personel)
                                                <div class="personel-item-sppd-edit card mb-3" data-index="{{ $index }}">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                                            <h6 class="mb-0">Personel #{{ $index + 1 }}</h6>
                                                            @if($index > 0)
                                                                <button type="button" class="btn btn-sm btn-danger" onclick="hapusPersonelSPPDEdit(this)">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            @else
                                                                <button type="button" class="btn btn-sm btn-danger d-none" onclick="hapusPersonelSPPDEdit(this)">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="form-label">Nama <span class="text-danger">*</span></label>
                                                                <select class="form-select personel-warga-select" name="personel[{{ $index }}][warga_id]" data-control="select2" data-placeholder="Cari warga..." required>
                                                                    <option value="">Pilih Warga...</option>
                                                                    @foreach($users as $user)
                                                                        <option value="{{ $user->id }}" data-nama="{{ $user->nama_lengkap }}"
                                                                            {{ (isset($personel['warga_id']) && $user->id == $personel['warga_id']) ? 'selected' : '' }}>
                                                                            {{ $user->nama_lengkap }} - {{ $user->nik }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">Jabatan <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="personel[{{ $index }}][jabatan]"
                                                                       value="{{ $personel['jabatan'] ?? '' }}" required
                                                                       placeholder="Contoh: Ketua Bidang Usaha">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="tujuan_perjalanan" class="form-label">Tujuan Perjalanan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="tujuan_perjalanan" required
                       placeholder="Contoh: Kantor Camat SAM"
                       value="{{ $pengajuan->data_surat['tujuan_perjalanan'] ?? '' }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="keperluan_sppd" class="form-label">Untuk/Keperluan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="keperluan_sppd" required
                       placeholder="Contoh: Sosialisasi Koperasi Desa Merah Putih"
                       value="{{ $pengajuan->data_surat['keperluan'] ?? '' }}">
            </div>
        </div>
    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="tanggal_berangkat" class="form-label">Tanggal Berangkat <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="tanggal_berangkat"
                                                       value="{{ old('tanggal_berangkat', $dataSurat['tanggal_berangkat'] ?? '') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="tanggal_kembali" class="form-label">Tanggal Kembali <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="tanggal_kembali"
                                                       value="{{ old('tanggal_kembali', $dataSurat['tanggal_kembali'] ?? '') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="transportasi" class="form-label">Transportasi <span class="text-danger">*</span></label>
                                        <select class="form-select" name="transportasi" required>
                                            <option value="">Pilih Transportasi...</option>
                                            <option value="Roda Dua/Motor" {{ ($dataSurat['transportasi'] ?? '') == 'Roda Dua/Motor' ? 'selected' : '' }}>Roda Dua/Motor</option>
                                            <option value="Roda Empat/Mobil" {{ ($dataSurat['transportasi'] ?? '') == 'Roda Empat/Mobil' ? 'selected' : '' }}>Roda Empat/Mobil</option>
                                            <option value="Kendaraan Dinas" {{ ($dataSurat['transportasi'] ?? '') == 'Kendaraan Dinas' ? 'selected' : '' }}>Kendaraan Dinas</option>
                                            <option value="Alat Angkutan Umum" {{ ($dataSurat['transportasi'] ?? '') == 'Alat Angkutan Umum' ? 'selected' : '' }}>Alat Angkutan Umum</option>
                                            <option value="Lainnya" {{ ($dataSurat['transportasi'] ?? '') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                    </div>

                                    <!-- Biaya Perjalanan Dinas -->
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Perincian Biaya Perjalanan Dinas</label>
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
                                            @php
                                                $existingBiaya = $dataSurat['biaya'] ?? [];
                                                if (empty($existingBiaya)) {
                                            @endphp
                                            <tr>
                                                <td>
                                                    <input type="text" name="biaya[0][uraian]" class="form-control" placeholder="Contoh: Uang Harian">
                                                </td>
                                                <td>
                                                    <input type="number" name="biaya[0][jumlah]" class="form-control" min="0" placeholder="Contoh: 50000">
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
                                            @php
                                                } else {
                                                    foreach ($existingBiaya as $index => $item) {
                                            @endphp
                                            <tr>
                                                <td>
                                                    <input type="text" name="biaya[{{ $index }}][uraian]" class="form-control" placeholder="Contoh: Uang Harian" value="{{ $item['uraian'] ?? '' }}">
                                                </td>
                                                <td>
                                                    <input type="number" name="biaya[{{ $index }}][jumlah]" class="form-control" min="0" placeholder="Contoh: 50000" value="{{ $item['jumlah'] ?? '' }}">
                                                </td>
                                                <td>
                                                    <input type="text" name="biaya[{{ $index }}][ket]" class="form-control" placeholder="Opsional" value="{{ $item['ket'] ?? '' }}">
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-sm btn-light-danger btn-hapus-baris-biaya">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @php
                                                    }
                                                }
                                            @endphp
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label class="required form-label">Jenis TTD</label>
                                    <select name="jenis_ttd" class="form-select" required>
                                        <option value="manual" {{ old('jenis_ttd', $pengajuan->jenis_ttd) == 'manual' ? 'selected' : '' }}>TTD Manual</option>
                                        <option value="gambar" {{ old('jenis_ttd', $pengajuan->jenis_ttd) == 'gambar' ? 'selected' : '' }}>TTD Gambar</option>
                                        <option value="qrcode" {{ old('jenis_ttd', $pengajuan->jenis_ttd) == 'qrcode' ? 'selected' : '' }}>TTD QR Code</option>
                                    </select>
                                    @error('jenis_ttd')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            @if($pengajuan->jenis_surat === 'sppd')
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label class="required form-label">Jenis TTD Camat</label>
                                    <select name="jenis_ttd_camat" class="form-select" required>
                                        <option value="manual" {{ old('jenis_ttd_camat', $pengajuan->jenis_ttd_camat) == 'manual' ? 'selected' : '' }}>TTD Manual</option>
                                        <option value="gambar" {{ old('jenis_ttd_camat', $pengajuan->jenis_ttd_camat) == 'gambar' ? 'selected' : '' }}>TTD Gambar</option>
                                        <option value="qrcode" {{ old('jenis_ttd_camat', $pengajuan->jenis_ttd_camat) == 'qrcode' ? 'selected' : '' }}>TTD QR Code</option>
                                    </select>
                                    @error('jenis_ttd_camat')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="text-end">
                            <a href="{{ route('admin.pengajuan-surat.show', $pengajuan->id) }}" class="btn btn-light me-3">Batal</a>
                            <button type="button" class="btn btn-primary" onclick="showEditConfirmation()">
                                <i class="ki-duotone ki-check fs-4"><span class="path1"></span><span class="path2"></span></i>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize Select2 for existing personel dropdowns in SPPD edit
    // Use setTimeout to ensure DOM is fully loaded
    setTimeout(function() {
        $('.personel-warga-select').each(function() {
            const $select = $(this);
            // Check if not already initialized and has options
            if (!$select.hasClass('select2-hidden-accessible') && $select.find('option').length > 1) {
                $select.select2({
                    placeholder: 'Cari warga...',
                    allowClear: true,
                    width: '100%',
                    minimumInputLength: 0,
                    language: {
                        noResults: function() {
                            return 'Tidak ada warga ditemukan';
                        },
                        searching: function() {
                            return 'Mencari...';
                        }
                    }
                });
            }
        });
    }, 100);

    // Show validation errors in SweetAlert
    @if($errors->any())
        let errorHtml = '<div class="text-start"><ul class="mb-0" style="list-style-position: inside;">';
        @foreach($errors->all() as $error)
            errorHtml += '<li>{{ $error }}</li>';
        @endforeach
        errorHtml += '</ul></div>';

        Swal.fire({
            icon: 'error',
            title: 'Validasi Gagal',
            html: errorHtml,
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'btn btn-primary'
            }
        });
    @endif

    // Show success message in SweetAlert
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'btn btn-primary'
            }
        });
    @endif

    // Show error message in SweetAlert
    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'btn btn-primary'
            }
        });
    @endif
});

// Fungsi untuk menampilkan konfirmasi edit dengan SweetAlert
function showEditConfirmation() {
    Swal.fire({
        title: 'Simpan Perubahan?',
        text: "Apakah Anda yakin ingin menyimpan perubahan pada surat ini?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, Simpan',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit form langsung tanpa loading overlay
            document.getElementById('editSuratForm').submit();
        }
    });
}

// Fungsi untuk update info warga saat dropdown dipilih (hanya untuk non-SPPD)
const userIdSelect = document.getElementById('user_id');
if (userIdSelect) {
    userIdSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const userInfo = document.getElementById('userInfo');

        if (this.value) {
            document.getElementById('displayNik').textContent = selectedOption.dataset.nik || '-';
            document.getElementById('displayNoHp').textContent = selectedOption.dataset.noHp || '-';
            document.getElementById('displayAlamat').textContent = selectedOption.dataset.alamat || '-';
            userInfo.style.display = 'block';
        } else {
            userInfo.style.display = 'none';
        }
    });
}

// Handler untuk dropdown jenis_dokumen pada surat kehilangan
const jenisDokumenSelect = document.querySelector('select[name="jenis_dokumen"]');
if (jenisDokumenSelect) {
    jenisDokumenSelect.addEventListener('change', function() {
        const wrapper = document.getElementById('nama_barang_lainnya_wrapper');
        if (wrapper) {
            wrapper.style.display = this.value === 'Lainnya' ? 'block' : 'none';
        }
    });
}

// Handler untuk dropdown waktu_kehilangan pada surat kehilangan
const waktuKehilanganSelect = document.querySelector('select[name="waktu_kehilangan"]');
if (waktuKehilanganSelect) {
    waktuKehilanganSelect.addEventListener('change', function() {
        const wrapper = document.getElementById('keterangan_waktu_wrapper');
        if (wrapper) {
            wrapper.style.display = this.value === 'Lainnya' ? 'block' : 'none';
        }
    });
}

// Data users untuk SPPD personel dropdown
const usersData = @json($users->map(function($user) {
    return [
        'id' => $user->id,
        'nama_lengkap' => $user->nama_lengkap,
        'nik' => $user->nik
    ];
}));

// Fungsi untuk Personel SPPD Edit
let personelSPPDEditCount = {{ count($pengajuan->data_surat['personel'] ?? []) ?: 0 }};

function generateUserOptions() {
    let options = '<option value="">Pilih Warga...</option>';
    usersData.forEach(function(user) {
        options += '<option value="' + user.id + '" data-nama="' + user.nama_lengkap + '">' + user.nama_lengkap + ' - ' + user.nik + '</option>';
    });
    return options;
}

function tambahPersonelSPPDEdit() {
    const container = document.getElementById('personel-container-sppd-edit');
    const index = personelSPPDEditCount++;

    const newPersonel = document.createElement('div');
    newPersonel.className = 'personel-item-sppd-edit card mb-3';
    newPersonel.setAttribute('data-index', index);
    newPersonel.style.animation = 'fadeIn 0.3s ease-in';

    newPersonel.innerHTML = `
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="mb-0">Personel #${index + 1}</h6>
                <button type="button" class="btn btn-sm btn-danger" onclick="hapusPersonelSPPDEdit(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Nama <span class="text-danger">*</span></label>
                    <select class="form-select personel-warga-select-new" name="personel[${index}][warga_id]" data-control="select2" data-placeholder="Cari warga..." required>
                        ${generateUserOptions()}
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
        const $newSelect = $(newSelect);
        // Check if has options before initializing
        if ($newSelect.find('option').length > 1 && !$newSelect.hasClass('select2-hidden-accessible')) {
            $newSelect.select2({
                placeholder: 'Cari warga...',
                allowClear: true,
                width: '100%',
                minimumInputLength: 0,
                language: {
                    noResults: function() {
                        return 'Tidak ada warga ditemukan';
                    },
                    searching: function() {
                        return 'Mencari...';
                    }
                }
            });
        }
    }

    // Update tombol hapus pada item pertama jika ini item kedua
    const items = container.querySelectorAll('.personel-item-sppd-edit');
    if (items.length === 2) {
        const firstItem = items[0];
        const deleteBtn = firstItem.querySelector('.btn-danger');
        if (deleteBtn) {
            deleteBtn.classList.remove('d-none');
        }
    }
}

function hapusPersonelSPPDEdit(button) {
    const container = document.getElementById('personel-container-sppd-edit');
    const item = button.closest('.personel-item-sppd-edit');

    // Cek jika ini item terakhir, jangan hapus
    const items = container.querySelectorAll('.personel-item-sppd-edit');
    if (items.length <= 1) {
        alert('Minimal harus ada 1 personel!');
        return;
    }

    item.style.animation = 'fadeOut 0.3s ease-out';
    setTimeout(() => {
        item.remove();

        // Update tombol hapus jika hanya 1 item tersisa
        const remainingItems = container.querySelectorAll('.personel-item-sppd-edit');
        if (remainingItems.length === 1) {
            const firstItem = remainingItems[0];
            const deleteBtn = firstItem.querySelector('.btn-danger');
            if (deleteBtn) {
                deleteBtn.classList.add('d-none');
            }
        }
    }, 300);
}

// Handler untuk tombol tambah biaya
$(document).on('click', '#tambah-baris-biaya', function() {
    const tbody = $(this).closest('table').find('tbody');
    const rowCount = tbody.find('tr').length;
    const newRow = `
        <tr>
            <td>
                <input type="text" name="biaya[${rowCount}][uraian]" class="form-control" placeholder="Contoh: Uang Harian">
            </td>
            <td>
                <input type="number" name="biaya[${rowCount}][jumlah]" class="form-control" min="0" placeholder="Contoh: 50000">
            </td>
            <td>
                <input type="text" name="biaya[${rowCount}][ket]" class="form-control" placeholder="Opsional">
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-sm btn-light-danger btn-hapus-baris-biaya">
                    <i class="fas fa-minus"></i>
                </button>
            </td>
        </tr>
    `;
    tbody.append(newRow);

    // Show delete button on first row if this is the second row
    if (rowCount === 1) {
        tbody.find('tr:first .btn-hapus-baris-biaya').show();
    }
});

// Handler untuk tombol hapus baris biaya
$(document).on('click', '.btn-hapus-baris-biaya', function() {
    const tbody = $(this).closest('tbody');
    const rowCount = tbody.find('tr').length;

    // Minimal 1 baris harus ada
    if (rowCount <= 1) {
        alert('Minimal harus ada 1 baris biaya!');
        return;
    }

    $(this).closest('tr').fadeOut(300, function() {
        $(this).remove();

        // Hide delete button on first row if only 1 row remaining
        if (tbody.find('tr').length === 1) {
            tbody.find('tr:first .btn-hapus-baris-biaya').hide();
        }
    });
});

// ==================== PENGIKUT SURAT PINDAH HANDLER (EDIT) ====================
@php
    $pengikutEditData = [];
    if (isset($pengajuan) && isset($pengajuan->data_surat) && is_array($pengajuan->data_surat)) {
        $pengikutEditData = $pengajuan->data_surat['pengikut'] ?? [];
    }
@endphp
var pengikutIndexEdit = {{ is_array($pengikutEditData) ? count($pengikutEditData) : 0 }};

function tambahPengikutEdit() {
    var container = document.getElementById('pengikutContainerEdit');
    if (container) {
        var html = `
            <div class="pengikut-item card mb-2" data-index="${pengikutIndexEdit}">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0 text-primary"><i class="fas fa-user me-1"></i>Pengikut ${pengikutIndexEdit + 1}</h6>
                        <button type="button" class="btn btn-danger btn-sm" onclick="hapusPengikutEdit(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-4">
                            <label class="form-label small">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="pengikut[${pengikutIndexEdit}][nama]" placeholder="Nama lengkap" required>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="pengikut[${pengikutIndexEdit}][jenis_kelamin]" required>
                                <option value="">Pilih...</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small">TTL/Umur</label>
                            <input type="text" class="form-control form-control-sm" name="pengikut[${pengikutIndexEdit}][ttl_umur]" placeholder="Cth: 25 Th">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small">Hubungan <span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="pengikut[${pengikutIndexEdit}][hubungan]" required>
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
                            <select class="form-select form-select-sm" name="pengikut[${pengikutIndexEdit}][pendidikan]">
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
        container.insertAdjacentHTML('beforeend', html);
        pengikutIndexEdit++;
        updatePengikutVisibilityEdit();
    }
}

function hapusPengikutEdit(btn) {
    var item = btn.closest('.pengikut-item');
    if (item) {
        item.remove();
        updatePengikutVisibilityEdit();
    }
}

function updatePengikutVisibilityEdit() {
    var container = document.getElementById('pengikutContainerEdit');
    var noText = document.getElementById('noPengikutTextEdit');
    if (container && noText) {
        if (container.children.length > 0) {
            noText.style.display = 'none';
        } else {
            noText.style.display = 'block';
        }
    }
}
</script>
@endpush
