<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Priority_program;
use App\Models\Principal_program;
use App\Models\Transaction_program;
use App\Models\Institutional_partners;

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
            'getNearestSchedule' => $this->getNearestSchedule(), 
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

    
    public function getFilteredSchedule(Request $request)
    {
        $filter = $request->query('filter');
        $query = Transaction_program::query();

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();


        if ($filter === 'week') {
            $query->whereBetween('schedule_activity', [$startOfWeek,$endOfWeek]);
        } elseif ($filter === 'month') {
            $query->whereBetween('schedule_activity', [$startOfMonth, $endOfMonth]);
        }

        return response()->json($query->get());
    }

    public function getNearestSchedule()
    {
        // Ambil tanggal awal dan akhir minggu ini
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // Ambil jadwal kegiatan dalam rentang minggu ini
        return Transaction_program::whereBetween('schedule_activity', [$startOfWeek, $endOfWeek])
        ->where('status','completed')
        ->whereDate('schedule_activity', '>=', Carbon::now()->toDateString())
        ->orderBy('schedule_activity')
        ->get();
    }
}
