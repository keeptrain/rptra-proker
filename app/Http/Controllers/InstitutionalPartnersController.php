<?php

namespace App\Http\Controllers;

use App\Models\Institutional_partners;
use App\Http\Requests\StoreInstitutional_partnersRequest;
use App\Http\Requests\UpdateInstitutional_partnersRequest;

class InstitutionalPartnersController extends Controller
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
        return view('admin.institutional-partners.show');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstitutional_partnersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Institutional_partners $institutional_partners)
    {
        $instituionalPartners = $institutional_partners::all();
        return view('admin.institutional-partners.show', ['programs' => $instituionalPartners]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Institutional_partners $institutional_partners)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstitutional_partnersRequest $request, Institutional_partners $institutional_partners)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institutional_partners $institutional_partners)
    {
        //
    }
}
