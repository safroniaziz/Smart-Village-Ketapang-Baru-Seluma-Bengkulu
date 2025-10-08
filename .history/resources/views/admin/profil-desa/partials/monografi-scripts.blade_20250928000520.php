<script>
// Monografi Desa Functions
function openEditMonografiModal() {
    // Load existing monografi data
    $.ajax({
        url: "/profil-desa",
        type: "GET", 
        success: function(response) {
            if (response.monografi) {
                const data = response.monografi;
                $("#monografi_id").val(data.id || "");
                $("#nama_desa").val(data.nama_desa || "");
                $("#kecamatan").val(data.kecamatan || "");
                $("#kabupaten").val(data.kabupaten || "");
                $("#provinsi").val(data.provinsi || "");
                $("#kode_pos").val(data.kode_pos || "");
                $("#kode_area").val(data.kode_area || "");
                $("#status_desa").val(data.status_desa || "");
                $("#tahun_berdiri").val(data.tahun_berdiri || "");
                $("#luas_wilayah").val(data.luas_wilayah || "");
                $("#ketinggian_mdpl").val(data.ketinggian_mdpl || "");
                $("#sejarah").val(data.sejarah || "");
                $("#visi").val(data.visi || "");
                $("#misi").val(data.misi || "");
            }
            $("#monografiModal").modal("show");
        },
        error: function() {
            $("#monografiModal").modal("show");
        }
    });
}

function saveMonografi() {
    const form = document.getElementById("monografiForm");
    const formData = new FormData(form);
    const isEdit = $("#monografi_id").val() !== "";

    // Add method spoofing for Laravel
    if (isEdit) {
        formData.append("_method", "PUT");
    }

    const submitBtn = document.querySelector("button[onclick=\"saveMonografi()\"]");
    submitBtn.setAttribute("data-kt-indicator", "on");

    const url = isEdit ? `/profil-desa/monografi/${$("#monografi_id").val()}` : "/profil-desa/monografi";
    const method = "POST"; // Always use POST with _method spoofing

    $.ajax({
        url: url,
        type: method,
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            "X-CSRF-TOKEN": $("meta[name=\"csrf-token\"]").attr("content")
        },
        success: function(response) {
            $("#monografiModal").modal("hide");
            Swal.fire({
                title: "Berhasil!",
                text: "Data monografi berhasil disimpan",
                icon: "success",
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            }).then(() => {
                location.reload();
            });
        },
        error: function(xhr) {
            console.log("Error xhr status:", xhr.status);
            console.log("Error xhr response:", xhr.responseJSON);

            if (xhr.status === 422 && typeof showValidationError === "function") {
                showValidationError(xhr);
            } else {
                let errorMessage = "Terjadi kesalahan saat menyimpan data";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                Swal.fire({
                    title: "Error!",
                    text: errorMessage,
                    icon: "error",
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }
        },
        complete: function() {
            submitBtn.setAttribute("data-kt-indicator", "off");
        }
    });
}
</script>