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
            <div class="modal-body p-6">
                <form id="fasilitasForm">
                    @csrf
                    <input type="hidden" id="fasilitas_id" name="id">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Fasilitas <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="nama_fasilitas" id="fasilitas_nama_fasilitas" required placeholder="Masukkan nama fasilitas...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kategori <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg" name="kategori" id="fasilitas_kategori" required>
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
                        <div class="col-12">
                            <label class="form-label fw-bold">Alamat <span class="text-danger">*</span></label>
                            <textarea class="form-control form-control-lg" name="alamat" id="fasilitas_alamat" rows="2" required placeholder="Masukkan alamat lengkap fasilitas..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kondisi <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg" name="kondisi" id="fasilitas_kondisi" required>
                                <option value="">Pilih Kondisi</option>
                                <option value="Baik">Baik</option>
                                <option value="Rusak Ringan">Rusak Ringan</option>
                                <option value="Rusak Berat">Rusak Berat</option>
                                <option value="Tidak Layak">Tidak Layak</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tahun Dibangun</label>
                            <input type="number" class="form-control form-control-lg" name="tahun_dibangun" id="fasilitas_tahun_dibangun" min="1900" max="2030" placeholder="Tahun pembangunan...">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Foto Fasilitas</label>
                            <div class="d-flex align-items-center">
                                <input type="file" class="form-control form-control-lg" name="foto" id="fasilitas_foto" accept="image/*" onchange="previewFasilitasPhoto(this)">
                                <div class="ms-3">
                                    <div id="fasilitas_photo_preview" class="symbol symbol-100px" style="display: none;">
                                        <img id="fasilitas_preview_img" src="" alt="Preview" class="symbol-label" style="object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-text">Format: JPG, PNG, JPEG. Maksimal 2MB</div>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Deskripsi</label>
                            <textarea class="form-control form-control-lg" name="deskripsi" id="fasilitas_deskripsi" rows="3" placeholder="Masukkan deskripsi fasilitas..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="background: #f8f9fa; border: none; padding: 2rem;">
                <button type="button" class="btn btn-light btn-lg me-3" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-4 me-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    Batal
                </button>
                <button type="button" class="btn btn-primary btn-lg" onclick="saveFasilitas()" data-kt-indicator="off">
                    <span class="indicator-label">
                        <i class="ki-duotone ki-check fs-4 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Simpan
                    </span>
                    <span class="indicator-progress">Menyimpan... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal Add/Edit Fasilitas Desa-->

<script>
function previewFasilitasPhoto(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('fasilitas_preview_img').src = e.target.result;
            document.getElementById('fasilitas_photo_preview').style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
