<?php

namespace App\Http\Controllers\Inventory\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\Warehouse\Item\StoreItemsEntryWarehouseCenterRequest;
use App\Http\Requests\Inventory\Warehouse\Item\StoreItemsEntryWarehouseStoreRoomRequest;
use App\Models\Company\CompanyEstablishmentWarehouse;
use App\Models\Company\CompanyFinancialBlock;
use App\Models\Consumable\Consumable;
use App\Models\Inventory\Warehouse\InventoryWarehouseItems;
use App\Models\Inventory\Warehouse\InventoryWarehouseMoviment;
use App\Models\Region\RegionCity;
use App\Models\Supply\SupplyCompany;
use Illuminate\Support\Facades\Auth;

class InventoryWarehouseItemsController extends Controller
{
    
    /*
     * Controller access permission resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:inventory_warehouse_storeroom|inventory_warehouse_center|sysadmin|admin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Registros com relacionamentos paginando os resultados
        $dbWarehouses = CompanyEstablishmentWarehouse::where('status',TRUE)
                ->with('CompanyEstablishmentWarehouseType')
                ->with('CompanyEstablishment')
                ->get();

        // Retorna a view com os dados
        return view('inventory.warehouse.items.items_index', compact('dbWarehouses'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $idWarehouse)
    {
        // Busca o registro do departamento pelo ID
        $dbWarehouse = CompanyEstablishmentWarehouse::find($idWarehouse);

        // Verifica se o departamento existe e se tem almoxarifado vinculado
        if (!$dbWarehouse) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('warehouses.index')->with('error','Setor sem almoxarifado central vinculado.');
        }        

        // Obtém os registros do almoxarifado relacionados ao departamento, com paginação
        $dbItems = InventoryWarehouseItems::where('warehouse_id',$idWarehouse)->paginate(100);

        // Retorna a view com os dados do departamento e do almoxarifado
        return view('inventory.warehouse.items.items_show', compact('dbItems','dbWarehouse'));
    }

    /**
     * Display the specified resource.
     */
    public function entryShow(string $id)
    {
        // Busca o registro do departamento pelo ID
        $db = CompanyEstablishmentWarehouse::find($id);

        // Verifica se o departamento existe e tem almoxarifado vinculado
        if (!$db) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('warehouses.index')->with('error', 'Setor sem almoxarifado central vinculado.');
        }
        
        // Busca todos os consumíveis ordenados por título
        $dbFinancialBlocks = CompanyFinancialBlock::orderBy('title')->get();
        
        // Busca todos os consumíveis ordenados por título
        $dbConsumables = Consumable::orderBy('title')->get();
        
        // Busca todos os fornecedores ordenados por título
        $dbSupplyCompanies = SupplyCompany::orderBy('title')->get();
        
        // Busca todos os fornecedores ordenados por título
        $dbRegionCities = RegionCity::orderBy('city')->get();
        
        // Busca os últimos 20 históricos de movimento de entrada ordenados por data de criação
        $dbHistories = InventoryWarehouseMoviment::where('movement', 'Entrada')
            ->orderBy('created_at', 'DESC')
            ->limit(20)
            ->get();

