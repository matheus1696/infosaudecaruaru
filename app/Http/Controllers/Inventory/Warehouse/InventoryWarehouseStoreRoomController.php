<?php

namespace App\Http\Controllers\Inventory\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseStoreRoom\StoreInventoryWarehouseStoreroomRequest;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseStoreRoom\UpdateInventoryWarehouseStoreRoomRequest;
use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\Inventory\InventoryWarehouseStoreRoom;

class InventoryWarehouseStoreRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $db = CompanyEstablishmentDepartment::where('has_inventory_warehouse_store_room',TRUE)
            ->with('CompanyEstablishment')->paginate(20);

        return view('inventory.warehouse.store_room.store_room_index', compact('db'));
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
    public function store(StoreInventoryWarehouseStoreroomRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InventoryWarehouseStoreRoom $inventoryWarehouseStoreRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InventoryWarehouseStoreRoom $inventoryWarehouseStoreRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInventoryWarehouseStoreRoomRequest $request, InventoryWarehouseStoreRoom $inventoryWarehouseStoreRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InventoryWarehouseStoreRoom $inventoryWarehouseStoreRoom)
    {
        //
    }
}
