<?php

namespace App\Exports;

use App\Models\Transaction_program;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

/**
 * EvaluationSheetExport
 */
class EvaluationSheetExport implements FromCollection,WithCustomStartCell,WithHeadings,WithTitle,WithMapping,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaction_program::where('status', 'completed')
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
        ')
        ->groupBy('year', 'month')
        ->orderBy('year')
        ->orderBy('month')
        ->get();
    }

    private function getMonthName($monthNumber)
    {
        $monthNames = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];

        return $monthNames[$monthNumber] ?? 'Tidak Diketahui';
    }

    public function map($row): array
    {
        return [
            $row->year,
            $this->getMonthName($row->month),
            $row->total_programs,
            $row->belum_terlaksana_percentage . "%",
            $row->terlaksana_percentage . "%",
            $row->tidak_terlaksana_percentage . "%"
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
            }
        ];
    }

    public function headings(): array
    {
        return [
            'Tahun',
            'Bulan',
            'Jumlah Program Kerja',
            'Belum terlaksana',
            'Terlaksana',
            'Tidak terlaksana'
        ];
    }

    public function startCell(): string
    {
        return 'B2';
    }

    public function title(): string
    {
        return 'Evaluasi';
    }
}
