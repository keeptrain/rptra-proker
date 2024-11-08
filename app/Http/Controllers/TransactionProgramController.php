<?php

namespace App\Http\Controllers;

use App\Models\Transaction_program;
use App\Http\Requests\StoreTransaction_programRequest;
use App\Http\Requests\UpdateTransaction_programRequest;

class TransactionProgramController extends Controller
{

    public $transaction;

    public function __construct(Transaction_program $transaction) {
        $this->transaction = $transaction;
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
        return view('admin.transaction.form');
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
    public function show(Transaction_program $transaction_program)
    {
        //
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
