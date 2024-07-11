<?php

namespace App\Http\Controllers\Inventory\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\Inventory\Warehouse\InventoryWarehouseCenter;
use App\Models\Inventory\Warehouse\InventoryWarehouseCenterHistory;
use App\Models\Inventory\Warehouse\InventoryWarehouseRequest;
use App\Models\Inventory\Warehouse\InventoryWarehouseRequestDetail;
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

    public function editRequest(string $id, string $inventoryRequest)
    {
        // Busca a solicitação de almoxarifado pelo ID
        $db = InventoryWarehouseRequest::find($inventoryRequest);
        $dbDepartment = CompanyEstablishmentDepartment::find($id);
        $dbWarehouseInventories = InventoryWarehouseCenter::where('department_id',$id)->orderBy('consumable_id')->get();
        
        $dbRequestDetails = InventoryWarehouseRequestDetail::where('store_room_request_id', $inventoryRequest)
        ->orderBy('confirmed','DESC')
        ->orderBy('consumable_id')
        ->paginate(150);

        // Retorna a view para edição da solicitação de almoxarifado com os dados necessários
        return view('inventory.warehouse.center.center_edit_request', compact('db','dbDepartment','dbWarehouseInventories','dbRequestDetails'));
    }
    
    public function requestShow(string $id)
    {
        // Busca o registro do departamento pelo ID
        $dbDepartment = CompanyEstablishmentDepartment::find($id);

        // Verifica se o departamento existe e se tem almoxarifado vinculado
        if (!$dbDepartment || !$dbDepartment->has_inventory_warehouse_center) {
            // Redireciona se não houver almoxarifado vinculado
            return redirect()->route('centers.index')->with('error','Setor sem almoxarifado vinculado.');
        }

        // Busca as solicitações em abertas com paginação
        $dbRequestsOpen = InventoryWarehouseRequest::where('status','=','Aberto')->get();

        // Busca as solicitações em encaminhadas com paginação
        $dbRequestsForwarded = InventoryWarehouseRequest::where('status','=','Encaminhado')->get();        

        // Busca as solicitações canceladas com paginação
        $dbRequestsCompleted = InventoryWarehouseRequest::where('status','=','Concluído')->get();

        // Busca as solicitações canceladas com paginação
        $dbRequestsCanceled = InventoryWarehouseRequest::where('status','=','Cancelado')->get();

        // Retorna a view com os dados do departamento e das solicitações de almoxarifado
        return view('inventory.warehouse.center.center_show_request', compact('dbDepartment','dbRequestsOpen','dbRequestsForwarded','dbRequestsCompleted','dbRequestsCanceled'));
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
                    if ($dbRequestDetail->quantity_forwarded > 0 && $dbInventoryWarehouse->quantity >= $dbRequestDetail->quantity_forwarded) {
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
        $dbRequestDetails = InventoryWarehouseRequestDetail::find($inventoryRequest);        
        $dbWarehouseInventories = InventoryWarehouseCenter::where('department_id',$id)
        ->where('consumable_id',$dbRequestDetails->consumable_id)->first();

        //
        if ($dbRequestDetails->confirmed) {
            $dbRequestDetails->confirmed = !$dbRequestDetails->confirmed;
            $dbRequestDetails->save();
    
            // Redireciona de volta para a página anterior
            return redirect()->back()->with('success','Alteração realizada com sucesso');
        } else {
            if ($dbWarehouseInventories) {            
                if ($dbRequestDetails->quantity_forwarded > 0 && $dbWarehouseInventories->quantity > 0) {
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
        $dbRequest = InventoryWarehouseRequest::find($inventoryRequest);
        $dbRequestDetails = InventoryWarehouseRequestDetail::where('store_room_request_id',$inventoryRequest)->get();
        $dbInventoryWarehouseCenters = InventoryWarehouseCenter::where('department_id',$id)->get();
        $dbWarehouseCenter = InventoryWarehouseCenter::where('department_id',$id)->first();
        $dbDepartment = CompanyEstablishmentDepartment::find($dbRequest->department_id);

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
                        'incoming_department_id' => $dbDepartment->id,
                        'incoming_establishment_id' => $dbDepartment->establishment_id,
                        'output_department_id' => $dbWarehouseCenter->department_id,
                        'output_establishment_id' => $dbWarehouseCenter->establishment_id,
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
