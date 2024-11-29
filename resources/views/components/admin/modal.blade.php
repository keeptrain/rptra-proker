@props(['saveIdButton'])

<!-- Modal -->
<div x-show="openModal" id="openModal"
x-on:click.away="openModal=false"
        x-transition:enter="transition transform ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-[-20%] scale-90"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition transform ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-[-20%] scale-90">
    <div id="draftModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 ">
        <div class="bg-white rounded-lg shadow-lg w-1/4 mx-auto"
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <div class="p-4 border-b">
                <h5 class="text-lg font-semibold" id="draftModalLabel">Simpan sebagai Draft</h5>
                <button x-on:click="openModals = false" type="button" class="absolute top-0 right-0 p-2" >
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="p-4">
                @yield('content-modal')


            </div>
            <div class="p-4 border-t flex justify-end">
                <button x-on:click="openModal = false" type="button" class="mr-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-md">Batal</button>
                <button x-on:click="submitForm()" id="{{ $saveIdButton }}" type="button"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md">{{ $nameButton }}</button>
            </div>
        </div>
    </div>
</div>

<script>
    function submitForm() {
        const form = document.getElementById('create-form');
        const formData = new FormData(form);
       

        fetch('{{ route("prog-transaksi.draft") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'accept': 'application/json' // Pastikan untuk menyertakan token CSRF
            }
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                form.reset();
                showAlert('success', 'success', data.message);
            } else {
                showAlert('error', 'error', data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menyimpan data.');
        });
    }
</script>

