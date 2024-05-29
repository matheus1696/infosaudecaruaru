<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyOrganizationLinkedUserStoreRequest;
use App\Http\Requests\Company\CompanyOrganizationLinkedUserUpdateRequest;
use App\Models\User;

class CompanyOrganizationLinkedUserController extends Controller
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
        //
        return redirect()->route('login');
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
    public function store(CompanyOrganizationLinkedUserStoreRequest $request)
    {
        $data = $request->all();
            
        $dbUsers = User::find($data['user_id']);
        $dbUsers->organization_id = $data['organization_id'];
        $dbUsers->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        return redirect()->route('login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
        return redirect()->route('login');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyOrganizationLinkedUserUpdateRequest $request)
    {
        //
        return redirect()->route('login');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dbUsers = User::find($id);
        $dbUsers->organization_id = NULL;
        $dbUsers->save();

        return redirect()->back()->with('success','Usuário removido');
    }
}
