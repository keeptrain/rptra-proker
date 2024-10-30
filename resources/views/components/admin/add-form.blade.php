<form action="{{ route('proker.store') }}" method="POST" class="max-w-sm">
    @csrf
    <!-- Label Prefix ID -->
    <label for="prefix-id" class="block mb-2 text-sm font-medium text-gray-900">Prefix ID</label>
    <input type="text" id="prefix-id" name="prefix" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5 mb-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan prefix ID, misal: PPRIO" required>
  
    <!-- Label Nama ID -->
    <label for="nama-id" class="block mb-2 text-sm font-medium text-gray-900">Unik ID</label>
    <div class="flex">
        <!-- Input Nama ID (Readonly untuk menampilkan hasil prefix + number) -->
        <input type="text" id="nama-id" name="id" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        placeholder="Unik ID akan terbentuk" readonly>
  
        <!-- Input Number -->
        <input type="text" id="number" name="number" class="ml-2 rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-20 text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        placeholder="Nomor" oninput="numberOnly(this.id);" maxlength="3" required/>
    </div>
  
    <!-- Label Nama Program -->
    <label for="nama-program" class="block mt-4 mb-2 text-sm font-medium text-gray-900">Nama Program</label>
    <input type="text" id="nama-program" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan nama program" required>
  
    <!-- Submit Button -->
    <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white font-medium text-sm rounded-lg focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
      Tambah
    </button>
  </form>
  
  <script>
      // Script to auto-fill the Unik ID field based on prefix and number input
      document.getElementById('prefix-id').addEventListener('input', updateUnikId);
      document.getElementById('number').addEventListener('input', updateUnikId);
  
      function updateUnikId() {
          const prefix = document.getElementById('prefix-id').value;
          const number = document.getElementById('number').value.padStart(3, '0'); // format number to 3 digits
          document.getElementById('nama-id').value = `${prefix}-${number}`;
      }

      function numberOnly(id) {
    // Get element by id which passed as parameter within HTML element event
        var element = document.getElementById(id);
    // This removes any other character but numbers as entered by user
        element.value = element.value.replace(/[^0-9]/gi, "");
        }
  </script>
  