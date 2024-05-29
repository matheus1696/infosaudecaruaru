<?php

namespace App\Http\Controllers\Admin\Medication;

use App\Http\Controllers\Controller;
use App\Models\Medication\Medication;
use App\Http\Requests\Medication\StoreMedicationRequest;
use App\Http\Requests\Medication\UpdateMedicationRequest;
use App\Models\Medication\MedicationClassification;
use App\Models\Medication\MedicationType;
use App\Models\Medication\MedicationUnit;
use App\Services\Logger;
use Illuminate\Http\Request;

class MedicationController extends Controller
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
        $db = Medication::select()->orderBy('status','DESC')->orderBy('title')->paginate(20);

        //Log do Sistema
        Logger::access();

        return view('admin.medication.medication.medication_index',compact('db'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $dbMedicationUnits = MedicationUnit::all();
        $dbMedicationTypes = MedicationType::all();
        $dbMedicationClassifications = MedicationClassification::all();

        //Log do Sistema
        Logger::create();

        return view('admin.medication.medication.medication_create', compact('dbMedicationUnits','dbMedicationTypes', 'dbMedicationClassifications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicationRequest $request)
    {
        $data = $request->all();
        $data['filter'] = StrtoLower($data['title']);

        Medication::create($data);

        //Log do Sistema
        Logger::store($data['title']);

        return redirect(route('medications.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Medication $Medication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Listagem de Dados
        $db = Medication::find($id);        
        $dbMedicationUnits = MedicationUnit::all();
        $dbMedicationTypes = MedicationType::all();
        $dbMedicationClassifications = MedicationClassification::all();

        //Log do Sistema
        Logger::edit($db->title);

        return view('admin.medication.medication.medication_edit',compact('db','dbMedicationUnits','dbMedicationTypes','dbMedicationClassifications'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicationRequest $request, string $id)
    {
        //Dados do Formulário
        $data = $request->all();
        $data['filter'] = StrtoLower($data['title']);

        //Listagem de Dados
        $db = Medication::find($id);
        $db->update($data);

        //Log do Sistema
        Logger::update($db->title);

        return redirect(route('medications.index'))
            ->with('success','Alteração realizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medication $Medication)
    {
        return redirect(route('medications.index'));
    }

    /**
     * Update the status of the specified item in storage.
     */
    public function status(Request $request, string $id)
    {
        //Dados dos Formulários
        $data = $request->only('status');

        //Salvando Dados
        $db = Medication::find($id);
        $db->update($data);

        //Log do Sistema
        Logger::status($db->id, $db->status);

        return redirect(route('medications.index'))->with('success','Status alterado com sucesso.');
    }
}
