<?php

namespace App\Http\Controllers\Admin\Professional;

use App\Http\Controllers\Controller;
use App\Http\Requests\Professional\StoreProfessionalDoctorRequest;
use App\Http\Requests\Professional\UpdateProfessionalDoctorRequest;
use App\Models\Professional\ProfessionalDoctor;
use App\Services\Logger;
use Illuminate\Http\Request;

class ProfessionalDoctorController extends Controller
{
    /*
     * Controller access permission resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:professional_doctor|sysadmin|admin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Log do Sistema
        Logger::access();

        return view('admin.professional.doctor.doctor_index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Log do Sistema
        Logger::create();

        return view('admin.professional.doctor.doctor_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfessionalDoctorRequest $request)
    {
        //
        $request['filter'] = strtolower($request['name']);
        ProfessionalDoctor::create($request->all());

        return redirect()->route('professional_doctors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfessionalDoctor $professionalDoctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfessionalDoctor $professionalDoctor)
    {
        //Listagem de Dados
        $dbDoctors = $professionalDoctor;
        
        //Log do Sistema
        Logger::create();

        return view('admin.professional.doctor.doctor_edit', compact('dbDoctors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfessionalDoctorRequest $request, ProfessionalDoctor $professionalDoctor)
    {
        //
        $request['filter'] = strtolower($request['name']);
        $professionalDoctor->update($request->all());
        
        return redirect()->route('professional_doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfessionalDoctor $professionalDoctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function status(Request $request, ProfessionalDoctor $professionalDoctor)
    {
        //
        $professionalDoctor->update($request->all());

        return redirect()->back()->with('success','Status alterado com sucesso');
    }
}
