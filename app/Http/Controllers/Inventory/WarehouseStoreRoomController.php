<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\WarehouseStoreRoom;
use App\Http\Requests\Inventory\StoreWarehouseStoreRoomRequest;
use App\Http\Requests\Inventory\UpdateWarehouseStoreRoomRequest;

class WarehouseStoreRoomController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWarehouseStoreRoomRequest $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWarehouseStoreRoomRequest $request, WarehouseStoreRoom $warehouseStoreRoom)
    {
        //
    }

    /**
     * destroy the specified resource in storage.
     */
    public function destroy(WarehouseStoreRoom $warehouseStoreRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function status(WarehouseStoreRoom $warehouseStoreRoom)
    {
        //
    }
}
