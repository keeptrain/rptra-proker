@props(['routeName', 'datatablesId', 'nameInputId'])
<form id="delete-form" action="{{ route($routeName) }}" method="POST" class="w-full bg-white dark:bg-zinc-900 dark:text-white">

    @csrf
    @method('DELETE')

    <script>
        const topStartTemplate = `<x-datatables-toolbar />`;
    </script>
 
    <table id="{{ $datatablesId }}" class="display cell-border min-w-full" style="width:100%">
        <thead class="text-sm font-semibold text-black dark:text-white dark:bg-zinc-900">
            {{ $thead }}
        </thead>
        <tbody class="text-sm font-normal bg-white dark:bg-zinc-800 dark:text-gray-300">
            {{ $tbody }}
        </tbody>

    </table>
</form>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

<script>
    // Toggle delete button
    function toggleDeleteButton() {
        const anyChecked = $('.row-checkbox:checked').length > 0;
        const deleteButton = $('#delete-selected-button');
        
        if (anyChecked) {
            deleteButton.removeClass('disabled bg-zinc-100').addClass('bg-white hover:bg-gray-300').prop('disabled', false);
            //exportButton.removeClass('disabled bg-zinc-100').addClass('bg-white').prop('disabled', false);
        } else {
            deleteButton.addClass('disabled bg-zinc-100').removeClass('bg-white').prop('disabled', true);
            //exportButton.addClass('disabled bg-zinc-100').removeClass('bg-white').prop('disabled', true);
         }
    }
 
    function confirmDelete() {
        Swal.fire({
            title: "Apakah kamu yakin?",
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus ini!",
        }).then((result) => {
            if (result.isConfirmed) {
                // Lakukan penghapusan data
                document.getElementById('delete-form').submit();
            }
        });
    }

    function exportData() {
        Swal.fire({
            title: 'Konfirmasi Ekspor',
            text: 'Apakah Anda yakin ingin mengekspor data?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Ekspor',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke rute ekspor
                window.location.href = '{{ route('prog-transaksi.export') }}';
            }
        });
    }

    
/*function deleteData() {
        // Kirim permintaan DELETE menggunakan fetch atau Axios
        const selectedIds = Array.from(document.querySelectorAll('.row-checkbox:checked'))
            .map((checkbox) => checkbox.value);

        if (selectedIds.length === 0) {
            Swal.fire('Gagal', 'Tidak ada data yang dipilih.', 'error');
            return;
        }

        fetch('{{ route($routeName) }}', {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ '{{ $nameInputId }}': selectedIds })
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    Swal.fire('Berhasil', data.message , 'success').then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire('Gagal', data.message, 'error');
                }
            })
            .catch((error) => {
                Swal.fire('Gagal', `{!! implode('<br>', $errors->all()) !!}` , 'error');
            });
    }*/



</script>
