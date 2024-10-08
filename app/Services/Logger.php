<?php

namespace App\Services;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SystemLogs;

#Code Logger
	##Acessos = 1000
		#index = Acesso a listagem de dados = 1100
		#show = Acesso detalhado ao dado = 1101
		#create = Formulário de criação = 1200
		#edit = Formulário de edição = 1300
	##Ações = 2000
		#store = Criação de dados = 2100
		#update Edição de dados = 2200
		#destroy = Exclusão de dados = 2300
		#status = Alteração de Status = 2400
	##Informações/Histórico = 3000
		#link = Vincular Cadastro = 3100
	##Logs Especificos - 7000 a 8999
		##Usuários
			#editUserProfile = Formulário de Alteração do Perfil do Usuário = 8900
			#updateUserProfile = Alteração no Perfil do Usuário = 8901
			#editUserProfessional = Formulário de Alteração do Perfil do Usuário = 8902
			#updateUserProfessional = Alteração no Perfil do Usuário = 8903
			#editUserPassword = Formulário de Alteração do Perfil do Usuário = 8904
			#updateUserPassword = Alteração no Perfil do Usuário = 8905
            

			#updateUserPermission = Alteração nas Permissões do Usuário = 8904
			#updateUserVerify = Verificação da conta do Usuário = 8905
			#errorUserNoExistent = Tentativa de acesso a o perfil do usuário inexistente = 8999
	##Erros
		#error = Erros de Acesso = 9000


class Logger
{
    private static function Logs($code, $message) {
        SystemLogs::create([
            'log_code'=>$code,
            'log_ip'=>$_SERVER["REMOTE_ADDR"],
            'log_url'=>Request::url(),
            'log_method'=>Request::method(),
            'log_mensagem'=>$message,
            'user_id'=>Auth::user()->id,
            'user_name'=>Auth::user()->name,
        ]);
    }

    public static function access(){
        self::Logs(1100,"Acesso a listagem de dados.");
    }

    public static function show(){
        self::Logs(1101,"Acesso detalhado ao dado.");
    }

    public static function create(){
        self::Logs(1200,"Formulário de criação.");
    }

    public static function edit($data){
        self::Logs(1300,"Formulário de edição: ". $data . ".");
    }

    public static function store($data){
        self::Logs(2100,"Cadastro de informação: ". $data . ".");
    }

    public static function update($data){
        self::Logs(2200,"Alteração de cadastro: ". $data . ".");
    }

    public static function destroy($data){
        self::Logs(2300,"Exclusão de dados: ". $data . ".");
    }

    public static function status($data, $status){
        self::Logs(2400,"Alteração de status do objeto com ID " . $data . " para o status " . $status);
    }

    public static function link(){
        self::Logs(3100,"Vinculando dado.");
    }

    //Update Profile
        public static function editUserProfile($message){
            self::Logs(8900,"Acesso ao formulário de edição do perfil do usuário " . $message . ".");
        }

        public static function updateUserProfile($message){
            self::Logs(8901,"Alteração dos dados do perfil do usuário " . $message . ".");
        }

        public static function editUserProfessional($message){
            self::Logs(8902,"Acesso ao formulário de edição do dados profissionais do usuário " . $message . ".");
        }

        public static function updateUserProfessional($message){
            self::Logs(8902,"Alteração dos dados profissionais do usuário " . $message . ".");
        }

        public static function editUserPassword($message){
            self::Logs(8904,"Acesso ao formulário de edição da senha do usuário " . $message . ".");
        }

        public static function updateUserPassword($message){
            self::Logs(8905,"Alteração de senha do usuário " . $message . ".");
        }

        public static function updateUserPermission($message){
            self::Logs(8906,"Alterando permissão do usuário " . $message . ".");
        }

        public static function updateUserVerify($message){
            self::Logs(8907,"Encaminhado verificação de conta do usuário " . $message . ".");
        }

    //Errors
        public static function error(){
            self::Logs(9000,"Erro no acesso");
        }

    public static function errorImproperAccess(){
        self::Logs(9001,"Página não existe");
    }
}
