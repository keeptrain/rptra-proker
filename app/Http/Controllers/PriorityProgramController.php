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
        $paginate = $this->priorityProgram->get();
        return view('admin.priority.index', [
            'programs' => $paginate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //return view('admin.priority.priority-program');
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
    public function show(Priority_program $priority_program)
    {
        /*$programs = $priority_program::paginate(8);
        return view('admin.priority.index', ['programs' => $programs]);*/
        // Memanggil method index untuk mendapatkan data program
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $priorityProgram = $this->priorityProgram->editPriorityProgram($id);

        return view('admin.priority.index', [
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
            return redirect()->route('prog-prioritas.index')->with('success', 'Data berhasil diperbarui.');;;
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestoryPriorityRequest $request)
    {
        $this->priorityProgram->destroyPriorityPrograms(
            $request->input('priority_ids')
        );

        return redirect()->route('prog-prioritas.index');
    }

}
