<?php

namespace App\Http\Controllers;

use App\Http\Requests\Priority\DestoryPriorityRequest;
use App\Models\Priority_program;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Priority\StorePriorityRequest;
use App\Http\Requests\Priority\UpdatePriorityRequest;
use Illuminate\Validation\ValidationException;

class PriorityProgramController extends Controller
{
    protected $priorityProgram;

    public function __construct(Priority_program $priorityProgram)
    {
        $this->priorityProgram = $priorityProgram;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = $this->show();
        return view('admin.priority.index', [
            'programs' => $programs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.priority.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePriorityRequest $request)
    {
        try {
            $this->priorityProgram->storePriorityProgram(
                $request->input('prefix'), 
                $request->input('number'), 
                $request->input('name')
            );
            return redirect()->route('prog-prioritas.index')->with('success', 'Program prioritas berhasil ditambah.');;
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

     
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return $this->priorityProgram->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $priorityProgram = $this->priorityProgram->editPriorityProgram($id);

        return view('admin.priority.create-edit', [
            'programs' => $this->priorityProgram->get(),
            'selectedProgram' => $priorityProgram,
            'prefix' => $priorityProgram->separatedId()['prefix'],
            'number' => $priorityProgram->separatedId()['number'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePriorityRequest $request, $id): RedirectResponse
    {

        try {
            $this->priorityProgram->updatePriorityProgram(
                $id,
                $request->input('prefix'),
                $request->input('number'),
                $request->input('name')
            );
            return redirect()->route('prog-prioritas.index')->with('success', 'Data berhasil diperbarui.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestoryPriorityRequest $request)
    {
        try {
            $this->priorityProgram->destroyPriorityPrograms(
                $request->input('priority_ids')
            );
            return redirect()->route('prog-prioritas.index')->with('success', 'Data prioritas berhasil dihapus.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
      
    }

}
