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

class TransactionsExport implements FromCollection,WithCustomStartCell,WithHeadings,WithEvents,WithStyles
{

    private $underlineCells = [];
    private $boldCells = [];

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $transactions = Transaction_program::where('status', 'completed')->with(['principalPrograms', 'priorityPrograms', 'institutionalPartners'])->get();

        return $transactions->map(function ($transaction,$index){
            // Membuat nomor
            $transaction->sequence_number = $index + 1;

            // Membersihkan html format
            $transaction->activity = $this->convertHtmlToText($transaction->activity, $index + 3);
            
            // Mengubah format dateTime
            $transaction->day_name = Carbon::parse($transaction->schedule_activity)
                ->translatedFormat('l, d F Y H:m');

            // Mengambil data mitra/unit/lembaga pada table pivot insitutional_partner_transaction_program    
            $transaction->partner_names = $transaction->institutionalPartners->pluck('name')->join(', ');

            return [
                'NO' => $transaction->sequence_number,
                'PROGRAM POKOK PKK' => $transaction->principalPrograms->name,
                'PROGRAM' => $transaction->priorityPrograms->name,
                'KEGIATAN' => $transaction->activity['text'],
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

                // Terapkan underline untuk cell yang tersimpan dalam $underlineCells
                foreach ($this->underlineCells as $cell) {
                    $sheet->getStyle($cell)->getFont()->setUnderline(Font::UNDERLINE_SINGLE);
                }

                // Terapkan bold untuk cell yang tersimpan dalam $boldCells
                foreach ($this->boldCells as $cell) {
                    $sheet->getStyle($cell)->getFont()->setBold(true);
                }
        }];
    }


    public function styles($sheet)
    {

    }

    /**
     * Fungsi untuk mengubah HTML menjadi teks plain.
     */
    private function convertHtmlToText($html, $row)
    {
        if (empty($html)) {
            return ['text' => '', 'underline' => [], 'bold' => []];
        }

        $dom = new \DOMDocument();
        @$dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $text = '';
        $underline = [];
        $bold = []; // Menyimpan teks yang harus di-underline

        foreach ($dom->getElementsByTagName('strong') as $strong) {
            $text .= $strong->nodeValue . PHP_EOL;
            $bold[] = $strong->nodeValue;
        }

        // Proses elemen HTML
        foreach ($dom->getElementsByTagName('u') as $u) {
            $text .= $u->nodeValue . PHP_EOL;
            $underline[] = $u->nodeValue;
        }

        // Simpan posisi cell yang perlu underline
        foreach ($underline as $value) {
            $column = 'E'; // Misalnya kolom "KEGIATAN" ada di kolom D
            $this->underlineCells[] = "{$column}{$row}";
        }

        // Simpan posisi cell untuk bold
        foreach ($bold as $value) {
            $column = 'E'; // Kolom "KEGIATAN"
            $this->boldCells[] = "{$column}{$row}";
        }

        return ['text' => trim($text), 'underline' => $underline, 'bold' => $bold];
    }

  

    public function headings(): array
    {
        // Definisikan header kustom
        return [
            'NO',
            'PROGRAM POKOK PKK',
            'PROGRAM',
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

