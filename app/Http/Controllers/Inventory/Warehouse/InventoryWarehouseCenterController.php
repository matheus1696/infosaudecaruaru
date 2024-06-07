<?php

namespace App\Http\Controllers\Inventory\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseCenter\StoreInventoryWarehouseCenterEntryStoreRequest;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseCenter\StoreInventoryWarehouseCenterExitStoreRequest;
use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\Company\CompanyFinancialBlock;
use App\Models\Consumable\Consumable;
use App\Models\Inventory\InventoryWarehouseCenter;
use App\Models\Inventory\InventoryWarehouseCenterEntry;
use App\Models\Inventory\InventoryWarehouseCenterHistory;
use App\Models\Inventory\InventoryWarehouseStoreRoomRequest;
use App\Models\Inventory\InventoryWarehouseStoreRoomRequestDetail;
use Illuminate\Support\Facades\Auth;

class InventoryWarehouseCenterController extends Controller
{
    
    /*
     * Controller access permission resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:inventory_warehouse_center|sysadmin|admin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Rgistros com relacionamentos paginando os resultados
        $db = CompanyEstablishmentDepartment::where('has_inventory_warehouse_center',TRUE)
            ->with('CompanyEstablishment')
            ->paginate(50);

        // Retorna a view com os dados
        return view('inventory.warehouse.center.center_index', compact('db'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busca o registro do departamento pelo ID
        $dbDepartment = CompanyEstablishmentDepartment::find($id);

        // Verifica se o departamento existe e se tem almoxarifado vinculado
        if (!$dbDepartment || !$dbDepartment->has_inventory_warehouse_center) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('warehouse_centers.index')->with('error','Setor sem almoxarifado central vinculado.');
        }        

        // Obtém os registros do almoxarifado relacionados ao departamento, com paginação
        $db = InventoryWarehouseCenter::where('department_id',$id)->paginate(50);

        // Obtém os registros do almoxarifado relacionados ao departamento, com paginação
        $dbEntries = InventoryWarehouseCenterEntry::where('department_id',$id)->get();

        // Obtém os registros do almoxarifado ativos
        $dbStoreRooms = CompanyEstablishmentDepartment::orderBy('department')
        ->with('CompanyEstablishment')
        ->get();

        // Retorna a view com os dados do departamento e do almoxarifado
        return view('inventory.warehouse.center.center_show', compact('db','dbDepartment','dbEntries','dbStoreRooms'));
    }

    /**
     * Display the specified resource.
     */
    public function entryShow(string $id)
    {
        // Busca o registro do departamento pelo ID
        $db = CompanyEstablishmentDepartment::find($id);

        // Verifica se o departamento existe e tem almoxarifado vinculado
        if (!$db || !$db->has_inventory_warehouse_center) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('warehouse_centers.index')->with('error', 'Setor sem almoxarifado central vinculado.');
        }
        
        // Busca todos os consumíveis ordenados por título
        $dbConsumables = Consumable::orderBy('title')->get();

        // Busca todos os blocos financeiros ordenados por título
        $dbFinancialBlocks = CompanyFinancialBlock::orderBy('title')->get();
        
        // Busca os últimos 20 históricos de movimento de entrada ordenados por data de criação
        $dbHistories = InventoryWarehouseCenterHistory::where('movement', 'Entrada')
            ->orderBy('created_at', 'DESC')
            ->limit(20)
            ->get();

