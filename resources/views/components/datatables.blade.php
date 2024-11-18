@props([
    'routeName',
    'datatablesId',
    'nameInputId'
])
<form action="{{ route($routeName) }}">
    <div class="relative overflow-x-auto sm:rounded-lg">
        <div
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white">
            <div>
                {{ $slotbutton }}
            </div>
        </div>
    </div>
    <table id="{{ $datatablesId }}" class="ui celled table" style="width:100%">
        <thead>
            {{ $thead }}
        </thead>
        <tbody>
            {{ $tbody }}
        </tbody>
        
    </table>
</form>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!-- DataTables JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.semanticui.js"></script>
<script>
    $(document).ready(function() {
        $('#{{ $datatablesId }}').DataTable();
        
    
        // Toggle delete button
        function toggleDeleteButton() {
            const anyChecked = $('.row-checkbox:checked').length > 0;
            $('#delete-selected-button').toggleClass('hidden', !anyChecked);
        }
    
        // Event listener untuk checkbox
        $('#{{ $datatablesId }} tbody').on('change', '.row-checkbox', function() {
            toggleDeleteButton();
        });
    
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
    
        // Event listener untuk tombol hapus di setiap baris
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
                            Swal.fire('Deleted!', 'Item has been deleted.', 'success');
                        }.bind(this),
                        error: function(xhr) {
                            alert('Terjadi kesalahan saat menghapus data.');
                        }
                    });
                }
            });
        });
    });
    </script>

