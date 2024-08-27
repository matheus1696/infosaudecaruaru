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
        $db = Profile::find(Auth::user()->id);
        $dbUserSex = UserSex::where('status',true)->orderBy('sex')->get();
        Logger::editUserProfile($db->name);
        return view('users.profile.profile_index', compact('db','dbUserSex'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editProfessional()
    {
        //Listando Dados
        $db = Profile::find(Auth::user()->id);
        Logger::editUserProfessional($db->name);
        return view('users.profile.profile_professional', compact('db'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editPassword()
    {
        //   
        $db = Profile::find(Auth::user()->id);
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

        return redirect()->back()->with('success','Alteração dos dados realizada com sucesso.');
    }    

    /**
     * Update the specified resource in storage.
     */
    public function updateProfessional(UserProfessionalUpdateRequest $request)
    {
        //Listando Usuário
        $db = Profile::find(Auth::user()->id);
        
        //Alterando Dados do Usuário
        trim($request['name']);
        $db->update($request->all());
            
        //Log do Sistema
        Logger::updateUserProfessional($db->name);

        return redirect()->back()->with('success','Alteração dos dados realizada com sucesso.');
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

        return redirect()->back()->with('success','Alteração de senha realizada com sucesso.');
    }
}
