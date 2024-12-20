<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UserPasswordUpdateRequest;
use App\Http\Requests\Profile\UserProfessionalUpdateRequest;
use App\Http\Requests\Profile\UserProfileUpdateRequest;
use App\Models\Profile\Profile;
use App\Models\User;
use App\Models\User\UserSex;
use App\Services\Logger;

class ProfileController extends Controller
{
    /*
     * Controller access permission resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editProfile()
    {
        //Listando Dados
        $db = Auth::user();
        $dbUserSex = UserSex::where('status',true)->orderBy('sex')->get();

        //Log do Sistema
        Logger::editUserProfile($db->name);

        return view('users.profile.profile_index', compact('db','dbUserSex'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editProfessional()
    {
        //Listando Dados
        $db = Auth::user();

        //Log do Sistema
        Logger::editUserProfessional($db->name);

        return view('users.profile.profile_professional', compact('db'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editPassword()
    {
        //Listando Dados
        $db = Auth::user();

        //Log do Sistema
        Logger::editUserPassword($db->name);

        return view('users.profile.profile_password', compact('db'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProfile(UserProfileUpdateRequest $request)
    {
        //Listando Usuário
        $db = Profile::find(Auth::user()->id);

        //Alterando Dados do Usuário
        trim($request['name']);
        $db->update($request->all());
        
        //Log do Sistema
        Logger::updateUserProfile($db->name);

        return redirect()->back()->with('success','Tudo certo! Suas informações pessoais foram atualizadas com sucesso!');
    }    

    /**
     * Update the specified resource in storage.
     */
    public function updateProfessional(UserProfessionalUpdateRequest $request)
    {
        //Listando Usuário
        $db = Profile::find(Auth::user()->id);
        
        //Alterando Dados do Usuário
        $db['matriculation'] = $request['matriculation'];
        $db->save();
            
        //Log do Sistema
        Logger::updateUserProfessional($db->name);

        return redirect()->back()->with('success','Tudo pronto! Suas informações profissionais foram atualizadas com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePassword(UserPasswordUpdateRequest $request)
    {
        // Obtendo o usuário autenticado
        $db = User::find(Auth::user()->id);
        
        // Alterando a senha do usuário
        $db->password = Hash::make($request->input('password'));
        $db->save(); // Persistindo as mudanças

        // Log do Sistema
        Logger::updateUserPassword($db->name);

        return redirect()->back()->with('success','Pronto! Sua senha foi alterada com sucesso!');
    }
}
