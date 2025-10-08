<!--begin::Modal - Tahapan-->
<div class="modal fade" id="tahapanModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content" style="border: none; border-radius: 2rem; overflow: hidden; box-shadow: 0 30px 60px rgba(0,0,0,0.3); background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
            <form id="tahapanForm">
                <div class="modal-header position-relative" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 50%, #667eea 100%); border: none; padding: 3rem 2rem; min-height: 200px;">
                    <!-- Floating Particles -->
                    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('data:image/svg+xml,%3Csvg width=\"40\" height=\"40\" viewBox=\"0 0 40 40\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.1\"%3E%3Ccircle cx=\"20\" cy=\"20\" r=\"2\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

                    <!-- Gradient Overlays -->
                    <div class="position-absolute top-0 end-0" style="width: 200px; height: 200px; background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%); transform: translate(50%, -50%);"></div>
                    <div class="position-absolute bottom-0 start-0" style="width: 150px; height: 150px; background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%); transform: translate(-50%, 50%);"></div>

                    <!-- Top Accent Line -->
                    <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4, #feca57);"></div>

                    <div class="d-flex align-items-center position-relative" style="z-index: 10;">
                        <div class="symbol-label bg-white bg-opacity-25 backdrop-blur-sm" style="border-radius: 1.5rem; border: 2px solid rgba(255,255,255,0.3);">
                            <i class="ki-duotone ki-calendar fs-1 text-white" style="filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-white fw-bold fs-1 mb-2" id="tahapanModalTitle" style="text-shadow: 0 4px 12px rgba(0,0,0,0.3);">Tambah Tahapan</h2>
                        <p class="text-white fs-5 mb-0" style="opacity: 0.9; text-shadow: 0 2px 4px rgba(0,0,0,0.2);">Kelola data tahapan implementasi desa</p>
                    </div>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary position-absolute top-0 end-0 m-4" data-bs-dismiss="modal" style="background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.3); color: white; border-radius: 50%;" title="Tutup modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body p-6" style="background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
                    <div class="card border-0 shadow-sm" style="border-radius: 1.5rem; background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
                        <div class="card-header bg-transparent border-0 pt-6 pb-3">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-3">
                                    <div class="symbol-label bg-light-warning">
                                        <i class="ki-duotone ki-calendar fs-2x text-warning">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="card-title text-gray-900 fw-bold mb-1">Informasi Tahapan</h4>
                                    <p class="text-muted fs-6 mb-0">Data tahapan implementasi desa</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row g-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-calendar fs-5 text-warning me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Nama Tahapan <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="nama_tahapan" id="nama_tahapan_input" class="form-control form-control-lg border-0 shadow-sm" placeholder="Masukkan nama tahapan..." required style="border-radius: 1rem; background: #ffffff;">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-notepad-edit fs-5 text-primary me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Deskripsi <span class="text-danger">*</span>
                                        </label>
                                        <textarea name="deskripsi" id="deskripsi_input" class="form-control form-control-lg border-0 shadow-sm" rows="4" placeholder="Masukkan deskripsi tahapan..." required style="border-radius: 1rem; background: #ffffff;"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-activity fs-5 text-success me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Kegiatan
                                        </label>
                                        <textarea name="kegiatan" id="kegiatan_input" class="form-control form-control-lg border-0 shadow-sm" rows="3" placeholder="Masukkan kegiatan dalam tahapan..." style="border-radius: 1rem; background: #ffffff;"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-time fs-5 text-info me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Waktu
                                        </label>
                                        <input type="text" name="waktu" id="waktu_input" class="form-control form-control-lg border-0 shadow-sm" placeholder="Contoh: 2024-2025" style="border-radius: 1rem; background: #ffffff;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-picture fs-5 text-danger me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Icon
                                        </label>
                                        <input type="text" name="icon" id="icon_input" class="form-control form-control-lg border-0 shadow-sm" placeholder="Masukkan nama icon (contoh: ki-calendar)..." style="border-radius: 1rem; background: #ffffff;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%); border-top: 1px solid #e9ecef; padding: 2rem;">
                    <button type="button" class="btn btn-light btn-lg" data-bs-dismiss="modal" style="border-radius: 1rem; padding: 0.75rem 2rem; font-weight: 600;" title="Batal dan tutup modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-lg" id="tahapanSubmitBtn" style="border-radius: 1rem; padding: 0.75rem 2rem; font-weight: 600; background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); border: none;" title="Simpan data tahapan">
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
// SweetAlert2 CDN
if (typeof Swal === 'undefined') {
    document.write('<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"><\/script>');
}

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
        console.log('Tahapan form submitted!'); // Debug log
di
        const submitBtn = $('#tahapanSubmitBtn');
        submitBtn.attr('data-kt-indicator', 'on');
        submitBtn.prop('disabled', true);

        const formData = new FormData(this);
        const url = tahapanId ? `/visi-misi/tahapan/${tahapanId}` : '/visi-misi/tahapan';
        const method = tahapanId ? 'PUT' : 'POST';

        console.log('Tahapan URL:', url, 'Method:', method); // Debug log

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
                console.log('Tahapan success response:', response); // Debug log
                if (response.success) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: response.message,
                        icon: 'success',
                        timer: 2000
                    });
                    $('#tahapanModal').modal('hide');
                    loadTahapanData();
                } else {
                    Swal.fire('Error!', response.message || 'Terjadi kesalahan', 'error');
                }
            },
            error: function(xhr) {
                console.log('Tahapan error response:', xhr); // Debug log
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
        });
    };
});
</script>
