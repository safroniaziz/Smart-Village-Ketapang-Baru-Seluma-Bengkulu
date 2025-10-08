<!--begin::Modal Edit Monografi Desa-->
<div class="modal fade" id="monografiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content" style="border: none; border-radius: 2rem; overflow: hidden; box-shadow: 0 30px 60px rgba(0,0,0,0.3); background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
            <!-- Enhanced Header with Floating Elements -->
            <div class="modal-header position-relative" style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 50%, #2563eb 100%); border: none; padding: 3rem 2rem; min-height: 200px;">
                <!-- Floating Particles -->
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="20" cy="20" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

                <!-- Gradient Overlays -->
                <div class="position-absolute top-0 end-0" style="width: 200px; height: 200px; background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%); transform: translate(50%, -50%);"></div>
                <div class="position-absolute bottom-0 start-0" style="width: 150px; height: 150px; background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%); transform: translate(-50%, 50%);"></div>

                <!-- Top Accent Line -->
                <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #3b82f6, #2563eb, #60a5fa, #93c5fd);"></div>

                <div class="d-flex align-items-center position-relative" style="z-index: 10;">
                    <div class="symbol symbol-80px me-4">
                        <div class="symbol-label bg-white bg-opacity-25 backdrop-blur-sm" style="border-radius: 1.5rem; border: 2px solid rgba(255,255,255,0.3);">
                            <i class="ki-duotone ki-profile-user fs-1 text-white" style="filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-white fw-bold fs-1 mb-2" style="text-shadow: 0 4px 12px rgba(0,0,0,0.3);">Edit Monografi Desa</h2>
                        <p class="text-white fs-5 mb-0" style="opacity: 0.9; text-shadow: 0 2px 4px rgba(0,0,0,0.2);">Profil lengkap dan identitas desa</p>
                        <div class="d-flex align-items-center mt-3">
                            <div class="bg-white bg-opacity-20 rounded-pill px-3 py-1 me-3">
                                <i class="ki-duotone ki-verify fs-6 text-white me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <span class="text-white fw-semibold fs-7">Data Resmi</span>
                            </div>
                            <div class="bg-white bg-opacity-20 rounded-pill px-3 py-1">
                                <i class="ki-duotone ki-shield-tick fs-6 text-white me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <span class="text-white fw-semibold fs-7">Tervalidasi</span>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white position-absolute" data-bs-dismiss="modal" aria-label="Close" style="top: 2rem; right: 2rem; z-index: 20; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));"></button>
            </div>
            <!-- Enhanced Body with Better Spacing -->
            <div class="modal-body" style="padding: 3rem 2rem; background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
                <form id="monografiForm">
                    @csrf
                    <input type="hidden" id="monografi_id" name="id">

                    <div class="row g-5">
                        <!-- Card: Identitas Wilayah -->
                        <div class="col-12">
                            <div class="card border-0 shadow-sm" style="border-radius: 1.5rem; background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
                                <div class="card-header bg-transparent border-0 pt-6 pb-3">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-3">
                                    <div class="symbol-label bg-light-primary">
                                        <i class="ki-duotone ki-geolocation fs-2x text-primary">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="card-title text-gray-900 fw-bold mb-1">Identitas Wilayah</h4>
                                    <p class="text-muted fs-6 mb-0">Informasi dasar lokasi desa</p>
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
                                            Nama Desa <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-lg border-0 shadow-sm" name="nama_desa" id="nama_desa" required placeholder="Masukkan nama desa..." style="border-radius: 1rem; background: #ffffff;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-map fs-5 text-primary me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Kecamatan <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-lg border-0 shadow-sm" name="kecamatan" id="kecamatan" required placeholder="Masukkan nama kecamatan..." style="border-radius: 1rem; background: #ffffff;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-abstract-14 fs-5 text-primary me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Kabupaten <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-lg border-0 shadow-sm" name="kabupaten" id="kabupaten" required placeholder="Masukkan nama kabupaten..." style="border-radius: 1rem; background: #ffffff;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-abstract-13 fs-5 text-primary me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Provinsi <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-lg border-0 shadow-sm" name="provinsi" id="provinsi" required placeholder="Masukkan nama provinsi..." style="border-radius: 1rem; background: #ffffff;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-send fs-5 text-primary me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Kode Pos
                                        </label>
                                        <input type="text" class="form-control form-control-lg border-0 shadow-sm" name="kode_pos" id="kode_pos" pattern="[0-9]{5}" maxlength="5" placeholder="Contoh: 38211" style="border-radius: 1rem; background: #ffffff;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-call fs-5 text-primary me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Kode Area
                                        </label>
                                        <input type="text" class="form-control form-control-lg border-0 shadow-sm" name="kode_area" id="kode_area" placeholder="Contoh: 0736" style="border-radius: 1rem; background: #ffffff;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        <!-- Card: Data Administratif -->
                        <div class="col-12">
                            <div class="card border-0 shadow-sm" style="border-radius: 1.5rem; background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
                                <div class="card-header bg-transparent border-0 pt-6 pb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-3">
                                            <div class="symbol-label bg-light-warning">
                                                <i class="ki-duotone ki-setting-2 fs-2x text-warning">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="card-title text-gray-900 fw-bold mb-1">Data Administratif</h4>
                                            <p class="text-muted fs-6 mb-0">Status dan informasi geografis</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label fw-bold text-gray-900 mb-3">
                                                    <i class="ki-duotone ki-award fs-5 text-warning me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Status Desa <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-select form-select-lg border-0 shadow-sm" name="status_desa" id="status_desa" required style="border-radius: 1rem; background: #ffffff;">
                                                    <option value="">Pilih Status</option>
                                                    <option value="Swadaya">Swadaya</option>
                                                    <option value="Swakarya">Swakarya</option>
                                                    <option value="Swasembada">Swasembada</option>
                                                </select>
                                            </div>
                                        </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-calendar fs-5 text-warning me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Tahun Berdiri
                                        </label>
                                        <input type="number" class="form-control form-control-lg border-0 shadow-sm" name="tahun_berdiri" id="tahun_berdiri" min="1800" max="{{ date('Y') }}" placeholder="Tahun berdiri desa..." style="border-radius: 1rem; background: #ffffff;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-abstract-35 fs-5 text-warning me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Luas Wilayah (km²)
                                        </label>
                                        <input type="number" class="form-control form-control-lg border-0 shadow-sm" name="luas_wilayah" id="luas_wilayah" step="0.01" min="0" placeholder="Luas wilayah dalam km²..." style="border-radius: 1rem; background: #ffffff;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-abstract-27 fs-5 text-warning me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Ketinggian (mdpl)
                                        </label>
                                        <input type="number" class="form-control form-control-lg border-0 shadow-sm" name="ketinggian_mdpl" id="ketinggian_mdpl" min="0" placeholder="Ketinggian dalam meter..." style="border-radius: 1rem; background: #ffffff;">
                                    </div>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Profil dan Visi Misi -->
                        <div class="col-12">
                            <div class="card border-0 shadow-sm" style="border-radius: 1.5rem; background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
                                <div class="card-header bg-transparent border-0 pt-6 pb-3">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-3">
                                    <div class="symbol-label bg-light-info">
                                        <i class="ki-duotone ki-notepad fs-2x text-info">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                        </i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="card-title text-gray-900 fw-bold mb-1">Profil dan Visi Misi</h4>
                                    <p class="text-muted fs-6 mb-0">Sejarah, visi, dan misi desa</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-book fs-5 text-info me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                            Sejarah Desa
                                        </label>
                                        <textarea class="form-control form-control-lg border-0 shadow-sm" name="sejarah" id="sejarah" rows="4" placeholder="Ceritakan sejarah singkat desa..." style="border-radius: 1rem; background: #ffffff; resize: none;"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-directbox-default fs-5 text-info me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                            Visi Desa
                                        </label>
                                        <textarea class="form-control form-control-lg border-0 shadow-sm" name="visi" id="visi" rows="3" placeholder="Visi desa untuk masa depan..." style="border-radius: 1rem; background: #ffffff; resize: none;"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-menu fs-5 text-info me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                            Misi Desa
                                        </label>
                                        <textarea class="form-control form-control-lg border-0 shadow-sm" name="misi" id="misi" rows="4" placeholder="Misi dan program desa..." style="border-radius: 1rem; background: #ffffff; resize: none;"></textarea>
                                    </div>
                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Enhanced Footer with Gradient Background -->
            <div class="modal-footer" style="background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%); border: none; padding: 2.5rem; border-top: 1px solid rgba(0,0,0,0.05);">
                <div class="d-flex justify-content-end w-100">
                    <button type="button" class="btn btn-light btn-lg me-4 px-6" data-bs-dismiss="modal" style="border: 2px solid #e5e7eb; font-weight: 600;">
                        <i class="ki-duotone ki-cross fs-3 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Batal
                    </button>
                    <button type="button" class="btn btn-lg px-6" onclick="saveMonografi()" data-kt-indicator="off"
                            style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); border: none; color: white; font-weight: 600; box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);">
                        <span class="indicator-label">
                            <i class="ki-duotone ki-check fs-3 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Simpan Data
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
<!--end::Modal Edit Monografi Desa-->

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
    border-color: #3b82f6 !important;
    box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25) !important;
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
// Add smooth animations when modal opens
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('monografiModal');
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

@include('admin.profil-desa.partials.monografi-scripts')
