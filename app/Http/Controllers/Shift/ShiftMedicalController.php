<?php

namespace App\Http\Controllers\Shift;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shift\StoreShiftMedicalRequest;
use App\Http\Requests\Shift\UpdateShiftMedicalRequest;
use App\Models\Shifts\ShiftMedical;
use App\Services\Logger;

class ShiftMedicalController extends Controller
{
    /*
     * Controller access permission resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:shift_medical|sysadmin|admin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Log do Sistema
        Logger::access();

        return view('shift.shift_medical.shift_medical_index');
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
        ShiftMedical::create($request->all());

        return redirect()->back();
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
        $shiftMedical->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShiftMedical $shiftMedical)
    {
        //
    }
}
