<?php

namespace App\Exports;

use DOMDocument;
use Illuminate\Support\Carbon;
use App\Models\Transaction_program;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;


class ProkerSheetExport implements FromCollection,WithCustomStartCell,WithHeadings,WithEvents,WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $transactions = Transaction_program::where('status', 'completed')
                        ->with(['principalPrograms', 'priorityPrograms', 'institutionalPartners'])
                        ->get();

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
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn(); 
    
                // Tentukan range untuk seluruh tabel
                $tableRange = "B2:{$highestColumn}{$highestRow}";
    
                // Terapkan border ke seluruh tabel
                $sheet->getStyle($tableRange)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            }
        ];
    }

    /**
     * Fungsi untuk mengubah HTML menjadi teks plain.
     */
    private function convertHtmlToPlainText($html)
    {
        if (empty($html)) {
            return '';
        }

        $dom = new DOMDocument();

        // Supress warnings saat memproses HTML
        @$dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $result = [];

        // Tangani elemen daftar tidak terurut <ul>
        /** @var \DOMElement $ol */
        foreach ($dom->getElementsByTagName('ol') as $ol) {
            $index = 1;
            /** @var \DOMElement $li */
            foreach ($ol->getElementsByTagName('li') as $li) {
                $class = $li->getAttribute('data-list'); 
                if ($class === 'bullet') {
                    // Jika class <ul> mengandung 'bullet', gunakan format khusus
                    $result[] = '• ' . trim($li->nodeValue);
                } else {
                    // Format default untuk <ul>
                    $result[] = $index . '. ' . trim($li->nodeValue);
                    $index++;
                }
            }
        }

        /** @var \DOMElement $p */
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
            $result[] = strip_tags($html);
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

    public function title():string
    {
        return "Program kerja";
    }
}
