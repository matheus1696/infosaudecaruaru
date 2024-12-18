<?php

namespace App\Http\Controllers\Admin\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyEstablishmentStoreRequest;
use App\Http\Requests\Company\CompanyEstablishmentUpdateRequest;
use App\Models\Company\CompanyFinancialBlock;
use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\Company\CompanyTypeEstablishment;
use App\Models\Inventory\InventoryStoreRoom;
use App\Models\Inventory\InventoryStoreRoomPermission;
use App\Models\Region\RegionCity;
use App\Models\User;
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
    public function index()
    {
        //Log do Sistema
        Logger::access();

        return view('admin.company.establishments.establishments_index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Log do Sistema
        Logger::create();

        return view('admin.company.establishments.establishments_create');
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

        $dbStoreRooms = InventoryStoreRoom::where('establishment_id',$id)->get();
        $dbUsers = User::all();
        $dbPermissions = InventoryStoreRoomPermission::all();

        $dbDepartments = CompanyEstablishmentDepartment::where('establishment_id', $id)
            ->orderBy('contact')
            ->get();

        //Log do Sistema
        Logger::show($db->title);

        return view('admin.company.establishments.establishments_show', compact('db', 'dbDepartments', 'dbStoreRooms', 'dbUsers', 'dbPermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Listagem de Dados
        $db = CompanyEstablishment::find($id);

        //Log do Sistema
        Logger::edit($db->establishment);

        return view('admin.company.establishments.establishments_edit', compact('db'));
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
}
