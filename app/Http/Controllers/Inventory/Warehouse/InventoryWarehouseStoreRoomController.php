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
use App\Models\Inventory\InventoryWarehouseRequest;
use App\Models\Inventory\InventoryWarehouseRequestDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryWarehouseStoreRoomController extends Controller
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
    public function index()
    {
        // Rgistros com relacionamentos paginando os resultados
        $db = CompanyEstablishmentDepartment::where('has_inventory_warehouse_store_room',TRUE)
            ->with('CompanyEstablishment')
            ->paginate(50);

        // Retorna a view com os dados
        return view('inventory.warehouse.store_room.store_room_index', compact('db'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busca o registro do departamento pelo ID
        $dbDepartment = CompanyEstablishmentDepartment::find($id);

        // Verifica se o departamento existe e se tem almoxarifado vinculado
        if (!$dbDepartment || !$dbDepartment->has_inventory_warehouse_store_room) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('store_rooms.index')->with('error','Setor sem almoxarifado vinculado.');
        }

        // Obtém os registros do almoxarifado relacionados ao departamento, com paginação
        $db = InventoryWarehouseStoreRoom::where('department_id',$id)->paginate(50);

        // Retorna a view com os dados do departamento e do almoxarifado
        return view('inventory.warehouse.store_room.store_room_show', compact('db','dbDepartment'));
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

        // Busca as solicitações padrão do almoxarifado ordenadas por título
        $dbStandardRequests = InventoryWarehouseStandardRequest::orderBy('title')->get();
        
        // Busca os consumíveis ordenados por título
        $dbConsumables = Consumable::orderBy('title')->get();

        // Retorna a view para edição da solicitação de almoxarifado com os dados necessários
        return view('inventory.warehouse.store_room.request.store_room_request_edit', compact('db','dbDepartment','dbStoreRoomInventories','dbRequestDetails','dbStandardRequests','dbConsumables'));
    }

    public function update(Request $request, string $id, string $inventoryRequest)
    {
        
        // Atualiza os detalhes do contato se algum dos campos de contato for fornecido no formulário
        if ($request['department_contact'] || $request['department_extension'] || $request['user_contat_1'] || $request['user_contat_2']) {
            $db = InventoryWarehouseRequest::find($inventoryRequest);
            $db->update($request->all());
        }

        // Adiciona um novo item à solicitação de almoxarifado se a quantidade e o ID do consumível forem fornecidos no formulário
        if ($request['quantity'] && $request['consumable_id']) {
            // Verifica se já existe um detalhe da solicitação para o consumível especificado
            $dbRequestDetails = InventoryWarehouseRequestDetail::where('store_room_request_id', $inventoryRequest)
                ->where('consumable_id', $request['consumable_id'])
                ->first();

            // Se já existir um detalhe para o consumível, retorna com uma mensagem de erro
            if ($dbRequestDetails) {
                return redirect()->back()->with('error', 'O suprimento ' . $dbRequestDetails->Consumable->title . ' já existe na tabela abaixo');
            }

            // Cria um novo detalhe para a solicitação de almoxarifado com os dados fornecidos no formulário
            $dbInventoryStoreRoom = InventoryWarehouseStoreRoom::find($id);
            if (!$dbInventoryStoreRoom) {
                $request['quantity_current'] = 0;
            }else {
                $request['quantity_current'] = $dbInventoryStoreRoom->quantity;
            }
            $request['quantity'] = $request['quantity'];
            $request['quantity_forwarded'] = $request['quantity'];
            $request['store_room_request_id'] = $inventoryRequest;

            InventoryWarehouseRequestDetail::create($request->all());

            // Atualiza a contagem de itens na solicitação de almoxarifado
            $dbRequestCount = InventoryWarehouseRequestDetail::where('store_room_request_id', $inventoryRequest)->count();
            $db = InventoryWarehouseRequest::find($inventoryRequest);            
            $db->count = $dbRequestCount;
            $db->save();
        }

        // Edita a quantidade de um item na solicitação de almoxarifado se a quantidade e o ID do consumível forem fornecidos no formulário
        if ($request['quantityEdit'] && $request['consumableEdit']) {
            // Busca o detalhe da solicitação de almoxarifado para o consumível especificado
            $dbRequestDetailsEdit = InventoryWarehouseRequestDetail::where('store_room_request_id', $inventoryRequest)
                ->where('consumable_id', $request['consumableEdit'])
                ->first();
            
            // Atualiza a quantidade do item na solicitação de almoxarifado
            $dbRequestDetailsEdit->quantity_forwarded = $request['quantityEdit'];
            $dbRequestDetailsEdit->save();
        }

        // Redireciona de volta para a página anterior
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function requestShow(string $id)
    {
        // Busca o registro do departamento pelo ID
        $dbDepartment = CompanyEstablishmentDepartment::find($id);

        // Verifica se o departamento existe e se tem almoxarifado vinculado
        if (!$dbDepartment || !$dbDepartment->has_inventory_warehouse_store_room) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('store_rooms.index')->with('error','Setor sem almoxarifado vinculado.');
        }

        // Busca as solicitações de almoxarifado do departamento, excluindo as canceladas, com paginação
        $dbRequests = InventoryWarehouseRequest::where('department_id',$id)
        ->where('status','!=','Cancelado')
        ->paginate(50);

        // Retorna a view com os dados do departamento e das solicitações de almoxarifado
        return view('inventory.warehouse.store_room.request.store_room_request_show', compact('dbDepartment','dbRequests'));
    }    

    /**
     * Display the specified resource.
     */
    public function requestCreate(string $id)
    {
        // Busca o registro do departamento pelo ID
        $dbDepartment = CompanyEstablishmentDepartment::find($id);

        // Verifica se o departamento existe e tem almoxarifado vinculado
        if (!$dbDepartment || !$dbDepartment->has_inventory_warehouse_store_room) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('store_rooms.index')->with('error', 'Setor sem almoxarifado vinculado.');
        }

        // Cria uma nova solicitação de almoxarifado com os dados fornecidos
        $db = InventoryWarehouseRequest::create([
            'code' => date('ymdHis'),
            'department_contact' => $dbDepartment->contact,
            'department_extension' => $dbDepartment->extension,
            'user_contact_1' => Auth::user()->contact_1,
            'user_contact_2' => Auth::user()->contact_2,
            'count' => 0,
            'status' => 'Aberto', // Considerar definir como constante se usado em vários lugares
            'department_id' => $id,
            'user_id' => Auth::user()->id,
        ]);

        // Redireciona para a rota de edição da solicitação criada
        return redirect()->route('store_rooms.requestEdit', ['request' => $db->id]);
    }

    /**
    * Display the specified resource.
    */
    public function requestStandardRequest(Request $request, string $storeRoom, string $idRequest)
    {
        // Busca itens padrão e salas de estoque
        $dbStandardRequests = InventoryWarehouseStandardRequestList::where('standard_request_id', $request['standard_request'])->orderBy('consumable_id')->get();
        $dbInventoryStoreRooms = InventoryWarehouseStoreRoom::where('department_id', $storeRoom)->orderBy('consumable_id')->get();

        //
        foreach ($dbStandardRequests as $dbStandardRequest) {
            $quantity_current = 0;
            $confirmed = FALSE;

            //
            foreach ($dbInventoryStoreRooms as $dbInventoryStoreRoom) {                
                if ($dbInventoryStoreRoom->consumable_id === $dbStandardRequest->consumable_id) {
                    $quantity_current = $dbInventoryStoreRoom->quantity;
                    break;
                }
            }
                    
            //
            if ($dbStandardRequest->quantity <= $quantity_current) {
                $quantity_forwarded = 0;
            }else {
                $quantity_forwarded = $dbStandardRequest->quantity - $quantity_current;
                $confirmed = TRUE;
            }
            
            InventoryWarehouseRequestDetail::updateOrCreate([
                'quantity_current' => $quantity_current,
                'quantity' => $quantity_forwarded,
                'quantity_default' => $dbStandardRequest->quantity,
                'quantity_forwarded' => $quantity_forwarded,
                'confirmed' => $confirmed,
                'consumable_id' => $dbStandardRequest->consumable_id,
                'store_room_request_id' => $idRequest,
            ]);
        }

        // Remove itens padrão se solicitado
        if ($request['standardRequestDestroy']) {
            $dbRequestDetails = InventoryWarehouseRequestDetail::where('store_room_request_id', $idRequest)->get();
            foreach ($dbRequestDetails as $dbRequestDetail) {
                $dbRequestDetail->delete();
            }
        }

        // Atualiza a contagem de itens na solicitação
        $dbRequestCount = InventoryWarehouseRequestDetail::where('store_room_request_id', $idRequest)->count();
        $db = InventoryWarehouseRequest::find($idRequest);
        $db->count = $dbRequestCount;
        $db->save();

        return redirect()->back();
    } 

    /**
     * Display the specified resource.
     */
    public function requestStatus(string $id)
    {
        // Encontra a solicitação de almoxarifado pelo ID
        $dbRequest = InventoryWarehouseRequest::find($id);

        // Define o status da solicitação como "Cancelado"
        $dbRequest->status = "Cancelado";

        // Salva as alterações no banco de dados
        $dbRequest->save();

        // Redireciona para a visualização do departamento associado à solicitação cancelada
        return redirect()->route('store_rooms.show',['store_room'=>$dbRequest->department_id]);
    }

    /**
    * Delete the specified resource.
    */
    public function requestDelete(string $id)
    {
        // Encontra o detalhe da solicitação de almoxarifado pelo ID
        $dbRequestDetails = InventoryWarehouseRequestDetail::find($id);
        
        // Deleta o detalhe da solicitação de almoxarifado
        $dbRequestDetails->delete();

        // Atualiza a contagem de itens na solicitação de almoxarifado
        $dbRequestCount = InventoryWarehouseRequestDetail::where('store_room_request_id', $dbRequestDetails->store_room_request_id)->count();
        $db = InventoryWarehouseRequest::find($dbRequestDetails->store_room_request_id);            
        $db->count = $dbRequestCount;
        $db->save();

        // Redireciona de volta para a página anterior
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function entryShow(string $id)
    {
        // Busca o registro do departamento pelo ID
        $db = CompanyEstablishmentDepartment::find($id);

        // Verifica se o departamento existe e tem almoxarifado vinculado
        if (!$db || !$db->has_inventory_warehouse_store_room) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('store_rooms.index')->with('error', 'Setor sem almoxarifado vinculado.');
        }
        
        // Busca todos os consumíveis ordenados por título
        $dbConsumables = Consumable::orderBy('title')->get();
        
        // Busca os últimos 20 históricos de movimento de entrada ordenados por data de criação
        $dbHistories = InventoryWarehouseStoreRoomHistory::where('movement', 'Entrada')
            ->orderBy('created_at', 'DESC')
            ->limit(20)
            ->get();

        // Retorna a view do formulário de entrada de estoque para o departamento especificado
        return view('inventory.warehouse.store_room.store_room_entry', compact('db', 'dbHistories', 'dbConsumables'));
    }

    /**
     * Display the specified resource.
     */
    public function entryStore(StoreInventoryWarehouseStoreRoomEntryStoreRequest $request, string $id)
    {        
        // Busca o registro do departamento pelo ID
        $dbDepartment = CompanyEstablishmentDepartment::find($id);

        // Verifica se o departamento existe e tem almoxarifado vinculado
        if (!$dbDepartment || !$dbDepartment->has_inventory_warehouse_store_room) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('store_rooms.index')->with('error', 'Setor sem almoxarifado vinculado.');
        }

        // Define os dados da entrada no estoque
        $request['movement'] = 'Entrada';
        $request['department_id'] = $dbDepartment->id;
        $request['establishment_id'] = $dbDepartment->establishment_id;
        $request['user_id'] = Auth::user()->id;

        // Cria um registro de histórico de movimentação
        InventoryWarehouseStoreRoomHistory::create($request->all());

        // Verifica se já existe um registro do item no estoque do departamento
        $db = InventoryWarehouseStoreRoom::where('consumable_id', $request['consumable_id'])
            ->where('department_id', $request['department_id'])
            ->first();

        // Se não existir, cria um novo registro de item no estoque
        if (!$db) {
            InventoryWarehouseStoreRoom::create($request->all());
            return redirect()->back()->with('success', 'Cadastro realizado com sucesso');
        }

        // Se já existir, atualiza a quantidade do item no estoque
        $db->quantity += $request['quantity'];
        $db->save();

        // Redireciona de volta para a página anterior com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Cadastro realizado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function exitStore(StoreInventoryWarehouseStoreRoomExitStoreRequest $request, string $id)
    {
        // Encontra o registro do item no estoque pelo ID
        $db = InventoryWarehouseStoreRoom::find($id);
        
        // Subtrai a quantidade solicitada do estoque do item
        $db->quantity -= $request['quantity'];
        $db->save();

        // Registra um histórico de movimentação para a saída do item
        InventoryWarehouseStoreRoomHistory::create([
            'quantity' => $request['quantity'],
            'movement' => 'Saída',
            'consumable_id' => $db->consumable_id,
            'department_id' => $db->department_id,
            'establishment_id' => $db->establishment_id,
            'user_id' => Auth::user()->id,
        ]);

        // Redireciona de volta para a página anterior
        return redirect()->back();
    }
}
