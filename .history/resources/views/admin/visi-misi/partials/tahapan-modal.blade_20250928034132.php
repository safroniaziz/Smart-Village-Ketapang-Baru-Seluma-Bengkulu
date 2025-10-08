<!--begin::Modal - Tahapan-->
<div class="modal fade" id="tahapanModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form id="tahapanForm">
                <div class="modal-header">
                    <h2 class="fw-bold" id="tahapanModalTitle">Tambah Tahapan</h2>
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
                            <label class="fs-6 fw-semibold mb-2">Nama Tahapan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-solid" name="nama_tahapan" id="nama_tahapan_input" placeholder="Masukkan nama tahapan" required>
                        </div>
                    </div>
                    <div class="row g-9 mb-8">
                        <div class="col-md-12">
                            <label class="fs-6 fw-semibold mb-2">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control form-control-solid" name="deskripsi" id="deskripsi_input" rows="4" placeholder="Masukkan deskripsi tahapan" required></textarea>
                        </div>
                    </div>
                    <div class="row g-9 mb-8">
                        <div class="col-md-12">
                            <label class="fs-6 fw-semibold mb-2">Kegiatan</label>
                            <textarea class="form-control form-control-solid" name="kegiatan" id="kegiatan_input" rows="3" placeholder="Masukkan kegiatan dalam tahapan"></textarea>
                        </div>
                    </div>
                    <div class="row g-9 mb-8">
                        <div class="col-md-6">
                            <label class="fs-6 fw-semibold mb-2">Waktu</label>
                            <input type="text" class="form-control form-control-solid" name="waktu" id="waktu_input" placeholder="Contoh: 2024-2025">
                        </div>
                        <div class="col-md-6">
                            <label class="fs-6 fw-semibold mb-2">Icon</label>
                            <input type="text" class="form-control form-control-solid" name="icon" id="icon_input" placeholder="Masukkan nama icon (contoh: ki-calendar)">
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
                    <button type="submit" class="btn btn-primary" id="tahapanSubmitBtn">
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
<!--end::Modal - Tahapan-->

<script>
$(document).ready(function() {
    let tahapanId = null;

    // Reset form when modal is closed
    $('#tahapanModal').on('hidden.bs.modal', function () {
        $('#tahapanForm')[0].reset();
        tahapanId = null;
        $('#tahapanModalTitle').text('Tambah Tahapan');
        $('#tahapanSubmitBtn .indicator-label').text('Simpan');
    });

    // Form submission
    $('#tahapanForm').on('submit', function(e) {
        e.preventDefault();

        const submitBtn = $('#tahapanSubmitBtn');
        submitBtn.attr('data-kt-indicator', 'on');
        submitBtn.prop('disabled', true);

        const formData = new FormData(this);
        const url = tahapanId ? `/visi-misi/tahapan/${tahapanId}` : '/visi-misi/tahapan';
        const method = tahapanId ? 'PUT' : 'POST';

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
                    $('#tahapanModal').modal('hide');
                    loadTahapanData();
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
    window.editTahapan = function(id) {
        tahapanId = id;
        $('#tahapanModalTitle').text('Edit Tahapan');
        $('#tahapanSubmitBtn .indicator-label').text('Update');

        $.get(`/visi-misi/tahapan/${id}/edit`, function(data) {
            $('#nama_tahapan_input').val(data.nama_tahapan);
            $('#deskripsi_input').val(data.deskripsi);
            $('#kegiatan_input').val(data.kegiatan);
            $('#waktu_input').val(data.waktu);
            $('#icon_input').val(data.icon);
            $('#is_active_input').prop('checked', data.is_active);
        });
    };
});
</script>
