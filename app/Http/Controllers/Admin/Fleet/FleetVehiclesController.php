<?php

namespace App\Http\Controllers\Admin\Fleet;

use App\Http\Controllers\Controller;
use App\Models\Fleet\FleetVehicles;
use App\Http\Requests\StoreFleetVehiclesRequest;
use App\Http\Requests\UpdateFleetVehiclesRequest;
use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyFinancialBlock;
use App\Models\Fleet\FleetModels;

class FleetVehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $db = FleetVehicles::orderBy('model_id')->get();

        return view('fleet.fleet_vehicle.fleet_vehicle_index', compact('db'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $dbFleetModels = FleetModels::orderBy('manufacturer_id')->orderBy('model')->orderBy('engine')->get();
        $dbEstablishments = CompanyEstablishment::all();
        $dbFinancialBlocks = CompanyFinancialBlock::all();

        return view('fleet.fleet_vehicle.fleet_vehicle_create', compact('dbFleetModels','dbEstablishments','dbFinancialBlocks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFleetVehiclesRequest $request)
    {
        //
        $request['current_odometer'] = $request['inicial_odometer'];

        FleetVehicles::create($request->all());

        return redirect()->route('fleet_vehicles.index')->with('success','Veículo incluido na frota');
    }

    /**
     * Display the specified resource.
     */
    public function show(FleetVehicles $fleetVehicles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $db = FleetVehicles::find($id);
        $dbFleetModels = FleetModels::all();
        $dbEstablishments = CompanyEstablishment::all();
        $dbFinancialBlocks = CompanyFinancialBlock::all();

        return view('fleet.fleet_vehicle.fleet_vehicle_edit', compact('db','dbFleetModels','dbEstablishments','dbFinancialBlocks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFleetVehiclesRequest $request, string $id)
    {
        //        
        $db = FleetVehicles::find($id);
        $db->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FleetVehicles $fleetVehicles)
    {
        //
    }
}
