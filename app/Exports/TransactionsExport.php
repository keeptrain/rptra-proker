<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class TransactionsExport implements WithMultipleSheets
{
    use Exportable;
    protected $startDate;
    protected $endDate;

    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    
    public function sheets(): array
    {
        return [
            'Program kerja' => new ProkerSheetExport($this->startDate, $this->endDate),
            'Evaluasi program kerja' => new ProkerEvaluationSheetExport($this->startDate,$this->endDate), 
            'Evaluasi'  => new EvaluationSheetExport($this->startDate, $this->endDate), 
        ];
    }
  
}



