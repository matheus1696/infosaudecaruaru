<?php

namespace App\Http\Controllers\Inventory\Pharmacy;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryPharmacy\InventoryPharmacyCenter\StoreInventoryPharmacyCenterEntryStoreRequest;
use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\Food\Food;
use App\Models\Inventory\Pharmacy\InventoryPharmacyCenter;
use App\Models\Inventory\Pharmacy\InventoryPharmacyCenterHistory;
use App\Models\Inventory\Pharmacy\InventoryPharmacyRequest;
use App\Models\Inventory\Pharmacy\InventoryPharmacyRequestDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryPharmacyCenterController extends Controller
{
    
    /*
     * Controller access permission resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:inventory_pharmacy_center|sysadmin|admin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Rgistros com relacionamentos paginando os resultados
        $db = CompanyEstablishmentDepartment::where('has_inventory_pharmacy_center',TRUE)
            ->with('CompanyEstablishment')
            ->paginate(50);

        // Retorna a view com os dados
        return view('inventory.pharmacy.center.center_index', compact('db'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busca o registro do departamento pelo ID
        $dbDepartment = CompanyEstablishmentDepartment::find($id);

        // Verifica se o departamento existe e se tem almoxarifado vinculado
        if (!$dbDepartment || !$dbDepartment->has_inventory_pharmacy_center) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('pharmacy_centers.index')->with('error','Setor sem almoxarifado central vinculado.');
        }        

        // Obtém os registros do almoxarifado relacionados ao departamento, com paginação
        $db = InventoryPharmacyCenter::where('department_id',$id)->paginate(50);

        // Obtém os registros do almoxarifado ativos
        $dbStoreRooms = CompanyEstablishmentDepartment::orderBy('department')
        ->with('CompanyEstablishment')
        ->get();

        // Retorna a view com os dados do departamento e do almoxarifado
        return view('inventory.pharmacy.center.center_show', compact('db','dbDepartment','dbStoreRooms'));
    }

    public function edit(string $id, string $inventoryRequest)
    {
        // Busca a solicitação de almoxarifado pelo ID
        $db = InventoryPharmacyRequest::find($inventoryRequest);
        $dbDepartment = CompanyEstablishmentDepartment::find($id);
        $dbMedicationInventories = InventoryPharmacyCenter::where('department_id',$id)->orderBy('medication_id')->get();
        
        $dbRequestDetails = InventoryPharmacyRequestDetail::where('store_room_request_id', $inventoryRequest)
        ->orderBy('confirmed','DESC')
        ->orderBy('medication_id')
        ->paginate(150);

        // Retorna a view para edição da solicitação de almoxarifado com os dados necessários
        return view('inventory.pharmacy.center.center_edit_request', compact('db','dbDepartment','dbMedicationInventories','dbRequestDetails'));
    }

    public function update(Request $request, string $id, string $inventoryRequest)
    {
        // Edita a quantidade de um item na solicitação de almoxarifado se a quantidade e o ID do consumível forem fornecidos no formulário
        if ($request['quantity'] && $request['medication_id']) {
            // Busca o detalhe da solicitação de almoxarifado para o consumível especificado
            $dbRequestDetailsEdit = InventoryPharmacyRequestDetail::where('store_room_request_id', $inventoryRequest)
                ->where('medication_id', $request['medication_id'])
                ->first();
            
            // Atualiza a quantidade do item na solicitação de almoxarifado
            $dbRequestDetailsEdit->quantity_forwarded = $request['quantity'];
            $dbRequestDetailsEdit->confirmed = TRUE;
            $dbRequestDetailsEdit->save();
        }

        // Redireciona de volta para a página anterior
        return redirect()->back();
    }    
    
    public function requestShow(string $id)
    {
        // Busca o registro do departamento pelo ID
        $dbDepartment = CompanyEstablishmentDepartment::find($id);

        // Verifica se o departamento existe e se tem almoxarifado vinculado
        if (!$dbDepartment || !$dbDepartment->has_inventory_pharmacy_center) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('centers.index')->with('error','Setor sem almoxarifado vinculado.');
        }

        // Busca as solicitações em abertas com paginação
        $dbRequestsOpen = InventoryPharmacyRequest::where('status','=','Aberto')->get();

        // Busca as solicitações em encaminhadas com paginação
        $dbRequestsForwarded = InventoryPharmacyRequest::where('status','=','Encaminhado')->get();        

        // Busca as solicitações canceladas com paginação
        $dbRequestsCompleted = InventoryPharmacyRequest::where('status','=','Concluído')->get();

        // Busca as solicitações canceladas com paginação
        $dbRequestsCanceled = InventoryPharmacyRequest::where('status','=','Cancelado')->get();

        // Retorna a view com os dados do departamento e das solicitações de almoxarifado
        return view('inventory.pharmacy.center.center_show_request', compact('dbDepartment','dbRequestsOpen','dbRequestsForwarded','dbRequestsCompleted','dbRequestsCanceled'));
    } 

    /**
     * Display the specified resource.
     */
    public function entryShow(string $id)
    {
        // Busca o registro do departamento pelo ID
        $db = CompanyEstablishmentDepartment::find($id);

        // Verifica se o departamento existe e tem almoxarifado vinculado
        if (!$db || !$db->has_inventory_pharmacy_center) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('pharmacy_centers.index')->with('error', 'Setor sem almoxarifado central vinculado.');
        }
        
        // Busca todos os consumíveis ordenados por título
        $dbFoods = Food::orderBy('title')->get();
        
        // Busca os últimos 20 históricos de movimento de entrada ordenados por data de criação
        $dbHistories = InventoryPharmacyCenterHistory::where('movement', 'Entrada')
            ->orderBy('created_at', 'DESC')
            ->limit(20)
            ->get();

        // Retorna a view do formulário de entrada de estoque para o departamento especificado
        return view('inventory.pharmacy.center.center_entry', compact('db', 'dbHistories', 'dbFoods'));
    }

    /**
     * Display the specified resource.
     */
    public function entryStore(StoreInventoryPharmacyCenterEntryStoreRequest $request, string $id)
    {        
        // Busca o registro do departamento pelo ID
        $dbDepartment = CompanyEstablishmentDepartment::find($id);

        // Verifica se o departamento existe e tem almoxarifado vinculado
        if (!$dbDepartment || !$dbDepartment->has_inventory_pharmacy_center) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('pharmacy_centers.index')->with('error', 'Setor sem almoxarifado central vinculado.');
        }

        // Define os dados da entrada no estoque
        $request['movement'] = 'Entrada';
        $request['incoming_department_id'] = $dbDepartment->id; 
        $request['incoming_establishment_id'] = $dbDepartment->establishment_id;
        $request['user_id'] = Auth::user()->id;

        // Cria um registro de histórico de movimentação
        InventoryPharmacyCenterHistory::create($request->all());

        //Adaptação do Request para o pharmacyCenter
        $request['department_id'] = $dbDepartment->id; 
        $request['establishment_id'] = $dbDepartment->establishment_id;

        // Verifica se já existe um registro do item no estoque do departamento
        $db = InventoryPharmacyCenter::where('medication_id', $request['medication_id'])
            ->where('department_id', $request['department_id'])
            ->where('financial_block_id',$request['financial_block_id'])
            ->first();

        // Se não existir, cria um novo registro de item no estoque
        if (!$db) {
            InventoryPharmacyCenter::create($request->all());
            return redirect()->back()->with('success', 'Cadastro realizado com sucesso');
        }

        // Se já existir, atualiza a quantidade do item no estoque
        $db->quantity += $request['quantity'];
        $db->save();

        // Redireciona de volta para a página anterior com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Cadastro realizado com sucesso');
    }    

    public function requestCheckInventory(string $id, string $inventoryRequest)
    {        
        //
        $dbRequestDetails = InventoryPharmacyRequestDetail::where('store_room_request_id',$inventoryRequest)->orderBy('medication_id')->get();
        $dbInventoryPharmacys = InventoryPharmacyCenter::where('department_id',$id)->orderBy('medication_id')->get();

        foreach ($dbRequestDetails as $dbRequestDetail) {                                  
            $dbRequestDetail->confirmed = FALSE;
            foreach ($dbInventoryPharmacys as $dbInventoryPharmacy) {
                if ($dbRequestDetail->medication_id === $dbInventoryPharmacy->medication_id) {
                    if ($dbRequestDetail->quantity_forwarded > 0 && $dbInventoryPharmacy->quantity >= $dbRequestDetail->quantity_forwarded) {
                        $dbRequestDetail->confirmed = TRUE;
                    }
                }
            }            
            $dbRequestDetail->save();
        }

        return redirect()->back();
    } 

    public function requestConfirmedItem(string $id, string $inventoryRequest)
    {        
        //
        $dbRequestDetails = InventoryPharmacyRequestDetail::find($inventoryRequest);        
        $dbMedicationInventories = InventoryPharmacyCenter::where('department_id',$id)
        ->where('medication_id',$dbRequestDetails->medication_id)->first();

        //
        if ($dbRequestDetails->confirmed) {
            $dbRequestDetails->confirmed = !$dbRequestDetails->confirmed;
            $dbRequestDetails->save();
    
            // Redireciona de volta para a página anterior
            return redirect()->back()->with('success','Alteração realizada com sucesso');
        } else {
            if ($dbMedicationInventories) {            
                if ($dbRequestDetails->quantity_forwarded > 0 && $dbMedicationInventories->quantity > 0) {
                    $dbRequestDetails->confirmed = !$dbRequestDetails->confirmed;
                    $dbRequestDetails->save();
            
                    // Redireciona de volta para a página anterior
                    return redirect()->back()->with('success','Alteração realizada com sucesso');
                }
            }
        }
    
        // Redireciona de volta para a página anterior
        return redirect()->back()->with('error','Não podemos realizar a alteração do item, verifique se existe o item no estoque ou se o item não está zerado');
    }   

    public function requestConfirmedAll(string $id, string $inventoryRequest)
    {        
        //
        $dbRequest = InventoryPharmacyRequest::find($inventoryRequest);
        $dbRequestDetails = InventoryPharmacyRequestDetail::where('store_room_request_id',$inventoryRequest)->get();
        $dbInventoryPharmacyCenters = InventoryPharmacyCenter::where('department_id',$id)->get();
        $dbpharmacyCenter = InventoryPharmacyCenter::where('department_id',$id)->first();
        $dbDepartment = CompanyEstablishmentDepartment::find($dbRequest->department_id);

        //
        foreach ($dbRequestDetails as $dbRequestDetail) {
            if (!$dbRequestDetail->confirmed) {
                $dbRequestDetail->quantity_forwarded = 0;
                $dbRequestDetail->save();
            }

            foreach ($dbInventoryPharmacyCenters as $dbInventoryPharmacyCenter) {
                if ($dbRequestDetail->medication_id === $dbInventoryPharmacyCenter->medication_id) {
                    
                    // Subtrai a quantidade solicitada do estoque do item
                    $dbInventoryPharmacyCenter->quantity -= $dbRequestDetail->quantity_forwarded;
                    $dbInventoryPharmacyCenter->save();

                    // Registra um histórico de movimentação para a saída do item
                    InventoryPharmacyCenterHistory::create([
                        'quantity' => $dbRequestDetail->quantity_forwarded,
                        'movement' => 'Saída',
                        'medication_id' => $dbRequestDetail->medication_id,
                        'incoming_department_id' => $dbDepartment->id,
                        'incoming_establishment_id' => $dbDepartment->establishment_id,
                        'output_department_id' => $dbpharmacyCenter->department_id,
                        'output_establishment_id' => $dbpharmacyCenter->establishment_id,
                        'financial_block_id' => $dbDepartment->CompanyEstablishment->financial_block_id,
                        'user_id' => Auth::user()->id,
                    ]);
                }
            }           
        }
        
        $dbRequest->status = "Encaminhado";
        $dbRequest->save();
        
        // Redireciona de volta para a página anterior
        return redirect()->back()->with('success','Pedido encaminhado para entrega');
    } 
}
