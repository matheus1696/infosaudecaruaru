<?php

namespace App\Http\Controllers\Admin\Consumable;

use App\Http\Controllers\Controller;
use App\Models\Consumable\Consumable;
use App\Http\Requests\Consumable\StoreConsumableRequest;
use App\Http\Requests\Consumable\UpdateConsumableRequest;
use App\Models\Consumable\ConsumableClassification;
use App\Models\Consumable\ConsumableType;
use App\Models\Consumable\ConsumableUnit;
use App\Services\Logger;
use Illuminate\Http\Request;

class ConsumableController extends Controller
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
        $db = Consumable::select()->orderBy('status','DESC')->orderBy('title')->paginate(20);

        //Log do Sistema
        Logger::access();

        return view('admin.consumable.consumable.consumable_index',compact('db'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $dbConsumableUnits = ConsumableUnit::all();
        $dbConsumableTypes = ConsumableType::all();
        $dbConsumableClassifications = ConsumableClassification::all();

        //Log do Sistema
        Logger::create();

        return view('admin.consumable.consumable.consumable_create', compact('dbConsumableUnits','dbConsumableTypes', 'dbConsumableClassifications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConsumableRequest $request)
    {
        $data = $request->all();
        $data['filter'] = StrtoLower($data['title']);

        Consumable::create($data);

        //Log do Sistema
        Logger::store($data['title']);

        return redirect(route('consumables.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(){ return redirect()->route('login');}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Listagem de Dados
        $db = Consumable::find($id);        
        $dbConsumableUnits = ConsumableUnit::all();
        $dbConsumableTypes = ConsumableType::all();
        $dbConsumableClassifications = ConsumableClassification::all();

        //Log do Sistema
        Logger::edit($db->title);

        return view('admin.consumable.consumable.consumable_edit',compact('db','dbConsumableUnits','dbConsumableTypes','dbConsumableClassifications'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsumableRequest $request, string $id)
    {
        //Dados do Formulário
        $data = $request->all();
        $data['filter'] = StrtoLower($data['title']);

        //Listagem de Dados
        $db = Consumable::find($id);
        $db->update($data);

        //Log do Sistema
        Logger::update($db->title);

        return redirect(route('consumables.index'))
            ->with('success','Alteração realizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(){ return redirect()->route('login');}

    /**
     * Update the status of the specified item in storage.
     */
    public function status(Request $request, string $id)
    {
        //Dados dos Formulários
        $data = $request->only('status');

        //Salvando Dados
        $db = Consumable::find($id);
        $db->update($data);

        //Log do Sistema
        Logger::status($db->id, $db->status);

        return redirect(route('consumables.index'))->with('success','Status alterado com sucesso.');
    }
}
