<!--begin::Modal - Pendekatan-->
<div class="modal fade" id="pendekatanModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form id="pendekatanForm">
                <div class="modal-header" id="kt_modal_add_pendekatan_header">
                    <h2 class="fw-bold" id="pendekatanModalTitle">
                        <i class="ki-duotone ki-abstract-26 me-3 text-success">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Tambah Pendekatan
                    </h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Nama Pendekatan</label>
                        <input type="text" name="nama_pendekatan" id="nama_pendekatan_input" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Masukkan nama pendekatan" required />
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi_input" class="form-control form-control-solid" rows="4" placeholder="Masukkan deskripsi pendekatan" required></textarea>
                    </div>
                    <div class="fv-row mb-7">
                        <label class="fw-semibold fs-6 mb-2">Strategi</label>
                        <textarea name="strategi" id="strategi_input" class="form-control form-control-solid" rows="3" placeholder="Masukkan strategi pendekatan"></textarea>
                    </div>
                    <div class="fv-row mb-7">
                        <label class="fw-semibold fs-6 mb-2">Icon</label>
                        <input type="text" name="icon" id="icon_input" class="form-control form-control-solid" placeholder="Masukkan nama icon (contoh: ki-target)" />
                        <div class="form-text">Gunakan icon dari KTIcons. Contoh: ki-target, ki-abstract-26, ki-calendar</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="pendekatanSubmitBtn">
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
<!--end::Modal - Pendekatan-->

<script>
// SweetAlert2 CDN
if (typeof Swal === 'undefined') {
    document.write('<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"><\/script>');
}

$(document).ready(function() {
    let pendekatanId = null;

    // Reset form when modal is closed
    $('#pendekatanModal').on('hidden.bs.modal', function () {
        $('#pendekatanForm')[0].reset();
        pendekatanId = null;
        $('#pendekatanModalTitle').text('Tambah Pendekatan');
        $('#pendekatanSubmitBtn .indicator-label').text('Simpan');
    });

    // Form submission
    $('#pendekatanForm').on('submit', function(e) {
        e.preventDefault();

        const submitBtn = $('#pendekatanSubmitBtn');
        submitBtn.attr('data-kt-indicator', 'on');
        submitBtn.prop('disabled', true);

        const formData = new FormData(this);
        const url = pendekatanId ? `/visi-misi/pendekatan/${pendekatanId}` : '/visi-misi/pendekatan';
        const method = pendekatanId ? 'PUT' : 'POST';

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
                    $('#pendekatanModal').modal('hide');
                    loadPendekatanData();
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
    window.editPendekatan = function(id) {
        pendekatanId = id;
        $('#pendekatanModalTitle').text('Edit Pendekatan');
        $('#pendekatanSubmitBtn .indicator-label').text('Update');

        $.get(`/visi-misi/pendekatan/${id}/edit`, function(data) {
            $('#nama_pendekatan_input').val(data.nama_pendekatan);
            $('#deskripsi_input').val(data.deskripsi);
            $('#strategi_input').val(data.strategi);
            $('#icon_input').val(data.icon);
        });
    };
});
</script>
