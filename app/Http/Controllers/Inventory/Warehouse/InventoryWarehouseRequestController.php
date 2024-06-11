<?php

namespace App\Http\Controllers\Inventory\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\Consumable\Consumable;
use App\Models\Inventory\InventoryWarehouseCenter;
use App\Models\Inventory\InventoryWarehouseCenterHistory;
use App\Models\Inventory\InventoryWarehouseStoreRoom;
use App\Models\Inventory\InventoryWarehouseRequest;
use App\Models\Inventory\InventoryWarehouseRequestDetail;
use App\Models\Inventory\InventoryWarehouseStandardRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryWarehouseRequestController extends Controller
{
    
    /*
     * Controller access permission resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:inventory_warehouse_center|sysadmin|admin']);
    }

    public function update(Request $request, string $id, string $inventoryRequest)
    {        

        dd($request->all());
        
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
    
    public function requestShow(string $id)
    {
        // Busca o registro do departamento pelo ID
        $dbDepartment = CompanyEstablishmentDepartment::find($id);

        // Verifica se o departamento existe e se tem almoxarifado vinculado
        if (!$dbDepartment || !$dbDepartment->has_inventory_warehouse_center) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('warehouse_centers.index')->with('error','Setor sem almoxarifado vinculado.');
        }

        // Busca somente as solicitações de almoxarifado abertas, com paginação
        $dbRequests = InventoryWarehouseRequest::where('status','Aberto')->paginate(50);
        
        // Busca somente as solicitações de almoxarifado encaminhadas, com paginação
        $dbRequestSents = InventoryWarehouseRequest::where('status','Encaminhado')->paginate(50);

        // Retorna a view com os dados do departamento e das solicitações de almoxarifado
        return view('inventory.warehouse.center.request.center_request_show', compact('dbDepartment','dbRequests','dbRequestSents'));
    } 



    public function requestCheckInventory(string $id, string $inventoryRequest)
    {        
        //
        $dbRequestDetails = InventoryWarehouseRequestDetail::where('store_room_request_id',$inventoryRequest)->orderBy('consumable_id')->get();
        $dbInventoryWarehouses = InventoryWarehouseCenter::where('department_id',$id)->orderBy('consumable_id')->get();

        foreach ($dbRequestDetails as $dbRequestDetail) {                                  
            $dbRequestDetail->confirmed = FALSE;
            foreach ($dbInventoryWarehouses as $dbInventoryWarehouse) {
                if ($dbRequestDetail->consumable_id === $dbInventoryWarehouse->consumable_id) {
                    if ($dbRequestDetail->quantity_forwarded != 0 || $dbInventoryWarehouse->quantity >= $dbRequestDetail->quantity_forwarded) {
                        $dbRequestDetail->confirmed = TRUE;
                    }
                }
            }            
            $dbRequestDetail->save();
        }

        return redirect()->back();
    } 

    public function requestConfirmedItem(string $id)
    {        
        //
        $dbRequestDetails = InventoryWarehouseRequestDetail::find($id);
        $dbRequestDetails->confirmed = !$dbRequestDetails->confirmed;
        $dbRequestDetails->save();

        // Redireciona de volta para a página anterior
        return redirect()->back();
    }   

    public function requestConfirmedAll(string $id, string $inventoryRequest)
    {        
        //
        $dbRequest = InventoryWarehouseRequest::find($inventoryRequest);
        $dbRequestDetails = InventoryWarehouseRequestDetail::where('store_room_request_id',$inventoryRequest)->get();
        $dbInventoryWarehouseCenters = InventoryWarehouseCenter::where('department_id',$id)->get();
        $dbWarehouseCenter = InventoryWarehouseCenter::where('department_id',$id)->first();
        $dbStoreRoom = InventoryWarehouseStoreRoom::where('department_id',$dbRequest->department_id)->first();

        //
        foreach ($dbRequestDetails as $dbRequestDetail) {
            if (!$dbRequestDetail->confirmed) {
                $dbRequestDetail->quantity_forwarded = 0;
                $dbRequestDetail->save();
            }

            foreach ($dbInventoryWarehouseCenters as $dbInventoryWarehouseCenter) {
                if ($dbRequestDetail->consumable_id === $dbInventoryWarehouseCenter->consumable_id) {
                    
                    // Subtrai a quantidade solicitada do estoque do item
                    $dbInventoryWarehouseCenter->quantity -= $dbRequestDetail->quantity_forwarded;
                    $dbInventoryWarehouseCenter->save();

                    // Registra um histórico de movimentação para a saída do item
                    InventoryWarehouseCenterHistory::create([
                        'quantity' => $dbRequestDetail->quantity_forwarded,
                        'movement' => 'Saída',
                        'consumable_id' => $dbRequestDetail->consumable_id,
                        'incoming_department_id' => $dbStoreRoom->id,
                        'incoming_establishment_id' => $dbStoreRoom->establishment_id,
                        'output_department_id' => $dbWarehouseCenter->department_id,
                        'output_establishment_id' => $dbWarehouseCenter->establishment_id,
                        'financial_block_id' => $dbStoreRoom->CompanyEstablishment->financial_block_id,
                        'user_id' => Auth::user()->id,
                    ]);
                }
            }           
        }
        
        $dbRequest->status = "Encaminhado";
        $dbRequest->save();
        
        // Redireciona de volta para a página anterior
        return redirect()->back();
    } 
}
