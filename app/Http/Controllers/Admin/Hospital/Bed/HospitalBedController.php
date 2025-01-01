<?php

namespace App\Http\Controllers\Admin\Hospital\Bed;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\Bed\StoreHospitalBedRequest;
use App\Http\Requests\Hospital\Bed\UpdateHospitalBedRequest;
use App\Models\Hospital\Bed\HospitalBed;
use Illuminate\Http\Request;

class HospitalBedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view( 'admin.hospital.bed.bed_index');
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
    public function store(StoreHospitalBedRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HospitalBed $hospitalBed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HospitalBed $hospitalBed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHospitalBedRequest $request, HospitalBed $hospitalBed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HospitalBed $hospitalBed)
    {
        //
    }  

    /**
     * Remove the specified resource from storage.
     */
    public function status(Request $request, HospitalBed $hospitalBed)
    {
        //
        $hospitalBed->update($request->all());

        return redirect()->back()->with('success','Status alterado com sucesso');
    }
}
