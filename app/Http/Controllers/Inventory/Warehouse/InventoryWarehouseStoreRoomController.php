<?php

namespace App\Http\Controllers\Inventory\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseStoreRoom\StoreInventoryWarehouseStoreRoomEntryStoreRequest;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseStoreRoom\StoreInventoryWarehouseStoreRoomExitStoreRequest;
use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\Consumable\Consumable;
use App\Models\Inventory\InventoryWarehouseStoreRoom;
use App\Models\Inventory\InventoryWarehouseStoreRoomHistory;
use Illuminate\Cache\RateLimiting\Limit;
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

        //
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

        //
        return view('inventory.warehouse.store_room.store_room_show', compact('db','dbDepartment'));
    }

    /**
     * Display the specified resource.
     */
    public function requestShow(string $id)
    {
        //
        $db = CompanyEstablishmentDepartment::find($id);

        //
        return view('inventory.warehouse.store_room.request.store_room_request_show', compact('db'));
    }    

    /**
     * Display the specified resource.
     */
    public function requestCreate(string $id)
    {
        //
        $dbDepartment = CompanyEstablishmentDepartment::find($id);

        //
        return view('inventory.warehouse.store_room.request.store_room_request_create', compact('dbDepartment'));
    }

    /**
     * Display the specified resource.
     */
    public function entryShow(string $id)
    {
        //
        $db = CompanyEstablishmentDepartment::find($id);
        $dbConsumables = Consumable::orderBy('title')->get();
        $dbHistories = InventoryWarehouseStoreRoomHistory::where('movement','Entrada')->orderBy('created_at','DESC')->limit(20)->get();

        //
        return view('inventory.warehouse.store_room.store_room_entry', compact('db','dbHistories','dbConsumables'));
    }

    /**
     * Display the specified resource.
     */
    public function entryStore(StoreInventoryWarehouseStoreRoomEntryStoreRequest $request, string $id)
    {
        //
        $dbDepartment = CompanyEstablishmentDepartment::find($id);
        $request['movement'] = 'Entrada';
        $request['department_id'] = $dbDepartment->id;
        $request['establishment_id'] = $dbDepartment->establishment_id;
        $request['user_id'] = Auth::user()->id;

        //
        $db = InventoryWarehouseStoreRoom::where('consumable_id',$request['consumable_id'])
        ->where('department_id',$request['department_id'])
        ->first();

        if (!$db) {
            InventoryWarehouseStoreRoom::create($request->all());
            return redirect()->back()->with('success','Cadastro realizado com sucesso');
        }

        $db->quantity += $request['quantity'];
        $db->save();

        //
        InventoryWarehouseStoreRoomHistory::create($request->all());
        
        //
        return redirect()->back()->with('success','Cadastro realizado com sucesso');;
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
}