        // Retorna a view do formulário de entrada de estoque para o departamento especificado
        return view('inventory.warehouse.center.center_entry', compact('db', 'dbHistories', 'dbConsumables', 'dbFinancialBlocks'));
    }

    /**
     * Display the specified resource.
     */
    public function entryStore(StoreInventoryWarehouseCenterEntryStoreRequest $request, string $id)
    {        
        // Busca o registro do departamento pelo ID
        $dbDepartment = CompanyEstablishmentDepartment::find($id);

        // Verifica se o departamento existe e tem almoxarifado vinculado
        if (!$dbDepartment || !$dbDepartment->has_inventory_warehouse_center) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('warehouse_centers.index')->with('error', 'Setor sem almoxarifado central vinculado.');
        }

        // Define os dados da entrada no estoque
        $request['movement'] = 'Entrada';
        $request['incoming_department_id'] = $dbDepartment->id; 
        $request['incoming_establishment_id'] = $dbDepartment->establishment_id;
        $request['user_id'] = Auth::user()->id;

        // Cria um registro de histórico de movimentação
        InventoryWarehouseCenterHistory::create($request->all());

        //Adaptação do Request para o WarehouseCenter
        $request['department_id'] = $dbDepartment->id; 
        $request['establishment_id'] = $dbDepartment->establishment_id;

        // Verifica se já existe um registro do item no estoque do departamento
        $db = InventoryWarehouseCenter::where('consumable_id', $request['consumable_id'])
            ->where('department_id', $request['department_id'])
            ->where('financial_block_id',$request['financial_block_id'])
            ->first();

        // Se não existir, cria um novo registro de item no estoque
        if (!$db) {
            InventoryWarehouseCenter::create($request->all());
            return redirect()->back()->with('success', 'Cadastro realizado com sucesso');
        }

        // Se já existir, atualiza a quantidade do item no estoque
        $db->quantity += $request['quantity'];
        $db->save();

        // Verifica se já existe um registro do item nas informações de notas fiscais do departamento
        $db = InventoryWarehouseCenterEntry::where('consumable_id', $request['consumable_id'])
            ->where('department_id', $request['department_id'])
            ->where('financial_block_id',$request['financial_block_id'])
            ->where('invoice',$request['invoice'])
            ->where('supply_order',$request['supply_order'])
            ->where('supply_order_parcel',$request['supply_order_parcel'])
            ->first();

        // Se não existir, cria um novo registro de item no estoque
        if (!$db) {
            InventoryWarehouseCenterEntry::create($request->all());
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
    public function requestShow(string $id)
    {
        // Busca o registro do departamento pelo ID
        $dbDepartment = CompanyEstablishmentDepartment::find($id);

        // Verifica se o departamento existe e se tem almoxarifado vinculado
        if (!$dbDepartment || !$dbDepartment->has_inventory_warehouse_center) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('warehouse_centers.index')->with('error','Setor sem almoxarifado vinculado.');
        }

        // Busca as solicitações de almoxarifado do departamento, excluindo as canceladas, com paginação
        $dbRequests = InventoryWarehouseStoreRoomRequest::select()
        ->where('status','Aberto')
        ->paginate(50);

        // Retorna a view com os dados do departamento e das solicitações de almoxarifado
        return view('inventory.warehouse.center.request.center_request_show', compact('dbDepartment','dbRequests'));
    } 
    
    public function requestEdit(string $id)
    {
        // Busca a solicitação de almoxarifado pelo ID
        $db = InventoryWarehouseStoreRoomRequest::find($id);
        $dbRequestDetails = InventoryWarehouseStoreRoomRequestDetail::where('store_room_request_id',$id)->paginate(50);

        // Retorna a view para edição da solicitação de almoxarifado com os dados necessários
        return view('inventory.warehouse.center.request.center_request_edit', compact('db','dbRequestDetails'));
    }

    /**
     * Display the specified resource.
     */
    public function exitStore(StoreInventoryWarehouseCenterExitStoreRequest $request, string $id)
    {
        // Encontra o registro do item no estoque pelo ID
        $db = InventoryWarehouseCenter::find($id);

        // Subtrai a quantidade solicitada do estoque do item
        $db->quantity -= $request['quantity'];
        $db->save();

        //Informando o Departamento que está encaminhando
        $dbDepartment = CompanyEstablishmentDepartment::find($request['incoming_department_id']);

        // Registra um histórico de movimentação para a saída do item
        InventoryWarehouseCenterHistory::create([
            'quantity' => $request['quantity'],
            'movement' => 'Saída',
            'consumable_id' => $db->consumable_id,
            'incoming_department_id' => $dbDepartment->id,
            'incoming_establishment_id' => $dbDepartment->establishment_id,
            'output_department_id' => $db->department_id,
            'output_establishment_id' => $db->establishment_id,
            'user_id' => Auth::user()->id,
        ]);

        // Redireciona de volta para a página anterior
        return redirect()->back();
    }
}
