@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Manajemen Pengajuan Surat')

@section('menu')
    Manajemen Pengajuan Surat
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Manajemen Pengajuan Surat</li>
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

            <!-- Card Header -->
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <form method="GET" action="{{ route('admin.pengajuan-surat.index') }}" class="d-flex align-items-center">
                                <input type="text" name="search" value="{{ request('search') }}"
                                       class="form-control form-control-solid w-250px ps-13 me-3"
                                       placeholder="Cari nama atau NIK...">

                                <select name="status" class="form-select form-select-solid w-150px me-3">
                                    <option value="">Semua Status</option>
                                    <option value="Diajukan" {{ request('status') == 'Diajukan' ? 'selected' : '' }}>Diajukan</option>
                                    <option value="Valid" {{ request('status') == 'Valid' ? 'selected' : '' }}>Valid</option>
                                    <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>

                                <select name="jenis_surat" class="form-select form-select-solid w-200px me-3">
                                    <option value="">Semua Jenis Surat</option>
                                    <option value="surat_kehilangan" {{ request('jenis_surat') == 'surat_kehilangan' ? 'selected' : '' }}>Surat Kehilangan</option>
                                    <option value="surat_bersih_diri" {{ request('jenis_surat') == 'surat_bersih_diri' ? 'selected' : '' }}>Surat Bersih Diri</option>
                                    <option value="sppd" {{ request('jenis_surat') == 'sppd' ? 'selected' : '' }}>SPPD</option>
                                    <option value="izin_keramaian" {{ request('jenis_surat') == 'izin_keramaian' ? 'selected' : '' }}>Surat Izin Keramaian</option>
                                    <option value="ket_belum_menikah" {{ request('jenis_surat') == 'ket_belum_menikah' ? 'selected' : '' }}>Surat Keterangan Belum Menikah</option>
                                    <option value="surat_berkelakuan_baik" {{ request('jenis_surat') == 'surat_berkelakuan_baik' ? 'selected' : '' }}>Surat Keterangan Berkelakuan Baik</option>
                                    <option value="surat_domisili" {{ request('jenis_surat') == 'surat_domisili' ? 'selected' : '' }}>Surat Keterangan Domisili</option>
                                    <option value="surat_usaha" {{ request('jenis_surat') == 'surat_usaha' ? 'selected' : '' }}>Surat Keterangan Usaha</option>
                                    <option value="surat_tidak_mampu" {{ request('jenis_surat') == 'surat_tidak_mampu' ? 'selected' : '' }}>Surat Keterangan Tidak Mampu</option>
                                    <option value="surat_kematian" {{ request('jenis_surat') == 'surat_kematian' ? 'selected' : '' }}>Surat Keterangan Kematian</option>
                                    <option value="ket_menikah" {{ request('jenis_surat') == 'ket_menikah' ? 'selected' : '' }}>Surat Keterangan Menikah</option>
                                    <option value="ket_miskin_dtks" {{ request('jenis_surat') == 'ket_miskin_dtks' ? 'selected' : '' }}>Surat Keterangan Miskin DTKS</option>
                                    <option value="ket_penghasilan_ortu" {{ request('jenis_surat') == 'ket_penghasilan_ortu' ? 'selected' : '' }}>Surat Keterangan Penghasilan Orang Tua</option>
                                    <option value="ket_usaha" {{ request('jenis_surat') == 'ket_usaha' ? 'selected' : '' }}>Surat Keterangan Usaha</option>
                                    <option value="pengantar_nikah" {{ request('jenis_surat') == 'pengantar_nikah' ? 'selected' : '' }}>Surat Pengantar Nikah (N1-N4)</option>
                                    <option value="surat_hibah" {{ request('jenis_surat') == 'surat_hibah' ? 'selected' : '' }}>Surat Keterangan Hibah</option>
                                    <option value="perjanjian_perdamaian" {{ request('jenis_surat') == 'perjanjian_perdamaian' ? 'selected' : '' }}>Surat Perjanjian Perdamaian</option>
                                    <option value="surat_pindah" {{ request('jenis_surat') == 'surat_pindah' ? 'selected' : '' }}>Surat Pindah</option>
                                    <option value="surat_rekomendasi" {{ request('jenis_surat') == 'surat_rekomendasi' ? 'selected' : '' }}>Surat Rekomendasi</option>
                                </select>

                                <button type="submit" class="btn btn-primary">
                                    <i class="ki-duotone ki-magnifier fs-4"><span class="path1"></span><span class="path2"></span></i>
                                    Cari
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Card Toolbar -->
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.pengajuan-surat.create') }}" class="btn btn-primary">
                                <i class="ki-duotone ki-plus fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                Buat Surat Baru
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_pengajuan_table">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-100px">Tracking</th>
                                    <th class="min-w-150px">Pemohon</th>
                                    <th class="min-w-100px">Jenis Surat</th>
                                    <th class="min-w-100px">Status</th>
                                    <th class="min-w-100px">Jenis TTD</th>
                                    <th class="min-w-100px">Tanggal</th>
                                    <th class="text-end min-w-150px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @forelse($pengajuanSurat as $pengajuan)
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="badge badge-light-primary fw-bold">{{ $pengajuan->tracking_number }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold">{{ $pengajuan->nama_lengkap }}</span>
                                                <span class="text-muted fs-7">NIK: {{ $pengajuan->nik }}</span>
                                            </div>
                                        </td>
                                        <td>
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
                                                @default
                                                    <span class="badge badge-light-secondary">{{ ucfirst(str_replace('_', ' ', $pengajuan->jenis_surat)) }}</span>
                                            @endswitch
                                        </td>
                                        <td>
                                            @switch($pengajuan->status)
                                                @case('Diajukan')
                                                    <span class="badge badge-light-warning">{{ $pengajuan->status }}</span>
                                                    @break
                                                @case('Valid')
                                                    <span class="badge badge-light-success">Valid</span>
                                                    @break
                                                @case('Ditolak')
                                                    <span class="badge badge-light-danger">{{ $pengajuan->status }}</span>
                                                    @break
                                                @case('Selesai')
                                                    <span class="badge badge-light-info">{{ $pengajuan->status }}</span>
                                                    @break
                                                @default
                                                    <span class="badge badge-light-secondary">{{ $pengajuan->status }}</span>
                                            @endswitch
                                        </td>
                                        <td>
                                            <select class="form-select form-select-sm jenis-ttd-select"
                                                    data-pengajuan-id="{{ $pengajuan->id }}"
                                                    {{ $pengajuan->status !== 'Diajukan' ? 'disabled' : '' }}>
                                                <option value="manual" {{ $pengajuan->jenis_ttd == 'manual' ? 'selected' : '' }}>TTD Manual</option>
                                                <option value="gambar" {{ $pengajuan->jenis_ttd == 'gambar' ? 'selected' : '' }}>TTD Gambar</option>
                                                <option value="qrcode" {{ $pengajuan->jenis_ttd == 'qrcode' ? 'selected' : '' }}>TTD QR Code</option>
                                            </select>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span>{{ $pengajuan->created_at->format('d/m/Y') }}</span>
                                                <span class="text-muted fs-7">{{ $pengajuan->created_at->format('H:i') }}</span>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                               data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                Aksi
                                                <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                            </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('admin.pengajuan-surat.show', $pengajuan->id) }}" class="menu-link px-3">
                                                        <i class="ki-duotone ki-eye fs-6 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                        Lihat Detail
                                                    </a>
                                                </div>

                                                @if($pengajuan->status === 'Diajukan')
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3 approve-btn" data-id="{{ $pengajuan->id }}">
                                                            <i class="ki-duotone ki-check fs-6 me-2 text-success"><span class="path1"></span><span class="path2"></span></i>
                                                            Setujui
                                                        </a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3 reject-btn" data-id="{{ $pengajuan->id }}">
                                                            <i class="ki-duotone ki-cross fs-6 me-2 text-danger"><span class="path1"></span><span class="path2"></span></i>
                                                            Tolak
                                                        </a>
                                                    </div>
                                                @endif

                                                @if($pengajuan->status === 'Valid')
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('admin.pengajuan-surat.generate-pdf', $pengajuan->id) }}"
                                                           class="menu-link px-3" target="_blank">
                                                            <i class="ki-duotone ki-file-down fs-6 me-2 text-primary"><span class="path1"></span><span class="path2"></span></i>
                                                            Download PDF
                                                        </a>
                                                    </div>
                                                @endif

                                                <div class="separator my-2"></div>
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3 delete-btn" data-id="{{ $pengajuan->id }}">
                                                        <i class="ki-duotone ki-trash fs-6 me-2 text-danger"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                        Hapus
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-10">
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="ki-duotone ki-file-search fs-3x text-gray-400 mb-3">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                                <span class="text-gray-400">Belum ada pengajuan surat</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($pengajuanSurat->hasPages())
                        <div class="d-flex justify-content-center mt-5">
                            {{ $pengajuanSurat->appends(request()->query())->links() }}
                        </div>
                    @endif
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
    // Store initial values for rollback on error
    $('.jenis-ttd-select').each(function() {
        $(this).data('previous-value', $(this).val());
    });

    // Update jenis TTD
    $('.jenis-ttd-select').on('change', function() {
        const $select = $(this);
        const pengajuanId = $select.data('pengajuan-id');
        const jenisTtd = $select.val();
        const previousValue = $select.data('previous-value');

        // Validate pengajuan ID
        if (!pengajuanId) {
            console.error('Pengajuan ID not found');
            $select.val(previousValue);
            return;
        }

        // Validate jenis TTD
        if (!jenisTtd || !['manual', 'gambar', 'qrcode'].includes(jenisTtd)) {
            console.error('Invalid jenis TTD:', jenisTtd);
            $select.val(previousValue);
            return;
        }

        // Add loading state
        $select.prop('disabled', true);

        console.log('Updating TTD for pengajuan ID:', pengajuanId, 'to:', jenisTtd);

        $.ajax({
            url: `/admin/pengajuan-surat/${pengajuanId}/jenis-ttd`,
            method: 'POST',
            data: {
                jenis_ttd: jenisTtd,
                _method: 'PATCH',
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Update previous value for next change
                $select.data('previous-value', jenisTtd);

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
                console.error('AJAX Error:', xhr.status, xhr.statusText);
                console.error('Response:', xhr.responseText);

                let errorMessage = "Terjadi kesalahan saat mengupdate jenis TTD";

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                    const errors = Object.values(xhr.responseJSON.errors).flat();
                    errorMessage = errors.join(', ');
                }

                Swal.fire({
                    text: errorMessage,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });

                // Reset select to previous value if error occurs
                $select.val(previousValue);
            },
            complete: function() {
                // Remove loading state
                $select.prop('disabled', false);
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

    // Delete pengajuan
    $('.delete-btn').on('click', function(e) {
        e.preventDefault();
        const pengajuanId = $(this).data('id');

        Swal.fire({
            text: "Apakah Anda yakin ingin menghapus pengajuan ini? Data akan dihapus permanen.",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Ya, hapus",
            cancelButtonText: "Batal",
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-secondary"
            }
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: `/admin/pengajuan-surat/${pengajuanId}`,
                    method: 'DELETE',
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
                            text: "Terjadi kesalahan saat menghapus pengajuan",
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
});
</script>
@endpush
