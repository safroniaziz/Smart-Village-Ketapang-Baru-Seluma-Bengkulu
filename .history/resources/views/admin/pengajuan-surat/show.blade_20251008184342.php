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
                                                    @default
                                                        <span class="badge badge-light-secondary">{{ ucfirst(str_replace('_', ' ', $pengajuan->jenis_surat)) }}</span>
                                                @endswitch
                                            </td>
                                        </tr>
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
                            @endif

                            <!-- Lampiran -->
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
                                        <option value="biasa" {{ $pengajuan->jenis_ttd == 'biasa' ? 'selected' : '' }}>TTD Biasa (Langsung tampil di PDF)</option>
                                        <option value="qrcode" {{ $pengajuan->jenis_ttd == 'qrcode' ? 'selected' : '' }}>TTD QR Code (Scan untuk lihat tanda tangan)</option>
                                    </select>
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

        Swal.fire({
            text: "Apakah Anda yakin ingin menyetujui pengajuan ini?",
            icon: "question",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Ya, setujui",
            cancelButtonText: "Batal",
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-secondary"
            }
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: `/admin/pengajuan-surat/${pengajuanId}/approve`,
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
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
                            text: "Terjadi kesalahan saat menyetujui pengajuan",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
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
@endpush
