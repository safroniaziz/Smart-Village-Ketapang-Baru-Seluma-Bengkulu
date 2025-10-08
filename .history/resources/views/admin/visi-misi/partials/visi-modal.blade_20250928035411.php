<!--begin::Modal - Visi-->
<div class="modal fade" id="visiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <div class="modal-content" style="border-radius: 20px; border: none; box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);">
            <form id="visiForm">
                <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 20px 20px 0 0; padding: 2rem;">
                    <h2 class="fw-bold mb-0" id="visiModalTitle">
                        <i class="ki-duotone ki-eye me-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                        Tambah Visi
                    </h2>
                    <div class="btn btn-icon btn-sm btn-light" data-bs-dismiss="modal" style="background: rgba(255, 255, 255, 0.2); border: 1px solid rgba(255, 255, 255, 0.3); color: white;">
                        <i class="ki-duotone ki-cross fs-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body" style="padding: 2.5rem;">
                    <div class="row g-4 mb-4">
                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-3 text-dark">Visi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="visi" id="visi_input" placeholder="Masukkan visi desa" required style="border-radius: 12px; border: 2px solid #e9ecef; padding: 1rem;">
                        </div>
                    </div>
                    <div class="row g-4 mb-4">
                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-3 text-dark">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi_input" rows="4" placeholder="Masukkan deskripsi visi" style="border-radius: 12px; border: 2px solid #e9ecef; padding: 1rem;"></textarea>
                        </div>
                    </div>
                    <div class="row g-4 mb-4">
                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-3 text-dark">Deskripsi Section</label>
                            <textarea class="form-control" name="deskripsi_section" id="deskripsi_section_input" rows="3" placeholder="Masukkan deskripsi section untuk tampilan frontend" style="border-radius: 12px; border: 2px solid #e9ecef; padding: 1rem;"></textarea>
                        </div>
                    </div>
                    <div class="row g-4 mb-4">
                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-3 text-dark">Pendekatan Deskripsi</label>
                            <textarea class="form-control" name="pendekatan_deskripsi" id="pendekatan_deskripsi_input" rows="3" placeholder="Masukkan deskripsi pendekatan" style="border-radius: 12px; border: 2px solid #e9ecef; padding: 1rem;"></textarea>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-12">
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active_input" value="1" checked style="width: 3rem; height: 1.5rem;">
                                <label class="form-check-label fw-bold text-dark ms-3" for="is_active_input">
                                    Status Aktif
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 2rem; border-top: 1px solid #e9ecef; border-radius: 0 0 20px 20px;">
                    <button type="button" class="btn btn-light btn-lg" data-bs-dismiss="modal" style="border-radius: 12px; padding: 0.75rem 2rem;">Batal</button>
                    <button type="submit" class="btn btn-primary btn-lg" id="visiSubmitBtn" style="border-radius: 12px; padding: 0.75rem 2rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
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
