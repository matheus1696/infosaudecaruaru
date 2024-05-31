<?php

namespace App\Http\Controllers\Inventory\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseStoreRoom\StoreInventoryWarehouseStoreRoomExitStoreRequest;
use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\Inventory\InventoryWarehouseStoreRoom;
use App\Models\Inventory\InventoryWarehouseStoreRoomHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $db = InventoryWarehouseStoreRoom::where('department_id',$id)->paginate(20);
        $dbDepartment = CompanyEstablishmentDepartment::find($id);

        return view('inventory.warehouse.store_room.store_room_show', compact('db','dbDepartment'));
    }

    /**
     * Display the specified resource.
     */
    public function exitStore(StoreInventoryWarehouseStoreRoomExitStoreRequest $request, string $id)
    {
        //
        $db = InventoryWarehouseStoreRoom::find($id);
        $db->quantity -= $request['quantity'];
        $db->save();

        //
        InventoryWarehouseStoreRoomHistory::create([
            'quantity'=>$request['quantity'],
            'movement'=>'Saída',
            'consumable_id'=>$db->consumable_id,
            'department_id'=>$db->department_id,
            'establishment_id'=>$db->establishment_id,
            'user_id'=>Auth::user()->id,
        ]);

        //
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function entryShow(Request $request, string $id)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function entryStore(Request $request, string $id)
    {
        //
    }    

    /** * Show the form for creating a new resource. */
    public function create(){ return redirect()->route('home');}

    /** * Store a newly created resource in storage. */
    public function store(){ return redirect()->route('home');} 

    /** * Show the form for editing the specified resource. */
    public function edit(){ return redirect()->route('home');}

    /** * Update the specified resource in storage. */
    public function update(){ return redirect()->route('home');}

    /** * Remove the specified resource from storage. */
    public function destroy(){ return redirect()->route('home');}
}
