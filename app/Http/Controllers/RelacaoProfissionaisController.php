<?php

namespace App\Http\Controllers;

use App\Http\Requests\Extra\RelacaoProfissionaisStoreRequest;
use App\Models\Extra\RelacaoProfissionais;

class RelacaoProfissionaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('extra.index');
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
    public function store(RelacaoProfissionaisStoreRequest $request)
    {
        //
        $dbProfessionais = $request['cpf'];

        return redirect()->route('extras.show', $dbProfessionais);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
        $dbProfessionais = RelacaoProfissionais::where('cpf', $id)->get();

        return view('extra.show', compact('dbProfessionais'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $db = RelacaoProfissionais::find($id);

        $db->update([
            'apto_extra' => !$db->apto_extra,
        ]);

        $dbProfessionais = RelacaoProfissionais::where('cpf', $db->cpf)->get();

        return view('extra.show', compact('dbProfessionais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RelacaoProfissionais $relacaoProfissionais)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RelacaoProfissionais $relacaoProfissionais)
    {
        //
    }
}
