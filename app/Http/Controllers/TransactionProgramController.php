<?php

namespace App\Http\Controllers;

use App\Models\Transaction_program;
use App\Http\Requests\StoreTransaction_programRequest;
use App\Http\Requests\UpdateTransaction_programRequest;
use App\Models\Institutional_partners;
use App\Models\Principal_program;

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
        //
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
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( $request)
    {
        //
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
