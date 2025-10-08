<!--begin::Modal - Visi-->
<div class="modal fade" id="visiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <div class="modal-content">
            <form id="visiForm">
                <div class="modal-header" id="kt_modal_add_user_header">
                    <h2 class="fw-bold" id="visiModalTitle">
                        <i class="ki-duotone ki-eye me-3 text-primary">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                        Tambah Visi
                    </h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Visi</label>
                        <input type="text" name="visi" id="visi_input" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Masukkan visi desa" required />
                    </div>
                    <div class="fv-row mb-7">
                        <label class="fw-semibold fs-6 mb-2">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi_input" class="form-control form-control-solid" rows="4" placeholder="Masukkan deskripsi visi"></textarea>
                    </div>
                    <div class="fv-row mb-7">
                        <label class="fw-semibold fs-6 mb-2">Deskripsi Section</label>
                        <textarea name="deskripsi_section" id="deskripsi_section_input" class="form-control form-control-solid" rows="3" placeholder="Masukkan deskripsi section untuk tampilan frontend"></textarea>
                    </div>
                    <div class="fv-row mb-7">
                        <label class="fw-semibold fs-6 mb-2">Pendekatan Deskripsi</label>
                        <textarea name="pendekatan_deskripsi" id="pendekatan_deskripsi_input" class="form-control form-control-solid" rows="3" placeholder="Masukkan deskripsi pendekatan"></textarea>
                    </div>
                    <div class="fv-row">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active_input" value="1" checked />
                            <span class="form-check-label fw-semibold text-gray-400 ms-3">Status Aktif</span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="visiSubmitBtn" data-kt-users-modal-action="submit">
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
<!--end::Modal - Visi-->

<script>
// SweetAlert2 CDN
if (typeof Swal === 'undefined') {
    document.write('<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"><\/script>');
}

$(document).ready(function() {
    let visiId = null;

    // Reset form when modal is closed
    $('#visiModal').on('hidden.bs.modal', function () {
        $('#visiForm')[0].reset();
        visiId = null;
        $('#visiModalTitle').text('Tambah Visi');
        $('#visiSubmitBtn .indicator-label').text('Simpan');
    });

    // Form submission
    $('#visiForm').on('submit', function(e) {
        e.preventDefault();

        const submitBtn = $('#visiSubmitBtn');
        submitBtn.attr('data-kt-indicator', 'on');
        submitBtn.prop('disabled', true);

        const formData = new FormData(this);
        const url = visiId ? `/visi-misi/visi/${visiId}` : '/visi-misi/visi';
        const method = visiId ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            type: method,
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: response.message,
                        icon: 'success',
                        timer: 2000
                    });
                    $('#visiModal').modal('hide');
                    loadVisiData();
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
    window.editVisi = function(id) {
        visiId = id;
        $('#visiModalTitle').text('Edit Visi');
        $('#visiSubmitBtn .indicator-label').text('Update');

        $.get(`/visi-misi/visi/${id}/edit`, function(data) {
            $('#visi_input').val(data.visi);
            $('#deskripsi_input').val(data.deskripsi);
            $('#deskripsi_section_input').val(data.deskripsi_section);
            $('#pendekatan_deskripsi_input').val(data.pendekatan_deskripsi);
            $('#is_active_input').prop('checked', data.is_active);
        });
    };
});
</script>
