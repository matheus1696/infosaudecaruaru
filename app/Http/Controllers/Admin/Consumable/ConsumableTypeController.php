<?php

namespace App\Http\Controllers\Admin\Consumable;

use App\Http\Controllers\Controller;
use App\Models\Consumable\ConsumableType;
use App\Http\Requests\Consumable\StoreConsumableTypeRequest;
use App\Http\Requests\Consumable\UpdateConsumableTypeRequest;
use App\Services\Logger;
use Illuminate\Http\Request;

class ConsumableTypeController extends Controller
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
        $db = ConsumableType::select()->orderBy('status','DESC')->orderBy('title')->paginate(20);

        //Log do Sistema
        Logger::access();

        return view('admin.consumable.consumable_type.consumable_type_index',compact('db'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Log do Sistema
        Logger::create();

        return view('admin.consumable.consumable_type.consumable_type_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConsumableTypeRequest $request)
    {
        $data = $request->all();
        $data['filter'] = StrtoLower($data['title']);        

        ConsumableType::create($data);

        //Log do Sistema
        Logger::store($data['title']);

        return redirect(route('consumable_types.index'));
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
        $db = ConsumableType::find($id);

        //Log do Sistema
        Logger::edit($db->title);

        return view('admin.consumable.consumable_type.consumable_type_edit',compact('db'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsumableTypeRequest $request, string $id)
    {
        //Dados do Formulário
        $data = $request->all();
        $data['filter'] = StrtoLower($data['title']);

        //Listagem de Dados
        $db = ConsumableType::find($id);
        $db->update($data);

        //Log do Sistema
        Logger::update($db->title);

        return redirect(route('consumable_types.index'))
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
        $db = ConsumableType::find($id);
        $db->update($data);

        //Log do Sistema
        Logger::status($db->id, $db->status);

        return redirect(route('consumable_types.index'))->with('success','Status alterado com sucesso.');
    }
}
