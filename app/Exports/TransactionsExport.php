<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class TransactionsExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Program kerja' => new ProkerSheetExport(),
            'Evaluasi'  => new EvaluationSheetExport(), 
        ];
    }
  
}

