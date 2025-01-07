<x-app-layout>
    @section('main-content')
        <div class="bg-transparent">
            <div class="mb-3 border-gray-200 dark:border-gray-700 ml-3">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab">
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->is('settings/profile*') ? ' border-purple-800' : '' }}""
                            id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab"
                            aria-controls="profile" aria-selected="false">Profil</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button onclick="window.location.href = '{{ route('profile.password') }}'"
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false">Password</button>
                    </li>
                    {{-- <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab"
                            aria-controls="settings" aria-selected="false">Settings</button>
                    </li>
                    <li role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="contacts-styled-tab" data-tabs-target="#styled-contacts" type="button" role="tab"
                            aria-controls="contacts" aria-selected="false">Contacts</button>
                    </li> --}}
                </ul>
            </div>
        </div>
        <div>
            <div class="bg-white dark:bg-zinc-900 rounded-lg shadow-sm ">
                <div class="flex flex-col p-6">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <!-- Label -->
                        <label class="block text-sm font-bold text-gray-700 mb-4">
                            Foto Profil
                        </label>

                        <div class="flex  space-x-4">
                            <!-- Profile Picture -->
                            <div class="w-24 h-24 rounded-md overflow-hidden bg-transparent">
                                <img id="display-profile" src="{{ asset(Auth::user()->image) }}" name="display-profile"
                                    alt="Profile Picture" class="w-full h-full object-cover">
                            </div>

                            <!-- Upload Button -->
                            <div class="flex flex-col">
                                <label
                                    class="bg-zinc-500 text-white px-2 py-1 w-max shadow-md rounded-md hover:bg-blue-600 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 text-center">
                                    Pilih Foto
                                    <input id="file-input" type="file" name="image" class="hidden" accept="image/*" />

                                    <!-- Hidden Inputs untuk Crop -->
                                    <input type="hidden" id="crop-x" name="crop_x">
                                    <input type="hidden" id="crop-y" name="crop_y">
                                    <input type="hidden" id="crop-width" name="crop_width">
                                    <input type="hidden" id="crop-height" name="crop_height">
                                </label>
                                <span class="text-xs text-gray-500 mt-2 max-w-xs">
                                    Ukuran gambar profil tidak lebih dari 2MB.
                                </span>
                            </div>
                            {{-- <button type="button" @click="showModal = true"> test </button> --}}
                        </div>

                        <!-- Profile Info -->
                        <div class="mt-6">
                            <div class="block items-center justify-start mb-4">
                                <span class="text-gray-600 font-medium">Nama Lengkap:</span>
                                <x-admin.text-input name="name" class=" w-full p-2.5 "
                                    value="{{ Auth::user()->name }}"></x-admin.text-input>
                            </div>
                            <div class="block items-center justify-between mb-4">
                                <span class="text-gray-600 font-medium">Username:</span>
                                <x-admin.text-input name="email" class=" w-full p-2.5 "
                                    value="{{ Auth::user()->email }}"></x-admin.text-input>
                            </div>
                            <x-button class="bg-zinc-700 p-2.5">Simpan Perubahan</x-button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- Modal -->
            <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <div class="bg-white rounded-lg shadow-lg p-4 w-96">
                    <h2 class="text-lg font-bold mb-4">Crop Gambar</h2>
                    <div class="w-full h-64 overflow-hidden">
                        <img id="crop-image" class="object-contain">
                    </div>
                    <div class="mt-4 flex justify-end space-x-2">
                        <button id="cancel-crop" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                        <button id="apply-crop"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>

<script>
    // Elemen-elemen
    const fileInput = document.getElementById('file-input');
    const displayProfile = document.getElementById('display-profile');
    const modal = document.getElementById('modal');
    const cropImage = document.getElementById('crop-image');
    const cancelCrop = document.getElementById('cancel-crop');
    const applyCrop = document.getElementById('apply-crop');
    let cropper = null;

    // Ketika file dipilih
    fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                cropImage.src = e.target.result;

                // Tampilkan modal
                modal.classList.remove('hidden');

                // Inisialisasi Cropper.js
                setTimeout(() => {
                    cropper = new Cropper(cropImage, {
                        aspectRatio: 1, // 1:1 aspect ratio
                        viewMode: 1,
                    });
                }, 100);
            };
            reader.readAsDataURL(file);
        }
    });

    // Tombol Batal
    cancelCrop.addEventListener('click', function() {
        // Sembunyikan modal
        modal.classList.add('hidden');

        // Hancurkan Cropper jika ada
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    });

    // Tombol Simpan
    applyCrop.addEventListener('click', function() {
        if (cropper) {
            // Ambil gambar hasil crop
            const canvas = cropper.getCroppedCanvas();
            const croppedImageDataURL = canvas.toDataURL('image/jpeg');

            // Tampilkan gambar yang telah di-crop
            displayProfile.src = croppedImageDataURL;

            // Set data crop ke input hidden
            document.getElementById('crop-x').value = cropper.getData().x;
            document.getElementById('crop-y').value = cropper.getData().y;
            document.getElementById('crop-width').value = cropper.getData().width;
            document.getElementById('crop-height').value = cropper.getData().height;

            // Sembunyikan modal
            modal.classList.add('hidden');

            // Hancurkan Cropper
            cropper.destroy();
            cropper = null;
        }
    });
</script>
