<x-datatables :routeName="'prog-transaksi.destroy'" :datatablesId="'datatables'" :nameInputId="'transaction_ids[]'" >
    @csrf
    @method('DELETE')

    <x-slot name="slotbutton">
        <button id="delete-selected-button" type="button"
        class="ml-2 px-3 py-2 bg-red-600 text-white font-medium text-sm rounded-lg focus:ring-1 focus:ring-red dark:bg-red-500 dark:hover:bg-red-700 dark:focus:ring-red-800 hidden">
        Hapus
    </button>

    </x-slot>

    <!-- Slot untuk thead -->
    <x-slot name="thead">
        <tr>
            <th >
                <!--input type="checkbox" id="checkbox-all" class="cursor-pointer"-->
            </th>
            <th >Kegiatan</th>
            <th >Lihat</th>
            <th >Tanggal dibuat</th>
            <th >Aksi</th>
        </tr>
    </x-slot>

    <!-- Slot untuk tbody -->
    <x-slot name="tbody">
        @foreach ($transactions as $item)
        <tr>
            <td>
                <input type="checkbox" name="transaction_ids[]" class="row-checkbox" value="{{ $item->id }}">
            </td>
            <td>{{ $item->status}}</td>
            <td>{{ $item->status}}</td>
            <td>{{ $item->status}}</td>
            <td >
                <a href="{{ route('prog-transaksi.edit', $item->id) }}" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
            </td>
        </tr>     
        @endforeach
       
     
    </x-slot>
</x-datatables>

