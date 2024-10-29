<?php

namespace App\Http\Controllers;

use App\Models\Program_prioritas;
use App\Http\Requests\StoreProgram_prioritasRequest;
use App\Http\Requests\UpdateProgram_prioritasRequest;

class PriorityProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("components.work-program");
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
    public function store(StoreProgram_prioritasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Program_prioritas $program_prioritas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program_prioritas $program_prioritas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgram_prioritasRequest $request, Program_prioritas $program_prioritas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program_prioritas $program_prioritas)
    {
        //
    }
}
