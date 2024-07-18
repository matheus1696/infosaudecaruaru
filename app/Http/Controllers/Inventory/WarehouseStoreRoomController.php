<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\WarehouseStoreRoom;
use App\Http\Requests\Inventory\StoreWarehouseStoreRoomRequest;
use App\Http\Requests\Inventory\UpdateWarehouseStoreRoomRequest;
use Illuminate\Http\Request;

class WarehouseStoreRoomController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWarehouseStoreRoomRequest $request)
    {
        //
        WarehouseStoreRoom::create($request->all());

        return redirect()->back()->with('success','Almoxarifado criado com sucesso');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWarehouseStoreRoomRequest $request, WarehouseStoreRoom $warehouseStoreRoom)
    {
        //
        $warehouseStoreRoom->update($request->all());

        return redirect()->back()->with('success','Almoxarifado alterado com sucesso');
    }

    /**
     * destroy the specified resource in storage.
     */
    public function destroy(WarehouseStoreRoom $warehouseStoreRoom)
    {
        //        
        $warehouseStoreRoom->delete();

        return redirect()->back()->with('success','Almoxarifado excluído com sucesso');
    }

    /**
     * Update the specified resource in storage.
     */
    public function status(Request $request, WarehouseStoreRoom $warehouseStoreRoom)
    {
        //
        $warehouseStoreRoom->update($request->all());

        return redirect()->back()->with('success','Almoxarifado alterado com sucesso');
    }
}
