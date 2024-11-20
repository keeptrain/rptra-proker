<x-datatables :routeName="'prog-prioritas.destroy'" :datatablesId="'datatables-priority'" :nameInputId="'priority_ids[]'">
      
        
    <!-- Slot untuk thead -->
    <x-slot name="thead">
        <tr>
            <th >
                <!--input type="checkbox" id="checkbox-all" class="cursor-pointer"-->
            </th>
            <th >Nama Program</th>
            <th >ID Program</th>
            <th >Tanggal dibuat</th>
            <th >Aksi</th>
        </tr>
    </x-slot>

    <!-- Slot untuk tbody -->
    <x-slot name="tbody">
        @foreach ($programs as $item)
        <tr>
            <td>
                <input type="checkbox" class="row-checkbox" value="{{ $item->id }}">
            </td>
            <td>{{ $item->name}}</td>
        
            <td>{{ $item->id}}</td>
            <td>{{ $item->created_at}}</td>
            <td >
                <a href="{{ route('prog-pokok.edit', $item->id) }}" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
            </td>
        </tr>     
        @endforeach
       
     
    </x-slot>
</x-datatables>

<script>
    
$(document).ready(function() {
        $('#datatables-priority').DataTable({
           
           responsive: true, 
        });
    });
    
    // Event listener untuk checkbox
    $('#datatables-priority tbody').on('change', '.row-checkbox', function() {
        toggleDeleteButton();
    });
</script>