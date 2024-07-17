<?php

namespace App\Http\Controllers\Admin\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyEstablishmentStoreRequest;
use App\Http\Requests\Company\CompanyEstablishmentUpdateRequest;
use App\Http\Requests\Company\CompanyEstablishmentWarehousesStoreRequest;
use App\Http\Requests\Company\CompanyEstablishmentWarehousesUpdateRequest;
use App\Models\Company\CompanyFinancialBlock;
use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\Company\CompanyEstablishmentWarehouseType;
use App\Models\Company\CompanyEstablishmentWarehouse;
use App\Models\Company\CompanyTypeEstablishment;
use App\Models\Inventory\Warehouse\InventoryWarehouseItems;
use App\Models\Inventory\Warehouse\InventoryWarehouseMoviment;
use App\Models\Region\RegionCity;
use App\Services\Logger;


class CompanyEstablishmentController extends Controller
{
    /*
     * Controller access permission resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:sysadmin|admin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Listagem de Dados
        $db = CompanyEstablishment::select()
            ->orderBy('status','DESC')
            ->orderBy('title')
            ->with('FinancialBlock')
            ->with('TypeEstablishment')
            ->with('RegionCity')
            ->paginate(100);

        //Utilizado para Search
        $dbEstablishments = CompanyEstablishment::select()->orderBy('title')->get();
        
        //Lista de Ramais
        $dbDepartments = CompanyEstablishmentDepartment::all();

        //Pesquisar Dados
        $search = $request->all();
        if (isset($search['searchName'])) {
            $db = CompanyEstablishment::where('filter','LIKE','%'.strtolower($search['searchName']).'%')
                ->orderBy('title')
                ->paginate(100);
        }

        //Log do Sistema
        Logger::access();

        return view('admin.company.establishments.establishments_index', compact('search', 'db', 'dbEstablishments', 'dbDepartments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Listagem de Dados
        $dbRegionCities = RegionCity::where('status',true)->orderBy('city')->get();
        $dbCompanyTypeEstablishments = CompanyTypeEstablishment::where('status',true)->orderBy('title')->get();
        $dbCompanyFinancialBlocks = CompanyFinancialBlock::where('status',true)->orderBy('title')->get();

        //Log do Sistema
        Logger::create();

        return view('admin.company.establishments.establishments_create',[
            'dbRegionCities'=>$dbRegionCities,
            'dbCompanyTypeEstablishments'=>$dbCompanyTypeEstablishments,
            'dbCompanyFinancialBlocks'=>$dbCompanyFinancialBlocks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyEstablishmentStoreRequest $request)
    {
        //Dados dos Formulários
        $data = $request->all();
        $data['filter'] = StrtoLower($data['title']);

        //Salvando Dados
        CompanyEstablishment::create($data);

        //Log do Sistema
        Logger::store($data['title']);

        return redirect(route('establishments.index'))->with('success','Cadastro salvo com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        //
        $db = CompanyEstablishment::find($id);

        $dbEstablishmentWarehouses = CompanyEstablishmentWarehouse::where('establishment_id', $id)->get();
        $dbEstablishmentTypeWarehouses = CompanyEstablishmentWarehouseType::all();

        $dbDepartments = CompanyEstablishmentDepartment::where('establishment_id', $id)
            ->orderBy('contact')
            ->get();

        //Log do Sistema
        Logger::show($db->title);

        return view('admin.company.establishments.establishments_show', compact('db', 'dbDepartments', 'dbEstablishmentWarehouses', 'dbEstablishmentTypeWarehouses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Listagem de Dados
        $db = CompanyEstablishment::find($id);
        $dbRegionCities = RegionCity::where('status',true)->orderBy('city')->get();
        $dbCompanyTypeEstablishments = CompanyTypeEstablishment::where('status',true)->orderBy('title')->get();
        $dbCompanyFinancialBlocks = CompanyFinancialBlock::where('status',true)->orderBy('title')->get();

        //Log do Sistema
        Logger::edit($db->establishment);

        return view('admin.company.establishments.establishments_edit',[
            'db'=>$db,
            'dbRegionCities'=>$dbRegionCities,
            'dbCompanyTypeEstablishments'=>$dbCompanyTypeEstablishments,
            'dbCompanyFinancialBlocks'=>$dbCompanyFinancialBlocks,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyEstablishmentUpdateRequest $request, string $id)
    {
        //Dados dos Formulários
        $data = $request->all();
        $data['filter'] = StrtoLower($data['title']);

        //Salvando Dados
        $db = CompanyEstablishment::find($id);
        $db->update($data);

        //Log do Sistema
        Logger::update($db->title);

        return redirect(route('establishments.show',['establishment'=>$id]))->with('success','Cadastro salvo com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return redirect()->route('login');
    }

    /**
     * Update the status of the specified item in storage.
     */
    public function status(Request $request, string $id)
    {
        //Dados dos Formulários
        $data = $request->only('status');

        //Salvando Dados
        $db = CompanyEstablishment::find($id);
        $db->update($data);

        //Log do Sistema
        Logger::status($db->id, $db->status);

        return redirect(route('establishments.index'))->with('success','Status alterado com sucesso.');
    }

    /**
     * Update the status of the specified item in storage.
     */
    public function createWarehouse(CompanyEstablishmentWarehousesStoreRequest $request, string $id)
    {
        $request['filter'] = strtolower($request['title']);
        $request['establishment_id'] = $id;

        CompanyEstablishmentWarehouse::create($request->all());

        return redirect(route('establishments.show',['establishment'=>$id]))->with('success','Almoxarifado salvo com sucesso');
    }

    /**
     * Update the status of the specified item in storage.
     */
    public function updateWarehouse(CompanyEstablishmentWarehousesUpdateRequest $request, string $id)
    {
        $db = CompanyEstablishmentWarehouse::find($id);
        $db->update($request->all());

        return redirect(route('establishments.show',['establishment'=>$db->establishment_id]))->with('success','Almoxarifado atualizado com sucesso');
    }   

    /**
     * Update the status of the specified item in storage.
     */
    public function destroyWarehouse(string $id)
    {
        $db = CompanyEstablishmentWarehouse::find($id);
        $dbItems = InventoryWarehouseItems::where('warehouse_id',$id)->get();
        $dbHistory = InventoryWarehouseMoviment::where('incoming_warehouse_id',$id)
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

        return redirect(route('establishments.show',['establishment'=>$id]))->with('success','Status do almoxarifado alterado com sucesso');
    }
}
