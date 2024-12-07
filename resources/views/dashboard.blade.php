<x-app-layout>
    @section('main-content')
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Program Kerja -->
            <div
                class="p-4 flex flex-col items-center space-y-2 bg-white dark:bg-zinc-900 rounded-md border-2 border-slate-100 dark:border-zinc-900">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="w-6 h-6 fill-current" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5m14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5" />
                </svg>
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">{{ $totalTransaction }}</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Program Kerja</p>
            </div>

            <!-- Prioritas -->
            <div
                class="p-4 flex flex-col items-center space-y-2 bg-white dark:bg-zinc-900 rounded-md border-2 border-slate-100 dark:border-zinc-900">
                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                    viewBox="0 0 24 24">
                    <path
                        d="M9,10h1a1,1,0,0,0,0-2H9a1,1,0,0,0,0,2Zm0,2a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM20,8.94a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19.32.32,0,0,0-.09,0A.88.88,0,0,0,13.05,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V9S20,9,20,8.94ZM14,5.41,16.59,8H15a1,1,0,0,1-1-1ZM18,19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V5A1,1,0,0,1,7,4h5V7a3,3,0,0,0,3,3h3Zm-3-3H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z" />
                </svg>
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">{{ $totalPriority }}</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Program Prioritas</p>
            </div>

            <!-- Pokok -->
            <div
                class="p-4 flex flex-col items-center space-y-2 bg-white dark:bg-zinc-900 rounded-md border-2 border-slate-100 dark:border-zinc-900">
                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                    viewBox="0 0 24 24">
                    <path
                        d="M9,10h1a1,1,0,0,0,0-2H9a1,1,0,0,0,0,2Zm0,2a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM20,8.94a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19.32.32,0,0,0-.09,0A.88.88,0,0,0,13.05,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V9S20,9,20,8.94ZM14,5.41,16.59,8H15a1,1,0,0,1-1-1ZM18,19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V5A1,1,0,0,1,7,4h5V7a3,3,0,0,0,3,3h3Zm-3-3H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z" />
                </svg>
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">{{ $totalPrincipals }}</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Program Pokok</p>
            </div>

            <!-- Mitra -->
            <div
                class="p-4 flex flex-col items-center space-y-2 bg-white dark:bg-zinc-900 rounded-md border-2 border-slate-100 dark:border-zinc-900">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="w-6 h-6 fill-current" viewBox="0 0 16 16">
                    <path
                        d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022M6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z" />
                </svg>
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">{{ $totalPartners }}</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Mitra</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 h-auto md:h-[60vh] mt-6">
            <!-- Canvas Memakan 3 Kolom -->
            <div
                class="col-span-1 md:col-span-3 bg-white dark:bg-zinc-900 text-black dark:text-neutral-100 rounded-md border-2 border-slate-100 dark:border-zinc-900 p-6 flex flex-col">
                <div>
                    <span>Program kerja tahun</span>
                    <select id="year-select"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($transactionYears as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <canvas id="transactionChart" class="flex-1 mt-4"></canvas>
            </div>

            <!-- Bagian Jadwal Terdekat dan Kegiatan yang Terlewat -->
            <div class="col-span-1 flex flex-col ">
                <!-- Jadwal Terdekat Minggu Ini -->
                <div x-data="scheduleData()"
                    class="bg-white dark:bg-zinc-900 text-black dark:text-neutral-100 rounded-md border-2 border-slate-100 dark:border-zinc-800 flex-1">
                    <!-- Header Fixed -->
                    <div
                        class="flex justify-between border-b pr-6 pl-6 pt-3 pb-3 sticky top-0 bg-white dark:bg-zinc-900 z-10">
                        <h3 class="font-semibold">Jadwal Terdekat</h3>
                        <select x-model="selectedFilter" @change="fetchSchedules"
                            class="bg-transparent text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="week">Minggu ini</option>
                            <option value="month">Bulan ini</option>
                        </select>
                    </div>

                    <!-- Scrollable List -->
                    <ul class="space-y-3 pr-6 pl-6 pt-3 pb-3 max-h-64 overflow-y-auto">
                        <template x-if="schedules.length > 0">
                            <template x-for="schedule in schedules" :key="schedule.id">
                                <li class="flex justify-between items-center border-b pb-2">
                                    <span class="text-gray-700 dark:text-gray-300" x-text="schedule.location"></span>
                                    <span class="text-sm text-gray-500 dark:text-gray-400"
                                        x-text="formatDate(schedule.schedule_activity)"></span>
                                </li>
                            </template>
                        </template>

                        <template x-if="schedules.length === 0">
                            <li class="text-gray-500 dark:text-gray-400">Tidak ada jadwal terdekat.</li>
                        </template>
                    </ul>
                </div>



                <!-- Kegiatan yang Terlewat -->
                <div
                    class="bg-white dark:bg-zinc-900 text-black dark:text-neutral-100 rounded-md border-2 border-slate-100 dark:border-zinc-800 p-6 flex-1">
                    <div class="h-full flex items-center justify-center">
                        <span class="text-center"></span>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endsection
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentYear = new Date().getFullYear();
        const yearSelect = document.getElementById('year-select');
        const ctx = document.getElementById('transactionChart');

        // Initialize Chart.js
        const transactionChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: '',
                    data: [],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan'
                        }
                    },
                    y: {
                        beginAtZero: true, // Mulai dari 0
                        ticks: {
                            stepSize: 1, // Atur kelipatan menjadi 1
                            callback: function(value) {
                                return value; // Tampilkan nilai apa adanya
                            },
                        },
                    },
                }
            }
        });

        // Set default selected option to the current year
        Array.from(yearSelect.options).forEach(option => {
            if (option.value == currentYear) {
                option.selected = true;
            }
        });

        // Fetch data for the current year when the page loads
        fetchDataForYear(currentYear);

        // Add event listener for dropdown change
        yearSelect.addEventListener('change', function() {
            const selectedYear = this.value;

            if (selectedYear) {
                fetchDataForYear(selectedYear);
            }
        });

        // Function to fetch data based on the year
        function fetchDataForYear(year) {
            const url = `{{ route('transaction.total', ':year') }}`.replace(':year', year);

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    // Extract month names and counts
                    const labels = data.data.map(item => item.month); // Get months
                    const counts = data.data.map(item => item.count); // Get counts

                    // Update Chart.js
                    updateChart(transactionChart, labels, counts, data.total);
                })
                .catch(error => {
                    console.error('Error fetching transaction total:', error);
                });
        }

        // Function to update Chart.js
        function updateChart(chart, labels, data, total) {
            chart.data.labels = labels; // Update labels
            chart.data.datasets[0].data = data; // Update dataset
            chart.data.datasets[0].label = `Total ${total} di ${yearSelect.value}`;
            chart.update(); // Re-render chart
        }
    });
</script>

<script>
    function scheduleData() {
        return {

            schedules: [],
            selectedFilter: 'week',

            // Fungsi untuk mengambil data jadwal berdasarkan filter
            fetchSchedules() {
                let url = `{{ route('schedule.activity') }}?filter=${this.selectedFilter}`;
                console.log('Fetching URL:', url);

                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => this.schedules = data)
                    .catch(error => console.error('Fetch error:', error));
            },

            // Fungsi untuk memformat tanggal dan waktu
            formatDate(dateStr) {
                const options = {
                    day: '2-digit',
                    month: 'short',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false // Gunakan format 24 jam
                };
                return new Date(dateStr).toLocaleDateString('id-ID', options).replace(',', '');
            },


            // Panggil fetchSchedules saat komponen di-mount
            init() {
                this.fetchSchedules();
            }
        };
    }
</script>
