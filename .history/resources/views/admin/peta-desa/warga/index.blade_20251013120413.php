@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Koordinat Warga Peta Desa')

@section('menu')
    Koordinat Warga Peta Desa
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.peta-desa.index') }}" class="text-muted text-hover-primary">Peta Desa</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Koordinat Warga</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            <!-- Header Card -->
            <div class="card shadow-sm mb-8">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <div class="symbol-label bg-light-info">
                                        <i class="ki-duotone ki-people fs-2x text-info-600">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="fw-bold text-gray-900 mb-1">Koordinat Warga Peta Desa</h2>
                                    <p class="text-muted mb-0">Kelola koordinat rumah warga yang tampil di peta desa</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('admin.peta-desa.index') }}" class="btn btn-light">
                                <i class="ki-duotone ki-arrow-left fs-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Kembali ke Peta Desa
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Table Card -->
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="card-title">
                        <h3>Daftar Warga dengan Koordinat</h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <button type="button" class="btn btn-light-primary me-3" id="kt_filter_apply">
                                <i class="ki-duotone ki-filter fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>Filter
                            </button>
                            <button type="button" class="btn btn-light-danger" id="kt_filter_reset">
                                <i class="ki-duotone ki-cross fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>Reset
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-row-bordered gy-5 gs-7" id="wargaTable">
                            <thead>
                                <tr class="fw-semibold fs-6 text-gray-800">
                                    <th class="min-w-50px">No</th>
                                    <th class="min-w-100px">Foto</th>
                                    <th class="min-w-150px">Nama Lengkap</th>
                                    <th class="min-w-100px">NIK</th>
                                    <th class="min-w-150px">Alamat</th>
                                    <th class="min-w-150px">Koordinat</th>
                                    <th class="min-w-100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be loaded via DataTables -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail/Edit Warga -->
    <div class="modal fade" id="wargaModal" tabindex="-1" aria-labelledby="wargaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="wargaModalLabel">Detail Warga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="wargaForm">
                        <div class="row g-5">
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label for="nama_lengkap" class="form-label fw-semibold">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-solid" id="nama_lengkap" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label for="nik" class="form-label fw-semibold">NIK</label>
                                    <input type="text" class="form-control form-control-solid" id="nik" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <label for="alamat" class="form-label fw-semibold">Alamat</label>
                            <textarea class="form-control form-control-solid" id="alamat" rows="2" readonly></textarea>
                        </div>
                        <div class="row g-5">
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label for="lat" class="form-label fw-semibold required">Latitude</label>
                                    <input type="number" class="form-control form-control-solid" id="lat" step="any" required>
                                    <div class="form-text">Koordinat latitude (-90 sampai 90)</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label for="long" class="form-label fw-semibold required">Longitude</label>
                                    <input type="number" class="form-control form-control-solid" id="long" step="any" required>
                                    <div class="form-text">Koordinat longitude (-180 sampai 180)</div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="alert alert-info">
                                <i class="ki-duotone ki-information-5 fs-2 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <strong>Tips:</strong> Gunakan Google Maps untuk mendapatkan koordinat yang akurat
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="saveWarga">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
let table, currentId = null;

$(document).ready(function() {
    // Initialize DataTable
    table = $('#wargaTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("admin.peta-desa.warga.data") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'foto', name: 'foto', orderable: false, searchable: false },
            { data: 'nama_lengkap', name: 'nama_lengkap' },
            { data: 'nik', name: 'nik' },
            { data: 'alamat', name: 'alamat' },
            { data: 'koordinat', name: 'koordinat' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        responsive: true,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json"
        }
    });
});

function showWarga(id) {
    currentId = id;
    $('#wargaModalLabel').text('Detail Warga');
    $('#saveWarga').hide();
    
    $.get(`/admin/peta-desa/warga/${id}`, function(response) {
        if(response.success) {
            const data = response.data;
            $('#nama_lengkap').val(data.nama_lengkap);
            $('#nik').val(data.nik);
            $('#alamat').val(data.alamat);
            $('#lat').val(data.lat);
            $('#long').val(data.long);
            
            // Make fields editable
            $('#lat, #long').prop('readonly', false);
            $('#saveWarga').show();
            $('#wargaModalLabel').text('Edit Koordinat Warga');
        }
    });
    
    $('#wargaModal').modal('show');
}

function editWarga(id) {
    showWarga(id);
}

$('#saveWarga').click(function() {
    const submitBtn = $(this);
    submitBtn.attr('data-kt-indicator', 'on').prop('disabled', true);

    const formData = {
        lat: $('#lat').val(),
        long: $('#long').val(),
        _token: $('meta[name="csrf-token"]').attr('content')
    };

    $.ajax({
        url: `/admin/peta-desa/warga/${currentId}`,
        type: 'PUT',
        data: formData,
        success: function(response) {
            if(response.success) {
                Swal.fire({
                    title: 'Berhasil!',
                    text: response.message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                $('#wargaModal').modal('hide');
                table.ajax.reload();
            }
        },
        error: function(xhr) {
            const response = xhr.responseJSON;
            if(response && response.errors) {
                let errorMessage = 'Terjadi kesalahan:\n';
                Object.values(response.errors).forEach(errors => {
                    errors.forEach(error => {
                        errorMessage += `• ${error}\n`;
                    });
                });
                Swal.fire({
                    title: 'Error!',
                    text: errorMessage,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Terjadi kesalahan saat menyimpan data',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        },
        complete: function() {
            submitBtn.removeAttr('data-kt-indicator').prop('disabled', false);
        }
    });
});
</script>
@endpush
