<?php

namespace App\Http\Controllers\Inventory\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseStoreRoom\StoreInventoryWarehouseStoreRoomEntryStoreRequest;
use App\Http\Requests\InventoryWarehouse\InventoryWarehouseStoreRoom\StoreInventoryWarehouseStoreRoomExitStoreRequest;
use App\Models\Company\CompanyEstablishmentTypeWarehouse;
use App\Models\Company\CompanyEstablishmentWarehouse;
use App\Models\Consumable\Consumable;
use App\Models\Inventory\Warehouse\InventoryWarehouseStoreRoom;
use App\Models\Inventory\Warehouse\InventoryWarehouseStoreRoomHistory;
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
        //Condicionando o valor para busca no banco de dados
        $dbCompanyEstablishmentTypeWarehouses = CompanyEstablishmentTypeWarehouse::all();
        $typeWarehouse = FALSE;
        $existWarehouse = TRUE;

        foreach ($dbCompanyEstablishmentTypeWarehouses as $key => $value) {
            if ($value->title == "Almoxarifado") {
                $typeWarehouse = $value->id;
            }
        }

        $dbUser = Auth::user();

        //Verificando se Usuário tem Estabelecimento Cadastrado
        if (!$dbUser->establishment_id) {
            $dbUser = FALSE;
        } 

        // Registros com relacionamentos paginando os resultados
        $db = CompanyEstablishmentWarehouse::where('establishment_id',Auth::user()->establishment_id)
                ->where('type_warehouse_id', $typeWarehouse)
                ->where('status',TRUE)
                ->with('CompanyEstablishmentTypeWarehouse')
                ->with('CompanyEstablishment')
                ->get();

        if ($db->count() == 0) { $existWarehouse = FALSE; }

        if ($db->count() == 1) {
            $warehouse = $db->first();
            return redirect()->route('warehouse.store_rooms.show',['store_room'=>$warehouse->id]);
        }
        
        // Retorna a view com os dados
        return view('inventory.warehouse.store_room.store_room_index', compact('db', 'dbUser', 'existWarehouse'));
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

        // Obtém os registros do almoxarifado relacionados ao departamento, com paginação
        $db = InventoryWarehouseStoreRoom::where('warehouse_id',$id)->paginate(50);

        // Retorna a view com os dados do departamento e do almoxarifado
        return view('inventory.warehouse.store_room.store_room_show', compact('db','dbWarehouse'));
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
            return redirect()->route('warehouse.store_rooms.index')->with('error', 'Setor sem almoxarifado vinculado.');
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
        $dbWarehouse = CompanyEstablishmentWarehouse::find($id);

        // Verifica se o departamento existe e tem almoxarifado vinculado
        if (!$dbWarehouse) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('warehouse.store_rooms.index')->with('error', 'Setor sem almoxarifado vinculado.');
        }

        // Define os dados da entrada no estoque
        $request['movement'] = 'Entrada';
        $request['warehouse_id'] = $dbWarehouse->id;
        $request['establishment_id'] = $dbWarehouse->establishment_id;
        $request['user_id'] = Auth::user()->id;

        // Cria um registro de histórico de movimentação
        InventoryWarehouseStoreRoomHistory::create($request->all());

        // Verifica se já existe um registro do item no estoque do departamento
        $db = InventoryWarehouseStoreRoom::where('consumable_id', $request['consumable_id'])
            ->where('warehouse_id', $request['warehouse_id'])
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
            'warehouse_id' => $db->warehouse_id,
            'establishment_id' => $db->establishment_id,
            'user_id' => Auth::user()->id,
        ]);

        // Redireciona de volta para a página anterior
        return redirect()->back();
    }
}
