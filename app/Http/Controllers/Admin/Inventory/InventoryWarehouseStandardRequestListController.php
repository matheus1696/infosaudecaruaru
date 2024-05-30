<?php

namespace App\Http\Controllers\Admin\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseStandardRequest\StoreInventoryWarehouseStandardRequestListRequest;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseStandardRequest\UpdateInventoryWarehouseStandardRequestListRequest;
use App\Models\Inventory\InventoryWarehouseStandardRequest;
use App\Models\Inventory\InventoryWarehouseStandardRequestList;

class InventoryWarehouseStandardRequestListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreInventoryWarehouseStandardRequestListRequest $request)
    {
        //
        $VerifyConsumable = InventoryWarehouseStandardRequestList::where('standard_request_id',$request['standard_request_id'])
        ->where('consumable_id',$request['consumable_id'])
        ->first();

        if ($VerifyConsumable) {            
            return redirect()->back()->with('error','Suprimento existente nessa lista');
        }

        $db = InventoryWarehouseStandardRequestList::create($request->all());        

        return redirect()->route('standard_requests.show',['standard_request'=>$db->standard_request_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(InventoryWarehouseStandardRequestList $inventoryWarehouseStandardRequestList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InventoryWarehouseStandardRequestList $inventoryWarehouseStandardRequestList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInventoryWarehouseStandardRequestListRequest $request, string $id)
    {
        //
        $db = InventoryWarehouseStandardRequestList::find($id);        

        if (!$db) {
            return redirect()->route('standard_requests.index')->with('error','Lista de Materiais não cadastrada.');
        }

        if ($request['quantity'] < 0) {
            return redirect()->route('standard_requests.show',['standard_request'=>$db->standard_request_id])
                ->with('error','Quantidade informada menor que zero.');
        }

        $db->update($request->only('quantity'));

        return redirect()->route('standard_requests.show',['standard_request'=>$db->standard_request_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $db = InventoryWarehouseStandardRequestList::find($id);        

        if (!$db) {
            return redirect(route('standard_requests.index'));
        }

        $db->delete();

        return redirect()->route('standard_requests.show',['standard_request'=>$db->standard_request_id]);
    }
}
