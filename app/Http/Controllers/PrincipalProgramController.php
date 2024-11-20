<?php

namespace App\Http\Controllers;

use App\Http\Requests\Principal\DestroyPrincipalRequest;
use App\Http\Requests\Principal\StorePrincipalRequest;
use App\Http\Requests\Principal\UpdatePrincipalRequest;
use App\Models\Main_program;
use App\Models\Principal_program;
use App\Models\Priority_program;
use Illuminate\Validation\ValidationException;

class PrincipalProgramController extends Controller
{
    protected $principalProgram;
    protected $priorityProgram;

    public function __construct(Principal_program $principalProgram, Priority_program $priorityProgram)
    {
        $this->principalProgram = $principalProgram;
        $this->priorityProgram = $priorityProgram;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $principalPrograms = $this->principalProgram->get();

        return view('admin.principal.index', [
            'principalPrograms' => $principalPrograms, 
            'priorityPrograms' => $this->priorityProgram->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.principal.create', [
         
            'priorityPrograms' => $this->priorityProgram->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrincipalRequest $request)
    {
        try {
            $this->principalProgram->storePrincipalProgram(
                $request->input('prefix'),
                $request->input('number'),
                $request->input('priority_program'),
                $request->input('name')
            );
            return redirect()->route('prog-pokok.index')->with('success', 'Program pokok berhasil ditambah.');;
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }    
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $principalProgram = $this->principalProgram->editPrincipalProgram($id);

        return view('admin.principal.index',[
            'selectedProgram' =>  $principalProgram,
            'priorityPrograms' => $this->priorityProgram->get(),
            'prefix' => $principalProgram->separatedId()['prefix'],
            'number' => $principalProgram->separatedId()['number'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrincipalRequest $request, $id)
    {
        try {
            $this->principalProgram->updatePrincipalProgram(
                $id,
                $request->input('priority_program'),
                $request->input('prefix'),
                $request->input('number'),
                $request->input('name'),
            );
            return redirect()->route('prog-pokok.index')->with('success', 'Program pokok berhasil ditambah');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyPrincipalRequest $request)
    {

        $this->principalProgram->destroyPrincipalPrograms(
            $request->input('principal_ids'),
        );

        return redirect()->route('prog-pokok.index')->with('success', 'Program pokok berhasil di hapus');;
    }
}
