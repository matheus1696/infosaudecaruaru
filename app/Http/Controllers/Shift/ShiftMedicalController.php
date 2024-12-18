<?php

namespace App\Http\Controllers\Shift;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shift\StoreShiftMedicalRequest;
use App\Http\Requests\Shift\UpdateShiftMedicalRequest;
use App\Models\Shifts\ShiftMedical;

class ShiftMedicalController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShiftMedicalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ShiftMedical $shiftMedical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShiftMedical $shiftMedical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShiftMedicalRequest $request, ShiftMedical $shiftMedical)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShiftMedical $shiftMedical)
    {
        //
    }
}
