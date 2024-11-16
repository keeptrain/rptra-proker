// Inisialisasi Quill
var quill = new Quill("#editor-container", {
    theme: "snow",
});


// Fungsi untuk memperbarui hidden input dengan konten Quill
function updateHiddenInput() {
    var activityInput = document.getElementById("activity-input");
    activityInput.value = quill.root.innerHTML; // Ambil konten HTML dari Quill
}

// Tambahkan event listener untuk menangkap perubahan di editor
quill.on("text-change", function () {
    updateHiddenInput(); // Perbarui hidden input setiap kali ada perubahan
});

// Jika Anda ingin memperbarui hidden input saat form disubmit
document.querySelector("form").addEventListener("submit", function (e) {
    updateHiddenInput(); // Pastikan hidden input diperbarui sebelum form disubmit
});
