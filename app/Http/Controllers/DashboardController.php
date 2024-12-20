<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Priority_program;
use App\Models\Principal_program;
use App\Models\Transaction_program;
use App\Models\Institutional_partners;
use Illuminate\Support\Facades\DB;

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
        // Mengambil tahun yang ada dari kolom schedule_activity
        return Transaction_program::selectRaw('YEAR(schedule_activity) as year')
            ->distinct()
            ->whereNotNull('schedule_activity')
            ->orderBy('year', 'desc')
            ->pluck('year');
    }

    public function getTotalInYears($year)
    {
        return Transaction_program::whereYear('schedule_activity', $year)
            ->whereNotNull('schedule_activity')
            ->where('status','completed')
            ->count();
    }
    
    public function getCreateTransactionYears($year)
    {
        /// Mengambil total transaksi untuk tahun tertentu
        $total = $this->getTotalInYears($year);

        // Mengambil jumlah transaksi per bulan untuk tahun tertentu
        $monthlyData = Transaction_program::whereYear('schedule_activity', $year)
            ->where('status','completed')
            ->selectRaw('MONTH(schedule_activity) as month, COUNT(*) as count')
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
        $query = Transaction_program::query()->where('information','belum_terlaksana');

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();


        if ($filter === 'week') {
            $query->whereBetween('schedule_activity', [$startOfWeek,$endOfWeek]);
        } elseif ($filter === 'month') {
            $query->whereBetween('schedule_activity', [$startOfMonth, $endOfMonth]);
        }

        $query->orderBy('schedule_activity', 'asc');

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
            ->where('information','belum_terlaksana')
            ->whereDate('schedule_activity', '>=', Carbon::now()->toDateString())
            ->orderBy('schedule_activity')
            ->get();
    }

    public function getAvailableMonths()
    {
        $currentYear = Carbon::now()->year;

        $months = Transaction_program::selectRaw('MONTH(schedule_activity) as month')
            ->distinct()
            ->where('status', 'completed')
            ->whereYear('schedule_activity', $currentYear)
            ->whereNotNull('information')
            ->orderBy('month')
            ->get();

        return response()->json($months);
    }

    public function getMonthByInformationAvailable($month)
    {
        $currentYear = Carbon::now()->year;

        return Transaction_program::whereMonth('schedule_activity', $month)
            ->whereYear('schedule_activity', $currentYear)
            ->where('status', 'completed')
            ->whereNotNull('information');
    }

    public function getInformation($month)
    {
        // Mengambil data berdasarkan bulan yang tersedia
        $data = $this->getMonthByInformationAvailable($month)->get();

        // Menghitung total dari masing-masing nilai enum 'information'
        $totals = [
            'belum_terlaksana' => $data->where('information', 'belum_terlaksana')->count(),
            'terlaksana' => $data->where('information', 'terlaksana')->count(),
            'tidak_terlaksana' => $data->where('information', 'tidak_terlaksana')->count(),
        ];

        // Mengembalikan hasil dalam bentuk JSON
        return response()->json($totals);
    }

}
