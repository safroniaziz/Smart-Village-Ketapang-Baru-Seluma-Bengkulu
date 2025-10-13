@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Manajemen Batas Wilayah')

@section('menu')
    Manajemen Batas Wilayah
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
    <li class="breadcrumb-item text-muted">Batas Wilayah</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            
            <!-- Card Header -->
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-compass fs-1 text-success me-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <div>
                                <h3 class="fw-bold mb-1">Batas Wilayah Desa</h3>
                                <span class="text-muted">Kelola informasi batas wilayah dan landmark desa</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <button type="button" class="btn btn-success" onclick="addBatasWilayah()">
                                <i class="ki-duotone ki-plus fs-2"></i>
                                Tambah Batas Wilayah
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="batasWilayahTable">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">#</th>
                                <th class="min-w-80px">Arah</th>
                                <th class="min-w-150px">Berbatasan Dengan</th>
                                <th class="min-w-120px">Jenis Wilayah</th>
                                <th class="min-w-80px">Jarak</th>
                                <th class="min-w-80px">Status</th>
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
    <div class="modal fade" id="batasWilayahModal" tabindex="-1" aria-labelledby="batasWilayahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="batasWilayahModalLabel">Tambah Batas Wilayah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="batasWilayahForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="arah" class="form-label required">Arah</label>
                                    <select class="form-select" id="arah" name="arah" required>
                                        <option value="">Pilih Arah</option>
                                        <option value="utara">Utara</option>
                                        <option value="selatan">Selatan</option>
                                        <option value="barat">Barat</option>
                                        <option value="timur">Timur</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="berbatasan_dengan" class="form-label required">Berbatasan Dengan</label>
                                    <input type="text" class="form-control" id="berbatasan_dengan" name="berbatasan_dengan" required>
                                    <div class="invalid-feedback"></div>
                                    <div class="form-text">Contoh: Desa Sumber Makmur, Kecamatan Air Periukan</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="jenis_wilayah" class="form-label required">Jenis Wilayah</label>
                                    <input type="text" class="form-control" id="jenis_wilayah" name="jenis_wilayah" required>
                                    <div class="invalid-feedback"></div>
                                    <div class="form-text">Contoh: Desa, Kecamatan, Kabupaten</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="jarak_km" class="form-label required">Jarak (KM)</label>
                                    <input type="number" class="form-control" id="jarak_km" name="jarak_km" step="0.01" min="0" required>
                                    <div class="invalid-feedback"></div>
                                    <div class="form-text">Jarak dalam kilometer</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="landmark" class="form-label">Landmark</label>
                                    <input type="text" class="form-control" id="landmark" name="landmark">
                                    <div class="invalid-feedback"></div>
                                    <div class="form-text">Contoh: Sungai Musi, Gunung Merapi</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="koordinat" class="form-label">Koordinat</label>
                                    <input type="text" class="form-control" id="koordinat" name="koordinat">
                                    <div class="invalid-feedback"></div>
                                    <div class="form-text">Format: -3.7928, 102.2607</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" checked>
                                    <label class="form-check-label" for="is_active">
                                        Status Aktif
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-light-info d-flex align-items-center mt-4">
                            <i class="ki-duotone ki-information fs-2 text-info me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <div class="d-flex flex-column">
                                <h4 class="mb-1 text-info">Informasi Batas Wilayah</h4>
                                <span>Data batas wilayah akan ditampilkan di halaman frontend untuk memberikan informasi geografis kepada pengunjung.</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success" id="submitBtn">
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
                    <h5 class="modal-title">Detail Batas Wilayah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="fw-bold">Arah:</td>
                                    <td id="detailArah">-</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Berbatasan Dengan:</td>
                                    <td id="detailBerbatasan">-</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Jenis Wilayah:</td>
                                    <td id="detailJenis">-</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Jarak:</td>
                                    <td id="detailJarak">-</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Status:</td>
                                    <td id="detailStatus">-</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="fw-bold">Landmark:</td>
                                    <td id="detailLandmark">-</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Koordinat:</td>
                                    <td id="detailKoordinat">-</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Dibuat:</td>
                                    <td id="detailCreated">-</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Diupdate:</td>
                                    <td id="detailUpdated">-</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="fw-bold">Keterangan:</div>
                            <div id="detailKeterangan" class="text-muted">-</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success" onclick="editFromDetail()">
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
    table = $('#batasWilayahTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("admin.peta-desa.batas-wilayah.data") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'arah', name: 'arah' },
            { data: 'berbatasan_dengan', name: 'berbatasan_dengan' },
            { data: 'jenis_wilayah', name: 'jenis_wilayah' },
            { data: 'jarak', name: 'jarak_km' },
            { data: 'status', name: 'is_active' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json"
        }
    });
}

function addBatasWilayah() {
    currentId = null;
    $('#batasWilayahForm')[0].reset();
    $('#batasWilayahModalLabel').text('Tambah Batas Wilayah');
    $('#is_active').prop('checked', true);
    clearErrors();
    $('#batasWilayahModal').modal('show');
}

function editBatasWilayah(id) {
    currentId = id;
    $('#batasWilayahModalLabel').text('Edit Batas Wilayah');
    
    $.get(`/admin/peta-desa/batas-wilayah/${id}`, function(response) {
        if(response.success) {
            const data = response.data;
            $('#arah').val(data.arah);
            $('#berbatasan_dengan').val(data.berbatasan_dengan);
            $('#jenis_wilayah').val(data.jenis_wilayah);
            $('#jarak_km').val(data.jarak_km);
            $('#landmark').val(data.landmark);
            $('#koordinat').val(data.koordinat);
            $('#keterangan').val(data.keterangan);
            $('#is_active').prop('checked', data.is_active == 1);
            
            clearErrors();
            $('#batasWilayahModal').modal('show');
        }
    });
}

function showBatasWilayah(id) {
    $.get(`/admin/peta-desa/batas-wilayah/${id}`, function(response) {
        if(response.success) {
            const data = response.data;
            $('#detailArah').text(data.arah.toUpperCase());
            $('#detailBerbatasan').text(data.berbatasan_dengan);
            $('#detailJenis').text(data.jenis_wilayah);
            $('#detailJarak').text(data.jarak_km + ' km');
            $('#detailStatus').html(data.is_active ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>');
            $('#detailLandmark').text(data.landmark || '-');
            $('#detailKoordinat').text(data.koordinat || '-');
            $('#detailKeterangan').text(data.keterangan || '-');
            $('#detailCreated').text(new Date(data.created_at).toLocaleString('id-ID'));
            $('#detailUpdated').text(new Date(data.updated_at).toLocaleString('id-ID'));
            
            currentId = id;
            $('#detailModal').modal('show');
        }
    });
}

function editFromDetail() {
    $('#detailModal').modal('hide');
    setTimeout(() => editBatasWilayah(currentId), 500);
}

function deleteBatasWilayah(id) {
    Swal.fire({
        title: 'Hapus Batas Wilayah?',
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
                url: `/admin/peta-desa/batas-wilayah/${id}`,
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

$('#batasWilayahForm').submit(function(e) {
    e.preventDefault();
    
    const submitBtn = $('#submitBtn');
    submitBtn.attr('data-kt-indicator', 'on').prop('disabled', true);
    
    const formData = new FormData(this);
    const url = currentId ? `/admin/peta-desa/batas-wilayah/${currentId}` : '/admin/peta-desa/batas-wilayah';
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
                $('#batasWilayahModal').modal('hide');
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