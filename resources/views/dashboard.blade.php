<x-app-layout>
    <x-slot name="main">
       
            <!-- Nama Program -->
            <div class="flex items-center mb-4">
                <label for="nama-program" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Nama Program</label>
                <input type="text" id="nama-program" name="name"
                    class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block text-sm p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukkan nama program" value="{{ old('name') }}" required>
    
            </div>
    
            <!-- Prefix ID -->
            <div class="flex items-center mb-4">
                <label for="prefix-id" class="w-1/4 text-sm font-medium text-gray-900 mr-2">Prefix ID</label>
                <div class="flex flex-1 gap-2">
                    <input type="text" id="prefix-id" name="prefix"
                        class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block text-sm p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukkan prefix ID, misal: PPRIO" value="{{ old('prefix') }}" required>
                    <input type="text" id="number" name="number"
                        class="w-1/4 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block text-sm p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Nomor" oninput="numberOnly(this.id);" maxlength="3" value="{{ old('number') }}"
                        required>
                </div>
            </div>
    
            <!-- Program ID -->
            <div class="flex items-center ">
                <label for="nama-id" class="w-1/4 text-sm font-medium text-gray-900 mr-2 mb-4">Program ID</label>
                <div class="flex-1">
                    <input type="text" id="nama-id" name="id"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block text-sm p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Program ID akan terbentuk ..." value="{{ old('id') }}" readonly>
                    <span
                        class="text-gray-600 text-xs mt-1 block">{{ __('* Tidak bisa di edit, hanya sebagai contoh') }}</span>
                </div>
    
            </div>
        
    </x-slot>
</x-app-layout>    