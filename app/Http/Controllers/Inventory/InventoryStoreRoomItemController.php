<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\StoreInventoryStoreRoomItemRequest;
use App\Models\Consumable\Consumable;
use App\Models\Inventory\InventoryStoreRoom;
use App\Models\Inventory\InventoryStoreRoomHistory;
use App\Models\Inventory\InventoryStoreRoomItem;
use App\Models\Inventory\InventoryStoreRoomPermission;
use Illuminate\Support\Facades\Auth;

class InventoryStoreRoomItemController extends Controller
{
    
    /*
     * Controller access permission resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:inventory_store_room|sysadmin|admin']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dbPermissions = InventoryStoreRoomPermission::where('user_id',Auth::user()->id)->get();

        if ($dbPermissions->count() <= 0) {
            $dbStoreRooms = FALSE;
        }

        if ($dbPermissions->count() == 1) {
            return redirect()->route('inventory_store_room_items.show',['inventory_store_room_item'=>$dbPermissions->first()->inventory_store_room_id]);
        }        

        if ($dbPermissions->count() > 1) {

            $dbStoreRooms = InventoryStoreRoom::query();

            foreach ($dbPermissions as $key => $dbPermission) {
                if ($dbPermission->user_id == Auth::user()->id) {
                    $dbStoreRooms->orWhere('inventory_store_room_id', $dbPermission->inventory_store_room_id);
                }
            }
        }
    
        return view('inventory.store_room.store_room_index', compact('dbStoreRooms'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $dbPermissions = InventoryStoreRoomPermission::where('user_id',Auth::user()->id)
        ->where('inventory_store_room_id',$id)
        ->first();

        if (!$dbPermissions) {
            return redirect()->route('home')->with('error','Usuário sem acesso ao almoxarifado selecionado');
        }

        $dbStoreRoom = InventoryStoreRoom::find($id);

        if (!$dbStoreRoom) {
            return redirect()->route('home')->with('error','Almoxarifado selecionado não existe');
        } elseif (!$dbStoreRoom->status) {
            return redirect()->route('home')->with('error','Almoxarifado selecionado está desabilitado');
        } else {            
            $dbItems = InventoryStoreRoomItem::where('inventory_store_room_id', $id)
            ->orderBy('consumable_id')
            ->paginate(100);

            return view('inventory.store_room.store_room_show', compact('dbStoreRoom', 'dbItems'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function entryShow(string $id)
    {
        //        
        $dbPermissions = InventoryStoreRoomPermission::where('user_id',Auth::user()->id)
        ->where('inventory_store_room_id',$id)
        ->first();

        if (!$dbPermissions) {
            return redirect()->route('home')->with('error','Usuário sem acesso ao almoxarifado selecionado');
        }

        $dbStoreRoom = InventoryStoreRoom::find($id);

        if (!$dbStoreRoom) {
            return redirect()->route('home')->with('error','Almoxarifado selecionado não existe');
        } elseif (!$dbStoreRoom->status) {
            return redirect()->route('home')->with('error','Almoxarifado selecionado está desabilitado');
        } else {
            $dbConsumables = Consumable::all();
            $dbHistories = InventoryStoreRoomHistory::where('inventory_store_room_id',$id)
            ->where('movement','Entrada Avulsa')
            ->limit(20)
            ->orderBy('created_at','DESC')
            ->get();
    
            return view('inventory.store_room.store_room_entry', compact('dbStoreRoom', 'dbConsumables', 'dbHistories'));
        }
    }    

    /**
     * Store a newly created resource in storage.
     */
    public function entryStore(StoreInventoryStoreRoomItemRequest $request)
    {
        //
        $dbPermissions = InventoryStoreRoomPermission::where('user_id',Auth::user()->id)
        ->where('inventory_store_room_id',$request['inventory_store_room_id'])
        ->first();

        if (!$dbPermissions) {
            return redirect()->route('home')->with('error','Usuário sem acesso ao almoxarifado selecionado');
        }

        $dbStoreRoom = InventoryStoreRoom::find($request['inventory_store_room_id']);

        if (!$dbStoreRoom) {
            return redirect()->route('home')->with('error','Almoxarifado selecionado não existe');
        } elseif (!$dbStoreRoom->status) {
            return redirect()->route('home')->with('error','Almoxarifado selecionado está desabilitado');
        } else {
            $dbItem = InventoryStoreRoomItem::where('inventory_store_room_id',$request['inventory_store_room_id'])
            ->where('consumable_id',$request['consumable_id'])
            ->first();
    
            if (!$dbItem) {
                InventoryStoreRoomItem::create($request->all());
            } else {
                $dbItem->update([
                    'quantity' => $dbItem->quantity + $request['quantity']
                ]);
            }
    
            InventoryStoreRoomHistory::create([
                'quantity'=>$request['quantity'],
                'consumable_id'=>$request['consumable_id'],
                'inventory_store_room_id'=>$request['inventory_store_room_id'],
                'movement'=>'Entrada Avulsa',
                'user_id'=>Auth::user()->id,
            ]);
            
            return redirect()->back()->with('success','Item cadastrado com sucesso');
        }
    }    

    /**
     * Store a newly created resource in storage.
     */
    public function exitStore(StoreInventoryStoreRoomItemRequest $request)
    {
        //                
        $dbPermissions = InventoryStoreRoomPermission::where('user_id',Auth::user()->id)
        ->where('inventory_store_room_id',$request['inventory_store_room_id'])
        ->first();

        if (!$dbPermissions) {
            return redirect()->route('home')->with('error','Usuário sem acesso ao almoxarifado selecionado');
        }

        $dbStoreRoom = InventoryStoreRoom::find($request['inventory_store_room_id']);

        if (!$dbStoreRoom) {
            return redirect()->route('home')->with('error','Almoxarifado selecionado não existe');
        } elseif (!$dbStoreRoom->status) {
            return redirect()->route('home')->with('error','Almoxarifado selecionado está desabilitado');
        } else {
            $dbItem = InventoryStoreRoomItem::where('inventory_store_room_id',$request['inventory_store_room_id'])
            ->where('consumable_id',$request['consumable_id'])
            ->first();
            
            $dbItem->update([
                'quantity' => $dbItem->quantity - $request['quantity'],
                'description' => trim($request['descripiton'])
            ]);
    
            InventoryStoreRoomHistory::create([
                'quantity'=>$request['quantity'],
                'consumable_id'=>$request['consumable_id'],
                'inventory_store_room_id'=>$request['inventory_store_room_id'],
                'movement'=>'Saída',
                'user_id'=>Auth::user()->id,
            ]);
    
            return redirect()->back()->with('success','Saída realizada com sucesso');
        }
    }
}
