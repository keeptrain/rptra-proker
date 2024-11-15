function openModal() {
    document.getElementById('draftModal').classList.remove('hidden'); // Menampilkan modal
}

function closeModal() {
    document.getElementById('draftModal').classList.add('hidden'); // Menyembunyikan modal
}

document.getElementById('saveDraftButton').addEventListener('click', function() {
    const draftName = document.getElementById('draftName').value;

    if (draftName) {
        // Simpan nama draft (misalnya, kirim ke server)
        console.log('Draft saved:', draftName);
        closeModal(); // Menutup modal setelah menyimpan
    } else {
        alert('Nama draft tidak boleh kosong.');
    }
});