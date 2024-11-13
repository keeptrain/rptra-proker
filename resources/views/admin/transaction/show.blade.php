<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Jadwal Kegiatan</th>
            <th>Kegiatan</th>
            <th>Lokasi/th>
            <th>Informasi</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
    </thead>

    @foreach ($transactions as $item)
    <tbody>
        <tr>
            <td>{{ $item->schedule_activity }}</td>
            <td>{{ $item->location }}</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011-04-25</td>
            <td>$320,800</td>
        </tr>
        
    </tbody>
    @endforeach
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
    </tfoot>
</table>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
    new DataTable('#example');
</script>