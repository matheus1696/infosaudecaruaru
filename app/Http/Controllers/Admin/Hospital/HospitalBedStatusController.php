<?php

namespace App\Http\Controllers\Admin\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Hospital\HospitalBedStatus;
use App\Http\Requests\StoreHospitalBedStatusRequest;
use App\Http\Requests\UpdateHospitalBedStatusRequest;
use Illuminate\Http\Request;

class HospitalBedStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.hospital.bed_status.bed_status_index');

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
    public function store(StoreHospitalBedStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HospitalBedStatus $hospitalBedStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HospitalBedStatus $hospitalBedStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHospitalBedStatusRequest $request, HospitalBedStatus $hospitalBedStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HospitalBedStatus $hospitalBedStatus)
    {
        //
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function status(Request $request, HospitalBedStatus $hospitalBedStatus)
    {
        //
        $hospitalBedStatus->update($request->all());

        return redirect()->back()->with('success','Status alterado com sucesso');
    }
}
