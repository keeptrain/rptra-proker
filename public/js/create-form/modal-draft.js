function openModal() {
    document.getElementById("draftModal").classList.remove("hidden"); // Menampilkan modal
}

function closeModal() {
    document.getElementById("draftModal").classList.add("hidden"); // Menyembunyikan modal
}

function resetForm() {
    document.getElementById("create-form").reset();
    
} 
document.getElementById("saveDraftButton").addEventListener("click", function () {

    const formData = new FormData(document.getElementById("create-form"));

    $.ajax({
        type: "POST",
        url: 'tambah/draft', // URL endpoint
        data: formData, // Data yang akan dikirim
        processData: false,
        contentType: false,
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
        success: function (data) {
            if (data.success) {
                showAlert('success', 'Berhasil', data.message);
                closeModal();
                resetForm();
                
            }
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
    
        }
    });
});