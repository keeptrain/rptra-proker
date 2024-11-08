<?php

namespace App\Http\Controllers;

use App\Http\Requests\Principal\DestroyPrincipalRequest;
use App\Http\Requests\Principal\StorePrincipalRequest;
use App\Http\Requests\Principal\UpdatePrincipalRequest;
use App\Models\Main_program;
use App\Models\Priority_program;

class MainProgramController extends Controller
{
    protected $principalProgram;
    protected $priorityProgram;

    public function __construct(Main_program $principalProgram, Priority_program $priorityProgram)
    {
        $this->principalProgram = $principalProgram;
        $this->priorityProgram = $priorityProgram;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $principalPrograms = $this->principalProgram->getPaginate();

        return view('admin.principal.index', [
            'principalPrograms' => $principalPrograms, 
            'priorityPrograms' => $this->showPriority(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrincipalRequest $request)
    {
 
        $this->principalProgram->storePrincipalProgram(
            $request->input('prefix'),
            $request->input('number'),
            $request->input('priority_program'),
            $request->input('name')
        );

        return redirect()->route('prog-pokok.index')->withInput();
        
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //$indexView = $this->index();
        //$mainPrograms = Main_program::with('priorityProgram')->paginate(10);
        //return $indexView->with('selectedProgram', $main_program);
    
    }

    public function showPriority() {
        return $this->priorityProgram->get();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrincipalRequest $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyPrincipalRequest $request)
    {

        $this->principalProgram->destroyPrincipalPrograms(
            $request->input('main_ids'),
        );

        return redirect()->route('prog-pokok.index');
    }
}
