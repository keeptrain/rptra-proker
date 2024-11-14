<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Principal_program;

use App\Models\Transaction_program;
use App\Models\Institutional_partners;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\UpdateTransaction_programRequest;
use App\Http\Requests\Transaction\StoreTransactionRequest;

class TransactionProgramController extends Controller
{

    protected $transaction;
    protected $principalProgram;

    protected $institutionalPartner;

    public function __construct(Transaction_program $transaction, Principal_program $principalProgram, Institutional_partners $institutionalPartner) {
        $this->transaction = $transaction;
        $this->principalProgram = $principalProgram;
        $this->institutionalPartner = $institutionalPartner;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginate = $this->transaction->get();
        return view('admin.transaction.index', [
            'transactions' => $paginate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $principalProgram = $this->principalProgram->get();
        $institutionalPartner = $this->institutionalPartner->get();

        return view('admin.transaction.create', [
            'principalPrograms' => $principalProgram,
            'institutionalPartners' => $institutionalPartner,
            'transactions' => $this->transaction->getInformationOptions(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        try {
            $this->transaction->storeTransactionProgram(
              
                $request->input('activity'),
                $request->input('objective'),
                $request->input('output'),
                $request->input('target'),
                $request->input('volume'),
                $request->input('location'),
                $request->input('schedule_activity'),
                $request->input('principal_program_id'),
                $request->input('partner'),
                $request->input('information')
            );
            return redirect()->route('prog-transaksi.create')->with('success', 'Program kerja berhasil ditambah.');;
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function storeToDraft()
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return $this->principalProgram->id;
    }

    public function showPartners()
    {
        return $this->institutionalPartner->id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction_program $transaction_program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, Transaction_program $transaction_program)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction_program $transaction_program)
    {
        //
    }
}
