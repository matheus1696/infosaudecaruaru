<?php

namespace App\Http\Controllers\Inventory\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseStoreRoom\StoreInventoryWarehouseStoreRoomEntryStoreRequest;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseStoreRoom\StoreInventoryWarehouseStoreRoomExitStoreRequest;
use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\Consumable\Consumable;
use App\Models\Inventory\InventoryWarehouseStandardRequest;
use App\Models\Inventory\InventoryWarehouseStandardRequestList;
use App\Models\Inventory\InventoryWarehouseStoreRoom;
use App\Models\Inventory\InventoryWarehouseStoreRoomHistory;
use App\Models\Inventory\InventoryWarehouseStoreRoomRequest;
use App\Models\Inventory\InventoryWarehouseStoreRoomRequestDetail;
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
        $dbRequests = InventoryWarehouseStoreRoomRequest::where('department_id',$id)->where('status','!=','Cancelado')->paginate(20);

        //
        return view('inventory.warehouse.store_room.request.store_room_request_show', compact('db','dbRequests'));
    }    

    /**
     * Display the specified resource.
     */
    public function requestCreate(string $id)
    {
        //
        $dbDepartment = CompanyEstablishmentDepartment::find($id);

        $db = InventoryWarehouseStoreRoomRequest::create([
            'code'=>date('ymdHis'),
            'department_contact'=>$dbDepartment->contact,
            'department_extension'=>$dbDepartment->extension,
            'user_contact_1'=>Auth::user()->contact_1,
            'user_contact_2'=>Auth::user()->contact_2,
            'count'=>0,
            'status'=>'Aberto',
            'department_id'=>$id,
            'user_id'=>Auth::user()->id,
        ]);

        //
        return redirect()->route('store_rooms.requestEdit',['request'=>$db->id]);
    }

    /**
     * Display the specified resource.
     */
    public function requestEdit(string $id)
    {
        //
        $db = InventoryWarehouseStoreRoomRequest::find($id);
        $dbRequestDetails = InventoryWarehouseStoreRoomRequestDetail::where('store_room_request_id',$id)->paginate(50);
        $dbStoreRoomInventories = InventoryWarehouseStoreRoom::where('department_id',$db->department_id)->get();
        $dbConsumables = Consumable::orderBy('title')->get();
        $dbStandardRequests = InventoryWarehouseStandardRequest::orderBy('title')->get();

        //
        return view('inventory.warehouse.store_room.request.store_room_request_edit', compact('db','dbRequestDetails','dbStoreRoomInventories','dbConsumables','dbStandardRequests'));
    }   

    /**
     * Display the specified resource.
     */
    public function requestStandardRequest(Request $request, string $id)
    {
        //
        $dbStandardRequests = InventoryWarehouseStandardRequestList::where('standard_request_id',$request['standard_request'])->get();

        foreach ($dbStandardRequests as $key => $dbStandardRequest) {

            $dbRequestDetails = InventoryWarehouseStoreRoomRequestDetail::where('store_room_request_id',$id)
            ->where('consumable_id',$dbStandardRequest->consumable_id)
            ->first();

            if (!$dbRequestDetails) {
                InventoryWarehouseStoreRoomRequestDetail::create([
                    'quantity'=>$dbStandardRequest->quantity,
                    'consumable_id'=>$dbStandardRequest->consumable_id,
                    'store_room_request_id'=>$id,
                ]);
            }
        }

        if ($request['standardRequestDestroy']) {

            $dbRequestDetails = InventoryWarehouseStoreRoomRequestDetail::where('store_room_request_id',$id)->get();

            foreach ($dbRequestDetails as $key => $dbRequestDetail) {
                $dbRequestDetail->delete();
            }
        }

        //
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function requestUpdate(Request $request, string $id)
    {
        //
        if ($request['department_contact'] || $request['department_extension'] || $request['user_contat_1'] || $request['user_contat_2']) {
            $db = InventoryWarehouseStoreRoomRequest::find($id);
            $db->update($request->all());
        }

        //
        if ($request['quantity'] && $request['consumable_id']) {

            $dbRequestDetails = InventoryWarehouseStoreRoomRequestDetail::where('store_room_request_id',$id)
            ->where('consumable_id',$request['consumable_id'])
            ->first();

            if ($dbRequestDetails) {
                return redirect()->back()->with('error','O suprimento '. $dbRequestDetails->Consumable->title .' existente na tabela abaixo');
            }

            $request['store_room_request_id'] = $id;
            InventoryWarehouseStoreRoomRequestDetail::create($request->all());

            //
            $dbRequestCount = InventoryWarehouseStoreRoomRequestDetail::where('store_room_request_id',$id)->count();
            $db = InventoryWarehouseStoreRoomRequest::find($id);            
            $db->count = $dbRequestCount;
            $db->save();
        }
        
        //
        if ($request['quantityEdit'] && $request['consumableEdit']) {
            $dbRequestDetailsEdit = InventoryWarehouseStoreRoomRequestDetail::where('store_room_request_id',$id)
            ->where('consumable_id',$request['consumableEdit'])
            ->first();
            
            $dbRequestDetailsEdit->quantity = $request['quantityEdit'];
            $dbRequestDetailsEdit->save();
        }

        //
        return redirect()->back();
    }    

    /**
     * Display the specified resource.
     */
    public function requestStatus(string $id)
    {
        //
        $dbRequest = InventoryWarehouseStoreRoomRequest::find($id);
        $dbRequest->status = "Cancelado";
        $dbRequest->save();

        //
        return redirect()->route('store_rooms.show',['store_room'=>$dbRequest->department_id]);
    }

    /**
     * Display the specified resource.
     */
    public function requestDelete(string $id)
    {
        //
        $dbRequestDetails = InventoryWarehouseStoreRoomRequestDetail::find($id);
        $dbRequestDetails->delete();

        //
        return redirect()->back();
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

        //
        $request['movement'] = 'Entrada';
        $request['department_id'] = $dbDepartment->id;
        $request['establishment_id'] = $dbDepartment->establishment_id;
        $request['user_id'] = Auth::user()->id;

        //
        InventoryWarehouseStoreRoomHistory::create($request->all());

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
