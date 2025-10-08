<!--begin::Modal Add/Edit Fasilitas Desa-->
<div class="modal fade" id="fasilitasModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content" style="border: none; border-radius: 2rem; overflow: hidden; box-shadow: 0 30px 60px rgba(0,0,0,0.3); background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
            <!-- Enhanced Header with Floating Elements -->
            <div class="modal-header position-relative" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%); border: none; padding: 3rem 2rem; min-height: 200px;">
                <!-- Floating Particles -->
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="20" cy="20" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

                <!-- Gradient Overlays -->
                <div class="position-absolute top-0 end-0" style="width: 200px; height: 200px; background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%); transform: translate(50%, -50%);"></div>
                <div class="position-absolute bottom-0 start-0" style="width: 150px; height: 150px; background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%); transform: translate(-50%, 50%);"></div>

                <!-- Top Accent Line -->
                <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4, #feca57);"></div>

                <div class="d-flex align-items-center position-relative" style="z-index: 10;">
                    <div class="symbol symbol-80px me-4">
                        <div class="symbol-label bg-white bg-opacity-25 backdrop-blur-sm" style="border-radius: 1.5rem; border: 2px solid rgba(255,255,255,0.3);">
                            <i class="ki-duotone ki-abstract-41 fs-1 text-white" style="filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-white fw-bold fs-1 mb-2" id="fasilitasModalTitle" style="text-shadow: 0 4px 12px rgba(0,0,0,0.3);">Tambah Fasilitas Desa</h2>
                        <p class="text-white fs-5 mb-0" style="opacity: 0.9; text-shadow: 0 2px 4px rgba(0,0,0,0.2);">Kelola data fasilitas desa dengan lengkap dan detail</p>
                        <div class="d-flex align-items-center mt-3">
                            <div class="bg-white bg-opacity-20 rounded-pill px-3 py-1 me-3">
                                <i class="ki-duotone ki-verify fs-6 text-white me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <span class="text-white fw-semibold fs-7">Data Terlindungi</span>
                            </div>
                            <div class="bg-white bg-opacity-20 rounded-pill px-3 py-1">
                                <i class="ki-duotone ki-shield-tick fs-6 text-white me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <span class="text-white fw-semibold fs-7">Validasi Otomatis</span>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white position-absolute" style="top: 1.5rem; right: 1.5rem; z-index: 15; background: rgba(255,255,255,0.2); border-radius: 50%; padding: 0.75rem;" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-6" style="background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
                <form id="fasilitasForm">
                    @csrf
                    <input type="hidden" id="fasilitas_id" name="id">

                    <!-- Form Steps Indicator -->
                    <div class="d-flex justify-content-center mb-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="ki-duotone ki-check fs-6 text-white">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <div class="bg-light-primary mx-2" style="width: 60px; height: 3px; border-radius: 2px;"></div>
                            <div class="bg-light-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <span class="text-primary fw-bold fs-7">2</span>
                            </div>
                            <div class="bg-light-primary mx-2" style="width: 60px; height: 3px; border-radius: 2px;"></div>
                            <div class="bg-light-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <span class="text-primary fw-bold fs-7">3</span>
                            </div>
                        </div>
                    </div>

                    <div class="row g-5">
                        <!-- Basic Information Card -->
                        <div class="col-12">
                            <div class="card border-0 shadow-sm" style="border-radius: 1.5rem; background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
                                <div class="card-header bg-transparent border-0 pt-6 pb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-3">
                                            <div class="symbol-label bg-light-primary">
                                                <i class="ki-duotone ki-information-5 fs-2x text-primary">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="card-title text-gray-900 fw-bold mb-1">Informasi Dasar</h4>
                                            <p class="text-muted fs-6 mb-0">Data utama fasilitas desa</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label fw-bold text-gray-900 mb-3">
                                                    <i class="ki-duotone ki-home-2 fs-5 text-primary me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Nama Fasilitas <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control form-control-lg border-0 shadow-sm" name="nama_fasilitas" id="fasilitas_nama_fasilitas" required placeholder="Masukkan nama fasilitas..." style="border-radius: 1rem; background: #ffffff;">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label fw-bold text-gray-900 mb-3">
                                                    <i class="ki-duotone ki-category fs-5 text-primary me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Kategori <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-select form-select-lg border-0 shadow-sm" name="kategori" id="fasilitas_kategori" required style="border-radius: 1rem; background: #ffffff;">
                                                    <option value="">Pilih Kategori</option>
                                                    <option value="Pendidikan">Pendidikan</option>
                                                    <option value="Kesehatan">Kesehatan</option>
                                                    <option value="Ibadah">Ibadah</option>
                                                    <option value="Olahraga">Olahraga</option>
                                                    <option value="Pasar">Pasar</option>
                                                    <option value="Transportasi">Transportasi</option>
                                                    <option value="Komunikasi">Komunikasi</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label fw-bold text-gray-900 mb-3">
                                                    <i class="ki-duotone ki-geolocation fs-5 text-primary me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Alamat <span class="text-danger">*</span>
                                                </label>
                                                <textarea class="form-control form-control-lg border-0 shadow-sm" name="alamat" id="fasilitas_alamat" rows="3" required placeholder="Masukkan alamat lengkap fasilitas..." style="border-radius: 1rem; background: #ffffff; resize: none;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status & Details Card -->
                        <div class="col-12">
                            <div class="card border-0 shadow-sm" style="border-radius: 1.5rem; background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
                                <div class="card-header bg-transparent border-0 pt-6 pb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-3">
                                            <div class="symbol-label bg-light-success">
                                                <i class="ki-duotone ki-setting-2 fs-2x text-success">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="card-title text-gray-900 fw-bold mb-1">Status & Detail</h4>
                                            <p class="text-muted fs-6 mb-0">Kondisi dan informasi tambahan</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label fw-bold text-gray-900 mb-3">
                                                    <i class="ki-duotone ki-shield-tick fs-5 text-success me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Kondisi <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-select form-select-lg border-0 shadow-sm" name="kondisi" id="fasilitas_kondisi" required style="border-radius: 1rem; background: #ffffff;">
                                                    <option value="">Pilih Kondisi</option>
                                                    <option value="Baik">Baik</option>
                                                    <option value="Rusak Ringan">Rusak Ringan</option>
                                                    <option value="Rusak Berat">Rusak Berat</option>
                                                    <option value="Tidak Layak">Tidak Layak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label fw-bold text-gray-900 mb-3">
                                                    <i class="ki-duotone ki-calendar fs-5 text-success me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Tahun Dibangun
                                                </label>
                                                <input type="number" class="form-control form-control-lg border-0 shadow-sm" name="tahun_dibangun" id="fasilitas_tahun_dibangun" min="1900" max="2030" placeholder="Tahun pembangunan..." style="border-radius: 1rem; background: #ffffff;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Photo Upload Card -->
                        <div class="col-12">
                            <div class="card border-0 shadow-sm" style="border-radius: 1.5rem; background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
                                <div class="card-header bg-transparent border-0 pt-6 pb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-3">
                                            <div class="symbol-label bg-light-warning">
                                                <i class="ki-duotone ki-picture fs-2x text-warning">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="card-title text-gray-900 fw-bold mb-1">Foto Fasilitas</h4>
                                            <p class="text-muted fs-6 mb-0">Upload foto untuk dokumentasi</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label fw-bold text-gray-900 mb-3">
                                                    <i class="ki-duotone ki-camera fs-5 text-warning me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Upload Foto
                                                </label>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <input type="file" class="form-control form-control-lg border-0 shadow-sm" name="foto" id="fasilitas_foto" accept="image/*" onchange="previewFasilitasPhoto(this)" style="border-radius: 1rem; background: #ffffff;">
                                                    </div>
                                                    <div class="ms-4">
                                                        <div id="fasilitas_photo_preview" class="symbol symbol-120px" style="display: none; border-radius: 1rem; overflow: hidden; box-shadow: 0 8px 25px rgba(0,0,0,0.15);">
                                                            <img id="fasilitas_preview_img" src="" alt="Preview" class="symbol-label" style="object-fit: cover;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-text mt-2">
                                                    <i class="ki-duotone ki-information-2 fs-6 text-muted me-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Format: JPG, PNG, JPEG. Maksimal 2MB
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label fw-bold text-gray-900 mb-3">
                                                    <i class="ki-duotone ki-note-2 fs-5 text-warning me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Deskripsi
                                                </label>
                                                <textarea class="form-control form-control-lg border-0 shadow-sm" name="deskripsi" id="fasilitas_deskripsi" rows="4" placeholder="Masukkan deskripsi fasilitas..." style="border-radius: 1rem; background: #ffffff; resize: none;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0" style="background: linear-gradient(145deg, #f8fafc 0%, #e2e8f0 100%); padding: 2.5rem;">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-40px me-3">
                            <div class="symbol-label bg-light-info">
                                <i class="ki-duotone ki-shield-tick fs-4 text-info">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>
                        <div>
                            <div class="fw-bold text-gray-900 fs-7">Data Aman & Terlindungi</div>
                            <div class="text-muted fs-8">Informasi akan disimpan dengan aman</div>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <button type="button" class="btn btn-light-danger btn-lg px-6" data-bs-dismiss="modal" style="border-radius: 1rem; font-weight: 600;">
                            <i class="ki-duotone ki-cross fs-4 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Batal
                        </button>
                        <button type="button" class="btn btn-primary btn-lg px-6" onclick="saveFasilitas()" data-kt-indicator="off" style="border-radius: 1rem; font-weight: 600; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);">
                            <span class="indicator-label">
                                <i class="ki-duotone ki-check fs-4 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Simpan Fasilitas
                            </span>
                            <span class="indicator-progress">
                                <span class="spinner-border spinner-border-sm align-middle me-2"></span>
                                Menyimpan...
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Modal Add/Edit Fasilitas Desa-->

