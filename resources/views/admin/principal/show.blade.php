<x-datatables :routeName="'prog-pokok.destroy'" :datatablesId="'datatables-principal'" :nameInputId="'principal_ids[]'">
    @csrf
    @method('DELETE')


    <!-- Slot untuk thead -->
    <x-slot name="thead">
        <tr>
            <th>
                <!--input type="checkbox" id="checkbox-all" class="cursor-pointer"-->
            </th>
            <th>Nama Program</th>
            <th>Program Prioritas</th>
            <th>ID Program</th>
            <th>Tanggal dibuat</th>
            <th>Aksi</th>
        </tr>
    </x-slot>

    <!-- Slot untuk tbody -->
    <x-slot name="tbody">
        @foreach ($principalPrograms as $item)
            <tr>
                <td>
                    <input type="checkbox" class="row-checkbox" value="{{ $item->id }}">
                </td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->priorityProgram->name }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <button onclick="window.location.href='{{ route('prog-pokok.edit', $item->id) }}'"
                        class="p-2 inline-flex items-center rounded-md bg-zinc-200 dark:bg-zinc-900 text-zinc-700 dark:text-zinc-400"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil" viewBox="0 0 16 16">
                            <path
                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
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
        $('#datatables-principal').DataTable({

            responsive: true,
        });
    });

    // Event listener untuk checkbox
    $('#datatables-principal tbody').on('change', '.row-checkbox', function() {
        toggleDeleteButton();
    });
</script>
