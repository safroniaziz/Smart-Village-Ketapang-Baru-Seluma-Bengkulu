<script>
// Iklim Desa Functions
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
            Swal.fire('Error!', 'Gagal memuat data iklim', 'error');
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
                timer: 2000,
                showConfirmButton: false
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
                    Swal.fire('Berhasil!', 'Data iklim berhasil dihapus', 'success').then(() => {
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
            Swal.fire('Error!', 'Gagal memuat data peruntukan lahan', 'error');
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
                timer: 2000,
                showConfirmButton: false
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
                    Swal.fire('Berhasil!', 'Data peruntukan lahan berhasil dihapus', 'success').then(() => {
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
            Swal.fire('Error!', 'Gagal memuat data potensi desa', 'error');
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
                timer: 2000,
                showConfirmButton: false
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
                    Swal.fire('Berhasil!', 'Data potensi desa berhasil dihapus', 'success').then(() => {
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
</script>
