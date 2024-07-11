<?php

namespace App\Http\Controllers\Inventory\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseCenter\StoreInventoryWarehouseCenterEntryStoreRequest;
use App\Models\Company\CompanyEstablishmentTypeWarehouse;
use App\Models\Company\CompanyEstablishmentWarehouse;
use App\Models\Company\CompanyFinancialBlock;
use App\Models\Consumable\Consumable;
use App\Models\Inventory\Warehouse\InventoryWarehouseCenter;
use App\Models\Inventory\Warehouse\InventoryWarehouseCenterHistory;
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
        //Condicionando o valor para busca no banco de dados
        $dbCompanyEstablishmentTypeWarehouses = CompanyEstablishmentTypeWarehouse::all();
        $typeWarehouse = FALSE;
        $existWarehouse = TRUE;

        foreach ($dbCompanyEstablishmentTypeWarehouses as $key => $value) {
            if ($value->title == "Centro de Distribuição de Suprimentos") {
                $typeWarehouse = $value->id;
            }
        }

        // Registros com relacionamentos paginando os resultados
        $db = CompanyEstablishmentWarehouse::where('type_warehouse_id', $typeWarehouse)
                ->where('status',TRUE)
                ->with('CompanyEstablishmentTypeWarehouse')
                ->with('CompanyEstablishment')
                ->get();

        // Retorna a view com os dados
        return view('inventory.warehouse.center.center_index', compact('db'));
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
            return redirect()->route('warehouse_centers.index')->with('error','Setor sem almoxarifado central vinculado.');
        }        

        // Obtém os registros do almoxarifado relacionados ao departamento, com paginação
        $db = InventoryWarehouseCenter::where('warehouse_id',$id)->paginate(50);

        // Obtém os registros do almoxarifado ativos
        $dbStoreRooms = CompanyEstablishmentWarehouse::orderBy('title')
        ->with('CompanyEstablishment')
        ->get();

        // Retorna a view com os dados do departamento e do almoxarifado
        return view('inventory.warehouse.center.center_show', compact('db','dbWarehouse','dbStoreRooms'));
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
            return redirect()->route('warehouse_centers.index')->with('error', 'Setor sem almoxarifado central vinculado.');
        }
        
        // Busca todos os consumíveis ordenados por título
        $dbFinancialBlocks = CompanyFinancialBlock::orderBy('title')->get();
        
        // Busca todos os consumíveis ordenados por título
        $dbConsumables = Consumable::orderBy('title')->get();
        
        // Busca os últimos 20 históricos de movimento de entrada ordenados por data de criação
        $dbHistories = InventoryWarehouseCenterHistory::where('movement', 'Entrada')
            ->orderBy('created_at', 'DESC')
            ->limit(20)
            ->get();

        // Retorna a view do formulário de entrada de estoque para o departamento especificado
        return view('inventory.warehouse.center.center_entry', compact('db', 'dbHistories', 'dbConsumables','dbFinancialBlocks'));
    }

    /**
     * Display the specified resource.
     */
    public function entryStore(StoreInventoryWarehouseCenterEntryStoreRequest $request, string $id)
    {        
        // Busca o registro do departamento pelo ID
        $dbWarehouse = CompanyEstablishmentWarehouse::find($id);

        // Verifica se o departamento existe e tem almoxarifado vinculado
        if (!$dbWarehouse) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('warehouse_centers.index')->with('error', 'Setor sem almoxarifado central vinculado.');
        }

        // Define os dados da entrada no estoque
        $request['movement'] = 'Entrada';
        $request['incoming_warehouse_id'] = $dbWarehouse->id; 
        $request['incoming_establishment_id'] = $dbWarehouse->establishment_id;
        $request['user_id'] = Auth::user()->id;

        // Cria um registro de histórico de movimentação
        InventoryWarehouseCenterHistory::create($request->all());

        //Adaptação do Request para o WarehouseCenter
        $request['warehouse_id'] = $dbWarehouse->id; 
        $request['establishment_id'] = $dbWarehouse->establishment_id;

        // Verifica se já existe um registro do item no estoque do departamento
        $db = InventoryWarehouseCenter::where('consumable_id', $request['consumable_id'])
            ->where('warehouse_id', $request['warehouse_id'])
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

        // Redireciona de volta para a página anterior com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Cadastro realizado com sucesso');
    }
}
