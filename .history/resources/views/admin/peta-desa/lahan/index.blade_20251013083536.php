@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Manajemen Data Lahan')

@section('menu')
    Manajemen Data Lahan
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
    <li class="breadcrumb-item text-muted">Data Lahan</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            <!-- Card Header -->
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-home-3 fs-1 text-primary me-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <div>
                                <h3 class="fw-bold mb-1">Data Lahan Warga</h3>
                                <span class="text-muted">Kelola koordinat dan informasi lahan warga desa</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <button type="button" class="btn btn-primary" onclick="addLahan()">
                                <i class="ki-duotone ki-plus fs-2"></i>
                                Tambah Data Lahan
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="lahanTable">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">#</th>
                                <th class="min-w-100px">NIK</th>
                                <th class="min-w-150px">Nama Lengkap</th>
                                <th class="min-w-120px">Koordinat</th>
                                <th class="min-w-80px">Foto</th>
                                <th class="text-end min-w-100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Form -->
    <div class="modal fade" id="lahanModal" tabindex="-1" aria-labelledby="lahanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lahanModalLabel">Tambah Data Lahan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="lahanForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nik" class="form-label required">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" maxlength="16" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label required">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lat" class="form-label required">Latitude</label>
                                    <input type="number" class="form-control" id="lat" name="lat" step="any" min="-90" max="90" required>
                                    <div class="invalid-feedback"></div>
                                    <div class="form-text">Rentang: -90 sampai 90</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="long" class="form-label required">Longitude</label>
                                    <input type="number" class="form-control" id="long" name="long" step="any" min="-180" max="180" required>
                                    <div class="invalid-feedback"></div>
                                    <div class="form-text">Rentang: -180 sampai 180</div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Lahan</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/jpeg,image/png,image/jpg">
                            <div class="invalid-feedback"></div>
                            <div class="form-text">Format: JPG, PNG. Maksimal: 2MB</div>
                            <div id="currentPhoto" class="mt-2" style="display: none;">
                                <label class="form-label">Foto Saat Ini:</label><br>
                                <img id="currentPhotoImg" src="" alt="Current Photo" class="img-thumbnail" style="max-width: 200px;">
                            </div>
                        </div>

                        <div class="alert alert-light-info d-flex align-items-center">
                            <i class="ki-duotone ki-information fs-2 text-info me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <div class="d-flex flex-column">
                                <h4 class="mb-1 text-info">Tips Koordinat</h4>
                                <span>Anda bisa mendapatkan koordinat GPS dari Google Maps atau aplikasi GPS lainnya. Pastikan koordinat sesuai dengan lokasi lahan yang dimaksud.</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <span class="indicator-label">Simpan</span>
                            <span class="indicator-progress">Menyimpan...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Data Lahan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="fw-bold">NIK:</td>
                                    <td id="detailNik">-</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Nama Lengkap:</td>
                                    <td id="detailNama">-</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Latitude:</td>
                                    <td id="detailLat">-</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Longitude:</td>
                                    <td id="detailLong">-</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Dibuat:</td>
                                    <td id="detailCreated">-</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center">
                                <label class="fw-bold">Foto Lahan:</label>
                                <div id="detailPhotoContainer" class="mt-2">
                                    <img id="detailPhoto" src="" alt="Foto Lahan" class="img-fluid rounded" style="max-height: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="editFromDetail()">
                        <i class="ki-duotone ki-pencil fs-4 me-2"></i>
                        Edit Data
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<link href="{{ asset('dashboard2/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
<script src="{{ asset('dashboard2/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script>
let table;
let currentId = null;

$(document).ready(function() {
    initDataTable();
});

function initDataTable() {
    table = $('#lahanTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("admin.peta-desa.lahan.data") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nik', name: 'nik' },
            { data: 'nama_lengkap', name: 'nama_lengkap' },
            { data: 'koordinat', name: 'koordinat', orderable: false },
            { data: 'foto', name: 'foto', orderable: false, searchable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json"
        }
    });
}

function addLahan() {
    currentId = null;
    $('#lahanForm')[0].reset();
    $('#lahanModalLabel').text('Tambah Data Lahan');
    $('#currentPhoto').hide();
    clearErrors();
    $('#lahanModal').modal('show');
}

function editLahan(id) {
    currentId = id;
    $('#lahanModalLabel').text('Edit Data Lahan');

    $.get(`/admin/peta-desa/lahan/${id}`, function(response) {
        if(response.success) {
            const data = response.data;
            $('#nik').val(data.nik);
            $('#nama_lengkap').val(data.nama_lengkap);
            $('#lat').val(data.lat);
            $('#long').val(data.long);

            if(data.foto_path) {
                $('#currentPhoto').show();
                $('#currentPhotoImg').attr('src', `{{ asset('') }}${data.foto_path}`);
            } else {
                $('#currentPhoto').hide();
            }

            clearErrors();
            $('#lahanModal').modal('show');
        }
    });
}

function showLahan(id) {
    $.get(`/admin/peta-desa/lahan/${id}`, function(response) {
        if(response.success) {
            const data = response.data;
            $('#detailNik').text(data.nik);
            $('#detailNama').text(data.nama_lengkap);
            $('#detailLat').text(data.lat);
            $('#detailLong').text(data.long);
            $('#detailCreated').text(new Date(data.created_at).toLocaleString('id-ID'));

            if(data.foto_path) {
                $('#detailPhoto').attr('src', `{{ asset('') }}${data.foto_path}`).show();
            } else {
                $('#detailPhotoContainer').html('<div class="text-muted">Tidak ada foto</div>');
            }

            currentId = id;
            $('#detailModal').modal('show');
        }
    });
}

function editFromDetail() {
    $('#detailModal').modal('hide');
    setTimeout(() => editLahan(currentId), 500);
}

function deleteLahan(id) {
    Swal.fire({
        title: 'Hapus Data Lahan?',
        text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/admin/peta-desa/lahan/${id}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if(response.success) {
                        Swal.fire('Berhasil!', response.message, 'success');
                        table.ajax.reload();
                    }
                },
                error: function(xhr) {
                    Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data', 'error');
                }
            });
        }
    });
}

$('#lahanForm').submit(function(e) {
    e.preventDefault();

    const submitBtn = $('#submitBtn');
    submitBtn.attr('data-kt-indicator', 'on').prop('disabled', true);

    const formData = new FormData(this);
    const url = currentId ? `/admin/peta-desa/lahan/${currentId}` : '/admin/peta-desa/lahan';
    const method = currentId ? 'POST' : 'POST';

    if(currentId) {
        formData.append('_method', 'PUT');
    }

    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

    clearErrors();

    $.ajax({
        url: url,
        type: method,
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if(response.success) {
                $('#lahanModal').modal('hide');
                Swal.fire('Berhasil!', response.message, 'success');
                table.ajax.reload();
            }
        },
        error: function(xhr) {
            if(xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                displayErrors(errors);
            } else {
                Swal.fire('Error!', 'Terjadi kesalahan saat menyimpan data', 'error');
            }
        },
        complete: function() {
            submitBtn.removeAttr('data-kt-indicator').prop('disabled', false);
        }
    });
});

function clearErrors() {
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').text('');
}

function displayErrors(errors) {
    $.each(errors, function(field, messages) {
        const input = $(`[name="${field}"]`);
        input.addClass('is-invalid');
        input.siblings('.invalid-feedback').text(messages[0]);
    });
}
</script>
@endpush
