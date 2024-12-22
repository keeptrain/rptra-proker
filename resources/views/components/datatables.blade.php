@props(['routeName', 'datatablesId', 'nameInputId'])
<form id="delete-form" action="{{ route($routeName) }}" method="POST"
    class="w-full bg-white dark:bg-zinc-900 dark:text-white">

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
            deleteButton.removeClass('disabled bg-zinc-100').addClass('bg-white hover:bg-gray-300').prop('disabled',
                false);
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
            confirmButtonText: "Ya, hapus",
        }).then((result) => {
            if (result.isConfirmed) {
                // Lakukan penghapusan data
                document.getElementById('delete-form').submit();
            }
        });
    }

    function exportAllData() {
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

    function exportCustomData() {
        Swal.fire({
            title: 'Pilih Rentang Tanggal',
            html: '<div>' +
                '<label for="startDate">Mulai</label>' +
                '<input type="date" id="startDate" class="swal2-input">' +
                '</div>' +
                '<div>' +
                '<label for="endDate">Sampai</label>' +
                '<input type="date" id="endDate" class="swal2-input">' +
                '</div>',
            showCancelButton: true,
            confirmButtonText: 'Export',
            cancelButtonText: 'Batal',
            preConfirm: () => {
                const startDate = document.getElementById('startDate').value;
                const endDate = document.getElementById('endDate').value;

                if (!startDate || !endDate) {
                    Swal.showValidationMessage('Kedua tanggal harus diisi!');
                }

                return {
                    startDate,
                    endDate
                };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const {
                    startDate,
                    endDate
                } = result.value;

                // Lakukan sesuatu dengan rentang tanggal
                console.log('Tanggal mulai:', startDate);
                console.log('Tanggal sampai:', endDate);

                // Contoh pengiriman data
                fetch('{{ route('prog-transaksi.export') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            startDate,
                            endDate
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        Swal.fire('Berhasil!', 'Data berhasil di-export.', 'success');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire('Error!', 'Terjadi kesalahan saat meng-export data.', 'error');
                    });
            }
        });
    }
</script>
