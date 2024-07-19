<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UserPasswordUpdateRequest;
use App\Http\Requests\Profile\UserProfessionalUpdateRequest;
use App\Http\Requests\Profile\UserProfileUpdateRequest;
use App\Models\Profile\Profile;
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

        return view('users.profile.profile_index',[
            'db'=>$db,
            'dbUserSex'=>$dbUserSex,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editProfessional()
    {
        //Listando Dados
        $db = Profile::find(Auth::user()->id);

        Logger::editUserProfile($db->name);

        return view('users.profile.profile_professional',[
            'db'=>$db,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editPassword()
    {
        //   
        $db = Profile::find(Auth::user()->id);

        return view('users.profile.profile_password', compact('db'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProfile(UserProfileUpdateRequest $request, string $id)
    {
        //Listando Usuário
        $db = Profile::find($id);

        if ($db && $db->id === Auth::user()->id) {
            //Alterando Dados do Usuário
            $data = $request->all();

            trim($data['name']);

            $db->update($data);
            
            //Log do Sistema
            Logger::updateUserProfileData($db->name);

            return redirect(route('profiles.edit',['profile'=>$id]))
                ->with('success','Alteração dos dados realizada com sucesso.');

        } else {
            return redirect(route('home'));
        };
    }    

    /**
     * Update the specified resource in storage.
     */
    public function updateProfessional(UserProfessionalUpdateRequest $request, string $id)
    {
        //Listando Usuário
        $db = Profile::find($id);

        if ($db && $db->id === Auth::user()->id) {
            //Alterando Dados do Usuário
            $data = $request->all();

            trim($data['name']);

            $db->update($data);
            
            //Log do Sistema
            Logger::updateUserProfileData($db->name);

            return redirect(route('profiles.edit',['profile'=>$id]))
                ->with('success','Alteração dos dados realizada com sucesso.');

        } else {
            return redirect(route('home'));
        };
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePassword(UserPasswordUpdateRequest $request, string $id)
    {
        //Listando Usuário
        $db = Profile::find($id);

        if ($db && $db->id === Auth::user()->id) {

            $db->password = Hash::make($request['password']);
            $db->save();

            //Log do Sistema
            Logger::updateUserProfilePassword($db->name);

            return redirect(route('profiles.edit',['profile'=>$id]))
                ->with('success','Alteração de senha realizada com sucesso.');

        } else {
            return redirect(route('home'));
        };
    }
}
