@extends('layouts.dashboard.dashboard')

@section('title', 'Detail Pengajuan Surat')

@section('menu')
    Detail Pengajuan Surat
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
    <li class="breadcrumb-item text-muted">Detail Pengajuan</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="row g-5">
                <!-- Data Pemohon -->
                <div class="col-xl-4">
                    <div class="card card-flush mb-6 mb-xl-9">
                        <div class="card-header border-0">
                            <div class="card-title">
                                <h3 class="fw-bold m-0">Data Pemohon</h3>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5">
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold text-muted">Tracking Number</td>
                                            <td class="text-end">
                                                <span class="badge badge-light-primary">{{ $pengajuan->tracking_number }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Nama Lengkap</td>
                                            <td class="text-end fw-bold">{{ $pengajuan->nama_lengkap }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">NIK</td>
                                            <td class="text-end">{{ $pengajuan->nik }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">No. HP</td>
                                            <td class="text-end">{{ $pengajuan->no_hp ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Alamat</td>
                                            <td class="text-end">{{ $pengajuan->alamat ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Jenis Surat</td>
                                            <td class="text-end">
                                                @switch($pengajuan->jenis_surat)
                                                    @case('surat_kehilangan')
                                                        <span class="badge badge-light-danger">Surat Kehilangan</span>
                                                        @break
                                                    @case('surat_bersih_diri')
                                                        <span class="badge badge-light-success">Surat Bersih Diri</span>
                                                        @break
                                                    @case('sppd')
                                                        <span class="badge badge-light-primary">SPPD</span>
                                                        @break
                                                    @case('izin_keramaian')
                                                        <span class="badge badge-light-warning">Surat Izin Keramaian</span>
                                                        @break
                                                    @case('ket_belum_menikah')
                                                        <span class="badge badge-light-info">Surat Keterangan Belum Menikah</span>
                                                        @break
                                                    @case('surat_berkelakuan_baik')
                                                        <span class="badge badge-light-success">Surat Keterangan Berkelakuan Baik</span>
                                                        @break
                                                    @case('surat_menikah')
                                                        <span class="badge badge-light-primary">Surat Keterangan Menikah</span>
                                                        @break
                                                    @case('surat_kematian')
                                                        <span class="badge badge-light-danger">Surat Keterangan Kematian</span>
                                                        @break
                                                    @case('surat_miskin')
                                                        <span class="badge badge-light-warning">Surat Keterangan Miskin DTKS</span>
                                                        @break
                                                    @case('surat_penghasilan_ortu')
                                                        <span class="badge badge-light-info">Surat Keterangan Penghasilan Orang Tua</span>
                                                        @break
                                                    @default
                                                        <span class="badge badge-light-secondary">{{ ucfirst(str_replace('_', ' ', $pengajuan->jenis_surat)) }}</span>
                                                @endswitch
                                            </td>
                                        </tr>
                                        @if($pengajuan->no_surat)
                                        <tr>
                                            <td class="fw-bold text-muted">Nomor Surat</td>
                                            <td class="text-end">
                                                <span class="badge badge-light-info">{{ $pengajuan->no_surat }}</span>
                                            </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td class="fw-bold text-muted">Status</td>
                                            <td class="text-end">
                                                @switch($pengajuan->status)
                                                    @case('Diajukan')
                                                        <span class="badge badge-light-warning">{{ $pengajuan->status }}</span>
                                                        @break
                                                    @case('Disetujui')
                                                        <span class="badge badge-light-success">{{ $pengajuan->status }}</span>
                                                        @break
                                                    @case('Ditolak')
                                                        <span class="badge badge-light-danger">{{ $pengajuan->status }}</span>
                                                        @break
                                                    @default
                                                        <span class="badge badge-light-secondary">{{ $pengajuan->status }}</span>
                                                @endswitch
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Jenis TTD</td>
                                            <td class="text-end">
                                                @if($pengajuan->jenis_ttd === 'qrcode')
                                                    <span class="badge badge-light-info">QR Code</span>
                                                @else
                                                    <span class="badge badge-light-primary">TTD Biasa</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-muted">Tanggal Pengajuan</td>
                                            <td class="text-end">{{ $pengajuan->created_at->format('d/m/Y H:i') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Surat -->
                <div class="col-xl-8">
                    <div class="card card-flush mb-6 mb-xl-9">
                        <div class="card-header border-0">
                            <div class="card-title">
                                <h3 class="fw-bold m-0">Detail Pengajuan Surat</h3>
                            </div>
                            <div class="card-toolbar">
                                @if($pengajuan->status === 'Diajukan')
                                    <button class="btn btn-success btn-sm me-2 approve-btn" data-id="{{ $pengajuan->id }}">
                                        <i class="ki-duotone ki-check fs-4"><span class="path1"></span><span class="path2"></span></i>
                                        Setujui
                                    </button>
                                    <button class="btn btn-danger btn-sm reject-btn" data-id="{{ $pengajuan->id }}">
                                        <i class="ki-duotone ki-cross fs-4"><span class="path1"></span><span class="path2"></span></i>
                                        Tolak
                                    </button>
                                @elseif($pengajuan->status === 'Disetujui')
                                    <a href="{{ route('admin.pengajuan-surat.generate-pdf', $pengajuan->id) }}"
                                       class="btn btn-primary btn-sm" target="_blank">
                                        <i class="ki-duotone ki-file-down fs-4"><span class="path1"></span><span class="path2"></span></i>
                                        Download PDF
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <!-- Keperluan -->
                            <div class="mb-7">
                                <label class="fs-6 fw-semibold mb-2">Keperluan:</label>
                                <div class="bg-light-primary p-4 rounded">{{ $pengajuan->keperluan }}</div>
                            </div>

                            <!-- Data Surat Spesifik -->
                            @if($pengajuan->jenis_surat === 'surat_kehilangan')
                                <div class="row g-5 mb-7">
                                    <div class="col-md-6">
                                        <label class="fs-6 fw-semibold mb-2">Jenis Dokumen/Barang Hilang:</label>
                                        <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['jenis_dokumen'] ?? '-' }}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="fs-6 fw-semibold mb-2">Nomor Dokumen:</label>
                                        <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['nomor_dokumen'] ?? '-' }}</div>
                                    </div>
                                </div>

                                @if(isset($pengajuan->data_surat['nama_barang_lainnya']) && $pengajuan->data_surat['nama_barang_lainnya'])
                                    <div class="mb-7">
                                        <label class="fs-6 fw-semibold mb-2">Nama Barang (Lainnya):</label>
                                        <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['nama_barang_lainnya'] }}</div>
                                    </div>
                                @endif

                                <div class="mb-7">
                                    <label class="fs-6 fw-semibold mb-2">Tempat Kehilangan:</label>
                                    <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['tempat_kehilangan'] ?? '-' }}</div>
                                </div>

                                <div class="row g-5 mb-7">
                                    <div class="col-md-6">
                                        <label class="fs-6 fw-semibold mb-2">Waktu Kehilangan:</label>
                                        <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['waktu_kehilangan'] ?? '-' }}</div>
                                    </div>
                                    @if(isset($pengajuan->data_surat['keterangan_waktu']) && $pengajuan->data_surat['keterangan_waktu'])
                                        <div class="col-md-6">
                                            <label class="fs-6 fw-semibold mb-2">Keterangan Waktu:</label>
                                            <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['keterangan_waktu'] }}</div>
                                        </div>
                                    @endif
                                </div>
            @elseif($pengajuan->jenis_surat === 'surat_bersih_diri')
                @if(isset($pengajuan->data_surat['keterangan_tambahan']) && $pengajuan->data_surat['keterangan_tambahan'])
                    <div class="mb-7">
                        <label class="fs-6 fw-semibold mb-2">Keterangan Tambahan:</label>
                        <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['keterangan_tambahan'] }}</div>
                    </div>
                @endif
            @elseif($pengajuan->jenis_surat === 'sppd')
                <div class="row g-6 mb-7">
                    @if(isset($pengajuan->data_surat['personel']) && !empty($pengajuan->data_surat['personel']))
                        <div class="col-12">
                            <label class="fs-6 fw-semibold mb-2">Daftar Personel yang Ditugaskan:</label>
                            <div class="bg-light p-4 rounded">
                                @foreach($pengajuan->data_surat['personel'] as $index => $person)
                                    <div class="d-flex justify-content-between align-items-center mb-2 {{ !$loop->last ? 'border-bottom pb-2' : '' }}">
                                        <div>
                                            <strong>{{ $index + 1 }}. {{ $person['nama'] }}</strong><br>
                                            <small class="text-muted">{{ $person['jabatan'] }}</small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if(isset($pengajuan->data_surat['tujuan']) && $pengajuan->data_surat['tujuan'])
                        <div class="col-md-6">
                            <label class="fs-6 fw-semibold mb-2">Tujuan Perjalanan:</label>
                            <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['tujuan'] }}</div>
                        </div>
                    @endif

                    @if(isset($pengajuan->data_surat['keperluan']) && $pengajuan->data_surat['keperluan'])
                        <div class="col-md-6">
                            <label class="fs-6 fw-semibold mb-2">Keperluan Perjalanan:</label>
                            <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['keperluan'] }}</div>
                        </div>
                    @endif

                    @if(isset($pengajuan->data_surat['tanggal_berangkat']) && $pengajuan->data_surat['tanggal_berangkat'])
                        <div class="col-md-6">
                            <label class="fs-6 fw-semibold mb-2">Tanggal Berangkat:</label>
                            <div class="bg-light p-3 rounded">{{ \Carbon\Carbon::parse($pengajuan->data_surat['tanggal_berangkat'])->format('d F Y') }}</div>
                        </div>
                    @endif

                    @if(isset($pengajuan->data_surat['tanggal_kembali']) && $pengajuan->data_surat['tanggal_kembali'])
                        <div class="col-md-6">
                            <label class="fs-6 fw-semibold mb-2">Tanggal Kembali:</label>
                            <div class="bg-light p-3 rounded">{{ \Carbon\Carbon::parse($pengajuan->data_surat['tanggal_kembali'])->format('d F Y') }}</div>
                        </div>
                    @endif

                    @if(isset($pengajuan->data_surat['transportasi']) && $pengajuan->data_surat['transportasi'])
                        <div class="col-md-6">
                            <label class="fs-6 fw-semibold mb-2">Transportasi:</label>
                            <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['transportasi'] }}</div>
                        </div>
                    @endif

                    @if(isset($pengajuan->data_surat['keterangan_tambahan']) && $pengajuan->data_surat['keterangan_tambahan'])
                        <div class="col-12">
                            <label class="fs-6 fw-semibold mb-2">Keterangan Tambahan:</label>
                            <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['keterangan_tambahan'] }}</div>
                        </div>
                    @endif
                </div>
            @elseif($pengajuan->jenis_surat === 'izin_keramaian')
                @if(isset($pengajuan->data_surat['keperluan_acara']) && $pengajuan->data_surat['keperluan_acara'])
                    <div class="mb-7">
                        <label class="fs-6 fw-semibold mb-2">Keperluan Acara:</label>
                        <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['keperluan_acara'] }}</div>
                    </div>
                @endif
            @elseif($pengajuan->jenis_surat === 'surat_menikah')
                <div class="row g-5">
                    @if(isset($pengajuan->data_surat['tanggal_menikah']) && $pengajuan->data_surat['tanggal_menikah'])
                        <div class="col-12">
                            <label class="fs-6 fw-semibold mb-2">Tanggal Menikah:</label>
                            <div class="bg-light p-3 rounded">
                                {{ \Carbon\Carbon::parse($pengajuan->data_surat['tanggal_menikah'])->format('d F Y') }}
                            </div>
                        </div>
                    @endif
                </div>
            @elseif($pengajuan->jenis_surat === 'surat_kematian')
                <div class="row g-5">
                    @if(isset($pengajuan->data_surat['nama_almarhum']) && $pengajuan->data_surat['nama_almarhum'])
                        <div class="col-md-6">
                            <label class="fs-6 fw-semibold mb-2">Nama Almarhum/Almarhumah:</label>
                            <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['nama_almarhum'] }}</div>
                        </div>
                    @endif

                    @if(isset($pengajuan->data_surat['hari_kematian']) && $pengajuan->data_surat['hari_kematian'])
                        <div class="col-md-6">
                            <label class="fs-6 fw-semibold mb-2">Hari Kematian:</label>
                            <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['hari_kematian'] }}</div>
                        </div>
                    @endif

                    @if(isset($pengajuan->data_surat['tanggal_kematian']) && $pengajuan->data_surat['tanggal_kematian'])
                        <div class="col-md-6">
                            <label class="fs-6 fw-semibold mb-2">Tanggal Kematian:</label>
                            <div class="bg-light p-3 rounded">
                                {{ \Carbon\Carbon::parse($pengajuan->data_surat['tanggal_kematian'])->format('d F Y') }}
                            </div>
                        </div>
                    @endif

                    @if(isset($pengajuan->data_surat['tempat_kematian']) && $pengajuan->data_surat['tempat_kematian'])
                        <div class="col-md-6">
                            <label class="fs-6 fw-semibold mb-2">Tempat Kematian:</label>
                            <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['tempat_kematian'] }}</div>
                        </div>
                    @endif

                    @if(isset($pengajuan->data_surat['sebab_kematian']) && $pengajuan->data_surat['sebab_kematian'])
                        <div class="col-12">
                            <label class="fs-6 fw-semibold mb-2">Sebab Kematian:</label>
                            <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['sebab_kematian'] }}</div>
                        </div>
                    @endif
                </div>
            @elseif($pengajuan->jenis_surat === 'surat_miskin')
                <div class="row g-5">
                    @if(isset($pengajuan->data_surat['keperluan']) && $pengajuan->data_surat['keperluan'])
                        <div class="col-12">
                            <label class="fs-6 fw-semibold mb-2">Keperluan Surat:</label>
                            <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['keperluan'] }}</div>
                        </div>
                    @endif
                </div>

                <!-- Admin Input Fields untuk Surat Miskin -->
                @if($pengajuan->status === 'Diajukan')
                    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mb-6">
                        <h5 class="text-yellow-800 font-semibold mb-3">
                            <i class="fas fa-user-tie mr-2"></i>
                            Data Pejabat untuk Surat Miskin
                        </h5>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="fs-6 fw-semibold mb-2">NIP Kepala Desa:</label>
                                <input type="text" class="form-control admin-input" data-field="nip" value="{{ $pengajuan->nip ?? '' }}" placeholder="Masukkan NIP Kepala Desa">
                            </div>
                            <div class="col-md-6">
                                <label class="fs-6 fw-semibold mb-2">Pangkat/Golongan Kepala Desa:</label>
                                <input type="text" class="form-control admin-input" data-field="pangkat_golongan" value="{{ $pengajuan->pangkat_golongan ?? '' }}" placeholder="Masukkan Pangkat/Golongan">
                            </div>
                            <div class="col-md-6">
                                <label class="fs-6 fw-semibold mb-2">Nama Camat:</label>
                                <input type="text" class="form-control admin-input" data-field="nama_camat" value="{{ $pengajuan->nama_camat ?? '' }}" placeholder="Masukkan Nama Camat">
                            </div>
                            <div class="col-md-6">
                                <label class="fs-6 fw-semibold mb-2">NIP Camat:</label>
                                <input type="text" class="form-control admin-input" data-field="nip_camat" value="{{ $pengajuan->nip_camat ?? '' }}" placeholder="Masukkan NIP Camat">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-warning btn-sm" onclick="saveAdminData()">
                                <i class="fas fa-save mr-1"></i> Simpan Data Pejabat
                            </button>
                        </div>
                    </div>

                    <!-- Dual TTD Selection untuk Surat Miskin -->
                    <div class="mb-7">
                        <label class="fs-6 fw-semibold mb-2">Pilih Jenis Tanda Tangan Kepala Desa:</label>
                        <select class="form-select jenis-ttd-select" data-pengajuan-id="{{ $pengajuan->id }}">
                            <option value="manual" {{ $pengajuan->jenis_ttd == 'manual' ? 'selected' : '' }}>TTD Manual (Tanda tangan di kantor)</option>
                            <option value="gambar" {{ $pengajuan->jenis_ttd == 'gambar' ? 'selected' : '' }}>TTD Gambar (Langsung tampil di PDF)</option>
                            <option value="qrcode" {{ $pengajuan->jenis_ttd == 'qrcode' ? 'selected' : '' }}>TTD QR Code (Scan untuk lihat tanda tangan)</option>
                        </select>
                    </div>

                    <div class="mb-7">
                        <label class="fs-6 fw-semibold mb-2">Pilih Jenis Tanda Tangan Camat:</label>
                        <select class="form-select jenis-ttd-camat-select" data-pengajuan-id="{{ $pengajuan->id }}">
                            <option value="manual" {{ ($pengajuan->jenis_ttd_camat ?? 'manual') == 'manual' ? 'selected' : '' }}>TTD Manual (Tanda tangan di kantor)</option>
                            <option value="gambar" {{ ($pengajuan->jenis_ttd_camat ?? 'manual') == 'gambar' ? 'selected' : '' }}>TTD Gambar (Langsung tampil di PDF)</option>
                            <option value="qrcode" {{ ($pengajuan->jenis_ttd_camat ?? 'manual') == 'qrcode' ? 'selected' : '' }}>TTD QR Code (Scan untuk lihat tanda tangan)</option>
                        </select>
                    </div>
                @endif
            @elseif($pengajuan->jenis_surat === 'surat_penghasilan_ortu')
                <div class="row g-5">
                    <!-- Data Ayah -->
                    <div class="col-12">
                        <h5 class="text-primary mb-3"><i class="fas fa-male mr-2"></i>Data Ayah</h5>
                        <div class="row g-3">
                            @if(isset($pengajuan->data_surat['nama_ayah']) && $pengajuan->data_surat['nama_ayah'])
                                <div class="col-md-6">
                                    <label class="fs-6 fw-semibold mb-2">Nama Ayah:</label>
                                    <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['nama_ayah'] }}</div>
                                </div>
                            @endif

                            @if(isset($pengajuan->data_surat['tempat_lahir_ayah']) && $pengajuan->data_surat['tempat_lahir_ayah'])
                                <div class="col-md-6">
                                    <label class="fs-6 fw-semibold mb-2">Tempat/Tanggal Lahir Ayah:</label>
                                    <div class="bg-light p-3 rounded">
                                        {{ $pengajuan->data_surat['tempat_lahir_ayah'] }},
                                        @if(isset($pengajuan->data_surat['tanggal_lahir_ayah']))
                                            {{ \Carbon\Carbon::parse($pengajuan->data_surat['tanggal_lahir_ayah'])->format('d F Y') }}
                                        @endif
                                    </div>
                                </div>
                            @endif

                            @if(isset($pengajuan->data_surat['pekerjaan_ayah']) && $pengajuan->data_surat['pekerjaan_ayah'])
                                <div class="col-md-6">
                                    <label class="fs-6 fw-semibold mb-2">Pekerjaan Ayah:</label>
                                    <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['pekerjaan_ayah'] }}</div>
                                </div>
                            @endif

                            @if(isset($pengajuan->data_surat['penghasilan_ayah']) && $pengajuan->data_surat['penghasilan_ayah'])
                                <div class="col-md-6">
                                    <label class="fs-6 fw-semibold mb-2">Penghasilan Ayah:</label>
                                    <div class="bg-light p-3 rounded">Rp {{ number_format($pengajuan->data_surat['penghasilan_ayah'], 0, ',', '.') }}</div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Data Ibu -->
                    <div class="col-12">
                        <h5 class="text-pink mb-3"><i class="fas fa-female mr-2"></i>Data Ibu</h5>
                        <div class="row g-3">
                            @if(isset($pengajuan->data_surat['nama_ibu']) && $pengajuan->data_surat['nama_ibu'])
                                <div class="col-md-6">
                                    <label class="fs-6 fw-semibold mb-2">Nama Ibu:</label>
                                    <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['nama_ibu'] }}</div>
                                </div>
                            @endif

                            @if(isset($pengajuan->data_surat['tempat_lahir_ibu']) && $pengajuan->data_surat['tempat_lahir_ibu'])
                                <div class="col-md-6">
                                    <label class="fs-6 fw-semibold mb-2">Tempat/Tanggal Lahir Ibu:</label>
                                    <div class="bg-light p-3 rounded">
                                        {{ $pengajuan->data_surat['tempat_lahir_ibu'] }},
                                        @if(isset($pengajuan->data_surat['tanggal_lahir_ibu']))
                                            {{ \Carbon\Carbon::parse($pengajuan->data_surat['tanggal_lahir_ibu'])->format('d F Y') }}
                                        @endif
                                    </div>
                                </div>
                            @endif

                            @if(isset($pengajuan->data_surat['pekerjaan_ibu']) && $pengajuan->data_surat['pekerjaan_ibu'])
                                <div class="col-md-6">
                                    <label class="fs-6 fw-semibold mb-2">Pekerjaan Ibu:</label>
                                    <div class="bg-light p-3 rounded">{{ $pengajuan->data_surat['pekerjaan_ibu'] }}</div>
                                </div>
                            @endif

                            @if(isset($pengajuan->data_surat['penghasilan_ibu']) && $pengajuan->data_surat['penghasilan_ibu'])
                                <div class="col-md-6">
                                    <label class="fs-6 fw-semibold mb-2">Penghasilan Ibu:</label>
                                    <div class="bg-light p-3 rounded">Rp {{ number_format($pengajuan->data_surat['penghasilan_ibu'], 0, ',', '.') }}</div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Total Penghasilan -->
                    <div class="col-12">
                        <div class="bg-info-light border border-info rounded-xl p-4">
                            <h6 class="text-info font-semibold mb-2">
                                <i class="fas fa-calculator mr-2"></i>Total Penghasilan Orang Tua
                            </h6>
                            <p class="text-info font-bold mb-0">
                                Rp {{ number_format(($pengajuan->data_surat['penghasilan_ayah'] ?? 0) + ($pengajuan->data_surat['penghasilan_ibu'] ?? 0), 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

                <!-- Info Data Pemohon -->
                <div class="mb-7">
                    <label class="fs-6 fw-semibold mb-2">Data Pemohon yang Akan Ditampilkan:</label>
                    <div class="bg-light p-4 rounded">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <strong>Nama:</strong> {{ $pengajuan->nama_lengkap }}
                            </div>
                            <div class="col-md-6">
                                <strong>NIK:</strong> {{ $pengajuan->user->nik ?? 'N/A' }}
                            </div>
                            <div class="col-md-6">
                                <strong>Umur:</strong>
                                @if($pengajuan->user && $pengajuan->user->tanggal_lahir)
                                    {{ \Carbon\Carbon::parse($pengajuan->user->tanggal_lahir)->age }} Tahun
                                @else
                                    N/A
                                @endif
                            </div>
                            <div class="col-md-6">
                                <strong>Alamat:</strong> {{ $pengajuan->alamat ?? 'N/A' }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif                            <!-- Lampiran -->
                            @if($pengajuan->lampiran)
                                <div class="mb-7">
                                    <label class="fs-6 fw-semibold mb-2">Lampiran:</label>
                                    <div class="bg-light p-3 rounded">
                                        <a href="{{ Storage::url($pengajuan->lampiran) }}" target="_blank"
                                           class="btn btn-light-primary btn-sm">
                                            <i class="ki-duotone ki-file fs-4"><span class="path1"></span><span class="path2"></span></i>
                                            Lihat Lampiran
                                        </a>
                                    </div>
                                </div>
                            @endif

                            <!-- Timeline Status -->
                            <div class="mb-7">
                                <label class="fs-6 fw-semibold mb-4">Timeline Status:</label>
                                <div class="timeline">
                                    <div class="timeline-item">
                                        <div class="timeline-line w-40px"></div>
                                        <div class="timeline-icon symbol symbol-circle symbol-40px">
                                            <div class="symbol-label bg-light-primary">
                                                <i class="ki-duotone ki-message-text-2 fs-2 text-primary"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </div>
                                        </div>
                                        <div class="timeline-content mb-10 mt-n1">
                                            <div class="pe-3 mb-5">
                                                <div class="fs-5 fw-semibold mb-2">Pengajuan Disubmit</div>
                                                <div class="d-flex align-items-center mt-1 fs-6">
                                                    <div class="text-muted me-2 fs-7">{{ $pengajuan->submitted_at ? $pengajuan->submitted_at->format('d/m/Y H:i') : $pengajuan->created_at->format('d/m/Y H:i') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if($pengajuan->approved_at)
                                        <div class="timeline-item">
                                            <div class="timeline-line w-40px"></div>
                                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                                <div class="symbol-label bg-light-success">
                                                    <i class="ki-duotone ki-check fs-2 text-success"><span class="path1"></span><span class="path2"></span></i>
                                                </div>
                                            </div>
                                            <div class="timeline-content mb-10 mt-n1">
                                                <div class="pe-3 mb-5">
                                                    <div class="fs-5 fw-semibold mb-2">Pengajuan Disetujui</div>
                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                        <div class="text-muted me-2 fs-7">{{ $pengajuan->approved_at->format('d/m/Y H:i') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($pengajuan->rejected_at)
                                        <div class="timeline-item">
                                            <div class="timeline-line w-40px"></div>
                                            <div class="timeline-icon symbol symbol-circle symbol-40px">
                                                <div class="symbol-label bg-light-danger">
                                                    <i class="ki-duotone ki-cross fs-2 text-danger"><span class="path1"></span><span class="path2"></span></i>
                                                </div>
                                            </div>
                                            <div class="timeline-content mb-10 mt-n1">
                                                <div class="pe-3 mb-5">
                                                    <div class="fs-5 fw-semibold mb-2">Pengajuan Ditolak</div>
                                                    <div class="d-flex align-items-center mt-1 fs-6">
                                                        <div class="text-muted me-2 fs-7">{{ $pengajuan->rejected_at->format('d/m/Y H:i') }}</div>
                                                    </div>
                                                    @if($pengajuan->alasan_reject)
                                                        <div class="bg-light-danger p-3 rounded mt-3">
                                                            <div class="text-danger fw-semibold">Alasan Penolakan:</div>
                                                            <div>{{ $pengajuan->alasan_reject }}</div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Update Jenis TTD (hanya jika status Diajukan) -->
                            @if($pengajuan->status === 'Diajukan')
                                <div class="mb-7">
                                    <label class="fs-6 fw-semibold mb-2">Pilih Jenis Tanda Tangan:</label>
                                    <select class="form-select jenis-ttd-select" data-pengajuan-id="{{ $pengajuan->id }}">
                                        <option value="manual" {{ $pengajuan->jenis_ttd == 'manual' ? 'selected' : '' }}>TTD Manual (Tanda tangan di kantor)</option>
                                        <option value="gambar" {{ $pengajuan->jenis_ttd == 'gambar' ? 'selected' : '' }}>TTD Gambar (Langsung tampil di PDF)</option>
                                        <option value="qrcode" {{ $pengajuan->jenis_ttd == 'qrcode' ? 'selected' : '' }}>TTD QR Code (Scan untuk lihat tanda tangan)</option>
                                    </select>
                                    <input type="hidden" id="current_jenis_ttd" value="{{ $pengajuan->jenis_ttd }}">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tolak -->
    <div class="modal fade" id="rejectModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold">Tolak Pengajuan Surat</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="rejectForm">
                        <input type="hidden" id="rejectId" name="id">
                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-semibold mb-2">Alasan Penolakan</label>
                            <textarea class="form-control form-control-solid" id="alasanReject" name="alasan_reject" rows="4"
                                      placeholder="Masukkan alasan penolakan..." required></textarea>
                        </div>
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Tolak Pengajuan</span>
                                <span class="indicator-progress">Memproses... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
// Professional loading functions
function showProcessingSteps() {
    const stepsHtml = `
        <div class="processing-steps text-start">
            <div class="step-item" id="step-approval">
                <div class="d-flex align-items-center mb-3">
                    <div class="spinner-border spinner-border-sm text-primary me-3" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div>
                        <div class="fw-semibold">Menyetujui Pengajuan</div>
                        <small class="text-muted">Memproses persetujuan surat...</small>
                    </div>
                </div>
            </div>
            <div class="step-item" id="step-qr-generation">
                <div class="d-flex align-items-center mb-3 text-muted">
                    <div class="spinner-border spinner-border-sm me-3" role="status" style="visibility: hidden;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div>
                        <div>Membuat QR Code</div>
                        <small>Menunggu persetujuan...</small>
                    </div>
                </div>
            </div>
            <div class="step-item" id="step-whatsapp">
                <div class="d-flex align-items-center mb-3 text-muted">
                    <div class="spinner-border spinner-border-sm me-3" role="status" style="visibility: hidden;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div>
                        <div>Mengirim Notifikasi WhatsApp</div>
                        <small>Menunggu proses sebelumnya...</small>
                    </div>
                </div>
            </div>
        </div>
    `;

    Swal.fire({
        title: 'Memproses Persetujuan',
        html: stepsHtml,
        allowOutsideClick: false,
        allowEscapeKey: false,
        showConfirmButton: false,
        customClass: {
            container: 'processing-modal'
        }
    });
}

function updateProcessingSteps(steps) {
    steps.forEach((step, index) => {
        const stepElement = $(`#step-${step.step}`);
        const spinner = stepElement.find('.spinner-border');
        const textDiv = stepElement.find('div').last();
        const titleDiv = textDiv.find('div').first();
        const smallDiv = textDiv.find('small');

        stepElement.removeClass('text-muted');

        if (step.status === 'completed') {
            spinner.removeClass('spinner-border text-primary').addClass('text-success').html('<i class="fas fa-check"></i>');
            stepElement.addClass('text-success');
            titleDiv.html(`<i class="fas fa-check me-2"></i>${titleDiv.text()}`);
            smallDiv.text(step.message);

            // Activate next step
            if (index < steps.length - 1) {
                const nextStepElement = stepElement.parent().find('.step-item').eq(index + 1);
                nextStepElement.removeClass('text-muted');
                nextStepElement.find('.spinner-border').css('visibility', 'visible').addClass('text-primary');
                nextStepElement.find('small').text('Memproses...');
            }
        } else if (step.status === 'failed') {
            spinner.removeClass('spinner-border text-primary').addClass('text-danger').html('<i class="fas fa-times"></i>');
            stepElement.addClass('text-danger');
            titleDiv.html(`<i class="fas fa-times me-2"></i>${titleDiv.text()}`);
            smallDiv.text(step.message);
        } else if (step.status === 'skipped') {
            spinner.removeClass('spinner-border text-primary').addClass('text-warning').html('<i class="fas fa-minus"></i>');
            stepElement.addClass('text-warning');
            titleDiv.html(`<i class="fas fa-minus me-2"></i>${titleDiv.text()}`);
            smallDiv.text(step.message);
        }
    });
}

function retryApproval(pengajuanId) {
    Swal.close();
    $('.approve-btn[data-id="' + pengajuanId + '"]').click();
}

$(document).ready(function() {
    // Update jenis TTD
    $('.jenis-ttd-select').on('change', function() {
        const pengajuanId = $(this).data('pengajuan-id');
        const jenisTtd = $(this).val();

        $.ajax({
            url: `/admin/pengajuan-surat/${pengajuanId}/update-jenis-ttd`,
            method: 'POST',
            data: {
                jenis_ttd: jenisTtd,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Update hidden field
                $('#current_jenis_ttd').val(jenisTtd);

                Swal.fire({
                    text: response.message,
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            },
            error: function(xhr) {
                Swal.fire({
                    text: "Terjadi kesalahan saat mengupdate jenis TTD",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }
        });
    });

    // Approve pengajuan
    $('.approve-btn').on('click', function(e) {
        e.preventDefault();
        const pengajuanId = $(this).data('id');

        // Get pengajuan data for WhatsApp options
        const currentJenisTtd = $('#current_jenis_ttd').val() || $('.jenis-ttd-select').val() || 'gambar';
        const userHasPhone = {{ $pengajuan->user && $pengajuan->user->no_hp ? 'true' : 'false' }};

        function getWhatsAppOptions(jenisTtd) {
            if (userHasPhone) {
                if (jenisTtd === 'manual') {
                    return '<div class="alert alert-info"><small><i class="fas fa-info-circle"></i> <strong>TTD Manual:</strong> Otomatis kirim notifikasi pengambilan ke kantor</small></div>';
                } else {
                    return `
                        <div class="mb-3">
                            <label class="form-label fw-bold text-primary">📱 Pilihan WhatsApp</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="wa_option" id="wa_pdf" value="pdf">
                                <label class="form-check-label fw-semibold" for="wa_pdf">
                                    📎 <strong>Kirim PDF ke WhatsApp</strong>
                                    <br><small class="text-muted">User langsung mendapat file PDF surat melalui WhatsApp</small>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="wa_option" id="wa_notif" value="notification" checked>
                                <label class="form-check-label fw-semibold" for="wa_notif">
                                    📋 <strong>Kirim notifikasi pengambilan ke kantor</strong>
                                    <br><small class="text-muted">User mendapat pemberitahuan untuk mengambil surat di kantor</small>
                                </label>
                            </div>
                        </div>
                    `;
                }
            } else {
                return '<div class="alert alert-warning"><small><i class="fas fa-exclamation-triangle"></i> <strong>Perhatian:</strong> User belum melengkapi nomor HP</small></div>';
            }
        }

        let whatsappOptions = getWhatsAppOptions(currentJenisTtd);

        Swal.fire({
            title: "Setujui Pengajuan Surat",
            html: `
                <div class="text-start">
                    <p class="mb-3">Apakah Anda yakin ingin menyetujui pengajuan ini?</p>

                    <!-- Nomor Surat Section -->
                    <div class="mb-4 border rounded p-3 bg-light">
                        <label class="form-label fw-bold text-primary">📄 Nomor Surat</label>
                        <p class="text-muted small mb-3">
                            <i class="fas fa-info-circle"></i>
                            <strong>Wajib diisi.</strong> Nomor surat akan ditampilkan di dokumen PDF yang dihasilkan.
                        </p>
                        <input type="text" id="noSurat" class="form-control" placeholder="Contoh: 001/DESA/2025" required>
                        <small class="text-muted">
                            <i class="fas fa-lightbulb"></i>
                            <strong>Format:</strong> Gunakan format nomor surat sesuai ketentuan desa
                        </small>
                    </div>

                    <!-- Tembusan Section -->
                    <div class="mb-4 border rounded p-3 bg-light">
                        <label class="form-label fw-bold text-primary">📋 Tembusan Surat (Opsional)</label>
                        <p class="text-muted small mb-3">
                            <i class="fas fa-info-circle"></i>
                            <strong>Tidak wajib diisi.</strong> Tembusan akan ditampilkan di bagian bawah kiri surat jika ditambahkan.
                            Berguna untuk memberitahu pihak-pihak terkait tentang surat ini.
                        </p>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="addTembusan" onchange="toggleTembusanInput()">
                            <label class="form-check-label fw-semibold" for="addTembusan">
                                <i class="fas fa-plus-circle text-success"></i>
                                Tambahkan tembusan pada surat ini
                            </label>
                        </div>

                        <div id="tembusanContainer" style="display: none;">
                            <label class="form-label small fw-semibold">Daftar Tembusan:</label>
                            <textarea id="tembusanText" class="form-control" rows="4" placeholder="Contoh:&#10;1. Sekretaris Desa&#10;2. Bendahara Desa&#10;3. Ketua BPD&#10;4. Kepala Urusan Pemerintahan"></textarea>
                            <small class="text-muted">
                                <i class="fas fa-lightbulb"></i>
                                <strong>Tips:</strong> Masukkan satu tembusan per baris dengan format numbering (1. 2. 3. dst)
                            </small>
                        </div>
                    </div>

                    <!-- Jenis Tanda Tangan Section -->
                    <div class="mb-4 border rounded p-3 bg-light">
                        <label class="form-label fw-bold text-primary">✍️ Pilihan Jenis Tanda Tangan</label>
                        <p class="text-muted small mb-3">
                            <i class="fas fa-info-circle"></i>
                            <strong>Pilih jenis tanda tangan</strong> yang akan digunakan pada surat ini.
                        </p>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="ttd_option" id="ttd_manual" value="manual" ${currentJenisTtd === 'manual' ? 'checked' : ''}>
                            <label class="form-check-label fw-semibold" for="ttd_manual">
                                <i class="fas fa-pen text-primary"></i>
                                <strong>TTD Manual</strong> - Ditandatangani langsung di kantor
                                <br><small class="text-muted">User harus datang ke kantor untuk pengambilan surat yang sudah ditandatangani</small>
                            </label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="ttd_option" id="ttd_gambar" value="gambar" ${currentJenisTtd === 'gambar' ? 'checked' : ''}>
                            <label class="form-check-label fw-semibold" for="ttd_gambar">
                                <i class="fas fa-image text-success"></i>
                                <strong>TTD Gambar/Stempel</strong> - Menggunakan tanda tangan digital
                                <br><small class="text-muted">Surat langsung siap dengan tanda tangan/stempel digital</small>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="ttd_option" id="ttd_qrcode" value="qrcode" ${currentJenisTtd === 'qrcode' ? 'checked' : ''}>
                            <label class="form-check-label fw-semibold" for="ttd_qrcode">
                                <i class="fas fa-qrcode text-info"></i>
                                <strong>TTD QR Code</strong> - Tanda tangan dengan kode QR
                                <br><small class="text-muted">Surat dilengkapi QR code untuk verifikasi keaslian dokumen</small>
                            </label>
                        </div>
                    </div>

                    <div id="whatsappOptionsContainer">
                        ${whatsappOptions}
                    </div>
                </div>
            `,
            icon: "question",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Ya, setujui",
            cancelButtonText: "Batal",
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-secondary"
            },
            didOpen: () => {
                // Add event listener for TTD option changes
                $('input[name="ttd_option"]').on('change', function() {
                    const selectedTtd = $(this).val();
                    const newWhatsappOptions = getWhatsAppOptions(selectedTtd);
                    $('#whatsappOptionsContainer').html(newWhatsappOptions);
                });
            },
            preConfirm: () => {
                const noSurat = document.getElementById('noSurat').value.trim();
                const addTembusan = document.getElementById('addTembusan').checked;
                const tembusanText = addTembusan ? document.getElementById('tembusanText').value : '';
                const selectedTtd = $('input[name="ttd_option"]:checked').val();

                // Validasi nomor surat
                if (!noSurat) {
                    Swal.showValidationMessage('Nomor surat wajib diisi');
                    return false;
                }

                // Validasi jenis TTD
                if (!selectedTtd) {
                    Swal.showValidationMessage('Pilih jenis tanda tangan');
                    return false;
                }

                return {
                    sendPdf: userHasPhone && selectedTtd !== 'manual' ? $('input[name="wa_option"]:checked').val() === 'pdf' : false,
                    jenisTtd: selectedTtd,
                    tembusan: tembusanText,
                    noSurat: noSurat
                };
            }
        }).then((result) => {
            if (result.value) {
                // Show professional loading with steps
                showProcessingSteps();

                $.ajax({
                    url: `/admin/pengajuan-surat/${pengajuanId}/approve`,
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        _method: 'PATCH',
                        send_pdf: result.value.sendPdf,
                        jenis_ttd: result.value.jenisTtd,
                        tembusan: result.value.tembusan,
                        no_surat: result.value.noSurat
                    },
                    success: function(response) {
                        updateProcessingSteps(response.steps || []);

                        setTimeout(() => {
                            Swal.close();

                            let successMessage = response.message;
                            if (response.whatsapp_sent) {
                                successMessage += '<br><small class="text-success">✓ Notifikasi WhatsApp berhasil dikirim</small>';
                            } else {
                                successMessage += '<br><small class="text-warning">⚠ WhatsApp tidak dikirim (cek nomor HP user)</small>';
                            }

                            Swal.fire({
                                html: successMessage,
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(() => {
                                location.reload();
                            });
                        }, 1000);
                    },
                    error: function(xhr) {
                        let errorMessage = "Terjadi kesalahan saat menyetujui pengajuan";

                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }

                        if (xhr.responseJSON && xhr.responseJSON.steps) {
                            updateProcessingSteps(xhr.responseJSON.steps);

                            setTimeout(() => {
                                Swal.fire({
                                    html: `${errorMessage}<br><br><button class="btn btn-warning btn-sm mt-2" onclick="retryApproval(${pengajuanId})">
                                           <i class="fas fa-redo"></i> Coba Lagi</button>`,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Tutup",
                                    customClass: {
                                        confirmButton: "btn btn-secondary"
                                    },
                                    allowOutsideClick: false
                                });
                            }, 1500);
                        } else {
                            Swal.fire({
                                text: errorMessage,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    }
                });
            }
        });
    });

    // Reject pengajuan
    $('.reject-btn').on('click', function(e) {
        e.preventDefault();
        const pengajuanId = $(this).data('id');
        $('#rejectId').val(pengajuanId);
        $('#rejectModal').modal('show');
    });

    // Handle reject form submission
    $('#rejectForm').on('submit', function(e) {
        e.preventDefault();
        const pengajuanId = $('#rejectId').val();
        const alasanReject = $('#alasanReject').val();

        $.ajax({
            url: `/admin/pengajuan-surat/${pengajuanId}/reject`,
            method: 'POST',
            data: {
                alasan_reject: alasanReject,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#rejectModal').modal('hide');
                Swal.fire({
                    text: response.message,
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                }).then(() => {
                    location.reload();
                });
            },
            error: function() {
                Swal.fire({
                    text: "Terjadi kesalahan saat menolak pengajuan",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }
        });
    });
});
</script>

<style>
.processing-steps {
    min-width: 350px;
}

.step-item {
    transition: all 0.3s ease;
}

.step-item .spinner-border-sm {
    width: 1.5rem;
    height: 1.5rem;
}

.step-item .fas {
    font-size: 1.1rem;
    width: 1.5rem;
    height: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.processing-modal .swal2-popup {
    min-width: 400px !important;
}

.processing-modal .swal2-title {
    font-size: 1.3rem;
    margin-bottom: 1.5rem;
}

.step-item.text-success {
    animation: successPulse 0.5s ease-in-out;
}

.step-item.text-danger {
    animation: errorShake 0.5s ease-in-out;
}

@keyframes successPulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.02); }
    100% { transform: scale(1); }
}

@keyframes errorShake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}
</style>

<script>
// Function to toggle tembusan input
function toggleTembusanInput() {
    const checkbox = document.getElementById('addTembusan');
    const container = document.getElementById('tembusanContainer');

    if (checkbox.checked) {
        container.style.display = 'block';
        // Add default tembusan if empty
        const textarea = document.getElementById('tembusanText');
        if (!textarea.value.trim()) {
            textarea.value = '1. Sekretaris Desa\n2. Bendahara Desa';
        }
    } else {
        container.style.display = 'none';
    }
}
</script>
@endpush
