<?php

namespace App\Http\Controllers\Admin\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Hospital\HospitalRoomClassification;
use App\Http\Requests\StoreHospitalRoomClassificationRequest;
use App\Http\Requests\UpdateHospitalRoomClassificationRequest;
use Illuminate\Http\Request;

class HospitalRoomClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view( 'admin.hospital.room_classification.room_classification_index');
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
    public function store(StoreHospitalRoomClassificationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HospitalRoomClassification $hospitalRoomClassification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HospitalRoomClassification $hospitalRoomClassification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHospitalRoomClassificationRequest $request, HospitalRoomClassification $hospitalRoomClassification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HospitalRoomClassification $hospitalRoomClassification)
    {
        //
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function status(Request $request, HospitalRoomClassification $hospitalRoomClassification)
    {
        //
        $hospitalRoomClassification->update($request->all());

        return redirect()->back()->with('success','Status alterado com sucesso');
    }
}
