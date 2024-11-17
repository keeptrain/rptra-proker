<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Jadwal Kegiatan</th>
            <th>Kegiatan</th>
            <th>Lokasi/th>
            <th>Informasi</th>
    
        </tr>
    </thead>

    @foreach ($transactions as $item)
    <tbody>
        <tr>
            <td>{{ $item->schedule_activity }}</td>
            <td>{{ $item->activity }}</td>
            <td>{{ $item->location }}</td>
            <td>{{ $item->information }}</td>
           
        </tr>
        
    </tbody>
    @endforeach
</table>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
    new DataTable('#example');
</script>