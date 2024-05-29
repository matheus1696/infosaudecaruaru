<?php

namespace App\Http\Controllers\Admin\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyOrganizationStoreRequest;
use App\Http\Requests\Company\CompanyOrganizationUpdateRequest;
use App\Models\Company\CompanyOrganization;
use App\Models\User;
use App\Services\Logger;

class CompanyOrganizationController extends Controller
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

        return redirect(route('organizations.organize'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Listando Dados
        $dbSector = CompanyOrganization::select()->orderBy('order')->get();

        //Log do Sistema
        Logger::create();

        return view('admin.company.organizations.organizations_create', compact('dbSector'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyOrganizationStoreRequest $request)
    {
        //Dados do Formulário
        $data = $request->all();
        $data['filter'] = strtolower($request['title']);

        //Salvando Dados
        CompanyOrganization::create($data);

        //Log do Sistema
        Logger::store($data['title']);

        return redirect(route('organizations.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Calculando Usuários Cadastrados
        $dbOrganizations = CompanyOrganization::all();

        foreach ($dbOrganizations as $dbOrganization) {
            $dbLinkedUsers = User::where('organization_id',$dbOrganization->id)->count();

            $db = CompanyOrganization::find($dbOrganization->id);
            $db->linked_users = $dbLinkedUsers;
            $db->save();
        }

        //Listando Dados
        $db = CompanyOrganization::find($id);
        $dbUsers = User::select()->orderBy('name')->get();
        $dbLinkedUsers = User::where('organization_id',$id)->get();

        

        //Log do Sistema
        Logger::show($db->title);

        return view('admin.company.organizations.organizations_show', compact('db','dbUsers','dbLinkedUsers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Listando Dados
        $db = CompanyOrganization::find($id);
        $dbSector = CompanyOrganization::select()->orderBy('order')->get();

        //Log do Sistema
        Logger::edit($db->title);

        return view('admin.company.organizations.organizations_edit', [
            'dbSector' => $dbSector,
            'db' => $db,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyOrganizationUpdateRequest $request, string $id)
    {
        //Listando Dados
        $db = CompanyOrganization::find($id);

        //Dados do Formulário
        $data = $request->all();
        $data['filter'] = strtolower($request['title']);

        //Salvando Dados
        $db->update($data);

        //Log do Sistema
        Logger::update($db->title);

        return redirect(route('organizations.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Listando Dados
        $db = CompanyOrganization::find($id);
        $dbCount = CompanyOrganization::where('hierarchy',$id)->count();

        //Verificação
        if ($dbCount == 0) {
            $db->delete();

            //Log do Sistema
            Logger::destroy($db->title);

            return redirect(route('organizations.index'))
                ->with('success','Exclusão realizada com sucesso.');
        }else {
            $db = CompanyOrganization::find($id);

            //Log do Sistema
            Logger::error();

            return redirect(route('organizations.index'))
                ->with('error','Existe setores vinculados a '.$db->title);
        }
    }

    /**
     * Update the hierarchy of the specified item in the store.
     */
    public function organize()
    {

        //Verificando Usuários Cadastrados
        $dbOrganizations = CompanyOrganization::all();

        foreach ($dbOrganizations as $dbOrganization) {
            $dbLinkedUsers = User::where('organization_id',$dbOrganization->id)->count();

            $dbLinked = CompanyOrganization::find($dbOrganization->id);
            $dbLinked->linked_users = $dbLinkedUsers;
            $dbLinked->save();
        }

        //Reordenando Setores
            //Buscando dados Setores
            $organizations = CompanyOrganization::select()->orderBy('hierarchy')->get();

            foreach ($organizations as $organization) {

                //Atribuindo Hierariquia do Setor Principal
                if ($organization['hierarchy'] == 0) {
                    $orderList = CompanyOrganization::find($organization['id']);
                    $orderList->order = "0" . $organization['acronym'];
                    $orderList->number_hierarchy = 1;
                    $orderList->save();
                }

                //Listando Setores para Ordenação Hierarquica
                    //Buscando Dados do Predecessor (Acima do setor)
                    $predecessor = CompanyOrganization::select()->where('id', $organization['hierarchy'])->get();

                foreach ($predecessor as $valuepredecessor) {
                    //Buscando dados
                    $orderList = CompanyOrganization::find($organization['id']);

                    //Atribuindo Novo Valor
                    $number_hierarchy = $valuepredecessor['order'] . $organization['id'] . $organization['acronym'];

                    //Salvando
                    $orderList->order = $number_hierarchy;
                    $orderList->number_hierarchy = preg_match_all('!\d+!',$number_hierarchy);
                    $orderList->save();
                }
            }
            
            //Listando Setores
            $db = CompanyOrganization::select()->orderBy('order')->get();

            return view('admin.company.organizations.organizations_index', compact('db'));
    }

    /**
     * Update the status of the specified item in storage.
     */
    public function status(Request $request, string $id)
    {
        //Listando Dados
        $db = CompanyOrganization::find($id);

        //Dados encaminhado pelo Formulário
        $data = $request->all();

        //Salvando Dados
        $db->update($data);

        //Log do Sistema
        Logger::status($db->id, $db->status);

        return redirect(route('organizations.organize'));
    }
}
