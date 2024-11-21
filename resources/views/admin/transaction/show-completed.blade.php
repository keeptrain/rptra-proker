<x-datatables :routeName="'prog-transaksi.destroy'" :datatablesId="'datatables-transaction'" :nameInputId="'transaction_ids[]'" >
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
            <th>Jadwal Kegiatan</th>
            <th>Informasi</th>
            <th>Detail</th>
            <th>Lokasi</th>
            <th>Aksi</th>
        </tr>
    </x-slot>

    <!-- Slot untuk tbody -->
    <x-slot name="tbody">
        @foreach ($transactions as $item)
        <tr>
            <td>
                <input type="checkbox" name="transaction_ids[]" class="row-checkbox" value="{{ $item->id }}">
            </td>
            <td>{{ $item->schedule_activity }}</td>
            <td>{{ $item->information}}</td>
            <td >
                <button x-on:click="openModal = !openModal" type="button"
                        class="px-8 py-3 bg-white text-black font-medium text-sm rounded-lg focus:ring-4 focus:ring-blue-300 dark:bg-white dark:hover:bg-gray-200 dark:focus:ring-blue-800">
                        Save to draft
                    </button>
            </td>
            
            <td>{{ $item->location}}</td>
            <td >
                <a href="{{ route('prog-transaksi.edit', $item->id) }}" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
            </td>
        </tr>     
        @endforeach
       
     
        
    </x-slot>

    
<x-admin.modal :saveIdButton="'test'">
    <x-slot name="nameButton">test</x-slot>
</x-admin.modal>
    
</x-datatables>



<script>
    
    $(document).ready(function() {
        $('#datatables-transaction').DataTable({
           
           responsive: true, 
        });
    });
    
    // Event listener untuk checkbox
    $('#datatables-transaction tbody').on('change', '.row-checkbox', function() {
        toggleDeleteButton();
    });

    
</script>

