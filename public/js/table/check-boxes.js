document.addEventListener('DOMContentLoaded', function() {
    // Seleksi checkbox dengan name "priority_ids[]", "main_ids[]", dan "partner_ids[]"
    const checkboxes = document.querySelectorAll(
        'input[name="priority_ids[]"], input[name="main_ids[]"], input[name="partner_ids[]"], input[name="transaction_ids[]"]');
    const deleteButton = document.getElementById('delete-button');

    function toggleDeleteButton() {
        // Cek apakah ada checkbox yang dipilih
        const anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
        if (anyChecked) {
            deleteButton.classList.remove('hidden');
        } else {
            deleteButton.classList.add('hidden');
        }
    }

    // Event listener untuk setiap checkbox
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', toggleDeleteButton);
    });

    // Event listener untuk checkbox master
    const masterCheckbox = document.getElementById('checkbox-all-search');
    if (masterCheckbox) {
        masterCheckbox.addEventListener('change', function() {
            const isChecked = this.checked;
            checkboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
            });
            toggleDeleteButton();
        });
    }

    // Fungsi untuk menampilkan konfirmasi SweetAlert
    function confirmDelete() {
        Swal.fire({
            title: "Apakah kamu yakin?",
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your selected items have been deleted.",
                    icon: "success"
                }).then(() => {p
                    // Lakukan penghapusan atau reload halaman setelah konfirmasi
                    document.getElementById('deleteForm').submit(); // Jika ada form dengan id deleteForm
                });
            }
        });
    }

    // Tambahkan event listener untuk deleteButton
    deleteButton.addEventListener('click', confirmDelete);
});