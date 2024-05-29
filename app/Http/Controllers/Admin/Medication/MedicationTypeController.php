<?php

namespace App\Http\Controllers\Admin\Medication;

use App\Http\Controllers\Controller;
use App\Models\Medication\MedicationType;
use App\Http\Requests\Medication\StoreMedicationTypeRequest;
use App\Http\Requests\Medication\UpdateMedicationTypeRequest;
use App\Services\Logger;
use Illuminate\Http\Request;

class MedicationTypeController extends Controller
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
        $db = MedicationType::select()->orderBy('status','DESC')->orderBy('title')->paginate(20);

        //Log do Sistema
        Logger::access();

        return view('admin.medication.medication_type.medication_type_index',compact('db'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Log do Sistema
        Logger::create();

        return view('admin.medication.medication_type.medication_type_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicationTypeRequest $request)
    {
        $data = $request->all();
        $data['filter'] = StrtoLower($data['title']);        

        MedicationType::create($data);

        //Log do Sistema
        Logger::store($data['title']);

        return redirect(route('medication_types.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicationType $MedicationType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Listagem de Dados
        $db = MedicationType::find($id);

        //Log do Sistema
        Logger::edit($db->title);

        return view('admin.medication.medication_type.medication_type_edit',compact('db'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicationTypeRequest $request, string $id)
    {
        //Dados do Formulário
        $data = $request->all();
        $data['filter'] = StrtoLower($data['title']);

        //Listagem de Dados
        $db = MedicationType::find($id);
        $db->update($data);

        //Log do Sistema
        Logger::update($db->title);

        return redirect(route('medication_types.index'))
            ->with('success','Alteração realizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicationType $MedicationType)
    {
        return redirect(route('medication_types.index'));
    }

    /**
     * Update the status of the specified item in storage.
     */
    public function status(Request $request, string $id)
    {
        //Dados dos Formulários
        $data = $request->only('status');

        //Salvando Dados
        $db = MedicationType::find($id);
        $db->update($data);

        //Log do Sistema
        Logger::status($db->id, $db->status);

        return redirect(route('medication_types.index'))->with('success','Status alterado com sucesso.');
    }
}
