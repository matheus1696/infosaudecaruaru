<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileUpdateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Company\CompanyEstablishment;
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
     * Display a listing of the resource.
     */
    public function index()
    {
        //Redirecionando para Perfil
        if (Auth::user()) {
            return redirect(route('profiles.edit',[Auth::user()->id]));
        }

        return redirect(route('login'));
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
        //Listando Dados
        $db = Profile::find($id);
        $dbUserSex = UserSex::where('status',true)->orderBy('sex')->get();
        $dbEstablishments = CompanyEstablishment::select()->orderBy('title')->get();

        if ($db && $db->id === Auth::user()->id) {
            //Log do Sistema
            Logger::editUserProfile($db->name);

            return view('users.profile.profile_index',[
                'db'=>$db,
                'dbUserSex'=>$dbUserSex,
                'dbEstablishments'=>$dbEstablishments,
            ]);
        } else {
            //Log do Sistema
            Logger::errorUserNoExistent('Usuário informado não existe');

            return redirect(route('home'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        //Listando Usuário
        $db = Profile::find($id);

        if ($db && $db->id === Auth::user()->id) {
            //Alterando Dados do Usuário
            $data = $request->all();
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
    public function updatePassword(ProfileUpdateRequest $request, string $id)
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
