<!-- Modal -->
<div id="editModal" class="fixed inset-0 items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
        <h2 class="text-xl font-semibold mb-4">Edit Program</h2>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <!-- Tambahkan input field sesuai kebutuhan -->
            <div class="mb-4">
                <label for="programName" class="block text-sm font-medium text-gray-700">Nama Program</label>
                <input type="text" id="programName" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
            <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-500 text-white rounded-lg ml-2">Batal</button>
        </form>
    </div>
</div>
<script>
    function showModal(actionUrl, programName) {
    document.getElementById('editForm').action = actionUrl;
    document.getElementById('programName').value = programName;
    document.getElementById('editModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('editModal').classList.add('hidden');
}
</script>

