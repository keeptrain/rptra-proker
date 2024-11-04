<?php

namespace App\Http\Controllers;

use App\Models\Priority_program;
use App\Http\Requests\StorePriority_programRequest;
use App\Http\Requests\UpdatePriority_programRequest;
use App\Http\Requests\Destroy\DestroyPriority_programRequest;

class PriorityProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.priority.priority-program');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePriority_programRequest $request)
    {
        // Models
        $priority = new Priority_program();

        // Combine prefix and number for customeId
        $customId = $request->input('prefix') . '-' . str_pad($request->input('number'), 3, '0', STR_PAD_LEFT);

        $newProgram = $priority::create([
            'id' => $customId,
            'name' => $request->input('name'),
        ]);
        
        return redirect()->route('prog-prioritas.show')->with('success', 'Program berhasil ditambahkan');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Priority_program $priority_program)
    {
        $programs = Priority_program::all();
        return view('admin.priority.priority-program', ['programs' => $programs]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Priority_program $priority_program)
    {
        return view('admin.priority.priority-program');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePriority_programRequest $request, Priority_program $priority_program)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyPriority_programRequest $request)
    {
        $ids = $request->input('priority_ids');
        Priority_program::whereIn('id', $ids)->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('prog-prioritas.show')->with('success', 'Program yang dipilih berhasil dihapus.');
    }
}
