<?php

namespace App\Http\Controllers;

use App\Models\Priority_program;
use App\Http\Requests\StorePriority_programRequest;
use App\Http\Requests\UpdatePriority_programRequest;
use App\Http\Requests\Destroy\DestroyPriority_programRequest;
use App\Models\Main_program;
use Illuminate\Http\RedirectResponse;

class PriorityProgramController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Priority_program::paginate(8);
        return view('admin.priority.index', ['programs' => $programs]);
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
        
        return redirect()->route('prog-prioritas.index')->with('alert', [
            'type' => 'blue', // Atau warna lain seperti 'red', 'yellow'
            'title' => 'Success fail',
            'message' => 'Program berhasil ditambahkan',
        ]);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Priority_program $priority_program)
    {
        /*$programs = $priority_program::paginate(8);
        return view('admin.priority.index', ['programs' => $programs]);*/
         // Memanggil method index untuk mendapatkan data program
        $indexView = $this->index();

        // Tambahkan data spesifik dari show jika dibutuhkan
        return $indexView->with('selectedProgram', $priority_program);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        $program = Priority_program::findOrFail($id);
  
    
        return view('admin.priority.edit', [
            'selectedProgram' => $program,
          
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePriority_programRequest $request, string $id) : RedirectResponse
    {
        //
        return redirect('program-kerja/prioritas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyPriority_programRequest $request)
    {
        $ids = $request->input('priority_ids');
        Priority_program::whereIn('id', $ids)->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('prog-prioritas.index')->with('success', 'Program yang dipilih berhasil dihapus.');
    }
}
