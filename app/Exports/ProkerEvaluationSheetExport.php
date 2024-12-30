<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\Transaction_program;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\Title;
use Maatwebsite\Excel\Concerns\WithCharts;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;

class ProkerEvaluationSheetExport implements FromCollection, WithCharts, WithEvents, WithMapping, WithHeadings, WithCustomStartCell, WithTitle
{
    protected $startDate;

    protected $endDate;

    public function __construct($startDate = null, $endDate = null) {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = Transaction_program::select(
            DB::raw('YEAR(schedule_activity) as year'), 
            DB::raw('MONTH(schedule_activity) as month'), 
            DB::raw('COUNT(*) as total_program_kerja'))
            ->where('status', 'completed');
            
        if ($this->startDate && $this->endDate) {
            $query->whereBetween('schedule_activity', [$this->startDate,$this->endDate]);
        }    

        return $query
            ->groupBy(DB::raw('YEAR(schedule_activity), MONTH(schedule_activity)'))
            ->orderBy(DB::raw('YEAR(schedule_activity), MONTH(schedule_activity)'))
            ->get();
    }

    private function getHighestRow()
    {
        // Ambil jumlah data dari collection sebagai highestRow
        $data = $this->collection();
        return $data->count() + 2; // +2 untuk mempertimbangkan header (baris 1 dan 2)
    }

    private function getDynamicCategories()
    {
        // Ambil kolom dan baris terakhir untuk kategori
        $highestRow = $this->getHighestRow();

        // Tentukan rentang kategori
        $categoriesRange = 'EvaluasiProgramKerja!$B$3:$C$' . $highestRow;

        return [new DataSeriesValues('String', $categoriesRange, null, $highestRow - 2)];
    }

    private function getDynamicValues()
    {
        // Ambil kolom dan baris terakhir untuk nilai
        $highestRow = $this->getHighestRow();

        // Tentukan rentang nilai
        $valuesRange = 'EvaluasiProgramKerja!D$3:$D$' . $highestRow;

        return [new DataSeriesValues('Number', $valuesRange, null, $highestRow - 2)];
    }

    public function charts()
    {
        return $this->generateChart();
    }
    
    private function generateChart()
    {
        // Tentukan label tetap
        $labels = [new DataSeriesValues('String', 'EvaluasiProgramKerja!$B$2', null, 1)]; // Label grafik

        $categories = $this->getDynamicCategories();
        $values = $this->getDynamicValues();

        // Buat seri data untuk grafik
        $series = new DataSeries(
            DataSeries::TYPE_BARCHART, // Jenis grafik: Bar Chart
            DataSeries::GROUPING_CLUSTERED, // Jenis pengelompokan: Clustered
            range(0, count($values) - 1), // Indeks data
            $labels, // Label seri
            $categories, // Kategori (bulan)
            $values, // Nilai data
        );

        // Definisikan judul grafik
        $chartTitle = new Title('Jumlah Program Kerja per Bulan');

        // Buat plot area untuk chart
        $plotArea = new PlotArea(null, [$series]);

        // Buat chart
        $chart = new Chart(
            'Evaluasi Program Kerja', // Nama unik chart
            $chartTitle, // Judul
            null, // Tidak ada legenda
            $plotArea, // Area plot
        );

        // Tentukan posisi chart pada worksheet
        $chart->setTopLeftPosition('F2'); // Posisi sudut kiri atas chart
        $chart->setBottomRightPosition('N25'); // Posisi sudut kanan bawah chart

        return $chart;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;

                // Ambil jumlah baris dan kolom yang digunakan
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();

                // Terapkan border ke seluruh tabel
                $tableRange = "B2:{$highestColumn}{$highestRow}";
                $sheet->getStyle($tableRange)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
    }

    private function getMonthName($monthNumber)
    {
        $monthNames = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        return $monthNames[$monthNumber] ?? 'Tidak Diketahui';
    }

    public function map($row): array
    {
        return [
            $row->year,
            $this->getMonthName($row->month),
            $row->total_program_kerja
        ];
    }

    public function headings(): array
    {
        return [
            'Tahun', 
            'Bulan',
            'Total Program Kerja'
        ];
    }

    public function startCell(): string
    {
        return 'B2';
    }
    
    public function title(): string
    {
        return 'EvaluasiProgramKerja';
    }
}
