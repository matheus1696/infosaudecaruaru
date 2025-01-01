<?php

namespace App\Http\Controllers\Admin\Hospital\Bed;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\Bed\StoreHospitalBedStatusRequest;
use App\Http\Requests\Hospital\Bed\UpdateHospitalBedStatusRequest;
use App\Models\Hospital\Bed\HospitalBedStatus;
use Illuminate\Http\Request;

class HospitalBedStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.hospital.bed.status.bed_status_index');

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
        HospitalBedStatus::create($request->all());

        return redirect()->back()->with('success','Status criado com sucesso');
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
