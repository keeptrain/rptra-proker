<div class="p-4">

    <form action="{{ route('prog-transaksi.destroy') }}" method="POST">
        @csrf
        @method('DELETE')
        <x-admin.table :programs="$draft">
            <x-slot name="slotbutton">
                <button id="delete-button" type="submit"
                    class="ml-2 px-3 py-2 bg-red-600 text-white font-medium text-sm rounded-lg focus:ring-1 focus:ring-red dark:bg-red-500 dark:hover:bg-red-700 dark:focus:ring-red-800 hidden">
                    Hapus
                </button>

            </x-slot>

            <!-- Slot untuk thead -->
            <x-slot name="thead">
                <tr>
                    <th scope="col" class="p-4">
                        <!--div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div-->
                    </th>
                    <th scope="col" class="px-6 py-3">Nama draft</th>
                    <th scope="col" class="px-6 py-3">Lihat</th>
                    <th scope="col" class="px-6 py-3">Tanggal dibuat</th>

                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </x-slot>

            <!-- Slot untuk tbody -->
            <x-slot name="tbody">
                @foreach ($draft as $item)
                    <tr
                        class="bg-white border-b dark:bg-white dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-50">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all"type="checkbox" name="main_ids[]" value="{{ $item->id }}"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-{{ $item->id }}" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-black">

                        </td>

                        <td class="px-6 py-4">
                            <a href="{{ route('prog-transaksi.edit', $item->id) }}"
                                class="text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                        </td>

                        <td class="px-6 py-4 font-medium">

                        </td>



                        <td class="px-6 py-4">
                            <a href="{{ route('prog-transaksi.edit', $item->id) }}"
                                class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </x-slot>

        </x-admin.table>
    </form>

    <!-- Menampilkan pagination -->
    <div class="mt-4">
        {{ $draft->links() }}
    </div>

</div>
