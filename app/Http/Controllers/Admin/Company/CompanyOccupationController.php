<?php

namespace App\Http\Controllers\Admin\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company\CompanyOccupation;
use App\Services\Logger;

class CompanyOccupationController extends Controller
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
        //Listando Dados
        $db = CompanyOccupation::select()
            ->orderBy('status','DESC')
            ->orderBy('title')
            ->paginate(20);

        $dbCompanyOccupations = CompanyOccupation::select()->orderBy('title')->get();

        //Pesquisa de Dados
        $search = $request->all();
        
        if (isset($search['searchName']) || isset($search['searchCod'])) {

            $query = CompanyOccupation::query();

            if (!empty($search['searchName'])) { $query->where('title', $search['searchName']);}

            if (!empty($search['searchCod'])) {$query->where('code', $search['searchCod']);}

            $db = $query->orderBy('title')->paginate(20);
        }  

        //Log do Sistema
        Logger::access();

        return view('admin.company.occupations.occupations_index', [
            'search'=>$search,
            'db'=>$db,
            'dbCompanyOccupations'=>$dbCompanyOccupations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return redirect()->route('login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return redirect()->route('login');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Dados dos Formulário
        $data = $request->all();

        //Listando Dados
        $db = CompanyOccupation::find($id);

        //Atualizando Dados
        $db->update($data);

        //Log do Sistema
        Logger::status($db->id, $db->status);

        return redirect(route('occupations.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return redirect()->route('login');
    }
}
