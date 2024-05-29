<?php

namespace App\Http\Controllers\Admin\Medication;

use App\Http\Controllers\Controller;
use App\Models\Medication\MedicationUnit;
use App\Http\Requests\Medication\StoreMedicationUnitRequest;
use App\Http\Requests\Medication\UpdateMedicationUnitRequest;
use App\Services\Logger;
use Illuminate\Http\Request;

class MedicationUnitController extends Controller
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
        $db = MedicationUnit::select()->orderBy('status','DESC')->orderBy('title')->paginate(20);

        //Log do Sistema
        Logger::access();

        return view('admin.medication.medication_unit.medication_unit_index',compact('db'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Log do Sistema
        Logger::create();

        return view('admin.medication.medication_unit.medication_unit_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicationUnitRequest $request)
    {
        $data = $request->all();
        $data['filter'] = StrtoLower($data['title']);    

        MedicationUnit::create($data);

        //Log do Sistema
        Logger::store($data['title']);

        return redirect(route('medication_units.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicationUnit $MedicationUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Listagem de Dados
        $db = MedicationUnit::find($id);

        //Log do Sistema
        Logger::edit($db->title);

        return view('admin.medication.medication_unit.medication_unit_edit',compact('db'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicationUnitRequest $request, string $id)
    {
        //Dados do Formulário
        $data = $request->all();
        $data['filter'] = StrtoLower($data['title']);    

        //Listagem de Dados
        $db = MedicationUnit::find($id);
        $db->update($data);

        //Log do Sistema
        Logger::update($db->title);

        return redirect(route('medication_units.index'))
            ->with('success','Alteração realizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicationUnit $MedicationUnit)
    {
        return redirect(route('medication_units.index'));
    }

    /**
     * Update the status of the specified item in storage.
     */
    public function status(Request $request, string $id)
    {
        //Dados dos Formulários
        $data = $request->only('status');

        //Salvando Dados
        $db = MedicationUnit::find($id);
        $db->update($data);

        //Log do Sistema
        Logger::status($db->id, $db->status);

        return redirect(route('medication_units.index'))->with('success','Status alterado com sucesso.');
    }
}
