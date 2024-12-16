<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Logger;

class UsersController extends Controller
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
        //Log do Sistema
        Logger::access();

        return view('admin.users.users_index');
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
        //Listando Dados Usuário
        $db = User::find($id);

        //Alterando Dados do Usuário
        $data = $request->only('organization_id','occupation_id','establishment_id');
        $db->update($data);
        
        return(redirect(route('users.index'))
            ->with('success',`Permissão do Usuário Alteradas`));
    }

    /**
     * Update the specified resource in storage.
     */
    public function permission(Request $request, User $user)
    {
        // Obtém as permissões enviadas no formulário
        $permissions = $request->input('permissions', []);

        // Sincroniza as permissões com o usuário
        $user->syncPermissions($permissions);

        return redirect()->back()->with('success', 'Permissões atualizadas com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return redirect()->route('login');
    }

    public function verify(string $id)
    {
        //Solicitando Verificação de Conta
        $db = User::find($id);
        $db->email_verified_at = NULL;
        $db->save();

        //Log do Sistema
        Logger::updateUserVerify($db->name);

        return redirect(route('users.index'))
            ->with('success','Atualização realizada com sucesso.');
    }
}
