<?php

namespace App\Exports;

use Illuminate\Support\Carbon;
use App\Models\Transaction_program;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;
use PhpOffice\PhpSpreadsheet\Style\Font;

class TransactionsExport implements FromCollection,WithCustomStartCell,WithHeadings,WithEvents
{

    private $formattedCells = [];

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $transactions = Transaction_program::where('status', 'completed')->with(['principalPrograms', 'priorityPrograms', 'institutionalPartners'])->get();

        return $transactions->map(function ($transaction,$index){
        
            // Mengubah format dateTime
            $transaction->day_name = Carbon::parse($transaction->schedule_activity)
                ->translatedFormat('l, d F Y , H:m');

            // Mengambil data mitra/unit/lembaga pada table pivot insitutional_partner_transaction_program    
            $transaction->partner_names = $transaction->institutionalPartners->pluck('name')->join(', ');

            return [
                'NO' => $index + 1,
                'PROGRAM POKOK PKK' => $transaction->principalPrograms->name,
                'PROGRAM' => $transaction->priorityPrograms->name,
                'KEGIATAN' => $this->convertHtmlToPlainText($transaction->activity),
                'TUJUAN'=> $transaction->objective,
                'OUTPUT' => $transaction->output,
                'SASARAN' => $transaction->target,
                'VOLUME' => $transaction->volume,
                'LOKASI' => $transaction->location,
                'JADWAL/KEGIATAN' => $transaction->day_name,
                'MITRA/UNIT/LEMBAGA' => $transaction->partner_names,
                'KETERANGAN' => $transaction->information
            ];
        });
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;

                // Ambil jumlah baris dan kolom yang digunakan
                $highestRow = $sheet->getHighestRow(); // Baris terakhir
                $highestColumn = $sheet->getHighestColumn(); // Kolom terakhir
    
                // Tentukan range untuk seluruh tabel
                $tableRange = "B2:{$highestColumn}{$highestRow}";
    
                // Terapkan border ke seluruh tabel
                $sheet->getStyle($tableRange)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'], // Warna border hitam
                        ],
                    ],
                ]);

              
        }];
    }

    /**
     * Fungsi untuk mengubah HTML menjadi teks plain.
     */
    private function convertHtmlToPlainText($html)
    {
        if (empty($html)) {
            return '';
        }

        $dom = new \DOMDocument();

        // Supress warnings saat memproses HTML
        @$dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $result = [];

        // Tangani elemen daftar tidak terurut <ul>
        foreach ($dom->getElementsByTagName('ol') as $ol) {
            $index = 1;
            foreach ($ol->getElementsByTagName('li') as $li) {
                $class = $li->getAttribute('data-list'); 
                if ($class === 'bullet') {
                    // Jika class <ul> mengandung 'bullet', gunakan format khusus
                    $result[] = '• ' . trim($li->nodeValue); // Format: "• item"
                } else {
                    // Format default untuk <ul>
                    $result[] = $index . '. ' . trim($li->nodeValue);
                    $index++; // Format: "- item"
                }
            }
        }

        foreach ($dom->getElementsByTagName('p') as $p) {
            foreach ($p->getElementsByTagName('strong') as $strong) {
                $result[] = trim($strong->nodeValue);
            }
        }

        foreach ($dom->getElementsByTagName('em') as $em) {
            $result[] = trim($em->nodeValue);
        }

        foreach ($dom->getElementsByTagName('u') as $u) {
            $result[] = trim($u->nodeValue);
        }

    
        // Jika elemen tidak dikenali, ambil teks langsung tanpa tag
        if (empty($result)) {
            $result[] = strip_tags($html); // Default, hapus semua tag
        }

        // Gabungkan teks dengan spasi antar elemen
        return implode(PHP_EOL, $result);
    }


  

    public function headings(): array
    {
        // Definisikan header kustom
        return [
            'NO',
            'PROGRAM POKOK PKK',
            'PROGRAM PRIORITAS',
            'KEGIATAN',
            'TUJUAN',
            'OUTPUT',
            'SASARAN',
            'VOLUME',
            'LOKASI',
            'JADWAL/KEGIATAN',
            'MITRA/UNIT/LEMBAGA',
            'KETERANGAN'
        ];
    }

    public function startCell(): string
    {
        return 'B2';
    }
  
}

