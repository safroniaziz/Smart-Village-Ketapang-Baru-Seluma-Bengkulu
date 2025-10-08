<!--begin::Modal - Misi-->
<div class="modal fade" id="misiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form id="misiForm">
                <div class="modal-header">
                    <h2 class="fw-bold" id="misiModalTitle">Tambah Misi</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <div class="row g-9 mb-8">
                        <div class="col-md-12">
                            <label class="fs-6 fw-semibold mb-2">Judul Misi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-solid" name="judul" id="judul_input" placeholder="Masukkan judul misi" required>
                        </div>
                    </div>
                    <div class="row g-9 mb-8">
                        <div class="col-md-12">
                            <label class="fs-6 fw-semibold mb-2">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control form-control-solid" name="deskripsi" id="deskripsi_input" rows="4" placeholder="Masukkan deskripsi misi" required></textarea>
                        </div>
                    </div>
                    <div class="row g-9 mb-8">
                        <div class="col-md-12">
                            <label class="fs-6 fw-semibold mb-2">Indikator</label>
                            <textarea class="form-control form-control-solid" name="indikator" id="indikator_input" rows="3" placeholder="Masukkan indikator pencapaian misi"></textarea>
                        </div>
                    </div>
                    <div class="row g-9">
                        <div class="col-md-12">
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active_input" value="1" checked>
                                <label class="form-check-label fw-semibold text-gray-400 ms-3" for="is_active_input">
                                    Status Aktif
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="misiSubmitBtn">
                        <span class="indicator-label">Simpan</span>
                        <span class="indicator-progress">Mohon tunggu...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal - Misi-->

<script>
// SweetAlert2 CDN
if (typeof Swal === 'undefined') {
    document.write('<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"><\/script>');
}

$(document).ready(function() {
    let misiId = null;

    // Reset form when modal is closed
    $('#misiModal').on('hidden.bs.modal', function () {
        $('#misiForm')[0].reset();
        misiId = null;
        $('#misiModalTitle').text('Tambah Misi');
        $('#misiSubmitBtn .indicator-label').text('Simpan');
    });

    // Form submission
    $('#misiForm').on('submit', function(e) {
        e.preventDefault();

        const submitBtn = $('#misiSubmitBtn');
        submitBtn.attr('data-kt-indicator', 'on');
        submitBtn.prop('disabled', true);

        const formData = new FormData(this);
        const url = misiId ? `/visi-misi/misi/${misiId}` : '/visi-misi/misi';
        const method = misiId ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            type: method,
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: response.message,
                        icon: 'success',
                        timer: 2000
                    });
                    $('#misiModal').modal('hide');
                    loadMisiData();
                }
            },
            error: function(xhr) {
                const errors = xhr.responseJSON?.errors;
                if (errors) {
                    let errorMessage = 'Terjadi kesalahan:\n';
                    Object.values(errors).forEach(error => {
                        errorMessage += `- ${error[0]}\n`;
                    });
                    Swal.fire('Error!', errorMessage, 'error');
                } else {
                    Swal.fire('Error!', 'Terjadi kesalahan saat menyimpan data', 'error');
                }
            },
            complete: function() {
                submitBtn.removeAttr('data-kt-indicator');
                submitBtn.prop('disabled', false);
            }
        });
    });

    // Edit function
    window.editMisi = function(id) {
        misiId = id;
        $('#misiModalTitle').text('Edit Misi');
        $('#misiSubmitBtn .indicator-label').text('Update');

        $.get(`/visi-misi/misi/${id}/edit`, function(data) {
            $('#judul_input').val(data.judul);
            $('#deskripsi_input').val(data.deskripsi);
            $('#indikator_input').val(data.indikator);
            $('#is_active_input').prop('checked', data.is_active);
        });
    };
});
</script>
