<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\StoreInventoryStoreRoomRequest;
use App\Http\Requests\Inventory\UpdateInventoryStoreRoomRequest;
use App\Models\Inventory\InventoryStoreRoom;
use Illuminate\Http\Request;

class InventoryStoreRoomController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInventoryStoreRoomRequest $request)
    {
        //
        InventoryStoreRoom::create($request->all());

        return redirect()->back()->with('success','Almoxarifado criado com sucesso');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInventoryStoreRoomRequest $request, InventoryStoreRoom $inventoryStoreRoom)
    {
        //
        $inventoryStoreRoom->update($request->all());

        return redirect()->back()->with('success','Almoxarifado alterado com sucesso');
    }

    /**
     * destroy the specified resource in storage.
     */
    public function destroy(InventoryStoreRoom $inventoryStoreRoom)
    {
        //        
        $inventoryStoreRoom->delete();

        return redirect()->back()->with('success','Almoxarifado excluído com sucesso');
    }

    /**
     * Update the specified resource in storage.
     */
    public function status(Request $request, InventoryStoreRoom $inventoryStoreRoom)
    {
        //
        $inventoryStoreRoom->update($request->all());

        return redirect()->back()->with('success','Almoxarifado alterado com sucesso');
    }
}
