
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
          
            
            <td>{{ $item->location}}</td>
            <td >

                <x-button x-on:click="openModal = !openModal" class="px-1 py-1 bg-pink-200 text-pink-600" type="button">Detail</x-button>
             
                <button onclick="window.location.href='{{ route('prog-transaksi.edit', $item->id) }}'" type="button"
                class="px-1 py-1 bg-blue-200 text-blue-600 font-light text-sm rounded-lg focus:ring-1 focus:ring-blue-300 dark:bg-white dark:hover:bg-gray-200 dark:focus:ring-blue-800">
                    Edit
                </button>
                    
            </td>
        </tr>     
        @endforeach
 
       
    </x-slot>

    

    
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

