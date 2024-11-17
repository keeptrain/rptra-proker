@props(['saveIdButton'])

<!-- Modal -->
<div id="draftModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-1/4 mx-auto"
        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="p-4 border-b">
            <h5 class="text-lg font-semibold" id="draftModalLabel">Simpan sebagai Draft</h5>
            <button type="button" class="absolute top-0 right-0 p-2" onclick="closeModal()">
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
            <button type="button" class="mr-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-md"
                onclick="closeModal()">Batal</button>
            <button id="{{ $saveIdButton }}" type="button"
                class="px-4 py-2 bg-blue-600 text-white rounded-md">{{ $nameButton }}</button>
        </div>
    </div>
</div>
