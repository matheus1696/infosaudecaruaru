<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\StoreInventoryStoreRoomPermissionRequest;
use App\Http\Requests\Inventory\StoreInventoryStoreRoomRequest;
use App\Http\Requests\Inventory\UpdateInventoryStoreRoomRequest;
use App\Models\Inventory\InventoryStoreRoom;
use App\Models\Inventory\InventoryStoreRoomItem;
use App\Models\Inventory\InventoryStoreRoomPermission;
use Illuminate\Http\Request;

class InventoryStoreRoomController extends Controller
{
    
    /*
     * Controller access permission resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:inventory_store_room|sysadmin|admin']);
    }

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
        $dbItem = InventoryStoreRoomItem::where('inventory_store_room_id',$inventoryStoreRoom->id)->count();

        if ($dbItem <= 0) {
            $inventoryStoreRoom->delete();
    
            return redirect()->back()->with('success','Almoxarifado excluído com sucesso');
        } else {

            $inventoryStoreRoom->update([
                'status' => FALSE
            ]);

            return redirect()->back()->with('error','Almoxarifado contém itens cadastrados, realizada somente a desativação');
        }        
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

    /**
     * Update the specified resource in storage.
     */
    public function permission(StoreInventoryStoreRoomPermissionRequest $request)
    {
        //
        $dbPermission = InventoryStoreRoomPermission::where('user_id',$request['id'])
        ->where('inventory_store_room_id',$request['inventory_store_room_id'])
        ->count();

        if ($dbPermission <= 0) {
            InventoryStoreRoomPermission::create($request->all());
            
            return redirect()->back()->with('success','Permissão aplicada com sucesso');
        } else {
            return redirect()->back()->with('error','Usuário com permissão atribuida ao almoxarifado selecionado');
        }
    }
}