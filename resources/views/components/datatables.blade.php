@props(['routeName', 'datatablesId', 'nameInputId'])
<form action="{{ route($routeName) }}" class="w-full bg-white dark:bg-zinc-900 dark:text-white ">
 
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

<!-- DataTables JS Semantic -->
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.semanticui.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.semanticui.js"></script-->
<script>

    // Toggle delete button
    function toggleDeleteButton() {
        const anyChecked = $('.row-checkbox:checked').length > 0;
        $('#delete-selected-button').toggleClass('hidden', !anyChecked);
    }

    // Fungsi untuk menampilkan konfirmasi SweetAlert
    function confirmDelete() {
        return Swal.fire({
            title: "Apakah kamu yakin?",
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        });
    }

    // Event listener untuk tombol hapus terpilih
    $('#delete-selected-button').on('click', function() {
        const selectedIds = $('.row-checkbox:checked').map(function() {
            return $(this).val();
        }).get();

        if (selectedIds.length > 0) {
            confirmDelete().then((result) => {
                if (result.isConfirmed) {
                    // Set nilai input hidden di dalam form
                    const form = $('<form>', {
                        method: 'POST',
                        action: "{{ route($routeName) }}" // Ganti dengan rute yang sesuai
                    });

                    // Tambahkan CSRF token
                    form.append($('<input>', {
                        type: 'hidden',
                        name: '_token',
                        value: '{{ csrf_token() }}'
                    }));

                    // Tambahkan method DELETE
                    form.append($('<input>', {
                        type: 'hidden',
                        name: '_method',
                        value: 'DELETE'
                    }));

                    // Tambahkan ID yang dipilih ke dalam form
                    selectedIds.forEach(function(id) {
                        form.append($('<input>', {
                            type: 'hidden',
                            name: '{{ $nameInputId }}',
                            value: id
                        }));
                    });

                    // Tambahkan form ke body dan submit
                    $('body').append(form);
                    form.submit();
                }
            });
        } else {
            alert('Silakan pilih item untuk dihapus.');
        }
    });

    /* Event listener untuk tombol hapus di setiap baris
    $('#datatables').on('click', '.delete-button', function() {
        const id = $(this).data('id');
        confirmDelete().then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/api/transactions/' + id,
                    type: 'DELETE',
                    success: function(response) {
                        // Hapus baris yang dipilih dari tabel
                        $(this).closest('tr').remove();
                        Swal.fire('Deleted!', 'Item has been deleted.',
                            'success');
                    }.bind(this),
                    error: function(xhr) {
                        alert('Terjadi kesalahan saat menghapus data.');
                    }
                });
            }
        });
    });*/

</script>
