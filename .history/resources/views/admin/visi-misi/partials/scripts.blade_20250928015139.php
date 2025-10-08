<script>
$(document).ready(function() {
    // Load data on page load
    loadVisi();
    loadMisi();
    loadPendekatan();
    loadTahapan();

    // VISI CRUD
    $('#visiForm').on('submit', function(e) {
        e.preventDefault();
        saveVisi();
    });

    function loadVisi() {
        $.get('{{ route("admin.visi-misi.visi") }}', function(data) {
            $('#visi-list').html(data);
        });
    }

    function saveVisi() {
        const formData = new FormData($('#visiForm')[0]);
        const isEdit = $('#visiForm').data('edit');
        const url = isEdit ?
            '{{ route("admin.visi-misi.visi.update", ":id") }}'.replace(':id', $('#visiForm').data('id')) :
            '{{ route("admin.visi-misi.visi.store") }}';
        const method = isEdit ? 'PUT' : 'POST';

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
                        icon: 'success'
                    }).then(() => {
                        $('#visiModal').modal('hide');
                        loadVisi();
                        resetVisiForm();
                    });
                }
            },
            error: function(xhr) {
                let errorMessage = 'Terjadi kesalahan';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                Swal.fire({
                    title: 'Error!',
                    text: errorMessage,
                    icon: 'error'
                });
            }
        });
    }

    function resetVisiForm() {
        $('#visiForm')[0].reset();
        $('#visiForm').removeData('edit').removeData('id');
        $('#visiModalTitle').text('Tambah Visi Desa');
    }

    // MISI CRUD
    $('#misiForm').on('submit', function(e) {
        e.preventDefault();
        saveMisi();
    });

    function loadMisi() {
        $.get('{{ route("admin.visi-misi.misi") }}', function(data) {
            $('#misi-list').html(data);
        });
    }

    function saveMisi() {
        const formData = new FormData($('#misiForm')[0]);
        const isEdit = $('#misiForm').data('edit');
        const url = isEdit ?
            '{{ route("admin.visi-misi.misi.update", ":id") }}'.replace(':id', $('#misiForm').data('id')) :
            '{{ route("admin.visi-misi.misi.store") }}';
        const method = isEdit ? 'PUT' : 'POST';

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
                        icon: 'success'
                    }).then(() => {
                        $('#misiModal').modal('hide');
                        loadMisi();
                        resetMisiForm();
                    });
                }
            },
            error: function(xhr) {
                let errorMessage = 'Terjadi kesalahan';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                Swal.fire({
                    title: 'Error!',
                    text: errorMessage,
                    icon: 'error'
                });
            }
        });
    }

    function resetMisiForm() {
        $('#misiForm')[0].reset();
        $('#misiForm').removeData('edit').removeData('id');
        $('#misiModalTitle').text('Tambah Misi Desa');
    }

    // PENDEKATAN CRUD
    $('#pendekatanForm').on('submit', function(e) {
        e.preventDefault();
        savePendekatan();
    });

    function loadPendekatan() {
        $.get('{{ route("admin.visi-misi.pendekatan") }}', function(data) {
            $('#pendekatan-list').html(data);
        });
    }

    function savePendekatan() {
        const formData = new FormData($('#pendekatanForm')[0]);
        const isEdit = $('#pendekatanForm').data('edit');
        const url = isEdit ?
            '{{ route("admin.visi-misi.pendekatan.update", ":id") }}'.replace(':id', $('#pendekatanForm').data('id')) :
            '{{ route("admin.visi-misi.pendekatan.store") }}';
        const method = isEdit ? 'PUT' : 'POST';

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
                        icon: 'success'
                    }).then(() => {
                        $('#pendekatanModal').modal('hide');
                        loadPendekatan();
                        resetPendekatanForm();
                    });
                }
            },
            error: function(xhr) {
                let errorMessage = 'Terjadi kesalahan';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                Swal.fire({
                    title: 'Error!',
                    text: errorMessage,
                    icon: 'error'
                });
            }
        });
    }

    function resetPendekatanForm() {
        $('#pendekatanForm')[0].reset();
        $('#pendekatanForm').removeData('edit').removeData('id');
        $('#pendekatanModalTitle').text('Tambah Pendekatan Partisipatif');
    }

    // TAHAPAN CRUD
    $('#tahapanForm').on('submit', function(e) {
        e.preventDefault();
        saveTahapan();
    });

    function loadTahapan() {
        $.get('{{ route("admin.visi-misi.tahapan") }}', function(data) {
            $('#tahapan-list').html(data);
        });
    }

    function saveTahapan() {
        const formData = new FormData($('#tahapanForm')[0]);
        const isEdit = $('#tahapanForm').data('edit');
        const url = isEdit ?
            '{{ route("admin.visi-misi.tahapan.update", ":id") }}'.replace(':id', $('#tahapanForm').data('id')) :
            '{{ route("admin.visi-misi.tahapan.store") }}';
        const method = isEdit ? 'PUT' : 'POST';

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
                        icon: 'success'
                    }).then(() => {
                        $('#tahapanModal').modal('hide');
                        loadTahapan();
                        resetTahapanForm();
                    });
                }
            },
            error: function(xhr) {
                let errorMessage = 'Terjadi kesalahan';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                Swal.fire({
                    title: 'Error!',
                    text: errorMessage,
                    icon: 'error'
                });
            }
        });
    }

    function resetTahapanForm() {
        $('#tahapanForm')[0].reset();
        $('#tahapanForm').removeData('edit').removeData('id');
        $('#tahapanModalTitle').text('Tambah Tahapan Implementasi');
    }

    // Global functions for edit and delete
    window.editVisi = function(id) {
        $.get('{{ route("admin.visi-misi.visi.edit", ":id") }}'.replace(':id', id), function(data) {
            $('#visi_visi').val(data.visi);
            $('#visi_deskripsi').val(data.deskripsi);
            $('#visiForm').data('edit', true).data('id', id);
            $('#visiModalTitle').text('Edit Visi Desa');
            $('#visiModal').modal('show');
        });
    };

    window.deleteVisi = function(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data visi akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ route("admin.visi-misi.visi.destroy", ":id") }}'.replace(':id', id),
                    type: 'DELETE',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Terhapus!', response.message, 'success');
                            loadVisi();
                        }
                    }
                });
            }
        });
    };

    // Similar functions for misi, pendekatan, and tahapan...
    // (Implementation similar to visi functions)
});
</script>
