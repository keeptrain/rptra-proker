@empty($selectedProgram)
<div class="relative overflow-x-auto sm:rounded-lg">
    <div
        class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white">
        <div>
            <!--button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                <span class="sr-only">Action button</span>
                Action
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <-- Dropdown menu >
            <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-red-500">Delete</a>
                    </li>
                </ul>
            </div-->
            {{ $slotbutton }}
        </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="text" id="table-search-users"
                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-100 dark:border-gray-200 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Mencari program...">
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-gray-200 dark:text-black">
            {{ $thead }}
        </thead>
        <tbody>
            {{ $tbody }}
        </tbody>
    </table>

    <!-- Menampilkan pagination -->
    <div class="mt-4">
        {{ $programs->links() }}
    </div>
    
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Seleksi checkbox dengan name "priority_ids[]"
        const checkboxes = document.querySelectorAll('input[name="priority_ids[]"], input[name="main_ids[]"], input[name="partner_ids[]"]');
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

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', toggleDeleteButton);
        });

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

      
        
    });

    function showModal(actionUrl, programName) {
    document.getElementById('editForm').action = actionUrl;
    document.getElementById('programName').value = programName;
    document.getElementById('editModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('editModal').classList.add('hidden');
}

    
</script>
@endempty
