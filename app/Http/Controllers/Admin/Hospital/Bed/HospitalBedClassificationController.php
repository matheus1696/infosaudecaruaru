<?php

namespace App\Http\Controllers\Admin\Hospital\Bed;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hospital\Bed\StoreHospitalBedClassificationRequest;
use App\Http\Requests\Hospital\Bed\UpdateHospitalBedClassificationRequest;
use App\Models\Hospital\Bed\HospitalBedClassification;
use Illuminate\Http\Request;

class HospitalBedClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view( 'admin.hospital.bed.classification.bed_classification_index');
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
    public function store(StoreHospitalBedClassificationRequest $request)
    {
        //
        HospitalBedClassification::create($request->all());

        return redirect()->back()->with('success','Classificação criada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(HospitalBedClassification $hospitalBedClassification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HospitalBedClassification $hospitalBedClassification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHospitalBedClassificationRequest $request, HospitalBedClassification $hospitalBedClassification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HospitalBedClassification $hospitalBedClassification)
    {
        //
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function status(Request $request, HospitalBedClassification $hospitalBedClassification)
    {
        //
        $hospitalBedClassification->update($request->all());

        return redirect()->back()->with('success','Status alterado com sucesso');
    }
}
