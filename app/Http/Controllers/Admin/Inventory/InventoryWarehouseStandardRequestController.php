<?php

namespace App\Http\Controllers\Admin\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseStandardRequest\StoreInventoryWarehouseStandardRequestRequest;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseStandardRequest\UpdateInventoryWarehouseStandardRequestRequest;
use App\Models\Consumable\Consumable;
use App\Models\Consumable\ConsumableType;
use App\Models\Inventory\InventoryWarehouseStandardRequest;
use App\Models\Inventory\InventoryWarehouseStandardRequestList;
use App\Services\Logger;
use Illuminate\Http\Request;

class InventoryWarehouseStandardRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $db = InventoryWarehouseStandardRequest::with('ConsumableType')->orderBy('title')->paginate(20);
        return view('admin.inventory.warehouse.standard_request.standard_request_index', compact('db'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $dbConsumableTypes = ConsumableType::orderBy('title')->get();
        return view('admin.inventory.warehouse.standard_request.standard_request_create',compact('dbConsumableTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInventoryWarehouseStandardRequestRequest $request)
    {
        //
        $db = InventoryWarehouseStandardRequest::create($request->all());
        return redirect()->route('standard_requests.show',['standard_request'=>$db->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $db = InventoryWarehouseStandardRequest::find($id);

        if (!$db) {
            return redirect(route('standard_requests.index'));
        }

        $dbConsumables = Consumable::where('status',TRUE)->where('consumable_type_id',$db->consumable_type_id)->get();
        $dbStandardRequestLists = InventoryWarehouseStandardRequestList::where('standard_request_id',$db->id)->paginate(20);

        return view('admin.inventory.warehouse.standard_request.standard_request_show',compact('db','dbConsumables','dbStandardRequestLists'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $db = InventoryWarehouseStandardRequest::find($id);

        if (!$db) {
            return redirect(route('standard_requests.index'));
        }

        $dbConsumableTypes = ConsumableType::all();

        return view('admin.inventory.warehouse.standard_request.standard_request_edit',compact('db','dbConsumableTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInventoryWarehouseStandardRequestRequest $request, string $id)
    {
        //
        $db = InventoryWarehouseStandardRequest::find($id);        

        if (!$db) {
            return redirect(route('standard_requests.index'));
        }

        $db->update($request->all());
        return redirect()->route('standard_requests.show',['standard_request'=>$db->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(){ return redirect(route('standard_requests.index'));}

    /**
     * Update the status of the specified item in storage.
     */
    public function status(Request $request, string $id)
    {
        //Salvando Dados
        $db = InventoryWarehouseStandardRequest::find($id);
        $db->update($request->only('status'));

        //Log do Sistema
        Logger::status($db->id, $db->status);

        return redirect(route('standard_requests.index'))->with('success','Status alterado com sucesso.');
    }
}
