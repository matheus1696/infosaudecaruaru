<?php

namespace App\Http\Controllers\Admin\Region;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Region\RegionCity;
use App\Services\Logger;

class RegionCityController extends Controller
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
        $db = RegionCity::select()
            ->orderBy('status','DESC')
            ->orderBy('city')
            ->paginate(20);

        //Pesquisar Dados
        $search=$request->all();
        if (isset($search['searchName'])) {
            $db = RegionCity::where('filter','LIKE','%'.strtolower($search['searchName']).'%')
                ->orderBy('city')
                ->paginate(20);
        }

        //Log do Sistema
        Logger::access();

        return view('admin.region.cities.cities_index',[
            'search'=>$search,
            'db'=>$db,
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
        //
        return redirect()->route('login');
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
        //Dados encaminhado pelo Formulário
        $data = $request->all();

        //Salvando Dados
        $db = RegionCity::find($id);
        $db->update($data);

        //Log do Sistema
        Logger::status($db->id, $db->status);

        return redirect(route('cities.index'));
    }
}
