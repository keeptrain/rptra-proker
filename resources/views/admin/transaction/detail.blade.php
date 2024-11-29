<x-app-layout>
    @section('main-content')
        <div
            class="bg-white dark:bg-zinc-900 text-black dark:text-neutral-100 rounded-md border-2 border-slate-100 dark:border-zinc-900 overflow-auto">

            <div class="border-b dark:border-zinc-700 pl-6 pr-6 pt-4 pb-4 ">
                <div class="flex justify-between items-center ">

                    <x-admin.input-label>
                        DETAIL PROGRAM KERJA ID
                    </x-admin.input-label>


                    <x-button onclick="window.history.back();" color="zinc" class="p-1 bg-zinc-600 dark:hover:bg-zinc-700 flex items-center">
                        <!-- Ikon Kembali -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12H3m0 0l6-6m-6 6l6 6" />
                        </svg>
                        Kembali
                    </x-button>
                </div>


            </div>

            <div class=" space-y-4">
                <!-- Main Content Section -->
                <div class="grid grid-cols-4 gap-6">
                    <!-- Content Section -->
                    <div class="col-span-3">
                        <div class="grid grid-cols-[auto,1fr] gap-y-3 gap-x-4 text-gray-600 dark:text-gray-200 p-6">

                            <div class="font-semibold text-gray-400 dark:text-gray-500">
                                {{ __('PROGRAM PRIORITAS') }}
                            </div>
                            <div>{{ $selectedProgram->priorityPrograms->name ?? 'kosong' }}</div>

                            <div class="font-semibold text-gray-400 dark:text-gray-500">
                                {{ __('PROGRAM POKOK') }}
                            </div>
                            <div>{{ $selectedProgram->principalPrograms->name ?? 'kosong' }}</div>

                            <div class="font-semibold text-gray-400 dark:text-gray-500">
                                {{ __('KEGIATAN') }}
                            </div>
                            <div>{!! $selectedProgram->activity !!}</div>
            
                            <div class="font-semibold text-gray-400 dark:text-gray-500">
                                {{ __('TUJUAN') }}
                            </div>
                            <div>{{ $selectedProgram->objective ?? 'kosong' }}</div>
            
                            <div class="font-semibold text-gray-400 dark:text-gray-500">
                                {{ __('OUTPUT') }}
                            </div>
                            <div>{{ $selectedProgram->output ?? 'kosong' }}</div>
            
                            <div class="font-semibold text-gray-400 dark:text-gray-500">
                                {{ __('TARGET') }}
                            </div>
                            <div>{{ $selectedProgram->target ?? 'kosong' }}</div>
            
                            
            
                            <div class="font-semibold text-gray-400 dark:text-gray-500">
                                {{ __('LOKASI') }}
                            </div>
                            <div>{{ $selectedProgram->location ?? 'kosong' }}</div>

                            <div class="font-semibold text-gray-400 dark:text-gray-500">
                                {{ __('MITRA') }}
                            </div>
                            <div>
                                @forelse ($selectedProgram->institutionalPartners as $partner)
                                    <span class="block text-gray-600">{{ $partner->name }}</span>
                                @empty
                                    <span class="text-gray-500">kosong</span>
                                @endforelse
                            </div>
                        </div>
                    </div>
            
                    <!-- Sidebar Section -->
                    <div class="col-span-1 border-l border-slate-100 dark:border-zinc-700 pl-6">

                        <div class="font-semibold text-gray-400 dark:text-gray-500 mt-6">
                            {{ __('JADWAL KEGIATAN:') }}
                            <span class="font-mono text-gray-600 dark:text-gray-200 block">
                                {{ $selectedProgram->schedule_activity }}
                                
                            </span>
                            <x-admin.information-tag :information="$selectedProgram->information" />
                            
                        </div>

                        <div class="font-semibold text-gray-400 dark:text-gray-500 mt-8">
                            {{ __('VOLUME') }}
                            <span class="font-mono text-gray-600 dark:text-gray-200 block">{{ $selectedProgram->volume }}</span>
                        </div>

                        <div class="font-semibold text-gray-400 dark:text-gray-500 mt-8">
                            {{ __('PROGRAM DIBUAT:') }}
                            <span class="font-mono text-gray-600 dark:text-gray-200 block">{{ $selectedProgram->created_at }}</span>
                        </div>
            
                        <div class="font-semibold text-gray-400 dark:text-gray-500 mt-8">
                            {{ __('TERAKHIR DIPERBARUI:') }}
                            <span class="font-mono text-gray-600 dark:text-gray-200 block">{{ $selectedProgram->updated_at }}</span>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
            
        @endsection

</x-app-layout>
