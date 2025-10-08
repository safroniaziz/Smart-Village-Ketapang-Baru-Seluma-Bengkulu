// Batas Wilayah Functions
function addBatas() {
    // Clear form for new entry
    document.getElementById('batasForm').reset();
    $('#batas_id').val('');
    $('#batasModalLabel').text('Tambah Batas Wilayah');
    $('#batasModal').modal('show');
}

function editBatas(id) {
    // Load existing data for edit
    $.ajax({
        url: `/profil-desa/batas/${id}`,
        type: 'GET',
        success: function(response) {
            $('#batas_arah').val(response.arah || '');
            $('#batas_berbatasan_dengan').val(response.berbatasan_dengan || '');
            $('#batas_jenis_wilayah').val(response.jenis_wilayah || '');
            $('#batas_jarak_km').val(response.jarak_km || '');
            $('#batas_landmark').val(response.landmark || '');
            $('#batas_koordinat').val(response.koordinat || '');
            $('#batas_keterangan').val(response.keterangan || '');
            $('#batas_id').val(response.id);
            $('#batasModalLabel').text('Edit Batas Wilayah');
            $('#batasModal').modal('show');
        },
        error: function() {
            Swal.fire({
                title: 'Error!',
                text: 'Gagal memuat data batas wilayah',
                icon: 'error',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        }
    });
}

function deleteBatas(id) {
    Swal.fire({
        title: 'Hapus Batas Wilayah?',
        text: 'Data yang dihapus tidak dapat dikembalikan!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
        customClass: {
            confirmButton: 'btn btn-danger',
            cancelButton: 'btn btn-secondary'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/profil-desa/batas/${id}`,
                method: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Batas wilayah berhasil dihapus',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        }
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat menghapus data',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        }
                    });
                }
            });
        }
    });
}

function saveBatas() {
    const form = document.getElementById('batasForm');
    const formData = new FormData(form);
    const batasId = $('#batas_id').val();
    const isEdit = batasId && batasId !== '';

    const submitBtn = document.querySelector('button[onclick="saveBatas()"]');
    submitBtn.setAttribute('data-kt-indicator', 'on');

    // Add method override for PUT request if editing
    if (isEdit) {
        formData.append('_method', 'PUT');
    }

    $.ajax({
        url: isEdit ? `/profil-desa/batas/${batasId}` : '/profil-desa/batas',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            Swal.fire({
                title: 'Berhasil!',
                text: isEdit ? 'Batas wilayah berhasil diperbarui' : 'Batas wilayah berhasil ditambahkan',
                icon: 'success',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            }).then(() => {
                $('#batasModal').modal('hide');
                location.reload();
            });
        },
        error: function(xhr) {
            let errorMessage = 'Terjadi kesalahan saat menyimpan data';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            Swal.fire({
                title: 'Error!',
                text: errorMessage,
                icon: 'error'
            });
        },
        complete: function() {
            submitBtn.setAttribute('data-kt-indicator', 'off');
        }
    });
}

// Iklim Desa Functions - New Edit Modal
function openEditIklimModal() {
    // Load existing iklim data first
    $.ajax({
        url: '/profil-desa',
        type: 'GET',
        success: function(response) {
            // Check if iklim data exists
            if (response.iklim && response.iklim.length > 0) {
                const data = response.iklim[0]; // Get first iklim record
                console.log('Iklim data loaded:', data);

                // Populate iklim data fields with edit_ prefix for IDs
                $('#edit_jenis_iklim').val(data.jenis_iklim || '');
                $('#edit_suhu_min').val(data.suhu_min || '');
                $('#edit_suhu_max').val(data.suhu_max || '');
                $('#edit_kelembaban_rata').val(data.kelembaban_rata || '');
                $('#edit_curah_hujan_tahunan').val(data.curah_hujan_tahunan || '');
                $('#edit_hari_hujan_pertahun').val(data.hari_hujan_pertahun || '');
                $('#edit_musim_kering').val(data.musim_kering || '');
                $('#edit_musim_hujan').val(data.musim_hujan || '');
                $('#edit_angin_dominan').val(data.angin_dominan || '');
                $('#edit_karakteristik_iklim').val(data.karakteristik_iklim || '');
            }
            $('#iklimEditModal').modal('show');
        },
        error: function() {
            Swal.fire({
                title: 'Error!',
                text: 'Gagal memuat data iklim',
                icon: 'error',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
            // Show modal even if data loading fails
            $('#iklimEditModal').modal('show');
        }
    });
}

function saveIklimEdit() {
    const form = document.getElementById('iklimEditForm');
    const formData = new FormData(form);

    const submitBtn = document.querySelector('button[onclick="saveIklimEdit()"]');
    submitBtn.setAttribute('data-kt-indicator', 'on');

    $.ajax({
        url: '/profil-desa/iklim-bulk',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data iklim berhasil disimpan',
                icon: 'success',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            }).then(() => {
                location.reload();
            });
        },
        error: function(xhr) {
            let errorMessage = 'Terjadi kesalahan saat menyimpan data';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            Swal.fire({
                title: 'Error!',
                text: errorMessage,
                icon: 'error'
            });
        },
        complete: function() {
            submitBtn.setAttribute('data-kt-indicator', 'off');
        }
    });
}

// Old Iklim Functions (kept for compatibility)
function addIklim() {
    $('#iklimModalTitle').text('Tambah Data Iklim');
    $('#iklimForm')[0].reset();
    $('#iklim_id').val('');
    $('#iklimModal').modal('show');
}

function editIklim(id) {
    // Get iklim data first
    $.ajax({
        url: `/profil-desa/iklim/${id}`,
        type: 'GET',
        success: function(response) {
            $('#iklimModalTitle').text('Edit Data Iklim');
            $('#iklim_id').val(response.id);
            $('#iklim_bulan').val(response.bulan);
            $('#iklim_tahun').val(response.tahun);
            $('#iklim_curah_hujan').val(response.curah_hujan);
            $('#iklim_suhu_rata_rata').val(response.suhu_rata_rata);
            $('#iklim_kelembaban').val(response.kelembaban);
            $('#iklim_kecepatan_angin').val(response.kecepatan_angin);
            $('#iklim_arah_angin').val(response.arah_angin);
            $('#iklim_musim').val(response.musim);
            $('#iklimModal').modal('show');
        },
        error: function() {
            Swal.fire({
                title: 'Error!',
                text: 'Gagal memuat data iklim',
                icon: 'error',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        }
    });
}

function saveIklim() {
    const form = document.getElementById('iklimForm');
    const formData = new FormData(form);
    const isEdit = $('#iklim_id').val() !== '';

    const submitBtn = document.querySelector('button[onclick="saveIklim()"]');
    submitBtn.setAttribute('data-kt-indicator', 'on');

    const url = isEdit ? `/profil-desa/iklim/${$('#iklim_id').val()}` : '/profil-desa/iklim';
    const method = isEdit ? 'PUT' : 'POST';

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
            Swal.fire({
                title: 'Berhasil!',
                text: isEdit ? 'Data iklim berhasil diperbarui' : 'Data iklim berhasil ditambahkan',
                icon: 'success',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            }).then(() => {
                location.reload();
            });
        },
        error: function(xhr) {
            let errorMessage = 'Terjadi kesalahan saat menyimpan data';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            Swal.fire({
                title: 'Error!',
                text: errorMessage,
                icon: 'error'
            });
        },
        complete: function() {
            submitBtn.setAttribute('data-kt-indicator', 'off');
        }
    });
}

function deleteIklim(id) {
    Swal.fire({
        title: 'Hapus Data Iklim?',
        text: 'Apakah Anda yakin ingin menghapus data iklim ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/profil-desa/iklim/${id}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data iklim berhasil dihapus',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        }
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat menghapus data',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        }
                    });
                }
            });
        }
    });
}

// Peruntukan Lahan Functions
function addPeruntukanLahan() {
    $('#peruntukanModalTitle').text('Tambah Peruntukan Lahan');
    $('#peruntukanForm')[0].reset();
    $('#peruntukan_id').val('');
    $('#peruntukanModal').modal('show');
}

function editPeruntukanLahan(id) {
    // Get peruntukan data first
    $.ajax({
        url: `/profil-desa/peruntukan/${id}`,
        type: 'GET',
        success: function(response) {
            $('#peruntukanModalTitle').text('Edit Peruntukan Lahan');
            $('#peruntukan_id').val(response.id);
            $('#peruntukan_kategori_lahan').val(response.kategori_lahan);
            $('#peruntukan_luas').val(response.luas);
            $('#peruntukan_persentase').val(response.persentase);
            $('#peruntukan_status_kepemilikan').val(response.status_kepemilikan);
            $('#peruntukan_deskripsi').val(response.deskripsi);
            $('#peruntukanModal').modal('show');
        },
        error: function() {
            Swal.fire({
                title: 'Error!',
                text: 'Gagal memuat data peruntukan lahan',
                icon: 'error',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        }
    });
}

function savePeruntukan() {
    const form = document.getElementById('peruntukanForm');
    const formData = new FormData(form);
    const isEdit = $('#peruntukan_id').val() !== '';

    const submitBtn = document.querySelector('button[onclick="savePeruntukan()"]');
    submitBtn.setAttribute('data-kt-indicator', 'on');

    const url = isEdit ? `/profil-desa/peruntukan/${$('#peruntukan_id').val()}` : '/profil-desa/peruntukan';
    const method = isEdit ? 'PUT' : 'POST';

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
            Swal.fire({
                title: 'Berhasil!',
                text: isEdit ? 'Data peruntukan lahan berhasil diperbarui' : 'Data peruntukan lahan berhasil ditambahkan',
                icon: 'success',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            }).then(() => {
                location.reload();
            });
        },
        error: function(xhr) {
            let errorMessage = 'Terjadi kesalahan saat menyimpan data';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            Swal.fire({
                title: 'Error!',
                text: errorMessage,
                icon: 'error'
            });
        },
        complete: function() {
            submitBtn.setAttribute('data-kt-indicator', 'off');
        }
    });
}

function deletePeruntukanLahan(id) {
    Swal.fire({
        title: 'Hapus Peruntukan Lahan?',
        text: 'Apakah Anda yakin ingin menghapus data peruntukan lahan ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/profil-desa/peruntukan/${id}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data peruntukan lahan berhasil dihapus',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        }
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data', 'error');
                }
            });
        }
    });
}

// Potensi Desa Functions
function addPotensiDesa() {
    $('#potensiModalTitle').text('Tambah Potensi Desa');
    $('#potensiForm')[0].reset();
    $('#potensi_id').val('');
    $('#potensiModal').modal('show');
}

function editPotensiDesa(id) {
    // Get potensi data first
    $.ajax({
        url: `/profil-desa/potensi/${id}`,
        type: 'GET',
        success: function(response) {
            $('#potensiModalTitle').text('Edit Potensi Desa');
            $('#potensi_id').val(response.id);
            $('#potensi_nama_potensi').val(response.nama_potensi);
            $('#potensi_kategori').val(response.kategori);
            $('#potensi_lokasi').val(response.lokasi);
            $('#potensi_nilai_ekonomi').val(response.nilai_ekonomi);
            $('#potensi_status').val(response.status);
            $('#potensi_is_unggulan').val(response.is_unggulan);
            $('#potensi_deskripsi').val(response.deskripsi);
            $('#potensiModal').modal('show');
        },
        error: function() {
            Swal.fire({
                title: 'Error!',
                text: 'Gagal memuat data potensi desa',
                icon: 'error',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        }
    });
}

function savePotensi() {
    const form = document.getElementById('potensiForm');
    const formData = new FormData(form);
    const isEdit = $('#potensi_id').val() !== '';

    const submitBtn = document.querySelector('button[onclick="savePotensi()"]');
    submitBtn.setAttribute('data-kt-indicator', 'on');

    const url = isEdit ? `/profil-desa/potensi/${$('#potensi_id').val()}` : '/profil-desa/potensi';
    const method = isEdit ? 'PUT' : 'POST';

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
            Swal.fire({
                title: 'Berhasil!',
                text: isEdit ? 'Data potensi desa berhasil diperbarui' : 'Data potensi desa berhasil ditambahkan',
                icon: 'success',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            }).then(() => {
                location.reload();
            });
        },
        error: function(xhr) {
            let errorMessage = 'Terjadi kesalahan saat menyimpan data';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            Swal.fire({
                title: 'Error!',
                text: errorMessage,
                icon: 'error'
            });
        },
        complete: function() {
            submitBtn.setAttribute('data-kt-indicator', 'off');
        }
    });
}

function deletePotensiDesa(id) {
    Swal.fire({
        title: 'Hapus Potensi Desa?',
        text: 'Apakah Anda yakin ingin menghapus data potensi desa ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/profil-desa/potensi/${id}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data potensi desa berhasil dihapus',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        }
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data', 'error');
                }
            });
        }
    });
}
