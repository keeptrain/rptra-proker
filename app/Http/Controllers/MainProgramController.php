<?php

namespace App\Http\Controllers;

use App\Models\Main_program;
use App\Http\Requests\StoreMain_programRequest;
use App\Http\Requests\UpdateMain_programRequest;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMain_programRequest $request)
    {
        //
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
    public function destroy(Main_program $main_program)
    {
        //
    }
}
