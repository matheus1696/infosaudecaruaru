<?php

namespace App\Http\Controllers\Fleet;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFleetOdometerRequest;
use App\Models\Fleet\FleetVehicles;
use App\Http\Requests\StoreFleetVehiclesRequest;
use App\Http\Requests\UpdateFleetVehiclesRequest;
use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyFinancialBlock;
use App\Models\Fleet\FleetModels;
use App\Models\Fleet\FleetOdometer;

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
        $request['license_plate'] = strtoupper($request['license_plate']);

        FleetVehicles::create($request->all());

        return redirect()->route('fleet_vehicles.index')->with('success','Veículo incluido na frota');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $db = FleetVehicles::find($id);

        return view('fleet.fleet_vehicle.fleet_vehicle_show', compact('db'));

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
        $request['license_plate'] = strtoupper($request['license_plate']);

        $db = FleetVehicles::find($id);
        $db->update($request->all());

        return redirect()->route('fleet_vehicles.show',['fleet_vehicle'=>$db->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FleetVehicles $fleetVehicles)
    {
        //
    }    

    /**
     * 
     */
    public function create_category(string $id, string $category)
    {
        //
        $db = FleetVehicles::find($id);

        return view('fleet.fleet_vehicle.fleet_vehicle_create_fuel',compact('db'));
    } 

    /**
     * 
     */
    public function store_category(StoreFleetOdometerRequest $request, string $id, string $category)
    {
        //
        $request['vehicle_id'] = $id;
        $request['category_service'] = $category;

        FleetOdometer::create($request->all());

        $dbFleetVehicle = FleetVehicles::find($id);
        $dbFleetVehicle->current_odometer = $request['odometer'];
        $dbFleetVehicle->save();

        return redirect()->route('fleet_vehicles.show',['fleet_vehicle'=>$id]);
    }
}
