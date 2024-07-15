<?php

namespace App\Http\Controllers\Inventory\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseStoreRoom\StoreInventoryWarehouseStoreRoomCreateItemRequest;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseStoreRoom\StoreInventoryWarehouseStoreRoomCreateRequest;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseStoreRoom\StoreInventoryWarehouseStoreRoomEntryStoreRequest;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseStoreRoom\StoreInventoryWarehouseStoreRoomExitStoreRequest;
use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\Company\CompanyEstablishmentTypeWarehouse;
use App\Models\Company\CompanyEstablishmentWarehouse;
use App\Models\Consumable\Consumable;
use App\Models\Inventory\Warehouse\InventoryWarehouseRequest;
use App\Models\Inventory\Warehouse\InventoryWarehouseRequestDetail;
use App\Models\Inventory\Warehouse\InventoryWarehouseRequestStatus;
use App\Models\Inventory\Warehouse\InventoryWarehouseStoreRoom;
use App\Models\Inventory\Warehouse\InventoryWarehouseStoreRoomHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryWarehouseStoreRoomRequestController extends Controller
{
    /*
     * Controller access permission resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:inventory_warehouse_store_room|sysadmin|admin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        // Busca o registro do departamento pelo ID
        $dbWarehouse = CompanyEstablishmentWarehouse::find($id);

        // Verifica se o departamento existe e se tem almoxarifado vinculado
        if (!$dbWarehouse) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('warehouse.store_rooms.index')->with('error','Setor sem almoxarifado vinculado.');
        }

        $dbRequestStatuses = InventoryWarehouseRequestStatus::all();

        // Busca as solicitações em abertas com paginação
        $dbRequests = InventoryWarehouseRequest::where('department_id',$id)->get();

        // Retorna a view com os dados do departamento e das solicitações de almoxarifado
        return view('inventory.warehouse.store_room.store_room_show_request', compact('dbWarehouse','dbRequestStatuses','dbRequests'));
    }

    /**
     * Display the specified resource.
     */
    public function create(string $id)
    {
        // Busca o registro do departamento pelo ID
        $dbUser = Auth::user();
        $dbEstablishment = CompanyEstablishment::find($id);

        // Redireciona para a rota de edição da solicitação criada
        return view('inventory.warehouse.store_room.store_room_create_request', compact('dbUser','dbEstablishment'));
    }

    /**
     * Display the specified resource.
     */
    public function store(Request $request)
    {
        $request['code'] = date('ymdhis').round(10,99);
        $dbRequest = InventoryWarehouseRequest::create($request->all());
        
        // Redireciona para a rota de edição da solicitação criada
        return redirect()->route('warehouse.store_rooms.editRequest',['store_room'=>$request['department_id'],'request'=>$dbRequest->id])->with('success','Solicitação criada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busca o registro do departamento pelo ID
        $dbWarehouse = CompanyEstablishmentWarehouse::find($id);

        // Verifica se o departamento existe e se tem almoxarifado vinculado
        if (!$dbWarehouse) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('warehouse.store_rooms.index')->with('error','Setor sem almoxarifado vinculado.');
        }

        $dbRequestStatuses = InventoryWarehouseRequestStatus::all();

        // Busca as solicitações em abertas com paginação
        $dbRequests = InventoryWarehouseRequest::where('department_id',$id)->get();

        // Retorna a view com os dados do departamento e das solicitações de almoxarifado
        return view('inventory.warehouse.store_room.store_room_show_request', compact('dbWarehouse','dbRequestStatuses','dbRequests'));
    }
    
    public function edit(string $id, string $inventoryRequest)
    {
        // Busca a solicitação de almoxarifado pelo ID
        $db = InventoryWarehouseRequest::find($inventoryRequest);
        $dbDepartment = CompanyEstablishmentDepartment::find($id);
        $dbStoreRoomInventories = InventoryWarehouseStoreRoom::where('department_id',$id)
        ->orderBy('consumable_id')
        ->get();

        $dbRequestDetails = InventoryWarehouseRequestDetail::where('store_room_request_id', $inventoryRequest)
        ->orderBy('confirmed','DESC')
        ->orderBy('consumable_id')
        ->paginate(150);
        
        // Busca os consumíveis ordenados por título
        $dbConsumables = Consumable::orderBy('title')->get();

        // Retorna a view para edição da solicitação de almoxarifado com os dados necessários
        return view('inventory.warehouse.store_room.store_room_edit_request', compact('db','dbDepartment','dbStoreRoomInventories','dbRequestDetails','dbConsumables'));
    }

    /**
     * Display the specified resource.
     */
    public function confirmedRequest(string $id, string $inventoryRequest)
    {
        // Encontra a solicitação de almoxarifado pelo ID
        $dbRequest = InventoryWarehouseRequest::find($inventoryRequest);
        $dbRequestDetails = InventoryWarehouseRequestDetail::where('store_room_request_id',$inventoryRequest)->count();

        if ($dbRequestDetails > 0) {
            // Define o status da solicitação como "Cancelado"
            $dbRequest->status_id = 2;
            // Salva as alterações no banco de dados
            $dbRequest->save();
            // Redireciona para a visualização do departamento associado à solicitação cancelada
            return redirect()->back()->with('success','Solicitação Cancelada com sucesso');
        }

        // Redireciona para a visualização do departamento associado à solicitação cancelada
        return redirect()->back()->with('error','Não existe itens cadastrados na solicitação, adicione os itens que deseja');        
    } 

    /**
     * Display the specified resource.
     */
    public function canceledRequest(string $id, string $inventoryRequest)
    {
        // Encontra a solicitação de almoxarifado pelo ID
        $dbRequest = InventoryWarehouseRequest::find($inventoryRequest);
        $dbRequestDetails = InventoryWarehouseRequestDetail::where('store_room_request_id',$inventoryRequest)->count();

        if ($dbRequestDetails < 1) {
            // Define o status da solicitação como "Cancelado"
            $dbRequest->status = 6;
            // Salva as alterações no banco de dados
            $dbRequest->save();
            // Redireciona para a visualização do departamento associado à solicitação cancelada
            return redirect()->route('warehouse.store_rooms.show',['store_room'=>$dbRequest->department_id])
                ->with('success','Solicitação Cancelada com sucesso');
        }

        // Redireciona para a visualização do departamento associado à solicitação cancelada
        return redirect()->back()->with('error','Existe itens cadastrados na solicitação');        
    } 

    public function createItem(StoreInventoryWarehouseStoreRoomCreateItemRequest $request, string $id, string $inventoryRequest)
    {
        
        // Verifica se já existe um detalhe da solicitação para o consumível especificado
        $dbRequestDetails = InventoryWarehouseRequestDetail::where('store_room_request_id', $inventoryRequest)
            ->where('consumable_id', $request['consumable_id'])
            ->first();

        // Se já existir um detalhe para o consumível, retorna com uma mensagem de erro
        if ($dbRequestDetails) {
            return redirect()->back()->with('error', 'O suprimento ' . $dbRequestDetails->Consumable->title . ' já existe na tabela abaixo');
        }

        // Cria um novo detalhe para a solicitação de almoxarifado com os dados fornecidos no formulário
        $dbInventoryStoreRoom = InventoryWarehouseStoreRoom::where('consumable_id',$request['consumable_id'])
        ->where('department_id',$id)
        ->first();

        InventoryWarehouseRequestDetail::updateOrCreate([
                'quantity_current' => !$dbInventoryStoreRoom ? 0 : $dbInventoryStoreRoom->quantity,
                'quantity' => $request['quantity'],
                'consumable_id' => $request['consumable_id'],
                'store_room_request_id' => $inventoryRequest,
        ]);

        // Redireciona de volta para a página anterior
        return redirect()->back()->with('success','Item adicionado com sucesso');
    }
    
    public function updateItem(Request $request, string $id, string $inventoryRequest)
    {        
        // Edita a quantidade de um item na solicitação de almoxarifado se a quantidade e o ID do consumível forem fornecidos no formulário
        if ($request['quantity'] && $request['consumable_id']) {
            // Busca o detalhe da solicitação de almoxarifado para o consumível especificado
            $dbRequestDetailsEdit = InventoryWarehouseRequestDetail::where('store_room_request_id', $inventoryRequest)
                ->where('consumable_id', $request['consumable_id'])
                ->first();
            
            // Atualiza a quantidade do item na solicitação de almoxarifado
            $dbRequestDetailsEdit->quantity = $request['quantity'];
            $dbRequestDetailsEdit->confirmed = TRUE;
            $dbRequestDetailsEdit->save();
        }

        // Redireciona de volta para a página anterior
        return redirect()->back();
    }

    /**
    * Delete the specified resource.
    */
    public function destroyItem(string $id, string $inventoryRequest)
    {
        // Encontra o detalhe da solicitação de almoxarifado pelo ID
        $dbRequestDetails = InventoryWarehouseRequestDetail::find($inventoryRequest);
        
        // Deleta o detalhe da solicitação de almoxarifado
        $dbRequestDetails->delete();

        // Redireciona de volta para a página anterior
        return redirect()->back();
    }

    /**
    * Display the specified resource.
    */
    public function destroyDefaultList(string $id, string $inventoryRequest)
    {
        // Remove itens padrão se solicitado
        $dbRequestDetails = InventoryWarehouseRequestDetail::where('store_room_request_id', $inventoryRequest)->get();
        foreach ($dbRequestDetails as $dbRequestDetail) {
            $dbRequestDetail->delete();
        }

        return redirect()->back()->with('success','Todos os items removidos com sucesso');
    }    

    /**
    * Delete the specified resource.
    */
    public function receiptItem(string $id, string $inventoryRequest)
    {
        // Encontra o detalhe da solicitação de almoxarifado pelo ID
        $db = CompanyEstablishmentDepartment::find($id);
        $dbRequestDetail = InventoryWarehouseRequestDetail::find($inventoryRequest);
        $dbStoreRoom = InventoryWarehouseStoreRoom::where('department_id',$id)
        ->where('consumable_id',$dbRequestDetail->consumable_id)
        ->first();



        if (!$dbStoreRoom) {
            InventoryWarehouseStoreRoom::create([
                'quantity'=>$dbRequestDetail->quantity_forwarded,
                'consumable_id'=>$dbRequestDetail->consumable_id,
                'department_id'=>$db->id,
                'establishment_id'=>$db->establishment_id,
            ]);
        }else{
            $dbStoreRoom->quantity += $dbRequestDetail->quantity_forwarded;
            $dbStoreRoom->save();
        }

        //
        $dbRequestDetail->receipt = TRUE;
        $dbRequestDetail->save();

        InventoryWarehouseStoreRoomHistory::create([
            'quantity'=>$dbRequestDetail->quantity_forwarded,
            'movement'=>'Entrada',
            'consumable_id'=>$dbRequestDetail->consumable_id,
            'department_id'=>$db->id,
            'establishment_id'=>$db->establishment_id,
            'user_id'=>Auth::user()->id,
        ]);
        
        $receipt = InventoryWarehouseRequestDetail::where('store_room_request_id',$inventoryRequest)->where('receipt',TRUE)->count();
        $confirmed = InventoryWarehouseRequestDetail::where('store_room_request_id',$inventoryRequest)->where('confirmed',TRUE)->count();

        if ($receipt === $confirmed) {
            $dbRequest = InventoryWarehouseRequest::find($dbRequestDetail->store_room_request_id);
            $dbRequest->status = 'Concluído';
            $dbRequest->save();
        }

        // Redireciona de volta para a página anterior
        return redirect()->back()->with('success','Item adicionado no estoque');
    }
}