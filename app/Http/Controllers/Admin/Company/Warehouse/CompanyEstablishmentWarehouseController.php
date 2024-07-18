<?php

namespace App\Http\Controllers\Admin\Company\Warehouse;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyEstablishmentWarehousesStoreRequest;
use App\Http\Requests\Company\CompanyEstablishmentWarehousesUpdateRequest;
use App\Models\Company\Warehouse\CompanyEstablishmentWarehouse;
use App\Models\Company\Warehouse\CompanyEstablishmentWarehouseItem;
use App\Models\Company\Warehouse\CompanyEstablishmentWarehouseMoviment;

class CompanyEstablishmentWarehouseController extends Controller
{
    /*
     * Controller access permission resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:sysadmin|admin']);
    }

    /**
     * Update the status of the specified item in storage.
     */
    public function createWarehouse(CompanyEstablishmentWarehousesStoreRequest $request, string $id)
    {
        $request['filter'] = strtolower($request['title']);
        $request['establishment_id'] = $id;

        CompanyEstablishmentWarehouse::create($request->all());

        return redirect()->back()->with('success','Almoxarifado salvo com sucesso');
    }

    /**
     * Update the status of the specified item in storage.
     */
    public function updateWarehouse(CompanyEstablishmentWarehousesUpdateRequest $request, string $id)
    {
        $db = CompanyEstablishmentWarehouse::find($id);
        $db->update($request->all());

        return redirect()->back()->with('success','Almoxarifado atualizado com sucesso');
    }   

    /**
     * Update the status of the specified item in storage.
     */
    public function destroyWarehouse(string $id)
    {
        $db = CompanyEstablishmentWarehouse::find($id);
        $dbItems = CompanyEstablishmentWarehouseItem::where('warehouse_id',$id)->get();
        $dbHistory = CompanyEstablishmentWarehouseMoviment::where('incoming_warehouse_id',$id)
            ->orWhere('output_warehouse_id',$id)
            ->get();
            
        if ($dbHistory->count() > 0) {
            return redirect()->back()->with('error','Almoxarifado contém histórico de movimentação no estoque.');
        }

        if ($dbItems->count() > 0) {
            return redirect()->back()->with('error','Almoxarifado contém itens no estoque.');
        }

        $db->delete();

        return redirect()->back()->with('success','Almoxarifado excluído com sucesso');
    }

    /**
     * Update the status of the specified item in storage.
     */
    public function statusWarehouse(Request $request, string $id)
    {
        $db = CompanyEstablishmentWarehouse::find($id);
        $db->update($request->only('status'));

        return redirect()->back()->with('success','Status do almoxarifado alterado com sucesso');
    }
}
