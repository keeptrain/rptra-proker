<?php

namespace App\Http\Controllers;

use App\Models\Institutional_partners;
use App\Models\Principal_program;
use App\Models\Priority_program;
use Illuminate\Http\Request;
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


}
