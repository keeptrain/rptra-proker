<?php

namespace App\Http\Controllers;

use App\Exports\TransactionsExport;
use App\Http\Requests\Transaction\UpdateTransactionRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Principal_program;
use App\Models\Transaction_program;
use Illuminate\Support\Facades\Route;
use App\Models\Institutional_partners;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\UpdateTransaction_programRequest;
use App\Http\Requests\Transaction\StoreTransactionRequest;
use App\Http\Requests\Transaction\DestoryTransactionRequest;
use App\Http\Requests\Transaction\StoreDraftTransactionRequest;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

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
        $completed = $this->transaction->getCompletedStatus();
        //$draft = $this->transaction->getDraftStatus();
        return view('admin.transaction.index', [
            'transactions' => $completed,
        ]);
    }


    public function getTransactions(Request $request)
    {
        // Ambil data transaksi dari database
        $transactions = Transaction_program::all();

        // Mengembalikan data dalam format JSON
        return response()->json($transactions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $principalProgram = $this->principalProgram->get();
        $institutionalPartner = $this->institutionalPartner->get();

        return view('admin.transaction.create-edit', [
            'principalPrograms' => $principalProgram,
            'institutionalPartners' => $institutionalPartner,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        try {
            $this->transaction->storeTransactionProgram(
                'completed',
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
            return redirect()->route('prog-transaksi.index')->with('success', 'Program kerja berhasil ditambah.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function storeToDraft(StoreDraftTransactionRequest $request)
    {
        try {
            // Simpan data ke dalam draft
             $this->transaction->storeTransactionProgram(
                'draft',
                $request->activity,
                $request->objective,
                $request->output,
                $request->target,
                $request->volume,
                $request->location,
                $request->schedule_activity,
                $request->principal_program_id,
                $request->partner,
                $request->information
            );


            return response()->json(['success' => true, 'message' => 'Program kerja sebagai draft berhasil di simpan.'],200);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
     public function showDraft()
     {
         $draft = $this->transaction->getDraftStatus();
         return view('admin.transaction.index', [
             'draft' => $draft,
         ]);
     }
 
     public function showDetailTransaction($id)
     {
         $transaction = $this->transaction::with(['institutionalPartners', 'principalPrograms'])->find($id);
         //$principalProgram = $this->principalProgram->get();
         //$institutionalPartner = $this->institutionalPartner->get();
         return view('admin.transaction.detail',[
             'selectedProgram' => $transaction,
             //'principalProgram' => $principalProgram,
             //'institutionalPartners' => $institutionalPartner,
             //'activity'=> $this->formatHtmlToTailwind($transaction->getAttribute('activity'))
         ]);
     }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaction = $this->transaction::with(['institutionalPartners', 'principalPrograms'])->find($id);
        $principalProgram = $this->principalProgram->get();
        $institutionalPartner = $this->institutionalPartner->get();
    
        return view('admin.transaction.create-edit', [
            'selectedProgram' => $transaction,
            'principalPrograms' => $principalProgram,
            'institutionalPartners' => $institutionalPartner,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, $id)
    {
        try {
            $this->transaction->updateTransactionProgram(
                $id,
                'completed',
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
            return redirect()->route('prog-transaksi.index')->with('success', 'Data berhasil diperbarui.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestoryTransactionRequest $request)
    {
        try{
            $this->transaction->destroyTransactionProgram(
                $request->input('transaction_ids'),
            );

            return response()->json(['success' => true, 'message' => 'Data berhasil dihapus.'], 200);

        } catch (ValidationException $e)
        {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
       
       
    }

    public function export()
    {
        $date = Carbon::now()->format('H.i_d-m-Y');
        $fileName = "transaksi-{$date}.xlsx";
    
        return Excel::download(new TransactionsExport, $fileName);
    }

    function formatHtmlToTailwind($html)
    {
        $dom = new \DOMDocument();
        @$dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // Tangani elemen <ol> atau <ul>
        foreach ($dom->getElementsByTagName('ol') as $ol) {
            foreach ($ol->getElementsByTagName('li') as $li) {
                // Periksa atribut 'data-list'
                $dataList = $li->getAttribute('data-list');

                if ($dataList === 'ordered') {
                    $ol->setAttribute('class', 'list-decimal list-inside mb-4');
                    $li->setAttribute('class', 'text-gray-700 leading-relaxed');
                } elseif ($dataList === 'bullet') {
                    $ol->setAttribute('class', 'list-disc list-inside mb-4');
                    $li->setAttribute('class', 'text-gray-700 leading-relaxed');
                }
            }
        }

        return $dom->saveHTML();
    }
}
