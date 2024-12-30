<?php

namespace App\Exports;

use App\Models\Transaction_program;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\Title;
use Maatwebsite\Excel\Concerns\WithCharts;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Chart\Legend;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat\Wizard\Percentage;

/**
 * EvaluationSheetExport
 */
class EvaluationSheetExport implements
    FromCollection,
    WithCharts,
    WithCustomStartCell,
    WithHeadings,
    WithTitle,
    WithMapping,
    WithEvents
{
    protected $startDate;
    protected $endDate;
    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = Transaction_program::where('status', 'completed')
            ->selectRaw('
                YEAR(schedule_activity) as year,
                MONTH(schedule_activity) as month,
                COUNT(*) as total_programs,
                SUM(CASE WHEN information = "belum_terlaksana" THEN 1 ELSE 0 END) as belum_terlaksana_count,
                SUM(CASE WHEN information = "terlaksana" THEN 1 ELSE 0 END) as terlaksana_count,
                SUM(CASE WHEN information = "tidak_terlaksana" THEN 1 ELSE 0 END) as tidak_terlaksana_count,
                ROUND((SUM(CASE WHEN information = "belum_terlaksana" THEN 1 ELSE 0 END) / COUNT(*)) * 100, 2) as belum_terlaksana_percentage,
                ROUND((SUM(CASE WHEN information = "terlaksana" THEN 1 ELSE 0 END) / COUNT(*)) * 100, 2) as terlaksana_percentage,
                ROUND((SUM(CASE WHEN information = "tidak_terlaksana" THEN 1 ELSE 0 END) / COUNT(*)) * 100, 2) as tidak_terlaksana_percentage
            ');

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('schedule_activity', [$this->startDate, $this->endDate]);
        }

        return $query
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
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
        $categoriesRange = 'EvaluasiKeteranganProgram!$B$3:$C$' . $highestRow;

        return [new DataSeriesValues('String', $categoriesRange, null, $highestRow - 2)];
    }


    public function charts()
    {
        // Label untuk (Terlaksana, Tidak terlaksana, Belum terlaksana)
        $label1 = new DataSeriesValues('String','EvaluasiKeteranganProgram!$F$2', null,1);
        $label2 = new DataSeriesValues('String','EvaluasiKeteranganProgram!$E$2', null,1);
        $label3 = new DataSeriesValues('String','EvaluasiKeteranganProgram!$D$2', null,1);

        $categories = $this->getDynamicCategories();

        // Data untuk setiap kolom (Terlaksana, Tidak terlaksana, Belum terlaksana)
        $values1 = new DataSeriesValues('Number', 'EvaluasiKeteranganProgram!$F$3:$F$' . $this->getHighestRow(), null, 3); // "Belum terlaksana"
        $values2 = new DataSeriesValues('Number', 'EvaluasiKeteranganProgram!$E$3:$E$' . $this->getHighestRow(), null, 1); // "Belum terlaksana"
        $values3 = new DataSeriesValues('Number', 'EvaluasiKeteranganProgram!$D$3:$D$' . $this->getHighestRow(), null, 1); // "Belum terlaksana"
        

        // Buat seri data untuk grafik
        $series = new DataSeries(
            DataSeries::TYPE_BARCHART,       
            DataSeries::GROUPING_STACKED,
            range(0, 2),       // Indeks untuk data
            [$label1,$label2,$label3],                            
            $categories,                // Kategori (Tahun & Bulan)
            [$values1,$values2,$values3]  // Nilai data
        );

        // Area plot
        $plot = new PlotArea(null, [$series]);

        // Legenda untuk grafik
        $legend = new Legend(Legend::POSITION_RIGHT, null, false);

        // Buat grafik
        $chart = new Chart(
            'Evaluasi Keterangan Chart',
            new Title('Evaluasi Keterangan Program Kerja'), 
            $legend,
            $plot 
        );

        // Posisi grafik dalam worksheet
        $chart->setTopLeftPosition('H2');  // Posisi kiri atas
        $chart->setBottomRightPosition('P20'); // Posisi kanan bawah

        return $chart;
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
            $row->terlaksana_percentage / 100,
            $row->tidak_terlaksana_percentage / 100,
            $row->belum_terlaksana_percentage / 100,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;

                // Ambil jumlah baris dan kolom yang digunakan
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();

                // Tentukan range untuk seluruh tabel
                $tableRange = "B2:{$highestColumn}{$highestRow}";

                // Terapkan border ke seluruh tabel
                $sheet->getStyle($tableRange)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000']
                        ],
                    ],
                ]);

                // Format kolom D:F ke Persentase
                $sheet->getStyle('D:F')
                    ->getNumberFormat()
                    ->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
            }
        ];
    }

    public function headings(): array
    {
        return [
            'Tahun',
            'Bulan',
            'Terlaksana',
            'Tidak terlaksana',
            'Belum terlaksana',
        ];
    }

    public function startCell(): string
    {
        return 'B2';
    }

    public function title(): string
    {
        return 'EvaluasiKeteranganProgram';
    }
}
