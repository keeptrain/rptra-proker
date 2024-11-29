
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

                <button onclick="window.location.href='{{ route('prog-transaksi.show.detail', $item->id) }}'" class="px-1 py-1 inline-flex items-center rounded-lg bg-pink-200 dark:bg-pink-300 text-pink-700 dark:text-pink-700" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                      </svg>
                      <span class="ml-1">Detail</span>
                </button>
                

                <button onclick="window.location.href='{{ route('prog-transaksi.edit', $item->id) }}'" class="px-1 py-1 inline-flex items-center rounded-lg bg-blue-200 dark:bg-blue-300 text-blue-700 dark:text-blue-700" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                      </svg>
                      <span class="ml-1">Edit</span>
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

