<?php

namespace App\Http\Controllers;



use App\Http\Requests\InstitutionalPartners\UpdatePartnersRequest;
use App\Models\Institutional_partners;
use App\Http\Requests\InstitutionalPartners\StorePartnersRequest;
use App\Http\Requests\InstitutionalPartners\DestroyPartnersRequest;

class InstitutionalPartnersController extends Controller
{

    protected $institutionalPartner;

    public function __construct(Institutional_partners $institutionalPartner)
    {
        $this->institutionalPartner= $institutionalPartner;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginate = $this->institutionalPartner->getPaginate();
        return view('admin.institutional-partners.index', [
            'institutionalPartners' => $paginate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.institutional-partners.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnersRequest $request)
    {
        $this->institutionalPartner->storeInstituionalPartner(
            $request->input('prefix'),
            $request->input('number'),
            $request->input('name')
        );
        
        return redirect()->route('prog-mitra.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Institutional_partners $institutional_partners)
    {
        $instituionalPartners = $institutional_partners::all();
        return view('admin.institutional-partners.show', ['institutionalPartnersShow' => $instituionalPartners]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {

        $partner = $this->institutionalPartner->editInstitutionalParner($id);

        return view('admin.institutional-partners.index',[
            'selectedProgram' => $partner,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnersRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyPartnersRequest $request)
    {
    
        $this->institutionalPartner->destroyInstituionalPartners(
            $request->input('partner_ids'),
        );

        return redirect()->route('prog-mitra.index');
    }
}
