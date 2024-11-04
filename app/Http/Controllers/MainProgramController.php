<?php

namespace App\Http\Controllers;

use App\Http\Requests\Destroy\DestroyMain_programRequest;
use App\Models\Main_program;
use App\Http\Requests\Store\StoreMain_programRequest;
use App\Http\Requests\UpdateMain_programRequest;
use App\Models\Priority_program;

class MainProgramController extends Controller
{
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
        // Ambil data dari model PriorityProgram
         $priorityPrograms = Priority_program::all();

        return view('admin.main.main-program', ['priorityPrograms' => $priorityPrograms]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMain_programRequest $request)
    {
        // Models
        $main= new Main_program();

        // Combine prefix and number for customeId
        $customId = $request->input('prefix') . '-' . str_pad($request->input('number'), 3, '0', STR_PAD_LEFT);

        $priorityProgram = $request->input('priority_program');

        $newProgram = $main::create([
            'id' => $customId,
            'priority_program_id' => $priorityProgram,
            'name' => $request->input('name'),
        ]);
        
        return redirect()->route('progpokok.show')->with('success', 'Program berhasil ditambahkan');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Main_program $main_program)
    {
        //
        $mainPrograms = Main_program::with('priorityProgram')->get();
        return view('admin.main.main-program', compact('mainPrograms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Main_program $main_program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMain_programRequest $request, Main_program $main_program)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyMain_programRequest $destroyMain_programRequest)
    {
        $ids = $destroyMain_programRequest->input('main_ids');
        Main_program::whereIn('id', $ids)->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('progpokok.show')->with('success', 'Program yang dipilih berhasil dihapus.');
    }
}