<style>
/* Enhanced Modal Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
}

/* Modal Content Animations */
.modal-content {
    animation: fadeInUp 0.6s ease-out;
}

.modal-header .symbol {
    animation: float 3s ease-in-out infinite;
}

.modal-body .card {
    animation: slideInRight 0.8s ease-out;
    transition: all 0.3s ease;
}

.modal-body .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
}

/* Form Input Enhancements */
.form-control, .form-select {
    transition: all 0.3s ease;
    border: 2px solid transparent !important;
}

.form-control:focus, .form-select:focus {
    border-color: #667eea !important;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25) !important;
    transform: translateY(-2px);
}

/* Button Enhancements */
.btn {
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.btn:hover::before {
    left: 100%;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

/* Photo Preview Animation */
#fasilitas_photo_preview {
    animation: fadeInUp 0.5s ease-out;
    transition: all 0.3s ease;
}

#fasilitas_photo_preview:hover {
    transform: scale(1.05);
    box-shadow: 0 12px 30px rgba(0,0,0,0.2) !important;
}

/* Step Indicator Animation */
.modal-body .d-flex .bg-primary {
    animation: pulse 2s ease-in-out infinite;
}

/* Loading State */
.btn[data-kt-indicator="on"] {
    pointer-events: none;
    opacity: 0.8;
}

.btn[data-kt-indicator="on"] .indicator-label {
    opacity: 0;
}

.btn[data-kt-indicator="on"] .indicator-progress {
    opacity: 1;
}
</style>

<script>
function previewFasilitasPhoto(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('fasilitas_photo_preview');
            const img = document.getElementById('fasilitas_preview_img');

            img.src = e.target.result;
            preview.style.display = 'block';

            // Add animation class
            preview.style.animation = 'fadeInUp 0.5s ease-out';
        }
        reader.readAsDataURL(input.files[0]);
    }
}

// Add smooth animations when modal opens
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('fasilitasModal');
    if (modal) {
        modal.addEventListener('shown.bs.modal', function() {
            // Animate cards with delay
            const cards = modal.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
        });
    }
});
</script>
