<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyEstablishmentDepartment;

class ContactListsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {            
        $db = CompanyEstablishment::where('status',true)->orderBy('title')->get();
        $dbEstablishments = CompanyEstablishment::select()->orderBy('title')->get();
        $dbContacts = CompanyEstablishmentDepartment::where('contact','<>',NULL)->get();

        //Pesquisar Dados
        $search = $request->all();
        if (isset($search['searchName'])) {
            $db = CompanyEstablishment::where('status',true)
                ->where('filter','LIKE','%'.strtolower($search['searchName']).'%')
                ->get();
        }

        return view('public.contacts.contacts_index',[
            'search'=>$search,
            'db'=>$db,           
            'dbEstablishments'=>$dbEstablishments,             
            'dbContacts'=>$dbContacts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $db = CompanyEstablishmentDepartment::where('contact','<>',NULL)
        ->where('establishment_id', $id)
        ->orderBy('contact')
        ->paginate(20);

        $dbEstablishment = CompanyEstablishment::find($id);

        //Pesquisar Dados
        $search = $request->all();
        if (isset($search['searchName'])) {
            $db = CompanyEstablishmentDepartment::where('contact','<>',NULL)
                ->where('establishment_id', $id)
                ->where('filter','LIKE','%'.strtolower($search['searchName']).'%')
                ->orderBy('contact')
                ->paginate(20);
        }

        return view('public.contacts.contacts_show',[
            'search'=>$search,
            'db'=>$db,
            'dbEstablishment'=>$dbEstablishment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * API Display a listing of the resource.
     */
    public function getAllContact() {
        $contact = CompanyEstablishmentDepartment::select()
        ->join('company_establishments', 'company_establishments.id', '=', 'company_establishment_departments.establishment_id')
        ->get()->toJson(JSON_PRETTY_PRINT);

        return response($contact, 200);
    }
}