        // Retorna a view do formulário de entrada de estoque para o departamento especificado
        return view('inventory.warehouse.items.items_entry', compact('db', 'dbHistories', 'dbConsumables', 'dbRegionCities', 'dbSupplyCompanies','dbFinancialBlocks'));
    }

    /**
     * Display the specified resource.
     */
    public function entryWarehouseStoreRoom(StoreItemsEntryWarehouseStoreRoomRequest $request, string $id)
    {        
        // Busca o registro do departamento pelo ID
        $dbWarehouse = CompanyEstablishmentWarehouse::find($id);

        // Verifica se o departamento existe e tem almoxarifado vinculado
        if (!$dbWarehouse) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('warehouses.index')->with('error', 'Setor sem almoxarifado central vinculado.');
        }

        // Define os dados da entrada no estoque
        $request['movement'] = 'Entrada';
        $request['incoming_warehouse_id'] = $dbWarehouse->id; 
        $request['incoming_establishment_id'] = $dbWarehouse->establishment_id;
        $request['user_id'] = Auth::user()->id;

        // Cria um registro de histórico de movimentação
        InventoryWarehouseMoviment::create($request->all());

        //Adaptação do Request para o WarehouseCenter
        $request['warehouse_id'] = $dbWarehouse->id; 
        $request['establishment_id'] = $dbWarehouse->establishment_id;

        // Verifica se já existe um registro do item no estoque do departamento
        $db = InventoryWarehouseItems::where('consumable_id', $request['consumable_id'])
            ->where('warehouse_id', $request['warehouse_id'])
            ->where('financial_block_id',$request['financial_block_id'])
            ->first();

        // Se não existir, cria um novo registro de item no estoque
        if (!$db) {
            InventoryWarehouseItems::create($request->all());
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
    public function entryWarehouseCenter(StoreItemsEntryWarehouseCenterRequest $request, string $id)
    {        
        // Busca o registro do departamento pelo ID
        $dbWarehouse = CompanyEstablishmentWarehouse::find($id);

        // Verifica se o departamento existe e tem almoxarifado vinculado
        if (!$dbWarehouse) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('warehouses.index')->with('error', 'Setor sem almoxarifado central vinculado.');
        }

        // Define os dados da entrada no estoque
        $request['movement'] = 'Entrada';
        $request['incoming_warehouse_id'] = $dbWarehouse->id; 
        $request['incoming_establishment_id'] = $dbWarehouse->establishment_id;
        $request['user_id'] = Auth::user()->id;

        // Cria um registro de histórico de movimentação
        InventoryWarehouseMoviment::create($request->all());

        //Adaptação do Request para o WarehouseCenter
        $request['warehouse_id'] = $dbWarehouse->id; 
        $request['establishment_id'] = $dbWarehouse->establishment_id;

        // Verifica se já existe um registro do item no estoque do departamento
        $db = InventoryWarehouseItems::where('consumable_id', $request['consumable_id'])
            ->where('warehouse_id', $request['warehouse_id'])
            ->where('financial_block_id',$request['financial_block_id'])
            ->first();

        // Se não existir, cria um novo registro de item no estoque
        if (!$db) {
            InventoryWarehouseItems::create($request->all());
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
    public function exitWarehouseStoreRoom(StoreItemsEntryWarehouseStoreRoomRequest $request, string $id)
    {        
        // Busca o registro do departamento pelo ID
        $dbWarehouse = CompanyEstablishmentWarehouse::find($id);

        // Verifica se o departamento existe e tem almoxarifado vinculado
        if (!$dbWarehouse) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('warehouses.index')->with('error', 'Setor sem almoxarifado central vinculado.');
        }

        // Define os dados da saída no estoque
        $request['movement'] = 'Saída';
        $request['incoming_warehouse_id'] = $dbWarehouse->id; 
        $request['incoming_establishment_id'] = $dbWarehouse->establishment_id;
        $request['output_warehouse_id'] = $dbWarehouse->id; 
        $request['output_establishment_id'] = $dbWarehouse->establishment_id;
        $request['user_id'] = Auth::user()->id;

        // Cria um registro de histórico de movimentação
        InventoryWarehouseMoviment::create($request->all());

        //Adaptação do Request para o WarehouseCenter
        $request['warehouse_id'] = $dbWarehouse->id; 
        $request['establishment_id'] = $dbWarehouse->establishment_id;

        // Verifica se já existe um registro do item no estoque do departamento
        $db = InventoryWarehouseItems::where('consumable_id', $request['consumable_id'])
            ->where('warehouse_id', $request['warehouse_id'])
            ->where('financial_block_id',$request['financial_block_id'])
            ->first();

        // Se não existir, cria um novo registro de item no estoque
        if (!$db) {
            InventoryWarehouseItems::create($request->all());
            return redirect()->back()->with('success', 'Cadastro realizado com sucesso');
        }

        // Se já existir, atualiza a quantidade do item no estoque
        $db->quantity -= $request['quantity'];
        $db->save();

        // Redireciona de volta para a página anterior com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Cadastro realizado com sucesso');
    }    

    /**
     * Display the specified resource.
     */
    public function exitWarehouseCenter(StoreItemsEntryWarehouseCenterRequest $request, string $id)
    {        
        // Busca o registro do departamento pelo ID
        $dbWarehouse = CompanyEstablishmentWarehouse::find($id);

        // Verifica se o departamento existe e tem almoxarifado vinculado
        if (!$dbWarehouse) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('warehouses.index')->with('error', 'Setor sem almoxarifado central vinculado.');
        }

        // Define os dados da saída no estoque
        $request['movement'] = 'Saída';
        $request['incoming_warehouse_id'] = $dbWarehouse->id; 
        $request['incoming_establishment_id'] = $dbWarehouse->establishment_id;
        $request['user_id'] = Auth::user()->id;

        // Cria um registro de histórico de movimentação
        InventoryWarehouseMoviment::create($request->all());

        //Adaptação do Request para o WarehouseCenter
        $request['warehouse_id'] = $dbWarehouse->id; 
        $request['establishment_id'] = $dbWarehouse->establishment_id;

        // Verifica se já existe um registro do item no estoque do departamento
        $db = InventoryWarehouseItems::where('consumable_id', $request['consumable_id'])
            ->where('warehouse_id', $request['warehouse_id'])
            ->where('financial_block_id',$request['financial_block_id'])
            ->first();

        // Se não existir, cria um novo registro de item no estoque
        if (!$db) {
            InventoryWarehouseItems::create($request->all());
            return redirect()->back()->with('success', 'Cadastro realizado com sucesso');
        }

        // Se já existir, atualiza a quantidade do item no estoque
        $db->quantity -= $request['quantity'];
        $db->save();

        // Redireciona de volta para a página anterior com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Cadastro realizado com sucesso');
    }
}
