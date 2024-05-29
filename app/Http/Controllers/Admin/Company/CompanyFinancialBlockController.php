<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyFinancialBlockStoreRequest;
use App\Http\Requests\Company\CompanyFinancialBlockUpdateRequest;
use App\Models\Company\CompanyFinancialBlock;
use App\Services\Logger;

class CompanyFinancialBlockController extends Controller
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
        //Listagem de Dados
        $db = CompanyFinancialBlock::select()
            ->orderBy('title')
            ->paginate(20);

        //Log do Sistema
        Logger::access();

        return view('admin.company.financial_blocks.financial_blocks_index',[
            'db'=>$db,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Log do Sistema
        Logger::create();

        return view('admin.company.financial_blocks.financial_blocks_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyFinancialBlockStoreRequest $request)
    {
        //Dados do formulário
        $data = $request->all();

        //Salvando Dados
        CompanyFinancialBlock::create($data);

        //Log do Sistema
        Logger::store($data['title']);

        return redirect(route('financial_blocks.index'))
            ->with('success','Cadastro salvo com sucesso');
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
        //Listando Dados
        $db = CompanyFinancialBlock::find($id);

        //Log do Sistema
        Logger::edit($db->title);

        return view('admin.company.financial_blocks.financial_blocks_edit',[
            'db'=>$db,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyFinancialBlockUpdateRequest $request, string $id)
    {
        //Dados do formulário
        $data = $request->all();

        //Atualizando dados
        $db = CompanyFinancialBlock::find($id);
        $db->update($data);

        //Log do Sistema
        Logger::update($db->title);

        return redirect(route('financial_blocks.index'))
            ->with('success','Cadastro alterado com sucesso');
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
