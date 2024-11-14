<?php

namespace App\Http\Controllers;

use App\Models\Fleet\FleetModels;
use App\Http\Requests\StoreFleetModelsRequest;
use App\Http\Requests\UpdateFleetModelsRequest;
use App\Models\Fleet\FleetManufacturer;

class FleetModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $db = FleetModels::paginate();

        return view('admin.fleet.fleet_model.fleet_model_index', compact('db'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $dbFleetManufacturers = FleetManufacturer::all();

        return view('admin.fleet.fleet_model.fleet_model_create', compact('dbFleetManufacturers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFleetModelsRequest $request)
    {
        //
        FleetModels::create($request->all);

        return redirect()->route('fleet_models.index')->with('sucess','Modelo de Veículo cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FleetModels $fleetModels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $db = FleetModels::find($id);
        $dbFleetManufacturers = FleetManufacturer::all();

        return view('admin.fleet.fleet_model.fleet_model_edit', compact('db','dbFleetManufacturers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFleetModelsRequest $request, FleetModels $fleetModels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FleetModels $fleetModels)
    {
        //
    }
}
