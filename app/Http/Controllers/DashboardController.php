<?php

namespace App\Http\Controllers;

use App\Models\Institutional_partners;
use App\Models\Principal_program;
use App\Models\Priority_program;
use App\Models\Transaction_program;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard',[
            'totalTransaction' => $this->showTransactions(),
            'totalPriority' => $this->showPrioritys(),
            'totalPrincipals' => $this->showPrincipals(),
            'totalPartners' => $this->showPartners(),
            'transactionYears' => $this->getYears(),
        ]);
    }

    public function showTransactions()
    {
        return Transaction_program::where('status','completed')->count();
    }

    public function showPrioritys()
    {
        return Priority_program::count();
    }

    public function showPrincipals()
    {
        return Principal_program::count();
    }

    public function showPartners()
    {
        return Institutional_partners::count();
    }

    public function getYears()
    {
        // Mengambil tahun yang unik dari kolom created_at
        return Transaction_program::selectRaw('YEAR(created_at) as year')
        ->distinct()
        ->orderBy('year', 'asc')
        ->pluck('year');
    }

    public function getTotalInYears($year)
    {
        return Transaction_program::whereYear('created_at', $year)
            ->where('status','completed')
            ->count();
    }
    
    public function getCreateTransactionYears($year)
    {
        /// Mengambil total transaksi untuk tahun tertentu
        $total = $this->getTotalInYears($year);

        // Mengambil jumlah transaksi per bulan untuk tahun tertentu
        $monthlyData = Transaction_program::whereYear('created_at', $year)
            ->where('status','completed')
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Memetakan nama bulan berdasarkan nomor
        $monthNames = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
            5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
        ];
        
        // Format ulang $monthlyData menjadi associative array dengan key sebagai bulan
        $monthlyDataAssoc = $monthlyData->keyBy('month');

        // Pemetaan data untuk semua bulan
        $formattedData = collect($monthNames)->map(function ($monthName, $monthNumber) use ($monthlyDataAssoc) {
            return [
                'month' => $monthName,
                'count' => $monthlyDataAssoc[$monthNumber]->count ?? 0,
            ];
        })->values();

        // Mengembalikan data dalam format JSON
        return response()->json([
            'year' => $year,
            'total' => $total,
            'data' => $formattedData,
        ]);
    }
}
